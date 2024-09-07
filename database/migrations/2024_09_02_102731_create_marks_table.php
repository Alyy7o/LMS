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
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')
            ->references('id')
            ->on('students')
            ->cascadeOnDelete();
        $table->foreignId('subject_id')
            ->references('id')
            ->on('subjects')
            ->cascadeOnDelete();
            $table->integer('obtained_marks');
            $table->integer('total_marks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marks');
    }
};
