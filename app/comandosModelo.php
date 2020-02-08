<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class comandosModelo extends Model {

    protected $table = 'datacompilation';

    // Relacion One to Many
    public function categorias() {
        return $this->hasMany('App\categorias');
    }

    public function ejemplos() {
        return $this->hasMany('App\emploscomandos');
    }

    public function getById($id) {
        $comandos = DB::table('datacompilation')
                ->join('categorias', 'categorias.id', '=', 'datacompilation.tecnologia_id')
                ->select('categorias.nombre as nombreCategoria', 'datacompilation.*')->where('datacompilation.id', 'LIKE', '%' . $id . '%')
                ->get();

        return $comandos;
    }

    public function getByDescription($id) {
        $comandos = DB::table('datacompilation')
                ->join('categorias', 'categorias.id', '=', 'datacompilation.tecnologia_id')
                ->select('categorias.nombre as nombreCategoria', 'datacompilation.*')->where('datacompilation.descripcion', 'LIKE', '%' . $id . '%')
                ->get();

        return $comandos;
    }

    public function getByCategory($id) {
        $comandos = DB::table('datacompilation')
                ->join('categorias', 'categorias.id', '=', 'datacompilation.tecnologia_id')
                ->select('categorias.nombre as nombreCategoria', 'datacompilation.*')->where('datacompilation.tecnologia_id', 'LIKE', '%' . $id . '%')
                ->get();

        return $comandos;
    }

    public function getByName($id) {
        $comandos = DB::table('datacompilation')
                ->join('categorias', 'categorias.id', '=', 'datacompilation.tecnologia_id')
                ->select('categorias.nombre as nombreCategoria', 'datacompilation.*')->where('datacompilation.nombre', 'LIKE', '%' . $id . '%')
                ->get();

        return $comandos;
    }

    public function listarComandos() {

        $comandos = DB::table('datacompilation')
                ->join('categorias', 'categorias.id', '=', 'datacompilation.tecnologia_id')
                ->select('categorias.nombre as nombreCategoria', 'datacompilation.*')
                ->paginate(10);


        return $comandos;
    }

    public function obtenerCuantosPordescripcion($id) {
        $comandos = DB::table('categorias')
                        ->leftjoin('datacompilation', 'datacompilation.tecnologia_id', '=', "categorias.id")->where('datacompilation.descripcion', "LIKE", "%" . $id . "%")->count();
        return $comandos;
    }

    public function obtenerCuantosPorNombre($id) {
        $comandos = DB::table('categorias')
                        ->leftjoin('datacompilation', 'datacompilation.tecnologia_id', '=', "categorias.id")->where('datacompilation.nombre', "LIKE", "%" . $id . "%")->count();
        return $comandos;
    }

    public function obtenerCuantosPorID($id) {
        $comandos = DB::table('categorias')
                        ->leftjoin('datacompilation', 'datacompilation.tecnologia_id', '=', "categorias.id")->where('datacompilation.id', "LIKE", "%" . $id . "%")->count();
        return $comandos;
    }

    public function obtenerCuantosPorCategoria($id) {
        $comandos = DB::table('categorias')
                        ->leftjoin('datacompilation', 'datacompilation.tecnologia_id', '=', "categorias.id")->where('datacompilation.tecnologia_id', "=", $id)->count();
        return $comandos;
    }

    public function obtenerCuantosPorSintaxis($id) {
        $comandos = DB::table('categorias')
                        ->leftjoin('datacompilation', 'datacompilation.tecnologia_id', '=', "categorias.id")->where('datacompilation.comando', "LIKE", "%" . $id . "%")->count();
        return $comandos;
    }

    public function descripcionBuscarComando($limit, $offset, $id) {

        $comandos = DB::table('datacompilation')
                ->join('categorias', 'categorias.id', '=', 'datacompilation.tecnologia_id')->limit($limit)->offset($offset)
                ->select('categorias.nombre as nombreCategoria', 'datacompilation.*')
                ->where('datacompilation.descripcion', "LIKE", "%" . $id . "%")
                ->get();


        return $comandos;
    }

    public function paginandoDatosBySyntax($limit, $offset, $id) {

        $comandos = DB::table('datacompilation')
                ->join('categorias', 'categorias.id', '=', 'datacompilation.tecnologia_id')->limit($limit)->offset($offset)
                ->select('categorias.nombre as nombreCategoria', 'datacompilation.*')
                ->where('datacompilation.comando', "LIKE", "%" . $id . "%")
                ->get();


        return $comandos;
    }

    public function paginandoDatosByName($limit, $offset, $id) {

        $comandos = DB::table('datacompilation')
                ->join('categorias', 'categorias.id', '=', 'datacompilation.tecnologia_id')->limit($limit)->offset($offset)
                ->select('categorias.nombre as nombreCategoria', 'datacompilation.*')
                ->where('datacompilation.nombre', "LIKE", "%" . $id . "%")
                ->get();


        return $comandos;
    }

    public function paginandoDatosById($limit, $offset, $id) {

        $comandos = DB::table('datacompilation')
                ->join('categorias', 'categorias.id', '=', 'datacompilation.tecnologia_id')->limit($limit)->offset($offset)
                ->select('categorias.nombre as nombreCategoria', 'datacompilation.*')
                ->where('datacompilation.id', "LIKE", "%" . $id . "%")
                ->get();


        return $comandos;
    }

    public function paginandoDatosByCategory($limit, $offset, $id) {


        $comandos = DB::table('datacompilation')
                ->join('categorias', 'categorias.id', '=', 'datacompilation.tecnologia_id')->limit($limit)->offset($offset)
                ->select('categorias.nombre as nombreCategoria', 'datacompilation.*')
                ->where('datacompilation.tecnologia_id', "=", $id)
                ->get();


        return $comandos;
    }

    public function paginandoDatos($limit, $offset) {


        $comandos = DB::table('datacompilation')
                        ->join('categorias', 'categorias.id', '=', 'datacompilation.tecnologia_id')->limit($limit)->offset($offset)
                        ->select('categorias.nombre as nombreCategoria', 'datacompilation.*')->get();


        return $comandos;
    }

    public function obtenerCuantosPaginacion() {
        $query = DB::table('datacompilation')->count();

        return $query;
    }

    public function saveComand($nombre, $descripcion, $sintax, $categoria) {
          $date = date('Y-m-d H:i:s');
        $query = DB::table("datacompilation")->insertGetId([
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "comando" => $sintax,
            "tecnologia_id" => $categoria,
            "created_at" => $date,
            "updated_at" => $date,
            "usuario_id" => 1
        ]);
        return $query;
    }

//    //Relacion de muchos a uno
//    public function user(){
//        return $this->belongsTo('App\User','user_id');
//            }
}
