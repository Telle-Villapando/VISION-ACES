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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('firstName');
            $table->string('middleName');
            $table->string('lastName');
            $table->string('studentNumber');
            $table->string('course');
            $table->string('yearLevel');
            $table->string('contactNumber');
            $table->enum('studentStatus', ['regular', 'irregular', 'dropped', 'alumni'])->default('regular');
            $table->string('gender');
            $table->date('birthDate');
            
            $table->integer('age');
            $table->string('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
