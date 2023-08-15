<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomestatementDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomestatement_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('incomestatement_id');
            $table->string('name');
            $table->decimal('amount', $precision = 11, $scale = 2)->default(0);
            $table->unsignedBigInteger('account_id')->nullable();
            $table->decimal('expense', $precision = 11, $scale = 2)->default(0);
            $table->enum('type', ['income', 'expense']);
            $table->timestamps();
            $table->foreign('incomestatement_id')->references('id')->on('incomestatement')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incomestatement_table');
    }
}
