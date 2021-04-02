<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargoPorEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargo_por_empleados', function (Blueprint $table) {
            $table->integer('FKCARGO')->primary();
            $table->string('FKEMPLE', 20)->primary();
            $table->date('FECHAINI');
            $table->date('FECHAFIN');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cargo_por_empleados');
    }
}
