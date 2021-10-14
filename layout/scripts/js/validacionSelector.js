$(document).ready(function () {

/*=========================================
=            Valida Selectores            =
=========================================*/


var provincias=function(parametro1){

	indicador=1;

	$.ajax({

	  data: {indicador:indicador},
      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/selector.modelo.php'

	}).done(function(listar__lugar){

	  $(parametro1).html(listar__lugar);

	}).fail(function(){

	  

	});


}

provincias($("#provincia"));
provincias($("#provinciaFederacion"));
provincias($("#provinciaActa"));
provincias($("#provinciaFederacionRepresentante"));
provincias($("#provinciaPatrocinador"));
provincias($("#provinciaFederacionRepresentanteAtletas"));

var cantones=function(parametro1,parametro2){

	$(parametro2).change(function(){

		indicador=2;

		provincia=$(this).val();

		$.ajax({

		  data: {indicador:indicador,provincia:provincia},
	      dataType: 'html',
	      type:'POST',
		  url:'modelosBd/validaciones/selector.modelo.php'

		}).done(function(listar__lugar){

		  $(parametro1).html(listar__lugar);

		}).fail(function(){

		  

		});


	});

}

cantones($("#canton"),$("#provincia"));
cantones($("#cantonFederacion"),$("#provinciaFederacion"));
cantones($("#cantonActa"),$("#provinciaActa"));
cantones($("#cantonFederacionRepresentante"),$("#provinciaFederacionRepresentante"));
cantones($("#cantonPatrocinador"),$("#provinciaPatrocinador"));
cantones($("#cantonFederacionRepresentanteAtletas"),$("#provinciaFederacionRepresentanteAtletas"));

var parroquias=function(parametro1,parametro2){

	$(parametro2).change(function(){

		indicador=3;

		canton=$(this).val();

		$.ajax({

		  data: {indicador:indicador,canton:canton},
	      dataType: 'html',
	      type:'POST',
		  url:'modelosBd/validaciones/selector.modelo.php'

		}).done(function(listar__lugar){

		  $(parametro1).html(listar__lugar);

		}).fail(function(){

		  

		});


	});

}

parroquias($("#parroquia"),$("#canton"));
parroquias($("#parroquiaFederacion"),$("#cantonFederacion"));
parroquias($("#parroquiaActa"),$("#cantonActa"));
parroquias($("#parroquiaFederacionRepresentante"),$("#cantonFederacionRepresentante"));
parroquias($("#parroquiaPatrocinador"),$("#cantonPatrocinador"));
parroquias($("#parroquiaFederacionRepresentanteAtletas"),$("#cantonFederacionRepresentanteAtletas"));

var usuariosTalentoHumano=function(parametro1,parametro2){


	$.ajax({

	   	dataType: 'html',
	   	type:'POST',
		url:'modelosBd/validaciones/talentoHumano.modelo.php'

	}).done(function(listar__lugar){

		$(parametro1).html(listar__lugar);

	}).fail(function(){

		

	});

}

usuariosTalentoHumano($("#selectorUsuariosDelegados"));


var componentes=function(parametro1){

	$.ajax({

      dataType: 'html',
      type:'POST',
	  url:'modelosBd/validaciones/componentes.modelo.php'

	}).done(function(listar__lugar){

	  $(parametro1).html(listar__lugar);

	}).fail(function(){

	  

	});


}

componentes($("#componenteSeleccion"));


/*=====  End of Valida Selectores  ======*/

});