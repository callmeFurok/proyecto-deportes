<?php

	extract($_POST);


	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

 	extract($_POST);

 	$fecha_actual = date('Y-m-d');
 	

	$query2="SELECT tipoTramite FROM pro_infraselects WHERE codigo='$codigosRealizadosEnvios' AND tipoTramite!='infraTeconlogicos' AND tipoTramite!='infra';";
	$resultado2 = $conexionEstablecida->query($query2);	

	while($registro2 = $resultado2->fetch()) {

		$tipoTramiteBase=$registro2['tipoTramite'];

	}
	if ($tipoTramiteBase=="altoRendimiento" || $tipoTramiteBase=="altoRendimientoDiscapacidad" || $tipoTramiteBase=="profesional") {


		$tramiteCorresponde="altoRendimiento";

	}else{

		$tramiteCorresponde="actividadFisica";

	}

	$query="UPDATE pro_proyecto SET modificacion='si',justificacion='$jstificaModifica',fechaModificacas='$fecha_actual',tramiteCorresponde1='$tramiteCorresponde' WHERE codigo='$codigosRealizadosEnvios';";
	$resultado= $conexionEstablecida->exec($query);

	$mensaje=1;
	$jason['mensaje']=$mensaje;
	echo json_encode($jason);