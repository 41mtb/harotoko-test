<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('shop_id')->comment('店舗ID');
            $table->string('title')->nullable()->comment('チケット名');
            $table->integer('price')->nullable()->comment('金額');
            $table->text('description')->nullable()->comment('説明');
            $table->integer('remaing')->default(1)->comment('使用回数');
            $table->softDeletes();
            $table->timestamps();
            // $table->string('key', 32)->unique();

            $table->foreign('shop_id')
            ->references('id')
            ->on('shops')
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
        Schema::dropIfExists('tickets');
    }
}
