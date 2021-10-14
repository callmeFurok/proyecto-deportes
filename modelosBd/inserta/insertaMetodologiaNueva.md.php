<?php

	extract($_POST);


	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

 	extract($_POST);


 	$descripcionActividades__conjuntoArray = json_decode($descripcionActividades__conjunto);
 	$eneroActividades__conjuntoArray = json_decode($eneroActividades__conjunto);
 	$febreroActividades__conjuntoArray = json_decode($febreroActividades__conjunto);
 	$marzoActividades__conjuntoArray = json_decode($marzoActividades__conjunto);
 	$abrilActividades__conjuntoArray = json_decode($abrilActividades__conjunto);
 	$mayoActividades__conjuntoArray = json_decode($mayoActividades__conjunto);
 	$junioActividades__conjuntoArray = json_decode($junioActividades__conjunto);
 	$julioActividades__conjuntoArray = json_decode($julioActividades__conjunto);
 	$agostoActividades__conjuntoArray = json_decode($agostoActividades__conjunto);
 	$septiembreActividades__conjuntoArray = json_decode($septiembreActividades__conjunto);
 	$octubreActividades__conjuntoArray = json_decode($octubreActividades__conjunto);
 	$noviembreActividades__conjuntoArray = json_decode($noviembreActividades__conjunto);
 	$diciembreActividades__conjuntoArray = json_decode($diciembreActividades__conjunto);

 	$numero__identificativosArray = json_decode($numero__identificativos);

 	$actividadesDesc=count($descripcionActividades__conjuntoArray);

 	for($z=0; $z < $actividadesDesc; $z++){

		$query3="INSERT INTO `ezonshar2`.`pro_descripcionactividades` (`idDescripcionActividades`, `descripcionActividades__conjunto`, `eneroActividades__conjunto`, `febreroActividades__conjunto`, `marzoActividades__conjunto`, `abrilActividades__conjunto`, `mayoActividades__conjunto`, `junioActividades__conjunto`, `julioActividades__conjunto`, `agostoActividades__conjunto`, `septiembreActividades__conjunto`, `octubreActividades__conjunto`, `noviembreActividades__conjunto`, `diciembreActividades__conjunto`, `codigo`, `numero__identificativos`) VALUES (NULL, :descripcionActividades__conjunto, :eneroActividades__conjunto, :febreroActividades__conjunto, :marzoActividades__conjunto, :abrilActividades__conjunto, :mayoActividades__conjunto, :junioActividades__conjunto, :julioActividades__conjunto, :agostoActividades__conjunto, :septiembreActividades__conjunto, :octubreActividades__conjunto, :noviembreActividades__conjunto, :diciembreActividades__conjunto, :codigo,:numero__identificativos);";
		$sql3 = $conexionEstablecida->prepare($query3);


		$sql3->bindParam(':descripcionActividades__conjunto',$descripcionActividades__conjuntoArray[$z],PDO::PARAM_STR);
		$sql3->bindParam(':eneroActividades__conjunto',$eneroActividades__conjuntoArray[$z],PDO::PARAM_STR);
		$sql3->bindParam(':febreroActividades__conjunto',$febreroActividades__conjuntoArray[$z],PDO::PARAM_STR);
		$sql3->bindParam(':marzoActividades__conjunto',$marzoActividades__conjuntoArray[$z],PDO::PARAM_STR);
		$sql3->bindParam(':abrilActividades__conjunto',$abrilActividades__conjuntoArray[$z],PDO::PARAM_STR);
		$sql3->bindParam(':mayoActividades__conjunto',$mayoActividades__conjuntoArray[$z],PDO::PARAM_STR);
		$sql3->bindParam(':junioActividades__conjunto',$junioActividades__conjuntoArray[$z],PDO::PARAM_STR);
		$sql3->bindParam(':julioActividades__conjunto',$julioActividades__conjuntoArray[$z],PDO::PARAM_STR);
		$sql3->bindParam(':agostoActividades__conjunto',$agostoActividades__conjuntoArray[$z],PDO::PARAM_STR);
		$sql3->bindParam(':septiembreActividades__conjunto',$septiembreActividades__conjuntoArray[$z],PDO::PARAM_STR);
		$sql3->bindParam(':octubreActividades__conjunto',$octubreActividades__conjuntoArray[$z],PDO::PARAM_STR);
		$sql3->bindParam(':noviembreActividades__conjunto',$noviembreActividades__conjuntoArray[$z],PDO::PARAM_STR);
		$sql3->bindParam(':diciembreActividades__conjunto',$diciembreActividades__conjuntoArray[$z],PDO::PARAM_STR);
		$sql3->bindParam(':codigo',$codigoProyecto,PDO::PARAM_STR);
		$sql3->bindParam(':numero__identificativos',$numero__identificativosArray[$z],PDO::PARAM_STR);

		$sql3->execute();	


	 }

 	$rol__conjuntoArray = json_decode($rol__conjunto);
 	$detalle__conjuntoArray = json_decode($detalle__conjunto);


	$rolesDescribes=count($rol__conjuntoArray);

 	for($z=0; $z < $rolesDescribes; $z++){

		$query="INSERT INTO `ezonshar2`.`pro_estructuraoperativa` (`idDetalle`, `rol__conjunto`, `detalle__conjunto`, `codigoProyecto`) VALUES (NULL, :rol__conjunto, :detalle__conjunto, :codigoProyecto);";
		$sql = $conexionEstablecida->prepare($query);


		$sql->bindParam(':rol__conjunto',$rol__conjuntoArray[$z],PDO::PARAM_STR);
		$sql->bindParam(':detalle__conjunto',$detalle__conjuntoArray[$z],PDO::PARAM_STR);
		$sql->bindParam(':codigoProyecto',$codigoProyecto,PDO::PARAM_STR);
		$sql->execute();	


	 }

	 $actividadSeguimiento__conjunto = json_decode($actividadSeguimiento__conjunto);
	 $periocidadSeguimiento__conjunto = json_decode($periocidadSeguimiento__conjunto);
	 $medioSeguimiento__conjunto = json_decode($medioSeguimiento__conjunto);
	 $observacionSeguimiento__conjunto = json_decode($observacionSeguimiento__conjunto);
	 $conjunto__indicadores = json_decode($conjunto__indicadores);
	 $metas__conjuntos__seleccionables = json_decode($metas__conjuntos__seleccionables);

	 $contadorSegumiento=count($actividadSeguimiento__conjunto);


 	for($z=0; $z < $contadorSegumiento; $z++){

		$query2="INSERT INTO `ezonshar2`.`pro_seguimientoevaluacion` (`idSeguimiento`, `actividadSeguimiento__conjunto`, `periocidadSeguimiento__conjunto`, `medioSeguimiento__conjunto`, `observacionSeguimiento__conjunto`, `codigo`, `metas__conjuntos__seleccionables`, `conjunto__indicadores`) VALUES (NULL, :actividadSeguimiento__conjunto, :periocidadSeguimiento__conjunto, :medioSeguimiento__conjunto, :observacionSeguimiento__conjunto, :codigo,:metas__conjuntos__seleccionables,:conjunto__indicadores);";
		$sql2 = $conexionEstablecida->prepare($query2);


		$sql2->bindParam(':actividadSeguimiento__conjunto',$actividadSeguimiento__conjunto[$z],PDO::PARAM_STR);
		$sql2->bindParam(':periocidadSeguimiento__conjunto',$periocidadSeguimiento__conjunto[$z],PDO::PARAM_STR);
		$sql2->bindParam(':medioSeguimiento__conjunto',$medioSeguimiento__conjunto[$z],PDO::PARAM_STR);
		$sql2->bindParam(':observacionSeguimiento__conjunto',$observacionSeguimiento__conjunto[$z],PDO::PARAM_STR);
		$sql2->bindParam(':codigo',$codigoProyecto,PDO::PARAM_STR);
		$sql2->bindParam(':conjunto__indicadores',$conjunto__indicadores[$z],PDO::PARAM_STR);
		$sql2->bindParam(':metas__conjuntos__seleccionables',$metas__conjuntos__seleccionables[$z],PDO::PARAM_STR);
		$sql2->execute();	


	 }


	$mensaje=1;
	$jason['mensaje']=$mensaje;
	echo json_encode($jason);