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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('name');
            $table->string('driverLicenseNumber');
            $table->string('licenseType');
            $table->string('licenseValidityDate');
            $table->text('address');
            $table->string('phoneNumber');
            $table->string('email');
            $table->date('dateOfBirth');
            $table->string('status');
            $table->integer('workExperience');
            $table->date('startDate');
            $table->string('maritalStatus');
            $table->string('photo');
            $table->string('photoKtp');
            $table->text('notes');
            $table->integer('prices');
            $table->integer('userId');
            $table->timestamps();

            //$table->foreign('email')->references('email')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
