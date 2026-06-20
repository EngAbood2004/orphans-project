<?php

namespace App\Services;

use App\Models\Guardian;
use App\Models\Father;
use App\Models\Mother;
use App\Models\Orphan;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class OrphanRegistrationService
{
    /**
     * حفظ جميع بيانات التسجيل
     */
    public function store(array $data): Guardian
    {
        // استخدام Transaction عشان لو فشل أي جزء، يرجع كل شيء
        return DB::transaction(function () use ($data) {
            // 1. حفظ الوصي
            $guardian = $this->createGuardian($data);

            // 2. حفظ الأب
            $this->createFather($data, $guardian->id);

            // 3. حفظ الأم
            $this->createMother($data, $guardian->id);

            // 4. حفظ الأيتام
            $this->createOrphans($data['orphans'], $guardian->id);

            return $guardian;
        });
    }

    /**
     * حفظ الوصي
     */
    private function createGuardian(array $data): Guardian
    {
        return Guardian::create([
            'full_name' => $data['guardian_full_name'],
            'id_number' => $data['guardian_id_number'],
            'birth_date' => $data['guardian_birth_date'],
            'marital_status' => $data['guardian_marital_status'],
            'relation_to_orphan' => $data['guardian_relation'],
            'job' => $data['guardian_job'],
            'unmarried_orphans_count' => $data['unmarried_orphans_count'],
            'id_photo_path' => $this->uploadFile($data['guardian_id_photo'], 'guardians_ids'),
            'guardianship_proof_path' => $this->uploadFile($data['guardianship_proof'], 'guardianship_proofs'),
        ]);
    }

    /**
     * حفظ الأب
     */
    private function createFather(array $data, int $guardianId): Father
    {
        return Father::create([
            'guardian_id' => $guardianId,
            'full_name' => $data['father_name'],
            'id_number' => $data['father_id_number'],
            'birth_date' => $data['father_birth_date'],
            'death_date' => $data['father_death_date'] ?? null,
            'death_cause' => $data['father_death_cause'] ?? null,
            'job_before_death' => $data['father_job'],
            'death_certificate_path' => $this->uploadFile($data['father_death_certificate'], 'death_certificates'),
        ]);
    }

    /**
     * حفظ الأم
     */
    private function createMother(array $data, int $guardianId): Mother
    {
        $motherData = [
            'guardian_id' => $guardianId,
            'full_name' => $data['mother_name'],
            'id_number' => $data['mother_id_number'],
            'birth_date' => $data['mother_birth_date'],
            'death_date' => $data['mother_death_date'] ?? null,
            'marital_status' => $data['mother_marital_status'],
            'job' => $data['mother_job'],
            'id_photo_path' => $this->uploadFile($data['mother_id_photo'], 'mothers_ids'),
        ];

        // إذا وجدت شهادة وفاة للأم
        if (isset($data['mother_death_certificate'])) {
            $motherData['death_certificate_path'] = $this->uploadFile($data['mother_death_certificate'], 'death_certificates');
        }

        return Mother::create($motherData);
    }

    /**
     * حفظ الأيتام (متعددين)
     */
    private function createOrphans(array $orphans, int $guardianId): void
    {
        foreach ($orphans as $orphanData) {
            Orphan::create([
                'guardian_id' => $guardianId,
                'full_name' => $orphanData['name'],
                'id_number' => $orphanData['id_number'],
                'orphan_type' => $orphanData['type'],
                'birth_date' => $orphanData['birth_date'],
                'gender' => $orphanData['gender'],
                'birth_place' => $orphanData['birth_place'],
                'health_status' => $orphanData['health_status'],
                'education_level' => $orphanData['education_level'],
                'orphan_photo_path' => $this->uploadFile($orphanData['photo'], 'orphan_photos'),
                'birth_certificate_path' => $this->uploadFile($orphanData['birth_certificate'], 'birth_certificates'),
                'medical_report_path' => isset($orphanData['medical_report'])
                    ? $this->uploadFile($orphanData['medical_report'], 'medical_reports')
                    : null,
            ]);
        }
    }

    /**
     * رفع الملف وتخزينه
     */
    private function uploadFile(UploadedFile $file, string $folder): string
    {
        return $file->store($folder, 'public');
    }
}
