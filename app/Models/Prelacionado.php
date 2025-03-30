<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Prelacionado extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','producto_id','relacion_id'
    ];

    use HasFactory;

    public function productorelacion(){

        return $this->belongsTo(Productos::class,'relacion_id', 'id')->first();

    }
}
