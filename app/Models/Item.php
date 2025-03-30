<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;


    public function familias(){
        return $this->belongsTo(Familia::class, 'familia_id', 'id')->first();
    }
    public function familia()
    {
        return $this->belongsTo(Familia::class, 'familia_id', 'id');
    }

}
