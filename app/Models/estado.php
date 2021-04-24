<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estado extends Model
{
    use HasFactory;

    protected $table = 'estado';

    protected $primaryKey = 'IDESTADO';

    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'IDESTADO', 'NOMBRE'
    ];

    public function detallereq()
    {
    }
}
