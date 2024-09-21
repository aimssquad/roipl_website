<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterLocationInCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('careers', function (Blueprint $table) {
            // Remove the old 'location' column
            $table->dropColumn('location');

            // Add new 'state_id' and 'city_id' columns
            $table->unsignedBigInteger('state_id')->after('email');
            $table->unsignedBigInteger('city_id')->after('state_id');

            // If you are using foreign key relations, you can add these:
            // $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            // $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('careers', function (Blueprint $table) {
            // Add back the 'location' column in case of rollback
            $table->string('location')->after('email');

            // Drop the new 'state_id' and 'city_id' columns
            $table->dropColumn(['state_id', 'city_id']);
        });
    }
}
