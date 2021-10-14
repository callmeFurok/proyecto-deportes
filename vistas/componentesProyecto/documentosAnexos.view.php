<!--=================================================
=            Declaración de la plantilla            =
==================================================-->
<?php $usuariosConsultados= new usuariosConsultados();?>
<?php $objeto= new usuario();?>
<!--====  End of Declaración de la plantilla  ====-->

<!--==========================================
=            Asignación variables            =
===========================================-->

<?php $arrayUsuario=$usuariosConsultados->plantillaUsuariosModelos();?>

<?php $codigo=$usuariosConsultados->selectorDeCodigos();?>

<?php $infrasCodigos=$usuariosConsultados->codigoIngresadosInfras($codigo);?>

<!--====  End of Asignación variables  ====-->

<!--==================================================
=            Edición de Documentos Anexos           =
===================================================-->

<?php $documentosAnexos=$objeto->ctrDocumentosAnexos($codigo);?>

<?php $documentosAnexosArray = explode("___", $documentosAnexos);?>

<?php $usuariosVectores=$objeto->usuarioCtr();?>

<?php $arrayUsuariosVectores = explode("___", $usuariosVectores);?>

<?php $tipoDos=$arrayUsuariosVectores[14];?>

<?php $instancia=$objeto->ctrInstancia($codigo);?>

<?php $array = explode("____", $instancia);?>

<?php 

  $bandera=false;

  for ($i=0; $i < count($array); $i++) { 
   
    if ($array[$i]=="infra") {

      $bandera=true;

      break;

    }

  }

?>


<!--====  End of Edición de Documentos Anexos  ====-->

<input type="hidden" name="valorTIpoDos" id="valorTIpoDos" value="<?= $tipoDos?>">
<!--=======================================
=            Sección Principal            =
========================================-->

<div class="panel-body" style="border-bottom:0px solid black!important;">

  <!--=========================================================
  =            Contenedores de datos ya ingresados            =
  ==========================================================-->
  
  <div class="container-fluid container__fluido__escritorios contenedor__ingresados">

  <table>

    <thead>

      <tr>

        <td style="font-weight:bold;font-size:14px; vertical-align:middle; color:black;">
          En caso de querer cambiar los documentos seleccionar en la opción
        </td>

        <td>

          <center>

            <input type="checkbox" id="mostrarNuevas" name="mostrarNuevas" class="check__estilos__lineas"/>

          </center>

        </td>

      </tr>

      <tr>
        <th colspan="2" class="padding__envios">DOCUMENTOS ANEXOS INGRESADOS</th>
      </tr>

      <tr>

        <th>

          DETALLE

        </th>


        <th>

          DOCUMENTO

        </th>

      </tr>

    </thead>

    <tbody>


      <?php if (!empty($documentosAnexosArray[2])): ?>
        
        <tr>

          <td style="width:70%;">
              
            PROYECTO

          </td>

          <td>

            <a href="documentos/proyectos/<?=$documentosAnexosArray[2];?>.pdf" target="_blank" style="color:black;"><?=$documentosAnexosArray[8];?></a>

          </td>

        </tr>

      <?php endif ?>

      <?php if (!empty($documentosAnexosArray[1])): ?>
        
        <tr>

          <td style="width:70%;">
              
            CURRICULUM DEPORTIVO

          </td>

          <td>

            <a href="documentos/curriculum/<?=$documentosAnexosArray[1];?>.pdf" target="_blank" style="color:black;"><?=$documentosAnexosArray[1];?></a>

          </td>

        </tr>

      <?php endif ?>

      <?php if (!empty($documentosAnexosArray[3])): ?>
        
        <tr>

          <td style="width:70%;">
              
            Acreditar al menos un año de vida jurídica

          </td>

          <td>

            <a href="documentos/vidaJuridica/<?=$documentosAnexosArray[3];?>.pdf" target="_blank" style="color:black;"><?=$documentosAnexosArray[3];?></a>

          </td>

        </tr>

      <?php endif ?>


      <?php if (!empty($documentosAnexosArray[4])): ?>
        
        <tr>

          <td style="width:70%;">
              
            Certificación de trayectoria

          </td>

          <td>

            <a href="documentos/certificacionDeTrayectoria/<?=$documentosAnexosArray[4];?>.pdf" target="_blank" style="color:black;"><?=$documentosAnexosArray[4];?></a>

          </td>

        </tr>

      <?php endif ?>

      <?php if (!empty($documentosAnexosArray[5])): ?>
        
        <tr>

          <td style="width:70%;">
              
            Certificado de propiedades

          </td>

          <td>

            <a href="documentos/certificadoPropiedad/<?=$documentosAnexosArray[5];?>.pdf" target="_blank" style="color:black;"><?=$documentosAnexosArray[5];?></a>

          </td>

        </tr>

      <?php endif ?>

      <?php if (!empty($documentosAnexosArray[6])): ?>
        
        <tr>

          <td style="width:70%;">
              
            Memoria Técnica Arquitectonica

          </td>

          <td>

            <a href="documentos/memoriaTecnicaArquitectonica/<?=$documentosAnexosArray[6];?>.pdf" target="_blank" style="color:black;"><?=$documentosAnexosArray[6];?></a>

          </td>

        </tr>

      <?php endif ?>


      <?php if (!empty($documentosAnexosArray[7])): ?>
        
        <tr>

          <td style="width:70%;">
              
            Planos arquitectonicos

          </td>

          <td>

            <a href="documentos/planosArquitecntonicos/<?=$documentosAnexosArray[7];?>.pdf" target="_blank" style="color:black;"><?=$documentosAnexosArray[7];?></a>

          </td>

        </tr>

      <?php endif ?>

      <?php if (!empty($documentosAnexosArray[8])): ?>
        
        <tr>

          <td style="width:70%;">
              
            Rubro

          </td>

          <td>

            <a href="documentos/presupuestoRubro/<?=$documentosAnexosArray[8];?>.pdf" target="_blank" style="color:black;"><?=$documentosAnexosArray[8];?></a>

          </td>

        </tr>

      <?php endif ?>

      <?php if (!empty($documentosAnexosArray[9])): ?>
        
        <tr>

          <td style="width:70%;">
              
            Cronograma Valorado

          </td>

          <td>

            <a href="documentos/cronogramaValorado/<?=$documentosAnexosArray[9];?>.pdf" target="_blank" style="color:black;"><?=$documentosAnexosArray[9];?></a>

          </td>

        </tr>

      <?php endif ?>

      <?php if (!empty($documentosAnexosArray[10])): ?>
        
        <tr>

          <td style="width:70%;">
              
            Respaldos Digitales

          </td>

          <td>

            <a href="documentos/respaldosNuevosDigitales/<?=$documentosAnexosArray[10];?>.pdf" target="_blank" style="color:black;"><?=$documentosAnexosArray[10];?></a>

          </td>

        </tr>

      <?php endif ?>



    </tbody>

  </table>

  </div>
  
  <!--====  End of Contenedores de datos ya ingresados  ====-->
  
