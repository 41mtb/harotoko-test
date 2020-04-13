<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('ユーザーID');
            $table->string('shop_name')->nullable()->comment('店舗名');
            $table->string('shop_category')->nullable()->comment('店舗ジャンル');
            $table->text('url')->nullable()->comment('店舗URL');
            $table->string('postcode')->nullable()->comment('郵便番号');
            $table->string('prefecture')->nullable()->comment('住所（県）');
            $table->string('city')->nullable()->comment('住所（市町村）');
            $table->string('block')->nullable()->comment('住所（番地、部屋番号）');
            $table->string('name')->nullable()->comment('代表者名');
            $table->string('mobile')->nullable()->comment('携帯電話');
            $table->string('phone')->nullable()->comment('電話番号');
            $table->string('email', 255)->nullable()->comment('連絡先メールアドレス');
            $table->text('description')->nullable()->comment('店舗紹介文');
            $table->string('feature')->nullable()->comment('店舗の特徴');
            $table->softDeletes();
            $table->timestamps();
            // $table->string('key', 32)->unique();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
