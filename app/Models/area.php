<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'area';

    protected $primaryKey = 'IDAREA';

    public $timestamps = false;

    protected $fillable = [
        'IDAREA', 'NOMBRE', 'FKEMPLE'
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'FKEMPLE', 'IDAREA');
    }

    public function requerimiento()
    {
    }
}
