<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\LessonPlan;
use Illuminate\Support\Facades\Redirect;

class LessonPlanController extends Controller
{
    public function index(Request $request)
    {
        $teacher = auth()->user()->teacher;
        
        $query = $teacher->lessonPlans()->latest();
        
        // فلترة حسب المادة
        if ($request->subject) {
            $query->where('subject', $request->subject);
        }
        
        // فلترة حسب الصف
        if ($request->grade) {
            $query->where('grade', $request->grade);
        }
        
        // فلترة حسب الفصل
        if ($request->class_name) {
            $query->where('class_name', $request->class_name);
        }
        
        // فلترة حسب الحالة
        if ($request->status) {
            $query->where('status', $request->status);
        }
        
        $lessonPlans = $query->paginate(12);
        
        // الحصول على بيانات الفصول لاستخدامها في الفلترة
        $teacherClasses = $teacher->classes_data ?? [];

        return Inertia::render('LessonPlans/Index', [
            'lessonPlans' => $lessonPlans,
            'teacherClasses' => $teacherClasses,
            'filters' => $request->only(['subject', 'grade', 'class_name', 'status']),
        ]);
    }

    public function create()
    {
        return Inertia::render('LessonPlans/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'grade' => 'required|string|max:255',
            'class_name' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'content' => 'required|string',
            'objectives' => 'nullable|array',
            'activities' => 'nullable|array',
            'resources' => 'nullable|array',
            'assessment' => 'nullable|string',
            'notes' => 'nullable|string',
            'lesson_date' => 'nullable|date',
            'status' => 'nullable|in:draft,active,completed,archived',
        ]);

        $teacher = auth()->user()->teacher;
        
        $lessonPlan = $teacher->lessonPlans()->create([
            'title' => $request->title,
            'subject' => $request->subject,
            'grade' => $request->grade,
            'class_name' => $request->class_name,
            'duration' => $request->duration,
            'content' => $request->content,
            'objectives' => $request->objectives ?? [],
            'activities' => $request->activities ?? [],
            'resources' => $request->resources ?? [],
            'assessment' => $request->assessment,
            'notes' => $request->notes,
            'lesson_date' => $request->lesson_date,
            'status' => $request->status ?? 'draft',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'تم حفظ خطة الدرس بنجاح',
            'lesson_plan' => $lessonPlan
        ]);
    }

    public function show(LessonPlan $lessonPlan)
    {
        $this->authorize('view', $lessonPlan);
        
        return Inertia::render('LessonPlans/Show', [
            'lessonPlan' => $lessonPlan,
        ]);
    }

    public function edit(LessonPlan $lessonPlan)
    {
        $this->authorize('update', $lessonPlan);
        
        return Inertia::render('LessonPlans/Edit', [
            'lessonPlan' => $lessonPlan,
        ]);
    }

    public function update(Request $request, LessonPlan $lessonPlan)
    {
        $this->authorize('update', $lessonPlan);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'grade' => 'required|string|max:255',
            'class_name' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'content' => 'required|string',
            'objectives' => 'nullable|array',
            'activities' => 'nullable|array',
            'resources' => 'nullable|array',
            'assessment' => 'nullable|string',
            'notes' => 'nullable|string',
            'lesson_date' => 'nullable|date',
            'status' => 'nullable|in:draft,active,completed,archived',
        ]);

        $lessonPlan->update($request->only([
            'title', 'subject', 'grade', 'class_name', 'duration',
            'content', 'objectives', 'activities', 'resources',
            'assessment', 'notes', 'lesson_date', 'status'
        ]));

        return response()->json([
            'success' => true,
            'message' => 'تم تحديث خطة الدرس بنجاح',
            'lesson_plan' => $lessonPlan
        ]);
    }

    public function destroy(LessonPlan $lessonPlan)
    {
        $this->authorize('delete', $lessonPlan);
        
        $lessonPlan->delete();

        return Redirect::route('lesson-plans.index')
            ->with('success', 'تم حذف خطة الدرس بنجاح');
    }

    public function updateStatus(Request $request, LessonPlan $lessonPlan)
    {
        $this->authorize('update', $lessonPlan);
        
        $request->validate([
            'status' => 'required|in:draft,active,completed,archived'
        ]);
        
        $lessonPlan->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'تم تحديث حالة خطة الدرس'
        ]);
    }
    
    public function duplicate(LessonPlan $lessonPlan)
    {
        $this->authorize('view', $lessonPlan);
        
        $newLessonPlan = $lessonPlan->teacher->lessonPlans()->create([
            'title' => $lessonPlan->title . ' (نسخة)',
            'subject' => $lessonPlan->subject,
            'grade' => $lessonPlan->grade,
            'class_name' => $lessonPlan->class_name,
            'duration' => $lessonPlan->duration,
            'content' => $lessonPlan->content,
            'objectives' => $lessonPlan->objectives,
            'activities' => $lessonPlan->activities,
            'resources' => $lessonPlan->resources,
            'assessment' => $lessonPlan->assessment,
            'notes' => $lessonPlan->notes,
            'status' => 'draft',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'تم نسخ خطة الدرس بنجاح',
            'lesson_plan' => $newLessonPlan
        ]);
    }
}
