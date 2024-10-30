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
        Schema::table('events', function (Blueprint $table) {
            $table->date('event_date')->nullable()->change();
            $table->time('event_time')->nullable()->change();
            $table->string('place')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->date('event_date')->nullable(false)->change();
            $table->time('event_time')->nullable(false)->change();
            $table->string('place')->nullable(false)->change();
        });
    }
};
