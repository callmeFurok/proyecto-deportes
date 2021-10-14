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

	/*======================================================
	=            Enviar correo desde php mailer            =
	======================================================*/

	$query="UPDATE pro_proyecto SET rectificacion='SI' WHERE codigo='$codigoEnviadores';";

	$resultado= $conexionEstablecida->exec($query);

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

		$mailSegunderos->addAddress($correoResponsblePrincipal); 

		// Content
		$mailSegunderos->isHTML(true);                                  // Set email format to HTML
		$mailSegunderos->Subject = 'Ministerio del deporte';
		$mailSegunderos->Body    = "<head><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><title>MINISTERIO DEL DEPORTE</title><style type='text/css'>body {background:#EEE; padding:30px; font-size:12px;}</style></head><body><span style='font-weight:bold; font-style: oblique;'>Estimado/a,</span><br><br><span style='font-weight:bold;'>El proyecto <span style='font-weight:bold;'>".$proyectoNombrePrincipal." fue rectificado</span><br><br>Para revisar las rectificaciones, por favor dar clic <a href='https://aplicativos.deporte.gob.ec/proyectosDeportistas/ingreso' target='_blank'>aquí</a></span></body></html></head>"; 
		$mailSegunderos->send();


	} catch (Exception $e) {
		echo "Hubo un error al enviar el mensaje ".$e;
	}


	$query="UPDATE pro_proyecto SET rectificacion='SI' WHERE codigo='$codigoEnviadores';";

	$resultado= $conexionEstablecida->exec($query);

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

		$mailSegunderos->addAddress($emailAcomadadorPrincipal); 

		// Content
		$mailSegunderos->isHTML(true);                                  // Set email format to HTML
		$mailSegunderos->Subject = 'Ministerio del deporte';
		$mailSegunderos->Body    = "<head><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><title>MINISTERIO DEL DEPORTE</title><style type='text/css'>body {background:#EEE; padding:30px; font-size:12px;}</style></head><body><span style='font-weight:bold; font-style: oblique;'>Estimado/a,</span><br><br><span style='font-weight:bold;'>El proyecto <span style='font-weight:bold;'>".$proyectoNombrePrincipal." fue rectificado</span><br><br>Para revisar las rectificaciones, por favor dar clic <a href='https://aplicativos.deporte.gob.ec/proyectosDeportistas/ingreso' target='_blank'>aquí</a></span></body></html></head>"; 
		$mailSegunderos->send();


	} catch (Exception $e) {
		echo "Hubo un error al enviar el mensaje ".$e;
	}



	/*=====  End of Enviar correo desde php mailer  ======*/


	$mensaje=1;
	$jason['mensaje']=$mensaje;
	echo json_encode($jason);