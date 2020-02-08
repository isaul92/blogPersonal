<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imagenes_proyectosModel extends Model
{
    protected $table="imagenes_proyectos";
    
    
       public function proyectos() {
        return $this->hasOne('App\proyectos');
    }
}
