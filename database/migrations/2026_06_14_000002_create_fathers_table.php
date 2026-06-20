<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fathers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guardian_id')->constrained()->onDelete('cascade');
            $table->string('full_name');
            $table->string('id_number')->unique();
            $table->date('birth_date');
            $table->date('death_date')->nullable();
            $table->string('death_cause')->nullable();
            $table->string('job_before_death');
            $table->string('death_certificate_path');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fathers');
    }
};
