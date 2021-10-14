<?php

	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

	extract($_POST);


 	$archivotmpDocumentos = $_FILES['documento']['tmp_name'];
	$destinoDocumentos="../../documentos/notificacion";

	$query="UPDATE pro_proyecto SET firmaNotificacion2='$idUsuario' WHERE codigo='$codigo';";
	$resultado= $conexionEstablecida->exec($query);

	rename($archivotmpDocumentos,"$destinoDocumentos/$codigo.pdf");
	

	$mensaje=1;
	$jason['mensaje']=$mensaje;

	echo json_encode($jason);