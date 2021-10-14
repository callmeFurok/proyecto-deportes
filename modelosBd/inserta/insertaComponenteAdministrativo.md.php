<?php

	extract($_POST);


	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

 	extract($_POST);

 	/*===================================================================
 	=            Actualizar direccion de Organismo Deportivo            =
 	===================================================================*/

 	$estado='A';
 		
 	$query="INSERT INTO `ezonshar2`.`pro_componentes` (`idComponentes`, `nombreComponentes`, `estado`, `tipoComponente`) VALUES (NULL, :componentesNombres, :estado, :tipoComponente);";
 	$sql = $conexionEstablecida->prepare($query);
 	$sql->bindParam(':componentesNombres',$componentesNombres,PDO::PARAM_STR);
 	$sql->bindParam(':estado',$estado,PDO::PARAM_STR);
 	$sql->bindParam(':tipoComponente',$tipoComponente,PDO::PARAM_STR);
 	$sql->execute();
	
 	/*=====  End of Actualizar direccion de Organismo Deportivo  ======*/
 		
	$mensaje=1;
	$jason['mensaje']=$mensaje;
	echo json_encode($jason);