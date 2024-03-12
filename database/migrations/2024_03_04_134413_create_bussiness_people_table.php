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
        Schema::create('bussiness_people', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->nullable();
            $table->string('country_name')->nullable();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->text('desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
//        Schema::dropIfExists('bussiness_people');
    }
};
