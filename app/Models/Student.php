<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tutor',
        'age',
        'phone',
        'gender',
        'birthdate'
    ];

    public function classStudent(): BelongsTo
    {
        return $this->belongsTo(ClassStudent::class);
    }

    public function attendance(): BelongsTo
    {
        return $this->belongsTo(Attendance::class);
    }

    public function studentHomework(): BelongsTo
    {
        return $this->belongsTo(StudentHomeworks::class);
    }
}
