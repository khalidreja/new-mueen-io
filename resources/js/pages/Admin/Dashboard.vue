<template>
    <AdminDashboardLayout>
        <template #header>
            الصفحة الرئيسية - إحصائيات الموقع
        </template>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <span class="text-3xl">👥</span>
                        </div>
                        <div class="mr-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    إجمالي المستخدمين
                                </dt>
                                <dd class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ stats.totalUsers }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700 px-5 py-3">
                    <div class="text-sm">
                        <span class="font-medium text-green-600 dark:text-green-400">+{{ stats.newUsersThisMonth }}</span>
                        <span class="text-gray-500 dark:text-gray-400"> هذا الشهر</span>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <span class="text-3xl">🎓</span>
                        </div>
                        <div class="mr-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    المعلمين النشطين
                                </dt>
                                <dd class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ stats.activeTeachers }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700 px-5 py-3">
                    <div class="text-sm">
                        <span class="font-medium text-blue-600 dark:text-blue-400">{{ stats.teacherGrowthRate }}%</span>
                        <span class="text-gray-500 dark:text-gray-400"> نمو</span>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <span class="text-3xl">📚</span>
                        </div>
                        <div class="mr-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    المحتوى المولد
                                </dt>
                                <dd class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ stats.generatedContent }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700 px-5 py-3">
                    <div class="text-sm">
                        <span class="font-medium text-purple-600 dark:text-purple-400">+{{ stats.contentThisWeek }}</span>
                        <span class="text-gray-500 dark:text-gray-400"> هذا الأسبوع</span>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <span class="text-3xl">💰</span>
                        </div>
                        <div class="mr-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    العضويات المدفوعة
                                </dt>
                                <dd class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ stats.paidMemberships }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700 px-5 py-3">
                    <div class="text-sm">
                        <span class="font-medium text-green-600 dark:text-green-400">${{ stats.monthlyRevenue }}</span>
                        <span class="text-gray-500 dark:text-gray-400"> هذا الشهر</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- User Growth Chart -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">نمو المستخدمين</h3>
                    <select class="text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                        <option>آخر 7 أيام</option>
                        <option>آخر 30 يوم</option>
                        <option>آخر 3 أشهر</option>
                    </select>
                </div>
                <div class="h-64 flex items-center justify-center bg-gray-50 dark:bg-gray-700 rounded">
                    <p class="text-gray-500 dark:text-gray-400">رسم بياني لنمو المستخدمين</p>
                </div>
            </div>

            <!-- Content Usage Chart -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">استخدام الأدوات</h3>
                    <button class="text-sm text-blue-600 dark:text-blue-400 hover:underline">عرض التفاصيل</button>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">مولد الاختبارات</span>
                        <div class="flex items-center">
                            <div class="w-32 bg-gray-200 dark:bg-gray-600 rounded-full h-2 mr-2">
                                <div class="bg-blue-600 h-2 rounded-full" style="width: 85%"></div>
                            </div>
                            <span class="text-sm text-gray-900 dark:text-gray-100">85%</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">خطط الدروس</span>
                        <div class="flex items-center">
                            <div class="w-32 bg-gray-200 dark:bg-gray-600 rounded-full h-2 mr-2">
                                <div class="bg-green-600 h-2 rounded-full" style="width: 72%"></div>
                            </div>
                            <span class="text-sm text-gray-900 dark:text-gray-100">72%</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">مولد الملاحظات</span>
                        <div class="flex items-center">
                            <div class="w-32 bg-gray-200 dark:bg-gray-600 rounded-full h-2 mr-2">
                                <div class="bg-purple-600 h-2 rounded-full" style="width: 68%"></div>
                            </div>
                            <span class="text-sm text-gray-900 dark:text-gray-100">68%</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">عجلة الاختيار</span>
                        <div class="flex items-center">
                            <div class="w-32 bg-gray-200 dark:bg-gray-600 rounded-full h-2 mr-2">
                                <div class="bg-yellow-600 h-2 rounded-full" style="width: 45%"></div>
                            </div>
                            <span class="text-sm text-gray-900 dark:text-gray-100">45%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Users -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">المستخدمون الجدد</h3>
                    <div class="space-y-3">
                        <div v-for="user in recentUsers" :key="user.id" class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                    <span class="text-white text-sm font-medium">{{ user.name.charAt(0) }}</span>
                                </div>
                                <div class="mr-3">
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ user.name }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ user.email }}</p>
                                </div>
                            </div>
                            <span class="text-xs text-gray-500 dark:text-gray-400">{{ user.joinedAt }}</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <Link href="/admin/users" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">
                            عرض جميع المستخدمين →
                        </Link>
                    </div>
                </div>
            </div>

            <!-- System Health -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">حالة النظام</h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600 dark:text-gray-400">حالة الخادم</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                                متصل
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600 dark:text-gray-400">قاعدة البيانات</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                                متصلة
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600 dark:text-gray-400">مساحة التخزين</span>
                            <span class="text-sm text-gray-900 dark:text-gray-100">75% مستخدمة</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600 dark:text-gray-400">آخر نسخة احتياطية</span>
                            <span class="text-sm text-gray-900 dark:text-gray-100">منذ ساعتين</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <Link href="/admin/settings" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">
                            إعدادات النظام →
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </AdminDashboardLayout>
</template>

<script setup>
import AdminDashboardLayout from '@/layouts/AdminDashboardLayout.vue'
import { Link } from '@inertiajs/vue3'

// Props from controller - البيانات الحقيقية فقط
defineProps({
    stats: {
        type: Object,
        required: true
    },
    recentUsers: {
        type: Array,
        required: true
    }
})
</script>