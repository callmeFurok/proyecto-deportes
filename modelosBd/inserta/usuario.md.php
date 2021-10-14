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
		 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
		 $max = strlen($pattern)-1;
		 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
		 return $key;
	}
	 
	/*=====  End of Funciones estructuradas  ======*/

	$codigo=generarCodigo(6);

	$emailSegundoSasos=$email;

 	if ($entidad=="organismo") {


 		$query10="SELECT idFederacion AS idFederacionComparador FROM pro_federacion WHERE rucOrganismo='$rucOrganismo';";

		$resultado10 = $conexionEstablecida->query($query10);

		while($registro10 = $resultado10->fetch()) {

			$idFederacionComparador=$registro10['idFederacionComparador'];

		}		

		if (!empty($idFederacionComparador)) {


			$mensaje=2;
			$jason['mensaje']=$mensaje;
			echo json_encode($jason);

		}else{


	 		$query="INSERT INTO `ezonshar2`.`pro_federacion` (`idFederacion`, `tipoOrganismo`, `rucOrganismo`, `nombreOrganismo`, `provinciaFederacion`, `cantonFederacion`, `parroquiaFederacion`, `telefono`, `direccion`, `email`, `curriculumDeportivo`, `fecha`, `hora`, `usuario`, `tipoDos`) VALUES (NULL, 'N/A', '$rucOrganismo', '$nombreOrganismo', '$provinciaFederacion', '$cantonFederacion', '$parroquiaFederacion', '$telefono', '$direccion', '$email', NULL,'$fecha_actual','$hora_actual','$rucOrganismo','$opcionDetallada');";
			$resultado= $conexionEstablecida->exec($query);


			$query2="SELECT MAX(idFederacion) AS idFederacion FROM pro_federacion;";						
			$resultado2 = $conexionEstablecida->query($query2);

			while($registro = $resultado2->fetch()) {
				$idFederacion=$registro['idFederacion'];					
			}

			/*===============================================
			=            Datos calles federación            =
			===============================================*/
			

			$queryDireccionesFederaciones="INSERT INTO `ezonshar2`.`pro_direccionesfederacion` (`idDireccionOrganismo`, `callePrincipal`, `calleSecundaria`, `numeracion`, `referencia`, `idFederacion`) VALUES (NULL, :callePrincipal, :calleSecundaria, :numeracion, :referencia, :idFederacion);";
			$sqlDireccionesFederaciones = $conexionEstablecida->prepare($queryDireccionesFederaciones);

		 	$sqlDireccionesFederaciones->bindParam(':callePrincipal',$callePrincipal,PDO::PARAM_STR);
		 	$sqlDireccionesFederaciones->bindParam(':calleSecundaria',$calleSecundaria,PDO::PARAM_STR);
		 	$sqlDireccionesFederaciones->bindParam(':numeracion',$numeracion,PDO::PARAM_STR);
		 	$sqlDireccionesFederaciones->bindParam(':referencia',$referencia,PDO::PARAM_STR);
		 	$sqlDireccionesFederaciones->bindParam(':idFederacion',$idFederacion,PDO::PARAM_INT);
		 	$sqlDireccionesFederaciones->execute();	
								
			
			/*=====  End of Datos calles federación  ======*/
			


			$query3="INSERT INTO `ezonshar2`.`pro_representante` (`idRepresentante`, `cedulaRepresentante`, `nombreReperesentante`, `idFederacion`, `provincia`, `canton`, `parroquia`, `callePrincipal`, `numeracion`, `calleSecundaria`, `referencia`, `email`, `convencional`, `celular`) VALUES (NULL, '$representanteLegalCedula', '$representanteLegal', '$idFederacion', '$provinciaFederacionRepresentante', '$cantonFederacionRepresentante', '$parroquiaFederacionRepresentante', '$calleprincipalRepresentante', '$numeracionRepresentante', '$callesecundariaRepresentante', '$referenciaRepresentante', '$emailRepresentante', '$telefonoRepresentante', '$telefono');";
			$resultado3= $conexionEstablecida->exec($query3);


			$query4="INSERT INTO `ezonshar2`.`pro_codigogenerado` (`idCodigoGenerado`, `idUsuario`, `codigo`) VALUES (NULL, '$rucOrganismo', '$codigo');";
			$resultado4= $conexionEstablecida->exec($query4);



			$query5="INSERT INTO `ezonshar2`.`pro_rolesdepor` (`idOrganismosFuncio`, `idUsuario`, `idRol`) VALUES (NULL, '$rucOrganismo', '2');";
			$resultado5= $conexionEstablecida->exec($query5);

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
 		

		$query11="SELECT idAteleta FROM pro_deportistaorganismo WHERE cedulaUsuario='$cedulaUsuario';";

		$resultado11 = $conexionEstablecida->query($query11);

		while($registro11 = $resultado11->fetch()) {

			$idAteleta=$registro11['idAteleta'];

		}	


		if (!empty($idAteleta)) {
		
			$mensaje=2;
			$jason['mensaje']=$mensaje;
			echo json_encode($jason);

		}else{

			if ($fechaFederadoSolicitante=="no") {

				$query="INSERT INTO `ezonshar2`.`pro_deportistaorganismo` (`idAteleta`, `tipoOrganismo`, `cedulaUsuario`, `nombreCompleto`, `fechaNacimiento`, `sexo`, `provincia`, `canton`, `parroquia`, `telefono`, `direccion`, `email`, `certificadoFederacion`, `certificadoOpsub`, `porqueCertificado`, `certificadoOrganismoSuperior`, `solicitudCertificacionRealizada`, `curriculum`, `fecha`, `hora`, `usuario`, `callePrincipalCiudadano`, `numeracionCiudadao`, `calleSecundariaCiudadano`, `referenciaCiudadano`, `telCiudadano`, `tipoDos`, `discapacidad`) VALUES (NULL, 'N/A', '$cedulaUsuario', '$nombreCompleto', '$fechaNacimiento', '$sexo', '$provincia', '$canton', '$parroquia', '$telefono', '$direccion', '$email', NULL, NULL, '$porqueCertificado', NULL, NULL, NULL, '$fecha_actual', '$hora_actual','$cedulaUsuario','$direccion','$numeracionRepresentante','$callesecundariaRepresentante','$referenciaRepresentante','$telefonoRepresentanteUsuario','$opcionDetallada','$checkedsDiscapacidades');";

			}else{

				$query="INSERT INTO `ezonshar2`.`pro_deportistaorganismo` (`idAteleta`, `tipoOrganismo`, `cedulaUsuario`, `nombreCompleto`, `fechaNacimiento`, `sexo`, `provincia`, `canton`, `parroquia`, `telefono`, `direccion`, `email`, `certificadoFederacion`, `certificadoOpsub`, `porqueCertificado`, `certificadoOrganismoSuperior`, `solicitudCertificacionRealizada`, `curriculum`, `fecha`, `hora`, `usuario`, `callePrincipalCiudadano`, `numeracionCiudadao`, `calleSecundariaCiudadano`, `referenciaCiudadano`, `telCiudadano`, `tipoDos`, `fechaFederadoSolicitante`, `organismoNombreVinculado`, `discapacidad`) VALUES (NULL, 'N/A', '$cedulaUsuario', '$nombreCompleto', '$fechaNacimiento', '$sexo', '$provincia', '$canton', '$parroquia', '$telefono', '$direccion', '$email', NULL, NULL, '$porqueCertificado', NULL, NULL, NULL, '$fecha_actual', '$hora_actual','$cedulaUsuario','$direccion','$numeracionRepresentante','$callesecundariaRepresentante','$referenciaRepresentante','$telefonoRepresentanteUsuario','$opcionDetallada','$fechaFederadoSolicitante','$organismoNombreVinculado','$checkedsDiscapacidades');";

			}

			$resultado= $conexionEstablecida->exec($query);

			$query2="SELECT MAX(idAteleta) AS idAteleta FROM pro_deportistaorganismo;";						
			$resultado2 = $conexionEstablecida->query($query2);

			while($registro = $resultado2->fetch()) {
				$idAteleta=$registro['idAteleta'];					
			}

			$query3="INSERT INTO `ezonshar2`.`pro_atletafederacion` (`intFederacionDeportista`, `rucOrganismoDeportista`, `nombreOrganismoDeportista`, `idAteleta`) VALUES (NULL, '$rucOrganismoDeportista', '$nombreOrganismoDeportista', '$idAteleta');";
			$resultado3= $conexionEstablecida->exec($query3);
			

			$query4="INSERT INTO `ezonshar2`.`pro_codigogenerado` (`idCodigoGenerado`, `idUsuario`, `codigo`) VALUES (NULL, '$cedulaUsuario', '$codigo');";
			$resultado4= $conexionEstablecida->exec($query4);

			$query5="INSERT INTO `ezonshar2`.`pro_rolesdepor` (`idOrganismosFuncio`, `idUsuario`, `idRol`) VALUES (NULL, '$cedulaUsuario', '3');";

			$resultado5= $conexionEstablecida->exec($query5);


			/*======================================
			=            Representantes            =
			======================================*/

			
			if ($representanteSenal=="si") {
				
				$queryEstablecidos="INSERT INTO `ezonshar2`.`pro_representante_atletas` (`idRepresentanteAtletas`, `representanteLegalCedulaAtletas`, `representanteLegalAtletas`, `telefonoAtletaRepresentantess`, `telefonoRepresentanteAtletas`, `emailRepresentanteAtletas`, `provinciaFederacionRepresentanteAtletas`, `cantonFederacionRepresentanteAtletas`, `parroquiaFederacionRepresentanteAtletas`, `calleprincipalRepresentanteAtletas`, `callesecundariaRepresentanteAtletas`, `numeracionRepresentanteAtletas`, `referenciaRepresentanteAtletas`, `idAtletas`) VALUES (NULL,'$representanteLegalCedulaAtletas','$representanteLegalAtletas','$telefonoAtletaRepresentantess','$telefonoRepresentanteAtletas','$emailRepresentanteAtletas','$provinciaFederacionRepresentanteAtletas','$cantonFederacionRepresentanteAtletas','$parroquiaFederacionRepresentanteAtletas','$calleprincipalRepresentanteAtletas','$callesecundariaRepresentanteAtletas','$numeracionRepresentanteAtletas','$referenciaRepresentanteAtletas','$idAteleta');";
				$resultadoEstablecidos= $conexionEstablecida->exec($queryEstablecidos);

			}
			
			/*=====  End of Representantes  ======*/
			

			$usuario=$cedulaUsuario;


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





