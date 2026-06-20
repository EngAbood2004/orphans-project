<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orphans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guardian_id')->constrained()->onDelete('cascade');
            $table->string('full_name');
            $table->string('id_number')->unique();
            $table->enum('orphan_type', ['father_only', 'both']);
            $table->date('birth_date');
            $table->enum('gender', ['male', 'female']);
            $table->string('birth_place');
            $table->string('health_status');
            $table->string('education_level');
            $table->string('orphan_photo_path');
            $table->string('birth_certificate_path');
            $table->string('medical_report_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orphans');
    }
};
