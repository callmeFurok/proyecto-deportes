<?php

	extract($_POST);

	require_once "../../conexion/conexion.php";

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

	$query="SELECT nombreCompleto FROM pro_deportistaorganismo WHERE cedulaUsuario='$cedulaRuc';";
	$resultado = $conexionEstablecida->query($query);

	while($registro = $resultado->fetch()) {

		$nombreCompleto=$registro['nombreCompleto'];
			
	}


	$query2="SELECT nombreOrganismo FROM pro_federacion WHERE rucOrganismo='$cedulaRuc';";
	$resultado2 = $conexionEstablecida->query($query2);

	while($registro2 = $resultado2->fetch()) {

		$nombreOrganismo=$registro2['nombreOrganismo'];
			
	}


	if (!empty($nombreCompleto)) {
		
		$nombrePortada=$nombreCompleto;

	}else{

		$nombrePortada=$nombreOrganismo;

	}


	
	/*==============================
	=            Fechas            =
	==============================*/
	

	setlocale(LC_TIME, "spanish");

	$anio = date('Y');

	$mes=date('m');

	$dateObj   = DateTime::createFromFormat('!m', $mes);
	$monthName = strftime('%B', $dateObj->getTimestamp());

	$dia=date('d');	
	
	/*=====  End of Fechas  ======*/
	
	/*===================================================
	=            Recuperando datos generales            =
	===================================================*/
	
	if (!empty($nombreOrganismo)) {
 			
		$query2="SELECT a.idFederacion,a.rucOrganismo,a.nombreOrganismo,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.provinciaFederacion) AS provinciaFederacion,(SELECT a1.nombreCanton FROM in_md_canton AS a1 WHERE a1.idCanton=a.cantonFederacion) AS cantonFederacion,(SELECT a1.nombreParroquia FROM in_md_parroquia AS a1 WHERE a1.idParroquia=a.parroquiaFederacion) AS parroquiaFederacion,a.telefono,a.direccion,a.email,b.idTramite,SUBSTRING(nombreOrganismo, 1, 3) AS nombreCompletoSin,YEAR(NOW()) AS anioFechas,a.tipoOrganismo,c.cedulaRepresentante,c.nombreReperesentante FROM pro_federacion AS a INNER JOIN pro_representante AS c ON c.idFederacion=a.idFederacion LEFT JOIN pro_proyecto AS b ON a.usuario=b.idUsuario  WHERE a.usuario='$cedulaRuc' GROUP BY a.usuario ORDER BY b.idTramite ASC LIMIT 1;";

		$resultado2 = $conexionEstablecida->query($query2);

		while($registro2 = $resultado2->fetch()) {

			$idFederacion=$registro2['idFederacion'];
			$rucOrganismo=$registro2['rucOrganismo'];
			$nombreOrganismo=$registro2['nombreOrganismo'];
			$provinciaFederacion=$registro2['provinciaFederacion'];
			$cantonFederacion=$registro2['cantonFederacion'];
			$parroquiaFederacion=$registro2['parroquiaFederacion'];
			$telefono=$registro2['telefono'];
			$direccion=$registro2['direccion'];
			$email=$registro2['email'];
			$nombreCompletoSin=$registro2['nombreCompletoSin'];
			$anioFechas=$registro2['anioFechas'];
			$tipoOrganismo=$registro2['tipoOrganismo'];
			$cedulaRepresentante=$registro2['cedulaRepresentante'];
			$nombreReperesentante=$registro2['nombreReperesentante'];
			
		}

		/*=========================================
		=            Datos direcciones            =
		=========================================*/
		$query20="SELECT a.idFederacion,a.direccion,b.callePrincipal,b.calleSecundaria,b.numeracion,b.referencia,c.provincia AS provinciaRe, c.canton AS cantonRe, c.parroquia AS parroquiaRe, c.callePrincipal AS callePrincipalRe, c.numeracion AS numeracionReSegundo, c.calleSecundaria AS calleSecundariaRe, c.referencia AS referenciaRe, c.email AS emailRe, c.convencional AS convencionalRe, c.celular AS celularRe,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=c.provincia) AS provinciaNombreDoce,(SELECT a1.nombreCanton FROM in_md_canton AS a1 WHERE a1.idCanton=c.canton) AS cantonNombre, (SELECT a1.nombreParroquia FROM in_md_parroquia AS a1 WHERE a1.idParroquia=c.parroquia) AS parroquiaNombre  FROM pro_federacion AS a INNER JOIN pro_direccionesfederacion AS b ON b.idFederacion=a.idFederacion INNER JOIN pro_representante AS c ON c.idFederacion=a.idFederacion WHERE a.rucOrganismo='$cedulaRuc' ORDER BY b.idDireccionOrganismo DESC LIMIT 1;";
		$resultado20 = $conexionEstablecida->query($query20);

		while($registro20 = $resultado20->fetch()) {

			$idFederacion=$registro20['idFederacion'];
			$direccion=$registro02['direccion'];
			$callePrincipal=$registro20['callePrincipal'];
			$calleSecundaria=$registro20['calleSecundaria'];
			$numeracion=$registro20['numeracion'];
			$referencia=$registro20['referencia'];
			$provinciaRe=$registro20['provinciaRe'];
			$cantonRe=$registro20['cantonRe'];
			$parroquiaRe=$registro20['parroquiaRe'];
			$callePrincipalRe=$registro20['callePrincipalRe'];
			$numeracionReSegundo=$registro20['numeracionReSegundo'];
			$calleSecundariaRe=$registro20['calleSecundariaRe'];
			$referenciaRe=$registro20['referenciaRe'];
			$emailRe=$registro20['emailRe'];
			$convencionalRe=$registro20['convencionalRe'];
			$celularRe=$registro20['celularRe'];
			$provinciaNombreDoce=$registro20['provinciaNombreDoce'];
			$cantonNombre=$registro20['cantonNombre'];
			$parroquiaNombre=$registro20['parroquiaNombre'];		

		}
		
		/*=====  End of Datos direcciones  ======*/
		


 	}else{

		$query2="SELECT a.idAteleta,a.tipoOrganismo,a.cedulaUsuario,a.nombreCompleto,a.fechaNacimiento,a.sexo,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.provincia) AS provincia, (SELECT a1.nombreCanton FROM in_md_canton AS a1 WHERE a1.idCanton=a.canton) AS canton, (SELECT a1.nombreParroquia FROM in_md_parroquia AS a1 WHERE a1.idParroquia=a.parroquia) AS parroquia,a.telefono,a.direccion,a.email,b.idTramite,SUBSTRING(nombreCompleto, 1, 3) AS nombreCompletoSin,YEAR(NOW()) AS anioFechas,a.discapacidad FROM pro_deportistaorganismo AS a LEFT JOIN pro_proyecto AS b ON a.usuario=b.idUsuario WHERE a.usuario='$cedulaRuc' GROUP BY a.usuario ORDER BY b.idTramite ASC LIMIT 1;";

		$resultado2 = $conexionEstablecida->query($query2);


		while($registro2 = $resultado2->fetch()) {

			$idAteleta=$registro2['idAteleta'];
			$tipoOrganismo=$registro2['tipoOrganismo'];
			$cedulaUsuario=$registro2['cedulaUsuario'];
			$nombreCompleto=$registro2['nombreCompleto'];
			$fechaNacimiento=$registro2['fechaNacimiento'];
			$sexo=$registro2['sexo'];
			$provincia=$registro2['provincia'];
			$canton=$registro2['canton'];
			$parroquia=$registro2['parroquia'];
			$telefono=$registro2['telefono'];
			$direccion=$registro2['direccion'];
			$email=$registro2['email'];
			$nombreCompletoSin=$registro2['nombreCompletoSin'];
			$anioFechas=$registro2['anioFechas'];
			$discapacidad=$registro2['discapacidad'];

		}


		$query2002="SELECT callePrincipalCiudadano,numeracionCiudadao,calleSecundariaCiudadano,referenciaCiudadano,email,telCiudadano,telefono FROM pro_deportistaorganismo WHERE cedulaUsuario='$cedulaRuc';";
		$resultado2002 = $conexionEstablecida->query($query2002);

		while($registro2002 = $resultado2002->fetch()) {

			$callePrincipalCiudadano=$registro2002['callePrincipalCiudadano'];
			$numeracionCiudadao=$registro2002['numeracionCiudadao'];
			$calleSecundariaCiudadano=$registro2002['calleSecundariaCiudadano'];
			$referenciaCiudadano=$registro2002['referenciaCiudadano'];
			$email=$registro2002['email'];
			$telCiudadano=$registro2002['telCiudadano'];
			$telefono=$registro2002['telefono'];

		}


		$queryRepresentantesM="SELECT a.idRepresentanteAtletas,a.representanteLegalCedulaAtletas,a.representanteLegalAtletas,a.telefonoAtletaRepresentantess,a.telefonoRepresentanteAtletas,a.emailRepresentanteAtletas,a.provinciaFederacionRepresentanteAtletas,a.cantonFederacionRepresentanteAtletas,a.parroquiaFederacionRepresentanteAtletas,a.calleprincipalRepresentanteAtletas,a.callesecundariaRepresentanteAtletas,a.numeracionRepresentanteAtletas,a.referenciaRepresentanteAtletas,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.provinciaFederacionRepresentanteAtletas) AS provincia, (SELECT a1.nombreCanton FROM in_md_canton AS a1 WHERE a1.idCanton=a.cantonFederacionRepresentanteAtletas) AS canton, (SELECT a1.nombreParroquia FROM in_md_parroquia AS a1 WHERE a1.idParroquia=a.parroquiaFederacionRepresentanteAtletas) AS parroquia FROM pro_representante_atletas AS a WHERE a.idAtletas='$idAteleta';";

		$resultadoRepresentantesM = $conexionEstablecida->query($queryRepresentantesM);

		while($registroRepresentantesM = $resultadoRepresentantesM->fetch()) {

			$idRepresentanteAtletas=$registroRepresentantesM['idRepresentanteAtletas'];
			$representanteLegalCedulaAtletas=$registroRepresentantesM['representanteLegalCedulaAtletas'];
			$representanteLegalAtletas=$registroRepresentantesM['representanteLegalAtletas'];
			$telefonoAtletaRepresentantess=$registroRepresentantesM['telefonoAtletaRepresentantess'];
			$telefonoRepresentanteAtletas=$registroRepresentantesM['telefonoRepresentanteAtletas'];
			$emailRepresentanteAtletas=$registroRepresentantesM['emailRepresentanteAtletas'];
			$provinciaFederacionRepresentanteAtletas=$registroRepresentantesM['provinciaFederacionRepresentanteAtletas'];
			$cantonFederacionRepresentanteAtletas=$registroRepresentantesM['cantonFederacionRepresentanteAtletas'];
			$parroquiaFederacionRepresentanteAtletas=$registroRepresentantesM['parroquiaFederacionRepresentanteAtletas'];
			$calleprincipalRepresentanteAtletas=$registroRepresentantesM['calleprincipalRepresentanteAtletas'];
			$callesecundariaRepresentanteAtletas=$registroRepresentantesM['callesecundariaRepresentanteAtletas'];
			$numeracionRepresentanteAtletas=$registroRepresentantesM['numeracionRepresentanteAtletas'];
			$referenciaRepresentanteAtletas=$registroRepresentantesM['referenciaRepresentanteAtletas'];

			$nombreProvincia=$registroRepresentantesM['provincia'];
			$nombreCanton=$registroRepresentantesM['canton'];
			$nombreParroquia=$registroRepresentantesM['parroquia'];

		}

		$fecha_nacimiento = new DateTime($fechaNacimiento);
		$hoy = new DateTime();
		$edad = $hoy->diff($fecha_nacimiento);

		$usuarioEdades=$edad;

 	}	
	
	/*=====  End of Recuperando datos generales  ======*/
	
		
	/*==========================================
	=            Consulta proyectos            =
	==========================================*/
	
	$query3="SELECT nombreProyecto,presupuestoLetras,sectorRecreacion,sectorDeporteFormativo,sectorDeporteConvencional,sectorDeporteAltoRendimiento,sectorDeporteProfesional,presupuesto FROM pro_proyetosreferencias WHERE codigoProyecto='$codigoProyectoPdf';";
	$resultado3 = $conexionEstablecida->query($query3);

	while($registro3 = $resultado3->fetch()) {

		$nombreProyecto=$registro3['nombreProyecto'];
		$presupuestoLetras=$registro3['presupuestoLetras'];
		$sectorRecreacion=$registro3['sectorRecreacion'];
		$sectorDeporteFormativo=$registro3['sectorDeporteFormativo'];
		$sectorDeporteConvencional=$registro3['sectorDeporteConvencional'];
		$sectorDeporteAltoRendimiento=$registro3['sectorDeporteAltoRendimiento'];
		$sectorDeporteProfesional=$registro3['sectorDeporteProfesional'];
		$presupuesto=$registro3['presupuesto'];
			
	}

	
	/*=====  End of Consulta proyectos  ======*/
 
 	 /*==============================================
	 =            Ingreso y final fechas            =
	 ==============================================*/
	 
	 	$query3545="SELECT inicioPeriodos,finPeriodos FROM pro_proyetosreferencias WHERE codigoProyecto='$codigoProyectoPdf';";
		$resultado3545 = $conexionEstablecida->query($query3545);

		while($registro3545 = $resultado3545->fetch()) {

			$inicioPeriodos=$registro3545['inicioPeriodos'];
			$finPeriodos=$registro3545['finPeriodos'];
				
		}

		$arrayinicioPeriodos=explode("/", $inicioPeriodos);
		$arrayfinPeriodos=explode("/", $finPeriodos);

		$dateObjInicio   = DateTime::createFromFormat('!m', $arrayinicioPeriodos[1]);
		$monthNameInicio = strftime('%B', $dateObjInicio->getTimestamp());

		$dateObjFin   = DateTime::createFromFormat('!m', $arrayfinPeriodos[1]);
		$monthNameFin = strftime('%B', $dateObjFin->getTimestamp());
	 
	 /*=====  End of Ingreso y final fechas  ======*/

