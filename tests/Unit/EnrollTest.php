<?php

namespace Tests\Unit;

use App\Models\Room;
use App\Models\Serie;
use App\Models\Student;
use App\Services\EnrollService;
use Carbon\Carbon;
use Exception;
use Tests\TestCase;

// use PHPUnit\Framework\TestCase;

class EnrollTest extends TestCase
{
    // use RefreshDatabase;

    public function test_enroll_failed_age(): void
    {
        $serie = Serie::create([
            'name' => 'G2',
            'age' => 5,
        ]);

        $room = Room::create([
            'name' => 'Turma 01',
            'shift' => 'MORNING',
            'vacancies' => 15,
            'school_year' => 2024,
            'serie_id' => $serie->id,
        ]);

        $student = Student::create([
            'enroll' => 123456,
            'name' => 'Teste',
            'birthday' => Carbon::now()->subYears(4),
            'fathers_name' => 'Father',
            'mothers_name' => 'Mother',
        ]);

        $this->expectExceptionMessage('Idade não permitida');
        $service = new EnrollService($room);
        $service->enroll($student);
    }
}
