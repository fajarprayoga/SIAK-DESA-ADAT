<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfitSharingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profit_sharing', function (Blueprint $table) {
            $table->id();
            $table->foreignId("incomestatement_id")->constrained("incomestatement")->cascadeOnDelete();
            $table->string("title");
            $table->text("descriptions");
            $table->json("details");
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
        Schema::dropIfExists('profit_sharing');
    }
}
