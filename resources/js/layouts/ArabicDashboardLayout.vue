<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

interface Teacher {
    id: number;
    profile_image?: string;
}

interface User {
    id: number;
    name: string;
    email: string;
    teacher?: Teacher;
}

declare global {
    interface Window {
        _page: {
            props: {
                auth: {
                    user: User;
                };
            };
        };
    }
}

const sidebarOpen = ref(true);

const menuItems = [
    {
        title: 'لوحة التحكم',
        icon: '🏠',
        url: '/dashboard'
    },
    {
        title: 'ملف الإنجاز المهني',
        icon: '⭐',
        url: '/performance-review'
    },
    {
        title: 'رسائل أولياء الأمور',
        icon: '💬',
        url: '/parent-communication'
    },
    {
        title: 'مولد خطط الدروس',
        icon: '📝',
        url: '/objectives-generator'
    },
    {
        title: 'إدارة خطط الدروس',
        icon: '📚',
        url: '/lesson-plans'
    },
    {
        title: 'مولد الأهداف التعليمية',
        icon: '🎯',
        url: '/objectives-generator'
    },
    {
        title: 'مبسّط المفاهيم',
        icon: '⚛️',
        url: '/concept-simplifier'
    },
    {
        title: 'مولد الأنشطة',
        icon: '💡',
        url: '/activity-generator'
    },
    {
        title: 'مقترح الاستراتيجيات',
        icon: '📊',
        url: '/strategy-generator'
    },
    {
        title: 'مولد الاختبارات',
        icon: '✍️',
        url: '/quiz-generator'
    },
    {
        title: 'مولد معايير التقييم',
        icon: '⚖️',
        url: '/rubric-generator'
    },
    {
        title: 'مولد القصص التعليمية',
        icon: '📖',
        url: '/story-generator'
    },
    {
        title: 'مولد ملاحظات السجلات',
        icon: '📇',
        url: '/report-card-generator'
    },
    {
        title: 'عجلة الاختيار الذكية',
        icon: '🎡',
        url: '/wheel'
    }
];
</script>

<template>
    <div class="flex h-screen bg-gray-100" dir="rtl">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white flex-col shadow-lg flex">
            <div class="p-6 text-center border-b border-gray-700">
                <h1 class="text-2xl font-bold text-white">منصة مُعين</h1>
                <p class="text-sm text-gray-400 mt-1">مساعدك التعليمي الذكي</p>
            </div>
            
            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                <Link 
                    v-for="item in menuItems" 
                    :key="item.url"
                    :href="item.url"
                    :class="[
                        'flex items-center px-4 py-3 rounded-lg transition duration-200 group',
                        $page.url === item.url 
                            ? 'bg-blue-600 text-white shadow-md' 
                            : 'text-gray-300 hover:bg-gray-700 hover:text-white'
                    ]"
                >
                    <span class="text-xl ml-3">{{ item.icon }}</span>
                    <span class="font-medium">{{ item.title }}</span>
                </Link>
            </nav>
            
            <div class="p-4 border-t border-gray-700">
                <div class="flex items-center">
                    <img 
                        class="w-10 h-10 rounded-full object-cover" 
                        :src="`https://placehold.co/100x100/7E22CE/FFFFFF?text=${encodeURIComponent($page.props.auth.user.name.charAt(0))}`" 
                        :alt="$page.props.auth.user.name"
                    >
                    <div class="mr-3 flex-1">
                        <Link 
                            href="/teacher-profile"
                            class="font-semibold text-white hover:text-blue-300 transition-colors cursor-pointer block"
                        >
                            {{ $page.props.auth.user.name }}
                        </Link>
                        <Link 
                            href="/logout" 
                            method="post"
                            class="text-xs text-red-400 hover:underline"
                        >
                            تسجيل الخروج
                        </Link>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col overflow-hidden">
            <slot />
        </main>
    </div>
</template>

<style scoped>
/* Custom scrollbar for sidebar */
nav::-webkit-scrollbar {
    width: 4px;
}

nav::-webkit-scrollbar-track {
    background: #374151;
}

nav::-webkit-scrollbar-thumb {
    background: #6B7280;
    border-radius: 2px;
}

nav::-webkit-scrollbar-thumb:hover {
    background: #9CA3AF;
}
</style>