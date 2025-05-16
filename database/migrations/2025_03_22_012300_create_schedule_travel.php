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
        Schema::create('schedule_travel', function (Blueprint $table) {
            $table->id();
            $table->string('codeSchedule')->unique();
            $table->string('codeRoute');
            $table->string('codeDetailTransportation');
            $table->timestamps();

            /*$table->foreign('codeRoute')->references('codeRoute')->on('transportation_route')->onDelete('cascade');
            $table->foreign('codeDetailTransportation')->references('codeDetailTransportation')->on('transportations_travel_detail')->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_travel');
    }
};
