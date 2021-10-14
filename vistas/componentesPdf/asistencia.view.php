<?php

 extract($_POST);

 require_once "../../conexion/conexion.php";

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

/*=============================================
=            Selección información            =
=============================================*/
$conexionRecuperada= new conexion();
$conexionEstablecida=$conexionRecuperada->cConexion();	

if ($selectorUsuariosDelegados>0) {
	
	$query="SELECT a.id_usuario AS idUsuarioDelegado,CONCAT_WS(' ',a.nombre, a.apellido) AS nombreCompletoDelegado, a.email AS emailDelegado, a.cedula AS cedulaDelegado,CONCAT_WS(' ',(SELECT a1.descripcionFisicamenteEstructura FROM th_fisicamenteestructura AS a1 WHERE a1.id_FisicamenteEstructura=a.fisicamenteEstructura)) AS nombreCargoDelegado FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_roles AS c ON c.id_rol=b.id_rol WHERE a.id_usuario='$selectorUsuariosDelegados';";
	$resultado = $conexionEstablecida->query($query);


	while($registro = $resultado->fetch()) {

		$idUsuarioDelegado=$registro['idUsuarioDelegado'];
		$nombreCompletoDelegado=$registro['nombreCompletoDelegado'];
		$emailDelegado=$registro['emailDelegado'];
		$cedulaDelegado=$registro['cedulaDelegado'];
		$nombreCargoDelegado=$registro['nombreCargoDelegado'];

	}

}

/*=====  End of Selección información  ======*/



?>




<div class="margen__borde" style="margin-top:1.2em;">


	<table class="tabla__bordada">

		<tr>

			<td class="contenedor___nombre__proyecto" align="center">
				ASISTENCIA 
			</td>

		</tr>

		<tr>
			<td align="right">
				Quito <?= $dia?> de <?= $monthName?> del <?= $anio?>
			</td>
		</tr>

	</table>	

	<table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias" style="margin-top:2em;">

		<thead>

			<tr>

				<th align="center" colspan="5">
					CALIFICADORES CON VOZ Y VOTO 
				</th>

			</tr>

			<tr>

				<th align="center">Cédula</th>
				<th align="center">Dirección</th>
				<th align="center">Nombre</th>
				<th align="center">Calificación</th>
				<th align="center" style="width:30%;">Firma</th>

			</tr>

		</thead>

		<tbody>

			<?php if (!empty($ministroOpcion)): ?>

				<?php if ($selectorUsuariosDelegados>0): ?>

				<tr>

					<td align="center">
						<?=$cedulaDelegado?>
					</td>

					<td align="center">
						<?=$nombreCargoDelegado?>
					</td>

					<td align="center">
						<?=$nombreCompletoDelegado?>
					</td>

					<td align="center">
						<?=strtoupper($ministroOpcion)?>
					</td>

					<td align="center" style="width:20%;">
						 
					</td>

				</tr>
						
				<?php else: ?>
					
				<tr>

					<td align="center">
						<?=$cedulaMinistro?>
					</td>

					<td align="center">
						<?=$cargoMinistro?>
					</td>

					<td align="center">
						<?=$nombreMinistro?>
					</td>

					<td align="center">
						<?=strtoupper($ministroOpcion)?>
					</td>

					<td align="center" style="width:20%;">
						 
					</td>

				</tr>
						
				<?php endif ?>

			<?php endif ?>

			<?php if (!empty($altoRendimientoOpcion)): ?>

			<tr>

				<td align="center">
					<?=$cedulaSusesAlto?>
				</td>

				<td align="center">
					<?=$cargoSusesAlto?>
				</td>

				<td align="center">
					<?=$nombreSusesAlto?>
				</td>

				<td align="center">
					<?=strtoupper($altoRendimientoOpcion)?>
				</td>

				<td align="center" style="width:20%;">
					 
				</td>

			</tr>

			<?php endif ?>


			<?php if (!empty($actividadFisicaOpcion)): ?>

			<tr>

				<td align="center">
					<?=$cedulaSusesActividad?>
				</td>

				<td align="center">
					<?=$cargoSusesActividad?>
				</td>

				<td align="center">
					<?=$nombreSusesAlto?>
				</td>

				<td align="center">
					<?=strtoupper($actividadFisicaOpcion)?>
				</td>

				<td align="center" style="width:20%;">
					 
				</td>

			</tr>

			<?php endif ?>



			<?php if (!empty($coordinadorAdministracionOpcion)): ?>

			<tr>

				<td align="center">
					<?=$cedulaSusesCoordinador?>
				</td>

				<td align="center">
					<?=$cargoSusesCoordinador?>
				</td>

				<td align="center">
					<?=$nombreSusesCoordinador?>
				</td>

				<td align="center">
					<?=strtoupper($coordinadorAdministracionOpcion)?>
				</td>

				<td align="center" style="width:20%;">
					 
				</td>

			</tr>

			<?php endif ?>



			<?php if (!empty($asistenciaPlanificacion)): ?>

			<tr>

				<td align="center">
					<?=$cedulaSusesPlanificacion?>
				</td>

				<td align="center">
					<?=$cargoSusesPlanificacion?>
				</td>

				<td align="center">
					<?=$nombreSusesPlanificacion?>
				</td>

				<td align="center">
					<?=strtoupper($coordinadorPlanificacionOpcion)?>
				</td>

				<td align="center" style="width:20%;">
					 
				</td>

			</tr>

			<?php endif ?>


			<?php if (!empty($asistenciaJuridico)): ?>

			<tr>

				<td align="center">
					<?=$cedulaSusesJuridico?>
				</td>

				<td align="center">
					<?=$cargoSusesJuridico?>
				</td>

				<td align="center">
					<?=$nombreSusesJuridico?>
				</td>

				<td align="center">
					<?=strtoupper($coordinadorAdministracionFinanciera)?>
				</td>

				<td align="center" style="width:20%;">
					 
				</td>

			</tr>

			<?php endif ?>


		</tbody>

	</table>

</div>