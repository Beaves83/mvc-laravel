<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comunidadesautonomas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunidadesautonomas', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('country_id');
//            $table->foreign('country_id')->references('id')->on('paises')
//                    ->onDelete('cascade');
            $table->string("state_name");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comunidadesautonomas');
    }
}
