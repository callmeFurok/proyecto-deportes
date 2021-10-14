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

	/*===================================================
	=            Selección de patrocinadores            =
	===================================================*/

 	$query10="SELECT idPatrocinador FROM pro_patrocinador WHERE cedulaUsuario='$rucOrganismo';";

	$resultado10 = $conexionEstablecida->query($query10);

	while($registro10 = $resultado10->fetch()) {

		$idPatrocinador=$registro10['idPatrocinador'];

	}	
	
	
	/*=====  End of Selección de patrocinadores  ======*/

 	if ($entidad=="organismo") {
		

		if (!empty($idPatrocinador)) {


			$mensaje=2;
			$jason['mensaje']=$mensaje;
			echo json_encode($jason);

		}else{

			$query="INSERT INTO `ezonshar2`.`pro_patrocinador` (`idPatrocinador`, `entidad`, `cedulaUsuario`, `nombreCompleto`, `fechaNacimiento`, `sexo`, `provincia`, `canton`, `parroquia`, `celular`, `telefonoConvenciona`, `email`, `direccion`, `usuario`) VALUES (NULL, :entidad, :rucOrganismo, :nombreOrganismo, NULL, NULL, NULL, NULL, NULL, :telefono2, :telefonoRepresentanteUsuario, :email, :direccion, :usuario);";
			$sql= $conexionEstablecida->prepare($query);

		 	$sql->bindParam(':entidad',$entidad,PDO::PARAM_STR);
		 	$sql->bindParam(':rucOrganismo',$rucOrganismo,PDO::PARAM_STR);
		 	$sql->bindParam(':nombreOrganismo',$nombreOrganismo,PDO::PARAM_STR);
		 	$sql->bindParam(':telefono2',$telefono2,PDO::PARAM_STR);
		 	$sql->bindParam(':telefonoRepresentanteUsuario',$telefonoRepresentanteUsuario,PDO::PARAM_INT);
		 	$sql->bindParam(':email',$email,PDO::PARAM_INT);
		 	$sql->bindParam(':direccion',$direccion,PDO::PARAM_INT);
		 	$sql->bindParam(':usuario',$rucOrganismo,PDO::PARAM_INT);
		 	$sql->execute();	
								


			$query2="SELECT MAX(idPatrocinador) AS maximoId FROM pro_patrocinador;";						
			$resultado2 = $conexionEstablecida->query($query2);

			while($registro = $resultado2->fetch()) {
				$maximoId=$registro['maximoId'];					
			}


			$query3="INSERT INTO `ezonshar2`.`pro_rolesdepor` (`idOrganismosFuncio`, `idUsuario`, `idRol`) VALUES (NULL, '$rucOrganismo', '4');";
			$resultado3= $conexionEstablecida->exec($query3);

			$query4="INSERT INTO `ezonshar2`.`pro_codigogenerado` (`idCodigoGenerado`, `idUsuario`, `codigo`) VALUES (NULL, '$rucOrganismo', '$codigo');";
			$resultado4= $conexionEstablecida->exec($query4);

			$emailSegundoSasos=$email;

			$usuario=$rucOrganismo;


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

				$mailSegunderos->addAddress($emailSegundoSasos); 

				// Content
				$mailSegunderos->isHTML(true);                                  // Set email format to HTML
				$mailSegunderos->Subject = 'Ministerio del deporte';
				$mailSegunderos->Body    = "<head><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><title>MINISTERIO DEL DEPORTE</title><style type='text/css'>body {background:#EEE; padding:30px; font-size:12px;}</style></head><body><span style='font-weight:bold; font-style: oblique;'>MINISTERIO DEL DEPORTE,</span><br><br>El código generado para su ingreso al aplicativo de Incentivo Tributario es:<br><br><span style='font-size:12px; font-weight:bold;'>Código:</span>&nbsp;$codigo<br><span style='font-size:12px; font-weight:bold;'>Usuario:</span>$usuario</body></html></head>"; 
				$mailSegunderos->send();


			} catch (Exception $e) {
				    echo "Hubo un error al enviar el mensaje ".$e;
			}


			/*=====  End of Enviar correo desde php mailer  ======*/



			$mensaje=1;
			$jason['mensaje']=$mensaje;
			echo json_encode($jason);

		}
 		

 	}else if($entidad=="ciudadano"){
 		
		if (!empty($idPatrocinador)) {
		
			$mensaje=2;
			$jason['mensaje']=$mensaje;
			echo json_encode($jason);

		}else{

			$query="INSERT INTO `ezonshar2`.`pro_patrocinador` (`idPatrocinador`, `entidad`, `cedulaUsuario`, `nombreCompleto`, `fechaNacimiento`, `sexo`, `provincia`, `canton`, `parroquia`, `celular`, `telefonoConvenciona`, `email`, `direccion`, `usuario`) VALUES (NULL, :entidad, :rucOrganismo, :nombreCompleto, :fechaNacimiento, :sexo, :provincia, :canton, :parroquia, :telefono2, :telefonoRepresentanteUsuario, :email, :direccion2, :usuario);";
			$sql= $conexionEstablecida->prepare($query);

		 	$sql->bindParam(':entidad',$entidad,PDO::PARAM_STR);
		 	$sql->bindParam(':rucOrganismo',$rucOrganismo,PDO::PARAM_STR);
		 	$sql->bindParam(':nombreCompleto',$nombreCompleto,PDO::PARAM_STR);
		 	$sql->bindParam(':fechaNacimiento',$fechaNacimiento,PDO::PARAM_STR);
		 	$sql->bindParam(':sexo',$sexo,PDO::PARAM_STR);
		 	$sql->bindParam(':provincia',$provincia,PDO::PARAM_STR);
		 	$sql->bindParam(':canton',$canton,PDO::PARAM_STR);
		 	$sql->bindParam(':parroquia',$parroquia,PDO::PARAM_STR);
		 	$sql->bindParam(':telefono2',$telefono2,PDO::PARAM_STR);
		 	$sql->bindParam(':telefonoRepresentanteUsuario',$telefonoRepresentanteUsuario,PDO::PARAM_INT);
		 	$sql->bindParam(':email',$email2,PDO::PARAM_INT);
		 	$sql->bindParam(':direccion2',$direccion,PDO::PARAM_INT);
		 	$sql->bindParam(':usuario',$rucOrganismo,PDO::PARAM_INT);
		 	$sql->execute();	
								


			$query2="SELECT MAX(idPatrocinador) AS maximoId FROM pro_patrocinador;";						
			$resultado2 = $conexionEstablecida->query($query2);

			while($registro = $resultado2->fetch()) {
				$maximoId=$registro['maximoId'];					
			}


			$query3="INSERT INTO `ezonshar2`.`pro_rolesdepor` (`idOrganismosFuncio`, `idUsuario`, `idRol`) VALUES (NULL, '$rucOrganismo', '4');";
			$resultado3= $conexionEstablecida->exec($query3);


			$query4="INSERT INTO `ezonshar2`.`pro_codigogenerado` (`idCodigoGenerado`, `idUsuario`, `codigo`) VALUES (NULL, '$rucOrganismo', '$codigo');";
			$resultado4= $conexionEstablecida->exec($query4);


			$usuario=$rucOrganismo;
			$emailSegundoSasos=$email2;

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

				$mailSegunderos->addAddress($emailSegundoSasos); 

				// Content
				$mailSegunderos->isHTML(true);                                  // Set email format to HTML
				$mailSegunderos->Subject = 'Ministerio del deporte';
				$mailSegunderos->Body    = "<head><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><title>MINISTERIO DEL DEPORTE</title><style type='text/css'>body {background:#EEE; padding:30px; font-size:12px;}</style></head><body><span style='font-weight:bold; font-style: oblique;'>MINISTERIO DEL DEPORTE,</span><br><br>El código generado para su ingreso al aplicativo de Incentivo Tributario es:<br><br><span style='font-size:12px; font-weight:bold;'>Código:</span>&nbsp;$codigo<br><span style='font-size:12px; font-weight:bold;'>Usuario:</span>$usuario</body></html></head>"; 
				$mailSegunderos->send();


			} catch (Exception $e) {
				    echo "Hubo un error al enviar el mensaje ".$e;
			}


			/*=====  End of Enviar correo desde php mailer  ======*/




			$mensaje=1;
			$jason['mensaje']=$mensaje;
			echo json_encode($jason);

		}


 	}





