@extends('layout.plantilla')
@section('scripts')
@guest
<script src="{{ asset('js/paginacion.js') }}"></script>
@else
@if( Auth::user()->role=='admin')
<script src="{{ asset('js/paginacionAdmin.js') }}"></script>
@endif
@endguest
<script src="{{ asset('js/buscadorComandos.js') }}"></script>
@stop


@section('content')
<div class="container mt-4 pt-4 ">
    <div class="row">

        <div class="col bg-white border rounded mt-4">
            <h1>Lista de comandos</h1>
            @guest

            @else
            <a href="{{action('comandos@crearComando')}}" class="btn btn-outline-secondary m-3" style="color:black;">Crear comando</a>
            @endguest

            <div class=" rounded p-2">
                <h5 class="">Seleccione alguna opcion de busqueda</h5>

                <form id="buscarComando" class="border-2 rounded" method="POST">

                    <div class="container d-flex justify-content-start flex-wrap">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">   <div class="radiogp btn-group btn-group-toggle mb-2" data-toggle="buttons">
                                    <label style="color:black!important;" class="btn btn-outline-info active">
                                        <input  type="radio" name="options" value="idBuscarComando" id="idBuscarProducto" autocomplete="off" checked> ID
                                    </label>
                                    <label style="color:black!important;"  class="btn btn-outline-info">
                                        <input type="radio" name="options" value="nombreBuscarComando" id="nombreBuscarProducto" autocomplete="off"> Nombre
                                    </label>
                                    <label style="color:black!important;" class="btn btn-outline-info">
                                        <input type="radio" name="options" value="sintaxisBuscarComando" id="sintaxisBuscarProducto" autocomplete="off"> Sintaxis
                                    </label>
                                    <label style="color:black!important;" class="btn btn-outline-info">
                                        <input type="radio" name="options" value="descripcionBuscarComando" id="descripcionBuscarProducto" autocomplete="off"> Descripcion
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12 d-flex mb-3">
                                <div class="col">  <select name="categoria_id"  class="form-control "require  id="inputSelectCategoriaBuscar">
                                        @foreach ($categorias as $categoria)
                                        <option value="{{$categoria->id}}" >   {{$categoria->nombre}}</option>
                                        @endforeach
                                    </select></div>
                                <div class="col"> 
                                    <a href="#" class="btn btn-outline-info" id="listarTodos">Listar todos</a></div>
                            </div>


                        </div>
                    </div> 
                    <div class="col-md-7 col-sm-8">
                        <input class="form-control mb-4"  type="text" name="buscadorComandoInput" id="inputBuscarComandoId" placeholder="Buscar un comando">

                    </div>
                </form>

                <div class="" id="numeroDeElementos">

                </div>

                <div id='panelBusqueda' class='panel panel-primary'> 
                    <table class='table table-striped table-hover table-responsive'>
                        <thead>
                            <tr>
                                <th>CATEGORIA</th>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>SINTAXIS</th>
                                <th>DESCRIPCION</th>
                                @guest

                                @else
                                @if( Auth::user()->role=='admin')
                                <th>ACCIONES</th>
                                @endif
                                @endguest
                            </tr>
                        </thead>
                        <tbody id="miTabla">



                            <!-- Paginacion laravel  --> 
                            <!--                            @foreach($comandos as $comando)
                                                        <tr>
                                                            <td> {{$comando->nombreCategoria}}</td>
                                                            <td> {{$comando->id}} </td> 
                                                            <td> {{$comando->nombre }}</td>
                                                            <td> {{$comando->comando}} </td>
                                                            <td> {{$comando->descripcion}}</td>
                                                        </tr>
                                                        @endforeach-->



                        </tbody>
                        <!-- Paginacion -->
                    </table>

                    <div class="clearfix"></div>
                    <div class="col d-flex justify-content-center" id="contenedorPaginador">


                        <ul class="pagination" id="paginador"></ul>


                        <!-- Paginacion laravel --> 
                    </div>
                </div>
            </div>


        </div>
    </div>

    @stop