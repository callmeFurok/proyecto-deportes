$(document).ready(function () {


/*============================================
=            Eliminar los errores            =
============================================*/

$('.text__errores').on('input', function (e){

	$(this).removeClass('error');

});

/*=====  End of Eliminar los errores  ======*/

/*====================================
=            Solo números            =
====================================*/

 $(".solo__numero").on('input', function () {

     this.value = this.value.replace(/[^0-9]/g, '');

 });


 $(".solo__numero__montos").on('input', function () {

     this.value = this.value.replace(/[^0-9,.]/g, '').replace(',','.');

 });


 $(".no__especiales").on('input', function () {

     this.value = this.value.replace(/^[^A-Za-z]+$/g, '');

 });

/*=====  End of Solo números  ======*/


 $("#selectorUsuariosDelegados").select2({});


/*=====================================================
=            Selector comites conformantes            =
=====================================================*/

var selectorComitesConformantes=function(parametro1){

	$(parametro1).click(function(e){

	  var paqueteDeDatos = new FormData();

	  var destino="modelosBd/validaciones/selectorComiteConformanteDos.md.php";

      $.ajax({

        type:"POST",
            url: destino,
            type: 'POST',
            data: paqueteDeDatos,
            contentType: false,
            processData: false,
            cache: false, 

            success:function(response){

              var elementos=JSON.parse(response);

              var idUsuarioSAlto=elementos['idUsuarioSAlto'];
              var nombreCompletoSAlto=elementos['nombreCompletoSAlto'];
              var emailSAlto=elementos['emailSAlto'];
              var cedulaSAlto=elementos['cedulaSAlto'];
              var nombreRolSAlto=elementos['nombreRolSAlto'];
              var rolAlto=elementos['rolAlto'];

              var idUsuarioActividadFisica=elementos['idUsuarioActividadFisica'];
              var nombreCompletoActividadFisica=elementos['nombreCompletoActividadFisica'];
              var emailActividadFisica=elementos['emailActividadFisica'];
              var cedulaActividadFisica=elementos['cedulaActividadFisica'];
              var nombreRolActividadFisica=elementos['nombreRolActividadFisica'];    
              var rolFisico=elementos['rolFisico'];            

              var idUsuarioCoordinador=elementos['idUsuarioCoordinador'];
              var nombreCompletoCoordinador=elementos['nombreCompletoCoordinador'];
              var emailCoordinador=elementos['emailCoordinador'];
              var cedulaCoordinador=elementos['cedulaCoordinador'];
              var nombreRolCoordinador=elementos['nombreRolCoordinador'];
              var rolCoordinador=elementos['rolCoordinador'];

              var idUsuarioMinistro=elementos['idUsuarioMinistro'];
              var nombreCompletoMinistro=elementos['nombreCompletoMinistro'];
              var emailMinistro=elementos['emailMinistro'];
              var cedulaMinistro=elementos['cedulaMinistro'];
              var nombreRolMinistro=elementos['nombreRolMinistro'];
              var rolMinistro=elementos['rolMinistro'];

              var idUsuarioPlanificacion=elementos['idUsuarioPlanificacion'];
              var nombreCompletoPlanificacion=elementos['nombreCompletoPlanificacion'];
              var emailPlanificacion=elementos['emailPlanificacion'];
              var cedulaPlanificacion=elementos['cedulaPlanificacion'];
              var nombreRolPlanificacion=elementos['nombreRolPlanificacion'];
              var rolPlanificacion=elementos['rolPlanificacion'];

              var idUsuarioJuridico=elementos['idUsuarioJuridico'];
              var nombreCompletoJuridico=elementos['nombreCompletoJuridico'];
              var emailJuridico=elementos['emailJuridico'];
              var cedulaJuridico=elementos['cedulaJuridico'];
              var nombreRolJuridico=elementos['nombreRolJuridico'];
              var rolJuridico=elementos['rolJuridico'];

              

              $("#idMinistro").val(idUsuarioMinistro);
              $("#nombreMinistro").val(nombreCompletoMinistro);
              $("#emailMinistro").val(emailMinistro);
              $("#cedulaMinistro").val(cedulaMinistro);
              $("#cargoMinistro").val(nombreRolMinistro);

              $("#idSusesAlto").val(idUsuarioSAlto);
              $("#nombreSusesAlto").val(nombreCompletoSAlto);
              $("#emailSusesAlto").val(emailSAlto);
              $("#cedulaSusesAlto").val(cedulaSAlto);
              $("#cargoSusesAlto").val(nombreRolSAlto);

              $("#idSusesActividad").val(idUsuarioActividadFisica);
              $("#nombreSusesActividad").val(nombreCompletoActividadFisica);
              $("#emailSusesActividad").val(emailActividadFisica);
              $("#cedulaSusesActividad").val(cedulaActividadFisica);
              $("#cargoSusesActividad").val(nombreRolActividadFisica);

              $("#idSusesCoordinador").val(idUsuarioCoordinador);
              $("#nombreSusesCoordinador").val(nombreCompletoCoordinador);
              $("#emailSusesCoordinador").val(emailCoordinador);
              $("#cedulaSusesCoordinador").val(cedulaCoordinador);
              $("#cargoSusesCoordinador").val(nombreRolCoordinador);

              $("#idSusesPlanificacion").val(idUsuarioPlanificacion);
              $("#nombreSusesPlanificacion").val(nombreCompletoPlanificacion);
              $("#emailSusesPlanificacion").val(emailPlanificacion);
              $("#cedulaSusesPlanificacion").val(cedulaPlanificacion);
              $("#cargoSusesPlanificacion").val(nombreRolPlanificacion);

              $("#idSusesJuridico").val(idUsuarioJuridico);
              $("#nombreSusesJuridico").val(nombreCompletoJuridico);
              $("#emailSusesJuridico").val(emailJuridico);
              $("#cedulaSusesJuridico").val(cedulaJuridico);
              $("#cargoSusesJuridico").val(nombreRolJuridico);



              $(".rol__alto").text(nombreRolSAlto);
              $(".subsecretario__deporte__alto__rendimiento").text(nombreCompletoSAlto);

              $(".rol__desarrollo").text(nombreRolActividadFisica);
              $(".subsecretario__desarrollo__actividad__fisica").text(nombreCompletoActividadFisica);

              $(".rol__coordinador").text(nombreRolCoordinador);
              $(".coordinador__administracion").text(nombreCompletoCoordinador);

              $(".rol__planificacion").text(nombreRolPlanificacion);
              $(".planificacion__nombre").text(nombreCompletoPlanificacion);

              $(".rol__juridico").text(nombreRolJuridico);
              $(".juridico__nombre").text(nombreCompletoJuridico);


              $('#seleccionSecretarioDelegado').change(function (e){

                $(this).hide();

                if ($(this).val()=="0") {

                  alertify.set("notifier","position", "top-right");
                  alertify.notify("Comentario Enviado", "error", 5, function(){});

                }else if($(this).val()=="1"){

                  $(".contenido__nombre").text(nombreCompletoMinistro);
                  $(".nombre__ministro").text(nombreRolMinistro);

                  $(".regresar__escoger").show();

                }else if($(this).val()=="2"){

                  $(".contenedor__usuarios__select").show();

                  $(".regresar__escoger").show();

                  $(".nombre__ministro").text("DELEGADO");

                }

              });


              $('#regresarSeleccion').click(function (e){

                e.preventDefault();

                $(".contenido__nombre").text(" ");
                $(".nombre__ministro").text("Seleccionar Ministro de deporte o delegado");

                $("#seleccionSecretarioDelegado").show();

                $("#seleccionSecretarioDelegado").val("0");

                $("#selectorUsuariosDelegados").val("0");

                $(".contenedor__usuarios__select").hide();

                $(".regresar__escoger").hide();

              });


            }

      });      		

	});

}

selectorComitesConformantes($("#calificarProyectos"));

/*=====  End of Selector comites conformantes  ======*/


/*==============================================
=            Files correspondientes          =
==============================================*/

var documentosArchivosSubirAsistencias=function(parametro1,parametro2,parametro3){

	$(parametro1).change(function(e){

	$(this).hide();

	$('.reload__asistencias').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

   	var paqueteDeDatos = new FormData();

   	paqueteDeDatos.append('fisicamenteEstructura', $('#fisicamenteEstructura').prop('value'));
   	paqueteDeDatos.append('rolFuncionarios', $('#rolFuncionarios').prop('value'));

   	paqueteDeDatos.append('documento', $('#firmarAsistencia')[0].files[0]);

	paqueteDeDatos.append('idUsuario', parametro2);

	paqueteDeDatos.append('codigo', $(parametro3).prop('value'));

	var destino = "modelosBd/actualiza/actualizaFirmasDireccion.md.php"; 

	$.ajax({

		url: destino,
		type: 'POST',
		contentType: false,
		data: paqueteDeDatos, 
		processData: false,
		cache: false, 

		success: function(response){

			window.setTimeout(function(){ 

				alertify.set("notifier","position", "top-right");
				alertify.notify("Documento cargado satisfactoriamente", "success", 4, function(){});	

				$('.reload__asistencias').html('');

				$(parametro1).show();

				$(parametro1).val('');

		    } ,4000);   

		},

		error: function (){ 
		    
		}

	});				

	});

}

documentosArchivosSubirAsistencias($("#firmarAsistencia"),$("#idUsuario").val(),$("#codigoProyectos"));


/*=====  End of Files correspondientes  ======*/

/*=======================================
=            Entidad selects            =
=======================================*/

var validarEntidadSelects=function(parametro1,parametro2){

	$(parametro1).val($(parametro2).val());

}

validarEntidadSelects($("#entidadPerteneceCiudadanos"),$("#valorEntidad"));

/*=====  End of Entidad selects  ======*/

/*===========================================
=            Reinicio de páginas            =
===========================================*/


var validarReiniciosDePaginas=function(parametro1){

	$(parametro1).click(function(e){

		location.reload();

	});

}

validarReiniciosDePaginas($(".reload__location__inicios"));

validarReiniciosDePaginas($(".close__funcionarios"));

/*=====  End of Reinicio de páginas  ======*/


/*========================================================
=            Enviando los totales resultantes            =
========================================================*/

var validarTotalesResultantes=function(parametro1,parametro2){

	$(parametro1).val($(parametro2).val());

}

validarTotalesResultantes($("#entidadEditables"),$("#deportistaSeleccionables"));
validarTotalesResultantes($("#entidadEditablesFederaciones"),$("#validacionFederaciones"));

/*=====  End of Enviando los totales resultantes  ======*/


/*=====================================
=            Mostrar Modal            =
=====================================*/

var validarMostrarModales=function(parametro1,parametro2){

	$(parametro1).click(function(e){

		$(this).hide();

		$('.enviarDatosGenerales__reload').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');


		alertify.set("notifier","position", "top-right");
		alertify.notify("Se generó la documentación con la nueva información", "success", 4, function(){});	

		window.setTimeout(function(){ 

			location.reload();

	    } ,4000);  


	});

}

validarMostrarModales($("#generarVisualizarPdf"),$("#modalAccesoProyecto"));

var validarMostrarModalesUnicos=function(parametro1){

	$(parametro1).click(function(e){

		$(this).hide();

		$('.enviarDatosGenerales__reload').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

		alertify.set("notifier","position", "top-right");
		alertify.notify("Se generó el nuevo proyecto con la información proporcionada", "success", 4, function(){});	

		window.setTimeout(function(){ 

			$('.enviarDatosGenerales__reload').html('');

			$(parametro1).show();

			$(".reload__ocultos").hide();

			$(".elementos__centrados__para__envios").show();

			location.reload();

	    } ,4000); 

	});

}

validarMostrarModalesUnicos($("#generarVisualizarPdfUnicos"));


/*=====  End of Mostrar Modal  ======*/

/*=============================
=            Modal            =
=============================*/
var MostrarModal=function(parametro1){

	$(parametro1).modal('show');

}

MostrarModal($("#videoModal"));

/*=====  End of Modal  ======*/


/*=====================================================
=            Modales con videos defnididos            =
=====================================================*/

var validarMostrarModalesVideosDefinidos=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6){

	$(parametro1).click(function(e){

		$(parametro2).attr('src',parametro5);

        $(parametro3).text(parametro6);

        $(parametro4).modal('show');

	});

}

validarMostrarModalesVideosDefinidos($("#registroBoton"),$("#video"),$(".titulo__modal"),$("#videoModal"),'https://www.youtube.com/embed/CK0nPlaSvUI?feature=player_detailpage&amp;autoplay=1','VIDEO DE COMO REGISTRARSE');

/*=====  End of Modales con videos defnididos  ======*/



/*=========================================
=            valida caracteres            =
=========================================*/

var validarCaracteres=function(parametro1,parametro2,parametro3,parametro4){

	$(parametro1).keyup(function(e){


	 if (parametro2.test($(this).val().trim())){

	    	$(parametro3).html("");


	  }else {

	  		switch (parametro4) {

	  			case 0:
	  				$(parametro3).html("Por favor registre una dirección de correo electrónico válida a través de la cual el Ministerio del Deporte le remitirá información importante del proceso");
	  			break;

	  			case 1:
	  				$(parametro3).html("El usuario debe comenzar con letras y no debe tener caracteres especiales, debe tener un mínimo de 4 caracteres y máximo de 16 caracteres (Solo se acepta @,punto,- y _)");
	  			break;

	  			case 2:
	  				$(parametro3).html("La contraseña debe contener al menos 5 caracteres y un máximo de 15, una letra mayúscula, una letra minucula, un dígito, no caracteres especiales y espacios en blanco");
	  			break;

	  			case 3:
	  				$(parametro3).html("La contraseña debe comenzar con letras y no puede tener caracteres especiales y debe tener un mínimo de 5 caracteres y máximo de 16");
	  			break;

	  		}

	    	

	        $(parametro3).css("color","red");

	        $(parametro3).css("font-size","10px");

	  }


	 });

}

validarCaracteres($(".email__validar"),/[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/,$(".counterCorreo"),0);

validarCaracteres($(".validar__usuario"),/^[a-zA-Z0-9\.\@\-\_\.]{4,16}$/,$(".counterUsuario"),1);

validarCaracteres($(".contrasena__uno"),/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{5,15}$/,$(".counterContrasena"),2);

validarCaracteres($(".contrasena__dos"),/^[a-zA-Z0-9]{5,16}/,$(".counterContrasenaConfirmar"),3);

validarCaracteres($(".correoRepre"),/[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/,$(".correoRepreValida"),0);

validarCaracteres($(".correo__ciudadano"),/[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/,$(".correoCiudadanoValida"),0);

/*=====  End of valida caracteres  ======*/


/*==================================================
=            Validar igualdad de campos            =
==================================================*/

var passwordConfimacion=function(parametro1,parametro2,parametro3){

$(parametro2).keyup(function(e){

	var arreglo=new Array();

	var variable1="";
	var variable2="";

	$(parametro1).each(function(index) {
		variable1=$(this).val();
	});

	$(parametro2).each(function(index) {
		variable2=$(this).val();
	});

	if(variable1!=variable2){

		$(parametro3).html("Las dos contraseñas no coinciden");

		$(parametro3).css("color","blue");

		$(parametro3).css("font-size","10px");

	}else{

		$(".counterIgualdad").html("");

	}

  });

}

passwordConfimacion($(".password__secuenciales__0"),$(".password__secuencialesSegundo__0"),$(".counterIgualdad"));
passwordConfimacion($(".password__secuenciales__1"),$(".password__secuencialesSegundo__1"),$(".counterIgualdad"));

/*=====  End of Validar igualdad de campos  ======*/

/*===============================================
=            Sumador de presupuestos            =
===============================================*/

var sumadorPresupuestados=0;

var sumadorPresupuestos=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6){

 $(parametro1).keyup(function(e){

	  if ($(parametro3).val()=="") {
	 	$(parametro3).val(0);
	  }

	  if ($(parametro4).val()=="") {
	 	$(parametro4).val(0);
	  }


	  if ($(parametro5).val()=="") {
	 	$(parametro5).val(0);
	  }

	  if ($(parametro6).val()=="") {
	 	$(parametro6).val(0);
	  }

	sumadorPresupuestados=parseFloat($(parametro3).val()) + parseFloat($(parametro4).val()) + parseFloat($(parametro5).val()) + parseFloat($(parametro6).val());

	$(parametro2).val(sumadorPresupuestados.toFixed(2));

  });

  if ($(parametro3).val()=="") {
 	$(parametro3).val(0);
  }

  if ($(parametro4).val()=="") {
 	$(parametro4).val(0);
  }


  if ($(parametro5).val()=="") {
 	$(parametro5).val(0);
  }

  if ($(parametro6).val()=="") {
 	$(parametro6).val(0);
  }

  $(parametro1).each(function(index) {
	sumadorPresupuestados=parseFloat($(parametro3).val()) + parseFloat($(parametro4).val()) + parseFloat($(parametro5).val()) + parseFloat($(parametro6).val());
  });

  $(parametro2).val(sumadorPresupuestados.toFixed(2));


 $(parametro1).click(function(e){

 	if ($(this).val()=="0") {

 		$(this).val(" ");

 	}

  });

 $(parametro1).blur(function(e){

 	if ($(this).val()==" " || $(this).val()=="") {

 		$(this).val("0");

 	}

  });



}

sumadorPresupuestos($(".sumador__presupuestos"),$("#presupuestoTotal"),$("#presupuestoCuatro"),$("#presupuestoTres"),$("#presupuestoDos"),$("#presupuesto"));

/*=====  End of Sumador de presupuestos  ======*/


/*=============================================
=            Longitud de elementos            =
=============================================*/

var longitudCaracteres=function(parametro1,parametro2,counter){

$(parametro1).keyup(function(e){

   if($(this).val().length > parametro2){

        $(this).val($(this).val().substr(0, parametro2));

        counter.html("Son máximo <strong>"+parametro2+"caracteres</strong>");

        counter.css("color","red");

    }else{

      // counter.html("<strong>"+$(this).val().length +"</strong>");

      counter.css("color","black");

      counter.css("font-size","10px");

    }


 });

}

longitudCaracteres($(".cedula__longitud"),10,$(".counterCedula"));

longitudCaracteres($(".cedula__longitud"),10,$(".counterCedulaRepresentanteLegal"));

longitudCaracteres($(".ruc__longitud"),13,$(".counterRuc"));

longitudCaracteres($("#numeroRucPatrocinador"),13,$(".counterRuc"));

longitudCaracteres($(".ruc__longitud__deportistas"),13,$(".counter__ruc__deportistas"));

longitudCaracteres($(".cedula__longitud"),15,$(".counterTelfonos"));

// longitudCaracteres($("#nombreProyecto"),100,$(".counter__proyecto"));

longitudCaracteres($("#alcanse"),100,$(".counter__alcanse"));

longitudCaracteres($(".numeracion"),10,$(".counter__numeracion"));

longitudCaracteres($(".telefonos__usados"),10,$(".counter__numeracion"));

longitudCaracteres($("#montoContratoRealizados"),14,$(".counter__numeracion"));

longitudCaracteres($("#numeroCertificadoPropiedad"),20,$(".counter__numeracion"));

/*=====  End of Longitud de elementos  ======*/

/*=========================================
=            Minímo caracteres            =
=========================================*/
		
var longitudCaracteresMinimaConjuntos=function(parametro1,parametro2,counter){

	$(parametro1).keyup(function(e){

		var words = $(parametro1).val().split(' '); 

		if(words.length < parametro2){

			counter.html("Son mínimo <strong>"+parametro2+" palabras</strong>");

			counter.css("color","red");

		}else{

			 counter.html("");

			 counter.css("color","black");

			 counter.css("font-size","10px");

		}

	});

}

longitudCaracteresMinimaConjuntos($("#analisisSituacionActual"),150,$(".counter__analisisSituacional"));
// longitudCaracteresMinimaConjuntos($("#justificacionCaracterizacion"),100,$(".counter__justificacion"));
longitudCaracteresMinimaConjuntos($("#objetivoGeneralCaracterizacion"),20,$(".counter__objetivoGeneral"));
longitudCaracteresMinimaConjuntos($("#alineacionEstrategicaCampos"),40,$(".counter__alineacion"))		
		
/*=====  End of Minímo caracteres  ======*/


/*===============================
=            Celular            =
===============================*/

var celularValidas=function(parametro1){

	$(parametro1).click(function(){

		$(this).val('09');

	});


	$(parametro1).keyup(function(e){

	 	if($(this).val().length<=2){

	 		if(e.keyCode == 8){

	 			$(this).val('09');

	 		}

	 	}

	});

}

celularValidas($(".telefono__celular"));

/*=====  End of Celular  ======*/


/*====================================
=            Convencional            =
====================================*/

var convencionalValidas=function(parametro1){

	$(parametro1).click(function(){

		$(this).val('0');

	});


	$(parametro1).keyup(function(e){

	 	if($(this).val().length<=2){

	 		if(e.keyCode == 8){

	 			$(this).val('0');

	 		}

	 	}

	});

}

convencionalValidas($(".telefono__convencional"));

/*=====  End of Convencional  ======*/

/*======================================
=            Documentos pdf            =
======================================*/

var recuperarDocumentosPdfs=function(parametro1){

	$(parametro1).change(function(){

		$(this).hide();

		var paqueteDeDatos = new FormData();

		$(".documentoAnexos__reloads").html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

		var atributos=$(this).attr('atributos');

		paqueteDeDatos.append('codigoProyectoPdf', $('#codigoProyectoPdf').prop('value'));

		paqueteDeDatos.append('cedulaRuc', $('#cedulaRuc').prop('value'));

		paqueteDeDatos.append('documentoProyectos', $(parametro1)[0].files[0]);

		paqueteDeDatos.append('atributos', atributos);

		var destino="modelosBd/actualiza/actualizaDocumento.md.php";

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

	            if (mensaje==1) {

					alertify.set("notifier","position", "top-right");
		            alertify.notify("Documento actualizado", "success", 3, function(){});

	            	window.setTimeout(function(){ 

		                location.reload();	

					} ,3000); 


	            }

			}

		});

	});


}

