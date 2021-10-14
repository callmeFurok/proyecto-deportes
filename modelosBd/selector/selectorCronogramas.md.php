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
	$data10=array();
	$data11=array();
	$data12=array();
	$data13=array();

	/*=====  End of Declaración arrays  ======*/
	
	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();	

 	$query="SELECT numero__conjunto,descripcion__conjunto,unidad__conjunto,cantidad__conjunto,precioUnitario__conjunto,subtotal__conjunto,codigo,elementosResultantes,medicion__conjunto,formasDePago__conjunto,valorPreferencialConjunto,idInfrasCronograma FROM pro_cronograma WHERE codigo='$codigoProyecto';";
	$resultado = $conexionEstablecida->query($query);


	while($registro = $resultado->fetch()) {

		$numero__conjunto=$registro['numero__conjunto'];
		array_push($data1, $numero__conjunto);

		$descripcion__conjunto=$registro['descripcion__conjunto'];
		array_push($data2, $descripcion__conjunto);

		$unidad__conjunto=$registro['unidad__conjunto'];
		array_push($data3, $unidad__conjunto);

		$cantidad__conjunto=$registro['cantidad__conjunto'];
		array_push($data4, $cantidad__conjunto);

		$precioUnitario__conjunto=$registro['precioUnitario__conjunto'];
		array_push($data5, $precioUnitario__conjunto);

		$subtotal__conjunto=$registro['subtotal__conjunto'];
		array_push($data6, $subtotal__conjunto);

		$elementosResultantes=$registro['elementosResultantes'];
		array_push($data7, $elementosResultantes);

		$medicion__conjunto=$registro['medicion__conjunto'];
		array_push($data8, $medicion__conjunto);

		$formasDePago__conjunto=$registro['formasDePago__conjunto'];
		array_push($data9, $formasDePago__conjunto);

		$valorPreferencialConjunto=$registro['valorPreferencialConjunto'];
		array_push($data10, $valorPreferencialConjunto);

		$idInfrasCronograma=$registro['idInfrasCronograma'];
		array_push($data11, $idInfrasCronograma);

	}

	$stringnumero__conjunto=  implode("------", $data1);
	$stringdescripcion__conjunto=  implode("------", $data2);
	$stringunidad__conjunto=  implode("------", $data3);
	$stringcantidad__conjunto=  implode("------", $data4);
	$stringprecioUnitario__conjunto=  implode("------", $data5);
	$stringsubtotal__conjunto=  implode("------", $data6);
	$stringelementosResultantes=  implode("------", $data7);
	$stringmedicion__conjunto=  implode("------", $data8);
	$stringformasDePago__conjunto=  implode("------", $data9);
	$stringvalorPreferencialConjunto=  implode("------", $data10);
	$stringidInfrasCronograma=  implode("------", $data11);



	$jason['stringnumero__conjunto']=$stringnumero__conjunto;
	$jason['stringdescripcion__conjunto']=$stringdescripcion__conjunto;
	$jason['stringunidad__conjunto']=$stringunidad__conjunto;
	$jason['stringcantidad__conjunto']=$stringcantidad__conjunto;
	$jason['stringprecioUnitario__conjunto']=$stringprecioUnitario__conjunto;
	$jason['stringsubtotal__conjunto']=$stringsubtotal__conjunto;
	$jason['stringelementosResultantes']=$stringelementosResultantes;
	$jason['stringmedicion__conjunto']=$stringmedicion__conjunto;
	$jason['stringformasDePago__conjunto']=$stringformasDePago__conjunto;
	$jason['stringvalorPreferencialConjunto']=$stringvalorPreferencialConjunto;
	$jason['stringidInfrasCronograma']=$stringidInfrasCronograma;

	echo json_encode($jason);