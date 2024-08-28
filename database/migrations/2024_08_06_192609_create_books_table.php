<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Enums\OrderStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->enum('status', OrderStatus::values());
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('doctor_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('cancel_reason_id')->nullable();
            $table->foreign('cancel_reason_id')->references('id')->on('cancel_reasons')->onDelete('cascade');
            $table->date('date');
            $table->time('time');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
