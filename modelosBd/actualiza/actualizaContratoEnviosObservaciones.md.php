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
			

 	$numeroRucPatrocinadorArray = json_decode($numeroRucPatrocinador);
 	$nombrePatrocinadorArray = json_decode($nombrePatrocinador);
 	$montoContratoRealizadosArray = json_decode($montoContratoRealizados);
 	$fechaDeEmisionArray = json_decode($fechaDeEmision);
 	$montos__facturas__conjuntosArray = json_decode($montos__facturas__conjuntos);

 	$actividadEconomicaArray = json_decode($actividadEconomica);
 	$validez__comprobanteArray = json_decode($validez__comprobante);
 	$autorizacionSriArray = json_decode($autorizacionSri);

	$query="UPDATE pro_proyecto SET certifica='si' WHERE codigo='$codigoProyectoRealizados';";
	$resultado = $conexionEstablecida->query($query);	



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





