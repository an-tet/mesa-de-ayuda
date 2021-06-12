<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoPorEmpleado extends Model
{
    use HasFactory;

    protected $table = 'cargo_por_empleado';

    protected $primaryKey = ['FKCARGO', 'FKEMPLE'];

    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'FKCARGO', 'FKEMPLE', 'FECHAINI', 'FECHAFIN'
    ];

    public function empleado()
    {
    }

    public function cargo()
    {
    }
}
