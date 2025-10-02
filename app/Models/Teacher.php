<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',
        'city',
        'school',
        'subject',
        'stage',
        'profile_image',
        'years_experience',
        'qualification',
        'specialization',
        'classes_data',
    ];

    protected $casts = [
        'classes_data' => 'array',
    ];

    /**
     * Get the user that owns the teacher profile.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the classes for the teacher.
     */
    public function classes(): HasMany
    {
        return $this->hasMany(StudentClass::class);
    }

    /**
     * Get the lesson plans for the teacher.
     */
    public function lessonPlans(): HasMany
    {
        return $this->hasMany(LessonPlan::class);
    }

    /**
     * Get the generated content for the teacher.
     */
    public function generatedContent(): HasMany
    {
        return $this->hasMany(GeneratedContent::class);
    }
}
