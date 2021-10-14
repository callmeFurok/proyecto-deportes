$(document).ready(function () {



/*==============================================
=            Validacion Formularios            =
==============================================*/

	
	function validacionRegistro(parametro1){

		var sumadorErrores=0;

	     $(parametro1).each(function(index) {
	          if($(this).val()==""){
	             sumadorErrores++;
	          }
	     });

	     if (sumadorErrores==0) {
	     	return true;
	     }else{
	     	return false;
	     }

	}

	var validacionRegistroMostrarErrores=function(parametro1){

		var sumadorErrores=0;

	     $(parametro1).each(function(index) {
	          if($(this).val()==""){
	            $(this).addClass('error');
	            // alert($(this).attr('id'));
	          }else{
	          	$(this).removeClass('error');
	          }
	     });

	}

	function validacionRegistroChecks(parametro1){

		var sumadorCheked=0;

	     $(parametro1).each(function(index) {
	         var condicion = $(parametro1).is(":checked");
	         if (condicion) {
	         	sumadorCheked++;
	         }
	     });

	     if (sumadorCheked>0) {
	     	return true;
	     }else{
	     	return false;
	     }

	}

/*=====  End of Validacion Formularios  ======*/

/*===========================================
=            Función del checked            =
===========================================*/


var validacionRecorrerChekeds=function(parametro1){

	var condicion = $(parametro1).is(":checked");

	if (condicion) {
		return "si";
	}else{
		return "no";
	}

}


/*=====  End of Función del checked  ======*/

/*======================================
=            Checkeds Array            =
======================================*/

var validacionRecorrerChekedsArrays=function(parametro1){

	
	var array = new Array(); 

    $(parametro1).each(function(index) {

    	var condicion = $(this).is(":checked");

    	if (condicion) {
			var nomenclatura= "si";
		}else{
			var nomenclatura= "no";
		}

        array.push(nomenclatura);

    });


    return array;


}


/*=====  End of Checkeds Array  ======*/


/*=============================================
=            Agrupar por secciones            =
=============================================*/

function concatenarValores(parametro1){
	
	var array = new Array(); 

	var string="";

    $(parametro1).each(function(index) {

        array.push($(this).val());

    });


    return array;

}




/*=====  End of Agrupar por secciones  ======*/

/*============================================
=            Minimo de caracteres            =
============================================*/

function valoresMinimos(parametro1){
	
	var sumadorErrores=0;

	$(parametro1).each(function(index) {

	    if($(this).text()!=""){
	      sumadorErrores++;
	    }

	});

	if (sumadorErrores==0) {
	    return true;
	}else{
	    return false;
	}

}

/*=====  End of Minimo de caracteres  ======*/

/*================================
=            Mensajes            =
================================*/
var validacionMensajeObligatorio=function(parametro1){

	alertify.set("notifier","position", "top-right");
	alertify.notify("Campos obligatorios", "error", 5, function(){});	
	$(parametro1).show();

}
/*=====  End of Mensajes  ======*/


/*==========================================
=            Mínimos caracteres            =
==========================================*/
var validacionMinimoCaracteres=function(parametro1){

	alertify.set("notifier","position", "top-right");
	alertify.notify("Fijarse en las palabras mínimas requeridas", "error", 5, function(){});	
	$(this).show();


}
/*=====  End of Mínimos caracteres  ======*/


/*=============================================
=            Prametros de checkeds            =
=============================================*/
var validacionCheckeds=function(parametro1,parametro2){

	if (parametro2=="" || parametro2==undefined) {
		parametro2="";
	}

	alertify.set("notifier","position", "top-right");
	alertify.notify("Debe seleccionar "+parametro2, "error", 5, function(){});	
	$(this).show();

}
/*=====  End of Prametros de checkeds  ======*/


/*============================================
=            Recorriendo Checkeds            =
============================================*/

function valoresMinimosCheckeds(parametro1){

	var contador=0;

    $(parametro1).each(function(index) {

    	var condicion = $(this).is(":checked");

    	if (condicion) {
    		contador++;
    	}

    });

    return contador;


}


/*=====  End of Recorriendo Checkeds  ======*/

/*==============================================================
=            Validador Vacíos de los chekeds radios            =
==============================================================*/

var validadorChekedsRadios=function(parametro1,parametro2){

	var condicion = $(parametro1).is(":checked");

	if (condicion && parametro2==undefined) {

		$(parametro1).addClass('error');

		return false;

	}else{

		return true;

	}

}

var validadorAsistenciasRealizadas=function(parametro1){


	var contador=0;

    $(parametro1).each(function(index) {

    	var condicion = $(this).is(":checked");

    	if (condicion) {
    		contador++;
    	}

    });

    return contador;

}


var validadorAsistio=function(parametro1){

    var condicion = $(parametro1).is(":checked");

    if (condicion){

    	return true;

    }else{

    	return false;

    }

}

var checkedsListadoProyectos=function(parametro1){

	var array = new Array(); 

    $(parametro1).each(function(index) {

    	var condicion = $(this).is(":checked");

    	if (condicion) {

    		array.push($(this).attr('nombreAtributos'));

    	}

    });

    var stringArray=array.join(",");

    return array;

}


var checkedsListadoProyectosDos=function(parametro1){

	var array = new Array(); 

    $(parametro1).each(function(index) {

    	var condicion = $(this).is(":checked");

    	if (condicion) {

    		array.push(" "+$(this).attr('nombreAtributos'));

    	}

    });

    var stringArray=array.join(",");

    return array;

}

/*=====  End of Validador Vacíos de los chekeds radios  ======*/


/*=======================================================
=            Consultar si existe un archivos            =
=======================================================*/

var archivos=function(parametro1){

	if ($(parametro1).length > 0) {

		if ($(parametro1)[0].files[0]==undefined) {

			return false;

		}else{

			return true;

		}

	}else{

		return "no";

	}	
}


var validacionMostrarErroresDocumentosPdf=function(parametro1){

	if ($(parametro1).length > 0) {

		if ($(parametro1)[0].files[0]==undefined) {

			 $(parametro1).addClass('error');

		}else{


			$(parametro1).removeClass('error');

		}

	}else{

		$(parametro1).removeClass('error');

	}	


}


/*=====  End of Consultar si existe un archivos  ======*/

/*========================================
=            Contar elementos            =
========================================*/

function contadorElementos(parametro1){
	
	var sumadorGlobal=0;

	$(parametro1).each(function(index) {

		sumadorGlobal++;

	});

	return sumadorGlobal;

}

/*=====  End of Contar elementos  ======*/

/*===================================================
=            Recorriendo procesos arrays            =
===================================================*/

function recorriendoProcesosArray(parametro1){
	
	var array = new Array(); 
	var array2 = new Array(); 

	for(var i=0;i<parametro1;i++){

		 $(".filas__representativas"+i).each(function(index) {

        	array.push($(this).val());

    	});

		 var stringArray=array.join(",");
		 if (i==0) {
			array2.push(stringArray);
		 }else{
		 	array2.push("___"+stringArray);
		 }

		 var array = new Array(); 

	}

    return array2;

}



function recorriendoSumasCronograma(parametro1){

	var sumandos=0;

	$(parametro1).each(function(index) {

		sumandos=parseFloat(sumandos) + parseFloat($(this).val());

 	});

    return sumandos.toFixed(2);

}

/*=====  End of Recorriendo procesos arrays  ======*/

/*==========================================
=            Files obligatorios            =
==========================================*/

function validacionRegistroFiles(parametro1){
	
	var sumadorGlobal=0;

	$(parametro1).each(function(index) {
		if ($(this)[0].files[0]=="") {
			sumadorGlobal++;
		}
	});

	if (sumadorGlobal>0) {

		return false;

	}else{

		return true;

	}

}

function validacionRegistroMostrarErroresFilesRetornos(parametro1){

	var sumadorGlobal=0;

	$(parametro1).each(function(index) {
		if ($(this)[0].files[0]==undefined || $(this)[0].files[0]=="") {
			sumadorGlobal++;
		}

	});

	if (sumadorGlobal>0) {
		return false;
	}else{
		return true;
	}

}

var validacionRegistroMostrarErroresFiles=function(parametro1){

	var sumadorGlobal=0;

	$(parametro1).each(function(index) {
		if ($(this)[0].files[0]==undefined || $(this)[0].files[0]=="") {
			$(this).addClass('error');
		}else{
			$(this).removeClass('error');
		}
	});

}

/*=====  End of Files obligatorios  ======*/

/*===================================================
=            Enviar documentos multiples            =
===================================================*/

var validacionEnviosMultiples=function(parametro1){

	var sumadorGlobal=0;

	var paqueteDeDatos = new FormData();



}

/*=====  End of Enviar documentos multiples  ======*/


/*====================================================
=            Generar acta de calificacion            =
====================================================*/

$('#enviarActaCalificacionPrioridad').click(function (e){

	e.preventDefault();	

	$(this).hide();

	if ($('#codigosGenerados').val()==""){

		alertify.set("notifier","position", "top-right");
		alertify.notify("Obligatorio escoger un proyecto prioritario para enviar el acta de califiación", "error", 5, function(){});

		$(this).show();

	}else{

		/*====================================
		=            Enviar Datos            =
		====================================*/

		var confirm= alertify.confirm('','¿Está seguro de enviar el acta de calificación?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'}); 	

		confirm.set({transition:'slide'});   	

		confirm.set('onok', function(){ //callbak al pulsar botón positivo
							    	
			var paqueteDeDatos = new FormData();

	    	paqueteDeDatos.append('codigosGenerados', $('#codigosGenerados').prop('value'));

			/*============================
			=            Ajax            =
			============================*/
					
			var destino = "modelosBd/inserta/insertaActaCalificacionEnviadas.md.php"; 

			$.ajax({

				url: destino,
				type: 'POST',
				contentType: false,
				data: paqueteDeDatos, 
				processData: false,
				cache: false, 

				success: function(response){

				   var elementos=JSON.parse(response);
				   var mensaje=elementos['mensaje'];


				    if (mensaje==1) {

						alertify.set("notifier","position", "top-right");
						alertify.notify("Se realizó correctamente el registro y envío del acta de calificación", "success", 4, function(){});	

						window.setTimeout(function(){ 

							location.reload();

						} ,4000);   	 

					}

				},

				error: function (){ 
				    
				}

			});						
					
			/*=====  End of Ajax  ======*/				

		});

		confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
			alertify.set("notifier","position", "top-center");
			alertify.notify("Canceló las asistencias registradas", "success", 5, function(){});	
		});	

		/*=====  End of Enviar Datos  ======*/			

	}



});


/*=====  End of Generar acta de calificacion  ======*/


/*========================================
=            Presupuestos mef            =
========================================*/

$('#guardarMefAsignados').click(function (e){

	$(this).hide();

	if ($('#presupuestoMefAsignados').val()==""){

		alertify.set("notifier","position", "top-right");
		alertify.notify("Obligatorio asignar presupuesto MEF", "error", 5, function(){});

		$(this).show();

	}else{

		var paqueteDeDatos = new FormData();

    	paqueteDeDatos.append('presupuestoMefAsignados', $('#presupuestoMefAsignados').prop('value'));

		/*============================
		=            Ajax            =
		============================*/
				
		var destino = "modelosBd/inserta/insertaPresupuestoMef.md.php"; 

		$.ajax({

			url: destino,
			type: 'POST',
			contentType: false,
			data: paqueteDeDatos, 
			processData: false,
			cache: false, 

			success: function(response){

			    alertify.set("notifier","position", "top-right");
				alertify.notify("Se realizó correctamente el registro", "success", 4, function(){});

				$("#ingresoSectores").hide();

				window.setTimeout(function(){ 

					location.reload();

				} ,4000);   	

			},

			error: function (){ 
			    
			}

		});						
				
		/*=====  End of Ajax  ======*/	

	}



});

/*=====  End of Presupuestos mef  ======*/


/*================================================
=            Enviar informes tecnicos            =
================================================*/

$('#subirArchivos').click(function (e){

	$(this).hide();

	if ($('#informeViavilidad')[0].files[0]==undefined || $('#informeViavilidad')[0].files[0]==""){

		alertify.set("notifier","position", "top-right");
		alertify.notify("Obligatorio subir el informe firmado", "error", 5, function(){});

		$(this).show();

	}else{

		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('identificadorImpactos', $('#identificadorImpactos').prop('value'));
    	paqueteDeDatos.append('codigoProyecto', $('#codigoProyectoPdfInformeViavilidad').prop('value'));
    	paqueteDeDatos.append('informeViavilidad', $('#informeViavilidad')[0].files[0]);


		/*============================
		=            Ajax            =
		============================*/
				
		var destino = "modelosBd/inserta/insertarInformeViablidades.md.php"; 

		$.ajax({

			url: destino,
			type: 'POST',
			contentType: false,
			data: paqueteDeDatos, 
			processData: false,
			cache: false, 

			success: function(response){

			    alertify.set("notifier","position", "top-right");
				alertify.notify("Se realizó correctamente el registro", "success", 4, function(){});

				$("#ingresoSectores").hide();

				window.setTimeout(function(){ 

					location.reload();

				} ,4000);   	

			},

			error: function (){ 
			    
			}

		});						
				
		/*=====  End of Ajax  ======*/	

	}



});

/*=====  End of Enviar informes tecnicos  ======*/


/*=======================================
=            Enviar detalles            =
=======================================*/

$('#ingresoSectores').click(function (e){

	var validador= validacionRegistro($(".obligatorios__sectores"));
	validacionRegistroMostrarErrores($(".obligatorios__sectores"));

	$("#ingresoSectores").hide();

	if (validador==false){

		alertify.set("notifier","position", "top-right");
		alertify.notify("Campos obligatorios", "error", 5, function(){});

		$("#ingresoSectores").show();

	}else{

		var paqueteDeDatos = new FormData();

    	paqueteDeDatos.append('codigoProyecto', $('#codigoProyecto').prop('value'));
    	paqueteDeDatos.append('prioritariosSectores', $('#prioritariosSectores').prop('value'));
    	paqueteDeDatos.append('prioritariosSectoresFemeninas', $('#prioritariosSectoresFemeninas').prop('value'));

		/*============================
		=            Ajax            =
		============================*/
				
		var destino = "modelosBd/inserta/insertaDetallesAnexos.md.php"; 

		$.ajax({

			url: destino,
			type: 'POST',
			contentType: false,
			data: paqueteDeDatos, 
			processData: false,
			cache: false, 

			success: function(response){

			    alertify.set("notifier","position", "top-right");
				alertify.notify("Se realizó correctamente el registro", "success", 4, function(){});

				$("#ingresoSectores").hide();

				window.setTimeout(function(){ 

					location.reload();

				} ,4000);   	

			},

			error: function (){ 
			    
			}

		});						
				
		/*=====  End of Ajax  ======*/	

	}



});

/*=====  End of Enviar detalles  ======*/


/*=============================================
=            Insertar seguimientos            =
=============================================*/

$('#enviarSeguimientos').click(function (e){


	var contadorFilasImagenes=contadorElementos(".filas__evidenciales");

	var validador= validacionRegistroMostrarErroresFilesRetornos($(".conjunto__evidencias"));
	validacionRegistroMostrarErroresFiles($(".conjunto__evidencias"));

	$(this).hide();
					 


	if ($('#informeFinal')[0].files[0]==undefined || $('#informeFinal')[0].files[0]=="") {

		alertify.set("notifier","position", "top-right");
		alertify.notify("Es obligatorio subir el informe final", "error", 5, function(){});

		$(this).show();

	}else if(contadorFilasImagenes==0 && $(".evidencias__lla").val()!="si"){

		alertify.set("notifier","position", "top-right");
		alertify.notify("Es obligatorio subir una evidencia", "error", 5, function(){});

		$(this).show();
		
	}else if(validador==false){

		alertify.set("notifier","position", "top-right");
		alertify.notify("Es obligatorio subir las evidencias de los campos creados", "error", 5, function(){});

		$(this).show();

	}else{

		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('informeFinal', $('#informeFinal')[0].files[0]);

		var sumadorGlobal=0;

		$.each($(".conjunto__evidencias"), function(i, obj) {

	    	$.each(obj.files,function(j, file){

	         	paqueteDeDatos.append('comprobantesInformes'+sumadorGlobal+'', file);
	         	sumadorGlobal=sumadorGlobal+1;

	    	});

    	});


    	var codigosRealizadosEnvios=$("#codigoProyectoRealizados").val();

    	var rectificasEvidencias=$("#rectificasInformacionEvidencias").val();

    	paqueteDeDatos.append('codigosRealizadosEnvios', codigosRealizadosEnvios);

    	paqueteDeDatos.append('contadorFilasImagenes', contadorFilasImagenes);

    	paqueteDeDatos.append('sumadorGlobal', sumadorGlobal);

    	paqueteDeDatos.append('rectificasEvidencias', rectificasEvidencias);

		/*============================
		=            Ajax            =
		============================*/
				
		var destino = "modelosBd/inserta/insertaEnvioEvidencias.md.php"; 

		$.ajax({

			url: destino,
			type: 'POST',
			contentType: false,
			data: paqueteDeDatos, 
			processData: false,
			cache: false, 

			success: function(response){

			   var elementos=JSON.parse(response);
			   var mensaje=elementos['mensaje'];


			    if (mensaje==1) {

					alertify.set("notifier","position", "top-right");
					alertify.notify("Se realizó correctamente el registro", "success", 4, function(){});	

					window.setTimeout(function(){ 

						location.reload();

					} ,4000);   	 

				}
					
			},

			error: function (){ 
			    
			}

		});						
				
		/*=====  End of Ajax  ======*/		

	}

});


/*=====  End of Insertar seguimientos  ======*/


/*=========================================
=            Enviar al comites            =
=========================================*/
$('#enviadosComites').click(function (e){

	var checkeds=validadorAsistio($("#aceptoEnvioModificaciones"));

	if ($("#jstificaModifica").val()=="") {

		alertify.set("notifier","position", "top-right");
		alertify.notify("Es obligatorio ingresar la justificación", "error", 5, function(){});

	}else if(checkeds==false){

		alertify.set("notifier","position", "top-right");
		alertify.notify("Es obligatorio aceptar los terminos y condiciones de modificación", "error", 5, function(){});

	}else{

		/*=========================================
		=            Sección de envíos            =
		=========================================*/
		
		var paqueteDeDatos = new FormData();

		var codigosRealizadosEnvios=$("#codigosRealizadosEnvios").val();

		var jstificaModifica=$("#jstificaModifica").val();

		paqueteDeDatos.append('codigosRealizadosEnvios', codigosRealizadosEnvios);

		paqueteDeDatos.append('jstificaModifica', jstificaModifica);
		
		/*============================
		=            Ajax            =
		============================*/
				
		var destino = "modelosBd/inserta/insertaModificacionesEnviador.md.php"; 

		$.ajax({

			url: destino,
			type: 'POST',
			contentType: false,
			data: paqueteDeDatos, 
			processData: false,
			cache: false, 

			success: function(response){

	    		var elementos=JSON.parse(response);
			    var mensaje=elementos['mensaje'];


			    if (mensaje==1) {

			    	alertify.set("notifier","position", "top-right");
					alertify.notify("Se realizó correctamente el registro", "success", 2, function(){});


					window.setTimeout(function(){ 

						window.location = "proyectosUsuarios";

					} ,4000);   	 	


			    }		  

			},

			error: function (){ 
			    
			}

		});						
				
		/*=====  End of Ajax  ======*/


		/*=====  End of Sección de envíos  ======*/
		

	}

});

/*=====  End of Enviar al comites  ======*/


/*=======================================
=            Guardar totales          =
=======================================*/

$('#enviarCronogramaValorado').click(function (e){

	e.preventDefault();		

	$(this).hide();

	validador= validacionRegistro($(".obligatorios__elementos"));
	validacionRegistroMostrarErrores($(".obligatorios__elementos"));

	sumadorConteos= recorriendoSumasCronograma($(".total__monto__conjuntos"));

	$(".enviarDatosGenerales__reload").html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');


	if(validador==false){

		alertify.set("notifier","position", "top-right");
		alertify.notify("Campos obligatorios", "error", 5, function(){});

		$(this).show();

		$(".enviarDatosGenerales__reload").html(' ');

	}else if(parseFloat($("#valoresCantidades").val()).toFixed(2)<0){


		alertify.set("notifier","position", "top-right");
		alertify.notify("Su prespuesto suma "+parseFloat($("#valoresCantidadesAsignadas").val()).toFixed(2)+" excediendo el valor que queda por asignar", "error", 20, function(){});

		$(this).show();

		$(".enviarDatosGenerales__reload").html('');


	}else{

		var paqueteDeDatos = new FormData();

		var numero__conjunto = concatenarValores($(".numero__conjunto"));
		var descripcion__conjunto  = concatenarValores($(".descripcion__conjunto"));
		var unidad__conjunto   = concatenarValores($(".unidad__conjunto"));
		var cantidad__conjunto   = concatenarValores($(".cantidad__conjunto"));
		var precioUnitario__conjunto   = concatenarValores($(".precioUnitario__conjunto"));
		var subtotal__conjunto  = concatenarValores($(".subtotal__conjunto"));

		var medicion__conjunto  = concatenarValores($(".medicion__conjunto"));
		var formasDePago__conjunto  = concatenarValores($(".formasDePago__conjunto"));

		var valorPreferencialConjunto  = concatenarValores($(".valorPreferencialConjunto"));

		/*================================
		=            Añadidos            =
		================================*/
		
		var contadorElementosVariable  = contadorElementos($(".filas__creadas__infras"));
		var elementosResultantes  = recorriendoProcesosArray(contadorElementosVariable);
		
		/*=====  End of Añadidos  ======*/

		var codigoProyecto=$("#codigoProyecto").val();

		paqueteDeDatos.append('codigoProyecto',codigoProyecto);

		paqueteDeDatos.append('numero__conjunto', JSON.stringify(numero__conjunto));
		paqueteDeDatos.append('descripcion__conjunto', JSON.stringify(descripcion__conjunto));
		paqueteDeDatos.append('unidad__conjunto', JSON.stringify(unidad__conjunto));
		paqueteDeDatos.append('cantidad__conjunto', JSON.stringify(cantidad__conjunto));
		paqueteDeDatos.append('precioUnitario__conjunto', JSON.stringify(precioUnitario__conjunto));
		paqueteDeDatos.append('subtotal__conjunto', JSON.stringify(subtotal__conjunto));
		paqueteDeDatos.append('elementosResultantes', JSON.stringify(elementosResultantes));

		paqueteDeDatos.append('medicion__conjunto', JSON.stringify(medicion__conjunto));
		paqueteDeDatos.append('formasDePago__conjunto', JSON.stringify(formasDePago__conjunto));
		paqueteDeDatos.append('valorPreferencialConjunto', JSON.stringify(valorPreferencialConjunto));

		/*============================
		=            Ajax            =
		============================*/
				
		var destino = "modelosBd/inserta/insertaConjuntosNuevos.md.php"; 

		$.ajax({

			url: destino,
			type: 'POST',
			contentType: false,
			data: paqueteDeDatos, 
			processData: false,
			cache: false, 

			success: function(response){

	    		var elementos=JSON.parse(response);
			    var mensaje=elementos['mensaje'];


			    if (mensaje==1) {

			    	alertify.set("notifier","position", "top-right");
					alertify.notify("Se realizó correctamente el registro", "success", 2, function(){});

					window.setTimeout(function(){ 

						location.reload();

				    } ,2000);   	


			    }		  

			},

			error: function (){ 
			    
			}

		});						
				
		/*=====  End of Ajax  ======*/

	}
	

});

