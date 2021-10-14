<?php

	extract($_POST);


	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

 	extract($_POST);



 	$nombre__conjunto = json_decode($nombre__conjunto);
 	$descripcion__conjunto = json_decode($descripcion__conjunto);
 	$metodoCalculo__conjunto = json_decode($metodoCalculo__conjunto);
 	$metaPropuesta__conjunto = json_decode($metaPropuesta__conjunto);
 	$periodo__conjunto = json_decode($periodo__conjunto);

 	$metasContador=count($nombre__conjunto);

 	 for($z=0; $z < $metasContador; $z++){

		$query3="INSERT INTO `ezonshar2`.`pro_metas` (`idMetas`, `nombre__conjunto`, `descripcion__conjunto`, `metodoCalculo__conjunto`, `metaPropuesta__conjunto`, `periodo__conjunto`, `codigo`) VALUES (NULL, :nombre__conjunto, :descripcion__conjunto, :metodoCalculo__conjunto, :metaPropuesta__conjunto, :periodo__conjunto, :codigo);";
		$sql3 = $conexionEstablecida->prepare($query3);


		$sql3->bindParam(':nombre__conjunto',$nombre__conjunto[$z],PDO::PARAM_STR);
		$sql3->bindParam(':descripcion__conjunto',$descripcion__conjunto[$z],PDO::PARAM_STR);
		$sql3->bindParam(':metodoCalculo__conjunto',$metodoCalculo__conjunto[$z],PDO::PARAM_STR);
		$sql3->bindParam(':metaPropuesta__conjunto',$metaPropuesta__conjunto[$z],PDO::PARAM_STR);
		$sql3->bindParam(':periodo__conjunto',$periodo__conjunto[$z],PDO::PARAM_STR);
		$sql3->bindParam(':codigo',$codigoProyectoMetasPronosticos,PDO::PARAM_STR);

		$sql3->execute();	


	 }



 	$deportistas__conjunto = json_decode($deportistas__conjunto);
 	$disciplina__conjunto = json_decode($disciplina__conjunto);
 	$categoria__conjunto = json_decode($categoria__conjunto);
 	$division__conjunto = json_decode($division__conjunto);
 	$modalidadPrueba__conjunto = json_decode($modalidadPrueba__conjunto);
 	$resultadoMarca__conjunto = json_decode($resultadoMarca__conjunto);
 	$eventoDeportistas__conjunto = json_decode($eventoDeportistas__conjunto);
 	$prnosticosDeportistas__conjunto = json_decode($prnosticosDeportistas__conjunto);


 	$pronosticosContador=count($deportistas__conjunto);


 	 for($z=0; $z < $pronosticosContador; $z++){

		$query="INSERT INTO `ezonshar2`.`pro_pronosticos` (`idPronosticos`, `deportistas__conjunto`, `disciplina__conjunto`, `categoria__conjunto`, `division__conjunto`, `modalidadPrueba__conjunto`, `resultadoMarca__conjunto`, `eventoDeportistas__conjunto`, `prnosticosDeportistas__conjunto`, `codigo`) VALUES (NULL, :deportistas__conjunto, :disciplina__conjunto, :categoria__conjunto, :division__conjunto, :modalidadPrueba__conjunto, :resultadoMarca__conjunto, :eventoDeportistas__conjunto, :prnosticosDeportistas__conjunto, :codigo);";
		$sql = $conexionEstablecida->prepare($query);


		$sql->bindParam(':deportistas__conjunto',$deportistas__conjunto[$z],PDO::PARAM_STR);
		$sql->bindParam(':disciplina__conjunto',$disciplina__conjunto[$z],PDO::PARAM_STR);
		$sql->bindParam(':categoria__conjunto',$categoria__conjunto[$z],PDO::PARAM_STR);
		$sql->bindParam(':division__conjunto',$division__conjunto[$z],PDO::PARAM_STR);
		$sql->bindParam(':modalidadPrueba__conjunto',$modalidadPrueba__conjunto[$z],PDO::PARAM_STR);
		$sql->bindParam(':resultadoMarca__conjunto',$resultadoMarca__conjunto[$z],PDO::PARAM_STR);
		$sql->bindParam(':eventoDeportistas__conjunto',$eventoDeportistas__conjunto[$z],PDO::PARAM_STR);
		$sql->bindParam(':prnosticosDeportistas__conjunto',$prnosticosDeportistas__conjunto[$z],PDO::PARAM_STR);
		$sql->bindParam(':codigo',$codigoProyectoMetasPronosticos,PDO::PARAM_STR);

		$sql->execute();	


	 }



	$mensaje=1;
	$jason['mensaje']=$mensaje;
	echo json_encode($jason);