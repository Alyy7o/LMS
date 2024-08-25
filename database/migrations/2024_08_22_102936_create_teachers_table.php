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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id') // Relates to the user who created the admin
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
            $table->foreignId('owner_id') // Relates to the user who created the admin
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
            $table->foreignId('admin_id') // Relates to the user who created the admin
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
            $table->string('f_name');
            $table->string('l_name');
            $table->string('cnic')->unique();
            $table->string('pic')->nullable();
            $table->string('gender');
            $table->date('date_of_birth');
            $table->string('blood_group');
            $table->string('religion')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('mob_no');
            $table->string('phone_no');
            $table->text('address');
            $table->decimal('salary', 10, 2);
            $table->string('doc_pic')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
