$(document).ready(function () {


	/*=========================================
	=            Buscar por cedula            =
	=========================================*/
	
	var cedulaBuscadora=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6){

	  $(parametro1).click(function(e){


	  	  $(parametro1).hide();
	 	
	  	  $(parametro2).html('<img src="images/reloadGit.webp" style="height:35px; margin-left: .5em; border-radius: .5em; cursor: pointer;">');

	      $.ajax({

	          url:"php/dinardap.php",
	          type:"POST",
	          dataType:"json",
	          data:"cedula="+$(parametro3).val(),
	          success:function(datos){


	               if (datos.mensaje==10) {
	                 
	                  swal({
	                    type: "warning",
	                    title: "La cédula no existe",
	                    showConfirmButton: true,
	                    confirmButtonText: "Cerrar",
	                    timer: 4000
	                  });

	                  $(parametro2).html('');

	                  $(parametro1).show();

	               }else{

	                  // recuperación de datos de la dinardap
	                  $(parametro4).val(datos.nombre);

	                  $(".enlaces__representantes__legales").show();

	                  $(".escondido__cedula__patrocinador").show();

	                  $(".registros__dinamicos__patrocinadores").show();
	                  
	                  $(".escondido__cedula__deportistas").show();

					  $(".escondidos__ruc__cedulas__deportistas").show();

	                  if (parametro5!=false) {

	                  	 if(datos.sexo=="HOMBRE"){

	                  	 	$(parametro5).val("MASCULINO");

	                  	 }else{

	                  	 	$(parametro5).val("FEMENINO");

	                  	 }

		                  
		                  $(parametro6).val(datos.fechaNacimiento);

						/*=========================================
						=            Calculo de edades            =
						=========================================*/

						function calcularEdad(fecha) {

						    var hoy = new Date();
						    var cumpleanos = new Date(fecha);
						    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
						    var m = hoy.getMonth() - cumpleanos.getMonth();

						    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
						        edad--;
						    }

						    return edad;

						}

						var edadRealizables=calcularEdad(datos.fechaNacimiento);
						
						/*=====  End of Calculo de edades  ======*/

						var condicion = $("#seleccionDiscapacidad").is(":checked");

						if (parseInt(edadRealizables, 10)<18) {

							$(".representantes__legales__menores").show();

							$(".obligatorio__atletas__representantes").addClass("obligatorio__usuario");

							$("#representanteSenal").val('si');

						}else if(parseInt(edadRealizables, 10)>18 && !condicion){

							$(".representantes__legales__menores").hide();

							$(".obligatorio__atletas__representantes").removeClass("obligatorio__usuario");

							$("#representanteSenal").val('no');

						}



	                  }

	                  $(".enlaces__usuarios").show();

	                  $(parametro2).html('');

	                  $(parametro1).show();

	               }
	             
	               

	          },
	          error:function(response,status,error)
	          {
	            alert("no encontrado");
	          } 

	     });

	  });

	}

	cedulaBuscadora($("#buscarCedula"),$(".contenedor__cedula__registro"),$("#cedulaUsuario"),$("#nombreCompleto"),$("#sexo"),$("#fechaNacimiento"));
	cedulaBuscadora($("#buscarCedulaRepresentanteLegal"),$(".contenedor__cedula__representante__legal"),$("#representanteLegalCedula"),$("#representanteLegal"),false,false);
	cedulaBuscadora($("#buscarCedulaPatrocinador"),$(".contenedor__cedula__registro__patrocinador"),$("#cedulaUsuarioPatrocinador"),$("#nombreCompletoPatrocinador"),$("#sexoPatrocinador"),$("#fechaNacimientoPatrocinador"));

	cedulaBuscadora($("#buscarRepresentanteLegal"),$(".contenedor__cedula__registro__representantes"),$("#cedulaRepresentanteLegal"),$("#nombreRepresentanteLegal"));

	cedulaBuscadora($("#buscarCedulaRepresentanteLegalAtletas"),$(".contenedor__cedula__registro__representantes__atletas"),$("#representanteLegalCedulaAtletas"),$("#representanteLegalAtletas"));
	
	/*=====  End of Buscar por cedula  ======*/
	

	/*======================================
	=            Buscar por Ruc            =
	======================================*/
	
	var rucBuscador=function(parametro1,parametro2,parametro3,parametro4,parametro5,parametro6,parametro7,parametro8){

	  $(parametro1).click(function(e){


	  	  $(parametro1).hide();
	 	
	  	  $(parametro2).html('<img src="images/reloadGit.webp" style="height:35px; margin-left: .5em; border-radius: .5em; cursor: pointer;">');

	      $.ajax({

	          url:"php/dinardapSegundo.php",
	          type:"POST",
	          dataType:"json",
	          data:"cedula="+$(parametro3).val(),
	          success:function(datos){


	               if (datos.razonSocial=="") {
	                 
	                  swal({
	                    type: "warning",
	                    title: "El ruc no existe",
	                    showConfirmButton: true,
	                    confirmButtonText: "Cerrar",
	                    timer: 4000
	                  });

	                  $(parametro2).html('');

	                  $(parametro1).show();

	               }else{

	                  // recuperación de datos de la dinardap
	                  $(parametro4).val(datos.razonSocial);

	                  $(".enlazados__organismos__deportivos").show();

	                  $(".escondido__ruc__patrocinador").show();

	                  $(".registros__dinamicos__patrocinadores").show();

	                  $(".escondido__ruc__organismos").show();

					  $(".escondidos__ruc__cedulas__deportistas").show();

	                  $(parametro2).html('');

	                  $(parametro1).show();

	                  if (parametro8==true) {

		                  if ($(parametro7).val()=="noFederado") {

		                  	$(parametro6).hide();

		                  	$(parametro5).show();

		                  }else{

		                  	$(parametro5).hide();

		                  	$(parametro6).show();

							if ($(parametro7).val()=="profesional") {

								$("#certificadoFederacion option[value='0']").html('--Seleccione si posee certificado de federación o liga profecional-');
							
							}else{

								$("#certificadoFederacion option[value='0']").html('--Seleccione si posee certificado de federación-');

							}	                  	


		                  }

	                  }

	               }
	             
	               

	          },
	          error:function(response,status,error)
	          {
	            alert("no encontrado");
	          } 

	     });

	  });

	}

	rucBuscador($("#buscarRuc"),$(".contenedor__ruc__registro"),$("#rucOrganismoDeportista"),$("#nombreOrganismoDeportista"),$(".documentos__no__deportistas"),$(".documentos__deportistas"),$("#tipoAtleta"),true);	

	rucBuscador($("#buscarRucOrganismo"),$(".contenedor__ruc__organismo"),$("#rucOrganismo"),$("#nombreOrganismo"),false);	

	rucBuscador($("#buscarRucOrganismoPatrocinador"),$(".contenedor__ruc__organismo__patrocinador"),$("#rucOrganismoPatrocinador"),$("#nombreOrganismoPatrocinador"),false);	

	rucBuscador($("#buscarRucPatrocinador"),$(".contenedor__ruc__organismo__patrocinador__garantizados"),$("#numeroRucPatrocinador"),$("#nombrePatrocinador"),false);	
	
	/*=====  End of Buscar por Ruc  ======*/
	

});