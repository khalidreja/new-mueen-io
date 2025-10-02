<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LessonPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'title',
        'subject',
        'grade',
        'class_name',
        'duration',
        'objectives',
        'content',
        'activities',
        'resources',
        'assessment',
        'notes',
        'lesson_date',
        'status',
    ];

    protected $casts = [
        'objectives' => 'array',
        'activities' => 'array',
        'resources' => 'array',
        'lesson_date' => 'date',
    ];

    /**
     * Get the teacher that owns the lesson plan.
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }
}
