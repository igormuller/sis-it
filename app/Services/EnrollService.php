<?php

namespace App\Services;

use App\Models\Room;
use App\Models\Student;
use App\Models\StudentRoom;
use Carbon\Carbon;
use Exception;

class EnrollService
{

    private Room $room;
    
    public function __construct(Room $room) {
        $this->room = $room;
    }

    public function enroll(Student $student)
    {
        if ($this->room->vacancies <= $this->room->students->count())
            throw new Exception('Limite de matrícula. ' . $this->room->vacancies);

        $studentAge = Carbon::parse($student->birthday)->age;
        
        if ($this->room->serie->age > $studentAge)
            throw new Exception('Idade não permitida');
        
        return StudentRoom::create([
            'student_id' => $student->id,
            'room_id' => $this->room->id
        ]);
    }
    
}