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

 	$numeroRucPatrocinadorArray = json_decode($numeroRucPatrocinador);
 	$nombrePatrocinadorArray = json_decode($nombrePatrocinador);
 	$montoContratoRealizadosArray = json_decode($montoContratoRealizados);
 	$fechaDeEmisionArray = json_decode($fechaDeEmision);
 	$montos__facturas__conjuntosArray = json_decode($montos__facturas__conjuntos);

 	$actividadEconomicaArray = json_decode($actividadEconomica);
 	$validez__comprobanteArray = json_decode($validez__comprobante);
 	$autorizacionSriArray = json_decode($autorizacionSri);

	date_default_timezone_set("America/Guayaquil");

	$fecha_actual = date('Y-m-d');
	$hora_actual= date('H:i:s');
			
	$querySegundos="UPDATE pro_proyecto SET financiero='A',idUsuarioFinanciero2=NULL WHERE codigo='$codigoProyectoRealizados';";
	$resultadoSegundos = $conexionEstablecida->query($querySegundos);	


 	for($i=0;$i<count($numeroRucPatrocinadorArray);$i++){

		$archivotmp = $_FILES["conttratoRealizados$i"]['tmp_name'];
		$destino="../../documentos/contratoCargado";

		$contratos=$idUsuarioContratos."-".$codigoProyectoRealizados."-".$i;

		rename($archivotmp,"$destino/$contratos.pdf");


		$query="INSERT INTO `ezonshar2`.`pro_comprobante` (`idComprobantes`, `ruc__patrocinador__conjunto`, `nombrePatrocinador`, `montoContratoRealizados`, `fechaDeEmision`, `comprobantes__conjuntos__documentos`, `montos__facturas__conjuntos`, `codigo`, `fecha`, `hora`, `autorizacionSri__conjuntos`, `actividadEconomica__conjuntos`, `validez__comprobante__fisico__conjuntos`) VALUES (NULL, '$numeroRucPatrocinadorArray[$i]', '$nombrePatrocinadorArray[$i]', '$montoContratoRealizadosArray[$i]', '$fechaDeEmisionArray[$i]', '$contratos', '$montos__facturas__conjuntosArray[$i]', '$codigoProyectoRealizados','$fecha_actual','$hora_actual','$autorizacionSriArray[$i]','$actividadEconomicaArray[$i]','$validez__comprobanteArray[$i]');";
		$resultado= $conexionEstablecida->exec($query);


		$query="UPDATE pro_documentos SET contrato='$contratos',montoProyecto='$montoContratoRealizadosArray[$i]',numeroRucPatrocinador='$numeroRucPatrocinadorArray[$i]',nombrePatrocinador='$nombrePatrocinadorArray[$i]',montoDelProyecto='$montoDelProyecto',fechaDeEmision='$fechaDeEmisionArray[$i]' WHERE codigo='$codigoProyectoRealizados';";
		$resultado= $conexionEstablecida->exec($query);

 	}


	$mensaje=1;
	$jason['mensaje']=$mensaje;
	echo json_encode($jason);


	if($siRespuestas=="si"){

		$query10="SELECT a.email,c.descripcionFisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_fisicamenteestructura AS c ON c.id_FisicamenteEstructura=a.fisicamenteEstructura WHERE a.fisicamenteEstructura=15 AND b.id_rol=2 ORDER BY a.id_usuario ASC LIMIT 1;";


	}else if ($tipoDeportistas=="altoRendimiento" || $tipoDeportistas=="militarDeportiva" || $tipoDeportistas=="profesional" || $tipoDeportistas=="alto") {
		
	 	$query10="SELECT a.email,c.descripcionFisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_fisicamenteestructura AS c ON c.id_FisicamenteEstructura=a.fisicamenteEstructura WHERE a.fisicamenteEstructura=12 AND b.id_rol=2 ORDER BY a.id_usuario ASC LIMIT 1;";

	}else if($tipoDeportistas=="alto2" || $tipoDeportistas=="altoRendimientoDiscapacidad"){

		$query10="SELECT a.email,c.descripcionFisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_fisicamenteestructura AS c ON c.id_FisicamenteEstructura=a.fisicamenteEstructura WHERE a.fisicamenteEstructura=14 AND b.id_rol=2 ORDER BY a.id_usuario ASC LIMIT 1;";

	}else if($tipoDeportistas=="formativo" || $tipoDeportistas=="estudiantil" || $tipoDeportistas=="noFederado" || $tipoDeportistas=="recreativo"){

		$query10="SELECT a.email,c.descripcionFisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_fisicamenteestructura AS c ON c.id_FisicamenteEstructura=a.fisicamenteEstructura WHERE a.fisicamenteEstructura=13 AND b.id_rol=2 ORDER BY a.id_usuario ASC LIMIT 1;";

	}

	$resultado10 = $conexionEstablecida->query($query10);

	while($registro10 = $resultado10->fetch()) {

		$email=$registro10['email'];
		$descripcionFisicamenteEstructura=$registro10['descripcionFisicamenteEstructura'];

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

			$mailSegunderos->addAddress($email); 
			$mailSegunderos->addCC($emailSolicitante);

			// Content
			$mailSegunderos->isHTML(true);                                  // Set email format to HTML
			$mailSegunderos->Subject = 'Ministerio del deporte';
			$mailSegunderos->Body    = "<head><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><title>MINISTERIO DEL DEPORTE</title><style type='text/css'>body {background:#EEE; padding:30px; font-size:12px;}</style></head><body><span style='font-weight:bold; font-style: oblique;'>Estimado/a,</span><br><br>Se informa que ha sido ingresado en la <span style='font-weight:bold;'>".$descripcionFisicamenteEstructura."</span> el proyecto <span style='font-weight:bold;'>".$nombreProyecto."</span> para proceso de certificación<br><br>, por favor dar clic <a href='https://aplicativos.deporte.gob.ec/proyectosDeportistas/ingreso' target='_blank'>aquí</a><br><br><span style='font-weight:bold;'>Saludos cordiales.</span></body></html></head>"; 
			$mailSegunderos->send();


	} catch (Exception $e) {
		echo "Hubo un error al enviar el mensaje ".$e;
	}

	/*=====  End of Enviar correo desde php mailer  ======*/


