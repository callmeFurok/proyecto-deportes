$(document).ready(function () {

/*=======================================
=            Tabla ubicación            =
=======================================*/
var contadorUbicacion=0;

var ubicacionGeografica=function(parametro1,parametro2){

	$(parametro1).click(function(e){

		contadorUbicacion++;

		$(parametro2).append('<table id="tablaUbiacion'+contadorUbicacion+'" style="margin-top:1em;" class="fila__paises__grupales"><tr><td style="padding:.5em;"><center>Escoger a que tipo pertenece</center></td><td style="padding:.5em;" id="filaSelector'+contadorUbicacion+'"><center><select style="width:100%;height:25px;" id="tipoUbicacion'+contadorUbicacion+'" name="tipoUbicacion'+contadorUbicacion+'" idContador="'+contadorUbicacion+'" class="tipoUbicacion"><option value="">--Escoger si es nacional o internacional--</option><option value="1">Nacional</option><option value="2">Internacional</option></select></center></td><td><center><button style="padding:.5em; text-align:center; background:#b71c1c; border-radius:.4em; color:white;" id="eliminar'+contadorUbicacion+'" idContador="'+contadorUbicacion+'"><i class="fas fa-trash"></i></button></center></td></tr></table>');

		/*=====================================
		=            Eliminar Fila            =
		=====================================*/
		
		$("#eliminar"+contadorUbicacion).click(function(e){

			var idContador=$(this).attr('idContador');

			$("#tablaUbiacion"+idContador).remove();

		});
		
		/*=====  End of Eliminar Fila  ======*/
		

		/*==========================================
		=            Generador de tabla            =
		==========================================*/
		
		$("#tipoUbicacion"+contadorUbicacion).change(function(e){

			var idContador=$(this).attr('idContador');

			$(".fila__anadidas"+idContador).remove();

			if ($(this).val()==0) {

				alertify.set("notifier","position", "top-right");
	            alertify.notify("Es necesario escoger un tipo de ubicación", "error", 4, function(){});	

			}else if($(this).val()==1){

				$("#tablaUbiacion"+idContador).append('<tr class="fila__anadidas'+idContador+' fila__paises__grupales" style="padding:.5em;"><td style="padding:.5em;"><center>País</center></td><td style="padding:.5em;"><center>ECUADOR<input type="hidden" id="paisTipo'+idContador+'" name="paisTipo'+idContador+'" value="103" class="paisTipo"/></center></td></tr><tr class="fila__anadidas'+idContador+'" style="padding:.5em;"><td style="padding:.5em;"><center>Provincia</center></td><td style="padding:.5em;"><center><select id="provinciaUbicacion'+idContador+'" name="provinciaUbicacion'+idContador+'" style="padding:.5em;width:100%;" class="provinciaUbicacion"></select></center></td></tr><tr class="fila__anadidas'+idContador+'" style="padding:.5em;"><td style="padding:.5em;"><center>Cantón</center></td><td style="padding:.5em;"><center><select id="cantonMultiples'+idContador+'" name="cantonMultiples'+idContador+'" style="padding:.5em; width:100%;" class="cantonMultiples"></select></center></td></tr><tr class="fila__anadidas'+idContador+'" style="padding:.5em;"><td style="padding:.5em;"><center>Parroquia</center></td><td style="padding:.5em;"><center><select id="parroquiaMultiples'+idContador+'" name="parroquiaMultiples'+idContador+'" style="padding:.5em; width:100%;" class="parroquiaMultiples"></select></center></td></tr><tr class="fila__anadidas'+idContador+'" style="padding:.5em;"><td style="padding:.5em;">Ubicación específica (Nombre del coliseo, estadio, otros, si aplica)</td><td style="padding:.5em;"><textarea id="ubicacion'+idContador+'" name="ubicacion'+idContador+'" class="ubicacion" style="width:100%; height:75px;"></textarea></td></tr>');


					/*==================================
					=            Provincias            =
					==================================*/

					var provinciasMultiples=function(parametro1){

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

					provinciasMultiples($("#provinciaUbicacion"+idContador));				
					
					
					/*=====  End of Provincias  ======*/
				
					/*================================
					=            Cantones            =
					================================*/

					var cantonesMultiples=function(parametro1,parametro2){

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

					cantonesMultiples($("#cantonMultiples"+idContador),$("#provinciaUbicacion"+idContador));					
										
					
					/*=====  End of Cantones  ======*/

					/*=================================
					=            Parroquia            =
					=================================*/
					var parroquiaMultiples=function(parametro1,parametro2){

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

					parroquiaMultiples($("#parroquiaMultiples"+idContador),$("#cantonMultiples"+idContador));						
					
					
					/*=====  End of Parroquia  ======*/
					
					


			}else if($(this).val()==2){


				$("#tablaUbiacion"+idContador).append('<tr class="fila__anadidas'+idContador+'" style="padding:.5em;"><td style="padding:.5em;"><center>País</center></td><td style="padding:.5em;"><center><select id="paisTipoInter'+idContador+'" name="paisTipoInter'+idContador+'" style="width:100%;" class="paisTipoInter"></select></center></td></tr><tr class="fila__anadidas'+idContador+'" style="padding:.5em;"><td style="padding:.5em;"><center>Estado</center></td><td><center><input style="width:96%;height:35px;" id="estado'+idContador+'" name="estado'+idContador+'" class="estado"></center></td></tr><tr class="fila__anadidas'+idContador+'" style="padding:.5em;"><td style="padding:.5em;"><center>Sector</center></td><td style="padding:.5em;"><center><input style="width:100%;height:35px;" id="sector'+idContador+'" name="sector'+idContador+'" class="sector"></center></td></tr><tr class="fila__anadidas'+idContador+'" style="padding:.5em;"><td style="padding:.5em;"><center>Comunidad</center></td><td style="padding:.5em;"><center><input style="width:100%;height:35px;" id="comunidad'+idContador+'" name="comunidad'+idContador+'" class="comunidad"></center></td></tr><tr class="fila__anadidas'+idContador+'" style="padding:.5em;"><td style="padding:.5em;">Ubicación específica (Nombre del coliseo, estadio, otros, si aplica)</td><td style="padding:.5em;"><textarea id="ubicacionInter'+idContador+'" name="ubicacionInter'+idContador+'" style="width:100%; height:75px;" class="ubicacionInter"></textarea></td></tr>');


					/*========================================
					=            Seleccionar País            =
					========================================*/

					var paisUbicacionMultiples=function(parametro1){

						indicador=4;

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

					paisUbicacionMultiples($("#paisTipoInter"+idContador));				
									
					
					/*=====  End of Seleccionar País  ======*/


			}

		});		
		
		/*=====  End of Generador de tabla  ======*/
		

	});

}

ubicacionGeografica($("#anadirUbicacion"),$(".ubicaciones__geograficas"));

/*=====  End of Tabla ubicación  ======*/


/*===============================================
=            Tablas base Geografícas            =
===============================================*/

var contadorBaseLegal=0;

var baseLegales=function(parametro1,parametro2){

	$(parametro1).click(function(e){

		contadorBaseLegal++;

		$(parametro2).append('<table id="tablaBaseLegal'+contadorBaseLegal+'" style="margin-top:1em;" class="tabla__legal"><tr><td style="padding:.5em;">Nombre de la Base Legal</td><td style="padding:.5em;"><input type="text" style="width:100%;" id="nombreBaseLegal'+contadorBaseLegal+'" name="nombreBaseLegal'+contadorBaseLegal+'" class="nombre__legales obligatorios__legales"></td></tr><tr><center><td style="padding:.5em;">Justificación de la Base Legal</center></td><td style="padding:.5em;"><center><textarea type="text" style="width:100%;" id="justificacionBaseLegal'+contadorBaseLegal+'" name="justificacionBaseLegal'+contadorBaseLegal+'" class="justificacion__legales obligatorios__legales"></textarea><div class="minimo__caracteres'+contadorBaseLegal+' error__conjuntos__bases__legales"></div></center></td><td><center><button style="padding:.5em; text-align:center; background:#b71c1c; color:white; border-radius:.4em;" id="eliminarBaseLegal'+contadorBaseLegal+'" idContador="'+contadorBaseLegal+'"><i class="fas fa-trash"></i></button></center></td></tr></table>');

		/*=====================================
		=            Eliminar Fila            =
		=====================================*/
		
		$("#eliminarBaseLegal"+contadorBaseLegal).click(function(e){

			var idContador=$(this).attr('idContador');

			$("#tablaBaseLegal"+idContador).remove();

		});
		
		/*=====  End of Eliminar Fila  ======*/
		

		/*=========================================
		=            Minímo caracteres            =
		=========================================*/
		
		var longitudCaracteresMinimaConjuntos=function(parametro1,parametro2,counter){

			$(parametro1).keyup(function(e){

			   var words = $(parametro1).val().split(' '); 

			   if(words.length < parametro2){

			        counter.html("Son minimo <strong>"+parametro2+" palabras</strong>");

			        counter.css("color","red");

			    }else{

			      counter.html("");

			      counter.css("color","black");

			      counter.css("font-size","10px");

			    }

			 });

		}

		longitudCaracteresMinimaConjuntos($("#justificacionBaseLegal"+contadorBaseLegal),10,$(".minimo__caracteres"+contadorBaseLegal));
		
		
		/*=====  End of Minímo caracteres  ======*/
		

	});

}

baseLegales($("#anadirBaseLegal"),$(".bases__legales"));

/*=====  End of Tablas base Geografícas  ======*/

/*==================================
=            Pronóstico            =
==================================*/

var contadorPronostico=0;

var metasEspecificas=function(parametro1,parametro2,parametro3){

	$(parametro1).click(function(e){

		$(parametro3).show();

		contadorPronostico++;

		$(parametro2).append('<tr class="fila__pronosticos'+contadorPronostico+' fila__pronostico"><td><input type="text" id="deportistas'+contadorPronostico+'" name="deportistas'+contadorPronostico+'" class="deportistas__conjunto obligatorio selector__inicial"></td><td><input type="text" id="disciplina'+contadorPronostico+'" name="disciplina'+contadorPronostico+'" class="disciplina__conjunto obligatorio selector__inicial"></td><td><input type="text" id="categoria'+contadorPronostico+'" name="categoria'+contadorPronostico+'" class="categoria__conjunto obligatorio selector__inicial numeros__guiones"></td><td><input type="text" id="division'+contadorPronostico+'" name="division'+contadorPronostico+'" class="division__conjunto obligatorio selector__inicial"></td><td><input type="text" id="modalidadPrueba'+contadorPronostico+'" name="modalidadPrueba'+contadorPronostico+'" class="modalidadPrueba__conjunto obligatorio selector__inicial"></td><td><input type="text" id="resultadoMarca'+contadorPronostico+'" name="resultadoMarca'+contadorPronostico+'" class="resultadoMarca__conjunto obligatorio selector__inicial numeros__puntos"></td><td><input type="text" id="eventoDeportistas'+contadorPronostico+'" name="eventoDeportistas'+contadorPronostico+'" class="eventoDeportistas__conjunto obligatorio selector__inicial"></td><td><input type="text" id="prnosticosDeportistas'+contadorPronostico+'" name="prnosticosDeportistas'+contadorPronostico+'" class="prnosticosDeportistas__conjunto obligatorio selector__inicial numeros__puntos"></td><td><center><button style="text-align:center; background:#b71c1c; color:white; border-radius:.4em;" id="eliminarPronosticos'+contadorPronostico+'" idContador="'+contadorPronostico+'"><i class="fas fa-trash"></i></button></center></td></tr>');

		/*==========================================
		=            Numeros dos puntos            =
		==========================================*/
		
		 $(".numeros__puntos").on('input', function () {

		     this.value = this.value.replace(/[^0-9,:]/g, '');

		 });
				
		
		/*=====  End of Numeros dos puntos  ======*/
		

		/*=========================================
		=            Categoría de edad            =
		=========================================*/

		 $(".numeros__guiones").on('input', function () {

		     this.value = this.value.replace(/[^0-9,-]/g, '');

		 });
		
		/*=====  End of Categoría de edad  ======*/
		

		/*=====================================
		=            Eliminar Fila            =
		=====================================*/
		
		$("#eliminarPronosticos"+contadorPronostico).click(function(e){

			var idContador=$(this).attr('idContador');

			$(".fila__pronosticos"+idContador).remove();


			if ( $(".fila__pronostico").length == 0 ) {
			  
				$("#tablaPronosticos").hide();

			}

		});
		
		/*=====  End of Eliminar Fila  ======*/
		
		

	});

}

metasEspecificas($("#anadirPronosticos"),$(".contenido__pronosticos"),$("#tablaPronosticos"));

/*=====  End of Pronóstico  ======*/


/*=============================
=            Metas            =
=============================*/

var contadorMetas=0;

var metasEspecificas=function(parametro1,parametro2,parametro3){

	$(parametro1).click(function(e){

		$(parametro3).show();

		contadorMetas++;

		$(parametro2).append('<tr class="fila__metas'+contadorMetas+' fila__metas__conjuntos"><td><input type="text" id="nombreIndicador'+contadorMetas+'" name="nombreIndicador'+contadorMetas+'" class="nombre__conjunto obligatorio selector__inicial"></td><td><input type="text" id="descripcion'+contadorMetas+'" name="descripcion'+contadorMetas+'" class="descripcion__conjunto obligatorio selector__inicial"></td><td><input type="text" id="metodoCalculo'+contadorMetas+'" name="metodoCalculo'+contadorMetas+'" class="metodoCalculo__conjunto obligatorio selector__inicial" ></td><td><input type="text" id="metaPropuesta'+contadorMetas+'" name="metaPropuesta'+contadorMetas+'" class="metaPropuesta__conjunto obligatorio selector__inicial solo__numero"></td><td><select id="periodo'+contadorMetas+'" name="periodo'+contadorMetas+'" class="periodo__conjunto obligatorio selector__inicial"></select></td><td><center><button style="text-align:center; background:#b71c1c; color:white; border-radius:.4em;" id="eliminarMetas'+contadorMetas+'" idContador="'+contadorMetas+'"><i class="fas fa-trash"></i></button></center></td></tr>');

		 $(".solo__numero").on('input', function () {

		     this.value = this.value.replace(/[^0-9]/g, '');

		 });


		var periodosSeleccionables=function(parametro1,parametro2){

			$(parametro1).append('<option value="">'+"--seleccionar un periodo--"+'</option>');


			var inicial=2020;

			for(var i=0;i<100;i++){

				$(parametro1).append('<option value="'+inicial+'">'+(inicial + i)+'</option>');

			}
			
		}

		periodosSeleccionables($("#periodo"+contadorMetas));


		/*=====================================
		=            Eliminar Fila            =
		=====================================*/
		
		$("#eliminarMetas"+contadorMetas).click(function(e){

			var idContador=$(this).attr('idContador');

			$(".fila__metas"+idContador).remove();

			if ( $(".fila__metas__conjuntos").length == 0 ) {
			  
				$("#tablaMetas").hide();

			}

		});
		
		/*=====  End of Eliminar Fila  ======*/
		
		

	});

}

metasEspecificas($("#anadirMetas"),$(".contenido__tabla__metas"),$("#tablaMetas"));

/*=====  End of Metas  ======*/


/*===================================================
=            Tabla objetivos específicos            =
===================================================*/

var contadorObjetivoEspecificos=0;

var objetivosEspecificos=function(parametro1,parametro2){

	$(parametro1).click(function(e){

		contadorObjetivoEspecificos++;

		$(parametro2).append('<table id="tablaObjetivosEspecificos'+contadorObjetivoEspecificos+'" class="tabla__objetivo__especifico" style="margin-top:1em;"><tr><td style="padding:.5em;"><textarea id="objetivoEspecificos'+contadorObjetivoEspecificos+'" name="objetivoEspecificos'+contadorObjetivoEspecificos+'" class="obligatorio__elementos especificos__grupales" style="width:100%; height:75px;" class="counter__objetivos'+contadorObjetivoEspecificos+' palabras__minimas__objetivosEspecificos"></textarea><div class="longitud__minima__grupal longitud__grupal'+contadorObjetivoEspecificos+'"></div></td><td style="padding:.5em;"><center><button style="padding:.5em; text-align:center; background:#b71c1c; color:white; border-radius:.4em;" id="eliminarEspecificos'+contadorObjetivoEspecificos+'" idContador="'+contadorObjetivoEspecificos+'"><i class="fas fa-trash"></i></button></center></td></tr></table>');

		/*=====================================
		=            Eliminar Fila            =
		=====================================*/
		
		$("#eliminarEspecificos"+contadorObjetivoEspecificos).click(function(e){

			var idContador=$(this).attr('idContador');

			$("#tablaObjetivosEspecificos"+idContador).remove();

		});
		
		/*=====  End of Eliminar Fila  ======*/
		

		/*=========================================
		=            Minímo caracteres            =
		=========================================*/
		
		var longitudCaracteresMinimaConjuntosEspecificos=function(parametro1,parametro2,counter){

			$(parametro1).keyup(function(e){

			   var words = $(parametro1).val().split(' '); 

			   if(words.length < parametro2){

			        counter.html("Son minimo <strong>"+parametro2+" palabras</strong>");

			        counter.css("color","red");

			    }else{

			      counter.html("");

			      counter.css("color","black");

			      counter.css("font-size","10px");

			    }

			 });

		}

		longitudCaracteresMinimaConjuntosEspecificos($("#objetivoEspecificos"+contadorObjetivoEspecificos),15,$(".longitud__grupal"+contadorObjetivoEspecificos));
		
		
		/*=====  End of Minímo caracteres  ======*/
		

	});

}

objetivosEspecificos($("#anadirObjetivosEspecificos"),$(".objetivos__especificos"));

/*=====  End of Tabla objetivos específicos  ======*/


/*========================================
=            Lineas Políticas            =
========================================*/

/*=======================================
=            Llamar checkeds            =
=======================================*/

	function validacionRegistroChecksCrea(parametro1){

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

/*=====  End of Llamar checkeds  ======*/



var lineasPoliticas=function(parametro1,parametro2,parametro3){


	$(parametro1).click(function(e){

		var condicion = $(parametro1).is(":checked");

		/*===============================
		=            Línea 1            =
		===============================*/
		
		var condicionLinea1 = $("#linea1").is(":checked");

		var checkedsLinea1=validacionRegistroChecksCrea(".checkeds__linea1");
		
		/*=====  End of Línea 1  ======*/
		

		/*===============================
		=            Línea 2            =
		===============================*/
		
		var condicionLinea2= $("#linea2").is(":checked");

		var checkedsLinea2=validacionRegistroChecksCrea(".checkeds__linea2");
		
		/*=====  End of Línea 2  ======*/

		/*===============================
		=            Línea 3            =
		===============================*/
		
		var condicionLinea3= $("#linea3").is(":checked");

		var checkedsLinea3=validacionRegistroChecksCrea(".checkeds__linea3");		
		
		/*=====  End of Línea 3  ======*/
		
		if(parametro3==3 && checkedsLinea3==true && !condicionLinea3){

			alertify.set("notifier","position", "top-right");
			alertify.notify("No se puede deseleccionar debido a que tiene marcado un objetivo estratégico en la línea política 3", "error", 5, function(){});

			e.preventDefault(); 

		}else if(parametro3==2 && checkedsLinea2==true && !condicionLinea2){

			alertify.set("notifier","position", "top-right");
			alertify.notify("No se puede deseleccionar debido a que tiene marcado un objetivo estratégico en la línea política 2", "error", 5, function(){});

			e.preventDefault(); 

		}else if (parametro3==1 && checkedsLinea1==true && !condicionLinea1) {


			alertify.set("notifier","position", "top-right");
			alertify.notify("No se puede deseleccionar debido a que tiene marcado un objetivo estratégico en la línea política 1", "error", 5, function(){});

			e.preventDefault(); 

		}else if (condicion) {

			switch (parametro3) {

	  			case 1:
	  				
	  				if (!condicionLinea1) {

	  					$(parametro2).append('<table class="objetivos__alineados1 objetivos__alineados1Objetivo__1"><tr class="objetivos__alineados1"><td style="padding:.5em; width:90%;" class="objetivo__indicador__1">Objetivo Estratégico 1: Contar con un marco jurídico funcional</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" texto="Objetivo Estratégico 1: Contar con un marco jurídico funcional" id="objetivo1" name="objetivo1" class="check__estilos__lineas checkeds__linea1"></center></td></tr></table>');


 						$(parametro2).append('<table class="objetivos__alineados1 objetivos__alineados1Objetivo__2"><tr class="objetivos__alineados1"><td style="padding:.5em; width:90%;" class="objetivo__indicador__2">Objetivo Estratégico 2: Desarrollar un sistema de comunicación del DEFIRE</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" texto="Objetivo Estratégico 2: Desarrollar un sistema de comunicación del DEFIRE" id="objetivo2" name="objetivo2" class="check__estilos__lineas checkeds__linea1"></center></td></tr></table>');


	  					$(parametro2).append('<table class="objetivos__alineados1 objetivos__alineados1Objetivo__3"><tr class="objetivos__alineados1"><td style="padding:.5em; width:90%;" class="objetivo__indicador__3">Objetivo Estratégico 3: Instaurar un sistema de formación y actualización continua para los actores del DEFIRE</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" texto="Objetivo Estratégico 3: Instaurar un sistema de formación y actualización continua para los actores del DEFIRE" id="objetivo3" name="objetivo3" class="check__estilos__lineas checkeds__linea1"></center></td></tr></table>');



						$(parametro2).append('<table class="objetivos__alineados1 objetivos__alineados1Objetivo__4"><tr class="objetivos__alineados1"><td style="padding:.5em; width:90%;" class="objetivo__indicador__4">Objetivo Estratégico 4: Implementar un sistema nacional de información del DEFIRE</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" texto="Objetivo Estratégico 4: Implementar un sistema nacional de información del DEFIRE" id="objetivo4" name="objetivo4" class="check__estilos__lineas checkeds__linea1"></center></td></tr></table>');


						$(parametro2).append('<table class="objetivos__alineados1 objetivos__alineados1Objetivo__5"><tr class="objetivos__alineados1"><td style="padding:.5em; width:90%;" class="objetivo__indicador__5">Objetivo Estratégico 5: Lograr un modelo de coordinación y coparticipación interinstitucional del DEFIRE</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" texto="Objetivo Estratégico 5: Lograr un modelo de coordinación y coparticipación interinstitucional del DEFIRE" id="objetivo5" name="objetivo5" class="check__estilos__lineas checkeds__linea1"></center></td></tr></table>');

						$(parametro2).append('<table class="objetivos__alineados1 objetivos__alineados1Objetivo__6"><tr class="objetivos__alineados1"><td style="padding:.5em; width:90%;" class="objetivo__indicador__6">Objetivo Estratégico 6: Garantizar la participación ciudadana en la política pública del DEFIRE</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" texto="Objetivo Estratégico 6: Garantizar la participación ciudadana en la política pública del DEFIRE" id="objetivo6" name="objetivo6" class="check__estilos__lineas checkeds__linea1"></center></td></tr></table>');

						$(parametro2).append('<table class="objetivos__alineados1 objetivos__alineados1Objetivo__7"><tr class="objetivos__alineados1"><td style="padding:.5em; width:90%;" class="objetivo__indicador__7">Objetivo Estratégico 7: Propiciar la investigación aplicada al DEFIRE</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" texto="Objetivo Estratégico 7: Propiciar la investigación aplicada al DEFIRE" id="objetivo7" name="objetivo7" class="check__estilos__lineas checkeds__linea1"></center></td></tr></table>');


	  					$(parametro2).append('<table class="objetivos__alineados1 objetivos__alineados1Objetivo__8"><tr class="objetivos__alineados1"><td style="padding:.5em; width:90%;" class="objetivo__indicador__8">Objetivo Estratégico 8: Lograr sostenibilidad financiera del sistema nacional del DEFIRE y sus organismos</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" texto="Objetivo Estratégico 8: Lograr sostenibilidad financiera del sistema nacional del DEFIRE y sus organismos" id="objetivo8" name="objetivo8" class="check__estilos__lineas checkeds__linea1"></center></td></tr></table>');


						$(parametro2).append('<table class="objetivos__alineados1 objetivos__alineados1Objetivo__9"><tr class="objetivos__alineados1"><td style="padding:.5em; width:90%;" class="objetivo__indicador__9">Objetivo Estratégico 9: Establecer modelos de gestión de calidad en los organismos del DEFIRE</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" texto="Objetivo Estratégico 9: Establecer modelos de gestión de calidad en los organismos del DEFIRE" id="objetivo9" name="objetivo9" class="check__estilos__lineas checkeds__linea1"></center></td></tr></table>');


	  					$(parametro2).append('<table class="objetivos__alineados1 objetivos__alineados1Objetivo__10"><tr class="objetivos__alineados1"><td style="padding:.5em; width:90%;" class="objetivo__indicador__10">Objetivo Estratégico 10: Optimizar la infraestructura del DEFIRE</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" texto="Objetivo Estratégico 10: Optimizar la infraestructura del DEFIRE" id="objetivo10" name="objetivo10" class="check__estilos__lineas checkeds__linea1"></center></td></tr></table>');


	  					$(parametro2).append('<table class="objetivos__alineados1 objetivos__alineados1Objetivo__11"><tr class="objetivos__alineados1"><td style="padding:.5em; width:90%;" class="objetivo__indicador__11">Objetivo Estratégico 11: Lograr un modelo de coordinación y coparticipación interinstitucional del DEFIRE</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" texto="Objetivo Estratégico 11: Lograr un modelo de coordinación y coparticipación interinstitucional del DEFIRE" id="objetivo11" name="objetivo11" class="check__estilos__lineas checkeds__linea1"></center></td></tr></table>');


	  				}

	  				
	  				/*======================================
	  				=            Generar tablas            =
	  				======================================*/
	  				
	  				var generarTablasEspecificas=function(parametro1,parametro2,parametro3,parametro4){

						$(parametro1).click(function(){

							var condicion = $(this).is(":checked");

							if (condicion) {

								$(parametro4).addClass('cambiandoColor');

								switch (parametro3) {

						  			case 1:


							  			$(parametro2).append('<tr class="objetivos__alineados1Objetivo1 objetivos__alineados1"><td style="padding:.5em; width:90%;">1.1 Reestructuración de la normativa a partir de la reforma a la ley vigente que rija al sector</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="marcoJuridicoObjetivo1" name="marcoJuridicoObjetivo1" class="check__estilos__lineas checkeds__linea1Objetivo1" /></center></td></tr>');

							  			$(parametro2).append('<tr class="objetivos__alineados1Objetivo1 objetivos__alineados1"><td style="padding:.5em; width:90%;">1.2 Conformación de comités interinstitucionales y ciudadanos para hacer seguimiento y veeduría a la aplicación de la normativa legal vigente</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="marcoJuridicoObjetivo2" name="marcoJuridicoObjetivo2" class="check__estilos__lineas checkeds__linea1Objetivo1" /></center></td></tr>');

							  			$(parametro2).append('<tr class="objetivos__alineados1Objetivo1 objetivos__alineados1"><td style="padding:.5em; width:90%;">1.3 Integración de los actores directos e indirectos del DEFIRE en la propuesta de un marco jurídico que coadyuve a la gobernanza del sistema</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="marcoJuridicoObjetivo3" name="marcoJuridicoObjetivo3" class="check__estilos__lineas checkeds__linea1Objetivo1" /></center></td></tr>');


						  			break;

						  			case 2:

						  				$(parametro2).append('<tr class="objetivos__alineados1Objetivo2 objetivos__alineados1"><td style="padding:.5em; width:90%;">2.1 Implementación de planes de comunicación que fortalezcan la acciones del DEFIRE en todo el sector</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="sistemaComunicacionObjetivo1" name="sistemaComunicacionObjetivo1" class="check__estilos__lineas checkeds__linea1Objetivo2" /></center></td></tr>');

						  				$(parametro2).append('<tr class="objetivos__alineados1Objetivo2 objetivos__alineados1"><td style="padding:.5em; width:90%;">2.2 Suscripción de convenios con universidades para prácticas pre profesionales de comunicación en las organizaciones del DEFIRE</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="sistemaComunicacionObjetivo2" name="sistemaComunicacionObjetivo2" class="check__estilos__lineas checkeds__linea1Objetivo2" /></center></td></tr>');

						  				$(parametro2).append('<tr class="objetivos__alineados1Objetivo2 objetivos__alineados1"><td style="padding:.5em; width:90%;">2.3 Sensibilización de la comunidad para el cambio sobre la importancia de la práctica de la actividad física y el uso del tiempo libre</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="sistemaComunicacionObjetivo3" name="sistemaComunicacionObjetivo3" class="check__estilos__lineas checkeds__linea1Objetivo2" /></center></td></tr>');

						  				$(parametro2).append('<tr class="objetivos__alineados1Objetivo2 objetivos__alineados1"><td style="padding:.5em; width:90%;">2.4 Fomento del uso de comunicación y nuevas tecnologías para la promoción del DEFIRE</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="sistemaComunicacionObjetivo4" name="sistemaComunicacionObjetivo4" class="check__estilos__lineas checkeds__linea1Objetivo2" /></center></td></tr>');

						  			break;

						  			case 3:

						  				$(parametro2).append('<tr class="objetivos__alineados1Objetivo3 objetivos__alineados1"><td style="padding:.5em; width:90%;">3.1 Desarrollo del plan nacional de capacitación de los actores del DEFIRE</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="sistemaFormacionObjetivo1" name="sistemaFormacionObjetivo1" class="check__estilos__lineas checkeds__linea1Objetivo3" /></center></td></tr>');

						  				$(parametro2).append('<tr class="objetivos__alineados1Objetivo3 objetivos__alineados1"><td style="padding:.5em; width:90%;">3.2 Desarrollo de herramientas tecnológicas de fácil acceso para agilizar los proceso técnicos y administrativos de las organizaciones del sector DEFIRE</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="sistemaFormacionObjetivo2" name="sistemaFormacionObjetivo2" class="check__estilos__lineas checkeds__linea1Objetivo3" /></center></td></tr>');

						  				$(parametro2).append('<tr class="objetivos__alineados1Objetivo3 objetivos__alineados1"><td style="padding:.5em; width:90%;">3.3 Implementación de nuevas tecnologías TICS por medio de plataformas digitales y software</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="sistemaFormacionObjetivo3" name="sistemaFormacionObjetivo3" class="check__estilos__lineas checkeds__linea1Objetivo3" /></center></td></tr>');

						  				$(parametro2).append('<tr class="objetivos__alineados1Objetivo3 objetivos__alineados1"><td style="padding:.5em; width:90%;">3.4 Reforma de la normativa legal vigente para la profesionalización, exigiendo niveles educativos para ocupar cargos en el sector y su respectiva actualización</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="sistemaFormacionObjetivo4" name="sistemaFormacionObjetivo4" class="check__estilos__lineas checkeds__linea1Objetivo3" /></center></td></tr>');
						  			break;

						  			case 4:

						  				$(parametro2).append('<tr class="objetivos__alineados1Objetivo4 objetivos__alineados1"><td style="padding:.5em; width:90%;">4.1 Fortalecimiento de las organizaciones del DEFIRE en la generación, almacenamiento de información, estadísticas y análisis de datos, así como cogestores del desarrollo del sector</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="implementarSistemaNacionalObjetivo1" name="implementarSistemaNacionalObjetivo1" class="check__estilos__lineas checkeds__linea1Objetivo4" /></center></td></tr>');

						  			break;

						  			case 5:

						  				$(parametro2).append('<tr class="objetivos__alineados1Objetivo5 objetivos__alineados1"><td style="padding:.5em; width:90%;">5.1 Fortalecimiento de la corresponsabilidad interinstitucional e intersectorial y nuevos aliados estratégicos nacionales e internacionales</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="modeloCoordinacionObjetivo1" name="modeloCoordinacionObjetivo1" class="check__estilos__lineas checkeds__linea1Objetivo5" /></center></td></tr>');

						  			break;


						  			case 6:

						  				$(parametro2).append('<tr class="objetivos__alineados1Objetivo6 objetivos__alineados1"><td style="padding:.5em; width:90%;">6.1 Consolidación de mecanismos de participación ciudadana con filosofía de Gobiernos Abiertos</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="participacionCiudadanaObjetivo1" name="participacionCiudadanaObjetivo1" class="check__estilos__lineas checkeds__linea1Objetivo6" /></center></td></tr>');

						  				$(parametro2).append('<tr class="objetivos__alineados1Objetivo6 objetivos__alineados1"><td style="padding:.5em; width:90%;">6.2 Generación de instrumentos técnicos y jurídicos que coadyuven eficazmente a la trasparencia y a la rendición de cuentas</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="participacionCiudadanaObjetivo2" name="participacionCiudadanaObjetivo2" class="check__estilos__lineas checkeds__linea1Objetivo6" /></center></td></tr>');

						  			break;

						  			case 7:

						  				$(parametro2).append('<tr class="objetivos__alineados1Objetivo7 objetivos__alineados1"><td style="padding:.5em; width:90%;">7.1 Creación del fondo nacional de investigación que dé directrices y cofinancie la investigación de acuerdo con las necesidades del DEFIRE</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="propiciarInvestigacionObjetivo1" name="propiciarInvestigacionObjetivo1" class="check__estilos__lineas checkeds__linea1Objetivo7" /></center></td></tr>');

						  				$(parametro2).append('<tr class="objetivos__alineados1Objetivo7 objetivos__alineados1"><td style="padding:.5em; width:90%;">7.2 Implementación de un Centro d Estudios, Investigación y Capacitación de la Cultura Física responsable de llevar las estadísticas del sector a nivel nacional</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="propiciarInvestigacionObjetivo2" name="propiciarInvestigacionObjetivo2" class="check__estilos__lineas checkeds__linea1Objetivo7" /></center></td></tr>');

						  			break;


						  			case 8:

						  				$(parametro2).append('<tr class="objetivos__alineados1Objetivo8 objetivos__alineados1"><td style="padding:.5em; width:90%;">8.1 Desarrollo de modelos de gestión de proyectos público – privado que favorezca la sostenibilidad del sector</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="lograrSostenibilidadObjetivo1" name="lograrSostenibilidadObjetivo1" class="check__estilos__lineas checkeds__linea1Objetivo8" /></center></td></tr>');

						  				$(parametro2).append('<tr class="objetivos__alineados1Objetivo8 objetivos__alineados1"><td style="padding:.5em; width:90%;">8.2 Implementación de lineamientos que direccionen la efectividad en la administración y la gestión de los recursos que entrega el Estado a los organismos deportivos</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="lograrSostenibilidadObjetivo2" name="lograrSostenibilidadObjetivo2" class="check__estilos__lineas checkeds__linea1Objetivo8" /></center></td></tr>');

						  				$(parametro2).append('<tr class="objetivos__alineados1Objetivo8 objetivos__alineados1"><td style="padding:.5em; width:90%;">8.3 Fortalecimiento del giro del negocio o actividad económica de los organismos del sector en pro de la auto-eficiencia y autogestión</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="lograrSostenibilidadObjetivo3" name="lograrSostenibilidadObjetivo3" class="check__estilos__lineas checkeds__linea1Objetivo8" /></center></td></tr>');

						  				$(parametro2).append('<tr class="objetivos__alineados1Objetivo8 objetivos__alineados1"><td style="padding:.5em; width:90%;">8.4 Desarrollo de lineamientos y estímulos a los organismos del DEFIRE para fomentar la sostenibilidad financiera a través de la autogestión</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="lograrSostenibilidadObjetivo4" name="lograrSostenibilidadObjetivo4" class="check__estilos__lineas checkeds__linea1Objetivo8" /></center></td></tr>');

						  				$(parametro2).append('<tr class="objetivos__alineados1Objetivo8 objetivos__alineados1"><td style="padding:.5em; width:90%;">8.5 Creación del fondo nacional de fomento al desarrollo del DEFIRE (FONDEFIRE)</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="lograrSostenibilidadObjetivo5" name="lograrSostenibilidadObjetivo5" class="check__estilos__lineas checkeds__linea1Objetivo8" /></center></td></tr>');

						  			break;

						  			case 9:

						  				$(parametro2).append('<tr class="objetivos__alineados1Objetivo9 objetivos__alineados1"><td style="padding:.5em; width:90%;">9.1 Generación de lineamientos técnicos, administrativos, innovadores y eficientes</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="modelosDeGestionObjetivo1" name="modelosDeGestionObjetivo1" class="check__estilos__lineas checkeds__linea1Objetivo9" /></center></td></tr>');

						  			break;

						  			case 10:

						  				$(parametro2).append('<tr class="objetivos__alineados1Objetivo10 objetivos__alineados1"><td style="padding:.5em; width:90%;">10.1 Desarrollo de modelos de gestión, protocolos y lineamientos administrativos y técnicos participativos</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="optimizarInfraestructuraObjetivo1" name="optimizarInfraestructuraObjetivo1" class="check__estilos__lineas checkeds__linea1Objetivo10" /></center></td></tr>');

						  				$(parametro2).append('<tr class="objetivos__alineados1Objetivo10 objetivos__alineados1"><td style="padding:.5em; width:90%;">10.2 Fortalecimiento de los procesos de asociación público-privada y entes territoriales para la construcción y gestión de centros deportivos y recreativos, como parques bio saludables</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="optimizarInfraestructuraObjetivo2" name="optimizarInfraestructuraObjetivo2" class="check__estilos__lineas checkeds__linea1Objetivo10" /></center></td></tr>');

						  				$(parametro2).append('<tr class="objetivos__alineados1Objetivo10 objetivos__alineados1"><td style="padding:.5em; width:90%;">10.3 Coparticipación para la adecuación de parques, espacios públicos y lugares abiertos en mal estado, abandonados y deteriorados para la masificación DEFIRE</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="optimizarInfraestructuraObjetivo3" name="optimizarInfraestructuraObjetivo3" class="check__estilos__lineas checkeds__linea1Objetivo10" /></center></td></tr>');

						  				$(parametro2).append('<tr class="objetivos__alineados1Objetivo10 objetivos__alineados1"><td style="padding:.5em; width:90%;">10.4 Aprovechamiento de la infraestructura deportiva de los centros escolares nacionales para uso social comunitario</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="optimizarInfraestructuraObjetivo4" name="optimizarInfraestructuraObjetivo4" class="check__estilos__lineas checkeds__linea1Objetivo10" /></center></td></tr>');

						  				$(parametro2).append('<tr class="objetivos__alineados1Objetivo10 objetivos__alineados1"><td style="padding:.5em; width:90%;">10.5 Implementación de un banco de tierras para la construcción de obras de infraestructura del DEFIRE, en conjunto con los territorios </td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="optimizarInfraestructuraObjetivo5" name="optimizarInfraestructuraObjetivo5" class="check__estilos__lineas checkeds__linea1Objetivo10" /></center></td></tr>');

						  			break;

						  			case 11:

						  				$(parametro2).append('<tr class="objetivos__alineados1Objetivo11 objetivos__alineados1"><td style="padding:.5em; width:90%;">11.1 Implementación de programas de fomento y promoción del voluntariado</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="modeloCoordinacionObjetivo1" name="modeloCoordinacionObjetivo1" class="check__estilos__lineas checkeds__linea1Objetivo11" /></center></td></tr>');

						  				$(parametro2).append('<tr class="objetivos__alineados1Objetivo11 objetivos__alineados1"><td style="padding:.5em; width:90%;">11.2 Fomento de estructuras organizativas que se encarguen de canalizar acciones en el campo del voluntariado</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="modeloCoordinacionObjetivo2" name="modeloCoordinacionObjetivo2" class="check__estilos__lineas checkeds__linea1Objetivo11" /></center></td></tr>');

						  			break;


						  		}

							}else{


								switch (parametro3) {

						  			case 1:

						  				$(".objetivos__alineados1Objetivo1").remove();

						  				$(parametro4).removeClass('cambiandoColor');

						  			break;

						  			case 2:

						  				$(".objetivos__alineados1Objetivo2").remove();

						  				$(parametro4).removeClass('cambiandoColor');

						  			break;


						  			case 3:

						  				$(".objetivos__alineados1Objetivo3").remove();

						  				$(parametro4).removeClass('cambiandoColor');

						  			break;

						  			case 4:

						  				$(".objetivos__alineados1Objetivo4").remove();

						  				$(parametro4).removeClass('cambiandoColor');

						  			break;

						  			case 5:

						  				$(".objetivos__alineados1Objetivo5").remove();

						  				$(parametro4).removeClass('cambiandoColor');

						  			break;

						  			case 6:

						  				$(".objetivos__alineados1Objetivo6").remove();

						  				$(parametro4).removeClass('cambiandoColor');

						  			break;


						  			case 7:

						  				$(".objetivos__alineados1Objetivo7").remove();

						  				$(parametro4).removeClass('cambiandoColor');

						  			break;


						  			case 8:

						  				$(".objetivos__alineados1Objetivo8").remove();

						  				$(parametro4).removeClass('cambiandoColor');

						  			break;

						  			case 9:

						  				$(".objetivos__alineados1Objetivo9").remove();

						  				$(parametro4).removeClass('cambiandoColor');

						  			break;

						  			case 10:

						  				$(".objetivos__alineados1Objetivo10").remove();

						  				$(parametro4).removeClass('cambiandoColor');

						  			break;

						  			case 11:

						  				$(".objetivos__alineados1Objetivo11").remove();

						  				$(parametro4).removeClass('cambiandoColor');

						  			break;


						  		}

							}

						});


					}

					generarTablasEspecificas($("#objetivo1"),$(".objetivos__alineados1Objetivo__1"),1,$(".objetivo__indicador__1"));
					generarTablasEspecificas($("#objetivo2"),$(".objetivos__alineados1Objetivo__2"),2,$(".objetivo__indicador__2"));
					generarTablasEspecificas($("#objetivo3"),$(".objetivos__alineados1Objetivo__3"),3,$(".objetivo__indicador__3"));
	  				generarTablasEspecificas($("#objetivo4"),$(".objetivos__alineados1Objetivo__4"),4,$(".objetivo__indicador__4"));
					generarTablasEspecificas($("#objetivo5"),$(".objetivos__alineados1Objetivo__5"),5,$(".objetivo__indicador__5"));
					generarTablasEspecificas($("#objetivo6"),$(".objetivos__alineados1Objetivo__6"),6,$(".objetivo__indicador__6"));
					generarTablasEspecificas($("#objetivo7"),$(".objetivos__alineados1Objetivo__7"),7,$(".objetivo__indicador__7"));
					generarTablasEspecificas($("#objetivo8"),$(".objetivos__alineados1Objetivo__8"),8,$(".objetivo__indicador__8"));
					generarTablasEspecificas($("#objetivo9"),$(".objetivos__alineados1Objetivo__9"),9,$(".objetivo__indicador__9"));
	  				generarTablasEspecificas($("#objetivo10"),$(".objetivos__alineados1Objetivo__10"),10,$(".objetivo__indicador__10"));
					generarTablasEspecificas($("#objetivo11"),$(".objetivos__alineados1Objetivo__11"),11,$(".objetivo__indicador__11"));
					

	  				/*=====  End of Generar tablas  ======*/
	  				

	  			break;

	  			case 2:

	  				if(!condicionLinea2){

	  					$(parametro2).append('<table class="objetivos__alineados2 objetivos__alineados2Objetivo__1"><tr class="objetivos__alineados2"><td style="padding:.5em; width:90%;" class="objetivo2__indicador__1">Objetivo Estratégico 1: Conseguir que los ciudadanos adopten la cultura física</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="objetivoLineaDos1" name="objetivoLineaDos1" class="check__estilos__lineas checkeds__linea2"></center></td></tr></table>');

		  				$(parametro2).append('<table class="objetivos__alineados2 objetivos__alineados2Objetivo__2"><tr class="objetivos__alineados2"><td style="padding:.5em; width:90%;" class="objetivo2__indicador__2">Objetivo Estratégico 2: Posicionar al país como sede de eventos internacionales del DEFIRE</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="objetivoLineaDos2" name="objetivoLineaDos2" class="check__estilos__lineas checkeds__linea2"></center></td></tr></table>');

		  				$(parametro2).append('<table class="objetivos__alineados2 objetivos__alineados2Objetivo__3"><tr class="objetivos__alineados2"><td style="padding:.5em; width:90%;" class="objetivo2__indicador__3">Objetivo Estratégico 3: Promover la práctica de la educación física en el sistema educativo</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="objetivoLineaDos3" name="objetivoLineaDos3" class="check__estilos__lineas checkeds__linea2"></center></td></tr></table>');

		  				 $(parametro2).append('<table class="objetivos__alineados2 objetivos__alineados2Objetivo__4"><tr class="objetivos__alineados2"><td style="padding:.5em; width:90%;" class="objetivo2__indicador__4">Objetivo Estratégico 4: Incrementar la oferta de programas para cada grupo etario</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="objetivoLineaDos4" name="objetivoLineaDos4" class="check__estilos__lineas checkeds__linea2"></center></td></tr></table>');

	  				}

		  				/*======================================
		  				=            Generar tablas            =
		  				======================================*/
		  	  			var generarTablasEspecificas2=function(parametro1,parametro2,parametro3,parametro4){

							$(parametro1).click(function(){

								var condicion = $(this).is(":checked");

								if (condicion) {

									$(parametro4).addClass('cambiandoColor');

									switch (parametro3) {


										case 1:

											$(parametro2).append('<tr class="objetivos__alineados2Objetivo1 objetivos__alineados2"><td style="padding:.5em; width:90%;">1.1 Implementación de la certificación activa y saludable (Municipios, colegios, instituciones públicas y privadas, entre otros)</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="implementacionMunicipiosColegiosObjetivo1" name="implementacionMunicipiosColegiosObjetivo1" class="check__estilos__lineas checkeds__linea2Objetivo1" /></center></td></tr>');

											$(parametro2).append('<tr class="objetivos__alineados2Objetivo1 objetivos__alineados2"><td style="padding:.5em; width:90%;">1.2 Promoción de iniciativas públicas y privadas de prescripción de la actividad física como factor de prevención en salud para un bienestar activo</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="implementacionMunicipiosColegiosObjetivo2" name="implementacionMunicipiosColegiosObjetivo2" class="check__estilos__lineas checkeds__linea2Objetivo1" /></center></td></tr>');

											$(parametro2).append('<tr class="objetivos__alineados2Objetivo1 objetivos__alineados2"><td style="padding:.5em; width:90%;">1.3 Fomento de la coparticipación y corre acción de iniciativas locales para el desarrollo del DEFIRE, como programas de desplazamiento activo</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="implementacionMunicipiosColegiosObjetivo3" name="implementacionMunicipiosColegiosObjetivo3" class="check__estilos__lineas checkeds__linea2Objetivo1" /></center></td></tr>');

											$(parametro2).append('<tr class="objetivos__alineados2Objetivo1 objetivos__alineados2"><td style="padding:.5em; width:90%;">1.4 Sensibilización a todos los actores del sistema en la búsqueda de modelos de desarrollo sustentable y sostenible en todos los ámbitos</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="implementacionMunicipiosColegiosObjetivo4" name="implementacionMunicipiosColegiosObjetivo4" class="check__estilos__lineas checkeds__linea2Objetivo1" /></center></td></tr>');


										break;

										case 2:

											$(parametro2).append('<tr class="objetivos__alineados2Objetivo2 objetivos__alineados2"><td style="padding:.5em; width:90%;">2.1 Estímulo para el desarrollo de eventos internacionales del DEFIRE en conjunto con los entes territoriales, organismos deportivos, e instituciones públicas y privadas</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="posicionarPaisObjetivo1" name="posicionarPaisObjetivo1" class="check__estilos__lineas checkeds__linea2Objetivo2" /></center></td></tr>');

											$(parametro2).append('<tr class="objetivos__alineados2Objetivo2 objetivos__alineados2"><td style="padding:.5em; width:90%;">2.2 Preparación de la dirigencia ecuatoriana en liderazgo para el posicionamiento a nivel internacional</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="posicionarPaisObjetivo2" name="posicionarPaisObjetivo2" class="check__estilos__lineas checkeds__linea2Objetivo2" /></center></td></tr>');

											$(parametro2).append('<tr class="objetivos__alineados2Objetivo2 objetivos__alineados2"><td style="padding:.5em; width:90%;">2.3 Desarrollo de programas que resalte la labor de los atletas, entrenadores, dirigentes y voluntariado, a través del reconocimiento local, zonal, nacional e internacional</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="posicionarPaisObjetivo3" name="posicionarPaisObjetivo3" class="check__estilos__lineas checkeds__linea2Objetivo2" /></center></td></tr>');


										break;

										case 3:

											$(parametro2).append('<tr class="objetivos__alineados2Objetivo3 objetivos__alineados2"><td style="padding:.5em; width:90%;">3.1 Implementación de la oferta de programas incluyentes para la oferta de programas incluyentes para la población estudiantil</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="practicaEducacionFisicaObjetivo1" name="practicaEducacionFisicaObjetivo1" class="check__estilos__lineas checkeds__linea2Objetivo3" /></center></td></tr>');

											$(parametro2).append('<tr class="objetivos__alineados2Objetivo3 objetivos__alineados2"><td style="padding:.5em; width:90%;">3.2 Implementación de centros especializados de educación física incluyente en alianza con los gobiernos locales y empresa privada</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="practicaEducacionFisicaObjetivo2" name="practicaEducacionFisicaObjetivo2" class="check__estilos__lineas checkeds__linea2Objetivo3" /></center></td></tr>');

											$(parametro2).append('<tr class="objetivos__alineados2Objetivo3 objetivos__alineados2"><td style="padding:.5em; width:90%;">3.3 Implementación de eventos deportivos incluyentes que permitan la integración del sistema</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="practicaEducacionFisicaObjetivo3" name="practicaEducacionFisicaObjetivo3" class="check__estilos__lineas checkeds__linea2Objetivo3" /></center></td></tr>');


										break;

										case 4:

											$(parametro2).append('<tr class="objetivos__alineados2Objetivo4 objetivos__alineados2"><td style="padding:.5em; width:90%;">4.1 Masificación del DEFIRE con una amplia gama de oferta de programas por grupo etario</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="masificacionDefireObjetivo1" name="masificacionDefireObjetivo1" class="check__estilos__lineas checkeds__linea2Objetivo4" /></center></td></tr>');

											$(parametro2).append('<tr class="objetivos__alineados2Objetivo4 objetivos__alineados2"><td style="padding:.5em; width:90%;">4.2 Gama de oferta de programas para personas con discapacidad</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="masificacionDefireObjetivo2" name="masificacionDefireObjetivo2" class="check__estilos__lineas checkeds__linea2Objetivo4" /></center></td></tr>');

										break;


									}				


								}else{

									switch (parametro3) {

										case 1:

							  				$(".objetivos__alineados2Objetivo1").remove();

							  				$(parametro4).removeClass('cambiandoColor');

							  			break;


										case 2:

							  				$(".objetivos__alineados2Objetivo2").remove();

							  				$(parametro4).removeClass('cambiandoColor');

							  			break;


										case 3:

							  				$(".objetivos__alineados2Objetivo3").remove();

							  				$(parametro4).removeClass('cambiandoColor');

							  			break;


										case 4:

							  				$(".objetivos__alineados2Objetivo4").remove();

							  				$(parametro4).removeClass('cambiandoColor');

							  			break;

									}			


								}

							});
		  				
		  				}

		  				generarTablasEspecificas2($("#objetivoLineaDos1"),$(".objetivos__alineados2Objetivo__1"),1,$(".objetivo2__indicador__1"));
		  				generarTablasEspecificas2($("#objetivoLineaDos2"),$(".objetivos__alineados2Objetivo__2"),2,$(".objetivo2__indicador__2"));
		  				generarTablasEspecificas2($("#objetivoLineaDos3"),$(".objetivos__alineados2Objetivo__3"),3,$(".objetivo2__indicador__3"));
		  				generarTablasEspecificas2($("#objetivoLineaDos4"),$(".objetivos__alineados2Objetivo__4"),4,$(".objetivo2__indicador__4"));


		  				/*=====  End of Generar tablas  ======*/
		  				

	  			break;

	  			case 3:

	  				if(!condicionLinea3){

		  				$(parametro2).append('<table class="objetivos__alineados3 objetivos__alineados3Objetivo__1"><tr class="objetivos__alineados3"><td style="padding:.5em; width:90%;" class="objetivo3__indicador__1">Objetivo Estratégico 1: Mejorar significativamente las posiciones</td><td style="padding:.5em; width:90%;"><center><input type="checkbox" id="objetivoLineaTres1" name="objetivoLineaTres1" class="check__estilos__lineas checkeds__linea3"></center></td></tr></table>');

		  				$(parametro2).append('<table class="objetivos__alineados3 objetivos__alineados3Objetivo__2"><tr class="objetivos__alineados3"><td style="padding:.5em; width:90%;" class="objetivo3__indicador__2">Objetivo Estratégico 2: Implementar un sistema nacional de preparación y competición</td><td style="padding:.5em; width:90%;"><center><input type="checkbox" id="objetivoLineaTres2" name="objetivoLineaTres2" class="check__estilos__lineas checkeds__linea3"></center></td></tr></table>');

		  				$(parametro2).append('<table class="objetivos__alineados3 objetivos__alineados3Objetivo__3"><tr class="objetivos__alineados3"><td style="padding:.5em; width:90%;" class="objetivo3__indicador__3">Objetivo Estratégico 3: Incrementar la población de atletas convencionales y con discapacidad con resultados deportivos a nivel regional, continental y mundial</td><td style="padding:.5em; width:90%;"><center><input type="checkbox" id="objetivoLineaTres3" name="objetivoLineaTres3" class="check__estilos__lineas checkeds__linea3"></center></td></tr></table>');

		  				$(parametro2).append('<table class="objetivos__alineados3 objetivos__alineados3Objetivo__4"><tr class="objetivos__alineados3"><td style="padding:.5em; width:90%;" class="objetivo3__indicador__4">Objetivo Estratégico 4: Implementar las acciones del control dopaje en las delegaciones nacionales que representen al país</td><td style="padding:.5em; width:90%;"><center><input type="checkbox" id="objetivoLineaTres4" name="objetivoLineaTres4" class="check__estilos__lineas checkeds__linea3"></center></td></tr></table>');

		  				$(parametro2).append('<table class="objetivos__alineados3 objetivos__alineados3Objetivo__5"><tr class="objetivos__alineados3"><td style="padding:.5em; width:90%;" class="objetivo3__indicador__5">Objetivo Estratégico 5: Potenciar un sistema nacional de educación y prevención temprana del dopaje</td><td style="padding:.5em; width:90%;"><center><input type="checkbox" id="objetivoLineaTres5" name="objetivoLineaTres5" class="check__estilos__lineas checkeds__linea3"></center></td></tr></table>');

		  			}

	  				/*======================================
	  				=            Generar Tablas            =
	  				======================================*/
	  				
		  	  		var generarTablasEspecificas3=function(parametro1,parametro2,parametro3,parametro4){

						$(parametro1).click(function(){

							var condicion = $(this).is(":checked");

							if (condicion) {

								$(parametro4).addClass('cambiandoColor');

								switch (parametro3) {	  	

									case 1:

										$(parametro2).append('<tr class="objetivos__alineados3Objetivo1 objetivos__alineados3"><td style="padding:.5em; width:90%;">1.1 Desarrollo de lineamientos y criterios técnicos que permitan la priorización de deportes, atletas y eventos</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="significativamentePosicionesObjetivo1" name="significativamentePosicionesObjetivo1" class="check__estilos__lineas checkeds__linea3Objetivo1" /></center></td></tr>');

										$(parametro2).append('<tr class="objetivos__alineados3Objetivo1 objetivos__alineados3"><td style="padding:.5em; width:90%;">1.2 Establecimiento de lineamientos para la creación de un sistema de ciencias aplicadas al deporte convencional y adaptado</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="significativamentePosicionesObjetivo2" name="significativamentePosicionesObjetivo2" class="check__estilos__lineas checkeds__linea3Objetivo1" /></center></td></tr>');

										$(parametro2).append('<tr class="objetivos__alineados3Objetivo1 objetivos__alineados3"><td style="padding:.5em; width:90%;">1.3 Establecimiento de lineamientos para la creación de un sistema de seguimiento técnico y metodológico desde la base, desarrollo y alto nivel competitivo</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="significativamentePosicionesObjetivo3" name="significativamentePosicionesObjetivo3" class="check__estilos__lineas checkeds__linea3Objetivo1" /></center></td></tr>');

										$(parametro2).append('<tr class="objetivos__alineados3Objetivo1 objetivos__alineados3"><td style="padding:.5em; width:90%;">1.4 Implementación de programas de apoyo al alto rendimiento en todo el país</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="significativamentePosicionesObjetivo4" name="significativamentePosicionesObjetivo4" class="check__estilos__lineas checkeds__linea3Objetivo1" /></center></td></tr>');

										$(parametro2).append('<tr class="objetivos__alineados3Objetivo1 objetivos__alineados3"><td style="padding:.5em; width:90%;">1.5 Implementación de un programa nacional de estímulos económicos por resultados deportivos</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="significativamentePosicionesObjetivo5" name="significativamentePosicionesObjetivo5" class="check__estilos__lineas checkeds__linea3Objetivo1" /></center></td></tr>');

										$(parametro2).append('<tr class="objetivos__alineados3Objetivo1 objetivos__alineados3"><td style="padding:.5em; width:90%;">1.6 Implementación de un programa nacional de pensión vitalicia para atletas convencionales y con discapacidad en retiro deportivo</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="significativamentePosicionesObjetivo6" name="significativamentePosicionesObjetivo6" class="check__estilos__lineas checkeds__linea3Objetivo1" /></center></td></tr>');

									break;

									case 2:

										$(parametro2).append('<tr class="objetivos__alineados3Objetivo2 objetivos__alineados3"><td style="padding:.5em; width:90%;">2.1 Implementación de un modelo nacional de competiciones</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="sistemaPreparacionNacionalObjetivo1" name="sistemaPreparacionNacionalObjetivo1" class="check__estilos__lineas checkeds__linea3Objetivo2" /></center></td></tr>');

										$(parametro2).append('<tr class="objetivos__alineados3Objetivo2 objetivos__alineados3"><td style="padding:.5em; width:90%;">2.2 Implementación de un modelo nacional de competiciones</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="sistemaPreparacionNacionalObjetivo2" name="sistemaPreparacionNacionalObjetivo2" class="check__estilos__lineas checkeds__linea3Objetivo2" /></center></td></tr>');

									break;

									case 3:

										$(parametro2).append('<tr class="objetivos__alineados3Objetivo3 objetivos__alineados3"><td style="padding:.5em; width:90%;">3.1 Estructuración de un modelo nacional de detección selección, capacitación y desarrollo de atletas convencionales y con discapacidad</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="incrementarPoblacionAtletasObjetivo1" name="incrementarPoblacionAtletasObjetivo1" class="check__estilos__lineas checkeds__linea3Objetivo3" /></center></td></tr>');

										$(parametro2).append('<tr class="objetivos__alineados3Objetivo3 objetivos__alineados3"><td style="padding:.5em; width:90%;">3.2 Fomento y promoción de clubes deportivos convencional y adaptado como cédula del desarrollo deportivo </td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="incrementarPoblacionAtletasObjetivo2" name="incrementarPoblacionAtletasObjetivo2" class="check__estilos__lineas checkeds__linea3Objetivo3" /></center></td></tr>');

										$(parametro2).append('<tr class="objetivos__alineados3Objetivo3 objetivos__alineados3"><td style="padding:.5em; width:90%;">3.3 Estructuración de planes, programas o proyectos para profesionalizar la labor del entrenador, dirigentes y grupo multidisciplinario</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="incrementarPoblacionAtletasObjetivo3" name="incrementarPoblacionAtletasObjetivo3" class="check__estilos__lineas checkeds__linea3Objetivo3" /></center></td></tr>');


									break;

									case 4:

										$(parametro2).append('<tr class="objetivos__alineados3Objetivo4 objetivos__alineados3"><td style="padding:.5em; width:90%;">4.1 Implementación de un modelo de gestión de toma de muestras en competición y fuera de competición</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="accionesDopajeObjetivo1" name="accionesDopajeObjetivo1" class="check__estilos__lineas checkeds__linea3Objetivo4" /></center></td></tr>');

										$(parametro2).append('<tr class="objetivos__alineados3Objetivo4 objetivos__alineados3"><td style="padding:.5em; width:90%;">4.2 Incremento de Oficiales de Control Dopaje en todo el país</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="accionesDopajeObjetivo2" name="accionesDopajeObjetivo2" class="check__estilos__lineas checkeds__linea3Objetivo4" /></center></td></tr>');


									break;

									case 5:

										$(parametro2).append('<tr class="objetivos__alineados3Objetivo5 objetivos__alineados3"><td style="padding:.5em; width:90%;">5.1 Planificación e implementación de un modelo de capacitación nacional que involucre los diferentes medios tecnológicos disponibles</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="sistemaPrenvencionObjetivo1" name="sistemaPrenvencionObjetivo1" class="check__estilos__lineas checkeds__linea3Objetivo5" /></center></td></tr>');

										$(parametro2).append('<tr class="objetivos__alineados3Objetivo5 objetivos__alineados3"><td style="padding:.5em; width:90%;">5.2 Implementación de charlas de control dopaje en las instituciones educativas</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="sistemaPrenvencionObjetivo2" name="sistemaPrenvencionObjetivo2" class="check__estilos__lineas checkeds__linea3Objetivo5" /></center></td></tr>');

									break;


								}

							}else{

								switch (parametro3) {	  	

									case 1:

							  			$(".objetivos__alineados3Objetivo1").remove();

							  			$(parametro4).removeClass('cambiandoColor');

									break;

									case 2:

							  			$(".objetivos__alineados3Objetivo2").remove();

							  			$(parametro4).removeClass('cambiandoColor');

									break;

									case 3:

							  			$(".objetivos__alineados3Objetivo3").remove();

							  			$(parametro4).removeClass('cambiandoColor');

									break;


									case 4:

							  			$(".objetivos__alineados3Objetivo4").remove();

							  			$(parametro4).removeClass('cambiandoColor');

									break;

									case 5:

							  			$(".objetivos__alineados3Objetivo5").remove();

							  			$(parametro4).removeClass('cambiandoColor');

									break;


								}								

							}

						});

					}

					generarTablasEspecificas3($("#objetivoLineaTres1"),$(".objetivos__alineados3Objetivo__1"),1,$(".objetivo3__indicador__1"));			
					generarTablasEspecificas3($("#objetivoLineaTres2"),$(".objetivos__alineados3Objetivo__2"),2,$(".objetivo3__indicador__2"));	
					generarTablasEspecificas3($("#objetivoLineaTres3"),$(".objetivos__alineados3Objetivo__3"),3,$(".objetivo3__indicador__3"));	
					generarTablasEspecificas3($("#objetivoLineaTres4"),$(".objetivos__alineados3Objetivo__4"),4,$(".objetivo3__indicador__4"));	
					generarTablasEspecificas3($("#objetivoLineaTres5"),$(".objetivos__alineados3Objetivo__5"),5,$(".objetivo3__indicador__5"));	
	  				
	  				/*=====  End of Generar Tablas  ======*/
	  				

	  			break;


	  		}


		}else{

			switch (parametro3) {

	  			case 1:
	  				
	  				$(".objetivos__alineados1").remove();

	  			break;

	  			case 2:
	  				
	  				$(".objetivos__alineados2").remove();

	  			break;

	  			case 3:
	  				
	  				$(".objetivos__alineados3").remove();

	  			break;


	  		}


		}


	});

}

lineasPoliticas($("#lineaPolitica1"),$(".body__politica1Contenedor"),1);
lineasPoliticas($("#lineaPolitica2"),$(".body__politica2Contenedor"),2);
lineasPoliticas($("#lineaPolitica3"),$(".body__politica3Contenedor"),3);

/*=====  End of Lineas Políticas  ======*/


/*========================================================
=            Objetivos Secretaría del deporte            =
========================================================*/

var objetivosSecretariaDelDeporte=function(parametro1,parametro2,parametro3){

	$(parametro1).click(function(e){

		var condicion = $(parametro1).is(":checked");

		if (condicion) {

			switch (parametro3) {

				case 1:

					$(parametro2).append('<tr class="objetivosSecretaria__alineados1"><td style="padding:.5em; width:90%;" class="objetivo__indicador__1">1.1 Crear e implementar la Política Pública de la Cultura Física</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="incrementarFisicaSecretariaObjetivo1" name="incrementarFisicaSecretariaObjetivo1" class="check__estilos__lineas checkeds__ObjetivoMinisterio1"></center></td></tr>');

					$(parametro2).append('<tr class="objetivosSecretaria__alineados1"><td style="padding:.5em; width:90%;" class="objetivo__indicador__1">1.2 Generar mecanismos de accesibilidad a la práctica de actividad física en igualdad de condiciones y oportunidades</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="incrementarFisicaSecretariaObjetivo2" name="incrementarFisicaSecretariaObjetivo2" class="check__estilos__lineas checkeds__ObjetivoMinisterio1"></center></td></tr>');

					$(parametro2).append('<tr class="objetivosSecretaria__alineados1"><td style="padding:.5em; width:90%;" class="objetivo__indicador__1">1.3 Fortalecer el desarrollo formativo de la práctica deportiva en la población</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="incrementarFisicaSecretariaObjetivo3" name="incrementarFisicaSecretariaObjetivo3" class="check__estilos__lineas checkeds__ObjetivoMinisterio1"></center></td></tr>');

				break;

				case 2:

					$(parametro2).append('<tr class="objetivosSecretaria__alineados2"><td style="padding:.5em; width:90%;" class="objetivo__indicador__1">2.1 Implementar un sistema nacional de priorización de deportes en coordinación con el Sistema Nacional de Cultura Física</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="incrementarFisicaSecretariaObjetivo4" name="incrementarFisicaSecretariaObjetivo4" class="check__estilos__lineas checkeds__ObjetivoMinisterio2"></center></td></tr>');

					$(parametro2).append('<tr class="objetivosSecretaria__alineados2"><td style="padding:.5em; width:90%;" class="objetivo__indicador__1">2.2 Renovar el Plan de Alto Rendimiento con proyección a incrementar logros deportivos</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="incrementarFisicaSecretariaObjetivo5" name="incrementarFisicaSecretariaObjetivo5" class="check__estilos__lineas checkeds__ObjetivoMinisterio2"></center></td></tr>');

					$(parametro2).append('<tr class="objetivosSecretaria__alineados2"><td style="padding:.5em; width:90%;" class="objetivo__indicador__1">2.3 Organizar eventos del ciclo olímpico y paralímpico</td><td style="padding:.5em; width:10%;"><center><input type="checkbox" id="incrementarFisicaSecretariaObjetivo6" name="incrementarFisicaSecretariaObjetivo6" class="check__estilos__lineas checkeds__ObjetivoMinisterio2"></center></td></tr>');

				break;


			}


		}else{

			switch (parametro3) {

				case 1:

					$(".objetivosSecretaria__alineados1").remove();

				break;

				case 2:

					$(".objetivosSecretaria__alineados2").remove();

				break;


			}


		}

	});

}

objetivosSecretariaDelDeporte($("#objetivoEstregicoSecretaria1"),$(".body__objetivoEstregico__uno"),1);
objetivosSecretariaDelDeporte($("#objetivoEstregicoSecretaria2"),$(".body__objetivoEstregico__dos"),2);

/*=====  End of Objetivos Secretaría del deporte  ======*/

/*===================================
=            Componentes            =
===================================*/

var concentradoTablas=function(parametro1,parametro2,parametro3,parametro4){

	$(parametro1).click(function(e){

		var condicion = $(parametro1).is(":checked");

		if (condicion) {

			switch (parametro3) {

				case 1:

					$(parametro4).addClass('color__head');

					$(parametro2).append('<tr class="concentrados__filas"><td style="padding:.5em;"><center>Estadía</center></td><td style="padding:.5em;"><center><input type="checkbox" name="estadiaComponentes" id="estadiaComponentes" class="concentrados__conjuntos check__estilos__lineas" /></center></td></tr><tr class="concentrados__filas"><td style="padding:.5em;"><center>Alimentación</center></td><td style="padding:.5em;"><center><input type="checkbox" name="alimentacionComponentes" id="alimentacionComponentes" class="concentrados__conjuntos check__estilos__lineas" /></center></td></tr><tr class="concentrados__filas"><td style="padding:.5em;"><center>Transporte Interno</center></td><td style="padding:.5em;"><center><input type="checkbox" name="transporteInternoComponentes" id="transporteInternoComponentes" class="concentrados__conjuntos check__estilos__lineas" /></center></td></tr>');

				break;

				case 2:

					$(parametro4).addClass('color__head');

					$(parametro2).append('<tr class="equipo__filas"><td style="padding:.5em;"><center>Honorarios de entrenadores</center></td><td style="padding:.5em;"><center><input type="checkbox" name="honarariosComponentes" id="honarariosComponentes" class="equipoTecnico__conjuntos check__estilos__lineas" /></center></td></tr><tr class="equipo__filas"><td style="padding:.5em;"><center>De preparadores físicos</center></td><td style="padding:.5em;"><center><input type="checkbox" name="preparadosFisicosComponentes" id="preparadosFisicosComponentes" class="equipoTecnico__conjuntos check__estilos__lineas" /></center></td></tr><tr class="equipo__filas"><td style="padding:.5em;"><center>De servicios médicos de cualquier especialidad</center></td><td style="padding:.5em;"><center><input type="checkbox" name="serviciosMedicosComponentes" id="serviciosMedicosComponentes" class="equipoTecnico__conjuntos check__estilos__lineas" /></center></td></tr><tr class="equipo__filas"><td style="padding:.5em;"><center>De nutrición</center></td><td style="padding:.5em;"><center><input type="checkbox" name="nutricionComponentes" id="nutricionComponentes" class="equipoTecnico__conjuntos check__estilos__lineas" /></center></td></tr><tr class="equipo__filas"><td style="padding:.5em;"><center>De psicología</center></td><td style="padding:.5em;"><center><input type="checkbox" name="psicologiaComponentes" id="psicologiaComponentes" class="equipoTecnico__conjuntos check__estilos__lineas" /></center></td></tr>');

				break;

				case 3:

					$(parametro4).addClass('color__head');

					$(parametro2).append('<tr class="alquiler__escenarios"><td style="padding:.5em;"><center>Estadios</center></td><td style="padding:.5em;"><center><input type="checkbox" name="estadiosAlquiler" id="estadiosAlquiler" class="estadosAlquiler__conjuntos check__estilos__lineas" /></center></td></tr><tr class="alquiler__escenarios"><td style="padding:.5em;"><center>Coliseos</center></td><td style="padding:.5em;"><center><input type="checkbox" name="coliseosAlquiler" id="coliseosAlquiler" class="coliseosAlquiler__conjuntos check__estilos__lineas" /></center></td></tr><tr class="alquiler__escenarios"><td style="padding:.5em;"><center>Gimnacios</center></td><td style="padding:.5em;"><center><input type="checkbox" name="gimanaciosAlquiler" id="gimanaciosAlquiler" class="gimnaciosAlquiler__conjuntos check__estilos__lineas" /></center></td></tr><tr class="alquiler__escenarios"><td style="padding:.5em;"><center>Pistas</center></td><td style="padding:.5em;"><center><input type="checkbox" name="pistasAlquiler" id="pistasAlquiler" class="pistasAlquiler__conjuntos check__estilos__lineas" /></center></td></tr><tr class="alquiler__escenarios"><td style="padding:.5em;"><center>Canchas</center></td><td style="padding:.5em;"><center><input type="checkbox" name="canchasAlquiler" id="canchasAlquiler" class="canchasAlquiler__conjuntos check__estilos__lineas" /></center></td></tr><tr class="alquiler__escenarios"><td style="padding:.5em;"><center>Piscinas</center></td><td style="padding:.5em;"><center><input type="checkbox" name="piscinasAlquiler" id="piscinasAlquiler" class="piscinasAlquiler__conjuntos check__estilos__lineas" /></center></td></tr>');

				break;


				case 4:

					$(parametro4).addClass('color__head');

					$(parametro2).append('<tr class="transporte__escenariosInter"><td style="padding:.5em;"><center>transporte nacional e internacional</center></td><td style="padding:.5em;"><center><input type="checkbox" name="transporteNacionalInter" id="transporteNacionalInter" class="transporteNacionalInter__conjuntos check__estilos__lineas" /></center></td></tr>');

				break;


			}

		}else{


			switch (parametro3) {

				case 1:

					$(parametro4).removeClass('color__head');

					$(".concentrados__filas").remove();

				break;


				case 2:

					$(parametro4).removeClass('color__head');

					$(".equipo__filas").remove();

				break;


				case 3:

					$(parametro4).removeClass('color__head');

					$(".alquiler__escenarios").remove();

				break;

				case 4:

					$(parametro4).removeClass('color__head');

					$(".transporte__escenariosInter").remove();

				break;



			}

		}

	});

}


concentradoTablas($("#concentradoCheckeds"),$(".concentrados__contenedor__body"),1,$('.columna__color'));
concentradoTablas($("#equipoTecnicoCheckeds"),$(".equipoTecnico__contenedor__body"),2,$('.columna__color__tecnico'));
concentradoTablas($("#alquilerEscenariosDeportivosCheckeds"),$(".alquilerEscenarios__contenedor__body"),3,$('.columna__color__alquiler'));
concentradoTablas($("#competenciasNacionalesCheckeds"),$(".competenciasNacionales__contenedor__body"),4,$('.columna__color__nacionales'));
/*=====  End of Componentes  ======*/

/*==============================================
=            Beneficiarios Directos            =
==============================================*/

var contadorBeneficiariosDirectos=0;
var contadorBeneficiariosDirectosDiscapacidad=0;
var contadorBeneficiariosDirectosIndirectos=0;

var beneficiariosDirectos=function(parametro1,parametro2,parametro3,parametro4){

	$(parametro1).click(function(e){

		contadorBeneficiariosDirectos++;
		contadorBeneficiariosDirectosDiscapacidad++;
		contadorBeneficiariosDirectosIndirectos++;

		switch (parametro3) {

			case 1:

				$("#beneficiariosDirectos").show();

				$(parametro2).append('<tr class="filas__beneficiariosDirectos beneficiariosFilas__filas'+contadorBeneficiariosDirectos+'"><td style="padding:.5em;"><input type="text" name="beneficiariosDirectos'+contadorBeneficiariosDirectos+'" id="beneficiariosDirectos'+contadorBeneficiariosDirectos+'" class="BeneficiariosDirectos__conjuntos obligatorios__bene selector__inicial" style="width:100%;"/></td><td style="padding:.5em;"><input type="text" name="totalDirectos" id="totalDirectos" class="totalDirectos__conjuntos obligatorios__bene solo__numero selector__inicial" style="width:100%;"/></td><td><center><button style="padding:.5em; text-align:center; background:#b71c1c; color:white; border-radius:.4em;" id="eliminarBeneficiariosDirectos'+contadorBeneficiariosDirectos+'" idContador="'+contadorBeneficiariosDirectos+'"><i class="fas fa-trash"></i></button></center></td></tr>');

					/*=============================================
					=            Permitir solo numeros            =
					=============================================*/
					
					 $(".solo__numero").on('input', function () {

					     this.value = this.value.replace(/[^0-9]/g, '');

					 });					
										
					/*=====  End of Permitir solo numeros  ======*/
					

					/*=====================================
					=            Eliminar Fila            =
					=====================================*/
					
					$("#eliminarBeneficiariosDirectos"+contadorBeneficiariosDirectos).click(function(e){

						var idContador=$(this).attr('idContador');

						$(".beneficiariosFilas__filas"+idContador).remove();

						if ($(".filas__beneficiariosDirectos").length == 0 ) {

							$("#beneficiariosDirectos").hide();

						}

					});
					
					/*=====  End of Eliminar Fila  ======*/

			break;

			case 2:

				$("#discapacidadBeneficiarios").show();

					$(parametro2).append('<tr class="filas__beneficiariosDirectosDiscapacidad beneficiariosDiscapacidadFilas__filas'+contadorBeneficiariosDirectosDiscapacidad+'"><td style="padding:.5em;"><input type="text" name="beneficiariosDirectosDiscapacidad'+contadorBeneficiariosDirectosDiscapacidad+'" id="beneficiariosDirectosDiscapacidad'+contadorBeneficiariosDirectosDiscapacidad+'" class="BeneficiariosDirectosDiscapacidad__conjuntos obligatorios__bene selector__inicial" /></td><td style="padding:.5em;"><input type="text" name="visualDirectosDiscapacidad'+contadorBeneficiariosDirectosDiscapacidad+'" id="visualDirectosDiscapacidad'+contadorBeneficiariosDirectosDiscapacidad+'" class="visualDirectosDiscapacidad__conjuntos obligatorios__bene selector__inicial solo__numero sumador__automatico'+contadorBeneficiariosDirectosDiscapacidad+'" value="0" /></td><td style="padding:.5em;"><input type="text" name="auditivaDirectosDiscapacidad'+contadorBeneficiariosDirectosDiscapacidad+'" id="auditivaDirectosDiscapacidad'+contadorBeneficiariosDirectosDiscapacidad+'" class="auditivaDirectosDiscapacidad__conjuntos obligatorios__bene selector__inicial solo__numero sumador__automatico'+contadorBeneficiariosDirectosDiscapacidad+'" value="0" /></td><td style="padding:.5em;"><input type="text" name="multisensoerialDirectosDiscapacidad'+contadorBeneficiariosDirectosDiscapacidad+'" id="multisensoerialDirectosDiscapacidad'+contadorBeneficiariosDirectosDiscapacidad+'" class="multisensoerialDirectosDiscapacidad__conjuntos obligatorios__bene selector__inicial solo__numero sumador__automatico'+contadorBeneficiariosDirectosDiscapacidad+'" value="0" /></td><td style="padding:.5em;"><input type="text" name="intelectualDirectosDiscapacidad'+contadorBeneficiariosDirectosDiscapacidad+'" id="intelectualDirectosDiscapacidad'+contadorBeneficiariosDirectosDiscapacidad+'" class="intelectualDirectosDiscapacidad__conjuntos obligatorios__bene selector__inicial solo__numero sumador__automatico'+contadorBeneficiariosDirectosDiscapacidad+'" value="0" /></td><td style="padding:.5em;"><input type="text" name="fisicaDirectosDiscapacidad'+contadorBeneficiariosDirectosDiscapacidad+'" id="fisicaDirectosDiscapacidad'+contadorBeneficiariosDirectosDiscapacidad+'" class="fisicaDirectosDiscapacidad__conjuntos obligatorios__bene selector__inicial solo__numero sumador__automatico'+contadorBeneficiariosDirectosDiscapacidad+'" value="0" /></td><td style="padding:.5em;"><input type="text" name="psiquicaDirectosDiscapacidad'+contadorBeneficiariosDirectosDiscapacidad+'" id="psiquicaDirectosDiscapacidad'+contadorBeneficiariosDirectosDiscapacidad+'" class="psiquicaDirectosDiscapacidad__conjuntos obligatorios__bene selector__inicial solo__numero sumador__automatico'+contadorBeneficiariosDirectosDiscapacidad+'" value="0" /></td><td style="padding:.5em;"><input type="text" name="totalDirectosDiscapacidad'+contadorBeneficiariosDirectosDiscapacidad+'" id="totalDirectosDiscapacidad'+contadorBeneficiariosDirectosDiscapacidad+'" class="totalDirectosDiscapacidad__conjuntos obligatorios__bene selector__inicial solo__numero total__automatico'+contadorBeneficiariosDirectosDiscapacidad+'" value="0" disabled=""/></td><td style="padding:.5em;"><center><button style="padding:.5em; text-align:center; background:#b71c1c; color:white; border-radius:.4em;" id="eliminarBeneficiariosDirectosDiscapacidad'+contadorBeneficiariosDirectosDiscapacidad+'" idContador="'+contadorBeneficiariosDirectosDiscapacidad+'"><i class="fas fa-trash"></i></button></center></td></tr>');

					/*=====================================
					=            Sumar valores            =
					=====================================*/

					var validarMostrarModales=function(parametro1,parametro2){

						var sumador=0;

						$(parametro1).keyup(function(e){

							$(this).each(function(index) {
								
								sumador=parseFloat($(this).val()) + sumador;

						     });

							$(parametro2).val(sumador.toFixed(2));


						});


						$(parametro1).click(function(e){

							if($(this).val()==0 || $(this).val()=="0"){

								$(this).val(" ");

							}

						});


						$(parametro1).blur(function(e){

							if($(this).val()==""){

								$(this).val("0");

							}

						});

					}

					validarMostrarModales($(".sumador__automatico"+contadorBeneficiariosDirectosDiscapacidad),$(".total__automatico"+contadorBeneficiariosDirectosDiscapacidad));					
										
					
					/*=====  End of Sumar valores  ======*/
					


					/*=============================================
					=            Permitir solo numeros            =
					=============================================*/
					
					 $(".solo__numero").on('input', function () {

					     this.value = this.value.replace(/[^0-9]/g, '');

					 });					
										
					/*=====  End of Permitir solo numeros  ======*/
					/*=====================================
					=            Eliminar Fila            =
					=====================================*/
					
					$("#eliminarBeneficiariosDirectosDiscapacidad"+contadorBeneficiariosDirectosDiscapacidad).click(function(e){

						var idContador=$(this).attr('idContador');

						$(".beneficiariosDiscapacidadFilas__filas"+idContador).remove();

						if ($(".filas__beneficiariosDirectosDiscapacidad").length == 0 ) {

							$("#discapacidadBeneficiarios").hide();

						}

					});
					
					/*=====  End of Eliminar Fila  ======*/

			break;


			case 3:

				$("#beneficiariosIndirectos").show();

				$(parametro2).append('<tr class="filas__beneficiariosDirectosIndirectos beneficiariosIndirectosFilas__filas'+contadorBeneficiariosDirectosIndirectos+'"><td style="padding:.5em;"><input type="text" name="beneficiariosDirectosIndirectos'+contadorBeneficiariosDirectosIndirectos+'" id="beneficiariosDirectosIndirectos'+contadorBeneficiariosDirectosIndirectos+'" class="BeneficiariosDirectosIndirectos__conjuntos obligatorios__bene selector__inicial" style="width:100%;"/></td><td style="padding:.5em;"><input type="text" name="totalDirectosIndirectos'+contadorBeneficiariosDirectosIndirectos+'" id="totalDirectosIndirectos'+contadorBeneficiariosDirectosIndirectos+'" class="totalDirectosIndirectos__conjuntos obligatorios__bene selector__inicial solo__numero" style="width:100%;"/></td><td style="padding:.5em;"><textarea type="text" name="justificacionCuantitativaDirectosIndirectos'+contadorBeneficiariosDirectosIndirectos+'" id="justificacionCuantitativaDirectosIndirectos'+contadorBeneficiariosDirectosIndirectos+'" class="justificacionCuantitativaDirectosIndirectos__conjuntos obligatorios__bene selector__inicial" style="width:100%; font-size:10px;"></textarea></td><td style="padding:.5em;"><center><button style="padding:.5em; text-align:center; background:#b71c1c; color:white; border-radius:.4em;" id="eliminarBeneficiariosDirectosIndirectos'+contadorBeneficiariosDirectosDiscapacidad+'" idContador="'+contadorBeneficiariosDirectosDiscapacidad+'"><i class="fas fa-trash"></i></button></center></td></tr>');


					/*=============================================
					=            Permitir solo numeros            =
					=============================================*/
					
					 $(".solo__numero").on('input', function () {

					     this.value = this.value.replace(/[^0-9]/g, '');

					 });					
										
					/*=====  End of Permitir solo numeros  ======*/

					/*=====================================
					=            Eliminar Fila            =
					=====================================*/
					
					$("#eliminarBeneficiariosDirectosIndirectos"+contadorBeneficiariosDirectosIndirectos).click(function(e){

						var idContador=$(this).attr('idContador');

						$(".beneficiariosIndirectosFilas__filas"+idContador).remove();

						if ($(".filas__beneficiariosDirectosIndirectos").length == 0 ) {

							$("#beneficiariosIndirectos").hide();

						}

					});
					
					/*=====  End of Eliminar Fila  ======*/

			break;


		}


	});

}


beneficiariosDirectos($("#anadirBeneficiarios"),$(".beneficiarios__contenedor__body"),1);

beneficiariosDirectos($("#anadirParalimpico"),$(".discapacidad__contenedor__body"),2);

beneficiariosDirectos($("#anadirBeneficiariosIndirectos"),$(".beneficiariosIndirectos__contenedor__body"),3);

/*=====  End of Beneficiarios Directos  ======*/


/*===============================================
=            Descripción Actividades            =
===============================================*/

var contadorDescripcionActividades=0;
var contadorEstructuraOrganicaDeportiva=0;
var contadorSeguimientoEvaluacion=0;

var descripcionActividades=function(parametro1,parametro2,parametro3,parametro4){

	$(parametro1).click(function(e){


		contadorDescripcionActividades++;
		contadorEstructuraOrganicaDeportiva++;
		contadorSeguimientoEvaluacion++;

		switch (parametro3) {

			case 1:

				if(parametro4==1){

					$("#descripcionActividades").show();

				}


				if(parametro4==2){

					$("#descripcionActividades1").show();
					
				}
				
				if(parametro4==3){

					$("#descripcionActividades2").show();
					
				}


				if(parametro4==4){

					$("#descripcionActividades3").show();
					
				}

				$(parametro2).append('<tr class="filas__descripcionActividades descripcionActividades__filas'+contadorDescripcionActividades+'"><td style="padding:.5em;"><textarea class="descripcionActividades__conjunto obligatorio__metodologia" style="width:100%; height:100px;"></textarea></td><td style="padding:.5em;"><center><input type="checkbox" name="eneroDes'+contadorDescripcionActividades+'" id="eneroDes'+contadorDescripcionActividades+'" class="eneroActividades__conjunto  obligatorio__metodologia__checkeds check__estilos__lineas" /></center></td><td style="padding:.5em;"><center><input type="checkbox" name="febreroDes'+contadorDescripcionActividades+'" id="febreroDes'+contadorDescripcionActividades+'" class="febreroActividades__conjunto  obligatorio__metodologia__checkeds check__estilos__lineas" /></center></td><td style="padding:.5em;"><center><input type="checkbox" name="marzoDes'+contadorDescripcionActividades+'" id="marzoDes'+contadorDescripcionActividades+'" class="marzoActividades__conjunto  obligatorio__metodologia__checkeds check__estilos__lineas" /></center></td><td style="padding:.5em;"><center><input type="checkbox" name="abrilDes'+contadorDescripcionActividades+'" id="abrilDes'+contadorDescripcionActividades+'" class="abrilActividades__conjunto  obligatorio__metodologia__checkeds check__estilos__lineas" /></center></td><td style="padding:.5em;"><center><input type="checkbox" name="mayoDes'+contadorDescripcionActividades+'" id="mayoDes'+contadorDescripcionActividades+'" class="mayoActividades__conjunto  obligatorio__metodologia__checkeds check__estilos__lineas" /></center></td><td style="padding:.5em;"><center><input type="checkbox" name="junioDes'+contadorDescripcionActividades+'" id="junioDes'+contadorDescripcionActividades+'" class="junioActividades__conjunto  obligatorio__metodologia__checkeds check__estilos__lineas" /></center></td><td style="padding:.5em;"><center><input type="checkbox" name="julioDes'+contadorDescripcionActividades+'" id="julioDes'+contadorDescripcionActividades+'" class="julioActividades__conjunto  obligatorio__metodologia__checkeds check__estilos__lineas" /></center></td><td style="padding:.5em;"><center><input type="checkbox" name="agostoDes'+contadorDescripcionActividades+'" id="agostoDes'+contadorDescripcionActividades+'" class="agostoActividades__conjunto  obligatorio__metodologia__checkeds check__estilos__lineas" /></center></td><td style="padding:.5em;"><center><input type="checkbox" name="septiembreDes'+contadorDescripcionActividades+'" id="septiembreDes'+contadorDescripcionActividades+'" class="septiembreActividades__conjunto  obligatorio__metodologia__checkeds check__estilos__lineas" /></center></td><td style="padding:.5em;"><center><input type="checkbox" name="octubreDes'+contadorDescripcionActividades+'" id="octubreDes'+contadorDescripcionActividades+'" class="octubreActividades__conjunto  obligatorio__metodologia__checkeds check__estilos__lineas" /></center></td><td style="padding:.5em;"><center><input type="checkbox" name="noviembreDes'+contadorDescripcionActividades+'" id="noviembreDes'+contadorDescripcionActividades+'" class="noviembreActividades__conjunto  obligatorio__metodologia__checkeds check__estilos__lineas" /></center></td><td style="padding:.5em;"><center><input type="checkbox" name="diciembreDes'+contadorDescripcionActividades+'" id="diciembreDes'+contadorDescripcionActividades+'" class="diciembreActividades__conjunto  obligatorio__metodologia__checkeds check__estilos__lineas" /><input type="hidden" id="numeroIdentificado" name="numeroIdentificado" value="'+parametro4+'" class="numero__identificativos"></center></td><td style="padding:.5em;"><center><button style="padding:.5em; text-align:center; background:#b71c1c; color:white; border-radius:.4em;" id="eliminarActividadesDesc'+contadorDescripcionActividades+'" idContador="'+contadorDescripcionActividades+'"><i class="fas fa-trash"></i></button></center></td></tr>');

					/*=====================================
					=            Eliminar Fila            =
					=====================================*/
					
					$("#eliminarActividadesDesc"+contadorDescripcionActividades).click(function(e){

						var idContador=$(this).attr('idContador');

						$(".descripcionActividades__filas"+idContador).remove();

						if ($(".filas__descripcionActividades").length == 0 ) {

							$("#descripcionActividades").hide();
							$("#descripcionActividades1").hide();
							$("#descripcionActividades2").hide();
							$("#descripcionActividades3").hide();

						}

					});
					
					/*=====  End of Eliminar Fila  ======*/

			break;

			case 2:

				$("#estructuraOrganicaDeportiva").show();

				$(parametro2).append('<tr class="filas__estructuraOrganica estructuraOrganica__filas'+contadorEstructuraOrganicaDeportiva+'"><td style="padding:.5em;"><textarea class="rol__conjunto obligatorio__metodologia" style="width:100%; height:100px;"></textarea></td><td style="padding:.5em;"><textarea class="detalle__conjunto obligatorio__metodologia" style="width:100%; height:100px;"></textarea></td><td style="padding:.5em;"><center><button style="padding:.5em; text-align:center; background:#b71c1c; color:white; border-radius:.4em;" id="eliminarEstructuraOrganica'+contadorDescripcionActividades+'" idContador="'+contadorDescripcionActividades+'"><i class="fas fa-trash"></i></button></center></td></tr>');

					/*=====================================
					=            Eliminar Fila            =
					=====================================*/
					
					$("#eliminarEstructuraOrganica"+contadorEstructuraOrganicaDeportiva).click(function(e){

						var idContador=$(this).attr('idContador');

						$(".estructuraOrganica__filas"+idContador).remove();

						if ($(".filas__estructuraOrganica").length == 0 ) {

							$("#estructuraOrganicaDeportiva").hide();

						}

					});
					
					/*=====  End of Eliminar Fila  ======*/

			break;

			case 3:


			/*==============================================
			=            Enviado datos por ajax            =
			==============================================*/
			
			var paqueteDeDatos = new FormData();

			var codigoProyecto=$("#codigoProyecto").val();

			paqueteDeDatos.append('codigoProyecto',codigoProyecto);

			var destino = "modelosBd/selector/selectorMetas.md.php"; 

			$.ajax({

			    url: destino,
			    type: 'POST',
			    contentType: false,
			    data: paqueteDeDatos, 
			    processData: false,
			    cache: false, 
			    success: function(response){

			    	var elementos=JSON.parse(response);

			      	var stringidMetas=elementos['stringidMetas'];
			      	var stringnombre__conjunto=elementos['stringnombre__conjunto'];
			      	var stringdescripcion__conjunto=elementos['stringdescripcion__conjunto'];
			      	var stringmetodoCalculo__conjunto=elementos['stringmetodoCalculo__conjunto'];
			      	var stringmetaPropuesta__conjunto=elementos['stringmetaPropuesta__conjunto'];
			      	var stringperiodo__conjunto=elementos['stringperiodo__conjunto'];

			      	if (stringidMetas!="") {

			      		var arrayidMetas = stringidMetas.split('------');
			      		var arraynombre__conjunto = stringnombre__conjunto.split('------');
			      		var arraydescripcion__conjunto = stringdescripcion__conjunto.split('------');
			      		var arraymetodoCalculo__conjunto = stringmetodoCalculo__conjunto.split('------');
			      		var arraymetaPropuesta__conjunto = stringmetaPropuesta__conjunto.split('------');
			      		var arrayperiodo__conjunto = stringperiodo__conjunto.split('------');

						$("#seguimientoEvaluacion").show();

						$(parametro2).append('<tr class="filas__seguimientoEvaluacion seguimientoEvaluacion__filas'+contadorDescripcionActividades+'"><td style="padding:.5em;"><select id="seleccionarMetas'+contadorDescripcionActividades+'" idContador="'+contadorDescripcionActividades+'" class="metas__conjuntos__seleccionables selector__inicial obligatorio__metodologia"></select></td><td style="padding:.5em;"><input class="conjunto__indicadores selector__inicial obligatorio__metodologia" id="indicadorSeleccionables'+contadorDescripcionActividades+'" disabled=""></td><td style="padding:.5em;"><select class="actividadSeguimiento__conjunto obligatorio__metodologia selector__inicial periodicidad'+contadorDescripcionActividades+'" style="width:100%;"></select></td><td style="padding:.5em;"><textarea class="periocidadSeguimiento__conjunto obligatorio__metodologia" style="width:100%; height:100px;"></textarea></td><td style="padding:.5em;"><input type="text" class="medioSeguimiento__conjunto obligatorio__metodologia segumientoLetras'+contadorDescripcionActividades+' selector__inicial" disable=""/></td><td style="padding:.5em;"><textarea class="observacionSeguimiento__conjunto obligatorio__metodologia" style="width:100%; height:100px;"></textarea></td><td style="padding:.5em;"><center><button style="padding:.5em; text-align:center; background:#b71c1c; color:white; border-radius:.4em;" id="eliminarSeguimiento'+contadorDescripcionActividades+'" idContador="'+contadorDescripcionActividades+'"><i class="fas fa-trash"></i></button></center></td></tr>');

							/*==================================================
							=            Llenar excel dinamicamente            =
							==================================================*/

							$(".periodicidad"+contadorDescripcionActividades).append('<option value="">--Seleccione periodicidad--</option><option value="Anual">Anual</option><option value="Mensual">Mensual</option><option value="Semanal">Semanal</option><option value="Semestral">Semestral</option>');

							$("#seleccionarMetas"+contadorDescripcionActividades).append('<option value="">--Seleccione una meta--</option>');
							
							for(var i = 0; i < arraynombre__conjunto.length; i++){

								$("#seleccionarMetas"+contadorDescripcionActividades).append('<option value="'+arraymetaPropuesta__conjunto[i]+'" indicador="'+arraynombre__conjunto[i]+'" metodoCalculo="'+arraymetodoCalculo__conjunto[i]+'">'+arraymetaPropuesta__conjunto[i]+'</option>');


							}
							
							/*=====  End of Llenar excel dinamicamente  ======*/
							

							/*=========================================================
							=            Completar dinamicamente selección            =
							=========================================================*/
							
							$("#seleccionarMetas"+contadorDescripcionActividades).change(function(e){

								var idContador=$(this).attr('idContador');

								var indicador = $("#seleccionarMetas"+idContador+' option:selected').attr('indicador');
								var metodoCalculo = $("#seleccionarMetas"+idContador+' option:selected').attr('metodoCalculo');

								$("#indicadorSeleccionables"+idContador).val(indicador);

								$(".segumientoLetras"+idContador).val(metodoCalculo);

							});							
							
							/*=====  End of Completar dinamicamente selección  ======*/
							

							/*=====================================
							=            Eliminar Fila            =
							=====================================*/
							
							$("#eliminarSeguimiento"+contadorDescripcionActividades).click(function(e){

								var idContador=$(this).attr('idContador');

								$(".seguimientoEvaluacion__filas"+idContador).remove();

								if ($(".filas__seguimientoEvaluacion").length == 0 ) {

									$("#seguimientoEvaluacion").hide();

								}

							});
							
							/*=====  End of Eliminar Fila  ======*/



			      	}else{

			      		alertify.set("notifier","position", "top-center");
		            	alertify.notify("Obligatorio ingresar la sección de metas", "error", 5, function(){});

			      	}

				},

			    error: function (){ 
			      
			    }

			});					
			
			/*=====  End of Enviado datos por ajax  ======*/
			

			break;



		}


	});

}


descripcionActividades($("#anadirDescripcionActividades"),$(".descripcionActividades__contenedor__body"),1,1);
descripcionActividades($("#anadirDescripcionActividadesDos"),$(".descripcionActividades__contenedor__body__dos"),1,2);
descripcionActividades($("#anadirDescripcionActividadesTres"),$(".descripcionActividades__contenedor__body__tres"),1,3);
descripcionActividades($("#anadirDescripcionActividadesCuatro"),$(".descripcionActividades__contenedor__body__cuatro"),1,4);

descripcionActividades($("#anadirEstructuraOrganicaOperativa"),$(".estructuraOrganicaDeportiva__contenedor__body"),2);
descripcionActividades($("#anadiSeguimientoEvaluacion"),$(".seguimientoEvaluacion__contenedor__body"),3);

/*=====  End of Descripción Actividades  ======*/

/*==================================================
=            Añadir Argumentos del Item            =
==================================================*/

var contadorArgumentos=0;

var argumentosAdministrador=function(parametro1,parametro2){

	$(parametro1).click(function(e){

		$(".tabla__argumentos").show();

		contadorArgumentos++;

		$(parametro2).append('<tr class="fila__componentes'+contadorArgumentos+' filas__componentes__globales"><td><input class="selector__inicial conjunto__items__argumentos obligatorios__items__argumentos" /></td><td><select class="selector__inicial conjunto__tipos__argumentos obligatorios__items__argumentos" id="selectorTiposArgumentos'+contadorArgumentos+'" idContador="'+contadorArgumentos+'"><option value="">--Seleccione tipo de argumento--</option><option value="moneda">Moneda</option><option value="numerico">Numérico</option><option value="texto">Texto</option><option value="valorDefinido">Valores Definidos</option><option value="formula">Formula</option><option value="monto">Monto</option></select></td><td><center><button id="eliminarArgumentos'+contadorArgumentos+'" class="btn btn-danger" idContador="'+contadorArgumentos+'"><i class="fas fa-trash"></i></button></center></td></tr>');


		/*==============================
		=            Añadir            =
		==============================*/
		
		$("#selectorTiposArgumentos"+contadorArgumentos).change(function(e){

			var idContador=$(this).attr('idContador');

			if ($(this).val()=="valorDefinido") {

				contadorDefinidos=0;

				$("#selectorTiposArgumentos"+idContador).after('<table class="valorestabla__defnidos'+idContador+'"><thead><tr><th>Valor Definido</th><th>Desglosar</th><th></th></tr></thead><tbody><tr class="fila__contenidos__definidos'+idContador+'"><td><center><input type="text" class="selector__inicial definidos__valores__nombres__conjuntos obligatorios__items__argumentos"/></center></td><td><center><input type="checkbox" class="seleccion__definidos__conjuntos" style="height:75px; width:50%;"></center></td><td><center><button id="anadir'+contadorDefinidos+'" class="btn btn-primary" idContador="'+contadorDefinidos+'" idContador2="'+idContador+'"><i class="fas fa-plus-circle"></i></button></center></td></tr></tbody></table>');

				/*====================================
				=            Añadir Items            =
				====================================*/

				$("#anadir"+contadorDefinidos).click(function(e){

					contadorDefinidos++;

					var idContador=$(this).attr('idContador');

					var idContador2=$(this).attr('idContador2');

					$(".fila__contenidos__definidos"+idContador2).after('<tr class="fila__definidas'+contadorDefinidos+'"><td><center><input type="text" class="selector__inicial definidos__valores__nombres__conjuntos obligatorios__items__argumentos"/></center></td><td><center><input type="checkbox" class="seleccion__definidos__conjuntos" style="height:75px; width:50%;"></center></td><td><center><button id="eliminarFilaDefinidos'+contadorDefinidos+'" class="btn btn-danger" idContador="'+contadorDefinidos+'"><i class="fas fa-trash"></i></button></center></td></tr>');

						/*=====================================
						=            Eliminar Fila            =
						=====================================*/
						
						$("#eliminarFilaDefinidos"+contadorDefinidos).click(function(e){

							var idContador=$(this).attr('idContador');

							$(".fila__definidas"+idContador).remove();

						});
						
						/*=====  End of Eliminar Fila  ======*/


				});				
				
				/*=====  End of Añadir Items  ======*/
				

			}else if($(this).val()=="formula"){

				contadorDefinidosFormulas=0;

				$("#selectorTiposArgumentos"+idContador).after('<div class="row selectMultiples'+contadorDefinidosFormulas+'"><div class="col col-2">Fórmula:</div><div class="col col-10"><input type="text" id="formulaRealizables'+contadorDefinidosFormulas+'" class="formulaRealizablesDadas selector__inicial"/></div></div>');

				$("#selectorTiposArgumentos"+idContador).after('<div class="row selectMultiples'+idContador+'"><div class="col col-5">Seleccione las columnas que estarán incluidas en la formula</div><div class="col col-7"><select id="seleccionablesFormulas'+contadorDefinidosFormulas+'" idContador="'+contadorDefinidosFormulas+'" multiple="" class="selector__inicial obligatorios__items__argumentos"></select></div></div></div>');


			    $(".conjunto__items__argumentos").each(function(index) {

			    	if ($(this).val()!="Cantidad" && $(this).val()!="Valor Unitario"  && $(this).val()!="Valor Total") {

			    		$("#seleccionablesFormulas"+contadorDefinidosFormulas).append('<option value="'+$(this).val()+'">'+$(this).val()+'</option>');

			    	}

			    });

			    /*==========================================
			    =            Slección multiples            =
			    ==========================================*/
			    
				$("#seleccionablesFormulas"+contadorDefinidosFormulas).change(function(e){

					var idContador=$(this).attr('idContador');

					$("#formulaRealizables"+idContador).val($(this).val());

				});
									    
			    
			    /*=====  End of Slección multiples  ======*/
			    


			}else{

				$(".valorestabla__defnidos"+idContador).remove();

				$(".selectMultiples"+idContador).remove();

			}

		});

		
		/*=====  End of Añadir  ======*/
		

		/*=====================================
		=            Eliminar Fila            =
		=====================================*/
		
		$("#eliminarArgumentos"+contadorArgumentos).click(function(e){

			var idContador=$(this).attr('idContador');

			$(".fila__componentes"+idContador).remove();

			if (!$(".filas__componentes__globales").length > 0) {
			  $(".tabla__argumentos").hide();
			}

		});
		
		/*=====  End of Eliminar Fila  ======*/
		

	});

}

argumentosAdministrador($("#anadirArgumentos"),$(".contenedor__argumentos"));

/*=====  End of Añadir Argumentos del Item  ======*/

/*======================================================
=            Añadir componentes Deportistas            =
======================================================*/

var contadorComponentesDeportistas=0;
var contadorComponentesGeneral=0;

/*========================================
=            Recorrer scripts            =
========================================*/

function validacionVacios(parametro1){

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

/*=====  End of Recorrer scripts  ======*/


var argumentosDeportistas=function(parametro1,parametro2){

	
	$(parametro1).click(function(e){

		contadorComponentesDeportistas++;

		validador= validacionVacios($(".selectorConjuntoComponentes"));
		validador2= validacionVacios($(".selectorConjuntoItemsComponentes"));


		if($(this).attr('attr')=="priorizados"){

			var variableEvaluadora="priorizados";

		}else if($(this).attr('attr')=="femeninas"){

			var variableEvaluadora="femeninas";

		}else{

			var variableEvaluadora="componentes";

		}


		if(contadorComponentesDeportistas>1){

			alertify.set("notifier","position", "top-right");
			alertify.notify("Es obligatorio guardar el componente seleccionado antes de generar otro componente", "error", 5, function(){});

			contadorComponentesDeportistas--;

		}else if (validador==false || validador2==false) {

			alertify.set("notifier","position", "top-right");
			alertify.notify("Obligatorio completar elegir los campos habilitantes para generar una nueva fila", "error", 5, function(){});

			contadorComponentesDeportistas--;

		}else{

			$(parametro2).append('<table class="col col-12" id="tablaComponentesDeportistas'+contadorComponentesDeportistas+'"><tr><td><center>Componente <span id="etiquetasRamas'+contadorComponentesDeportistas+'"></span></center></td><td><select id="componenteSeleccionable'+contadorComponentesDeportistas+'" class="selector__inicial selectorConjuntoComponentes"></select></td><td><center>Item</center></td><td><select id="itemComponentes'+contadorComponentesDeportistas+'" class="selector__inicial selectorConjuntoItemsComponentes"></select></td><td><center><button id="eliminarComponente'+contadorComponentesDeportistas+'" idContador="'+contadorComponentesDeportistas+'" class="btn btn-danger"><i class="fas fa-trash"></i></button></center></td></tr></table>');

			if($(this).attr('attr')=="priorizados"){

				$('#etiquetasRamas'+contadorComponentesDeportistas).text('Sector priorizado');

			}else if($(this).attr('attr')=="femeninas"){

				$('#etiquetasRamas'+contadorComponentesDeportistas).text('Rama femenina');

			}else{

				$('#etiquetasRamas'+contadorComponentesDeportistas).text(' ');

			}			

			/*==========================================
			=            Items desglosables            =
			==========================================*/
			
			var itemsComponentesSeleccionables=function(parametro1){

				$(parametro1).change(function(){

					if ($(this).val()==110) {

						$(".tabla__itemsArgumentativos"+contadorComponentesDeportistas).remove();

						$(".cronograma__valorado__display").show();

					}else{

						$(".cronograma__valorado__display").hide();

						$(".tabla__itemsArgumentativos"+contadorComponentesDeportistas).remove();

						/*============================
						=            Ajax            =
						============================*/

						var paqueteDeDatos = new FormData();

						var itemsEscogidos=$(this).val();

						var itemsEscogidos2=$(this).val();

						paqueteDeDatos.append('itemsEscogidos',itemsEscogidos);
						
						var destino = "modelosBd/validaciones/tablaConstruccion.modelo.php"; 

						$.ajax({

							url: destino,
							type: 'POST',
							contentType: false,
							data: paqueteDeDatos, 
							processData: false,
							cache: false, 

							success: function(response){

					    		var elementos=JSON.parse(response);

							    var stringidArgumentos=elementos['stringidArgumentos'];
							    var stringargumentosNombres=elementos['stringargumentosNombres'];
							    var stringtipoArgumento=elementos['stringtipoArgumento'];

							    var stringidArgumentosDefinidos=elementos['stringidArgumentosDefinidos'];
							    var stringnombresDefinidos=elementos['stringnombresDefinidos'];
							    var stringcheckedsDesgloses=elementos['stringcheckedsDesgloses'];
							    var stringidArgumentos2=elementos['stringidArgumentos2'];

							    var itemsEscogidos=elementos['itemsEscogidos'];

							    var stringformula=elementos['stringformula'];

							    var arraystringidArgumentos = stringidArgumentos.split('------');
							    var arraystringargumentosNombres = stringargumentosNombres.split('------');
							    var arraystringtipoArgumento = stringtipoArgumento.split('------');

							    var arraystringidArgumentosDefinidos = stringidArgumentosDefinidos.split('------');
							    var arraystringnombresDefinidos = stringnombresDefinidos.split('------');
							    var arraystringcheckedsDesgloses = stringcheckedsDesgloses.split('------');
							    var arraystringidArgumentos2 = stringidArgumentos2.split('------');

							    var arraystringformula = stringformula.split('------');

							    $("#tablaComponentesDeportistas"+contadorComponentesDeportistas).after('<table class="tabla__itemsArgumentativos'+contadorComponentesDeportistas+' tabla__relacion'+contadorComponentesDeportistas+'"><thead class="head__principal'+contadorComponentesDeportistas+'"></thead><tbody class="boddy__contenedorPrincipal'+contadorComponentesDeportistas+'"></tbody><tfoot class="footePrincipal'+contadorComponentesDeportistas+'"></tfoot></table>');

							    var contadorGeneral=0;

							    var contadorOtros=0;

							    var contadorOtrosAnadidos=0;


									  	/*======================================
									  	=            Obtener fechas            =
									  	======================================*/
									  	function funcionFechasObtenidas(parametro1,parametro2){

									  		var array = new Array(); 

									  		var parametro1String=$(parametro1).val();
									  		var parametro2String=$(parametro2).val();

									  		var arreglo1 = parametro1String.split("/");
									  		var arreglo2 = parametro2String.split("/");

									  		var diferenciaAnios=parseInt(arreglo2[2], 10) - parseInt(arreglo1[2], 10);

									  		diferenciaAnios++;

									  		var diferenciaAniosDiferenciador=diferenciaAnios-1;

									  		var sumador=0;

									  		for (var i =0; i<diferenciaAnios; i++) {


									  			if (i==0) {

									  				var fecha=(parseInt(arreglo1[2])+sumador)+"-"+arreglo1[1]+"-"+arreglo1[0];

									  				array.push(fecha);

									  			}else if(i==diferenciaAniosDiferenciador){

									  				var fecha=(parseInt(arreglo1[2])+sumador)+"-"+arreglo2[1]+"-"+arreglo2[0];

									  				array.push(fecha);

									  			}else{

									  				var fecha=(parseInt(arreglo1[2])+sumador)+"-01-01";

									  				array.push(fecha);

									  			}

									 
									  			sumador++;
									  			
									  		}

									  		return array;

									  	}

									  	function mesesFunciones(variableMes){

											switch (variableMes) {

												case 1:
													var variableMesCreador="Enero";
												break;

												case 2:
													var variableMesCreador="Febrero";
												break;

												case 3:
													var variableMesCreador="Marzo";
												break;

												case 4:
													var variableMesCreador="Abril";
												break;

												case 5:
													var variableMesCreador="Mayo";
												break;

												case 6:
													var variableMesCreador="Junio";
												break;

												case 7:
													var variableMesCreador="Julio";
												break;

												case 8:
													var variableMesCreador="Agosto";
												break;

												case 9:
													var variableMesCreador="Septiembre";
												break;

												case 10:
													var variableMesCreador="Octubre";
												break;

												case 11:
													var variableMesCreador="Noviembre";
												break;

												case 12:
													var variableMesCreador="Diciembre";
												break;

											}		

											return variableMesCreador;	

									  	}

									  	/*=====  End of Obtener fechas  ======*/


							    /*==============================================
							    =            Función para ver filas            =
							    ==============================================*/
							    
							    var funcionFilas=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6){

							    	contadorComponentesGeneral++;

							    	contadorGeneral++;

								   /*==================================
								    =            Creando TR            =
								    ==================================*/

								    /*====================================
								    =            Creando Head            =
								    ====================================*/

								    if (parametro1!=1) {

								    	$(parametro1).append('<tr class="'+parametro4+contadorGeneral+' headTablasComponentes"></tr>');

								    }
								    
								    /*=====  End of Creando Head  ======*/



								   $(parametro3).append('<tr class="'+parametro5+contadorGeneral+' componentes__conjunto componenete__unico'+contadorComponentesGeneral+'" tipo="principal" identificadorComponente="'+contadorGeneral+'"></tr>');

								    							    
								    /*=====  End of Creando TR  ======*/

									/*=========================================
									=            Diseñando el head            =
									=========================================*/

									if (parametro4!=1) {

										$("."+parametro4+contadorGeneral).append('<th>N.</th>');

									}

									$("."+parametro5+contadorGeneral).append('<td><center>'+contadorGeneral+'</center></td>');
										
									/*=====  End of Diseñando el head  ======*/

								    /*=======================================
								    =            Añadiendo filas            =
								    =======================================*/
								    
								    var contadorDiferido=arraystringidArgumentos.length;

									for (var i = 0; i < arraystringidArgumentos.length; i++) {

										/*=========================================
										=            Diseñando el head            =
										=========================================*/

										if (parametro4!=1) {

											$("."+parametro4+contadorGeneral).append('<th>'+arraystringargumentosNombres[i]+'</th>');

										}
										
										/*=====  End of Diseñando el head  ======*/

										if(arraystringtipoArgumento[i]=="moneda" && arraystringargumentosNombres[i]=="Valor Total"){


											$("."+parametro5+contadorGeneral).append('<td><input type="text" class="solo__numero__montos selector__inicial camposAtados'+contadorGeneral+' totalCalculado'+contadorGeneral+' sumador__totales requeridos__componentes__deportistas campos__relacionados numeros__ceros__blur" value="0" disabled="" nombreColumna="'+arraystringargumentosNombres[i]+'" identificadorColumna="principal"></td>');


								 			$(".solo__numero__montos").on('input', function () {
											     this.value = this.value.replace(/[^0-9,.]/g, '').replace(',','.');
											 });

										}else if(arraystringtipoArgumento[i]=="moneda" && arraystringargumentosNombres[i]=="Valor Unitario"){


											$("."+parametro5+contadorGeneral).append('<td><input type="text"  class="solo__numero__montos selector__inicial camposAtados'+contadorGeneral+' calculoValorUnitario'+contadorGeneral+' ingreso__infor__calculo requeridos__componentes__deportistas campos__relacionados numeros__ceros__blur" value="0" nombreColumna="'+arraystringargumentosNombres[i]+'" identificadorColumna="principal"></td>');


								 			$(".solo__numero__montos").on('input', function () {
											     this.value = this.value.replace(/[^0-9,.]/g, '').replace(',','.');
											 });

										}else if(arraystringtipoArgumento[i]=="numerico" && arraystringargumentosNombres[i]=="Cantidad"){

											$("."+parametro5+contadorGeneral).append('<td><input type="text" class="solo__numero selector__inicial camposAtados'+contadorGeneral+' calculoCantidad'+contadorGeneral+' ingreso__infor__calculo requeridos__componentes__deportistas campos__relacionados numeros__ceros__blur" value="0" nombreColumna="'+arraystringargumentosNombres[i]+'" identificadorColumna="principal"></td>');


											$(".solo__numero").on('input', function () {
												this.value = this.value.replace(/[^0-9]/g, '');
											});

										}else if (arraystringtipoArgumento[i]=="valorDefinido") {

									  		 $("."+parametro5+contadorGeneral).append('<td><select class="selector__inicial select__escogidos requeridos__componentes__deportistas campos__relacionados camposAtadosTerceros'+contadorGeneral+'" id="'+parametro6+contadorGeneral+'" idContador="'+contadorGeneral+'" nombreColumna="'+arraystringargumentosNombres[i]+'" identificadorColumna="principal"><option value="">--Escoger una opción</option></select></td>');

										  	for (var z = 0; z < arraystringidArgumentosDefinidos.length; z++) {

										  		$("#"+parametro6+contadorGeneral).append('<option value="'+arraystringidArgumentosDefinidos[z]+'" opcionNombre="'+arraystringnombresDefinidos[z]+'" opcionIdentificadora="'+arraystringcheckedsDesgloses[z]+'">'+arraystringnombresDefinidos[z]+'</option>');

										  	}

		

										  	/*==========================================
										  	=            Selección id Items            =
										  	==========================================*/
										  	
										    var funcionChangeOtros=function(parametro1){

												$("#"+parametro1).change(function(e){

													/*========================================
													=            Removiendo Otros            =
													========================================*/
													
													var idContador=$(this).attr('idContador');

													$(".otros__filas"+idContador).remove();	


													
													/*=====  End of Removiendo Otros  ======*/
													
													var opcionDetallada = $("#"+parametro1+' option:selected').attr('opcionIdentificadora');

													var opcionDetalladaNombre = $("#"+parametro1+' option:selected').attr('opcionNombre');

													$(".inputCreadoSelect"+idContador).remove();


													if (opcionDetallada=="si") {

														$(".inputCreadoSelect"+idContador).remove();


														if (contadorComponentesGeneral>0) {

															contadorComponentesGeneral--;

														}

														

														/*=================================================
													  	=            Ocultar los campos Atados            =
													  	=================================================*/

													  	$("#anadirModales"+idContador).addClass('clase__invisibles');
													  	
													  	$(".camposAtados"+idContador).hide();

													  	$(".camposAtadosSegundo"+idContador).val("0");

													  	$(".camposAtadosSegundo"+idContador).removeClass('campos__relacionados');

													  	$(".camposAtadosTerceros"+idContador).removeClass('campos__relacionados');

													  	$(".bodys__contenidos"+idContador).removeClass('componentes__conjunto');	

													  	$(".bodys__contenidos"+idContador).removeClass('componenete__unico'+idContador);		
													  	
													  	/*=====  End of Ocultar los campos Atados  ======*/
													  	

														contadorOtros++;

														$("#"+parametro1).after('<center><button id="anadirOtros'+idContador+'" idContador="'+idContador+'" class="btn btn-primary otros__filas'+idContador+'"><i class="fas fa-plus-circle"></i></button></center>');

														/*=========================================
														=            Añadir Fila Otros            =
														=========================================*/
														
														$("#anadirOtros"+idContador).click(function(e){

															contadorOtrosAnadidos++;

															var idContador=$(this).attr('idContador');

															contadorComponentesGeneral=contadorComponentesGeneral+1;

								
															$(".bodys__contenidos"+idContador).after('<tr class="otros__filas'+idContador+' conjuntos__creados'+idContador+' componentes__conjunto componenete__unico'+contadorComponentesGeneral+'" id="otrosFilasCreadas'+contadorOtrosAnadidos+'" tipo="otros" identificadorComponente="'+idContador+'"></tr>');


															/*============================================
															=            Creación de la tabla            =
															============================================*/
															
															for (var z = 0; z < arraystringidArgumentos.length; z++) {

																if (arraystringtipoArgumento[z]=="moneda" && arraystringargumentosNombres[z]=="Valor Total") {
					
															  		$("#otrosFilasCreadas"+contadorOtrosAnadidos).append('<td><input type="text" class="solo__numero__montos selector__inicial totalCalculadoOtros'+contadorOtrosAnadidos+' sumador__totales requeridos__componentes__deportistas campos__relacionados numeros__ceros__blur" nombreColumna="'+arraystringargumentosNombres[z]+'" identificadorColumna="otros" value="0" disabled=""></td>');

																	 $(".solo__numero__montos").on('input', function () {
																	     this.value = this.value.replace(/[^0-9,.]/g, '').replace(',','.');
																	 });


																}else if (arraystringtipoArgumento[z]=="moneda" && arraystringargumentosNombres[z]=="Valor Unitario") {
					
															  		$("#otrosFilasCreadas"+contadorOtrosAnadidos).append('<td><input type="text" class="solo__numero__montos selector__inicial  calculoValorUnitarioOtros'+contadorOtrosAnadidos+' ingreso__infor__calculo requeridos__componentes__deportistas campos__relacionados numeros__ceros__blur" value="0" nombreColumna="'+arraystringargumentosNombres[z]+'" identificadorColumna="otros" ></td>');

																	 $(".solo__numero__montos").on('input', function () {
																	     this.value = this.value.replace(/[^0-9,.]/g, '').replace(',','.');
																	 });


																}else if (arraystringtipoArgumento[z]=="numerico" && arraystringargumentosNombres[z]=="Cantidad") {

									  								$("#otrosFilasCreadas"+contadorOtrosAnadidos).append('<td><input type="text" class="solo__numero selector__inicial calculoCantidadOtros'+contadorOtrosAnadidos+' ingreso__infor__calculo requeridos__componentes__deportistas campos__relacionados numeros__ceros__blur" value="0" nombreColumna="'+arraystringargumentosNombres[z]+'" identificadorColumna="otros" ></td>');

															  		 $(".solo__numero").on('input', function () {
																	     this.value = this.value.replace(/[^0-9]/g, '');
																	 });

																}else if (arraystringtipoArgumento[z]=="valorDefinido") {

																	$("#otrosFilasCreadas"+contadorOtrosAnadidos).append('<td colspan="2"><input type="text" placeholder="Describa otros" class="selector__inicial requeridos__componentes__deportistas campos__relacionados numeros__ceros__blur" nombreColumna="'+arraystringargumentosNombres[z]+'" identificadorColumna="otros"></td>');

																}else if(arraystringtipoArgumento[z]=="moneda"){

															  		$("#otrosFilasCreadas"+contadorOtrosAnadidos).append('<td><input type="text" class="solo__numero__montos selector__inicial requeridos__componentes__deportistas campos__relacionados numeros__ceros__blur" nombreColumna="'+arraystringargumentosNombres[z]+'" identificadorColumna="otros" ></td>');

																	 $(".solo__numero__montos").on('input', function () {
																	     this.value = this.value.replace(/[^0-9,.]/g, '').replace(',','.');
																	 });

															  	}else if(arraystringtipoArgumento[z]=="numerico"){

															  		$("#otrosFilasCreadas"+contadorOtrosAnadidos).append('<td><input type="text" class="solo__numero selector__inicial requeridos__componentes__deportistas campos__relacionados numeros__ceros__blur" nombreColumna="'+arraystringargumentosNombres[z]+'" identificadorColumna="otros" ></td>');

															  		 $(".solo__numero").on('input', function () {
																	     this.value = this.value.replace(/[^0-9]/g, '');
																	 });

															  	}else if(arraystringtipoArgumento[z]=="texto"){

															  		$("#otrosFilasCreadas"+contadorOtrosAnadidos).append('<td><input type="text" class="texto selector__inicial requeridos__componentes__deportistas campos__relacionados" nombreColumna="'+arraystringargumentosNombres[z]+'" identificadorColumna="otros" placeholder="Ingrese detalle de esta sección"></td>');

															  	}else if(arraystringtipoArgumento[z]=="formula"){

															  		$("#otrosFilasCreadas"+contadorOtrosAnadidos).append('<td><center><input type="text" class="selector__inicial requeridos__componentes__deportistas campos__relacionados numeros__ceros__blur" nombreColumna="'+arraystringargumentosNombres[z]+'" identificadorColumna="otros">formula='+arraystringformula[0]+'</center></td>');

															  	}else if(arraystringtipoArgumento[z]=="monto"){

															  		$("#otrosFilasCreadas"+contadorOtrosAnadidos).append('<td><center style="display:flex;"><button class="btn btn-primary" data-toggle="modal" data-target="#editarValoresComponentesOtros'+contadorOtrosAnadidos+'" id="anadirModalesOtros'+contadorOtrosAnadidos+'" style="padding:0; font-size:8px!important; height:44px; margin-right:1em;">Agregar montos</button><center><input type="text" class="selector__inicial requeridos__componentes__deportistas campos__relacionados numeros__ceros__blur montos__blures" nombreColumna="'+arraystringargumentosNombres[z]+'" identificadorColumna="otros" disabled="" id="montoAbiertoOtros'+contadorOtrosAnadidos+'" value="0"/></center></td>');

															  		/*======================================
															  		=            Cregando modal            =
															  		======================================*/
															  		
															  		var funcionCreandoModales=function(parametro1,parametro2,parametro3){

															  			$(parametro1).click(function(e){

																			if (!$("#editarValoresComponentesOtros"+parametro2).length > 0 ) {
										
																				$(".clases__modales__otros").append('<div id="editarValoresComponentesOtros'+parametro2+'" class="modal modales__montos__lineamientos" role="dialog" data-backdrop="static" data-keyboard="false"><div class="modal-dialog"></div><div class="modal-content" style="width:40%!important; position:relative; left:30%;"><div class="modal-header" style="width:100%;">Asignar montos</div><button type="button" class="closeButton buttonCalcular'+parametro2+' botonModalesCalculantes" id="buttonCalcular'+parametro2+'" data-dismiss="modal">&times;</button><div class="modal-body body__contenidosAlineadosOtros'+parametro2+' row"></div></div></div>');
																			}


																			/*=========================================
																			=            Meses seccionados            =
																			=========================================*/

																		    var funcionCreadoresLlamadas=function(parametro1,parametro2,parametro3,parametro4){

																				if (!$("#"+parametro3+parametro2+'__otros').length > 0 ) {

																					$(parametro1).append('<div class="col col-4 text-right letra__titulo">'+parametro3+'</div><div class="col col-8"><input class="valoresMontosConjuntosOtros'+parametro2+' salidasMontos montosRestituibles" mesAnioReferencial="'+parametro3+'" style="heigth:25px; width:100%;" value="0" id="'+parametro3+parametro2+'__otros"></div>');

																				}		    	

																				 $(".salidasMontos").on('input', function () {

																				     this.value = this.value.replace(/[^0-9,.]/g, '').replace(',','.');

																				 });

																				/*=========================================
																				=            Sumadores totales            =
																				=========================================*/
																				
																    			var funcionSumares=function(parametro1,parametro2,parametro3){

																					$(parametro3).on('input', function (event){

																						var sumadorRes=0;

																						var sumatoresEvaluadores=0;																																
																						$(".valoresMontosConjuntosOtros"+parametro2).each(function(){																							sumatoresEvaluadores += parseFloat($(this).val());
																						});

																						$(parametro4).val(parseFloat(sumatoresEvaluadores).toFixed(2));

																						/*===============================================
																						=            sumatores evaluadores 2            =
																						===============================================*/

																						var sumatoresEvaluadoresDoces=0;
																						
																						$(".salidasMontos").each(function(){											sumatoresEvaluadoresDoces += parseFloat($(this).val());
																						});
																																										
																						
																						/*=====  End of sumatores evaluadores 2  ======*/
																						
																						var valoresDefinitivos=0;

												    									sumadorRes=parseFloat($("#valoresCantidadesAsignadasIn").val())+parseFloat(sumatoresEvaluadoresDoces);

												    									valoresDefinitivos=parseFloat($("#valoresCantidadesIn").val())-parseFloat(sumadorRes)+parseFloat($("#valoresCantidadesAsignadasIn").val());

												    									$("#valoresCantidades").val(parseFloat(valoresDefinitivos).toFixed(2));
														    							$("#valoresCantidadesAsignadas").val(parseFloat(sumadorRes).toFixed(2));																				    
																					});						    	

																				}

																				funcionSumares($(".valoresMontosConjuntosOtros"+parametro2),parametro2,$("#"+parametro3+parametro2+"__otros"));								  	
																		  														
																				
																				/*=====  End of Sumadores totales  ======*/
																				

																			}


																			var resultadoObtenido= funcionFechasObtenidas($("#fechaInicial"),$("#fechaFinal"));

																			var auxliante=0;

																			for(var i=0;i<resultadoObtenido.length;i++){

																				var arreglo = resultadoObtenido[i].split("-");

																				var variableMes=parseInt(arreglo[1], 10);

																				var diferencia=12-parseInt(arreglo[1], 10);

																				var referenciaDiferencias=resultadoObtenido.length-1;

																				if (referenciaDiferencias===i) {

																					for(var z=1;z<=parseInt(arreglo[1], 10);z++){

																						var variableMesCreador=mesesFunciones(z);
																							
																						funcionCreadoresLlamadas($(".body__contenidosAlineadosOtros"+parametro2),parametro2,variableMesCreador+arreglo[0],parametro3);

																					}

																				}else{

																					for(var z=0;z<=diferencia;z++){

																						var variableMesCreador=mesesFunciones(variableMes);
																							
																						funcionCreadoresLlamadas($(".body__contenidosAlineadosOtros"+parametro2),parametro2,variableMesCreador+arreglo[0],parametro3);

																						variableMes++;

																					}

																				}

																			}
																			
																			/*=====  End of Meses seccionados  ======*/
																			


																		  	/*==========================================
																		  	=            Ceros desplegables            =
																		  	==========================================*/

																		    var funcionLlamarCerosEmergentes=function(parametro1){

																				$(parametro1).blur(function(e){
																					if($(this).val()==""){
																						$(this).val(0);
																					}
																				});	

																				$(parametro1).click(function(e){
																					if($(this).val()==0){
																						$(this).val("");
																					}
																				});						    	

																			}

																			funcionLlamarCerosEmergentes($(".salidasMontos"));								  	
																		  	
																		  	
																		  	/*=====  End of Ceros desplegables  ======*/



															  			});

															  		}

															  		funcionCreandoModales($("#anadirModalesOtros"+contadorOtrosAnadidos),contadorOtrosAnadidos,$("#montoAbiertoOtros"+contadorOtrosAnadidos));	
															  		
															  		/*=====  End of Cregando modal  ======*/
															  		


															  	}


																var funcionCalculoLlamar=function(parametro1,parametro2,parametro3,parametro4){

																	$(parametro1).keyup(function(e){

																		var formula=0;

																		formula=parseFloat($(this).val()) * parseFloat($(parametro3).val());

																		$(parametro4).val(formula.toFixed(2));


																	});	


																	$(parametro1).blur(function(e){
																		if($(this).val()==""){
																			$(this).val(0);
																		}
																	});	

																	$(parametro1).click(function(e){
																		if($(this).val()==0){
																			$(this).val("");
																		}
																	});						    	

																}

																funcionCalculoLlamar($(".calculoCantidadOtros"+contadorOtrosAnadidos),contadorOtrosAnadidos,$(".calculoValorUnitarioOtros"+contadorOtrosAnadidos),$(".totalCalculadoOtros"+contadorOtrosAnadidos));	
																funcionCalculoLlamar($(".calculoValorUnitarioOtros"+contadorOtrosAnadidos),contadorOtrosAnadidos,$(".calculoCantidadOtros"+contadorOtrosAnadidos),$(".totalCalculadoOtros"+contadorOtrosAnadidos));						    
							    	

																/*=====================================
															  	=            Sumador Total            =
															  	=====================================*/
															  	
															    var funcionCalcularTontalesTotales=function(parametro1,parametro2){

																	$(parametro1).keyup(function(e){

																		var sumadorTotales=0;

																     	$(parametro2).each(function(index) {

																     		var convertir=parseFloat($(this).val());

																     		sumadorTotales=sumadorTotales+convertir;
										
																		});

																     	$(".resultadoComponentesTotales").val(sumadorTotales.toFixed(2));

																	});	
											    	

																}

																funcionCalcularTontalesTotales($(".ingreso__infor__calculo"),$(".sumador__totales"));								  	
															  	
															  	/*=====  End of Sumador Total  ======*/					    							    						    			

															}

															$("#otrosFilasCreadas"+contadorOtrosAnadidos).append('<td><center><center><button id="eliminarDesagregados'+contadorOtrosAnadidos+'" idContador="'+contadorOtrosAnadidos+'" class="btn btn-danger"><i class="fas fa-trash"></i></button></center></center></td>');														
															
															/*=====  End of Creación de la tabla  ======*/
															
															/*================================
															=            Eliminar            =
															================================*/
															
															$("#eliminarDesagregados"+contadorOtrosAnadidos).click(function(e){

																var idContador=$(this).attr('idContador');

																$("#otrosFilasCreadas"+idContador).remove();

																contadorComponentesGeneral--;

															});
																		
															/*=====  End of Eliminar  ======*/
															


														});			

														/*=====  End of Añadir Fila Otros  ======*/
														

													}else{

														$("#anadirModales"+idContador).removeClass('clase__invisibles');

														$(".otros__filas"+idContador).remove();	

														$(".camposAtados"+idContador).show();	

														$(".camposAtadosSegundo"+idContador).addClass('campos__relacionados');

														$(".camposAtadosTerceros"+idContador).addClass('campos__relacionados');

														$(".camposAtadosSegundo"+idContador).val(" ");

														$(".bodys__contenidos"+idContador).addClass('componentes__conjunto');	

														$(".bodys__contenidos"+idContador).addClass('componenete__unico'+idContador);	

														$("#"+parametro1).after('<input type="hidden" value="'+opcionDetalladaNombre+'" class="inputCreadoSelect'+idContador+'">');

														if(contadorOtros>0){

															contadorOtros++;
															contadorOtros--;

														}


													}


												});						    	

											}

											funcionChangeOtros(parametro6+contadorGeneral);											  	
										  	
										  	/*=====  End of Selección id Items  ======*/
										  	

									  	}else if(arraystringtipoArgumento[i]=="moneda"){

									  		$("."+parametro5+contadorGeneral).append('<td><input type="text" class="solo__numero__montos selector__inicial camposAtados'+contadorGeneral+' requeridos__componentes__deportistas camposAtadosSegundo'+contadorGeneral+' campos__relacionados '+arraystringargumentosNombres[i]+contadorGeneral+' camposConsecutivos'+contadorGeneral+'" nombreColumna="'+arraystringargumentosNombres[i]+' numeros__ceros__blur" identificadorColumna="principal" value="0"></td>');

											 $(".solo__numero__montos").on('input', function () {
											     this.value = this.value.replace(/[^0-9,.]/g, '').replace(',','.');
											 });

									  	}else if(arraystringtipoArgumento[i]=="numerico"){

									  		$("."+parametro5+contadorGeneral).append('<td><input type="text" class="solo__numero selector__inicial camposAtados'+contadorGeneral+' requeridos__componentes__deportistas camposAtadosSegundo'+contadorGeneral+' campos__relacionados '+arraystringargumentosNombres[i]+contadorGeneral+' camposConsecutivos'+contadorGeneral+'" nombreColumna="'+arraystringargumentosNombres[i]+' numeros__ceros__blur" identificadorColumna="principal" value="0"></td>');


											$(".solo__numero").on('input', function () {
												this.value = this.value.replace(/[^0-9]/g, '');
											});

									  	}else if(arraystringtipoArgumento[i]=="texto"){

									  		$("."+parametro5+contadorGeneral).append('<td><input type="text" class="texto selector__inicial camposAtados'+contadorGeneral+' requeridos__componentes__deportistas camposAtadosSegundo'+contadorGeneral+' campos__relacionados '+arraystringargumentosNombres[i]+contadorGeneral+' camposConsecutivos'+contadorGeneral+'" nombreColumna="'+arraystringargumentosNombres[i]+'" identificadorColumna="principal"  placeholder="Ingrese detalle de esta sección"></td>');

									  	}else if(arraystringtipoArgumento[i]=="formula"){

									  		$("."+parametro5+contadorGeneral).append('<td><center><input id="#formulaResultante'+contadorGeneral+'" class="campos__relacionado selector__inicial '+arraystringargumentosNombres[i]+contadorGeneral+' camposConsecutivos'+contadorGeneral+' numeros__ceros__blur camposAtados'+contadorGeneral+'" value="0">formula='+arraystringformula[0]+'</center></td>');

									  	}else if(arraystringtipoArgumento[i]=="monto"){

									  		$("."+parametro5+contadorGeneral).append('<td><center style="display:flex;"><button class="btn btn-primary" data-toggle="modal" data-target="#editarValoresComponentes'+contadorGeneral+'" id="anadirModales'+contadorGeneral+'" style="padding:0; font-size:8px!important; height:44px; margin-right:1em;">Agregar montos</button><input id="montoAbierto'+contadorGeneral+'" class="campos__relacionado selector__inicial '+arraystringargumentosNombres[i]+contadorGeneral+' camposConsecutivos'+contadorGeneral+' numeros__ceros__blur montos__sasegrados camposAtados'+contadorGeneral+' montos__blures" value="0" disabled=""></center></td>');

									  	}


									  	/*=====================================
									  	=            Creando modal            =
									  	=====================================*/
									  	
										var funcionCreandoModales=function(parametro1,parametro2,parametro3){

											$(parametro1).click(function(e){

												if (!$("#editarValoresComponentes"+parametro2).length > 0 ) {
			
													$(".clases__modales").append('<div id="editarValoresComponentes'+parametro2+'" class="modal modales__montos__lineamientos" role="dialog" data-backdrop="static" data-keyboard="false"><div class="modal-dialog"></div><div class="modal-content" style="width:40%!important; position:relative; left:30%;"><div class="modal-header" style="width:100%;">Asignar montos</div><button type="button" class="closeButton botonModalesCalculantes" data-dismiss="modal">&times;</button><div class="modal-body body__contenidosAlineados'+parametro2+' row"></div></div></div>');

												}


												/*=========================================
												=            Meses seccionados            =
												=========================================*/

											    var funcionCreadoresLlamadas=function(parametro1,parametro2,parametro3,parametro4){

													if (!$("#"+parametro3+parametro2).length > 0 ) {

														$(parametro1).append('<div class="col col-4 text-right letra__titulo">'+parametro3+'</div><div class="col col-8"><input class="valoresMontosConjuntos'+parametro2+' salidasMontos montosRestituibles" mesAnioReferencial="'+parametro3+'" style="heigth:25px; width:100%;" value="0" id="'+parametro3+parametro2+'"></div>');

													}		    	


													$(".salidasMontos").on('input', function () {

														this.value = this.value.replace(/[^0-9,.]/g, '').replace(',','.');

													});


													/*=========================================
													=            Sumadores totales            =
													=========================================*/
													
									    			var funcionSumares=function(parametro1,parametro2,parametro3){

														$(parametro3).blur(function(e){

															var sumadorRes=0;

															var sumatoresEvaluadores=0;

															$(".valoresMontosConjuntos"+parametro2).each(function(){
																sumatoresEvaluadores += parseFloat($(this).val());
															});

														    $(parametro4).val(parseFloat(sumatoresEvaluadores).toFixed(2));

														    /*===============================================
															=            sumatores evaluadores 2            =
															===============================================*/

															var sumatoresEvaluadoresDoces=0;
																						
															$(".salidasMontos").each(function(){													sumatoresEvaluadoresDoces += parseFloat($(this).val());
															});
																																										
																						
															/*=====  End of sumatores evaluadores 2  ======*/

															var valoresDefinitivos=0;
																						
														    sumadorRes=parseFloat($("#valoresCantidadesAsignadasIn").val())+parseFloat(sumatoresEvaluadoresDoces);

														    valoresDefinitivos=parseFloat($("#valoresCantidadesIn").val())-parseFloat(sumadorRes)+parseFloat($("#valoresCantidadesAsignadasIn").val());

														    $("#valoresCantidades").val(parseFloat(valoresDefinitivos).toFixed(2));

														    $("#valoresCantidadesAsignadas").val(parseFloat(sumadorRes).toFixed(2));

														    /*=========================================
														    =            Resas priorizados            =
														    =========================================*/

														    var resadorPriorizados=0;
													 
														    if (variableEvaluadora=="priorizados") {
												    	
														    	resadorPriorizados=parseFloat($("#porcentajesPriorritariosMontosFijos").val()) - parseFloat(sumatoresEvaluadoresDoces);

														    	$("#porcentajesPriorritariosMontos").val(resadorPriorizados.toFixed(2));

														    }
														    
														    /*=====  End of Resas priorizados  ======*/
														    
														    /*=====================================
														    =            Resas mujeres            =
														    =====================================*/
														    
														    var resadorMujeres=0;
													 
														    if (variableEvaluadora=="femeninas") {
												    	
														    	resadorPriorizados=parseFloat($("#porcentajesMujeresMontosFijos").val()) - parseFloat(sumatoresEvaluadoresDoces);

														    	$("#porcentajesMujeresMontos").val(resadorPriorizados.toFixed(2));

														    }														    
														    
														    /*=====  End of Resas mujeres  ======*/
														    

														});			



													}

													funcionSumares($(".valoresMontosConjuntos"+parametro2),parametro2,$("#"+parametro3+parametro2));								  	
											  														
													
													/*=====  End of Sumadores totales  ======*/
													

												}

												var resultadoObtenido= funcionFechasObtenidas($("#fechaInicial"),$("#fechaFinal"));

												var auxliante=0;

												for(var i=0;i<resultadoObtenido.length;i++){

													var arreglo = resultadoObtenido[i].split("-");

													var variableMes=parseInt(arreglo[1], 10);

													var diferencia=12-parseInt(arreglo[1], 10);

													var referenciaDiferencias=resultadoObtenido.length-1;

													if (referenciaDiferencias===i) {

														for(var z=1;z<=parseInt(arreglo[1], 10);z++){

															var variableMesCreador=mesesFunciones(z);
																
															funcionCreadoresLlamadas($(".body__contenidosAlineados"+parametro2),parametro2,variableMesCreador+arreglo[0],parametro3);

														}

													}else{

														for(var z=0;z<=diferencia;z++){

															var variableMesCreador=mesesFunciones(variableMes);
																
															funcionCreadoresLlamadas($(".body__contenidosAlineados"+parametro2),parametro2,variableMesCreador+arreglo[0],parametro3);

															variableMes++;

														}

													}

												}
												
												/*=====  End of Meses seccionados  ======*/
												
											  	/*==========================================
											  	=            Ceros desplegables            =
											  	==========================================*/

											    var funcionLlamarCerosEmergentes=function(parametro1){

													$(parametro1).blur(function(e){
														if($(this).val()==""){
															$(this).val(0);
														}
													});	

													$(parametro1).click(function(e){
														if($(this).val()==0){
															$(this).val("");
														}
													});						    	

												}

												funcionLlamarCerosEmergentes($(".salidasMontos"));								  	
											  	
											  	
											  	/*=====  End of Ceros desplegables  ======*/
											  	

											});	
											    	
										}

										funcionCreandoModales($("#anadirModales"+contadorGeneral),contadorGeneral,$("#montoAbierto"+contadorGeneral));										  	
									  	
									  	/*=====  End of Creando modal  ======*/
									  	


									  	/*==========================================
									  	=            Ceros desplegables            =
									  	==========================================*/

									    var funcionLlamarCeros=function(parametro1){

											$(parametro1).blur(function(e){
												if($(this).val()==""){
													$(this).val(0);
												}
											});	

											$(parametro1).click(function(e){
												if($(this).val()==0){
													$(this).val("");
												}
											});						    	

										}

										funcionLlamarCeros($(".numeros__ceros__blur"));								  	
									  	
									  	
									  	/*=====  End of Ceros desplegables  ======*/
									  	

									  	/*=========================================
									  	=            formulas calcular            =
									  	=========================================*/
									  	
									    var funcionCalculoLlamar=function(parametro1,parametro2,parametro3,parametro4){

											$(parametro1).keyup(function(e){

												var formula=0;

												formula=parseFloat($(this).val()) * parseFloat($(parametro3).val());

												$(parametro4).val(formula.toFixed(2));


											});	


											$(parametro1).blur(function(e){
												if($(this).val()==""){
													$(this).val(0);
												}
											});	

											$(parametro1).click(function(e){
												if($(this).val()==0){
													$(this).val("");
												}
											});						    	

										}

										funcionCalculoLlamar($(".calculoCantidad"+contadorGeneral),contadorGeneral,$(".calculoValorUnitario"+contadorGeneral),$(".totalCalculado"+contadorGeneral));	
										funcionCalculoLlamar($(".calculoValorUnitario"+contadorGeneral),contadorGeneral,$(".calculoCantidad"+contadorGeneral),$(".totalCalculado"+contadorGeneral));						    
							    							    						    															  	
									  	
									  	/*=====  End of formulas calcular  ======*/
									  	/*=====================================
									  	=            Sumador Total            =
									  	=====================================*/
									  	
									    var funcionCalcularTontalesTotales=function(parametro1,parametro2){

											$(parametro1).keyup(function(e){

												var sumadorTotales=0;

										     	$(parametro2).each(function(index) {

										     		var convertir=parseFloat($(this).val());

										     		sumadorTotales=sumadorTotales+convertir;
				
												});

										     	$(".resultadoComponentesTotales").val(sumadorTotales.toFixed(2));

											});	
					    	

										}

										funcionCalcularTontalesTotales($(".ingreso__infor__calculo"),$(".sumador__totales"));								  	
									  	
									  	/*=====  End of Sumador Total  ======*/
									
									
									}	

									/*==================================
									=            Fila extra            =
									==================================*/

									/*===========================================
									=            Funciones inserción            =
									===========================================*/
									
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
									          }else{
									          	$(this).removeClass('error');
									          }
									     });

									}								
																			
									function concatenarValoresComponentes(parametro1){
										
										var array = new Array(); 

									    $(parametro1).each(function(index) {

									        array.push($(this).attr('nombreColumna')+"/--/"+$(this).attr('identificadorColumna')+"/--/"+$(this).val());

									    });


									    return array;

									}

									function sumarComponentes(parametro1){
										
										var sumador=0;

									    $(parametro1).each(function(index) {

											sumador=sumador+1;								        

									    });


									    return sumador;

									}



									function obtenerParametrosSecuencialesDos(parametro1,parametro2){

										var array = new Array(); 
										
									    $(parametro1).each(function(index) {

									   		array.push($(this).attr('mesAnioReferencial')+"___"+parseFloat($(this).val()).toFixed(2));	

									    });

									    var stringArray=array.join("/../");


									    return stringArray;

									}


									function obtenerParametrosSecuenciales(parametro1,parametro2){

										var array = new Array(); 

										var contador2=0;
										
									    $(parametro1).find('td').find('input').each(function(index) {

									    	contador2++;
									   		
									    	if (contador2<=parametro2) {
									    		array.push($(this).val());	
									    	}

									    	

									    });

									    var stringArray=array.join("/../");


									    return stringArray;

									}

									function obtenerHeads(parametro1){

										var array = new Array(); 
										
									    $(parametro1).find('th').each(function(index) {

											array.push($(this).text());								        

									    });


									    return array;

									}

									function obtenerceros(parametro1){

										var sumadores=0;
										
									    $(parametro1).each(function(index) {

									    	if ($(this).val()=="0" || $(this).val()==0) {

									    		sumadores=sumadores+1;	

									    	}				        

									    });


									    return sumadores;

									}



									/*=====  End of Funciones inserción  ======*/



								    if (parametro1!=1) {

								    	// $(".footePrincipal"+contadorGeneral).append('<tr><th colspan="2" style="background:#212B5C!important;">Total</th><th style="background:#212B5C!important;" colspan="'+arraystringidArgumentos.length+'"><input type="text" id="resultadoComponentesTotales" class="selector__inicial resultadoComponentesTotales" value="0" style="color:black;!important" readonly=""/></th></tr>');
									  	
								    	$(".footePrincipal"+contadorGeneral).append('<tr><th style="background:white!important;" colspan="'+(arraystringidArgumentos.length+2)+'"><button id="guardarTotal" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;Guardar</button><div class="reload__nuevos"></div></th></tr>');


								    	/*=======================================
								    	=            Guardar totales            =
								    	=======================================*/
								    	
										$('#guardarTotal').click(function (e){

											e.preventDefault();

											var sumadorComponentes= sumarComponentes($(".componentes__conjunto"));
											var sumadorModalesLineamientos= sumarComponentes($(".modales__montos__lineamientos"));

											
											validador= validacionRegistro($(".requeridos__componentes__deportistas"));
											validacionRegistroMostrarErrores($(".requeridos__componentes__deportistas"));

											$(this).hide();


											$(".reload__nuevos").html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');


											/*======================================================
											=            Sumador de montops especificos            =
											======================================================*/

											var arraySumadoresMontos = new Array(); 

											for(zCl=1;zCl<=sumadorModalesLineamientos;zCl++){

												var parametrosSecuencialesMontitos= obtenerParametrosSecuencialesDos($(".valoresMontosConjuntos"+zCl),contadorDiferido);

												arraySumadoresMontos.push(parametrosSecuencialesMontitos);

											}							

											for(zCl=1;zCl<=sumadorModalesLineamientos;zCl++){

												var parametrosSecuencialesMontitos= obtenerParametrosSecuencialesDos($(".valoresMontosConjuntosOtros"+zCl),contadorDiferido);

												arraySumadoresMontos.push(parametrosSecuencialesMontitos);

											}		
										

											/*=====  End of Sumador de montops especificos  ======*/
											

											/*================================================
											=            Componentes concatenados            =
											================================================*/
											

											var arrayComponentesConcatenados = new Array(); 

											for(z=0;z<sumadorComponentes;z++){

												var parametrosSecuenciales= obtenerParametrosSecuenciales($(".componenete__unico"+(z+1)),contadorDiferido);

												arrayComponentesConcatenados.push(parametrosSecuenciales);

											}			

											var arrayRealizados = new Array(); 

											var arrayConvertidos = new Array(); 

											for(wl=0;wl<arrayComponentesConcatenados.length;wl++){

												var arrayRealizados = arrayComponentesConcatenados[wl].split('/../'); 

												var lastItem = arrayRealizados.pop();

												var lstItemFormatos=parseFloat(lastItem).toFixed(2);

												arrayConvertidos.push(lstItemFormatos);


											}	

											var sumatoresAdicionales=0;

											for(wc=0;wc<arrayConvertidos.length;wc++){

												sumatoresAdicionales= sumatoresAdicionales + parseFloat(arrayConvertidos[wc]);


											}	

											var acuadaladosSumatores=$("#sumadorAsignadosComponentes").val();


											var sumatoresRealizadosAbsolutos=parseFloat(sumatoresAdicionales) + parseFloat(acuadaladosSumatores);																		
											var sumatoresRealizadosAbsolutosSegundo=sumatoresRealizadosAbsolutos.toFixed(2);

											var cantiAsignadas=$("#sumadorTotalesDados").val();

											var cantiAsignadasDos=parseFloat(cantiAsignadas).toFixed(2);

											var idProbantes=$("#componenteSeleccionable1").val();

											var idProbantesDos=parseFloat(idProbantes);
											

											var sumatoresRealizadosAdicionales=parseFloat(sumatoresAdicionales);																		
											var sumatoresRealizadosAdicionalesDos=sumatoresRealizadosAdicionales.toFixed(2);

											/*=====  End of Componentes concatenados  ======*/

											function percentage(percent, total) {
												return ((percent/ 100) * total).toFixed(2)
											}

											var percentResult = percentage(30, cantiAsignadasDos);

											var percentResultDos=parseFloat(percentResult).toFixed(2);

											/*===================================
											=            Porcentajes            =
											===================================*/

											var percentResult20 = percentage(20, cantiAsignadasDos);
											var percentResult20Dos=parseFloat(percentResult20).toFixed(2);

											var percentResult15 = percentage(15, cantiAsignadasDos);
											var percentResult15Dos=parseFloat(percentResult15).toFixed(2);

											var percentResult12 = percentage(12, cantiAsignadasDos);
											var percentResult12Dos=parseFloat(percentResult12).toFixed(2);

											var percentResult10 = percentage(10, cantiAsignadasDos);
											var percentResult10Dos=parseFloat(percentResult10).toFixed(2);

											var percentResult7 = percentage(7.5, cantiAsignadasDos);
											var percentResult7Dos=parseFloat(percentResult7).toFixed(2);
											
											
											/*=====  End of Porcentajes  ======*/
											sumadores= obtenerceros($(".montos__sasegrados"));

											if(variableEvaluadora=="priorizados" && parseFloat($("#porcentajesPriorritariosMontos"))<0){

												alertify.set("notifier","position", "top-right");
												alertify.notify("El valor del sector priorizado excede el porcentaje de la cantidad asignada", "error", 5, function(){});

												$(this).show();

												$(".reload__nuevos").html('');

											}else if(variableEvaluadora=="femeninas" && parseFloat($("#porcentajesPriorritariosMontos"))<0){

												alertify.set("notifier","position", "top-right");
												alertify.notify("El valor del sector femenino excede el porcentaje de la cantidad asignada", "error", 5, function(){});

												$(this).show();

												$(".reload__nuevos").html('');

											}else if (validador==false) {

												alertify.set("notifier","position", "top-right");
												alertify.notify("Es obligatorio ingresar todos los campos creados", "error", 5, function(){});

												$(this).show();

												$(".reload__nuevos").html('');
	 
											}else if(sumadorComponentes==0){

												alertify.set("notifier","position", "top-right");
												alertify.notify("Es necesario crear una fila de envío", "error", 5, function(){});

												$(this).show();

												$(".reload__nuevos").html('');

											}else if(parseFloat($("#valoresCantidades").val()).toFixed(2)<0){

												alertify.set("notifier","position", "top-right");
												alertify.notify("Su prespuesto suma "+parseFloat($("#valoresCantidadesAsignadas").val()).toFixed(2)+" excediendo el valor que queda por asignar", "error", 20, function(){});

												$(this).show();

												$(".reload__nuevos").html('');

											}else if(parseFloat(sumatoresRealizadosAdicionalesDos)>parseFloat(percentResultDos) && parseFloat(idProbantesDos)==32){

												alertify.set("notifier","position", "top-right");
												alertify.notify("Su prespuesto suma "+sumatoresRealizadosAdicionalesDos+" excediendo el 30% del monto para este componente. El monto máximo que puede sumar este componente es de "+percentResultDos, "error", 60, function(){});

												$(this).show();

												$(".reload__nuevos").html('');

											}else if(parseFloat(sumatoresRealizadosAdicionalesDos)>parseFloat(percentResult20Dos) && parseFloat(idProbantesDos)==37 && parseFloat(cantiAsignadasDos)<=100000){


												alertify.set("notifier","position", "top-right");
												alertify.notify("Su prespuesto suma "+sumatoresRealizadosAdicionalesDos+" excediendo el 20% del monto para este componente. El monto máximo que puede sumar este componente es de "+percentResult20Dos, "error", 60, function(){});

												$(this).show();

												$(".reload__nuevos").html('');

											}else if(parseFloat(sumatoresRealizadosAdicionalesDos)>parseFloat(percentResult15Dos) && parseFloat(idProbantesDos)==37 && (parseFloat(cantiAsignadasDos)>=100001 && parseFloat(cantiAsignadasDos)<=250000)){


												alertify.set("notifier","position", "top-right");
												alertify.notify("Su prespuesto suma "+sumatoresRealizadosAdicionalesDos+" excediendo el 15% del monto para este componente. El monto máximo que puede sumar este componente es de "+percentResult15Dos, "error", 60, function(){});

												$(this).show();

												$(".reload__nuevos").html('');

											}else if(parseFloat(sumatoresRealizadosAdicionalesDos)>parseFloat(percentResult12Dos) && parseFloat(idProbantesDos)==37 && (parseFloat(cantiAsignadasDos)>=250001 && parseFloat(cantiAsignadasDos)<=500000)){


												alertify.set("notifier","position", "top-right");
												alertify.notify("Su prespuesto suma "+sumatoresRealizadosAdicionalesDos+" excediendo el 12% del monto para este componente. El monto máximo que puede sumar este componente es de "+percentResult12Dos, "error", 60, function(){});

												$(this).show();

												$(".reload__nuevos").html('');

											}else if(parseFloat(sumatoresRealizadosAdicionalesDos)>parseFloat(percentResult10Dos) && parseFloat(idProbantesDos)==37 && (parseFloat(cantiAsignadasDos)>=500001 && parseFloat(cantiAsignadasDos)<=1000000)){


												alertify.set("notifier","position", "top-right");
												alertify.notify("Su prespuesto suma "+sumatoresRealizadosAdicionalesDos+" excediendo el 10% del monto para este componente. El monto máximo que puede sumar este componente es de "+percentResult10Dos, "error", 60, function(){});

												$(this).show();

												$(".reload__nuevos").html('');

											}else if(parseFloat(sumatoresRealizadosAdicionalesDos)>parseFloat(percentResult7Dos) && parseFloat(idProbantesDos)==37 && (parseFloat(cantiAsignadasDos)>=1000001)){


												alertify.set("notifier","position", "top-right");
												alertify.notify("Su prespuesto suma "+sumatoresRealizadosAdicionalesDos+" excediendo el 7.5% del monto para este componente. El monto máximo que puede sumar este componente es de "+percentResult7Dos, "error", 60, function(){});

												$(this).show();

												$(".reload__nuevos").html('');

											}else{

												var paqueteDeDatos = new FormData();

												var arrayHeadTotales= obtenerHeads($(".headTablasComponentes"));

												var stringHeadTablas = arrayHeadTotales.join("/../");

												var codigo=$("#codigoProyecto").val();



												paqueteDeDatos.append('itemsEscogidos', itemsEscogidos);

												paqueteDeDatos.append('codigo', codigo);

												paqueteDeDatos.append('sumadorComponentes', sumadorComponentes);

												paqueteDeDatos.append('stringHeadTablas', stringHeadTablas);


												paqueteDeDatos.append('arrayComponentesConcatenados',JSON.stringify(arrayComponentesConcatenados));

												paqueteDeDatos.append('arraySumadoresMontos',JSON.stringify(arraySumadoresMontos));

												if(variableEvaluadora=="priorizados"){

													paqueteDeDatos.append('etiquetas','priorizados');

												}else if(variableEvaluadora=="femeninas"){

													paqueteDeDatos.append('etiquetas','femeninas');

												}else{

													paqueteDeDatos.append('etiquetas','componentes');

												}


												/*=====================================
												=            Ajad ingresos           =
												=====================================*/
												

												var destino = "modelosBd/inserta/insertaComponentesCiudadanos.md.php"; 

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
												
												/*=====  End of Ajad ingresos  ======*/
												

											}
											
										});							    	
								    	
								    	/*=====  End of Guardar totales  ======*/
								    	

								    }
									
									/*=====  End of Fila extra  ======*/
									

									/*=======================================
									=            Columnas extras            =
									=======================================*/

									$("."+parametro4+contadorGeneral).append('<th>Acciones</th>');

	 								if(parametro4==1){

										$("."+parametro5+contadorGeneral).append('<td><center><center><button id="elminarFilasAnadidasPrincipales'+contadorGeneral+'" idContador="'+contadorGeneral+'" class="btn btn-danger"><i class="fas fa-trash"></i></button></center></center></td>');	

										/*================================
										=            Eliminar            =
										================================*/
															
										$("#elminarFilasAnadidasPrincipales"+contadorGeneral).click(function(e){

											var idContador=$(this).attr('idContador');

											if (idContador==contadorGeneral) {

												$(".bodys__contenidos"+idContador).remove();

												if (contadorGeneral>0) {
													contadorGeneral--;
												}

												if(contadorComponentesGeneral>0){
													contadorComponentesGeneral--;
												}

											}else{

												alertify.set("notifier","position", "top-right");
												alertify.notify("Es necesario eliminar la última fila creada", "error", 5, function(){});

											}


										});
																		
										/*=====  End of Eliminar  ======*/
									}else{

										$("."+parametro5+contadorGeneral).append('<td><center><button id="anadirFilasDesagregadas'+contadorGeneral+'" idContador="'+contadorGeneral+'" class="btn btn-primary"><i class="fas fa-plus-circle"></i></button></center></td>');	

									}
								    					
									/*=====  End of Columnas extras  ======*/
									
								    
								    /*=====  End of Añadiendo filas  ======*/

								}

								funcionFilas($(".head__principal"+contadorComponentesDeportistas),contadorComponentesDeportistas,$(".boddy__contenedorPrincipal"+contadorComponentesDeportistas),"headItemsEscogidos","bodys__contenidos","selectEscogidosItems");
							    
							    /*=====  End of Función para ver filas  ======*/
							  


							    /*========================================
							    =            Añadir elementos            =
							    ========================================*/

							    var funcionAnadirFilasExtras=function(parametro1){

							    	var contadorAnadidos=0;


									$(parametro1).click(function(e){

										contadorAnadidos++;

										funcionFilas(1,parametro2,$(".boddy__contenedorPrincipal"+contadorComponentesDeportistas),1,"bodys__contenidos","selectEscogidosItems");

									});						    	

								}

								funcionAnadirFilasExtras($("#anadirFilasDesagregadas"+contadorComponentesDeportistas));						    
							    							    						    							    
							    
							    /*=====  End of Añadir elementos  ======*/
							    
							    
							},

							error: function (){ 
							    
							}

						});							
								
						/*=====  End of Ajax  ======*/
					}

				});

			}

			itemsComponentesSeleccionables($("#itemComponentes"+contadorComponentesDeportistas));		
			
			/*=====  End of Items desglosables  ======*/
			
			/*===========================================
			=            Eliminar Componente            =
			===========================================*/
			
			$("#eliminarComponente"+contadorComponentesDeportistas).click(function(e){

				var idContador=$(this).attr('idContador');

				$("#tablaComponentesDeportistas"+idContador).remove();

				$(".tabla__relacion"+idContador).remove();

				$(".cronograma__valorado__display").hide();

				contadorComponentesDeportistas--;

			});
					
			
			/*=====  End of Eliminar Componente  ======*/
			

			/*===============================================
			=            Componentes Disponibles            =
			===============================================*/
			
			var componentes=function(parametro1,parametro2){

				var codigoProyecto=$("#codigoProyecto").val();

				var instancias=$(parametro2).val();

				$.ajax({

			      dataType: 'html',
			      data: {instancias:instancias,codigoProyecto:codigoProyecto},
			      type:'POST',
				  url:'modelosBd/validaciones/componentesCiudadano.modelo.php'

				}).done(function(listar__lugar){

				  $(parametro1).html(listar__lugar);

				}).fail(function(){

				  
				});

			}

			componentes($("#componenteSeleccionable"+contadorComponentesDeportistas),$("#instancias"));
				
			/*=====  End of Componentes Disponibles  ======*/

			/*=========================================
			=            Items disponibles            =
			=========================================*/
			
			var itemsComponentes=function(parametro1,parametro2,parametro3){

				$(parametro2).change(function(){

					var componente=$(this).val();
					var instancias=$(parametro3).val();

					$.ajax({

					  data: {componente:componente,instancias:instancias},
				      dataType: 'html',
				      type:'POST',
					  url:'modelosBd/validaciones/itemComponente.modelo.php'

					}).done(function(listar__lugar){

					  $(".cronograma__valorado__display").hide();

					  $(parametro1).html(listar__lugar);

					}).fail(function(){

					  

					});


				});

			}

			itemsComponentes($("#itemComponentes"+contadorComponentesDeportistas),$("#componenteSeleccionable"+contadorComponentesDeportistas),$("#instancias"));		
					
			/*=====  End of Items disponibles  ======*/

		}

	});

}

argumentosDeportistas($("#anadirComponentes"),$(".componenetesAnadidos"));

argumentosDeportistas($("#anadirComponentesPriorizados"),$(".contenedor__priorizados"));

argumentosDeportistas($("#anadirComponentesFemeninos"),$(".contenedor__mujeres"));

/*=====  End of Añadir componentes Deportistas  ======*/

/*============================================
=            Montos infras nuevos            =
============================================*/
var contadorInfras=0;

var contadorIconicos=0;

var bloquesPrimariosInfras=function(parametro1,parametro2){
	
	/*===============================================
	=            añadiendo los sectores             =
	===============================================*/
	
	$(parametro2).append('<tr class="fila__creacion'+contadorInfras+' filas__creadas__infras"><td class="cantidad__cols'+contadorInfras+'"><center><input type="text" id="numero'+contadorInfras+'" class="numero__conjunto selector__inicial"></center></td><td class="oculto__cols'+contadorInfras+'"><center><input type="text" id="descripcionRubro'+contadorInfras+'" class="descripcion__conjunto selector__inicial enlazados'+contadorInfras+' obligatorios__elementos"></center></td><td class="oculto__cols'+contadorInfras+'"><center><select id="valorPreferencial'+contadorInfras+'" class="valorPreferencialConjunto selector__inicial enlazados'+contadorInfras+' obligatorios__elementos"><option value="no">No</option><option value="si">Si</option></select></center></td><td class="oculto__cols'+contadorInfras+'"><center><input type="text" id="unidadInfras'+contadorInfras+'" class="unidad__conjunto selector__inicial montos__definidos enlazados'+contadorInfras+' obligatorios__elementos"></center></td><td class="oculto__cols'+contadorInfras+'"><center><input type="text" value="0" id="cantidadInfras'+contadorInfras+'" class="cantidad__conjunto selector__inicial enlazados'+contadorInfras+' obligatorios__elementos"></center></td><td class="oculto__cols'+contadorInfras+'"><center><input type="text" value="0" id="precioUnitarioInfras'+contadorInfras+'" class="precioUnitario__conjunto selector__inicial montos__definidos enlazados'+contadorInfras+' obligatorios__elementos"></center></td><td class="oculto__cols'+contadorInfras+'"><center><input type="text" value="0" id="subtotalInfras'+contadorInfras+'" class="subtotal__conjunto selector__inicial montos__definidos enlazados'+contadorInfras+' obligatorios__elementos" disabled="" value="0"></center></td><td class="oculto__cols'+contadorInfras+'"><center style="display:flex; align-items: justify-content:center;"><button class="btn btn-primary" data-toggle="modal" data-target="#modalVisualizarMontosCronogramas'+contadorInfras+'" id="anadirModalesInfras'+contadorInfras+'"  style="padding:0; font-size:8px!important; height:44px; margin-right:1em;">Agregar montos</button><input type="text" value="0" id="totalMontoCalculadosInfras'+contadorInfras+'" class="total__monto__conjuntos selector__inicial montos__definidos enlazados'+contadorInfras+' obligatorios__elementos" disabled="" value="0"></center></td><td><center><button class="btn btn-primary anadir__cosas" id="agregarFilasInfras"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;Añadir filas</button><br><div style="font-size:10px; font-weight:bold;">Marcar si es un titulo está fila<div> &nbsp;&nbsp;<input type="checkbox" id="marcarRotulosFilas'+contadorInfras+'"></center></td></tr>');

	/*=====  End of añadiendo los sectores   ======*/
	
	/*=======================================
	=            Creando modales            =
	=======================================*/
						  	
	var funcionCreandoModalesInfras=function(parametro1,parametro2,parametro3){

		$(parametro1).click(function(e){

			if (!$("#modalVisualizarMontosCronogramas"+parametro2).length > 0 ) {
			
				$(".modales__infras__dando").append('<div id="modalVisualizarMontosCronogramas'+parametro2+'" class="modal modales__montos__infras" role="dialog" data-backdrop="static" data-keyboard="false"><div class="modal-dialog"></div><div class="modal-content" style="width:40%!important; position:relative; left:30%;"><div class="modal-header" style="width:100%;">Asignar montos</div><button type="button" class="closeButton" data-dismiss="modal">&times;</button><div class="modal-body body__contenidosAlineados__infras'+parametro2+' body__relacionales__infrass" id="body__contenidosAlineados__infras'+parametro2+'"><div class="row"><div class="col col-12 text-center"><button class="btn btn-primary" id="agregarMeses'+parametro2+'"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;Añadir meses</button></div></div></div></div></div>');

			}
				/*=====================================================
				=            Agregando meses dinamicamente            =
				=====================================================*/
				
				var funcionMesesAgregasDinamicos=function(parametro1,parametro2,parametro3,parametro4){

					var contadorIconicosMeses=0;

					var contadorIconicosMeses=$(".enalzadosSimultaneos"+parametro2).length;
				
					$(parametro1).click(function(e){

						contadorIconicosMeses++;

						if (!$(".rowses"+contadorIconicosMeses+"__"+parametro2).length > 0) {

							$("#body__contenidosAlineados__infras"+parametro2).append('<div class="row rowses2'+contadorIconicosMeses+' rowses'+contadorIconicosMeses+"__"+parametro2+'"><div class="col col-4">Mes'+contadorIconicosMeses+'</div><div class="col col-6"><input class="contador__letras__conjuntos salidasMontos selector__inicial filas__representativas'+parametro2+' enlazados'+parametro2+' enalzadosSimultaneos'+parametro2+' obligatorios__elementos conjuntos__dados'+contadorIconicos+' parametrosSujetos'+parametro2+'" id="letrasConjuntas'+contadorIconicos+'" value="0"></div><div class="col col-2"><button class="btn btn-danger" id="eliminarInfrasRefens'+contadorIconicos+'" idContador="'+contadorIconicosMeses+'"><i class="fas fa-trash"></i></button></div></div>');

						}


						/*====================================================
						=            Eliminar filas meses creados            =
						====================================================*/
						
						$("#eliminarInfrasRefens"+contadorIconicos).click(function(e){

							var idContador=$(this).attr('idContador');

							$(".rowses2"+idContador).remove();

							contadorIconicosMeses--;

			

						});		
						
						/*=====  End of Eliminar filas meses creados  ======*/

						/*=========================================
						=            Sumadores totales            =
						=========================================*/
													

						var funcionSumares=function(parametro1,parametro2,parametro3){

							
							$(parametro2).blur(function(e){

								var sumadorRes=0;

								var sumatoresEvaluadores=0;

								$(".parametrosSujetos"+parametro3).each(function(){
									sumatoresEvaluadores += parseFloat($(this).val());
								});

								$("#totalMontoCalculadosInfras"+parametro3).val(sumatoresEvaluadores.toFixed(2));

								/*==========================================
								=            Inserciones nuevos            =
								==========================================*/
								
								var sumatoresEvaluadoresDoces=0;
																						
								$(".total__monto__conjuntos ").each(function(){	
									sumatoresEvaluadoresDoces += parseFloat($(this).val());
								});			

								var valoresDefinitivos=0;					
								

								sumadorRes=parseFloat($("#valoresCantidadesAsignadasIn").val())+parseFloat(sumatoresEvaluadoresDoces);

								valoresDefinitivos=parseFloat($("#valoresCantidadesIn").val())-parseFloat(sumadorRes)+parseFloat($("#valoresCantidadesAsignadasIn").val());

								$("#valoresCantidades").val(parseFloat(valoresDefinitivos).toFixed(2));

								$("#valoresCantidadesAsignadas").val(parseFloat(sumadorRes).toFixed(2));

								/*=====  End of Inserciones nuevos  ======*/
								

							});			

							   	
						}

						funcionSumares($(".parametrosSujetos"+parametro2),$("#letrasConjuntas"+contadorIconicos),parametro2);								  													
													
						/*=====  End of Sumadores totales  ======*/

						
						/*==========================================
						=            Ceros desplegables            =
						==========================================*/

						var funcionLlamarCerosEmergentes=function(parametro1){

							$(parametro1).blur(function(e){
								if($(this).val()==""){
									$(this).val(0);
								}
							});	

							$(parametro1).click(function(e){
								if($(this).val()==0){
									$(this).val("");
								}
							});						    	

						}

						funcionLlamarCerosEmergentes($(".salidasMontos"));								  					  	
											  	
						/*=====  End of Ceros desplegables  ======*/
											  	

						contadorIconicos++;


					});



				}

				funcionMesesAgregasDinamicos($("#agregarMeses"+parametro2),parametro2,$(".body__contenidosAlineados__infras"+parametro2),parametro3);	


				/*=====  End of Agregando meses dinamicamente  ======*/
					  	

		});	
											    	
	}

	funcionCreandoModalesInfras($("#anadirModalesInfras"+contadorInfras),contadorInfras,$("#totalMontoCalculadosInfras"+contadorInfras));	

	/*=====  End of Creando modales  ======*/


	/*==============================
	=            Montos            =
	==============================*/
		
	$(".montos__definidos").on('input', function () {

		this.value = this.value.replace(/[^0-9,.]/g, '').replace(',','.');

	});		
		
	/*=====  End of Montos  ======*/
		
	/*============================================
	=            Crear fila de titulo            =
	============================================*/
	
		var clickCheckeds=function(parametro1,parametro2){

			$(parametro1).click(function(e){

				var condicion = $(this).is(":checked");

				if (condicion) {

				   	$("#valorPreferencial"+parametro2).attr('style','display:none');

				   	$(".cantidad__cols"+parametro2).attr('colspan','8');

				   	$(".oculto__cols"+parametro2).attr('style','display:none');

				   	$("#numero"+parametro2).val(' ');

				   	$("#descripcionRubro"+parametro2).val('N/A');

				   	$("#unidadInfras"+parametro2).val('N/A');

				}else{


					$("#valorPreferencial"+parametro2).removeAttr('style');

					$(".cantidad__cols"+parametro2).attr('colspan','1');

					$(".oculto__cols"+parametro2).removeAttr('style');

				   	$("#numero"+parametro2).val(' ');

				   	$("#descripcionRubro"+parametro2).val(' ');

				   	$("#unidadInfras"+parametro2).val(' ');

				}

			});		

		}

		clickCheckeds($("#marcarRotulosFilas"+contadorInfras),contadorInfras);			
		
	/*=====  End of Crear fila de titulo  ======*/
		

	/*==========================================
		=            Formula calculante            =
	==========================================*/
		
	var formulasCalculantes=function(parametro1,parametro2,parametro3){

		$(parametro1).keyup(function(e){

			var multiplica=0;
						
			multiplica= parseFloat($(this).val()) * parseFloat($(parametro2).val());

			$(parametro3).val(multiplica.toFixed(2));

		});		


		$(parametro1).click(function(e){

			if($(this).val()=="0"){
				$(this).val(" ");
			}

		});		
				

		$(parametro1).blur(function(e){

			if($(this).val()==""){
				$(this).val("0");
			}

		});		

	}

	formulasCalculantes($("#cantidadInfras"+contadorInfras),$("#precioUnitarioInfras"+contadorInfras),$("#subtotalInfras"+contadorInfras));	
	formulasCalculantes($("#precioUnitarioInfras"+contadorInfras),$("#cantidadInfras"+contadorInfras),$("#subtotalInfras"+contadorInfras));		
		
	/*=====  End of Formula calculante  ======*/
		

	/*================================
	=            Eliminar            =
	================================*/
		
	$("#eliminarInfras"+contadorInfras).click(function(e){

		var idContador=$(this).attr('idContador');

		$(".fila__creacion"+idContador).remove();

		contadorInfras--;

	});		
		
	/*=====  End of Eliminar  ======*/
		
	var contadorColumnasCuentas=0;

		$(".columna__agregada__infras").each(function(index) {
	    contadorColumnasCuentas++;

	});


	if($(".filasEditadas").length > 0){

		var contadorDinamicos=0;

		$(".filasEditadas").each(function(index) {

			contadorDinamicos++;

		});

		    
		for(var i=0;i<contadorDinamicos;i++){

		  	$(".fila__creacion"+contadorInfras).append('<td class="representa'+i+'"><input class="contador__letras__conjuntos selector__inicial filas__representativas'+contadorInfras+' enlazados'+contadorInfras+' obligatorios__elementos" id="letrasConjuntas'+i+'" value="0"></td>');

			$(".contador__letras__conjuntos").on('input', function () {

				this.value = this.value.replace(/[^0-9,.]/g, '').replace(',','.');

			});

		}

	}else{

		for(var i=0;i<contadorColumnasCuentas;i++){

		  	$(".fila__creacion"+contadorInfras).append('<td class="representa'+i+'"><input class="contador__letras__conjuntos selector__inicial filas__representativas'+contadorInfras+' enlazados'+contadorInfras+' obligatorios__elementos conjuntos__dados'+i+'" id="letrasConjuntas'+i+'" value="0"></td>');


			$(".contador__letras__conjuntos").on('input', function () {

				this.value = this.value.replace(/[^0-9,.]/g, '').replace(',','.');

			});

			/*=====================================
			=            Agregar ceros            =
			=====================================*/
												 
			var cerosAgregos=function(parametro1,parametro2,parametro3){

				$(parametro1).click(function(e){

					if($(this).val()=="0"){
						$(this).val(" ");
					}

				});		
						

				$(parametro1).blur(function(e){

					if($(this).val()==" "){
						$(this).val("0");
					}

				});		

			}

			cerosAgregos($(".conjuntos__dados"+i));												 
												 
			/*=====  End of Agregar ceros  ======*/

		}

	}


}

bloquesPrimariosInfras($("#agregarFilasInfras"),$(".contenedor__bloques"));

/*=====  End of Montos infras nuevos  ======*/


/*======================================================
=            Agregar filas infraestructuras            =
======================================================*/
			
var agregarFilasInfraestructuras=function(parametro1,parametro2){

	$(parametro1).click(function(e){

		contadorInfras++;

		$(parametro2).append('<tr class="fila__creacion'+contadorInfras+' filas__creadas__infras"><td class="cantidad__cols'+contadorInfras+'"><center><input type="text" id="numero'+contadorInfras+'" class="numero__conjunto selector__inicial"></center></td><td class="oculto__cols'+contadorInfras+'"><center><input type="text" id="descripcionRubro'+contadorInfras+'" class="descripcion__conjunto selector__inicial enlazados'+contadorInfras+' obligatorios__elementos"></center></td><<td class="oculto__cols'+contadorInfras+'"><center><select id="valorPreferencial'+contadorInfras+'" class="valorPreferencialConjunto selector__inicial enlazados'+contadorInfras+' obligatorios__elementos"><option value="no">No</option><option value="si">Si</option></select></center></td><td class="oculto__cols'+contadorInfras+'"><center><input type="text" id="unidadInfras'+contadorInfras+'" class="unidad__conjunto selector__inicial montos__definidos enlazados'+contadorInfras+' obligatorios__elementos"></center></td><td class="oculto__cols'+contadorInfras+'"><center><input type="text" value="0" id="cantidadInfras'+contadorInfras+'" class="cantidad__conjunto selector__inicial enlazados'+contadorInfras+' obligatorios__elementos"></center></td><td class="oculto__cols'+contadorInfras+'"><center><input type="text" value="0" id="precioUnitarioInfras'+contadorInfras+'" class="precioUnitario__conjunto selector__inicial montos__definidos enlazados'+contadorInfras+' obligatorios__elementos"></center></td><td class="oculto__cols'+contadorInfras+'"><center><input type="text" value="0" id="subtotalInfras'+contadorInfras+'" class="subtotal__conjunto selector__inicial montos__definidos enlazados'+contadorInfras+' obligatorios__elementos" disabled="" value="0"></center></td><td class="oculto__cols'+contadorInfras+'"><center style="display:flex; align-items: justify-content:center;"><button class="btn btn-primary" data-toggle="modal" data-target="#modalVisualizarMontosCronogramas'+contadorInfras+'" id="anadirModalesInfras'+contadorInfras+'"  style="padding:0; font-size:8px!important; height:44px; margin-right:1em;">Agregar montos</button><input type="text" value="0" id="totalMontoCalculadosInfras'+contadorInfras+'" class="total__monto__conjuntos selector__inicial montos__definidos enlazados'+contadorInfras+' obligatorios__elementos" disabled="" value="0"></center></td><td><center><button class="btn btn-danger" id="eliminarInfras'+contadorInfras+'" idContador="'+contadorInfras+'"><i class="fas fa-trash"></i></button><br><div style="font-size:10px; font-weight:bold;">Marcar si es un titulo está fila<div> &nbsp;&nbsp;<input type="checkbox" id="marcarRotulosFilas'+contadorInfras+'"></center></td></tr>');

		/*=======================================
		=            Creando modales            =
		=======================================*/
										  	
		var funcionCreandoModalesInfras=function(parametro1,parametro2,parametro3){

			$(parametro1).click(function(e){

				if (!$("#modalVisualizarMontosCronogramas"+parametro2).length > 0 ) {
				
					$(".modales__infras__dando").append('<div id="modalVisualizarMontosCronogramas'+parametro2+'" class="modal modales__montos__infras" role="dialog" data-backdrop="static" data-keyboard="false"><div class="modal-dialog"></div><div class="modal-content" style="width:40%!important; position:relative; left:30%;"><div class="modal-header" style="width:100%;">Asignar montos</div><button type="button" class="closeButton" data-dismiss="modal">&times;</button><div class="modal-body body__contenidosAlineados__infras'+parametro2+' body__relacionales__infrass"><div class="row"><div class="col col-12 text-center"><button class="btn btn-primary" id="agregarMeses'+parametro2+'"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;Añadir meses</button></div></div></div></div></div>');

				}

					/*=====================================================
					=            Agregando meses dinamicamente            =
					=====================================================*/
					
					var funcionMesesAgregasDinamicos=function(parametro1,parametro2,parametro3,parametro4){

						var contadorIconicosMeses=0;

						var contadorIconicosMeses=$(".enalzadosSimultaneos"+parametro2).length;
					
						$(parametro1).click(function(e){
							
							contadorIconicosMeses++;

							contadorIconicos++;		

							if (!$(".rowses"+contadorIconicosMeses+"__"+parametro2).length > 0) {

								$(parametro3).append('<div class="row rowses2'+contadorIconicosMeses+' rowses'+contadorIconicosMeses+"__"+parametro2+'"><div class="col col-4">Mes'+contadorIconicosMeses+'</div><div class="col col-6"><input class="contador__letras__conjuntos salidasMontos selector__inicial filas__representativas'+parametro2+' enlazados'+parametro2+' enlazadosHistoricos'+parametro2+' obligatorios__elementos conjuntos__dados'+contadorIconicos+' parametrosSujetos'+parametro2+'" id="letrasConjuntas'+contadorIconicos+'" value="0"></div><div class="col col-2"><button class="btn btn-danger" id="eliminarInfrasRefens'+contadorIconicosMeses+'" idContador="'+contadorIconicos+'"><i class="fas fa-trash"></i></button></div></div>');

							}

							/*====================================================
							=            Eliminar filas meses creados            =
							====================================================*/
							
							$("#eliminarInfrasRefens"+contadorIconicos).click(function(e){

								var idContador=$(this).attr('idContador');

								$(".rowses2"+idContador).remove();

								contadorIconicosMeses--;

					

							});		
							
							/*=====  End of Eliminar filas meses creados  ======*/
							


							/*=========================================
							=            Sumadores totales            =
							=========================================*/
														

							var funcionSumares=function(parametro1,parametro2,parametro3){

								$(parametro2).blur(function(e){

									var sumadorRes=0;

									sumatoresEvaluadores25=0;


									$(".parametrosSujetos"+parametro3).each(function(){
										sumatoresEvaluadores25 += parseFloat($(this).val());
									});


									$("#totalMontoCalculadosInfras"+parametro3).val(sumatoresEvaluadores25.toFixed(2));

									/*==========================================
									=            Inserciones nuevos            =
									==========================================*/
									
									var sumatoresEvaluadoresDoces=0;
																							
									$(".total__monto__conjuntos ").each(function(){	
										sumatoresEvaluadoresDoces += parseFloat($(this).val());
									});			

									var valoresDefinitivos=0;					
									

									sumadorRes=parseFloat($("#valoresCantidadesAsignadasIn").val())+parseFloat(sumatoresEvaluadoresDoces);

									valoresDefinitivos=parseFloat($("#valoresCantidadesIn").val())-parseFloat(sumadorRes)+parseFloat($("#valoresCantidadesAsignadasIn").val());

									$("#valoresCantidades").val(parseFloat(valoresDefinitivos).toFixed(2));

									$("#valoresCantidadesAsignadas").val(parseFloat(sumadorRes).toFixed(2));

									/*=====  End of Inserciones nuevos  ======*/


								});						    	

							}

							funcionSumares($(".parametrosSujetos"+contadorIconicos),$("#letrasConjuntas"+contadorIconicos),parametro2);								  													
														
							/*=====  End of Sumadores totales  ======*/

							
							/*==========================================
							=            Ceros desplegables            =
							==========================================*/

							var funcionLlamarCerosEmergentes=function(parametro1){

								$(parametro1).blur(function(e){
									if($(this).val()==""){
										$(this).val(0);
									}
								});	

								$(parametro1).click(function(e){
									if($(this).val()==0){
										$(this).val("");
									}
								});						    	

							}

							funcionLlamarCerosEmergentes($(".salidasMontos"));								  					  	
												  	
							/*=====  End of Ceros desplegables  ======*/
											  	


						});


					}

					funcionMesesAgregasDinamicos($("#agregarMeses"+parametro2),parametro2,$(".body__contenidosAlineados__infras"+parametro2),parametro3);	


					/*=====  End of Agregando meses dinamicamente  ======*/

			});	
												    	
		}

		funcionCreandoModalesInfras($("#anadirModalesInfras"+contadorInfras),contadorInfras,$("#totalMontoCalculadosInfras"+contadorInfras));	

		/*=====  End of Creando modales  ======*/


		/*==============================
		=            Montos            =
		==============================*/
		
		$(".montos__definidos").on('input', function () {

			this.value = this.value.replace(/[^0-9,.]/g, '').replace(',','.');

		});		
		
		/*=====  End of Montos  ======*/
		
		/*============================================
		=            Crear fila de titulo            =
		============================================*/
		
		var clickCheckeds=function(parametro1,parametro2){

			$(parametro1).click(function(e){

				var condicion = $(this).is(":checked");

				if (condicion) {

				   	$("#valorPreferencial"+parametro2).attr('style','display:none');

				   	$(".cantidad__cols"+parametro2).attr('colspan','8');

				   	$(".oculto__cols"+parametro2).attr('style','display:none');

				   	$("#numero"+parametro2).val(' ');

				   	$("#descripcionRubro"+parametro2).val('N/A');

				   	$("#unidadInfras"+parametro2).val('N/A');

				}else{


					$("#valorPreferencial"+parametro2).removeAttr('style');

					$(".cantidad__cols"+parametro2).attr('colspan','1');

					$(".oculto__cols"+parametro2).removeAttr('style');

				   	$("#numero"+parametro2).val(' ');

				   	$("#descripcionRubro"+parametro2).val(' ');

				   	$("#unidadInfras"+parametro2).val(' ');

				}

			});		

		}

		clickCheckeds($("#marcarRotulosFilas"+contadorInfras),contadorInfras);	
		
		/*=====  End of Crear fila de titulo  ======*/
		

		/*==========================================
		=            Formula calculante            =
		==========================================*/
		
		var formulasCalculantes=function(parametro1,parametro2,parametro3){

			$(parametro1).keyup(function(e){

				var multiplica=0;
						
				multiplica= parseFloat($(this).val()) * parseFloat($(parametro2).val());

				$(parametro3).val(multiplica.toFixed(2));

			});		


			$(parametro1).click(function(e){

				if($(this).val()=="0"){
					$(this).val(" ");
				}

			});		
				

			$(parametro1).blur(function(e){

				if($(this).val()==""){
					$(this).val("0");
				}

			});		

		}

		formulasCalculantes($("#cantidadInfras"+contadorInfras),$("#precioUnitarioInfras"+contadorInfras),$("#subtotalInfras"+contadorInfras));	
		formulasCalculantes($("#precioUnitarioInfras"+contadorInfras),$("#cantidadInfras"+contadorInfras),$("#subtotalInfras"+contadorInfras));		
		
		/*=====  End of Formula calculante  ======*/
		

		/*================================
		=            Eliminar            =
		================================*/
		
		$("#eliminarInfras"+contadorInfras).click(function(e){

			var idContador=$(this).attr('idContador');

			$(".fila__creacion"+idContador).remove();

			contadorInfras--;

		});		
		
		/*=====  End of Eliminar  ======*/
		
		var contadorColumnasCuentas=0;

	     $(".columna__agregada__infras").each(function(index) {
	     	contadorColumnasCuentas++;
	     });


		if($(".filasEditadas").length > 0){

			var contadorDinamicos=0;

		    $(".filasEditadas").each(function(index) {

		    	contadorDinamicos++;

		    });

		    
		     for(var i=0;i<contadorDinamicos;i++){

		     	$(".fila__creacion"+contadorInfras).append('<td class="representa'+i+'"><input class="contador__letras__conjuntos selector__inicial filas__representativas'+contadorInfras+' enlazados'+contadorInfras+' obligatorios__elementos" id="letrasConjuntas'+i+'" value="0"></td>');


				 $(".contador__letras__conjuntos").on('input', function () {

				     this.value = this.value.replace(/[^0-9,.]/g, '').replace(',','.');

				 });

		     }

		}else{

	
		     for(var i=0;i<contadorColumnasCuentas;i++){

		     	$(".fila__creacion"+contadorInfras).append('<td class="representa'+i+'"><input class="contador__letras__conjuntos selector__inicial filas__representativas'+contadorInfras+' enlazados'+contadorInfras+' obligatorios__elementos conjuntos__dados'+i+'" id="letrasConjuntas'+i+'" value="0"></td>');


				 $(".contador__letras__conjuntos").on('input', function () {

				     this.value = this.value.replace(/[^0-9,.]/g, '').replace(',','.');

				 });

				/*=====================================
				=            Agregar ceros            =
				=====================================*/
												 
				var cerosAgregos=function(parametro1,parametro2,parametro3){

					$(parametro1).click(function(e){

						if($(this).val()=="0"){
							$(this).val(" ");
						}

					});		
						

					$(parametro1).blur(function(e){

						if($(this).val()==" "){
							$(this).val("0");
						}

					});		

				}

				cerosAgregos($(".conjuntos__dados"+i));												 
												 
				/*=====  End of Agregar ceros  ======*/


		     }

		}


	});	
										    	

}

agregarFilasInfraestructuras($("#agregarFilasInfras"),$(".contenedor__bloques"));

/*=====  End of Agregar filas infraestructuras  ======*/


/*======================================
=            Crear columnas            =
======================================*/

var agregarColumnasInfraestructuras=function(parametro1,parametro2){

	var contadorInfrasColumnas=0;

	$(parametro1).click(function(e){

		$(".modificableColspan").removeAttr('colspan');

		contadorInfrasColumnas++;

		$(parametro2).append('<th class="columna__agregada__infras columna__infras'+contadorInfrasColumnas+'"><center>Mes'+contadorInfrasColumnas+'<br><button class="btn btn-danger" id="eliminarColumnasInfras'+contadorInfrasColumnas+'" idContador="'+contadorInfrasColumnas+'"><i class="fas fa-trash"></i></button></center></th>');
		
		if($(".filasEditadas").length > 0){

			var contadorDinamicos=0;

		    $(".filasEditadas").each(function(index) {

		    	contadorDinamicos++;

		    });

		    $(".modificableColspan").attr('colspan',contadorDinamicos);

		}else{

			$(".modificableColspan").attr('colspan',contadorInfrasColumnas);

		}

		/*================================
		=            Eliminar            =
		================================*/
		
		$("#eliminarColumnasInfras"+contadorInfrasColumnas).click(function(e){

			var idContador=$(this).attr('idContador');

			$(".columna__infras"+idContador).remove();

			contadorInfrasColumnas--;

		});		
				
		
		/*=====  End of Eliminar  ======*/
		

	});								    	

}

agregarColumnasInfraestructuras($("#agergarColumnas"),$(".conjunto__headers"));

/*=====  End of Crear columnas  ======*/

/*=========================================
=            Añadir evidencias            =
=========================================*/

var agregarEvidenciasSistematicas=function(parametro1,parametro2){

	var contadorEvidencias=0;

	$(parametro1).click(function(e){

		$(".modificableColspan").removeAttr('colspan');

		contadorEvidencias++;

		$(parametro2).append('<tr class="fila__evidencias'+contadorEvidencias+' filas__evidenciales"><td>Evidencia'+contadorEvidencias+'</td><td style="display:flex;"><input type="file" class="conjunto__evidencias"/>&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-danger" id="eliminarEvidencias'+contadorEvidencias+'" idContador="'+contadorEvidencias+'">Eliminar</button></td></tr>');


		/*================================
		=            Eliminar            =
		================================*/
		
		$("#eliminarEvidencias"+contadorEvidencias).click(function(e){

			var idContador=$(this).attr('idContador');

			$(".fila__evidencias"+idContador).remove();

			contadorEvidencias--;

		});		
				
		
		/*=====  End of Eliminar  ======*/
		

	});								    	

}

agregarEvidenciasSistematicas($("#anadirEvidencias"),$(".evidencias__suscritas"));

/*=====  End of Añadir evidencias  ======*/

/*====================================================
=            Agregar fila de comprobantes            =
====================================================*/


var agregarComprobantesFilas=function(parametro1,parametro2){

	var contadorEvidenciasComprobantes=0;

	$(parametro1).click(function(e){

		contadorEvidenciasComprobantes++;

		$(parametro2).append('<tr class="fila__comprobantes'+contadorEvidenciasComprobantes+' fila__conjunto__creadas"><td colspan="2"><center style="font-weight:bold; display:flex; justify-content:center; align-items:center;">Comprobante'+contadorEvidenciasComprobantes+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="eliminarFilasComprobantes'+contadorEvidenciasComprobantes+'" idContador="'+contadorEvidenciasComprobantes+'" class="btn btn-danger"><i class="fas fa-trash"></i></button><center></td></tr><tr class="fila__comprobantes'+contadorEvidenciasComprobantes+'"><td>Ruc del patrocinador</td><td class="d-flex justify-content-center"><input type="text" id="numeroRucPatrocinador'+contadorEvidenciasComprobantes+'" name="numeroRucPatrocinador'+contadorEvidenciasComprobantes+'" class="solo__numero obligatorios__patrocinadores ruc__patrocinador__conjunto" style="width:100%;"><a class="buscador__realizadores" id="buscarRucPatrocinador'+contadorEvidenciasComprobantes+'" name="buscarRucPatrocinador'+contadorEvidenciasComprobantes+'" style="color:black; font-weight:bold;"><i class="fas fa-search icono__buscadores1"></i></a><div class="contenedor__ruc__organismo__patrocinador__garantizados"></div></td></tr><tr></tr><tr class="fila__comprobantes'+contadorEvidenciasComprobantes+'"><td>Nombre del patrocinador</td><td><input type="text" id="nombrePatrocinador'+contadorEvidenciasComprobantes+'" name="nombrePatrocinador'+contadorEvidenciasComprobantes+'" class="obligatorios__patrocinadores nombre__patrocinador__conjunto" style="width:100%;" ></td></tr><tr class="fila__comprobantes'+contadorEvidenciasComprobantes+'"><td>Actividad economica</td><td><input type="text" id="actividadEconomica'+contadorEvidenciasComprobantes+'" name="actividadEconomica'+contadorEvidenciasComprobantes+'" class="obligatorios__patrocinadores actividadEconomica__conjuntos" style="width:100%;" ></td></tr><tr class="fila__comprobantes'+contadorEvidenciasComprobantes+'"><td>Número de Factura del comprobante o nota de venta</td><td><input type="text" id="montoContratoRealizados'+contadorEvidenciasComprobantes+'" name="montoContratoRealizados'+contadorEvidenciasComprobantes+'" class="solo__numeros__guiones obligatorios__patrocinadores monto__contrato__realizado__conjunto" style="width:100%;"></td></tr><tr class="fila__comprobantes'+contadorEvidenciasComprobantes+'"><td>Válidez comprobante físico</td><td><input type="date" id="validezComprobanteFisico'+contadorEvidenciasComprobantes+'" name="validezComprobanteFisico'+contadorEvidenciasComprobantes+'" class="obligatorios__patrocinadores validez__comprobante__fisico__conjuntos" style="width:100%;" ></td></tr><tr class="fila__comprobantes'+contadorEvidenciasComprobantes+'"><td>Autorización SRI</td><td><input type="text" id="autorizacionSri'+contadorEvidenciasComprobantes+'" name="autorizacionSri'+contadorEvidenciasComprobantes+'" class="obligatorios__patrocinadores autorizacionSri__conjuntos" style="width:100%;" ></td></tr><tr class="fila__comprobantes'+contadorEvidenciasComprobantes+'"><td>Fecha de emisión</td><td><input type="date" id="fechaDeEmision'+contadorEvidenciasComprobantes+'" name="fechaDeEmision'+contadorEvidenciasComprobantes+'" class="obligatorios__patrocinadores fecha__evidencia__conjuntos" style="width:100%;"></td></tr><tr class="fila__comprobantes'+contadorEvidenciasComprobantes+' fila__conjunto__creadas"><td>Comprobantes de venta</td><td><input type="file" id="validadoresImpresos'+contadorEvidenciasComprobantes+'" name="validadoresImpresos'+contadorEvidenciasComprobantes+'" class="obligatorios__patrocinadores comprobantes__conjuntos__documentos"></td></tr><tr class="fila__comprobantes'+contadorEvidenciasComprobantes+' fila__conjunto__creadas"><td>Monto de la factura o comprobante de venta</td><td><input type="text" id="montoFacturaComprovante'+contadorEvidenciasComprobantes+'" name="montoFacturaComprovante'+contadorEvidenciasComprobantes+'" class="solo__numero__montos montos__facturas__conjuntos obligatorios__patrocinadores"></td></tr>');


			/*=========================================
			=            Sumadores totales            =
			=========================================*/
													
			var funcionSumares=function(parametro1){

				$(parametro1).on('input', function () {

					var sumatoresEvaluadores=0;

					$(".montos__facturas__conjuntos").each(function(){
						sumatoresEvaluadores += parseFloat($(this).val());
					});

					var variableMonto=$("#montoOcultos").val();

					if(parseFloat(sumatoresEvaluadores)>parseFloat(variableMonto)){

						alertify.set("notifier","position", "top-right");
						alertify.notify("La suma de los comprobantes es "+sumatoresEvaluadores+" siendo mayor al monto asignado al proyecto calificado "+variableMonto, "error", 15, function(){});

						$(this).val(" ");

					}else{

						$("#montoDelProyecto").val(parseFloat(sumatoresEvaluadores).toFixed(2));

					}					

				});			

			}

			funcionSumares($("#montoFacturaComprovante"+contadorEvidenciasComprobantes));								  												  																								
			/*=====  End of Sumadores totales  ======*/

			/*===================================
			=            Solo montos            =
			===================================*/

			$(".solo__numero__montos").on('input', function () {

				this.value = this.value.replace(/[^0-9,.]/g, '').replace(',','.');

			});					
			
			 $(".solo__numeros__guiones").on('input', function () {

			     this.value = this.value.replace(/[^0-9,-]/g, '');

			 });

			 $(".solo__numero").on('input', function () {

			     this.value = this.value.replace(/[^0-9]/g, '');

			 });

			/*=====  End of Solo montos  ======*/
			

			/*================================
			=            Eliminar            =
			================================*/
			
			$("#eliminarFilasComprobantes"+contadorEvidenciasComprobantes).click(function(e){

				var idContador=$(this).attr('idContador');

				if (idContador==contadorEvidenciasComprobantes) {

					$(".fila__comprobantes"+idContador).remove();

					contadorEvidenciasComprobantes--;

				}else{

					alertify.set("notifier","position", "top-right");
					alertify.notify("Es necesario eliminar la última fila creada", "error", 5, function(){});

				}


				

			});		
					
			
			/*=====  End of Eliminar  ======*/


	});								    	

}

agregarComprobantesFilas($("#anadirComprobantes"),$(".bloque__comprobantes"));

/*=====  End of Agregar fila de comprobantes  ======*/


});