<template>
    <AdminDashboardLayout>
        <template #header>
            الإعدادات العامة للنظام
        </template>

        <div class="max-w-4xl mx-auto">
            <!-- Site Settings -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg mb-6">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">إعدادات الموقع</h3>
                    
                    <form @submit.prevent="saveSettings" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    اسم الموقع
                                </label>
                                <input v-model="settings.site_name" 
                                       type="text" 
                                       class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    وصف الموقع
                                </label>
                                <input v-model="settings.site_description" 
                                       type="text" 
                                       class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    الحد الأقصى للمحتوى المجاني
                                </label>
                                <input v-model.number="settings.max_free_generations" 
                                       type="number" 
                                       min="1"
                                       class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    إعدادات التسجيل
                                </label>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input v-model="settings.registration_enabled" 
                                               type="checkbox" 
                                               class="rounded border-gray-300 dark:border-gray-600">
                                        <span class="mr-2 text-sm text-gray-600 dark:text-gray-400">السماح بالتسجيل الجديد</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input v-model="settings.email_verification_required" 
                                               type="checkbox" 
                                               class="rounded border-gray-300 dark:border-gray-600">
                                        <span class="mr-2 text-sm text-gray-600 dark:text-gray-400">يتطلب تأكيد البريد الإلكتروني</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                وضع الصيانة
                            </label>
                            <div class="flex items-center space-x-3 space-x-reverse">
                                <input v-model="settings.maintenance_mode" 
                                       type="checkbox" 
                                       class="rounded border-gray-300 dark:border-gray-600">
                                <span class="text-sm text-gray-600 dark:text-gray-400">
                                    تفعيل وضع الصيانة (سيمنع المستخدمين من الوصول للموقع)
                                </span>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" 
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md font-medium">
                                حفظ الإعدادات
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- AI Settings -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg mb-6">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">إعدادات الذكاء الاصطناعي</h3>
                    
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    مزود الذكاء الاصطناعي
                                </label>
                                <select v-model="aiSettings.provider" 
                                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                                    <option value="gemini">Google Gemini</option>
                                    <option value="openai">OpenAI GPT</option>
                                    <option value="claude">Anthropic Claude</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    النموذج المستخدم
                                </label>
                                <select v-model="aiSettings.model" 
                                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                                    <option v-for="model in availableModels" :key="model.value" :value="model.value">
                                        {{ model.label }}
                                    </option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    مفتاح API
                                </label>
                                <input v-model="aiSettings.api_key" 
                                       type="password" 
                                       placeholder="أدخل مفتاح API..."
                                       class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    الحد الأقصى للطلبات/ساعة
                                </label>
                                <input v-model.number="aiSettings.rate_limit" 
                                       type="number" 
                                       min="1"
                                       class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button @click="saveAISettings" 
                                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-md font-medium">
                                حفظ إعدادات الذكاء الاصطناعي
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Security Settings -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg mb-6">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">إعدادات الأمان</h3>
                    
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    طول كلمة المرور الأدنى
                                </label>
                                <input v-model.number="securitySettings.min_password_length" 
                                       type="number" 
                                       min="6" 
                                       max="50"
                                       class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    مدة انقضاء الجلسة (دقيقة)
                                </label>
                                <input v-model.number="securitySettings.session_timeout" 
                                       type="number" 
                                       min="15"
                                       class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input v-model="securitySettings.require_password_complexity" 
                                       type="checkbox" 
                                       class="rounded border-gray-300 dark:border-gray-600">
                                <span class="mr-2 text-sm text-gray-600 dark:text-gray-400">
                                    يتطلب كلمة مرور معقدة (أحرف كبيرة وصغيرة وأرقام ورموز)
                                </span>
                            </label>
                            
                            <label class="flex items-center">
                                <input v-model="securitySettings.enable_two_factor" 
                                       type="checkbox" 
                                       class="rounded border-gray-300 dark:border-gray-600">
                                <span class="mr-2 text-sm text-gray-600 dark:text-gray-400">
                                    تفعيل المصادقة الثنائية
                                </span>
                            </label>

                            <label class="flex items-center">
                                <input v-model="securitySettings.log_user_activities" 
                                       type="checkbox" 
                                       class="rounded border-gray-300 dark:border-gray-600">
                                <span class="mr-2 text-sm text-gray-600 dark:text-gray-400">
                                    تسجيل أنشطة المستخدمين
                                </span>
                            </label>
                        </div>

                        <div class="flex justify-end">
                            <button @click="saveSecuritySettings" 
                                    class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-md font-medium">
                                حفظ إعدادات الأمان
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- System Info -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">معلومات النظام</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600 dark:text-gray-400">إصدار Laravel:</span>
                                <span class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ systemInfo.laravel_version }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600 dark:text-gray-400">إصدار PHP:</span>
                                <span class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ systemInfo.php_version }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600 dark:text-gray-400">قاعدة البيانات:</span>
                                <span class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ systemInfo.database_type }}</span>
                            </div>
                        </div>
                        
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600 dark:text-gray-400">مساحة القرص المستخدمة:</span>
                                <span class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ systemInfo.disk_usage }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600 dark:text-gray-400">ذاكرة الوصول العشوائي:</span>
                                <span class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ systemInfo.memory_usage }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600 dark:text-gray-400">وقت التشغيل:</span>
                                <span class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ systemInfo.uptime }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminDashboardLayout>
</template>

<script setup>
import { ref, computed } from 'vue'
import AdminDashboardLayout from '@/layouts/AdminDashboardLayout.vue'

// Props
defineProps({
    initialSettings: {
        type: Object,
        default: () => ({})
    }
})

// Reactive data
const settings = ref({
    site_name: 'منصة مُعين التعليمية',
    site_description: 'منصة تعليمية ذكية لإنشاء المحتوى التعليمي',
    max_free_generations: 10,
    registration_enabled: true,
    email_verification_required: false,
    maintenance_mode: false,
})

const aiSettings = ref({
    provider: 'gemini',
    model: 'gemini-pro',
    api_key: '',
    rate_limit: 100
})

const securitySettings = ref({
    min_password_length: 8,
    session_timeout: 120,
    require_password_complexity: true,
    enable_two_factor: false,
    log_user_activities: true
})

const systemInfo = ref({
    laravel_version: '11.x',
    php_version: '8.2',
    database_type: 'MySQL 8.0',
    disk_usage: '2.3 GB / 10 GB',
    memory_usage: '512 MB / 2 GB',
    uptime: '15 يوم'
})

// Computed
const availableModels = computed(() => {
    const models = {
        gemini: [
            { value: 'gemini-pro', label: 'Gemini Pro' },
            { value: 'gemini-pro-vision', label: 'Gemini Pro Vision' }
        ],
        openai: [
            { value: 'gpt-4', label: 'GPT-4' },
            { value: 'gpt-3.5-turbo', label: 'GPT-3.5 Turbo' }
        ],
        claude: [
            { value: 'claude-3-opus', label: 'Claude 3 Opus' },
            { value: 'claude-3-sonnet', label: 'Claude 3 Sonnet' }
        ]
    }
    return models[aiSettings.value.provider] || []
})

// Methods
const saveSettings = () => {
    // Save general settings
    console.log('Saving settings:', settings.value)
    // API call would go here
}

const saveAISettings = () => {
    // Save AI settings
    console.log('Saving AI settings:', aiSettings.value)
    // API call would go here
}

const saveSecuritySettings = () => {
    // Save security settings
    console.log('Saving security settings:', securitySettings.value)
    // API call would go here
}
</script>