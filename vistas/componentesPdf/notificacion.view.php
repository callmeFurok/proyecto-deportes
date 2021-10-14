
<?php
   
   extract($_POST);


   require_once "../../conexion/conexion.php";

   $conexionRecuperada= new conexion();
   $conexionEstablecida=$conexionRecuperada->cConexion();

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


   $query="SELECT a.nombre,b.nombreOrganismo,b.rucOrganismo,b.telefono,b.email,a.monto FROM pro_proyecto AS a INNER JOIN pro_federacion AS b ON a.idUsuario=b.rucOrganismo WHERE a.codigo='$codgioProyectoDocumentos';";
   $resultado = $conexionEstablecida->query($query);     

   while($registro2 = $resultado->fetch()) {

      $nombre=$registro2['nombre'];
      $nombreOrganismo=$registro2['nombreOrganismo'];
      $identificacion=$registro2['rucOrganismo'];

      $telefonoUsado=$registro2['telefono'];
      $emailOrganismo=$registro2['email'];
      $monto=$registro2['monto'];

   }

   $query2="SELECT a.nombre AS proyectoCiudadanos,b.nombreCompleto AS nombreCompletoCiu,b.cedulaUsuario,b.telefono,b.email,a.monto FROM pro_proyecto AS a INNER JOIN pro_deportistaorganismo AS b ON a.idUsuario=b.cedulaUsuario WHERE a.codigo='$codgioProyectoDocumentos';";
   $resultado2 = $conexionEstablecida->query($query2);     

   while($registro22 = $resultado2->fetch()) {

      $proyectoCiudadanos=$registro22['proyectoCiudadanos'];
      $nombreCompletoCiu=$registro22['nombreCompletoCiu'];
      $identificacion=$registro22['cedulaUsuario'];

      $telefonoUsado=$registro22['telefono'];
      $emailCiudadano=$registro22['email'];

      $monto=$registro22['monto'];

   }



   if (!empty($nombreOrganismo)) {

   	$proyecto=$nombre;
   	$psotulante=$nombreOrganismo;
   	$emailUsado=$emailOrganismo;
 

   }else{

   	$proyecto=$proyectoCiudadanos;
   	$psotulante=$nombreCompletoCiu;
   	$emailUsado=$emailCiudadano;

   }

	
	/*================================
	=            Querys 5            =
	================================*/

	$dataReferentes=array();
	
 	$queryQuinto="SELECT tipoTramite FROM pro_infraselects WHERE codigo='$codgioProyectoDocumentos';";
	$resultadoQuinto = $conexionEstablecida->query($queryQuinto);


	while($registroQuinto = $resultadoQuinto->fetch()) {

		$tipoTramite=$registroQuinto['tipoTramite'];
		array_push($dataReferentes, $tipoTramite);

	}	
			
	
	/*=====  End of Querys 5  ======*/

	
	/*==============================================
	=            Querys enfatizados dos            =
	==============================================*/
	
 	$querySeptimoDos="SELECT objetivoGeneralCaracterizacion FROM pro_caracterizacion WHERE codigo='$codgioProyectoDocumentos' ORDER BY idCaracterizacion DESC LIMIT 1";
	$resultadoSeptimoDos = $conexionEstablecida->query($querySeptimoDos);
	
	
	while($registroSeptimoDos= $resultadoSeptimoDos->fetch()) {

		$objetivoGeneralCaracterizacion=$registroSeptimoDos['objetivoGeneralCaracterizacion'];

	}	
				
	
	/*=====  End of Querys enfatizados dos  ======*/

	/*======================================
	=            Querys octavos            =
	======================================*/
	
	$dataReferentesTres=array();

 	$queryMetados="SELECT nombre__conjunto FROM pro_metas WHERE codigo='$codigo';";
	$resultadoMetados = $conexionEstablecida->query($queryMetados);


	while($registroMetados = $resultadoMetados->fetch()) {

		$nombre__conjunto=$registroMetados['nombre__conjunto'];
		array_push($dataReferentesTres, $nombre__conjunto);

	}


	
	/*=====  End of Querys octavos  ======*/
	

?>

<table class="tabla__bordada">

	<tr>
		<td class="contenedor___nombre__proyecto enfacis__letras" align="center">
			CALIFICACIÓN DE PRIORIDAD DE PROYECTO DEPORTIVO
		</td>
	</tr>

	<tr>
		<td class="contenedor___nombre__proyecto enfacis__letras" align="center">
			AÑO <?=$anio?>
		</td>
	</tr>

</table>	


