<?php extract($_POST);?>
<?php require_once '../../conexion/conexion.php';?>
<?php $conexionRecuperada= new conexion();?>
<?php $conexionEstablecida=$conexionRecuperada->cConexion();?>

<?php $codigo=$codigoProyectoPdfInformeViavilidad;?>


<?php

 /*=================================
 =            Proyectos            =
 =================================*/
 
 	 $query2455="SELECT idProyectoUnitarioInternacional,(SELECT a1.paisnombre FROM poa_pais AS a1 WHERE a1.id=paisTipo) AS paisTipoInterna,estado,sector,comunidad,ubicacion AS ubicacionInter FROM pro_proyectounitariointer WHERE codigoProyecto='$codigo';";
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
	
 
 /*=====  End of Proyectos  ======*/
 
/*==========================================
=            Querys idealizados            =
==========================================*/

 
 	$queryUnos="SELECT c.descripcionFisicamenteEstructura FROM pro_proyecto AS a INNER JOIN th_usuario AS b ON a.idUsuario=b.id_usuario INNER JOIN th_fisicamenteestructura AS c ON c.id_FisicamenteEstructura=b.fisicamenteEstructura WHERE a.codigo='$codigo';";
	$resultadoUnos = $conexionEstablecida->query($queryUnos);


	while($registroUnos = $resultadoUnos->fetch()) {

		$descripcionFisicamenteEstructura=$registroUnos['descripcionFisicamenteEstructura'];

	}

/*=====  End of Querys idealizados  ======*/

/*===========================================================
=            Selector de selecciones direcciones            =
===========================================================*/

 	$queryDos="SELECT tipoTramite FROM pro_infraselects WHERE infras='T' AND codigo='$codigo';";
	$resultadoDos = $conexionEstablecida->query($queryDos);


	while($registroDos = $resultadoDos->fetch()) {

		$tipoTramite=$registroDos['tipoTramite'];


	}

