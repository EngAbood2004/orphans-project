<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Father extends Model
{
    protected $fillable = [
        'guardian_id',
        'full_name',
        'id_number',
        'birth_date',
        'death_date',
        'death_cause',
        'job_before_death',
        'death_certificate_path',
    ];

    public function guardian()
    {
        return $this->belongsTo(Guardian::class);
    }
}
