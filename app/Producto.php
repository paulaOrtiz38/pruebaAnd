<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //

    protected $table = "productos";
    protected $primaryKey = "id";
    protected $fillable = ['nombre', 'precio', 'observaciones', 'cantidad', 'estado','imagen'];

    public $timestamps = false;

    public function ciudades()
    {
        return $this->belongsToMany('App\Ciudad');
    }

}
