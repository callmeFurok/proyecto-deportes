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

	$comentarioNegativo=filter_var($comentarioNegativo, FILTER_SANITIZE_MAGIC_QUOTES);

 	if ($radioCalificasContrato=="no") {

		$query="UPDATE pro_proyecto SET observacionCertificado='$comentarioNegativo',certifica='no',calificaCertificado='no' WHERE codigo='$codigoCertificados';";
		$resultado= $conexionEstablecida->exec($query);


		$query4="INSERT INTO `ezonshar2`.`pro_observacionrecomendacion` (`idObservacionesRecomendacion`, `observacion`, `codigo`, `fecha`, `hora`, `tipo`) VALUES (NULL, '$comentarioNegativo', '$codigoCertificados', '$fecha_actual', '$hora_actual', 'CO');";
		$resultado4= $conexionEstablecida->exec($query4);


		/*======================================================
		=            Enviar correo desde php mailer            =
		======================================================*/

		$from="soporte@deporte.gob.ec";

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

				$mailSegunderos->addAddress($emailEnviado); 

				// Content
				$mailSegunderos->isHTML(true);                                  // Set email format to HTML
				$mailSegunderos->Subject = 'Ministerio del deporte';
				$mailSegunderos->Body    = "<head><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><title>SECRETARÍA DEL DEPORTE</title><style type='text/css'>body {background:#EEE; padding:30px; font-size:12px;}</style></head><body><span style='font-weight:bold; font-style: oblique;'>Estimado/a,</span><br><br><span style='font-weight:bold;'>El proyecto <span style='font-weight:bold;'>".$nombreProyectos." fue puesto en observación</span><br><br>Para revisar las observaciones, por favor dar clic <a href='https://aplicativos.deporte.gob.ec/proyectosDeportistas/ingreso' target='_blank'>aquí</a> para ser dirigido al aplicativo ACERPRO y poder corregir dichas observaciones<br><br><span style='font-weight:bold;'>Saludos cordiales.</span></body></html></head>"; 
				$mailSegunderos->send();


		} catch (Exception $e) {
			echo "Hubo un error al enviar el mensaje ".$e;
		}

		/*=====  End of Enviar correo desde php mailer  ======*/




 	}else{


 		$query2="SELECT PersonaACargo FROM th_usuario WHERE id_usuario='$idUsuarioRelativo';";

		$resultado2 = $conexionEstablecida->query($query2);

		while($registro2 = $resultado2->fetch()) {

			$idDirector=$registro2['PersonaACargo'];

		}

		 $query3="SELECT CONCAT_WS(' ',nombre,apellido) AS nombreCompleto, email AS emailDirector FROM th_usuario WHERE id_usuario='$idDirector';";

		$resultado3 = $conexionEstablecida->query($query3);

		while($registro3 = $resultado3->fetch()) {

			$emailDirector=$registro3['emailDirector'];
			$nombreCompleto=$registro3['nombreCompleto'];

		}

 		
		$query="UPDATE pro_proyecto SET certifica='C',calificaCertificado='si',fechaCalifica='$fecha_actual',horaCalifica='$hora_actual',certificaEnvio=NULL WHERE codigo='$codigoCertificados';";
		$resultado= $conexionEstablecida->exec($query);


		/*======================================================
		=            Enviar correo desde php mailer            =
		======================================================*/

		$from="soporte@deporte.gob.ec";

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

			$mailSegunderos->addAddress($emailDirector); 

			// Content
			$mailSegunderos->isHTML(true);                                  // Set email format to HTML
			$mailSegunderos->Subject = 'Ministerio del deporte';
			$mailSegunderos->Body    = "<head><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><title>MINISTERIO DEL DEPORTE</title><style type='text/css'>body {background:#EEE; padding:30px; font-size:12px;}</style></head><body><span style='font-weight:bold; font-style: oblique;'>Estimado/a,</span><br><span style='font-weight:bold;'>El proyecto <span style='font-weight:bold;'>".$nombreProyectos." fue recomendado para certificación.</span><br><br>Puede dar clic <a href='https://aplicativos.deporte.gob.ec/proyectosDeportistas/ingreso' target='_blank'>aquí</a> para ser dirigido al aplicativo ACERPRO y poder revisar el proyecto en la bandeja de recomendados.<br><br><span style='font-weight:bold;'>Saludos cordiales.</span></body></html></head>"; 
			$mailSegunderos->send();


		} catch (Exception $e) {
			echo "Hubo un error al enviar el mensaje ".$e;
		}


		/*=====  End of Enviar correo desde php mailer  ======*/

 	}


	$mensaje=1;
	$jason['mensaje']=$mensaje;
	echo json_encode($jason);