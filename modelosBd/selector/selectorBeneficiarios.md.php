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
	$data15=array();
	$data16=array();
	$data17=array();
	$data18=array();
	$data19=array();
	$data20=array();
	$data21=array();
	$data22=array();
	$data23=array();
	$data24=array();
	$data25=array();
	$data26=array();
	$data27=array();

	/*=====  End of Declaración arrays  ======*/
	


	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();	

 	$query="SELECT idBeneficiariosDirectos,beneficiariosDirectos__conjuntos,desdeDirectos__conjuntos,hastaDirectos__conjuntos,masculinoDirectos__conjuntos,femeninoDirectos__conjuntos,montubioDirectos__conjuntos,indigenasDirectos__conjuntos,blancoDirectos__conjuntos,afroDirectos__conjuntos,mulatoDirectos__conjuntos,negroDirectos__conjuntos,totalDirectos__conjuntos,mestizoDirectos__conjuntos FROM pro_beneficiarios_directos WHERE codigo='$codigoProyecto';";
	$resultado = $conexionEstablecida->query($query);


	while($registro = $resultado->fetch()) {

		$idBeneficiariosDirectos=$registro['idBeneficiariosDirectos'];
		array_push($data1, $idBeneficiariosDirectos);

		$beneficiariosDirectos__conjuntos=$registro['beneficiariosDirectos__conjuntos'];
		array_push($data2, $beneficiariosDirectos__conjuntos);

		$desdeDirectos__conjuntos=$registro['desdeDirectos__conjuntos'];
		array_push($data3, $desdeDirectos__conjuntos);

		$hastaDirectos__conjuntos=$registro['hastaDirectos__conjuntos'];
		array_push($data4, $hastaDirectos__conjuntos);

		$masculinoDirectos__conjuntos=$registro['masculinoDirectos__conjuntos'];
		array_push($data5, $masculinoDirectos__conjuntos);

		$femeninoDirectos__conjuntos=$registro['femeninoDirectos__conjuntos'];
		array_push($data6, $femeninoDirectos__conjuntos);

		$montubioDirectos__conjuntos=$registro['montubioDirectos__conjuntos'];
		array_push($data7, $montubioDirectos__conjuntos);

		$indigenasDirectos__conjuntos=$registro['indigenasDirectos__conjuntos'];
		array_push($data8, $indigenasDirectos__conjuntos);

		$blancoDirectos__conjuntos=$registro['blancoDirectos__conjuntos'];
		array_push($data9, $blancoDirectos__conjuntos);

		$afroDirectos__conjuntos=$registro['afroDirectos__conjuntos'];
		array_push($data10, $afroDirectos__conjuntos);

		$mulatoDirectos__conjuntos=$registro['mulatoDirectos__conjuntos'];
		array_push($data11, $mulatoDirectos__conjuntos);

		$negroDirectos__conjuntos=$registro['negroDirectos__conjuntos'];
		array_push($data12, $negroDirectos__conjuntos);

		$totalDirectos__conjuntos=$registro['totalDirectos__conjuntos'];
		array_push($data13, $totalDirectos__conjuntos);

		$mestizoDirectos__conjuntos=$registro['mestizoDirectos__conjuntos'];
		array_push($data26, $mestizoDirectos__conjuntos);


	}


 	$query2="SELECT idDiscapacidadBeneficiarios,beneficiariosDirectosDiscapacidad__conjuntos,visualDirectosDiscapacidad__conjuntos,auditivaDirectosDiscapacidad__conjuntos,multisensoerialDirectosDiscapacidad__conjuntos,intelectualDirectosDiscapacidad__conjuntos,fisicaDirectosDiscapacidad__conjuntos,psiquicaDirectosDiscapacidad__conjuntos,totalDirectosDiscapacidad__conjuntos FROM pro_beneficiarios_discapacidad WHERE codigo='$codigoProyecto';";
	$resultado2 = $conexionEstablecida->query($query2);


	while($registro2 = $resultado2->fetch()) {

		$idDiscapacidadBeneficiarios=$registro2['idDiscapacidadBeneficiarios'];
		array_push($data14, $idDiscapacidadBeneficiarios);

		$beneficiariosDirectosDiscapacidad__conjuntos=$registro2['beneficiariosDirectosDiscapacidad__conjuntos'];
		array_push($data15, $beneficiariosDirectosDiscapacidad__conjuntos);

		$visualDirectosDiscapacidad__conjuntos=$registro2['visualDirectosDiscapacidad__conjuntos'];
		array_push($data16, $visualDirectosDiscapacidad__conjuntos);

		$auditivaDirectosDiscapacidad__conjuntos=$registro2['auditivaDirectosDiscapacidad__conjuntos'];
		array_push($data17, $auditivaDirectosDiscapacidad__conjuntos);

		$multisensoerialDirectosDiscapacidad__conjuntos=$registro2['multisensoerialDirectosDiscapacidad__conjuntos'];
		array_push($data18, $multisensoerialDirectosDiscapacidad__conjuntos);

		$intelectualDirectosDiscapacidad__conjuntos=$registro2['intelectualDirectosDiscapacidad__conjuntos'];
		array_push($data19, $intelectualDirectosDiscapacidad__conjuntos);

		$fisicaDirectosDiscapacidad__conjuntos=$registro2['fisicaDirectosDiscapacidad__conjuntos'];
		array_push($data20, $fisicaDirectosDiscapacidad__conjuntos);

		$psiquicaDirectosDiscapacidad__conjuntos=$registro2['psiquicaDirectosDiscapacidad__conjuntos'];
		array_push($data21, $psiquicaDirectosDiscapacidad__conjuntos);

		$totalDirectosDiscapacidad__conjuntos=$registro2['totalDirectosDiscapacidad__conjuntos'];
		array_push($data22, $totalDirectosDiscapacidad__conjuntos);

	}

 	$query3="SELECT idIndirectos,beneficiariosDirectosIndirectos__conjuntos,totalDirectosIndirectos__conjuntos,justificacionCuantitativaDirectosIndirectos__conjuntos FROM pro_beneficiarios_indirectos WHERE codigo='$codigoProyecto';";
	$resultado3 = $conexionEstablecida->query($query3);


	while($registro3 = $resultado3->fetch()) {

		$beneficiariosDirectosIndirectos__conjuntos=$registro3['beneficiariosDirectosIndirectos__conjuntos'];
		array_push($data23, $beneficiariosDirectosIndirectos__conjuntos);

		$totalDirectosIndirectos__conjuntos=$registro3['totalDirectosIndirectos__conjuntos'];
		array_push($data24, $totalDirectosIndirectos__conjuntos);

		$justificacionCuantitativaDirectosIndirectos__conjuntos=$registro3['justificacionCuantitativaDirectosIndirectos__conjuntos'];
		array_push($data25, $justificacionCuantitativaDirectosIndirectos__conjuntos);

		$idIndirectos=$registro3['idIndirectos'];
		array_push($data27, $idIndirectos);

	}

	$stringidBeneficiariosDirectos =  implode("------", $data1);
	$stringbeneficiariosDirectos__conjuntos =  implode("------", $data2);
	$stringdesdeDirectos__conjuntos =  implode("------", $data3);
	$stringhastaDirectos__conjuntos =  implode("------", $data4);
	$stringmasculinoDirectos__conjuntos =  implode("------", $data5);
	$stringfemeninoDirectos__conjuntos =  implode("------", $data6);
	$stringmontubioDirectos__conjuntos =  implode("------", $data7);
	$stringindigenasDirectos__conjuntos =  implode("------", $data8);
	$stringblancoDirectos__conjuntos =  implode("------", $data9);
	$stringafroDirectos__conjuntos =  implode("------", $data10);
	$stringmulatoDirectos__conjuntos =  implode("------", $data11);
	$stringnegroDirectos__conjuntos =  implode("------", $data12);
	$stringtotalDirectos__conjuntos =  implode("------", $data13);
	$stringmestizoDirectos__conjuntos =  implode("------", $data26);


	$stringidDiscapacidadBeneficiarios =  implode("------", $data14);
	$stringbeneficiariosDirectosDiscapacidad__conjuntos =  implode("------", $data15);
	$stringvisualDirectosDiscapacidad__conjuntos =  implode("------", $data16);
	$stringauditivaDirectosDiscapacidad__conjuntos =  implode("------", $data17);
	$stringmultisensoerialDirectosDiscapacidad__conjuntos =  implode("------", $data18);
	$stringintelectualDirectosDiscapacidad__conjuntos =  implode("------", $data19);
	$stringfisicaDirectosDiscapacidad__conjuntos =  implode("------", $data20);
	$stringpsiquicaDirectosDiscapacidad__conjuntos =  implode("------", $data21);
	$stringtotalDirectosDiscapacidad__conjuntos =  implode("------", $data22);

	$stringbeneficiariosDirectosIndirectos__conjuntos =  implode("------", $data23);
	$stringtotalDirectosIndirectos__conjuntos =  implode("------", $data24);
	$stringjustificacionCuantitativaDirectosIndirectos__conjuntos =  implode("------", $data25);
	$stringidIndirectos =  implode("------", $data27);

	$jason['stringidBeneficiariosDirectos']=$stringidBeneficiariosDirectos;
	$jason['stringbeneficiariosDirectos__conjuntos']=$stringbeneficiariosDirectos__conjuntos;
	$jason['stringdesdeDirectos__conjuntos']=$stringdesdeDirectos__conjuntos;
	$jason['stringhastaDirectos__conjuntos']=$stringhastaDirectos__conjuntos;
	$jason['stringmasculinoDirectos__conjuntos']=$stringmasculinoDirectos__conjuntos;
	$jason['stringfemeninoDirectos__conjuntos']=$stringfemeninoDirectos__conjuntos;
	$jason['stringmontubioDirectos__conjuntos']=$stringmontubioDirectos__conjuntos;
	$jason['stringindigenasDirectos__conjuntos']=$stringindigenasDirectos__conjuntos;
	$jason['stringblancoDirectos__conjuntos']=$stringblancoDirectos__conjuntos;
	$jason['stringafroDirectos__conjuntos']=$stringafroDirectos__conjuntos;
	$jason['stringmulatoDirectos__conjuntos']=$stringmulatoDirectos__conjuntos;
	$jason['stringnegroDirectos__conjuntos']=$stringnegroDirectos__conjuntos;
	$jason['stringtotalDirectos__conjuntos']=$stringtotalDirectos__conjuntos;
	$jason['stringmestizoDirectos__conjuntos']=$stringmestizoDirectos__conjuntos;


	$jason['stringidDiscapacidadBeneficiarios']=$stringidDiscapacidadBeneficiarios;
	$jason['stringbeneficiariosDirectosDiscapacidad__conjuntos']=$stringbeneficiariosDirectosDiscapacidad__conjuntos;
	$jason['stringvisualDirectosDiscapacidad__conjuntos']=$stringvisualDirectosDiscapacidad__conjuntos;
	$jason['stringauditivaDirectosDiscapacidad__conjuntos']=$stringauditivaDirectosDiscapacidad__conjuntos;
	$jason['stringmultisensoerialDirectosDiscapacidad__conjuntos']=$stringmultisensoerialDirectosDiscapacidad__conjuntos;
	$jason['stringintelectualDirectosDiscapacidad__conjuntos']=$stringintelectualDirectosDiscapacidad__conjuntos;
	$jason['stringfisicaDirectosDiscapacidad__conjuntos']=$stringfisicaDirectosDiscapacidad__conjuntos;
	$jason['stringpsiquicaDirectosDiscapacidad__conjuntos']=$stringpsiquicaDirectosDiscapacidad__conjuntos;
	$jason['stringtotalDirectosDiscapacidad__conjuntos']=$stringtotalDirectosDiscapacidad__conjuntos;


	$jason['stringbeneficiariosDirectosIndirectos__conjuntos']=$stringbeneficiariosDirectosIndirectos__conjuntos;
	$jason['stringtotalDirectosIndirectos__conjuntos']=$stringtotalDirectosIndirectos__conjuntos;
	$jason['stringjustificacionCuantitativaDirectosIndirectos__conjuntos']=$stringjustificacionCuantitativaDirectosIndirectos__conjuntos;
	$jason['stringidIndirectos']=$stringidIndirectos;


	echo json_encode($jason);