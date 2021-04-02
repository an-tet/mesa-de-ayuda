<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    use HasFactory;

    protected $table = 'area';

    protected $primaryKey = 'IDAREA';

    public $timestamps = false;

    protected $fillable = [
        'IDAREA', 'NOMBRE', 'FKEMPLE'
    ];
}
