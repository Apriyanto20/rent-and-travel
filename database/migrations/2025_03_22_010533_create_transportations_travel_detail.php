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
        Schema::create('transportations_travel_detail', function (Blueprint $table) {
            $table->id();
            $table->string('codeDetailTransportation')->unique();
            $table->string('codeTransportation');
            $table->string('codeMerk');
            $table->string('driverCode');
            $table->string('vehicle_statuses');
            $table->string('license_plate');
            $table->string('color');
            $table->integer('seats');
            $table->string('model');
            $table->integer('production_year');
            $table->string('chassis_number');
            $table->string('engine_number');
            $table->integer('engine_capacity');
            $table->string('fuel_type');
            $table->string('transmission');
            $table->string('ownership_status');
            $table->date('registration_date');
            $table->date('tax_validity_date');
            $table->string('vehicle_condition');
            $table->string('insurance_status');
            $table->string('location');
            $table->string('photo_front')->nullable();
            $table->string('photo_right')->nullable();
            $table->string('photo_left')->nullable();
            $table->string('photo_back')->nullable();
            $table->text('notes')->nullable();
            $table->integer('user_id');
            $table->timestamps();

            /*$table->foreign('codeTransportation')->references('codeTransportation')->on('transportations')->onDelete('cascade');
            $table->foreign('codeMerk')->references('codeMerk')->on('merk')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportations_travel_detail');
    }
};
