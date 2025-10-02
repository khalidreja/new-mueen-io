<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'name',
        'student_id',
        'notes',
        'performance_data',
        'is_active',
    ];

    protected $casts = [
        'performance_data' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Get the class that owns the student.
     */
    public function studentClass(): BelongsTo
    {
        return $this->belongsTo(StudentClass::class, 'class_id');
    }
}
