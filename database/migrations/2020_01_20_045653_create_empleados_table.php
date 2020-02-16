<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('NombreEmpleado');
            $table->integer('Identificacion');
            $table->date('FechaIngreso');
            $table->string('TipoContrato');
            $table->string('Contrato');
            $table->string('HojaDeVida');
            $table->string('ExamenIngreso');
            $table->string('Afiliacioneps');
            $table->string('Afiliacionarl');
            $table->string('Afiliacioncaja');
            $table->string('Certificadoalturas');
            $table->string('Foto');
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
        Schema::dropIfExists('empleados');
    }
}
