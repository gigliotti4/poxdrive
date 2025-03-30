<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    protected $fillable = [
        'id', 'imagen', 'orden', 'nombre', 'destacado'
    ];
    public function subcategorias()
    {
        return $this->hasMany(Subcategorias::class, 'categoria_id');
    }

    public function productos(){
    	return $this->hasMany(Productos::class, 'categoria_id');
    }

    public function obtenerSubcategorias(){
        //    dd($this->hasMany('App\Models\Subcategorias')->get);
       
            return $this->hasMany(Subcategorias::class ,'categoria_id', 'id')->get();
    
        }

}
