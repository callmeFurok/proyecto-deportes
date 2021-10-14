$(document).ready(function () {

	$(".ingreso__usuarios").hide();

	$(".ingreso__organismosDeportivos").hide();

	$("#tipoAtleta").hide();

	$("#tipoOrganismo").hide();

	$("#registro").hide();

	$("#registroPatrocinador").hide();

	$(".informacion__club__deportista").hide();

	$(".documentos__deportistas").hide();

	$(".documentos__no__deportistas").hide();

	$(".documentos__deportistas__documentos").hide();

	$("#certificadoOpsub").hide();

	$("#respuestaDePeticion").hide();

	$(".documentos__no__alto__rendimiento").hide();

	$(".documentos__no__alto__rendimiento").hide();

	$(".respuestas__certificadosFederaciones").hide();

	$(".label__texto__archivos__negativos").hide();

	$("#solicitudCertificacionRealizada").hide();

	$(".escondido__codigo").hide();

	$(".proyecto__cargas").hide();

	$(".certificado__federativos").hide();

	$(".oculto__razon").hide();

	$(".certificado__organismo__superior").hide();

	$(".solicitud__federaciones").hide();

	$(".aval__documento").hide();

	$(".oculto__razon__aval").hide();

	$(".aval__organismo__superior").hide();

	$(".aval__solciitudes__federaciones").hide();

	$(".oculto__contratos").hide();

	$(".oculto__informacion").hide();

	$("#tablaMetas").hide();

	$("#tablaPronosticos").hide();

	$("#beneficiariosDirectos").hide();

	$("#discapacidadBeneficiarios").hide();

	$("#beneficiariosIndirectos").hide();

	$("#descripcionActividades").hide();

	$("#estructuraOrganicaDeportiva").hide();

	$("#seguimientoEvaluacion").hide();


	if($("#documentosAnexosVariable").val()!=""){

		$(".ocultando__documentos__anexos").hide();

		$(".ocultando__ingresados__documentos__anexos").show();

	}else{

		$(".ocultando__ingresados__documentos__anexos").hide();

		$(".ocultando__documentos__anexos").show();		

	}


	$(".oculto__1").hide();
	$(".oculto__2").hide();
	$(".oculto__3").hide();
	$(".oculto__4").hide();
	$(".oculto__5").hide();
	$(".oculto__6").hide();
	$(".oculto__7").hide();
	$(".oculto__8").hide();

	$(".calificarCurricumFila").hide();
	$(".calificarCertificadoFila").hide();
	$(".calificarCertificadoSuperiorFila").hide();
	$(".calificarSolicitudAvalFilaFederacion").hide();
	$(".calificarAvalFederacionFila").hide();
	$(".calificarSolicitudAvalFila").hide();
	$(".calificarAvalOrganismoSuperiorFila").hide();

	$(".fila_proInfras").hide();
	$(".fila__vidaJuridica").hide();
	$(".fila__certificadoTrayectoria").hide();
	$(".fila__certificadoPropiedad").hide();
	$(".fila__memoriaArquitectonica").hide();
	$(".fila__presupuestoRubro").hide();
	$(".fila__cronogramaValorado").hide();
	$(".fila__respaldosDigitales").hide();


	$("#observacionNegativaProyecto").hide();

	$("#observacionNegativaCurriculum").hide();
	$("#observacionNegativaCertificadoFederacion").hide();
	$("#observacionNegativaCertificadoOrganismoSuperior").hide();
	$("#observacionNegativaSolicitudAvalFederacion").hide();
	$("#observacionNegativaAvalFederacion").hide();
	$("#observacionNegativaSolicitudAval").hide();
	$("#observacionNegativaAvalOrganismoSuperior").hide();

	$(".rectificar__informacion").hide();
	$(".rectificar__informacion__anexos").hide();
	$(".rectificar__informacion__proyecto").hide();

	$(".descalificacion__director").hide();

	$(".recomendacion__satisfactoria__dir__fila").hide();

	$(".regresar__escoger").hide();

	$(".contenedor__usuarios__select").hide();

	$(".generar__inputs").hide();

	$(".fila__contrato").hide();

	$(".fila__contrato__cargado").hide();

	$(".fila__descalificar__proyecto__comentarios").hide();

	$("#comentarioNegativo").hide();

	$("#enviarContratoObservaciones").hide();

	$(".fila__certificados__cargado").hide();

	$(".oculto__razon").hide();

	$(".certificados__ocultados").hide();

	$(".documentos__necesarios").hide();

	$(".rechazo__certificado").hide();

	$(".respuesta__organismo__si").hide();

	$(".respuesta__organismo__no").hide();

	$(".aval__ocultados__si").hide();

	$(".aval__ocultados__no").hide();

	$(".respuesta__aval__organismo__si").hide();

	$(".respuesta__aval__organismo__no").hide();

	// $(".elementos__centrados__para__envios").hide();

	$(".reload__ocultos").show();

	if ($("#documentosRevisados").val()=="si") {

		$(".container__escritorios").hide();

		$(".contenedor__ingresados").show();

	}else{

		$(".contenedor__ingresados").hide();

	}

	$(".enlazados__organismos__deportivos").hide();

	if($("#nombreRepresentanteLegal").val()==""){

		$(".enlaces__representantes__legales").hide();

	}

	$(".enlaces__usuarios").hide();

	$(".presupuesto__letras").hide();
	
	$(".presupuesto__letras__2").hide();

	$(".presupuesto__letras__3").hide();

	$(".presupuesto__letras__4").hide();

	$(".tabla__argumentos").hide();

	$(".creados__federados").hide();

	$(".fila__desplegable").hide();

	$("#observacionNegativaProyectoInfras").hide();
	$("#observacionCertificadoTrayectoria").hide();
	$("#observacionNegativaCertificadoPropiedad").hide();
	$("#observacionNegativaMemoriaArquitectonica").hide();
	$("#observacionNegativaPresupuestoRubro").hide();
	$("#observacionNegativaCronogramaValorado").hide();
	$("#observacionNegativaRespaldosDigitales").hide();

	$(".escondido__ruc__patrocinador").hide();

	$(".escondido__cedula__patrocinador").hide();

	$(".registros__dinamicos__patrocinadores").hide();

	$(".escondido__ruc__organismos").hide();

	$(".escondido__cedula__deportistas").hide();

	$(".escondidos__ruc__cedulas__deportistas").hide();

	$(".cronograma__valorado__display").hide();

	$(".fila__contrato__modicaciones").hide();

	$(".fila__contrato__modificaciones__ocultos").hide();

	$(".ocultos__proyectos__4").hide();

	$(".ocultos__proyectos__5").hide();

	$(".modificacion__enviadas").hide();

	$(".modificacion__dispuestas").hide();

	$(".evidencias__suscritas").hide();

	$(".fila__informe__cumplimiento").hide();

	$(".fila__informe__cumplimiento__visual").hide();

	$(".filas__rectificas__envios").hide();

	$(".fila__comprobantes__veniados").hide();

	$(".fila__informe__cumplimiento__enviados").hide();

	$("#comentarioNegativosInformes").hide();

	$("#observacionesSeguimientos").hide();

	$(".fila__envio__informes").hide();

	$("#descripcionActividades1").hide();

	$("#descripcionActividades2").hide();

	$("#descripcionActividades3").hide();

	$(".representantes__legales__menores").hide();

	$("#observacionComponentes").hide();

	$("#observaNegativaComuni").hide();

	$(".oculto__elementos__enviados__comites").hide();

	$(".informacion__modificables__ables").hide();

	$(".documentos__calificaciones").hide();

});