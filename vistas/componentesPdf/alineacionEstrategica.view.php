<?php

	extract($_POST);

	require_once "../../conexion/conexion.php";

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

 	$array=array();

	$query="SELECT tipoTramite FROM pro_infraselects WHERE codigo='$codigoProyectoPdf';";
	$resultado = $conexionEstablecida->query($query);		

	while($registro2 = $resultado->fetch()) {

		$tipoTramite=$registro2['tipoTramite'];
		array_push($array, $tipoTramite);
			
	}

	for ($i=0; $i < count($array); $i++) { 

		if ($array[$i]=="altoRendimiento" || $array[$i]=="altoRendimientoDiscapacidad" || $array[$i]=="profesional") {
			
			$objetivo="Incrementar el rendimiento de los atletas en la consecución de logros deportivos.";

		}else if($array[$i]=="formativo" || $array[$i]=="estudiantil" || $array[$i]=="recreativo" || $array[$i]=="infra" || $array[$i]=="infraTeconlogicos"){

			$objetivo="Incrementar la práctica de la cultura física en la población del Ecuador.";

		}

	}

?>


 <div class="margen__borde">

 	<table class="tabla__bordada__3">

		<tr>
			<td class="nombre__apartados__secundarios" align="left">
				3.3&nbsp;&nbsp;&nbsp;&nbsp;ALINEACIÓN ESTRATÉGICA
			</td>
		</tr>

		<tr>

			<td class="fila__uno" align="left" style="text-align:justify;">

				Este programa/proyecto se alinea a la Planificación Estratégica del Ministerio del Deporte a través del siguiente Objetivo Estratégico:

			</td>

		</tr>

		<tr>

			<td class="fila__uno" align="left" style="text-align:justify;">
				<li style="list-style: disc; margin-left:4em;"><?=nl2br($objetivo)?></li>
			</td>

		</tr>

	</table>


 </div>