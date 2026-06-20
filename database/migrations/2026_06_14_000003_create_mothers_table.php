<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mothers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guardian_id')->constrained()->onDelete('cascade');
            $table->string('full_name');
            $table->string('id_number')->unique();
            $table->date('birth_date');
            $table->date('death_date')->nullable();
            $table->string('marital_status');
            $table->string('job');
            $table->string('id_photo_path');
            $table->string('death_certificate_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mothers');
    }
};
