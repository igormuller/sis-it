<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnrollRequest;
use App\Models\Room;
use App\Models\Serie;
use App\Models\Student;
use App\Models\StudentRoom;
use App\Services\EnrollService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::paginate(10);
        return view('rooms.index', ['rooms' => $rooms]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rooms.create', ['series' => Serie::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'shift' => ['required', Rule::in(['MORNING', 'AFTERNOON', 'FULL_TIME'])],
            'vacancies' => ['required', 'integer', 'min:5'],
            'school_year' => ['required', 'date_format:Y'],
            'serie_id' => ['required', Rule::exists('series', 'id')],
        ]);

        Room::create($request->all());

        return redirect()->route('rooms.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        $students = Student::whereNotIn('id', $room->students->pluck('id'))->get();
        return view('rooms.edit', ['room' => $room, 'series' => Serie::all(), 'students' => $students]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'name' => ['required'],
            'shift' => ['required', Rule::in(['MORNING', 'AFTERNOON', 'FULL_TIME'])],
            'vacancies' => ['required', 'integer', 'min:5'],
            'school_year' => ['required', 'date_format:Y'],
            'serie_id' => ['required', Rule::exists('series', 'id')],
        ]);

        $room->update($request->all());
        return redirect()->route('rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index');
    }

    public function enroll(Request $request, Room $room)
    {
        $request->validate([
            'student_id' => [
                'required', 
                Rule::exists('students', 'id'), 
                Rule::unique('student_room', 'student_id')
                    ->where('room_id', $room->id)
            ]
        ]);

        $student = Student::findOrFail($request->student_id);

        try {
            $service = new EnrollService($room);
            $service->enroll($student);
        } catch (Exception $e) {
            return back()->withErrors(['message' => $e->getMessage()]);
        }

        return redirect()->route('rooms.edit', $room->id);
    }
}
