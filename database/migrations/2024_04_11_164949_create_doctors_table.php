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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('specialties_id');
            $table->date('dateofbrith');
            $table->String('gender');
            $table->String('adress');
            $table->String('phone');
            $table->String('note')->nullable(true);
            $table->bigInteger('user_id');
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
        Schema::dropIfExists('doctors');
    }
};
