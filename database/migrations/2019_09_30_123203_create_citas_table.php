<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer("cliente_id")->unsigned();
            $table->date("fecha");
            $table->integer("numeroempleadosreservados");
            $table->integer("numeroempleadosasistentes")->default(0);
            
            $table->foreign('cliente_id')->references('id')->on('clientes')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
