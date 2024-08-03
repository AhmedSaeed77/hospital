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
        Schema::create('doctor_qualifications', function (Blueprint $table) {
            $table->id();
            $table->string('university_en');
            $table->string('university_ar');
            $table->string('college_en');
            $table->string('college_ar');
            $table->string('degree_en');
            $table->string('degree_ar');
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
        Schema::dropIfExists('doctor_qualifications');
    }
};
