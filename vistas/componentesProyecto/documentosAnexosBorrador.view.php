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
=            Edición de Documentos Anexos            =
===================================================-->

<?php $documentosAnexos=$objeto->ctrDocumentosAnexos($codigo);?>

<?php $documentosAnexosArray = explode("___", $documentosAnexos);?>

<!--====  End of Edición de Documentos Anexos  ====-->


<!--=======================================
=            Sección Principal            =
========================================-->

<div class="main-header">

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


      <?php if (!empty($documentosAnexosArray[8])): ?>
        
        <tr>

          <td style="width:70%;">
              
            PROYECTO

          </td>

          <td>

            <a href="documentos/proyectos/<?=$documentosAnexosArray[8];?>.pdf" target="_blank" style="color:black;"><?=$documentosAnexosArray[8];?></a>

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


      <?php if (!empty($documentosAnexosArray[2])): ?>
        
        <tr>

          <td style="width:70%;">
              
            CERTIFICADO DE LA FEDERACIÓN

          </td>

          <td>

            <a href="documentos/certificadoDeportista/<?=$documentosAnexosArray[2];?>.pdf" target="_blank" style="color:black;"><?=$documentosAnexosArray[2];?></a>

          </td>

        </tr>

      <?php endif ?>

      <?php if (!empty($documentosAnexosArray[3])): ?>
        
        <tr>

          <td style="width:70%;">
              
            CERTIFICADO ORGANISMO SUPERIOR

          </td>

          <td>

            <a href="documentos/certificadoSuperior/<?=$documentosAnexosArray[3];?>.pdf" target="_blank" style="color:black;"><?=$documentosAnexosArray[3];?></a>

          </td>

        </tr>

      <?php endif ?>



      <?php if (!empty($documentosAnexosArray[4])): ?>
        
        <tr>

          <td style="width:70%;">
              
            SOLICITUD FEDERACIÓN

          </td>

          <td>

            <a href="documentos/solicitudCertificado/<?=$documentosAnexosArray[4];?>.pdf" target="_blank" style="color:black;"><?=$documentosAnexosArray[4];?></a>

          </td>

        </tr>

      <?php endif ?>

      <?php if (!empty($documentosAnexosArray[5])): ?>
        
        <tr>

          <td style="width:70%;">
              
            AVAL FEDERACIÓN

          </td>

          <td>

            <a href="documentos/avalFederacion/<?=$documentosAnexosArray[5];?>.pdf" target="_blank" style="color:black;"><?=$documentosAnexosArray[5];?></a>

          </td>

        </tr>

      <?php endif ?>

      <?php if (!empty($documentosAnexosArray[6])): ?>
        
        <tr>

          <td style="width:70%;">
              
            SOLICITUD AVAL

          </td>

          <td>

            <a href="documentos/solicitudAval/<?=$documentosAnexosArray[6];?>.pdf" target="_blank" style="color:black;"><?=$documentosAnexosArray[6];?></a>

          </td>

        </tr>

      <?php endif ?>


      <?php if (!empty($documentosAnexosArray[7])): ?>
        
        <tr>

          <td style="width:70%;">
              
            AVAL ORGANISMO SUPERIOR

          </td>

          <td>

            <a href="documentos/avalOrganismoSuperior/<?=$documentosAnexosArray[7];?>.pdf" target="_blank" style="color:black;"><?=$documentosAnexosArray[7];?></a>

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

      <!--=================================================
      =            Infraestructura componentes            =
      ==================================================-->
      
      <?php if (empty($infrasCodigos) || $infrasCodigos==null): ?>
        
        <div class="col-4 enfacis__celdas">

          Cargar componentes

        </div>

        <div class="col-8 text-center">

          <input type="file" class="obligatorios__proyecto campos__proyectos" style="position:relative; left:5%;" name="anexosComponentesTecnicos" id="anexosComponentesTecnicos" />

        </div>

      <?php else: ?>
        
        <div class="col-4 enfacis__celdas">

          Cargar componentes Infraestructura

        </div>

        <div class="col-8 text-center">

          <input type="file" class="obligatorios__proyecto campos__proyectos" style="position:relative; left:5%;" name="anexosInfraestructuras" id="anexosInfraestructuras" />

        </div>

      <?php endif ?>
      
      <!--====  End of Infraestructura componentes  ====-->

    </div>

    <br>

    <!--=====================================
    =            Sección usuario            =
    ======================================-->
     
    <?php if ($arrayUsuario[0]==3): ?>

    <div class="row">  

      <div class="col-4 enfacis__celdas">

        ¿Posee certificado de la federación o liga profesional?

      </div>

      <div class="col-4 enfacis__celdas d-flex justify-content-center">

        Si&nbsp;&nbsp;<input type="radio" name="certificadoFederaciones" class="estilos__radios carga__certificadoFederacion" value="si">

      </div>

      <div class="col-4 enfacis__celdas d-flex justify-content-center">

        No&nbsp;&nbsp;<input type="radio" name="certificadoFederaciones" class="estilos__radios carga__certificadoFederacion" value="no">

      </div>

    </div>

    <br>


    <!--=============================================
    =            Sección del Certificado            =
    ==============================================-->
    
    <div class="row aceptacion__certificado certificados__ocultados">  

      <div class="col-4 enfacis__celdas">

        Cargar certificado de la federación o liga profesional

      </div>

      <div class="col-8 text-center">

        <input type="file" class="obligatorios__proyecto campos__proyectos" name="certificadoFederacion" id="certificadoFederacion">

      </div>

    </div>

    <br>

    <div class="row rechazo__certificado">  

      <div class="col-4 enfacis__celdas">

        ¿Por qué no tiene certificado?

      </div>

      <div class="col-4 enfacis__celdas d-flex justify-content-center">

        Porque federación o liga profesional nego la solicitud&nbsp;&nbsp;<input type="radio" name="rechazoPorque" class="estilos__radios porque__no__tiene" value="si"/>

      </div>

      <div class="col-4 enfacis__celdas d-flex justify-content-center">

        Porque federación o liga profesional no responde aún&nbsp;&nbsp;<input type="radio" name="rechazoPorque" value="no" class="estilos__radios porque__no__tiene">

      </div>

    </div>

    <br>

    <div class="row aceptacion__certificado respuesta__organismo__si">  

      <div class="col-4 enfacis__celdas">

        Cargar respuesta del organismo superior (Comité Olímpico Ecuatoriano, o Comité Paralímpico Ecuatoriano, o Federación Deportiva Nacional del Ecuador), de ser el caso

      </div>

      <div class="col-8 text-center">

        <input type="file" class="obligatorios__proyecto campos__proyectos" name="certificadoOrganismoSuperior" id="certificadoOrganismoSuperior">

      </div>

    </div>

    <br>

    <div class="row aceptacion__certificado respuesta__organismo__no">  

      <div class="col-4 enfacis__celdas">

        Cargar la solicitud de certificación realizada a la federación

      </div>

      <div class="col-8 text-center">

        <input type="file" class="obligatorios__proyecto campos__proyectos" name="solicitudFederacion" id="solicitudFederacion">

      </div>

    </div>    
    
    <!--====  End of Sección del Certificado  ====-->
    
    <?php endif ?>

    <!--====  End of Sección usuario  ====-->

    <!--=================================================
    =            Sección Organismo Deportivo            =
    ==================================================-->
    
    <?php if ($arrayUsuario[0]==2 || $arrayUsuario[0]==3): ?>

    <!--======================================
    =            Sección del Aval            =
    =======================================-->
    
    <div class="row">  

      <div class="col-4 enfacis__celdas">

        ¿Posee Aval de la federación o liga profesional?

      </div>

      <div class="col-4 enfacis__celdas d-flex justify-content-center">

        Si&nbsp;&nbsp;<input type="radio" name="avales" class="estilos__radios carga__avales" value="si">

      </div>

      <div class="col-4 enfacis__celdas d-flex justify-content-center">

        No&nbsp;&nbsp;<input type="radio" name="avales" value="no" class="estilos__radios carga__avales">

      </div>

    </div>

    <br>

    <div class="row aceptacion__certificado aval__ocultados__si">  

      <div class="col-4 enfacis__celdas">

        Cargar Aval de la federación o liga profesional

      </div>

      <div class="col-8 text-center">

        <input type="file" class="obligatorios__proyecto campos__proyectos" name="avalFederacion" id="avalFederacion">

      </div>

    </div>

    <br>

    <div class="row aval__ocultados__no">  

      <div class="col-4 enfacis__celdas">

        ¿Por qué no tiene Aval?

      </div>

      <div class="col-4 enfacis__celdas d-flex justify-content-center">

        Porque federación o liga profesional nego el aval&nbsp;&nbsp;<input type="radio" name="rechazoPorqueAval" class="estilos__radios porque__no__tiene__aval" value="si">

      </div>

      <div class="col-4 enfacis__celdas d-flex justify-content-center">

        Porque federación o liga profesional no responde aún&nbsp;&nbsp;<input type="radio" name="rechazoPorqueAval" value="no" class="estilos__radios porque__no__tiene__aval">

      </div>

    </div>

    <br>

    <div class="row aceptacion__certificado respuesta__aval__organismo__si">  

      <div class="col-4 enfacis__celdas">

        Cargar respuesta del organismo superior (Comité Olímpico Ecuatoriano, o Comité Paralímpico Ecuatoriano, o Federación Deportiva Nacional del Ecuador), de ser el caso

      </div>

      <div class="col-8 text-center">

        <input type="file" class="obligatorios__proyecto campos__proyectos" name="solciitudAval" id="solciitudAval">

      </div>

    </div>

    <br>

    <div class="row aceptacion__certificado respuesta__aval__organismo__no">  

      <div class="col-4 enfacis__celdas">

        Cargar la solicitud de certificación realizada a la federación

      </div>

      <div class="col-8 text-center">

        <input type="file" class="obligatorios__proyecto campos__proyectos" name="avalOrganismoSuperior" id="avalOrganismoSuperior">

      </div>

    </div>    


    <!--====  End of Sección del Aval  ====-->
    
    <!--=====================================
    =            Botón de enviar            =
    ======================================-->
    
    <div class="row">

      <div class="col-12 text-center">

        <button id="enviarDocumentosAnexos" name="enviarDocumentosAnexos" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;ENVIAR</button>

        <div class="enviarDatosGenerales__reload"></div>

      </div>

    </div>
    
    <!--====  End of Botón de enviar  ====-->


    <?php endif ?>
    
    <!--====  End of Sección Organismo Deportivo  ====-->
    

  </div>

</div>

<!--====  End of Sección Principal  ====-->
