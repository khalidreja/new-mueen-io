<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AIToolsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// AI Tools API Routes (without CSRF protection)
Route::prefix('ai-tools')->group(function () {
    Route::post('/generate/lesson-plan', [AIToolsController::class, 'generateLessonPlan']);
    Route::post('/generate/objectives', [AIToolsController::class, 'generateObjectives']);
    Route::post('/generate/quiz', [AIToolsController::class, 'generateQuiz']);
    Route::post('/generate/activity', [AIToolsController::class, 'generateActivity']);
    Route::post('/generate/parent-message', [AIToolsController::class, 'generateParentMessage']);
    Route::post('/generate/rubric', [AIToolsController::class, 'generateRubric']);
    Route::post('/generate/story', [AIToolsController::class, 'generateStory']);
    Route::post('/generate/concept-simplification', [AIToolsController::class, 'generateConceptSimplification']);
    Route::post('/generate/strategy', [AIToolsController::class, 'generateStrategy']);
    Route::post('/generate/performance-review', [AIToolsController::class, 'generatePerformanceReview']);
    Route::post('/generate/report-card', [AIToolsController::class, 'generateReportCard']);
});

// Simple test route
Route::post('/test', function() {
    return response()->json([
        'success' => true,
        'message' => 'API is working!',
        'timestamp' => now()
    ]);
});

Route::post('/test-simple', function() {
    return response()->json([
        'success' => true,
        'message' => 'API البسيط يعمل بشكل مثالي!',
        'server' => 'Laravel ' . app()->version(),
        'timestamp' => now()->format('Y-m-d H:i:s'),
        'status' => 'جاهز للعمل'
    ]);
});

// Test route to check Gemini integration
Route::post('/test-gemini', function () {
    try {
        $geminiService = app(\App\Services\GeminiService::class);
        
        $testData = [
            'subject' => 'الرياضيات',
            'grade' => 'الصف الثالث الابتدائي',
            'topic' => 'جدول الضرب'
        ];
        
        $result = $geminiService->generateLessonPlan($testData);
        
        return response()->json([
            'status' => 'success',
            'message' => 'Gemini integration working successfully!',
            'sample_output' => substr($result, 0, 200) . '...',
            'config_loaded' => config('services.gemini.api_key') ? 'Yes' : 'No'
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage(),
            'config_loaded' => config('services.gemini.api_key') ? 'Yes' : 'No'
        ], 500);
    }
});