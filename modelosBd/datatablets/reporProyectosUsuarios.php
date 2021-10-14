<?php
	require_once "../../conexion/conexion.php";

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

 	$conexionEstablecida->exec("set names utf8");

 	extract($_POST);



	$query="SELECT a.idUsuario,a.tipoDeportistas, (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a1.nombreOrganismo, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM pro_federacion AS a1 WHERE a1.rucOrganismo=a.idUsuario) AS nombreOrganismo, (SELECT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a2.nombreCompleto, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') FROM pro_deportistaorganismo AS a2 WHERE a2.cedulaUsuario=a.idUsuario) AS nombreDeportistas, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombre,a.monto,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.alcanse, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS alcanse,a.codigo,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(b.proyectoCargadoPdf, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS proyectoCargadoPdf,b.estadoProyectoCarcado,b.curriculumDeportivoSegundo,b.estadoCurriculumDeportivoSegundo, b.certificadoFederacionPdf,b.estadoCertificadoFederacion,b.certificadoOrganismoSuperiorPdf,b.estadoCertificadoOrganismoSuperior, b.solicitudFederacionPdf,b.estadoSolicitudFederacion,b.avalFederacionPdf,b.estadoAvalFederacion,b.solciitudAvalPdf,b.estadoSolicitudAval,b.avalOrganismoSuperiorPdf,b.estadoAvalOrganismoSuperior,a.fecha,a.estado,a.idRol,a.califica,a.certifica, c.nombre AS nombreFuncionarios,c.apellido,a.observacionNiega,b.contrato,c.email,a.calificarDevuelto,b.validaProyecto,b.validaCurriculum,b.varlidaCertificadoFederacion,b.validaCertificadoOrganismoSuperior,b.validaEstadoSolicitudFederacion,b.validaAvalFederacion,b.validaSolitudAval,b.validaAvalOrganismoSuperior,a.rectificacion,a.idUsuarioRelativo, (SELECT a1.email FROM pro_federacion AS a1 WHERE a1.rucOrganismo=a.idUsuario LIMIT 1) AS emailOrganismo, (SELECT a2.email FROM pro_deportistaorganismo AS a2 WHERE a2.cedulaUsuario=a.idUsuario LIMIT 1) AS emailDeportistas,a.siRespuestas,a.observacionCertificado,b.montoProyecto,a.fechaCertifica,a.tramiteCorresponde2,b.numeroRucPatrocinador,b.nombrePatrocinador,b.montoContratoRealizados,b.montoDelProyecto,b.fechaDeEmision,a.modificacion,b.certificadoTrayectoria,(SELECT a2.cedulaUsuario FROM pro_deportistaorganismo AS a2 WHERE a2.cedulaUsuario=a.idUsuario LIMIT 1) AS cedulaUsuario,(SELECT a1.rucOrganismo FROM pro_federacion AS a1 WHERE a1.rucOrganismo=a.idUsuario LIMIT 1) AS rucOrganismo,b.acreditarVidaJuridica,b.certificacionTrayectoria,b.certificadoPropiedades,b.memoriaTecnicaArquitectonica,b.planosArquitecntonicos,b.presupuestoRubro,b.cronogramaValorado,b.respaldosNuevosDigitales,a.componentesInfra,a.componentesTecnolo,a.seguimiento,a.informesNeg,a.observacionInformes,a.mensajeSegui,b.observacionComponentes FROM pro_proyecto AS a LEFT JOIN pro_documentos AS b ON b.codigo=a.codigo LEFT JOIN th_usuario AS c ON c.id_usuario=a.idUsuarioRelativo WHERE a.idUsuario='$idUsuario' GROUP BY a.codigo ORDER BY a.fecha DESC;";

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

 