?>


<!--=======================================
=           	Sección Css              =
========================================-->

<link href="../../layout/styles/css/estilosPdf.css?v=1.0.2" rel="stylesheet" type="text/css" media="all">

<!--====  End of	Sección Css  ====-->

<!--=====================================================
=            Contenido Principal formularios            =
======================================================-->

<!--=============================
=            Portada            =
==============================-->

<div class="margen__borde">
		
	<table class="tabla__bordada">

		<tr>
			<td class="contenedor___nombre__proyecto" align="right">
				PROYECTO SUSCEPTIBLE DE CONSIDERACIÓN PARA LA APLICACIÓN DE LA 
			</td>
		</tr>

		<tr>
			<td class="contenedor___nombre__proyecto" align="right">
				DEDUCCIÓN DEL 100% ADICIONAL PARA EL CÁLCULO DE LA BASE IMPONIBLE 
			</td>
		</tr>


		<tr>
			<td class="contenedor___nombre__proyecto" align="right">
				DEL IMPUESTO A LA RENTA 
			</td>
		</tr>

	</table>	


	<table class="tabla__bordada tabla__nombre__portada">

		<tr>
			<td class="contenedor___nombre__proyecto__portada" align="center">
				<?= $nombreProyecto?>
			</td>
		</tr>

	</table>	

	<table class="tabla__bordada tabla__nombre__portada" style="border-top:.5px solid black;border-bottom:1px solid black; position: relative; top:-2em;">

		<tr>

			<td style="width:20%; font-weight:bold;">
				Nombre del solicitante:
			</td>

			<td>
				<?= strtoupper($nombrePortada)?>
			</td>

		</tr>

		<tr style="padding-top: 1em;">

			<td style="width:20%; font-weight:bold;">Fecha de presentación:</td>

			<td>
				<?= $dia." de ".strtolower($monthName)." del ".$anio?>
			</td>
			
		</tr>

		<tr style="padding-top: 1em;">

			<td style="width:20%; font-weight:bold;">Fecha de inicio</td>

			<td>
				<?=$arrayinicioPeriodos[0]." de ".strtolower($monthNameInicio)." del ".$arrayinicioPeriodos[2]?>
			</td>
			
		</tr>

		<tr style="padding-top: 1em;">

			<td style="width:20%; font-weight:bold;">Fecha de fin</td>

			<td>
				<?=$arrayfinPeriodos[0]." de ".strtolower($monthNameFin)." del ".$arrayfinPeriodos[2]?>
			</td>
			
		</tr>

	</table>	


</div>

<!--====  End of Portada  ====-->

<hr class="salto__de__pagina">


<!--======================================
=            Datos personales            =
=======================================-->

<div class="margen__borde">

	<table class="tabla__bordada">

		<tr>
			<td class="nombre__apartados__principales" align="left">
				1&nbsp;&nbsp;&nbsp;&nbsp;DATOS GENERALES
			</td>
		</tr>

		<tr>
			<td class="nombre__apartados__secundarios" align="left">
				1.1&nbsp;&nbsp;&nbsp;&nbsp;INFORMACIÓN GENERAL 
			</td>
		</tr>


	</table>	

	
	<?php if (!empty($nombreOrganismo)): ?>

	<table class="tabla__bordada__2">

		<tr>
			<td class="nombre__apartados__secundarios" align="left" colspan="2">
				1.1.1&nbsp;&nbsp;&nbsp;&nbsp;Datos de la federación
			</td>
		</tr>

		<tr>

			<td class="ancho__referencias fila__uno" align="left">
				<li style="list-style: disc; margin-left:1em;">Nombre:</li>
			</td>

			<td class="fila__uno">
				<?=$nombreOrganismo?>
			</td>

		</tr>

		<tr>

			<td class="ancho__referencias fila__uno" align="left">
				<li style="list-style: disc; margin-left:1em;">RUC:</li>
			</td>

			<td class="fila__uno">
				<?=$rucOrganismo?>
			</td>

		</tr>

	</table>


	<table class="tabla__bordada__2 tabla__top">
		
		<tr>

			<td class="ancho__referencias fila__uno" align="left" align="left" colspan="6">
				<li style="list-style: disc; margin-left:1em;">Dirección de domicilio:</li> 
			</td>

		</tr>


		<tr>

			<td class="ancho__referencias__2 fila__uno" style="list-style: circle;">

				<li style="margin-left: 2em;">Provincia:</li>

			</td>

			<td class="fila__uno ancho__referencias__4" align="left">

				&nbsp;&nbsp;&nbsp;<?= strtoupper($provinciaFederacion) ?>

			</td>

		</tr>

		<tr>

			<td class="ancho__referencias__2 fila__uno"  style="list-style: circle;">

				<li style="margin-left: 2em;">Cantón:</li>

			</td>

			<td class="fila__uno" align="left">

				<?= strtoupper($cantonFederacion) ?>

			</td>

		</tr>


		<tr>

			<td class="ancho__referencias__2 fila__uno"  style="list-style: circle;">

				<li style="margin-left: 2em;">Parroquia:</li>

			</td>

			<td class="fila__uno" align="left">

				<?= strtoupper($parroquiaFederacion) ?>

			</td>

		</tr>

		<tr>

			<td class="ancho__referencias__2 fila__uno"  style="list-style: circle;">

				<li style="margin-left: 2em;">Calle Principal:</li>

			</td>

			<td class="fila__uno" align="left">

				<?= strtoupper($callePrincipalRe) ?>

			</td>

		</tr>

		<tr>

			<td class="ancho__referencias__2 fila__uno"  style="list-style: circle;">

				<li style="margin-left: 2em;">Numeración:</li>

			</td>

			<td class="fila__uno" align="left">

				<?= strtoupper($numeracion) ?>

			</td>

		</tr>

		<tr>

			<td class="ancho__referencias__2 fila__uno"  style="list-style: circle;">

				<li style="margin-left: 2em;">Calle secundaria:</li>

			</td>

			<td class="fila__uno" align="left">

				<?= strtoupper($calleSecundaria) ?>

			</td>

		</tr>

		<tr>

			<td class="ancho__referencias__2 fila__uno"  style="list-style: circle;">

				<li style="margin-left: 2em;">Referencia:</li>

			</td>

			<td class="fila__uno" align="left">

				<?= strtoupper($referencia) ?>

			</td>


		</tr>


	</table>


	<table class="tabla__bordada__2">

		<tr>
			<td class="nombre__apartados__secundarios" align="left" colspan="2">
				1.1.2&nbsp;&nbsp;&nbsp;&nbsp;Datos del representante legal
			</td>
		</tr>

		<tr>

			<td class="ancho__referencias fila__uno" align="left">
				<li style="list-style: disc; margin-left:1em;">Nombres:</li>
			</td>

			<td class="fila__uno">
				<?=$nombreReperesentante?>
			</td>

		</tr>

		<tr>

			<td class="ancho__referencias fila__uno" align="left">
				<li style="list-style: disc; margin-left:1em;">CI:</li>
			</td>

			<td class="fila__uno">
				<?=$cedulaRepresentante?>
			</td>

		</tr>

	</table>


	<table class="tabla__bordada__2 tabla__top">
		
		<tr>

			<td class="ancho__referencias fila__uno" align="left" align="left" colspan="6">
				Dirección: 
			</td>

		</tr>

		<tr>

			<td class="ancho__referencias__2 fila__uno" style="list-style: circle;">

				<li style="margin-left: 2em;">Provincia:</li>

			</td>

			<td class="fila__uno" align="left">

				<?= strtoupper($provinciaNombreDoce) ?>

			</td>

		</tr>

		<tr>

			<td class="ancho__referencias__2 fila__uno" style="list-style: circle;">

				<li style="margin-left: 2em;">Cantón:</li>

			</td>

			<td class="fila__uno" align="left">

				<?= strtoupper($cantonNombre) ?>

			</td>

		</tr>

		<tr>

			<td class="ancho__referencias__2 fila__uno" style="list-style: circle;">

				<li style="margin-left: 2em;">Calle Principal:</li>

			</td>

			<td class="fila__uno" align="left">

				<?= strtoupper($callePrincipalRe) ?>

			</td>

		</tr>

		<tr>

			<td class="ancho__referencias__2 fila__uno" style="list-style: circle;">

				<li style="margin-left: 2em;">Numeración:</li>

			</td>

			<td class="fila__uno" align="left">

				<?= strtoupper($numeracionReSegundo) ?>

			</td>

		</tr>

		<tr>

			<td class="ancho__referencias__2 fila__uno" style="list-style: circle;">

				<li style="margin-left: 2em;">Calle secundaria:</li>

			</td>

			<td class="fila__uno" align="left">

				<?= strtoupper($calleSecundariaRe) ?>

			</td>

		</tr>

		<tr>


			<td class="ancho__referencias__2 fila__uno" style="list-style: circle;">

				<li style="margin-left: 2em;">Referencia:</li>

			</td>

			<td class="fila__uno" align="left">

				<?= strtoupper($referenciaRe) ?>

			</td>

		</tr>


	</table>

	<table class="tabla__bordada__2 tabla__top__2">

		<tr>

			<td  class="fila__uno" style="width:20%; font-weight:bold;">

				<li style="list-style: disc; margin-left:1em;">Correo electrónico:</li>

			</td>

			<td class="fila__uno" align="left" colspan="2">

				<?=strtoupper($emailRe)?>

			</td>

		</tr>

		<tr>

			<td  class="fila__uno" style="width:20%; font-weight:bold;">

				<li style="list-style: disc; margin-left:1em;">Teléfono convencional:</li>

			</td>

			<td class="fila__uno" align="left">

				<?=$convencionalRe?>

			</td>

		</tr>

		<tr>


			<td class="fila__uno" style="width:20%; font-weight:bold;">

				<li style="list-style: disc; margin-left:1em;">Teléfono celular:</li>

			</td>

			<td class="fila__uno" align="left">

				<?=$celularRe?>

			</td>


		</tr>

	</table>


	<?php endif ?>

	<?php if (empty($nombreOrganismo)): ?>


	<table class="tabla__bordada__2 tabla__top">
		

		<tr>
			<td class="nombre__apartados__secundarios" align="left" colspan="2" style="text-align: justify;">
				1.1.1&nbsp;&nbsp;&nbsp;&nbsp;Datos del deportista federado:
			</td>
		</tr>

		<tr>
			<td  class="fila__uno" style="width:15%; font-weight:bold;" align="left">

				<li style="list-style: disc; margin-left:1em;">Nombres y apellidos:</li>

			</td>

			<td class="fila__uno" align="left">

				<?=$nombreCompleto?>
			</td>


		</tr>

		<tr>

			<td  class="fila__uno" style="width:15%; font-weight:bold;" align="left">

				<li style="list-style: disc; margin-left:1em;">CI:</li>

			</td>

			<td class="fila__uno" align="left">

				<?=$cedulaUsuario?>

			</td>


		</tr>


		<tr>

			<td class="ancho__referencias fila__uno" align="left" align="left" colspan="6">
				<li style="list-style: disc; margin-left:1em;">Dirección de domicilio:</li> 
			</td>

		</tr>

		<tr>

			<td class="ancho__referencias__2 fila__uno">

				<li style="list-style=circle; margin-left: 2em;">Provincia:</li>

			</td>

			<td class="fila__uno ancho__referencias__4" align="left">

				&nbsp;&nbsp;&nbsp;<?= strtoupper($provincia) ?>

			</td>

		</tr>

		<tr>

			<td class="ancho__referencias__2 fila__uno"  style="list-style: circle;">

				<li style="list-style=circle; margin-left: 2em;">Cantón:</li>

			</td>

			<td class="fila__uno ancho__referencias__4" align="left">

				&nbsp;&nbsp;&nbsp;<?= strtoupper($canton) ?>

			</td>

		</tr>

		<tr>

			<td class="ancho__referencias__2 fila__uno"  style="list-style: circle;">

				<li style="list-style=circle; margin-left: 2em;">Calle Principal:</li>

			</td>

			<td class="ancho__referencias__4">

				&nbsp;&nbsp;&nbsp;<?= strtoupper($callePrincipalCiudadano) ?>

			</td>

		</tr>

		<tr>

			<td class="ancho__referencias__2 fila__uno"  style="list-style: circle;">

				<li style="list-style=circle; margin-left: 2em;">Numeración:</li>

			</td>

			<td class="ancho__referencias__4">

				&nbsp;&nbsp;&nbsp;<?= strtoupper($numeracionCiudadao) ?>

			</td>

		</tr>

		<tr>

			<td class="ancho__referencias__2 fila__uno" style="list-style: circle;">

				<li style="list-style=circle; margin-left: 2em;">Calle secundaria:</li>

			</td>

			<td class="ancho__referencias__4" align="left">

				&nbsp;&nbsp;&nbsp;<?= strtoupper($calleSecundariaCiudadano) ?>

			</td>

		</tr>

		<tr>

			<td class="ancho__referencias__2 fila__uno" style="list-style: circle;">

				<li style="list-style=circle; margin-left: 2em;">Referencia:</li>

			</td>

			<td class="ancho__referencias__4" align="left">

				&nbsp;&nbsp;&nbsp;<?= strtoupper($referenciaCiudadano) ?>

			</td>

		</tr>


	</table>


	<table class="tabla__bordada__2 tabla__top__2">

		<tr>


			<td class="fila__uno" style="width:15%; font-weight:bold;" align="left">

				<li style="list-style: disc; margin-left:1em;">Correo electrónico:</li>

			</td>

			<td class="fila__uno" align="left" colspan="2">

				<?=strtoupper($email)?>

			</td>

		</tr>

		<?php if (!empty($telCiudadano)): ?>
			
		<tr>

			<td  class="fila__uno" style="width:15%; font-weight:bold;" align="left">

				<li style="list-style: disc; margin-left:1em;">Teléfono convencional:</li>

			</td>

			<td class="fila__uno" align="left">

				<?=$telCiudadano?>

			</td>

		</tr>
			
		<?php endif ?>

		<tr>
			<td  class="fila__uno" style="width:15%; font-weight:bold;" align="left">

				<li style="list-style: disc; margin-left:1em;">Teléfono celular:</li>

			</td>

			<td class="fila__uno" align="left">

				<?=$telefono?>

			</td>


		</tr>

	</table>

	<?php if (intval($usuarioEdades)<18 || $arrayUsuario[17]=="si"): ?>

	<table class="tabla__bordada__2 tabla__top">
		

		<tr>
			<td class="nombre__apartados__secundarios" align="left" colspan="2" style="text-align: justify;">
				1.1.2&nbsp;&nbsp;&nbsp;&nbsp;Datos del Representante legal:
			</td>
		</tr>

		<tr>
			<td  class="fila__uno" style="width:15%; font-weight:bold;" align="left">

				<li style="list-style: disc; margin-left:1em;">Nombres y apellidos:</li>

			</td>

			<td class="fila__uno" align="left">

				<?=$representanteLegalAtletas?>

			</td>


		</tr>

		<tr>

			<td  class="fila__uno" style="width:15%; font-weight:bold;" align="left">

				<li style="list-style: disc; margin-left:1em;">CI:</li>

			</td>

			<td class="fila__uno" align="left">

				<?=$representanteLegalCedulaAtletas?>

			</td>


		</tr>


		<tr>

			<td class="ancho__referencias fila__uno" align="left" align="left" colspan="6">
				<li style="list-style: disc; margin-left:1em;">Dirección de domicilio:</li> 
			</td>

		</tr>

		<tr>

			<td class="ancho__referencias__2 fila__uno">

				<li style="list-style=circle; margin-left: 2em;">Provincia:</li>

			</td>

			<td class="fila__uno ancho__referencias__4" align="left">

				&nbsp;&nbsp;&nbsp;<?= strtoupper($nombreProvincia) ?>

			</td>

		</tr>

		<tr>

			<td class="ancho__referencias__2 fila__uno"  style="list-style: circle;">

				<li style="list-style=circle; margin-left: 2em;">Cantón:</li>

			</td>

			<td class="fila__uno ancho__referencias__4" align="left">

				&nbsp;&nbsp;&nbsp;<?= strtoupper($nombreCanton) ?>

			</td>

		</tr>

		<tr>

			<td class="ancho__referencias__2 fila__uno"  style="list-style: circle;">

				<li style="list-style=circle; margin-left: 2em;">Calle Principal:</li>

			</td>

			<td class="ancho__referencias__4">

				&nbsp;&nbsp;&nbsp;<?= strtoupper($calleprincipalRepresentanteAtletas) ?>

			</td>

		</tr>

		<tr>

			<td class="ancho__referencias__2 fila__uno"  style="list-style: circle;">

				<li style="list-style=circle; margin-left: 2em;">Numeración:</li>

			</td>

			<td class="ancho__referencias__4">

				&nbsp;&nbsp;&nbsp;<?= strtoupper($numeracionRepresentanteAtletas) ?>

			</td>

		</tr>

		<tr>

			<td class="ancho__referencias__2 fila__uno" style="list-style: circle;">

				<li style="list-style=circle; margin-left: 2em;">Calle secundaria:</li>

			</td>

			<td class="ancho__referencias__4" align="left">

				&nbsp;&nbsp;&nbsp;<?= strtoupper($callesecundariaRepresentanteAtletas) ?>

			</td>

		</tr>

		<tr>

			<td class="ancho__referencias__2 fila__uno" style="list-style: circle;">

				<li style="list-style=circle; margin-left: 2em;">Referencia:</li>

			</td>

			<td class="ancho__referencias__4" align="left">

				&nbsp;&nbsp;&nbsp;<?= strtoupper($referenciaRepresentanteAtletas) ?>

			</td>

		</tr>


	</table>


	<table class="tabla__bordada__2 tabla__top__2">

		<tr>


			<td class="fila__uno" style="width:15%; font-weight:bold;" align="left">

				<li style="list-style: disc; margin-left:1em;">Correo electrónico:</li>

			</td>

			<td class="fila__uno" align="left" colspan="2">

				<?=strtoupper($emailRepresentanteAtletas)?>

			</td>

		</tr>

		<?php if (!empty($telefonoRepresentanteAtletas)): ?>
			
		<tr>

			<td  class="fila__uno" style="width:15%; font-weight:bold;" align="left">

				<li style="list-style: disc; margin-left:1em;">Teléfono convencional:</li>

			</td>

			<td class="fila__uno" align="left">

				<?=$telefonoRepresentanteAtletas?>

			</td>

		</tr>
			
		<?php endif ?>

		<tr>
			<td  class="fila__uno" style="width:15%; font-weight:bold;" align="left">

				<li style="list-style: disc; margin-left:1em;">Teléfono celular:</li>

			</td>

			<td class="fila__uno" align="left">

				<?=$telefonoAtletaRepresentantess?>

			</td>


		</tr>

	</table>		
		
	<?php endif ?>
	

	<?php endif ?>


</div>

<!--====  End of Datos personales  ====-->



<!--====  End of Contenido Principal formularios  ====-->