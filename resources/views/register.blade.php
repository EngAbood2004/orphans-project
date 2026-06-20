@extends('layouts.app')

@section('title', 'التسجيل - ديوان الأيتام')

@section('content')
    <div class="luxury-card rounded-3xl p-8 md:p-12 w-full" x-data="registrationForm()" x-init="init()">

        <!-- التاج والزخرفة -->
        <div class="text-center mb-10">
            <div class="ornament mb-4">✦ ✦ ✦ ✦ ✦</div>
            <div class="inline-block p-6 rounded-full gold-border bg-[rgba(212,175,55,0.03)] mb-6">
                <span class="text-6xl gold-icon">🕌</span>
            </div>
            <h1 class="text-5xl md:text-6xl font-black luxury-title gold-text gold-glow">
                تسجيل الأيتام
            </h1>
            <p class="text-[#f0e6d3]/40 text-lg mt-3 tracking-wider">سجل يتيمًا واحصل على أجر عظيم</p>
            <div class="gold-divider w-2/3 mx-auto mt-6"></div>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="mb-8 p-6 rounded-2xl gold-border bg-[rgba(212,175,55,0.03)] text-center">
                <span class="text-3xl gold-icon block mb-2">✨</span>
                <span class="text-[#d4af37] font-bold text-lg">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data" class="space-y-10">
            @csrf

            <!-- ===== بيانات الوصي ===== -->
            <div class="space-y-5">
                <div class="flex items-center justify-center gap-4">
                    <span class="text-3xl gold-icon">👨‍💼</span>
                    <h2 class="text-2xl font-bold gold-text text-center">بيانات الوصي</h2>
                    <span class="px-4 py-1 text-xs rounded-full gold-border text-[#d4af37]">الخطوة الأولى</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 max-w-3xl mx-auto">
                    <div class="md:col-span-2">
                        <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">اسم الوصي كاملاً</label>
                        <input type="text" name="guardian_full_name"
                            class="luxury-input w-full px-5 py-4 rounded-2xl text-center text-lg"
                            placeholder="اكتب اسم الوصي الثلاثي" required>
                    </div>
                    <div>
                        <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">رقم الهوية</label>
                        <input type="text" name="guardian_id_number"
                            class="luxury-input w-full px-5 py-4 rounded-2xl text-center" placeholder="رقم الهوية" required>
                    </div>
                    <div>
                        <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">تاريخ الميلاد</label>
                        <input type="date" name="guardian_birth_date"
                            class="luxury-input w-full px-5 py-4 rounded-2xl text-center" required>
                    </div>
                    <div>
                        <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">الحالة الاجتماعية</label>
                        <select name="guardian_marital_status"
                            class="luxury-input w-full px-5 py-4 rounded-2xl text-center appearance-none">
                            <option value="أعزب" class="bg-black">أعزب</option>
                            <option value="متزوج" class="bg-black">متزوج</option>
                            <option value="مطلق" class="bg-black">مطلق</option>
                            <option value="أرمل" class="bg-black">أرمل</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">صلة القرابة</label>
                        <input type="text" name="guardian_relation"
                            class="luxury-input w-full px-5 py-4 rounded-2xl text-center" placeholder="مثل: عم، خال، جد"
                            required>
                    </div>
                    <div>
                        <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">الوظيفة</label>
                        <input type="text" name="guardian_job"
                            class="luxury-input w-full px-5 py-4 rounded-2xl text-center" placeholder="الوظيفة الحالية"
                            required>
                    </div>
                    <div>
                        <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">عدد الأيتام</label>
                        <input type="number" name="unmarried_orphans_count"
                            class="luxury-input w-full px-5 py-4 rounded-2xl text-center" min="0" value="0"
                            required>
                    </div>
                    <div>
                        <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">صورة الهوية</label>
                        <input type="file" name="guardian_id_photo"
                            class="luxury-input w-full px-5 py-4 rounded-2xl text-center file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-[rgba(212,175,55,0.1)] file:text-[#d4af37] hover:file:bg-[rgba(212,175,55,0.2)] cursor-pointer"
                            accept="image/*,application/pdf" required>
                    </div>
                    <div>
                        <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">حجة الوصاية</label>
                        <input type="file" name="guardianship_proof"
                            class="luxury-input w-full px-5 py-4 rounded-2xl text-center file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-[rgba(212,175,55,0.1)] file:text-[#d4af37] hover:file:bg-[rgba(212,175,55,0.2)] cursor-pointer"
                            accept="image/*,application/pdf" required>
                    </div>
                </div>
            </div>

            <div class="gold-divider"></div>

            <!-- ===== بيانات الأب ===== -->
            <div class="space-y-5">
                <div class="flex items-center justify-center gap-4">
                    <span class="text-3xl gold-icon">👨‍🦳</span>
                    <h2 class="text-2xl font-bold gold-text text-center">بيانات الأب</h2>
                    <span class="px-4 py-1 text-xs rounded-full gold-border text-[#d4af37]">الخطوة الثانية</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 max-w-3xl mx-auto">
                    <div class="md:col-span-2">
                        <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">اسم الأب رباعياً</label>
                        <input type="text" name="father_name"
                            class="luxury-input w-full px-5 py-4 rounded-2xl text-center text-lg"
                            placeholder="الاسم الكامل للأب" required>
                    </div>
                    <div>
                        <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">رقم هوية الأب</label>
                        <input type="text" name="father_id_number"
                            class="luxury-input w-full px-5 py-4 rounded-2xl text-center" placeholder="رقم الهوية" required>
                    </div>
                    <div>
                        <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">تاريخ ميلاد الأب</label>
                        <input type="date" name="father_birth_date"
                            class="luxury-input w-full px-5 py-4 rounded-2xl text-center" required>
                    </div>
                    <div>
                        <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">تاريخ وفاة الأب</label>
                        <input type="date" name="father_death_date"
                            class="luxury-input w-full px-5 py-4 rounded-2xl text-center">
                    </div>
                    <div>
                        <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">سبب الوفاة</label>
                        <input type="text" name="father_death_cause"
                            class="luxury-input w-full px-5 py-4 rounded-2xl text-center" placeholder="سبب الوفاة">
                    </div>
                    <div>
                        <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">وظيفة الأب</label>
                        <input type="text" name="father_job"
                            class="luxury-input w-full px-5 py-4 rounded-2xl text-center" placeholder="الوظيفة السابقة"
                            required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">شهادة وفاة الأب</label>
                        <input type="file" name="father_death_certificate"
                            class="luxury-input w-full px-5 py-4 rounded-2xl text-center file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-[rgba(212,175,55,0.1)] file:text-[#d4af37] hover:file:bg-[rgba(212,175,55,0.2)] cursor-pointer"
                            accept="image/*,application/pdf" required>
                    </div>
                </div>
            </div>

            <div class="gold-divider"></div>

            <!-- ===== بيانات الأم ===== -->
            <div class="space-y-5">
                <div class="flex items-center justify-center gap-4">
                    <span class="text-3xl gold-icon">👩‍🦳</span>
                    <h2 class="text-2xl font-bold gold-text text-center">بيانات الأم</h2>
                    <span class="px-4 py-1 text-xs rounded-full gold-border text-[#d4af37]">الخطوة الثالثة</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 max-w-3xl mx-auto">
                    <div class="md:col-span-2">
                        <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">اسم الأم رباعياً</label>
                        <input type="text" name="mother_name"
                            class="luxury-input w-full px-5 py-4 rounded-2xl text-center text-lg"
                            placeholder="الاسم الكامل للأم" required>
                    </div>
                    <div>
                        <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">رقم هوية الأم</label>
                        <input type="text" name="mother_id_number"
                            class="luxury-input w-full px-5 py-4 rounded-2xl text-center" placeholder="رقم الهوية"
                            required>
                    </div>
                    <div>
                        <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">تاريخ ميلاد الأم</label>
                        <input type="date" name="mother_birth_date"
                            class="luxury-input w-full px-5 py-4 rounded-2xl text-center" required>
                    </div>
                    <div>
                        <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">تاريخ وفاة الأم</label>
                        <input type="date" name="mother_death_date"
                            class="luxury-input w-full px-5 py-4 rounded-2xl text-center">
                    </div>
                    <div>
                        <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">الحالة الاجتماعية</label>
                        <select name="mother_marital_status"
                            class="luxury-input w-full px-5 py-4 rounded-2xl text-center appearance-none">
                            <option value="متزوجة" class="bg-black">متزوجة</option>
                            <option value="أرملة" class="bg-black">أرملة</option>
                            <option value="مطلقة" class="bg-black">مطلقة</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">وظيفة الأم</label>
                        <input type="text" name="mother_job"
                            class="luxury-input w-full px-5 py-4 rounded-2xl text-center" placeholder="الوظيفة الحالية"
                            required>
                    </div>
                    <div>
                        <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">صورة هوية الأم</label>
                        <input type="file" name="mother_id_photo"
                            class="luxury-input w-full px-5 py-4 rounded-2xl text-center file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-[rgba(212,175,55,0.1)] file:text-[#d4af37] hover:file:bg-[rgba(212,175,55,0.2)] cursor-pointer"
                            accept="image/*,application/pdf" required>
                    </div>
                    <div>
                        <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">شهادة وفاة الأم</label>
                        <input type="file" name="mother_death_certificate"
                            class="luxury-input w-full px-5 py-4 rounded-2xl text-center file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-[rgba(212,175,55,0.1)] file:text-[#d4af37] hover:file:bg-[rgba(212,175,55,0.2)] cursor-pointer"
                            accept="image/*,application/pdf">
                    </div>
                </div>
            </div>

            <div class="gold-divider"></div>

            <!-- ===== بيانات الأيتام ===== -->
            <div class="space-y-5">
                <div class="flex items-center justify-center gap-4 flex-wrap">
                    <span class="text-3xl gold-icon">👶</span>
                    <h2 class="text-2xl font-bold gold-text text-center">بيانات الأيتام</h2>
                    <span class="px-4 py-1 text-xs rounded-full gold-border text-[#d4af37]">الخطوة الرابعة</span>
                    <button type="button" @click="addOrphan"
                        class="px-5 py-2 rounded-xl gold-border text-[#d4af37] hover:bg-[rgba(212,175,55,0.05)] transition-all duration-300 text-sm">
                        ➕ إضافة يتيم
                    </button>
                </div>

                <div id="orphans-container" class="space-y-6 max-w-3xl mx-auto">
                    <template x-for="(orphan, index) in orphans" :key="index">
                        <div class="luxury-card rounded-2xl p-6 border border-[rgba(212,175,55,0.1)] relative">
                            <button type="button" @click="removeOrphan(index)" x-show="orphans.length > 1"
                                class="absolute top-3 right-3 text-[#f0e6d3]/30 hover:text-red-400 transition-colors duration-300">
                                ✕
                            </button>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="hidden" :name="`orphans[${index}][index]`" :value="index">
                                <div class="md:col-span-2">
                                    <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">اسم اليتيم</label>
                                    <input type="text" :name="`orphans[${index}][name]`"
                                        class="luxury-input w-full px-4 py-3 rounded-xl text-center"
                                        placeholder="اسم اليتيم" required>
                                </div>
                                <div>
                                    <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">رقم الهوية</label>
                                    <input type="text" :name="`orphans[${index}][id_number]`"
                                        class="luxury-input w-full px-4 py-3 rounded-xl text-center"
                                        placeholder="رقم الهوية" required>
                                </div>
                                <div>
                                    <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">نوع اليتم</label>
                                    <select :name="`orphans[${index}][type]`"
                                        class="luxury-input w-full px-4 py-3 rounded-xl text-center appearance-none">
                                        <option value="father_only" class="bg-black">يتيم الأب فقط</option>
                                        <option value="both" class="bg-black">يتيم الأب والأم</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">تاريخ الميلاد</label>
                                    <input type="date" :name="`orphans[${index}][birth_date]`"
                                        class="luxury-input w-full px-4 py-3 rounded-xl text-center" required>
                                </div>
                                <div>
                                    <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">الجنس</label>
                                    <select :name="`orphans[${index}][gender]`"
                                        class="luxury-input w-full px-4 py-3 rounded-xl text-center appearance-none">
                                        <option value="male" class="bg-black">ذكر</option>
                                        <option value="female" class="bg-black">أنثى</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">مكان الميلاد</label>
                                    <input type="text" :name="`orphans[${index}][birth_place]`"
                                        class="luxury-input w-full px-4 py-3 rounded-xl text-center" placeholder="المدينة"
                                        required>
                                </div>
                                <div>
                                    <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">الحالة الصحية</label>
                                    <input type="text" :name="`orphans[${index}][health_status]`"
                                        class="luxury-input w-full px-4 py-3 rounded-xl text-center"
                                        placeholder="سليم / يعاني من..." required>
                                </div>
                                <div>
                                    <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">المرحلة
                                        الدراسية</label>
                                    <input type="text" :name="`orphans[${index}][education_level]`"
                                        class="luxury-input w-full px-4 py-3 rounded-xl text-center"
                                        placeholder="ابتدائي / ثانوي / جامعي" required>
                                </div>
                                <div>
                                    <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">صورة اليتيم</label>
                                    <input type="file" :name="`orphans[${index}][photo]`"
                                        class="luxury-input w-full px-4 py-3 rounded-xl text-center file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-[rgba(212,175,55,0.1)] file:text-[#d4af37] hover:file:bg-[rgba(212,175,55,0.2)] cursor-pointer"
                                        accept="image/*" required>
                                </div>
                                <div>
                                    <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">شهادة الميلاد</label>
                                    <input type="file" :name="`orphans[${index}][birth_certificate]`"
                                        class="luxury-input w-full px-4 py-3 rounded-xl text-center file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-[rgba(212,175,55,0.1)] file:text-[#d4af37] hover:file:bg-[rgba(212,175,55,0.2)] cursor-pointer"
                                        accept="image/*,application/pdf" required>
                                </div>
                                <div>
                                    <label class="block text-[#f0e6d3]/60 text-sm mb-2 text-center">تقرير طبي</label>
                                    <input type="file" :name="`orphans[${index}][medical_report]`"
                                        class="luxury-input w-full px-4 py-3 rounded-xl text-center file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-[rgba(212,175,55,0.1)] file:text-[#d4af37] hover:file:bg-[rgba(212,175,55,0.2)] cursor-pointer"
                                        accept="image/*,application/pdf">
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- زر الحفظ الفخم -->
            <div class="text-center pt-6">
                <button type="submit"
                    class="luxury-btn px-16 py-5 rounded-2xl text-black font-black text-xl tracking-widest transition-all duration-300">
                    💎 حفظ البيانات
                </button>
                <p class="text-[#f0e6d3]/20 text-sm mt-5 tracking-widest">جميع البيانات محفوظة بأمان</p>
            </div>
        </form>
          <div class="text-center pt-8 border-t border-[rgba(212,175,55,0.1)] mt-8">
            <p class="text-[#d4af37] text-sm tracking-widest mb-4">✧ شارك هذا الرابط ✧</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="https://wa.me/?text={{ urlencode(url('/')) }}"
                   target="_blank"
                   class="luxury-btn px-8 py-3 rounded-2xl text-black font-bold text-sm tracking-wider transition-all duration-300 flex items-center gap-2">
                    <span>📱</span> واتساب
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('/')) }}"
                   target="_blank"
                   class="luxury-btn px-8 py-3 rounded-2xl text-black font-bold text-sm tracking-wider transition-all duration-300 flex items-center gap-2">
                    <span>📘</span> فيسبوك
                </a>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url('/')) }}&text=سجل%20يتيمًا%20واحصل%20على%20أجر%20عظيم"
                   target="_blank"
                   class="luxury-btn px-8 py-3 rounded-2xl text-black font-bold text-sm tracking-wider transition-all duration-300 flex items-center gap-2">
                    <span>🐦</span> تويتر
                </a>
                <button onclick="navigator.clipboard.writeText(window.location.href); alert('تم نسخ الرابط! 📋')"
                        class="luxury-btn px-8 py-3 rounded-2xl text-black font-bold text-sm tracking-wider transition-all duration-300 flex items-center gap-2">
                    <span>📋</span> نسخ الرابط
                </button>
            </div>
            <p class="text-[#f0e6d3]/20 text-xs mt-3 tracking-wider">انشر الرابط ليستفيد أكبر عدد من الأيتام</p>
        </div>
    </form>
</div>
    </div>

    <script>
        function registrationForm() {
            return {
                orphans: [{
                    id: 1
                }],
                progress: 0,
                init() {
                    this.updateProgress();
                },
                addOrphan() {
                    this.orphans.push({
                        id: this.orphans.length + 1
                    });
                    this.updateProgress();
                },
                removeOrphan(index) {
                    if (this.orphans.length > 1) {
                        this.orphans.splice(index, 1);
                        this.updateProgress();
                    }
                },
                updateProgress() {
                    // يمكنك إضافة منطق حساب التقدم هنا
                }
            }
        }
    </script>
@endsection
