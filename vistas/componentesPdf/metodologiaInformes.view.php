<?php

	extract($_POST);

	require_once "../../conexion/conexion.php";

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();


	$query="SELECT nombreCompleto,cedulaUsuario FROM pro_deportistaorganismo WHERE cedulaUsuario='$cedulaRucEnviadosDiscriminantes';";
	$resultado = $conexionEstablecida->query($query);

	while($registro = $resultado->fetch()) {

		$nombreCompleto=$registro['nombreCompleto'];
		$cedulaUsuario=$registro['cedulaUsuario'];
			
	}


	$query2="SELECT b.cedulaRepresentante,b.nombreReperesentante FROM pro_federacion AS a INNER JOIN pro_representante AS b ON a.idFederacion=b.idFederacion WHERE a.idFederacion='$cedulaRucEnviadosDiscriminantes';";
	$resultado2 = $conexionEstablecida->query($query2);

	while($registro2 = $resultado2->fetch()) {

		$nombreReperesentante=$registro2['nombreReperesentante'];
		$cedulaRepresentante=$registro2['cedulaRepresentante'];
			
	}


	if (!empty($nombreCompleto)) {
		
		$nombrePortada=$nombreCompleto;
		$cedulaPortadas=$cedulaUsuario;

	}else{

		$nombrePortada=$nombreReperesentante;
		$cedulaPortadas=$cedulaRepresentante;

	}




 	/*===================================
 	=            Actividades            =
 	===================================*/
 	
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

  	$query="SELECT idDescripcionActividades,descripcionActividades__conjunto,eneroActividades__conjunto,febreroActividades__conjunto,marzoActividades__conjunto,abrilActividades__conjunto,mayoActividades__conjunto,junioActividades__conjunto,julioActividades__conjunto,agostoActividades__conjunto,septiembreActividades__conjunto,octubreActividades__conjunto,noviembreActividades__conjunto,diciembreActividades__conjunto FROM pro_descripcionactividades WHERE codigo='$codigoProyectoPdf';";
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

	}
	
 	
 	/*=====  End of Actividades  ======*/
 	
 	/*===========================================
 	=            Estrctura operativa            =
 	===========================================*/

 	$query2="SELECT idDetalle,rol__conjunto,detalle__conjunto FROM pro_estructuraoperativa WHERE codigoProyecto='$codigoProyectoPdf';";
	$resultado2 = $conexionEstablecida->query($query2);


	while($registro2 = $resultado2->fetch()) {

		$idDetalle=$registro2['idDetalle'];
		array_push($data15, $idDetalle);

		$rol__conjunto=$registro2['rol__conjunto'];
		array_push($data16, $rol__conjunto);


		$detalle__conjunto=$registro2['detalle__conjunto'];
		array_push($data17, $detalle__conjunto);

	} 	
 	
 	
 	/*=====  End of Estrctura operativa  ======*/
 	

 	/*===============================================
 	=            Segumiento y Evaluación            =
 	===============================================*/
 	
  	$query3="SELECT idSeguimiento,actividadSeguimiento__conjunto,periocidadSeguimiento__conjunto,medioSeguimiento__conjunto,observacionSeguimiento__conjunto,metas__conjuntos__seleccionables,conjunto__indicadores FROM pro_seguimientoevaluacion WHERE codigo='$codigoProyectoPdf';";
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
		array_push($data23, $metas__conjuntos__seleccionables);


		$conjunto__indicadores=$registro3['conjunto__indicadores'];
		array_push($data24, $conjunto__indicadores);


	}	
 	
 	/*=====  End of Segumiento y Evaluación  ======*/
 	


 ?>

