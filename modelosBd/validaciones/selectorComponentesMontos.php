<?php

	extract($_POST);


	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';


	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();	

 	$data1=array();

 	$query="SELECT idMontosFechas,montos FROM pro_componentesciudadanosmontos WHERE idComponentesCiudadanos='$generarId';";
	$resultado = $conexionEstablecida->query($query);


	while($registro = $resultado->fetch()) {

		$idMontosFechas=$registro['idMontosFechas'];

		$montos=$registro['montos'];
		array_push($data1, $montos);

	}


	$jason['idMontosFechas']=$idMontosFechas;

	$stringFormulas=  implode("------", $data1);

	$jason['stringFormulas']=$stringFormulas;

	echo json_encode($jason);