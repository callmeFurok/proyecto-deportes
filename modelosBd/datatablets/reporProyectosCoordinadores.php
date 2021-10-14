<?php
	require_once "../../conexion/conexion.php";

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

 	// $conexionEstablecida->exec("set names utf8");

 	extract($_POST);

 	if($fisicamenteEstructura=="2" || $fisicamenteEstructura==2){

		$query="SELECT a.idTramite,a.tipoDeportistas, (SELECT a1.nombreOrganismo FROM pro_federacion AS a1 WHERE a1.rucOrganismo=a.idUsuario LIMIT 1) AS nombreOrganismo, (SELECT a2.nombreCompleto FROM pro_deportistaorganismo AS a2 WHERE a2.cedulaUsuario=a.idUsuario LIMIT 1) AS nombreDeportistas, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombre,a.monto,a.alcanse,a.codigo,b.proyectoCargadoPdf,b.estadoProyectoCarcado,b.curriculumDeportivoSegundo,b.estadoCurriculumDeportivoSegundo, b.certificadoFederacionPdf,b.estadoCertificadoFederacion,b.certificadoOrganismoSuperiorPdf,b.estadoCertificadoOrganismoSuperior, b.solicitudFederacionPdf,b.estadoSolicitudFederacion,b.avalFederacionPdf,b.estadoAvalFederacion,b.solciitudAvalPdf,b.estadoSolicitudAval,b.avalOrganismoSuperiorPdf,b.estadoAvalOrganismoSuperior,a.fecha,a.estado,a.idRol, (SELECT a1.email FROM pro_federacion AS a1 WHERE a1.rucOrganismo=a.idUsuario LIMIT 1) AS emailOrganismo, (SELECT a2.email FROM pro_deportistaorganismo AS a2 WHERE a2.cedulaUsuario=a.idUsuario LIMIT 1) AS emailDeportistas, a.califica, a.certifica,a.siRespuestas,a.regresaTramite,a.observacionRegresaTramite,(SELECT a1.rucOrganismo FROM pro_federacion AS a1 WHERE a1.rucOrganismo=a.idUsuario LIMIT 1) AS rucOrganismo,(SELECT a2.cedulaUsuario FROM pro_deportistaorganismo AS a2 WHERE a2.cedulaUsuario=a.idUsuario LIMIT 1) AS cedulaUsuario,a.fechaCalifica,b.acreditarVidaJuridica,b.certificacionTrayectoria,b.certificadoPropiedades,b.memoriaTecnicaArquitectonica,b.presupuestoRubro,b.cronogramaValorado,b.respaldosNuevosDigitales,b.proyectoCargadoInfrasPdf FROM pro_proyecto AS a LEFT JOIN pro_documentos AS b ON b.codigo=a.codigo WHERE financiero='A' AND a.idUsuarioFinanciero2 IS NULL  GROUP BY a.codigo;";


 	}else{

		$query="SELECT a.idTramite,a.tipoDeportistas, (SELECT a1.nombreOrganismo FROM pro_federacion AS a1 WHERE a1.rucOrganismo=a.idUsuario LIMIT 1) AS nombreOrganismo, (SELECT a2.nombreCompleto FROM pro_deportistaorganismo AS a2 WHERE a2.cedulaUsuario=a.idUsuario LIMIT 1) AS nombreDeportistas, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Á'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó') AS nombre,a.monto,a.alcanse,a.codigo,b.proyectoCargadoPdf,b.estadoProyectoCarcado,b.curriculumDeportivoSegundo,b.estadoCurriculumDeportivoSegundo, b.certificadoFederacionPdf,b.estadoCertificadoFederacion,b.certificadoOrganismoSuperiorPdf,b.estadoCertificadoOrganismoSuperior, b.solicitudFederacionPdf,b.estadoSolicitudFederacion,b.avalFederacionPdf,b.estadoAvalFederacion,b.solciitudAvalPdf,b.estadoSolicitudAval,b.avalOrganismoSuperiorPdf,b.estadoAvalOrganismoSuperior,a.fecha,a.estado,a.idRol, (SELECT a1.email FROM pro_federacion AS a1 WHERE a1.rucOrganismo=a.idUsuario LIMIT 1) AS emailOrganismo, (SELECT a2.email FROM pro_deportistaorganismo AS a2 WHERE a2.cedulaUsuario=a.idUsuario LIMIT 1) AS emailDeportistas, a.califica, a.certifica,a.siRespuestas,a.regresaTramite,a.observacionRegresaTramite,(SELECT a1.rucOrganismo FROM pro_federacion AS a1 WHERE a1.rucOrganismo=a.idUsuario LIMIT 1) AS rucOrganismo,(SELECT a2.cedulaUsuario FROM pro_deportistaorganismo AS a2 WHERE a2.cedulaUsuario=a.idUsuario LIMIT 1) AS cedulaUsuario,a.fechaCalifica,b.acreditarVidaJuridica,b.certificacionTrayectoria,b.certificadoPropiedades,b.memoriaTecnicaArquitectonica,b.presupuestoRubro,b.cronogramaValorado,b.respaldosNuevosDigitales,b.proyectoCargadoInfrasPdf FROM pro_proyecto AS a LEFT JOIN pro_documentos AS b ON b.codigo=a.codigo WHERE a.idUsuarioRelativo='$idUsuario' AND (a.califica IS NULL OR a.certifica IS NULL)  GROUP BY a.codigo;";

 	}


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

 