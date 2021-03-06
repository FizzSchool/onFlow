<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{

    /**
     * Run the migrations
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('username')->unique();
            $table->string('password', 60);
            $table->string('email')->unique();
            $table->string('facebookId')->default('');
            $table->enum('role', ['member', 'admin', 'moder'])->default('member');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::drop('posts');
        Schema::drop('users');
    }
}