recuperarDocumentosPdfs($("#documentoProyecto"));
recuperarDocumentosPdfs($("#documentoProyectoInfraestructura"));
/*=====  End of Documentos pdf  ======*/


/*==============================================
=            Recuperar credenciales            =
==============================================*/

var recuperarCredenciales=function(parametro1,parametro2,parametro3){

	$(parametro1).click(function(){

		var paqueteDeDatos = new FormData();

		paqueteDeDatos.append('codigoGenerado', $('#codigoGenerado').prop('value'));

		paqueteDeDatos.append('usuarioIngresados', $('#usuarioIngresados').prop('value'));

		var destino="modelosBd/validaciones/selectorContrasenas.modelo.php";

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
	            var idUsuario=elementos['idUsuario'];

	            if (mensaje==1) {

					alertify.set("notifier","position", "top-right");
	                alertify.notify("Usuario o código no existen", "error", 4, function(){});	

	            }else if(mensaje==2){



					alertify.set("notifier","position", "top-right");
	                alertify.notify("Datos Coinciden", "success", 4, function(){});	

	                $(parametro2).val(idUsuario);

	                $(parametro1).hide();  		

	                $(parametro3).show();  	

	            }

			}

		});

	});


}

recuperarCredenciales($("#registrarCredenciales"),$("#contrasenasGeneradas"),$(".escondido__codigo"));