/*=====  End of Guardar totales  ======*/


/*====================================
=            Agregar Item            =
====================================*/

$('#agregarItemAdministrativos').click(function (e){

	e.preventDefault();		

	validador= validacionRegistro($(".obligatorios__items__argumentos"));
	validacionRegistroMostrarErrores($(".obligatorios__items__argumentos"));

	$('#agregarItemAdministrativos').hide();

	$(".reload__items__componentes").html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	if (validador==false) {

		$(".reload__items__componentes").html('');

		alertify.set("notifier","position", "top-right");
		alertify.notify("Campos Obligatorios", "error", 5, function(){});

		$('#agregarItemAdministrativos').show();

	}else if(!$(".filas__componentes__globales").length > 0){

		$(".reload__items__componentes").html('');

		alertify.set("notifier","position", "top-right");
		alertify.notify("Obligatorio crear un argumento para el item", "error", 5, function(){});

		$('#agregarItemAdministrativos').show();

	}else{

		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('itemNombres', $('#itemNombres').prop('value'));

		paqueteDeDatos.append('componenteSeleccion', $('#componenteSeleccion').prop('value'));

		/*=================================================
		=            Nombres de los Argumentos            =
		=================================================*/
		
		var conjunto__items__argumentos= concatenarValores($(".conjunto__items__argumentos"));

		paqueteDeDatos.append('argumentosNombres', JSON.stringify(conjunto__items__argumentos));

		
		var conjunto__tipos__argumentos= concatenarValores($(".conjunto__tipos__argumentos"));

		paqueteDeDatos.append('tipoArgumento', JSON.stringify(conjunto__tipos__argumentos));

		
		/*=====  End of Nombres de los Argumentos  ======*/
		
		/*===============================================
		=            Argumentos predefinidos            =
		===============================================*/
		
		var definidos__valores__nombres__conjuntos= concatenarValores($(".definidos__valores__nombres__conjuntos"));

		paqueteDeDatos.append('nombresDefinidos', JSON.stringify(definidos__valores__nombres__conjuntos));


		var seleccion__definidos__conjuntos= validacionRecorrerChekedsArrays($(".seleccion__definidos__conjuntos"));

		paqueteDeDatos.append('checkedsDesgloses', JSON.stringify(seleccion__definidos__conjuntos));
		

		var formulaRealizablesDadas= concatenarValores($(".formulaRealizablesDadas"));

		paqueteDeDatos.append('formulaRealizablesDadas', JSON.stringify(formulaRealizablesDadas));
		

		/*=====  End of Argumentos predefinidos  ======*/
		
	
		/*============================
		=            Ajax            =
		============================*/
		
		var destino = "modelosBd/inserta/insertaComponentesAdministrativos.md.php"; 

		$.ajax({

			url: destino,
			type: 'POST',
			contentType: false,
			data: paqueteDeDatos, 
			processData: false,
			cache: false, 

			success: function(response){

	    		var elementos=JSON.parse(response);
			    var mensaje=elementos['mensaje'];


			    if (mensaje==1) {

			    	alertify.set("notifier","position", "top-right");
					alertify.notify("Se realizó correctamente el registro", "success", 2, function(){});

					window.setTimeout(function(){ 

						location.reload();

				    } ,2000);   	


			    }		  

			},

			error: function (){ 
			    
			}

		});						
		
		/*=====  End of Ajax  ======*/
		


	}


});

/*=====  End of Agregar Item  ======*/


/*============================================================
=            Ingresar componentes Administrativos            =
============================================================*/

$('#guardarComponente').click(function (e){

	e.preventDefault();		

	validador= validacionRegistro($(".obligatorios__componentes"));
	validacionRegistroMostrarErrores($(".obligatorios__componentes"));

	$('#guardarComponente').hide();

	$(".reload__componentes").html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	if (validador==false) {

		$(".reload__componentes").html('');

		alertify.set("notifier","position", "top-right");
		alertify.notify("Campos Obligatorios", "error", 5, function(){});

		$('#guardarComponente').show();

	}else{

		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('componentesNombres', $('#componentesNombres').prop('value'));
		paqueteDeDatos.append('tipoComponente', $('#tipoComponente').prop('value'));

		/*====================================
		=            Enviar Datos            =
		====================================*/
		
		var destino = "modelosBd/inserta/insertaComponenteAdministrativo.md.php"; 

		$.ajax({

			url: destino,
			type: 'POST',
			contentType: false,
			data: paqueteDeDatos, 
			processData: false,
			cache: false, 

			success: function(response){

    		var elementos=JSON.parse(response);
		    var mensaje=elementos['mensaje'];


		    if (mensaje==1) {

		    	alertify.set("notifier","position", "top-right");
				alertify.notify("Se realizó correctamente el registro", "success", 2, function(){});

				window.setTimeout(function(){ 

					location.reload();

			    } ,2000);   	


		    }		  

	  

			},

			error: function (){ 
			    
			}

		});				
					
		
		/*=====  End of Enviar Datos  ======*/	

	}


});


/*=====  End of Ingresar componentes Administrativos  ======*/


/*==============================================
=            Consiliar desactivados            =
==============================================*/

$('#generarAsistencia').click(function (e){

	e.preventDefault();		

	/*====================================
	=            Enviar Datos            =
	====================================*/

	var confirm= alertify.confirm('','¿Está seguro de guardar la asistencia, una vez confirmada no se podrá deshacer las asistencias?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'}); 	

	confirm.set({transition:'slide'});   	

	confirm.set('onok', function(){ //callbak al pulsar botón positivo
					    	
		$(".asistencias__globales").attr('disabled','disbled');

		$('#generarAsistencia').hide();

		$(".oculto__elementos__enviados__comites").show();


	});

	confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
		alertify.set("notifier","position", "top-center");
		alertify.notify("Canceló las asistencias registradas", "success", 5, function(){});	
	});	

	/*=====  End of Enviar Datos  ======*/		


});

/*=====  End of Consiliar desactivados  ======*/


/*=========================================================
=            Enviar infor creacion de proyecto            =
=========================================================*/

$('#crearProyecto').click(function (e){

	e.preventDefault();		

	$(this).hide();

	$(".reload__creacion__proyecto").html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	var obtencionSectores= checkedsListadoProyectos($(".checkeds__conjuntos__proyectosCrear"));

	var obtencionSectoresSegundo= checkedsListadoProyectosDos($(".checkeds__conjuntos__proyectosCrear"));

	var valorMinimoDeCheckeds= valoresMinimosCheckeds($(".checkeds__conjuntos__proyectosCrear"));

	var valorMinimoDeCheckeds2= valoresMinimosCheckeds($(".checkeds__tecnicos"));

	if(valorMinimoDeCheckeds2==0){

		alertify.set("notifier","position", "top-center");
		alertify.notify("Debe seleccionar un sector técnico al que beneficia el proyecto", "error", 5, function(){});	

		$('#crearProyecto').show();
		$(".reload__creacion__proyecto").html('');	

	}else if(valorMinimoDeCheckeds2>1){

		alertify.set("notifier","position", "top-center");
		alertify.notify("No puede seleccionar más de un sector técnico al que beneficie su proyecto", "error", 5, function(){});	

		$('#crearProyecto').show();
		$(".reload__creacion__proyecto").html('');	

	}else if (valorMinimoDeCheckeds==0) {

		alertify.set("notifier","position", "top-center");
		alertify.notify("Debe seleccionar por lo menos un sector al que beneficia el proyecto", "error", 5, function(){});	

		$('#crearProyecto').show();
		$(".reload__creacion__proyecto").html('');	

	}else{

		/*====================================
		=            Enviar Datos            =
		====================================*/

		var confirm= alertify.confirm('','¿Está seguro de crear el proyecto que beneficia a los sectores <span style="font-weight:bold;">'+obtencionSectoresSegundo+'</span>?.<br><br>Recuerde que una vez definido el sector al que contribuye el proyecto, éste no podrá ser modificado',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'}); 	

		confirm.set({transition:'slide'});   	

		confirm.set('onok', function(){ //callbak al pulsar botón positivo
					    	
			var paqueteDeDatos = new FormData();

			var destino = "modelosBd/actualiza/actualizaRelacionInfras.md.php"; 

			var codigoCreacion=$('#codigoCreacion').val();

			paqueteDeDatos.append('codigoCreacion', codigoCreacion);
			paqueteDeDatos.append('obtencionSectores', JSON.stringify(obtencionSectores));


			$.ajax({

				url: destino,
				type: 'POST',
				contentType: false,
				data: paqueteDeDatos, 
				processData: false,
				cache: false, 

				success: function(response){

			    	var elementos=JSON.parse(response);
					var mensaje=elementos['mensaje'];


					if (mensaje==1) {

					   	alertify.set("notifier","position", "top-center");
						alertify.notify("Se creó correctamente el proyecto", "success", 5, function(){});

						window.setTimeout(function(){ 

							window.location = "datosGenerales?contenido=2";

						} ,4000);   	
					}		  
				  
				},
				error: function (){ 
					lert("Algo ha fallado.");
				}

			});		
											

		});

		confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
			alertify.set("notifier","position", "top-center");
			alertify.notify("Canceló la creación del proyecto", "success", 5, function(){});	
			$('#crearProyecto').show();
			$(".reload__creacion__proyecto").html('');	
		});	

		/*=====  End of Enviar Datos  ======*/		

	}


});


/*=====  End of Enviar infor creacion de proyecto  ======*/


/*=====================================================
=            Enviar contrato Observaciones            =
=====================================================*/

$('#enviarContratoObservaciones').click(function (e){

	e.preventDefault();		

	var paqueteDeDatos = new FormData();


	validadorObligandoPatrocinadores= validacionRegistro($(".obligatorios__patrocinadores"));
	validacionRegistroMostrarErrores($(".obligatorios__patrocinadores"));

	validadorObligandoPatrocinadoresComprobantes= validacionRegistroFiles($(".comprobantes__conjuntos"));
	validacionRegistroMostrarErroresFiles($(".comprobantes__conjuntos"));

	$('#enviarContrato').hide();

	$(".reload__enmvio__contratos").html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');


		/*===============================================
		=            Envio de variables ajax            =
		===============================================*/
		
		paqueteDeDatos.append('codigoProyectoRealizados', $('#codigoProyectoRealizados').prop('value'));
		paqueteDeDatos.append('idUsuarioRelativo', $('#idUsuarioRelativo').prop('value'));
		paqueteDeDatos.append('correoResponsble', $('#correoResponsble').prop('value'));
		paqueteDeDatos.append('idUsuarioContratos', $('#idUsuario').prop('value'));
		paqueteDeDatos.append('emailSolicitante', $('#emailSolicitante').prop('value'));
		paqueteDeDatos.append('siRespuestas', $('#siRespuestas').prop('value'));
		paqueteDeDatos.append('tipoDeportistas', $('#tipoDeportistas').prop('value'));
		paqueteDeDatos.append('montoDelProyecto', $('#montoDelProyecto').prop('value'));		
		
		/*=====  End of Envio de variables ajax  ======*/
		
		/*=============================================
		=            Envios de información            =
		=============================================*/
		
		var ruc__patrocinador__conjunto= concatenarValores($(".ruc__patrocinador__conjunto"));
		paqueteDeDatos.append('numeroRucPatrocinador', JSON.stringify(ruc__patrocinador__conjunto));

		var nombre__patrocinador__conjunto= concatenarValores($(".nombre__patrocinador__conjunto"));
		paqueteDeDatos.append('nombrePatrocinador', JSON.stringify(nombre__patrocinador__conjunto));

		var monto__contrato__realizado__conjunto= concatenarValores($(".monto__contrato__realizado__conjunto"));
		paqueteDeDatos.append('montoContratoRealizados', JSON.stringify(monto__contrato__realizado__conjunto));

		var fecha__evidencia__conjuntos= concatenarValores($(".fecha__evidencia__conjuntos"));
		paqueteDeDatos.append('fechaDeEmision', JSON.stringify(fecha__evidencia__conjuntos));

		var actividadEconomica__conjuntos= concatenarValores($(".actividadEconomica__conjuntos"));
		paqueteDeDatos.append('actividadEconomica', JSON.stringify(actividadEconomica__conjuntos));

		var validez__comprobante__fisico__conjuntos= concatenarValores($(".validez__comprobante__fisico__conjuntos"));
		paqueteDeDatos.append('validez__comprobante', JSON.stringify(validez__comprobante__fisico__conjuntos));

		var autorizacionSri__conjuntos= concatenarValores($(".autorizacionSri__conjuntos"));
		paqueteDeDatos.append('autorizacionSri', JSON.stringify(autorizacionSri__conjuntos));

		var sumadorGlobal=0;

		$.each($(".comprobantes__conjuntos__documentos"), function(i, obj) {

	    	$.each(obj.files,function(j, file){

	         	paqueteDeDatos.append('conttratoRealizados'+sumadorGlobal+'', file);
	         	sumadorGlobal=sumadorGlobal+1;

	    	});

    	});

 
		var montos__facturas__conjuntos= concatenarValores($(".montos__facturas__conjuntos"));
		paqueteDeDatos.append('montos__facturas__conjuntos', JSON.stringify(montos__facturas__conjuntos));

		/*=====  End of Envios de información  ======*/
		


		/*====================================
		=            Enviar Datos            =
		====================================*/
		
		var destino = "modelosBd/actualiza/actualizaContratoEnviosObservaciones.md.php"; 

		$.ajax({

			url: destino,
			type: 'POST',
			contentType: false,
			data: paqueteDeDatos, 
			processData: false,
			cache: false, 

			success: function(response){

    		var elementos=JSON.parse(response);
		    var mensaje=elementos['mensaje'];


		    if (mensaje==1) {

		    	alertify.set("notifier","position", "top-right");
				alertify.notify("Se realizó correctamente el registro", "success", 5, function(){});

				window.setTimeout(function(){ 

					location.reload();

			    } ,4000);   	


		    }		  

	  

			},

			error: function (){ 
			    
			}

		});				
					
		
		/*=====  End of Enviar Datos  ======*/		

});


/*=====  End of Enviar contrato Observaciones  ======*/


/*=======================================
=            Enviar contrato            =
=======================================*/

$('#enviarContrato').click(function (e){

	e.preventDefault();		

	var paqueteDeDatos = new FormData();


	validadorObligandoPatrocinadores= validacionRegistro($(".obligatorios__patrocinadores"));
	validacionRegistroMostrarErrores($(".obligatorios__patrocinadores"));

	validadorObligandoPatrocinadoresComprobantes= validacionRegistroFiles($(".comprobantes__conjuntos"));
	validacionRegistroMostrarErroresFiles($(".comprobantes__conjuntos"));

	$('#enviarContrato').hide();

	$(".reload__enmvio__contratos").html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	if (validadorObligandoPatrocinadores==false) {

		alertify.set("notifier","position", "top-right");
		alertify.notify("Datos obligatorios", "error", 5, function(){});

		$('#enviarContrato').show();

		$(".reload__enmvio__contratos").html('');

	}else if(validadorObligandoPatrocinadoresComprobantes==false){

		alertify.set("notifier","position", "top-right");
		alertify.notify("Son obligatorios los comprobantes de las filas creadas", "error", 5, function(){});

		$('#enviarContrato').show();

		$(".reload__enmvio__contratos").html('');

	}else if(!$(".fila__conjunto__creadas").length > 0 ){

		alertify.set("notifier","position", "top-right");
		alertify.notify("Es obligatorio crear una fila de de comprobantes", "error", 5, function(){});

		$('#enviarContrato').show();

		$(".reload__enmvio__contratos").html('');

	}else if(parseFloat($("#montoDelProyecto").val())=="0" || parseFloat($("#montoDelProyecto").val())==0){
		
		alertify.set("notifier","position", "top-right");
		alertify.notify("El monto del proyecto no puede ser 0", "error", 5, function(){});

		$('#enviarContrato').show();

		$(".reload__enmvio__contratos").html('');

	}else{

		/*===============================================
		=            Envio de variables ajax            =
		===============================================*/
		
		paqueteDeDatos.append('codigoProyectoRealizados', $('#codigoProyectoRealizados').prop('value'));
		paqueteDeDatos.append('idUsuarioRelativo', $('#idUsuarioRelativo').prop('value'));
		paqueteDeDatos.append('correoResponsble', $('#correoResponsble').prop('value'));
		paqueteDeDatos.append('idUsuarioContratos', $('#idUsuario').prop('value'));
		paqueteDeDatos.append('emailSolicitante', $('#emailSolicitante').prop('value'));
		paqueteDeDatos.append('siRespuestas', $('#siRespuestas').prop('value'));
		paqueteDeDatos.append('tipoDeportistas', $('#tipoDeportistas').prop('value'));
		paqueteDeDatos.append('montoDelProyecto', $('#montoDelProyecto').prop('value'));		
		
		/*=====  End of Envio de variables ajax  ======*/
		
		/*=============================================
		=            Envios de información            =
		=============================================*/
		
		var ruc__patrocinador__conjunto= concatenarValores($(".ruc__patrocinador__conjunto"));
		paqueteDeDatos.append('numeroRucPatrocinador', JSON.stringify(ruc__patrocinador__conjunto));

		var nombre__patrocinador__conjunto= concatenarValores($(".nombre__patrocinador__conjunto"));
		paqueteDeDatos.append('nombrePatrocinador', JSON.stringify(nombre__patrocinador__conjunto));

		var monto__contrato__realizado__conjunto= concatenarValores($(".monto__contrato__realizado__conjunto"));
		paqueteDeDatos.append('montoContratoRealizados', JSON.stringify(monto__contrato__realizado__conjunto));

		var fecha__evidencia__conjuntos= concatenarValores($(".fecha__evidencia__conjuntos"));
		paqueteDeDatos.append('fechaDeEmision', JSON.stringify(fecha__evidencia__conjuntos));

		var actividadEconomica__conjuntos= concatenarValores($(".actividadEconomica__conjuntos"));
		paqueteDeDatos.append('actividadEconomica', JSON.stringify(actividadEconomica__conjuntos));

		var validez__comprobante__fisico__conjuntos= concatenarValores($(".validez__comprobante__fisico__conjuntos"));
		paqueteDeDatos.append('validez__comprobante', JSON.stringify(validez__comprobante__fisico__conjuntos));

		var autorizacionSri__conjuntos= concatenarValores($(".autorizacionSri__conjuntos"));
		paqueteDeDatos.append('autorizacionSri', JSON.stringify(autorizacionSri__conjuntos));


		var sumadorGlobal=0;

		$.each($(".comprobantes__conjuntos__documentos"), function(i, obj) {

	    	$.each(obj.files,function(j, file){

	         	paqueteDeDatos.append('conttratoRealizados'+sumadorGlobal+'', file);
	         	sumadorGlobal=sumadorGlobal+1;

	    	});

    	});

 
		var montos__facturas__conjuntos= concatenarValores($(".montos__facturas__conjuntos"));
		paqueteDeDatos.append('montos__facturas__conjuntos', JSON.stringify(montos__facturas__conjuntos));

		/*=====  End of Envios de información  ======*/
		


		/*====================================
		=            Enviar Datos            =
		====================================*/
		
		var destino = "modelosBd/actualiza/actualizaContratoEnvios.md.php"; 

		$.ajax({

			url: destino,
			type: 'POST',
			contentType: false,
			data: paqueteDeDatos, 
			processData: false,
			cache: false, 

			success: function(response){

    		var elementos=JSON.parse(response);
		    var mensaje=elementos['mensaje'];


		    // if (mensaje==1) {

		    	alertify.set("notifier","position", "top-center");
				alertify.notify("Se realizó correctamente el registro", "success", 5, function(){});

				window.setTimeout(function(){ 

					location.reload();

			    } ,4000);   	


		    // }		  

			},

			error: function (){ 
			    
			}

		});				
					
		
		/*=====  End of Enviar Datos  ======*/		

	}

	

});


/*=====  End of Enviar contrato  ======*/


/*================================================
=            Enviar firmar documentos            =
================================================*/


