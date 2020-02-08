@extends('layout.plantilla')

@section('scripts')


<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

@stop

@section('content')


<div class="mt-4 pt-4">
    <div class="container bg-white mt-4 p-4 rounded">
        <div class="row">
            <div class="col text-center">
                <h1 class="display-4">{{$proyecto->nombre}}</h1>
                <hr>
                <div class=" d-flex justify-content-center">
                    <div class="col-6">  
                        <img class=" rounded img-fluid"  src='{{asset("/images/projects/$proyecto->imagen")}}'>
                    </div>

                </div>  
                @if($proyecto->url !='')
                <a class="p-2" href="{{$proyecto->url}}">Ir a la web.</a>
                
                @endif
                <div class="d-flex align-content-end justify-content-end"><small>{{$proyecto->fecha}}</small></div>

                <p>{{$proyecto->descripcion}}</p>    
                <hr>
                <h3><small>Tecnologias usadas<small></h3>
                <div>


                    @foreach ($categorias as $categoria)

                    @if(isset($tecnologias_usadas))
                    <?php $flag = false ?>

                    @foreach($tecnologias_usadas as $tecno)

                    @if($categoria->id == $tecno->idCategoria)

                    <button class="btn btn-outline-info">{{$categoria->nombre}}</button>

                    @endif


                    @endforeach

                    @endif
                 
                    @endforeach

                </div>
                <hr>
                <div class="d-flex flex-wrap justify-content-center">
                    @foreach($imagenes as $imagen)
                    <div class="col-md-3 col-sm-6 m-1" id="cardProyect">  
                        <a data-fancybox="gallery" href='{{asset("/images/projects/$imagen->nombre")}}'>
                            <img class="img-fluid " src='{{asset("/images/projects/$imagen->nombre")}}'>
                        </a>
                    </div>
                    @endforeach
                </div>

            </div>

        </div>
    </div>
</div>
@stop