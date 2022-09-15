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
        Schema::create('crypto_asset_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crypto_asset_id');
            $table->unsignedBigInteger('user_id');
            $table->decimal('owned')->nullable();
            $table->timestamp('favorited_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            $table->foreign('crypto_asset_id')->references('id')->on('crypto_assets');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crypto_user');
    }
};
