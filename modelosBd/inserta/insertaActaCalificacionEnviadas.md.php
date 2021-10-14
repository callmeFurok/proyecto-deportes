<?php

	extract($_POST);


	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();


 	$arrayCodigos = explode(",", $codigosGenerados);


	date_default_timezone_set("America/Guayaquil");

	$fecha_actual = date('Y-m-d');
	$hora_actual= date('H:i:s');

 	for ($i=0; $i < count($arrayCodigos); $i++) { 
 	
	 	$query="SELECT idTramite FROM pro_proyecto WHERE califica='O' AND codigo='$arrayCodigos[$i]';";
		$resultado = $conexionEstablecida->query($query);


		while($registro = $resultado->fetch()) {

			$idTramite=$registro['idTramite'];

		}

	 	$query3="SELECT idTramite as idTramite2 FROM pro_proyecto WHERE califica='A' AND codigo='$arrayCodigos[$i]';";
		$resultado3 = $conexionEstablecida->query($query3);


		while($registro3 = $resultado3->fetch()) {

			$idTramite2=$registro3['idTramite2'];

		}


		if (!empty($idTramite)) {
			
			$query2="UPDATE pro_proyecto SET califica='A', fechaCalifica='$fecha_actual', horaCalifica='$hora_actual' WHERE idTramite='$idTramite';";
			$resultado2= $conexionEstablecida->exec($query2);	


		}else if(!empty($idTramite2)){

			$query2="UPDATE pro_proyecto SET certifica='A', fechaCertifica='$fecha_actual', horaCertifica='$hora_actual' WHERE idTramite='$idTramite2';";
			$resultado2= $conexionEstablecida->exec($query2);

		}


 	}

 	
	$mensaje=1;
	$jason['mensaje']=$mensaje;
	echo json_encode($jason);