<?php

  $objeto= new usuario();

  $plantilla= new plantilla();


  $usuario=$objeto->usuarioCtr();

  $rucReconocidos=$objeto->ctrOrganismoRuc();

  $arrayUsuario = explode("___", $usuario);

  $datosGenerales=$objeto->ctrDatosGenerales();
  $arrayDatosGenerales = explode("___", $datosGenerales);


  if ($arrayUsuario[0]==2){

    $codigo=$arrayUsuario[11];
    $emailNuevo=$arrayUsuario[10];

  }else{

    $codigo=$arrayUsuario[13];
    $emailNuevo=$arrayUsuario[12];

  }

/*=================================
=            Proyectos            =
=================================*/

$proyectosDatosGenerales=$objeto->ctrProyectosFunciones($codigo);
$arrayProyectosDatos = explode("___", $proyectosDatosGenerales);

if (!empty($arrayProyectosDatos[0])) {
  $acumladorProyecto=14.28571428571429;
}



/*=====  End of Proyectos  ======*/

$conexionRecuperada= new conexion();
$conexionEstablecida=$conexionRecuperada->cConexion();  



/*=======================================
=            Caracterización            =
=======================================*/

$alineacionEstrategica=$objeto->ctrAlineacionEstrategica($codigo);
$arrayAlineacionEstrategicas = explode("___", $alineacionEstrategica);

if (!empty($arrayAlineacionEstrategicas[0])) {
  $acumladorCaracterizacion=14.28571428571429;
}

/*=====  End of Caracterización  ======*/


/*=============================
=            Metas           =
=============================*/

$query2="SELECT idMetas FROM pro_metas WHERE codigo='$codigo';";
$resultado2 = $conexionEstablecida->query($query2);


while($registro2 = $resultado2->fetch()) {

  $idMetas=$registro2['idMetas'];

}


if (!empty($idMetas)) {
  $acumladorMetas=14.28571428571429;
}

/*=====  End of Metas  ======*/

/*===================================
=            Componentes            =
===================================*/

$instancia=$objeto->ctrInstancia($codigo);

$arraySeleccionables = explode("____", $instancia);

 for ($i=0; $i < count($arraySeleccionables); $i++) { 

	if ($arraySeleccionables[$i]=="infra") {

		$consulta1="si";
		break;

	}else{

		$consulta1=false;

	}
 }


for ($z=0; $z < count($arraySeleccionables); $z++) { 

	if ($arraySeleccionables[$z]=="profesional") {

		$consultaComponentes="si";

		break;

	}else{

		$consultaComponentes="no";

	}
}



$componentes=$objeto->ctrComponentesTraidos($codigo);

