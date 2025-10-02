<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\LessonPlan;
use App\Models\GeneratedContent;
use App\Models\StudentClass;

class DashboardController extends Controller
{
    public function index()
    {
        $teacher = auth()->user()->teacher;
        
        if (!$teacher) {
            // إذا لم يكن المستخدم معلم، قم بإنشاء ملف معلم
            $teacher = auth()->user()->teacher()->create([]);
        }

        $stats = [
            'lesson_plans_count' => $teacher->lessonPlans()->count(),
            'generated_content_count' => $teacher->generatedContent()->count(),
            'classes_count' => $teacher->classes()->count(),
            'recent_lesson_plans' => $teacher->lessonPlans()->latest()->take(5)->get(),
            'recent_content' => $teacher->generatedContent()->latest()->take(5)->get(),
        ];

        return Inertia::render('Dashboard', [
            'stats' => $stats,
            'teacher' => $teacher,
        ]);
    }
}
