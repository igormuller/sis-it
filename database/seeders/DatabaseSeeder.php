<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\Serie;
use App\Models\Student;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Secretária', 'email' => 'secretaria@exemple.com.br', 'permission' => 'SECRETARY'],
            ['name' => 'Assistente', 'email' => 'assistente@exemple.com.br', 'permission' => 'ASSISTANT'],
            ['name' => 'Cadastro', 'email' => 'cadastro@exemple.com.br', 'permission' => 'REGISTER'],
        ];
        foreach ($users as $user) {
            User::factory()->create([
                'name' => $user['name'],
                'email'  => $user['email'],
                'permission'  => $user['permission'],
            ]);
        }

        $series = [
            ['name' => 'G1', 'age' => 3],
            ['name' => 'G2', 'age' => 4],
            ['name' => 'G3', 'age' => 5],
            ['name' => '1ª ano', 'age' => 6],
            ['name' => '2ª ano', 'age' => 7],
            ['name' => '3ª ano', 'age' => 8],
            ['name' => '4ª ano', 'age' => 9],
            ['name' => '5ª ano', 'age' => 10],
            ['name' => '6ª ano', 'age' => 11],
            ['name' => '7ª ano', 'age' => 12],
            ['name' => '8ª ano', 'age' => 13],
            ['name' => '9ª ano', 'age' => 14],
            ['name' => '1ª EM', 'age' => 15],
            ['name' => '2ª EM', 'age' => 16],
            ['name' => '3ª EM', 'age' => 17],
        ];
        foreach ($series as $serie) {
            Serie::factory()->create([
                'name' => $serie['name'],
                'age'  => $serie['age'],
            ]);
        }

        Room::factory(10)->create();
        Student::factory(10)->create();
    }
}
