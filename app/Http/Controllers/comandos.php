<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comandosModelo;
use App\categoriasModelo;

class comandos extends Controller {

    public function updateComandos($id) {
        $categorias = new categoriasModelo();
        $categorias = $categorias::all();
        $comando = comandosModelo::find($id);
        $flag = true;
        return view('comandos.crearComando', [
            'categorias' => $categorias,
            'flag' => $flag, "id" => $id, "comando" => $comando
        ]);
    }

    public function obtenerCuantosPaginacion() {
        $comando = new comandosModelo();
        $resultado = $comando->obtenerCuantosPaginacion();
        return $resultado;
    }

    public function paginandoDatos($limit, $offset, $opcion, $id = 1) {
        $comando = new comandosModelo();

        switch ($opcion) {
            case "listarTodos";
                $resultado = $comando->paginandoDatos($limit, $offset);
                break;
            case "buscarPorCategoria";
                $resultado = $comando->paginandoDatosByCategory($limit, $offset, $id);
                break;
            case "idBuscarComando";
                $resultado = $comando->paginandoDatosById($limit, $offset, $id);
                break;
            case "nombreBuscarComando";
                $resultado = $comando->paginandoDatosByName($limit, $offset, $id);
                break;
            case "sintaxisBuscarComando";
                $resultado = $comando->paginandoDatosBySyntax($limit, $offset, $id);
                break;
            case "descripcionBuscarComando";
                $resultado = $comando->descripcionBuscarComando($limit, $offset, $id);
                break;
        }


        return $resultado;
    }

    public function paginacionComandos() {
        $jsondata = array();
        $jsondataList = array();
        $comando = new comandosModelo();
        if ($_POST['param1'] == "cuantos") {




            if (isset($_POST['id'])) {
                $id = $_POST['id'];
            }
            if ($_POST['opcion'] == "buscarPorCategoria") {

                $resultado = $comando->obtenerCuantosPorCategoria($id);
            } elseif ($_POST['opcion'] == "idBuscarComando") {

                $resultado = $comando->obtenerCuantosPorID($id);
            } elseif ($_POST['opcion'] == "nombreBuscarComando") {
                $resultado = $comando->obtenerCuantosPorNombre($id);
            } elseif ($_POST['opcion'] == "sintaxisBuscarComando") {
                $resultado = $comando->obtenerCuantosPorSintaxis($id);
            } elseif ($_POST['opcion'] == "descripcionBuscarComando") {
                $resultado = $comando->obtenerCuantosPordescripcion($id);
            } else {
                $resultado = $this->obtenerCuantosPaginacion();
            }

            $fila = $resultado;
            $jsondata['total'] = $fila;
        } elseif ($_POST["param1"] == "dame") {
//
            $limit = $_POST["limit"];
            $offset = $_POST["offset"];
            $opcion = $_POST["opcion"];
            if (isset($_POST["opcion"])) {
                $resultado = $this->paginandoDatos($limit, $offset, $opcion, $_POST["id"]);
            } else {
                $resultado = $this->paginandoDatos($limit, $offset, $opcion);
            }






            foreach ($resultado as $fila) {
                $jsondataperson = array();
                $jsondataperson["nombreCategoria"] = $fila->nombreCategoria;
                $jsondataperson["id"] = $fila->id;
                $jsondataperson["nombre"] = $fila->nombre;
                $jsondataperson["comando"] = $fila->comando;
                $jsondataperson["descripcion"] = $fila->descripcion;

                $jsondataList[] = $jsondataperson;
            }

            $jsondata["lista"] = array_values($jsondataList);
        }










        header("Content-type:application/json; charset = utf-8");
        echo json_encode($jsondata);
    }

//    CODIGO REEMPLAZADO POR AJAXM ¡NO SE USA!
    public static function crearVista($id) {
        if (count($id) != 0) {


            $respuesta = "<div id = 'panelBusqueda' class = 'panel panel-primary'>" .
                    "<h3>Numero de coincidencias : " . count($id) . "</h3>"
                    . " <div class = 'panel-heading'></div>"
                    . "    <div class = 'panel-body'>"
                    . "<table class='table table-striped table-hover'>"
                    . "<thead>"
                    . "<tr>"
                    . "<th>CATEGORIA</th>"
                    . "<th>ID</th>"
                    . "  <th>NOMBRE</th>"
                    . "   <th>SINTAXIS</th>"
                    . "      <th>DESCRIPCION</th>"
                    . "</tr>"
                    . "</thead>"
                    . " <tbody id = 'miTabla'>";
            foreach ($id as $comand) {


                $respuesta .= "<tr><td>" . $comand->nombreCategoria . "    </td>"
                        . "<td>" . $comand->id . "    </td>"
                        . "<td>" . $comand->nombre . "    </td>"
                        . "<td>" . $comand->comando . "    </td>"
                        . "<td>" . $comand->descripcion . "    </td></tr>";
            }
//                 "<td>" + elem.nombreCategoria + "</td>" +
//                    "<td>" + elem.id + "</td>" +
//                    "<td>" + elem.nombre + "</td>" +
//                    "<td>" + elem.comando + "</td>" +
//                    "<td>" + elem.descripcion + "</td>" +


            $respuesta .= "  </tbody>"
                    . " </table >"
                    . "</table'></div> ";
        } else {
            $respuesta = "<div id = 'panelBusqueda' class = 'panel panel-primary'><p>No hay coincidencia</p></div> ";
        }
        return $respuesta;
    }

//    CODIGO REEMPLAZADO POR AJAX
    //*********************************************    $image = Image::find($image_id);
    //   $image->description = $description;


