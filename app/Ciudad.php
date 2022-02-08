<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = "ciudades";
    protected $primaryKey = "id";
    protected $fillable = ['nombre', 'departamento','estado'];

    public function productos()
    {
        return $this->belongsToMany('App\Producto');
    }

}