/*=====  End of Recuperar credenciales  ======*/

/*======================================
=            Reenvía código            =
======================================*/

var reenviarCodigo=function(parametro1,parametro2){

	$(parametro1).click(function(){

		if($(parametro2).val()=="" || $(parametro2).val()==undefined){


			alertify.set("notifier","position", "top-right");
		    alertify.notify("Es obligatorio ingresar el usuario", "error", 4, function(){});	

		}else{

			var paqueteDeDatos = new FormData();

			paqueteDeDatos.append('usuarioIngresados', $('#usuarioIngresados').prop('value'));

			var destino="modelosBd/validaciones/selectorContrasenasReenvio.modelo.php";

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
		            var email=elementos['email'];

		            if (mensaje==1) {

						alertify.set("notifier","position", "top-right");
		                alertify.notify("Usuario no registrado", "error", 4, function(){});	

		            }else if(mensaje==2){

		            	alertify.set("notifier","position", "top-right");
		                alertify.notify("Su email registrado es "+email, "success", 4, function(){});	

						$(".oculto__informacion").show(); 	

						$(".boton__reenvios").hide();

		            }

				}

			});

		}

	});


}

reenviarCodigo($("#reenviaCodigo"),$("#usuarioIngresados"));

/*=====  End of Reenvía código  ======*/


/*==============================================
=            con los radios bootoms            =
==============================================*/

var radioInformacionVisible=function(parametro1,parametro2){

	$(parametro1).click(function(){
	
		if ($(this).val()=="si") {

			$(parametro2).show();

		}else{

			$(parametro2).hide();
		}

	});


}

radioInformacionVisible($(".carga__proyecto"),$(".proyecto__cargas"));


var radioInformacionVisible2=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6){

	$(parametro1).click(function(){

	  	switch (parametro4) {

	  		case 1:

				if ($(this).val()=="si") {

					$(parametro2).show();

					$(parametro3).hide();

					$(parametro5).attr("checked", false);

					$(parametro6).attr("checked", false);

					$(parametro5).hide();

					$(parametro6).hide();

				}else if($(this).val()=="no"){

					$(parametro2).hide();

					$(parametro3).show();

				}

	  		break;

	  		case 2:

				if ($(this).val()=="si") {

					$(parametro2).show();

					$(parametro3).hide();

				}else if($(this).val()=="no"){

					$(parametro2).hide();

					$(parametro3).show();

				}

	  		break;

	  		case 3:

				if ($(this).val()=="si") {

					$(parametro2).show();

					$(parametro3).hide();

					$(parametro5).attr("checked", false);

					$(parametro6).attr("checked", false);

					$(parametro5).hide();

					$(parametro6).hide();

				}else if($(this).val()=="no"){

					$(parametro2).hide();

					$(parametro3).show();

				}

	  		break;

	  		case 4:

				if ($(this).val()=="si") {

					$(parametro2).show();

					$(parametro3).hide();

				}else if($(this).val()=="no"){

					$(parametro2).hide();

					$(parametro3).show();

				}

	  		break;



	  	}		
	


	});


}
radioInformacionVisible2($(".carga__certificadoFederacion"),$(".certificados__ocultados"),$(".rechazo__certificado"),1,(".respuesta__organismo__si"),$(".respuesta__organismo__no"));

radioInformacionVisible2($(".porque__no__tiene"),$(".respuesta__organismo__si"),$(".respuesta__organismo__no"),2);

radioInformacionVisible2($(".carga__avales"),$(".aval__ocultados__si"),$(".aval__ocultados__no"),3,$(".respuesta__aval__organismo__si"),$(".respuesta__aval__organismo__no"));

radioInformacionVisible2($(".porque__no__tiene__aval"),$(".respuesta__aval__organismo__si"),$(".respuesta__aval__organismo__no"),4);


/*=====  End of con los radios bootoms  ======*/



/*=====================================================================
=            Activar validación al salir del campo activos            =
=====================================================================*/

$('#nombreOrganismoDeportista').on('keyup', function (e){

	if ($("#tipoAtleta").val()=="noFederado") {

		$(".documentos__no__deportistas").show();

		$(".documentos__deportistas").hide();

	}else{

		$(".documentos__deportistas").show();

		$(".documentos__no__deportistas").hide();

		if ($("#tipoAtleta").val()=="profesional") {

			$("#certificadoFederacion option[value='0']").html('--Seleccione si posee certificado de federación o liga profecional-');
		
		}else{

			$("#certificadoFederacion option[value='0']").html('--Seleccione si posee certificado de federación-');

		}

	}

});

/*=====  End of Activar validación al salir del campo activos  ======*/


/*===============================
=            Checbox            =
===============================*/

