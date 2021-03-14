<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmpleadosMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Empleados', function (Blueprint $table) {
            $table->string('idEmpleado', 20)->primary();
            $table->string('nombre');
            $table->string('telefono');
            $table->string('cargo');
            $table->string('email');
            $table->bigInteger('fkIdArea');
            $table->index('fkIdArea');
            $table->string('fkEmple', 20);
            $table->index('fkEmple');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Empleados');
    }
}
