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
        Schema::create('transactions_rental', function (Blueprint $table) {
            $table->id();
            $table->string('codeTransaction');
            $table->string('memberCode');
            $table->string('codeRentalOption');
            $table->string('codeDetailTransportation')->nullable();
            $table->string('driverCode')->nullable();
            $table->date('rentalStartDate');
            $table->date('rentalEndDate');
            $table->integer('rentalCost');
            $table->string('paymentStatus');
            $table->string('paymentMethod');
            $table->string('rentalStatus');
            $table->string('proofOfPayment')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            /*$table->foreign('memberCode')->references('nik')->on('members')->onDelete('cascade');
            $table->foreign('codeRentalOption')->references('codeRentalOption')->on('rental_options')->onDelete('cascade');
            $table->foreign('codeDetailTransportation')->references('codeDetailTransportation')->on('transportations_rental_detail')->onDelete('cascade');
            $table->foreign('driverCode')->references('nik')->on('drivers')->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions_rental');
    }
};
