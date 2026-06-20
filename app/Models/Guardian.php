<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    protected $fillable = [
        'full_name', 'id_number', 'birth_date', 'marital_status',
        'relation_to_orphan', 'job', 'unmarried_orphans_count',
        'id_photo_path', 'guardianship_proof_path'
    ];

    public function father()
    {
        return $this->hasOne(Father::class);
    }

    public function mother()
    {
        return $this->hasOne(Mother::class);
    }

    public function orphans()
    {
        return $this->hasMany(Orphan::class);
    }
}
