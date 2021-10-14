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
			

	$query="SELECT nombreProyecto,presupuesto FROM pro_proyetosreferencias WHERE codigoProyecto='$codigoProyectoDefinitivos' ORDER BY idProyectoReferencias DESC LIMIT 1;";
	$resultado = $conexionEstablecida->query($query);	

	while($registro2 = $resultado->fetch()) {

		$nombreProyecto=$registro2['nombreProyecto'];
		$presupuesto=$registro2['presupuesto'];

	}

	$query="SELECT infras,tipoTramite FROM pro_infraselects WHERE codigo='$codigoProyectoDefinitivos' AND tipoTramite!='infraTeconlogicos' AND tipoTramite!='infra';";
	$resultado = $conexionEstablecida->query($query);	

	while($registro2 = $resultado->fetch()) {

		$infras=$registro2['infras'];
		$tipoTramiteBase=$registro2['tipoTramite'];

	}



	if ($tipoTramite=="altoRendimiento" || $tipoTramite=="altoRendimientoDiscapacidad" || $tipoTramite=="profesional") {

	 	$query15="SELECT c.id_FisicamenteEstructura,CONCAT_WS(' ',a.nombre,a.apellido) AS nombreCompleto, a.email,c.descripcionFisicamenteEstructura,a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_fisicamenteestructura AS c ON c.id_FisicamenteEstructura=a.fisicamenteEstructura WHERE b.id_rol='7' AND c.id_FisicamenteEstructura='24' ORDER BY a.id_usuario ASC LIMIT 1;";
		$resultado15 = $conexionEstablecida->query($query15);


		while($registro15 = $resultado15->fetch()) {

			$nombreCompleto=$registro15['nombreCompleto'];
			$id_usuario=$registro15['id_usuario'];
			$email=$registro15['email'];

		}

		$tramiteCorresponde="altoRendimiento";

	}else{


	 	$query15="SELECT c.id_FisicamenteEstructura,CONCAT_WS(' ',a.nombre,a.apellido) AS nombreCompleto, a.email,c.descripcionFisicamenteEstructura,a.id_usuario FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_fisicamenteestructura AS c ON c.id_FisicamenteEstructura=a.fisicamenteEstructura WHERE b.id_rol='7' AND c.id_FisicamenteEstructura='24' ORDER BY a.id_usuario ASC LIMIT 1;";
		$resultado15 = $conexionEstablecida->query($query15);


		while($registro15 = $resultado15->fetch()) {

			$nombreCompleto=$registro15['nombreCompleto'];
			$id_usuario=$registro15['id_usuario'];
			$email=$registro15['email'];

		}

		$tramiteCorresponde="actividadFisica";

	}


	$query15Difusiones="SELECT (SELECT a1.montos FROM pro_componentesciudadanosmontos AS a1 WHERE a1.idComponentesCiudadanos=a.idComponentesCiudadanos) AS campos FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS c ON c.idItem=a.idItemComponente INNER JOIN pro_componentes AS b ON b.idComponentes=c.componenteSeleccion WHERE a.codigo='$codigoProyectoDefinitivos' AND c.idItem='86';";
	$resultado15Difusiones = $conexionEstablecida->query($query15Difusiones);

	while($registro15Difusiones = $resultado15Difusiones->fetch()) {

		$campos=$registro15Difusiones['campos'];

	}

	if (!empty($campos)) {
		
		$query="INSERT INTO `ezonshar2`.`pro_proyecto` (`idTramite`, `nombre`, `monto`, `alcanse`, `idUsuario`, `siRespuestas`, `idRol`, `fecha`, `hora`, `codigo`, `certificadoFederaciones`, `rechazoPorque`, `avales`, `rechazoPorqueAval`, `tipoDeportistas`, `diasDisponibles`, `tramiteCorresponde1`, `tramiteCorresponde2`, `tramiteCorresponde3`, `difusion`) VALUES (NULL, '$nombreProyecto', '$presupuesto', '$nombreProyecto', '$cedulaRucDefinitivos', '$siRespuestas', '$idRolDefinitivos', '$fecha_actual', '$hora_actual', '$codigoProyectoDefinitivos', 'no', 'no', 'no', 'no','$tipoTramiteBase','60','$tramiteCorresponde','subsecretario','subsecretario','A');";
		$resultado= $conexionEstablecida->exec($query);

	}else{

		$query="INSERT INTO `ezonshar2`.`pro_proyecto` (`idTramite`, `nombre`, `monto`, `alcanse`, `idUsuario`, `siRespuestas`, `idRol`, `fecha`, `hora`, `codigo`, `certificadoFederaciones`, `rechazoPorque`, `avales`, `rechazoPorqueAval`, `tipoDeportistas`, `diasDisponibles`, `tramiteCorresponde1`, `tramiteCorresponde2`, `tramiteCorresponde3`) VALUES (NULL, '$nombreProyecto', '$presupuesto', '$nombreProyecto', '$cedulaRucDefinitivos', '$siRespuestas', '$idRolDefinitivos', '$fecha_actual', '$hora_actual', '$codigoProyectoDefinitivos', 'no', 'no', 'no', 'no','$tipoTramiteBase','60','$tramiteCorresponde','subsecretario','subsecretario');";
		$resultado= $conexionEstablecida->exec($query);

	}


	$mensaje=1;
	$jason['mensaje']=$mensaje;
	echo json_encode($jason);

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

		$mailSegunderos->addAddress($emailNuevo);  
		$mailSegunderos->AddCC($email);

		// Content
		$mailSegunderos->isHTML(true);                                  // Set email format to HTML
		$mailSegunderos->Subject = 'Ministerio del deporte';
		$mailSegunderos->Body    = "<head><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><title>MINISTERIO DEL DEPORTE</title><style type='text/css'>body {background:#EEE; padding:30px; font-size:12px;}</style></head><body><span style='font-weight:bold; font-style: oblique;'>Estimado/a,</span><br><span style='font-weight:bold;'>El proyecto ".$nombreProyecto." fue enviado satisfactoriamente.<br><br><span style='font-weight:bold;'>Saludos cordiales.</span></body></html></head>"; 
		$mailSegunderos->send();


	} catch (Exception $e) {
		echo "Hubo un error al enviar el mensaje ".$e;
	}

	/*=====  End of Enviar correo desde php mailer  ======*/