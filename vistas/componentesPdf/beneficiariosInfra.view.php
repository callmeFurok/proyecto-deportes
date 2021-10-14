<?php

	extract($_POST);

	require_once "../../conexion/conexion.php";

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

 	/*=============================================
 	=            Bneficiarios Directos            =
 	=============================================*/
 	
	$data26=array();
	$data27=array();
	$data28=array();

 	$querySegundo="SELECT idBeneficiariosDirectos,beneficiariosDirectos__conjuntos,totalDirectos__conjuntos FROM pro_beneficiarios_directos WHERE codigo='$codigoProyectoPdf';";
	$resultadoSegundo = $conexionEstablecida->query($querySegundo);


	while($registroSegundo = $resultadoSegundo->fetch()) {

		$idBeneficiariosDirectos=$registroSegundo['idBeneficiariosDirectos'];
		array_push($data28, $idBeneficiariosDirectos);

		$beneficiariosDirectos__conjuntos=$registroSegundo['beneficiariosDirectos__conjuntos'];
		array_push($data26, $beneficiariosDirectos__conjuntos);

		$totalDirectos__conjuntos=$registroSegundo['totalDirectos__conjuntos'];
		array_push($data27, $totalDirectos__conjuntos);

	}
 	
 	/*=====  End of Bneficiarios Directos  ======*/

/*=================================================
=            Pro proyectos referencias            =
=================================================*/

	$query3="SELECT fechaFinalPlazo,fechaInicialPlazo FROM pro_proyetosreferencias WHERE codigoProyecto='$codigoProyectoPdf';";
	$resultado3 = $conexionEstablecida->query($query3);

	while($registro3 = $resultado3->fetch()) {

		$fechaFinalPlazo=$registro3['fechaFinalPlazo'];
		$fechaInicialPlazo=$registro3['fechaInicialPlazo'];
			
	}

	

/*=====  End of Pro proyectos referencias  ======*/



 /*===================================
 =            Cronogramas            =
 ===================================*/
 
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
	$data11=array();
	$data12=array();
	$data13=array();

	/*=====  End of Declaración arrays  ======*/
	
	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();	

 	$query="SELECT numero__conjunto,descripcion__conjunto,unidad__conjunto,cantidad__conjunto,precioUnitario__conjunto,subtotal__conjunto,codigo,elementosResultantes,medicion__conjunto,formasDePago__conjunto,valorPreferencialConjunto,idInfrasCronograma FROM pro_cronograma WHERE codigo='$codigoProyectoPdf';";
	$resultado = $conexionEstablecida->query($query);


	while($registro = $resultado->fetch()) {

		$numero__conjunto=$registro['numero__conjunto'];
		array_push($data1, $numero__conjunto);

		$descripcion__conjunto=$registro['descripcion__conjunto'];
		array_push($data2, $descripcion__conjunto);

		$unidad__conjunto=$registro['unidad__conjunto'];
		array_push($data3, $unidad__conjunto);

		$cantidad__conjunto=$registro['cantidad__conjunto'];
		array_push($data4, $cantidad__conjunto);

		$precioUnitario__conjunto=$registro['precioUnitario__conjunto'];
		array_push($data5, $precioUnitario__conjunto);

		$subtotal__conjunto=$registro['subtotal__conjunto'];
		array_push($data6, $subtotal__conjunto);

		$elementosResultantes=$registro['elementosResultantes'];
		array_push($data7, $elementosResultantes);

		$medicion__conjunto=$registro['medicion__conjunto'];
		array_push($data8, $medicion__conjunto);

		$formasDePago__conjunto=$registro['formasDePago__conjunto'];
		array_push($data9, $formasDePago__conjunto);

		$valorPreferencialConjunto=$registro['valorPreferencialConjunto'];
		array_push($data10, $valorPreferencialConjunto);

		$idInfrasCronograma=$registro['idInfrasCronograma'];
		array_push($data11, $idInfrasCronograma);

	}
 
 /*=====  End of Cronogramas  ======*/

 ?>

 <div class="margen__borde">


	<table class="tabla__bordada__2">

		<tr>
			<td class="nombre__apartados__secundarios" align="left">
				3.1.4&nbsp;&nbsp;&nbsp;&nbsp;Beneficiarios
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

			<?php for ($i=0; $i < count($data26); $i++) {?>

				<tr>

					<td><center><?=$data26[$i]?></center></td>
					<td><center><?=$data27[$i]?></center></td>

				</tr>

			 <?php }?>

			</tbody>


		</table>

	<?php endif ?>

	
	<!--====  End of Beneficiarios directos  ====-->
	<table class="tabla__bordada__2">

		<tr>
			<td class="nombre__apartados__secundarios" align="left">
				3.1.5&nbsp;&nbsp;&nbsp;&nbsp;Plazo de ejecución
			</td>
		</tr>

		<tr>

			<td>Del <?=$fechaInicialPlazo?> al <?=$fechaFinalPlazo?></td>

		</tr>

	</table>	



	<table class="tabla__bordada__2">

		<tr>
			<td class="nombre__apartados__secundarios" align="left">
				3.1.6&nbsp;&nbsp;&nbsp;&nbsp;Presupuesto Referencial (Requisito Indispensable)
			</td>
		</tr>

	</table>

	<br>

	<table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias">

		<thead>

			<tr>
					
				<th><center>NÚMERO</center></th>
				<th><center>DESCRIPCION DEL RUBRO</center></th>
				<th><center>UNIDAD</center></th>
				<th><center>CANTIDAD</center></th>
				<th><center>PRECIO UNITARIO</center></th>
				<th><center>SUBTOTAL</center></th>

			</tr>

		</thead>

		<tbody>

			<?php for ($i=0; $i < count($data2); $i++) {?>

				<?php if ($data2[$i]!="N/A" && $data2[$i]!="si"): ?>
					
				<tr>

					<td><center><?=$data1[$i]?></center></td>
					<td><center><?=$data2[$i]?></center></td>
					<td><center><?=$data3[$i]?></center></td>
					<td><center><?=$data4[$i]?></center></td>
					<td><center><?=$data5[$i]?></center></td>
					<td><center><?=$data6[$i]?></center></td>

				</tr>

				<?php endif ?>

			 <?php }?>

		</tbody>

		<tfoot>

			<tr>
				
				<th colspan="4"></th>
				<th colspan="1"><center>SUB TOTAL SIN IVA</center></th>
				<th><center><?=array_sum($data6)?></center></th>

			</tr>

			<tr>
				
				<th colspan="4"></th>
				<th colspan="1"><center>IVA</center></th>
				<th><center><?php $total=array_sum($data6)*0.12;echo $total;?></center></th>

			</tr>


			<tr>
				
				<th colspan="4"></th>
				<th colspan="1"><center>TOTAL</center></th>
				<th><center><?php $total=array_sum($data6)*0.12; $total2=array_sum($data6)+$total;echo number_format((float)$total2, 2, '.', '')?></center></th>

			</tr>

		</tfoot>

	</table>


 </div>