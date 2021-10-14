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
	$data4=array();
	$data5=array();
	$data6=array();

	/*=====  End of Declaración arrays  ======*/
	


	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();	

 	$query="SELECT idMetas,nombre__conjunto,descripcion__conjunto,metodoCalculo__conjunto,metaPropuesta__conjunto,periodo__conjunto FROM pro_metas WHERE codigo='$codigoProyecto';";
	$resultado = $conexionEstablecida->query($query);


	while($registro = $resultado->fetch()) {

		$idMetas=$registro['idMetas'];
		array_push($data1, $idMetas);

		$nombre__conjunto=$registro['nombre__conjunto'];
		array_push($data2, $nombre__conjunto);

		$descripcion__conjunto=$registro['descripcion__conjunto'];
		array_push($data3, $descripcion__conjunto);

		$metodoCalculo__conjunto=$registro['metodoCalculo__conjunto'];
		array_push($data4, $metodoCalculo__conjunto);

		$metaPropuesta__conjunto=$registro['metaPropuesta__conjunto'];
		array_push($data5, $metaPropuesta__conjunto);

		$periodo__conjunto=$registro['periodo__conjunto'];
		array_push($data6, $periodo__conjunto);
	}


	$stringidMetas=  implode("------", $data1);
	$stringnombre__conjunto =  implode("------", $data2);
	$stringdescripcion__conjunto =  implode("------", $data3);
	$stringmetodoCalculo__conjunto =  implode("------", $data4);
	$stringmetaPropuesta__conjunto =  implode("------", $data5);
	$stringperiodo__conjunto =  implode("------", $data6);

	$jason['stringidMetas']=$stringidMetas;
	$jason['stringnombre__conjunto']=$stringnombre__conjunto;
	$jason['stringdescripcion__conjunto']=$stringdescripcion__conjunto;
	$jason['stringmetodoCalculo__conjunto']=$stringmetodoCalculo__conjunto;
	$jason['stringmetaPropuesta__conjunto']=$stringmetaPropuesta__conjunto;
	$jason['stringperiodo__conjunto']=$stringperiodo__conjunto;

	echo json_encode($jason);