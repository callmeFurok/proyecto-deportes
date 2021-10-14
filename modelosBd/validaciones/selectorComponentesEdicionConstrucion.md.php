<?php

	extract($_POST);


	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	/*==========================================
	=            Declaración arrays            =
	==========================================*/
	
	$data1=array();

	$data2=array();

	$data3=array();


	/*=====  End of Declaración arrays  ======*/
	


	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();	

 	$query="SELECT idComponentesCiudadanos,campos,identificador FROM pro_componentesciudadanos WHERE codigo='$codigoProyecto' AND idItemComponente='$idItem';";
	$resultado = $conexionEstablecida->query($query);


	while($registro = $resultado->fetch()) {

		$idComponentesCiudadanos=$registro['idComponentesCiudadanos'];
		array_push($data1, $idComponentesCiudadanos);

		$campos=$registro['campos'];
		array_push($data2, $campos);


		$identificador=$registro['identificador'];
		array_push($data3, $identificador);

	}


	$stringidComponentesCiudadanos=  implode("------", $data1);
	$stringcampos=  implode("------", $data2);
	$stringidentificador=  implode("------", $data3);

	$jason['stringidComponentesCiudadanos']=$stringidComponentesCiudadanos;
	$jason['stringcampos']=$stringcampos;
	$jason['stringidentificador']=$stringidentificador;

	echo json_encode($jason);