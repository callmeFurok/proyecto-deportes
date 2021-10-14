<?php  $plantilla= new plantilla(); ?>

<?php  $usuariosCódigo= new usuariosConsultados(); ?>

<?php  $objeto= new usuario(); ?>

<!--=========================================
=            Variables necesrias            =
==========================================-->

<?php $variableRequestMenu= $_SERVER['REQUEST_URI'];?>

<?php $arrayResquest= explode("?contenido=", $variableRequestMenu);?>

<!--====  End of Variables necesrias  ====-->

<!--===========================
=            Aside            =
============================-->

<?php $plantilla->componentesDasboard(1);?>

<!--====  End of Aside  ====-->

<!--============================
=            Código            =
=============================-->

<?php $codigo=$usuariosCódigo->selectorDeCodigos();?>


<?php $instancia=$objeto->ctrInstanciaTraidasComparadores($codigo);?>

<?php $arrayInstancias = explode("____", $instancia);?>

<!--====  End of Código  ====-->

<!--==========================================
=            Sección de ejecución            =
===========================================-->

<?php

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


	/*============================================
	=            Infras Seleccionados            =
	============================================*/

	$infrasTrusSelects=$objeto->ctrInfrasSeleccionados($codigo);

	/*=====  End of Infras Seleccionados  ======*/




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

	if ($consulta1=="si") {

		$dataCronogramas=array();
		$dataCronogramasAgrupadosSolitarios=array();

		$queryCronogramas="SELECT elementosResultantes FROM pro_cronograma WHERE codigo='$codigo';";
		$resultadoCronogramas = $conexionEstablecida->query($queryCronogramas);

		while($registroCronogramas = $resultadoCronogramas->fetch()) {

			$elementosResultantes=$registroCronogramas['elementosResultantes'];
			array_push($dataCronogramas, $elementosResultantes);
		}

	}

	$componentes=$objeto->ctrComponentesTraidos($codigo);

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

?>

<!--====  End of Sección de ejecución  ====-->


<!--===============================
=            Contenido            =
================================-->

