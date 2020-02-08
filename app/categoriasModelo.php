<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class categoriasModelo extends Model {

    protected $table = 'categorias';

    // Relacion One to Many
    public function comandos() {
        return $this->hasMany('App\comandos');
    }

  

}