if ($consulta1=="si") {

	$dataCronogramas=array();
	$dataCronogramasAgrupadosSolitarios=array();

	$queryCronogramas="SELECT elementosResultantes FROM pro_cronograma WHERE codigo='$codigo';";
	$resultadoCronogramas = $conexionEstablecida->query($queryCronogramas);

	while($registroCronogramas = $resultadoCronogramas->fetch()) {

		$elementosResultantes=$registroCronogramas['elementosResultantes'];
		array_push($dataCronogramas, $elementosResultantes);
	}


	for ($i=0; $i < count($dataCronogramas); $i++) { 

		$arrayConvertidos = explode (",",$dataCronogramas[$i]);

		for($z=0;$z<count($arrayConvertidos);$z++){

			$valorSumitas=floatval($arrayConvertidos[$z]);

			array_push($dataCronogramasAgrupadosSolitarios, $valorSumitas);

		}
		
	}

	$sumatoresArraysCronograma=array_sum($dataCronogramasAgrupadosSolitarios);

	$dataComponentes=array();

	$queryComponentes="SELECT a.campos FROM pro_componentesciudadanos AS a WHERE a.identificador='b' AND a.codigo='$codigo';";
	$resultadoComponentes = $conexionEstablecida->query($queryComponentes);

	while($registroComponentes = $resultadoComponentes->fetch()) {

		$campos=$registroComponentes['campos'];
		array_push($dataComponentes, $campos);

	}

	$sumatoresArrays=0;

	$arrayConvertidos=array();

	$anadidosLasts=array();

	$sumadorGlobal=0;

	$sumadorGlobalDos=0;

	for ($i=0; $i < count($dataComponentes); $i++) { 

		$arrayConvertidos = explode ("/../",$dataComponentes[$i]);

		$anadidosLastsVariables = end($arrayConvertidos);

		$anadidosLastsVariables=floatval($anadidosLastsVariables);

		array_push($anadidosLasts, $anadidosLastsVariables);

		
	}

	$sumatoresArrays=array_sum($anadidosLasts);

	$sumadorTotales=0;

	$sumadorDifrencias=0;

	$sumadorTotales= floatval($arrayProyectosDatos[7]) + floatval($arrayProyectosDatos[9]) + floatval($arrayProyectosDatos[11]) + floatval($arrayProyectosDatos[18]);	

	if ($consultaComponentes=="si") {

		function porcentaje($cantidad,$porciento,$decimales){
			return $cantidad*$porciento/100;
		}

		$porcientoPrioritarios =  porcentaje($sumadorTotales,20,2);
		$porcientoMujeres=  porcentaje($sumadorTotales,10,2);

		// $sumatoresArrays=floatval($sumatoresArrays) + floatval($porcientoPrioritarios) + floatval($porcientoMujeres);
	}

	


	$proyectosDatosGenerales=$objeto->ctrProyectosFunciones($codigo);

	$arrayProyectosDatos = explode("___", $proyectosDatosGenerales);


	$sumadorDifrencias=floatval($sumadorTotales)-(floatval($sumatoresArrays)+floatval($sumatoresArraysCronograma));


}else{

	$dataComponentes=array();

	$queryComponentes="SELECT a.campos FROM pro_componentesciudadanos AS a WHERE a.identificador='b' AND a.codigo='$codigo';";
	$resultadoComponentes = $conexionEstablecida->query($queryComponentes);

	while($registroComponentes = $resultadoComponentes->fetch()) {

		$campos=$registroComponentes['campos'];
		array_push($dataComponentes, $campos);

	}

	$sumatoresArrays=0;

	$arrayConvertidos=array();

	$anadidosLasts=array();

	$sumadorGlobal=0;

	$sumadorGlobalDos=0;

	for ($i=0; $i < count($dataComponentes); $i++) { 

		$arrayConvertidos = explode ("/../",$dataComponentes[$i]);

		$anadidosLastsVariables = end($arrayConvertidos);

		$anadidosLastsVariables=floatval($anadidosLastsVariables);

		array_push($anadidosLasts, $anadidosLastsVariables);

		
	}

	$sumatoresArrays=array_sum($anadidosLasts);

	$sumadorTotales=0;

	$sumadorDifrencias=0;

	$sumadorTotales= floatval($arrayProyectosDatos[7]) + floatval($arrayProyectosDatos[9]) + floatval($arrayProyectosDatos[11]) + floatval($arrayProyectosDatos[18]);	

	if ($consultaComponentes=="si") {

		function porcentaje($cantidad,$porciento,$decimales){
			return $cantidad*$porciento/100;
		}

		$porcientoPrioritarios =  porcentaje($sumadorTotales,20,2);
		$porcientoMujeres=  porcentaje($sumadorTotales,10,2);

		$sumatoresArrays=floatval($sumatoresArrays) + floatval($porcientoPrioritarios) + floatval($porcientoMujeres);
	}

	


	$proyectosDatosGenerales=$objeto->ctrProyectosFunciones($codigo);

	$arrayProyectosDatos = explode("___", $proyectosDatosGenerales);


	$sumadorDifrencias=floatval($sumadorTotales)-(floatval($sumatoresArrays)+floatval($sumatoresArraysCronograma));

}


