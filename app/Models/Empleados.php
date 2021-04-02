<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    use HasFactory;

    protected $table = 'empleado';

    protected $primaryKey = 'IDEMPLEADO';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = [
        'IDEMPLEADO', 'NOMBRE',
        'FOTO', 'HOJAVIDA',
        'TELEFONO', 'EMAIL',
        'DIRECCION', 'X', 'Y',
        'fkEMPLE_JEFE', 'fkAREA'
    ];
}
