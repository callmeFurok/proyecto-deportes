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
	$data14=array();

	/*=====  End of Declaración arrays  ======*/
	


	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();	

 	$query="SELECT b.itemNombres,b.idItem FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS b ON a.idItemComponente=b.idItem WHERE codigo='$codigoProyecto' GROUP BY a.idItemComponente;";
	$resultado = $conexionEstablecida->query($query);


	while($registro = $resultado->fetch()) {

		$itemNombres=$registro['itemNombres'];
		array_push($data1, $itemNombres);

		$idItem=$registro['idItem'];
		array_push($data2, $idItem);

	}


 	$query2="SELECT idInfrasCronograma,numero__conjunto,descripcion__conjunto,unidad__conjunto,cantidad__conjunto,precioUnitario__conjunto,subtotal__conjunto,codigo,elementosResultantes,medicion__conjunto,formasDePago__conjunto,valorPreferencialConjunto FROM pro_cronograma WHERE codigo='$codigoProyecto';";
	$resultado2 = $conexionEstablecida->query($query2);


	while($registro2 = $resultado2->fetch()) {

		$idInfrasCronograma=$registro2['idInfrasCronograma'];
		array_push($data3, $idInfrasCronograma);

		$numero__conjunto=$registro2['numero__conjunto'];
		array_push($data4, $numero__conjunto);

		$descripcion__conjunto=$registro2['descripcion__conjunto'];
		array_push($data5, $descripcion__conjunto);

		$unidad__conjunto=$registro2['unidad__conjunto'];
		array_push($data6, $unidad__conjunto);

		$cantidad__conjunto=$registro2['cantidad__conjunto'];
		array_push($data7, $cantidad__conjunto);

		$precioUnitario__conjunto=$registro2['precioUnitario__conjunto'];
		array_push($data8, $precioUnitario__conjunto);

		$subtotal__conjunto=$registro2['subtotal__conjunto'];
		array_push($data9, $subtotal__conjunto);

		$codigo=$registro2['codigo'];
		array_push($data10, $codigo);

		$elementosResultantes=$registro2['elementosResultantes'];
		array_push($data11, $elementosResultantes);

		$medicion__conjunto=$registro2['medicion__conjunto'];
		array_push($data12, $medicion__conjunto);
	
		$formasDePago__conjunto=$registro2['formasDePago__conjunto'];
		array_push($data13, $formasDePago__conjunto);	

		$valorPreferencialConjunto=$registro2['valorPreferencialConjunto'];
		array_push($data14, $valorPreferencialConjunto);

	}


	$stringitemNombres=  implode("------", $data1);
	$stringidItem=  implode("------", $data2);

	$stringidInfrasCronograma=  implode("------", $data3);
	$stringnumero__conjunto=  implode("------", $data4);
	$stringdescripcion__conjunto=  implode("------", $data5);
	$stringunidad__conjunto=  implode("------", $data6);
	$stringcantidad__conjunto=  implode("------", $data7);
	$stringprecioUnitario__conjunto=  implode("------", $data8);
	$stringsubtotal__conjunto=  implode("------", $data9);
	$stringcodigo=  implode("------", $data10);
	$stringelementosResultantes=  implode("------", $data11);
	$stringmedicion__conjunto=  implode("------", $data12);
	$stringformasDePago__conjunto=  implode("------", $data13);
	$stringvalorPreferencialConjunto=  implode("------", $data14);

	$jason['stringitemNombres']=$stringitemNombres;
	$jason['stringidItem']=$stringidItem;

	$jason['stringidInfrasCronograma']=$stringidInfrasCronograma;
	$jason['stringnumero__conjunto']=$stringnumero__conjunto;
	$jason['stringdescripcion__conjunto']=$stringdescripcion__conjunto;
	$jason['stringunidad__conjunto']=$stringunidad__conjunto;
	$jason['stringcantidad__conjunto']=$stringcantidad__conjunto;
	$jason['stringprecioUnitario__conjunto']=$stringprecioUnitario__conjunto;
	$jason['stringsubtotal__conjunto']=$stringsubtotal__conjunto;
	$jason['stringcodigo']=$stringcodigo;
	$jason['stringelementosResultantes']=$stringelementosResultantes;
	$jason['stringmedicion__conjunto']=$stringmedicion__conjunto;
	$jason['stringformasDePago__conjunto']=$stringformasDePago__conjunto;
	$jason['stringvalorPreferencialConjunto']=$stringvalorPreferencialConjunto;

	echo json_encode($jason);