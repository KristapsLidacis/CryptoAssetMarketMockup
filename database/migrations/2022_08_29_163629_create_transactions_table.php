<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->unsignedBigInteger('crypto_asset_user_id');
            $table->string('transaction_type');
            $table->bigInteger('price');
            $table->bigInteger('quantity');
            $table->timestamps();

            $table->foreign('crypto_asset_user_id')->references('id')->on('crypto_asset_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