var checkboxActivasEdiciones=function(parametro1,parametro2){

	$(parametro1).click(function(){

		if ($('input:radio[name=seleccionPrevios]:checked').val()=="si") {


			$(".seccion__modificables").text("Se podrán modificar programas y/o proyectos deportivos calificados por un monto inferior o superior al inicialmente previsto, justificando de manera motivada las modificaciones planteadas, dicha modificación  no puede afectar el objeto y metas del programa y/o proyecto deportivo, por lo que deberá evidenciarse que el mismo puede cumplirse a pesar de no haber obtenido el patrocinio o la publicidad planificados; mientras que, en el segundo caso deberá evidenciarse que el incremento de componentes y/o valores son necesarios para el cumplimiento de los objetivos y metas, luego del ingreso pasará por el análsis técnico y calificación del Comité, no podrá solicitar modificación del programa y/o proyecto por un monto superior si ya se ha ejecutado el gasto.");


	      	$("#rectificarProyectoMod").removeAttr('href');

	      	$("#rectificarProyectoMod").attr('href','datosGeneralesModificacionesRectificaciones?contenido=14&variable=si');

          $(".informacion__modificables__ables").show();

		}else{

			 $(".seccion__modificables").text("Se podrán modificar los valores asignados a cada componente así como también podrá realizar modificaciones relacionadas a la programación a las fechas en las cuales se planificó la ejecución de una actividad o componente,  sin que medie una nueva aprobación por parte del Comité,  siempre que se mantenga el valor total establecido en los programas y/o proyectos deportivos ya calificados., el solicitante debe registrar la justificación correspondiente, no podrán incluirse o eliminarse componentes, dicha modificación no deberá afectar el objeto y metas del programa y/o proyecto deportivo.  En caso de detectarse incumplimiento a la normativa legal vigente, se entenderá como no presentada la modificatoria. En tal caso el Ministerio del Deporte se reserva el derecho de eliminar la calificación inicialmente emitida o adoptar acciones legales según corresponda.");

		     $("#rectificarProyectoMod").removeAttr('href');

		     $("#rectificarProyectoMod").attr('href','datosGeneralesModificacionesRectificaciones?contenido=14&variable=no');

         $(".informacion__modificables__ables").show();

		}		
	
	});


}
checkboxActivasEdiciones($(".seleccionPrevios"),$(".fila__contrato__modificaciones__ocultos"));


var checkboxFunciones=function(parametro1,parametro2,parametro3){

	$(parametro1).click(function(){
	
	    var condicion = $(this).is(":checked");

	    if (condicion) {

	      $(parametro2).hide();

	      $(parametro3).show();

	    }else{

	      $(parametro2).show();

	      $(parametro3).hide();

	   }


	});


}
checkboxFunciones($("#checkboxProyecto2020"),$(".oculto__proyecto2020"),$(".oculto__contratos"));


var checkboxFuncionesSegundasPropias=function(parametro1,parametro2){

	$(parametro1).click(function(){
	
	    var condicion = $(this).is(":checked");

	    if (condicion) {

	      $(parametro2).show();


	    }else{

	      $(parametro2).hide();

	   }


	});


}
checkboxFuncionesSegundasPropias($("#mostrarNuevas"),$(".container__escritorios"));

/*=============================================
=            Checked discpacidades            =
=============================================*/

var checkedDiscapacidades=function(parametro1){

	$(parametro1).click(function(){
	
	    var condicion = $(this).is(":checked");

	    if (condicion) {

		  $(".representantes__legales__menores").show();

		  $(".obligatorio__atletas__representantes").addClass("obligatorio__usuario");

		  $("#representanteSenal").val('si');

	    }else{

	  		$(".representantes__legales__menores").hide();

			$(".obligatorio__atletas__representantes").removeClass("obligatorio__usuario");

			$("#representanteSenal").val('no');

	   }


	});


}
checkedDiscapacidades($("#seleccionDiscapacidad"));

/*=====  End of Checked discpacidades  ======*/

/*=========================================
=            Checkeds comitess            =
=========================================*/

var checkedsComitesRatificantes=function(parametro1,parametro2){

  $(parametro1).click(function(){
  
      var condicion = $(this).is(":checked");

      if (condicion) {

        $(parametro2).val("si");

      }else{

        $(parametro2).val("no");

     }


  });


}
checkedsComitesRatificantes($("#asistenciaMinistroPrincipal"),$("#ministroLlega"));
checkedsComitesRatificantes($("#asistenciaSusesAltoPrincipal"),$("#subsesAltoLlega"));
checkedsComitesRatificantes($("#asistenciaActividadFisicaPrincipal"),$("#subsesActividadLlega"));
checkedsComitesRatificantes($("#asistenciaCoordinadorPrincipal"),$("#subsesCoordinadorL"));
checkedsComitesRatificantes($("#asistenciaPlanificacionPrincipal"),$("#planifiacionLle"));
checkedsComitesRatificantes($("#asistenciaJuridicoPrincipal"),$("#juridicoLlega"));

/*=====  End of Checkeds comitess  ======*/



var checkboxBuscadorInfraestructuras=function(parametro1,parametro2){

	$(parametro1).click(function(){
	
	    var condicion = $(this).is(":checked");

	    if (condicion) {

	     var parametrosEnviados=$(this).attr('codigos');

	     var paqueteDeDatos = new FormData();

	     paqueteDeDatos.append('parametrosEnviados',parametrosEnviados);

	     var destino = "modelosBd/actualiza/actualizaRelacionInfras.md.php"; 

		$.ajax({

			url: destino,
			type: 'POST',
			contentType: false,
			data: paqueteDeDatos, 
			processData: false,
			cache: false, 

			success: function(response){

				alertify.set("notifier","position", "top-right");
				alertify.notify("Proyecto Relacionado con infraestractura", "success", 4, function(){});	


				window.setTimeout(function(){ 

					location.reload();

			    } ,4000);   

			},

			error: function (){ 
			    
			}

		});		


	    }else{

	     var parametrosEnviados=$(this).attr('codigos');

	     var paqueteDeDatos = new FormData();

	     paqueteDeDatos.append('parametrosEnviados',parametrosEnviados);

	     var destino = "modelosBd/actualiza/actualizaRelacionInfrasNouts.md.php"; 

			$.ajax({

				url: destino,
				type: 'POST',
				contentType: false,
				data: paqueteDeDatos, 
				processData: false,
				cache: false, 

				success: function(response){


					alertify.set("notifier","position", "top-right");
					alertify.notify("Proyecto no relacionado con infraestructura", "success", 4, function(){});	

					window.setTimeout(function(){ 

						location.reload();

				    } ,4000);   

				},

				error: function (){ 
				    
				}

			});		
		    

	   }


	});


}
checkboxBuscadorInfraestructuras($("#infraestructurasSeleccionables"));


var checkedListados=function(parametro1,parametro2){

	$(parametro1).click(function(){
	
	    var condicion = $(this).is(":checked");

	    if (condicion) {

	      $(parametro2).show();

	      $(".checkeds__items__argumentos").addClass('conjunto__items__argumentos');
	      $(".checkeds__tipo__argumentos").addClass('conjunto__tipos__argumentos');


	    }else{

	      $(parametro2).hide();

	      $(".checkeds__items__argumentos").removeClass('conjunto__items__argumentos');
	      $(".checkeds__tipo__argumentos").removeClass('conjunto__tipos__argumentos');

	   }


	});


}
checkedListados($("#agregarItemsDefinidos"),$(".fila__desplegable"));



/*=====  End of Checbox  ======*/


/*========================================
=            Números a letras            =
========================================*/

var numeroALetras = (function() {

    function Unidades(num){

        switch(num)
        {
            case 1: return 'UN';
            case 2: return 'DOS';
            case 3: return 'TRES';
            case 4: return 'CUATRO';
            case 5: return 'CINCO';
            case 6: return 'SEIS';
            case 7: return 'SIETE';
            case 8: return 'OCHO';
            case 9: return 'NUEVE';
        }

       return '';

    }

    function Decenas(num){

        let decena = Math.floor(num/10);
        let unidad = num - (decena * 10);

        switch(decena)
        {
            case 1:
                switch(unidad)
                {
                    case 0: return 'DIEZ';
                    case 1: return 'ONCE';
                    case 2: return 'DOCE';
                    case 3: return 'TRECE';
                    case 4: return 'CATORCE';
                    case 5: return 'QUINCE';
                    default: return 'DIECI' + Unidades(unidad);
                }
            case 2:
                switch(unidad)
                {
                    case 0: return 'VEINTE';
                    default: return 'VEINTI' + Unidades(unidad);
                }
            case 3: return DecenasY('TREINTA', unidad);
            case 4: return DecenasY('CUARENTA', unidad);
            case 5: return DecenasY('CINCUENTA', unidad);
            case 6: return DecenasY('SESENTA', unidad);
            case 7: return DecenasY('SETENTA', unidad);
            case 8: return DecenasY('OCHENTA', unidad);
            case 9: return DecenasY('NOVENTA', unidad);
            case 0: return Unidades(unidad);
        }
    }//Unidades()

    function DecenasY(strSin, numUnidades) {
        if (numUnidades > 0)
            return strSin + ' Y ' + Unidades(numUnidades)

        return strSin;
    }//DecenasY()

    function Centenas(num) {
        let centenas = Math.floor(num / 100);
        let decenas = num - (centenas * 100);

        switch(centenas)
        {
            case 1:
                if (decenas > 0)
                    return 'CIENTO ' + Decenas(decenas);
                return 'CIEN';
            case 2: return 'DOSCIENTOS ' + Decenas(decenas);
            case 3: return 'TRESCIENTOS ' + Decenas(decenas);
            case 4: return 'CUATROCIENTOS ' + Decenas(decenas);
            case 5: return 'QUINIENTOS ' + Decenas(decenas);
            case 6: return 'SEISCIENTOS ' + Decenas(decenas);
            case 7: return 'SETECIENTOS ' + Decenas(decenas);
            case 8: return 'OCHOCIENTOS ' + Decenas(decenas);
            case 9: return 'NOVECIENTOS ' + Decenas(decenas);
        }

        return Decenas(decenas);
    }//Centenas()

    function Seccion(num, divisor, strSingular, strPlural) {
        let cientos = Math.floor(num / divisor)
        let resto = num - (cientos * divisor)

        let letras = '';

        if (cientos > 0)
            if (cientos > 1)
                letras = Centenas(cientos) + ' ' + strPlural;
            else
                letras = strSingular;

        if (resto > 0)
            letras += '';

        return letras;
    }//Seccion()

    function Miles(num) {
        let divisor = 1000;
        let cientos = Math.floor(num / divisor)
        let resto = num - (cientos * divisor)

        let strMiles = Seccion(num, divisor, 'UN MIL', 'MIL');
        let strCentenas = Centenas(resto);

        if(strMiles == '')
            return strCentenas;

        return strMiles + ' ' + strCentenas;
    }//Miles()

    function Millones(num) {
        let divisor = 1000000;
        let cientos = Math.floor(num / divisor)
        let resto = num - (cientos * divisor)

        let strMillones = Seccion(num, divisor, 'UN MILLON DE', 'MILLONES DE');
        let strMiles = Miles(resto);

        if(strMillones == '')
            return strMiles;

        return strMillones + ' ' + strMiles;
    }//Millones()

    return function NumeroALetras(num, currency) {
        currency = currency || {};
        let data = {
            numero: num,
            enteros: Math.floor(num),
            centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
            letrasCentavos: '',
            letrasMonedaPlural: currency.plural || 'PESOS CHILENOS',//'PESOS', 'Dólares', 'Bolívares', 'etcs'
            letrasMonedaSingular: currency.singular || 'PESO CHILENO', //'PESO', 'Dólar', 'Bolivar', 'etc'
            letrasMonedaCentavoPlural: currency.centPlural || 'CHIQUI PESOS CHILENOS',
            letrasMonedaCentavoSingular: currency.centSingular || 'CHIQUI PESO CHILENO'
        };

        if (data.centavos > 0) {
            data.letrasCentavos = 'CON ' + (function () {
                    if (data.centavos == 1)
                        return Millones(data.centavos) + ' ' + data.letrasMonedaCentavoSingular;
                    else
                        return Millones(data.centavos) + ' ' + data.letrasMonedaCentavoPlural;
                })();
        };

        if(data.enteros == 0)
            return 'CERO ' + data.letrasMonedaPlural + ' ' + data.letrasCentavos;
        if (data.enteros == 1)
            return Millones(data.enteros) + ' ' + data.letrasMonedaSingular + ' ' + data.letrasCentavos;
        else
            return Millones(data.enteros) + ' ' + data.letrasMonedaPlural + ' ' + data.letrasCentavos;
    };

})();



