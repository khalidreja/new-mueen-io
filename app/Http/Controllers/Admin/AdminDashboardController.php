<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\GeneratedContent;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'totalUsers' => User::count(),
            'newUsersThisMonth' => User::whereMonth('created_at', now()->month)->count(),
            'activeTeachers' => Teacher::whereHas('user', function ($query) {
                $query->where('is_active', true);
            })->count(),
            'teacherGrowthRate' => $this->calculateTeacherGrowthRate(),
            'generatedContent' => GeneratedContent::count(),
            'contentThisWeek' => GeneratedContent::where('created_at', '>=', now()->subWeek())->count(),
            'paidMemberships' => User::where('subscription_type', '!=', 'free')->count(),
            'monthlyRevenue' => $this->calculateMonthlyRevenue(),
        ];

        $recentUsers = User::latest()
            ->take(5)
            ->get()
            ->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'joinedAt' => $user->created_at->diffForHumans(),
                ];
            });

        return Inertia::render('Admin/Dashboard', [
            'stats' => $stats,
            'recentUsers' => $recentUsers,
        ]);
    }

    public function users(Request $request)
    {
        $query = User::with('teacher');

        // Apply filters
        if ($request->has('search') && $request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->has('role') && $request->role) {
            $query->where('role', $request->role);
        }

        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        $users = $query->paginate(10);

        return Inertia::render('Admin/Users', [
            'users' => $users,
            'filters' => $request->only(['search', 'role', 'status']),
        ]);
    }

    public function memberships()
    {
        $memberships = User::select('subscription_type', DB::raw('count(*) as count'))
            ->groupBy('subscription_type')
            ->get();

        $recentSubscriptions = User::where('subscription_type', '!=', 'free')
            ->latest('subscription_updated_at')
            ->take(10)
            ->get();

        return Inertia::render('Admin/Memberships', [
            'memberships' => $memberships,
            'recentSubscriptions' => $recentSubscriptions,
        ]);
    }

    public function teachers()
    {
        $teachers = Teacher::with('user')
            ->paginate(10);

        return Inertia::render('Admin/Teachers', [
            'teachers' => $teachers,
        ]);
    }

    public function content(Request $request)
    {
        $query = GeneratedContent::with('user');

        // Apply filters
        if ($request->has('search') && $request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->has('type') && $request->type) {
            $query->where('type', $request->type);
        }

        if ($request->has('user_id') && $request->user_id) {
            $query->where('user_id', $request->user_id);
        }

        $content = $query->latest()->paginate(10);

        $contentStats = [
            'total' => GeneratedContent::count(),
            'quizzes' => GeneratedContent::where('type', 'quiz')->count(),
            'lessonPlans' => GeneratedContent::where('type', 'lesson_plan')->count(),
            'reports' => GeneratedContent::where('type', 'report')->count(),
        ];

        $users = User::select('id', 'name')->get();

        return Inertia::render('Admin/Content', [
            'content' => $content,
            'contentStats' => $contentStats,
            'users' => $users,
            'filters' => $request->only(['search', 'type', 'user_id']),
        ]);
    }

    public function lessonPlans()
    {
        // Implementation for lesson plans management
        return Inertia::render('Admin/LessonPlans');
    }

    public function reports()
    {
        // Implementation for reports management
        return Inertia::render('Admin/Reports');
    }

    public function settings()
    {
        $settings = [
            'site_name' => config('app.name'),
            'site_description' => 'منصة مُعين التعليمية',
            'max_free_generations' => 10,
            'maintenance_mode' => false,
            'registration_enabled' => true,
        ];

        return Inertia::render('Admin/Settings', [
            'settings' => $settings,
        ]);
    }

    public function logs()
    {
        // Implementation for activity logs
        return Inertia::render('Admin/Logs');
    }

    public function backups()
    {
        // Implementation for backup management
        return Inertia::render('Admin/Backups');
    }

    private function calculateTeacherGrowthRate()
    {
        $currentMonth = Teacher::whereMonth('created_at', now()->month)->count();
        $lastMonth = Teacher::whereMonth('created_at', now()->subMonth()->month)->count();
        
        if ($lastMonth == 0) return 100;
        
        return round((($currentMonth - $lastMonth) / $lastMonth) * 100);
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|in:admin,teacher,user',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users')->with('success', 'تم إنشاء المستخدم بنجاح');
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,teacher,user',
        ]);

        $user->update($request->only(['name', 'email', 'role']));

        if ($request->password) {
            $user->update(['password' => bcrypt($request->password)]);
        }

        return redirect()->route('admin.users')->with('success', 'تم تحديث المستخدم بنجاح');
    }

    public function destroyUser(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users')->with('error', 'لا يمكنك حذف حسابك الخاص');
        }

        $user->delete();
        return redirect()->route('admin.users')->with('success', 'تم حذف المستخدم بنجاح');
    }

    public function toggleUserStatus(User $user)
    {
        $user->update([
            'status' => $user->status === 'active' ? 'suspended' : 'active'
        ]);

        return redirect()->route('admin.users')->with('success', 'تم تحديث حالة المستخدم بنجاح');
    }

    private function calculateMonthlyRevenue()
    {
        // Calculate based on paid subscriptions
        $paidUsers = User::where('subscription_type', '!=', 'free')
                        ->whereMonth('subscription_updated_at', now()->month)
                        ->count();
        
        // Simple calculation: premium = $10, pro = $20 per month
        $premiumUsers = User::where('subscription_type', 'premium')->count();
        $proUsers = User::where('subscription_type', 'pro')->count();
        
        return ($premiumUsers * 10) + ($proUsers * 20);
    }
}