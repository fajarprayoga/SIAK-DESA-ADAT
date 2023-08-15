<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrialBalanceDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trial_balance_detail', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('trial_balance_id');
            $table->unsignedBigInteger('account_id');
            $table->decimal('amount',$precision = 11, $scale = 2);
            $table->timestamps();
            $table->foreign('trial_balance_id')->references('id')->on('trial_balance')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trial_balance_detail');
    }
}