$(".presupuesto__calculado").keyup(function(){
	
	$(".presupuestoLetras").val(numeroALetras($(this).val(), {plural: 'DÓLARES DE LOS ESTADOS UNIDOS DE AMÉRICA',singular: 'DÓLAR DE LOS ESTADOS UNIDOS DE NORTEAMÉRICA',centPlural: 'CENTAVOS',centSingular: 'CENTAVO'}));

});

$(".presupuesto__calculado__dos").keyup(function(){
	
	$(".presupuestoLetras__dos").val(numeroALetras($(this).val(), {plural: 'DÓLARES DE LOS ESTADOS UNIDOS DE AMÉRICA',singular: 'DÓLAR DE LOS ESTADOS UNIDOS DE NORTEAMÉRICA',centPlural: 'CENTAVOS',centSingular: 'CENTAVO'}));

});

$(".presupuesto__calculado__tres").keyup(function(){
	
	$(".presupuestoLetras__tres").val(numeroALetras($(this).val(), {plural: 'DÓLARES DE LOS ESTADOS UNIDOS DE AMÉRICA',singular: 'DÓLAR DE LOS ESTADOS UNIDOS DE NORTEAMÉRICA',centPlural: 'CENTAVOS',centSingular: 'CENTAVO'}));

});

$(".presupuesto__calculado__cuatro").keyup(function(){
	
	$(".presupuestoLetras__cuatro").val(numeroALetras($(this).val(), {plural: 'DÓLARES DE LOS ESTADOS UNIDOS DE AMÉRICA',singular: 'DÓLAR DE LOS ESTADOS UNIDOS DE NORTEAMÉRICA',centPlural: 'CENTAVOS',centSingular: 'CENTAVO'}));

});

/*=====  End of Números a letras  ======*/


/*===========================================
=            Validar Asistencias            =
===========================================*/

var checkboxFuncionesAsistencias=function(parametro1,parametro2){

	$(parametro1).change(function(){
	
	    var condicion = $(parametro2).is(":checked");

	    if (!condicion) {

	     	$(this).prop('checked', false);

	     	alertify.set("notifier","position", "top-right");
	    	alertify.notify("Es obligatorio seleccionar asistencia para marcar la opción", "error", 5, function(){});	

	    }


	});

	$(parametro2).click(function(){
	
	    var condicion = $(parametro2).is(":checked");

	    if (!condicion) {

	     	$(parametro1).prop('checked', false);	

	    }


	});


}
checkboxFuncionesAsistencias($("input:radio[name=ministroOpcion]"),$("#asistenciaMinistro"));
checkboxFuncionesAsistencias($("input:radio[name=altoRendimientoOpcion]"),$("#asistenciaSusesAlto"));
checkboxFuncionesAsistencias($("input:radio[name=actividadFisicaOpcion]"),$("#asistenciaActividadFisica"));
checkboxFuncionesAsistencias($("input:radio[name=coordinadorAdministracionOpcion]"),$("#asistenciaCoordinador"));

checkboxFuncionesAsistencias($("input:radio[name=coordinadorPlanificacionOpcion]"),$("#asistenciaPlanificacion"));
checkboxFuncionesAsistencias($("input:radio[name=coordinadorAdministracionFinanciera]"),$("#asistenciaJuridico"));

/*=====  End of Validar Asistencias  ======*/

/*=============================
=            Radio            =
=============================*/


var radioHabilitas=function(parametro1){

	$(parametro1).change(function(){


	    if ($('input:radio[name=calificarContrato]:checked').val()=="no") {

	    	$("#comentarioNegativo").show();

	    }else{

	    	$("#comentarioNegativo").hide();

	    }


	});

}
radioHabilitas($("input:radio[name=calificarContrato]"));




var radioHabilitasSegumientos=function(parametro1){

	$(parametro1).change(function(){


	    if ($('input:radio[name=informarProyectos]:checked').val()=="no") {

	    	$("#comentarioNegativosInformes").show();

	    }else{

	    	$("#comentarioNegativosInformes").hide();

	    }


	});

}
radioHabilitasSegumientos($("input:radio[name=informarProyectos]"));

/*=====  End of Radio  ======*/


/*============================================
=            Checked obligatorios            =
============================================*/

var checkboxMarcadosDesmarcados=function(parametro1,parametro2){

	$(parametro1).change(function(){

		if (parametro2.val()=="0") {

	     	alertify.set("notifier","position", "top-right");
	    	alertify.notify("Es obligatorio seleccionar si es Delegado o Ministro para confirmar asistencia", "error", 5, function(){});	

	    	$(this).prop('checked', false);				

		}else if(parametro2.val()=="2" && $("#selectorUsuariosDelegados").val()=="0"){

	     	alertify.set("notifier","position", "top-right");
	    	alertify.notify("Es obligatorio seleccionar un delegado para confirmar asistencia", "error", 5, function(){});	

	    	$(this).prop('checked', false);		

		}


	});

}
checkboxMarcadosDesmarcados($("#asistenciaMinistro"),$("#seleccionSecretarioDelegado"));

/*=====  End of Checked obligatorios  ======*/

/*================================================
=            Seleccionador documentos            =
================================================*/

var seleccionadorDeDocumentos=function(parametro1){

	$(parametro1).change(function(){

		if ($(this).val()=="infra") {
			$(".letra__infra__compuestas").text('Componentes de Infraestructura');
		}else{
			$(".letra__infra__compuestas").text('Componentes Técnicos');
		}

		if($(this).val()!=""){
			$(".documentos__necesarios").show();
		}else{
			$(".documentos__necesarios").hide();
		}

	});

}
seleccionadorDeDocumentos($(".seleccionadorDeDocumentos"));

/*=====  End of Seleccionador documentos  ======*/


/*=============================================
=            Modal Autoejecutables            =
=============================================*/

var llamarModalInscripcionProyectos=function(parametro1){
	
	$(window).on('load',function(){

		$(parametro1).modal('show');

	});

}
	
llamarModalInscripcionProyectos($("#modalCreacionProyecto"));	

// $('#modalCreacionProyecto').modal({backdrop: 'static', keyboard: false});

/*=====  End of Modal Autoejecutables  ======*/

/*======================================
=            Modales Cerrar            =
======================================*/

var llamarCerrarModal=function(parametro1,parametro2){
	
	$(parametro1).click(function(){

		$(parametro2).modal('toggle');;

	});

}
	
llamarCerrarModal($(".cerrar__modal__preguntas"),$("#modalPregunta"));	

/*=====  End of Modales Cerrar  ======*/

/*================================================
=            Eliminar modal de clases            =
================================================*/

var llamarModalCerrarClases=function(parametro1){
	
	$(parametro1).click(function(){

		$(".show").removeClass('modal-backdrop');

	});

}
	
llamarModalCerrarClases($(".titulo__regreso"));	

/*=====  End of Eliminar modal de clases  ======*/

/*==================================================
=            Selección Infraestructuras            =
==================================================*/

var llamarCheckedsInfrasCasillas=function(parametro1){
	
	$(parametro1).click(function(){


		var condicion = $(this).is(":checked");

	    if (condicion && $(this).attr('nombreAtributos')=="Componentes de Infraestructura") {

	    	$(".bodys__infras").append('a) Formulación del programa y/o proyecto;<br>b) Certificado de propiedad o carta de autorización del propietario del inmueble en el cual se implantará la obra;<br>c) Memoria técnica arquitectónica;<br>d) Planos arquitectónicos o el que corresponda según el objeto del programa y/o proyecto, con la firma de responsabilidad del/la profesional responsable del diseño;<br>e) Presupuesto que contenga el detalle por rubro, suscrito por el/la profesional de la rama;<br>f) Cronograma valorado de la obra, suscrito por el/la profesional de la rama; y,<br>g) Respaldos digitales del proyecto.');

	    }else{

	    	$(".bodys__infras").html('');

	   }		

	   //  if (condicion && $(this).attr('nombreAtributos')=="Componentes Tecnologicos") {

	   //  	$(".bodys__infras__tecnicos").append('a) Formulación del programa y/o proyecto;<br>b) Certificado de propiedad o carta de autorización del propietario del inmueble en el cual se implantará la obra;<br>c) Memoria técnica arquitectónica;<br>d) Planos arquitectónicos o el que corresponda según el objeto del programa y/o proyecto, con la firma de responsabilidad del/la profesional responsable del diseño;<br>e) Presupuesto que contenga el detalle por rubro, suscrito por el/la profesional de la rama;<br>f) Cronograma valorado de la obra, suscrito por el/la profesional de la rama; y,<br>g) Respaldos digitales del proyecto.');

	   //  }else{

	   //  	$(".bodys__infras__tecnicos").html('');

	   // }	


	});

}
	
