@extends('layout.plantilla')
@section('content')
<div class="mt-4 pt-4">
    <div class="container bg-white mt-4 p-4 rounded">
        <div class="row">
            <div class="col">
                <h1 class="display-4">Proyectos</h1>
                <hr>
                <p class="p-2">A continuación enlisto una serie de desarrollos creados e implementados por mí, de distintas naturalezas y en la mayoría de los casos son proyectos escolares los cuales tuve la oportunidad de crear.</p>
                <div class="container p-2 text-center ">
                    <div class="d-flex flex-wrap  justify-content-center ">
                        @foreach($proyectos as $proyect)
                        <div id="cardProyect" class="  col-md-3  col-sm-6  rounded  mx-3 p-2   "> 
                            <h3><a id="titulosProyectos" href="{{route('proyectos.verProyecto',['id'=>$proyect->id])}}"><small>{{$proyect->nombre}}</small></a></h3>
                            <hr>
                            @if( Auth::user())
                            <p><a href="{{route('proyecto.modificar',['id'=>$proyect->id])}}" id="titulosProyectos">Modificar</a> <a class="mx-4" href="{{route('proyecto.modificar',['id'=>$proyect->id])}}" id="titulosProyectos">Eliminar</a></p>
                            @endif
                            <img class=" rounded  img-fluid"  src='{{asset("/images/projects/$proyect->imagen")}}'>

                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop