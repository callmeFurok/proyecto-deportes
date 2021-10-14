<?php

	extract($_POST);


	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

 	extract($_POST);

	$query10="INSERT INTO `ezonshar2`.`pro_mefpresupuesto` (`idMef`, `presupuestoMefAsignados`) VALUES (NULL, '$presupuestoMefAsignados');";
	$resultado10= $conexionEstablecida->exec($query10);


	$mensaje=1;
	$jason['mensaje']=$mensaje;
	echo json_encode($jason);