llamarCheckedsInfrasCasillas($("#selectorCasillasInfra"));	

// llamarCheckedsInfrasCasillas($("#selectorCasillasTecnologicos"));	

/*=====  End of Selección Infraestructuras  ======*/


/*=============================================
=            Validación selectores            =
=============================================*/

var llamarValidacionSelectoresSectores=function(parametro1,parametro2){
	
	if ($(parametro1).val()=="Deportista Federado" || $(parametro1).val()=="Deportista No Federado") {

		$(parametro2).append('a) Formulación del programa y/o proyecto deportivo;<br>b) Currículo deportivo justificado documentadamente; y,<br>c) Certificaciones que acrediten su trayectoria deportiva.');

	}else if($(parametro1).val()=="Personas Naturales No Deportistas" ){

		$(parametro2).append('a) Formulación del programa y/o proyecto deportivo; y<br>b) Currículo de experiencia afín comprobable. ');

	}else if($(parametro1).val()=="Empresas u Organizaciones No Deportivas" ){

		$(parametro2).append('a) Formulación del programa y/o proyecto;<br>b) Acreditar al menos un año de vida jurídica; y,<br>c) Currículo de experiencia afín comprobable.');

	}else if($(parametro1).val()=="Organizaciones Deportivas" ){

		$(parametro2).append('a) Formulación del programa y/o proyecto deportivo.');

	}

}
	
llamarValidacionSelectoresSectores($("#valorTIpoDos"),$(".requisitos__usuarios"));	

/*=====  End of Validación selectores  ======*/


/*================================
=            Toll tip            =
================================*/

$('[data-toggle="tooltip"]').tooltip();

/*=====  End of Toll tip  ======*/


/*===================================================
=            Activando submenus abiertos            =
===================================================*/

var abrirSubmenus=function(parametro1,parametro2){


	if ( $("#buscadorElementosNavar").length > 0 && $("#buscadorElementosNavar").val()=="si") {


		$(parametro1).addClass('menu-open');

		$(parametro2).removeAttr('style');

		$(parametro2).attr('style','display: block;');


	}


}
abrirSubmenus($(".menu__principal"),$(".sub__menus__principales"));

/*=====  End of Activando submenus abiertos  ======*/

/*================================================
=            Desplegar lista en casos            =
================================================*/

var llamarSelectsCasosDeseados=function(parametro1){
	
	$(parametro1).change(function(){

		$(".contenido__principal__creados").remove();

		var opcionDetallada = $("#entidad option:selected").attr("tipoDos");

		$(".acuerdo__de__responsabilidad").html(' ');

		if (opcionDetallada=="Deportista Federado") {

			$(".atributos__agregados").after('<div class="contenido__principal__creados"><label class="label__formula">* Fecha desde la cual está federado</label><input type="date" class="form-estilos text__errores obligatorio__usuario"  name="fechaFederadoSolicitante" id="fechaFederadoSolicitante" placeholder="Fecha desde la cual esta federado"/><label class="label__formula">* Organismo al que pertenece</label><input type="text" class="form-estilos text__errores obligatorio__usuario"  name="organismoNombreVinculado" id="organismoNombreVinculado" placeholder="Organismo al que pertenece"/></div>');

			$(".acuerdo__de__responsabilidad").append('&nbsp;Acepto los términos y condiciones; <br>y declaro bajo mi responsabilidad ser un deportista activo');

		}else{

			$(".acuerdo__de__responsabilidad").append('&nbsp;Acepto los términos y condiciones');

			$(".contenido__principal__creados").remove();

		}

	});

}
	
llamarSelectsCasosDeseados($("#entidad"));	


/*=====  End of Desplegar lista en casos  ======*/

/*==================================================
=            Parametros fecha validadas            =
==================================================*/

var comparadorDeFechas=function(parametro1,parametro2,parametro3,parametro4,parametro5){
	
	$(parametro1).blur(function(){

		var variableFechaProyectoInicio=$(parametro2).val();

		var arrayFechaProyectoInicio= variableFechaProyectoInicio.split('/'); 

		var variableFechaProyectoFin=$(parametro3).val();

		var arrayFechaProyectoFin= variableFechaProyectoFin.split('/'); 

		var variableFechasIngresadas=$(this).val();

		var arrayFechasIngresadas= variableFechasIngresadas.split('/'); 

		var fInicioProyecto = new Date(arrayFechaProyectoInicio[2], arrayFechaProyectoInicio[1], arrayFechaProyectoInicio[0]);
		var fInFinProyecto = new Date(arrayFechaProyectoFin[2], arrayFechaProyectoFin[1], arrayFechaProyectoFin[0]);
		var fIngresados = new Date(arrayFechasIngresadas[2], arrayFechasIngresadas[1], arrayFechasIngresadas[0]);

	  	switch (parametro4) {

	  		case 0:

				if (fIngresados.getTime()<fInicioProyecto.getTime()) {

					alertify.set("notifier","position", "top-center");
					alertify.notify("La fecha ingresada es menor a la fecha de inicio del proyecto", "error", 15, function(){});

					$(this).val(" ");

				}else if(fIngresados.getTime()>fInFinProyecto.getTime()){


					alertify.set("notifier","position", "top-center");
					alertify.notify("La fecha ingresada es mayor a la fecha de fin del proyecto", "error", 15, function(){});

					$(this).val(" ");

				}else{

					break;

				}

	  		break;

	  		case 1:

				var variableFechaIniciosComparativas=$(parametro5).val();

				var arrayFechaIniciosComparativas= variableFechaIniciosComparativas.split('/'); 

				var fIniciosComparativos = new Date(arrayFechaIniciosComparativas[2], arrayFechaIniciosComparativas[1], arrayFechaIniciosComparativas[0]);

				if (fIngresados.getTime()>fInFinProyecto.getTime()) {

					alertify.set("notifier","position", "top-center");
					alertify.notify("La fecha ingresada es mayor a la fecha de fin del proyecto", "error", 15, function(){});

					$(this).val(" ");

				}else if(fIngresados.getTime()<fIniciosComparativos.getTime()){

					alertify.set("notifier","position", "top-center");
					alertify.notify("La fecha ingresada es menor a la fecha de inicio del plazo de ejecución", "error", 15, function(){});

					$(this).val(" ");


				}

	  		break;

	  	}



	});

}
	
comparadorDeFechas($("#fechaInicialPlazo"),$("#inicioPeriodos"),$("#finPeriodos"),0);	
comparadorDeFechas($("#fechaFinalPlazo"),$("#inicioPeriodos"),$("#finPeriodos"),1,$("#fechaInicialPlazo"));	

/*=====  End of Parametros fecha validadas  ======*/

/*===========================================
=            Fecha fin separadas            =
===========================================*/

var comparadorDeFechasUnitarias=function(parametro1,parametro2){
	
	$(parametro1).blur(function(){


		var variableFechasIngresadas=$(this).val();
		var arrayFechasIngresadas= variableFechasIngresadas.split('/'); 


		var variableFechaProyectoInicio=$(parametro2).val();
		var arrayFechaProyectoInicio= variableFechaProyectoInicio.split('/'); 

		var fInicioProyecto = new Date(arrayFechaProyectoInicio[2], arrayFechaProyectoInicio[1], arrayFechaProyectoInicio[0]);
		var fIngresados = new Date(arrayFechasIngresadas[2], arrayFechasIngresadas[1], arrayFechasIngresadas[0]);


		if (fIngresados.getTime()<fInicioProyecto.getTime()) {

			alertify.set("notifier","position", "top-center");
			alertify.notify("La fecha ingresada es menor a la fecha inicio de inicio del proyecto", "error", 15, function(){});

			$(this).val(" ");			

		}

	});

}
	
comparadorDeFechasUnitarias($("#finPeriodos"),$("#inicioPeriodos"));	

/*=====  End of Fecha fin separadas  ======*/



/*==================================================
=            Validando menus selectores            =
==================================================*/

var llamarMenusValidados=function(parametro1,parametro2){
	
	$(parametro1).click(function(){

		if($(this).hasClass("active__menusInformados")){

			$(this).removeClass('active__menusInformados');

			$(this).addClass('ocultos');

			$(parametro2).hide();

		}else if($(this).hasClass("ocultos")){

			$(this).addClass('active__menusInformados');

			$(this).removeClass('ocultos');

			$(parametro2).show();

		}

	});

}
	
llamarMenusValidados($("#mostrarInfomacionDisenadaUno"),$(".ocultos__proyectos__1"));	
llamarMenusValidados($("#mostrarInfomacionDisenadaDos"),$(".ocultos__proyectos__2"));	
llamarMenusValidados($("#mostrarInfomacionDisenadaTres"),$(".ocultos__proyectos__3"));
llamarMenusValidados($("#mostrarInfomacionDisenadaCuatro"),$(".ocultos__proyectos__4"));
llamarMenusValidados($("#mostrarInfomacionDisenadaCinco"),$(".ocultos__proyectos__5"));

/*=====  End of Validando menus selectores  ======*/


/*==================================================
=            Dando letras a los rotulos            =
==================================================*/