if (!empty($componentes) || !empty($dataCronogramas[0])) {
  $acumuladorComponentes=14.28571428571429;
}

/*=====  End of Componentes  ======*/


/*=====================================
=            Beneficiarios            =
=====================================*/

$query3="SELECT idBeneficiariosDirectos FROM pro_beneficiarios_directos WHERE codigo='$codigo';";
$resultado3 = $conexionEstablecida->query($query3);


while($registro3 = $resultado3->fetch()) {

  $idBeneficiariosDirectos=$registro3['idBeneficiariosDirectos'];

}

if (!empty($idBeneficiariosDirectos)) {
  $acumladorBeneficiarios=14.28571428571429;
}

/*=====  End of Beneficiarios  ======*/

/*===================================
=            Metodología           =
===================================*/

$query4="SELECT idDescripcionActividades FROM pro_descripcionactividades WHERE codigo='$codigo';";
$resultado4 = $conexionEstablecida->query($query4);


while($registro4 = $resultado4->fetch()) {

  $idDescripcionActividades=$registro4['idDescripcionActividades'];

}

if (!empty($idDescripcionActividades)) {
  $acumladorMetodologia=14.28571428571429;
}

/*=====  End of Metodología  ======*/

/*==================================
=            Documentos            =
==================================*/

$documentosAnexosContadores=$objeto->ctrComponentesDocumentos($codigo);

if (!empty($documentosAnexosContadores)) {
  $acumuladorDocumentos=14.28571428571429;
}


/*=====  End of Documentos  ======*/


$sumadorAcumulador=0;

$sumadorAcumulador=floatval($acumladorProyecto)+floatval($acumladorCaracterizacion)+floatval($acumladorMetas)+floatval($acumladorBeneficiarios)+floatval($acumladorMetodologia)+$acumuladorDocumentos+floatval($acumuladorComponentes);

$sumadorAcumulador=number_format($sumadorAcumulador, 2);

/*=========================================
=            Documentos Anexos            =
=========================================*/

$documentosAnexos=$objeto->ctrDocumentosAnexos($codigo);
$documentosAnexosArray = explode("___", $documentosAnexos);

/*=====  End of Documentos Anexos  ======*/

/*=================================
=            Proyectos            =
=================================*/

$queryRealizadoNecesarios="SELECT proyectoCargadoPdf FROM pro_documentos WHERE codigo='$codigo';";
$resultadoRealizadoNecesarios = $conexionEstablecida->query($queryRealizadoNecesarios);


while($registroRealizadoNecesarios = $resultadoRealizadoNecesarios->fetch()) {

  $proyectoCargadoPdf=$registroRealizadoNecesarios['proyectoCargadoPdf'];

}

/*=====  End of Proyectos  ======*/


?>

<!--=================================================
=            Declaración de la plantilla            =
==================================================-->
<?php $usuariosConsultados= new usuariosConsultados();?>
<!--====  End of Declaración de la plantilla  ====-->


<!--==================================================
=            Edición de Documentos Anexos            =
===================================================-->

<?php $documentosAnexos=$objeto->ctrDocumentosAnexos($codigo);?>

<?php $documentosAnexosArray = explode("___", $documentosAnexos);?>

<!--====  End of Edición de Documentos Anexos  ====-->

<!--==========================================
=            Instancia Construida            =
===========================================-->

<?php $instancia=$objeto->ctrInstanciaTraidasComparadores($codigo);?>

<?php $arrayInstancias = explode("____", $instancia);?>


<!--====  End of Instancia Construida  ====-->


