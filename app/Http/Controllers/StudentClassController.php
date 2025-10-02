<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\StudentClass;
use App\Models\Student;
use Illuminate\Support\Facades\Redirect;

class StudentClassController extends Controller
{
    public function index(Request $request)
    {
        $teacher = auth()->user()->teacher;
        $classes = $teacher->classes()->with('students')->latest()->get();

        // إذا كان الطلب JSON، أرجع JSON response
        if ($request->expectsJson()) {
            return response()->json([
                'classes' => $classes
            ]);
        }

        return Inertia::render('Classes/Index', [
            'classes' => $classes,
        ]);
    }

    public function create()
    {
        return Inertia::render('Classes/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'grade_level' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $teacher = auth()->user()->teacher;
        
        $class = $teacher->classes()->create([
            'name' => $request->name,
            'subject' => $request->subject,
            'grade_level' => $request->grade_level,
            'description' => $request->description,
        ]);

        return Redirect::route('classes.show', $class)
            ->with('success', 'تم إنشاء الفصل بنجاح');
    }

    public function show(Request $request, StudentClass $class)
    {
        $this->authorize('view', $class);
        
        $class->load('students', 'teacher.user');

        // إذا كان الطلب JSON، أرجع JSON response
        if ($request->expectsJson()) {
            return response()->json([
                'class' => $class
            ]);
        }

        return Inertia::render('Classes/Show', [
            'class' => $class,
        ]);
    }

    public function edit(StudentClass $class)
    {
        $this->authorize('update', $class);
        
        return Inertia::render('Classes/Edit', [
            'class' => $class,
        ]);
    }

    public function update(Request $request, StudentClass $class)
    {
        $this->authorize('update', $class);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'grade_level' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $class->update($request->only([
            'name', 'subject', 'grade_level', 'description'
        ]));

        return Redirect::route('classes.show', $class)
            ->with('success', 'تم تحديث الفصل بنجاح');
    }

    public function destroy(StudentClass $class)
    {
        $this->authorize('delete', $class);
        
        $class->delete();

        return Redirect::route('classes.index')
            ->with('success', 'تم حذف الفصل بنجاح');
    }

    public function addStudents(Request $request, StudentClass $class)
    {
        $this->authorize('update', $class);
        
        $request->validate([
            'students' => 'required|array',
            'students.*' => 'required|string|max:255',
        ]);

        foreach ($request->students as $studentName) {
            $class->students()->create([
                'name' => trim($studentName),
            ]);
        }

        return back()->with('success', 'تم إضافة الطلاب بنجاح');
    }

    public function removeStudent(StudentClass $class, Student $student)
    {
        $this->authorize('update', $class);
        
        if ($student->class_id !== $class->id) {
            abort(404);
        }

        $student->delete();

        return back()->with('success', 'تم حذف الطالب بنجاح');
    }
}
