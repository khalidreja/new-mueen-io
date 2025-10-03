<template>
    <AdminDashboardLayout>
        <template #header>
            إدارة المستخدمين
        </template>

        <!-- Filters and Search -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg mb-6">
            <div class="px-4 py-5 sm:p-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Search -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            البحث
                        </label>
                        <input v-model="filters.search" 
                               type="text" 
                               placeholder="البحث بالاسم أو البريد الإلكتروني..."
                               class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Role Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            الدور
                        </label>
                        <select v-model="filters.role" 
                                class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                            <option value="">جميع الأدوار</option>
                            <option value="admin">مدير</option>
                            <option value="teacher">معلم</option>
                            <option value="user">مستخدم</option>
                        </select>
                    </div>

                    <!-- Status Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            الحالة
                        </label>
                        <select v-model="filters.status" 
                                class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                            <option value="">جميع الحالات</option>
                            <option value="active">نشط</option>
                            <option value="inactive">غير نشط</option>
                            <option value="suspended">محظور</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4 flex justify-between items-center">
                    <button @click="resetFilters" 
                            class="text-sm text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                        إعادة تعيين الفلاتر
                    </button>
                    <button @click="openCreateModal" 
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                        إضافة مستخدم جديد
                    </button>
                </div>
            </div>
        </div>

        <!-- Users Table -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
            <div class="px-4 py-5 sm:p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    المستخدم
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    الدور
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    العضوية
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    الحالة
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    تاريخ التسجيل
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    الإجراءات
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            <tr v-for="user in filteredUsers" :key="user.id" class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                                            <span class="text-white text-sm font-medium">{{ user.name.charAt(0) }}</span>
                                        </div>
                                        <div class="mr-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ user.name }}</div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">{{ user.email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span :class="{
                                        'bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200': user.role === 'admin',
                                        'bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200': user.role === 'teacher',
                                        'bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200': user.role === 'user'
                                    }" class="inline-flex px-2 py-1 text-xs font-semibold rounded-full">
                                        {{ getRoleLabel(user.role) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span :class="{
                                        'bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200': user.subscription_type === 'premium',
                                        'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200': user.subscription_type === 'pro',
                                        'bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200': user.subscription_type === 'free'
                                    }" class="inline-flex px-2 py-1 text-xs font-semibold rounded-full">
                                        {{ getMembershipLabel(user.subscription_type) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span :class="{
                                        'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200': user.status === 'active',
                                        'bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200': user.status === 'inactive',
                                        'bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200': user.status === 'suspended'
                                    }" class="inline-flex px-2 py-1 text-xs font-semibold rounded-full">
                                        {{ getStatusLabel(user.status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ formatDate(user.created_at) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2 space-x-reverse">
                                        <button @click="editUser(user)" 
                                                class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300">
                                            تعديل
                                        </button>
                                        <button @click="toggleUserStatus(user)" 
                                                :class="user.status === 'suspended' ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400'"
                                                class="hover:opacity-75">
                                            {{ user.status === 'suspended' ? 'إلغاء الحظر' : 'حظر' }}
                                        </button>
                                        <button @click="deleteUser(user)" 
                                                class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300">
                                            حذف
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div v-if="users.data && users.data.length > 0" class="mt-6 flex items-center justify-between">
                    <div class="text-sm text-gray-700 dark:text-gray-300">
                        عرض {{ users.from || 0 }} إلى {{ users.to || 0 }} من {{ totalUsers }} نتيجة
                    </div>
                    <div class="flex space-x-2 space-x-reverse">
                        <a v-if="users.prev_page_url" 
                           :href="users.prev_page_url"
                           class="px-3 py-1 rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600">
                            السابق
                        </a>
                        <span class="px-3 py-1 bg-blue-600 text-white rounded-md">{{ currentPage }} من {{ lastPage }}</span>
                        <a v-if="users.next_page_url" 
                           :href="users.next_page_url"
                           class="px-3 py-1 rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600">
                            التالي
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Create/Edit User Modal -->
        <div v-if="showModal" class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75" @click="closeModal"></div>
                <div class="relative bg-white dark:bg-gray-800 rounded-lg p-6 w-full max-w-md">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                        {{ isEditing ? 'تعديل المستخدم' : 'إضافة مستخدم جديد' }}
                    </h3>
                    
                    <form @submit.prevent="saveUser" class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">الاسم</label>
                            <input v-model="userForm.name" 
                                   type="text" 
                                   required
                                   class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">البريد الإلكتروني</label>
                            <input v-model="userForm.email" 
                                   type="email" 
                                   required
                                   class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                        </div>
                        
                        <div v-if="!isEditing">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">كلمة المرور</label>
                            <input v-model="userForm.password" 
                                   type="password" 
                                   required
                                   class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">الدور</label>
                            <select v-model="userForm.role" 
                                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                                <option value="user">مستخدم</option>
                                <option value="teacher">معلم</option>
                                <option value="admin">مدير</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">العضوية</label>
                            <select v-model="userForm.membership" 
                                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                                <option value="free">مجانية</option>
                                <option value="premium">مميزة</option>
                                <option value="pro">احترافية</option>
                            </select>
                        </div>
                        
                        <div class="flex justify-end space-x-3 space-x-reverse pt-4">
                            <button type="button" 
                                    @click="closeModal"
                                    class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                                إلغاء
                            </button>
                            <button type="submit" 
                                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md">
                                {{ isEditing ? 'حفظ التغييرات' : 'إضافة المستخدم' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AdminDashboardLayout>
</template>

<script setup>
import { ref, computed, watch } from 'vue'
import { router } from '@inertiajs/vue3'
import AdminDashboardLayout from '@/layouts/AdminDashboardLayout.vue'

// Props
const props = defineProps({
    users: {
        type: Object,
        required: true
    },
    filters: {
        type: Object,
        default: () => ({})
    }
})

// Reactive data
const filters = ref({
    search: props.filters?.search || '',
    role: props.filters?.role || '',
    status: props.filters?.status || ''
})

const showModal = ref(false)
const isEditing = ref(false)
const userForm = ref({
    id: null,
    name: '',
    email: '',
    password: '',
    role: 'user',
    membership: 'free'
})

// Computed
const filteredUsers = computed(() => {
    return props.users.data || []
})

const totalUsers = computed(() => props.users.total || 0)
const currentPage = computed(() => props.users.current_page || 1)
const lastPage = computed(() => props.users.last_page || 1)

// Methods
// Watch for filter changes and update URL
watch(filters, (newFilters) => {
    router.get(route('admin.users'), newFilters, {
        preserveState: true,
        replace: true
    })
}, { deep: true, debounce: 300 })

const resetFilters = () => {
    router.get(route('admin.users'), {}, {
        preserveState: true,
        replace: true
    })
}

const openCreateModal = () => {
    isEditing.value = false
    userForm.value = {
        id: null,
        name: '',
        email: '',
        password: '',
        role: 'user',
        membership: 'free'
    }
    showModal.value = true
}

const editUser = (user) => {
    isEditing.value = true
    userForm.value = { 
        ...user,
        membership: user.subscription_type || 'free'
    }
    showModal.value = true
}

const closeModal = () => {
    showModal.value = false
}

const saveUser = () => {
    if (isEditing.value) {
        // Update existing user
        router.put(route('admin.users.update', userForm.value.id), userForm.value, {
            onSuccess: () => {
                closeModal()
            }
        })
    } else {
        // Create new user
        router.post(route('admin.users.store'), userForm.value, {
            onSuccess: () => {
                closeModal()
            }
        })
    }
}

const toggleUserStatus = (user) => {
    if (confirm(`هل أنت متأكد من ${user.status === 'suspended' ? 'إلغاء حظر' : 'حظر'} هذا المستخدم؟`)) {
        router.patch(route('admin.users.toggle-status', user.id), {}, {
            preserveScroll: true
        })
    }
}

const deleteUser = (user) => {
    if (confirm('هل أنت متأكد من حذف هذا المستخدم؟ لا يمكن التراجع عن هذا الإجراء.')) {
        router.delete(route('admin.users.destroy', user.id), {
            preserveScroll: true
        })
    }
}

const getRoleLabel = (role) => {
    const labels = {
        admin: 'مدير',
        teacher: 'معلم',
        user: 'مستخدم'
    }
    return labels[role] || role
}

const getMembershipLabel = (membership) => {
    const labels = {
        free: 'مجانية',
        premium: 'مميزة',
        pro: 'احترافية'
    }
    return labels[membership] || membership
}

const getStatusLabel = (status) => {
    const labels = {
        active: 'نشط',
        inactive: 'غير نشط',
        suspended: 'محظور'
    }
    return labels[status] || status
}

const formatDate = (dateString) => {
    const date = new Date(dateString)
    return date.toLocaleDateString('ar-SA')
}
</script>