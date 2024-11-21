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
        Schema::create('visionnaire_detail_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('visionnaire_detail_id');
            $table->string('images')->nullable();
            $table->foreign('visionnaire_detail_id')->references('id')->on('visionnaire_details')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visionnaire_detail_images');
    }
};
