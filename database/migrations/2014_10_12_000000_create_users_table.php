<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->char('type', 20)->default('ADMIN');
            $table->char('role',20)->default('ADMIN');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('creator_id')->unsigned()->nullable();
            $table->bigInteger('updater_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('creator_id')
                ->references('id')
                ->on('users');
            $table->foreign('updater_id')
                ->references('id')
                ->on('users');

            $table->index('type', 'U_type');
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
