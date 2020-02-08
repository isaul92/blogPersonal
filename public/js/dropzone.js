Dropzone.autoDiscover = false;
	jQuery(document).ready(function() {

	  $("div#my-awesome-dropzone").dropzone({
	    url: "../subirImagen"
	  });

	});
        
        Dropzone.options.myAwesomeDropzone = {
    paramName: "file", // Las imágenes se van a usar bajo este nombre de parámetro
    maxFilesize: 2 // Tamaño máximo en MB
};