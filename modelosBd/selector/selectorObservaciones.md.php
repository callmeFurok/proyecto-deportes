<?php

	extract($_POST);


	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';




	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();	

 	$query="SELECT estadoProyectoCarcado,estadoCurriculumDeportivoSegundo,observacionNegativaProyectoInfras,observacionNegativaVidaJuridica,observacionCertificadoTrayectoria,observacionNegativaCertificadoPropiedad, observacionNegativaMemoriaArquitectonica,observacionNegativaPresupuestoRubro,observacionNegativaCronogramaValorado,observacionNegativaRespaldosDigitales,observacionComponentes FROM pro_documentos WHERE codigo='$codigo';";
	$resultado = $conexionEstablecida->query($query);

	while($registro = $resultado->fetch()) {

		$estadoProyectoCarcado=$registro['estadoProyectoCarcado'];
		$estadoCurriculumDeportivoSegundo=$registro['estadoCurriculumDeportivoSegundo'];

		$observacionNegativaProyectoInfras=$registro['observacionNegativaProyectoInfras'];
		$observacionNegativaVidaJuridica=$registro['observacionNegativaVidaJuridica'];
		$observacionCertificadoTrayectoria=$registro['observacionCertificadoTrayectoria'];

		$observacionNegativaCertificadoPropiedad=$registro['observacionNegativaCertificadoPropiedad'];
		$observacionNegativaMemoriaArquitectonica=$registro['observacionNegativaMemoriaArquitectonica'];
		$observacionNegativaPresupuestoRubro=$registro['observacionNegativaPresupuestoRubro'];
		$observacionNegativaCronogramaValorado=$registro['observacionNegativaCronogramaValorado'];
		$observacionNegativaRespaldosDigitales=$registro['observacionNegativaRespaldosDigitales'];
		$observacionComponentes=$registro['observacionComponentes'];

	}

	$jason['observacionNegativaProyecto']=$estadoProyectoCarcado;
	$jason['observacionNegativaCurriculum']=$estadoCurriculumDeportivoSegundo;

	$jason['observacionNegativaProyectoInfras']=$observacionNegativaProyectoInfras;
	$jason['observacionNegativaVidaJuridica']=$observacionNegativaVidaJuridica;
	$jason['observacionCertificadoTrayectoria']=$observacionCertificadoTrayectoria;
	$jason['observacionNegativaCertificadoPropiedad']=$observacionNegativaCertificadoPropiedad;
	$jason['observacionNegativaMemoriaArquitectonica']=$observacionNegativaMemoriaArquitectonica;
	$jason['observacionNegativaPresupuestoRubro']=$observacionNegativaPresupuestoRubro;
	$jason['observacionNegativaCronogramaValorado']=$observacionNegativaCronogramaValorado;
	$jason['observacionNegativaRespaldosDigitales']=$observacionNegativaRespaldosDigitales;
	$jason['observacionComponentes']=$observacionComponentes;


	echo json_encode($jason);