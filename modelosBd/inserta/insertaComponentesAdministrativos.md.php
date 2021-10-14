<?php

	extract($_POST);


	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

 	extract($_POST);

 	$query="INSERT INTO `ezonshar2`.`pro_itemscomponentes` (`idItem`, `itemNombres`, `componenteSeleccion`) VALUES (NULL, :itemNombres, :componenteSeleccion);";
	$sql = $conexionEstablecida->prepare($query);

	$sql->bindParam(':itemNombres',$itemNombres,PDO::PARAM_STR);
	$sql->bindParam(':componenteSeleccion',$componenteSeleccion,PDO::PARAM_STR);

	$sql->execute();	



 	$argumentosNombres = json_decode($argumentosNombres);
 	$tipoArgumento = json_decode($tipoArgumento);

 	$contadorArgumentos=count($argumentosNombres);


 	$nombresDefinidos = json_decode($nombresDefinidos);
 	$checkedsDesgloses = json_decode($checkedsDesgloses);

 	$contadorDesgloses=count($checkedsDesgloses);


	$queryPrimero="SELECT MAX(idItem) AS idItem FROM pro_itemscomponentes;";

	$resultadoPrimero = $conexionEstablecida->query($queryPrimero);

	while($registro = $resultadoPrimero->fetch()) {

		$idItem=$registro['idItem'];

	}


 	for ($i=0; $i < $contadorArgumentos; $i++) { 

	 	$query2="INSERT INTO `ezonshar2`.`pro_itemsargumentos` (`idArgumentos`, `argumentosNombres`, `tipoArgumento`, `idItem`) VALUES (NULL, :argumentosNombres, :tipoArgumento, :idItem);";
		$sql2 = $conexionEstablecida->prepare($query2);

		$sql2->bindParam(':argumentosNombres',$argumentosNombres[$i],PDO::PARAM_STR);
		$sql2->bindParam(':tipoArgumento',$tipoArgumento[$i],PDO::PARAM_STR);
		$sql2->bindParam(':idItem',$idItem,PDO::PARAM_STR);

		$sql2->execute();	

		if ($tipoArgumento[$i]=="valorDefinido") {
			
			$queryPrimero="SELECT MAX(idArgumentos) AS idArgumentos FROM pro_itemsArgumentos;";

			$resultadoPrimero = $conexionEstablecida->query($queryPrimero);

			while($registro = $resultadoPrimero->fetch()) {

				$idArgumentos=$registro['idArgumentos'];

			}

		 	for ($z=0; $z < $contadorDesgloses; $z++) { 

			 	$query3="INSERT INTO `ezonshar2`.`pro_itemsargumentosderfinidos` (`idArgumentosDefinidos`, `nombresDefinidos`, `checkedsDesgloses`, `idArgumentos`) VALUES (NULL, :nombresDefinidos, :checkedsDesgloses, :idArgumentos);";
				$sql3 = $conexionEstablecida->prepare($query3);

				$sql3->bindParam(':nombresDefinidos',$nombresDefinidos[$z],PDO::PARAM_STR);
				$sql3->bindParam(':checkedsDesgloses',$checkedsDesgloses[$z],PDO::PARAM_STR);
				$sql3->bindParam(':idArgumentos',$idArgumentos,PDO::PARAM_STR);

				$sql3->execute();	

		 	}


		}


 	}



	$mensaje=1;
	$jason['mensaje']=$mensaje;
	echo json_encode($jason);