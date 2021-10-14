<?php

	extract($_POST);

	require_once "../../conexion/conexion.php";

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

 	/*=============================================
 	=            Bneficiarios Directos            =
 	=============================================*/
 	
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
	$data26=array();


 	$query="SELECT idBeneficiariosDirectos,beneficiariosDirectos__conjuntos,desdeDirectos__conjuntos,hastaDirectos__conjuntos,masculinoDirectos__conjuntos,femeninoDirectos__conjuntos,montubioDirectos__conjuntos,indigenasDirectos__conjuntos,blancoDirectos__conjuntos,afroDirectos__conjuntos,mulatoDirectos__conjuntos,negroDirectos__conjuntos,totalDirectos__conjuntos,mestizoDirectos__conjuntos FROM pro_beneficiarios_directos WHERE codigo='$codigoProyectoPdf';";
	$resultado = $conexionEstablecida->query($query);


	while($registro = $resultado->fetch()) {

		$idBeneficiariosDirectos=$registro['idBeneficiariosDirectos'];
		array_push($data1, $idBeneficiariosDirectos);

		$beneficiariosDirectos__conjuntos=$registro['beneficiariosDirectos__conjuntos'];
		array_push($data2, $beneficiariosDirectos__conjuntos);

		$desdeDirectos__conjuntos=$registro['desdeDirectos__conjuntos'];
		array_push($data3, $desdeDirectos__conjuntos);

		$hastaDirectos__conjuntos=$registro['hastaDirectos__conjuntos'];
		array_push($data4, $hastaDirectos__conjuntos);

		$masculinoDirectos__conjuntos=$registro['masculinoDirectos__conjuntos'];
		array_push($data5, $masculinoDirectos__conjuntos);

		$femeninoDirectos__conjuntos=$registro['femeninoDirectos__conjuntos'];
		array_push($data6, $femeninoDirectos__conjuntos);

		$montubioDirectos__conjuntos=$registro['montubioDirectos__conjuntos'];
		array_push($data7, $montubioDirectos__conjuntos);

		$indigenasDirectos__conjuntos=$registro['indigenasDirectos__conjuntos'];
		array_push($data8, $indigenasDirectos__conjuntos);

		$blancoDirectos__conjuntos=$registro['blancoDirectos__conjuntos'];
		array_push($data9, $blancoDirectos__conjuntos);

		$afroDirectos__conjuntos=$registro['afroDirectos__conjuntos'];
		array_push($data10, $afroDirectos__conjuntos);

		$mulatoDirectos__conjuntos=$registro['mulatoDirectos__conjuntos'];
		array_push($data11, $mulatoDirectos__conjuntos);

		$negroDirectos__conjuntos=$registro['negroDirectos__conjuntos'];
		array_push($data12, $negroDirectos__conjuntos);

		$totalDirectos__conjuntos=$registro['totalDirectos__conjuntos'];
		array_push($data13, $totalDirectos__conjuntos);

		$mestizoDirectos__conjuntos=$registro['mestizoDirectos__conjuntos'];
		array_push($data26, $mestizoDirectos__conjuntos);


	}
 	
 	/*=====  End of Bneficiarios Directos  ======*/
 	
 	/*================================================
 	=            Beneficiarios Especiales            =
 	================================================*/

	$data14=array();
	$data15=array();
	$data16=array();
	$data17=array();
	$data18=array();
	$data19=array();
	$data20=array();
	$data21=array();
	$data22=array();

 	
 	$query2="SELECT idDiscapacidadBeneficiarios,beneficiariosDirectosDiscapacidad__conjuntos,visualDirectosDiscapacidad__conjuntos,auditivaDirectosDiscapacidad__conjuntos,multisensoerialDirectosDiscapacidad__conjuntos,intelectualDirectosDiscapacidad__conjuntos,fisicaDirectosDiscapacidad__conjuntos,psiquicaDirectosDiscapacidad__conjuntos,totalDirectosDiscapacidad__conjuntos FROM pro_beneficiarios_discapacidad WHERE codigo='$codigoProyectoPdf';";
	$resultado2 = $conexionEstablecida->query($query2);


	while($registro2 = $resultado2->fetch()) {

		$idDiscapacidadBeneficiarios=$registro2['idDiscapacidadBeneficiarios'];
		array_push($data14, $idDiscapacidadBeneficiarios);

		$beneficiariosDirectosDiscapacidad__conjuntos=$registro2['beneficiariosDirectosDiscapacidad__conjuntos'];
		array_push($data15, $beneficiariosDirectosDiscapacidad__conjuntos);

		$visualDirectosDiscapacidad__conjuntos=$registro2['visualDirectosDiscapacidad__conjuntos'];
		array_push($data16, $visualDirectosDiscapacidad__conjuntos);

		$auditivaDirectosDiscapacidad__conjuntos=$registro2['auditivaDirectosDiscapacidad__conjuntos'];
		array_push($data17, $auditivaDirectosDiscapacidad__conjuntos);

		$multisensoerialDirectosDiscapacidad__conjuntos=$registro2['multisensoerialDirectosDiscapacidad__conjuntos'];
		array_push($data18, $multisensoerialDirectosDiscapacidad__conjuntos);

		$intelectualDirectosDiscapacidad__conjuntos=$registro2['intelectualDirectosDiscapacidad__conjuntos'];
		array_push($data19, $intelectualDirectosDiscapacidad__conjuntos);

		$fisicaDirectosDiscapacidad__conjuntos=$registro2['fisicaDirectosDiscapacidad__conjuntos'];
		array_push($data20, $fisicaDirectosDiscapacidad__conjuntos);

		$psiquicaDirectosDiscapacidad__conjuntos=$registro2['psiquicaDirectosDiscapacidad__conjuntos'];
		array_push($data21, $psiquicaDirectosDiscapacidad__conjuntos);

		$totalDirectosDiscapacidad__conjuntos=$registro2['totalDirectosDiscapacidad__conjuntos'];
		array_push($data22, $totalDirectosDiscapacidad__conjuntos);

	}
	
 	
 	/*=====  End of Beneficiarios Especiales  ======*/
 	
 	/*================================================
 	=            Beneficiarios Indirectos            =
 	================================================*/
 	
 	$data23=array();
	$data24=array();
	$data25=array();
	$data26=array();
	$data27=array();


 	$query3="SELECT idIndirectos,beneficiariosDirectosIndirectos__conjuntos,totalDirectosIndirectos__conjuntos,justificacionCuantitativaDirectosIndirectos__conjuntos FROM pro_beneficiarios_indirectos WHERE codigo='$codigoProyectoPdf';";
	$resultado3 = $conexionEstablecida->query($query3);


	while($registro3 = $resultado3->fetch()) {

		$beneficiariosDirectosIndirectos__conjuntos=$registro3['beneficiariosDirectosIndirectos__conjuntos'];
		array_push($data23, $beneficiariosDirectosIndirectos__conjuntos);

		$totalDirectosIndirectos__conjuntos=$registro3['totalDirectosIndirectos__conjuntos'];
		array_push($data24, $totalDirectosIndirectos__conjuntos);

		$justificacionCuantitativaDirectosIndirectos__conjuntos=$registro3['justificacionCuantitativaDirectosIndirectos__conjuntos'];
		array_push($data25, $justificacionCuantitativaDirectosIndirectos__conjuntos);

		$idIndirectos=$registro3['idIndirectos'];
		array_push($data27, $idIndirectos);
 	
 	/*=====  End of Beneficiarios Indirectos  ======*/
 	}


 	/*==============================================
 	=            Sección de componentes            =
 	==============================================*/
 	
   $querySeccionComponentes="SELECT presupuestoLetras,presupuesto,presupuestoLetras2,presupuesto2,presupuestoLetras3,presupuesto3,mensajePlurianual,presupuestoCuatro,presupuestoLetrasCuatro FROM pro_proyetosreferencias WHERE codigoProyecto='$codigoProyectoPdf' ORDER BY idProyectoReferencias DESC LIMIT 1;";
   $resultadoSeccionComponentes = $conexionEstablecida->query($querySeccionComponentes);     

   while($registro2SeccionComponentes = $resultadoSeccionComponentes->fetch()) {

      $presupuesto=$registro2SeccionComponentes['presupuesto'];
      $presupuestoLetras=$registro2SeccionComponentes['presupuestoLetras'];
      $presupuesto2=$registro2SeccionComponentes['presupuesto2'];
      $presupuestoLetras2=$registro2SeccionComponentes['presupuestoLetras2'];
      $presupuesto3=$registro2SeccionComponentes['presupuesto3'];
      $presupuestoLetras3=$registro2SeccionComponentes['presupuestoLetras3'];
      $presupuestoCuatro=$registro2SeccionComponentes['presupuestoCuatro'];
      $presupuestoLetrasCuatro=$registro2SeccionComponentes['presupuestoLetrasCuatro'];
      $mensajePlurianual=$registro2SeccionComponentes['mensajePlurianual'];

   } 	
 	
 	/*=====  End of Sección de componentes  ======*/
 	

 ?>

 <div class="margen__borde">

	  <table class="tabla__bordada">

	    <tr>
	      <td class="nombre__apartados__principales" align="left">
	        4&nbsp;&nbsp;&nbsp;&nbsp;COMPONENTES 
	      </td>
	    </tr>

	  </table>  

	  <table class="tabla__bordada__2">

	    <tr>
	      <td class="nombre__apartados__secundarios" align="left">
	        4.1&nbsp;&nbsp;&nbsp;&nbsp;PRESUPUESTO
	      </td>
	    </tr>

	  </table>


	  <table class="tabla__bordada__2">


	    <?php if ($mensajePlurianual!="pluriAnual"): ?>

	    <tr>

	      <td align="left">
	        El presupuesto requerido para la ejecución es de USD $ <?=$presupuesto?> (<?=$presupuestoLetras?>)
	      </td>

	    </tr>
	      
	    <?php else: ?>

	    <tr>

	      <td align="left">
	        El presupuesto requerido para la ejecución es de USD $ <?php $suma=array_sum($data9); echo round($suma,2)?> 
	      </td>

	    </tr>


	    <tr>
	        
	      <td align="left" class="nombre__apartados__secundarios">
	        Proyecto plurianual
	      </td>

	    </tr>


	    <tr>
	        
	      <td align="left">
	        Presupuesto 1 USD $ <?=$presupuesto?> (<?=$presupuestoLetras?>)
	      </td>

	    </tr>


	    <?php if (!empty($presupuesto2)): ?>

	      <tr>
	        
	        <td align="left">
	          Presupuesto 2 USD $  <?=$presupuesto2?> (<?=$presupuestoLetras2?>)
	        </td>

	      </tr>

	    <?php endif ?>


	    <?php if (!empty($presupuesto3)): ?>

	    <tr>
	        
	      <td align="left">
	        Presupuesto 3 USD $ <?=$presupuesto3?> (<?=$presupuestoLetras3?>)
	      </td>

	    </tr>

	    <?php endif ?>

	    

	    <?php if (!empty($presupuestoCuatro)): ?>

	    <tr>
	        
	      <td align="left">
	        Presupuesto 4 USD $ <?=$presupuestoCuatro?> (<?=$presupuestoLetrasCuatro?>)
	      </td>

	    </tr>

	    <?php endif ?>


	    <?php endif ?>


	  </table>

	  <table class="tabla__bordada__2">

	    <tr>
	      <td class="nombre__apartados__secundarios" align="left">
	        4.2&nbsp;&nbsp;&nbsp;&nbsp;DETALLE ADJUNTO
	      </td>
	    </tr>

	  </table>

 	<table class="tabla__bordada">

		<tr>
			<td class="nombre__apartados__principales" align="left">
				5&nbsp;&nbsp;&nbsp;&nbsp;BENEFICIARIOS 
			</td>
		</tr>

	</table>	

	<table class="tabla__bordada__2">

		<tr>
			<td class="nombre__apartados__secundarios" align="left">
				5.1&nbsp;&nbsp;&nbsp;&nbsp;IDENTIFICACIÓN Y CARACTERIZACIÓN DE LA POBLACIÓN BENEFICIARIA
			</td>
		</tr>

	</table>


	<table class="tabla__bordada__2">

		<tr>
			<td class="nombre__apartados__secundarios" align="left">
				5.1.1&nbsp;&nbsp;&nbsp;&nbsp;Beneficiarios Directos
			</td>
		</tr>

		<tr>

			<td class="fila__uno" align="left" style="text-align:justify;">
				Las personas que se benefician directamente de la ejecución del proyecto son las siguientes:
			</td>

		</tr>

	</table>

	<br>

	<!--============================================
	=            Beneficiarios directos            =
	=============================================-->
	
	<?php if (!empty($idBeneficiariosDirectos)): ?>
		

		<table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias">

			<thead>

				<tr>
					
					<th><center>BENEFICIARIOS DIRECTOS</center></th>
					<th><center>TOTAL</center></th>

				</tr>

			</thead>

			<tbody>

			<?php $sumaTotales=0;?>

			<?php for ($i=0; $i < count($data1); $i++) {?>

				<?php $sumaTotales=$sumaTotales+floatval($data13[$i]);?>

				<tr>

					<td><center><?=$data2[$i]?></center></td>
					<td><center><?=$data13[$i]?></center></td>

				</tr>

			 <?php }?>

			</tbody>

			<tfoot>
				<tr>
					<th align="right">
						Total
					</th>
					<th>
						<center>
							<?=$sumaTotales?>
						</center>
					</th>
				</tr>
			</tfoot>


		</table>

	<?php endif ?>

	
	<!--====  End of Beneficiarios directos  ====-->
	

	<!--======================================
	=            Deporte adaptado            =
	=======================================-->
	
	<?php if (!empty($idDiscapacidadBeneficiarios)): ?>

		<br>
		<br>
		<br>
		<br>

		<table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias">

			<thead>

				<tr>
					<th colspan="8"><center><div class="enfacis__celdas">*Cuadro exclusivo para deporte adaptado y/o paralímpico:</div></center></th>
				</tr>

				<tr>
					
					<th rowspan="2" class="padding__celdas"><center>BENEFICIARIOS DIRECTOS</center></th>
					<th colspan="6" rowspan="1" class="padding__celdas"><center>Tipo de discapacidad</center></th>
					<th rowspan="2" class="padding__celdas"><center>TOTAL</center></th>

				</tr>

				<tr>

					<td class="enfacis__celdas padding__celdas"><center>Visual</center></td>
					<td class="enfacis__celdas padding__celdas"><center>Auditiva</center></td>
					<td class="enfacis__celdas padding__celdas"><center>Multisensorial</center></td>
					<td class="enfacis__celdas padding__celdas"><center>Intelectual</center></td>
					<td class="enfacis__celdas padding__celdas"><center>Física</center></td>
					<td class="enfacis__celdas padding__celdas"><center>Psíquica</center></td>

				</tr>

			</thead>

			<tbody>

				<?php for ($i=0; $i < count($data14); $i++) {?>

				<tr>

					<td><?=$data15[$i]?></td>
					<td><?=$data16[$i]?></td>
					<td><?=$data17[$i]?></td>
					<td><?=$data18[$i]?></td>
					<td><?=$data19[$i]?></td>
					<td><?=$data20[$i]?></td>
					<td><?=$data21[$i]?></td>
					<td><?=$data22[$i]?></td>

				</tr>

				<?php }?>

			</tbody>

		</table>
		
	<?php endif ?>
	
	<!--====  End of Deporte adaptado  ====-->
	

