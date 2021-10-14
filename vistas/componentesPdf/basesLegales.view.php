<?php

	extract($_POST);

	require_once "../../conexion/conexion.php";

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

	/*==========================================
	=            Declaración arrays            =
	==========================================*/
	
	$data1=array();
	$data2=array();
	$data3=array();

	/*=====  End of Declaración arrays  ======*/
	


	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();	

 	$query="SELECT idBaseLegal, nombreBaseLegal, justificacionBaseLegal FROM pro_baselegal WHERE codigoProyecto='$codigoProyectoPdf';";
	$resultado = $conexionEstablecida->query($query);


	while($registro = $resultado->fetch()) {

		$idBaseLegal=$registro['idBaseLegal'];
		array_push($data1, $idBaseLegal);

		$nombreBaseLegal=$registro['nombreBaseLegal'];
		array_push($data2, $nombreBaseLegal);

		$justificacionBaseLegal=$registro['justificacionBaseLegal'];
		array_push($data3, $justificacionBaseLegal);

	}

	$variableContadora=3;


 ?>

 <div class="margen__borde">

 	<table class="tabla__bordada">

		<tr>
			<td class="nombre__apartados__principales" align="left">
				2&nbsp;&nbsp;&nbsp;&nbsp;BASE LEGAL 
			</td>
		</tr>

	</table>	


	<table class="tabla__bordada__2">

		<tr>
			<td class="nombre__apartados__secundarios" align="left">
				2.1&nbsp;&nbsp;&nbsp;&nbsp;LA LEY DEL DEPORTE, EDUCACIÓN FÍSICA Y RECREACIÓN 
			</td>
		</tr>

		<tr>

			<td class="fila__uno" align="left" style="text-align:justify;">
				El artículo 13 establece: “El Ministerio Sectorial es el órgano rector y planificador del deporte, educación física y recreación; le corresponde establecer, ejercer, garantizar y aplicar las políticas, directrices y planes aplicables en las áreas correspondientes para el desarrollo del sector de conformidad con lo dispuesto en la Constitución, las leyes, instrumentos internacionales y reglamentos aplicables. Tendrá dos objetivos principales, la activación de la población para asegurar la salud de las y los ciudadanos y facilitar la consecución de logros deportivos a nivel nacional e internacional de las y los deportistas incluyendo, aquellos que tengan algún tipo de discapacidad.
			</td>

		</tr>


	</table>


	<table class="tabla__bordada__2">

		<tr>
			<td class="nombre__apartados__secundarios" align="left">
				2.2&nbsp;&nbsp;&nbsp;&nbsp;LEY DE RÉGIMEN TRIBUTARIO INTERNO
			</td>
		</tr>

		<tr>

			<td class="fila__uno" align="left" style="text-align:justify;">
				El artículo 10 dispone: “En general, con el propósito de determinar la base imponible sujeta a este impuesto se deducirán los gastos e inversiones que se efectúen con el propósito de obtener, mantener y mejorar los ingresos de fuente ecuatoriana que no estén exentos. En particular se aplicarán las siguientes deducciones: … 19. Los costos y gastos por promoción y publicidad de conformidad con las excepciones, límites, segmentación y condiciones establecidas en el Reglamento... Se podrá deducir el 100% adicional para el cálculo de la base imponible del impuesto a la renta, los gastos de publicidad y patrocinio realizados a favor de deportistas, programas y proyectos deportivos previamente calificados por la entidad rectora competente en la materia. El reglamento establecerá los parámetros técnicos y formales que deberán cumplirse para acceder a esta deducción adicional...”
			</td>

		</tr>


	</table>

	<table class="tabla__bordada__2">

		<tr>
			<td class="nombre__apartados__secundarios" align="left">
				2.3&nbsp;&nbsp;&nbsp;&nbsp;REGLAMENTO PARA LA APLICACIÓN DE LA LEY DE RÉGIMEN TRIBUTARIO INTERNO
			</td>
		</tr>

		<tr>

			<td class="fila__uno" align="left" style="text-align:justify;">
				El artículo 28 dispone: “Bajo las condiciones descritas en el artículo precedente y siempre que no hubieren sido aplicados al costo de producción, son deducibles los gastos previstos por la Ley de Régimen Tributario Interno, en los términos señalados en ella y en este reglamento, tales como: ... 11. Promoción, publicidad y patrocinio... e. Se podrá deducir el 100% adicional para el cálculo de la base imponible del impuesto a la renta, los gastos de publicidad y patrocinio realizados a favor de deportistas, programas y proyectos deportivos previamente calificados por la entidad rectora competente en la materia, según lo previsto en el respectivo documento de planificación estratégica, así como con los límites y condiciones que esta emita para el efecto.”
			</td>

		</tr>


	</table>

	<?php if (!empty($idBaseLegal)): ?>

		<?php for ($i=0; $i < count($data1); $i++) { $contador=$i+4?>

			<table class="tabla__bordada__2">

				<tr>
					<td class="nombre__apartados__secundarios" align="left">
						2.<?= $contador?>&nbsp;&nbsp;&nbsp;&nbsp;<?=strtoupper($data2[$i])?>
					</td>
				</tr>

				<tr>

					<td class="fila__uno" align="left" style="text-align:justify;">
						<?=nl2br($data3[$i])?>
					</td>

				</tr>


			</table>


		<?php }?>
		
	<?php endif ?>


 </div>