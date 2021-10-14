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


	$from=$emailAcomadador;

	$query="INSERT INTO `ezonshar2`.`pro_mensajes` (`idMensajes`, `mensaje`, `proyecto`) VALUES (NULL, '$enviarComentarioResponsable', '$proyectoNombre');";
	$resultado= $conexionEstablecida->exec($query);


	/*======================================================
	=            Enviar correo desde php mailer            =
	======================================================*/

	// Instantiation and passing `true` enables exceptions
	$mailSegunderos = new PHPMailer(true);

	try {

			//Server settings
			$mailSegunderos->isSMTP();                                            // Send using SMTP
			$mailSegunderos->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
			$mailSegunderos->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mailSegunderos->Username   = 'ministerioDeporte2021@gmail.com';                     // SMTP username
			$mailSegunderos->Password   = 'Becquer098..';                            // SMTP password
			$mailSegunderos->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			$mailSegunderos->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

			$mailSegunderos->CharSet = 'UTF-8';
			//Recipients
			$mailSegunderos->setFrom('ministerioDelDeporte@deporte.gob.ec', 'Ministerio del deporte');

			$mailSegunderos->addAddress($correoResponsble); 

			// Content
			$mailSegunderos->isHTML(true);                                  // Set email format to HTML
			$mailSegunderos->Subject = 'Ministerio del deporte';
			$mailSegunderos->Body    = "<head><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><title>MINISTERIO DEL DEPORTE</title><style type='text/css'>body {background:#EEE; padding:30px; font-size:12px;}</style></head><body><div style='font-weight:bold; font-style:oblique;'>".$nombreAcomodador." en referencia al proyecto ".$proyectoNombre." realizó el siguiente comentario</div><br><div>".nl2br($enviarComentarioResponsable)."<div><br>Quedo agradecido de antemano por la atención prestada.</body></html></head>"; 
			$mailSegunderos->send();


	} catch (Exception $e) {
		echo "Hubo un error al enviar el mensaje ".$e;
	}

	/*=====  End of Enviar correo desde php mailer  ======*/

	$mensaje=1;
	$jason['mensaje']=$mensaje;
	echo json_encode($jason);