<?php if (!empty($documentosAnexosArray[0])): ?>
  
  <input type="hidden" name="documentosRevisados" id="documentosRevisados" value="si" />

<?php else: ?>

  <input type="hidden" name="documentosRevisados" id="documentosRevisados" value="no" />
  
<?php endif ?>

  <div class="container-fluid container__fluido__escritorios container__escritorios">

    <div class="row">

      <div class="col col-12 text-center font-weight-titulo">

        INGRESAR DOCUMENTACIÓN ANEXA
      </div>

    </div>

    <br>

    <div class="contenedor__centrados">

      <?php if ($tipoDos=="Deportista Federado" || $tipoDos=="Deportista No Federado"): ?>

        <div class="row justificante__fila fila__centradas__dinamicamentes">

          <div class="col col-md-2 col-12">

            Currículo deportivo justificado documentadamente

          </div>

          <div class="col col-md-10 col-12">

            <input type="file" class="obligatorios__proyecto campos__proyectos" name="curriculumDeportivoSegundo" id="curriculumDeportivoSegundo">

          </div>

          <br>

          <div class="col col-md-2 col-12">

            Certificación de trayectoria

          </div>

          <div class="col col-md-10 col-12">

            <input type="file" class="obligatorios__proyecto campos__proyectos" name="certificacionTrayectoria" id="certificacionTrayectoria">

          </div>

        </div>
        
      <?php endif ?>

      <?php if ($tipoDos=="Personas Naturales No Deportistas"): ?>

        <div class="row justificante__fila fila__centradas__dinamicamentes">

          <div class="col col-md-2 col-12">

             Currículo de experiencia afín comprobable

          </div>

          <div class="col col-md-10 col-12">

            <input type="file" class="obligatorios__proyecto campos__proyectos" name="curriculumDeportivoSegundo" id="curriculumDeportivoSegundo"/>

          </div>

        </div>
        
      <?php endif ?>

      <?php if ($tipoDos=="Empresas u Organizaciones No Deportivas"): ?>


        <div class="row acredita__fila fila__centradas__dinamicamentes">

          <div class="col col-md-2 col-12">

            Acreditar al menos un año de vida jurídica

          </div>

          <div class="col col-md-10 col-12">

            <input type="file" class="obligatorios__proyecto campos__proyectos" name="acreditarVidaJuridica" id="acreditarVidaJuridica">

          </div>

        </div>

        <br>


        <div class="row acredita__fila fila__centradas__dinamicamentes">

          <div class="col col-md-2 col-12">

              Currículo de experiencia afín comprobable

          </div>

          <div class="col col-md-10 col-12">

            <input type="file" class="obligatorios__proyecto campos__proyectos" name="curriculumDeportivoSegundo" id="curriculumDeportivoSegundo">

          </div>

        </div>

      <?php endif ?>


      <?php if ($tipoDos=="Organizaciones Deportivas"): ?>

        <div class="row fila__centradas__dinamicamentes">

          <div class="row col-md-12 col-12 text-center">

            NO DEBE COMPLETAR INFORMACIÓN EN ESTA SECCIÓN

          </div>

        </div>
        
      <?php endif ?>

    </div>

    <br>

    <?php if($bandera==true): ?>
      
      <div class="row">

        <div class="col col-md-12 col-12 text-center font-weight-titulo">

          INGRESAR DOCUMENTACIÓN ANEXA  RELACIONADA A INFRAESTRUCTURA

        </div>

      </div>

      <br>

      <div class="row fila__centradas__dinamicamentes">

        <div class="col col-md-2 col-12">

          Certificado de propiedad o carta de autorización del propietario del inmueble en el cual se implantará la obra

        </div>

        <div class="col col-md-10 col-12">

          <input type="file" class="obligatorios__proyecto campos__proyectos" name="certificadoPropiedad" id="certificadoPropiedad">

        </div>

      </div>

      <br>

      <div class="row fila__centradas__dinamicamentes">

        <div class="col col-md-2 col-12">

          Memoria técnica arquitectónica

        </div>

        <div class="col col-md-10 col-12">

          <input type="file" class="obligatorios__proyecto campos__proyectos" name="memoriaTecnicaArquitectonica" id="memoriaTecnicaArquitectonica">

        </div>

      </div>

      <br>

      <div class="row fila__centradas__dinamicamentes">

        <div class="col col-md-2 col-12">

          Planos arquitectónicos o el que corresponda según el objeto del programa y/o proyecto, con la firma de responsabilidad del/la profesional responsable del diseño

        </div>

        <div class="col col-md-10 col-12">

          <input type="file" class="obligatorios__proyecto campos__proyectos" name="planosArquitecntonicos" id="planosArquitecntonicos">

        </div>

      </div>

      <br>

      <div class="row fila__centradas__dinamicamentes">

        <div class="col col-md-2 col-12">

          Presupuesto que contenga el detalle por rubro, suscrito por el/la profesional de la rama

        </div>

        <div class="col col-md-10 col-12">

          <input type="file" class="obligatorios__proyecto campos__proyectos" name="presupuestoRubro" id="presupuestoRubro">

        </div>

      </div>

      <br>

      <div class="row fila__centradas__dinamicamentes">

        <div class="col col-md-2 col-12">

          Cronograma valorado de la obra, suscrito por el/la profesional de la rama

        </div>

        <div class="col col-md-10 col-12">

          <input type="file" class="obligatorios__proyecto campos__proyectos" name="cronogramaValorado" id="cronogramaValorado">

        </div>

      </div>

      <br>

      <div class="row fila__centradas__dinamicamentes">

        <div class="col col-md-2 col-12">

          Respaldos digitales del proyecto

        </div>

        <div class="col col-md-10 col-12">

          <input type="file" class="obligatorios__proyecto campos__proyectos" name="respaldosNuevosDigitales" id="respaldosNuevosDigitales">

        </div>

      </div>


    <?php endif ?>

    <br>

    <!--=====================================
    =            Botón de enviar            =
    ======================================-->
    
    <div class="row">

      <div class="col-12 col-md-12 text-center">

        <button id="enviarDocumentosAnexos" name="enviarDocumentosAnexos" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;ENVIAR</button>

        <div class="enviarDatosGenerales__reload"></div>

      </div>

    </div>
    
    <!--====  End of Botón de enviar  ====-->

    
    <!--====  End of Sección Organismo Deportivo  ====-->
    

  </div>

</div>

<!--====  End of Sección Principal  ====-->
