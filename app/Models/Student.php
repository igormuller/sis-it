<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'enroll',
        'name',
        'birthday',
        'segment',
        'fathers_name',
        'mothers_name',
    ];

    public function rooms(): BelongsToMany
    {
        return $this->belongsToMany(Room::class, 'student_room')->orderBy('school_year', 'DESC');
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }
}
