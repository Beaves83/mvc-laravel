<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Provincipas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provincias', function (Blueprint $table) {
            $table->integer('id');
//            $table->foreign('country_id')->references('id')->on('paises')
//                    ->onDelete('cascade');
//            $table->foreign('state_id')->references('id')->on('comunidadesautonomas')
//                    ->onDelete('cascade');
            $table->integer("country_id");
            $table->integer("state_id");
            $table->string("region_name");
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
        Schema::dropIfExists('provincias');
    }
}
