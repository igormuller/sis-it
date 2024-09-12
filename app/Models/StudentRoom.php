<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRoom extends Model
{
    use HasFactory;

    protected $table = 'student_room';

    protected $fillable = [
        'student_id',
        'room_id',
    ];
}
