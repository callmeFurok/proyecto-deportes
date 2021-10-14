<?php

	extract($_POST);

	require_once "../../conexion/conexion.php";

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

 	/*=============================
 	=            Metas            =
 	=============================*/
 	
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
	$data14=array();
	$data15=array();


	/*=====  End of Declaración arrays  ======*/
	


	
 	$query="SELECT idMetas,nombre__conjunto,descripcion__conjunto,metodoCalculo__conjunto,metaPropuesta__conjunto,periodo__conjunto FROM pro_metas WHERE codigo='$codigoProyectoPdf';";
	$resultado = $conexionEstablecida->query($query);


	while($registro = $resultado->fetch()) {

		$idMetas=$registro['idMetas'];
		array_push($data1, $idMetas);

		$nombre__conjunto=$registro['nombre__conjunto'];
		array_push($data2, $nombre__conjunto);

		$descripcion__conjunto=$registro['descripcion__conjunto'];
		array_push($data3, $descripcion__conjunto);

		$metodoCalculo__conjunto=$registro['metodoCalculo__conjunto'];
		array_push($data4, $metodoCalculo__conjunto);

		$metaPropuesta__conjunto=$registro['metaPropuesta__conjunto'];
		array_push($data5, $metaPropuesta__conjunto);

		$periodo__conjunto=$registro['periodo__conjunto'];
		array_push($data6, $periodo__conjunto);
	}


 	
 	/*=====  End of Metas  ======*/
 	

 	/*===================================
 	=            Pronosticos            =
 	===================================*/
 	
  	$query2="SELECT idPronosticos,deportistas__conjunto,disciplina__conjunto,categoria__conjunto,division__conjunto,modalidadPrueba__conjunto,resultadoMarca__conjunto,eventoDeportistas__conjunto,prnosticosDeportistas__conjunto FROM pro_pronosticos WHERE codigo='$codigoProyectoPdf';";
	$resultado2 = $conexionEstablecida->query($query2);


	while($registro2 = $resultado2->fetch()) {

		$idPronosticos=$registro2['idPronosticos'];
		array_push($data7, $idPronosticos);

		$deportistas__conjunto=$registro2['deportistas__conjunto'];
		array_push($data8, $deportistas__conjunto);

		$disciplina__conjunto=$registro2['disciplina__conjunto'];
		array_push($data9, $disciplina__conjunto);

		$categoria__conjunto=$registro2['categoria__conjunto'];
		array_push($data10, $categoria__conjunto);

		$division__conjunto=$registro2['division__conjunto'];
		array_push($data11, $division__conjunto);

		$modalidadPrueba__conjunto=$registro2['modalidadPrueba__conjunto'];
		array_push($data12, $modalidadPrueba__conjunto);

		$resultadoMarca__conjunto=$registro2['resultadoMarca__conjunto'];
		array_push($data13, $resultadoMarca__conjunto);
	
		$eventoDeportistas__conjunto=$registro2['eventoDeportistas__conjunto'];
		array_push($data14, $eventoDeportistas__conjunto);

		$prnosticosDeportistas__conjunto=$registro2['prnosticosDeportistas__conjunto'];
		array_push($data15, $prnosticosDeportistas__conjunto);

	}	
 	
 	/*=====  End of Pronosticos  ======*/
 	

 	$contador=1;

 ?>

 <div class="margen__borde">

 	<table class="tabla__bordada">

		<tr>
			<td class="nombre__apartados__secundarios" align="left">
				3.4&nbsp;&nbsp;&nbsp;&nbsp;META 
			</td>
		</tr>

	</table>	

	<br>


	<?php if (!empty($idMetas)): ?>


		<?php for ($i=0; $i < count($data1); $i++) { ?>

		<table style="position: relative; top: -2em; left: 1em;">

			<tr>
				<th class="nombre__apartados__secundarios">
					Indicador <?=($i+1)?>
				</th>
			</tr>

		</table>	
		

		<table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias">

			<tr>

				<th>Nombre del indicador:</th>
				<td><?=$data2[$i]?></td>

			</tr>


			<tr>

				<th>Descripción de lo que se pretende medir:</th>
				<td><?=$data3[$i]?></td>

			</tr>


			<tr>

				<th>Método de cálculo o fórmula para calcular el resultado:</th>
				<td><?=$data4[$i]?></td>

			</tr>

			<tr>

				<th>Meta final esperada:</th>
				<td><?=$data5[$i]?></td>

			</tr>


			<tr>

				<th>Periodo de reporte del indicador:</th>
				<td><?=$data6[$i]?></td>

			</tr>

		</table>

		<?php }?>


	<?php endif ?> 	


 	<table class="tabla__bordada">

		<tr>
			<td class="nombre__apartados__secundarios" align="left">
				3.5&nbsp;&nbsp;&nbsp;&nbsp;PRONÓSTICO DE RESULTADOS  
			</td>
		</tr>

		<tr>
			<td align="left">
				De acuerdo al requerimiento de financiamiento, se detalla el pronóstico esperado, en la siguiente tabla: 
			</td>
		</tr>

	</table>	

	<br>


	<?php if (!empty($idPronosticos)): ?>

		<table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias" style="table-layout:fixed;">

			<thead>

				<tr>
					
					<th style="width:5px!important;">N°</th>
					<th style="width:5px!important;">DEPORTISTA</th>
					<th style="width:5px!important;">DISCIPLINA</th>
					<th style="width:5px!important;">CATEGORÍA<br>DE EDAD</th>
					<th style="width:5px!important;">DIVISIÓN</th>
					<th style="width:5px!important;">MODALIDAD<br>PRUEBA</th>
					<th style="width:5px!important;">RESULTADO<br>(MARCA / TIEMPO) ESPERADO</th>
					<th style="width:5px!important;">EVENTO DE<br>PARTICIPAC<br>IÓN</th>
					<th style="width:5px!important;">PRONÓSTICO<br>DE UBICACIÓN</th>

				</tr>

			</thead>

			<tbody>

			<?php for ($i=0; $i < count($data7); $i++) { ?>

				<tr>

					<td style="width:5px!important;"><center><?=($contador+$i)?></center></td>
					<td style="width:5px!important;"><?=$data8[$i]?></td>
					<td style="width:5px!important;"><?=$data9[$i]?></td>
					<td style="width:5px!important;"><?=$data10[$i]?></td>
					<td style="width:5px!important;"><?=$data11[$i]?></td>
					<td style="width:5px!important;"><?=$data12[$i]?></td>
					<td style="width:5px!important;"><?=$data13[$i]?></td>
					<td style="width:5px!important;"><?=$data14[$i]?></td>
					<td style="width:5px!important;"><?=$data15[$i]?></td>

				</tr>

			<?php }?>
		 		
			</tbody>

		</table>

	<?php endif ?> 	


 </div>