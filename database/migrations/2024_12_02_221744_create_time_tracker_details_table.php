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
        Schema::create('time_tracker_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('time_tracker_id');
            $table->foreignId('employee_id');
            $table->foreignId('type_hour_id');
            $table->date('date');
            $table->integer('hours');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_tracker_details');
    }
};
