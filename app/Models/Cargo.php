<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    protected $table = 'cargo';

    protected $primaryKey = 'IDCARGO';

    public $timestamps = false;

    protected $fillable = [
        'IDCARGO', 'NOMBRE'
    ];

    public function cargoPorEmpleado()
    {
    }
}
