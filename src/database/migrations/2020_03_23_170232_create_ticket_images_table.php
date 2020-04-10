<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ticket_id')->comment('スペースID');
            $table->string('path')->comment('画像パス');
            $table->timestamps();
            // $table->string('key', 32)->unique();

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
        Schema::dropIfExists('space_images');
    }
}
