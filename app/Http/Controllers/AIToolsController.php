<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\GeneratedContent;
use App\Services\GeminiService;
use Illuminate\Support\Facades\Log;

class AIToolsController extends Controller
{
    protected $geminiService;

    public function __construct(GeminiService $geminiService)
    {
        $this->geminiService = $geminiService;
    }

    public function generateLessonPlan(Request $request)
    {
        $request->validate([
            'subject' => 'required|string',
            'grade' => 'required|string',
            'topic' => 'required|string',
        ]);

        try {
            $generatedContent = $this->geminiService->generateLessonPlan($request->all());
            
            return response()->json([
                'content' => $generatedContent,
                'success' => true
            ]);
        } catch (\Exception $e) {
            Log::error('Lesson plan generation failed', [
                'error' => $e->getMessage(),
                'data' => $request->all()
            ]);
            
            return response()->json([
                'error' => 'فشل في توليد خطة الدرس. يرجى المحاولة مرة أخرى.',
                'success' => false
            ], 500);
        }
    }

    public function generateObjectives(Request $request)
    {
        $request->validate([
            'subject' => 'required|string',
            'grade' => 'required|string',
            'topic' => 'required|string',
            'objectivesCount' => 'nullable|string',
            'bloomLevels' => 'nullable|string',
        ]);

        try {
            $generatedContent = $this->geminiService->generateObjectives($request->all());
            
            return response()->json([
                'content' => $generatedContent,
                'success' => true
            ]);
        } catch (\Exception $e) {
            Log::error('Objectives generation failed', [
                'error' => $e->getMessage(),
                'data' => $request->all()
            ]);
            
            return response()->json([
                'error' => 'فشل في توليد الأهداف التعليمية. يرجى المحاولة مرة أخرى.',
                'success' => false
            ], 500);
        }
    }

    public function generateQuiz(Request $request)
    {
        $request->validate([
            'topic' => 'required|string',
            'grade' => 'required|string',
            'num_questions' => 'nullable|integer|min:3|max:20',
            'question_types' => 'nullable|array',
        ]);

        try {
            $generatedContent = $this->geminiService->generateQuiz($request->all());
            
            return response()->json([
                'content' => $generatedContent,
                'success' => true
            ]);
        } catch (\Exception $e) {
            Log::error('Quiz generation failed', [
                'error' => $e->getMessage(),
                'data' => $request->all()
            ]);
            
            return response()->json([
                'error' => 'فشل في توليد الاختبار. يرجى المحاولة مرة أخرى.',
                'success' => false
            ], 500);
        }
    }

    public function generateActivity(Request $request)
    {
        $request->validate([
            'subject' => 'required|string',
            'topic' => 'required|string',
            'grade' => 'required|string',
            'activity_type' => 'nullable|string',
        ]);

        try {
            $generatedContent = $this->geminiService->generateActivity($request->all());
            
            return response()->json([
                'content' => $generatedContent,
                'success' => true
            ]);
        } catch (\Exception $e) {
            Log::error('Activity generation failed', [
                'error' => $e->getMessage(),
                'data' => $request->all()
            ]);
            
            return response()->json([
                'error' => 'فشل في توليد النشاط. يرجى المحاولة مرة أخرى.',
                'success' => false
            ], 500);
        }
    }

