<?php

	extract($_POST);


	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	require_once "../../Swift/lib/swift_required.php";


	/*===================================================
	=            Llamando Funciòn php mailer            =
	===================================================*/
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require '../../PHPMailer/src/Exception.php';
	require '../../PHPMailer/src/PHPMailer.php';
	require '../../PHPMailer/src/SMTP.php';
		
	/*=====  End of Llamando Funciòn php mailer  ======*/

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

 	extract($_POST);

	date_default_timezone_set("America/Guayaquil");

	$fecha_actual = date('Y-m-d');
	$hora_actual= date('H:i:s');

	$numero__conjunto = json_decode($numero__conjunto);
	$descripcion__conjunto = json_decode($descripcion__conjunto);
	$unidad__conjunto = json_decode($unidad__conjunto);
	$cantidad__conjunto = json_decode($cantidad__conjunto);
	$precioUnitario__conjunto = json_decode($precioUnitario__conjunto);
	$subtotal__conjunto = json_decode($subtotal__conjunto);
	$elementosResultantes = json_decode($elementosResultantes);

	$medicion__conjunto = json_decode($medicion__conjunto);
	$formasDePago__conjunto = json_decode($formasDePago__conjunto);
	$valorPreferencialConjunto = json_decode($valorPreferencialConjunto);

	for($i=0;$i<count($numero__conjunto);$i++){

		$resultado = str_replace("___", "", $elementosResultantes[$i]);

		$query="INSERT INTO `ezonshar2`.`pro_cronograma` (`idInfrasCronograma`, `numero__conjunto`, `descripcion__conjunto`, `unidad__conjunto`, `cantidad__conjunto`, `precioUnitario__conjunto`, `subtotal__conjunto`, `codigo`, `elementosResultantes`, `medicion__conjunto`, `formasDePago__conjunto`, `valorPreferencialConjunto`) VALUES (NULL, '$numero__conjunto[$i]', '$descripcion__conjunto[$i]', '$unidad__conjunto[$i]', '$cantidad__conjunto[$i]', '$precioUnitario__conjunto[$i]', '$subtotal__conjunto[$i]', '$codigoProyecto','$resultado','$medicion__conjunto[$i]','$formasDePago__conjunto[$i]','$valorPreferencialConjunto[$i]');";
		$resultado= $conexionEstablecida->exec($query);

	}


	$mensaje=1;
	$jason['mensaje']=$mensaje;
	echo json_encode($jason);