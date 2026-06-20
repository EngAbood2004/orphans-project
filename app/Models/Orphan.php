<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orphan extends Model
{
    protected $fillable = [
        'guardian_id',
        'full_name',
        'id_number',
        'orphan_type',
        'birth_date',
        'gender',
        'birth_place',
        'health_status',
        'education_level',
        'orphan_photo_path',
        'birth_certificate_path',
        'medical_report_path',
    ];

    public function guardian()
    {
        return $this->belongsTo(Guardian::class);
    }
}
