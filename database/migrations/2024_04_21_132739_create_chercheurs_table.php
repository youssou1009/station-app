<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChercheursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chercheurs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('departement_id');
            $table->foreign('departement_id')->references('id')->on('departements');
            $table->unsignedBigInteger('user_id')->references('id');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::table('chercheurs', function(Blueprint $table){
            $table->dropForeign("departement_id");
            $table->dropForeign("user_id");    
        });
        Schema::dropIfExists('chercheurs');
    }
}
