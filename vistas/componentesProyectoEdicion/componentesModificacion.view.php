<!--====================================================
=            Asignación de datos ingresados            =
=====================================================-->

<?php $objeto= new usuario();?>

<?php $codigo=$objeto->ctrCodigosEdiciones();?>

<?php $instancia=$objeto->ctrInstancia($codigo);?>


<!--================================================
=            Componentes seleccionables            =
=================================================-->

<?php

	$array = explode("____", $instancia);

	for ($i=0; $i < count($array); $i++) { 

		if ($array[$i]=="altoRendimiento" || $array[$i]=="altoRendimientoDiscapacidad"  || $array[$i]=="profesional"  || $array[$i]=="formativo" || $array[$i]=="estudiantil" || $array[$i]=="recreativo") {

			$consulta="Técnico";

			break;

		}else{

			$consulta=false;

		}
	}


	for ($i=0; $i < count($array); $i++) { 

		if ($array[$i]=="profesional") {

			$consultaComponentes="si";

			break;

		}else{

			$consultaComponentes="no";

		}
	}


	for ($i=0; $i < count($array); $i++) { 

		if ($array[$i]=="infra") {

			$consulta1="Infraestructura";

			break;

		}else{

			$consulta1=false;

		}
	}


	for ($i=0; $i < count($array); $i++) { 

		if ($array[$i]=="infraTeconlogicos") {

			$consulta2="Tecnológico";

			break;

		}else{

			$consulta2=false;

		}
	}



?>

<!--====  End of Componentes seleccionables  ====-->

<!--====================================================
=            Asignación de datos ingresados            =
=====================================================-->

<?php $objeto= new usuario();?>

<?php $proyectosDatosGenerales=$objeto->ctrProyectosFunciones($codigo);?>

<?php $arrayProyectosDatos = explode("___", $proyectosDatosGenerales);?>

<?php $sumadorTotales=0;?>

<?php $sumadorTotales= floatval($arrayProyectosDatos[7]) + floatval($arrayProyectosDatos[9]) + floatval($arrayProyectosDatos[11]) + floatval($arrayProyectosDatos[18]); ?>


<!--====  End of Asignación de datos ingresados  ====-->

<?php

	function porcentaje($cantidad,$porciento,$decimales){
		return $cantidad*$porciento/100;
	}

	$porcientoPrioritarios =  porcentaje($sumadorTotales,20,2);
	$porcientoMujeres=  porcentaje($sumadorTotales,10,2);

?>


<!--=========================================
=            Seccion componentes            =
==========================================-->

<?php $data1=array();?>

<?php $conexionRecuperada= new conexion();?>

<?php $conexionEstablecida=$conexionRecuperada->cConexion();?>



<!--==========================================
=            Cronograma valorados            =
===========================================-->
<?php $dataCronogramas=array();?>
<?php $dataCronogramasAgrupados=array();?>
<?php $dataCronogramasAgrupadosSolitarios=array();?>

<?php $queryCronogramas="SELECT elementosResultantes FROM pro_cronograma WHERE codigo='$codigo';";?>
<?php $resultadoCronogramas = $conexionEstablecida->query($queryCronogramas);?>

<?php

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

?>

<!--====  End of Cronograma valorados  ====-->



<?php $query="SELECT a.campos FROM pro_componentesciudadanos AS a WHERE a.identificador='b' AND a.codigo='$codigo';";?>
<?php $resultado = $conexionEstablecida->query($query);?>

<?php

	while($registro = $resultado->fetch()) {

		$campos=$registro['campos'];
		array_push($data1, $campos);


	}

?>

<?php 

	$arrayConvertidos=array();

	$anadidosLasts=array();

	$sumadorGlobal=0;

	$sumadorGlobalDos=0;

	for ($i=0; $i < count($data1); $i++) { 

		$arrayConvertidos = explode ("/../",$data1[$i]);

		$anadidosLastsVariables = end($arrayConvertidos);

		$anadidosLastsVariables=floatval($anadidosLastsVariables);

		array_push($anadidosLasts, $anadidosLastsVariables);

		
	}

	$sumatoresArrays=array_sum($anadidosLasts);


	if($consultaComponentes=="si") {

		$sumadorGlobal=floatval($sumatoresArrays) + floatval($porcientoPrioritarios) + floatval($porcientoMujeres);

		$sumadorGlobalDos=floatval($sumatoresArrays);


	}else{
		
		$sumadorGlobal=floatval($sumatoresArrays);

		$sumadorGlobalDos=floatval($sumatoresArrays);

	}


?>


<?php $proyectosProfecionalesIngresados=$objeto->ctrAsignacionesPresupuestarias($codigo);?>