<div class="margen__borde">

 	<table class="tabla__bordada">

		<tr>
			<td class="nombre__apartados__principales" align="left">
				6&nbsp;&nbsp;&nbsp;&nbsp;METODOLOGÍA DE EJECUCIÓN 
			</td>
		</tr>

	</table>	

	<table class="tabla__bordada__2">

		<tr>
			<td class="nombre__apartados__secundarios" align="left">
				6.1&nbsp;&nbsp;&nbsp;&nbsp;DESCRIPCIÓN DE ACTIVIDADES
			</td>
		</tr>

		<tr>

			<td class="fila__uno" align="left" style="text-align:justify;">
				Describir de forma detallada las actividades para llevar a cabo el proyecto
			</td>

		</tr>

	</table>

	<br>

	<table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias">

		<thead>

			<tr>
					
				<th class="padding__celdas" colspan="13"><center>CRONOGRAMA DE EJECUCIÓN DEL OBJETO DE FINANCIAMIENTO</center></th>

			</tr>

			<tr>
					
				<th class="padding__celdas">ACTIVIDADES</th>
				<th class="padding__celdas">ENE</th>
				<th class="padding__celdas">FEB</th>
				<th class="padding__celdas">MAR</th>
				<th class="padding__celdas">ABR</th>
				<th class="padding__celdas">MAY</th>
				<th class="padding__celdas">JUN</th>
				<th class="padding__celdas">JUL</th>
				<th class="padding__celdas">AGO</th>
				<th class="padding__celdas">SEP</th>
				<th class="padding__celdas">OCT</th>
				<th class="padding__celdas">NOV</th>
				<th class="padding__celdas">DIC</th>

			</tr>

		</thead>

		<tbody>

			<?php for ($i=0; $i < count($data1); $i++) {?>

				<tr>

					<td><?=$data2[$i]?></td>


					<td>
						<center style="font-weight:bold;">
							<?php if($data3[$i]=="si"){ echo "X"; }?>
						</center>
					</td>

					<td>
						<center style="font-weight:bold;">
							<?php if($data4[$i]=="si"){ echo "X"; }?>
						</center>
					</td>					
		
					<td>
						<center style="font-weight:bold;">
							<?php if($data5[$i]=="si"){ echo "X"; }?>
						</center>
					</td>

					<td>
						<center style="font-weight:bold;">
							<?php if($data6[$i]=="si"){ echo "X"; }?>
						</center>
					</td>

					<td>
						<center style="font-weight:bold;">
							<?php if($data7[$i]=="si"){ echo "X"; }?>
						</center>
					</td>

					<td>
						<center style="font-weight:bold;">
							<?php if($data8[$i]=="si"){ echo "X"; }?>
						</center>
					</td>

					<td>
						<center style="font-weight:bold;">
							<?php if($data9[$i]=="si"){ echo "X"; }?>
						</center>
					</td>

					<td>
						<center style="font-weight:bold;">
							<?php if($data10[$i]=="si"){ echo "X"; }?>
						</center>
					</td>

					<td>
						<center style="font-weight:bold;">
							<?php if($data11[$i]=="si"){ echo "X"; }?>
						</center>
					</td>

					<td>
						<center style="font-weight:bold;">
							<?php if($data12[$i]=="si"){ echo "X"; }?>
						</center>
					</td>

					<td>
						<center style="font-weight:bold;">
							<?php if($data13[$i]=="si"){ echo "X"; }?>
						</center>
					</td>

					<td>
						<center style="font-weight:bold;">
							<?php if($data14[$i]=="si"){ echo "X"; }?>
						</center>
					</td>


				</tr>

			<?php }?>

		</tbody>

	</table>


 	<table class="tabla__bordada">

		<tr>
			<td class="nombre__apartados__principales" align="left">
				7&nbsp;&nbsp;&nbsp;&nbsp;SEGUIMIENTO Y EVALUACIÓN
			</td>
		</tr>

	</table>	

	<table class="tabla__bordada__2">

		<tr>

			<td class="fila__uno" align="left" style="text-align:justify;">
				Detallar las acciones específicas tanto para el seguimiento como para la evaluación del proyecto por parte del ejecutor del proyecto.
			</td>

		</tr>

	</table>

	<br>

	<table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias">


		<thead>

			<tr>

				<th class="padding__celdas"><center>INDICADOR</center></th>
				<th class="padding__celdas"><center>PERIODICIDAD</center></th>
				<th class="padding__celdas"><center>META</center></th>
				<th class="padding__celdas"><center>ACTIVIDAD DE SEGUIMIENTO / EVALUACIÓN</center></th>
				<th class="padding__celdas"><center>MEDIO DE VERIFICACIÓN</center></th>
				<th class="padding__celdas"><center>OBSERVACIÓN</center></th>

			</tr>

		</thead>


		<tbody>

			<?php for ($i=0; $i < count($data18); $i++) {?>

				<tr>

					<td>
						<center>
							<?=$data24[$i]?>
						</center>
					</td>

					<td>
						<center>
							<?=$data20[$i]?>
						</center>
					</td>

					<td>
						<center>
							<?=$data23[$i]?>
						</center>
					</td>

					<td>
						<center>
							<?=$data19[$i]?>
						</center>
					</td>

					<td>
						<center>
							<?=$data21[$i]?>
						</center>
					</td>

					<td>
						<center>
							<?=$data22[$i]?>
						</center>
					</td>

				</tr>

			<?php }?>

		</tbody>

	</table>

 	<table class="tabla__bordada">

		<tr>
			<td class="nombre__apartados__principales" align="left">
				8&nbsp;&nbsp;&nbsp;&nbsp;DECLARACIÓN DE VERACIDAD, LEGITIMIDAD Y AUTENCIDAD DE DOCUMENTOS, DATOS E INFORMACIÓN
			</td>
		</tr>

	</table>	


	<table class=" abla__top__2">

		<tr>

			<td align="justify">

				En virtud de la potestad del Ministerio del Deporte para dictar las normas pertinentes para la ejecución y cumplimiento de los beneficios tributarios que prevé la Ley de Régimen Tributario Interno; y, el Reglamento para la aplicación de la Ley de Régimen Tributario Interno, la/el Sr/a. <?=$nombrePortada?>, con C.I. <?=$cedulaPortadas?>, en relación a la solicitud de acogerse al beneficio de los incentivos tributarios que brinda el Estado ecuatoriano a los gastos de publicidad y patrocinio realizados a favor de deportistas, programas y proyectos deportivos; y, en cumplimiento a los principios de ética, probidad, buena fe, respeto al ordenamiento jurídico y a la autoridad legítima, entre otros, que rigen los deberes de las personas y la relación entre éstas y la administración pública; así como a lo establecido en el artículo 10 de la Ley Orgánica para la Optimización y Eficiencia de Trámites Administrativos respecto a la veracidad de la información: “Las entidades reguladas por esta Ley presumirán que las declaraciones, documentos y actuaciones de las personas efectuadas en virtud de trámites administrativos son verdaderas, bajo aviso a la o al administrado de que, en caso de verificarse lo contrario, el trámite y resultado final de la gestión podrán ser negados y archivados, o los documentos emitidos carecerán de validez alguna, sin perjuicio de las sanciones y otros efectos jurídicos establecidos en la ley. El listado de actuaciones anuladas por la entidad en virtud de lo establecido en este inciso estará disponible para las demás entidades del Estado (...)”, <span style="font-weight: bold;">DECLARA</span> que toda la documentación, datos e información proporcionados dentro del presente trámite, así como aquella que le sea requerida durante la tramitación de la misma, es veraz, legítima y auténtica; y se compromete a dar estricto cumplimiento a los compromisos y obligaciones contenidos en el respectivo programa o proyecto deportivo.

			</td>

		</tr>

		<tr>

			<td align="justify">

				En ese sentido, reconoce y acepta que el COMITÉ DE CALIFICACIÓN Y CERTIFICACIÓN PARA ACCEDER AL INCENTIVO TRIBUTARIO se pronunciará sobre la base de la información presentada y cuyo contenido son de su exclusiva responsabilidad. Razón por la cual, ni los miembros del referido cuerpo colegiado, ni los funcionarios intervinientes en el análisis del presente expediente, podrán ser considerados como responsables por eventuales inconsistencias que pudieren existir entre la información presentada y los datos originales; así como por incumplimiento de los términos y condiciones constantes en los citados programas o proyectos deportivos.

			</td>

		</tr>

	</table>

	<br>

	<br>

	<table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias">

		<tr>

			<td style="width: 10%; font-weight: bold;">Nombre del solicitante:</td>
			<td style="width: 90%; font-weight: bold;"><?=$nombrePortada?></td>

		</tr>

		<tr>

			<td style="width: 10%; font-weight: bold; height: 45px;">Firma del solicitante:</td>
			<td style="width: 90%; font-weight: bold; height: 45px;"></td>

		</tr>

	</table>


</div>