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
        Schema::create('patients_appoiments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pation_id');
            $table->bigInteger('doctor_id');
            $table->bigInteger('tc_id');
            $table->bigInteger('section_id');
            $table->date('date');
            $table->String('note')->nullable(true);
            $table->String('status')->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients_appoiments');
    }
};
