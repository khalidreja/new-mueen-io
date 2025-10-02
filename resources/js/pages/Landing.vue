<template>
  <div dir="rtl" class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">
    <!-- Header -->
    <header class="bg-white shadow-sm">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-6">
          <div class="flex items-center">
            <h1 class="text-2xl font-bold text-gray-900" style="font-family: 'Cairo', sans-serif;">
              منصة التعليم الذكية
            </h1>
          </div>
          <div class="flex items-center space-x-4 space-x-reverse">
            <Link
              href="/login"
              class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition-colors"
            >
              تسجيل الدخول
            </Link>
            <Link
              href="/register"
              class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-2 rounded-lg transition-colors"
            >
              إنشاء حساب جديد
            </Link>
          </div>
        </div>
      </div>
    </header>

    <!-- Hero Section -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
      <div class="text-center">
        <h2 class="text-4xl font-bold text-gray-900 mb-6" style="font-family: 'Cairo', sans-serif;">
          أدوات ذكية لتطوير التعليم
        </h2>
        <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
          منصة شاملة تساعد المعلمين على إنشاء خطط الدروس، وتوليد الأنشطة التعليمية، والتواصل مع أولياء الأمور باستخدام الذكاء الاصطناعي
        </p>
        
        <div class="flex justify-center space-x-4 space-x-reverse mb-16">
          <Link
            href="/register"
            class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg text-lg font-semibold transition-colors"
          >
            ابدأ الآن مجاناً
          </Link>
          <Link
            href="/login"
            class="bg-white hover:bg-gray-50 text-blue-600 border-2 border-blue-600 px-8 py-3 rounded-lg text-lg font-semibold transition-colors"
          >
            لديك حساب؟ سجل دخولك
          </Link>
        </div>
      </div>

      <!-- Features Grid -->
      <div class="grid md:grid-cols-3 gap-8 mt-16">
        <div class="bg-white p-6 rounded-xl shadow-md">
          <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-gray-900 mb-2">خطط الدروس الذكية</h3>
          <p class="text-gray-600">
            إنشاء خطط دروس شاملة ومتخصصة باستخدام الذكاء الاصطناعي لتوفير الوقت والجهد
          </p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md">
          <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-gray-900 mb-2">أنشطة تفاعلية</h3>
          <p class="text-gray-600">
            توليد أنشطة تعليمية متنوعة وتفاعلية تناسب مختلف أساليب التعلم للطلاب
          </p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md">
          <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-gray-900 mb-2">التواصل مع أولياء الأمور</h3>
          <p class="text-gray-600">
            إنشاء رسائل مخصصة ومهنية للتواصل الفعال مع أولياء الأمور حول تقدم الطلاب
          </p>
        </div>
      </div>

      <!-- CTA Section -->
      <div class="bg-blue-600 rounded-2xl p-8 mt-16 text-center text-white">
        <h3 class="text-3xl font-bold mb-4">جاهز لتطوير تجربة التعليم؟</h3>
        <p class="text-xl mb-6 opacity-90">
          انضم إلى آلاف المعلمين الذين يستخدمون منصتنا لتحسين جودة التعليم
        </p>
        <Link
          href="/register"
          class="bg-white text-blue-600 px-8 py-3 rounded-lg text-lg font-semibold hover:bg-gray-100 transition-colors inline-block"
        >
          ابدأ رحلتك التعليمية الآن
        </Link>
      </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-16">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="text-gray-400">
          © 2024 منصة التعليم الذكية. جميع الحقوق محفوظة.
        </p>
      </div>
    </footer>
  </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

defineOptions({
  layout: false, // لا نريد layout افتراضي  
});
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap');
</style>