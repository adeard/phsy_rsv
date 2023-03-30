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
        Schema::create('booking_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('location_id');
            $table->integer('user_id');
            $table->integer('patient_id');
            $table->date('start_date')->nullable();
            $table->date('start_time')->nullable();
            $table->date('end_date')->nullable();
            $table->date('end_time')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_lists');
    }
};
