<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctor_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('hospital_en');
            $table->string('hospital_ar');
            $table->string('job_title_en');
            $table->string('job_title_ar');
            $table->text('description_en');
            $table->text('description_ar');
            $table->foreignId('doctor_id')->nullable()->constrained('doctors')->nullOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_experiences');
    }
};
