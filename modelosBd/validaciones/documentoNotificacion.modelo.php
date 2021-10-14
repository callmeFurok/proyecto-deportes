<?php

	extract($_POST);

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


	$jason['validaAsistencia']=$validaAsistencia;
	$jason['validaNotificacion']=$validaNotificacion;
	$jason['codgioProyectoDocumentos']=$codgioProyectoDocumentos;

	echo json_encode($jason);