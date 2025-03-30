<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategorias extends Model
{

    protected $table = 'subcategorias';

    public function obtenercategoria(){

        return $this->belongsTo(Categorias::class, 'categoria_id', 'id')->get();
    
       }
    
        
       public function categoria()
       {
           return $this->belongsTo(Categorias::class, 'categoria_id', 'id');
       }
    
        public function productosrelacionados(){
    
            return $this->hasMany(Productos::class,'subcategoria_id');
        }
}
