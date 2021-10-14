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
	$data28=array();
	$data29=array();
	$data30=array();

	/*=====  End of Declaración arrays  ======*/


	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();	

 	$query="SELECT idDescripcionActividades,descripcionActividades__conjunto,eneroActividades__conjunto,febreroActividades__conjunto,marzoActividades__conjunto,abrilActividades__conjunto,mayoActividades__conjunto,junioActividades__conjunto,julioActividades__conjunto,agostoActividades__conjunto,septiembreActividades__conjunto,octubreActividades__conjunto,noviembreActividades__conjunto,diciembreActividades__conjunto,numero__identificativos FROM pro_descripcionactividades WHERE codigo='$codigoProyecto';";
	$resultado = $conexionEstablecida->query($query);


	while($registro = $resultado->fetch()) {

		$idDescripcionActividades=$registro['idDescripcionActividades'];
		array_push($data1, $idDescripcionActividades);

		$descripcionActividades__conjunto=$registro['descripcionActividades__conjunto'];
		array_push($data2, $descripcionActividades__conjunto);

		$eneroActividades__conjunto=$registro['eneroActividades__conjunto'];
		array_push($data3, $eneroActividades__conjunto);

		$febreroActividades__conjunto=$registro['febreroActividades__conjunto'];
		array_push($data4, $febreroActividades__conjunto);

		$marzoActividades__conjunto=$registro['marzoActividades__conjunto'];
		array_push($data5, $marzoActividades__conjunto);

		$abrilActividades__conjunto=$registro['abrilActividades__conjunto'];
		array_push($data6, $abrilActividades__conjunto);

		$mayoActividades__conjunto=$registro['mayoActividades__conjunto'];
		array_push($data7, $mayoActividades__conjunto);

		$junioActividades__conjunto=$registro['junioActividades__conjunto'];
		array_push($data8, $junioActividades__conjunto);

		$julioActividades__conjunto=$registro['julioActividades__conjunto'];
		array_push($data9, $julioActividades__conjunto);

		$agostoActividades__conjunto=$registro['agostoActividades__conjunto'];
		array_push($data10, $agostoActividades__conjunto);

		$septiembreActividades__conjunto=$registro['septiembreActividades__conjunto'];
		array_push($data11, $septiembreActividades__conjunto);

		$octubreActividades__conjunto=$registro['octubreActividades__conjunto'];
		array_push($data12, $octubreActividades__conjunto);

		$noviembreActividades__conjunto=$registro['noviembreActividades__conjunto'];
		array_push($data13, $noviembreActividades__conjunto);

		$diciembreActividades__conjunto=$registro['diciembreActividades__conjunto'];
		array_push($data14, $diciembreActividades__conjunto);

		$numero__identificativos=$registro['numero__identificativos'];
		array_push($data30, $numero__identificativos);

	}

 	$query2="SELECT idDetalle,rol__conjunto,detalle__conjunto FROM pro_estructuraoperativa WHERE codigoProyecto='$codigoProyecto';";
	$resultado2 = $conexionEstablecida->query($query2);


	while($registro2 = $resultado2->fetch()) {

		$idDetalle=$registro2['idDetalle'];
		array_push($data15, $idDetalle);

		$rol__conjunto=$registro2['rol__conjunto'];
		array_push($data16, $rol__conjunto);


		$detalle__conjunto=$registro2['detalle__conjunto'];
		array_push($data17, $detalle__conjunto);

	}


 	$query3="SELECT idSeguimiento,actividadSeguimiento__conjunto,periocidadSeguimiento__conjunto,medioSeguimiento__conjunto,observacionSeguimiento__conjunto,metas__conjuntos__seleccionables,conjunto__indicadores FROM pro_seguimientoevaluacion WHERE codigo='$codigoProyecto';";
	$resultado3 = $conexionEstablecida->query($query3);


	while($registro3 = $resultado3->fetch()) {


		$idSeguimiento=$registro3['idSeguimiento'];
		array_push($data18, $idSeguimiento);

		$actividadSeguimiento__conjunto=$registro3['actividadSeguimiento__conjunto'];
		array_push($data19, $actividadSeguimiento__conjunto);

		$periocidadSeguimiento__conjunto=$registro3['periocidadSeguimiento__conjunto'];
		array_push($data20, $periocidadSeguimiento__conjunto);

		$medioSeguimiento__conjunto=$registro3['medioSeguimiento__conjunto'];
		array_push($data21, $medioSeguimiento__conjunto);

		$observacionSeguimiento__conjunto=$registro3['observacionSeguimiento__conjunto'];
		array_push($data22, $observacionSeguimiento__conjunto);

		$metas__conjuntos__seleccionables=$registro3['metas__conjuntos__seleccionables'];
		array_push($data28, $metas__conjuntos__seleccionables);

		$conjunto__indicadores=$registro3['conjunto__indicadores'];
		array_push($data29, $conjunto__indicadores);

	}

	$stringidDescripcionActividades =  implode("------", $data1);
	$stringdescripcionActividades__conjunto =  implode("------", $data2);
	$stringeneroActividades__conjunto =  implode("------", $data3);
	$stringfebreroActividades__conjunto =  implode("------", $data4);
	$stringmarzoActividades__conjunto =  implode("------", $data5);
	$stringabrilActividades__conjunto =  implode("------", $data6);
	$stringmayoActividades__conjunto =  implode("------", $data7);
	$stringjunioActividades__conjunto =  implode("------", $data8);
	$stringjulioActividades__conjunto =  implode("------", $data9);
	$stringagostoActividades__conjunto =  implode("------", $data10);
	$stringseptiembreActividades__conjunto =  implode("------", $data11);
	$stringoctubreActividades__conjunto =  implode("------", $data12);
	$stringnoviembreActividades__conjunto =  implode("------", $data13);
	$stringdiciembreActividades__conjunto =  implode("------", $data14);

	$stringidDetalle =  implode("------", $data15);
	$stringrol__conjunto =  implode("------", $data16);
	$stringdetalle__conjunto =  implode("------", $data17);

	$stringidSeguimiento =  implode("------", $data18);
	$stringactividadSeguimiento__conjunto =  implode("------", $data19);
	$stringperiocidadSeguimiento__conjunto =  implode("------", $data20);
	$stringmedioSeguimiento__conjunto =  implode("------", $data21);
	$stringobservacionSeguimiento__conjunto =  implode("------", $data22);

	$stringmetas__conjuntos__seleccionables =  implode("------", $data28);
	$stringconjunto__indicadores =  implode("------", $data29);

	$stringNumeroIdentificativos =  implode("------", $data30);





	$jason['stringidDescripcionActividades']=$stringidDescripcionActividades;
	$jason['stringdescripcionActividades__conjunto']=$stringdescripcionActividades__conjunto;
	$jason['stringeneroActividades__conjunto']=$stringeneroActividades__conjunto;
	$jason['stringfebreroActividades__conjunto']=$stringfebreroActividades__conjunto;
	$jason['stringmarzoActividades__conjunto']=$stringmarzoActividades__conjunto;
	$jason['stringabrilActividades__conjunto']=$stringabrilActividades__conjunto;
	$jason['stringmayoActividades__conjunto']=$stringmayoActividades__conjunto;
	$jason['stringjunioActividades__conjunto']=$stringjunioActividades__conjunto;
	$jason['stringjulioActividades__conjunto']=$stringjulioActividades__conjunto;
	$jason['stringagostoActividades__conjunto']=$stringagostoActividades__conjunto;
	$jason['stringseptiembreActividades__conjunto']=$stringseptiembreActividades__conjunto;
	$jason['stringoctubreActividades__conjunto']=$stringoctubreActividades__conjunto;
	$jason['stringnoviembreActividades__conjunto']=$stringnoviembreActividades__conjunto;
	$jason['stringdiciembreActividades__conjunto']=$stringdiciembreActividades__conjunto;

	$jason['stringNumeroIdentificativos']=$stringNumeroIdentificativos;

	$jason['stringidDetalle']=$stringidDetalle;
	$jason['stringrol__conjunto']=$stringrol__conjunto;
	$jason['stringdetalle__conjunto']=$stringdetalle__conjunto;


	$jason['stringidSeguimiento']=$stringidSeguimiento;
	$jason['stringactividadSeguimiento__conjunto']=$stringactividadSeguimiento__conjunto;
	$jason['stringperiocidadSeguimiento__conjunto']=$stringperiocidadSeguimiento__conjunto;
	$jason['stringmedioSeguimiento__conjunto']=$stringmedioSeguimiento__conjunto;
	$jason['stringobservacionSeguimiento__conjunto']=$stringobservacionSeguimiento__conjunto;

	$jason['stringmetas__conjuntos__seleccionables']=$stringmetas__conjuntos__seleccionables;
	$jason['stringconjunto__indicadores']=$stringconjunto__indicadores;

	echo json_encode($jason);