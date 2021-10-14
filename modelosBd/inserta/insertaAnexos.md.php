<?php

	extract($_POST);


	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	require_once "../../Swift/lib/swift_required.php";

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();


	date_default_timezone_set("America/Guayaquil");

	$fecha_actual = date('Y-m-d');
	$hora_actual= date('H:i:s');
			

	$contador=0;

	/*=================================================
	=            Relacionados al ciudadano            =
	=================================================*/
	
	if ($certificacionTrayectoriaDetalles!='no') {

		$tipo = $_FILES['certificacionTrayectoria']['type']; 
		$archivotmp = $_FILES['certificacionTrayectoria']['tmp_name'];
		$destino="../../documentos/certificacionDeTrayectoria";

		$certificacionTrayectoriaPdf=$idUsuario."-".$codigoUsuarios;

		if($tipo!="application/pdf"){

			$contador=$contador+1;

		}

		rename($archivotmp,"$destino/$certificacionTrayectoriaPdf.pdf");

	}

	if ($acreditarVidaJuridicaDetalles!='no') {

		$tipo = $_FILES['acreditarVidaJuridica']['type']; 
		$archivotmp = $_FILES['acreditarVidaJuridica']['tmp_name'];
		$destino="../../documentos/acreditarVidaJuridica";

		$vidaJuridicaPdf=$idUsuario."-".$codigoUsuarios;

		if($tipo!="application/pdf"){

			$contador=$contador+1;

		}

		rename($archivotmp,"$destino/$vidaJuridicaPdf.pdf");

	}

	if ($curriculumDeportivoSegundoDetalles!='no') {

		$tipo = $_FILES['curriculumDeportivoSegundo']['type']; 
		$archivotmp = $_FILES['curriculumDeportivoSegundo']['tmp_name'];
		$destino="../../documentos/curriculum";

		$curriculumDeportivoPdf=$idUsuario."-".$codigoUsuarios;

		if($tipo!="application/pdf"){

			$contador=$contador+1;

		}

		rename($archivotmp,"$destino/$curriculumDeportivoPdf.pdf");

	}
	
	
	/*=====  End of Relacionados al ciudadano  ======*/
	

	/*================================
	=            Técnicos            =
	================================*/
	

	if ($certificadoPropiedadDetalles!='no') {

		$tipo = $_FILES['certificadoPropiedad']['type']; 
		$archivotmp = $_FILES['certificadoPropiedad']['tmp_name'];
		$destino="../../documentos/certificadoPropiedad";

		$certificadoPropiedadPdf=$idUsuario."-".$codigoUsuarios;

		if($tipo!="application/pdf"){

			$contador=$contador+1;

		}

		rename($archivotmp,"$destino/$certificadoPropiedadPdf.pdf");

	}	

	if ($memoriaTecnicaArquitectonicaDetalles!='no') {

		$tipo = $_FILES['memoriaTecnicaArquitectonica']['type']; 
		$archivotmp = $_FILES['memoriaTecnicaArquitectonica']['tmp_name'];
		$destino="../../documentos/memoriaTecnicaArquitectonica";

		$memoriaArquitectonicaPdf=$idUsuario."-".$codigoUsuarios;

		if($tipo!="application/pdf"){

			$contador=$contador+1;

		}

		rename($archivotmp,"$destino/$memoriaArquitectonicaPdf.pdf");

	}	

	if ($planosArquitecntonicosDetalles!='no') {

		$tipo = $_FILES['planosArquitecntonicos']['type']; 
		$archivotmp = $_FILES['planosArquitecntonicos']['tmp_name'];
		$destino="../../documentos/planosArquitecntonicos";

		$planosArquitectonicosPdf=$idUsuario."-".$codigoUsuarios;

		if($tipo!="application/pdf"){

			$contador=$contador+1;

		}

		rename($archivotmp,"$destino/$planosArquitectonicosPdf.pdf");

	}	


	if ($presupuestoRubroDetalles!='no') {

		$tipo = $_FILES['presupuestoRubro']['type']; 
		$archivotmp = $_FILES['presupuestoRubro']['tmp_name'];
		$destino="../../documentos/presupuestoRubro";

		$presupuestoRubroPdf=$idUsuario."-".$codigoUsuarios;

		if($tipo!="application/pdf"){

			$contador=$contador+1;

		}

		rename($archivotmp,"$destino/$presupuestoRubroPdf.pdf");

	}	

	if ($cronogramaValoradoDetalles!='no') {

		$tipo = $_FILES['cronogramaValorado']['type']; 
		$archivotmp = $_FILES['cronogramaValorado']['tmp_name'];
		$destino="../../documentos/cronogramaValorado";

		$cronogramaValoradoPdf=$idUsuario."-".$codigoUsuarios;

		if($tipo!="application/pdf"){

			$contador=$contador+1;

		}

		rename($archivotmp,"$destino/$cronogramaValoradoPdf.pdf");

	}	

	if ($respaldosNuevosDigitalesDetalles!='no') {

		$tipo = $_FILES['respaldosNuevosDigitales']['type']; 
		$archivotmp = $_FILES['respaldosNuevosDigitales']['tmp_name'];
		$destino="../../documentos/respaldosNuevosDigitales";

		$respaldosNuevosDigitalesPdf=$idUsuario."-".$codigoUsuarios;

		if($tipo!="application/pdf"){

			$contador=$contador+1;

		}

		rename($archivotmp,"$destino/$respaldosNuevosDigitalesPdf.pdf");

	}	
	
	/*=====  End of Técnicos  ======*/
	

	

	if($contador==0){

		
		$query3="DELETE FROM pro_documentos WHERE codigo='$codigoUsuarios';";

		$resultado3= $conexionEstablecida->exec($query3);

		$query2="INSERT INTO `ezonshar2`.`pro_documentos` (`idDocumentos`, `usuario`, `proyectoCargadoPdf`, `curriculumDeportivoSegundo`, `certificadoFederacionPdf`, `certificadoOrganismoSuperiorPdf`, `solicitudFederacionPdf`, `avalFederacionPdf`, `solciitudAvalPdf`, `avalOrganismoSuperiorPdf`, `fecha`, `hora`, `codigo`, `contrato`, `contratoCargadoCheck`, `certificacionTrayectoria`, `acreditarVidaJuridica`, `certificadoPropiedades`, `memoriaTecnicaArquitectonica`, `planosArquitecntonicos`, `presupuestoRubro`, `cronogramaValorado`, `respaldosNuevosDigitales`) VALUES (NULL, '$idUsuario',NULL, '$curriculumDeportivoPdf', '$certificadoFederacionPdf', '$certificadoOrganismoSuperiorPdf', '$solicitudFederacionPdf', '$avalFederacionPdf', '$solciitudAvalPdf', '$avalOrganismoSuperiorPdf', '$fecha_actual', '$hora_actual', '$codigoUsuarios',NULL,'$contratoCargadoCheck','$certificacionTrayectoriaPdf','$vidaJuridicaPdf','$certificadoPropiedadPdf','$memoriaArquitectonicaPdf','$planosArquitectonicosPdf','$presupuestoRubroPdf','$cronogramaValoradoPdf','$respaldosNuevosDigitalesPdf');";

		$resultado2= $conexionEstablecida->exec($query2);


		$mensaje=1;
		$jason['mensaje']=$mensaje;
		echo json_encode($jason);


	}else{

		$mensaje=2;
		$jason['mensaje']=$mensaje;
		echo json_encode($jason);

	}

