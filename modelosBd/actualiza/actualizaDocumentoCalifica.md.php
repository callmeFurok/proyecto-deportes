<?php

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

	extract($_POST);

	date_default_timezone_set("America/Guayaquil");

	$fecha_actual = date('Y-m-d');
	$hora_actual= date('H:i:s');
			
	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

 	$totalSumas=0;

 	/*=======================================
 	=            Acta de reunion            =
 	=======================================*/
 	
 	if ($fisicamenteEstructura=="24") {
 		$queryPreguntas="firmaSubsesAlto2 IS NOT NULL";
 	}else if($fisicamenteEstructura=="26"){
 		$queryPreguntas="firmaSubsesActividad2 IS NOT NULL";
 	}else if($fisicamenteEstructura=="1"){
 		$queryPreguntas="firmaCoordinador2 IS NOT NULL";
 	}else if($fisicamenteEstructura=="3"){
 		$queryPreguntas="firmaPlanificacion2 IS NOT NULL";
 	}else if($fisicamenteEstructura=="2"){
 		$queryPreguntas="firmaJuridico2 IS NOT NULL";
 	}else if($rolFuncionarios=="3"){
 		$queryPreguntas="firmaDelegado2 IS NOT NULL";
 	}else if($rolFuncionarios=="5"){
 		$queryPreguntas="firmaMinistro2 IS NOT NULL";
 	}

 	
 	if ($fisicamenteEstructura=="24") {
 		$queryPreguntasSegundo="firmaSubsesAlto='A'";
 	}else if($fisicamenteEstructura=="26"){
 		$queryPreguntasSegundo="firmaSubsesActividad='A'";
 	}else if($fisicamenteEstructura=="1"){
 		$queryPreguntasSegundo="firmaCoordinador='A'";
 	}else if($fisicamenteEstructura=="3"){
 		$queryPreguntasSegundo="firmaPlanificacion='A'";
 	}else if($fisicamenteEstructura=="2"){
 		$queryPreguntasSegundo="firmaJuridico='A'";
 	}else if($rolFuncionarios=="3"){
 		$queryPreguntasSegundo="firmaDelegado='A'";
 	}else if($rolFuncionarios=="5"){
 		$queryPreguntasSegundo="firmaMinistro='A'";
 	}



 	$query="SELECT idTramite FROM pro_proyecto WHERE codigo='$codigoProyectos' AND $queryPreguntas;";

	$resultado = $conexionEstablecida->query($query);

	while($registro = $resultado->fetch()) {

		$idTramite=$registro['idTramite'];

	}
 	
 	/*=====  End of Acta de reunion  ======*/


	/*====================================
	=            Notificación            =
	====================================*/

	 if($siRespuestas=='si'){

	    $fisicamenteEstructuraCompardoras=1;


	}else if($tipoTramites=='altoRendimiento' || $tipoTramites=='altoRendimientoDiscapacidad' || $tipoTramites=='militarDeportiva' || $tipoTramites=='profesional' || $tipoTramites=='alto' || $tipoTramites=='alto2') {


	    $fisicamenteEstructuraCompardoras=24;

	 }else if($tipoTramites=='formativo' || $tipoTramites=='estudiantil' || $tipoTramites=='noFederado'){

	    $fisicamenteEstructuraCompardoras=26;

	 }



	if($fisicamenteEstructuraCompardoras==$fisicamenteEstructura){

	 	$query2="SELECT idTramite AS idTramiteNotificas FROM pro_proyecto WHERE firmaNotificacion2 IS NOT NULL AND codigo='$codigoProyectos';";

		$resultado2 = $conexionEstablecida->query($query2);

		while($registro2 = $resultado2->fetch()) {

			$idTramiteNotificas=$registro2['idTramiteNotificas'];

		}


	}


	/*=====  End of Notificación  ======*/


	
	if (empty($idTramite)) {
		
		$mensaje=1;
		$jason['mensaje']=$mensaje;
	

	}else if($fisicamenteEstructuraCompardoras==$fisicamenteEstructura && empty($idTramiteNotificas)){

		$mensaje=2;
		$jason['mensaje']=$mensaje;

	}else{

	 	$query3="SELECT firmasReuTotalesReus,firmaNotificacion2,firmasRealziadasReus,resultadoCalificacion FROM pro_proyecto WHERE codigo='$codigoProyectos';";

		$resultado3 = $conexionEstablecida->query($query3);

		while($registro3 = $resultado3->fetch()) {

			$firmasReuTotalesReus=$registro3['firmasReuTotalesReus'];
			$firmaNotificacion2=$registro3['firmaNotificacion2'];
			$firmasRealziadasReus=$registro3['firmasRealziadasReus'];
			$resultadoCalificacion=$registro3['resultadoCalificacion'];

		}

		$totalSumas=intval($firmasRealziadasReus) + 1;



		if ((intval($totalSumas)>=intval($firmasReuTotalesReus))) {

			if ($resultadoCalificacion=="CALIFICADO") {
				
				$query5="UPDATE pro_proyecto SET califica='A',fechaCalifica='$fecha_actual',horaCalifica='$hora_actual',firmasRealziadasReus='$totalSumas',$queryPreguntasSegundo WHERE codigo='$codigoProyectos';";
				$resultado5= $conexionEstablecida->exec($query5);		

			}else{

				$query5="UPDATE pro_proyecto SET califica='I',fechaCalifica='$fecha_actual',horaCalifica='$hora_actual',firmasRealziadasReus='$totalSumas',$queryPreguntasSegundo WHERE codigo='$codigoProyectos';";
				$resultado5= $conexionEstablecida->exec($query5);	

			}


			/*======================================================
			=            Enviar correo desde php mailer            =
			======================================================*/

			$from=$emailFuncionarios;

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

					$mailSegunderos->addAddress($emailPostulante); 

					$mailSegunderos->addBCC($emailAnalista);

					// Content
					$mailSegunderos->isHTML(true);                                  // Set email format to HTML
					$mailSegunderos->Subject = 'Ministerio del deporte';
					$mailSegunderos->Body    = "<head><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><title>MINISTERIO DEL DEPORTE</title><style type='text/css'>body {background:#EEE; padding:30px; font-size:12px;}</style></head><body><span style='font-weight:bold; font-style: oblique;'>Estimado/a,</span><br><br><span style='font-weight:bold;'>El proyecto <span style='font-weight:bold;'>$nombreProyecto fue $resultadoCalificacion</span><br><br>Para revisar las observaciones, por favor dar clic <a href='https://aplicativos.deporte.gob.ec/proyectosDeportistas/ingreso' target='_blank'>aquí</a><br><br><span style='font-weight:bold;'>Saludos cordiales.</span></body></html></head>"; 
					$mailSegunderos->send();


			} catch (Exception $e) {
				echo "Hubo un error al enviar el mensaje ".$e;
			}

			/*======  End of Enviar correo desde php mailer  ======*/

			$mensaje=3;
			$jason['mensaje']=$mensaje;

		}else{

			$query10="UPDATE pro_proyecto SET firmasRealziadasReus='$totalSumas',$queryPreguntasSegundo WHERE codigo='$codigoProyectos';";
			$resultado10= $conexionEstablecida->exec($query10);	

			$mensaje=3;
			$jason['mensaje']=$mensaje;

		}

	}

	echo json_encode($jason);


