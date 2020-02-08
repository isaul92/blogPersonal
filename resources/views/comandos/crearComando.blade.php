@extends('layout.plantilla')




@section('scripts')
@if(!isset($flag))
<script src="{{ asset('js/agregarComando.js') }}"></script>
@else
<script src="{{ asset('js/modificarComando.js') }}"></script>
@endif  


@stop


@section('content')


<div class="container mt-4 p-4">
    <div class="row">
        
        <div class="col border rounded mt-4 bg-white rounded mt-4 p-4">
            
            @if(!isset($flag))
            <h1 class="display-4">Agregar comando</h1>
            @else
            <h1 class="display-4">Modificar comando</h1>
            @endif
            <hr>

            <div class="divMensaje">

            </div>
              <a class="btn btn-outline-info" href="{{action('comandos@verComandos')}}">Ver comandos</a>
         @if(isset($flag))  <a class="btn btn-outline-success" href="{{action('comandos@crearComando')}}">Crear comandos</a>  @endif
            <form class="p-3 mt-4" id="crearComando">
                @if (isset($flag)) <input type="hidden" name="id" id="id" value="{{$id}}"> @endif
                Nombre<input type="text" value="{{ isset($comando) ?  $comando->nombre : '' }}"  require id="inputNameComand" class="form-control" placeholder="Agregar nombre ">
                Descripcion<textarea type="text"  value=""require id="inputDescComand" class="form-control" placeholder="Agregar una descripcion ">{{ isset($comando) ?  $comando->descripcion : '' }}</textarea>      
                Sintaxis<input type="text" class="form-control" require value="{{ isset($comando) ?  $comando->comando : '' }}" id="inputStyntaxComand" placeholder="Agregar la sintaxis del comando ">
                Categoria 
                <select name="categoria_id"  class="form-control"require  id="inputSelectCategoria" value="{{ isset($comando) ?  $comando->tecnologia : '' }}">

                    @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}" {{isset($comando)&& $comando->tecnologia_id==$categoria->id  ?  'selected': '' }} >   {{$categoria->nombre}}</option>
                    @endforeach
                </select>



          
                <input type="submit" class="btn btn-outline-success mt-4 " value="{{ isset($comando) ? 'Modificar' : 'Guardar' }}">
                 <a href="{{action('comandos@verComandos')}}" class="btn btn-outline-danger mt-4">Cancelar</a>
            </form>

          

        </div>


    </div>




</div>

@stop