$('#firmarEnviarTramites').click(function (e){

	e.preventDefault();		

	var paqueteDeDatos = new FormData();

	$('#firmarEnviarTramites').hide();

	$(".reload__enmvio__firmantes").html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	paqueteDeDatos.append('rolFuncionarios', $('#rolFuncionarios').prop('value'));
	paqueteDeDatos.append('fisicamenteEstructura', $('#fisicamenteEstructura').prop('value'));
	paqueteDeDatos.append('idUsuario', $('#idUsuario').prop('value'));
	paqueteDeDatos.append('tipoTramites', $('#tipoTramites').prop('value'));
	paqueteDeDatos.append('codigoProyectos', $('#codigoProyectos').prop('value'));
	paqueteDeDatos.append('siRespuestas', $('#siRespuestas').prop('value'));
	paqueteDeDatos.append('idUsuarioRelativo', $('#idUsuarioRelativo').prop('value'));

	paqueteDeDatos.append('nombrePostulante', $('#nombrePostulante').prop('value'));
	paqueteDeDatos.append('emailPostulante', $('#emailPostulante').prop('value'));

	paqueteDeDatos.append('nombreProyecto', $('#nombreProyecto').prop('value'));

	paqueteDeDatos.append('emailFuncionarios', $('#emailFuncionarios').prop('value'));
	paqueteDeDatos.append('emailAnalista', $('#emailAnalista').prop('value'));

	/*====================================
	=            Enviar Datos            =
	====================================*/
	
	var destino = "modelosBd/actualiza/actualizaDocumentoCalifica.md.php"; 

	$.ajax({

		url: destino,
		type: 'POST',
		contentType: false,
		data: paqueteDeDatos, 
		processData: false,
		cache: false, 

		success: function(response){

    		var elementos=JSON.parse(response);
		    var mensaje=elementos['mensaje'];

		    if (mensaje==1) {

		    	alertify.set("notifier","position", "top-right");
				alertify.notify("Es obligatorio subir el documento de reunión con la firma pertinente", "error", 5, function(){});

				$('#firmarEnviarTramites').show();

				$(".reload__enmvio__firmantes").html('');	

		    }		  


		    if (mensaje==2) {

		    	alertify.set("notifier","position", "top-right");
				alertify.notify("Es obligatorio subir el documento de notificación con la firma pertinente", "error", 5, function(){});

				$('#firmarEnviarTramites').show();

				$(".reload__enmvio__firmantes").html('');	

		    }		  


		    if (mensaje==3) {

		    	alertify.set("notifier","position", "top-right");
				alertify.notify("Se realizó correctamente el registro", "success", 5, function(){});

				window.setTimeout(function(){ 

					location.reload();

			    } ,4000);   	


		    }		  

		},

		error: function (){ 
		    
		}

	});				
				
	
	/*=====  End of Enviar Datos  ======*/
	

});

/*=====  End of Enviar firmar documentos  ======*/

/*===================================================
=            Enviar firmar certificación            =
===================================================*/

$('#envioActasFirmantesComite').click(function (e){

	e.preventDefault();

	// $('#envioActasFirmantesComite').hide();

	$(".reload__enmvio__firmantes").html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	var paqueteDeDatos = new FormData();

	contadorAsistencias= validadorAsistenciasRealizadas($(".asistencias__globales"));

	/*===========================================
	=            Validadores Asistio            =
	===========================================*/
	
	contadorAsistenciasMinistro= validadorAsistenciasRealizadas($("#asistenciaMinistro"));
	asistenciaSusesAlto= validadorAsistenciasRealizadas($("#asistenciaSusesAlto"));
	asistenciaActividadFisica= validadorAsistenciasRealizadas($("#asistenciaActividadFisica"));
	asistenciaCoordinador= validadorAsistenciasRealizadas($("#asistenciaCoordinador"));
	asistenciaPlanificacion= validadorAsistenciasRealizadas($("#asistenciaPlanificacion"));
	asistenciaJuridico= validadorAsistenciasRealizadas($("#asistenciaJuridico"));

	/*=====  End of Validadores Asistio  ======*/
	

	paqueteDeDatos.append('codgioProyectoDocumentos', $('#codgioProyectoDocumentos').prop('value'));
	paqueteDeDatos.append('contadorAsistencias', contadorAsistencias);
	paqueteDeDatos.append('observacionesNoRequeridas', $('#observacionesNoRequeridas').prop('value'));
	paqueteDeDatos.append('notificacionDirecta', $('#notificacionDirecta').prop('value'));

	paqueteDeDatos.append('contadorAsistenciasMinistro', contadorAsistenciasMinistro);
	paqueteDeDatos.append('asistenciaSusesAlto', asistenciaSusesAlto);
	paqueteDeDatos.append('asistenciaActividadFisica', asistenciaActividadFisica);
	paqueteDeDatos.append('asistenciaCoordinador', asistenciaCoordinador);
	paqueteDeDatos.append('asistenciaPlanificacion', asistenciaPlanificacion);
	paqueteDeDatos.append('asistenciaJuridico', asistenciaJuridico);

	/*===================================
	=            Id personas            =
	===================================*/
	
	paqueteDeDatos.append('idMinistro', $('#idMinistro').prop('value'));
	paqueteDeDatos.append('idSusesAlto', $('#idSusesAlto').prop('value'));
	paqueteDeDatos.append('idSusesActividad', $('#idSusesActividad').prop('value'));
	paqueteDeDatos.append('idSusesCoordinador', $('#idSusesCoordinador').prop('value'));
	paqueteDeDatos.append('idSusesPlanificacion', $('#idSusesPlanificacion').prop('value'));
	paqueteDeDatos.append('idSusesJuridico', $('#idSusesJuridico').prop('value'));

	paqueteDeDatos.append('selectorUsuariosDelegados', $('#selectorUsuariosDelegados').prop('value'));
	
	/*=====  End of Id personas  ======*/

	/*===========================================
	=            Usuarios Asistentes            =
	===========================================*/
	
	asistenciaMinistroValidadorAsistio= validadorAsistio($("#asistenciaMinistro"));
	asistenciaSusesAltoValidadorAsistio= validadorAsistio($("#asistenciaSusesAlto"));
	asistenciaActividadFisicaValidadorAsistio= validadorAsistio($("#asistenciaActividadFisica"));
	asistenciaCoordinadorValidadorAsistio= validadorAsistio($("#asistenciaCoordinador"));
	asistenciaPlanificacionValidadorAsistio= validadorAsistio($("#asistenciaPlanificacion"));
	asistenciaJuridicoValidadorAsistio= validadorAsistio($("#asistenciaJuridico"));

	paqueteDeDatos.append('asistenciaMinistroValidadorAsistio', asistenciaMinistroValidadorAsistio);
	paqueteDeDatos.append('asistenciaSusesAltoValidadorAsistio', asistenciaSusesAltoValidadorAsistio);
	paqueteDeDatos.append('asistenciaActividadFisicaValidadorAsistio', asistenciaActividadFisicaValidadorAsistio);
	paqueteDeDatos.append('asistenciaCoordinadorValidadorAsistio', asistenciaCoordinadorValidadorAsistio);
	paqueteDeDatos.append('asistenciaPlanificacionValidadorAsistio', asistenciaPlanificacionValidadorAsistio);
	paqueteDeDatos.append('asistenciaJuridicoValidadorAsistio', asistenciaJuridicoValidadorAsistio);


	
	/*=====  End of Usuarios Asistentes  ======*/
	

	/*==========================================
		=            Resultado Votación            =
		==========================================*/


	
	var votacionMinistro=$('input:radio[name=ministroOpcion]:checked').val();
	var votacionAlto=$('input:radio[name=altoRendimientoOpcion]:checked').val();
	var votacionActividad=$('input:radio[name=actividadFisicaOpcion]:checked').val();
	var votacionCoordinacion=$('input:radio[name=coordinadorAdministracionOpcion]:checked').val();	

	var coordinadorPlanificacionOpcion=$('input:radio[name=coordinadorPlanificacionOpcion]:checked').val();	
	var coordinadorAdministracionFinanciera=$('input:radio[name=coordinadorAdministracionFinanciera]:checked').val();	


		var calificaciones = new Array();

		var contadorSi=0;
		var contadorNo=0;
		
		calificaciones.push(votacionMinistro);
		calificaciones.push(votacionAlto);
		calificaciones.push(votacionActividad);
		calificaciones.push(votacionCoordinacion);
		calificaciones.push(coordinadorAdministracionFinanciera);
		calificaciones.push(coordinadorPlanificacionOpcion);

		for (var i = 0; i <= calificaciones.length; i++) {
			
			if (calificaciones[i]=="si") {

				contadorSi++;

			}else if(calificaciones[i]=="no"){

				contadorNo++;

			}

		}

		if (contadorSi==contadorNo) {

			if (votacionMinistro=="si") {

				contadorSi++;

			}else if(votacionMinistro=="no"){

				contadorNo++;

			}

		}



		if (contadorSi>contadorNo) {


			$("#notificacionDirecta").val('CALIFICADO');


		}else if(contadorSi<contadorNo){

			$("#notificacionDirecta").val('DESCALIFICA');

		}
		
		/*=====  End of Resultado Votación  ======*/	

		if (contadorSi==0 && contadorNo==0) {


			alertify.set("notifier","position", "top-center");
			alertify.notify("Es necesario ubicar las asistencias", "error", 5, function(){});	


		}else{

		    /*============================
		    =            Ajax            =
		    ============================*/
		    
			var destino = "modelosBd/actualiza/actualizaDocumentosNotificaCertifica.md.php"; 

			$.ajax({

				url: destino,
				type: 'POST',
				contentType: false,
				data: paqueteDeDatos, 
				processData: false,
				cache: false, 

				success: function(response){

				    var elementos=JSON.parse(response);
				    var mensaje=elementos['mensaje'];

	

				    	alertify.set("notifier","position", "top-right");
						alertify.notify("Se realizó satisfactoriamente el envío de los documentos", "success", 5, function(){});	

								
						window.setTimeout(function(){ 

							location.reload();

					    } ,4000);   	

				},

				error: function (){ 
				    
				}

			});		    
		    
		    /*=====  End of Ajax  ======*/

		}

			
});

/*=====  End of Enviar firmar certificación  ======*/


/*================================================
=            Enviar actas para firmar            =
================================================*/

$('#envioActasFirmantes').click(function (e){

	e.preventDefault();

	$('#envioActasFirmantes').hide();

	$(".reload__enmvio__firmantes").html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	var paqueteDeDatos = new FormData();

	contadorAsistencias= validadorAsistenciasRealizadas($(".asistencias__globales"));

	/*===========================================
	=            Validadores Asistio            =
	===========================================*/
	
	contadorAsistenciasMinistro= validadorAsistenciasRealizadas($("#asistenciaMinistro"));
	asistenciaSusesAlto= validadorAsistenciasRealizadas($("#asistenciaSusesAlto"));
	asistenciaActividadFisica= validadorAsistenciasRealizadas($("#asistenciaActividadFisica"));
	asistenciaCoordinador= validadorAsistenciasRealizadas($("#asistenciaCoordinador"));
	asistenciaPlanificacion= validadorAsistenciasRealizadas($("#asistenciaPlanificacion"));
	asistenciaJuridico= validadorAsistenciasRealizadas($("#asistenciaJuridico"));

	/*=====  End of Validadores Asistio  ======*/
	

	paqueteDeDatos.append('codgioProyectoDocumentos', $('#codgioProyectoDocumentos').prop('value'));
	paqueteDeDatos.append('contadorAsistencias', contadorAsistencias);
	paqueteDeDatos.append('observacionesNoRequeridas', $('#observacionesNoRequeridas').prop('value'));
	paqueteDeDatos.append('notificacionDirecta', $('#notificacionDirecta').prop('value'));

	paqueteDeDatos.append('contadorAsistenciasMinistro', contadorAsistenciasMinistro);
	paqueteDeDatos.append('asistenciaSusesAlto', asistenciaSusesAlto);
	paqueteDeDatos.append('asistenciaActividadFisica', asistenciaActividadFisica);
	paqueteDeDatos.append('asistenciaCoordinador', asistenciaCoordinador);
	paqueteDeDatos.append('asistenciaPlanificacion', asistenciaPlanificacion);
	paqueteDeDatos.append('asistenciaJuridico', asistenciaJuridico);

	/*===================================
	=            Id personas            =
	===================================*/
	
	paqueteDeDatos.append('idMinistro', $('#idMinistro').prop('value'));
	paqueteDeDatos.append('idSusesAlto', $('#idSusesAlto').prop('value'));
	paqueteDeDatos.append('idSusesActividad', $('#idSusesActividad').prop('value'));
	paqueteDeDatos.append('idSusesCoordinador', $('#idSusesCoordinador').prop('value'));
	paqueteDeDatos.append('idSusesPlanificacion', $('#idSusesPlanificacion').prop('value'));
	paqueteDeDatos.append('idSusesJuridico', $('#idSusesJuridico').prop('value'));

	paqueteDeDatos.append('selectorUsuariosDelegados', $('#selectorUsuariosDelegados').prop('value'));
	
	/*=====  End of Id personas  ======*/

	/*===========================================
	=            Usuarios Asistentes            =
	===========================================*/
	
	asistenciaMinistroValidadorAsistio= validadorAsistio($("#asistenciaMinistro"));
	asistenciaSusesAltoValidadorAsistio= validadorAsistio($("#asistenciaSusesAlto"));
	asistenciaActividadFisicaValidadorAsistio= validadorAsistio($("#asistenciaActividadFisica"));
	asistenciaCoordinadorValidadorAsistio= validadorAsistio($("#asistenciaCoordinador"));
	asistenciaPlanificacionValidadorAsistio= validadorAsistio($("#asistenciaPlanificacion"));
	asistenciaJuridicoValidadorAsistio= validadorAsistio($("#asistenciaJuridico"));

	paqueteDeDatos.append('asistenciaMinistroValidadorAsistio', asistenciaMinistroValidadorAsistio);
	paqueteDeDatos.append('asistenciaSusesAltoValidadorAsistio', asistenciaSusesAltoValidadorAsistio);
	paqueteDeDatos.append('asistenciaActividadFisicaValidadorAsistio', asistenciaActividadFisicaValidadorAsistio);
	paqueteDeDatos.append('asistenciaCoordinadorValidadorAsistio', asistenciaCoordinadorValidadorAsistio);
	paqueteDeDatos.append('asistenciaPlanificacionValidadorAsistio', asistenciaPlanificacionValidadorAsistio);
	paqueteDeDatos.append('asistenciaJuridicoValidadorAsistio', asistenciaJuridicoValidadorAsistio);


	
	/*=====  End of Usuarios Asistentes  ======*/
	
	

	/*====================================
	=            Enviar datos a           =
	====================================*/
			
	var destino = "modelosBd/actualiza/actualizaDocumentosNotifica.md.php"; 

	$.ajax({

		url: destino,
		type: 'POST',
		contentType: false,
		data: paqueteDeDatos, 
		processData: false,
		cache: false, 

		success: function(response){

		    var elementos=JSON.parse(response);
		    var mensaje=elementos['mensaje'];

		    if (mensaje==1) {

		    	alertify.set("notifier","position", "top-right");
				alertify.notify("Es obligatorio generar el documento de asistencia", "error", 5, function(){});

				$('#envioActasFirmantes').show();	

				$(".reload__enmvio__firmantes").html('');

		    }else if(mensaje==2){

		    	alertify.set("notifier","position", "top-right");
				alertify.notify("Es obligatorio generar el documento de notificación", "error", 5, function(){});	

				$('#envioActasFirmantes').show();

				$(".reload__enmvio__firmantes").html('');

		    }else if(mensaje==3){

		    	alertify.set("notifier","position", "top-right");
				alertify.notify("Se realizó satisfactoriamente el envío de los documentos", "success", 5, function(){});	

						
				window.setTimeout(function(){ 

					location.reload();

			    } ,4000);   	


		    }


		},

		error: function (){ 
		    
		}

	});				
			

});

/*=====  End of Enviar actas para firmar  ======*/


$('#generarNotificacionCertificacion').click(function (e){


	$(this).hide();

	$('.reload__documento__notificacion').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	/*============================================
	=            Variables utilizadas            =
	============================================*/
	
	var votacionMinistro=$('input:radio[name=ministroOpcion]:checked').val();
	var votacionAlto=$('input:radio[name=altoRendimientoOpcion]:checked').val();
	var votacionActividad=$('input:radio[name=actividadFisicaOpcion]:checked').val();
	var votacionCoordinacion=$('input:radio[name=coordinadorAdministracionOpcion]:checked').val();	

	var coordinadorPlanificacionOpcion=$('input:radio[name=coordinadorPlanificacionOpcion]:checked').val();	
	var coordinadorAdministracionFinanciera=$('input:radio[name=coordinadorAdministracionFinanciera]:checked').val();	
	/*=====  End of Variables utilizadas  ======*/
	
	// valores minimos
	validador= valoresMinimosCheckeds($(".asistencias__revisadas"));

	/*===============================================
	=            Necesarios validaciones            =
	===============================================*/
	
	validadorMinistro= validadorChekedsRadios($("#asistenciaMinistro"),votacionMinistro);
	validadorAltoRendimiento= validadorChekedsRadios($("#asistenciaSusesAlto"),votacionAlto);
	validadorActividadFisica= validadorChekedsRadios($("#asistenciaActividadFisica"),votacionActividad);
	validadorCoordinacion= validadorChekedsRadios($("#asistenciaCoordinador"),votacionCoordinacion);

	validadorPlanificacion= validadorChekedsRadios($("#asistenciaPlanificacion"),coordinadorPlanificacionOpcion);
	validadorFinanciera= validadorChekedsRadios($("#asistenciaJuridico"),coordinadorAdministracionFinanciera);
	
	/*=====  End of Necesarios validaciones  ======*/
	
	if(validadorMinistro==false || validadorAltoRendimiento==false || validadorActividadFisica==false || validadorCoordinacion==false || validadorPlanificacion==false || validadorFinanciera==false){

		alertify.set("notifier","position", "top-right");
		alertify.notify("Es obligatoria la calificación de quienes han marcado asistencia", "error", 5, function(){});	

		e.preventDefault();

		$(this).show();

		$('.reload__documento__notificacion').html('');

	}else if (validador<3) {

		alertify.set("notifier","position", "top-right");
		alertify.notify("Es obligatoria la asistencia de mínimo tres personas del comíte que puedan votar por el momento se registrán "+validador , "error", 5, function(){});	

		e.preventDefault();

		$(this).show();

		$('.reload__documento__notificacion').html('');

	}else{

		/*==========================================
		=            Resultado Votación            =
		==========================================*/


		var calificaciones = new Array();

		var contadorSi=0;
		var contadorNo=0;
		
		calificaciones.push(votacionMinistro);
		calificaciones.push(votacionAlto);
		calificaciones.push(votacionActividad);
		calificaciones.push(votacionCoordinacion);

		calificaciones.push(validadorPlanificacion);
		calificaciones.push(validadorFinanciera);

		calificaciones.push(coordinadorPlanificacionOpcion);

		for (var i = 0; i <= calificaciones.length; i++) {
			
			if (calificaciones[i]=="si") {

				contadorSi++;

			}else if(calificaciones[i]=="no"){

				contadorNo++;

			}

		}

		if (contadorSi==contadorNo) {

			if (votacionMinistro=="si") {

				contadorSi++;

			}else if(votacionMinistro=="no"){

				contadorNo++;

			}

		}

		if (contadorSi>contadorNo) {

			$("#notificacionDirectaCertificas").val('CERTIFICA');


		}else if(contadorSi<contadorNo){

			$("#notificacionDirectaCertificas").val('NO CERTIFICA');

		}

		$("#generarNotificacionCertificacion").attr('type','submit');
		
		$("#notificacionFormularioUnitariosCertificas").attr('method','post');

		$("#notificacionFormularioUnitariosCertificas").attr('action','modelosBd/documentoProyecto/certificacionProyecto.md.php');	
		
		/*=====  End of Resultado Votación  ======*/
		

		var paqueteDeDatos = new FormData();
		paqueteDeDatos.append('codgioProyectoDocumentos', $('#codgioProyectoDocumentos').prop('value'));


		window.setTimeout(function(){ 

			/*====================================
			=            Enviar datos            =
			====================================*/
			
			var destino = "modelosBd/validaciones/documentoNotificacion.modelo.php"; 

		    $.ajax({

		       url: destino,
		       type: 'POST',
		       contentType: false,
		       data: paqueteDeDatos, 
		       processData: false,
		       cache: false, 

		       success: function(response){

		    	   var elementos=JSON.parse(response);
		           var validaNotificacion=elementos['validaNotificacion'];
		           var codgioProyectoDocumentos=elementos['codgioProyectoDocumentos'];

		           $('.reload__documento__notificacion').html('');

		           $('#generarNotificacionCertificacion').show();

	               if (validaNotificacion==false) {

	                 $("#documentoNotificacionCertificacion").text('N/A');

	               }else{

		             $("#documentoNotificacionCertificacion").attr('href','documentos/certificadosResueltos/'+codgioProyectoDocumentos+".pdf");
	                 $("#documentoNotificacionCertificacion").text(codgioProyectoDocumentos+".pdf");

	               }

	               	alertify.set("notifier","position", "top-right");
			        alertify.notify("Notificación Generada", "success", 5, function(){});

		        },

		       error: function (){ 
		          
		       }

		    });				
			
			/*=====  End of Enviar datos  ======*/		

	    } ,4000);   	

	}

});


