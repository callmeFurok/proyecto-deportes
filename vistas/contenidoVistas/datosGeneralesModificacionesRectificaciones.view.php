<?php  $plantilla= new plantilla(); ?>

<?php  $objeto= new usuario(); ?>

<!--=========================================
=            Variables necesrias            =
==========================================-->

<?php $variableRequestMenu= $_SERVER['REQUEST_URI'];?>

<?php $arrayResquest= explode("?contenido=", $variableRequestMenu);?>


<?php $arrayResquestSegundos= explode("&variable=", $variableRequestMenu);?>

<!--====  End of Variables necesrias  ====-->

<!--===========================
=            Aside            =
============================-->

<?php $plantilla->componentesDasboard(1);?>

<!--====  End of Aside  ====-->

<!--==========================================
=            Sección de ejecución            =
===========================================-->
<?php $usuario=$objeto->usuarioCtr();?>

<?php $arrayUsuario = explode("___", $usuario);?>

<?php $codigo=$objeto->ctrCodigosEdiciones();?>

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

  $componentes=$objeto->ctrComponentesTraidos($codigo);

  if (!empty($componentes)) {
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

<!--==========================================
=            Instancia Construida            =
===========================================-->

<?php $instancia=$objeto->ctrInstanciaTraidasComparadores($codigo);?>

<?php $arrayInstancias = explode("____", $instancia);?>


<!--====  End of Instancia Construida  ====-->

<!--==================================================
=            Edición de Documentos Anexos            =
===================================================-->

<?php $documentosAnexos=$objeto->ctrDocumentosAnexos($codigo);?>

<?php $documentosAnexosArray = explode("___", $documentosAnexos);?>

<!--====  End of Edición de Documentos Anexos  ====-->

<!--===============================
=            Contenido            =
================================-->

<div class="main-header">

  <div class="container-fluid">

      <!--=======================================
      =            Barra de progreso            =
      ========================================-->

      <input type="hidden" id="codigosRealizadosEnvios" name="codigosRealizadosEnvios" value="<?=$codigo?>">

      <input type="hidden" id="buscadorElementosNavar" name="buscadorElementosNavar" value="si" />

      <div class="row">

        <div class="col col-12 text-justify top-margenes">


          <?php if ($arrayResquestSegundos[1]=="si"): ?>
            
              Se podrán modificar programas y/o proyectos deportivos calificados por un monto inferior o superior al inicialmente previsto, justificando de manera motivada las modificaciones planteadas, dicha modificación  no puede afectar el objeto y metas del programa y/o proyecto deportivo, por lo que deberá evidenciarse que el mismo puede cumplirse a pesar de no haber obtenido el patrocinio o la publicidad planificados; mientras que, en el segundo caso deberá evidenciarse que el incremento de componentes y/o valores son necesarios para el cumplimiento de los objetivos y metas, luego del ingreso pasará por el análsis técnico y calificación del Comité, no podrá solicitar modificación del programa y/o proyecto por un monto superior si ya se ha ejecutado el gasto.

          <?php else: ?>

              Se podrán modificar los valores asignados a cada componente así como también podrá realizar modificaciones relacionadas a la programación a las fechas en las cuales se planificó la ejecución de una actividad o componente,  sin que medie una nueva aprobación por parte del Comité,  siempre que se mantenga el valor total establecido en los programas y/o proyectos deportivos ya calificados., el solicitante debe registrar la justificación correspondiente, no podrán incluirse o eliminarse componentes, dicha modificación no deberá afectar el objeto y metas del programa y/o proyecto deportivo.  En caso de detectarse incumplimiento a la normativa legal vigente, se entenderá como no presentada la modificatoria. En tal caso el Ministerio del Deporte se reserva el derecho de eliminar la calificación inicialmente emitida o adoptar acciones legales según corresponda.

          <?php endif ?>

        </div>


      </div>


      <div class="col-xs-12 text-left linea__separacion__datos__dos"></div> 
      <!--====  End of Barra de progreso s ====-->

      <?php if ($arrayResquestSegundos[1]=="si"): ?>
        
      <div class="row d-flex justify-content-center top-margenes">

        <div class="d-flex flex-column col col-12 col-md-6 d-flex justify-content-center align-items-center">

          <button id="mostrarInfomacionDisenadaCuatro" class="clases__informacion__diseanadas ocultos">
            
           <i class="fas fa-address-card"></i>

          </button>

          <div class="letrasIconosMenus">Monto del proyecto</div>

        </div>

      </div>

      <div class="ocultos__proyectos__4">

        <?php require_once "vistas/componentesProyectoEdicion/proyectoModificaciones.view.php"?>

      </div>

      <?php endif ?>

      <div class="row d-flex justify-content-center top-margenes">

        <div class="d-flex flex-column col col-12 col-md-6 d-flex justify-content-center align-items-center">

          <button id="mostrarInfomacionDisenadaCinco" class="clases__informacion__diseanadas ocultos">
            
            <i class="fal fa-analytics"></i>

          </button>

          <div class="letrasIconosMenus">Componentes</div>

        </div>

      </div>

      <div class="ocultos__proyectos__5">

         <?php $plantilla->componentesProyectoEdicion($arrayResquest[1]);?>

      </div>

      <div class="row top-margenes">

          <?php if ($arrayResquestSegundos[1]=="si"): ?>

            <div class="col col-12 d d-flex justify-content-center top-margenes">

               <input type="checkbox" id="aceptoEnvioModificaciones">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Declaro bajo mi responsabilidad, que las modificaciones realizadas no afectan el objeto o metas del programa y/o proyecto deportivo</span>

            </div>

            <div class="col col-12 top-margenes">

              <textarea id="jstificaModifica" name="jstificaModifica" class="selector__inicial" placeholder="Realizar justificación de la modificación"></textarea>

            </div>

            <div class="col col-12 text-center">

              <button class="btn btn-primary" id="enviadosComites">ENVIAR</button>

            </div>
            
          <?php else: ?>
            
          <?php endif ?>

    </div>

  </div>

</div>

<!--====  End of Contenido  ====-->


