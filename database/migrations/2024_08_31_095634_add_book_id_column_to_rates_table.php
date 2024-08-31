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
        Schema::table('rates', function (Blueprint $table) {
            $table->unsignedBigInteger('book_id')->after('doctor_id')->nullable();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade'); // Add a foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rates', function (Blueprint $table) {
            $table->dropForeign(['book_id']); // Drop the foreign key constraint
            $table->dropColumn('book_id'); // Drop the column
        });
    }
};
