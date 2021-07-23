<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    //protected $fillable = ['nombre','descripcion','condicion',];

    public function articulo()
    {
        return $this->hasMany('App\Models\Articulo');
    }
}
