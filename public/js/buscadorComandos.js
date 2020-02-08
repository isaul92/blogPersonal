$(document).on('change', "#inputSelectCategoriaBuscar", function (e) {

    e.preventDefault();
    $("#paginador").remove();
    $("#contenedorPaginador").html("<ul class='pagination' id='paginador'></ul>")
    data = '{"accion":"' + 'buscarCategoria' + '","inputComando":"' + $("#inputSelectCategoriaBuscar").val() + '"}';
    $.ajax({

        data: {"param1": "cuantos", "opcion": "buscarPorCategoria", "id": $("#inputSelectCategoriaBuscar").val()},
        type: "POST",
        dataType: "json",
        url: "./api/paginacion"
    }).done(function (data, textStatus, jqXHR) {
        var total = data.total;
        $("#numeroDeElementos").html("<h3>Numero de coincidencias: " + total + " </h3>")
        creaPaginador(total, "buscarPorCategoria", $("#inputSelectCategoriaBuscar").val());


    }).fail(function (jqXHR, textStatus, textError) {
        alert("Error al realizar la peticion cuantos".textError);

    });


});

$(document).on("submit", "#buscarComando", function (e) {

    data = '{"accion":"' + $('input:radio[name=options]:checked').val() + '","inputComando":"' + $("#inputBuscarComandoId").val() + '"}';


    e.preventDefault();
    $("#paginador").remove();
    $("#contenedorPaginador").html("<ul class='pagination' id='paginador'></ul>")

    $.ajax({

        data: {"param1": "cuantos", "opcion": $('input:radio[name=options]:checked').val(), "id": $("#inputBuscarComandoId").val()},
        type: "POST",
        dataType: "json",
        url: "./api/paginacion"
    }).done(function (data, textStatus, jqXHR) {
        var total = data.total;
        $("#numeroDeElementos").html("<h3>Numero de coincidencias: " + total + " </h3>")
        creaPaginador(total, $('input:radio[name=options]:checked').val(), $("#inputBuscarComandoId").val());


    }).fail(function (jqXHR, textStatus, textError) {
        alert("Error al realizar la peticion cuantos".textError);

    });



});


$(document).on("click", "#listarTodos", function (e) {

    data = '{"accion":"' + $('input:radio[name=options]:checked').val() + '","inputComando":"' + $("#inputBuscarComandoId").val() + '"}';


    e.preventDefault();
    $("#paginador").remove();
    $("#contenedorPaginador").html("<ul class='pagination' id='paginador'></ul>")

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