<?php

	extract($_POST);

	require_once "../../conexion/conexion.php";

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();
	
	/*==========================================
	=            Consulta proyectos            =
	==========================================*/
	
	$query3="SELECT nombreProyecto,presupuestoLetras,sectorRecreacion,sectorDeporteFormativo,sectorDeporteConvencional,sectorDeporteAltoRendimiento,sectorDeporteProfesional,presupuesto FROM pro_proyetosreferencias WHERE codigoProyecto='$codigoProyectoPdf';";
	$resultado3 = $conexionEstablecida->query($query3);

	while($registro3 = $resultado3->fetch()) {

		$nombreProyecto=$registro3['nombreProyecto'];
		$presupuestoLetras=$registro3['presupuestoLetras'];
		$sectorRecreacion=$registro3['sectorRecreacion'];
		$sectorDeporteFormativo=$registro3['sectorDeporteFormativo'];
		$sectorDeporteConvencional=$registro3['sectorDeporteConvencional'];
		$sectorDeporteAltoRendimiento=$registro3['sectorDeporteAltoRendimiento'];
		$sectorDeporteProfesional=$registro3['sectorDeporteProfesional'];
		$presupuesto=$registro3['presupuesto'];
			
	}

	
	/*=====  End of Consulta proyectos  ======*/
 
	/*==============================================================
	=            Proyectos nacionales e internacionales            =
	==============================================================*/
	
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

	$array=array();

 	$query1456="SELECT idProyectoUnitario,(SELECT a1.paisnombre FROM poa_pais AS a1 WHERE a1.id=paisTipo) AS paisTipo,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=provinciaUbicacion) AS provinciaUbicacion,(SELECT a1.nombreCanton FROM in_md_canton AS a1 WHERE a1.idCanton=cantonMultiples) AS cantonMultiples,(SELECT a1.nombreParroquia FROM in_md_parroquia AS a1 WHERE a1.idParroquia=parroquiaMultiples) AS parroquiaMultiples,ubicacion FROM pro_proyectounitario WHERE codigoProyecto='$codigoProyectoPdf';";
	$resultado1456 = $conexionEstablecida->query($query1456);


	while($registro1456 = $resultado1456->fetch()) {

		$idProyectoUnitario=$registro1456['idProyectoUnitario'];
		array_push($data1, $idProyectoUnitario);

		$paisTipo=$registro1456['paisTipo'];
		array_push($data2, $paisTipo);

		$provinciaUbicacion=$registro1456['provinciaUbicacion'];
		array_push($data3, $provinciaUbicacion);

		$cantonMultiples=$registro1456['cantonMultiples'];
		array_push($data4, $cantonMultiples);

		$parroquiaMultiples=$registro1456['parroquiaMultiples'];
		array_push($data5, $parroquiaMultiples);

		$ubicacion=$registro1456['ubicacion'];
		array_push($data6, $ubicacion);

	}

	 $query2455="SELECT idProyectoUnitarioInternacional,(SELECT a1.paisnombre FROM poa_pais AS a1 WHERE a1.id=paisTipo) AS paisTipoInterna,estado,sector,comunidad,ubicacion AS ubicacionInter FROM pro_proyectounitariointer WHERE codigoProyecto='$codigoProyectoPdf';";
	$resultado2455 = $conexionEstablecida->query($query2455);


	while($registro2455 = $resultado2455->fetch()) {

		$idProyectoUnitarioInternacional=$registro2455['idProyectoUnitarioInternacional'];
		array_push($data7, $idProyectoUnitarioInternacional);

		$paisTipoInterna=$registro2455['paisTipoInterna'];
		array_push($data8, $paisTipoInterna);

		$estado=$registro2455['estado'];
		array_push($data9, $estado);

		$sector=$registro2455['sector'];
		array_push($data10, $sector);

		$comunidad=$registro2455['comunidad'];
		array_push($data11, $comunidad);

		$ubicacionInter=$registro2455['ubicacionInter'];
		array_push($data12, $ubicacionInter);

	}
	
	
	/*=====  End of Proyectos nacionales e internacionales  ======*/
	
	/*=========================================================
	=            Nuevo llamar a funciones de datos            =
	=========================================================*/

	$query="SELECT tipoTramite FROM pro_infraselects WHERE codigo='$codigoProyectoPdf';";
	$resultado = $conexionEstablecida->query($query);		

	while($registro2 = $resultado->fetch()) {

		$infras=$registro2['tipoTramite'];
		array_push($array, $infras);
			
	}	

	 for ($i=0; $i < count($array); $i++) { 

	    if($array[$i]=="altoRendimiento"){

	      $altoRendimiento="si";

	      break;

	    }else{

	      $altoRendimiento="no";

	    }

	  }


	 for ($i=0; $i < count($array); $i++) { 

	    if($array[$i]=="altoRendimientoDiscapacidad"){

	      $altoRendimientoDiscapacidad="si";

	      break;

	    }else{

	      $altoRendimientoDiscapacidad="no";

	    }

	  }

	 for ($i=0; $i < count($array); $i++) { 

	    if($array[$i]=="profesional"){

	      $profesional="si";

	      break;

	    }else{

	      $profesional="no";

	    }

	  }

	 for ($i=0; $i < count($array); $i++) { 

	    if($array[$i]=="formativo"){

	      $formativo="si";

	      break;

	    }else{

	      $formativo="no";

	    }

	  }

	 for ($i=0; $i < count($array); $i++) { 

	    if($array[$i]=="estudiantil"){

	      $estudiantil="si";

	      break;

	    }else{

	      $estudiantil="no";

	    }

	  }

	 for ($i=0; $i < count($array); $i++) { 

	    if($array[$i]=="recreativo"){

	      $recreativo="si";

	      break;

	    }else{

	      $recreativo="no";

	    }

	  }


	 for ($i=0; $i < count($array); $i++) { 

	    if($array[$i]=="infra"){

	      $infra="si";

	      break;

	    }else{

	      $infra="no";

	    }

	  }


	 for ($i=0; $i < count($array); $i++) { 

	    if($array[$i]=="infraTeconlogicos"){

	      $infraTeconlogicos="si";

	      break;

	    }else{

	      $infraTeconlogicos="no";

	    }

	  }


		
	/*=====  End of Nuevo llamar a funciones de datos  ======*/
	
	
