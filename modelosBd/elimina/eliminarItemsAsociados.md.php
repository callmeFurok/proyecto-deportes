<?php

	extract($_POST);


	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

 	extract($_POST);

	$query="DELETE FROM pro_componentesciudadanos WHERE idItemComponente='$idEliminar' AND codigo='$codigo';";
	$resultado= $conexionEstablecida->exec($query);

	$mensaje=1;
	$jason['mensaje']=$mensaje;
	echo json_encode($jason);