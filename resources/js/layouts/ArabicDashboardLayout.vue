<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import { useAppearance } from '@/composables/useAppearance';

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
const { appearance, updateAppearance } = useAppearance();

const toggleDarkMode = () => {
    const newAppearance = appearance.value === 'dark' ? 'light' : 'dark';
    updateAppearance(newAppearance);
};

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
        url: '/lesson-plan-generator'
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
    <div class="flex h-screen bg-background transition-colors duration-300" dir="rtl">
        <!-- Sidebar -->
        <aside class="w-64 bg-sidebar border-r border-sidebar-border flex-col shadow-lg flex">
            <div class="p-6 text-center border-b border-sidebar-border">
                <h1 class="text-2xl font-bold text-sidebar-foreground">منصة مُعين</h1>
                <p class="text-sm text-muted-foreground mt-1">مساعدك التعليمي الذكي</p>
            </div>
            
            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                <Link 
                    v-for="item in menuItems" 
                    :key="item.url"
                    :href="item.url"
                    :class="[
                        'flex items-center px-4 py-3 rounded-lg transition-colors duration-200 group',
                        $page.url === item.url 
                            ? 'bg-sidebar-accent text-sidebar-accent-foreground shadow-md' 
                            : 'text-sidebar-foreground hover:bg-sidebar-accent/50 hover:text-sidebar-accent-foreground'
                    ]"
                >
                    <span class="text-xl ml-3">{{ item.icon }}</span>
                    <span class="font-medium">{{ item.title }}</span>
                </Link>
            </nav>
            
                        <div class="p-4 border-t border-sidebar-border">
                <div class="flex items-center space-x-3 space-x-reverse">
                    <div class="w-10 h-10 bg-sidebar-primary rounded-full flex items-center justify-center">
                        <span class="text-sm font-bold text-sidebar-primary-foreground">
                            {{ ($page.props.auth.user?.name || 'مستخدم').charAt(0) }}
                        </span>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-sidebar-foreground truncate">
                            {{ $page.props.auth.user?.name || 'مستخدم' }}
                        </p>
                        <p class="text-xs text-muted-foreground truncate">
                            {{ $page.props.auth.user?.email || 'user@example.com' }}
                        </p>
                    </div>
                    <div class="flex items-center space-x-2 space-x-reverse">
                        <!-- Dark mode toggle -->
                        <button 
                            @click="toggleDarkMode"
                            class="p-2 rounded-md text-muted-foreground hover:text-sidebar-foreground hover:bg-sidebar-accent/50 transition-colors duration-200"
                            :title="appearance === 'dark' ? 'التبديل للوضع المضيء' : 'التبديل للوضع المظلم'"
                        >
                            <span v-if="appearance === 'dark'" class="text-lg">☀️</span>
                            <span v-else class="text-lg">🌙</span>
                        </button>
                        
                        <Link 
                            href="/logout" 
                            method="post" 
                            as="button"
                            class="text-muted-foreground hover:text-sidebar-foreground transition-colors duration-200"
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
    background: hsl(var(--sidebar-background));
}

nav::-webkit-scrollbar-thumb {
    background: hsl(var(--sidebar-border));
    border-radius: 2px;
}

nav::-webkit-scrollbar-thumb:hover {
    background: hsl(var(--sidebar-accent));
}
</style>