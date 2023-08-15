<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_number',255);
            $table->string('vehicle',255)->nullable();
            $table->unsignedBigInteger('material_id')->nullable();
            // $table->string('type_material',255);
            $table->integer('price_material')->nullable()->length(20);
            $table->decimal('expense', $precision = 11, $scale = 2)->default(0);
            $table->string('nomor',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('transactions', function (Blueprint $table) {
            Schema::dropIfExists('transactions');
        });
    }
}