?>


<div class="margen__borde">

	<table class="tabla__bordada__2">

		<tr>
			<td class="nombre__apartados__secundarios" align="left">
				1.2&nbsp;&nbsp;&nbsp;&nbsp;PROYECTO
			</td>
		</tr>

		<tr>

			<td class="fila__uno" align="left">
				<?=strtoupper($nombreProyecto)?>
			</td>

		</tr>

	</table>		

	<table class="tabla__bordada__2">

		<tr>
			<td class="nombre__apartados__secundarios" align="left">
				1.3&nbsp;&nbsp;&nbsp;&nbsp;SECTOR AL QUE CONTRIBUYE 
			</td>
		</tr>

	</table>		

	<table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias">

		<tr>
			<td class="nombre__apartados__secundarios" align="left">
				Seleccione con una “x” el sector al que contribuye el proyecto 
			</td>
		</tr>

	</table>

	<table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias">

		<?php if ($recreativo=="si"): ?>

		<tr>

			<td class="ancho__filas__necesarias">
				Sector de la recreación
			</td>

			<td>

				<center>
				
				<?php if ($recreativo=="si"): ?>

					<span class="letra__capital__x">X</span>
					
				<?php else: ?>

					<span class="letra__capital__x"></span>
					
				<?php endif ?>

				</center>

			</td>

		</tr>

		<?php endif ?>

		<?php if ($formativo=="si"): ?>

		<tr>

			<td class="ancho__filas__necesarias">
				Sector del deporte formativo y la educación física
			</td>

			<td>

				<center>
				
				<?php if ($formativo=="si"): ?>

					<span class="letra__capital__x">X</span>
					
				<?php else: ?>

					<span class="letra__capital__x"></span>
					
				<?php endif ?>

				</center>

			</td>

		</tr>

		<?php endif ?>


		<?php if ($altoRendimiento=="si"): ?>

		<tr>

			<td class="ancho__filas__necesarias">
				Sector del deporte convencional de alto rendimiento
			</td>

			<td>

				<center>
				
				<?php if ($altoRendimiento=="si"): ?>

					<span class="letra__capital__x">X</span>
					
				<?php else: ?>

					<span class="letra__capital__x"></span>
					
				<?php endif ?>

				</center>

			</td>

		</tr>

		<?php endif ?>

		<?php if ($altoRendimientoDiscapacidad=="si"): ?>

		<tr>

			<td class="ancho__filas__necesarias">
				Sector del deporte de alto rendimiento para personas con discapacidad
			</td>

			<td>

				<center>
				
				<?php if ($altoRendimientoDiscapacidad=="si"): ?>

					<span class="letra__capital__x">X</span>
					
				<?php else: ?>

					<span class="letra__capital__x"></span>
					
				<?php endif ?>

				</center>

			</td>

		</tr>

		<?php endif ?>

		<?php if ($profesional=="si"): ?>

		<tr>

			<td class="ancho__filas__necesarias">
				Sector del deporte profesional
			</td>

			<td>

				<center>
				
				<?php if ($profesional=="si"): ?>

					<span class="letra__capital__x">X</span>
					
				<?php else: ?>

					<span class="letra__capital__x"></span>
					
				<?php endif ?>

				</center>

			</td>

		</tr>

		<?php endif ?>

	</table>

	<?php if ($infra=="si" || $infraTeconlogicos=="si"): ?>
		
	<table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias">

		<tr>
			<td class="nombre__apartados__secundarios" align="left">
				Si el proyecto contiene los siguientes componentes elegir a continuación:
			</td>
		</tr>

	</table>

	<table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias">

		<?php if ($infra=="si"): ?>

		<tr>

			<td class="ancho__filas__necesarias">
				Componentes de infraestructura y/o herramientas tecnológicas para el fomento, realización o seguimiento del deporte y la actividad física
			</td>

			<td>

				<center>
				
				<?php if ($infra=="si"): ?>

					<span class="letra__capital__x">X</span>
					
				<?php else: ?>

					<span class="letra__capital__x"></span>
					
				<?php endif ?>

				</center>

			</td>

		</tr>

		<?php endif ?>

		<?php if ($infraTeconlogicos=="si"): ?>

		<tr>

			<td class="ancho__filas__necesarias">
				Componentes de construcción de obra nueva, rehabilitación, readecuación y/o mantenimiento de infraestructura deportiva
			</td>

			<td>

				<center>
				
				<?php if ($infraTeconlogicos=="si"): ?>

					<span class="letra__capital__x">X</span>
					
				<?php else: ?>

					<span class="letra__capital__x"></span>
					
				<?php endif ?>

				</center>

			</td>

		</tr>

		<?php endif ?>

	</table>	

	<?php endif ?>

