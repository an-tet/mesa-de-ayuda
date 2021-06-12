<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requerimiento extends Model
{
    use HasFactory;

    protected $table = 'requerimiento';

    protected $primaryKey = 'IDREQ';

    public $timestamps = false;

    protected $fillable = [
        'IDREQ', 'FKAREA'
    ];

    public function detallereq()
    {
    }

    public function area()
    {
    }
}