var llamarDandoRotulosIngresosSelects=function(parametro1){
	
	$(parametro1).change(function(){

		$(".creados__federados").remove();

		var opcionDetallada = $("#entidad option:selected").attr("tipoDos");

		var texto = $("#entidad option:selected").html();

		$(".anadidos__dados").html(' ');

		$(".datos__atletas__seguidos").text(" ");

		$(".datos__atletas__seguidos__organizacion").text(" ");

		if(opcionDetallada=="Deportista No Federado") {

			$(".dando__letras__selectores").append('<div style="display:flex;" class="anadidos__dados"><div style="margin-right:2em; position:relative; top:.6em;"><i class="fas fa-info-circle" style="font-size:20px;"></i></div><div>Se considera deportistas a las personas que practiquen actividades deportivas de manera regular, desarrollen habilidades y destrezas en cualquier disciplina deportiva individual o colectiva.</div></div>');

			$(".datos__atletas__seguidos__organizacion").text("Datos del "+texto);

		}else if(opcionDetallada=="Deportista Federado"){

			$(".dando__letras__selectores").append('<div style="display:flex;" class="anadidos__dados"><div style="margin-right:2em; position:relative; top:.6em;"><i class="fas fa-info-circle" style="font-size:20px;"></i></div><div>Cuando un deportista práctica un deporte formal y está afiliado a una de las federaciones deportivas del sistema nacional.</div></div>');

			$(".datos__atletas__seguidos__organizacion").text("Datos del "+texto);

		}else if(opcionDetallada=="Personas Naturales No Deportistas"){

			$(".dando__letras__selectores").append('<div style="display:flex;" class="anadidos__dados"><div style="margin-right:2em; position:relative; top:.6em;"><i class="fas fa-info-circle" style="font-size:20px;"></i></div><div>Personas naturales que tienen interés de calificar un programa/proyecto para obtener un patrocinio que puede beneficiarse de la aplicación del incentivo tributario.</div></div>');

			$(".datos__atletas__seguidos__organizacion").text("Datos del "+texto);

		}else if(opcionDetallada=="Empresas u Organizaciones No Deportivas"){

			$(".dando__letras__selectores").append('<div style="display:flex;" class="anadidos__dados"><div style="margin-right:2em; position:relative; top:.6em;"><i class="fas fa-info-circle" style="font-size:20px;"></i></div><div>Personas jurídicas que tienen interés de calificar un programa/proyecto para obtener un patrocinio que puede beneficiarse de la aplicación del incentivo tributario.</div></div>');

			$(".datos__atletas__seguidos__organizacion").text("Datos de "+texto);

		}else if(opcionDetallada=="Organizaciones Deportivas"){

			$(".dando__letras__selectores").append('<div style="display:flex;" class="anadidos__dados"><div style="margin-right:2em; position:relative; top:.6em;"><i class="fas fa-info-circle" style="font-size:20px;"></i></div><div>Es una organización de derecho privado, regulada por la Ley del Deporte, Educación Física, Recreación, sin fines de lucro.</div></div>');

			$(".datos__atletas__seguidos__organizacion").text("Datos de "+texto);

		}else{

			$(".dando__letras__selectores").text(' ');

		}

	});

}
	
llamarDandoRotulosIngresosSelects($("#entidad"));	


/*=====  End of Dando letras a los rotulos  ======*/


/*===================================
=            Data picker            =
===================================*/

var obtenerDatapicker=function(parametro1,parametro2){

 $(parametro1).datepicker({

    language: 'es',
    startDate: 0,
    minDate: new Date(),

    orientation: "top right",

    onSelect: function(date) {} 



  });


  $(parametro2).datepicker({

    language: 'es',
   	startDate: 0,
    minDate: new Date(),

    orientation: "top right",

    onSelect: function(date) {

    	/*========================================================
    	=            Comprobación de fechas editables            =
    	========================================================*/
    	
	   if( $(".presupuestosUnos").hasClass('presupuesto__letras')){
	   }else{
	   	 $(".presupuestosUnos").addClass('presupuesto__letras')
	   }    	
    	
	   if( $(".presupuestosDos").hasClass('presupuesto__letras__2')){
	   }else{
	   	 $(".presupuestosDos").addClass('presupuesto__letras__2')
	   }    	
    	
	   if( $(".presupuestosTres").hasClass('presupuesto__letras__3')){
	   }else{
	   	 $(".presupuestosTres").addClass('presupuesto__letras__3')
	   }    	
    	


    	/*=====  End of Comprobación de fechas editables  ======*/
    	


    	var datePasado = date.split('/');

    	var dateToday = $("#inicioPeriodos").val().split('/');

		today = new Date(dateToday[2],dateToday[1],dateToday[0])

		past = new Date(datePasado[2],datePasado[1],datePasado[0]);

		function calcDate(date1,date2) {

		    var diff = Math.floor(date1.getTime() - date2.getTime());

		    var day = 1000 * 60 * 60 * 24;

		    var days = Math.floor(diff/day);

		    var months = Math.floor(days/31);

		    var years = Math.floor(months/12);

		    var message = date2.toDateString();

		    dia= days;

		    mes= months;

		    anio= years;

		    return anio;
		}


		var resultadoPlurianual = Math.abs(calcDate(today,past));

		var anio1=today.getFullYear();
		var anio2=past.getFullYear();

		var contadorRestas=parseInt(anio2, 10)-parseInt(anio1, 10);

		if (past.getMonth()=="0" || past.getMonth()==0) {
			contadorRestas=Math.abs(contadorRestas);
		}else{
			contadorRestas=Math.abs(contadorRestas)+1;
		}

		

		if (contadorRestas>4) {


			$(".presupuesto__letras").hide();

			$(".presupuesto__letras__2").hide();

			$(".presupuesto__letras__3").hide();

			$(".presupuesto__letras__4").hide();

			$("#mensajePlurianual").val("");

			alertify.set("notifier","position", "top-center");
			alertify.notify("El proyecto no puede durar más de 4 años", "error", 5, function(){});


			/*==========================================
			=            Borrando elementos            =
			==========================================*/
			
			$("#presupuesto").val("");	
			$("#presupuestoLetras").val("");
			$("#presupuestoDos").val("");
			$("#presupuestoLetrasDos").val("");
			$("#presupuestoTres").val("");
			$("#presupuestoLetrasTres").val("");	

			$("#presupuestoCuatro").val("");	
			$("#presupuestoLetrasCuatro").val("");	
			
			/*=====  End of Borrando elementos  ======*/
			

		}else if(contadorRestas==2){

			$(".presupuesto__letras").show();

			$(".presupuesto__letras__2").show();

			$(".presupuesto__letras__3").hide();

			$("#mensajePlurianual").val("pluriAnual");

			$("#mensajePlurianualAnios").val(2);

			$("#presupuestoDos").addClass('obligatorios__proyectosUnitarios');

			$("#presupuestoLetrasDos").addClass('obligatorios__proyectosUnitarios');

			$("#presupuestoTres").removeClass('obligatorios__proyectosUnitarios');

			$("#presupuestoLetrasTres").removeClass('obligatorios__proyectosUnitarios');

			$(".presupuesto__letras__4").hide();

			$("#presupuestoCuatro").removeClass('obligatorios__proyectosUnitarios');

			$("#presupuestoLetrasCuatro").removeClass('obligatorios__proyectosUnitarios');	


			$("#presupuestoTres").val("");
			$("#presupuestoLetrasTres").val("");		
			
			$(".anioInforme__1").text(anio1);
			$(".anioInforme__2").text(anio1+1);

		}else if(contadorRestas==3){

			$(".presupuesto__letras").show();

			$(".presupuesto__letras__2").show();

			$(".presupuesto__letras__3").show();

			$("#mensajePlurianual").val("pluriAnual");

			$("#mensajePlurianualAnios").val(3);

			$("#presupuestoDos").addClass('obligatorios__proyectosUnitarios');

			$("#presupuestoLetrasDos").addClass('obligatorios__proyectosUnitarios');

			$("#presupuestoTres").addClass('obligatorios__proyectosUnitarios');

			$("#presupuestoLetrasTres").addClass('obligatorios__proyectosUnitarios');

			$(".presupuesto__letras__4").hide();

			$("#presupuestoCuatro").removeClass('obligatorios__proyectosUnitarios');

			$("#presupuestoLetrasCuatro").removeClass('obligatorios__proyectosUnitarios');	


			$(".anioInforme__1").text(anio1);
			$(".anioInforme__2").text(anio1+1);
			$(".anioInforme__3").text(anio1+2);

		}else if(contadorRestas==4){


			$(".presupuesto__letras").show();

			$(".presupuesto__letras__2").show();

			$(".presupuesto__letras__3").show();

			$("#mensajePlurianual").val("pluriAnual");

			$("#mensajePlurianualAnios").val(4);

			$("#presupuestoDos").addClass('obligatorios__proyectosUnitarios');

			$("#presupuestoLetrasDos").addClass('obligatorios__proyectosUnitarios');

			$("#presupuestoTres").addClass('obligatorios__proyectosUnitarios');

			$("#presupuestoLetrasTres").addClass('obligatorios__proyectosUnitarios');

			$(".presupuesto__letras__4").show();

			$("#presupuestoCuatro").addClass('obligatorios__proyectosUnitarios');

			$("#presupuestoLetrasCuatro").addClass('obligatorios__proyectosUnitarios');

			$(".anioInforme__1").text(anio1);
			$(".anioInforme__2").text(anio1+1);
			$(".anioInforme__3").text(anio1+2);
			$(".anioInforme__4").text(anio1+3);

		}else{

			$(".presupuesto__letras").show();

			$(".presupuesto__letras__2").hide();

			$(".presupuesto__letras__3").hide();

			$("#presupuestoDos").removeClass('obligatorios__proyectosUnitarios');

			$("#presupuestoLetrasDos").removeClass('obligatorios__proyectosUnitarios');

			$("#presupuestoTres").removeClass('obligatorios__proyectosUnitarios');

			$("#presupuestoLetrasTres").removeClass('obligatorios__proyectosUnitarios');

			$(".presupuesto__letras__4").hide();

			$("#presupuestoCuatro").removeClass('obligatorios__proyectosUnitarios');

			$("#presupuestoLetrasCuatro").removeClass('obligatorios__proyectosUnitarios');			


			$("#mensajePlurianual").val("normal");

			$("#presupuestoDos").val("");
			$("#presupuestoLetrasDos").val("");
			$("#presupuestoTres").val("");
			$("#presupuestoLetrasTres").val("");

			$(".anioInforme__1").text(anio1);

		}

    }

  });

}

