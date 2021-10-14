<?php

	extract($_POST);


	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';


	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();	

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
	

	$query="SELECT idArgumentos,argumentosNombres,tipoArgumento,idItem FROM pro_itemsargumentos WHERE idItem='$itemsEscogidos';";
	$resultado = $conexionEstablecida->query($query);


	while($registro = $resultado->fetch()) {

		$idArgumentos=$registro['idArgumentos'];	
		array_push($data1, $idArgumentos);

		$argumentosNombres=$registro['argumentosNombres'];	
		array_push($data2, $argumentosNombres);

		$tipoArgumento=$registro['tipoArgumento'];		
		array_push($data3, $tipoArgumento);

		$idItem=$registro['idItem'];		
		array_push($data8, $idItem);

	}


	$query2="SELECT a.idArgumentosDefinidos,a.nombresDefinidos,a.checkedsDesgloses,a.idArgumentos FROM pro_itemsargumentosderfinidos AS a INNER JOIN pro_itemsargumentos AS b ON a.idArgumentos=b.idArgumentos WHERE b.idItem='$itemsEscogidos';";
	$resultado2 = $conexionEstablecida->query($query2);


	while($registro2 = $resultado2->fetch()) {

		$idArgumentosDefinidos=$registro2['idArgumentosDefinidos'];
		array_push($data4, $idArgumentosDefinidos);
				
		$nombresDefinidos=$registro2['nombresDefinidos'];
		array_push($data5, $nombresDefinidos);

		$checkedsDesgloses=$registro2['checkedsDesgloses'];
		array_push($data6, $checkedsDesgloses);		

		$idArgumentos=$registro2['idArgumentos'];
		array_push($data7, $idArgumentos);

	}


	$query3="SELECT a.formula FROM pro_formulas AS a INNER JOIN pro_itemsargumentos AS b ON a.idArgumentos=b.idArgumentos WHERE b.idItem='$itemsEscogidos';";
	$resultado3 = $conexionEstablecida->query($query3);

	while($registro3 = $resultado3->fetch()) {

		$formula=$registro3['formula'];
		array_push($data9, $formula);

	}


	$stringidArgumentos=  implode("------", $data1);
	$stringargumentosNombres=  implode("------", $data2);
	$stringtipoArgumento=  implode("------", $data3);

	$stringIditem=  implode("------", $data8);

	$stringidArgumentosDefinidos=  implode("------", $data4);
	$stringnombresDefinidos=  implode("------", $data5);
	$stringcheckedsDesgloses=  implode("------", $data6);
	$stringidArgumentos2=  implode("------", $data7);

	$stringformula=  implode("------", $data9);



	$jason['stringidArgumentos']=$stringidArgumentos;
	$jason['stringargumentosNombres']=$stringargumentosNombres;
	$jason['stringtipoArgumento']=$stringtipoArgumento;

	$jason['itemsEscogidos']=$itemsEscogidos;

	$jason['stringidArgumentosDefinidos']=$stringidArgumentosDefinidos;
	$jason['stringnombresDefinidos']=$stringnombresDefinidos;
	$jason['stringcheckedsDesgloses']=$stringcheckedsDesgloses;
	$jason['stringidArgumentos2']=$stringidArgumentos2;

	$jason['stringformula']=$stringformula;

	echo json_encode($jason);