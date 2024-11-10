<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMesuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesures', function (Blueprint $table) {
            $table->id();
            $table->double('valeur_mesure');
            $table->double('type_de_mesure');

            $table->unsignedBigInteger('station_id');
            $table->foreign('station_id')->references('id')->on('stations');
            $table->unsignedBigInteger('user_id');
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
        Schema::table('mesures', function(Blueprint $table){
            $table->dropForeign("station_id");
            $table->dropForeign("user_id");   
        });
        Schema::dropIfExists('mesures');
    }
}
