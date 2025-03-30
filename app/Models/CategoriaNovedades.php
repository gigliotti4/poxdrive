<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaNovedades extends Model
{
    use HasFactory;
    protected $fillable=['orden','titulo'];
    public function novedades(){
        return $this->hasMany('App\Models\Novedad','category_id');
    }
}
