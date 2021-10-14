<?php

	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';


	extract($_POST);

			
	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();


	$query="INSERT INTO `ezonshar2`.`pro_infraselects` (`idProyectoSeleccionas`, `infras`, `codigo`) VALUES (NULL, NULL, '$parametrosEnviados');";
	$resultado= $conexionEstablecida->exec($query);	


