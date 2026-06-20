<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mother extends Model
{
    protected $fillable = [
        'guardian_id',
        'full_name',
        'id_number',
        'birth_date',
        'death_date',
        'marital_status',
        'job',
        'id_photo_path',
        'death_certificate_path',
    ];

    public function guardian()
    {
        return $this->belongsTo(Guardian::class);
    }
}
