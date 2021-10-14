<?php

	extract($_POST);

	require_once "../../conexion/conexion.php";

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();


	$query="SELECT analisisSituacionActual,justificacionCaracterizacion,objetivoGeneralCaracterizacion FROM pro_caracterizacion WHERE codigo='$codigoProyectoPdf' ORDER BY idCaracterizacion DESC LIMIT 1;";
	$resultado = $conexionEstablecida->query($query);	

	while($registro2 = $resultado->fetch()) {

		$analisisSituacionActual=$registro2['analisisSituacionActual'];
		$justificacionCaracterizacion=$registro2['justificacionCaracterizacion'];
		$objetivoGeneralCaracterizacion=$registro2['objetivoGeneralCaracterizacion'];
			
	}

	/*==========================================
	=            Declaración arrays            =
	==========================================*/
	
	$data1=array();
	$data2=array();

	/*=====  End of Declaración arrays  ======*/

	$query2="SELECT idObjetivosEspecificos,objetivosEspecificos FROM pro_objetivosespecificos WHERE codigo='$codigoProyectoPdf';";
	$resultado2 = $conexionEstablecida->query($query2);


	while($registro = $resultado2->fetch()) {

		$objetivosEspecificos=$registro['objetivosEspecificos'];
		array_push($data1, $objetivosEspecificos);

		$idObjetivosEspecificos=$registro['idObjetivosEspecificos'];
		array_push($data2, $idObjetivosEspecificos);

	}

	$contadorEsporadico=1;

 ?>

 <div class="margen__borde">

 	<table class="tabla__bordada">

		<tr>
			<td class="nombre__apartados__principales" align="left">
				3&nbsp;&nbsp;&nbsp;&nbsp;CARACTERIZACIÓN, OBJETIVOS Y ALINEACIÓN ESTRATÉGICAL 
			</td>
		</tr>

	</table>	


	<table class="tabla__bordada__3">

		<tr>
			<td class="nombre__apartados__secundarios" align="left">
				3.1&nbsp;&nbsp;&nbsp;&nbsp;BENEFICIOS DEL PROYECTO
			</td>
		</tr>

		<tr>

			<td class="fila__uno" align="left" style="text-align:justify;">
				<?=nl2br($justificacionCaracterizacion)?>
			</td>

		</tr>


	</table>

	<table class="tabla__bordada__3">

		<tr>
			<td class="nombre__apartados__secundarios" align="left">
				3.2&nbsp;&nbsp;&nbsp;&nbsp;OBJETIVOS GENERAL Y ESPECÍFICOS
			</td>
		</tr>

	</table>

	<table class="tabla__bordada__3">

		<tr>
			<td class="nombre__apartados__secundarios" align="left">
				3.2.1&nbsp;&nbsp;&nbsp;&nbsp;Objetivo general o propósito
			</td>
		</tr>

		<tr>

			<td class="fila__uno" align="left" style="text-align:justify;">
				<?=nl2br($objetivoGeneralCaracterizacion)?>
			</td>

		</tr>

	</table>

	<table class="tabla__bordada__3">

		<tr>
			<td class="nombre__apartados__secundarios" align="left">
				3.2.2&nbsp;&nbsp;&nbsp;&nbsp;Objetivos Específicos
			</td>
		</tr>

		<?php for ($i=0; $i < count($data1); $i++){?>

		<tr>

			<td class="fila__uno" align="left" style="text-align:justify;">
				a.<?=($contadorEsporadico++)?>&nbsp;&nbsp;&nbsp;<?=nl2br($data1[$i])?>
			</td>

		</tr>

		<?php }?>

	</table>



 </div>