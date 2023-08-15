<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedgerDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledger_details', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('ledger_id');
            $table->unsignedBigInteger('account_id');
            $table->enum('types', ['debit', 'credit']);
            $table->decimal('amount');
            $table->text('description');
            $table->timestamps();

            $table->foreign('ledger_id')->references('id')->on('ledgers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ledger_details');
    }
}
