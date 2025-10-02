<template>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Admin Sidebar -->
        <div class="fixed inset-y-0 right-0 z-50 w-64 bg-white dark:bg-gray-800 shadow-lg transform transition-transform duration-300 ease-in-out" 
             :class="sidebarOpen ? 'translate-x-0' : 'translate-x-full md:translate-x-0'">
            
            <!-- Logo -->
            <div class="flex items-center justify-center h-16 px-4 bg-gradient-to-r from-blue-600 to-purple-600">
                <h1 class="text-xl font-bold text-white">لوحة الإدارة</h1>
            </div>

            <!-- Navigation -->
            <nav class="mt-5 px-2">
                <div class="space-y-1">
                    <!-- Dashboard -->
                    <Link href="/admin/dashboard" 
                          :class="[
                              'group flex items-center px-2 py-2 text-base font-medium rounded-md transition-colors',
                              $page.url.startsWith('/admin/dashboard') 
                                  ? 'bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300' 
                                  : 'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700'
                          ]">
                        <span class="ml-3 text-lg">📊</span>
                        الصفحة الرئيسية
                    </Link>

                    <!-- Users Management -->
                    <div class="mt-8">
                        <h3 class="px-3 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            إدارة المستخدمين
                        </h3>
                        <div class="mt-2 space-y-1">
                            <Link href="/admin/users" 
                                  :class="[
                                      'group flex items-center px-2 py-2 text-sm font-medium rounded-md transition-colors',
                                      $page.url.startsWith('/admin/users') 
                                          ? 'bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300' 
                                          : 'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700'
                                  ]">
                                <span class="ml-3 text-lg">👥</span>
                                المستخدمين
                            </Link>
                            <Link href="/admin/memberships" 
                                  :class="[
                                      'group flex items-center px-2 py-2 text-sm font-medium rounded-md transition-colors',
                                      $page.url.startsWith('/admin/memberships') 
                                          ? 'bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300' 
                                          : 'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700'
                                  ]">
                                <span class="ml-3 text-lg">🎫</span>
                                العضويات
                            </Link>
                            <Link href="/admin/teachers" 
                                  :class="[
                                      'group flex items-center px-2 py-2 text-sm font-medium rounded-md transition-colors',
                                      $page.url.startsWith('/admin/teachers') 
                                          ? 'bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300' 
                                          : 'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700'
                                  ]">
                                <span class="ml-3 text-lg">🎓</span>
                                المعلمين
                            </Link>
                        </div>
                    </div>

                    <!-- Content Management -->
                    <div class="mt-8">
                        <h3 class="px-3 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            إدارة المحتوى
                        </h3>
                        <div class="mt-2 space-y-1">
                            <Link href="/admin/content" 
                                  :class="[
                                      'group flex items-center px-2 py-2 text-sm font-medium rounded-md transition-colors',
                                      $page.url.startsWith('/admin/content') 
                                          ? 'bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300' 
                                          : 'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700'
                                  ]">
                                <span class="ml-3 text-lg">📝</span>
                                المحتوى المولد
                            </Link>
                            <Link href="/admin/lesson-plans" 
                                  :class="[
                                      'group flex items-center px-2 py-2 text-sm font-medium rounded-md transition-colors',
                                      $page.url.startsWith('/admin/lesson-plans') 
                                          ? 'bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300' 
                                          : 'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700'
                                  ]">
                                <span class="ml-3 text-lg">📚</span>
                                خطط الدروس
                            </Link>
                            <Link href="/admin/reports" 
                                  :class="[
                                      'group flex items-center px-2 py-2 text-sm font-medium rounded-md transition-colors',
                                      $page.url.startsWith('/admin/reports') 
                                          ? 'bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300' 
                                          : 'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700'
                                  ]">
                                <span class="ml-3 text-lg">📊</span>
                                التقارير
                            </Link>
                        </div>
                    </div>

                    <!-- System Settings -->
                    <div class="mt-8">
                        <h3 class="px-3 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            إعدادات النظام
                        </h3>
                        <div class="mt-2 space-y-1">
                            <Link href="/admin/settings" 
                                  :class="[
                                      'group flex items-center px-2 py-2 text-sm font-medium rounded-md transition-colors',
                                      $page.url.startsWith('/admin/settings') 
                                          ? 'bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300' 
                                          : 'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700'
                                  ]">
                                <span class="ml-3 text-lg">⚙️</span>
                                الإعدادات العامة
                            </Link>
                            <Link href="/admin/logs" 
                                  :class="[
                                      'group flex items-center px-2 py-2 text-sm font-medium rounded-md transition-colors',
                                      $page.url.startsWith('/admin/logs') 
                                          ? 'bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300' 
                                          : 'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700'
                                  ]">
                                <span class="ml-3 text-lg">📋</span>
                                سجل الأنشطة
                            </Link>
                            <Link href="/admin/backups" 
                                  :class="[
                                      'group flex items-center px-2 py-2 text-sm font-medium rounded-md transition-colors',
                                      $page.url.startsWith('/admin/backups') 
                                          ? 'bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300' 
                                          : 'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700'
                                  ]">
                                <span class="ml-3 text-lg">💾</span>
                                النسخ الاحتياطية
                            </Link>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- User Info -->
            <div class="absolute bottom-0 w-full p-4 border-t border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                            <span class="text-white text-sm font-medium">{{ $page.props.auth.user?.name?.charAt(0) || 'A' }}</span>
                        </div>
                    </div>
                    <div class="mr-3">
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $page.props.auth.user?.name || 'مدير النظام' }}</p>
                        <Link href="/logout" method="post" class="text-xs text-red-600 dark:text-red-400 hover:underline">
                            تسجيل خروج
                        </Link>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="md:mr-64">
            <!-- Top Header -->
            <div class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex items-center">
                            <!-- Mobile menu button -->
                            <button @click="sidebarOpen = !sidebarOpen"
                                    class="md:hidden p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none">
                                <span class="sr-only">فتح القائمة</span>
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                            
                            <h1 class="mr-4 text-xl font-semibold text-gray-900 dark:text-gray-100">
                                <slot name="header">لوحة إدارة منصة مُعين</slot>
                            </h1>
                        </div>

                        <div class="flex items-center space-x-4 space-x-reverse">
                            <!-- Theme Toggle -->
                            <button @click="toggleTheme" 
                                    class="p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <span v-if="isDark" class="text-lg">☀️</span>
                                <span v-else class="text-lg">🌙</span>
                            </button>

                            <!-- Notifications -->
                            <button class="p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700 relative">
                                <span class="text-lg">🔔</span>
                                <span class="absolute top-0 right-0 block h-2 w-2 rounded-full ring-2 ring-white bg-red-400"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <main class="flex-1 relative overflow-y-auto focus:outline-none">
                <div class="py-6">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <slot />
                    </div>
                </div>
            </main>
        </div>

        <!-- Mobile overlay -->
        <div v-if="sidebarOpen" @click="sidebarOpen = false" 
             class="fixed inset-0 z-40 bg-gray-600 bg-opacity-75 md:hidden"></div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { Link } from '@inertiajs/vue3'

// Sidebar state
const sidebarOpen = ref(false)

// Theme management
const isDark = ref(false)

const toggleTheme = () => {
    isDark.value = !isDark.value
    if (isDark.value) {
        document.documentElement.classList.add('dark')
        localStorage.setItem('theme', 'dark')
    } else {
        document.documentElement.classList.remove('dark')
        localStorage.setItem('theme', 'light')
    }
}

// Initialize theme
onMounted(() => {
    const savedTheme = localStorage.getItem('theme')
    const systemTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
    const theme = savedTheme || systemTheme
    
    isDark.value = theme === 'dark'
    if (isDark.value) {
        document.documentElement.classList.add('dark')
    }
})
</script>