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

	/*=====  End of Declaración arrays  ======*/
	


	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();	

 	$query="SELECT idComprobantes,ruc__patrocinador__conjunto,nombrePatrocinador,montoContratoRealizados,fechaDeEmision,comprobantes__conjuntos__documentos,montos__facturas__conjuntos,autorizacionSri__conjuntos,actividadEconomica__conjuntos,validez__comprobante__fisico__conjuntos FROM pro_comprobante WHERE codigo='$codigoProyectoRealizados';";
	$resultado = $conexionEstablecida->query($query);


	while($registro = $resultado->fetch()) {

		$idComprobantes=$registro['idComprobantes'];
		array_push($data1, $idComprobantes);

		$ruc__patrocinador__conjunto=$registro['ruc__patrocinador__conjunto'];
		array_push($data2, $ruc__patrocinador__conjunto);

		$nombrePatrocinador=$registro['nombrePatrocinador'];
		array_push($data3, $nombrePatrocinador);

		$montoContratoRealizados=$registro['montoContratoRealizados'];
		array_push($data4, $montoContratoRealizados);

		$fechaDeEmision=$registro['fechaDeEmision'];
		array_push($data5, $fechaDeEmision);

		$comprobantes__conjuntos__documentos=$registro['comprobantes__conjuntos__documentos'];
		array_push($data6, $comprobantes__conjuntos__documentos);

		$montos__facturas__conjuntos=$registro['montos__facturas__conjuntos'];
		array_push($data7, $montos__facturas__conjuntos);


		$autorizacionSri__conjuntos=$registro['autorizacionSri__conjuntos'];
		array_push($data8, $autorizacionSri__conjuntos);

		$actividadEconomica__conjuntos=$registro['actividadEconomica__conjuntos'];
		array_push($data9, $actividadEconomica__conjuntos);

		$validez__comprobante__fisico__conjuntos=$registro['validez__comprobante__fisico__conjuntos'];
		array_push($data10, $validez__comprobante__fisico__conjuntos);


	}


	$stringidComprobantes=  implode("------", $data1);
	$stringruc__patrocinador__conjunto=  implode("------", $data2);
	$stringnombrePatrocinador=  implode("------", $data3);
	$stringmontoContratoRealizados=  implode("------", $data4);
	$stringfechaDeEmision=  implode("------", $data5);
	$stringcomprobantes__conjuntos__documentos=  implode("------", $data6);
	$stringmontos__facturas__conjuntos=  implode("------", $data7);

	$stringautorizacionSri__conjuntos=  implode("------", $data8);
	$stringactividadEconomica__conjuntos=  implode("------", $data9);
	$stringvalidez__comprobante__fisico__conjuntos=  implode("------", $data10);

	$jason['stringidComprobantes']=$stringidComprobantes;
	$jason['stringruc__patrocinador__conjunto']=$stringruc__patrocinador__conjunto;
	$jason['stringnombrePatrocinador']=$stringnombrePatrocinador;
	$jason['stringmontoContratoRealizados']=$stringmontoContratoRealizados;
	$jason['stringfechaDeEmision']=$stringfechaDeEmision;
	$jason['stringcomprobantes__conjuntos__documentos']=$stringcomprobantes__conjuntos__documentos;
	$jason['stringmontos__facturas__conjuntos']=$stringmontos__facturas__conjuntos;

	$jason['stringautorizacionSri__conjuntos']=$stringautorizacionSri__conjuntos;
	$jason['stringactividadEconomica__conjuntos']=$stringactividadEconomica__conjuntos;
	$jason['stringvalidez__comprobante__fisico__conjuntos']=$stringvalidez__comprobante__fisico__conjuntos;
	
	echo json_encode($jason);