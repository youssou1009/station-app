<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->integer("latitude");
            $table->integer("longitude");
            $table->integer("altitude");
            $table->string('imageUrl')->nullable();

            $table->unsignedBigInteger('departement_id');
            $table->foreign('departement_id')->references('id')->on('departements');

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
        Schema::table('stations', function(Blueprint $table){
            $table->dropForeign("departement_id");   
        });
        Schema::dropIfExists('stations');
    }
}
