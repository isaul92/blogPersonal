@extends('layout.plantilla')
@section('content')
<div class="mt-4 pt-4">
    <div class="container bg-white mt-4 p-4 rounded">
        <div class="row">
            <div class="d-flex justify-content-around">

                <div class="px-4 ml-4">
                    <h1 class=" ">Mendieta Galindo Isaul</h1>
                    <hr> 
                    <h5 class="mb-4">Ing. en Informatica</h5>

                    <p class="mt-4">                     
                        <img class="mr-2 img-fluid  rounded" src="{{asset('img/address.png')}}">     Avenida de los Fresnos , Arcos del Alba Cuautitlán Izcalli 
                    </p>
                    <p class="mt-4">                     
                        <img class="mr-2 img-fluid  rounded" src="{{asset('img/phone.png')}}">     5613159552 
                    </p>
                    <p class="mt-4">                     
                        <img class="mr-2 img-fluid  rounded" src="{{asset('img/mail.png')}}">     isaul92@outlook.es 
                    </p>
                </div>

                <div class="col-3 px-4">
                    <img class="img-fluid border rounded" src="{{asset('img/cv.jpeg')}}"> 
                </div>
            </div>
            <div class=" mx-md-1 col-12">
                <hr>
                <h4>Perfil</h4>
                <p class="p-1 text-justify">Tengo experiencia en el mantenimiento preventivo y correctivo de equipo de cómputo de escritorio y portátiles, instalación, mantenimiento y detección de fallos en redes LAN. Instalación de software y hardware, desarrollo web con conocimientos en la arquitectura MVC, cuento con conocimientos en distintas tecnologías para el desarrollo como lo es HTML5, CSS3, Bootstrap, JavaScript, PHP, JSP, Java y MySQL además tengo ligeras nociones en bases de datos NoSQL utilizando como gestor de datos MongoDB, naturalmente he trabajado en distintos proyectos donde he utilizado las tecnologías mencionadas. Conocimientos básicos en el desarrollo móvil con Android Studios utilizando Java para la parte de Android y PHP para los servicios web usando JSON para el envió de información lo utilice en el 9no cuatrimestre en un desarrollo de una aplicación orientado a los servicios de estilismo.</p>

                <div class="row">
                    <div class="d-flex flex-wrap col-12 justify-content-center ">
                        <div class="col-12 text-center">
                            <h5>Competencias profesionales</h5>
                        </div>
                        <div class="col-md-3 col-sm-12 border rounded m-1" >
                            Java
                            <ul >
                                <li>Herencia</li>
                                <li>Hilos</li>
                                <li>Reportes Jasper</li>
                                <li>Interfaces Graficas</li>
                                <li>JDBC</li>
                                <li>JSP</li>
                                <li>JavaBeans</li>
                                <li>Servlets</li>
                            </ul>


                        </div>


                        <div class="col-md-3 col-sm-12 border rounded m-1" >
                            PHP
                            <ul>
                                <li>Freamwork Laravel</li>
                                <li>Creación de API's</li>
                                <li>Conocimientos básicos de servicios REST</li>
                                <li>Desarrollos basados en la arquitectura MVC</li>
                                <li>Conexiones a SQL</li>
                                <li>Conocimiento en arquitectura LAMP</li>
                                <li>Composer y librerias</li>
                                <li>Uso de Postman</li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-12 border rounded m-1" >

                            JavaScript
                            <ul>
                                <li>Manejo de DOM</li>
                                <li>Peticiones AJAX</li>
                                <li>JQUERY</li>
                                <li>Uso de JSON</li>
                            </ul>                            
                            HTML 5
                            <ul>
                                <li>CSS3</li>
                                <li>BootStrap</li>
                                <li>Diseño responsivo </li>
                            </ul>
                        </div>

                        <div class="col-md-3 col-sm-12 border rounded m-1" >
                            MySQL
                            <ul>

                                <li>Consultas multitablas, consultas con JOIN, subconsultas</li>
                                <li>Bases de datos referenciales </li>
                                <li>Creación de bases de datos </li>
                                <li>Consultas, modificaciones, actualizacion, insercion de datos</li>
                                <li>Creación de procedimientos almacenados</li>


                            </ul>
                        </div>

                        <div class="col-md-3 col-sm-12 border rounded m-1" >
                            Servidores Web
                            <ul>
                                <li>Conocimientos en Linux/Ubuntu</li>
                                <li>Conexiones SSH </li>
                                <li>Servicios Apache </li>
                                <li>Servicios TomCat,Glassfish</li>
                                <li>Servicios NodeJS</li>
                                <li>Creación de instancias en AWS</li>

                            </ul>
                        </div>

                        <div class="col-md-3 col-sm-12 border rounded m-1 " >
                            Redes 
                            <ul>
                                <li>Conocimiento en modelo OSI </li>
                                <li>Ponchado y testing de cableado</li>
                                <li>Direccionamiento IP</li>
                                <li>Enrutamiento estatico y dinamico</li>
                                <li>Subneteo VLSM</li>
                                <li>Certificados CISCO CCNA </li>

                            </ul>
                            Protocolos
                            <ul>
                                <li>DHCP</li>
                                <li>FTP</li>
                                <li>SSH</li>
                                <li>SMTP, POP3 </li>
                                <li>HTTP</li>
                                <li>DNS</li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-12 border rounded m-1" >
                            Mantenimiento y Soporte Tecnico
                            <ul>
                                <li>Deteccion de fallas de Hardware y Software</li>
                                <li>Uso de tajerta POST</li>
                                <li>Comprobacion de discos duros </li>
                                <li>Limpieza de hardware en laptops y computadoras de escritorio</li>
                                <li>Clonacion de S.O con EaseUs y Clonezilla</li>
                                <li>Uso de Live CD </li>
                                <li>Soporte en sitio </li>

                            </ul>
                        </div>

                    </div>
                </div>
                <hr>

                <div class="row ">
                    <div class=" col-md-6 col-sm-12">
                        <h4>Experiencia Laboral</h4>
                        <div class="d-flex justify-content-around"><p>Alta Tecnología  </p>
                            <p>1 Año</p>
                        </div>
                        <p class="text-justify">Realice distintos servicios como la implementación de acciones preventivas y correctivas a diferentes equipos de cómputo, como son impresoras, laptops y computadoras, además de 
                            realizar soporte en sitio, resolviendo problemas de conexión y software o en su defecto de hardware, además de desarrollar pequeños proyectos de software.</p>


                    </div>
                    <div class=" col-md-6 col-sm-12">
                        <br>
                        <div class="d-flex justify-content-around"><p>Distribuidora Gasa  </p>
                            <p>2 Años</p>
                        </div>
                        <p class="text-justify">Desempeñe distintas funciones y actividades dentro de la organización como lo es, recepción de mercancía y alimentado de inventario, soporte técnico a clientes, instalación de software de POS, facturación, cotizaciones, entrega de mercancía.</p>
                    </div>

                    <div class=" col-md-6 col-sm-12">
                        <br>
                        <div class="d-flex justify-content-around"><p> Renta de Consolas e Internet </p>
                            <p>1 Año</p>
                        </div>
                        <p class="text-justify">Desempeñe el rol de encargado de un centro de entretenimento donde como principales actividades era la renta del equipo de computo y consolas de videojuegos
                            , copiado e imprenta de documentos y  del mantenimiento de la red LAN.</p>
                    </div>
                </div>
                <hr>
                <div class="row d-flex">
                    <div class=" col-md-6 col-sm-12">
                        <h4>Estudios</h4>
                        <ul>
                            <li>TÉCNICO OPERADOR DE 
                                MICROCOMPUTADORAS</li>
                            <div class="d-flex justify-content-end col-md-10 col-sm-12">  2011-2013 </div>

                            <li>ING. EN INFORMATICA </li>
                            <div class="d-flex justify-content-end col-md-10 col-sm-12">     2015 - 2019  </div>
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <h4>Datos de Interes</h4>
                        <ul>
                            <li> Licencia de conducir, 7 años de experiencia </li>
                            <li> Experiencia en el área de almacén  e inventario </li>
                            <li>Experiencia en transporte, entrega y recepción de mercancia</li>
                            <li>Conocimientos en facturacion electronica</li>
                        </ul>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@stop