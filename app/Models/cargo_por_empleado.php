<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cargo_por_empleado extends Model
{
    use HasFactory;

    protected $table = 'cargo_por_empleado';

    protected $primaryKey = ['FKCARGO', 'FKEMPLE'];

    public $timestamps = false;

    protected $fillable = [
        'FKCARGO', 'FKEMPLE', 'FECHAINI', 'FECHAFIN'
    ];
}
