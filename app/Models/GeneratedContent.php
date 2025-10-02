<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GeneratedContent extends Model
{
    use HasFactory;

    protected $table = 'generated_content';

    protected $fillable = [
        'teacher_id',
        'type',
        'title',
        'input_data',
        'generated_content',
        'is_favorite',
    ];

    protected $casts = [
        'input_data' => 'array',
        'is_favorite' => 'boolean',
    ];

    /**
     * Get the teacher that owns the generated content.
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    /**
     * Get the available content types.
     */
    public static function getTypes(): array
    {
        return [
            'quiz' => 'اختبار',
            'activity' => 'نشاط',
            'story' => 'قصة',
            'rubric' => 'معيار تقييم',
            'concept' => 'مفهوم مبسط',
            'objective' => 'هدف تعليمي',
            'parent_message' => 'رسالة ولي أمر',
            'report_card' => 'ملاحظة سجل',
            'strategy' => 'استراتيجية',
            'performance_review' => 'تقرير أداء',
        ];
    }
}
