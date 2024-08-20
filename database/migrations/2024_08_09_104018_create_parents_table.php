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
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no')->unique();
            $table->string('f_name');
            $table->string('l_name');
            $table->string('gender');
            $table->string('occupation');
            $table->string('blood_group');
            $table->string('religion')->nullable();
            $table->string('email')->unique();
            $table->string('address');
            $table->string('phone')->unique();
            $table->text('about')->nullable();
            $table->string('pic')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
