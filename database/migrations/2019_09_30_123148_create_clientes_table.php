<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('clientes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->string("codigo");
            $table->string("razonsocial");
            $table->string("cif");
            $table->string("direccion")->nullable();
            $table->string("municipio");
            $table->string("provincia");
            $table->date("fechafincontrato");
            $table->date("fechainiciocontrato");
            $table->integer("numeroreconocimientoscontratados");
            $table->integer("numeroreconocimientosutilizados")->default(0);
            $table->boolean("activo")->default(TRUE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('clientes');
    }

}
