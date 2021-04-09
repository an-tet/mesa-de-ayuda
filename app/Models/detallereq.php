<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detallereq extends Model
{
    use HasFactory;

    protected $table = 'detallereq';

    protected $primaryKey = 'IDDETALLE';

    public $timestamps = false;

    protected $fillable = [
        'IDDETALLE', 'FECHA',
        'OBSERVACION', 'FKREQ',
        'FKESTADO', 'FKEMPLE',
        'FKEMPLEASIGNADO'
    ];

    public function empleado()
    {
    }

    public function empleadoJefe()
    {
    }

    public function requerimiento()
    {
    }

    public function estado()
    {
    }
}
