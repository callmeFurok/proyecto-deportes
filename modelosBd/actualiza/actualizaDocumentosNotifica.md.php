<?php

	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	extract($_POST);

	date_default_timezone_set("America/Guayaquil");

	$fecha_actual = date('Y-m-d');
	$hora_actual= date('H:i:s');
			
	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

	$asistencia = '../../documentos/asistencia/'.$codgioProyectoDocumentos.'.pdf';
	$validaAsistencia=false;

	if (file_exists($asistencia)) {
		$validaAsistencia=true;
	}

	$notificacion = '../../documentos/notificacion/'.$codgioProyectoDocumentos.'.pdf';
	$validaNotificacion=false;
	
	if (file_exists($notificacion)) {
		$validaNotificacion=true;
	}

	if ($validaAsistencia==false) {

		$mensaje=1;

	}else if($validaNotificacion==false){

		$mensaje=2;

	}else{

		if ($selectorUsuariosDelegados!="0" || $selectorUsuariosDelegados!=0) {
			
			$query3="UPDATE th_usuario SET calificadorNoti='A' WHERE id_usuario='$selectorUsuariosDelegados';";
			$resultado3= $conexionEstablecida->exec($query3);

		}

		$observacionesNoRequeridas=filter_var($observacionesNoRequeridas, FILTER_SANITIZE_MAGIC_QUOTES);

		/*=================================
		=            Firmas id            =
		=================================*/
		
		if ($asistenciaMinistroValidadorAsistio==true) {
			
			$query10="UPDATE pro_proyecto SET firmaMinistro='$idMinistro' WHERE codigo='$codgioProyectoDocumentos';";
			$resultad10= $conexionEstablecida->exec($query10);

		}
		
		if ($asistenciaSusesAltoValidadorAsistio==true) {
			
			$query11="UPDATE pro_proyecto SET firmaSubsesAlto='$idSusesAlto' WHERE codigo='$codgioProyectoDocumentos';";
			$resultad11= $conexionEstablecida->exec($query11);

		}


		if ($asistenciaActividadFisicaValidadorAsistio==true) {
			
			$query12="UPDATE pro_proyecto SET firmaSubsesActividad='$idSusesActividad' WHERE codigo='$codgioProyectoDocumentos';";
			$resultad12= $conexionEstablecida->exec($query12);

		}


		if ($asistenciaCoordinadorValidadorAsistio==true) {
			
			$query13="UPDATE pro_proyecto SET firmaCoordinador='$idSusesCoordinador' WHERE codigo='$codgioProyectoDocumentos';";
			$resultad13= $conexionEstablecida->exec($query13);

		}

		if ($asistenciaPlanificacionValidadorAsistio==true) {
			
			$query14="UPDATE pro_proyecto SET firmaPlanificacion='$idSusesPlanificacion' WHERE codigo='$codgioProyectoDocumentos';";
			$resultad14= $conexionEstablecida->exec($query14);

		}


		if ($asistenciaJuridicoValidadorAsistio==true) {
			
			$query15="UPDATE pro_proyecto SET firmaJuridico='$idSusesJuridico' WHERE codigo='$codgioProyectoDocumentos';";
			$resultad15= $conexionEstablecida->exec($query15);

		}



		/*=====  End of Firmas id  ======*/
		


		$query="UPDATE pro_proyecto SET firmasNotiReun='A',firmasReuTotalesReus='$contadorAsistencias',firmasRealziadasReus='0',firmaNotificacion=NULL,recomendacion='E',resultadoCalificacion='$notificacionDirecta' WHERE codigo='$codgioProyectoDocumentos';";
		$resultado= $conexionEstablecida->exec($query);

		$query2="INSERT INTO `ezonshar2`.`pro_observacionrecomendacionsatisfaccion` (`idObservacionesRecomendacion`, `observacion`, `codigo`, `fecha`, `hora`, `tipo`) VALUES (NULL, '$observacionesNoRequeridas', '$codgioProyectoDocumentos', '$fecha_actual', '$hora_actual', 'E');";
		$resultado2= $conexionEstablecida->exec($query2);

		$mensaje=3;

	}


	$jason['mensaje']=$mensaje;

	echo json_encode($jason);