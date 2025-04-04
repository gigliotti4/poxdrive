<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metadato extends Model
{
    use HasFactory;

    protected $table = 'metadatos';
    
    protected $fillable = [
        'seccion',
        'keyword',
        'descripcion',
        'titulo'
    ];
}
