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

	$observacionNegativaProyecto=filter_var($observacionNegativaProyecto, FILTER_SANITIZE_MAGIC_QUOTES);
	$observacionNegativaCurriculum=filter_var($observacionNegativaCurriculum, FILTER_SANITIZE_MAGIC_QUOTES);
	$observacionNegativaCertificadoFederacion=filter_var($observacionNegativaCertificadoFederacion, FILTER_SANITIZE_MAGIC_QUOTES);
	$observacionNegativaCertificadoOrganismoSuperior=filter_var($observacionNegativaCertificadoOrganismoSuperior, FILTER_SANITIZE_MAGIC_QUOTES);
	$observacionNegativaSolicitudAvalFederacion=filter_var($observacionNegativaSolicitudAvalFederacion, FILTER_SANITIZE_MAGIC_QUOTES);
	$observacionNegativaAvalFederacion=filter_var($observacionNegativaAvalFederacion, FILTER_SANITIZE_MAGIC_QUOTES);
	$observacionNegativaSolicitudAval=filter_var($observacionNegativaSolicitudAval, FILTER_SANITIZE_MAGIC_QUOTES);
	$observacionNegativaAvalOrganismoSuperior=filter_var($observacionNegativaAvalOrganismoSuperior, FILTER_SANITIZE_MAGIC_QUOTES);
	$observacionRecomendacion=filter_var($observacionRecomendacion, FILTER_SANITIZE_MAGIC_QUOTES);


	$observacionNegativaProyectoInfras=filter_var($observacionNegativaProyectoInfras, FILTER_SANITIZE_MAGIC_QUOTES);
	$observacionNegativaVidaJuridica=filter_var($observacionNegativaVidaJuridica, FILTER_SANITIZE_MAGIC_QUOTES);
	$observacionCertificadoTrayectoria=filter_var($observacionCertificadoTrayectoria, FILTER_SANITIZE_MAGIC_QUOTES);
	$observacionNegativaCertificadoPropiedad=filter_var($observacionNegativaCertificadoPropiedad, FILTER_SANITIZE_MAGIC_QUOTES);
	$observacionNegativaMemoriaArquitectonica=filter_var($observacionNegativaMemoriaArquitectonica, FILTER_SANITIZE_MAGIC_QUOTES);
	$observacionNegativaPresupuestoRubro=filter_var($observacionNegativaPresupuestoRubro, FILTER_SANITIZE_MAGIC_QUOTES);
	$observacionNegativaCronogramaValorado=filter_var($observacionNegativaCronogramaValorado, FILTER_SANITIZE_MAGIC_QUOTES);
	$observacionNegativaRespaldosDigitales=filter_var($observacionNegativaRespaldosDigitales, FILTER_SANITIZE_MAGIC_QUOTES);

 	if ($calificador=="no") {

		$query="UPDATE pro_documentos SET estadoProyectoCarcado='$observacionNegativaProyecto', validaProyecto='$radioProyecto',estadoCurriculumDeportivoSegundo='$observacionNegativaCurriculum',validaCurriculum='$radioCurriculum',estadoCertificadoFederacion='$observacionNegativaCertificadoFederacion',varlidaCertificadoFederacion='$radioCertificado',estadoCertificadoOrganismoSuperior='$observacionNegativaCertificadoOrganismoSuperior',validaCertificadoOrganismoSuperior='$radioCertificadoOrganismoSuperior',estadoSolicitudFederacion='$observacionNegativaSolicitudAvalFederacion',validaEstadoSolicitudFederacion='$radioSolicitudAvalFederacion',estadoAvalFederacion='$observacionNegativaAvalFederacion',validaAvalFederacion='$radioAvalFederacion',estadoSolicitudAval='$observacionNegativaSolicitudAval',validaSolitudAval='$radioSolicitudAval',estadoAvalOrganismoSuperior='$observacionNegativaAvalOrganismoSuperior',validaAvalOrganismoSuperior='$radioOrganismoSuperior',radioVidaJuridica='$radioVidaJuridica',observacionNegativaVidaJuridica='$observacionNegativaVidaJuridica',certificadoTrayectoria='$certificadoTrayectoria',observacionCertificadoTrayectoria='$observacionCertificadoTrayectoria',radioComponentes='$radioComponentes',observacionComponentes='$observacionComponentes' WHERE codigo='$codigoReferenciado';";
		$resultado= $conexionEstablecida->exec($query);


		$query4="INSERT INTO `ezonshar2`.`pro_observacionesdocumentos` (`idDocumentos`, `fecha`, `hora`, `codigo`, `estadoProyectoCarcado`, `validaProyecto`, `estadoCurriculumDeportivoSegundo`, `validaCurriculum`, `estadoCertificadoFederacion`, `varlidaCertificadoFederacion`, `estadoCertificadoOrganismoSuperior`, `validaCertificadoOrganismoSuperior`, `estadoSolicitudFederacion`, `validaEstadoSolicitudFederacion`, `estadoAvalFederacion`, `validaAvalFederacion`, `estadoSolicitudAval`, `validaSolitudAval`, `estadoAvalOrganismoSuperior`, `validaAvalOrganismoSuperior`, `radioInfraestructura`, `observacionNegativaProyectoInfras`, `radioVidaJuridica`, `observacionNegativaVidaJuridica`, `certificadoTrayectoria`, `observacionCertificadoTrayectoria`, `certificadoPropiedadC`, `observacionNegativaCertificadoPropiedad`, `memoriaArquitectonica`, `observacionNegativaMemoriaArquitectonica`, `presupuestoRubroChecked`, `observacionNegativaPresupuestoRubro`, `cronogramasValoradosChecked`, `observacionNegativaCronogramaValorado`, `respaldosDigitaChecked`, `observacionNegativaRespaldosDigitales`) VALUES (NULL, '$fecha_actual', '$hora_actual', '$codigoReferenciado', '$observacionNegativaProyecto', '$radioProyecto', '$observacionNegativaCurriculum', '$radioCurriculum', '$observacionNegativaCertificadoFederacion', '$radioCertificado', '$observacionNegativaCertificadoOrganismoSuperior', '$radioCertificadoOrganismoSuperior', '$observacionNegativaSolicitudAvalFederacion', '$radioSolicitudAvalFederacion', '$observacionNegativaAvalFederacion', '$radioAvalFederacion', '$observacionNegativaSolicitudAval', '$radioSolicitudAval', '$observacionNegativaAvalOrganismoSuperior', '$radioOrganismoSuperior','$radioInfraestructura','$observacionNegativaProyectoInfras','$radioVidaJuridica','$observacionNegativaVidaJuridica','$certificadoTrayectoria','$observacionCertificadoTrayectoria','$certificadoPropiedadC','$observacionNegativaCertificadoPropiedad','$memoriaArquitectonica','$observacionNegativaMemoriaArquitectonica','$presupuestoRubroChecked','$observacionNegativaPresupuestoRubro','$cronogramasValoradosChecked','$observacionNegativaCronogramaValorado','$respaldosDigitaChecked','$observacionNegativaRespaldosDigitales');";
		$resultado4= $conexionEstablecida->exec($query4);

		$query2="UPDATE pro_proyecto SET calificarDevuelto='no',rectificacion=NULL WHERE codigo='$codigoReferenciado';";
		$resultado2= $conexionEstablecida->exec($query2);


		if ($modificacion=="si") {
			
			$query="UPDATE pro_proyecto SET califica2='A'  WHERE codigo='$codigoReferenciado';";
			$resultado= $conexionEstablecida->exec($query);


		}

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

			$mailSegunderos->addAddress($emailEnviado); 

			// Content
			$mailSegunderos->isHTML(true);                                  // Set email format to HTML
			$mailSegunderos->Subject = 'Ministerio del deporte';
			$mailSegunderos->Body    = "<head><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><title>MINISTERIO DEL DEPORTE</title><style type='text/css'>body {background:#EEE; padding:30px; font-size:12px;}</style></head><body><span style='font-weight:bold; font-style: oblique;'>Estimado/a,</span><br><br><span style='font-weight:bold;'>El proyecto <span style='font-weight:bold;'>".$nombreProyecto." fue puesto en observación</span><br><br>Para revisar las observaciones, por favor dar clic <a href='https://aplicativos.deporte.gob.ec/proyectosDeportistas/ingreso' target='_blank'>aquí</a> para ser dirigido al aplicativo ACERPRO y poder corregir dichas observaciones<br><br><span style='font-weight:bold;'>Saludos cordiales.</span></body></html></head>"; 
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


		$query="UPDATE pro_documentos SET estadoProyectoCarcado='$observacionNegativaProyecto', validaProyecto='$radioProyecto',estadoCurriculumDeportivoSegundo='$observacionNegativaCurriculum',validaCurriculum='$radioCurriculum',estadoCertificadoFederacion='$observacionNegativaCertificadoFederacion',varlidaCertificadoFederacion='$radioCertificado',estadoCertificadoOrganismoSuperior='$observacionNegativaCertificadoOrganismoSuperior',validaCertificadoOrganismoSuperior='$radioCertificadoOrganismoSuperior',estadoSolicitudFederacion='$observacionNegativaSolicitudAvalFederacion',validaEstadoSolicitudFederacion='$radioSolicitudAvalFederacion',estadoAvalFederacion='$observacionNegativaAvalFederacion',validaAvalFederacion='$radioAvalFederacion',estadoSolicitudAval='$observacionNegativaSolicitudAval',validaSolitudAval='$radioSolicitudAval',estadoAvalOrganismoSuperior='$observacionNegativaAvalOrganismoSuperior',validaAvalOrganismoSuperior='$radioOrganismoSuperior' WHERE codigo='$codigoReferenciado';";
		$resultado= $conexionEstablecida->exec($query);

 		
		$query="UPDATE pro_proyecto SET califica='C',calificarDevuelto='si',rectificacion=NULL,observacionRecomendacion='$observacionRecomendacion',recomendacion='D'  WHERE codigo='$codigoReferenciado';";
		$resultado= $conexionEstablecida->exec($query);


		if ($modificacion=="si") {
			
			$query="UPDATE pro_proyecto SET califica2='A'  WHERE codigo='$codigoReferenciado';";
			$resultado= $conexionEstablecida->exec($query);


		}
			
		$query10="INSERT INTO `ezonshar2`.`pro_observacionrecomendacionsatisfaccion` (`idObservacionesRecomendacion`, `observacion`, `codigo`, `fecha`, `hora`, `tipo`) VALUES (NULL, '$observacionRecomendacion', '$codigoReferenciado', '$fecha_actual', '$hora_actual','D');";
		$resultado10= $conexionEstablecida->exec($query10);


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

			$mailSegunderos->addAddress($emailDirector); 

			// Content
			$mailSegunderos->isHTML(true);                                  // Set email format to HTML
			$mailSegunderos->Subject = 'Ministerio del deporte';
			$mailSegunderos->Body    = "<head><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><title>MINISTERIO DEL DEPORTE</title><style type='text/css'>body {background:#EEE; padding:30px; font-size:12px;}</style></head><body><span style='font-weight:bold; font-style: oblique;'>Estimado/a,</span><br><span style='font-weight:bold;'>El proyecto <span style='font-weight:bold;'>".$nombreProyecto." fue recomendado.</span><br><br>Puede dar clic <a href='https://aplicativos.deporte.gob.ec/proyectosDeportistas/ingreso' target='_blank'>aquí</a> para ser dirigido al aplicativo ACERPRO y poder revisar el proyecto en la bandeja de recomendados.<br><br><span style='font-weight:bold;'>Saludos cordiales.</span></body></html></head>"; 
			$mailSegunderos->send();


		} catch (Exception $e) {
			echo "Hubo un error al enviar el mensaje ".$e;
		}


		/*=====  End of Enviar correo desde php mailer  ======*/


 	}


	$mensaje=1;
	$jason['mensaje']=$mensaje;
	echo json_encode($jason);