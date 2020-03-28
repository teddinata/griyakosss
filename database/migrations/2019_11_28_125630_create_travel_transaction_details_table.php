<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_transaction_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('travel_transactions_id');
            $table->string('username');
            $table->string('nationality');
            $table->string('job');
            $table->date('checkin');
            $table->softDeletes();
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
        Schema::dropIfExists('travel_transaction_details');
    }
}
