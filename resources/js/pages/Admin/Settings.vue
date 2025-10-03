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
                                    :disabled="loadingGeneral"
                                    :class="[
                                        'px-6 py-2 rounded-md font-medium transition-colors',
                                        loadingGeneral 
                                            ? 'bg-gray-400 cursor-not-allowed' 
                                            : 'bg-blue-600 hover:bg-blue-700 text-white'
                                    ]">
                                <span v-if="loadingGeneral" class="flex items-center space-x-2 space-x-reverse">
                                    <div class="animate-spin rounded-full h-4 w-4 border-b-2 border-white"></div>
                                    <span>جاري الحفظ...</span>
                                </span>
                                <span v-else>حفظ الإعدادات</span>
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
                                    :disabled="loadingAI"
                                    :class="[
                                        'px-6 py-2 rounded-md font-medium transition-colors',
                                        loadingAI 
                                            ? 'bg-gray-400 cursor-not-allowed' 
                                            : 'bg-green-600 hover:bg-green-700 text-white'
                                    ]">
                                <span v-if="loadingAI" class="flex items-center space-x-2 space-x-reverse">
                                    <div class="animate-spin rounded-full h-4 w-4 border-b-2 border-white"></div>
                                    <span>جاري الحفظ...</span>
                                </span>
                                <span v-else>حفظ إعدادات الذكاء الاصطناعي</span>
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
                                    :disabled="loadingSecurity"
                                    :class="[
                                        'px-6 py-2 rounded-md font-medium transition-colors',
                                        loadingSecurity 
                                            ? 'bg-gray-400 cursor-not-allowed' 
                                            : 'bg-red-600 hover:bg-red-700 text-white'
                                    ]">
                                <span v-if="loadingSecurity" class="flex items-center space-x-2 space-x-reverse">
                                    <div class="animate-spin rounded-full h-4 w-4 border-b-2 border-white"></div>
                                    <span>جاري الحفظ...</span>
                                </span>
                                <span v-else>حفظ إعدادات الأمان</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- System Info -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">معلومات النظام</h3>
                        <button @click="refreshSystemInfo"
                                :disabled="refreshingSystemInfo"
                                :class="[
                                    'px-3 py-1 text-sm rounded-md transition-colors',
                                    refreshingSystemInfo 
                                        ? 'bg-gray-400 cursor-not-allowed' 
                                        : 'bg-blue-600 hover:bg-blue-700 text-white'
                                ]">
                            <span v-if="refreshingSystemInfo" class="flex items-center space-x-1 space-x-reverse">
                                <div class="animate-spin rounded-full h-3 w-3 border-b-2 border-white"></div>
                                <span>تحديث...</span>
                            </span>
                            <span v-else>تحديث</span>
                        </button>
                    </div>
                    
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
                                <span class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ systemInfo.database_info?.formatted || 'غير متاح' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600 dark:text-gray-400">البيئة:</span>
                                <span :class="[
                                    'text-sm font-medium px-2 py-1 rounded-full',
                                    systemInfo.environment === 'production' 
                                        ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200'
                                        : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200'
                                ]">
                                    {{ systemInfo.environment === 'production' ? 'إنتاج' : 'تطوير' }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600 dark:text-gray-400">مساحة القرص:</span>
                                <div class="text-left">
                                    <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ systemInfo.disk_usage?.formatted || 'غير متاح' }}</div>
                                    <div v-if="systemInfo.disk_usage?.percentage" class="w-20 bg-gray-200 rounded-full h-2 mt-1">
                                        <div class="bg-blue-600 h-2 rounded-full" :style="`width: ${systemInfo.disk_usage.percentage}%`"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600 dark:text-gray-400">ذاكرة الوصول العشوائي:</span>
                                <div class="text-left">
                                    <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ systemInfo.memory_usage?.formatted || 'غير متاح' }}</div>
                                    <div v-if="systemInfo.memory_usage?.percentage" class="w-20 bg-gray-200 rounded-full h-2 mt-1">
                                        <div class="bg-green-600 h-2 rounded-full" :style="`width: ${systemInfo.memory_usage.percentage}%`"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600 dark:text-gray-400">وقت التشغيل:</span>
                                <span class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ systemInfo.uptime }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600 dark:text-gray-400">المنطقة الزمنية:</span>
                                <span class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ systemInfo.timezone }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Server Info -->
                    <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <h4 class="text-md font-medium text-gray-900 dark:text-gray-100 mb-3">معلومات الخادم</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600 dark:text-gray-400">نظام التشغيل:</span>
                                <span class="font-medium text-gray-900 dark:text-gray-100">{{ systemInfo.server_info?.os || 'غير متاح' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600 dark:text-gray-400">خادم الويب:</span>
                                <span class="font-medium text-gray-900 dark:text-gray-100">{{ systemInfo.server_info?.server_software || 'غير متاح' }}</span>
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
import { router } from '@inertiajs/vue3'
import AdminDashboardLayout from '@/layouts/AdminDashboardLayout.vue'

// Props
const props = defineProps({
    systemInfo: {
        type: Object,
        required: true
    },
    currentSettings: {
        type: Object,
        required: true
    },
    aiSettings: {
        type: Object,
        required: true
    },
    securitySettings: {
        type: Object,
        required: true
    }
})

// Reactive data
const settings = ref({ ...props.currentSettings })
const aiSettings = ref({ ...props.aiSettings })
const securitySettings = ref({ ...props.securitySettings })

// Loading states
const loadingGeneral = ref(false)
const loadingAI = ref(false)
const loadingSecurity = ref(false)
const refreshingSystemInfo = ref(false)

const systemInfo = ref({ ...props.systemInfo })

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
    loadingGeneral.value = true
    router.put('/admin/settings', {
        type: 'general',
        ...settings.value
    }, {
        onSuccess: () => {
            loadingGeneral.value = false
        },
        onError: (errors) => {
            loadingGeneral.value = false
            console.error('Error saving general settings:', errors)
        }
    })
}

const saveAISettings = () => {
    loadingAI.value = true
    router.put('/admin/settings', {
        type: 'ai',
        ...aiSettings.value
    }, {
        onSuccess: () => {
            loadingAI.value = false
        },
        onError: (errors) => {
            loadingAI.value = false
            console.error('Error saving AI settings:', errors)
        }
    })
}

const saveSecuritySettings = () => {
    loadingSecurity.value = true
    router.put('/admin/settings', {
        type: 'security',
        ...securitySettings.value
    }, {
        onSuccess: () => {
            loadingSecurity.value = false
        },
        onError: (errors) => {
            loadingSecurity.value = false
            console.error('Error saving security settings:', errors)
        }
    })
}

const refreshSystemInfo = () => {
    refreshingSystemInfo.value = true
    router.get('/admin/settings', {}, {
        preserveState: false,
        onSuccess: () => {
            refreshingSystemInfo.value = false
        },
        onError: () => {
            refreshingSystemInfo.value = false
        }
    })
}
</script>