obtenerDatapicker($("#inicioPeriodos"),$("#finPeriodos"));
obtenerDatapicker($(".picker__seleccionables"));

/*=====  End of Data picker  ======*/



/*===========================================
=            Sección de eventos            =
===========================================*/

$('.entidad').on('change', function (e){

	if($(this).attr('validador')==1){

		$(".edita__2").val("0");

		$("#registro").hide();

		$("#registroPatrocinador").hide();

		if ($(this).val()=="organismo") {

		/* Comment 
			$("#tipoAtleta").hide();

			$("#tipoOrganismo").hide();
		*/
			$(".ingreso__usuarios").hide();

			$(".ingreso__organismosDeportivos").show();

			$("#registro").show();

			$("#registroPatrocinador").show();

			$("#porqueCertificado").val("0");

			$(".respuestas__certificadosFederaciones").hide();

			$(".label__texto__archivos__negativos").hide();

			$("#certificadoOrganismoSuperior").hide();

			$("#solicitudCertificacionRealizada").hide();

			$(".informacion__club__deportista").hide();

		}else if($(this).val()=="ciudadano"){

		/* Comment 
		
			$("#tipoAtleta").hide();

			
		*/
			$(".ingreso__usuarios").show();

		/* Comment	
			$("#tipoOrganismo").show();
		*/	

			$(".ingreso__organismosDeportivos").hide();

			$("#registro").show();

			$("#registroPatrocinador").show();

			$("#porqueCertificado").val("0");

			$(".respuestas__certificadosFederaciones").hide();

			$(".label__texto__archivos__negativos").hide();

			$("#certificadoOrganismoSuperior").hide();

			$("#solicitudCertificacionRealizada").hide();

			$(".informacion__club__deportista").hide();


		}else{

			$("#tipoAtleta").hide();

			$("#tipoOrganismo").hide();

			$(".ingreso__usuarios").hide();

			$(".ingreso__organismosDeportivos").hide();

			$("#registro").hide();

			$("#registroPatrocinador").hide();

			$("#porqueCertificado").val("0");

			$(".respuestas__certificadosFederaciones").hide();

			$(".label__texto__archivos__negativos").hide();

			$("#certificadoOrganismoSuperior").hide();

			$("#solicitudCertificacionRealizada").hide();

			$(".informacion__club__deportista").hide();

		}		

	}else if($(this).attr('validador')==2){

		$("#certificadoFederacion").val("0");

		$(".ingreso__usuarios").show();

		$(".ingreso__organismosDeportivos").hide();




		if ($("#tipoAtleta").val()=="profesional") {

			$("#certificadoFederacion option[value='0']").html('--Seleccione si posee certificado de federación o liga profecional-');
			
		}else{

			$("#certificadoFederacion option[value='0']").html('--Seleccione si posee certificado de federación-');

		}


		if($(this).val()=="0"){

			$(".ingreso__usuarios").hide();

			$("#registro").hide();

			$("#registroPatrocinador").hide();

			$("#porqueCertificado").val("0");

			$(".respuestas__certificadosFederaciones").hide();

			$(".label__texto__archivos__negativos").hide();

			$("#certificadoOrganismoSuperior").hide();

			$("#solicitudCertificacionRealizada").hide();

		}else if($(this).val()=="noFederado"){

			$(".documentos__deportistas").hide();

			$("#registro").show();

			$("#registroPatrocinador").show();

			$("#porqueCertificado").val("0");

			$(".respuestas__certificadosFederaciones").hide();

			$(".label__texto__archivos__negativos").hide();

			$("#certificadoOrganismoSuperior").hide();

			$("#solicitudCertificacionRealizada").hide();

		}else{

			$(".documentos__no__deportistas").hide();

			$("#registro").show();

			$("#registroPatrocinador").show();

			$("#porqueCertificado").val("0");

			$(".respuestas__certificadosFederaciones").hide();

			$(".label__texto__archivos__negativos").hide();

			$("#certificadoOrganismoSuperior").hide();

			$("#solicitudCertificacionRealizada").hide();

		}



	}else if($(this).attr('validador')==3){

		$(".ingreso__organismosDeportivos").show();

		$(".ingreso__usuarios").hide();

		$("#registro").hide();

		$("#registroPatrocinador").hide();

		if($(this).val()=="0"){

			$(".ingreso__organismosDeportivos").hide();

			$("#porqueCertificado").val("0");

		}else if($(this).val()=="recreativo"){

			$(".documentos__no__alto__rendimiento").show();

			$("#registro").show();

			$("#registroPatrocinador").show();

			$("#porqueCertificado").val("0");

			$(".respuestas__certificadosFederaciones").hide();

			$(".label__texto__archivos__negativos").hide();

			$("#certificadoOrganismoSuperior").hide();

			$("#solicitudCertificacionRealizada").hide();

		}else{

			$(".documentos__no__alto__rendimiento").hide();

			$("#registro").show();

			$("#registroPatrocinador").show();

			$("#porqueCertificado").val("0");

			$(".respuestas__certificadosFederaciones").hide();

			$(".label__texto__archivos__negativos").hide();

			$("#certificadoOrganismoSuperior").hide();

			$("#solicitudCertificacionRealizada").hide();

		}

	}else if($(this).attr('validador')==4){

		if($(this).val()=="si"){

			$("#certificadoOpsub").show();

			$("#respuestaDePeticion").hide();

			if ($("#tipoAtleta").val()=="profesional") {

				$(".label__texto__archivos").text("Cargar certificado de la federación o liga profesional");

			}else{

				$(".label__texto__archivos").text("Cargar certificado de la federación");	

			}


			$(".respuestas__certificadosFederaciones").hide();

			$(".label__texto__archivos__negativos").text("");

			$(".respuestas__certificadosFederaciones").hide();

			$(".label__texto__archivos__negativos").hide();

			$("#certificadoOrganismoSuperior").hide();

			$("#solicitudCertificacionRealizada").hide();

			$("#porqueCertificado option[value='1']").html('--Porque la federación me rechazo--');

			$("#porqueCertificado option[value='2']").html('--Porque no tengo respuesta de la federación--');

			$("#registro").show();	

			$("#registroPatrocinador").show();

		}else if($(this).val()=="no"){

			$("#certificadoOpsub").hide();

			if ($("#tipoAtleta").val()=="militarDeportiva" || $("#tipoAtleta").val()=="formativo" || $("#tipoAtleta").val()=="profesional") {


				swal({
	               type: "warning",
	               title: "No se puede negar a cargar el certificado de la federación",
	               showConfirmButton: true,
	               confirmButtonText: "Cerrar",
	               timer: 4000
	             });

				$("#registro").hide();

				$("#registroPatrocinador").hide();

			}else{

				$(".respuestas__certificadosFederaciones").show();
		
				$("#porqueCertificado option[value='1']").html('--Porque la federación o liga profesional me rechazo--');

				$("#porqueCertificado option[value='2']").html('--Porque no tengo respuesta de la federación o liga profecional--');

				$("#registro").show();		

				$("#registroPatrocinador").show();	

			}

			$(".label__texto__archivos").text("");


		}else{

			$("#certificadoOpsub").hide();

			$("#respuestaDePeticion").hide();

			$(".label__texto__archivos").text("");

			$(".respuestas__certificadosFederaciones").hide();

			$(".label__texto__archivos__negativos").text("");

			$(".respuestas__certificadosFederaciones").hide();

			$(".label__texto__archivos__negativos").hide();

			$("#certificadoOrganismoSuperior").hide();

			$("#solicitudCertificacionRealizada").hide();



		}

	}else if($(this).attr('validador')==5){
		

		if($(this).val()==1){

			$(".label__texto__archivos__negativos").show();

			if ($("#tipoAtleta").val()=="profesional") {

				$(".label__texto__archivos__negativos").text("Cargar la certificación del organismo superior a la federación (comite olimpico ecuatoriano, o comite paralimpico ecuatoriano, o federación deportiva nacional del Ecuador) o liga profesional");

			}else{

				$(".label__texto__archivos__negativos").text("Cargar la certificación del organismo superior a la federación (comite olimpico ecuatoriano, o comite paralimpico ecuatoriano, o federación deportiva nacional del Ecuador)");

			}
		

			$("#certificadoOrganismoSuperior").show();

			$("#solicitudCertificacionRealizada").hide();

		}else if($(this).val()==2){

			$(".label__texto__archivos__negativos").show();

			if ($("#tipoAtleta").val()=="profesional") {

				$(".label__texto__archivos__negativos").text("Cargar la solicitud de certificacion realizada a la federación o liga profesional");

			}else{

				$(".label__texto__archivos__negativos").text("Cargar la solicitud de certificacion realizada a la federación");

			}


			$("#solicitudCertificacionRealizada").show();

			$("#certificadoOrganismoSuperior").hide();


		}else{

			$(".respuestas__certificadosFederaciones").hide();

			$(".label__texto__archivos__negativos").hide();

			$("#certificadoOrganismoSuperior").hide();

			$("#solicitudCertificacionRealizada").hide();

		}


	}

});

/*=====  End of Sección de eventos   ======*/

});