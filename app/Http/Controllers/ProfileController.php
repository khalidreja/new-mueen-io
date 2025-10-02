<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        try {
            $user = auth()->user();
            $teacher = $user->teacher ?: $user->teacher()->create([]);
            
            // تحضير بيانات المستخدم مع معلومات إضافية من teacher
            $userData = $user->toArray();
            $userData['phone'] = $teacher->phone;
            $userData['city'] = $teacher->city;
            $userData['school'] = $teacher->school;
            $userData['subject'] = $teacher->subject;
            $userData['stage'] = $teacher->stage;
            $userData['years_experience'] = $teacher->years_experience;
            $userData['qualification'] = $teacher->qualification;
            $userData['specialization'] = $teacher->specialization;
            
            // التأكد من صحة بيانات الفصول
            $classesData = $teacher->classes_data;
            if (!is_array($classesData)) {
                $classesData = [];
            }
            
            return Inertia::render('Profile/Edit', [
                'user' => $userData,
                'teacher' => $teacher->toArray(),
                'teacherClasses' => $classesData,
            ]);
            
        } catch (\Exception $e) {
            \Log::error('Profile edit page failed: ' . $e->getMessage());
            
            return Inertia::render('Profile/Edit', [
                'user' => auth()->user()->toArray(),
                'teacher' => [],
                'teacherClasses' => [],
                'error' => 'حدث خطأ في تحميل البيانات'
            ]);
        }
    }

    public function update(Request $request)
    {
        try {
            $user = auth()->user();
            $teacher = $user->teacher ?: $user->teacher()->create([]);

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'nullable|string|max:20',
                'city' => 'nullable|string|max:100',
                'school' => 'nullable|string|max:255',
                'subject' => 'nullable|string|max:500',
                'stage' => 'nullable|string|max:100',
                'years_experience' => 'nullable|string|max:100',
                'qualification' => 'nullable|string|max:100',
                'specialization' => 'nullable|string|max:255',
                'classes' => 'nullable|array',
                'classes.*.id' => 'nullable',
                'classes.*.stage' => 'nullable|string|max:100',
                'classes.*.grade' => 'nullable|string|max:100',
                'classes.*.className' => 'nullable|string|max:100',
                'classes.*.subjects' => 'nullable|array',
                'classes.*.students' => 'nullable|array',
            ]);

            // تحديث بيانات المستخدم
            $user->update([
                'name' => $validated['name'],
            ]);

            // تحديث بيانات المعلم
            $teacher->update([
                'phone' => $validated['phone'],
                'city' => $validated['city'],
                'school' => $validated['school'],
                'subject' => $validated['subject'],
                'stage' => $validated['stage'],
                'years_experience' => $validated['years_experience'],
                'qualification' => $validated['qualification'],
                'specialization' => $validated['specialization'],
                'classes_data' => $validated['classes'] ?: [],
            ]);

            // تسجيل نجاح العملية
            \Log::info('Profile updated successfully for user: ' . $user->id);

            // إعادة تحميل البيانات بعد التحديث
            $user->refresh();
            $teacher->refresh();

            return back()->with('success', 'تم تحديث الملف الشخصي بنجاح');

        } catch (\Exception $e) {
            // تسجيل الخطأ
            \Log::error('Profile update failed: ' . $e->getMessage());
            
            return back()->withErrors(['error' => 'حدث خطأ أثناء تحديث الملف الشخصي: ' . $e->getMessage()]);
        }
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = auth()->user();
        $teacher = $user->teacher ?: $user->teacher()->create([]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($teacher->profile_image) {
                Storage::disk('public')->delete($teacher->profile_image);
            }

            // Store new image
            $imagePath = $request->file('image')->store('profile-images', 'public');
            
            $teacher->update([
                'profile_image' => $imagePath,
            ]);

            return response()->json([
                'success' => true,
                'image_url' => Storage::url($imagePath),
                'message' => 'تم تحديث الصورة الشخصية بنجاح'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'فشل في رفع الصورة'
        ], 400);
    }

    public function getTeacherClasses()
    {
        $user = auth()->user();
        $teacher = $user->teacher;
        
        if (!$teacher) {
            return response()->json([
                'classes' => []
            ]);
        }
        
        // إذا كانت البيانات مخزنة في classes_data (النظام الجديد)
        if ($teacher->classes_data) {
            $classesData = is_array($teacher->classes_data) ? $teacher->classes_data : [];
            $formattedClasses = [];
            
            foreach ($classesData as $classData) {
                if (isset($classData['stage']) && isset($classData['grade']) && isset($classData['className'])) {
                    $formattedClasses[] = [
                        'id' => $classData['id'] ?? uniqid(),
                        'name' => $classData['className'],
                        'stage' => $classData['stage'],
                        'grade' => $classData['grade'],
                        'subjects' => $classData['subjects'] ?? [],
                        'students' => array_map(function($student) {
                            return [
                                'id' => $student['id'] ?? uniqid(),
                                'name' => $student['name'] ?? '',
                                'number' => $student['number'] ?? 1,
                                'is_active' => true
                            ];
                        }, $classData['students'] ?? [])
                    ];
                }
            }
            
            return response()->json([
                'classes' => $formattedClasses
            ]);
        }
        
        // إذا لم توجد بيانات فصول
        return response()->json([
            'classes' => []
        ]);
    }
}
