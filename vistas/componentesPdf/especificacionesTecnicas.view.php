<?php

	extract($_POST);

	require_once "../../conexion/conexion.php";

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();
	
	/*==========================================
	=            Consulta proyectos            =
	==========================================*/
	
	$query3="SELECT situacionLegalPredio,numeroCertificadoPropiedad FROM pro_proyetosreferencias WHERE codigoProyecto='$codigoProyectoPdf';";
	$resultado3 = $conexionEstablecida->query($query3);

	while($registro3 = $resultado3->fetch()) {

		$situacionLegalPredio=$registro3['situacionLegalPredio'];
		$numeroCertificadoPropiedad=$registro3['numeroCertificadoPropiedad'];

			
	}

	
	/*=====  End of Consulta proyectos  ======*/
 

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


 	<table class="tabla__bordada">

		<tr>
			<td class="nombre__apartados__principales" align="left">
				3&nbsp;&nbsp;&nbsp;&nbsp;OBJETO DE FINANCIAMIENTO 
			</td>
		</tr>

	</table>	

	<table class="tabla__bordada__2">

		<tr>
			<td class="nombre__apartados__secundarios" align="left">
				3.1&nbsp;&nbsp;&nbsp;&nbsp;ASPECTO JURÍDICO - UBICACIÓN
			</td>
		</tr>

	</table>		

	<table class="tabla__bordada__2">

		<tr>
			<td class="nombre__apartados__secundarios" align="left">
				3.1.1&nbsp;&nbsp;&nbsp;&nbsp;Situación Legal del Predio
			</td>
		</tr>


		<tr>
			<td align="left">
				<?=nl2br($situacionLegalPredio)?>
			</td>
		</tr>

	</table>	


	<table class="tabla__bordada__2">

		<tr>

			<td align="left" style="width:35%;">
				<span class="nombre__apartados__secundarios">3.1.2&nbsp;&nbsp;&nbsp;&nbsp;Certificado de propiedad Nro.</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=nl2br($numeroCertificadoPropiedad)?>
			</td>

		</tr>

	</table>	



	<table class="tabla__bordada__2">

		<tr>
			<td class="nombre__apartados__secundarios" align="left">
				3.1.3&nbsp;&nbsp;&nbsp;&nbsp;Especificaciones Técnicas
			</td>
		</tr>

	</table>	

	<br>
	
	<table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias">

		<thead>

			<tr>

				<th>
					<center>N.</center>
				</th>

				<th>
					<center>Rubros</center>
				</th>


				<th>
					<center>Medición</center>
				</th>

			</tr>

		</thead>

		<tbody>

			<?php foreach ($data1 as $clave => $valor): ?>

				<?php if ($data2[$clave]!="N/A"): ?>
					
				<tr>

					<td><center><?=$clave?></center></td>
					<td><center><?=$data2[$clave]?></center></td>
					<td><center><?=$data3[$clave]?></center></td>

				</tr>

				<?php endif ?>
				
			<?php endforeach ?>

		</tbody>

	</table>	

</div>

<!--====  End of Ubicaciones internacionales  ====-->