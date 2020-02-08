<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class tecnologias_usadas extends Model {

    protected $table = "tecnologias_usadas";

    public function proyectos() {
        return $this->hasOne('App\proyectos');
    }

    public function categorias() {
        return $this->hasOne('App\categorias');
    }

    public static function buscarPorProyecto($id) {

        return $result = DB::table('tecnologias_usadas')->where('idProyecto', '=', $id)->get();
    }

}
