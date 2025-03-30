<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Productos extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id', 'descripcion', 'imagen', 'orden', 'nombre', 'descripciondos', 'subcategoria_id', 'destacados', 'descuento'
    ];

    public function categorias(){
        return $this->belongsTo(Categorias::class, 'categoria_id', 'id')->first();
    }

    public function getCategoriaAttribute()
    {
        // Accede a la categoria a través de la relación subcategoria
        return $this->subcategoria->categoria;
    }

    public function subcategoria()
    {
        return $this->belongsTo(Subcategorias::class, 'subcategoria_id');
    }


    public function productorelacion(){
        return $this->belongsTo(Prelacionado::class,'id', 'productos_id');
    }

    


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('orden', function (Builder $builder) {
            $builder->orderBy('orden');
        });
    }

}
