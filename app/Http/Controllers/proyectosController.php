<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\imagenes_proyectosModel;
use App\proyectos;
use App\categoriasModelo;
use App\tecnologias_usadas;
use Illuminate\Http\Request;

class proyectosController extends Controller {

    public function cv() {
        return view('layout.curriculum');
    }

    public function verProyecto($id) {
        $categorias = categoriasModelo::all();
        $proyecto = proyectos::find($id);
        $tecnologias_usadas = tecnologias_usadas::buscarPorProyecto($id);
        $imagenes = imagenes_proyectosModel::where('idProyecto', $id)->get();
        return view('proyectos.verProyecto', [
            'proyecto' => $proyecto,
            'imagenes' => $imagenes,
            'categorias' => $categorias,
            'tecnologias_usadas' => $tecnologias_usadas,
        ]);
    }

    public function verProyectos() {
        $proyectos = proyectos::all();
        return view("proyectos.verProyectos", [
            'proyectos' => $proyectos
        ]);
    }

    public function crearProyecto() {
        $categorias = categoriasModelo::all();
        return view("proyectos.crearProyectos", ['categorias' => $categorias]);
    }

    public function guardarProyecto(Request $request) {
        $validate = $this->validate($request, [
            'nombre' => 'string|required',
            'fecha' => 'required|after_or_equal:fecha',
            'descripcion' => 'string|required',
        ]);
        $nombre = "";
        $fecha = "";
        $descripcion = "";
        $url = "";
        $url = $request->input('url');
        $tecnologias = $request->input('tecnologias');
        $nombre = $request->input('nombre');
        $fecha = $request->input('fecha');
        $descripcion = $request->input('descripcion');
        $date = date_create($fecha);

        $file = $request->file('imagen');
        $path = public_path() . '/images/projects';
        $fileName = uniqid() . $file->getClientOriginalName();
        $file->move($path, $fileName);

        $proyecto = new proyectos();
        $proyecto->nombre = $nombre;
        $fecha = date_format($date, 'Y/m/d H:i:s');
        $proyecto->fecha = $fecha;
        $proyecto->descripcion = $descripcion;
        $proyecto->url = $url;
        $proyecto->imagen = $fileName;





        $id = $proyecto->save();


        if (!empty($tecnologias)) {
            foreach ($tecnologias as $tecno) {
                $tecnologia = new tecnologias_usadas();
                $tecnologia->idCategoria = $tecno;
                $tecnologia->idProyecto = $id;
                $tecnologia->save();
            }
        }


        return redirect()->action('proyectosController@crearProyecto'
                )->with('status', 'Proyecto Creado!');
    }

    public function update(Request $request) {
        $validate = $this->validate($request, [
            'id' => 'integer|required',
            'nombre' => 'string|required',
            'fecha' => 'required|after_or_equal:fecha',
            'descripcion' => 'string|required',
        ]);
        $nombre = "";
        $fecha = "";
        $descripcion = "";
        $url = "";
        $url = $request->input('url');
        $tecnologias = $request->input('tecnologias');
        $id = $request->input('id');
        $nombre = $request->input('nombre');

        $descripcion = $request->input('descripcion');

        $proyecto = proyectos::find($id);
        $proyecto->url = $url;
        $proyecto->nombre = $nombre;
        $fecha = $request->input('fecha');
        $date = date_create($fecha);
        $fecha = date_format($date, 'Y/m/d H:i:s');
        $proyecto->fecha = $fecha;
        $proyecto->descripcion = $descripcion;

        $file = $request->file('imagen');
        if (!empty($file)) {
            $path = public_path() . '/images/projects';
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);

            $image_path = public_path() . '/images/projects/' . $proyecto->imagen;
            $proyecto->imagen = $fileName;
            //    unlink($image_path);
        }


        $proyecto->update();
        tecnologias_usadas::where('idProyecto', $id)->delete();
        if (!empty($tecnologias)) {
            foreach ($tecnologias as $tecno) {
                $tecnologia = new tecnologias_usadas();
                $tecnologia->idCategoria = $tecno;
                $tecnologia->idProyecto = $id;
                $tecnologia->save();
            }
        }

        return redirect()->action('proyectosController@modificarProyecto', [
                    'id' => $id
                ])->with('status', 'Proyecto Actualizado!');
    }

    public function about() {
        return view('layout.sobreMi');
    }

    public function modificarProyecto($id, $mensaje = '') {
        $imagenes = imagenes_proyectosModel::where('idProyecto', '=', $id)->get();
        $categorias = categoriasModelo::all();
        $proyecto = proyectos::find($id);
        if (!empty($proyecto)) {
            $tecnologias_usadas = tecnologias_usadas::buscarPorProyecto($id);
            $proyecto->fecha = $newDate = date("m/d/Y", strtotime($proyecto->fecha));
            return view("proyectos.crearProyectos", [
                'categorias' => $categorias,
                'proyecto' => $proyecto,
                'tecnologias_usadas' => $tecnologias_usadas,
                'mensaje' => $mensaje,
                'imagenes' => $imagenes,
                'id' => $id
            ]);
        } else {
            return redirect()->action('proyectosController@crearProyecto')->with('error', 'No existe Proyecto');
        }
    }

    public function elimianarImagen($id) {


        $img = imagenes_proyectosModel::find($id);
        $id = $img->idProyecto;
        $image_path = public_path() . '/images/projects/' . $img->nombre;
        unlink($image_path);

        $img->delete();
        return redirect()->action('proyectosController@modificarProyecto', [
                    'id' => $id
                ])->with('status', 'Proyecto Actualizado!');
    }

    public function uploadImage($id, Request $request) {
        $file = $request->file('file');
        $path = public_path() . '/images/projects';
        $fileName = uniqid() . $file->getClientOriginalName();
        $file->move($path, $fileName);
        $projectImage = new imagenes_proyectosModel();
        $projectImage->idProyecto = $id;
        $projectImage->nombre = $fileName;
        $projectImage->save();
    }

}