$('#generarNotificacion').click(function (e){


	$(this).hide();

	$('.reload__documento__notificacion').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	/*============================================
	=            Variables utilizadas            =
	============================================*/
	
	var votacionMinistro=$('input:radio[name=ministroOpcion]:checked').val();
	var votacionAlto=$('input:radio[name=altoRendimientoOpcion]:checked').val();
	var votacionActividad=$('input:radio[name=actividadFisicaOpcion]:checked').val();
	var votacionCoordinacion=$('input:radio[name=coordinadorAdministracionOpcion]:checked').val();	

	var coordinadorPlanificacionOpcion=$('input:radio[name=coordinadorPlanificacionOpcion]:checked').val();	
	var coordinadorAdministracionFinanciera=$('input:radio[name=coordinadorAdministracionFinanciera]:checked').val();	
	/*=====  End of Variables utilizadas  ======*/
	
	// valores minimos
	validador= valoresMinimosCheckeds($(".asistencias__revisadas"));

	/*===============================================
	=            Necesarios validaciones            =
	===============================================*/
	
	validadorMinistro= validadorChekedsRadios($("#asistenciaMinistro"),votacionMinistro);
	validadorAltoRendimiento= validadorChekedsRadios($("#asistenciaSusesAlto"),votacionAlto);
	validadorActividadFisica= validadorChekedsRadios($("#asistenciaActividadFisica"),votacionActividad);
	validadorCoordinacion= validadorChekedsRadios($("#asistenciaCoordinador"),votacionCoordinacion);

	validadorPlanificacion= validadorChekedsRadios($("#asistenciaPlanificacion"),coordinadorPlanificacionOpcion);
	validadorFinanciera= validadorChekedsRadios($("#asistenciaJuridico"),coordinadorAdministracionFinanciera);
	
	/*=====  End of Necesarios validaciones  ======*/
	
	if(validadorMinistro==false || validadorAltoRendimiento==false || validadorActividadFisica==false || validadorCoordinacion==false || validadorPlanificacion==false || validadorFinanciera==false){

		alertify.set("notifier","position", "top-right");
		alertify.notify("Es obligatoria la calificación de quienes han marcado asistencia", "error", 5, function(){});	

		e.preventDefault();

		$(this).show();

		$('.reload__documento__notificacion').html('');

	}else if (validador<3) {

		alertify.set("notifier","position", "top-right");
		alertify.notify("Es obligatoria la asistencia de mínimo tres personas del comíte que puedan votar por el momento se registrán "+validador , "error", 5, function(){});	

		e.preventDefault();

		$(this).show();

		$('.reload__documento__notificacion').html('');

	}else{

		/*==========================================
		=            Resultado Votación            =
		==========================================*/


		var calificaciones = new Array();

		var contadorSi=0;
		var contadorNo=0;
		
		calificaciones.push(votacionMinistro);
		calificaciones.push(votacionAlto);
		calificaciones.push(votacionActividad);
		calificaciones.push(votacionCoordinacion);

		calificaciones.push(validadorPlanificacion);
		calificaciones.push(validadorFinanciera);

		calificaciones.push(coordinadorPlanificacionOpcion);

		for (var i = 0; i <= calificaciones.length; i++) {
			
			if (calificaciones[i]=="si") {

				contadorSi++;

			}else if(calificaciones[i]=="no"){

				contadorNo++;

			}

		}

		if (contadorSi==contadorNo) {

			if (votacionMinistro=="si") {

				contadorSi++;

			}else if(votacionMinistro=="no"){

				contadorNo++;

			}

		}

		if (contadorSi>contadorNo) {

			$("#notificacionDirecta").val('CALIFICA');


		}else if(contadorSi<contadorNo){

			$("#notificacionDirecta").val('DESCALIFICA');

		}

		$("#generarNotificacion").attr('type','submit');
		
		$("#notificacionFormularioUnitarios").attr('method','post');

		$("#notificacionFormularioUnitarios").attr('action','modelosBd/documentoProyecto/notificacion.md.php');	
		
		/*=====  End of Resultado Votación  ======*/
		

		var paqueteDeDatos = new FormData();
		paqueteDeDatos.append('codgioProyectoDocumentos', $('#codgioProyectoDocumentos').prop('value'));


		window.setTimeout(function(){ 

			/*====================================
			=            Enviar datos            =
			====================================*/
			
			var destino = "modelosBd/validaciones/documentoNotificacion.modelo.php"; 

		    $.ajax({

		       url: destino,
		       type: 'POST',
		       contentType: false,
		       data: paqueteDeDatos, 
		       processData: false,
		       cache: false, 

		       success: function(response){

		    	   var elementos=JSON.parse(response);
		           var validaNotificacion=elementos['validaNotificacion'];
		           var codgioProyectoDocumentos=elementos['codgioProyectoDocumentos'];

		           $('.reload__documento__notificacion').html('');

		           $('#generarNotificacion').show();

	               if (validaNotificacion==false) {

	                 $("#documentoNotificacion").text('N/A');

	               }else{

		             $("#documentoNotificacion").attr('href','documentos/notificacion/'+codgioProyectoDocumentos+".pdf");
	                 $("#documentoNotificacion").text(codgioProyectoDocumentos+".pdf");

	               }

	               	alertify.set("notifier","position", "top-right");
			        alertify.notify("Notificación Generada", "success", 5, function(){});

		        },

		       error: function (){ 
		          
		       }

		    });				
			
			/*=====  End of Enviar datos  ======*/		

	    } ,4000);   	

	}

});


$('#generarCalificacion').click(function (e){

	$('#generarCalificacion').hide();

	$('.reload__documento__reunion').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	/*============================================
	=            Variables utilizadas            =
	============================================*/
	
	var votacionMinistro=$('input:radio[name=ministroOpcion]:checked').val();
	var votacionAlto=$('input:radio[name=altoRendimientoOpcion]:checked').val();
	var votacionActividad=$('input:radio[name=actividadFisicaOpcion]:checked').val();
	var votacionCoordinacion=$('input:radio[name=coordinadorAdministracionOpcion]:checked').val();	


	var votacionCoordinacionPlanificacion=$('input:radio[name=coordinadorPlanificacionOpcion]:checked').val();
	var votacionCoordinacionFinanciera=$('input:radio[name=coordinadorAdministracionFinanciera]:checked').val();	

	
	/*=====  End of Variables utilizadas  ======*/
	
	// valores minimos
	validador= valoresMinimosCheckeds($(".asistencias__revisadas"));

	/*===============================================
	=            Necesarios validaciones            =
	===============================================*/
	
	validadorMinistro= validadorChekedsRadios($("#asistenciaMinistro"),votacionMinistro);
	validadorAltoRendimiento= validadorChekedsRadios($("#asistenciaSusesAlto"),votacionAlto);
	validadorActividadFisica= validadorChekedsRadios($("#asistenciaActividadFisica"),votacionActividad);
	validadorCoordinacion= validadorChekedsRadios($("#asistenciaCoordinador"),votacionCoordinacion);

	validadorCoordinacionPlanificacion= validadorChekedsRadios($("#asistenciaPlanificacion"),votacionCoordinacionPlanificacion);
	validadorCoordinacionFinanciera= validadorChekedsRadios($("#asistenciaJuridico"),votacionCoordinacionFinanciera);
	
	/*=====  End of Necesarios validaciones  ======*/
	
	if(validadorMinistro==false || validadorAltoRendimiento==false || validadorActividadFisica==false || validadorCoordinacion==false || validadorCoordinacionPlanificacion==false || validadorCoordinacionFinanciera==false){

		alertify.set("notifier","position", "top-right");
		alertify.notify("Es obligatoria la calificación de quienes han marcado asistencia", "error", 5, function(){});	

		e.preventDefault();

		$('#generarCalificacion').show();

		$('.reload__documento__reunion').html('');

	}else if (validador<3) {

		alertify.set("notifier","position", "top-right");
		alertify.notify("Es obligatoria la asistencia de mínimo tres personas del comíte que puedan votar por el momento se registrán "+validador , "error", 5, function(){});	

		e.preventDefault();

		$('#generarCalificacion').show();

		$('.reload__documento__reunion').html('');

	}else{

		/*==========================================
		=            Resultado Votación            =
		==========================================*/


		var calificaciones = new Array();

		var contadorSi=0;
		var contadorNo=0;
		
		calificaciones.push(votacionMinistro);
		calificaciones.push(votacionAlto);
		calificaciones.push(votacionActividad);
		calificaciones.push(votacionCoordinacion);

		for (var i = 0; i <= calificaciones.length; i++) {
			
			if (calificaciones[i]=="si") {

				contadorSi++;

			}else if(calificaciones[i]=="no"){

				contadorNo++;

			}

		}

		if (contadorSi==contadorNo) {

			if (votacionMinistro=="si") {

				contadorSi++;

			}else if(votacionMinistro=="no"){

				contadorNo++;

			}

		}

		if (contadorSi>contadorNo) {

			$("#notificacionDirecta").val('CALIFICADO');


		}else if(contadorSi<contadorNo){

			$("#notificacionDirecta").val('DESCALIFICADO');

		}

		$("#generarCalificacion").attr('type','submit');
		
		$("#notificacionFormulario").attr('method','post');

		$("#notificacionFormulario").attr('action','modelosBd/documentoProyecto/asistencia.md.php');	
		
		/*=====  End of Resultado Votación  ======*/
		

		var paqueteDeDatos = new FormData();
		paqueteDeDatos.append('codgioProyectoDocumentos', $('#codgioProyectoDocumentos').prop('value'));


		window.setTimeout(function(){ 

			/*====================================
			=            Enviar datos            =
			====================================*/
			
			var destino = "modelosBd/validaciones/documentoNotificacion.modelo.php"; 

		    $.ajax({

		       url: destino,
		       type: 'POST',
		       contentType: false,
		       data: paqueteDeDatos, 
		       processData: false,
		       cache: false, 

		       success: function(response){

		    	   var elementos=JSON.parse(response);
		           var validaAsistencia=elementos['validaAsistencia'];
		           var codgioProyectoDocumentos=elementos['codgioProyectoDocumentos'];

		           $('.reload__documento__reunion').html('');

		           $('#generarCalificacion').show();

	               if (validaAsistencia==false) {

	                 $("#documentoReunion").text('N/A');

	               }else{

		             $("#documentoReunion").attr('href','documentos/asistencia/'+codgioProyectoDocumentos+".pdf");
	                 $("#documentoReunion").text(codgioProyectoDocumentos+".pdf");

	               }

	               	alertify.set("notifier","position", "top-right");
			        alertify.notify("Notificación Generada", "success", 5, function(){});

		        },

		       error: function (){ 
		          
		       }

		    });				
			
			/*=====  End of Enviar datos  ======*/		

	    } ,4000);   	


	}

});

/*======================================
=            Enviar Correos            =
======================================*/

$('#enviarCorreoResponbleEnviador').click(function (e){

	$(this).hide();

	$('.enviarDatosGenerales__reload').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	validador= validacionRegistro($(".validadorResponsbles"));
	validacionRegistroMostrarErrores($(".validadorResponsbles"));

	if (validador==false || $(".validadorResponsbles").val()=="") {

		validacionMensajeObligatorio($(this));

	}else{

		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('correoResponsble', $('#correoResponsble').prop('value'));
		paqueteDeDatos.append('proyectoNombre', $('#proyectoNombre').prop('value'));
		paqueteDeDatos.append('nombreAcomodador', $('#nombreAcomodador').prop('value'));
		paqueteDeDatos.append('enviarComentarioResponsable', $('#enviarComentarioResponsable').prop('value'));
		paqueteDeDatos.append('emailAcomadador', $('#emailAcomadador').prop('value'));

		/*====================================
		=            Enviar datos            =
		====================================*/
		
		var destino = "modelosBd/inserta/enviarCorreoResponsbles.md.php"; 

	    $.ajax({

	       url: destino,
	       type: 'POST',
	       contentType: false,
	       data: paqueteDeDatos, 
	       processData: false,
	       cache: false, 

	       success: function(response){

	    	   var elementos=JSON.parse(response);
	           var mensaje=elementos['mensaje'];

	           if (mensaje==1) {

	           		alertify.set("notifier","position", "top-right");
		            alertify.notify("Comentario Enviado", "success", 5, function(){});

		            $('.enviarDatosGenerales__reload').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	                window.setTimeout(function(){ 
	                   location.reload();
	                } ,4000); 

	           }


	        },

	       error: function (){ 
	          
	       }

	    });				
		
		/*=====  End of Enviar datos  ======*/	

	}

});


/*=====  End of Enviar Correos  ======*/


/*================================================
=            Medotología de Ejecución            =
================================================*/

$('#enviarEstructuraOrganicaDeportiva').click(function (e){

	$(this).hide();

	validador= validacionRegistro($(".obligatorio__metodologia"));
	validacionRegistroMostrarErrores($(".obligatorio__metodologia"));

	obligatorioCheckeds= validacionRegistroChecks($(".obligatorio__metodologia__checkeds"));


 	if (validador==false) {

		validacionMensajeObligatorio($(this));

		$(this).show();

	}else if(obligatorioCheckeds==false && !$(".filas__editar__seguimientos").length > 0){

		validacionCheckeds($(this),' de las actividades realizadas por mes');

		$(this).show();


	}else{

		var paqueteDeDatos = new FormData();

		var descripcionActividades__conjunto= concatenarValores($(".descripcionActividades__conjunto"));


		eneroActividades__conjunto= validacionRecorrerChekedsArrays($(".eneroActividades__conjunto"));
		febreroActividades__conjunto= validacionRecorrerChekedsArrays($(".febreroActividades__conjunto"));
		marzoActividades__conjunto= validacionRecorrerChekedsArrays($(".marzoActividades__conjunto"));
		abrilActividades__conjunto= validacionRecorrerChekedsArrays($(".abrilActividades__conjunto"));
		mayoActividades__conjunto= validacionRecorrerChekedsArrays($(".mayoActividades__conjunto"));
		junioActividades__conjunto= validacionRecorrerChekedsArrays($(".junioActividades__conjunto"));
		julioActividades__conjunto= validacionRecorrerChekedsArrays($(".julioActividades__conjunto"));
		agostoActividades__conjunto= validacionRecorrerChekedsArrays($(".agostoActividades__conjunto"));
		septiembreActividades__conjunto= validacionRecorrerChekedsArrays($(".septiembreActividades__conjunto"));
		octubreActividades__conjunto= validacionRecorrerChekedsArrays($(".octubreActividades__conjunto"));
		noviembreActividades__conjunto= validacionRecorrerChekedsArrays($(".noviembreActividades__conjunto"));
		diciembreActividades__conjunto= validacionRecorrerChekedsArrays($(".diciembreActividades__conjunto"));


		rol__conjunto= concatenarValores($(".rol__conjunto"));
		detalle__conjunto= concatenarValores($(".detalle__conjunto"));

		actividadSeguimiento__conjunto= concatenarValores($(".actividadSeguimiento__conjunto"));
		periocidadSeguimiento__conjunto= concatenarValores($(".periocidadSeguimiento__conjunto"));
		medioSeguimiento__conjunto= concatenarValores($(".medioSeguimiento__conjunto"));
		observacionSeguimiento__conjunto= concatenarValores($(".observacionSeguimiento__conjunto"));

		metas__conjuntos__seleccionables = concatenarValores($(".metas__conjuntos__seleccionables"));
		conjunto__indicadores = concatenarValores($(".conjunto__indicadores"));

		numero__identificativos= concatenarValores($(".numero__identificativos"));



		paqueteDeDatos.append('descripcionActividades__conjunto', JSON.stringify(descripcionActividades__conjunto));

		paqueteDeDatos.append('metas__conjuntos__seleccionables', JSON.stringify(metas__conjuntos__seleccionables));
		paqueteDeDatos.append('conjunto__indicadores', JSON.stringify(conjunto__indicadores));

		paqueteDeDatos.append('eneroActividades__conjunto', JSON.stringify(eneroActividades__conjunto));
		paqueteDeDatos.append('febreroActividades__conjunto', JSON.stringify(febreroActividades__conjunto));
		paqueteDeDatos.append('marzoActividades__conjunto', JSON.stringify(marzoActividades__conjunto));
		paqueteDeDatos.append('abrilActividades__conjunto', JSON.stringify(abrilActividades__conjunto));
		paqueteDeDatos.append('mayoActividades__conjunto', JSON.stringify(mayoActividades__conjunto));
		paqueteDeDatos.append('junioActividades__conjunto', JSON.stringify(junioActividades__conjunto));
		paqueteDeDatos.append('julioActividades__conjunto', JSON.stringify(julioActividades__conjunto));
		paqueteDeDatos.append('agostoActividades__conjunto', JSON.stringify(agostoActividades__conjunto));
		paqueteDeDatos.append('septiembreActividades__conjunto', JSON.stringify(septiembreActividades__conjunto));
		paqueteDeDatos.append('octubreActividades__conjunto', JSON.stringify(octubreActividades__conjunto));
		paqueteDeDatos.append('noviembreActividades__conjunto', JSON.stringify(noviembreActividades__conjunto));
		paqueteDeDatos.append('diciembreActividades__conjunto', JSON.stringify(diciembreActividades__conjunto));

		

		paqueteDeDatos.append('rol__conjunto', JSON.stringify(rol__conjunto));
		paqueteDeDatos.append('detalle__conjunto', JSON.stringify(detalle__conjunto));

		paqueteDeDatos.append('actividadSeguimiento__conjunto', JSON.stringify(actividadSeguimiento__conjunto));
		paqueteDeDatos.append('periocidadSeguimiento__conjunto', JSON.stringify(periocidadSeguimiento__conjunto));
		paqueteDeDatos.append('medioSeguimiento__conjunto', JSON.stringify(medioSeguimiento__conjunto));
		paqueteDeDatos.append('observacionSeguimiento__conjunto', JSON.stringify(observacionSeguimiento__conjunto));

		paqueteDeDatos.append('numero__identificativos', JSON.stringify(numero__identificativos));


		paqueteDeDatos.append('codigoProyecto', $('#codigoProyecto').prop('value'));

		/*====================================
		=            Enviar datos            =
		====================================*/
		
		var destino = "modelosBd/inserta/insertaMetodologiaNueva.md.php"; 

	    $.ajax({

	       url: destino,
	       type: 'POST',
	       contentType: false,
	       data: paqueteDeDatos, 
	       processData: false,
	       cache: false, 

	       success: function(response){

	    	   var elementos=JSON.parse(response);
	           var mensaje=elementos['mensaje'];

	           if (mensaje==1) {

	           		alertify.set("notifier","position", "top-right");
		            alertify.notify("Datos ingresados correctamente", "success", 5, function(){});

		            $('.enviarDatosGenerales__reload').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	                window.setTimeout(function(){ 
	                   location.reload();
	                } ,4000); 

	           }


	        },

	       error: function (){ 
	          
	       }

	    });				
		
		/*=====  End of Enviar datos  ======*/	

	}

});

/*=====  End of Medotología de Ejecución  ======*/


/*====================================
=            Bneficiarios            =
====================================*/

