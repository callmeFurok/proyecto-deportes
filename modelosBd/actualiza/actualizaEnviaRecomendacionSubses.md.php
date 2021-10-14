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


	/*===============================================
	=            Activar actualizaciones            =
	===============================================*/


		date_default_timezone_set("America/Guayaquil");

		$fecha_actual = date('Y-m-d');
		$hora_actual= date('H:i:s');

		$query="SELECT email AS emailSubses,CONCAT_WS(' ',nombre,apellido) AS nombreCompletoSubses FROM th_usuario WHERE id_usuario='$personaCargo';";
		$resultado = $conexionEstablecida->query($query);


		while($registro = $resultado->fetch()) {

			$emailSubses=$registro['emailSubses'];
			$nombreCompletoSubses=$registro['nombreCompletoSubses'];

		}

		$observacionRecomendacion=filter_var($observacionRecomendacion, FILTER_SANITIZE_MAGIC_QUOTES);

		if($seguimientosTecnicos=="A"){

			$query3="UPDATE pro_proyecto SET seguimientosTecnicos='S' WHERE codigo='$codigoRecomendacion';";

			$resultado3= $conexionEstablecida->exec($query3);

		}else if (!empty($fechaCalifica) && $fechaCalifica!=null && $fechaCalifica!="null") {
			

			$query3="UPDATE pro_proyecto SET certificaEnvio=NULL,certifica='S',recomendacion2='A',observacionCertificado='$observacionRecomendacion' WHERE codigo='$codigoRecomendacion';";

			$resultado3= $conexionEstablecida->exec($query3);

		}else{


			$query="UPDATE pro_proyecto SET calificarDevuelto='si',rectificacion=NULL,califica='S',obserbaRecomiendaDir='$observacionRecomendacion',recomendacion='S' WHERE codigo='$codigoRecomendacion';";

			$resultado= $conexionEstablecida->exec($query);

			$query2="INSERT INTO `ezonshar2`.`pro_observacionrecomendacionsatisfaccion` (`idObservacionesRecomendacion`, `observacion`, `codigo`, `fecha`, `hora`, `tipo`) VALUES (NULL, '$observacionRecomendacion', '$codigoRecomendacion', '$fecha_actual', '$hora_actual','S');";
			$resultado2= $conexionEstablecida->exec($query2);

			if ($referenciaGeneradas=="D") {
				$referencias="DIRECTOR";
			}else{
				$referencias="SUBSECRETARIO";
			}

			$query="UPDATE pro_proyecto SET calificarDevuelto='si',rectificacion=NULL,califica='O',obserbaRecomiendaDir='$observacionRecomendacion',recomendacion='O' WHERE codigo='$codigoRecomendacion';";

			$resultado= $conexionEstablecida->exec($query);

			$query2="INSERT INTO `ezonshar2`.`pro_observacionrecomendacionsatisfaccion` (`idObservacionesRecomendacion`, `observacion`, `codigo`, `fecha`, `hora`, `tipo`) VALUES (NULL, '$observacionRecomendacion', '$codigoRecomendacion', '$fecha_actual', '$hora_actual','O');";
			$resultado2= $conexionEstablecida->exec($query2);


		   $tipo = $_FILES['fileInformesTecnicos']['type']; 
		   $archivotmp = $_FILES['fileInformesTecnicos']['tmp_name'];

		   $destino="../../documentos/informesTecnicos/";

		   rename($archivotmp,"$destino/$codigoRecomendacion.pdf");



		}


		/*======================================================
		=            Enviar correo desde php mailer            =
		======================================================*/

		$from=$emailFuncionariosRelativos;

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

			$mailSegunderos->addAddress($emailSubses); 

			$mailSegunderos->addAddress($emailAnalista);
			// Content
			$mailSegunderos->isHTML(true);                                  // Set email format to HTML
			$mailSegunderos->Subject = 'Ministerio del deporte';
			$mailSegunderos->Body    = "<head><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><title>MINISTERIO DEL DEPORTE</title><style type='text/css'>body {background:#EEE; padding:30px; font-size:12px;}</style></head><body><span style='font-weight:bold; font-style: oblique;'>Estimado/a,</span><br><br><span style='font-weight:bold;'>El proyecto <span style='font-weight:bold;'>$proyecto fue recomendado por el $referencias $nombresApellidosFuncionarios</span><br><br>Para revisar las observaciones, por favor dar clic <a href='https://aplicativos.deporte.gob.ec/proyectosDeportistas/ingreso' target='_blank'>aquí</a><br><br><span style='font-weight:bold;'>Saludos cordiales.</span></body></html></head>"; 
			$mailSegunderos->send();


		} catch (Exception $e) {
			echo "Hubo un error al enviar el mensaje ".$e;
		}


		/*======  End of Enviar correo desde php mailer  ======*/


	/*=====  End of Activar actualizaciones  ======*/


	$mensaje=1;
	$jason['mensaje']=$mensaje;
	echo json_encode($jason);


 ?>


