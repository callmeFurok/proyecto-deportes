<?php

	extract($_POST);


	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();


	$tipo = $_FILES['informeFinal']['type']; 
	$archivotmp = $_FILES['informeFinal']['tmp_name'];
	$destino="../../documentos/informeFinal";

	rename($archivotmp,"$destino/$codigosRealizadosEnvios.pdf");

	if($rectificasEvidencias=="si"){

		$query2="UPDATE pro_proyecto SET mensajeSegui='A' WHERE codigo='$codigosRealizadosEnvios';";
		$resultado2= $conexionEstablecida->exec($query2);

	}else{

		$query2="UPDATE pro_proyecto SET seguimiento='A' WHERE codigo='$codigosRealizadosEnvios';";
		$resultado2= $conexionEstablecida->exec($query2);

	}

	for($i=0;$i<$sumadorGlobal;$i++){

		$archivotmp = $_FILES["comprobantesInformes$i"]['tmp_name'];
		$destino="../../documentos/evidencias";

		$evidencias=$codigosRealizadosEnvios."-".$i;

		rename($archivotmp,"$destino/$evidencias.pdf");

		$query="INSERT INTO `ezonshar2`.`pro_seguimiento` (`idSeguimiento`, `informe`, `evidencia`, `codigo`) VALUES (NULL, '$codigosRealizadosEnvios', '$evidencias', '$codigosRealizadosEnvios');";
		$resultado= $conexionEstablecida->exec($query);


	}


	$mensaje=1;
	$jason['mensaje']=$mensaje;
	echo json_encode($jason);