$('#enviarBeneficiarios').click(function (e){

	$(this).hide();

    validador= validacionRegistro($(".obligatorios__bene"));
	validacionRegistroMostrarErrores($(".obligatorios__bene"));

	if($(".filas__beneficiariosDirectos").length == 0) {
	

		alertify.set("notifier","position", "top-right");
	    alertify.notify("Es necesario crear por lo menos un beneficiario directo para guardar está sección", "error", 5, function(){});	

	    $(this).show();

	}else if(validador==false){

		validacionMensajeObligatorio($(this));

	}else{

		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('codigoProyecto', $('#codigoProyecto').prop('value'));

		var BeneficiariosDirectos__conjuntos= concatenarValores($(".BeneficiariosDirectos__conjuntos"));
		var desdeDirectos__conjuntos= concatenarValores($(".desdeDirectos__conjuntos"));
		var hastaDirectos__conjuntos= concatenarValores($(".hastaDirectos__conjuntos"));
		var masculinoDirectos__conjuntos= concatenarValores($(".masculinoDirectos__conjuntos"));
		var femeninoDirectos__conjuntos= concatenarValores($(".femeninoDirectos__conjuntos"));
		var mestizoDirectos__conjuntos= concatenarValores($(".mestizoDirectos__conjuntos"));
		var montubioDirectos__conjuntos= concatenarValores($(".montubioDirectos__conjuntos"));
		var indigenasDirectos__conjuntos= concatenarValores($(".indigenasDirectos__conjuntos"));
		var blancoDirectos__conjuntos= concatenarValores($(".blancoDirectos__conjuntos"));
		var afroDirectos__conjuntos= concatenarValores($(".afroDirectos__conjuntos"));
		var mulatoDirectos__conjuntos= concatenarValores($(".mulatoDirectos__conjuntos"));
		var negroDirectos__conjuntos= concatenarValores($(".negroDirectos__conjuntos"));
		var totalDirectos__conjuntos= concatenarValores($(".totalDirectos__conjuntos"));

		var BeneficiariosDirectosDiscapacidad__conjuntos = concatenarValores($(".BeneficiariosDirectosDiscapacidad__conjuntos"));
		var visualDirectosDiscapacidad__conjuntos = concatenarValores($(".visualDirectosDiscapacidad__conjuntos"));
		var auditivaDirectosDiscapacidad__conjuntos = concatenarValores($(".auditivaDirectosDiscapacidad__conjuntos"));
		var multisensoerialDirectosDiscapacidad__conjuntos  = concatenarValores($(".multisensoerialDirectosDiscapacidad__conjuntos"));
		var intelectualDirectosDiscapacidad__conjuntos  = concatenarValores($(".intelectualDirectosDiscapacidad__conjuntos"));
		var fisicaDirectosDiscapacidad__conjuntos  = concatenarValores($(".fisicaDirectosDiscapacidad__conjuntos"));
		var psiquicaDirectosDiscapacidad__conjuntos  = concatenarValores($(".psiquicaDirectosDiscapacidad__conjuntos"));
		var totalDirectosDiscapacidad__conjuntos  = concatenarValores($(".totalDirectosDiscapacidad__conjuntos"));

		var BeneficiariosDirectosIndirectos__conjuntos= concatenarValores($(".BeneficiariosDirectosIndirectos__conjuntos"));
		var totalDirectosIndirectos__conjuntos   = concatenarValores($(".totalDirectosIndirectos__conjuntos"));
		var justificacionCuantitativaDirectosIndirectos__conjuntos   = concatenarValores($(".justificacionCuantitativaDirectosIndirectos__conjuntos"));

		paqueteDeDatos.append('beneficiariosDirectos__conjuntos', JSON.stringify(BeneficiariosDirectos__conjuntos));
		paqueteDeDatos.append('desdeDirectos__conjuntos', JSON.stringify(desdeDirectos__conjuntos));
		paqueteDeDatos.append('hastaDirectos__conjuntos', JSON.stringify(hastaDirectos__conjuntos));
		paqueteDeDatos.append('masculinoDirectos__conjuntos', JSON.stringify(masculinoDirectos__conjuntos));
		paqueteDeDatos.append('femeninoDirectos__conjuntos', JSON.stringify(femeninoDirectos__conjuntos));
		paqueteDeDatos.append('mestizoDirectos__conjuntos', JSON.stringify(mestizoDirectos__conjuntos));
		paqueteDeDatos.append('montubioDirectos__conjuntos', JSON.stringify(montubioDirectos__conjuntos));
		paqueteDeDatos.append('indigenasDirectos__conjuntos', JSON.stringify(indigenasDirectos__conjuntos));
		paqueteDeDatos.append('blancoDirectos__conjuntos', JSON.stringify(blancoDirectos__conjuntos));
		paqueteDeDatos.append('afroDirectos__conjuntos', JSON.stringify(afroDirectos__conjuntos));
		paqueteDeDatos.append('mulatoDirectos__conjuntos', JSON.stringify(mulatoDirectos__conjuntos));
		paqueteDeDatos.append('negroDirectos__conjuntos', JSON.stringify(negroDirectos__conjuntos));
		paqueteDeDatos.append('totalDirectos__conjuntos', JSON.stringify(totalDirectos__conjuntos));

		paqueteDeDatos.append('beneficiariosDirectosDiscapacidad__conjuntos', JSON.stringify(BeneficiariosDirectosDiscapacidad__conjuntos));
		paqueteDeDatos.append('visualDirectosDiscapacidad__conjuntos', JSON.stringify(visualDirectosDiscapacidad__conjuntos));
		paqueteDeDatos.append('auditivaDirectosDiscapacidad__conjuntos', JSON.stringify(auditivaDirectosDiscapacidad__conjuntos));
		paqueteDeDatos.append('multisensoerialDirectosDiscapacidad__conjuntos', JSON.stringify(multisensoerialDirectosDiscapacidad__conjuntos));
		paqueteDeDatos.append('intelectualDirectosDiscapacidad__conjuntos', JSON.stringify(intelectualDirectosDiscapacidad__conjuntos));
		paqueteDeDatos.append('fisicaDirectosDiscapacidad__conjuntos', JSON.stringify(fisicaDirectosDiscapacidad__conjuntos));
		paqueteDeDatos.append('psiquicaDirectosDiscapacidad__conjuntos', JSON.stringify(psiquicaDirectosDiscapacidad__conjuntos));
		paqueteDeDatos.append('totalDirectosDiscapacidad__conjuntos', JSON.stringify(totalDirectosDiscapacidad__conjuntos));

		paqueteDeDatos.append('beneficiariosDirectosIndirectos__conjuntos', JSON.stringify(BeneficiariosDirectosIndirectos__conjuntos));
		paqueteDeDatos.append('totalDirectosIndirectos__conjuntos', JSON.stringify(totalDirectosIndirectos__conjuntos));
		paqueteDeDatos.append('justificacionCuantitativaDirectosIndirectos__conjuntos', JSON.stringify(justificacionCuantitativaDirectosIndirectos__conjuntos));


		/*====================================
		=            Enviar datos            =
		====================================*/
		
		var destino = "modelosBd/inserta/insertaBeneficiarios.md.php"; 

	    $.ajax({

	       url: destino,
	       type: 'POST',
	       contentType: false,
	       data: paqueteDeDatos, 
	       processData: false,
	       cache: false, 

	       success: function(response){

	    	   var elementos=JSON.parse(response);
	           var mensaje=elementos['mensaje'];

	           if (mensaje==1) {

	           		alertify.set("notifier","position", "top-right");
		            alertify.notify("Datos ingresados correctamente", "success", 5, function(){});

		            $('.enviarDatosGenerales__reload').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	                window.setTimeout(function(){ 
	                   location.reload();
	                } ,4000); 

	           }


	        },

	       error: function (){ 
	          
	       }

	    });				
		
		/*=====  End of Enviar datos  ======*/		

	}

});

/*=====  End of Bneficiarios  ======*/



/*=============================
=            Metas            =
=============================*/

$('#enviarMetasPronosticos').click(function (e){

	$(this).hide();

	validador= validacionRegistro($(".obligatorio"));
	validacionRegistroMostrarErrores($(".obligatorio"));

	if($(".fila__metas__conjuntos").length == 0){

		alertify.set("notifier","position", "top-right");
	    alertify.notify("Es necesario crear por lo menos una meta para continuar", "error", 5, function(){});	

	    $(this).show();

	}else if (validador==false) {

		validacionMensajeObligatorio($(this));

	}else{

		var paqueteDeDatos = new FormData();

		var nombre__conjunto = concatenarValores($(".nombre__conjunto"));
		var descripcion__conjunto = concatenarValores($(".descripcion__conjunto"));
		var metodoCalculo__conjunto = concatenarValores($(".metodoCalculo__conjunto"));
		var metaPropuesta__conjunto = concatenarValores($(".metaPropuesta__conjunto"));
		var periodo__conjunto  = concatenarValores($(".periodo__conjunto"));

		var deportistas__conjunto= concatenarValores($(".deportistas__conjunto"));
		var disciplina__conjunto= concatenarValores($(".disciplina__conjunto"));
		var categoria__conjunto= concatenarValores($(".categoria__conjunto"));
		var division__conjunto= concatenarValores($(".division__conjunto"));
		var modalidadPrueba__conjunto = concatenarValores($(".modalidadPrueba__conjunto"));
		var resultadoMarca__conjunto = concatenarValores($(".resultadoMarca__conjunto"));
		var eventoDeportistas__conjunto = concatenarValores($(".eventoDeportistas__conjunto"));
		var prnosticosDeportistas__conjunto = concatenarValores($(".prnosticosDeportistas__conjunto"));

		var codigoProyectoMetasPronosticos=$("#codigoProyectoMetasPronosticos").val();

		paqueteDeDatos.append('codigoProyectoMetasPronosticos',codigoProyectoMetasPronosticos);

		paqueteDeDatos.append('nombre__conjunto', JSON.stringify(nombre__conjunto));
		paqueteDeDatos.append('descripcion__conjunto', JSON.stringify(descripcion__conjunto));
		paqueteDeDatos.append('metodoCalculo__conjunto', JSON.stringify(metodoCalculo__conjunto));
		paqueteDeDatos.append('metaPropuesta__conjunto', JSON.stringify(metaPropuesta__conjunto));
		paqueteDeDatos.append('periodo__conjunto', JSON.stringify(periodo__conjunto));

		paqueteDeDatos.append('deportistas__conjunto', JSON.stringify(deportistas__conjunto));
		paqueteDeDatos.append('disciplina__conjunto', JSON.stringify(disciplina__conjunto));
		paqueteDeDatos.append('categoria__conjunto', JSON.stringify(categoria__conjunto));
		paqueteDeDatos.append('division__conjunto', JSON.stringify(division__conjunto));
		paqueteDeDatos.append('modalidadPrueba__conjunto', JSON.stringify(modalidadPrueba__conjunto));
		paqueteDeDatos.append('resultadoMarca__conjunto', JSON.stringify(resultadoMarca__conjunto));
		paqueteDeDatos.append('eventoDeportistas__conjunto', JSON.stringify(eventoDeportistas__conjunto));
		paqueteDeDatos.append('prnosticosDeportistas__conjunto', JSON.stringify(prnosticosDeportistas__conjunto));

		/*====================================
		=            Enviar datos            =
		====================================*/
		
		var destino = "modelosBd/inserta/insertaMetas.md.php"; 

	    $.ajax({

	       url: destino,
	       type: 'POST',
	       contentType: false,
	       data: paqueteDeDatos, 
	       processData: false,
	       cache: false, 

	       success: function(response){

	    	   var elementos=JSON.parse(response);
	           var mensaje=elementos['mensaje'];

	           if (mensaje==1) {

	           		alertify.set("notifier","position", "top-right");
		            alertify.notify("Datos ingresados correctamente", "success", 5, function(){});

		            $('.enviarDatosGenerales__reload').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	                window.setTimeout(function(){ 
	                   location.reload();
	                } ,4000); 

	           }


	        },

	       error: function (){ 
	          
	       }

	    });				
		
		/*=====  End of Enviar datos  ======*/		


	}


});

/*=====  End of Metas  ======*/


/*=======================================
=           Aporte Proyecto            =
=======================================*/

$('#enviarAporte').click(function (e){

	$(this).hide();

	validador= validacionRegistro($(".obligatorios__elementos__relacion"));
	validacionRegistroMostrarErrores($(".obligatorios__elementos__relacion"));

	if (validador==false) {

		validacionMensajeObligatorio($(this));

	}else{

		$.ajax({

		    type:"POST",
		    url:"modelosBd/inserta/insertaAporteProyecto.php",
		    data:$("#aporteProyectoFormulario").serialize(),
		    processData: false,
		    cache: false, 
	    	success:function(response){

	           	alertify.set("notifier","position", "top-right");
		        alertify.notify("Datos ingresados correctamente", "success", 5, function(){});

		        $('.enviarDatosGenerales__reload').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	            window.setTimeout(function(){ 
	            	window.location = "datosGenerales?contenido=6";
	            } ,4000); 

			},
			error:function(){

				alertify.set("notifier","position", "top-right");
				alertify.notify("Datos no ingresados error de conexión", "error", 2, function(){});
				location.reload();

			}
		
		});


	}

});

/*=====  End ofAporte Proyecto  ======*/


/*==============================================
=            Alineación estratégica            =
==============================================*/

