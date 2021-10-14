<?php

	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

?>

<?php

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

	date_default_timezone_set("America/Guayaquil");

	$fecha_actual = date('Y-m-d');
	$hora_actual= date('H:i:s');

	extract($_POST);

	ob_start(); 

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

		$query2="SELECT a.idAteleta,a.tipoOrganismo,a.cedulaUsuario,a.nombreCompleto,a.fechaNacimiento,a.sexo,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.provincia) AS provincia, (SELECT a1.nombreCanton FROM in_md_canton AS a1 WHERE a1.idCanton=a.canton) AS canton, (SELECT a1.nombreParroquia FROM in_md_parroquia AS a1 WHERE a1.idParroquia=a.parroquia) AS parroquia,a.telefono,a.direccion,a.email,b.idTramite,SUBSTRING(nombreCompleto, 1, 3) AS nombreCompletoSin,YEAR(NOW()) AS anioFechas FROM pro_deportistaorganismo AS a LEFT JOIN pro_proyecto AS b ON a.usuario=b.idUsuario WHERE a.usuario='$cedulaRuc' GROUP BY a.usuario ORDER BY b.idTramite ASC LIMIT 1;";

		$resultado2 = $conexionEstablecida->query($query2);


		while($registro2 = $resultado2->fetch()) {

			$idAteleta=$registro2['idAteleta'];
			$tipoOrganismo=$registro2['tipoOrganismo'];
			$cedulaRepresentante=$registro2['cedulaUsuario'];
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
	 
	 /*=====  End of Ingreso y final fechas  ======*/

?>
<!--=======================================
=           	Sección Css              =
========================================-->

<link href="../../layout/styles/css/estilosPdf.css?v=1.0.0" rel="stylesheet" type="text/css" media="all">

<!--====  End of	Sección Css  ====-->


<!--=============================
=            Portada            =
==============================-->


<div class="margen__borde">
		
	<table class="tabla__bordada">

		<tr>
			<td class="contenedor___nombre__proyecto" align="center">
				CERTIFICADO DE BENEFICIARIO PARA ACCEDER A LA DEDUCCIÓN DEL 100% ADICIONAL<br>PARA EL CÁLCULO DE LA BASE IMPONIBLE DEL IMPUESTO A LA RENTA DE LOS GASTOS DE<br> PATROCINIO, PROMOCIÓN O PUBLICIDAD REALIZADOS A FAVOR DE DEPORTISTAS Y<br>ORGANIZADORES DE PROGRAMAS Y/O PROYECTOS DEPORTIVOS
			</td>
		</tr>

		<tr style="margin-top: 5em;">

			<td colspan="2">
				<center>
					<?= "Año ".$anio?>
				</center>
			</td>
			
		</tr>

		<tr>

			<td colspan="2">

				<center>MONTO APROBADO POR EL MINISTERIO DE FINANZAS: USD $35’000.000,00</center>

			</td>

		</tr>



	</table>	
	

	<table class="tabla__bordada tabla__nombre__portada" style="position:relative; top:-15em;">

		<tr>

			<th>DATOS DEL SOLICITANTE</th>

		</tr>

	</table>


	<table class="tabla__bordada__2 tablas__bordes__necesarias" style="position:relative; top:-15em;">>

		<tr>

			<td style="font-weight:bold;">IDENTIFICACIÓN:</td>

			<td>
				<center>
					<?= $cedulaRepresentante?>
				</center>
			</td>
			
		</tr>

		<tr>

			<td style="font-weight:bold;">NOMBRE DEL SOLICITANTE:</td>

			<td>
				<center>
					<?= $cedulaRepresentante?>
				</center>
			</td>
			
		</tr>

		<tr>

			<td style="font-weight:bold;">FECHA DE EMISIÓN:</td>

			<td>
				<center>
					<?= $cedulaRepresentante?>
				</center>
			</td>
			
		</tr>

		<tr>

			<td style="font-weight:bold;">TELÉFONO:</td>

			<td>
				<center>
					<?= $cedulaRepresentante?>
				</center>
			</td>
			
		</tr>

		<tr>

			<td style="font-weight:bold;">CORREO ELECTRÓNICO:</td>

			<td>
				<center>
					<?= $cedulaRepresentante?>
				</center>
			</td>
			
		</tr>

		<tr>

			<td style="font-weight:bold;">NOMBRE DEL PROYECTO:</td>

			<td>
				<center>
					<?= $cedulaRepresentante?>
				</center>
			</td>
			
		</tr>

		<tr>

			<td style="font-weight:bold;">SECTOR AL QUE CONTRIBUYE:</td>

			<td>
				<center>
					<?= $cedulaRepresentante?>
				</center>
			</td>
			
		</tr>

		<tr>

			<td style="font-weight:bold;">MONTO:</td>

			<td>
				<center>
					<?= $cedulaRepresentante?>
				</center>
			</td>
			
		</tr>

		<tr>

			<td style="font-weight:bold;">FECHA DE CALIFICACIÓN:</td>

			<td>
				<center>
					<?= $cedulaRepresentante?>
				</center>
			</td>
			
		</tr>

	</table>	


	<table class="tabla__bordada__2 tablas__bordes__necesarias" style="position:relative; top:-15em;">>

		<tr>

			<td style="font-weight:bold;" colspan="2"><center>El Ministerio del Deporte, CERTIFICA al patrocinador para aplicar la deducción del 100% adicional para el cálculo de la base imponible del impuesto a la renta de los gastos de patrocinio realizados a favor de la deportista Ana Paula Guerra Muñoz.</center></td>

		</tr>

	</table>	


	<table class="tabla__bordada__2" style="position:relative; top:-15em;">

		<tr>

			<td style="font-weight:bold;" colspan="2" align="justify"><span style="font-weight: bold;">Condiciones:</span>En caso de verificarse que la información presentada por el solicitante no se sujeta a la realidad o que ha incumplido con los requisitos o el procedimiento establecido en la normativa para la obtención del certificado, la autoridad emisora de dicho título podrá dejarlo sin efecto hasta que el solicitante cumpla con la normativa respectiva, sin perjuicio del inicio de los procesos o la aplicación de las sanciones que correspondan de conformidad con el ordenamiento jurídico vigente.</td>
			
		</tr>

		<tr>

			<td style="font-weight:bold;" colspan="2" align="justify"><span style="font-weight: bold;">Acuerdo de Responsabilidad:</span>El usuario asume la responsabilidad total de la veracidad de la información ingresada durante el proceso de certificación, sin perjuicio de las acciones judiciales a que hubiere lugar, de conformidad a lo dispuesto en el primer inciso del artículo 270 del Código Orgánico Integral Penal.</td>
			
		</tr>


	</table>	

</div>

<!--====  End of Portada  ====-->


<?php

   // Cargamos la librería dompdf que hemos instalado en la carpeta gdompdfi
   require_once '../../dompdf/autoload.inc.php';


   // llamar libreria dompdf
   use Dompdf\Dompdf;


  // Instanciamos un objeto de la clase DOMPDF.
  $pdf = new DOMPDF();
        
  // Definimos el tamaño y orientación del papel que queremos.h
  $pdf->set_paper("letter", "A4");
 //$pdf->set_paper(array(0,0,104,250));
        
  // Cargamos el contenido HTML.
  $pdf->load_html(ob_get_clean());
        
  // Renderizamos el documento PDF.
  $pdf->render();


  $canvas = $pdf->get_canvas(); 
  $canvas->page_text(510, 12, "Página {PAGE_NUM} de {PAGE_COUNT}","helvetica", 8, array(0,0,0)); //header//header
  $canvas->page_text(54, 778, "", "helvetica", 8, array(0,0,0)); //footer
          
  // obtener el valor generado
  $pdfGeneerado= $pdf->output();

  $control = fopen("../../documentos/certificacion/".$codgioProyectoDocumentos.".pdf","a");

  fwrite($control,$pdfGeneerado);

	if ($selectorUsuariosDelegados!="0" || $selectorUsuariosDelegados!=0) {
			
		$query3="UPDATE th_usuario SET calificadorNoti='A' WHERE id_usuario='$selectorUsuariosDelegados';";
		$resultado3= $conexionEstablecida->exec($query3);

	}

	$observacionesNoRequeridas=filter_var($observacionesNoRequeridas, FILTER_SANITIZE_MAGIC_QUOTES);

	/*=================================
	=            Firmas id            =
	=================================*/
		
	if ($asistenciaMinistroValidadorAsistio==true) {
			
		$query10="UPDATE pro_proyecto SET firmaMinistro='$idMinistro' WHERE codigo='$codgioProyectoDocumentos';";
		$resultad10= $conexionEstablecida->exec($query10);

	}
		
	if ($asistenciaSusesAltoValidadorAsistio==true) {
			
		$query11="UPDATE pro_proyecto SET firmaSubsesAlto='$idSusesAlto' WHERE codigo='$codgioProyectoDocumentos';";
		$resultad11= $conexionEstablecida->exec($query11);

	}


	if ($asistenciaActividadFisicaValidadorAsistio==true) {
			
		$query12="UPDATE pro_proyecto SET firmaSubsesActividad='$idSusesActividad' WHERE codigo='$codgioProyectoDocumentos';";
		$resultad12= $conexionEstablecida->exec($query12);

	}


	if ($asistenciaCoordinadorValidadorAsistio==true) {
			
		$query13="UPDATE pro_proyecto SET firmaCoordinador='$idSusesCoordinador' WHERE codigo='$codgioProyectoDocumentos';";
		$resultad13= $conexionEstablecida->exec($query13);

	}

	if ($asistenciaPlanificacionValidadorAsistio==true) {
			
		$query14="UPDATE pro_proyecto SET firmaPlanificacion='$idSusesPlanificacion' WHERE codigo='$codgioProyectoDocumentos';";
		$resultad14= $conexionEstablecida->exec($query14);

	}


	if ($asistenciaJuridicoValidadorAsistio==true) {
			
		$query15="UPDATE pro_proyecto SET firmaJuridico='$idSusesJuridico' WHERE codigo='$codgioProyectoDocumentos';";
		$resultad15= $conexionEstablecida->exec($query15);

	}


	/*=====  End of Firmas id  ======*/
		

	$query="UPDATE pro_proyecto SET firmasNotiReun='A',firmasReuTotalesReus='$contadorAsistencias',firmasRealziadasReus='0',firmaNotificacion=NULL,recomendacion='E',resultadoCalificacion='$notificacionDirecta' WHERE codigo='$codgioProyectoDocumentos';";
	$resultado= $conexionEstablecida->exec($query);

	$query2="INSERT INTO `ezonshar2`.`pro_observacionrecomendacionsatisfaccion` (`idObservacionesRecomendacion`, `observacion`, `codigo`, `fecha`, `hora`, `tipo`) VALUES (NULL, '$observacionesNoRequeridas', '$codgioProyectoDocumentos', '$fecha_actual', '$hora_actual', 'C');";
	$resultado2= $conexionEstablecida->exec($query2);


	$query55="UPDATE pro_proyecto SET certifica='A',fechaCertifica='$fecha_actual',horaCertifica='$hora_actual' WHERE codigo='$codgioProyectoDocumentos';";
	$resultado55= $conexionEstablecida->exec($query55);		
	$mensaje=1;
	$jason['mensaje']=$mensaje;
	echo json_encode($jason);


?>

