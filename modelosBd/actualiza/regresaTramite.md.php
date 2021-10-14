<?php

	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';


	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();	

 	extract($_POST);


	date_default_timezone_set("America/Guayaquil");

	$fecha_actual = date('Y-m-d');
	$hora_actual= date('H:i:s');

	$query2="SELECT PersonaACargo FROM th_usuario WHERE id_usuario='$idUsuarioDefinidos';";
	$resultado2 = $conexionEstablecida->query($query2);

	while($registro2 = $resultado2->fetch()) {

		$PersonaACargo=$registro2['PersonaACargo'];
			
	}


	$query="UPDATE pro_proyecto SET regresaTramite='A',observacionRegresaTramite='$obseracionDefinida',horaRegresar='$hora_actual',fechaRegresar='$fecha_actual',idUsuarioRelativo='$PersonaACargo' WHERE idTramite='$idTramite';";

	$resultado= $conexionEstablecida->exec($query);


	$mensaje=1;
 	$jason['mensaje']=$mensaje;
	echo json_encode($jason);