$('#enviarAlineacionEstrategica').click(function (e){


	/*============================================
	=            Validador de errores            =
	============================================*/

	validador= validacionRegistro($(".alineacion__estrategicas__minimas"));
	validacionRegistroMostrarErrores($(".alineacion__estrategicas__minimas"));

	/*=====  End of Validador de errores  ======*/
	
	/*=======================================================
	=            Validadores mínimos de palabras            =
	=======================================================*/
	
	validadorMinimo= valoresMinimos($(".minimas__palabras__alineacion"));
	
	/*=====  End of Validadores mínimos de palabras  ======*/
	
	/*=========================================
	=            Valdiador chekeds            =
	=========================================*/
	
	validadorLinea= validacionRegistroChecks($(".chekeds__lineas"));
	
	/*=====  End of Valdiador chekeds  ======*/

	/*======================================
	=            Chekeds lineas            =
	======================================*/

	// obtener valores
	linea1= validacionRecorrerChekeds($("#lineaPolitica1"));
	linea2= validacionRecorrerChekeds($("#lineaPolitica2"));
	linea3= validacionRecorrerChekeds($("#lineaPolitica3"));
	
	/*=====  End of Chekeds lineas  ======*/
	
	/*==================================================
	=            Objetivos línea 1 objetivo            =
	==================================================*/
	
	objetivosLinea1= validacionRegistroChecks($(".checkeds__linea1"));

	// obtener valores
	objetivo1Linea1= validacionRecorrerChekeds($("#objetivo1"));
	objetivo1Linea2= validacionRecorrerChekeds($("#objetivo2"));
	objetivo1Linea3= validacionRecorrerChekeds($("#objetivo3"));
	objetivo1Linea4= validacionRecorrerChekeds($("#objetivo4"));
	objetivo1Linea5= validacionRecorrerChekeds($("#objetivo5"));
	objetivo1Linea6= validacionRecorrerChekeds($("#objetivo6"));
	objetivo1Linea7= validacionRecorrerChekeds($("#objetivo7"));
	objetivo1Linea8= validacionRecorrerChekeds($("#objetivo8"));
	objetivo1Linea9= validacionRecorrerChekeds($("#objetivo9"));
	objetivo1Linea10= validacionRecorrerChekeds($("#objetivo10"));
	objetivo1Linea11= validacionRecorrerChekeds($("#objetivo11"));
	
	/*=====  End of Objetivos línea 1 objetivo  ======*/
	
	/*===================================================
	=            Líneas políticas alineadas     1       =
	===================================================*/
	
	objetivo1Linea1Item1= validacionRegistroChecks($(".checkeds__linea1Objetivo1"));
	objetivo1Linea1Item2= validacionRegistroChecks($(".checkeds__linea1Objetivo2"));
	objetivo1Linea1Item3= validacionRegistroChecks($(".checkeds__linea1Objetivo3"));
	objetivo1Linea1Item4= validacionRegistroChecks($(".checkeds__linea1Objetivo4"));
	objetivo1Linea1Item5= validacionRegistroChecks($(".checkeds__linea1Objetivo5"));
	objetivo1Linea1Item6= validacionRegistroChecks($(".checkeds__linea1Objetivo6"));
	objetivo1Linea1Item7= validacionRegistroChecks($(".checkeds__linea1Objetivo7"));
	objetivo1Linea1Item8= validacionRegistroChecks($(".checkeds__linea1Objetivo8"));
	objetivo1Linea1Item9= validacionRegistroChecks($(".checkeds__linea1Objetivo9"));
	objetivo1Linea1Item10= validacionRegistroChecks($(".checkeds__linea1Objetivo10"));
	objetivo1Linea1Item11= validacionRegistroChecks($(".checkeds__linea1Objetivo11"));
	
	/*=====  End of Líneas políticas alineadas 1  ======*/

	/*===================================================
	=            Objetivos Línea 2 Objetivos            =
	===================================================*/
	
	objetivosLinea2= validacionRegistroChecks($(".checkeds__linea2"));
	
	// obtener los valores
	objetivo2Linea1= validacionRecorrerChekeds($("#objetivoLineaDos1"));
	objetivo2Linea2= validacionRecorrerChekeds($("#objetivoLineaDos2"));
	objetivo2Linea3= validacionRecorrerChekeds($("#objetivoLineaDos3"));
	objetivo2Linea4= validacionRecorrerChekeds($("#objetivoLineaDos4"));


	/*=====  End of Objetivos Línea 2 Objetivos  ======*/
	
	/*====================================================
	=            Líneas políticas alineadas 2            =
	====================================================*/
	
	objetivo2Linea1Item1= validacionRegistroChecks($(".checkeds__linea2Objetivo1"));
	objetivo2Linea1Item2= validacionRegistroChecks($(".checkeds__linea2Objetivo2"));
	objetivo2Linea1Item3= validacionRegistroChecks($(".checkeds__linea2Objetivo3"));
	objetivo2Linea1Item4= validacionRegistroChecks($(".checkeds__linea2Objetivo4"));
	
	/*=====  End of Líneas políticas alineadas 2  ======*/
	
	/*===================================================
	=            Objetivos Línea 3 Objetivos            =
	===================================================*/
	
	objetivosLinea3= validacionRegistroChecks($(".checkeds__linea3"));
	// obtener los valores
	objetivo3Linea1= validacionRecorrerChekeds($("#objetivoLineaTres1"));
	objetivo3Linea2= validacionRecorrerChekeds($("#objetivoLineaTres2"));
	objetivo3Linea3= validacionRecorrerChekeds($("#objetivoLineaTres3"));
	objetivo3Linea4= validacionRecorrerChekeds($("#objetivoLineaTres4"));
	objetivo3Linea5= validacionRecorrerChekeds($("#objetivoLineaTres5"));
	
	/*=====  End of Objetivos Línea 3 Objetivos  ======*/

	/*====================================================
	=            Líneas políticas alineadas 3            =
	====================================================*/
	
	objetivo3Linea1Item1= validacionRegistroChecks($(".checkeds__linea3Objetivo1"));
	objetivo3Linea1Item2= validacionRegistroChecks($(".checkeds__linea3Objetivo2"));
	objetivo3Linea1Item3= validacionRegistroChecks($(".checkeds__linea3Objetivo3"));
	objetivo3Linea1Item4= validacionRegistroChecks($(".checkeds__linea3Objetivo4"));
	objetivo3Linea1Item5= validacionRegistroChecks($(".checkeds__linea3Objetivo5"));
	
	/*=====  End of Líneas políticas alineadas 3  ======*/
	
	/*========================================================
	=            Objetivos ministerio del deporte            =
	========================================================*/
	
	validadorObjetivosMinisterio= validacionRegistroChecks($(".checkeds__objetivos__ministerio"));
	
	/*=====  End of Objetivos ministerio del deporte  ======*/
	
	/*=================================================================
	=            Ckeckeds objetivos ministerio del deporte            =
	=================================================================*/
	
	// obtener valores
	objetivosMinisterio1= validacionRecorrerChekeds($("#objetivoEstregicoSecretaria1"));
	objetivosMinisterio2= validacionRecorrerChekeds($("#objetivoEstregicoSecretaria2"));
	
	/*=====  End of Ckeckeds objetivos ministerio del deporte  ======*/
	
	
	/*==============================================
	=            Objetivos Ministerio              =
	==============================================*/
	
	objetivoMinisterio1= validacionRegistroChecks($(".checkeds__ObjetivoMinisterio1"));
	objetivoMinisterio2= validacionRegistroChecks($(".checkeds__ObjetivoMinisterio2"));
	
	/*=====  End of Objetivos Ministerio    ======*/
	

	if(validador==false){

		validacionMensajeObligatorio($(this));

	}else if (validadorMinimo==false) {

		validacionMinimoCaracteres($(this));

	}else if(validadorLinea==false){

		validacionCheckeds($(this),' una línea política relacionada al plan decenal del deporte');

	}else if(linea1=="si" && objetivosLinea1==false){

		validacionCheckeds($(this),' un objetivo estratégico relacionado a la línea política 1');

	}else if(linea1=="si" && objetivo1Linea1=="si" && objetivo1Linea1Item1==false){

		validacionCheckeds($(this),' un item del objetivo estratégico 1 relacionado a la línea política 1');

	}else if(linea1=="si" && objetivo1Linea2=="si" && objetivo1Linea1Item2==false){

		validacionCheckeds($(this),' un item del objetivo estratégico 2 relacionado a la línea política 1');

	}else if(linea1=="si" && objetivo1Linea3=="si" && objetivo1Linea1Item3==false){

		validacionCheckeds($(this),' un item del objetivo estratégico 3 relacionado a la línea política 1');

	}else if(linea1=="si" && objetivo1Linea4=="si" && objetivo1Linea1Item4==false){

		validacionCheckeds($(this),' un item del objetivo estratégico 4 relacionado a la línea política 1');

	}else if(linea1=="si" && objetivo1Linea5=="si" && objetivo1Linea1Item5==false){

		validacionCheckeds($(this),' un item del objetivo estratégico 5 relacionado a la línea política 1');

	}else if(linea1=="si" && objetivo1Linea6=="si" && objetivo1Linea1Item6==false){

		validacionCheckeds($(this),' un item del objetivo estratégico 6 relacionado a la línea política 1');

	}else if(linea1=="si" && objetivo1Linea7=="si" && objetivo1Linea1Item7==false){

		validacionCheckeds($(this),' un item del objetivo estratégico 7 relacionado a la línea política 1');

	}else if(linea1=="si" && objetivo1Linea8=="si" && objetivo1Linea1Item8==false){

		validacionCheckeds($(this),' un item del objetivo estratégico 8 relacionado a la línea política 1');

	}else if(linea1=="si" && objetivo1Linea9=="si" && objetivo1Linea1Item9==false){

		validacionCheckeds($(this),' un item del objetivo estratégico 9 relacionado a la línea política 1');

	}else if(linea1=="si" && objetivo1Linea10=="si" && objetivo1Linea1Item10==false){

		validacionCheckeds($(this),' un item del objetivo estratégico 10 relacionado a la línea política 1');

	}else if(linea1=="si" && objetivo1Linea11=="si" && objetivo1Linea1Item11==false){

		validacionCheckeds($(this),' un item del objetivo estratégico 11 relacionado a la línea política 1');

	}else if(linea2=="si" && objetivosLinea2==false){

		validacionCheckeds($(this),' un objetivo estratégico relacionado a la línea política 2');

	}else if(linea2=="si" && objetivo2Linea1=="si" && objetivo2Linea1Item1==false){

		validacionCheckeds($(this),' un item del objetivo estratégico 1 relacionado a la línea política 2');

	}else if(linea2=="si" && objetivo2Linea2=="si" && objetivo2Linea1Item2==false){

		validacionCheckeds($(this),' un item del objetivo estratégico 2 relacionado a la línea política 2');

	}else if(linea2=="si" && objetivo2Linea3=="si" && objetivo2Linea1Item3==false){

		validacionCheckeds($(this),' un item del objetivo estratégico 3 relacionado a la línea política 2');

	}else if(linea2=="si" && objetivo2Linea4=="si" && objetivo2Linea1Item4==false){

		validacionCheckeds($(this),' un item del objetivo estratégico 4 relacionado a la línea política 2');

	}else if(linea3=="si" && objetivosLinea3==false){

		validacionCheckeds($(this),' un objetivo estratégico relacionado a la línea política 3');

	}else if(linea3=="si" && objetivo3Linea1=="si" && objetivo3Linea1Item1==false){

		validacionCheckeds($(this),' un item del objetivo estratégico 1 relacionado a la línea política 3');

	}else if(linea3=="si" && objetivo3Linea2=="si" && objetivo3Linea1Item2==false){

		validacionCheckeds($(this),' un item del objetivo estratégico 2 relacionado a la línea política 3');

	}else if(linea3=="si" && objetivo3Linea3=="si" && objetivo3Linea1Item3==false){

		validacionCheckeds($(this),' un item del objetivo estratégico 3 relacionado a la línea política 3');

	}else if(linea3=="si" && objetivo3Linea4=="si" && objetivo3Linea1Item4==false){

		validacionCheckeds($(this),' un item del objetivo estratégico 4 relacionado a la línea política 3');

	}else if(linea3=="si" && objetivo3Linea5=="si" && objetivo3Linea1Item5==false){

		validacionCheckeds($(this),' un item del objetivo estratégico 5 relacionado a la línea política 3');

	}else if(validadorObjetivosMinisterio==false){

		validacionCheckeds($(this),' un objetivo institucional del plan estratégico del ministerio del deporte');

	}else if(objetivosMinisterio1=="si" && objetivoMinisterio1==false){

		validacionCheckeds($(this),' un item del objetivo institucional 1 del plan estratégico del ministerio del deporte');

	}else if(objetivosMinisterio2=="si" && objetivoMinisterio2==false){

		validacionCheckeds($(this),' un item del objetivo institucional 2 del plan estratégico del ministerio del deporte');

	}else{

		var paqueteDeDatos = new FormData();

		/*==============================================
		=            Alineación estratégica            =
		==============================================*/
		paqueteDeDatos.append('alineacionEstrategicaCampos', $('#alineacionEstrategicaCampos').prop('value'));
		/*=====  End of Alineación estratégica  ======*/
		

		
		/*========================================
		=            Líneas Políticas            =
		========================================*/
		
		paqueteDeDatos.append('linea1', linea1);
		paqueteDeDatos.append('linea2', linea2);
		paqueteDeDatos.append('linea3', linea3);
		
		/*=====  End of Líneas Políticas  ======*/
		

		/*========================================
		=            Objetivos Línea1            =
		========================================*/
		
		paqueteDeDatos.append('objetivo1Linea1', objetivo1Linea1);
		paqueteDeDatos.append('objetivo2Linea1', objetivo1Linea2);
		paqueteDeDatos.append('objetivo3Linea1', objetivo1Linea3);
		paqueteDeDatos.append('objetivo4Linea1', objetivo1Linea4);
		paqueteDeDatos.append('objetivo5Linea1', objetivo1Linea5);
		paqueteDeDatos.append('objetivo6Linea1', objetivo1Linea6);
		paqueteDeDatos.append('objetivo7Linea1', objetivo1Linea7);
		paqueteDeDatos.append('objetivo8Linea1', objetivo1Linea8);
		paqueteDeDatos.append('objetivo9Linea1', objetivo1Linea9);
		paqueteDeDatos.append('objetivo10Linea1', objetivo1Linea10);
		paqueteDeDatos.append('objetivo11Linea1', objetivo1Linea11);
		
		/*=====  End of Objetivos Línea1  ======*/

		/*==========================================
		=            Objetivos líneas 2            =
		==========================================*/
		
		paqueteDeDatos.append('objetivo1Linea2', objetivo2Linea1);
		paqueteDeDatos.append('objetivo2Linea2', objetivo2Linea2);
		paqueteDeDatos.append('objetivo3Linea2', objetivo2Linea3);
		paqueteDeDatos.append('objetivo4Linea2', objetivo2Linea4);

		/*=====  End of Objetivos líneas 2  ======*/
		
		/*===================================
		=            Objetivos 3            =
		===================================*/
		
		paqueteDeDatos.append('objetivo1Linea3', objetivo3Linea1);
		paqueteDeDatos.append('objetivo2Linea3', objetivo3Linea2);
		paqueteDeDatos.append('objetivo3Linea3', objetivo3Linea3);
		paqueteDeDatos.append('objetivo4Linea3', objetivo3Linea4);
		paqueteDeDatos.append('objetivo5Linea3', objetivo3Linea5);
		
		/*=====  End of Objetivos 3  ======*/

		/*========================================================
		=            Ojbetivos Ministerio del deporte            =
		========================================================*/
		
		paqueteDeDatos.append('objetivo1Institucional', objetivosMinisterio1);
		paqueteDeDatos.append('objetivo2Institucional', objetivosMinisterio2);
		
		/*=====  End of Ojbetivos Ministerio del deporte  ======*/
		
		
		/*================================================
		=            Items Objetivo 1 Linea 1            =
		================================================*/
		
		marcoJuridicoObjetivo1= validacionRecorrerChekeds($("#marcoJuridicoObjetivo1"));
		marcoJuridicoObjetivo2= validacionRecorrerChekeds($("#marcoJuridicoObjetivo2"));
		marcoJuridicoObjetivo3= validacionRecorrerChekeds($("#marcoJuridicoObjetivo3"));

		paqueteDeDatos.append('objetivo1Linea1Item1', marcoJuridicoObjetivo1);
		paqueteDeDatos.append('objetivo1Linea1Item2', marcoJuridicoObjetivo2);
		paqueteDeDatos.append('objetivo1Linea1Item3', marcoJuridicoObjetivo3);
		
		/*=====  End of Items Objetivo 1 Linea 1  ======*/
		
		/*================================================
		=            Items Objetivo 2 Linea 1            =
		================================================*/
		
		sistemaComunicacionObjetivo1= validacionRecorrerChekeds($("#sistemaComunicacionObjetivo1"));
		sistemaComunicacionObjetivo2= validacionRecorrerChekeds($("#sistemaComunicacionObjetivo2"));
		sistemaComunicacionObjetivo3= validacionRecorrerChekeds($("#sistemaComunicacionObjetivo3"));
		sistemaComunicacionObjetivo4= validacionRecorrerChekeds($("#sistemaComunicacionObjetivo4"));

		paqueteDeDatos.append('objetivo2Linea1Item1', sistemaComunicacionObjetivo1);
		paqueteDeDatos.append('objetivo2Linea1Item2', sistemaComunicacionObjetivo2);
		paqueteDeDatos.append('objetivo2Linea1Item3', sistemaComunicacionObjetivo3);
		paqueteDeDatos.append('objetivo2Linea1Item4', sistemaComunicacionObjetivo4);

		/*=====  End of Items Objetivo 2 Linea 1  ======*/


		/*================================================
		=            Items Objetivo 3 Linea 1            =
		================================================*/
		
		sistemaFormacionObjetivo1= validacionRecorrerChekeds($("#sistemaFormacionObjetivo1"));
		sistemaFormacionObjetivo2= validacionRecorrerChekeds($("#sistemaFormacionObjetivo2"));
		sistemaFormacionObjetivo3= validacionRecorrerChekeds($("#sistemaFormacionObjetivo3"));
		sistemaFormacionObjetivo4= validacionRecorrerChekeds($("#sistemaFormacionObjetivo4"));

		paqueteDeDatos.append('objetivo3Linea1Item1', sistemaFormacionObjetivo1);
		paqueteDeDatos.append('objetivo3Linea1Item2', sistemaFormacionObjetivo2);
		paqueteDeDatos.append('objetivo3Linea1Item3', sistemaFormacionObjetivo3);
		paqueteDeDatos.append('objetivo3Linea1Item4', sistemaFormacionObjetivo4);


		/*=====  End of Items Objetivo 3 Linea 1  ======*/

		/*================================================
		=            Items Objetivo 4 Linea 1            =
		================================================*/
		
		implementarSistemaNacionalObjetivo1= validacionRecorrerChekeds($("#implementarSistemaNacionalObjetivo1"));

		paqueteDeDatos.append('objetivo4Linea1Item1', implementarSistemaNacionalObjetivo1);

		/*=====  End of Items Objetivo 4 Linea 1  ======*/

		/*================================================
		=            Items Objetivo 5 Linea 1            =
		================================================*/
		
		modeloCoordinacionObjetivo1= validacionRecorrerChekeds($("#modeloCoordinacionObjetivo1"));

		paqueteDeDatos.append('objetivo5Linea1Item1', modeloCoordinacionObjetivo1);

		/*=====  End of Items Objetivo 5 Linea 1  ======*/

		/*================================================
		=            Items Objetivo 6 Linea 1            =
		================================================*/
		
		participacionCiudadanaObjetivo1= validacionRecorrerChekeds($("#participacionCiudadanaObjetivo1"));
		participacionCiudadanaObjetivo2= validacionRecorrerChekeds($("#participacionCiudadanaObjetivo2"));

		paqueteDeDatos.append('objetivo6Linea1Item1', participacionCiudadanaObjetivo1);
		paqueteDeDatos.append('objetivo6Linea1Item2', participacionCiudadanaObjetivo2);

		/*=====  End of Items Objetivo 6 Linea 1  ======*/

		/*================================================
		=            Items Objetivo 7 Linea 1            =
		================================================*/
		
		propiciarInvestigacionObjetivo1= validacionRecorrerChekeds($("#propiciarInvestigacionObjetivo1"));
		propiciarInvestigacionObjetivo2= validacionRecorrerChekeds($("#propiciarInvestigacionObjetivo2"));

		paqueteDeDatos.append('objetivo7Linea1Item1', propiciarInvestigacionObjetivo1);
		paqueteDeDatos.append('objetivo7Linea1Item2', propiciarInvestigacionObjetivo2);

		/*=====  End of Items Objetivo 7 Linea 1  ======*/


		/*================================================
		=            Items Objetivo 8 Linea 1            =
		================================================*/
		
		lograrSostenibilidadObjetivo1= validacionRecorrerChekeds($("#lograrSostenibilidadObjetivo1"));
		lograrSostenibilidadObjetivo2= validacionRecorrerChekeds($("#lograrSostenibilidadObjetivo2"));
		lograrSostenibilidadObjetivo3= validacionRecorrerChekeds($("#lograrSostenibilidadObjetivo3"));
		lograrSostenibilidadObjetivo4= validacionRecorrerChekeds($("#lograrSostenibilidadObjetivo4"));
		lograrSostenibilidadObjetivo5= validacionRecorrerChekeds($("#lograrSostenibilidadObjetivo5"));
		

		paqueteDeDatos.append('objetivo8Linea1Item1', lograrSostenibilidadObjetivo1);
		paqueteDeDatos.append('objetivo8Linea1Item2', lograrSostenibilidadObjetivo2);
		paqueteDeDatos.append('objetivo8Linea1Item3', lograrSostenibilidadObjetivo3);
		paqueteDeDatos.append('objetivo8Linea1Item4', lograrSostenibilidadObjetivo4);
		paqueteDeDatos.append('objetivo8Linea1Item5', lograrSostenibilidadObjetivo5);

		/*=====  End of Items Objetivo 8 Linea 1  ======*/

		/*================================================
		=            Items Objetivo 9 Linea 1            =
		================================================*/
		
		modelosDeGestionObjetivo1= validacionRecorrerChekeds($("#modelosDeGestionObjetivo1"));

		paqueteDeDatos.append('objetivo9Linea1Item1', modelosDeGestionObjetivo1);

		/*=====  End of Items Objetivo 9 Linea 1  ======*/

		/*================================================
		=            Items Objetivo 10 Linea 1            =
		================================================*/
		
		optimizarInfraestructuraObjetivo1= validacionRecorrerChekeds($("#optimizarInfraestructuraObjetivo1"));
		optimizarInfraestructuraObjetivo2= validacionRecorrerChekeds($("#optimizarInfraestructuraObjetivo2"));
		optimizarInfraestructuraObjetivo3= validacionRecorrerChekeds($("#optimizarInfraestructuraObjetivo3"));
		optimizarInfraestructuraObjetivo4= validacionRecorrerChekeds($("#optimizarInfraestructuraObjetivo4"));
		optimizarInfraestructuraObjetivo5= validacionRecorrerChekeds($("#optimizarInfraestructuraObjetivo5"));

		paqueteDeDatos.append('objetivo10Linea1Item1', optimizarInfraestructuraObjetivo1);
		paqueteDeDatos.append('objetivo10Linea1Item2', optimizarInfraestructuraObjetivo2);
		paqueteDeDatos.append('objetivo10Linea1Item3', optimizarInfraestructuraObjetivo3);
		paqueteDeDatos.append('objetivo10Linea1Item4', optimizarInfraestructuraObjetivo4);
		paqueteDeDatos.append('objetivo10Linea1Item5', optimizarInfraestructuraObjetivo5);

		/*=====  End of Items Objetivo 10 Linea 1  ======*/

		/*================================================
		=            Items Objetivo 11 Linea 1            =
		================================================*/
		
		modeloCoordinacionObjetivo1= validacionRecorrerChekeds($("#modeloCoordinacionObjetivo1"));
		modeloCoordinacionObjetivo2= validacionRecorrerChekeds($("#modeloCoordinacionObjetivo2"));

		paqueteDeDatos.append('objetivo11Linea1Item1', modeloCoordinacionObjetivo1);
		paqueteDeDatos.append('objetivo11Linea1Item2', modeloCoordinacionObjetivo2);

		/*=====  End of Items Objetivo 11 Linea 1  ======*/

		/*================================================
		=            Items Objetivo 1 Linea 2            =
		================================================*/
		
		implementacionMunicipiosColegiosObjetivo1= validacionRecorrerChekeds($("#implementacionMunicipiosColegiosObjetivo1"));
		implementacionMunicipiosColegiosObjetivo2= validacionRecorrerChekeds($("#implementacionMunicipiosColegiosObjetivo2"));
		implementacionMunicipiosColegiosObjetivo3= validacionRecorrerChekeds($("#implementacionMunicipiosColegiosObjetivo3"));
		implementacionMunicipiosColegiosObjetivo4= validacionRecorrerChekeds($("#implementacionMunicipiosColegiosObjetivo4"));

		paqueteDeDatos.append('objetivo1Linea2Item1', implementacionMunicipiosColegiosObjetivo1);
		paqueteDeDatos.append('objetivo1Linea2Item2', implementacionMunicipiosColegiosObjetivo2);
		paqueteDeDatos.append('objetivo1Linea2Item3', implementacionMunicipiosColegiosObjetivo3);
		paqueteDeDatos.append('objetivo1Linea2Item4', implementacionMunicipiosColegiosObjetivo4);

		/*=====  End of Items Objetivo 1 Linea 2  ======*/

		/*================================================
		=            Items Objetivo 2 Linea 2            =
		================================================*/
		
		posicionarPaisObjetivo1= validacionRecorrerChekeds($("#posicionarPaisObjetivo1"));
		posicionarPaisObjetivo2= validacionRecorrerChekeds($("#posicionarPaisObjetivo2"));
		posicionarPaisObjetivo3= validacionRecorrerChekeds($("#posicionarPaisObjetivo3"));

		paqueteDeDatos.append('objetivo2Linea2Item1', posicionarPaisObjetivo1);
		paqueteDeDatos.append('objetivo2Linea2Item2', posicionarPaisObjetivo2);
		paqueteDeDatos.append('objetivo2Linea2Item3', posicionarPaisObjetivo3);

		/*=====  End of Items Objetivo 2 Linea 2  ======*/


		/*================================================
		=            Items Objetivo 3 Linea 2            =
		================================================*/
		
		practicaEducacionFisicaObjetivo1= validacionRecorrerChekeds($("#practicaEducacionFisicaObjetivo1"));
		practicaEducacionFisicaObjetivo2= validacionRecorrerChekeds($("#practicaEducacionFisicaObjetivo2"));
		practicaEducacionFisicaObjetivo3= validacionRecorrerChekeds($("#practicaEducacionFisicaObjetivo3"));

		paqueteDeDatos.append('objetivo3Linea2Item1', practicaEducacionFisicaObjetivo1);
		paqueteDeDatos.append('objetivo3Linea2Item2', practicaEducacionFisicaObjetivo2);
		paqueteDeDatos.append('objetivo3Linea2Item3', practicaEducacionFisicaObjetivo3);

		/*=====  End of Items Objetivo 3 Linea 2  ======*/


		/*================================================
		=            Items Objetivo 4 Linea 2            =
		================================================*/
		
		masificacionDefireObjetivo1= validacionRecorrerChekeds($("#masificacionDefireObjetivo1"));
		masificacionDefireObjetivo2= validacionRecorrerChekeds($("#masificacionDefireObjetivo2"));

		paqueteDeDatos.append('objetivo4Linea2Item1', masificacionDefireObjetivo1);
		paqueteDeDatos.append('objetivo4Linea2Item2', masificacionDefireObjetivo2);

		/*=====  End of Items Objetivo 4 Linea 2  ======*/


		/*================================================
		=            Items Objetivo 1 Linea 3            =
		================================================*/
		
		significativamentePosicionesObjetivo1= validacionRecorrerChekeds($("#significativamentePosicionesObjetivo1"));
		significativamentePosicionesObjetivo2= validacionRecorrerChekeds($("#significativamentePosicionesObjetivo2"));
		significativamentePosicionesObjetivo3= validacionRecorrerChekeds($("#significativamentePosicionesObjetivo3"));
		significativamentePosicionesObjetivo4= validacionRecorrerChekeds($("#significativamentePosicionesObjetivo4"));
		significativamentePosicionesObjetivo5= validacionRecorrerChekeds($("#significativamentePosicionesObjetivo5"));
		significativamentePosicionesObjetivo6= validacionRecorrerChekeds($("#significativamentePosicionesObjetivo6"));

		paqueteDeDatos.append('objetivo1Linea3Item1', significativamentePosicionesObjetivo1);
		paqueteDeDatos.append('objetivo1Linea3Item2', significativamentePosicionesObjetivo2);
		paqueteDeDatos.append('objetivo1Linea3Item3', significativamentePosicionesObjetivo3);
		paqueteDeDatos.append('objetivo1Linea3Item4', significativamentePosicionesObjetivo4);
		paqueteDeDatos.append('objetivo1Linea3Item5', significativamentePosicionesObjetivo5);
		paqueteDeDatos.append('objetivo1Linea3Item6', significativamentePosicionesObjetivo6);

		/*=====  End of Items Objetivo 1 Linea 3  ======*/


		/*================================================
		=            Items Objetivo 2 Linea 3            =
		================================================*/

		sistemaPreparacionNacionalObjetivo1= validacionRecorrerChekeds($("#sistemaPreparacionNacionalObjetivo1"));
		sistemaPreparacionNacionalObjetivo2= validacionRecorrerChekeds($("#sistemaPreparacionNacionalObjetivo2"));

		paqueteDeDatos.append('objetivo2Linea3Item1', sistemaPreparacionNacionalObjetivo1);
		paqueteDeDatos.append('objetivo2Linea3Item2', sistemaPreparacionNacionalObjetivo2);

		/*=====  End of Items Objetivo 2 Linea 3  ======*/


		/*================================================
		=            Items Objetivo 3 Linea 3            =
		================================================*/

		incrementarPoblacionAtletasObjetivo1= validacionRecorrerChekeds($("#incrementarPoblacionAtletasObjetivo1"));
		incrementarPoblacionAtletasObjetivo2= validacionRecorrerChekeds($("#incrementarPoblacionAtletasObjetivo2"));
		incrementarPoblacionAtletasObjetivo3= validacionRecorrerChekeds($("#incrementarPoblacionAtletasObjetivo3"));

		paqueteDeDatos.append('objetivo3Linea3Item1', incrementarPoblacionAtletasObjetivo1);
		paqueteDeDatos.append('objetivo3Linea3Item2', incrementarPoblacionAtletasObjetivo2);
		paqueteDeDatos.append('objetivo3Linea3Item3', incrementarPoblacionAtletasObjetivo3);

		/*=====  End of Items Objetivo 3 Linea 3  ======*/

		/*================================================
		=            Items Objetivo 4 Linea 3            =
		================================================*/

		accionesDopajeObjetivo1= validacionRecorrerChekeds($("#accionesDopajeObjetivo1"));
		accionesDopajeObjetivo2= validacionRecorrerChekeds($("#accionesDopajeObjetivo2"));

		paqueteDeDatos.append('objetivo4Linea3Item1', accionesDopajeObjetivo1);
		paqueteDeDatos.append('objetivo4Linea3Item2', accionesDopajeObjetivo2);

		/*=====  End of Items Objetivo 4 Linea 3  ======*/

		/*================================================
		=            Items Objetivo 5 Linea 3            =
		================================================*/

		sistemaPrenvencionObjetivo1= validacionRecorrerChekeds($("#sistemaPrenvencionObjetivo1"));
		sistemaPrenvencionObjetivo2= validacionRecorrerChekeds($("#sistemaPrenvencionObjetivo2"));

		paqueteDeDatos.append('objetivo5Linea3Item1', sistemaPrenvencionObjetivo1);
		paqueteDeDatos.append('objetivo5Linea3Item2', sistemaPrenvencionObjetivo2);

		/*=====  End of Items Objetivo 5 Linea 3  ======*/

		/*=========================================================
		=            Items Objetivo 1 Institucionales             =
		=========================================================*/
		
		incrementarFisicaSecretariaObjetivo1= validacionRecorrerChekeds($("#incrementarFisicaSecretariaObjetivo1"));
		incrementarFisicaSecretariaObjetivo2= validacionRecorrerChekeds($("#incrementarFisicaSecretariaObjetivo2"));
		incrementarFisicaSecretariaObjetivo3= validacionRecorrerChekeds($("#incrementarFisicaSecretariaObjetivo3"));

		paqueteDeDatos.append('objetivo1Institucionaltem1', incrementarFisicaSecretariaObjetivo1);
		paqueteDeDatos.append('objetivo1Institucionaltem2', incrementarFisicaSecretariaObjetivo2);
		paqueteDeDatos.append('objetivo1Institucionaltem3', incrementarFisicaSecretariaObjetivo3);

		/*=====  End of Items Objetivo 1 Institucionales   ======*/
		

		/*=========================================================
		=            Items Objetivo 2 Institucionales             =
		=========================================================*/
		
		incrementarFisicaSecretariaObjetivo4= validacionRecorrerChekeds($("#incrementarFisicaSecretariaObjetivo4"));
		incrementarFisicaSecretariaObjetivo5= validacionRecorrerChekeds($("#incrementarFisicaSecretariaObjetivo5"));
		incrementarFisicaSecretariaObjetivo6= validacionRecorrerChekeds($("#incrementarFisicaSecretariaObjetivo6"));

		paqueteDeDatos.append('objetivo2Institucionaltem1', incrementarFisicaSecretariaObjetivo4);
		paqueteDeDatos.append('objetivo2Institucionaltem2', incrementarFisicaSecretariaObjetivo5);
		paqueteDeDatos.append('objetivo2Institucionaltem3', incrementarFisicaSecretariaObjetivo6);

		/*=====  End of Items Objetivo 2 Institucionales   ======*/

		/*==============================
		=            Código            =
		==============================*/
		
		paqueteDeDatos.append('codigo', $('#codigoProyecto').prop('value'));
		
		/*=====  End of Código  ======*/
		

		/*====================================
		=            Enviar datos            =
		====================================*/
		
		var destino = "modelosBd/inserta/insertaAlineacion.md.php"; 

	    $.ajax({

	       url: destino,
	       type: 'POST',
	       contentType: false,
	       data: paqueteDeDatos, 
	       processData: false,
	       cache: false, 

	       success: function(response){


	           	alertify.set("notifier","position", "top-right");
		        alertify.notify("Datos ingresados correctamente", "success", 5, function(){});

		        $('.enviarDatosGenerales__reload').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	            window.setTimeout(function(){ 
	            	window.location = "datosGenerales?contenido=5";
	            } ,4000); 


	        },

	       error: function (){ 
	          
	       }

	    });					
		
		/*=====  End of Enviar datos  ======*/



	}

});

