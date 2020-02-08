<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proyectos extends Model
{
    protected $table="proyectos";
    
      public function imagenes_proyectosModel() {
        return $this->hasMany('App\imagenes_proyectosModel');
    }
    
    public function tecnologias_usadas(){
           return $this->hasMany('App\tecnologias_usadas');
    }
    

    
    
    
    
}
