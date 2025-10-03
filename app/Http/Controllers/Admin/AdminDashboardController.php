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
        $systemInfoService = new \App\Services\SystemInfoService();
        $systemInfo = $systemInfoService->getSystemInfo();
        
        // Get current settings from database
        $currentSettings = [
            'site_name' => \App\Models\Setting::get('site_name', 'منصة مُعين التعليمية'),
            'site_description' => \App\Models\Setting::get('site_description', 'منصة تعليمية ذكية لإنشاء المحتوى التعليمي'),
            'max_free_generations' => \App\Models\Setting::get('max_free_generations', 10),
            'registration_enabled' => \App\Models\Setting::get('registration_enabled', true),
            'email_verification_required' => \App\Models\Setting::get('email_verification_required', false),
            'maintenance_mode' => \App\Models\Setting::get('maintenance_mode', false),
        ];

        $aiSettings = [
            'provider' => \App\Models\Setting::get('ai_provider', 'gemini'),
            'model' => \App\Models\Setting::get('ai_model', 'gemini-pro'),
            'api_key' => \App\Models\Setting::get('ai_api_key', ''),
            'rate_limit' => \App\Models\Setting::get('ai_rate_limit', 100),
        ];

        $securitySettings = [
            'min_password_length' => \App\Models\Setting::get('min_password_length', 8),
            'session_timeout' => \App\Models\Setting::get('session_timeout', 120),
            'require_password_complexity' => \App\Models\Setting::get('require_password_complexity', true),
            'enable_two_factor' => \App\Models\Setting::get('enable_two_factor', false),
            'log_user_activities' => \App\Models\Setting::get('log_user_activities', true),
        ];

        return Inertia::render('Admin/Settings', [
            'systemInfo' => $systemInfo,
            'currentSettings' => $currentSettings,
            'aiSettings' => $aiSettings,
            'securitySettings' => $securitySettings,
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
            'membership' => 'sometimes|in:free,premium,pro',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'subscription_type' => $request->membership ?? 'free',
            'status' => 'active',
        ]);

        return redirect()->route('admin.users')->with('success', 'تم إنشاء المستخدم بنجاح');
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,teacher,user',
            'membership' => 'sometimes|in:free,premium,pro',
        ]);

        $updateData = $request->only(['name', 'email', 'role']);
        
        if ($request->has('membership')) {
            $updateData['subscription_type'] = $request->membership;
        }

        $user->update($updateData);

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

    public function updateSettings(Request $request)
    {
        $request->validate([
            'type' => 'required|in:general,ai,security',
        ]);

        switch ($request->type) {
            case 'general':
                $this->updateGeneralSettings($request);
                break;
            case 'ai':
                $this->updateAISettings($request);
                break;
            case 'security':
                $this->updateSecuritySettings($request);
                break;
        }

        return redirect()->route('admin.settings')->with('success', 'تم حفظ الإعدادات بنجاح');
    }

    private function updateGeneralSettings(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'required|string|max:500',
            'max_free_generations' => 'required|integer|min:1|max:100',
            'registration_enabled' => 'boolean',
            'email_verification_required' => 'boolean',
            'maintenance_mode' => 'boolean',
        ]);

        \App\Models\Setting::set('site_name', $request->site_name, 'string', 'اسم الموقع');
        \App\Models\Setting::set('site_description', $request->site_description, 'string', 'وصف الموقع');
        \App\Models\Setting::set('max_free_generations', $request->max_free_generations, 'integer', 'الحد الأقصى للمحتوى المجاني');
        \App\Models\Setting::set('registration_enabled', $request->boolean('registration_enabled'), 'boolean', 'السماح بالتسجيل الجديد');
        \App\Models\Setting::set('email_verification_required', $request->boolean('email_verification_required'), 'boolean', 'يتطلب تأكيد البريد الإلكتروني');
        \App\Models\Setting::set('maintenance_mode', $request->boolean('maintenance_mode'), 'boolean', 'وضع الصيانة');

        // Handle maintenance mode
        if ($request->boolean('maintenance_mode')) {
            \Artisan::call('down');
        } else {
            \Artisan::call('up');
        }
    }

    private function updateAISettings(Request $request)
    {
        $request->validate([
            'provider' => 'required|in:gemini,openai,claude',
            'model' => 'required|string',
            'api_key' => 'required|string',
            'rate_limit' => 'required|integer|min:1|max:1000',
        ]);

        \App\Models\Setting::set('ai_provider', $request->provider, 'string', 'مزود الذكاء الاصطناعي');
        \App\Models\Setting::set('ai_model', $request->model, 'string', 'النموذج المستخدم');
        \App\Models\Setting::set('ai_api_key', $request->api_key, 'string', 'مفتاح API');
        \App\Models\Setting::set('ai_rate_limit', $request->rate_limit, 'integer', 'الحد الأقصى للطلبات/ساعة');
    }

    private function updateSecuritySettings(Request $request)
    {
        $request->validate([
            'min_password_length' => 'required|integer|min:6|max:50',
            'session_timeout' => 'required|integer|min:15|max:1440',
            'require_password_complexity' => 'boolean',
            'enable_two_factor' => 'boolean',
            'log_user_activities' => 'boolean',
        ]);

        \App\Models\Setting::set('min_password_length', $request->min_password_length, 'integer', 'طول كلمة المرور الأدنى');
        \App\Models\Setting::set('session_timeout', $request->session_timeout, 'integer', 'مدة انقضاء الجلسة (دقيقة)');
        \App\Models\Setting::set('require_password_complexity', $request->boolean('require_password_complexity'), 'boolean', 'يتطلب كلمة مرور معقدة');
        \App\Models\Setting::set('enable_two_factor', $request->boolean('enable_two_factor'), 'boolean', 'تفعيل المصادقة الثنائية');
        \App\Models\Setting::set('log_user_activities', $request->boolean('log_user_activities'), 'boolean', 'تسجيل أنشطة المستخدمين');
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