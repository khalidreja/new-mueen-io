<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LessonPlanController;
use App\Http\Controllers\AIToolsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentClassController;

Route::get('/', function () {    
    // إذا كان المستخدم مسجل دخول، توجيهه للوحة التحكم
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    
    // إذا لم يكن مسجل، عرض صفحة الهبوط
    return Inertia::render('Landing');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard - متاح فقط للأعضاء المسجلين
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Lesson Plans
    Route::resource('lesson-plans', LessonPlanController::class);
    Route::post('/lesson-plans/{lessonPlan}/update-status', [LessonPlanController::class, 'updateStatus'])
        ->name('lesson-plans.update-status');
    Route::post('/lesson-plans/{lessonPlan}/duplicate', [LessonPlanController::class, 'duplicate'])
        ->name('lesson-plans.duplicate');
    
    // AI Tools Routes
    Route::prefix('ai')->group(function () {
        Route::post('/generate-lesson-plan', [AIToolsController::class, 'generateLessonPlan']);
        Route::post('/generate-objectives', [AIToolsController::class, 'generateObjectives']);
        Route::post('/generate-quiz', [AIToolsController::class, 'generateQuiz']);
        Route::post('/generate-activity', [AIToolsController::class, 'generateActivity']);
        Route::post('/generate-parent-message', [AIToolsController::class, 'generateParentMessage']);
        Route::post('/generate-rubric', [AIToolsController::class, 'generateRubric']);
        Route::post('/generate-story', [AIToolsController::class, 'generateStory']);
        Route::post('/generate-concept', [AIToolsController::class, 'generateConceptSimplification']);
        Route::post('/generate-strategy', [AIToolsController::class, 'generateStrategy']);
        Route::post('/generate-performance-review', [AIToolsController::class, 'generatePerformanceReview']);
        Route::post('/generate-report-card', [AIToolsController::class, 'generateReportCard']);
        Route::post('/save-content', [AIToolsController::class, 'saveContent']);
    });
    
    // AI Tool Pages
    Route::get('/performance-review', function () {
        return Inertia::render('Tools/PerformanceReview');
    })->name('performance-review');
    
    Route::get('/parent-communication', function () {
        return Inertia::render('Tools/ParentCommunication');
    })->name('parent-communication');
    
    Route::get('/objectives-generator', function () {
        return Inertia::render('Tools/ObjectivesGenerator');
    })->name('objectives-generator');
    
    Route::get('/concept-simplifier', function () {
        return Inertia::render('Tools/ConceptSimplifier');
    })->name('concept-simplifier');
    
    Route::get('/activity-generator', function () {
        return Inertia::render('Tools/ActivityGenerator');
    })->name('activity-generator');
    
    Route::get('/strategy-generator', function () {
        return Inertia::render('Tools/StrategyGenerator');
    })->name('strategy-generator');
    
    Route::get('/quiz-generator', function () {
        return Inertia::render('Tools/QuizGenerator');
    })->name('quiz-generator');
    
    Route::get('/rubric-generator', function () {
        return Inertia::render('Tools/RubricGenerator');
    })->name('rubric-generator');
    
    Route::get('/story-generator', function () {
        return Inertia::render('Tools/StoryGenerator');
    })->name('story-generator');
    
    Route::get('/report-card-generator', function () {
        return Inertia::render('Tools/ReportCardGenerator');
    })->name('report-card-generator');
    
    Route::get('/wheel', function () {
        return Inertia::render('Tools/Wheel');
    })->name('wheel');
    
    // Teacher Classes API for Wheel
    Route::get('/api/teacher-classes', [ProfileController::class, 'getTeacherClasses'])->name('api.teacher-classes');
    
    // Classes Management
    Route::resource('classes', StudentClassController::class);
    Route::post('/classes/{class}/students', [StudentClassController::class, 'addStudents'])
        ->name('classes.add-students');
    Route::delete('/classes/{class}/students/{student}', [StudentClassController::class, 'removeStudent'])
        ->name('classes.remove-student');
    
    // Profile Management (Teacher Profile)
    Route::get('/teacher-profile', [ProfileController::class, 'edit'])->name('teacher.profile.edit');
    Route::patch('/teacher-profile', [ProfileController::class, 'update'])->name('teacher.profile.update');
    Route::post('/teacher-profile/upload-image', [ProfileController::class, 'uploadImage'])->name('teacher.profile.upload-image');
});

// require __DIR__.'/settings.php'; // معطل مؤقتاً لتجنب تضارب المسارات
require __DIR__.'/auth.php'; // مطلوب للـ controllers
require __DIR__.'/ai-tools.php'; // AI Tools routes
