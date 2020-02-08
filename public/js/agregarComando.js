$(document).on("submit", "#crearComando", function (e) {
    function showTooltip()
    {
        $("#message").show("slow");
        setTimeout(hideTooltip, 3000)
    }

    function hideTooltip()
    {
        $("#message").hide("slow");
        $(".mensaje").removeAttr('id');
    }

    e.preventDefault();
    nombre = $("#inputNameComand").val();
    nombre = nombre.replace(/"/g, "'");

    descripcion = $("#inputDescComand").val();
    descripcion = descripcion.replace(/"/g, "'");

    sintax = $("#inputStyntaxComand").val();
    sintax = sintax.replace(/"/g, "'");

    categoria = $("#inputSelectCategoria").val();
    data = '{"nombre":"' + nombre + '","descripcion":"' + descripcion + '","sintax":"' + sintax + '","categoria":"' + categoria + '"}';

    if (nombre.length <= 0 || descripcion.length <= 0 || sintax.length <= 0 || categoria.length <= 0) {
        alert("¡FALTAN DATOS!");
    } else {
        $.ajax({
            type: "POST",
            "url": "./api/crearComandoAPI",
            data: data
        }).done(function (data) {


            mensaje = "GUARDADO CON EXITO";
            $(".divMensaje").append("<div id='message' class='mensaje badge badge-success'>" + mensaje + "</div>");
            setTimeout(showTooltip, 500);

        }).fail(function (data) {

            alert("¡No se ha podido crear!");



        })

    }
});