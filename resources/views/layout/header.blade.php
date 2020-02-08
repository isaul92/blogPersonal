
<nav class=" navbar navbar-expand-lg navbar-dark bg-dark fixed-top mb-4">


    <a class="navbar-brand" href="{{action('proyectosController@about')}}">Sobre mi</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="{{action('proyectosController@verProyectos')}}">Proyectos <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{action('proyectosController@cv')}}">Curriculum</a>
            </li>
          

            <li class="nav-item">
                <a class="nav-link" href="{{action('comandos@verComandos')}}"> Comandos</a>
            </li>


            <li>
                <a class="nav-link principalLetrasNav navHover"   data-toggle="modal" data-target="#fm-modal" href="#">Contacto</a>
            </li>
        </ul>

        <div class="form-inline my-2 my-lg-0">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>

    </div>
</nav>
<div class="modal fade " id="fm-modal" tabindex="-1" role="dialog" aria-labelledby="fm-modal"

     aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h2 class="">  Contacto</h2>
            </div>
            <div class="modal-body">

                <p class="text-center mb-0">Email</p>
                <p class="text-center">isaul92@outlook.es</p>
                
                  <p class="text-center mb-0">Telefono</p>
                <p class="text-center">5613159552</p>



            </div> 

        </div>

    </div>

</div>



