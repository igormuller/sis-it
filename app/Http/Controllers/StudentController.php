<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Services\StudentService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::paginate(10);
        return view('students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'birthday' => ['required', 'date_format:d/m/Y'],
            'mothers_name' => ['required'],
            'fathers_name' => ['required'],
            'address_type' => ['required', Rule::in(['BILLING', 'HOME', 'MAILING'])],
            'address_zipcode' => ['required', 'max:9', 'regex:/^(?:(\d{5})(?:[ \-](\d{3}))?)$/i'],
            'address_street' => ['required'],
            'address_number' => ['nullable'],
            'address_complement' => ['nullable'],

        ]);
        
        $service = new StudentService();
        $student = $service->create($request->only(['name', 'birthday', 'mothers_name', 'fathers_name']));
        $service->createAddress($student, $request->only([
            'address_type',
            'address_zipcode',
            'address_street',
            'address_number',
            'address_complement'
        ]));

        return redirect()->route('students.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
