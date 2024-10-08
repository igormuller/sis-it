<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'type',
        'zipcode',
        'street',
        'number',
        'complement',
    ];
}
