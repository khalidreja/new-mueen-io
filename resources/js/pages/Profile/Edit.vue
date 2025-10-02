<script setup lang="ts">
import ArabicDashboardLayout from '@/layouts/ArabicDashboardLayout.vue';
import { Head, useForm, router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

interface User {
    id: number;
    name: string;
    email: string;
    phone?: string;
    city?: string;
    school?: string;
    subject?: string;
    stage?: string;
    years_experience?: string;
    qualification?: string;
    specialization?: string;
}

interface Teacher {
    id: number;
    user_id: number;
    phone?: string;
    city?: string;
    school?: string;
    subject?: string;
    stage?: string;
    years_experience?: string;
    qualification?: string;
    specialization?: string;
    profile_image?: string;
}

interface Props {
    user: User;
    teacher?: Teacher;
    teacherClasses?: ClassData[];
}

const props = defineProps<Props>();

// متغير التبويب النشط
const activeTab = ref('personal');

// تعريف أنواع البيانات
interface Student {
    id: number;
    name: string;
    number: number;
}

interface ClassData {
    id: number;
    stage: string;
    grade: string;
    className: string;
    subjects: string[];
    students: Student[];
}

// بيانات الفصول - تحميل البيانات المحفوظة أو فصل فارغ
const teacherClasses = ref<ClassData[]>(
    props.teacherClasses && Array.isArray(props.teacherClasses) && props.teacherClasses.length > 0 
        ? props.teacherClasses 
        : [{
            id: Date.now(),
            stage: '',
            grade: '',
            className: '',
            subjects: [''],
            students: []
        }]
);

// إضافة فصل جديد
const addClass = () => {
    teacherClasses.value.push({
        id: Date.now(),
        stage: '',
        grade: '',
        className: '',
        subjects: [''],
        students: []
    });
};

// حذف فصل
const removeClass = (index: number) => {
    if (teacherClasses.value.length > 1) {
        teacherClasses.value.splice(index, 1);
    }
};

// إضافة مادة جديدة لفصل معين
const addSubject = (classIndex: number) => {
    teacherClasses.value[classIndex].subjects.push('');
};

// حذف مادة من فصل معين
const removeSubject = (classIndex: number, subjectIndex: number) => {
    if (teacherClasses.value[classIndex].subjects.length > 1) {
        teacherClasses.value[classIndex].subjects.splice(subjectIndex, 1);
    }
};

// خيارات المراحل والصفوف
const stages = [
    {
        name: 'رياض أطفال',
        grades: ['التمهيدي', 'الروضة الأولى', 'الروضة الثانية']
    },
    {
        name: 'ابتدائي',
        grades: ['الأول الابتدائي', 'الثاني الابتدائي', 'الثالث الابتدائي', 'الرابع الابتدائي', 'الخامس الابتدائي', 'السادس الابتدائي']
    },
    {
        name: 'متوسط',
        grades: ['الأول المتوسط', 'الثاني المتوسط', 'الثالث المتوسط']
    },
    {
        name: 'ثانوي',
        grades: ['الأول الثانوي', 'الثاني الثانوي', 'الثالث الثانوي']
    }
];

// الحصول على الصفوف حسب المرحلة
const getGradesForStage = (stageName: string) => {
    const stage = stages.find(s => s.name === stageName);
    return stage ? stage.grades : [];
};

// إدارة الطلاب
const addStudent = (classIndex: number, studentName: string = '') => {
    teacherClasses.value[classIndex].students.push({
        id: Date.now(),
        name: studentName,
        number: teacherClasses.value[classIndex].students.length + 1
    });
};

const removeStudent = (classIndex: number, studentIndex: number) => {
    teacherClasses.value[classIndex].students.splice(studentIndex, 1);
    // إعادة ترقيم الطلاب
    teacherClasses.value[classIndex].students.forEach((student, index) => {
        student.number = index + 1;
    });
};

// استيراد الطلاب من ملف
const importStudents = (classIndex: number, event: Event) => {
    const target = event.target as HTMLInputElement;
    const file = target.files?.[0];
    
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            const text = e.target?.result as string;
            const lines = text.split('\n').filter(line => line.trim() !== '');
            
            lines.forEach((line, index) => {
                const studentName = line.trim();
                if (studentName) {
                    teacherClasses.value[classIndex].students.push({
                        id: Date.now() + index,
                        name: studentName,
                        number: teacherClasses.value[classIndex].students.length + 1
                    });
                }
            });
        };
        reader.readAsText(file);
    }
};

