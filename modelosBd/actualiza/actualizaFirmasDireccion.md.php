<?php

	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

	extract($_POST);

	if ($fisicamenteEstructura=="24") {
 		$query="firmaSubsesAlto2='$idUsuario'";
 	}else if($fisicamenteEstructura=="26"){
 		$query="firmaSubsesActividad2='$idUsuario'";
 	}else if($fisicamenteEstructura=="1"){
 		$query="firmaCoordinador2='$idUsuario'";
 	}else if($fisicamenteEstructura=="3"){
 		$query="firmaPlanificacion2='$idUsuario'";
 	}else if($fisicamenteEstructura=="2"){
 		$query="firmaJuridico2='$idUsuario'";
 	}else if($rolFuncionarios=="3"){
 		$query="firmaDelegado2='$idUsuario'";
 	}else if($rolFuncionarios=="5"){
 		$query="firmaMinistro2='$idUsuario'";
 	}


 	$archivotmpDocumentos = $_FILES['documento']['tmp_name'];
	$destinoDocumentos="../../documentos/asistencia";

	$query="UPDATE pro_proyecto SET $query WHERE codigo='$codigo';";
	$resultado= $conexionEstablecida->exec($query);


	rename($archivotmpDocumentos,"$destinoDocumentos/$codigo.pdf");
	

	$mensaje=1;
	$jason['mensaje']=$mensaje;

	echo json_encode($jason);