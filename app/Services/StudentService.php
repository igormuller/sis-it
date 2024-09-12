<?php

namespace App\Services;

use App\Models\Address;
use App\Models\Student;
use Carbon\Carbon;

class StudentService
{
    public function create(array $data): Student
    {
        $data['birthday'] = Carbon::createFromFormat('d/m/Y', $data['birthday'])->format('Y-m-d');
        $data['enroll'] = $this->createEnroll();

        return Student::create($data);
    }

    private function createEnroll()
    {
        $hasEnroll = true;
        while ($hasEnroll) {
            $enroll = random_int(11111,999999);
            $hasEnroll = Student::where('enroll', $enroll)->get()->isNotEmpty();
        }
        return $enroll;
    }

    public function createAddress(Student $student, array $data): Address
    {
        return $student->addresses()->create([
            'type' => $data['address_type'],
            'zipcode' => $data['address_zipcode'],
            'street' => $data['address_street'],
            'number' => $data['address_number'],
            'complement' => $data['address_complement'],
        ]);        
    }
}