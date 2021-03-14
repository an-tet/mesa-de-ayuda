<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AreasMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Areas', function (Blueprint $table) {
            $table->bigIncrements('idArea');
            $table->string('nombreArea');
            $table->string('fkRmple', 20);
            $table->index('fkRmple');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Areas');
    }
}
