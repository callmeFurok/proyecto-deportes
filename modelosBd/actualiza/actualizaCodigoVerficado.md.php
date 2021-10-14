<?php

	extract($_POST);


	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';


	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();


	$query="INSERT INTO `ezonshar2`.`pro_codigoelegidos` (`idCodigoElegido`, `codigo`, `idUsuario`) VALUES (NULL, '$codigo', '$idUsuario');";
	$resultado= $conexionEstablecida->exec($query);