/*=====  End of Alineación estratégica  ======*/


/*=================================================
=            Análisis situación acutal            =
=================================================*/

$('#enviarDatosSituacionActual').click(function (e){

	$(this).hide();

	validador= validacionRegistro($(".obligatorio__elementos"));
	validacionRegistroMostrarErrores($(".obligatorio__elementos"));

	validador2= valoresMinimos($(".longitud__minima__grupal"));


	if (validador==false) {

		alertify.set("notifier","position", "top-right");
	    alertify.notify("Campos obligatorios", "error", 5, function(){});	

	    $(this).show();

	}else if(($(".tabla__objetivo__especifico").length == 0 || $(".tabla__objetivo__especifico").length == 1) && ($(".tabla__objetivo__especifico__editar").length == 0 || $(".tabla__objetivo__especifico__editar").length == 1)){

		alertify.set("notifier","position", "top-right");
	    alertify.notify("Debe generar mínimo 2 objetivos específicos", "error", 5, function(){});	

	    $(this).show();

	}else if(validador2==false){

		alertify.set("notifier","position", "top-right");
	    alertify.notify("Fijarse en las palabras mínimas requeridas", "error", 5, function(){});	

	    $(this).show();

	}else{

		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('codigoProyecto', $('#codigoProyecto').prop('value'));
		paqueteDeDatos.append('analisisSituacionActual', $('#analisisSituacionActual').prop('value'));
		paqueteDeDatos.append('justificacionCaracterizacion', $('#justificacionCaracterizacion').prop('value'));
		paqueteDeDatos.append('objetivoGeneralCaracterizacion', $('#objetivoGeneralCaracterizacion').prop('value'));

		var obligatorio__elementos= concatenarValores($(".especificos__grupales"));

		paqueteDeDatos.append('obligatorio__elementos', JSON.stringify(obligatorio__elementos));

		/*====================================
		=            Enviar datos            =
		====================================*/
		
		var destino = "modelosBd/inserta/isertaJustificacion.md.php"; 

	    $.ajax({

	       url: destino,
	       type: 'POST',
	       contentType: false,
	       data: paqueteDeDatos, 
	       processData: false,
	       cache: false, 

	       success: function(response){

	    	   var elementos=JSON.parse(response);
	           var mensaje=elementos['mensaje'];

	           if (mensaje==1) {

	           		alertify.set("notifier","position", "top-right");
		            alertify.notify("Datos ingresados correctamente", "success", 5, function(){});

		            $('.enviarDatosGenerales__reload').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	                window.setTimeout(function(){ 
	                   location.reload();
	                } ,4000); 

	           }


	        },

	       error: function (){ 
	          
	       }

	    });					
		
		/*=====  End of Enviar datos  ======*/
		


	}

});

/*=====  End of Análisis situación acutal  ======*/



/*====================================
=            Bses legales            =
====================================*/

$('#enviarBasesLegales').click(function (e){

	$(this).hide();

	validador= validacionRegistro($(".obligatorios__legales"));
	validacionRegistroMostrarErrores($(".obligatorios__legales"));

	validador2= valoresMinimos($(".error__conjuntos__bases__legales"));


	if ($(".tabla__legal").length == 0) {

		alertify.set("notifier","position", "top-right");
	    alertify.notify("Es obligatorio generar por lo menos una base legal para poder continuar", "error", 5, function(){});	

	    $(this).show();

	}else if(validador==false) {

		alertify.set("notifier","position", "top-right");
	    alertify.notify("Campos obligatorios", "error", 5, function(){});	

	    $(this).show();


	}else if(validador2==false){

		alertify.set("notifier","position", "top-right");
	    alertify.notify("Fijarse en las palabras mínimas requeridas", "error", 5, function(){});	

	    $(this).show();

	}else{

		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('codigoProyecto', $('#codigoProyecto').prop('value'));

		var nombre__legales= concatenarValores($(".nombre__legales"));
		var justificacion__legales= concatenarValores($(".justificacion__legales"));

		paqueteDeDatos.append('nombre__legales', JSON.stringify(nombre__legales));
		paqueteDeDatos.append('justificacion__legales', JSON.stringify(justificacion__legales));

		/*====================================
		=            Enviar datos            =
		====================================*/
		
		var destino = "modelosBd/inserta/insertaBaseLegal.md.php"; 

	    $.ajax({

	       url: destino,
	       type: 'POST',
	       contentType: false,
	       data: paqueteDeDatos, 
	       processData: false,
	       cache: false, 

	       success: function(response){

	    	   var elementos=JSON.parse(response);
	           var mensaje=elementos['mensaje'];

	           if (mensaje==1) {

	           		alertify.set("notifier","position", "top-right");
		            alertify.notify("Datos ingresados correctamente", "success", 5, function(){});

		            $('.enviarDatosGenerales__reload').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	                window.setTimeout(function(){ 
	                   window.location = "datosGenerales?contenido=3";
	                } ,4000); 

	           }


	        },

	       error: function (){ 
	          
	       }

	    });				
		
		/*=====  End of Enviar datos  ======*/
		
	}

});

/*=====  End of Bses legales  ======*/

/*=======================================================
=            Guardar proyecto modificaciones            =
=======================================================*/

$('#enviarProyectosUnitariosDos').click(function (e){

	$(this).hide();

	validador= validacionRegistro($(".obligatorios__proyectosUnitarios"));
	validacionRegistroMostrarErrores($(".obligatorios__proyectosUnitarios"));


	if($("#mensajePlurianual").val()==""){

		alertify.set("notifier","position", "top-right");
	    alertify.notify("Es obligatorio escoger fechas de inicio y final del proyecto", "error", 5, function(){});	

	    $(this).show();

	}else{

		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('codigoProyecto', $('#codigoProyecto').prop('value'));

		paqueteDeDatos.append('presupuestoLetras', $('#presupuestoLetras').prop('value'));
		paqueteDeDatos.append('presupuesto', $('#presupuesto').prop('value'));

		/*=========================================
		=            Datos plurianules            =
		=========================================*/
		
		paqueteDeDatos.append('mensajePlurianual', $('#mensajePlurianual').prop('value'));

		paqueteDeDatos.append('mensajePlurianualAnios', $('#mensajePlurianualAnios').prop('value'));


		paqueteDeDatos.append('presupuestoDos', $('#presupuestoDos').prop('value'));

		paqueteDeDatos.append('presupuestoLetrasDos', $('#presupuestoLetrasDos').prop('value'));
		
		
		paqueteDeDatos.append('presupuestoTres', $('#presupuestoTres').prop('value'));

		paqueteDeDatos.append('presupuestoLetrasTres', $('#presupuestoLetrasTres').prop('value'));


		paqueteDeDatos.append('presupuestoCuatro', $('#presupuestoCuatro').prop('value'));

		paqueteDeDatos.append('presupuestoLetrasCuatro', $('#presupuestoLetrasCuatro').prop('value'));
		

		paqueteDeDatos.append('inicioPeriodos', $('#inicioPeriodos').prop('value'));

		paqueteDeDatos.append('finPeriodos', $('#finPeriodos').prop('value'));


		/*=====  End of Datos plurianules  ======*/

		
		/*======================================
		=            Enviar valores            =
		======================================*/
		
		var destino = "modelosBd/inserta/actualizaUnitarios.md.php"; 

	    $.ajax({

	       url: destino,
	       type: 'POST',
	       contentType: false,
	       data: paqueteDeDatos, 
	       processData: false,
	       cache: false, 

	       success: function(response){

	    	   var elementos=JSON.parse(response);
	           var mensaje=elementos['mensaje'];

	           if (mensaje==1) {

	           		alertify.set("notifier","position", "top-right");
		            alertify.notify("Datos ingresados correctamente", "success", 5, function(){});

		            $('.enviarDatosGenerales__reload').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	                window.setTimeout(function(){ 
	                   location.reload();
	                } ,4000); 

	           }


	        },

	       error: function (){ 
	          
	       }

	    });		
		
		/*=====  End of Enviar valores  ======*/
		

	}

});



/*=====  End of Guardar proyecto modificaciones  ======*/


/*=================================================
=            Guardar Proyecto Separado            =
=================================================*/

$('#enviarProyectosUnitarios').click(function (e){

	$(this).hide();

	validador= validacionRegistro($(".obligatorios__proyectosUnitarios"));
	validacionRegistroMostrarErrores($(".obligatorios__proyectosUnitarios"));

	validador2= validacionRegistro($(".paisTipo"));
	validacionRegistroMostrarErrores($(".paisTipo"));

	validador3= validacionRegistro($(".paisTipoInter"));
	validacionRegistroMostrarErrores($(".paisTipoInter"));

	validador4= validacionRegistro($(".provinciaUbicacion"));
	validacionRegistroMostrarErrores($(".provinciaUbicacion"));

	validador5= validacionRegistro($(".cantonMultiples"));
	validacionRegistroMostrarErrores($(".cantonMultiples"));

	validador6= validacionRegistro($(".parroquiaMultiples"));
	validacionRegistroMostrarErrores($(".parroquiaMultiples"));

	validador7= validacionRegistro($(".ubicacion"));
	validacionRegistroMostrarErrores($(".ubicacion"));

	validador8= validacionRegistro($(".ubicacionInter"));
	validacionRegistroMostrarErrores($(".ubicacionInter"));

	validador9= validacionRegistro($(".estado"));
	validacionRegistroMostrarErrores($(".estado"));

	validador10= validacionRegistro($(".sector"));
	validacionRegistroMostrarErrores($(".sector"));

	validador11= validacionRegistro($(".comunidad"));
	validacionRegistroMostrarErrores($(".comunidad"));

	validador12= validacionRegistro($(".tipoUbicacion"));
	validacionRegistroMostrarErrores($(".tipoUbicacion"));

	if ($(".fila__paises__grupales").length == 0 && $(".tablas__editadas").length == 0 && $("#indicadorTecnico").val()!="si") {

		alertify.set("notifier","position", "top-right");
	    alertify.notify("Es necesario añadir una ubicación geográfica donde se ejecutará el proyecto", "error", 5, function(){});	

	    $(this).show();

	}else if (validador==false || validador2==false || validador3==false || validador4==false || validador5==false || validador6==false || validador7==false || validador8==false || validador9==false || validador10==false || validador11==false || validador12==false) {

		alertify.set("notifier","position", "top-right");
	    alertify.notify("Campos obligatorios", "error", 5, function(){});	

	    $(this).show();


	}else{

		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('codigoProyecto', $('#codigoProyecto').prop('value'));

		paqueteDeDatos.append('nombreProyecto', $('#nombreProyecto').prop('value'));
		paqueteDeDatos.append('presupuestoLetras', $('#presupuestoLetras').prop('value'));
		paqueteDeDatos.append('presupuesto', $('#presupuesto').prop('value'));

		/*=========================================
		=            Datos plurianules            =
		=========================================*/
		
		paqueteDeDatos.append('mensajePlurianual', $('#mensajePlurianual').prop('value'));

		paqueteDeDatos.append('mensajePlurianualAnios', $('#mensajePlurianualAnios').prop('value'));


		paqueteDeDatos.append('presupuestoDos', $('#presupuestoDos').prop('value'));

		paqueteDeDatos.append('presupuestoLetrasDos', $('#presupuestoLetrasDos').prop('value'));
		
		
		paqueteDeDatos.append('presupuestoTres', $('#presupuestoTres').prop('value'));

		paqueteDeDatos.append('presupuestoLetrasTres', $('#presupuestoLetrasTres').prop('value'));


		paqueteDeDatos.append('presupuestoCuatro', $('#presupuestoCuatro').prop('value'));

		paqueteDeDatos.append('presupuestoLetrasCuatro', $('#presupuestoLetrasCuatro').prop('value'));

		

		paqueteDeDatos.append('inicioPeriodos', $('#inicioPeriodos').prop('value'));

		paqueteDeDatos.append('finPeriodos', $('#finPeriodos').prop('value'));


		paqueteDeDatos.append('situacionLegalPredio', $('#situacionLegalPredio').prop('value'));

		paqueteDeDatos.append('numeroCertificadoPropiedad', $('#numeroCertificadoPropiedad').prop('value'));

		/*=====  End of Datos plurianules  ======*/
		if ($(".fila__representativas").length ) {
			
			paqueteDeDatos.append('cedulaRepresentanteLegal', $('#cedulaRepresentanteLegal').prop('value'));

			paqueteDeDatos.append('nombreRepresentanteLegal', $('#nombreRepresentanteLegal').prop('value'));

		}

		paqueteDeDatos.append('fechaInicialPlazo', $('#fechaInicialPlazo').prop('value'));

		paqueteDeDatos.append('fechaFinalPlazo', $('#fechaFinalPlazo').prop('value'));
		
		/*=============================================
		=            Llamar arrays strings            =
		=============================================*/
		
		var paisTipo= concatenarValores($(".paisTipo"));
		var paisTipoInter= concatenarValores($(".paisTipoInter"));
		var provinciaUbicacion= concatenarValores($(".provinciaUbicacion"));
		var cantonMultiples= concatenarValores($(".cantonMultiples"));
		var parroquiaMultiples= concatenarValores($(".parroquiaMultiples"));
		var ubicacion= concatenarValores($(".ubicacion"));
		var ubicacionInter= concatenarValores($(".ubicacionInter"));
		var estado= concatenarValores($(".estado"));	
		var sector= concatenarValores($(".sector"));
		var comunidad= concatenarValores($(".comunidad"));
		var tipoUbicacion= concatenarValores($(".tipoUbicacion"));

		paqueteDeDatos.append('paisTipo', JSON.stringify(paisTipo));
		paqueteDeDatos.append('paisTipoInter', JSON.stringify(paisTipoInter));
		paqueteDeDatos.append('provinciaUbicacion', JSON.stringify(provinciaUbicacion));
		paqueteDeDatos.append('cantonMultiples', JSON.stringify(cantonMultiples));
		paqueteDeDatos.append('parroquiaMultiples', JSON.stringify(parroquiaMultiples));
		paqueteDeDatos.append('ubicacion', JSON.stringify(ubicacion));
		paqueteDeDatos.append('ubicacionInter', JSON.stringify(ubicacionInter));
		paqueteDeDatos.append('estado', JSON.stringify(estado));
		paqueteDeDatos.append('sector', JSON.stringify(sector));
		paqueteDeDatos.append('comunidad', JSON.stringify(comunidad));
		paqueteDeDatos.append('tipoUbicacion', JSON.stringify(tipoUbicacion));

		/*=====  End of Llamar arrays strings  ======*/
		
		/*======================================
		=            Enviar valores            =
		======================================*/
		
		var destino = "modelosBd/inserta/insertaProyectoUnitarios.md.php"; 

	    $.ajax({

	       url: destino,
	       type: 'POST',
	       contentType: false,
	       data: paqueteDeDatos, 
	       processData: false,
	       cache: false, 

	       success: function(response){

	    	   var elementos=JSON.parse(response);
	           var mensaje=elementos['mensaje'];

	           if (mensaje==1) {

	           		alertify.set("notifier","position", "top-right");
		            alertify.notify("Datos ingresados correctamente", "success", 5, function(){});

		            $('.enviarDatosGenerales__reload').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	                window.setTimeout(function(){ 
	                   location.reload();
	                } ,4000); 

	           }


	        },

	       error: function (){ 
	          
	       }

	    });		
		
		/*=====  End of Enviar valores  ======*/
		

	}

});


/*=====  End of Guardar Proyecto Separado  ======*/


/*============================================================
=            Registrar formulario datos generales            =
============================================================*/

$('#enviarDatosGenerales').click(function (e){

	$(this).hide();

	validador= validacionRegistro($(".obligatorios__datosGenerales"));
	validacionRegistroMostrarErrores($(".obligatorios__datosGenerales"));

	if (validador==false) {

		alertify.set("notifier","position", "top-right");
	    alertify.notify("Campos obligatorios", "error", 5, function(){});	

	    $(this).show();


	}else{


		$.ajax({

		    type:"POST",
		    url:"modelosBd/inserta/insertaDatosGeneralesProyecto.php",
		    data:$("#datosGeneralesFormularios").serialize(),
		    processData: false,
		    cache: false, 
	    	success:function(response){

	    	   var elementos=JSON.parse(response);
	           var mensaje=elementos['mensaje'];

	           if (mensaje==1) {

	           		alertify.set("notifier","position", "top-right");
		            alertify.notify("Datos ingresados correctamente", "success", 5, function(){});

		            $('.enviarDatosGenerales__reload').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

	                window.setTimeout(function(){ 
	                   location.reload();
	                } ,4000); 

	           }

			},
			error:function(){

				alertify.set("notifier","position", "top-right");
				alertify.notify("Datos no ingresados error de conexión", "error", 2, function(){});
				location.reload();

			}
		
		});

	}

});

/*=====  End of Registrar formulario datos generales  ======*/


/*=============================================
=            Registro Patrocinador            =
=============================================*/


	$('#registroPatrocinador').on('click', function (e){

		var validador="";
		var validador2="";
		var validadorDocumentos="";

		var paqueteDeDatos = new FormData();
	
		if ($(".entidadPatrocinador").val()=="organismo") {

			validador= validacionRegistro($(".obligatorio__organismo__patrocinador"));
			validacionRegistroMostrarErrores($(".obligatorio__organismo__patrocinador"));

		}else if($(".entidadPatrocinador").val()=="ciudadano"){

			validador= validacionRegistro($(".obligatorio__usuario__patrocinador"));
			validacionRegistroMostrarErrores($(".obligatorio__usuario__patrocinador"));

		}

		var terminosCondicionesChecked = $(".terminosCondicionesChecked").is(":checked");

		if (!terminosCondicionesChecked) {

		   alertify.set("notifier","position", "top-right");
	       alertify.notify("Es necesario aceptar los terminos y condiciones", "error", 5, function(){});	

		}else if (validador==false) {

			  alertify.set("notifier","position", "top-right");
	          alertify.notify("Datos obligatorios", "error", 5, function(){});	

		}else{

			$("#registroPatrocinador").hide();

			$(".git__registro").html('<img src="images/reloadGit.webp" style="height:35px; margin-left: .5em; border-radius: .5em; cursor: pointer;">');

			if($(".entidadPatrocinador").val()=="organismo"){


				/*====================================
				=            Llamar datos            =
				====================================*/

				 paqueteDeDatos.append('entidad', $('.entidadPatrocinador').prop('value'));
				
				 paqueteDeDatos.append('rucOrganismo', $('#rucOrganismoPatrocinador').prop('value'));

				 paqueteDeDatos.append('nombreOrganismo', $('#nombreOrganismoPatrocinador').prop('value'));

				 paqueteDeDatos.append('telefono2', $('#telefono2PatrocinadorOrganismo').prop('value'));

				 paqueteDeDatos.append('telefonoRepresentanteUsuario', $('#telefonoRepresentanteUsuarioPatrocinadorOrganismo').prop('value'));

				 paqueteDeDatos.append('email', $('#emailPatrocinador').prop('value'));

				 paqueteDeDatos.append('direccion', $('#direccionPatrocinador').prop('value'));

				/*=====  End of Llamar datos  ======*/
				

			}else if($(".entidadPatrocinador").val()=="ciudadano"){

				/*========================================
				=            Llamar los datos            =
				========================================*/

				paqueteDeDatos.append('entidad', $('.entidadPatrocinador').prop('value'));

				paqueteDeDatos.append('rucOrganismo', $('#cedulaUsuarioPatrocinador').prop('value'));

				paqueteDeDatos.append('nombreCompleto', $('#nombreCompletoPatrocinador').prop('value'));				

				paqueteDeDatos.append('fechaNacimiento', $('#fechaNacimientoPatrocinador').prop('value'));	

				paqueteDeDatos.append('sexo', $('#sexoPatrocinador').prop('value'));	

				paqueteDeDatos.append('provincia', $('#provinciaPatrocinador').prop('value'));	

				paqueteDeDatos.append('canton', $('#cantonPatrocinador').prop('value'));	

				paqueteDeDatos.append('parroquia', $('#parroquiaPatrocinador').prop('value'));	

				paqueteDeDatos.append('telefono2', $('#telefono2Patrocinador').prop('value'));	

				paqueteDeDatos.append('telefonoRepresentanteUsuario', $('#telefonoRepresentanteUsuarioPatrocinador').prop('value'));	

				paqueteDeDatos.append('email2', $('#email2Patrocinador').prop('value'));	

				paqueteDeDatos.append('direccion2', $('#direccion2Patrocinador').prop('value'));	

				/*=====  End of Llamar los datos  ======*/
				

			}

			var destino="modelosBd/inserta/usuarioPatrocinador.md.php";

			$.ajax({

				type:"POST",
	            url: destino,
	            type: 'POST',
	            contentType: false,
	            data: paqueteDeDatos, 
	            processData: false,
	            cache: false, 

				success:function(response){


					var elementos=JSON.parse(response);
	                var mensaje=elementos['mensaje'];

					if(mensaje==1){

						alertify.set("notifier","position", "top-right");
	                    alertify.notify("Datos ingresados correctamente", "success", 2, function(){});

	                    $('#modalRegistro').modal('show');

	                    $(".git__registro").html('');

	                    $("#registroPatrocinador").attr('data-toggle','modal');

	                    $("#registroPatrocinador").attr('data-target','#modalRegistro');

					}else if(mensaje==2){

						alertify.set("notifier","position", "top-right");
	                    alertify.notify("Ruc o cédula ya fueron ingresados previamente, favor verificar", "error", 4, function(){});

	                    $('#modalRegistro').modal('show');

	                    $(".git__registro").html('');

					}else{

						$("#registroPatrocinador").show();
						
	                    $("#registroPatrocinador").attr('data-toggle','modal');

	                    $("#registroPatrocinador").attr('data-target','#modalRegistro');


					}


				}

			});


		}

	});	


