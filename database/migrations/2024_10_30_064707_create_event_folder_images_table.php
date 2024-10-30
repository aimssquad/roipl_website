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
        Schema::create('event_folder_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_folder_id');  // Foreign key for EventFolder
            $table->string('image_path');                   // Path to store the image
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('event_folder_id')->references('id')->on('event_folders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_folder_images');
    }
};