<div class="row contenedor__flexible__envios__segundos">

	<table>

		<thead>

			<tr>

				<?php if (floatval($sumadorDifrencias)>0){?>

					<tr>

						<td style="vertical-align:middle!important; font-size:12px; color:black; font-weight:bold; padding:1em;" colspan="2">
							<center>
								No se encuentra asignado el monto total de la sección componentes
							</center>
						</td>

					</tr>

				<?php }else if (empty($dataCronogramas[0]) && $consulta1=="si"){?>
					
					<tr>

						<td style="vertical-align:middle!important; font-size:12px; color:black; font-weight:bold; padding:1em;" colspan="2">
							<center>
								El proyecto se relaciona a infraestructura ingresar por favor el componente de construcción del apartado de componentes
							</center>
						</td>

					</tr>

				<?php }else if ($sumadorAcumulador==100 && !empty($documentosAnexosArray[0])): ?>

					<?php if (!empty($documentosAnexosArray[2]) && !empty($proyectoCargadoPdf)): ?>

						<tr>
							
							<td style="vertical-align:middle!important; font-size:12px; color:black!important; font-weight:bold; background:white!important;">
								<center>
									Volver a generar el proyecto
								</center>
							</td>

							<td style="vertical-align:middle!important; font-size:12px; color:black!important; font-weight:bold; background:white!important;">

								<center>

									<form class="col-sm-7 col-xs-7" action="modelosBd/documentoProyecto/proyecto.md.php" method="post">

										<input type="hidden" id="codigoProyectoPdf" name="codigoProyectoPdf" value="<?php if ($arrayUsuario[0]==2): ?><?= $arrayUsuario[11]; ?><?php endif ?><?php if ($arrayUsuario[0]==3): ?><?= $arrayUsuario[13]; ?><?php endif ?>" />

										<input type="hidden" name="cedulaRuc" id="cedulaRuc" value="<?= $arrayUsuario[3];?>">

									  	<button id="generarVisualizarPdf" name="generarVisualizarPdf" class="anadir__cosas"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;GENERAR PROYECTO</button>
									  	<span class="enviarDatosGenerales__reload"></span>

								  	</form>

								</center>

							</td>

						</tr>

						<?php if ($arrayInstancias[0]=="Técnico" || $arrayInstancias[2]=="Tecnológico"): ?>



						<tr>

							<td>Subir proyecto firmado electronicamente</td>

							<td style="vertical-align:middle!important; font-size:12px; color:black; font-weight:bold; display: flex; justify-content: center;" colspan="2">


								<input type="hidden" id="codigoProyectoPdf" name="codigoProyectoPdf" value="<?php if ($arrayUsuario[0]==2): ?><?= $arrayUsuario[11]; ?><?php endif ?><?php if ($arrayUsuario[0]==3): ?><?= $arrayUsuario[13]; ?><?php endif ?>" />

								<input type="hidden" name="cedulaRuc" id="cedulaRuc" value="<?= $arrayUsuario[3];?>">

								<input type="file" id="documentoProyecto" name="documentoProyecto" atributos="tecnicos">

								<div class="documentoAnexos__reloads"></div>


							</td>

						</tr>			

						<tr>
							
							<td style="vertical-align:middle!important; font-size:12px; color:black!important; font-weight:bold; background:white!important;">
								<center>
									Proyecto (descargar proyecto y firmar electronicamente)
								</center>
							</td>

							<td style="vertical-align:middle!important; font-size:12px; color:black!important; font-weight:bold; background:white!important;">

								<center>

									 <a href="documentos/proyectos/<?=$proyectoCargadoPdf?>.pdf" target="_blank" style="color:black;">Descargar pdf</a>

								</center>

							</td>

						</tr>

						<tr>
							
							<td style="vertical-align:middle!important; font-size:12px; color:black!important; font-weight:bold; background:white!important;">
								<center>
									Anexo componentes
								</center>
							</td>

							<td style="vertical-align:middle!important; font-size:12px; color:black!important; font-weight:bold; background:white!important;">

								<center>

									 <a href="documentos/anexosComponentes/<?=$proyectoCargadoPdf?>.pdf" target="_blank" style="color:black;">Descargar pdf</a>

								</center>

							</td>

						</tr>		

						<?php endif ?>

						<?php if ($arrayInstancias[1]=="Infraestructura"): ?>
							
						<tr>
							
							<td style="vertical-align:middle!important; font-size:12px; color:black!important; font-weight:bold; background:white!important;">
								<center>
									Proyecto infraestructura
								</center>
							</td>

							<td style="vertical-align:middle!important; font-size:12px; color:black!important; font-weight:bold; background:white!important;">

								<center>

									 <a href="documentos/proyectosInfraestructura/<?=$proyectoCargadoPdf?>.pdf" target="_blank" style="color:black;">Descargar pdf</a>

								</center>

							</td>

						</tr>

							
						<tr>
							
							<td style="vertical-align:middle!important; font-size:12px; color:black!important; font-weight:bold; background:white!important;">
								<center>
									Anexo cronograma valorado infraestructura
								</center>
							</td>

							<td style="vertical-align:middle!important; font-size:12px; color:black!important; font-weight:bold; background:white!important;">

								<center>

									 <a href="documentos/cronograma/<?=$proyectoCargadoPdf?>.pdf" target="_blank" style="color:black;">Descargar pdf</a>

								</center>

							</td>

						</tr>

						<?php endif ?>

		
						<tr>

							<td style="vertical-align:middle!important; font-size:12px; color:black!important; font-weight:bold; background:white!important;" colspan="2">
								
								<input type="hidden" name="emailNuevo" id="emailNuevo" value="<?= $emailNuevo;?>">

								<center>

									<button class="btn btn-primary text-center" id="enviarProyectoTotal" name="enviarProyectoTotal"><i class="fas fa-share-square"></i>&nbsp;&nbsp;ENVIAR</button>

									<span class="enviarDatosGenerales__reload__enviado__proyecto"></span>

								</center>

							</td>

						</tr>

						<?php else: ?>
							
						<td style="vertical-align:middle!important; font-size:12px; color:black; font-weight:bold">
							<center>
								Visualizar y Generar el proyecto
							</center>
						</td>

						<td>

							<center>

								<form class="col-sm-7 col-xs-7" action="modelosBd/documentoProyecto/proyecto.md.php" method="post">

									<input type="hidden" id="codigoProyectoPdf" name="codigoProyectoPdf" value="<?php if ($arrayUsuario[0]==2): ?><?= $arrayUsuario[11]; ?><?php endif ?><?php if ($arrayUsuario[0]==3): ?><?= $arrayUsuario[13]; ?><?php endif ?>" />

									<input type="hidden" name="cedulaRuc" id="cedulaRuc" value="<?= $arrayUsuario[3];?>">

								  	<button id="generarVisualizarPdf" name="generarVisualizarPdf" class="anadir__cosas"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;<span class="letras__precionar">GENERAR PROYECTO</span></button>
								  	<span class="enviarDatosGenerales__reload"></span>

								</form>

							</center>

						</td>

					<?php endif ?>
			
				<?php else: ?>

					<td style="vertical-align:middle!important; font-size:12px; color:black; font-weight:bold; padding:1em;" colspan="2">
						<center>
							NO PUEDE ENVIAR EL PROYECTO, VISUALIZAR EL PORCENTAJE DE AVANCE Y LAS SECCIONES QUE FALTAN POR INGRESAR
						</center>
					</td>
					
				<?php endif ?>

			</tr>


		</thead>

		<tbody>

			<tr>
				<th colspan="2" class="padding__envios">DOCUMENTOS ANEXOS</th>
			</tr>


			<tr>

				<td class="padding__envios">DOCUMENTOS ANEXOS</td>

				<?php if (!empty($documentosAnexosArray[0])): ?>

					<td class="enfacis__celdas padding__envios"><center>Ingresado</center></td>
					
				<?php else: ?>

					<td class="enfacis__celdas padding__envios"><center>N/A</center></td>
					
				<?php endif ?>
				

			</tr>


			<tr>
				<th colspan="2" class="padding__envios">SECCIONES DEL PROYECTO</th>
			</tr>

			<tr>

				<td class="padding__envios">PROYECTO</td>

				<?php if (!empty($arrayProyectosDatos[0])): ?>

					<td class="enfacis__celdas padding__envios"><center>Ingresado</center></td>
					
				<?php else: ?>

					<td class="enfacis__celdas padding__envios"><center>N/A</center></td>
					
				<?php endif ?>
				

			</tr>


			<tr>

				<td class="padding__envios">CARACTERIZACIÓN Y OBJETIVOS</td>

				<?php if (!empty($arrayAlineacionEstrategicas[0])): ?>

					<td class="enfacis__celdas padding__envios"><center>Ingresado</center></td>
					
				<?php else: ?>

					<td class="enfacis__celdas padding__envios"><center>N/A</center></td>
					
				<?php endif ?>
				

			</tr>

			<tr>

				<td class="padding__envios">METAS</td>

				<?php if (!empty($idMetas)): ?>

					<td class="enfacis__celdas padding__envios"><center>Ingresado</center></td>
					
				<?php else: ?>

					<td class="enfacis__celdas padding__envios"><center>N/A</center></td>
					
				<?php endif ?>
				

			</tr>

			<tr>

				<td class="padding__envios">COMPONENTES</td>

				<?php if (!empty($componentes)): ?>

					<td class="enfacis__celdas padding__envios"><center>Ingresado</center></td>
					
				<?php else: ?>

					<td class="enfacis__celdas padding__envios"><center>N/A</center></td>
					
				<?php endif ?>
				

			</tr>


			<tr>

				<td class="padding__envios">BENEFICIARIOS</td>

				<?php if (!empty($idBeneficiariosDirectos)): ?>

					<td class="enfacis__celdas padding__envios"><center>Ingresado</center></td>
					
				<?php else: ?>

					<td class="enfacis__celdas padding__envios"><center>N/A</center></td>
					
				<?php endif ?>
				

			</tr>

			<tr>

				<td class="padding__envios">METODOLOGÍA DE EJECUCIÓN, SEGUIMIENTO Y EVALUACIÓN</td>

				<?php if (!empty($idDescripcionActividades)): ?>

					<td class="enfacis__celdas padding__envios"><center>Ingresado</center></td>
					
				<?php else: ?>

					<td class="enfacis__celdas padding__envios"><center>N/A</center></td>
					
				<?php endif ?>
				

			</tr>



		</tbody>

	</table>


