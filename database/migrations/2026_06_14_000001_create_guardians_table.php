<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('id_number')->unique();
            $table->date('birth_date');
            $table->string('marital_status');
            $table->string('relation_to_orphan');
            $table->string('job');
            $table->integer('unmarried_orphans_count')->default(0);
            $table->string('id_photo_path');
            $table->string('guardianship_proof_path');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guardians');
    }
};
