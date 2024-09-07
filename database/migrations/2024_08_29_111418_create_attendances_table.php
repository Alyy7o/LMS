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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')
                ->references('id')
                ->on('students')
                ->cascadeOnDelete();
            $table->foreignId('section_id')
                ->references('id')
                ->on('sections')
                ->cascadeOnDelete();
            $table->foreignId('teacher_id')
                ->references('id')
                ->on('teachers')
                ->cascadeOnDelete();
            $table->dateTime('date');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
