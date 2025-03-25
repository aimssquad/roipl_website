<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            $table->renameColumn('content1', 'long_description');
            $table->renameColumn('content2', 'small_description');
        });
    }

    public function down(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            $table->renameColumn('long_description', 'content1');
            $table->renameColumn('small_description', 'content2');
        });
    }
};