<?php $arrayProfecionalesIngresados = explode("_____", $proyectosProfecionalesIngresados);?>

<!--====  End of Seccion componentes  ====-->

<!--===============================
=            Plantilla            =
================================-->

<?php  $plantilla= new plantilla(); ?>

<!--====  End of Plantilla  ====-->

<!--=============================
=            Scripts            =
==============================-->

 <?php $plantilla->parciales(3);?>

<!--====  End of Scripts  ====-->

<input type="hidden" name="instancias" id="instancias" value="<?=$instancia?>">

<input type="hidden" name="fechaInicial" id="fechaInicial" value="<?=$arrayProyectosDatos[14]?>">

<input type="hidden" name="fechaFinal" id="fechaFinal" value="<?=$arrayProyectosDatos[15]?>">

<div class="panel-body">

<!--=====================================================
=            Contenido Principal formularios            =
======================================================-->
    
<div class="row">

	<div class="col col-12 text-center font-weight-titulo">

    	COMPONENTES

	</div>

</div>

<div class="row top-margenes">
			
	<div class="rotulo__referencias col-12 text-center letra__titulo">
		DETALLES DE VALORES DE COMPONENTES
	</div>

</div>

<div class="row d-flex align-items-center justify-content-center top-margenes">

	<table class="row col col-md-5 col-12 sin__bordes">

		<tr>
		
			<td class="fila__ones letra__titulo">
				Valor total del proyecto
			</td>

			<td class="fila__twos d d-flex">

				$&nbsp;&nbsp;<?=number_format(floatval($sumadorTotales),2, '.', '')?>

				<input type="hidden" id="sumadorTotalesDados" name="sumadorTotalesDados" value="<?=number_format(floatval($sumadorTotales),2, '.', '')?>">

			</td>

		</tr>

		<?php if ($consultaComponentes=="si"): ?>

		<tr>

			<td class="fila__ones">

				<div class="row">

					<div class="col col-12 text-center letra__titulo">

						Cumplimiento de porcentajes de beneficio 

					</div>

					<div class="col col-8 letra__titulo">

						Sector priorizado (20%)

					</div>

					<div class="col col-4 tex-right d d-flex">

						$&nbsp;&nbsp;<?=number_format(floatval($porcientoPrioritarios),2, '.', '')?>

						<input type="hidden" id="porcentajesPrioritarios" name="porcentajesPrioritarios" value="<?=number_format(floatval($porcientoPrioritarios),2, '.', '')?>">					

					</div>

					<div class="col col-8 letra__titulo">

						Rama femenina (10%)

					</div>

					<div class="col col-4 tex-right d d-flex">

						$&nbsp;&nbsp;<?=number_format(floatval($porcientoMujeres),2, '.', '')?>

						<input type="hidden" id="porcentajesMujeres" name="porcentajesMujeres" value="<?=number_format(floatval($porcientoMujeres),2, '.', '')?>">		

					</div>


				</div>


			</td>

			<td class="fila__twos"  style="vertical-align:middle;">

				$&nbsp;&nbsp;<?=number_format(floatval($porcientoPrioritarios) + floatval($porcientoMujeres),2, '.', '')?>

				<br>

				<?php if (!empty($arrayProfecionalesIngresados[0]) && $consultaComponentes=="si"): ?>

					<button class="btn btn-info" id="detalleIngresandos" data-toggle="modal" data-target="#detallesSugeridos" style="font-size:10px!important; position: relative;left: 32%;"><i class="fal fa-files-medical"></i>&nbsp;&nbsp;Detalle</button>
									
				<?php endif ?>		

			</td>

		</tr>

		<?php endif ?>

		<tr>
		
			<td class="fila__ones letra__titulo">
				Cantidad asignada a componentes
			</td>

			<td class="fila__twos d d-flex">

				<?php if (!empty($sumatoresArraysCronograma)): ?>
					
					<?php $sumitasRelativasInstancias=floatval($sumatoresArraysCronograma);?>

					<?php $sumatoresArrays=floatval($sumitasRelativasInstancias)+floatval($sumatoresArrays);?>

				<?php else: ?>

					<?php $sumitasRelativasInstancias=0;?>

					<?php $sumatoresArrays=floatval($sumitasRelativasInstancias)+floatval($sumatoresArrays);?>

				<?php endif ?>

				<?php if ($sumatoresArrays==0): ?>
					$&nbsp;&nbsp;<input type="text" id="valoresCantidadesAsignadas" name="valoresCantidadesAsignadas" value="<?=0?>" class="sin__bordes__inputs"/> 
					<input type="hidden" id="valoresCantidadesAsignadasIn" name="valoresCantidadesAsignadasIn" value="<?=0?>" class="sin__bordes__inputs"/> 
				<?php else: ?>
					$&nbsp;&nbsp;<input type="text" id="valoresCantidadesAsignadas" name="valoresCantidadesAsignadas" value="<?=number_format(floatval($sumatoresArrays),2, '.', '');?>" class="sin__bordes__inputs"/> 
					<input type="hidden" id="valoresCantidadesAsignadasIn" name="valoresCantidadesAsignadasIn" value="<?=number_format(floatval($sumatoresArrays),2, '.', '');?>" class="sin__bordes__inputs"/> 
				<?php endif ?>

				<input type="hidden" id="sumadorAsignadosComponentes" name="sumadorAsignadosComponentes" value="<?=number_format(floatval($sumatoresArrays),2, '.', '');?>" />

			</td>

		</tr>


		<tr>
		
			<td class="fila__ones letra__titulo">
				Cantidad disponible por asignar
			</td>

			<td class="fila__twos d d-flex">

				<?php $variableRestadoras=0;?>


				<?php if (!empty($sumatoresArraysCronograma)): ?>
					
					<?php $sumitasRelativasInstancias=floatval($sumatoresArraysCronograma);?>

					<?php $sumadorGlobal=floatval($sumitasRelativasInstancias)+floatval($sumadorGlobal);?>

				<?php else: ?>

					<?php $sumitasRelativasInstancias=0;?>
					
					<?php $sumadorGlobal=floatval($sumitasRelativasInstancias)+floatval($sumadorGlobal);?>

				<?php endif ?>


				$&nbsp;&nbsp;<input type="text" id="valoresCantidades" name="valoresCantidades" value="<?php  $variableRestadoras=floatval($sumadorTotales) - floatval($sumadorGlobal); echo number_format(floatval($variableRestadoras),2, '.', '');?>" class="sin__bordes__inputs"/> 

				<input type="hidden" id="valoresCantidadesIn" name="valoresCantidadesIn" value="<?php  $variableRestadoras=floatval($sumadorTotales) - floatval($sumadorGlobal); echo number_format(floatval($variableRestadoras),2, '.', '');?>" class="sin__bordes__inputs"/> 

			</td>

		</tr>

		<tr>

			<?php if (empty($arrayProfecionalesIngresados[0]) && $consultaComponentes=="si"): ?>

				<td class="fila__ones letra__titulo text-center">
					 <button class="btn btn-primary" id="detalleIngresandos" data-toggle="modal" data-target="#detallesSugeridos"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Ingresar detalle</button>
				</td>
				
			<?php else: ?>
				
				<td class="fila__ones letra__titulo text-center">
					 <button class="btn btn-primary" id="anadirComponentes"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Añadir</button>
				</td>

			<?php endif ?>

			<td class="fila__twos text-center">

				<button class="btn btn-info" id="editarComponentes" data-toggle="modal" data-target="#editarComponentesEdicion" style="font-size:10px!important;"><i class="fal fa-files-medical"></i>&nbsp;&nbsp;Ver</button>

			</td>

		</tr>


	</table>

