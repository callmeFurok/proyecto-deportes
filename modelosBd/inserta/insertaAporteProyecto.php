<?php

	extract($_POST);


	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

 	extract($_POST);

	$query="INSERT INTO `ezonshar2`.`pro_alineacion_aporte` (`idAporteProyecto`, `objetivo1Linea1Item1`, `objetivo1Linea1Item2`, `objetivo1Linea1Item3`, `objetivo2Linea1Item1`, `objetivo2Linea1Item2`, `objetivo2Linea1Item3`, `objetivo2Linea1Item4`, `objetivo3Linea1Item1`, `objetivo3Linea1Item2`, `objetivo3Linea1Item3`, `objetivo3Linea1Item4`, `objetivo4Linea1Item1`, `objetivo5Linea1Item1`, `objetivo6Linea1Item1`, `objetivo6Linea1Item2`, `objetivo7Linea1Item1`, `objetivo7Linea1Item2`, `objetivo8Linea1Item1`, `objetivo8Linea1Item2`, `objetivo8Linea1Item3`, `objetivo8Linea1Item4`, `objetivo8Linea1Item5`, `objetivo9Linea1Item1`, `objetivo10Linea1Item1`, `objetivo10Linea1Item2`, `objetivo10Linea1Item3`, `objetivo10Linea1Item4`, `objetivo10Linea1Item5`, `objetivo11Linea1Item1`, `objetivo11Linea1Item2`, `objetivo1Linea2Item1`, `objetivo1Linea2Item2`, `objetivo1Linea2Item3`, `objetivo1Linea2Item4`, `objetivo2Linea2Item1`, `objetivo2Linea2Item2`, `objetivo2Linea2Item3`, `objetivo3Linea2Item1`, `objetivo3Linea2Item2`, `objetivo3Linea2Item3`, `objetivo4Linea2Item1`, `objetivo4Linea2Item2`, `objetivo1Linea3Item1`, `objetivo1Linea3Item2`, `objetivo1Linea3Item3`, `objetivo1Linea3Item4`, `objetivo1Linea3Item5`, `objetivo1Linea3Item6`, `objetivo2Linea3Item1`, `objetivo2Linea3Item2`, `objetivo3Linea3Item1`, `objetivo3Linea3Item2`, `objetivo3Linea3Item3`, `objetivo4Linea3Item1`, `objetivo4Linea3Item2`, `objetivo5Linea3Item1`, `objetivo5Linea3Item2`, `objetivo1Institucionaltem1`, `objetivo1Institucionaltem2`, `objetivo1Institucionaltem3`, `objetivo2Institucionaltem1`, `objetivo2Institucionaltem2`, `objetivo2Institucionaltem3`, `codigo`) VALUES (NULL, :objetivo1Linea1Item1, :objetivo1Linea1Item2, :objetivo1Linea1Item3, :objetivo2Linea1Item1, :objetivo2Linea1Item2, :objetivo2Linea1Item3, :objetivo2Linea1Item4, :objetivo3Linea1Item1, :objetivo3Linea1Item2, :objetivo3Linea1Item3, :objetivo3Linea1Item4, :objetivo4Linea1Item1, :objetivo5Linea1Item1, :objetivo6Linea1Item1, :objetivo6Linea1Item2, :objetivo7Linea1Item1, :objetivo7Linea1Item2, :objetivo8Linea1Item1, :objetivo8Linea1Item2, :objetivo8Linea1Item3, :objetivo8Linea1Item4, :objetivo8Linea1Item5, :objetivo9Linea1Item1, :objetivo10Linea1Item1, :objetivo10Linea1Item2, :objetivo10Linea1Item3, :objetivo10Linea1Item4, :objetivo10Linea1Item5, :objetivo11Linea1Item1, :objetivo11Linea1Item2, :objetivo1Linea2Item1, :objetivo1Linea2Item2, :objetivo1Linea2Item3, :objetivo1Linea2Item4, :objetivo2Linea2Item1, :objetivo2Linea2Item2, :objetivo2Linea2Item3, :objetivo3Linea2Item1, :objetivo3Linea2Item2, :objetivo3Linea2Item3, :objetivo4Linea2Item1, :objetivo4Linea2Item2, :objetivo1Linea3Item1, :objetivo1Linea3Item2, :objetivo1Linea3Item3, :objetivo1Linea3Item4, :objetivo1Linea3Item5, :objetivo1Linea3Item6, :objetivo2Linea3Item1, :objetivo2Linea3Item2, :objetivo3Linea3Item1, :objetivo3Linea3Item2, :objetivo3Linea3Item3, :objetivo4Linea3Item1, :objetivo4Linea3Item2, :objetivo5Linea3Item1, :objetivo5Linea3Item2, :objetivo1Institucionaltem1, :objetivo1Institucionaltem2, :objetivo1Institucionaltem3, :objetivo2Institucionaltem1, :objetivo2Institucionaltem2, :objetivo2Institucionaltem3, :codigo);";
	$sql = $conexionEstablecida->prepare($query);

	$sql->bindParam(':objetivo1Linea1Item1',$objetivo1Linea1Item1,PDO::PARAM_STR);
	$sql->bindParam(':objetivo1Linea1Item2',$objetivo1Linea1Item2,PDO::PARAM_STR);
	$sql->bindParam(':objetivo1Linea1Item3',$objetivo1Linea1Item3,PDO::PARAM_STR);
	$sql->bindParam(':objetivo2Linea1Item1',$objetivo2Linea1Item1,PDO::PARAM_STR);
	$sql->bindParam(':objetivo2Linea1Item2',$objetivo2Linea1Item2,PDO::PARAM_STR);
	$sql->bindParam(':objetivo2Linea1Item3',$objetivo2Linea1Item3,PDO::PARAM_STR);
	$sql->bindParam(':objetivo2Linea1Item4',$objetivo2Linea1Item4,PDO::PARAM_STR);
	$sql->bindParam(':objetivo3Linea1Item1',$objetivo3Linea1Item1,PDO::PARAM_STR);
	$sql->bindParam(':objetivo3Linea1Item2',$objetivo3Linea1Item2,PDO::PARAM_STR);
	$sql->bindParam(':objetivo3Linea1Item3',$objetivo3Linea1Item3,PDO::PARAM_STR);
	$sql->bindParam(':objetivo3Linea1Item4',$objetivo3Linea1Item4,PDO::PARAM_STR);
	$sql->bindParam(':objetivo4Linea1Item1',$objetivo4Linea1Item1,PDO::PARAM_STR);
	$sql->bindParam(':objetivo5Linea1Item1',$objetivo5Linea1Item1,PDO::PARAM_STR);
	$sql->bindParam(':objetivo6Linea1Item1',$objetivo6Linea1Item1,PDO::PARAM_STR);
	$sql->bindParam(':objetivo6Linea1Item2',$objetivo6Linea1Item2,PDO::PARAM_STR);
	$sql->bindParam(':objetivo7Linea1Item1',$objetivo7Linea1Item1,PDO::PARAM_STR);
	$sql->bindParam(':objetivo7Linea1Item2',$objetivo7Linea1Item2,PDO::PARAM_STR);
	$sql->bindParam(':objetivo8Linea1Item1',$objetivo8Linea1Item1,PDO::PARAM_STR);
	$sql->bindParam(':objetivo8Linea1Item2',$objetivo8Linea1Item2,PDO::PARAM_STR);
	$sql->bindParam(':objetivo8Linea1Item3',$objetivo8Linea1Item3,PDO::PARAM_STR);
	$sql->bindParam(':objetivo8Linea1Item4',$objetivo8Linea1Item4,PDO::PARAM_STR);
	$sql->bindParam(':objetivo8Linea1Item5',$objetivo8Linea1Item5,PDO::PARAM_STR);
	$sql->bindParam(':objetivo9Linea1Item1',$objetivo9Linea1Item1,PDO::PARAM_STR);
	$sql->bindParam(':objetivo10Linea1Item1',$objetivo10Linea1Item1,PDO::PARAM_STR);
	$sql->bindParam(':objetivo10Linea1Item2',$objetivo10Linea1Item2,PDO::PARAM_STR);
	$sql->bindParam(':objetivo10Linea1Item3',$objetivo10Linea1Item3,PDO::PARAM_STR);
	$sql->bindParam(':objetivo10Linea1Item4',$objetivo10Linea1Item4,PDO::PARAM_STR);
	$sql->bindParam(':objetivo10Linea1Item5',$objetivo10Linea1Item5,PDO::PARAM_STR);
	$sql->bindParam(':objetivo11Linea1Item1',$objetivo11Linea1Item1,PDO::PARAM_STR);
	$sql->bindParam(':objetivo11Linea1Item2',$objetivo11Linea1Item2,PDO::PARAM_STR);
	$sql->bindParam(':objetivo1Linea2Item1',$objetivo1Linea2Item1,PDO::PARAM_STR);
	$sql->bindParam(':objetivo1Linea2Item2',$objetivo1Linea2Item2,PDO::PARAM_STR);
	$sql->bindParam(':objetivo1Linea2Item3',$objetivo1Linea2Item3,PDO::PARAM_STR);
	$sql->bindParam(':objetivo1Linea2Item4',$objetivo1Linea2Item4,PDO::PARAM_STR);
	$sql->bindParam(':objetivo2Linea2Item1',$objetivo2Linea2Item1,PDO::PARAM_STR);
	$sql->bindParam(':objetivo2Linea2Item2',$objetivo2Linea2Item2,PDO::PARAM_STR);
	$sql->bindParam(':objetivo2Linea2Item3',$objetivo2Linea2Item3,PDO::PARAM_STR);
	$sql->bindParam(':objetivo3Linea2Item1',$objetivo3Linea2Item1,PDO::PARAM_STR);
	$sql->bindParam(':objetivo3Linea2Item2',$objetivo3Linea2Item2,PDO::PARAM_STR);
	$sql->bindParam(':objetivo3Linea2Item3',$objetivo3Linea2Item3,PDO::PARAM_STR);
	$sql->bindParam(':objetivo4Linea2Item1',$objetivo4Linea2Item1,PDO::PARAM_STR);
	$sql->bindParam(':objetivo4Linea2Item2',$objetivo4Linea2Item2,PDO::PARAM_STR);
	$sql->bindParam(':objetivo1Linea3Item1',$objetivo1Linea3Item1,PDO::PARAM_STR);
	$sql->bindParam(':objetivo1Linea3Item2',$objetivo1Linea3Item2,PDO::PARAM_STR);
	$sql->bindParam(':objetivo1Linea3Item3',$objetivo1Linea3Item3,PDO::PARAM_STR);
	$sql->bindParam(':objetivo1Linea3Item4',$objetivo1Linea3Item4,PDO::PARAM_STR);
	$sql->bindParam(':objetivo1Linea3Item5',$objetivo1Linea3Item5,PDO::PARAM_STR);
	$sql->bindParam(':objetivo1Linea3Item6',$objetivo1Linea3Item6,PDO::PARAM_STR);
	$sql->bindParam(':objetivo2Linea3Item1',$objetivo2Linea3Item1,PDO::PARAM_STR);
	$sql->bindParam(':objetivo2Linea3Item2',$objetivo2Linea3Item2,PDO::PARAM_STR);
	$sql->bindParam(':objetivo3Linea3Item1',$objetivo3Linea3Item1,PDO::PARAM_STR);
	$sql->bindParam(':objetivo3Linea3Item2',$objetivo3Linea3Item2,PDO::PARAM_STR);
	$sql->bindParam(':objetivo3Linea3Item3',$objetivo3Linea3Item3,PDO::PARAM_STR);
	$sql->bindParam(':objetivo4Linea3Item1',$objetivo4Linea3Item1,PDO::PARAM_STR);
	$sql->bindParam(':objetivo4Linea3Item2',$objetivo4Linea3Item2,PDO::PARAM_STR);
	$sql->bindParam(':objetivo5Linea3Item1',$objetivo5Linea3Item1,PDO::PARAM_STR);
	$sql->bindParam(':objetivo5Linea3Item2',$objetivo5Linea3Item2,PDO::PARAM_STR);
	$sql->bindParam(':objetivo1Institucionaltem1',$objetivo1Institucionaltem1,PDO::PARAM_STR);
	$sql->bindParam(':objetivo1Institucionaltem2',$objetivo1Institucionaltem2,PDO::PARAM_STR);
	$sql->bindParam(':objetivo1Institucionaltem3',$objetivo1Institucionaltem3,PDO::PARAM_STR);
	$sql->bindParam(':objetivo2Institucionaltem1',$objetivo2Institucionaltem1,PDO::PARAM_STR);
	$sql->bindParam(':objetivo2Institucionaltem2',$objetivo2Institucionaltem2,PDO::PARAM_STR);
	$sql->bindParam(':objetivo2Institucionaltem3',$objetivo2Institucionaltem3,PDO::PARAM_STR);
	$sql->bindParam(':codigo',$codigoProyectoSecundario,PDO::PARAM_STR);


	$sql->execute();

	$mensaje=1;
	$jason['mensaje']=$mensaje;
	echo json_encode($jason);