<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('ユーザーID');
            $table->unsignedInteger('ticket_id')->comment('チケットID');
            $table->integer('ordering_price')->nullable()->comment('注文価格');
            $table->string('ordergin_description')->nullable()->comment('購入商品の説明');
            $table->integer('remaing')->default(1)->comment('残数');
            $table->text('message')->nullable()->comment('メッセージ');
            $table->timestamps();
            // $table->string('key', 32)->unique();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
            $table->foreign('ticket_id')
            ->references('id')
            ->on('tickets')
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
        Schema::dropIfExists('ad_requests');
    }
}
