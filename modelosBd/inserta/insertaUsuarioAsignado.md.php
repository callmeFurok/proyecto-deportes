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

 	$data1=array();


	$queryComponentes="SELECT tipoTramite FROM pro_infraselects WHERE codigo='$codigo';";
	$resultadoComponentes = $conexionEstablecida->query($queryComponentes);		

	while($registroComponentes = $resultadoComponentes->fetch()) {

		$infras=$registroComponentes['tipoTramite'];
		array_push($data1, $infras);
			
	}

	for ($i=0; $i < count($data1); $i++) { 

		if ($data1[$i]=="infra") {

			$consulta1="Infraestructura";

			break;

		}else{

			$consulta1=false;

		}
	}


	for ($i=0; $i < count($data1); $i++) { 

		if ($data1[$i]=="infraTeconlogicos") {

			$consulta2="Tecnológico";

			break;

		}else{

			$consulta2=false;

		}
	}

	
	if ($consulta1=="Infraestructura") {
	
		$queryComponenteInfra="UPDATE pro_proyecto SET componentesInfra='A' WHERE idTramite='$idTramite';";
		$resultadoComponenteInfra= $conexionEstablecida->exec($queryComponenteInfra);

	}

	if ($consulta2=="Tecnológico") {
	
		$queryComponenteTecnologicos="UPDATE pro_proyecto SET componentesTecnolo='A' WHERE idTramite='$idTramite';";
		$resultadoComponenteTecnologicos= $conexionEstablecida->exec($queryComponenteTecnologicos);	
	}



	$query="UPDATE pro_proyecto SET idUsuarioRelativo='$idUsuario' WHERE idTramite='$idTramite';";
	$resultado= $conexionEstablecida->exec($query);


 	$query10="SELECT c.idTramite,CONCAT(a.nombre,a.apellido,' ')  AS nombreFuncionario,b.descripcionFisicamenteEstructura,c.nombre,a.email FROM th_usuario AS a INNER JOIN th_fisicamenteestructura AS b ON a.fisicamenteEstructura=b.id_FisicamenteEstructura INNER JOIN pro_proyecto AS c ON a.id_usuario=c.idUsuarioRelativo WHERE id_usuario='$idUsuario' ORDER BY c.idTramite DESC LIMIT 1";

	$resultado10 = $conexionEstablecida->query($query10);

	while($registro10 = $resultado10->fetch()) {

		$nombreFuncionario=$registro10['nombreFuncionario'];
		$nombre=$registro10['nombre'];
		$email=$registro10['email'];


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

		// Content
		$mailSegunderos->isHTML(true);                                  // Set email format to HTML
		$mailSegunderos->Subject = 'Ministerio del deporte';
		$mailSegunderos->Body    = "<head><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><title>MINISTERIO DEL DEPORTE</title><style type='text/css'>body {background:#EEE; padding:30px; font-size:12px;}</style></head><body><span style='font-weight:bold; font-style: oblique;'>Estimado/a ".$nombreFuncionario.",</span><br><br>Se informa que le ha sido reasignado el proyecto <span style='font-weight:bold;'>".$nombre."</span><br><br>Para revisarlo, por favor dar clic <a href='https://aplicativos.deporte.gob.ec/proyectosDeportistas/ingreso' target='_blank'>aquí</a><br><br><span style='font-weight:bold;'>Saludos cordiales.</span></body></html></head>"; 
		$mailSegunderos->send();


	} catch (Exception $e) {
		echo "Hubo un error al enviar el mensaje ".$e;
	}


	/*=====  End of Enviar correo desde php mailer  ======*/



	$mensaje=1;
	$jason['mensaje']=$mensaje;
	echo json_encode($jason);	