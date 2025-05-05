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
            $table->string('nik')->unique();
            $table->string('name');
            $table->string('phoneNumber');
            $table->string('email');
            $table->text('address');
            $table->date('dateOfBirth');
            $table->string('gender');
            $table->string('photo');
            $table->string('photoKtp');
            $table->timestamps();

            $table->foreign('email')->references('email')->on('users')->onDelete('cascade');
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
