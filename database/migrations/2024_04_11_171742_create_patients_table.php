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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->String('dig');
            $table->date('dateofbrith');
            $table->String('gender');
            $table->String('adress');
            $table->String('phone');
            $table->String('note')->nullable(true);
            $table->bigInteger('user_id');
            $table->bigInteger('tc_id');            
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
        Schema::dropIfExists('patients');
    }
};