<div class="main-header" style="border-bottom:0px solid black!important;">

  <div class="container-fluid">

      <!--=======================================
      =            Barra de progreso            =
      ========================================-->

      <input type="hidden" id="buscadorElementosNavar" name="buscadorElementosNavar" value="si" />

      <div class="row">

      	<div class="col-sm-12 col-xs-12 text-center avance__proyecto__lineas d-flex align-items-center justify-content-center">

      		<span class="letra__avance">MI AVANCE</span>&nbsp;&nbsp;&nbsp;<progress id="progresoProyecto" max="100" style="height:50px;" value="<?=$sumadorAcumulador?>"></progress><span class="avance__proyecto">&nbsp;&nbsp;<?=$sumadorAcumulador?>&nbsp;%</span>
      
      		<input type="hidden" id="codigoProyecto" name="codigoProyecto" value="<?= $codigo?>" />

      	</div>

      </div>

      <div class="col-xs-12 text-left linea__separacion__datos__dos"></div> 
      <!--====  End of Barra de progreso  =f===-->


    <?php $plantilla->componentesProyecto($arrayResquest[1]);?>

    <br>

    <div class="row">

    	<div class="col col-6 text-center">

    		<!--=========================================
    		=            Estableciendo atras            =
    		==========================================-->
    		
    		
      		<?php if ($arrayResquest[1]==14): ?>
    			
	    		<a href="datosGeneralesPrincipal">
	    			<i class="fas fa-arrow-circle-left flechas__siguientes"></i>
	    		</a>

    		<?php endif ?>

      		<?php if ($arrayResquest[1]==2): ?>
    			
	    		<a href="datosGenerales?contenido=14">
	    			<i class="fas fa-arrow-circle-left flechas__siguientes"></i>
	    		</a>

    		<?php endif ?>


    		<?php if ($arrayResquest[1]==4): ?>
    			
	    		<a href="datosGenerales?contenido=2">
	    			<i class="fas fa-arrow-circle-left flechas__siguientes"></i>
	    		</a>

    		<?php endif ?>


    		<?php if ($arrayResquest[1]==7): ?>
    			
	    		<a href="datosGenerales?contenido=4">
	    			<i class="fas fa-arrow-circle-left flechas__siguientes"></i>
	    		</a>

    		<?php endif ?>


    		<?php if ($arrayResquest[1]==13): ?>
    			
	    		<a href="datosGenerales?contenido=7">
	    			<i class="fas fa-arrow-circle-left flechas__siguientes"></i>
	    		</a>

    		<?php endif ?>


    		<?php if ($arrayResquest[1]==9): ?>
    			
	    		<a href="datosGenerales?contenido=13">
	    			<i class="fas fa-arrow-circle-left flechas__siguientes"></i>
	    		</a>

    		<?php endif ?>


    		<?php if ($arrayResquest[1]==10): ?>
    			
	    		<a href="datosGenerales?contenido=9">
	    			<i class="fas fa-arrow-circle-left flechas__siguientes"></i>
	    		</a>

    		<?php endif ?>


    		<?php if ($arrayResquest[1]==11): ?>
    			
	    		<a href="datosGenerales?contenido=10">
	    			<i class="fas fa-arrow-circle-left flechas__siguientes">
	    			</i>
	    		</a>

    		<?php endif ?>


    		<?php if ($arrayResquest[1]==12): ?>
    			
	    		<a href="datosGenerales?contenido=11">
	    			<i class="fas fa-arrow-circle-left flechas__siguientes"></i>
	    		</a>

    		<?php endif ?>
  		
    		
    		<!--====  End of Estableciendo atras  ====-->
    		
    	</div>


    	<div class="col col-6 text-center">

    		<!--======================================================
    		=            Estableciendo Flechas Siguientes            =
    		=======================================================-->
    		
    		<?php if ($arrayResquest[1]==14): ?>
    			
	    		<a href="datosGenerales?contenido=2">
	    			<i class="fas fa-arrow-circle-right flechas__siguientes"></i>
	    		</a>

    		<?php endif ?>

    		<?php if ($arrayResquest[1]==2): ?>
    			
	    		<a href="datosGenerales?contenido=4">
	    			<i class="fas fa-arrow-circle-right flechas__siguientes"></i>
	    		</a>

    		<?php endif ?>

    		<?php if ($arrayResquest[1]==4): ?>
    			
	    		<a href="datosGenerales?contenido=7">
	    			<i class="fas fa-arrow-circle-right flechas__siguientes"></i>
	    		</a>

    		<?php endif ?>


    		<?php if ($arrayResquest[1]==7): ?>
    			
	    		<a href="datosGenerales?contenido=13">
	    			<i class="fas fa-arrow-circle-right flechas__siguientes"></i>
	    		</a>

    		<?php endif ?>

    		<?php if ($arrayResquest[1]==13): ?>
    			
	    		<a href="datosGenerales?contenido=9">
	    			<i class="fas fa-arrow-circle-right flechas__siguientes"></i>
	    		</a>

    		<?php endif ?>

    		<?php if ($arrayResquest[1]==9): ?>
    			
	    		<a href="datosGenerales?contenido=10">
	    			<i class="fas fa-arrow-circle-right flechas__siguientes"></i>
	    		</a>

    		<?php endif ?>

    		<?php if ($arrayResquest[1]==10): ?>
    			
	    		<a href="datosGenerales?contenido=11">
	    			<i class="fas fa-arrow-circle-right flechas__siguientes"></i>
	    		</a>

    		<?php endif ?>


    		<?php if ($arrayResquest[1]==11): ?>
    			
	    		<a href="datosGenerales?contenido=12">
	    			<i class="fas fa-arrow-circle-right flechas__siguientes"></i>
	    		</a>

    		<?php endif ?>

    		<?php if ( $arrayResquest[1]==12): ?>
    			
    			<a href="proyectosUsuarios">
		          <i class="fas fa-arrow-circle-right flechas__siguientes"></i>
		        </a>

    		<?php endif ?>
    		
    		
    		<!--====  End of Estableciendo Flechas Siguientes  ====-->
    		
    	</div>

    </div>

  </div>

</div>

<!--====  End of Contenido  ====-->


