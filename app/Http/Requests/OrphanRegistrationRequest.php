<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrphanRegistrationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // يسمح للجميع بالتسجيل
    }

    public function rules(): array
    {
        return [
            // بيانات الوصي
            'guardian_id_number' => 'required|string|unique:guardians,id_number|max:20',
            'guardian_full_name' => 'required|string|max:255',
            'guardian_birth_date' => 'required|date|before:today',
            'guardian_marital_status' => 'required|string|in:أعزب,متزوج,مطلق,أرمل',
            'guardian_relation' => 'required|string|max:255',
            'guardian_job' => 'required|string|max:255',
            'unmarried_orphans_count' => 'required|integer|min:0',
            'guardian_id_photo' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'guardianship_proof' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',

            // بيانات الأب
            'father_name' => 'required|string|max:255',
            'father_id_number' => 'required|string|unique:fathers,id_number|max:20',
            'father_birth_date' => 'required|date|before:today',
            'father_death_date' => 'nullable|date|before:today',
            'father_death_cause' => 'nullable|string|max:255',
            'father_job' => 'required|string|max:255',
            'father_death_certificate' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',

            // بيانات الأم
            'mother_name' => 'required|string|max:255',
            'mother_id_number' => 'required|string|unique:mothers,id_number|max:20',
            'mother_birth_date' => 'required|date|before:today',
            'mother_death_date' => 'nullable|date|before:today',
            'mother_marital_status' => 'required|string|in:متزوجة,أرملة,مطلقة',
            'mother_job' => 'required|string|max:255',
            'mother_id_photo' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'mother_death_certificate' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',

            // بيانات الأيتام (Array)
            'orphans' => 'required|array|min:1',
            'orphans.*.name' => 'required|string|max:255',
            'orphans.*.id_number' => 'required|string|unique:orphans,id_number|max:20',
            'orphans.*.type' => 'required|in:father_only,both',
            'orphans.*.birth_date' => 'required|date|before:today',
            'orphans.*.gender' => 'required|in:male,female',
            'orphans.*.birth_place' => 'required|string|max:255',
            'orphans.*.health_status' => 'required|string|max:255',
            'orphans.*.education_level' => 'required|string|max:255',
            'orphans.*.photo' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'orphans.*.birth_certificate' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'orphans.*.medical_report' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'guardian_full_name.required' => 'اسم الوصي مطلوب',
            'guardian_id_number.unique' => 'رقم الهوية هذا مسجل مسبقاً',
            'guardian_birth_date.before' => 'تاريخ الميلاد يجب أن يكون قبل اليوم',
            'orphans.*.id_number.unique' => 'رقم هوية اليتيم مسجل مسبقاً',
            'guardian_id_photo.required' => 'صورة هوية الوصي مطلوبة',
            'father_death_certificate.required' => 'شهادة وفاة الأب مطلوبة',
            // يمكنك إضافة رسائل مخصصة لكل حقل
            'orphans.*.photo.required' => 'صورة اليتيم مطلوبة',
            'orphans.*.birth_certificate.required' => 'شهادة ميلاد اليتيم مطلوبة',
            'orphans.*.medical_report.required' => 'تقرير طبي اليتيم مطلوب',
        ];
    }
}
