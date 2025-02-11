<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_users', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles')
            ->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade');

            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role_users', function(Blueprint $table){
            $table->dropForeign("role_id");
            $table->dropForeign("user_id");   
        });
        Schema::dropIfExists('role_users');
    }
}
