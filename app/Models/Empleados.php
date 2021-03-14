<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    use HasFactory;

    protected $table = 'Empleados';

    protected $primarykey = 'idEmpleados';

    public $timestamps = false;

    protected $fillable = [
        'idEmpleado', 'nombre', 'telefono',
        'cargo', 'email',
        'fkIdArea', 'fkEmple'
    ];
}