</div>

<br>

<br>

<div class="row componenetesAnadidos">


</div>

<br>

<div class="row componentesItemsAnadidos">


</div>

<!--====  End of Contenido Principal formularios  ====-->
                      
<!--=========================================
=            Cronograma valorado            =
==========================================-->

<div class="row cronograma__valorado__display">

	<table class="col col-12 table-responsive-sm">

		<thead>

			<tr>

				<th rowspan="1"><center>Número</center></th>
				<th rowspan="1"><center>Actividades</center></th>
				<th rowspan="1"><center>Valor Preferencial</center></th>
				<th rowspan="1"><center>Unidad</center></th>
				<th rowspan="1"><center>Cantidad</center></th>
				<th rowspan="1"><center>P.Unitario</center></th>
				<th rowspan="1"><center>Subtotal</center></th>
				<th rowspan="1"><center>Monto</center></th>
				<th rowspan="1"><center>Acciones</center></th>
				

			</tr>

			<tr class="conjunto__headers"></tr>

		</thead>

		<tbody class="contenedor__bloques">



		</tbody>

	</table>

	<div class="col col-12 text-center">

		<button id="enviarCronogramaValorado" name="enviarCronogramaValorado" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;GUARDAR</button>

		<div class="enviarDatosGenerales__reload"></div>

	</div>

</div>

<!--====  End of Cronograma valorado  ====-->


</div>

<!--=============================
=            Modales            =
==============================-->

<div class="clases__modales" style="display: flex; flex-direction: column; align-items: center;">


</div>

<div class="clases__modales__otros" style="display: flex; flex-direction: column; align-items: center;">


