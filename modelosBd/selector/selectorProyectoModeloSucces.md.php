<?php

	extract($_POST);


	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';


	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();


 	if ($tipoDeportistas=="altoRendimiento" || $tipoDeportistas=="militarDeportiva" || $tipoDeportistas=="profesional" || $tipoDeportistas=="alto" || $tipoDeportistas=="alto2" || $tipoDeportistas=="altoRendimientoDiscapacidad") {
		
	 	$query="SELECT a.email,c.descripcionFisicamenteEstructura,CONCAT_WS(' ',nombre,apellido) AS nombreCompleto FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_fisicamenteestructura AS c ON c.id_FisicamenteEstructura=a.fisicamenteEstructura WHERE a.fisicamenteEstructura=24 AND b.id_rol=7 ORDER BY a.id_usuario ASC LIMIT 1;";

	}else if($tipoDeportistas=="formativo" || $tipoDeportistas=="estudiantil" || $tipoDeportistas=="noFederado" || $tipoDeportistas=="recreativo"){

		$query="SELECT a.email,c.descripcionFisicamenteEstructura,CONCAT_WS(' ',nombre,apellido) AS nombreCompleto FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_fisicamenteestructura AS c ON c.id_FisicamenteEstructura=a.fisicamenteEstructura WHERE a.fisicamenteEstructura=26 AND b.id_rol=7 ORDER BY a.id_usuario ASC LIMIT 1;";

	}
	
	$resultado = $conexionEstablecida->query($query);


	while($registro = $resultado->fetch()) {

		$email=$registro['email'];
		$descripcionFisicamenteEstructura=$registro['descripcionFisicamenteEstructura'];
		$nombreCompleto=$registro['nombreCompleto'];

	}

	$jason['email']=$email;
	$jason['descripcionFisicamenteEstructura']=$descripcionFisicamenteEstructura;
	$jason['nombreCompleto']=$nombreCompleto;

	echo json_encode($jason);