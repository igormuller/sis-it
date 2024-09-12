<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    $studentForSeries = Student::select('s.name', DB::raw('count(*) as total'))
        ->join('student_room as sr', 'students.id', 'sr.student_id')
        ->join('rooms as r', 'sr.room_id', 'r.id')
        ->join('series as s', 'r.serie_id', 's.id')
        ->groupBy('s.id')->get();

    $studentForRooms = Student::select('r.name', DB::raw('count(*) as total'))
        ->join('student_room as sr', 'students.id', 'sr.student_id')
        ->join('rooms as r', 'sr.room_id', 'r.id')
        ->groupBy('r.id')->get();

    return view('dashboard', ['studentForSeries' => $studentForSeries, 'studentForRooms' => $studentForRooms]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('rooms', RoomController::class)->except(['show']);
    Route::post('/rooms/{room}/enroll', [RoomController::class, 'enroll'])->name('rooms.enroll');
    
    Route::resource('students', StudentController::class)->except(['show']);
});

require __DIR__.'/auth.php';
