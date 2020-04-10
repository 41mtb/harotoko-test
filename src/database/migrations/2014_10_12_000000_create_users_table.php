<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email', 255)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->text('api_token')->nullable();
            $table->unsignedInteger('type')->nullable()->comment('0がサポーター, 1がホスト');
            $table->unsignedInteger('facebook_id')->nullable()->unique();
            $table->string('stripe_id')->nullable()->unique()->comment('Stripeの顧客ID');
            $table->integer('status')->nullable()->comment('0が無料会員, 1が有料会員');
            $table->string('activation_code', 255)->unique()->nullable();
            $table->timestamp('activate_expire_at')->nullable();
            $table->timestamp('activated_at')->nullable();
            $table->timestamp('last_login_at')->nullable()->comment('退会日時');
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
            // $table->string('key', 32)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