/*=====  End of Selector de selecciones direcciones  ======*/

	if ($tipoTramite=="Alto rendimiento" || $tipoTramite=="Alto rendimiento para personas con discapacidad" || $tipoTramite=="Deporte Profesional") {
		$llaveSubsecretarías="SUBSECRETARÍA DE DEPORTE DE ALTO RENDIMIENTO";
		$objetivo="Incrementar el rendimiento de los atletas en la consecución de logros deportivos.";
	}else{
		$llaveSubsecretarías="SUBSECRETARÍA DE DESARROLLO DE LA ACTIVIDAD FISICA";
		$objetivo="Incrementar la práctica de la cultura física en la población del Ecuador.";

	}

	/*============================================
	=            Proyectos relevantes            =
	============================================*/
	

 	$queryTres="SELECT nombre,monto,idUsuarioRelativo FROM pro_proyecto WHERE codigo='$codigo';";
	$resultadoTres = $conexionEstablecida->query($queryTres);


	while($registroTres = $resultadoTres->fetch()) {

		$nombre=$registroTres['nombre'];
		$monto=$registroTres['monto'];
		$idUsuarioRelativo=$registroTres['idUsuarioRelativo'];

	}	
	
	/*=====  End of Proyectos relevantes  ======*/
	
	/*=================================
	=            Queryas 4            =
	=================================*/
	
 	$queryCuatro="SELECT inicioPeriodos,finPeriodos FROM pro_proyetosreferencias WHERE codigoProyecto='$codigo';";
	$resultadoCuatro = $conexionEstablecida->query($queryCuatro);


	while($registroCuatro = $resultadoCuatro->fetch()) {

		$inicioPeriodos=$registroCuatro['inicioPeriodos'];
		$finPeriodos=$registroCuatro['finPeriodos'];

	}	
		
	
	/*=====  End of Queryas 4  ======*/
	
	/*================================
	=            Querys 5            =
	================================*/

	$dataReferentes=array();
	
 	$queryQuinto="SELECT tipoTramite FROM pro_infraselects WHERE codigo='$codigo';";
	$resultadoQuinto = $conexionEstablecida->query($queryQuinto);


	while($registroQuinto = $resultadoQuinto->fetch()) {

		$tipoTramite=$registroQuinto['tipoTramite'];
		array_push($dataReferentes, $tipoTramite);

	}	
			
	
	/*=====  End of Querys 5  ======*/
	
	/*===============================
	=            Query 8            =
	===============================*/
	
	$dataReferentesDos=array();

 	$querySextos="SELECT idBeneficiariosDirectos,beneficiariosDirectos__conjuntos,desdeDirectos__conjuntos,hastaDirectos__conjuntos,masculinoDirectos__conjuntos,femeninoDirectos__conjuntos,montubioDirectos__conjuntos,indigenasDirectos__conjuntos,blancoDirectos__conjuntos,afroDirectos__conjuntos,mulatoDirectos__conjuntos,negroDirectos__conjuntos,totalDirectos__conjuntos,mestizoDirectos__conjuntos FROM pro_beneficiarios_directos WHERE codigo='$codigo';";
	$resultadoSextos = $conexionEstablecida->query($querySextos);
	
	
	while($registroSextos= $resultadoSextos->fetch()) {

		$beneficiariosDirectos__conjuntos=$registroSextos['beneficiariosDirectos__conjuntos'];
		array_push($dataReferentesDos, $beneficiariosDirectos__conjuntos);

	}	
			
 	$querySextosBeneficiarios="SELECT SUM(totalDirectos__conjuntos) AS totalBeneficiarios FROM pro_beneficiarios_directos WHERE codigo='$codigo' GROUP BY codigo;";
	$resultadoSextosBeneficiarios = $conexionEstablecida->query($querySextosBeneficiarios);
	
	
	while($registroSextosBeneficiarios= $resultadoSextosBeneficiarios->fetch()) {
		$totalBeneficiarios=$registroSextosBeneficiarios['totalBeneficiarios'];
	}	
			



	/*=====  End of Query 8  ======*/
	
	/*==========================================
	=            Querys enfatizados            =
	==========================================*/

 	$querySeptimo="SELECT idDocumentos,curriculumDeportivoSegundo,certificadoFederacionPdf,certificadoOrganismoSuperiorPdf,solicitudFederacionPdf,avalFederacionPdf,solciitudAvalPdf,avalOrganismoSuperiorPdf,proyectoCargadoPdf,acreditarVidaJuridica,certificacionTrayectoria,certificadoPropiedades,memoriaTecnicaArquitectonica,planosArquitecntonicos,presupuestoRubro,cronogramaValorado,respaldosNuevosDigitales FROM pro_documentos WHERE codigo='$codigo' ORDER BY idDocumentos DESC LIMIT 1;";
	$resultadoSeptimo = $conexionEstablecida->query($querySeptimo);
	
	
	while($registroSeptimo= $resultadoSeptimo->fetch()) {

		$curriculumDeportivoSegundo=$registroSeptimo['curriculumDeportivoSegundo'];
		$certificacionTrayectoria=$registroSeptimo['certificacionTrayectoria'];

	}	
				
	
	/*=====  End of Querys enfatizados  ======*/
	
	/*==============================================
	=            Querys enfatizados dos            =
	==============================================*/
	
 	$querySeptimoDos="SELECT analisisSituacionActual,justificacionCaracterizacion,objetivoGeneralCaracterizacion FROM pro_caracterizacion WHERE codigo='$codigo' ORDER BY idCaracterizacion DESC LIMIT 1";
	$resultadoSeptimoDos = $conexionEstablecida->query($querySeptimoDos);
	
	
	while($registroSeptimoDos= $resultadoSeptimoDos->fetch()) {

		$objetivoGeneralCaracterizacion=$registroSeptimoDos['objetivoGeneralCaracterizacion'];
		$justificacionCaracterizacion=$registroSeptimoDos['justificacionCaracterizacion'];

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
	

	/*=========================================================
	=            Informacion referente componentes            =
	=========================================================*/
	

	$data1=array();
	$data2=array();

	$data3=array();
	$data4=array();

	$query4="SELECT b.idComponentes,b.nombreComponentes FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS c ON c.idItem=a.idItemComponente INNER JOIN pro_componentes AS b ON b.idComponentes=c.componenteSeleccion WHERE a.codigo='$codigo' GROUP BY b.idComponentes;";
	$resultado4 = $conexionEstablecida->query($query4);		

	while($registro4 = $resultado4->fetch()) {

		$idComponentes=$registro4['idComponentes'];
		array_push($data1, $idComponentes);


		$nombreComponentes=$registro4['nombreComponentes'];
		array_push($data2, $nombreComponentes);

	}

	$query5="SELECT c.idItem,b.idComponentes FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS c ON c.idItem=a.idItemComponente INNER JOIN pro_componentes AS b ON b.idComponentes=c.componenteSeleccion WHERE a.codigo='$codigo' GROUP BY c.idItem;";
	$resultado5 = $conexionEstablecida->query($query5);		

	while($registro5 = $resultado5->fetch()) {

		$idItem=$registro5['idItem'];
		array_push($data3, $idItem);


		$idComponentes=$registro5['idComponentes'];
		array_push($data4, $idComponentes);

	}

	$contadorRelativo=0;
	$contadorRelativo2=0;
	
	
	/*=====  End of Informacion referente componentes  ======*/
	

  $parametro1String=$inicioPeriodos;
  $parametro2String=$finPeriodos;

  $arreglo1 = explode("/", $parametro1String);
  $arreglo2 = explode("/", $parametro2String);

  $diferenciaAnios= intval($arreglo2[2]) - intval($arreglo1[2]);

  if (intval($diferenciaAnios)>0) {
  	$pluriAnual="SI";
  }else{
  	$pluriAnual="NO";
  }


	/*==============================
	=            Fechas            =
	==============================*/
	

	setlocale(LC_TIME, "spanish");

	$anioInicial = date($arreglo1[2]);

	$mesInicial=date($arreglo1[1]);

	$dateObjInicial   = DateTime::createFromFormat('!m', $mesInicial);
	$monthNameInicial = strftime('%B', $dateObjInicial->getTimestamp());

	$diaInicial=date($arreglo1[0]);	
	

	setlocale(LC_TIME, "spanish");

	$anioFinal = date($arreglo2[2]);

	$mesFinal=date($arreglo2[1]);

	$dateObjFinal   = DateTime::createFromFormat('!m', $mesFinal);
	$monthNameFinal = strftime('%B', $dateObjFinal->getTimestamp());

	$diaFinal=date($arreglo2[0]);	


	/*=====  End of Fechas  ======*/

?>

<!--=======================================
=           	Sección Css             =
========================================-->

<link href="../../layout/styles/css/estilosPdf.css?v=1.0.0" rel="stylesheet" type="text/css" media="all">

<!--====  End of	Sección Css  ====-->

<div class="margen__borde">

	<table class="tabla__bordada">

		<tr>
			<td class="contenedor___nombre__proyecto enfacis__letras" align="center">
				<center>RECOMENDACIÓN TÉCNICA PARA EMITIR CALIFICACIÓN DE PROGRAMAS O PROYECTOS DEPORTIVOS</center>
			</td>
		</tr>

		<tr>
			<td class="contenedor___nombre__proyecto enfacis__letras" align="center">
				<center>SSDAR-2021-001</center>
			</td>
		</tr>

		<br>

		<tr>
			<td class="contenedor___nombre__proyecto enfacis__letras" align="center">
				<center><?=$llaveSubsecretarías?></center>
			</td>
		</tr>

		<tr>
			<td class="contenedor___nombre__proyecto enfacis__letras" align="center">
				<center><?=$descripcionFisicamenteEstructura?></center>
			</td>
		</tr>

	</table>	

	<br>

	<table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias">

		<thead>

			<tr style="background-color: gray!important;">

				<td colspan="4" class="enfacis__letras"><center>DATOS GENERALES</center></td>

			</tr>

		</thead>

		<tbody>

			<tr>

				<td class="enfacis__letras">
					NOMBRE DEL PROYECTO
				</td>

				<td>
					<?=$nombre?>
				</td>

				<td class="enfacis__letras">
					MONTO SOLICITADO DEL PROYECTO
				</td>

				<td>
					USD$ <?=$monto?>
				</td>

			</tr>

			<tr>

				<td class="enfacis__letras">
					NOMBRE DEL SOLICITANTE 
				</td>

				<td>
					<?=$nombreSolicitantes?>
				</td>


				<td class="enfacis__letras">
					NÚMERO DE BENEFICIARIOS 
				</td>

				<td>
					<?=$totalBeneficiarios?>
				</td>


			</tr>

			<tr>

				<td class="enfacis__letras">
					SECTOR AL QUE CONTRIBUYE
				</td>

				<td>

					<?php for ($i=0;$i<count($dataReferentes);$i++): ?>
						
						<?=$dataReferentes[$i]?>
						<br>

					<?php endfor?>

				</td>

				<td class="enfacis__letras">
					PLURIANUAL
				</td>

				<td>
					<center>
						<?=$pluriAnual?>
					</center>					
				</td>

			</tr>
	

			<tr>

				<td class="enfacis__letras">Fecha de inicio</td>

				<td><?=$diaInicial?> de <?= strtolower($monthNameInicial)?> <?=$anioInicial?></td>

				<td class="enfacis__letras">Fecha de fín</td>

				<td><?=$diaFinal?> de <?= strtolower($monthNameFinal)?> <?=$anioFinal?></td>

			</tr>

			<tr>

				<td class="enfacis__letras">
					ALINEACIÓN AL PLAN ESTRATÉGICO
				</td>

				<td colspan="3">

					<?=$objetivo?>

				</td>

			</tr>

			<tr style="background-color: gray!important;">

				<td colspan="4" class="enfacis__letras"><center>REQUISITOS<br>(Indicar CUMPLE o NO CUMPLE)</center></td>

			</tr>

			<tr>


				<td class="enfacis__letras">
					CURRÍCULO DEPORTIVO JUSTIFICADO DOCUMENTADAMENTE

				</td>

				<td>
					<?php if (empty($curriculumDeportivoSegundo)): ?>

						No cumple
						
					<?php else: ?>

						Cumple
						
					<?php endif ?>
				</td>

				<td class="enfacis__letras">
					CERTIFICACIONES QUE ACREDITEN SU TRAYECTORIA DEPORTIVA
				</td>

				<td>
					<?php if (empty($certificacionTrayectoria)): ?>

						Cumple

					<?php else: ?>

						No cumple
						
					<?php endif ?>

				</td>

			</tr>

			<tr style="background-color: gray!important;">

				<td colspan="4" class="enfacis__letras"><center>RESUMEN PROYECTO</center></td>

			</tr>

			<tr>

				<td class="enfacis__letras">
					OBJETIVO DEL PROYECTO
				</td>

				<td colspan="3">
					<?=nl2br($objetivoGeneralCaracterizacion)?>
				</td>

			</tr>

			<tr>

				<td class="enfacis__letras">
					METAS DEL PROYECTO
				</td>

				<td colspan="3">
					
					<?php for($i=0;$i<count($dataReferentesTres);$i++): ?>
						
						<?=$dataReferentesTres[$i]?>

						<br>

					<?php endfor ?>

				</td>

			</tr>

			<tr>

				<td class="enfacis__letras">
					BENEFICIOS DEL PROYECTO
				</td>

				<td colspan="3">
					<?=nl2br($justificacionCaracterizacion)?>
				</td>

			</tr>

		</tbody>


	</table>

<?php
   
   $codigoProyectoPdf=$codigo;

   $array=array();

   $data9=array();

   $query="SELECT presupuestoLetras,presupuesto,presupuestoLetras2,presupuesto2,presupuestoLetras3,presupuesto3,mensajePlurianual,presupuestoCuatro,presupuestoLetrasCuatro,inicioPeriodos,finPeriodos FROM pro_proyetosreferencias WHERE codigoProyecto='$codigoProyectoPdf' ORDER BY idProyectoReferencias DESC LIMIT 1;";
   $resultado = $conexionEstablecida->query($query);     

   while($registro2 = $resultado->fetch()) {

      $presupuesto=$registro2['presupuesto'];
      $presupuestoLetras=$registro2['presupuestoLetras'];
      $presupuesto2=$registro2['presupuesto2'];
      $presupuestoLetras2=$registro2['presupuestoLetras2'];
      $presupuesto3=$registro2['presupuesto3'];
      $presupuestoLetras3=$registro2['presupuestoLetras3'];
      $presupuestoCuatro=$registro2['presupuestoCuatro'];
      $presupuestoLetrasCuatro=$registro2['presupuestoLetrasCuatro'];
      $mensajePlurianual=$registro2['mensajePlurianual'];
      $inicioPeriodos=$registro2['inicioPeriodos'];
      $finPeriodos=$registro2['finPeriodos'];

   }

   $inicioPeriodosArray = explode("/", $inicioPeriodos);

   array_push($data9, $presupuesto);
   array_push($data9, $presupuesto2);
   array_push($data9, $presupuesto3);
   array_push($data9, $presupuestoCuatro);

   $data1=array();
   $data2=array();

   $data3=array();
   $data4=array();

   $data5=array();
   $data6=array();
   $data7=array();
   $data8=array();

   $data58=array();

   $query4="SELECT b.idComponentes,b.nombreComponentes,b.tipoComponente FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS c ON c.idItem=a.idItemComponente INNER JOIN pro_componentes AS b ON b.idComponentes=c.componenteSeleccion WHERE a.codigo='$codigoProyectoPdf' GROUP BY b.idComponentes;";
   $resultado4 = $conexionEstablecida->query($query4);      

   while($registro4 = $resultado4->fetch()) {

      $idComponentes=$registro4['idComponentes'];
      array_push($data1, $idComponentes);


      $nombreComponentes=$registro4['nombreComponentes'];
      array_push($data2, $nombreComponentes);

      $tipoComponente=$registro4['tipoComponente'];
      array_push($data58, $tipoComponente);

   }

   $query5="SELECT c.idItem,b.idComponentes FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS c ON c.idItem=a.idItemComponente INNER JOIN pro_componentes AS b ON b.idComponentes=c.componenteSeleccion WHERE a.codigo='$codigoProyectoPdf' GROUP BY c.idItem;";
   $resultado5 = $conexionEstablecida->query($query5);      

   while($registro5 = $resultado5->fetch()) {

      $idItem=$registro5['idItem'];
      array_push($data3, $idItem);


      $idComponentes=$registro5['idComponentes'];
      array_push($data4, $idComponentes);

   }

   $contadorRelativo=0;
   $contadorRelativo2=0;

?>

<?php

  
  $queryRegistradosProyectos="SELECT inicioPeriodos,finPeriodos FROM pro_proyetosreferencias WHERE codigoProyecto='$codigoProyectoPdf' ORDER BY idProyectoReferencias DESC LIMIT 1;";
  $resultadosCompoentesRegistrados = $conexionEstablecida->query($queryRegistradosProyectos);   

  while($registradosCompoentesRegistrados = $resultadosCompoentesRegistrados->fetch()) {

    $inicioPeriodos=$registradosCompoentesRegistrados['inicioPeriodos'];
    $finPeriodos=$registradosCompoentesRegistrados['finPeriodos'];
      
  }

  $fechaInicialArray=explode("/",$inicioPeriodos);
  $fechaInicialEntero=intval($fechaInicialArray[2]);

  $fechaFinalArray=explode("/",$finPeriodos);
  $fechaFinalEntero=intval($fechaFinalArray[2]);

  $resultadoRestas=0;

  $resultadoRestas=$fechaFinalEntero - $fechaInicialEntero;

  $auxiliar=0;

?>


<?php

  $fechasArray=array();

  $parametro1String=$inicioPeriodos;
  $parametro2String=$finPeriodos;

  $arreglo1 = explode("/", $parametro1String);
  $arreglo2 = explode("/", $parametro2String);

  $diferenciaAnios= intval($arreglo2[2]) - intval($arreglo1[2]);

  $diferenciaAnios++;

  $diferenciaAniosDiferenciador=$diferenciaAnios-1;

  $sumador=0;

  for ($i=0; $i<$diferenciaAnios; $i++) {

    if ($i==0) {

      $fecha=(intval($arreglo1[2])+$sumador)."-".$arreglo1[1]."-".$arreglo1[0];

      array_push($fechasArray, $fecha);

    }else if($i==$diferenciaAniosDiferenciador){

      $fecha=(intval($arreglo1[2])+$sumador)."-".$arreglo2[1]."-".$arreglo2[0];

      array_push($fechasArray, $fecha);

    }else{

      $fecha=(intval($arreglo1[2])+$sumador)."-01-01";

      array_push($fechasArray, $fecha);

    }

    $sumador++;
                          
  }

?>

<?php

   function meses($mes){

    $mesAsignas=intval($mes);

    switch ($mesAsignas) {

        case "1":
          return "Enero";
        break;

        case "2":
          return "Febrero";
        break;

        case "3":
          return "Marzo";
        break;

        case "4":
          return "Abril";
        break;

        case "5":
          return "Mayo";
        break;

        case "6":
          return "Junio";
        break;

        case "7":
          return "Julio";
        break;

        case "8":
          return "Agosto";
        break;

        case "9":
          return "Septiembre";
        break;

        case "10":
          return "Octubre";
        break;

        case "11":
          return "Noviembre";
        break;

        case "12":
          return "Diciembre";
        break;

    }

  }


   function asociados($parametros){

    $parametrosAsignas=intval($parametros);

    switch ($mesAsignas) {

        case "1":
          return "1. ASOCIADOS A DEPORTISTAS";
        break;

        case "2":
          return "2. SERVICIOS DE EDUCACIÓN Y/O CAPACITACIÓN PARA EL SECTOR DEPORTIVO";
        break;

        case "3":
          return "3. ORGANIZACIÓN DE EVENTOS DEPORTIVOS DESARROLLADOS EN EL ECUADOR ";
        break;

        case "4":
          return "4. INFRAESTRUCTURA Y/O HERRAMIENTAS TECNOLÓGICAS PARA EL FOMENTO, REALIZACIÓN O SEGUIMIENTO DEL DEPORTE Y LA ACTIVIDAD FÍSICA";
        break;

        case "5":
          return "5. CONSTRUCCIÓN DE OBRA NUEVA, REHABILITACIÓN, READECUACIÓN Y/O MANTENIMIENTO DE INFRAESTRUCTURA DEPORTIVA";
        break;

        case "6":
          return "6. GASTOS ADMINISTRATIVOS";
        break;

    }

  }

  $axuiliarTipos=0;

  $contadorReferentes=1;

  $banderaGratificantes=0;

?>


<!--=======================================
=            Sumador funciones            =
========================================-->

<?php


   function funcionPostulantes($parametros){

    if ($parametros=="1.1 Preparación y/o participación de deportistas" || $parametros=="1.1 Preparación y/o participación de deportistas" || $parametros=="1.3 IMPLEMENTACIÓN DEPORTIVA ESPECIALIZADA" ||  $parametros=="1.4 INGRESOS A FAVOR DE DEPORTISTAS" || $parametros=="* DIFUSIÓN DEL DEPORTISTA") {
      return 1;
    }

  }

?>

<!--====  End of Sumador funciones  ====-->


<!--========================================
=            Primer componentes            =
=========================================-->

<?php


   function sumadorCompoonentesHeads($parametros,$parametro2,$parametro3){

    $sumadorConvertidos=0;

    $arraySumador1Inicial=array();
      
    $arrayConvertidosSumador2=array();


    $arrayTotalesComvertidos=array();

    switch ($parametros) {

        case "1":

         $conexionRecuperada= new conexion();
         $conexionEstablecida=$conexionRecuperada->cConexion();        
          

         $querySuma1="SELECT (SELECT a1.montos FROM pro_componentesciudadanosmontos AS a1 WHERE a1.idComponentesCiudadanos=a.idComponentesCiudadanos) AS campos FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS c ON c.idItem=a.idItemComponente INNER JOIN pro_componentes AS b ON b.idComponentes=c.componenteSeleccion WHERE a.codigo='$parametro2' AND (b.idComponentes='29' OR b.idComponentes='30' OR b.idComponentes='31' OR b.idComponentes='32') AND a.identificador='b';";
         $resultadoSuma1 = $conexionEstablecida->query($querySuma1);   

         while($registroSuma1 = $resultadoSuma1->fetch()) {

          $camposSuma1=$registroSuma1['campos'];
          array_push($arraySumador1Inicial, $camposSuma1);
              
         }

          for ($i=0; $i < count($arraySumador1Inicial); $i++) { 

            $arrayConvertidosSumador1=array();

            $arrayConvertidosSumador1 = explode ("/../",$arraySumador1Inicial[$i]);

          for ($l=0; $l < count($arrayConvertidosSumador1); $l++) { 

            $arrayDatosContenidos=array();

            $arrayDatosContenidos = explode ("___",$arrayConvertidosSumador1[$l]);

            $anioSeparados=substr($arrayDatosContenidos[0],-4);

            if ($anioSeparados==$parametro3) {
                array_push($arrayConvertidosSumador2, $arrayDatosContenidos[1]);
            }
                
          }

         }

         $sumadorConvertidos=array_sum($arrayConvertidosSumador2);  


         return $sumadorConvertidos;

        break;

        case "2":

         $conexionRecuperada= new conexion();
         $conexionEstablecida=$conexionRecuperada->cConexion();        
          

         $querySuma1="SELECT (SELECT a1.montos FROM pro_componentesciudadanosmontos AS a1 WHERE a1.idComponentesCiudadanos=a.idComponentesCiudadanos) AS campos FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS c ON c.idItem=a.idItemComponente INNER JOIN pro_componentes AS b ON b.idComponentes=c.componenteSeleccion WHERE a.codigo='$parametro2' AND b.idComponentes='33' AND a.identificador='b';";
         $resultadoSuma1 = $conexionEstablecida->query($querySuma1);   

         while($registroSuma1 = $resultadoSuma1->fetch()) {

          $camposSuma1=$registroSuma1['campos'];
          array_push($arraySumador1Inicial, $camposSuma1);
              
         }

          for ($i=0; $i < count($arraySumador1Inicial); $i++) { 

            $arrayConvertidosSumador1=array();

            $arrayConvertidosSumador1 = explode ("/../",$arraySumador1Inicial[$i]);

          for ($l=0; $l < count($arrayConvertidosSumador1); $l++) { 

            $arrayDatosContenidos=array();

            $arrayDatosContenidos = explode ("___",$arrayConvertidosSumador1[$l]);

            $anioSeparados=substr($arrayDatosContenidos[0],-4);

            if ($anioSeparados==$parametro3) {
                array_push($arrayConvertidosSumador2, $arrayDatosContenidos[1]);
            }
                
          }

         }

         $sumadorConvertidos=array_sum($arrayConvertidosSumador2);  


         return $sumadorConvertidos;

        break;

        case "3":

         $conexionRecuperada= new conexion();
         $conexionEstablecida=$conexionRecuperada->cConexion();        
          

         $querySuma1="SELECT (SELECT a1.montos FROM pro_componentesciudadanosmontos AS a1 WHERE a1.idComponentesCiudadanos=a.idComponentesCiudadanos) AS campos FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS c ON c.idItem=a.idItemComponente INNER JOIN pro_componentes AS b ON b.idComponentes=c.componenteSeleccion WHERE a.codigo='$parametro2' AND b.idComponentes='34' AND a.identificador='b';";
         $resultadoSuma1 = $conexionEstablecida->query($querySuma1);   

         while($registroSuma1 = $resultadoSuma1->fetch()) {

          $camposSuma1=$registroSuma1['campos'];
          array_push($arraySumador1Inicial, $camposSuma1);
              
         }

          for ($i=0; $i < count($arraySumador1Inicial); $i++) { 

            $arrayConvertidosSumador1=array();

            $arrayConvertidosSumador1 = explode ("/../",$arraySumador1Inicial[$i]);

          for ($l=0; $l < count($arrayConvertidosSumador1); $l++) { 

            $arrayDatosContenidos=array();

            $arrayDatosContenidos = explode ("___",$arrayConvertidosSumador1[$l]);

            $anioSeparados=substr($arrayDatosContenidos[0],-4);

            if ($anioSeparados==$parametro3) {
                array_push($arrayConvertidosSumador2, $arrayDatosContenidos[1]);
            }
                
          }

         }

         $sumadorConvertidos=array_sum($arrayConvertidosSumador2);  


         return $sumadorConvertidos;

        break;

        case "4":

         $conexionRecuperada= new conexion();
         $conexionEstablecida=$conexionRecuperada->cConexion();        
          

         $querySuma1="SELECT (SELECT a1.montos FROM pro_componentesciudadanosmontos AS a1 WHERE a1.idComponentesCiudadanos=a.idComponentesCiudadanos) AS campos FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS c ON c.idItem=a.idItemComponente INNER JOIN pro_componentes AS b ON b.idComponentes=c.componenteSeleccion WHERE a.codigo='$parametro2' AND b.idComponentes='35' AND a.identificador='b';";
         $resultadoSuma1 = $conexionEstablecida->query($querySuma1);   

         while($registroSuma1 = $resultadoSuma1->fetch()) {

          $camposSuma1=$registroSuma1['campos'];
          array_push($arraySumador1Inicial, $camposSuma1);
              
         }

          for ($i=0; $i < count($arraySumador1Inicial); $i++) { 

            $arrayConvertidosSumador1=array();

            $arrayConvertidosSumador1 = explode ("/../",$arraySumador1Inicial[$i]);

          for ($l=0; $l < count($arrayConvertidosSumador1); $l++) { 

            $arrayDatosContenidos=array();

            $arrayDatosContenidos = explode ("___",$arrayConvertidosSumador1[$l]);

            $anioSeparados=substr($arrayDatosContenidos[0],-4);

            if ($anioSeparados==$parametro3) {
                array_push($arrayConvertidosSumador2, $arrayDatosContenidos[1]);
            }
                
          }

         }

         $sumadorConvertidos=array_sum($arrayConvertidosSumador2);  


         return $sumadorConvertidos;

        break;

        case "5":

         $conexionRecuperada= new conexion();
         $conexionEstablecida=$conexionRecuperada->cConexion();        
          

         $querySuma1="SELECT (SELECT a1.montos FROM pro_componentesciudadanosmontos AS a1 WHERE a1.idComponentesCiudadanos=a.idComponentesCiudadanos) AS campos FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS c ON c.idItem=a.idItemComponente INNER JOIN pro_componentes AS b ON b.idComponentes=c.componenteSeleccion WHERE a.codigo='$parametro2' AND b.idComponentes='36' AND a.identificador='b';";
         $resultadoSuma1 = $conexionEstablecida->query($querySuma1);   

         while($registroSuma1 = $resultadoSuma1->fetch()) {

          $camposSuma1=$registroSuma1['campos'];
          array_push($arraySumador1Inicial, $camposSuma1);
              
         }

          for ($i=0; $i < count($arraySumador1Inicial); $i++) { 

            $arrayConvertidosSumador1=array();

            $arrayConvertidosSumador1 = explode ("/../",$arraySumador1Inicial[$i]);

          for ($l=0; $l < count($arrayConvertidosSumador1); $l++) { 

            $arrayDatosContenidos=array();

            $arrayDatosContenidos = explode ("___",$arrayConvertidosSumador1[$l]);

            $anioSeparados=substr($arrayDatosContenidos[0],-4);

            if ($anioSeparados==$parametro3) {
                array_push($arrayConvertidosSumador2, $arrayDatosContenidos[1]);
            }
                
          }

         }

         $sumadorConvertidos=array_sum($arrayConvertidosSumador2);  


         return $sumadorConvertidos;

        break;

        case "6":

         $conexionRecuperada= new conexion();
         $conexionEstablecida=$conexionRecuperada->cConexion();        
          

         $querySuma1="SELECT (SELECT a1.montos FROM pro_componentesciudadanosmontos AS a1 WHERE a1.idComponentesCiudadanos=a.idComponentesCiudadanos) AS campos FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS c ON c.idItem=a.idItemComponente INNER JOIN pro_componentes AS b ON b.idComponentes=c.componenteSeleccion WHERE a.codigo='$parametro2' AND b.idComponentes='37' AND a.identificador='b';";
         $resultadoSuma1 = $conexionEstablecida->query($querySuma1);   

         while($registroSuma1 = $resultadoSuma1->fetch()) {

          $camposSuma1=$registroSuma1['campos'];
          array_push($arraySumador1Inicial, $camposSuma1);
              
         }

          for ($i=0; $i < count($arraySumador1Inicial); $i++) { 

            $arrayConvertidosSumador1=array();

            $arrayConvertidosSumador1 = explode ("/../",$arraySumador1Inicial[$i]);

          for ($l=0; $l < count($arrayConvertidosSumador1); $l++) { 

            $arrayDatosContenidos=array();

            $arrayDatosContenidos = explode ("___",$arrayConvertidosSumador1[$l]);

            $anioSeparados=substr($arrayDatosContenidos[0],-4);

            if ($anioSeparados==$parametro3) {
                array_push($arrayConvertidosSumador2, $arrayDatosContenidos[1]);
            }
                
          }

         }

         $sumadorConvertidos=array_sum($arrayConvertidosSumador2);  


         return $sumadorConvertidos;

        break;


        case "7":

         $conexionRecuperada= new conexion();
         $conexionEstablecida=$conexionRecuperada->cConexion();        
          

         $querySuma1="SELECT (SELECT a1.montos FROM pro_componentesciudadanosmontos AS a1 WHERE a1.idComponentesCiudadanos=a.idComponentesCiudadanos) AS campos FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS c ON c.idItem=a.idItemComponente INNER JOIN pro_componentes AS b ON b.idComponentes=c.componenteSeleccion WHERE a.codigo='$parametro2' AND a.identificador='b';";
         $resultadoSuma1 = $conexionEstablecida->query($querySuma1);   

         while($registroSuma1 = $resultadoSuma1->fetch()) {

          $camposSuma1=$registroSuma1['campos'];
          array_push($arraySumador1Inicial, $camposSuma1);
              
         }

          for ($i=0; $i < count($arraySumador1Inicial); $i++) { 

            $arrayConvertidosSumador1=array();

            $arrayConvertidosSumador1 = explode ("/../",$arraySumador1Inicial[$i]);

          for ($l=0; $l < count($arrayConvertidosSumador1); $l++) { 

            $arrayDatosContenidos=array();

            $arrayDatosContenidos = explode ("___",$arrayConvertidosSumador1[$l]);

            $anioSeparados=substr($arrayDatosContenidos[0],-4);

            if ($anioSeparados==$parametro3) {
                array_push($arrayConvertidosSumador2, $arrayDatosContenidos[1]);
            }
                
          }

         }

         $sumadorConvertidos=array_sum($arrayConvertidosSumador2);  


         return $sumadorConvertidos;

        break;

    }

  }

  $sumandoComponentes=0;

?>

<?php

  function sumadorCompoonentesFooters($parametros,$parametro2,$parametro3){

    $sumadorConvertidos=0;

    $arraySumador1Inicial=array();
      
    $arrayConvertidosSumador2=array();


    $arrayTotalesComvertidos=array();

    $conexionRecuperada= new conexion();
    $conexionEstablecida=$conexionRecuperada->cConexion();        
          
    $querySuma1="SELECT (SELECT a1.montos FROM pro_componentesciudadanosmontos AS a1 WHERE a1.idComponentesCiudadanos=a.idComponentesCiudadanos) AS campos FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS c ON c.idItem=a.idItemComponente INNER JOIN pro_componentes AS b ON b.idComponentes=c.componenteSeleccion WHERE a.codigo='$parametros' AND a.identificador='b';";
    $resultadoSuma1 = $conexionEstablecida->query($querySuma1);   

    while($registroSuma1 = $resultadoSuma1->fetch()) {

      $camposSuma1=$registroSuma1['campos'];
      array_push($arraySumador1Inicial, $camposSuma1);
              
    }

    for ($i=0; $i < count($arraySumador1Inicial); $i++) { 

      $arrayConvertidosSumador1=array();

      $arrayConvertidosSumador1 = explode ("/../",$arraySumador1Inicial[$i]);

      for ($l=0; $l < count($arrayConvertidosSumador1); $l++) { 

        $arrayDatosContenidos=array();

        $arrayDatosContenidos = explode ("___",$arrayConvertidosSumador1[$l]);

        $anioSeparados=substr($arrayDatosContenidos[0],-4);

        $mesObtenido=substr($arrayDatosContenidos[0], 0, -4);

        if ($anioSeparados==$parametro2 && $mesObtenido==$parametro3) {
          array_push($arrayConvertidosSumador2, $arrayDatosContenidos[1]);
        }
                
      }

    }

    $sumadorConvertidos=array_sum($arrayConvertidosSumador2);  

    return $sumadorConvertidos;

  }

?>


<table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias">

	<tr style="background-color: gray!important;" align="center">

		<td>COMPONENTES DEL PROYECTO</td>

	</tr>

</table>

<div style="page-break-after:always;"></div>

<!--=====================================
=            Primera sección            =
======================================-->

<?php if ($resultadoRestas==0 || $resultadoRestas==1 || $resultadoRestas==2 || $resultadoRestas==3): ?>  


<?php $banderaGratificantes=0;?>
<?php  $arregloAnios1 = explode("-", $fechasArray[0]);?>


<table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias" style="margin-top: 2em;">

	<thead>

		<tr style="background: #263238!important; color:white!important;">

			<td rowspan="2" colspan="1" align="center" style="vertical-align: middle;">

				Componentes

			</td>

			<td colspan="2" align="center">

				Monto Año <?=intval($arregloAnios1[0])?> 

			</td>

		</tr>

		<tr style="background: #263238!important; color:white!important;">

			<td colspan="1" align="center">

				Total

			</td>

			<td colspan="1" align="center">

				%

			</td>

		</tr>

	</thead>

    <tbody>

    	<?php $totalesSumatoresDados=sumadorCompoonentesHeads("7",$codigoProyectoPdf,$arregloAnios1[0])?>

        <?php for($i=0;$i<count($data1);$i++): ?>

        	<?php if ($banderaGratificantes==0): ?>

        	<?php $sumadoresCualificados=sumadorCompoonentesHeads("1",$codigoProyectoPdf,$arregloAnios1[0])?>

         	<tr>

              <td class="nombre__apartados__secundarios">
                  
                1. ASOCIADOS A DEPORTISTAS 

              </td>

              <td align="center">

              	 <?= number_format(floatval($sumadoresCualificados),2, '.', '')?>

              </td>


			  <?php $percent = ($sumadoresCualificados * 100) / $totalesSumatoresDados;?>

			  <td align="center">

			  	<?=round($percent, 0)?>&nbsp;&nbsp;%

			  </td>

        	</tr>       

        	<?php $banderaGratificantes=funcionPostulantes($data2[$i]);?>		
        		
        	<?php else: ?>

        		<?php if ($data2[$i]!="1.1 Preparación y/o participación de deportistas" && $data2[$i]!="1.2 PREMIACIÓN A DEPORTISTAS POR LOGROS EN EVENTOS DEPORTIVOS U OBTENCIÓN DE METAS" && $data2[$i]!="1.3 IMPLEMENTACIÓN DEPORTIVA ESPECIALIZADA" && $data2[$i]!="1.4 INGRESOS A FAVOR DE DEPORTISTAS" && $data2[$i]!="* DIFUSIÓN DEL DEPORTISTA"): ?>

		            <?php if ($data2[$i]=="2. SERVICIOS DE EDUCACIÓN Y/O CAPACITACIÓN PARA EL SECTOR DEPORTIVO"): ?>
		              
		              <?php $sumadoresCualificados=sumadorCompoonentesHeads("2",$codigoProyectoPdf,$arregloAnios1[0])?>

		            <?php endif ?>
		              
		            <?php if ($data2[$i]=="3. ORGANIZACIÓN DE EVENTOS DEPORTIVOS DESARROLLADOS EN EL ECUADOR"): ?>
		              
		              <?php $sumadoresCualificados=sumadorCompoonentesHeads("3",$codigoProyectoPdf,$arregloAnios1[0])?>

		            <?php endif ?>

		            <?php if ($data2[$i]=="4. INFRAESTRUCTURA Y/O HERRAMIENTAS TECNOLÓGICAS PARA EL FOMENTO, REALIZACIÓN O SEGUIMIENTO DEL DEPORTE Y LA ACTIVIDAD FÍSICA"): ?>
		              
		              <?php $sumadoresCualificados=sumadorCompoonentesHeads("4",$codigoProyectoPdf,$arregloAnios1[0])?>

		            <?php endif ?>

		           <?php if ($data2[$i]=="5. CONSTRUCCIÓN DE OBRA NUEVA, REHABILITACIÓN, READECUACIÓN Y/O MANTENIMIENTO DE INFRAESTRUCTURA DEPORTIVA"): ?>
		              
		              <?php $sumadoresCualificados=sumadorCompoonentesHeads("5",$codigoProyectoPdf,$arregloAnios1[0])?>

		            <?php endif ?>

		           <?php if ($data2[$i]=="6. GASTOS ADMINISTRATIVOS"): ?>
		              
		              <?php $sumadoresCualificados=sumadorCompoonentesHeads("4",$codigoProyectoPdf,$arregloAnios1[0])?>

		            <?php endif ?>

		        	<tr>

		              <td class="nombre__apartados__secundarios">
		                  
		                <?=$data2[$i]?>

		              </td>

			          <td align="center">

			           	<?= number_format(floatval($sumadoresCualificados),2, '.', '')?>

			          </td>

			          <?php $percent = ($sumadoresCualificados * 100) / $totalesSumatoresDados;?>

			          <td align="center">

			          	<?=round($percent, 0)?>&nbsp;&nbsp;%

			          </td>

		        	</tr>

        		<?php endif ?>

        	<?php endif ?>

        <?php endfor?> 

      </tbody>

      <tfoot>

      	<tr style="background-color:gray!important; color: white!important;">

      		<td>

      			Presupuesto total requerido:

      		</td>

      		<td align="center">

      			<?=$sumadoresCualificados?>

      		</td>

      		<td align="center">

      			100%

      		</td>

      	</tr>


      </tfoot>

</table>

<?php endif ?>

<!--====  End of Primera sección  ====-->


<!--=====================================
=            Segunda sección            =
======================================-->

<?php if ($resultadoRestas==1 || $resultadoRestas==2 || $resultadoRestas==3): ?>  


<?php $banderaGratificantes=0;?>
<?php  $arregloAnios1 = explode("-", $fechasArray[1]);?>


<table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias" style="margin-top: 2em;">

	<thead>

		<tr style="background: #263238!important; color:white!important;">

			<td rowspan="2" colspan="1" align="center" style="vertical-align: middle;">

				Componentes

			</td>

			<td colspan="2" align="center">

				Monto Año <?=intval($arregloAnios1[0])?> 

			</td>

		</tr>

		<tr style="background: #263238!important; color:white!important;">

			<td colspan="1" align="center">

				Total

			</td>

			<td colspan="1" align="center">

				%

			</td>

		</tr>

	</thead>

    <tbody>

    	<?php $totalesSumatoresDados=sumadorCompoonentesHeads("7",$codigoProyectoPdf,$arregloAnios1[0])?>

        <?php for($i=0;$i<count($data1);$i++): ?>

        	<?php if ($banderaGratificantes==0): ?>

        	<?php $sumadoresCualificados=sumadorCompoonentesHeads("1",$codigoProyectoPdf,$arregloAnios1[0])?>

         	<tr>

              <td class="nombre__apartados__secundarios">
                  
                1. ASOCIADOS A DEPORTISTAS 

              </td>

              <td align="center">

              	 <?= number_format(floatval($sumadoresCualificados),2, '.', '')?>

              </td>


			  <?php $percent = ($sumadoresCualificados * 100) / $totalesSumatoresDados;?>

			  <td align="center">

			  	<?=round($percent, 0)?>&nbsp;&nbsp;%

			  </td>

        	</tr>       

        	<?php $banderaGratificantes=funcionPostulantes($data2[$i]);?>		
        		
        	<?php else: ?>

        		<?php if ($data2[$i]!="1.1 Preparación y/o participación de deportistas" && $data2[$i]!="1.2 PREMIACIÓN A DEPORTISTAS POR LOGROS EN EVENTOS DEPORTIVOS U OBTENCIÓN DE METAS" && $data2[$i]!="1.3 IMPLEMENTACIÓN DEPORTIVA ESPECIALIZADA" && $data2[$i]!="1.4 INGRESOS A FAVOR DE DEPORTISTAS" && $data2[$i]!="* DIFUSIÓN DEL DEPORTISTA"): ?>

		            <?php if ($data2[$i]=="2. SERVICIOS DE EDUCACIÓN Y/O CAPACITACIÓN PARA EL SECTOR DEPORTIVO"): ?>
		              
		              <?php $sumadoresCualificados=sumadorCompoonentesHeads("2",$codigoProyectoPdf,$arregloAnios1[0])?>

		            <?php endif ?>
		              
		            <?php if ($data2[$i]=="3. ORGANIZACIÓN DE EVENTOS DEPORTIVOS DESARROLLADOS EN EL ECUADOR"): ?>
		              
		              <?php $sumadoresCualificados=sumadorCompoonentesHeads("3",$codigoProyectoPdf,$arregloAnios1[0])?>

		            <?php endif ?>

		            <?php if ($data2[$i]=="4. INFRAESTRUCTURA Y/O HERRAMIENTAS TECNOLÓGICAS PARA EL FOMENTO, REALIZACIÓN O SEGUIMIENTO DEL DEPORTE Y LA ACTIVIDAD FÍSICA"): ?>
		              
		              <?php $sumadoresCualificados=sumadorCompoonentesHeads("4",$codigoProyectoPdf,$arregloAnios1[0])?>

		            <?php endif ?>

		           <?php if ($data2[$i]=="5. CONSTRUCCIÓN DE OBRA NUEVA, REHABILITACIÓN, READECUACIÓN Y/O MANTENIMIENTO DE INFRAESTRUCTURA DEPORTIVA"): ?>
		              
		              <?php $sumadoresCualificados=sumadorCompoonentesHeads("5",$codigoProyectoPdf,$arregloAnios1[0])?>

		            <?php endif ?>

		           <?php if ($data2[$i]=="6. GASTOS ADMINISTRATIVOS"): ?>
		              
		              <?php $sumadoresCualificados=sumadorCompoonentesHeads("4",$codigoProyectoPdf,$arregloAnios1[0])?>

		            <?php endif ?>

		        	<tr>

		              <td class="nombre__apartados__secundarios">
		                  
		                <?=$data2[$i]?>

		              </td>

			          <td align="center">

			           	<?= number_format(floatval($sumadoresCualificados),2, '.', '')?>

			          </td>

			          <?php $percent = ($sumadoresCualificados * 100) / $totalesSumatoresDados;?>

			          <td align="center">

			          	<?=round($percent, 0)?>&nbsp;&nbsp;%

			          </td>

		        	</tr>

        		<?php endif ?>

        	<?php endif ?>

        <?php endfor?> 

      </tbody>

      <tfoot>

      	<tr style="background-color:gray!important; color: white!important;">

      		<td>

      			Presupuesto total requerido:

      		</td>

      		<td align="center">

      			<?=$sumadoresCualificados?>

      		</td>

      		<td align="center">

      			100%

      		</td>

      	</tr>


      </tfoot>

</table>


<?php endif ?>

<!--====  End of Segunda sección  ====-->

<!--=====================================
=            Tercera Sección            =
======================================-->

<?php if ($resultadoRestas==2 || $resultadoRestas==3): ?>  


<?php $banderaGratificantes=0;?>
<?php  $arregloAnios1 = explode("-", $fechasArray[2]);?>


<table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias" style="margin-top: 2em;">

	<thead>

		<tr style="background: #263238!important; color:white!important;">

			<td rowspan="2" colspan="1" align="center" style="vertical-align: middle;">

				Componentes

			</td>

			<td colspan="2" align="center">

				Monto Año <?=intval($arregloAnios1[0])?> 

			</td>

		</tr>

		<tr style="background: #263238!important; color:white!important;">

			<td colspan="1" align="center">

				Total

			</td>

			<td colspan="1" align="center">

				%

			</td>

		</tr>

	</thead>

    <tbody>

    	<?php $totalesSumatoresDados=sumadorCompoonentesHeads("7",$codigoProyectoPdf,$arregloAnios1[0])?>

        <?php for($i=0;$i<count($data1);$i++): ?>

        	<?php if ($banderaGratificantes==0): ?>

        	<?php $sumadoresCualificados=sumadorCompoonentesHeads("1",$codigoProyectoPdf,$arregloAnios1[0])?>

         	<tr>

              <td class="nombre__apartados__secundarios">
                  
                1. ASOCIADOS A DEPORTISTAS 

              </td>

              <td align="center">

              	 <?= number_format(floatval($sumadoresCualificados),2, '.', '')?>

              </td>


			  <?php $percent = ($sumadoresCualificados * 100) / $totalesSumatoresDados;?>

			  <td align="center">

			  	<?=round($percent, 0)?>&nbsp;&nbsp;%

			  </td>

        	</tr>       

        	<?php $banderaGratificantes=funcionPostulantes($data2[$i]);?>		
        		
        	<?php else: ?>

        		<?php if ($data2[$i]!="1.1 Preparación y/o participación de deportistas" && $data2[$i]!="1.2 PREMIACIÓN A DEPORTISTAS POR LOGROS EN EVENTOS DEPORTIVOS U OBTENCIÓN DE METAS" && $data2[$i]!="1.3 IMPLEMENTACIÓN DEPORTIVA ESPECIALIZADA" && $data2[$i]!="1.4 INGRESOS A FAVOR DE DEPORTISTAS" && $data2[$i]!="* DIFUSIÓN DEL DEPORTISTA"): ?>

		            <?php if ($data2[$i]=="2. SERVICIOS DE EDUCACIÓN Y/O CAPACITACIÓN PARA EL SECTOR DEPORTIVO"): ?>
		              
		              <?php $sumadoresCualificados=sumadorCompoonentesHeads("2",$codigoProyectoPdf,$arregloAnios1[0])?>

		            <?php endif ?>
		              
		            <?php if ($data2[$i]=="3. ORGANIZACIÓN DE EVENTOS DEPORTIVOS DESARROLLADOS EN EL ECUADOR"): ?>
		              
		              <?php $sumadoresCualificados=sumadorCompoonentesHeads("3",$codigoProyectoPdf,$arregloAnios1[0])?>

		            <?php endif ?>

		            <?php if ($data2[$i]=="4. INFRAESTRUCTURA Y/O HERRAMIENTAS TECNOLÓGICAS PARA EL FOMENTO, REALIZACIÓN O SEGUIMIENTO DEL DEPORTE Y LA ACTIVIDAD FÍSICA"): ?>
		              
		              <?php $sumadoresCualificados=sumadorCompoonentesHeads("4",$codigoProyectoPdf,$arregloAnios1[0])?>

		            <?php endif ?>

		           <?php if ($data2[$i]=="5. CONSTRUCCIÓN DE OBRA NUEVA, REHABILITACIÓN, READECUACIÓN Y/O MANTENIMIENTO DE INFRAESTRUCTURA DEPORTIVA"): ?>
		              
		              <?php $sumadoresCualificados=sumadorCompoonentesHeads("5",$codigoProyectoPdf,$arregloAnios1[0])?>

		            <?php endif ?>

		           <?php if ($data2[$i]=="6. GASTOS ADMINISTRATIVOS"): ?>
		              
		              <?php $sumadoresCualificados=sumadorCompoonentesHeads("4",$codigoProyectoPdf,$arregloAnios1[0])?>

		            <?php endif ?>

		        	<tr>

		              <td class="nombre__apartados__secundarios">
		                  
		                <?=$data2[$i]?>

		              </td>

			          <td align="center">

			           	<?= number_format(floatval($sumadoresCualificados),2, '.', '')?>

			          </td>

			          <?php $percent = ($sumadoresCualificados * 100) / $totalesSumatoresDados;?>

			          <td align="center">

			          	<?=round($percent, 0)?>&nbsp;&nbsp;%

			          </td>

		        	</tr>

        		<?php endif ?>

        	<?php endif ?>

        <?php endfor?> 

      </tbody>

      <tfoot>

      	<tr style="background-color:gray!important; color: white!important;">

      		<td>

      			Presupuesto total requerido:

      		</td>

      		<td align="center">

      			<?=$sumadoresCualificados?>

      		</td>

      		<td align="center">

      			100%

      		</td>

      	</tr>


      </tfoot>

</table>


<?php endif ?>

<!--====  End of Tercera Sección  ====-->

<!--====================================
=            Cuarta sección            =
=====================================-->

<?php if ($resultadoRestas==2 || $resultadoRestas==3): ?>  


<?php $banderaGratificantes=0;?>
<?php  $arregloAnios1 = explode("-", $fechasArray[3]);?>


<table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias" style="margin-top: 2em;">

	<thead>

		<tr style="background: #263238!important; color:white!important;">

			<td rowspan="2" colspan="1" align="center" style="vertical-align: middle;">

				Componentes

			</td>

			<td colspan="2" align="center">

				Monto Año <?=intval($arregloAnios1[0])?> 

			</td>

		</tr>

		<tr style="background: #263238!important; color:white!important;">

			<td colspan="1" align="center">

				Total

			</td>

			<td colspan="1" align="center">

				%

			</td>

		</tr>

	</thead>

    <tbody>

    	<?php $totalesSumatoresDados=sumadorCompoonentesHeads("7",$codigoProyectoPdf,$arregloAnios1[0])?>

        <?php for($i=0;$i<count($data1);$i++): ?>

        	<?php if ($banderaGratificantes==0): ?>

        	<?php $sumadoresCualificados=sumadorCompoonentesHeads("1",$codigoProyectoPdf,$arregloAnios1[0])?>

         	<tr>

              <td class="nombre__apartados__secundarios">
                  
                1. ASOCIADOS A DEPORTISTAS 

              </td>

              <td align="center">

              	 <?= number_format(floatval($sumadoresCualificados),2, '.', '')?>

              </td>


			  <?php $percent = ($sumadoresCualificados * 100) / $totalesSumatoresDados;?>

			  <td align="center">

			  	<?=round($percent, 0)?>&nbsp;&nbsp;%

			  </td>

        	</tr>       

        	<?php $banderaGratificantes=funcionPostulantes($data2[$i]);?>		
        		
        	<?php else: ?>

        		<?php if ($data2[$i]!="1.1 Preparación y/o participación de deportistas" && $data2[$i]!="1.2 PREMIACIÓN A DEPORTISTAS POR LOGROS EN EVENTOS DEPORTIVOS U OBTENCIÓN DE METAS" && $data2[$i]!="1.3 IMPLEMENTACIÓN DEPORTIVA ESPECIALIZADA" && $data2[$i]!="1.4 INGRESOS A FAVOR DE DEPORTISTAS" && $data2[$i]!="* DIFUSIÓN DEL DEPORTISTA"): ?>

		            <?php if ($data2[$i]=="2. SERVICIOS DE EDUCACIÓN Y/O CAPACITACIÓN PARA EL SECTOR DEPORTIVO"): ?>
		              
		              <?php $sumadoresCualificados=sumadorCompoonentesHeads("2",$codigoProyectoPdf,$arregloAnios1[0])?>

		            <?php endif ?>
		              
		            <?php if ($data2[$i]=="3. ORGANIZACIÓN DE EVENTOS DEPORTIVOS DESARROLLADOS EN EL ECUADOR"): ?>
		              
		              <?php $sumadoresCualificados=sumadorCompoonentesHeads("3",$codigoProyectoPdf,$arregloAnios1[0])?>

		            <?php endif ?>

		            <?php if ($data2[$i]=="4. INFRAESTRUCTURA Y/O HERRAMIENTAS TECNOLÓGICAS PARA EL FOMENTO, REALIZACIÓN O SEGUIMIENTO DEL DEPORTE Y LA ACTIVIDAD FÍSICA"): ?>
		              
		              <?php $sumadoresCualificados=sumadorCompoonentesHeads("4",$codigoProyectoPdf,$arregloAnios1[0])?>

		            <?php endif ?>

		           <?php if ($data2[$i]=="5. CONSTRUCCIÓN DE OBRA NUEVA, REHABILITACIÓN, READECUACIÓN Y/O MANTENIMIENTO DE INFRAESTRUCTURA DEPORTIVA"): ?>
		              
		              <?php $sumadoresCualificados=sumadorCompoonentesHeads("5",$codigoProyectoPdf,$arregloAnios1[0])?>

		            <?php endif ?>

		           <?php if ($data2[$i]=="6. GASTOS ADMINISTRATIVOS"): ?>
		              
		              <?php $sumadoresCualificados=sumadorCompoonentesHeads("4",$codigoProyectoPdf,$arregloAnios1[0])?>

		            <?php endif ?>

		        	<tr>

		              <td class="nombre__apartados__secundarios">
		                  
		                <?=$data2[$i]?>

		              </td>

			          <td align="center">

			           	<?= number_format(floatval($sumadoresCualificados),2, '.', '')?>

			          </td>

			          <?php $percent = ($sumadoresCualificados * 100) / $totalesSumatoresDados;?>

			          <td align="center">

			          	<?=round($percent, 0)?>&nbsp;&nbsp;%

			          </td>

		        	</tr>

        		<?php endif ?>

        	<?php endif ?>

        <?php endfor?> 

      </tbody>

      <tfoot>

      	<tr style="background-color:gray!important; color: white!important;">

      		<td>

      			Presupuesto total requerido:

      		</td>

      		<td align="center">

      			<?=$sumadoresCualificados?>

      		</td>

      		<td align="center">

      			100%

      		</td>

      	</tr>


      </tfoot>

</table>


<?php endif ?>

<!--====  End of Cuarta sección  ====-->

<?php

	if (!empty($usuariosRelativosVincula)) {
		$queryUsuariosDispuestos="SELECT apellido,nombre FROM th_usuario WHERE id_usuario='$usuariosRelativosVincula';";
	}else{
		$queryUsuariosDispuestos="SELECT apellido,nombre FROM th_usuario WHERE id_usuario='$idUsuarioRelativo';";
	}

    
    $resultadoUsuariosDispuestos = $conexionEstablecida->query($queryUsuariosDispuestos);   

    while($registroUsuariosDispuestos = $resultadoUsuariosDispuestos->fetch()) {

      $apellido=$registroUsuariosDispuestos['apellido'];
      $nombre=$registroUsuariosDispuestos['nombre'];
              
    }

?>


<table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias" style="margin-top: 2em!important;">

	<thead>

		<tr style="background-color: gray!important;" align="center">

			<td colspan="2">ANÁLISIS TÉCNICO </td>

		</tr>

	</thead>

</table>

<table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias" style="margin-top: 2em!important;">

	<tbody>

		<tr>

			<td align="justify" colspan="2">

				En atención al proyecto presentado susceptible de consideración para la aplicación de la  deducción del 100% adicional para el cálculo de la base imponible del Impuesto a la Renta,  por el deportista <?=$nombreSolicitantes?>,  mediante la plataforma del Ministerio  del Deporte, el cual se denomina “<?=$nombre?>".

			</td>

		</tr>

		<tr>

			<td>

				RECOMIENDO

			</td>

			<td>

				SI

			</td>

		</tr>

		<tr style="background-color: gray!important; color: white!important;" align="center">

			<td colspan="2">RAZONES DE RECOMENDACIÓN</td>

		</tr>


		<tr>

			<td colspan="2">
				

				Una vez analizado el proyecto por la <?=$descripcionFisicamenteEstructura?>, se emite la viabilidad del mismo.

			</td>

		</tr>

		<tr>

			<td style="font-weight: bold;" align="center">

				Analista técnico:

			</td>

			<td>

				<?=$nombre?>&nbsp;<?=$apellido?>

			</td>

		</tr>


		<tr>

			<td style="padding: 2em!important; font-weight: bold;" align="center">

				Firma

			</td>


			<td style="padding: 2em!important;">


			</td>

		</tr>

	</tbody>

</table>

</div>