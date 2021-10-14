<?php

	extract($_POST);


	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	/*==========================================
	=            Declaración arrays            =
	==========================================*/
	
	$data1=array();
	$data2=array();

	/*=====  End of Declaración arrays  ======*/
	
	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();	

 	$query="SELECT idSeguimiento,evidencia FROM pro_seguimiento WHERE codigo='$codigoProyectoRealizados';";
	$resultado = $conexionEstablecida->query($query);


	while($registro = $resultado->fetch()) {

		$evidencia=$registro['evidencia'];
		array_push($data1, $evidencia);


		$idSeguimiento=$registro['idSeguimiento'];
		array_push($data2, $idSeguimiento);

	}


	$stringevidencia=  implode("------", $data1);
	$stringidSeguimiento=  implode("------", $data2);

	$jason['stringevidencia']=$stringevidencia;
	$jason['stringidSeguimiento']=$stringidSeguimiento;

	echo json_encode($jason);