<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'shift',
        'vacancies',
        'school_year',
        'serie_id',
    ];

    protected $with = [
        'serie',
    ];

    public function serie(): BelongsTo
    {
        return $this->belongsTo(Serie::class, 'serie_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_room');
    }
}
