<?php

	extract($_POST);


	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

 	extract($_POST);



 	$beneficiariosDirectos__conjuntosArray = json_decode($beneficiariosDirectos__conjuntos);
 	$desdeDirectos__conjuntosArray = json_decode($desdeDirectos__conjuntos);
 	$hastaDirectos__conjuntosArray = json_decode($hastaDirectos__conjuntos);
 	$masculinoDirectos__conjuntosArray = json_decode($masculinoDirectos__conjuntos);
 	$femeninoDirectos__conjuntosArray = json_decode($femeninoDirectos__conjuntos);
 	$mestizoDirectos__conjuntosArray = json_decode($mestizoDirectos__conjuntos);
 	$montubioDirectos__conjuntosArray = json_decode($montubioDirectos__conjuntos);
 	$indigenasDirectos__conjuntosArray = json_decode($indigenasDirectos__conjuntos);
 	$blancoDirectos__conjuntosArray = json_decode($blancoDirectos__conjuntos);
 	$afroDirectos__conjuntosArray = json_decode($afroDirectos__conjuntos);
 	$mulatoDirectos__conjuntosArray = json_decode($mulatoDirectos__conjuntos);
 	$negroDirectos__conjuntosArray = json_decode($negroDirectos__conjuntos);
 	$totalDirectos__conjuntosArray = json_decode($totalDirectos__conjuntos);



 	$contadorDirecto=count($beneficiariosDirectos__conjuntosArray);

 	for($z=0; $z < $contadorDirecto; $z++){

		$query="INSERT INTO `ezonshar2`.`pro_beneficiarios_directos` (`idBeneficiariosDirectos`, `beneficiariosDirectos__conjuntos`, `desdeDirectos__conjuntos`, `hastaDirectos__conjuntos`, `masculinoDirectos__conjuntos`, `femeninoDirectos__conjuntos`, `mestizoDirectos__conjuntos`, `montubioDirectos__conjuntos`, `indigenasDirectos__conjuntos`, `blancoDirectos__conjuntos`, `afroDirectos__conjuntos`, `mulatoDirectos__conjuntos`, `negroDirectos__conjuntos`, `totalDirectos__conjuntos`, `codigo`) VALUES (NULL, :beneficiariosDirectos__conjuntos, :desdeDirectos__conjuntos, :hastaDirectos__conjuntos, :masculinoDirectos__conjuntos, :femeninoDirectos__conjuntos, :mestizoDirectos__conjuntos, :montubioDirectos__conjuntos, :indigenasDirectos__conjuntos, :blancoDirectos__conjuntos, :afroDirectos__conjuntos, :mulatoDirectos__conjuntos, :negroDirectos__conjuntos, :totalDirectos__conjuntos, :codigo);";
		$sql = $conexionEstablecida->prepare($query);


		$sql->bindParam(':beneficiariosDirectos__conjuntos',$beneficiariosDirectos__conjuntosArray[$z],PDO::PARAM_STR);
		$sql->bindParam(':desdeDirectos__conjuntos',$desdeDirectos__conjuntosArray[$z],PDO::PARAM_STR);
		$sql->bindParam(':hastaDirectos__conjuntos',$hastaDirectos__conjuntosArray[$z],PDO::PARAM_STR);
		$sql->bindParam(':masculinoDirectos__conjuntos',$masculinoDirectos__conjuntosArray[$z],PDO::PARAM_STR);
		$sql->bindParam(':femeninoDirectos__conjuntos',$femeninoDirectos__conjuntosArray[$z],PDO::PARAM_STR);
		$sql->bindParam(':mestizoDirectos__conjuntos',$mestizoDirectos__conjuntosArray[$z],PDO::PARAM_STR);
		$sql->bindParam(':montubioDirectos__conjuntos',$montubioDirectos__conjuntosArray[$z],PDO::PARAM_STR);
		$sql->bindParam(':indigenasDirectos__conjuntos',$indigenasDirectos__conjuntosArray[$z],PDO::PARAM_STR);
		$sql->bindParam(':blancoDirectos__conjuntos',$blancoDirectos__conjuntosArray[$z],PDO::PARAM_STR);
		$sql->bindParam(':afroDirectos__conjuntos',$afroDirectos__conjuntosArray[$z],PDO::PARAM_STR);
		$sql->bindParam(':mulatoDirectos__conjuntos',$mulatoDirectos__conjuntosArray[$z],PDO::PARAM_STR);
		$sql->bindParam(':negroDirectos__conjuntos',$negroDirectos__conjuntosArray[$z],PDO::PARAM_STR);
		$sql->bindParam(':totalDirectos__conjuntos',$totalDirectos__conjuntosArray[$z],PDO::PARAM_STR);

		$sql->bindParam(':codigo',$codigoProyecto,PDO::PARAM_STR);

		$sql->execute();	


	 }


 	$beneficiariosDirectosDiscapacidad__conjuntosArray = json_decode($beneficiariosDirectosDiscapacidad__conjuntos);
 	$visualDirectosDiscapacidad__conjuntosArray = json_decode($visualDirectosDiscapacidad__conjuntos);
 	$auditivaDirectosDiscapacidad__conjuntosArray = json_decode($auditivaDirectosDiscapacidad__conjuntos);
 	$multisensoerialDirectosDiscapacidad__conjuntosArray = json_decode($multisensoerialDirectosDiscapacidad__conjuntos);
 	$intelectualDirectosDiscapacidad__conjuntosArray = json_decode($intelectualDirectosDiscapacidad__conjuntos);
 	$fisicaDirectosDiscapacidad__conjuntosArray = json_decode($fisicaDirectosDiscapacidad__conjuntos);
 	$psiquicaDirectosDiscapacidad__conjuntosArray = json_decode($psiquicaDirectosDiscapacidad__conjuntos);
 	$totalDirectosDiscapacidad__conjuntosArray = json_decode($totalDirectosDiscapacidad__conjuntos);


 	$contadorDirectoDiscapacidad=count($beneficiariosDirectosDiscapacidad__conjuntosArray);


 	for($z=0; $z < $contadorDirectoDiscapacidad; $z++){

		$query2="INSERT INTO `ezonshar2`.`pro_beneficiarios_discapacidad` (`idDiscapacidadBeneficiarios`, `beneficiariosDirectosDiscapacidad__conjuntos`, `visualDirectosDiscapacidad__conjuntos`, `auditivaDirectosDiscapacidad__conjuntos`, `multisensoerialDirectosDiscapacidad__conjuntos`, `intelectualDirectosDiscapacidad__conjuntos`, `fisicaDirectosDiscapacidad__conjuntos`, `psiquicaDirectosDiscapacidad__conjuntos`, `totalDirectosDiscapacidad__conjuntos`, `codigo`) VALUES (NULL, :beneficiariosDirectosDiscapacidad__conjuntos, :visualDirectosDiscapacidad__conjuntos, :auditivaDirectosDiscapacidad__conjuntos, :multisensoerialDirectosDiscapacidad__conjuntos, :intelectualDirectosDiscapacidad__conjuntos, :fisicaDirectosDiscapacidad__conjuntos, :psiquicaDirectosDiscapacidad__conjuntos, :totalDirectosDiscapacidad__conjuntos, :codigo);";
		$sql2 = $conexionEstablecida->prepare($query2);


		$sql2->bindParam(':beneficiariosDirectosDiscapacidad__conjuntos',$beneficiariosDirectosDiscapacidad__conjuntosArray[$z],PDO::PARAM_STR);
		$sql2->bindParam(':visualDirectosDiscapacidad__conjuntos',$visualDirectosDiscapacidad__conjuntosArray[$z],PDO::PARAM_STR);
		$sql2->bindParam(':auditivaDirectosDiscapacidad__conjuntos',$auditivaDirectosDiscapacidad__conjuntosArray[$z],PDO::PARAM_STR);
		$sql2->bindParam(':multisensoerialDirectosDiscapacidad__conjuntos',$multisensoerialDirectosDiscapacidad__conjuntosArray[$z],PDO::PARAM_STR);
		$sql2->bindParam(':intelectualDirectosDiscapacidad__conjuntos',$intelectualDirectosDiscapacidad__conjuntosArray[$z],PDO::PARAM_STR);
		$sql2->bindParam(':fisicaDirectosDiscapacidad__conjuntos',$fisicaDirectosDiscapacidad__conjuntosArray[$z],PDO::PARAM_STR);
		$sql2->bindParam(':psiquicaDirectosDiscapacidad__conjuntos',$psiquicaDirectosDiscapacidad__conjuntosArray[$z],PDO::PARAM_STR);
		$sql2->bindParam(':totalDirectosDiscapacidad__conjuntos',$totalDirectosDiscapacidad__conjuntosArray[$z],PDO::PARAM_STR);

		$sql2->bindParam(':codigo',$codigoProyecto,PDO::PARAM_STR);

		$sql2->execute();	


	 }

 	$beneficiariosDirectosIndirectos__conjuntosArray = json_decode($beneficiariosDirectosIndirectos__conjuntos);
	$totalDirectosIndirectos__conjuntosArray = json_decode($totalDirectosIndirectos__conjuntos);
	$justificacionCuantitativaDirectosIndirectos__conjuntosArray = json_decode($justificacionCuantitativaDirectosIndirectos__conjuntos);

	$contadorIndirecto=count($justificacionCuantitativaDirectosIndirectos__conjuntosArray);


 	for($z=0; $z < $contadorIndirecto; $z++){

		$query3="INSERT INTO `ezonshar2`.`pro_beneficiarios_indirectos` (`idIndirectos`, `beneficiariosDirectosIndirectos__conjuntos`, `totalDirectosIndirectos__conjuntos`, `justificacionCuantitativaDirectosIndirectos__conjuntos`, `codigo`) VALUES (NULL, :beneficiariosDirectosIndirectos__conjuntos, :totalDirectosIndirectos__conjuntos, :justificacionCuantitativaDirectosIndirectos__conjuntos, :codigo);";
		$sql3 = $conexionEstablecida->prepare($query3);


		$sql3->bindParam(':beneficiariosDirectosIndirectos__conjuntos',$beneficiariosDirectosIndirectos__conjuntosArray[$z],PDO::PARAM_STR);
		$sql3->bindParam(':totalDirectosIndirectos__conjuntos',$totalDirectosIndirectos__conjuntosArray[$z],PDO::PARAM_STR);
		$sql3->bindParam(':justificacionCuantitativaDirectosIndirectos__conjuntos',$justificacionCuantitativaDirectosIndirectos__conjuntosArray[$z],PDO::PARAM_STR);

		$sql3->bindParam(':codigo',$codigoProyecto,PDO::PARAM_STR);

		$sql3->execute();	


	 }

	$mensaje=1;
	$jason['mensaje']=$mensaje;
	echo json_encode($jason);