    public function generateParentMessage(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string',
            'message_type' => 'required|string',
            'subject' => 'nullable|string',
            'details' => 'required|string',
            'parent_name' => 'nullable|string',
            'grade' => 'nullable|string',
            'tone' => 'nullable|string',
        ]);

        try {
            $generatedContent = $this->geminiService->generateParentMessage($request->all());
            
            return response()->json([
                'content' => $generatedContent,
                'success' => true
            ]);
        } catch (\Exception $e) {
            Log::error('Parent message generation failed', [
                'error' => $e->getMessage(),
                'data' => $request->all()
            ]);
            
            return response()->json([
                'error' => 'فشل في توليد رسالة ولي الأمر. يرجى المحاولة مرة أخرى.',
                'success' => false
            ], 500);
        }
    }

    public function generateRubric(Request $request)
    {
        $request->validate([
            'subject' => 'required|string',
            'assignment' => 'required|string',
            'grade' => 'required|string',
            'task_type' => 'nullable|string',
            'levels' => 'nullable|integer|min:3|max:5',
        ]);

        try {
            $generatedContent = $this->geminiService->generateRubric($request->all());
            
            return response()->json([
                'content' => $generatedContent,
                'success' => true
            ]);
        } catch (\Exception $e) {
            Log::error('Rubric generation failed', [
                'error' => $e->getMessage(),
                'data' => $request->all()
            ]);
            
            return response()->json([
                'error' => 'فشل في توليد معايير التقييم. يرجى المحاولة مرة أخرى.',
                'success' => false
            ], 500);
        }
    }

    public function generateStory(Request $request)
    {
        $request->validate([
            'subject' => 'required|string',
            'topic' => 'required|string',
            'grade' => 'required|string',
            'age_group' => 'nullable|string',
            'story_length' => 'nullable|string',
        ]);

        try {
            $generatedContent = $this->geminiService->generateStory($request->all());
            
            return response()->json([
                'content' => $generatedContent,
                'success' => true
            ]);
        } catch (\Exception $e) {
            Log::error('Story generation failed', [
                'error' => $e->getMessage(),
                'data' => $request->all()
            ]);
            
            return response()->json([
                'error' => 'فشل في توليد القصة. يرجى المحاولة مرة أخرى.',
                'success' => false
            ], 500);
        }
    }

    public function generateConceptSimplification(Request $request)
    {
        $request->validate([
            'complexConcept' => 'required|string',
            'subject' => 'required|string',
            'grade' => 'required|string',
            'audienceLevel' => 'required|string',
            'simplificationMethods' => 'nullable|array',
            'additionalContext' => 'nullable|string',
        ]);

        try {
            $generatedContent = $this->geminiService->generateConceptSimplification($request->all());
            
            return response()->json([
                'content' => $generatedContent,
                'success' => true
            ]);
        } catch (\Exception $e) {
            Log::error('Concept simplification failed', [
                'error' => $e->getMessage(),
                'data' => $request->all()
            ]);
            
            return response()->json([
                'error' => 'فشل في تبسيط المفهوم. يرجى المحاولة مرة أخرى.',
                'success' => false
            ], 500);
        }
    }

    public function generateStrategy(Request $request)
    {
        $request->validate([
            'subject' => 'required|string',
            'topic' => 'required|string',
            'strategy_type' => 'nullable|string',
            'grade' => 'required|string',
        ]);

        try {
            $generatedContent = $this->geminiService->generateStrategy($request->all());
            
            return response()->json([
                'content' => $generatedContent,
                'success' => true
            ]);
        } catch (\Exception $e) {
            Log::error('Strategy generation failed', [
                'error' => $e->getMessage(),
                'data' => $request->all()
            ]);
            
            return response()->json([
                'error' => 'فشل في توليد الاستراتيجية التعليمية. يرجى المحاولة مرة أخرى.',
                'success' => false
            ], 500);
        }
    }

    public function generatePerformanceReview(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string',
            'subject' => 'required|string',
            'grade' => 'required|string',
            'strengths' => 'required|string',
            'weaknesses' => 'required|string',
            'recommendations' => 'required|string',
        ]);

        try {
            $generatedContent = $this->geminiService->generatePerformanceReview($request->all());
            
            return response()->json([
                'content' => $generatedContent,
                'success' => true
            ]);
        } catch (\Exception $e) {
            Log::error('Performance review generation failed', [
                'error' => $e->getMessage(),
                'data' => $request->all()
            ]);
            
            return response()->json([
                'error' => 'فشل في توليد تقييم الأداء. يرجى المحاولة مرة أخرى.',
                'success' => false
            ], 500);
        }
    }

    public function generateReportCard(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string',
            'grade' => 'required|string',
            'subjects_grades' => 'required|array',
            'semester' => 'required|string',
        ]);

        try {
            $generatedContent = $this->geminiService->generateReportCard($request->all());
            
            return response()->json([
                'content' => $generatedContent,
                'success' => true
            ]);
        } catch (\Exception $e) {
            Log::error('Report card generation failed', [
                'error' => $e->getMessage(),
                'data' => $request->all()
            ]);
            
            return response()->json([
                'error' => 'فشل في توليد كشف الدرجات. يرجى المحاولة مرة أخرى.',
                'success' => false
            ], 500);
        }
    }

    public function index()
    {
        return Inertia::render('AITools/Index');
    }

    public function show($type)
    {
        return Inertia::render('AITools/Show', ['type' => $type]);
    }

    /**
     * حفظ المحتوى المولد
     */
    public function saveContent(Request $request)
    {
        try {
            $request->validate([
                'type' => 'required|string',
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'metadata' => 'nullable|array',
            ]);

            // البحث عن Teacher المربوط بالمستخدم الحالي
            $user = auth()->user();
            
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'يجب تسجيل الدخول أولاً.'
                ], 401);
            }
            
            $teacher = $user->teacher;
            
            // إذا لم يكن هناك teacher، إنشاء واحد جديد
            if (!$teacher) {
                $teacher = \App\Models\Teacher::create([
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => null,
                    'subject' => null,
                    'bio' => null,
                    'avatar' => null,
                ]);
            }

            $generatedContent = GeneratedContent::create([
                'teacher_id' => $teacher->id,
                'type' => $request->type,
                'title' => $request->title,
                'generated_content' => $request->content,
                'input_data' => $request->metadata ?? [],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'تم حفظ المحتوى بنجاح!',
                'id' => $generatedContent->id
            ]);

        } catch (\Exception $e) {
            Log::error('Content saving failed', [
                'error' => $e->getMessage(),
                'data' => $request->all()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'فشل في حفظ المحتوى. يرجى المحاولة مرة أخرى.'
            ], 500);
        }
    }
}
