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
        Schema::create('transactions_travel', function (Blueprint $table) {
            $table->id();
            $table->string('codeSchedule');
            $table->string('seat_code');
            $table->string('nik');
            $table->string('name');
            $table->integer('price');
            $table->string('paymentStatus');
            $table->string('paymentMethod');
            $table->string('rentalStatus');
            $table->string('proofOfPayment');
            $table->text('notes')->nullable();
            $table->timestamps();

            /*$table->foreign('codeSchedule')->references('codeSchedule')->on('schedule_travel')->onDelete('cascade');
            $table->foreign('seat_code')->references('seat_code')->on('detail_seat')->onDelete('cascade');
            $table->foreign('nik')->references('nik')->on('members')->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions_travel');
    }
};