// التنقل بين التبويبات
const classManagementActiveTab = ref('classes-setup');
const selectedClassIndex = ref(0);

// إعداد النموذج
const form = useForm({
    name: props.user.name,
    phone: props.user.phone || '',
    city: props.user.city || '',
    school: props.user.school || '',
    subject: props.user.subject || '',
    stage: props.user.stage || '',
    years_experience: props.user.years_experience || '',
    qualification: props.user.qualification || '',
    specialization: props.user.specialization || '',
    classes: props.teacherClasses || [], // بيانات الفصول من props
});

// معاينة الصورة
const imagePreview = ref<string | null>(
    props.teacher?.profile_image
        ? `/storage/${props.teacher.profile_image}`
        : null
);

// مرجع إدخال الملف
const fileInput = ref<HTMLInputElement | null>(null);

// تحديث form.classes تلقائياً عند تغيير teacherClasses
watch(teacherClasses, (newClasses) => {
    form.classes = newClasses;
}, { deep: true });

// دالة التعامل مع رفع الصورة
const handleImageUpload = (event: Event) => {
    const target = event.target as HTMLInputElement;
    const file = target.files?.[0];
    
    if (file) {
        // فحص نوع الملف
        if (!['image/jpeg', 'image/png', 'image/jpg'].includes(file.type)) {
            alert('نوع الملف غير مدعوم. الرجاء اختيار صورة من نوع JPG أو PNG');
            return;
        }
        
        // فحص حجم الملف (2MB)
        if (file.size > 2 * 1024 * 1024) {
            alert('حجم الملف كبير جداً. الحد الأقصى 2MB');
            return;
        }
        
        // عرض معاينة الصورة
        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.value = e.target?.result as string;
        };
        reader.readAsDataURL(file);
        
        // رفع الصورة للخادم
        const formData = new FormData();
        formData.append('profile_image', file);
        
        fetch('/api/upload-profile-image', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('تم رفع الصورة بنجاح');
            }
        })
        .catch(error => {
            console.error('خطأ في رفع الصورة:', error);
        });
    }
};

const submit = () => {
    try {
        // تنظيف البيانات الفارغة قبل الإرسال
        const cleanedClasses = teacherClasses.value.filter(cls => 
            cls.className?.trim() && 
            cls.stage?.trim() && 
            cls.grade?.trim()
        ).map(cls => ({
            ...cls,
            subjects: cls.subjects?.filter(sub => sub?.trim()) || [],
            students: cls.students?.filter(student => student.name?.trim()) || []
        }));
        
        // تحديث بيانات النموذج
        form.classes = cleanedClasses;
        
        console.log('Form data being submitted:', {
            name: form.name,
            phone: form.phone,
            city: form.city,
            school: form.school,
            subject: form.subject,
            stage: form.stage,
            years_experience: form.years_experience,
            qualification: form.qualification,
            specialization: form.specialization,
            classes: form.classes
        });
        
        form.patch('/teacher-profile', {
            preserveScroll: true,
            onSuccess: (page) => {
                console.log('Data saved successfully!', page);
                
                // تحديث البيانات المحلية فوراً
                teacherClasses.value = cleanedClasses;
                form.classes = cleanedClasses;
                
                console.log('Updated teacherClasses:', teacherClasses.value);
                console.log('Updated form.classes:', form.classes);
                
                // عرض رسالة النجاح
                alert('تم حفظ البيانات بنجاح! 🎉');
                
                // إعادة تحميل البيانات من الخادم للتأكد
                setTimeout(() => {
                    router.reload({ only: ['user', 'teacher', 'teacherClasses'] });
                }, 500);
            },
            onError: (errors) => {
                console.error('خطأ في حفظ البيانات:', errors);
                let errorMessage = 'حدث خطأ أثناء حفظ البيانات. يرجى المحاولة مرة أخرى.';
                if (errors.error) {
                    errorMessage = errors.error;
                }
                alert(errorMessage);
            },
            onFinish: () => {
                console.log('Form submission completed');
            }
        });
    } catch (error) {
        console.error('Submit function error:', error);
        alert('حدث خطأ غير متوقع. يرجى إعادة تحميل الصفحة والمحاولة مرة أخرى.');
    }
};
</script>

