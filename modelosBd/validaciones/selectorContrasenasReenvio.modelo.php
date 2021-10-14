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

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();	


	$query="SELECT a.usuario AS usuarioFederacion,a.email AS emailFederacion FROM pro_federacion AS a WHERE a.usuario='$usuarioIngresados';";
	$resultado = $conexionEstablecida->query($query);


	while($registro = $resultado->fetch()) {
		$usuario=$registro['usuarioFederacion'];	
		$email=$registro['emailFederacion'];					
	}


	$query2="SELECT a.usuario AS usuarioAtleta,a.email AS emailAtleta FROM pro_deportistaorganismo AS a WHERE a.usuario='$usuarioIngresados';";
	$resultado2 = $conexionEstablecida->query($query2);

	while($registro2 = $resultado2->fetch()) {
		$usuario=$registro2['usuarioAtleta'];	
		$email=$registro2['emailAtleta'];					
	}

	$query25="SELECT usuario AS usuarioPatrocinador,email AS emailPatrocinador FROM pro_patrocinador WHERE usuario='$usuarioIngresados';";
	$resultado25 = $conexionEstablecida->query($query25);

	while($registro25 = $resultado25->fetch()) {
		$usuario=$registro25['usuarioPatrocinador'];	
		$email=$registro25['emailPatrocinador'];					
	}


	if (empty($usuario)) {
		
		$mensaje=1;
		$jason['mensaje']=$mensaje;
		echo json_encode($jason);	

	}else{

	
	 	/*===============================================
		=            Funciones estructuradas            =
		===============================================*/
		
		function generarCodigo($longitud) {
			 $key = '';
			 $pattern = 'bc1qfwmc6q566rtkryylmpnwhzrv4jpw7lqmj5jydw';
			 $max = strlen($pattern)-1;
			 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
			 return $key;
		}
		 
		/*=====  End of Funciones estructuradas  ======*/

		$codigo=generarCodigo(6);
	

		$query4="INSERT INTO `ezonshar2`.`pro_codigogenerado` (`idCodigoGenerado`, `idUsuario`, `codigo`) VALUES (NULL, '$usuario', '$codigo');";
		$resultado4= $conexionEstablecida->exec($query4);




			/*======================================================
			=            Enviar correo desde php mailer e           =
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
				$mailSegunderos->Body    = "<head><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><title>MINISTERIO DEL DEPORTE</title><style type='text/css'>body {background:#EEE; padding:30px; font-size:12px;}</style></head><body><span style='font-weight:bold; font-style: oblique;'>MINISTERIO DEL DEPORTE,</span><br><br>El código generado para su ingreso al aplicativo de Incentivo Tributario es:<br><br><span style='font-size:12px; font-weight:bold;'>Código:</span>&nbsp;$codigo</body></html></head>"; 
				$mailSegunderos->send();


			} catch (Exception $e) {
				    echo "Hubo un error al enviar el mensaje ".$e;
			}


			/*=====  End of Enviar correo desde php mailer  ======*/

		$mensaje=2;
		$jason['mensaje']=$mensaje;
		$jason['email']=$email;
		echo json_encode($jason);

	}