    public function delete($id) {
        $comando = comandosModelo::find($id);
        $comando->delete();
        return redirect('/verComandos');
    }

    public function update() {
        if (!empty(file_get_contents("php://input"))) {
            $datosRecibidos = file_get_contents("php://input");
# No los hemos decodificado, así que lo hacemos de una vez:
            $comandoBuscar = json_decode($datosRecibidos);
            $date = date('Y-m-d H:i:s');
            $comando = comandosModelo::find($comandoBuscar->id);
            $comando->nombre = $comandoBuscar->nombre;
            $comando->descripcion = $comandoBuscar->descripcion;
            $comando->comando = $comandoBuscar->sintax;
            $comando->tecnologia_id = $comandoBuscar->categoria;
            $comando->updated_at = $date;
            $comando->update();
            header("http/1.1 200 Ok");
            return '{"resultado":"' . $comando->id . '"}';
        }
    }

    public function saveComand() {

        if (!empty(file_get_contents("php://input"))) {
            $datosRecibidos = file_get_contents("php://input");
# No los hemos decodificado, así que lo hacemos de una vez:
            $comandoBuscar = json_decode($datosRecibidos);

            $nombre = $comandoBuscar->nombre;
            $descripcion = $comandoBuscar->descripcion;
            $sintax = $comandoBuscar->sintax;
            $categoria = $comandoBuscar->categoria;
            if (empty($nombre) || empty($descripcion) || empty($sintax) || empty($categoria)) {
                header("http/1.1 500 error");
                echo json_encode('{"resultado":"No se pudo guardSar"}', JSON_FORCE_OBJECT);
            } else {
                $comando = new comandosModelo();
                $result = $comando->saveComand($nombre, $descripcion, $sintax, $categoria);
                if (isset($result)) {
                    header("http/1.1 200 Ok");
                    echo json_encode('{"resultado":" ' . $result . ' "}', JSON_FORCE_OBJECT);
                } else {
                    header("http/1.1 500 error");
                    echo json_encode('{"resultado":"' . $result . ' :("}', JSON_FORCE_OBJECT);
                }
            }
        }
    }

    public function crearComando() {

        $categorias = categoriasModelo::all();
        return view('comandos.crearComando', ['categorias' => $categorias, 'id' => null]);
    }

    public function verComandos() {
        $categorias = new categoriasModelo();
        $categorias = $categorias::all();
        $comandos = new comandosModelo;
        $comandos = $comandos->listarComandos();
        return view('comandos.verComandos', [
            'comandos' => $comandos,
            'categorias' => $categorias
        ]);
    }

    public function buscarComando() {

        if (!empty(file_get_contents("php://input"))) {
            $datosRecibidos = file_get_contents("php://input");
# No los hemos decodificado, así que lo hacemos de una vez:
            $comandoBuscar = json_decode($datosRecibidos);
            $funcion = $comandoBuscar->accion;
            $comandosModel = new comandosModelo();

            switch ($funcion) {
                case "idBuscarComando";

                    $id = $comandosModel->getById($comandoBuscar->inputComando);

                    $respuesta = comandos::crearVista($id);

                    if (!$id) {
                        header("http/1.1 500 error");
                        echo json_encode('{"resultado":"No hay coincidencia"}', JSON_FORCE_OBJECT);
                    } else if ($id) {
                        header("http/1.1 200 ok");
                        echo $respuesta;
                    }

                    break;
                case "descripcionBuscarComando";
                    $id = $comandosModel->getByDescription($comandoBuscar->inputComando);
                    $respuesta = comandos::crearVista($id);
                    if (!$id) {
                        header("http/1.1 500 error");
                        echo json_encode('{"resultado":"No hay coincidencia"}', JSON_FORCE_OBJECT);
                    } else if ($id) {
                        header("http/1.1 200 ok");
                        echo $respuesta;
                    }
                    break;

                case "nombreBuscarComando";
                    $id = $comandosModel->getByName($comandoBuscar->inputComando);
                    $respuesta = comandos::crearVista($id);
                    if (!$id) {
                        header("http/1.1 500 error");
                        echo json_encode('{"resultado":"No hay coincidencia"}', JSON_FORCE_OBJECT);
                    } else if ($id) {
                        header("http/1.1 200 ok");
                        echo $respuesta;
                    }
                    break;


                case "buscarCategoria";
                    $id = $comandosModel->getByCategory($comandoBuscar->inputComando);
                    $respuesta = comandos::crearVista($id);
                    if (!$id) {
                        header("http/1.1 500 error");
                        echo json_encode('{"resultado":"No hay coincidencia"}', JSON_FORCE_OBJECT);
                    } else if ($id) {
                        header("http/1.1 200 ok");
                        echo $respuesta;
                    }
                    break;
                case "sintaxisBuscarComando";
                    $id = $comandosController->getBySintaxis($comandoBuscar->inputComando);
                    if (!$id) {
                        header("http/1.1 500 error");
                        echo json_encode('{"resultado":"No hay coincidencia"}', JSON_FORCE_OBJECT);
                    } else if ($id) {
                        header("http/1.1 200 ok");
                        echo $respuesta;
                    }
                    break;
            }
        }
    }

}
