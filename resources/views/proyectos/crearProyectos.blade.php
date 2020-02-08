@extends('layout.plantilla')


@section('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
<script src="{{ asset('js/calendario.js') }}"></script>

@stop

@section('content')
<div class="mt-4 pt-4">
    <div class="container bg-white mt-4 p-4 rounded">
        <div class="row">
            <div class="col">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                @if(!isset($proyecto))
                <h1>Crear Proyecto</h1>
                @else
                <h1>Modificar Proyecto</h1>
                @endif
                <hr>



                @if(isset($proyecto))  <a class="btn btn-outline-success" href="{{action('proyectosController@crearProyecto')}}">Crear proyectos</a>  @endif

                <form class="p-3 mt-4" id="crearComando" action="{{isset($proyecto) ?  action('proyectosController@update') : action('proyectosController@guardarProyecto')}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    @if (isset($proyecto)) <input type="hidden" name="id" id="id" value="{{$id}}"> @endif
                    Nombre<input type="text" value="{{ isset($proyecto) ?  $proyecto->nombre : '' }}"  require id="inputNameComand" name="nombre" class="form-control" placeholder="Agregar nombre ">
                    Descripcion<textarea type="text" name='descripcion' value=""require id="inputDescComand" class="form-control" placeholder="Agregar una descripcion ">{{ isset($proyecto) ?  $proyecto->descripcion : '' }}</textarea>      

                    <div class="mb-4"> 
                        Teconologias usadas
                        <div>


                            @foreach ($categorias as $categoria)

                            @if(isset($tecnologias_usadas))
                            <?php $flag = false ?>

                            @foreach($tecnologias_usadas as $tecno)

                            @if($categoria->id == $tecno->idCategoria)

                            <?php $flag = true ?>

                            @endif


                            @endforeach

                            @endif
                            <label class="checkbox-inline btn btn-outline-info"><input type="checkbox" name='tecnologias[]'  class="px-2" {{(isset($flag) && $flag) ? 'checked' : ''}} value="{{$categoria->id}}">{{$categoria->nombre}}</label>
                            @endforeach

                        </div>
                        URL
                        <input type="text"  class="form-control"name="url" placeholder="Ingresa URL" value="{{  isset($proyecto) ? $proyecto->url:'' }}">
                        
                        Fecha de Creacion
                        <input style="" class="form-control" type="text" id="datepicker" name='fecha' value='{{isset($proyecto) ? $proyecto->fecha:""}}' placeholder="Fecha">


                        Imagen Principal
                        <input class="form-control mb-4 text-center" type="file" name="imagen">
                        <div class="col-3">
                            @if(isset($proyecto))
                            <img class="principales img-fluid rounded p-3" src='{{asset("/images/projects/$proyecto->imagen")}}'>
                            @endif
                        </div>

                        <input type="submit" class="btn btn-outline-success mt-4 " value="{{ isset($comando) ? 'Modificar' : 'Guardar' }}">
                        <a href="{{action('comandos@verComandos')}}" class="btn btn-outline-danger mt-4">Cancelar</a>
                </form>




                @if(isset($proyecto))
                <hr>
                <h2>Imagenes del Proyecto</h2>
                <hr>

                <form action="{{ asset('/proyecto/'.$id.'/imagenes') }}"
                      class="dropzone" id="my-awesome-dropzone">
                    {{ csrf_field() }}
                </form>
                @endif
                <hr>
                @if(isset($proyecto) )
                <hr>
                <div class="container  ">
                    <div class="d-flex flex-wrap   ">


                        @foreach($imagenes as $img) 
                        <div class="  col-2 border rounded  m-1 p-0   "> 
                            <a href="{{route('proyecto.eliminarImagen',$img->id)}}">Eliminar</a>
                            <img class="principales img-fluid rounded p-3" src='{{asset("/images/projects/$img->nombre")}}'>

                        </div> 
                        @endforeach
                        @endif


                    </div>
                </div>




            </div>


        </div>
    </div>

</div>

@stop