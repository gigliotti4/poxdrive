<?php

namespace App\Imports;

use App\Models\Productos;
use App\Models\Categorias;
use App\Models\Subcategorias;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ProductoCategoriaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    { 


     // dd($row);

     $cat =Categorias::where('nombre','=',$row['categoria'])->first();
        
        if(!isset($cat)){
            
            $cat = new Categorias;
            $cat->nombre = $row['categoria'];
          // $cat->imagen = 'public/categorias/logo.png';
            
            $cat->save();
        }





        
        $subcategorias =Subcategorias::where('nombre','=',$row['subcategorias'])->first();
        
        if(!isset($subcategorias)){
            
            $subcategorias = new Subcategorias;
            $subcategorias->nombre = $row['subcategorias'];
            $subcategorias->imagen = 'public/categoria/logo.png';
            $subcategorias->categoria_id = $cat->id; 
            $subcategorias->save();
        }
    $prod =Productos::where('nombre','=',$row['productos'])->first();
    if(!isset($prod)){
        
        $prod = new Productos;
       
       }


      //  $prod->codigo = $row['codigo'];
       $prod->nombre = $row['productos'];
      //  $prod->descripcion = $row['descripcion'];
      //  $prod->caracteristica = $row['caracteristica'];
      //  $prod->categoria_id = $row['categoria_id'];
      //  $prod->subcategoria_id = $row['subcategoria_id'];
        $prod->categoria_id = $cat->id; 
       $prod->subcategoria_id = $subcategorias->id; 
       $prod->imagen = 'public/productos/logo.png';
       $prod->save(); 
            return $prod;
        }

            

        
        

}