<template>
    <Head title="الملف الشخصي" />
    
    <ArabicDashboardLayout>
        <div class="p-6 bg-white min-h-screen overflow-auto">
            <div class="max-w-4xl mx-auto">
                <!-- Page Header -->
                <div class="mb-8 bg-gradient-to-r from-blue-50 to-indigo-50 p-6 rounded-xl border border-blue-100">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2 flex items-center gap-3">
                        <span class="text-4xl">👤</span>
                        الملف الشخصي
                    </h1>
                    <p class="text-gray-700 text-lg">إدارة بياناتك الشخصية والمهنية</p>
                    
                    <!-- ملخص البيانات -->
                    <div v-if="teacherClasses.length > 0" class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-white p-3 rounded-lg border border-blue-200">
                            <div class="text-sm text-blue-600">عدد الفصول</div>
                            <div class="text-lg font-bold text-blue-800">{{ teacherClasses.length }}</div>
                        </div>
                        <div class="bg-white p-3 rounded-lg border border-green-200">
                            <div class="text-sm text-green-600">إجمالي الطلاب</div>
                            <div class="text-lg font-bold text-green-800">
                                {{ Array.isArray(teacherClasses) ? teacherClasses.reduce((total, cls) => total + (cls.students?.length || 0), 0) : 0 }}
                            </div>
                        </div>
                        <div class="bg-white p-3 rounded-lg border border-purple-200">
                            <div class="text-sm text-purple-600">إجمالي المواد</div>
                            <div class="text-lg font-bold text-purple-800">
                                {{ Array.isArray(teacherClasses) ? teacherClasses.reduce((total, cls) => total + (cls.subjects?.filter(s => s.trim()).length || 0), 0) : 0 }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Form -->
                <div class="bg-white rounded-xl shadow-lg border-2 border-gray-200 overflow-auto">
                    <!-- Navigation Tabs -->
                    <div class="border-b border-gray-200">
                        <nav class="flex space-x-8 space-x-reverse px-8 pt-6" aria-label="Tabs">
                            <button
                                @click="activeTab = 'personal'"
                                :class="[
                                    'py-2 px-1 border-b-2 font-medium text-sm transition-colors',
                                    activeTab === 'personal' 
                                        ? 'border-blue-500 text-blue-600' 
                                        : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
                                ]"
                            >
                                📋 البيانات الشخصية
                            </button>
                            <button
                                @click="activeTab = 'professional'"
                                :class="[
                                    'py-2 px-1 border-b-2 font-medium text-sm transition-colors',
                                    activeTab === 'professional' 
                                        ? 'border-blue-500 text-blue-600' 
                                        : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
                                ]"
                            >
                                🎓 البيانات المهنية
                            </button>
                            <button
                                @click="activeTab = 'classes'"
                                :class="[
                                    'py-2 px-1 border-b-2 font-medium text-sm transition-colors',
                                    activeTab === 'classes' 
                                        ? 'border-blue-500 text-blue-600' 
                                        : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
                                ]"
                            >
                                📚 فصولي
                            </button>
                        </nav>
                    </div>
                    
                    <div class="p-8">
                        <form @submit.prevent="submit" class="space-y-6">
                            <!-- Profile Image Section -->
                            <div class="text-center mb-10 bg-gray-50 p-6 rounded-xl">
                                <h2 class="text-xl font-semibold text-gray-800 mb-4">الصورة الشخصية</h2>
                                <div class="relative inline-block">
                                    <img 
                                        :src="imagePreview || 'https://placehold.co/120x120/3B82F6/FFFFFF?text=' + encodeURIComponent(user.name.charAt(0))"
                                        :alt="user.name"
                                        class="w-36 h-36 rounded-full object-cover border-4 border-white shadow-xl"
                                    >
                                    <button
                                        type="button"
                                        @click="fileInput?.click()"
                                        class="absolute bottom-1 right-1 bg-blue-600 text-white p-3 rounded-full shadow-lg hover:bg-blue-700 transition-all hover:scale-105"
                                    >
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </button>
                                </div>
                                <input
                                    ref="fileInput"
                                    type="file"
                                    accept="image/jpeg,image/png,image/jpg"
                                    @change="handleImageUpload"
                                    class="hidden"
                                >
                                <p class="text-sm font-medium text-gray-600 mt-3">اضغط على أيقونة الكاميرا لتغيير الصورة</p>
                                <p class="text-xs text-gray-500 mt-1">مسموح: JPG, PNG (حد أقصى 2MB)</p>
                            </div>

                            <!-- Personal Information Tab -->
                            <div v-show="activeTab === 'personal'" class="space-y-6">
                                <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center gap-2">
                                    <span class="text-2xl">📋</span>
                                    البيانات الشخصية
                                </h2>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Name Field -->
                                    <div class="bg-blue-50 p-4 rounded-lg border border-blue-200">
                                        <label for="name" class="block text-sm font-semibold text-gray-800 mb-2">
                                            👤 الاسم الكامل
                                        </label>
                                        <input
                                            id="name"
                                            v-model="form.name"
                                            type="text"
                                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-900 font-medium"
                                            :class="{ 'border-red-500 focus:border-red-500 focus:ring-red-500': form.errors.name }"
                                            required
                                        >
                                        <p v-if="form.errors.name" class="text-red-600 text-sm mt-2 font-medium">{{ form.errors.name }}</p>
                                    </div>

                                    <!-- Phone Field -->
                                    <div class="bg-green-50 p-4 rounded-lg border border-green-200">
                                        <label for="phone" class="block text-sm font-semibold text-gray-800 mb-2">
                                            📱 رقم الهاتف
                                        </label>
                                        <input
                                            id="phone"
                                            v-model="form.phone"
                                            type="tel"
                                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-900 font-medium"
                                            :class="{ 'border-red-500 focus:border-red-500 focus:ring-red-500': form.errors.phone }"
                                            placeholder="966XXXXXXXXX"
                                        >
                                        <p v-if="form.errors.phone" class="text-red-600 text-sm mt-2 font-medium">{{ form.errors.phone }}</p>
                                    </div>

                                    <!-- City Field -->
                                    <div class="bg-purple-50 p-4 rounded-lg border border-purple-200">
                                        <label for="city" class="block text-sm font-semibold text-gray-800 mb-2">
                                            🏙️ المدينة
                                        </label>
                                        <input
                                            id="city"
                                            v-model="form.city"
                                            type="text"
                                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-900 font-medium"
                                            :class="{ 'border-red-500 focus:border-red-500 focus:ring-red-500': form.errors.city }"
                                            placeholder="مثال: الرياض، جدة، الدمام"
                                        >
                                        <p v-if="form.errors.city" class="text-red-600 text-sm mt-2 font-medium">{{ form.errors.city }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Professional Information Tab -->
                            <div v-show="activeTab === 'professional'" class="space-y-6">
                                <h3 class="text-xl font-semibold text-gray-800 mb-6 flex items-center gap-2">
                                    <span class="text-2xl">🎓</span>
                                    البيانات المهنية
                                </h3>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- School Field -->
                                    <div class="bg-indigo-50 p-4 rounded-lg border border-indigo-200">
                                        <label for="school" class="block text-sm font-semibold text-gray-800 mb-2">
                                            🏫 المدرسة/المؤسسة التعليمية
                                        </label>
                                        <input
                                            id="school"
                                            v-model="form.school"
                                            type="text"
                                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-900 font-medium"
                                            :class="{ 'border-red-500 focus:border-red-500 focus:ring-red-500': form.errors.school }"
                                            placeholder="اسم المدرسة أو المؤسسة"
                                        >
                                        <p v-if="form.errors.school" class="text-red-600 text-sm mt-2 font-medium">{{ form.errors.school }}</p>
                                    </div>

                                    <!-- Subject Field -->
                                    <div class="bg-orange-50 p-4 rounded-lg border border-orange-200">
                                        <label for="subject" class="block text-sm font-semibold text-gray-800 mb-2">
                                            📚 المادة التعليمية الرئيسية
                                        </label>
                                        <input
                                            id="subject"
                                            v-model="form.subject"
                                            type="text"
                                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-900 font-medium"
                                            :class="{ 'border-red-500 focus:border-red-500 focus:ring-red-500': form.errors.subject }"
                                            placeholder="مثال: الرياضيات، اللغة العربية، العلوم"
                                        >
                                        <p v-if="form.errors.subject" class="text-red-600 text-sm mt-2 font-medium">{{ form.errors.subject }}</p>
                                    </div>

                                    <!-- Stage Field -->
                                    <div class="bg-pink-50 p-4 rounded-lg border border-pink-200">
                                        <label for="stage" class="block text-sm font-semibold text-gray-800 mb-2">
                                            🎯 المرحلة التعليمية
                                        </label>
                                        <select
                                            id="stage"
                                            v-model="form.stage"
                                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-900 font-medium"
                                            :class="{ 'border-red-500 focus:border-red-500 focus:ring-red-500': form.errors.stage }"
                                        >
                                            <option value="">اختر المرحلة...</option>
                                            <option value="رياض أطفال">رياض أطفال</option>
                                            <option value="ابتدائي">ابتدائي</option>
                                            <option value="متوسط">متوسط</option>
                                            <option value="ثانوي">ثانوي</option>
                                            <option value="جامعي">جامعي</option>
                                        </select>
                                        <p v-if="form.errors.stage" class="text-red-600 text-sm mt-2 font-medium">{{ form.errors.stage }}</p>
                                    </div>

                                    <!-- Years of Experience Field -->
                                    <div class="bg-cyan-50 p-4 rounded-lg border border-cyan-200">
                                        <label for="years_experience" class="block text-sm font-semibold text-gray-800 mb-2">
                                            ⏳ سنوات الخبرة
                                        </label>
                                        <select
                                            id="years_experience"
                                            v-model="form.years_experience"
                                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-900 font-medium"
                                            :class="{ 'border-red-500 focus:border-red-500 focus:ring-red-500': form.errors.years_experience }"
                                        >
                                            <option value="">اختر عدد السنوات...</option>
                                            <option value="أقل من سنة">أقل من سنة</option>
                                            <option value="1-3 سنوات">1-3 سنوات</option>
                                            <option value="4-7 سنوات">4-7 سنوات</option>
                                            <option value="8-15 سنة">8-15 سنة</option>
                                            <option value="أكثر من 15 سنة">أكثر من 15 سنة</option>
                                        </select>
                                        <p v-if="form.errors.years_experience" class="text-red-600 text-sm mt-2 font-medium">{{ form.errors.years_experience }}</p>
                                    </div>

                                    <!-- Qualification Field -->
                                    <div class="bg-yellow-50 p-4 rounded-lg border border-yellow-200">
                                        <label for="qualification" class="block text-sm font-semibold text-gray-800 mb-2">
                                            🎓 المؤهل العلمي
                                        </label>
                                        <select
                                            id="qualification"
                                            v-model="form.qualification"
                                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-900 font-medium"
                                            :class="{ 'border-red-500 focus:border-red-500 focus:ring-red-500': form.errors.qualification }"
                                        >
                                            <option value="">اختر المؤهل...</option>
                                            <option value="دبلوم">دبلوم</option>
                                            <option value="بكالوريوس">بكالوريوس</option>
                                            <option value="ماجستير">ماجستير</option>
                                            <option value="دكتوراه">دكتوراه</option>
                                        </select>
                                        <p v-if="form.errors.qualification" class="text-red-600 text-sm mt-2 font-medium">{{ form.errors.qualification }}</p>
                                    </div>

                                    <!-- Specialization Field -->
                                    <div class="bg-teal-50 p-4 rounded-lg border border-teal-200">
                                        <label for="specialization" class="block text-sm font-semibold text-gray-800 mb-2">
                                            🏆 مجال التخصص
                                        </label>
                                        <input
                                            id="specialization"
                                            v-model="form.specialization"
                                            type="text"
                                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-900 font-medium"
                                            :class="{ 'border-red-500 focus:border-red-500 focus:ring-red-500': form.errors.specialization }"
                                            placeholder="مثال: تربية خاصة، تعليم عن بعد، تقنيات التعليم"
                                        >
                                        <p v-if="form.errors.specialization" class="text-red-600 text-sm mt-2 font-medium">{{ form.errors.specialization }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- تبويب الفصول -->
                            <div v-show="activeTab === 'classes'" class="space-y-6">
                                <!-- التبويبات الفرعية للفصول -->
                                <div class="bg-amber-50 border border-amber-200 rounded-lg p-6">
                                    <!-- التنقل بين إعداد الفصول وإدارة الفصول -->
                                    <div class="border-b border-amber-200 mb-6">
                                        <nav class="flex space-x-4 space-x-reverse" aria-label="Class Management Tabs">
                                            <button
                                                @click="classManagementActiveTab = 'classes-setup'"
                                                :class="[
                                                    'py-2 px-4 border-b-2 font-medium text-sm transition-colors rounded-t-lg',
                                                    classManagementActiveTab === 'classes-setup' 
                                                        ? 'border-amber-500 text-amber-700 bg-white' 
                                                        : 'border-transparent text-amber-600 hover:text-amber-800 hover:border-amber-300'
                                                ]"
                                            >
                                                ⚙️ إعداد الفصول
                                            </button>
                                            <button
                                                v-if="teacherClasses.some(c => c.stage && c.grade && c.className)"
                                                @click="classManagementActiveTab = 'classes-management'"
                                                :class="[
                                                    'py-2 px-4 border-b-2 font-medium text-sm transition-colors rounded-t-lg',
                                                    classManagementActiveTab === 'classes-management' 
                                                        ? 'border-amber-500 text-amber-700 bg-white' 
                                                        : 'border-transparent text-amber-600 hover:text-amber-800 hover:border-amber-300'
                                                ]"
                                            >
                                                👥 إدارة الفصول
                                            </button>
                                        </nav>
                                    </div>

                                    <!-- إعداد الفصول -->
                                    <div v-show="classManagementActiveTab === 'classes-setup'">
                                        <div class="flex items-center justify-between mb-6">
                                            <h3 class="text-xl font-bold text-amber-800 flex items-center gap-2">
                                                <span>📚</span>
                                                إعداد الفصول والمواد
                                            </h3>
                                            <button
                                                type="button"
                                                @click="addClass"
                                                class="bg-amber-600 hover:bg-amber-700 text-white px-4 py-2 rounded-lg transition-colors flex items-center gap-2"
                                            >
                                                <span>➕</span>
                                                إضافة فصل جديد
                                            </button>
                                        </div>

                                        <div class="space-y-6 max-h-96 overflow-auto">
                                            <div 
                                                v-for="(classItem, classIndex) in teacherClasses" 
                                                :key="classItem.id"
                                                class="bg-white border border-amber-200 rounded-lg p-4 shadow-sm"
                                            >
                                                <div class="flex items-center justify-between mb-4">
                                                    <h4 class="text-lg font-semibold text-amber-700">
                                                        فصل رقم {{ classIndex + 1 }}
                                                        <span v-if="classItem.className" class="text-amber-600 font-normal"> - {{ classItem.className }}</span>
                                                    </h4>
                                                    <button
                                                        v-if="teacherClasses.length > 1"
                                                        type="button"
                                                        @click="removeClass(classIndex)"
                                                        class="text-red-600 hover:text-red-800 p-1 rounded"
                                                        title="حذف الفصل"
                                                    >
                                                        🗑️
                                                    </button>
                                                </div>

                                                <!-- اختيار المرحلة والصف واسم الفصل -->
                                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                                                    <div>
                                                        <label class="block text-sm font-bold text-amber-700 mb-2">
                                                            المرحلة التعليمية *
                                                        </label>
                                                        <select
                                                            v-model="teacherClasses[classIndex].stage"
                                                            class="w-full px-3 py-2 border border-amber-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 bg-white text-gray-800"
                                                            required
                                                        >
                                                            <option value="">اختر المرحلة</option>
                                                            <option 
                                                                v-for="stage in stages" 
                                                                :key="stage.name" 
                                                                :value="stage.name"
                                                            >
                                                                {{ stage.name }}
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div>
                                                        <label class="block text-sm font-bold text-amber-700 mb-2">
                                                            الصف الدراسي *
                                                        </label>
                                                        <select
                                                            v-model="teacherClasses[classIndex].grade"
                                                            class="w-full px-3 py-2 border border-amber-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 bg-white text-gray-800"
                                                            :disabled="!teacherClasses[classIndex].stage"
                                                            required
                                                        >
                                                            <option value="">اختر الصف</option>
                                                            <option 
                                                                v-for="grade in getGradesForStage(teacherClasses[classIndex].stage)" 
                                                                :key="grade" 
                                                                :value="grade"
                                                            >
                                                                {{ grade }}
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div>
                                                        <label class="block text-sm font-bold text-amber-700 mb-2">
                                                            اسم الفصل *
                                                        </label>
                                                        <input
                                                            v-model="teacherClasses[classIndex].className"
                                                            type="text"
                                                            placeholder="مثل: أول/1، ثاني/أ، ثالث/ب"
                                                            class="w-full px-3 py-2 border border-amber-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 bg-white text-gray-800"
                                                            required
                                                        />
                                                    </div>
                                                </div>

                                                <!-- المواد الدراسية -->
                                                <div>
                                                    <div class="flex items-center justify-between mb-3">
                                                        <label class="block text-sm font-bold text-amber-700">
                                                            المواد الدراسية *
                                                        </label>
                                                        <button
                                                            type="button"
                                                            @click="addSubject(classIndex)"
                                                            class="text-amber-600 hover:text-amber-800 text-sm flex items-center gap-1"
                                                        >
                                                            <span>➕</span>
                                                            إضافة مادة
                                                        </button>
                                                    </div>

                                                    <div class="space-y-2 max-h-32 overflow-auto">
                                                        <div 
                                                            v-for="(subject, subjectIndex) in teacherClasses[classIndex].subjects" 
                                                            :key="subjectIndex"
                                                            class="flex items-center gap-2"
                                                        >
                                                            <input
                                                                v-model="teacherClasses[classIndex].subjects[subjectIndex]"
                                                                type="text"
                                                                placeholder="اسم المادة (مثل: الرياضيات، اللغة العربية، العلوم...)"
                                                                class="flex-1 px-3 py-2 border border-amber-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amber-500 text-gray-800"
                                                                required
                                                            />
                                                            <button
                                                                v-if="teacherClasses[classIndex].subjects.length > 1"
                                                                type="button"
                                                                @click="removeSubject(classIndex, subjectIndex)"
                                                                class="text-red-600 hover:text-red-800 p-1 rounded"
                                                                title="حذف المادة"
                                                            >
                                                                ❌
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- معلومات إضافية -->
                                        <div class="mt-6 p-4 bg-amber-100 rounded-lg">
                                            <h4 class="font-bold text-amber-800 mb-2">💡 نصائح:</h4>
                                            <ul class="text-sm text-amber-700 space-y-1">
                                                <li>• أدخل اسم الفصل بوضوح مثل: أول/1، ثاني/أ، ثالث/ب</li>
                                                <li>• يمكنك إضافة عدة فصول إذا كنت تدرس أكثر من صف</li>
                                                <li>• بعد إكمال الإعداد، ستتمكن من إدارة طلاب كل فصل</li>
                                                <li v-if="teacherClasses.length > 0" class="text-green-700 font-medium">
                                                    ✓ لديك {{ teacherClasses.length }} فصل محفوظ
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- إدارة الفصول -->
                                    <div v-show="classManagementActiveTab === 'classes-management'">
                                        <h3 class="text-xl font-bold text-amber-800 mb-6 flex items-center gap-2">
                                            <span>👥</span>
                                            إدارة الفصول والطلاب
                                        </h3>

                                        <!-- تبويبات الفصول الفردية -->
                                        <div class="border-b border-amber-200 mb-6">
                                            <nav class="flex space-x-2 space-x-reverse overflow-x-auto" aria-label="Individual Classes">
                                                <button
                                                    v-for="(classItem, index) in teacherClasses.filter(c => c.stage && c.grade && c.className)"
                                                    :key="classItem.id"
                                                    @click="selectedClassIndex = teacherClasses.findIndex(c => c.id === classItem.id)"
                                                    :class="[
                                                        'py-2 px-4 border-b-2 font-medium text-sm transition-colors rounded-t-lg whitespace-nowrap',
                                                        selectedClassIndex === teacherClasses.findIndex(c => c.id === classItem.id)
                                                            ? 'border-amber-500 text-amber-700 bg-white' 
                                                            : 'border-transparent text-amber-600 hover:text-amber-800 hover:border-amber-300'
                                                    ]"
                                                >
                                                    {{ classItem.className }} - {{ classItem.grade }}
                                                </button>
                                            </nav>
                                        </div>

                                        <!-- محتوى الفصل المختار -->
                                        <div v-if="teacherClasses[selectedClassIndex] && teacherClasses[selectedClassIndex].stage">
                                            <div class="bg-white border border-amber-200 rounded-lg p-6 shadow-sm">
                                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                                    <!-- معلومات الفصل -->
                                                    <div class="bg-amber-50 rounded-lg p-4">
                                                        <h4 class="font-bold text-amber-800 mb-3 flex items-center gap-2">
                                                            <span>📋</span>
                                                            معلومات الفصل
                                                        </h4>
                                                        <div class="space-y-2 text-sm">
                                                            <p><span class="font-semibold">اسم الفصل:</span> {{ teacherClasses[selectedClassIndex].className }}</p>
                                                            <p><span class="font-semibold">المرحلة:</span> {{ teacherClasses[selectedClassIndex].stage }}</p>
                                                            <p><span class="font-semibold">الصف:</span> {{ teacherClasses[selectedClassIndex].grade }}</p>
                                                            <p><span class="font-semibold">المواد:</span> {{ teacherClasses[selectedClassIndex].subjects.filter(s => s.trim()).join('، ') }}</p>
                                                            <p><span class="font-semibold">عدد الطلاب:</span> {{ teacherClasses[selectedClassIndex].students.length }}</p>
                                                        </div>
                                                    </div>

                                                    <!-- إدارة الطلاب -->
                                                    <div class="bg-blue-50 rounded-lg p-4">
                                                        <div class="flex items-center justify-between mb-3">
                                                            <h4 class="font-bold text-blue-800 flex items-center gap-2">
                                                                <span>👥</span>
                                                                إدارة الطلاب
                                                            </h4>
                                                            <div class="flex gap-2">
                                                                <button
                                                                    type="button"
                                                                    @click="addStudent(selectedClassIndex)"
                                                                    class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-xs flex items-center gap-1"
                                                                >
                                                                    <span>👤</span>
                                                                    إضافة طالب
                                                                </button>
                                                                <label class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-xs flex items-center gap-1 cursor-pointer">
                                                                    <span>📂</span>
                                                                    استيراد
                                                                    <input
                                                                        type="file"
                                                                        accept=".txt,.csv"
                                                                        @change="importStudents(selectedClassIndex, $event)"
                                                                        class="hidden"
                                                                    >
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <!-- قائمة الطلاب -->
                                                        <div class="max-h-64 overflow-auto">
                                                            <div v-if="teacherClasses[selectedClassIndex].students.length === 0" class="text-center text-gray-500 py-4">
                                                                لا يوجد طلاب مضافين بعد
                                                            </div>
                                                            <div v-else class="space-y-2">
                                                                <div 
                                                                    v-for="(student, studentIndex) in teacherClasses[selectedClassIndex].students" 
                                                                    :key="student.id"
                                                                    class="flex items-center justify-between bg-white p-2 rounded border"
                                                                >
                                                                    <div class="flex items-center gap-2">
                                                                        <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded">{{ student.number }}</span>
                                                                        <input
                                                                            v-model="student.name"
                                                                            type="text"
                                                                            placeholder="اسم الطالب"
                                                                            class="border-none outline-none bg-transparent flex-1"
                                                                        />
                                                                    </div>
                                                                    <button
                                                                        type="button"
                                                                        @click="removeStudent(selectedClassIndex, studentIndex)"
                                                                        class="text-red-600 hover:text-red-800 p-1"
                                                                        title="حذف الطالب"
                                                                    >
                                                                        🗑️
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end pt-8 border-t-2 border-gray-200">
                                <button
                                    type="submit"
                                    :disabled="form.processing"
                                    class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-8 py-4 rounded-xl hover:from-blue-700 hover:to-blue-800 focus:ring-4 focus:ring-blue-300 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed transition-all transform hover:scale-105 font-semibold text-lg shadow-lg"
                                >
                                    <span v-if="form.processing" class="flex items-center gap-2">
                                        <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        جاري الحفظ...
                                    </span>
                                    <span v-else class="flex items-center gap-2">
                                        💾 حفظ التغييرات
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </ArabicDashboardLayout>
</template>