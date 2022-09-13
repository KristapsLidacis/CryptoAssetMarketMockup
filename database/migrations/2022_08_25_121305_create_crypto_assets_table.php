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
        Schema::create('crypto_assets', function (Blueprint $table) {
            $table->id();
            $table->string('symbol');
            $table->string('name');
            $table->string('slug');
            $table->integer('price_usd_pennies');
            $table->bigInteger('current_market_cap');
            $table->bigInteger('volume_last_day');
            $table->bigInteger('circulating_supply');
            $table->bigInteger('change_last_hour')->nullable();
            $table->bigInteger('change_last_day')->nullable();
            $table->bigInteger('change_last_week')->nullable();
            $table->string('icon_path');
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
        Schema::dropIfExists('crypto_assets');
    }
};
