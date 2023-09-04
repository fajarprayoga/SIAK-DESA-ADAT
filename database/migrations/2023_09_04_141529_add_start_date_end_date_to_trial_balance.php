<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStartDateEndDateToTrialBalance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trial_balance', function (Blueprint $table) {
            //
            $table->date("end_date")->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trial_balance', function (Blueprint $table) {
            //
            $table->dropColumn("start_date");
            $table->dropColumn("end_date");
        });
    }
}