/*=====  End of Registro Patrocinador  ======*/


	/*===========================================
	=            Registro de Usuario            =
	===========================================*/

	$('#registro').on('click', function (e){

		var validador="";
		var validador2="";
		var validadorDocumentos="";

		var paqueteDeDatos = new FormData();
	
		if ($("#entidad").val()=="organismo") {

			validador= validacionRegistro($(".obligatorio__organismo"));
			validacionRegistroMostrarErrores($(".obligatorio__organismo"));

		}else if($("#entidad").val()=="ciudadano"){

			validador= validacionRegistro($(".obligatorio__usuario"));
			validacionRegistroMostrarErrores($(".obligatorio__usuario"));

		}

		var checkedsDiscapacidades= validacionRecorrerChekeds($("#seleccionDiscapacidad"));

		var terminosCondicionesChecked = $(".terminosCondicionesChecked").is(":checked");

		if (!terminosCondicionesChecked) {

		   alertify.set("notifier","position", "top-right");
	       alertify.notify("Es necesario aceptar los terminos y condiciones", "error", 5, function(){});	

		}else if (validador==false) {

			  alertify.set("notifier","position", "top-right");
	          alertify.notify("Datos obligatorios", "error", 5, function(){});	

		}else{

			$("#registro").hide();

			$(".git__registro").html('<img src="images/reloadGit.webp" style="height:35px; margin-left: .5em; border-radius: .5em; cursor: pointer;">');

			var opcionDetallada = $("#entidad option:selected").attr("tipoDos");


			if (opcionDetallada=="Deportista Federado") {

				paqueteDeDatos.append('fechaFederadoSolicitante', $('#fechaFederadoSolicitante').prop('value'));

				paqueteDeDatos.append('organismoNombreVinculado', $('#organismoNombreVinculado').prop('value'));

			}else{

				paqueteDeDatos.append('fechaFederadoSolicitante', 'no');

			}

			paqueteDeDatos.append('opcionDetallada', opcionDetallada);

			paqueteDeDatos.append('checkedsDiscapacidades', checkedsDiscapacidades);

			if($("#entidad").val()=="organismo"){


				/*====================================
				=            Llamar datos            =
				====================================*/

				 paqueteDeDatos.append('entidad', $('#entidad').prop('value'));

				 paqueteDeDatos.append('tipoOrganismo', $('#tipoOrganismo').prop('value'));
				
				 paqueteDeDatos.append('nombreOrganismo', $('#nombreOrganismo').prop('value'));

				 paqueteDeDatos.append('provinciaFederacion', $('#provinciaFederacion').prop('value'));

				 paqueteDeDatos.append('rucOrganismo', $('#rucOrganismo').prop('value'));

				 paqueteDeDatos.append('provinciaFederacion', $('#provinciaFederacion').prop('value'));

				 paqueteDeDatos.append('cantonFederacion', $('#cantonFederacion').prop('value'));

				 paqueteDeDatos.append('parroquiaFederacion', $('#parroquiaFederacion').prop('value'));

				 paqueteDeDatos.append('telefono', $('#telefono').prop('value'));

				 paqueteDeDatos.append('direccion', $('#direccion').prop('value'));

				 paqueteDeDatos.append('email', $('#email').prop('value'));

				 paqueteDeDatos.append('callePrincipal', $('#callePrincipal').prop('value'));

				 paqueteDeDatos.append('calleSecundaria', $('#calleSecundaria').prop('value'));

				 paqueteDeDatos.append('numeracion', $('#numeracion').prop('value'));

				 paqueteDeDatos.append('referencia', $('#referencia').prop('value'));



				 paqueteDeDatos.append('representanteLegalCedula', $('#representanteLegalCedula').prop('value'));

				 paqueteDeDatos.append('representanteLegal', $('#representanteLegal').prop('value'));

				 paqueteDeDatos.append('provinciaFederacionRepresentante', $('#provinciaFederacionRepresentante').prop('value'));

 				 paqueteDeDatos.append('cantonFederacionRepresentante', $('#cantonFederacionRepresentante').prop('value'));
				
 				 paqueteDeDatos.append('parroquiaFederacionRepresentante', $('#parroquiaFederacionRepresentante').prop('value'));

 				 paqueteDeDatos.append('telefonoRepresentante', $('#telefonoRepresentante').prop('value'));

 				 paqueteDeDatos.append('calleprincipalRepresentante', $('#calleprincipalRepresentante').prop('value'));

 				 paqueteDeDatos.append('callesecundariaRepresentante', $('#callesecundariaRepresentante').prop('value'));

 				 paqueteDeDatos.append('referenciaRepresentante', $('#referenciaRepresentante').prop('value'));

 				 paqueteDeDatos.append('emailRepresentante', $('#emailRepresentante').prop('value'));

 				 paqueteDeDatos.append('numeracionRepresentante', $('#numeracionRepresentante').prop('value'));


				/*=====  End of Llamar datos  ======*/
				

			}else if($("#entidad").val()=="ciudadano"){


				/*========================================
				=            Llamar los datos            =
				========================================*/


				paqueteDeDatos.append('entidad', $('#entidad').prop('value'));

				paqueteDeDatos.append('tipoAtleta', $('#tipoAtleta').prop('value'));

				paqueteDeDatos.append('cedulaUsuario', $('#cedulaUsuario').prop('value'));

				paqueteDeDatos.append('nombreCompleto', $('#nombreCompleto').prop('value'));				
				
				paqueteDeDatos.append('fechaNacimiento', $('#fechaNacimiento').prop('value'));	

				paqueteDeDatos.append('sexo', $('#sexo').prop('value'));	

				paqueteDeDatos.append('provincia', $('#provincia').prop('value'));	

				paqueteDeDatos.append('canton', $('#canton').prop('value'));	

				paqueteDeDatos.append('parroquia', $('#parroquia').prop('value'));	

				paqueteDeDatos.append('telefono', $('#telefono2').prop('value'));	

				paqueteDeDatos.append('direccion', $('#direccion2').prop('value'));	

				paqueteDeDatos.append('email', $('#email2').prop('value'));	

				paqueteDeDatos.append('rucOrganismoDeportista', $('#rucOrganismoDeportista').prop('value'));

				paqueteDeDatos.append('nombreOrganismoDeportista', $('#nombreOrganismoDeportista').prop('value'));	

				paqueteDeDatos.append('porqueCertificado', $('#porqueCertificado').prop('value'));	

				paqueteDeDatos.append('callesecundariaRepresentante', $('#callesecundariaRepresentanteUsuario').prop('value'));	

				paqueteDeDatos.append('numeracionRepresentante', $('#numeracionRepresentanteUsuario').prop('value'));	

				paqueteDeDatos.append('referenciaRepresentante', $('#referenciaRepresentanteUsuario').prop('value'));	

				paqueteDeDatos.append('telefonoRepresentanteUsuario', $('#telefonoRepresentanteUsuario').prop('value'));

				/*=====  End of Llamar los datos  ======*/


				/*===================================================================
				=            Llamar datos cedulas representantes legales           =
				===================================================================*/

				if ($("#representanteSenal").val()=="si") {

					paqueteDeDatos.append('representanteLegalCedulaAtletas', $('#representanteLegalCedulaAtletas').prop('value'));
					paqueteDeDatos.append('representanteLegalAtletas', $('#representanteLegalAtletas').prop('value'));
					paqueteDeDatos.append('telefonoAtletaRepresentantess', $('#entidad').prop('telefonoAtletaRepresentantess'));
					paqueteDeDatos.append('telefonoRepresentanteAtletas', $('#telefonoRepresentanteAtletas').prop('value'));
					paqueteDeDatos.append('emailRepresentanteAtletas', $('#emailRepresentanteAtletas').prop('value'));
					paqueteDeDatos.append('provinciaFederacionRepresentanteAtletas', $('#provinciaFederacionRepresentanteAtletas').prop('value'));
					paqueteDeDatos.append('cantonFederacionRepresentanteAtletas', $('#cantonFederacionRepresentanteAtletas').prop('value'));
					paqueteDeDatos.append('parroquiaFederacionRepresentanteAtletas', $('#parroquiaFederacionRepresentanteAtletas').prop('value'));
					paqueteDeDatos.append('calleprincipalRepresentanteAtletas', $('#calleprincipalRepresentanteAtletas').prop('value'));
					paqueteDeDatos.append('callesecundariaRepresentanteAtletas', $('#callesecundariaRepresentanteAtletas').prop('value'));
					paqueteDeDatos.append('numeracionRepresentanteAtletas', $('#numeracionRepresentanteAtletas').prop('value'));
					paqueteDeDatos.append('referenciaRepresentanteAtletas', $('#referenciaRepresentanteAtletas').prop('value'));
					paqueteDeDatos.append('representanteSenal', $('#representanteSenal').prop('value'));

				}else{

					paqueteDeDatos.append('representanteSenal', $('#representanteSenal').prop('value'));

				}
				
				
				/*=====  End of Llamar datos cedulas representantes legales  ======*/
				
				

			}

			var destino="modelosBd/inserta/usuario.md.php";

			$.ajax({

				type:"POST",
	            url: destino,
	            type: 'POST',
	            contentType: false,
	            data: paqueteDeDatos, 
	            processData: false,
	            cache: false, 

				success:function(response){

					var elementos=JSON.parse(response);
	                var mensaje=elementos['mensaje'];

					if(mensaje==1){

						alertify.set("notifier","position", "top-right");
	                    alertify.notify("Datos ingresados correctamente", "success", 2, function(){});

	                    $('#modalRegistro').modal('show');

	                    $(".git__registro").html('');

	                    $("#registro").attr('data-toggle','modal');

	                    $("#registro").attr('data-target','#modalRegistro');

					}else if(mensaje==2){

						alertify.set("notifier","position", "top-right");
	                    alertify.notify("Ruc o cédula ya fueron ingresados previamente, favor verificar", "error", 4, function(){});

	                    $("#registro").show();

	                    $(".git__registro").html('');

					}else{

						$("#registro").show();
						
	                    $("#registro").attr('data-toggle','modal');

	                    $("#registro").attr('data-target','#modalRegistro');


					}


				}

			});


		}

	});	

	/*=====  End of Registro de Usuario  ======*/
	
	/*==========================================
	=            Generar Contraseña            =
	==========================================*/
	
	$('#generarContrasena').on('click', function (e){

		var paqueteDeDatos = new FormData();

		$("#generarContrasena").hide();

		if ($("#passwordGenerados").val()=="") {

			alertify.set("notifier","position", "top-right");
	        alertify.notify("Contraseña es obligatoria", "error", 4, function(){});	

	        $("#generarContrasena").show();

		}else if($(".counterContrasena").text()!=""){

			alertify.set("notifier","position", "top-right");
	        alertify.notify("La contraseña no cumple los parametros establecidos", "error", 4, function(){});	

	        $("#generarContrasena").show();

		}else{

			paqueteDeDatos.append('contrasenasGeneradas', $('#contrasenasGeneradas').prop('value'));

			paqueteDeDatos.append('passwordGenerados', $('#passwordGenerados').prop('value'));

			var destino="modelosBd/validaciones/actualizaContrasena.modelo.php";

			$.ajax({

				type:"POST",
		        url: destino,
		        type: 'POST',
		        contentType: false,
		        data: paqueteDeDatos, 
		        processData: false,
		        cache: false, 

				success:function(response){

					var elementos=JSON.parse(response);
	                var mensaje=elementos['mensaje'];

					if(mensaje==1){

						alertify.set("notifier","position", "top-right");
	                    alertify.notify("Contraseña Actualizada", "success", 3, function(){});

	                    window.setTimeout(function(){ 
                                window.location = "ingreso";
                        } ,3000);    

					}


				}

			});	

		}


    });
	
	/*=====  End of Generar Contraseña  ======*/
	
	/*===================================================
	=            Registrar documentos Anexos            =
	===================================================*/

	$('#enviarDocumentosAnexos').on('click', function (e){


	$('#enviarDocumentosAnexos').hide();

	var paqueteDeDatos = new FormData();

	var validador1= archivos($("#curriculumDeportivoSegundo"));
	validacionMostrarErroresDocumentosPdf($("#curriculumDeportivoSegundo"));

	var validador2= archivos($("#certificacionTrayectoria"));
	validacionMostrarErroresDocumentosPdf($("#certificacionTrayectoria"));

	var validador3= archivos($("#acreditarVidaJuridica"));
	validacionMostrarErroresDocumentosPdf($("#acreditarVidaJuridica"));

	var validador4= archivos($("#certificadoPropiedad"));
	validacionMostrarErroresDocumentosPdf($("#certificadoPropiedad"));

	var validador5= archivos($("#memoriaTecnicaArquitectonica"));
	validacionMostrarErroresDocumentosPdf($("#memoriaTecnicaArquitectonica"));

	var validador6= archivos($("#planosArquitecntonicos"));
	validacionMostrarErroresDocumentosPdf($("#planosArquitecntonicos"));

	var validador7= archivos($("#presupuestoRubro"));
	validacionMostrarErroresDocumentosPdf($("#presupuestoRubro"));

	var validador8= archivos($("#cronogramaValorado"));
	validacionMostrarErroresDocumentosPdf($("#cronogramaValorado"));

	var validador9= archivos($("#respaldosNuevosDigitales"));
	validacionMostrarErroresDocumentosPdf($("#respaldosNuevosDigitales"));


	 if(validador1==false || validador2==false || validador3==false || validador4==false || validador5==false || validador6==false || validador7==false || validador8==false || validador9==false){

		alertify.set("notifier","position", "top-right");
	    alertify.notify("Es obligatorio cargar todos los documentos requeridos", "error", 5, function(){});	

	   $('#enviarDocumentosAnexos').show();	

	}else{

		$('.imagen__reload').html('<img src="images/reloadGit.webp" style="width:50px; height:50px;">');


		paqueteDeDatos.append('idUsuario', $('#idUsuario').prop('value'));
		paqueteDeDatos.append('codigoUsuarios', $('#codigoProyecto').prop('value'));


		if (validador1==true) {

			paqueteDeDatos.append('curriculumDeportivoSegundo', $('#curriculumDeportivoSegundo')[0].files[0]);

			paqueteDeDatos.append('curriculumDeportivoSegundoDetalles','si');

		}else{

			paqueteDeDatos.append('curriculumDeportivoSegundoDetalles','no');

		}

		if (validador2==true) {

			paqueteDeDatos.append('certificacionTrayectoria', $('#certificacionTrayectoria')[0].files[0]);

			paqueteDeDatos.append('certificacionTrayectoriaDetalles','si');

		}else{

			paqueteDeDatos.append('certificacionTrayectoriaDetalles','no');

		}

		if (validador3==true) {

			paqueteDeDatos.append('acreditarVidaJuridica', $('#acreditarVidaJuridica')[0].files[0]);

			paqueteDeDatos.append('acreditarVidaJuridicaDetalles','si');

		}else{

			paqueteDeDatos.append('acreditarVidaJuridicaDetalles','no');

		}




		if (validador4==true) {

			paqueteDeDatos.append('certificadoPropiedad', $('#certificadoPropiedad')[0].files[0]);

			paqueteDeDatos.append('certificadoPropiedadDetalles','si');

		}else{

			paqueteDeDatos.append('certificadoPropiedadDetalles','no');

		}


		if (validador5==true) {

			paqueteDeDatos.append('memoriaTecnicaArquitectonica', $('#memoriaTecnicaArquitectonica')[0].files[0]);

			paqueteDeDatos.append('memoriaTecnicaArquitectonicaDetalles','si');

		}else{

			paqueteDeDatos.append('memoriaTecnicaArquitectonicaDetalles','no');

		}


		if (validador6==true) {

			paqueteDeDatos.append('planosArquitecntonicos', $('#planosArquitecntonicos')[0].files[0]);

			paqueteDeDatos.append('planosArquitecntonicosDetalles','si');

		}else{

			paqueteDeDatos.append('planosArquitecntonicosDetalles','no');

		}



		if (validador7==true) {

			paqueteDeDatos.append('presupuestoRubro', $('#presupuestoRubro')[0].files[0]);

			paqueteDeDatos.append('presupuestoRubroDetalles','si');

		}else{

			paqueteDeDatos.append('presupuestoRubroDetalles','no');

		}


		if (validador8==true) {

			paqueteDeDatos.append('cronogramaValorado', $('#cronogramaValorado')[0].files[0]);

			paqueteDeDatos.append('cronogramaValoradoDetalles','si');

		}else{

			paqueteDeDatos.append('cronogramaValoradoDetalles','no');

		}

		if (validador9==true) {

			paqueteDeDatos.append('respaldosNuevosDigitales', $('#respaldosNuevosDigitales')[0].files[0]);

			paqueteDeDatos.append('respaldosNuevosDigitalesDetalles','si');

		}else{

			paqueteDeDatos.append('respaldosNuevosDigitalesDetalles','no');

		}



		var destino = "modelosBd/inserta/insertaAnexos.md.php"; 

	    $.ajax({

	       url: destino,
	       type: 'POST',
	       contentType: false,
	       data: paqueteDeDatos, 
	       processData: false,
	       cache: false, 

	       success: function(response){

	           var elementos=JSON.parse(response);
	           var mensaje=elementos['mensaje'];

				if(mensaje==1){

					alertify.set("notifier","position", "top-right");
		            alertify.notify("Datos ingresados correctamente", "success", 5, function(){});

	                window.setTimeout(function(){ 
	                   location.reload();
	                } ,4000); 

	                $('.enviarDatosGenerales__reload').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

			   }


			   if (mensaje==2) {

					alertify.set("notifier","position", "top-right");
		            alertify.notify("Solo se aceptan documentos pdf", "error", 5, function(){});

		            $("#enviarDocumentosAnexos").show();

		            $('.enviarDatosGenerales__reload').html('');

			   }

			   if (mensaje==3) {

					alertify.set("notifier","position", "top-right");
		            alertify.notify("Ya existe otro proyecto con el mismo nombre para este usuario", "error", 5, function(){});

		            $("#enviarDocumentosAnexos").show();

		            $('.enviarDatosGenerales__reload').html('');

			   }


	        },

	       error: function (){ 
	          
	       }

	    });


	}


	});		
	
	
	/*=====  End of Registrar documentos Anexos  ======*/
	
	/*==================================================
	=            Enviar Proyecto definitivo            =
	==================================================*/
	
	$('#enviarProyectoTotal').on('click', function (e){

		 e.preventDefault();

		 $("#enviarProyectoTotal").hide();

		 $('.enviarDatosGenerales__reload__enviado__proyecto').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');


	     var confirm= alertify.confirm('','¿Está seguro de enviar su proyecto?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

	     confirm.set({transition:'slide'});     

	     confirm.set('onok', function(){      

			/*============================
			=            Ajax            =
			============================*/

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('codigoProyectoDefinitivos', $('#codigoProyectoDefinitivos').prop('value'));
			paqueteDeDatos.append('cedulaRucDefinitivos', $('#cedulaRucDefinitivos').prop('value'));
			paqueteDeDatos.append('idRolDefinitivos', $('#idRolDefinitivos').prop('value'));
			paqueteDeDatos.append('emailNuevo', $('#emailNuevo').prop('value'));
			
			var destino = "modelosBd/inserta/insertaProyectoDefinitivos.md.php"; 

		    $.ajax({

		       url: destino,
		       type: 'POST',
		       contentType: false,
		       data: paqueteDeDatos, 
		       processData: false,
		       cache: false, 

		       success: function(response){

 				var elementos=JSON.parse(response);
	           	var mensaje=elementos['mensaje'];

					if(mensaje==1){

						alertify.set("notifier","position", "top-center");

						alertify.alert().setting({
							'title':'Ministerio del Deporte',
						    'label':'Continuar',
						    'message': 'Se acaba de enviar un correo de confirmación' ,
						    'onok': function(){window.setTimeout(function(){window.location = "proyectosUsuarios";} ,3000); }
						}).show();
	                    
				   	}

		        },

		       error: function (){ 
		          
		       }

		    });		

			/*=====  End of Ajax  ======*/

	     });

	     confirm.set('oncancel', function(){ //callbak al pulsar botón negativo

	       alertify.set("notifier","position", "top-center");
	       alertify.notify("Canceló el envío del proyecto", "success", 5, function(){});  
		   $("#enviarProyectoTotal").show();
		   $('.enviarDatosGenerales__reload__enviado__proyecto').html(' ');

	     });  


	});	
	
	/*=====  End of Enviar Proyecto definitivo  ======*/
	


});


