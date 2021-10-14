<?php  $plantilla= new plantilla(); ?>

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

      <input type="hidden" id="buscadorElementosNavar" name="buscadorElementosNavar" value="si" />

      <input type="hidden" id="codigoProyecto" name="codigoProyecto" value="<?=$codigo?>">

<!--       <div class="row">

        <div class="col-sm-12 col-xs-12 text-center avance__proyecto__lineas d-flex align-items-center justify-content-center">

          <span class="letra__avance">MI AVANCE</span>&nbsp;&nbsp;&nbsp;<progress id="progresoProyecto" max="100" style="height:50px;" value="<?=$sumadorAcumulador?>"></progress><span class="avance__proyecto">&nbsp;&nbsp;<?=$sumadorAcumulador?>&nbsp;%</span>
      
          <input type="hidden" id="codigoProyecto" name="codigoProyecto" value="<?= $codigo?>" />

        </div>

      </div> -->

      <center>

      <form class="col-sm-12 col-xs-12" action="modelosBd/documentoProyecto/proyecto.md.php" method="post">

          <br>
          <br>

          <input type="hidden" id="codigoProyectoPdf" name="codigoProyectoPdf" value="<?=$codigo?>"/>

          <input type="hidden" name="cedulaRuc" id="cedulaRuc" value="<?= $arrayUsuario[3];?>">

          <button id="generarVisualizarPdf" name="generarVisualizarPdf" class="btn btn-success"><span class="letras__precionar"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;GENERAR INFORMACIÓN</span></button>
          <span class="enviarDatosGenerales__reload"></span>


      </form>

      <br>

<!--       <table>

        <input type="hidden" name="cedulaRuc" id="cedulaRuc" value="<?= $arrayUsuario[3];?>">

        <tr>

            <td><center><a href="documentos/proyectos/<?=$documentosAnexosArray[8]?>.pdf" target="_blank">Proyecto Técnico</a></center></td>

            <td style="vertical-align:middle!important; font-size:18px; color:black; font-weight:bold; display: flex; justify-content: center;" colspan="2">

              <input type="file" id="documentoProyecto" name="documentoProyecto" atributos="tecnicos">

              <div class="documentoAnexos__reloads"></div>


            </td>

        </tr>         

      </table> -->

      <div class="col-xs-12 text-left linea__separacion__datos__dos"></div> 
      <!--====  End of Barra de progreso  ====-->


    <?php $plantilla->componentesProyectoEdicion($arrayResquest[1]);?>

  </div>

</div>

<!--====  End of Contenido  ====-->