</div>

<div class="margen__borde">

	<table class="tabla__bordada__2">

		<tr>
			<td class="nombre__apartados__secundarios" align="left">
				1.4	&nbsp;&nbsp;&nbsp;&nbsp;UBICACIÓN
			</td>
		</tr>

	</table>

	<table class="tabla__bordada__2 tabla__top__2 letra__capital__x">

		<tr>

			<td class="ancho__filas__necesarias" style="text-align: justify;">
				Descripción de la ubicación geográfica del lugar o lugares donde se ejecutará:
			</td>

		</tr>

	</table>

	<br>

	<!--============================================
	=            Ubicaciones nacionales            =
	=============================================-->

	<?php if (!empty($idProyectoUnitario)): ?>

	
		<?php for($i=0;$i<count($data1);$i++){ ?>
			
			<table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias">

				<thead>

					<tr>

						<th>DETALE</th>
						<th>NACIONAL</th>

					</tr>

				</thead>

				<tbody>

					<tr>

						<td style="width:10%;">País</td>
						<td align="left"><?=$data2[$i]?></td>

					</tr>

					<tr>

						<td style="width:10%;">Provincia</td>
						<td align="left"><?=$data3[$i]?></td>

					</tr>

					<tr>

						<td style="width:10%;">Cantón</td>
						<td align="left"><?=$data4[$i]?></td>

					</tr>

					<tr>

						<td style="width:10%;">Parroquia</td>
						<td align="left"><?=$data5[$i]?></td>

					</tr>

					<tr>

						<td style="width:10%;">Ubicación específica (Nombre del coliseo, estadio, otros, si aplica)</td>
						<td align="left"><?=$data6[$i]?></td>

					</tr>

				</tbody>

			</table>

		<?php } ?>

	<?php endif ?>
	
	<!--====  End of Ubicaciones nacionales  ====-->


	<!--=================================================
	=            Ubicaciones internacionales            =
	==================================================-->
	
	<?php if (!empty($idProyectoUnitarioInternacional)): ?>

	
		<?php for($i=0;$i<count($data7);$i++){ ?>
			
			<table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias">

				<thead>

					<tr>

						<th>DETALE</th>
						<th>INTERNACIONAL</th>

					</tr>

				</thead>

				<tbody>

					<tr>

						<td style="width:10%;">País</td>
						<td align="left"><?=$data8[$i]?></td>

					</tr>

					<tr>

						<td style="width:10%;">Estado</td>
						<td align="left"><?=$data9[$i]?></td>

					</tr>

					<tr>

						<td style="width:10%;">Sector</td>
						<td align="left"><?=$data10[$i]?></td>

					</tr>

					<tr>

						<td style="width:10%;">Comunidad</td>
						<td align="left"><?=$data11[$i]?></td>

					</tr>

					<tr>

						<td style="width:10%;">Ubicación específica (Nombre del coliseo, estadio, otros, si aplica)</td>
						<td align="left"><?=$data12[$i]?></td>

					</tr>

				</tbody>

			</table>

		<?php } ?>

	<?php endif ?>
	
</div>

	
	<!--====  End of Ubicaciones internacionales  ====-->