<?php

	extract($_POST);


	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	/*==========================================
	=            Declaración arrays            =
	==========================================*/
	
	$data1=array();

	/*=====  End of Declaración arrays  ======*/
	
	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();	

 	$query="SELECT elementosResultantes FROM pro_cronograma WHERE idInfrasCronograma='$generarId';";
	$resultado = $conexionEstablecida->query($query);


	while($registro = $resultado->fetch()) {

		$elementosResultantes=$registro['elementosResultantes'];
		array_push($data1, $elementosResultantes);

	}

	$stringelementosResultantes=  implode("------", $data1);


	$jason['stringelementosResultantes']=$stringelementosResultantes;

	echo json_encode($jason);