</div>


<!--======================================
=            Modales detalles            =
=======================================-->

<div id="detallesSugeridos" class="modal" role="dialog" data-backdrop="static" data-keyboard="false">

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header" style="width:100%;">

				Cumplimiento de porcentajes de beneficio 
				
			</div>  

			<button type="button" class="closeButton" data-dismiss="modal">&times;</button>

			<div class="modal-body">

				<div class="box-body row">
					
					<div class="col col-4">

						Sector priorizado (20%)

					</div>

					<div class="col col-2 d d-flex">

						$&nbsp;&nbsp;<?=number_format(floatval($porcientoPrioritarios),2, '.', '')?>

					</div>

					<div class="col col-6">

						<?php if (!empty($arrayProfecionalesIngresados[1])): ?>

							<textarea id="prioritariosSectores" name="prioritariosSectores" class="selector__inicial obligatorios__sectores"><?=$arrayProfecionalesIngresados[1]?></textarea>
							
						<?php else: ?>

							<textarea id="prioritariosSectores" name="prioritariosSectores" class="selector__inicial obligatorios__sectores"></textarea>
							
						<?php endif ?>

						
					</div>


					<div class="col col-4">

						Rama femenina (10%)

					</div>

					<div class="col col-2 d d-flex">

						$&nbsp;&nbsp;<?=number_format(floatval($porcientoMujeres),2, '.', '')?>

					</div>

					<div class="col col-6">

						<?php if (!empty($arrayProfecionalesIngresados[0])): ?>

							<textarea id="prioritariosSectoresFemeninas" name="prioritariosSectoresFemeninas" class="selector__inicial obligatorios__sectores"><?=$arrayProfecionalesIngresados[0]?></textarea>
							
						<?php else: ?>

							<textarea id="prioritariosSectoresFemeninas" name="prioritariosSectoresFemeninas" class="selector__inicial obligatorios__sectores"></textarea>
							
						<?php endif ?>

						

					</div>

					<div class="col col-12 d d-flex justify-content-center">

						<button class="btn btn-primary" id="ingresoSectores"><i class="far fa-save"></i>&nbsp;Guardar</button>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>

<!--====  End of Modales detalles  ====-->


<!--==================================
=            Modal editar            =
===================================-->

<div id="editarComponentesEdicion" class="modal" role="dialog" data-backdrop="static" data-keyboard="false">

	<div class="modal-dialog modal-xl">

		<div class="modal-content">

			<div class="modal-header" style="width:100%;">

				ITEMS INGRESADOS<br>(Dar clic en el enlace deseado para ver)
				
			</div>  

			<button type="button" class="closeButton" data-dismiss="modal">&times;</button>

			<div class="modal-body">

				<div class="box-body row">
					
					<div class="col col-12 contenedor__elementos__componentes d-flex flex-column align-items-center">


					</div>

					<br>
					<br>

					<table class="col col-12 tabla__componentes__editables table-responsive-sm">

						<thead>

							<tr class="encabezado__tabla">

							</tr>


							<tr class="anadir__elementos">

							</tr>

						</thead>

						<tbody class="body__tabla"></tbody>


					</table>

				</div>

			</div>

		</div>

	</div>

</div>


<!--====  End of Modal editar  ====-->

<!--=====================================================
=            Modales Cronogramas información          =
======================================================-->

<div class="modales__infras__dando" style="display: flex; flex-direction: column; align-items: center;">


</div>

<!--====  End of Modales Cronogramas información  ====-->

<!--===============================================
=            Modales visualizar montos            =
================================================-->

<div id="modalVisualizarMontos" class="modal" role="dialog" data-backdrop="static" data-keyboard="false">

	<div class="modal-dialog modal-xl">

		<div class="modal-content">

			<div class="modal-header" style="width:100%;">

				Montos programados
				
			</div>  

			<button type="button" class="closeButton" data-dismiss="modal">&times;</button>

			<div class="modal-body montos__programados__editables row">


			</div>

		</div>

	</div>

</div>

<!--====  End of Modales visualizar montos  ====-->

<!--===========================================================
=            Visualizar montos cronograma valorado            =
============================================================-->

<div id="modalVisualizarMontosCronogramaValorados" class="modal" role="dialog" data-backdrop="static" data-keyboard="false">

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header" style="width:100%;">

				Montos cronograma valorado
				
			</div>  

			<button type="button" class="closeButton" data-dismiss="modal">&times;</button>

			<div class="modal-body montos__programados__editables__cronogramas__valorados row">


			</div>

		</div>

	</div>

</div>

<!--====  End of Visualizar montos cronograma valorado  ====-->


<!--====  End of Modales  ====-->
