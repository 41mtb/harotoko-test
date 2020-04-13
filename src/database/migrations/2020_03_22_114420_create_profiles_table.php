<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('ユーザーID');
            $table->string('real_name')->comment('本名')->nullable();
            $table->string('phone')->comment('電話番号')->nullable();
            $table->string('birthday')->comment('生年月日')->nullable();
            $table->integer('postcode')->nullable()->comment('郵便番号');
            $table->string('prefecture')->nullable()->comment('住所（県）');
            $table->string('city')->nullable()->comment('住所（市町村）');
            $table->string('block')->nullable()->comment('住所（番地、部屋番号）');
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
        Schema::dropIfExists('profiles');
    }
}
