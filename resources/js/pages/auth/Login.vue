<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps<{
    status?: string;
    canResetPassword: boolean;
}>();

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post('/login', {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <div dir="rtl" style="font-family: 'Cairo', sans-serif;" class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center p-4">
        <Head title="تسجيل الدخول" />
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">

        <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8">
            <div class="text-center mb-8">
                <div class="text-4xl mb-4">🎓</div>
                <h1 class="text-2xl font-bold text-gray-900 mb-2">تسجيل الدخول</h1>
                <p class="text-gray-600">أدخل بياناتك للوصول إلى حسابك</p>
            </div>

            <div v-if="status" class="mb-4 text-center text-sm font-medium text-green-600 bg-green-50 p-3 rounded-lg">
                {{ status }}
            </div>

            <form @submit.prevent="submit" class="space-y-6">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2 text-right">البريد الإلكتروني</label>
                    <input
                        id="email"
                        v-model="form.email"
                        type="email"
                        required
                        autofocus
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-right"
                        placeholder="example@email.com"
                    />
                    <div v-if="form.errors.email" class="text-red-500 text-sm mt-1 text-right">{{ form.errors.email }}</div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-2">
                        <Link v-if="canResetPassword" href="/forgot-password" class="text-sm text-blue-600 hover:text-blue-700">
                            نسيت كلمة المرور؟
                        </Link>
                        <label for="password" class="block text-sm font-medium text-gray-700">كلمة المرور</label>
                    </div>
                    <input
                        id="password"
                        v-model="form.password"
                        type="password"
                        required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-right"
                        placeholder="كلمة المرور"
                    />
                    <div v-if="form.errors.password" class="text-red-500 text-sm mt-1 text-right">{{ form.errors.password }}</div>
                </div>

                <div class="flex items-center">
                    <input
                        id="remember"
                        v-model="form.remember"
                        type="checkbox"
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                    />
                    <label for="remember" class="mr-3 block text-sm text-gray-900">تذكرني</label>
                </div>

                <button
                    type="submit"
                    :disabled="form.processing"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors disabled:opacity-50"
                >
                    <span v-if="form.processing" class="inline-block animate-spin rounded-full h-4 w-4 border-b-2 border-white ml-2"></span>
                    تسجيل الدخول
                </button>
            </form>

            <div class="text-center text-sm text-gray-600 mt-6">
                ليس لديك حساب؟
                <Link href="/register" class="text-blue-600 hover:text-blue-700 font-medium">إنشاء حساب جديد</Link>
            </div>
        </div>
    </div>
</template>
