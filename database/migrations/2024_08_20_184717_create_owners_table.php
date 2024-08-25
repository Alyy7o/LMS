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
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->unique()
                ->cascadeOnDelete();
            $table->string('status')->default('active');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('logo')->nullable();
            $table->string('tele_no')->unique();
            $table->string('mob_no')->unique();
            $table->string('school_name');
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};
