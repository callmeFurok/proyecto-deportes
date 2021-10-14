<?php

	extract($_POST);


	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

 	extract($_POST);

 	$data1=array();

 	$arrayComponentesConcatenados = json_decode($arrayComponentesConcatenados);

 	$arraySumadoresMontos = json_decode($arraySumadoresMontos);

 	for ($l=0; $l < count($arraySumadoresMontos); $l++) { 

 		if (!empty($arraySumadoresMontos[$l])) {

 			array_push($data1, $arraySumadoresMontos[$l]);

 		}

 	}

 	$contadorCamposTotales=count($arrayComponentesConcatenados);

 	
 	$identificador2="h";

	$query2="INSERT INTO `ezonshar2`.`pro_componentesciudadanos` (`idComponentesCiudadanos`, `campos`, `codigo`, `idItemComponente`, `identificador`) VALUES (NULL, :arrayCamposTotales, :codigo, :itemsEscogidos, :identificador2);";
	$sql2 = $conexionEstablecida->prepare($query2);

	$sql2->bindParam(':arrayCamposTotales',$stringHeadTablas,PDO::PARAM_STR);
	$sql2->bindParam(':codigo',$codigo,PDO::PARAM_STR);
	$sql2->bindParam(':itemsEscogidos',$itemsEscogidos,PDO::PARAM_STR);
	$sql2->bindParam(':identificador2',$identificador2,PDO::PARAM_STR);

	$sql2->execute();	

	$query5Titulados="SELECT MAX(idComponentesCiudadanos) AS maximoCompos FROM pro_componentesciudadanos;";
	$resultado5Titulados = $conexionEstablecida->query($query5Titulados);

	while($registro5Titulados = $resultado5Titulados->fetch()) {
			$maximoComposSecuencial=$registro5Titulados['maximoCompos'];					
	}


	$query10Titulados="INSERT INTO `ezonshar2`.`pro_componentesciudadanosmontos` (`idMontosFechas`, `montos`, `idComponentesCiudadanos`) VALUES (NULL, '$data1[0]',$maximoComposSecuencial);";
	$resultado10Titulados= $conexionEstablecida->exec($query10Titulados);

 	$maximoCompos=0;

 	for ($i=0; $i < $contadorCamposTotales; $i++) { 

 		$identificador="b";

	 	$query="INSERT INTO `ezonshar2`.`pro_componentesciudadanos` (`idComponentesCiudadanos`, `campos`, `codigo`, `idItemComponente`, `identificador`, `etiquetas`) VALUES (NULL, :arrayCamposTotales, :codigo, :itemsEscogidos, :identificador, :etiquetas);";
		$sql = $conexionEstablecida->prepare($query);

		$sql->bindParam(':arrayCamposTotales',$arrayComponentesConcatenados[$i],PDO::PARAM_STR);
		$sql->bindParam(':codigo',$codigo,PDO::PARAM_STR);
		$sql->bindParam(':itemsEscogidos',$itemsEscogidos,PDO::PARAM_STR);
		$sql->bindParam(':identificador',$identificador,PDO::PARAM_STR);
		$sql->bindParam(':etiquetas',$etiquetas,PDO::PARAM_STR);

		$sql->execute();	


		$query5="SELECT MAX(idComponentesCiudadanos) AS maximoCompos FROM pro_componentesciudadanos;";
		$resultado5 = $conexionEstablecida->query($query5);

		while($registro5 = $resultado5->fetch()) {
			$maximoCompos=$registro5['maximoCompos'];					
		}


		$query10="INSERT INTO `ezonshar2`.`pro_componentesciudadanosmontos` (`idMontosFechas`, `montos`, `idComponentesCiudadanos`) VALUES (NULL, '$data1[$i]',$maximoCompos);";
		$resultado10= $conexionEstablecida->exec($query10);


 	}



	$mensaje=1;
	$jason['mensaje']=$mensaje;
	echo json_encode($jason);