<!--==============================================
=            Beneficiarios Indirectos            =
===============================================-->

<?php if (!empty($idIndirectos)): ?>


	<table class="tabla__bordada__2">

		<tr>
			<td class="nombre__apartados__secundarios" align="left">
				5.1.2&nbsp;&nbsp;&nbsp;&nbsp;Beneficiarios Indirectos
			</td>
		</tr>

		<tr>

			<td class="fila__uno" align="left" style="text-align:justify;">
				Son aquellas personas que se benefician de forma indirecta con el desarrollo del proyecto. Ejemplo: cuerpo técnico, médicos, delegados y/o pobladores que se ubican en zonas de influencia del objeto de financiamiento.
			</td>

		</tr>

	</table>

	<br>

	<table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias">

		<thead>

			<tr>
					
				<th class="padding__celdas"><center>BENEFICIARIOS INDIRECTOS</center></th>
				<th class="padding__celdas"><center>TOTAL</center></th>
				<th class="padding__celdas"><center>JUSTIFICACIÓN CUANTITATIVA</center></th>

			</tr>

		</thead>

		<tbody>

			<?php for ($i=0; $i < count($data27); $i++) {?>

				<tr>

					<td><?=$data23[$i]?></td>
					<td><?=$data24[$i]?></td>
					<td><?=$data25[$i]?></td>

				</tr>

			<?php }?>

		</tbody>

	</table>

<?php endif ?>

<!--====  End of Beneficiarios Indirectos  ====-->


 </div>