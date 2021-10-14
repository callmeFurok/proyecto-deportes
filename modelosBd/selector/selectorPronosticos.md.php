<?php

	extract($_POST);


	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	/*==========================================
	=            Declaración arrays            =
	==========================================*/
	
	$data1=array();
	$data2=array();
	$data3=array();
	$data4=array();
	$data5=array();
	$data6=array();
	$data7=array();
	$data8=array();
	$data9=array();

	/*=====  End of Declaración arrays  ======*/
	


	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();	

 	$query="SELECT idPronosticos,deportistas__conjunto,disciplina__conjunto,categoria__conjunto,division__conjunto,modalidadPrueba__conjunto,resultadoMarca__conjunto,eventoDeportistas__conjunto,prnosticosDeportistas__conjunto FROM pro_pronosticos WHERE codigo='$codigoProyecto';";
	$resultado = $conexionEstablecida->query($query);


	while($registro = $resultado->fetch()) {

		$idPronosticos=$registro['idPronosticos'];
		array_push($data1, $idPronosticos);

		$deportistas__conjunto=$registro['deportistas__conjunto'];
		array_push($data2, $deportistas__conjunto);

		$disciplina__conjunto=$registro['disciplina__conjunto'];
		array_push($data3, $disciplina__conjunto);

		$categoria__conjunto=$registro['categoria__conjunto'];
		array_push($data4, $categoria__conjunto);

		$division__conjunto=$registro['division__conjunto'];
		array_push($data5, $division__conjunto);

		$modalidadPrueba__conjunto=$registro['modalidadPrueba__conjunto'];
		array_push($data6, $modalidadPrueba__conjunto);

		$resultadoMarca__conjunto=$registro['resultadoMarca__conjunto'];
		array_push($data7, $resultadoMarca__conjunto);
	
		$eventoDeportistas__conjunto=$registro['eventoDeportistas__conjunto'];
		array_push($data8, $eventoDeportistas__conjunto);

		$prnosticosDeportistas__conjunto=$registro['prnosticosDeportistas__conjunto'];
		array_push($data9, $prnosticosDeportistas__conjunto);

	}


	$stringidPronosticoss=  implode("------", $data1);
	$stringdeportistas__conjunto =  implode("------", $data2);
	$stringdisciplina__conjunto =  implode("------", $data3);
	$stringcategoria__conjunto =  implode("------", $data4);
	$stringdivision__conjunto =  implode("------", $data5);
	$stringmodalidadPrueba__conjunto =  implode("------", $data6);
	$stringresultadoMarca__conjunto =  implode("------", $data7);
	$stringeventoDeportistas__conjunto =  implode("------", $data8);
	$stringprnosticosDeportistas__conjunto =  implode("------", $data9);

	$jason['stringidPronosticoss']=$stringidPronosticoss;
	$jason['stringdeportistas__conjunto']=$stringdeportistas__conjunto;
	$jason['stringdisciplina__conjunto']=$stringdisciplina__conjunto;
	$jason['stringcategoria__conjunto']=$stringcategoria__conjunto;
	$jason['stringdivision__conjunto']=$stringdivision__conjunto;
	$jason['stringmodalidadPrueba__conjunto']=$stringmodalidadPrueba__conjunto;
	$jason['stringresultadoMarca__conjunto']=$stringresultadoMarca__conjunto;
	$jason['stringeventoDeportistas__conjunto']=$stringeventoDeportistas__conjunto;
	$jason['stringprnosticosDeportistas__conjunto']=$stringprnosticosDeportistas__conjunto;


	echo json_encode($jason);