<table class="tabla__bordada__2 tablas__bordes__necesarias">

	<tr>
		<td class="contenedor___nombre__proyecto enfacis__letras" align="left" colspan="2">
			DATOS DEL SOLICITANTE
		</td>
	</tr>

	<tr>

		<td class="contenedor___nombre__proyecto enfacis__letras" style="font-size: 12px!important;">

			IDENTIFICACIÓN:

		</td>

		<td style="font-size: 12px!important;" align="left">

			<?=$identificacion?>

		</td>

	</tr>

	<tr>

		<td class="contenedor___nombre__proyecto enfacis__letras" style="font-size: 12px!important;">

			NOMBRE DEL SOLICITANTE:

		</td>

		<td style="font-size: 12px!important;" align="left">

			<?=$psotulante?>

		</td>

	</tr>

	<tr>

		<td class="contenedor___nombre__proyecto enfacis__letras" style="font-size: 12px!important;">

			FECHA DE EMISIÓN:

		</td>

		<td style="font-size: 12px!important;" align="left">

			<?=$dia?> de <?=$monthName?> de <?=$anio?>

		</td>

	</tr>

	<tr>

		<td class="contenedor___nombre__proyecto enfacis__letras" style="font-size: 12px!important;">

			TELÉFONO:

		</td>

		<td style="font-size: 12px!important;" align="left">

			<?=$telefonoUsado?>

		</td>

	</tr>

	<tr>

		<td class="contenedor___nombre__proyecto enfacis__letras" style="font-size: 12px!important;">

			CORREO ELECTRÓNICO:

		</td>

		<td style="font-size: 12px!important;" align="left">
			
			<?=$emailUsado?>
			
		</td>

	</tr>

	<tr>

		<td class="contenedor___nombre__proyecto enfacis__letras" style="font-size: 12px!important;">

			NOMBRE DEL PROYECTO:

		</td>

		<td style="font-size: 12px!important;" align="left">

			<?=$proyecto?>

		</td>

	</tr>

	<tr>

		<td class="contenedor___nombre__proyecto enfacis__letras" style="font-size: 12px!important;">

			SECTOR AL QUE CONTRIBUYE:

		</td>

		<td style="font-size: 12px!important;" align="left">

			<?php for ($i=0;$i<count($dataReferentes);$i++): ?>
						
				<?=$dataReferentes[$i]?>
				<br>

			<?php endfor?>

		</td>

	</tr>

	<tr>

		<td class="contenedor___nombre__proyecto enfacis__letras" style="font-size: 12px!important;">

			MONTO:

		</td>

		<td style="font-size: 12px!important;" align="left">

			<?=$monto?>

		</td>

	</tr>

	<tr>
		<td class="contenedor___nombre__proyecto enfacis__letras" align="left" colspan="2">
			INFORMACIÓN DEL PROGRAMA/PROYECTO
		</td>
	</tr>

	<tr>

		<td class="contenedor___nombre__proyecto enfacis__letras" style="font-size: 12px!important;">

			OBJETIVO DEL PROYECTO

		</td>

		<td style="font-size: 12px!important;" align="left">

			<?=$objetivoGeneralCaracterizacion?>

		</td>

	</tr>

	<tr>

		<td class="contenedor___nombre__proyecto enfacis__letras" style="font-size: 12px!important;">

			METAS DEL PROYECTO

		</td>

		<td style="font-size: 12px!important;" align="left">

		<?php for($i=0;$i<count($dataReferentesTres);$i++): ?>
						
			<?=$dataReferentesTres[$i]?>

			<br>

		<?php endfor ?>

		</td>

	</tr>

	<tr>

		<td colspan="2" style="font-weight: bold;" align="justify">

			El Ministerio del Deporte, a través del Comité de Calificación y Certificación para acceder al incentivo tributario PRIORIZA Y <?=$notificacionDirecta?> el proyecto "<?=$proyecto?>".

		</td>

	</tr>

</table>

<table class="tabla__bordada">

	<tr>

		<td>
			
			<span style="font-weight: bold;">Condiciones:</span>&nbsp;En caso de verificarse que la información presentada por el solicitante no se sujeta a la realidad o que ha incumplido con los requisitos o el procedimiento establecido en la normativa para la obtención del certificado de calificación, la autoridad emisora de dicho título podrá dejarlo sin efecto hasta que el solicitante cumpla con la normativa respectiva, sin perjuicio del inicio de los procesos o la aplicación de las sanciones que correspondan de conformidad con el ordenamiento jurídico vigente.

		</td>

	</tr>

</table>	

<table class="tabla__bordada">

	<tr>

		<td>
			
			<span style="font-weight: bold;">Acuerdo de Responsabilidad: </span>&nbsp;El solicitante asume la responsabilidad total de la veracidad de la información ingresada durante el proceso de calificación, sin perjuicio de las acciones judiciales a que hubiere lugar, de conformidad a lo dispuesto en el primer inciso del artículo 270 del Código Orgánico Integral Penal.

		</td>

	</tr>

</table>