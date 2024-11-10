<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMesureStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesure_stations', function (Blueprint $table) {
            $table->id();
            $table->double('pluviometrie');
            $table->double('temperature');

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
        Schema::table('mesure_stations', function(Blueprint $table){
            $table->dropForeign("station_id");
            $table->dropForeign("user_id");
        });
        Schema::dropIfExists('mesure_stations');
    }
}
