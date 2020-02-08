var paginador;
var totalPaginas;
var itemsPorPagina = 10;
var numerosPorPagina = 10;

function creaPaginador(totalItems,opcionBusqueda,id=2)
{
    paginador = $(".pagination");

    totalPaginas = Math.ceil(totalItems / itemsPorPagina);
    $('<li><a href="#" class="prev_link"><</a></li>').appendTo(paginador);
    $('<li><a href="#" class="first_link">«</a></li>').appendTo(paginador);


    var pag = 0;
    while (totalPaginas > pag)
    {
        $('<li class="page-item"><a href="#" class="page_link  ">' + (pag + 1) + '</a></li>').appendTo(paginador);
        pag++;
    }


    if (numerosPorPagina > 1)
    {
        $(".page_link").hide();
        $(".page_link").slice(0, numerosPorPagina).show();
    }


    $('<li><a href="#" class="last_link"> » </a></li>').appendTo(paginador);
    $('<li><a href="#" class="next_link">></a></li>').appendTo(paginador);

    paginador.find(".page_link:first").addClass("active");
    paginador.find(".page_link:first").parents("li").addClass("active");

    paginador.find(".prev_link").hide();

    paginador.find("li .page_link").click(function ()
    {
        var irpagina = $(this).html().valueOf() - 1;
        cargaPagina(irpagina,opcionBusqueda,id);
        return false;
    });

    paginador.find("li .first_link").click(function ()
    {
        var irpagina = 0;
        cargaPagina(irpagina,opcionBusqueda,id);
        return false;
    });

    paginador.find("li .prev_link").click(function ()
    {
        var irpagina = parseInt(paginador.data("pag")) - 1;
        cargaPagina(irpagina,opcionBusqueda,id);
        return false;
    });

    paginador.find("li .next_link").click(function ()
    {
        var irpagina = parseInt(paginador.data("pag")) + 1;
        cargaPagina(irpagina,opcionBusqueda,id);
        return false;
    });

    paginador.find("li .last_link").click(function ()
    {
        var irpagina = totalPaginas - 1;
        cargaPagina(irpagina,opcionBusqueda,id);
        return false;
    });

    cargaPagina(0,opcionBusqueda,id);




}

function cargaPagina(pagina,opcionDeBusqueda,id=1)
{
    var desde = pagina * itemsPorPagina;

    $.ajax({
        data: {"param1": "dame", "limit": itemsPorPagina, "offset": desde,"opcion":opcionDeBusqueda,"id":id},
        type: "POST",
        dataType: "json",
        url: "./api/paginacion"
    }).done(function (data, textStatus, ) {

        var lista = data.lista;

        $("#miTabla").html("");

        $.each(lista, function (ind, elem) {

            $("<tr>" +
                    "<td>" + elem.nombreCategoria + "</td>" +
                    "<td>" + elem.id + "</td>" +
                    "<td>" + elem.nombre + "</td>" +
                    "<td>" + elem.comando + "</td>" +
                    "<td>" + elem.descripcion + "</td>" +
                    "</tr>").appendTo($("#miTabla"));


        });


    }).fail(function (jqXHR, textStatus, textError) {
        alert("Error al realizar la peticion dame".textError);

    });

    if (pagina >= 1)
    {
        paginador.find(".prev_link").show();

    } else
    {
        paginador.find(".prev_link").hide();
    }


    if (pagina < (totalPaginas -1))
    {
        paginador.find(".next_link").show();
    } else
    {
      paginador.find(".next_link").hide();
    }

    paginador.data("pag", pagina);

    if (numerosPorPagina > 1)
    {
        $(".page_link").hide();
        if (pagina < (totalPaginas - numerosPorPagina))
        {
            $(".page_link").slice(pagina, numerosPorPagina + pagina).show();
        } else {
            if (totalPaginas > numerosPorPagina)
                $(".page_link").slice(totalPaginas - numerosPorPagina).show();
            else
                $(".page_link").slice(0).show();

        }
    }

    paginador.children().removeClass("active");
    paginador.children().eq(pagina + 2).addClass("active");


}


$(function ()
{

    $.ajax({

        data: {"param1": "cuantos","opcion":"listarTodos"},
        type: "POST",
        dataType: "json",
        url: "./api/paginacion"
    }).done(function (data, textStatus, jqXHR) {
        var total = data.total;
$("#numeroDeElementos").html("<h3>Numero de comandos: "+total+" </h3>")
        creaPaginador(total,"listarTodos",1);


    }).fail(function (jqXHR, textStatus, textError) {
        alert("Error al realizar la peticion cuantos".textError);

    });



});