</div>


<!--=============================
=            Modales            =
==============================-->

<div class="modal fade" id="modalAccesoProyecto">

  <div class="modal-dialog modal-xl">

    <div class="modal-content">

      <div class="modal-header" style="background:#212B5C!important; color:black!important; display:flex; align-items: center; justify-content:center;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold; font-size:25px;">¿ESTÁ SEGURO DE ENVIAR EL PROYECTO?</h5>

      </div>

      <input type="hidden" id="codigoProyectoDefinitivos" name="codigoProyectoDefinitivos" value="<?php if ($arrayUsuario[0]==2): ?><?= $arrayUsuario[11]; ?><?php endif ?><?php if ($arrayUsuario[0]==3): ?><?= $arrayUsuario[13]; ?><?php endif ?>" />

      <input type="hidden" name="cedulaRucDefinitivos" id="cedulaRucDefinitivos" value="<?= $arrayUsuario[3];?>">

      <input type="hidden" name="idRolDefinitivos" id="idRolDefinitivos" value="<?= $arrayUsuario[0];?>">

      <div class="modal-body body__preguntas">

	      <div class="elementos__centrados__para__envios">

	        <span ctype="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">NO</span>

	        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	        <span class="btn btn-primary" id="enviarProyectoTotal" name="enviarProyectoTotal">SI</span>

	        <span class="enviarDatosGenerales__reload"></span>

	      </div>

	      <br>


      	 <embed id="documentoEmbebidos" width="1000" height="500" alt="pdf">

      </div>


      <span style="position:relative; left:50%; margin-bottom:4em;" class="enviarDatosGenerales__reload reload__ocultos"></span>

    </div>

  </div>

</div>

<!--====  End of Modales  ====-->
