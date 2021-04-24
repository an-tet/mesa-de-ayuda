<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(file_get_contents('public/sql/mesa_ayuda.sql'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->drop_relationship();
        $this->drop_tables();
    }

    private function drop_relationship()
    {
        $relations = DB::select('select * from INFORMATION_SCHEMA.TABLE_CONSTRAINTS where table_schema="mesa_ayuda" and constraint_type="FOREIGN KEY"');
        foreach ($relations as $value) {
            DB::unprepared("ALTER TABLE {$value->TABLE_NAME} DROP FOREIGN KEY {$value->CONSTRAINT_NAME}");
        }
    }

    private function drop_tables()
    {
        $tables = DB::select('SHOW FULL TABLES FROM mesa_ayuda;');
        foreach ($tables as  $value) {
            if ($value->Tables_in_mesa_ayuda != 'migrations' || $value->Tables_in_mesa_ayuda != 'filed_jobs') Schema::dropIfExists($value->Tables_in_mesa_ayuda);
        }
    }
}
