<?php
	require_once "../../conexion/conexion.php";

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

 	// $conexionEstablecida->exec("set names utf8");

 	extract($_POST);

 	if ($fisicamenteEstructura=="15") {

 		$consultas="componentesInfra='A'";
 		
 	}


 	if($fisicamenteEstructura=="22"){

 		$consultas="componentesTecnolo='A'";

 	}

 	if($fisicamenteEstructura=="11"){

 		$consultas="a.difusion='A'";

 	}


	$query="SELECT a.idTramite,a.tipoDeportistas, (SELECT a1.nombreOrganismo FROM pro_federacion AS a1 WHERE a1.rucOrganismo=a.idUsuario) AS nombreOrganismo, (SELECT a2.nombreCompleto FROM pro_deportistaorganismo AS a2 WHERE a2.cedulaUsuario=a.idUsuario) AS nombreDeportistas, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombre,a.monto,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.alcanse, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS alcanse,a.codigo,b.proyectoCargadoPdf,b.estadoProyectoCarcado,b.curriculumDeportivoSegundo,b.estadoCurriculumDeportivoSegundo, b.certificadoFederacionPdf,b.estadoCertificadoFederacion,b.certificadoOrganismoSuperiorPdf,b.estadoCertificadoOrganismoSuperior, b.solicitudFederacionPdf,b.estadoSolicitudFederacion,b.avalFederacionPdf,b.estadoAvalFederacion,b.solciitudAvalPdf,b.estadoSolicitudAval,b.avalOrganismoSuperiorPdf,b.estadoAvalOrganismoSuperior,a.fecha,a.estado,a.idRol, (SELECT a1.email FROM pro_federacion AS a1 WHERE a1.rucOrganismo=a.idUsuario) AS emailOrganismo, (SELECT a2.email FROM pro_deportistaorganismo AS a2 WHERE a2.cedulaUsuario=a.idUsuario) AS emailDeportistas,a.califica,a.certifica,a.idUsuarioRelativo,(SELECT a1.rucOrganismo FROM pro_federacion AS a1 WHERE a1.rucOrganismo=a.idUsuario) AS rucOrganismo,(SELECT a2.cedulaUsuario FROM pro_deportistaorganismo AS a2 WHERE a2.cedulaUsuario=a.idUsuario) AS cedulaUsuario,a.fechaCertifica,a.calificarDevuelto,b.validaProyecto,b.validaCurriculum,b.varlidaCertificadoFederacion,b.validaCertificadoOrganismoSuperior,b.validaEstadoSolicitudFederacion,b.validaAvalFederacion,b.validaSolitudAval,b.validaAvalOrganismoSuperior,a.rectificacion,a.recomendacion,a.obserbaRecomiendaDir,a.fechaCalifica,b.contrato,a.observacionCertificado,a.calificaCertificado,a.certificaEnvio,b.acreditarVidaJuridica,b.certificacionTrayectoria,b.certificadoPropiedades,b.memoriaTecnicaArquitectonica,b.presupuestoRubro,b.cronogramaValorado,b.respaldosNuevosDigitales,b.proyectoCargadoInfrasPdf,b.radioInfraestructura,b.observacionNegativaProyectoInfras,b.radioVidaJuridica,b.observacionNegativaVidaJuridica,b.certificadoTrayectoria,b.observacionCertificadoTrayectoria,b.certificadoPropiedadC,b.observacionNegativaCertificadoPropiedad,b.memoriaArquitectonica,b.observacionNegativaMemoriaArquitectonica,b.presupuestoRubroChecked,b.observacionNegativaPresupuestoRubro,b.cronogramasValoradosChecked,b.observacionNegativaCronogramaValorado,b.respaldosDigitaChecked,b.observacionNegativaRespaldosDigitales,a.modificacion,a.observaTecs,a.radioTecs,a.radioProyectoComuni,a.observaNegativaComuni FROM pro_proyecto AS a INNER JOIN pro_documentos AS b ON b.codigo=a.codigo WHERE $consultas AND (a.califica IS NULL OR a.certifica IS NULL)  GROUP BY a.codigo;";

	$resultado = $conexionEstablecida->query($query);

	if (!$resultado) {
		echo "error";
	}else{ 
		$arreglo=array();
		while($data=$resultado->fetch()){
			$arreglo["data"][]=$data;
		}
		echo json_encode($arreglo);
	}

 