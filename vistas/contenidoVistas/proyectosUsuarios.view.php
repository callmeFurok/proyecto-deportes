
<!--====================================
=            Variables menú           =
=====================================-->

<?php $proyectos= new usuariosConsultados(); ?>

<?php $codigoRenderizados=$proyectos->selectorDeCodigos();?>

<?php $proyectoPostulado=$proyectos->codigoIngresadosInfras($codigoRenderizados);?>

<!--====  End of Variables menú  ====-->


<?php

  $objeto= new usuario();
  $usuario=$objeto->usuarioCtr();
  $arrayUsuario = explode("___", $usuario);

  if ($arrayUsuario[0]==2) {
    $nombreAcomodador= $arrayUsuario[3];
    $emailAcomadador= $arrayUsuario[10];
  }else{
    $nombreAcomodador= $arrayUsuario[4];
    $emailAcomadador= $arrayUsuario[12];
  }

  $plantilla= new plantilla(); 

?>

<!--===========================
=            Aside            =
============================-->

<?php $plantilla->componentesDasboard(1);?>

<!--====  End of Aside  ====-->


<!--=======================================
=            Sección Principal            =
========================================-->
<section class="content main-header">

  <div class="container-fluid">

    <table id="tablaProyectosUsuarios" name="tablaProyectosUsuarios" class="cell-border">

      <thead> 

        <tr> 

          <th class="tamanio__fuente__enfasis__tablas">INGRESÓ</th>
          <th class="tamanio__fuente__enfasis__tablas tamanio__dos__fuentes"><h1 style="color:white!important; text-decoration:none;">PROYECTOS ENVIADOS</h1></th>

        </tr>

      </thead> 

    </table>

    <br>

    <div class="row">

      <div class="col col-6 text-center">
        
        <?php if (empty($proyectoPostulado)): ?>
              
          <a href="proyectoCrear">
            <i class="fas fa-arrow-circle-left flechas__siguientes"></i>
          </a>

        <?php else: ?>
              
          <a href="datosGenerales?contenido=12">
            <i class="fas fa-arrow-circle-left flechas__siguientes"></i>
          </a>

        <?php endif ?>  

      </div>

      <div class="col col-6 text-center"></div>

    </div>

  </div>

</section>

<!--====  End of Sección Principal  ====-->

<!--===========================
=            Modal            =
============================-->

<!--=====================================
=            Modal Principal            =
======================================-->

<div class="modal fade" id="proyectoPrincipal">

  <div class="modal-dialog modal-xl">

    <div class="modal-content">

      <input type="hidden" id="codigoEnlace" name="codigoEnlace">

      <div class="modal-header" style="color:black!important; display:flex; align-items: center; justify-content: center;">

        <h5 class="modal-title" id="modalPrincipalProyectos"></h5>

        <button type="button" class="close close__funcionarios" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body body__preguntas">

        <input type="hidden" id="correoResponsblePrincipal" name="correoResponsblePrincipal" />

        <input type="hidden" id="proyectoNombrePrincipal" name="proyectoNombrePrincipal">

        <input type="hidden" id="nombreAcomodadorPrincipal" name="nombreAcomodadorPrincipal" value="<?=$nombreAcomodador;?>">
 
        <input type="hidden" id="emailAcomadadorPrincipal" name="emailAcomadadorPrincipal" value="<?=$emailAcomadador;?>">

        <input type="hidden" id="codigoProyectoRealizados" name="codigoProyectoRealizados">

        <input type="hidden" id="idUsuarioRelativo" name="idUsuarioRelativo">

        <input type="hidden" id="emailContratos" name="emailContratos">

        <input type="hidden" id="siRespuestas" name="siRespuestas">

        <input type="hidden" id="tipoDeportistas" name="tipoDeportistas">
 
        <table>

          <tr>

            <th style="wdith:60%;" colspan="2">

              <center>

              UBICACIÓN DEL PROYECTO

              </center>

            </th>

          </tr>

          <tr>

            <td>

              DIRECCIÓN ACTUAL

            </td>

            <td>

                <div class="direccionActualProyecto"></div>

            </td>

          </tr>

          <tr>

            <td>

              RESPONSABLE

            </td>

            <td>

                <div class="responsableProyecto"></div>

            </td>

         </tr>

         <tr>

            <td>

              CORREO DE CONTACTO

            </td>

            <td>

                <div class="contactoResponsableProyecto"></div>

                <button style="float:right;" class="btn btn-primary" data-toggle='modal' data-target='#contactarResponsable' id="contactarResponsableBoton"><i class="fas fa-phone-volume"></i>&nbsp;&nbsp;CONTACTAR</button>

            </td>


         </tr>

         <tr class="documentos__calificaciones">

          <td>

            Documento de calificación

          </td>

          <td colspan="1">

            <a id="calificacionPri" target="_blank">Calificación.pdf</a>

          </td>

         </tr>


         <tr class="fila__certificados__cargado">

          <td>Certificación</td>
          <td><a target="_blank" id="certificadosEnlaces" target="_blank">Certificación.pdf</td>

         </tr>

         <!--=====================================
         =            informe enviado            =
         ======================================-->
         
         
        <tr class="fila__informe__cumplimiento__visual">

          <td colspan="1">Informe Cumplimiento</td>
          <td colspan="1"><a href="documentos/informeFinal/informeFinal.pdf">Informe Cumplimiento</td>

         </tr>         

         
         <!--====  End of informe enviado  ====-->
         

         <!--=============================================
         =            Informe de cumplimiento           =
         ==============================================-->

        <tr class="fila__informe__cumplimiento">

          <th colspan="2">SEGUMIENTO</th>

         </tr>         

        <tr class="fila__informe__cumplimiento">

          <td>

            Generar informe final

          </td>

          <td>

            <form class="col-sm-7 col-xs-7" action="modelosBd/documentoProyecto/informeFinal.md.php" method="post">

                <input type="hidden" id="codigoProyectoPdf" name="codigoProyectoPdf"/>

                <input type="hidden" name="cedulaRucEnviadosDiscriminantes" id="cedulaRucEnviadosDiscriminantes">

                <button id="generarInformeFinal" name="generarInformeFinal" class="anadir__cosas"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;GENERAR PROYECTO</button>

             </form>            

          </td>

        </tr>

         <tr class="fila__informe__cumplimiento">

          <td colspan="1">
              
             Subir informe final (con firma electrónica)

          </td>

          <td colspan="1">
              
            <input type="file" id="informeFinal" name="informeFinal" />

          </td>

         </tr>   
         
         <tr class="fila__informe__cumplimiento">

          <td colspan="1">
              
             Subir evidencias (puede adjuntar evidencias fotográficas, certificaciones, memorias u otros documentos)

          </td>

          <td colspan="1">
              
            <button class="btn btn-primary" id="anadirEvidencias" name="anadirEvidencias"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Añadir</button>

          </td>

         </tr>   

         <tbody class="evidencias__suscritas fila__informe__cumplimiento"></tbody>

         <tr class="fila__informe__cumplimiento">


          <td>

            Observaciones

          </td>

          <td>

            <textarea id="observacionesSeguimientos" style="width: 100%;"></textarea>

          </td>


        </tr>


         <tr class="fila__informe__cumplimiento">

          <td colspan="2">

            <center>

              <button class="btn btn-primary" id="enviarSeguimientos" name="enviarSeguimientos">Enviar</button>

            </center>

          </td>

         </tr>



        <tr class="fila__informe__cumplimiento__enviados">

            <td colspan="1"><center>Evidencias enviadas</center></td>
            <td colspan="1"><center><input type="hidden" id="rectificasInformacionEvidencias" name="rectificasInformacionEvidencias" class="evidencias__lla"><button id="verEvidencias" class="btn btn-primary" data-toggle='modal' data-target='#comprobantesRealizadosEvidencias'><i class="fas fa-eye"></i>&nbsp;&nbsp;VER</button></center></td>

        </tr>

         <!--====  End of Informe de cumplimiento  ====-->
         

         <!--===============================================
         =            Sección de modificaciones            =
         ================================================-->

         <tr class="fila__contrato__modificaciones__ocultos">

          <th colspan="1">¿Desea incrementar o disminuir los montos previamente calificados?</th>
          <th colspan="1" class="d d-flex">
            Si&nbsp;&nbsp;<input type="radio" name="seleccionPrevios" class="seleccionPrevios" value="si">
            &nbsp;&nbsp;No&nbsp;&nbsp;<input type="radio" name="seleccionPrevios" class="seleccionPrevios" value="no">
          </th>

         </tr>   

         <tr class="fila__contrato__modificaciones__ocultos">

          <td colspan="2">
              
              <div class="seccion__modificables"></div>

          </td>

         </tr>      
         
          <tr class="informacion__modificables__ables">

            <td style="wdith:60%;">

             MODIFICAR INFORMACIÓN 

            </td>

            <td class="d d-flex align-items-center justify-content-center">

              <center>
                <a class='rectificarProyecto btn btn-success rectificacionProyectosBases' id="rectificarProyectoMod"><i class="fas fa-sync-alt"></i>&nbsp;MODIFICAR</a>

              </center>


            </td>

          </tr>

         <!--====  End of Sección de modificaciones  ====-->
         

         <tr class="fila__contrato">

          <th colspan="2">PROCESO DE CERTIFICACIÓN</th>

         </tr>

          <tr class="fila__contrato">

            <td>Generar comprobantes</td>
            <td>

              <center>
                <button id="anadirComprobantes" class="btn btn-primary"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Añadir</button>
              </center>

            </td>

          </tr>

          <tbody class="bloque__comprobantes fila__contrato">


          </tbody>

          <tr class="fila__contrato">

            <td>Suma de comprobantes</td>

            <td>
              <center>
                <input type="text" disabled="disabled" id="montoDelProyecto" name="montoDelProyecto" class="solo__numero__montos obligatorios__patrocinadores" style="width:40%; text-align:center;" value="0">
              </center>
            </td>

          </tr>

          <tr>

            <td>Monto del proyecto</td>
            <td><center><input type="text" id="montoOcultos" name="montoOcultos" disabled=""></center></td>

          </tr>

          <tr class="fila__contrato">

            <td colspan="2" align="center">
              <center>
                <button class="btn btn-primary" id="enviarContrato"><i class="far fa-share-square"></i>&nbsp;&nbsp;ENVIAR</button>
                <button class="btn btn-primary" id="enviarContratoObservaciones"><i class="far fa-share-square"></i>&nbsp;&nbsp;ENVIAR CORRECIÓN</button>
                <div class="reload__enmvio__contratos"></div>
              </center>
            </td>

          </tr>

          <tr class="fila__comprobantes__veniados">

            <td colspan="1"><center>Comprobantes enviados</center></td>
            <td colspan="1"><center><input type="hidden" id="rectificasInformacion" name="rectificasInformacion"><button id="verComprobantes" class="btn btn-primary" data-toggle='modal' data-target='#comprobantesRealizados'><i class="fas fa-eye"></i>&nbsp;&nbsp;VER</button></center></td>

          </tr>


         <tr class="rectificacion__filas rectificar__informacion filas__rectificas__envios">

          <th colspan="2">
            
            <center>RECTIFICAR INFORMACIÓN</center>

          </th>

         </tr>

          <tr class="rectificacion__filas rectificar__informacion filas__rectificas__envios">

            <td style="wdith:60%;">

             RECTIFICAR INFORMACIÓN 

            </td>

            <td class="d d-flex align-items-center justify-content-center">

              <center>
                <a class='rectificarProyecto btn btn-success rectificacionProyectosBases' id="rectificarProyecto" target="_blank"><i class="fas fa-sync-alt"></i>&nbsp;RECTIFICAR</a>

              </center>

              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

              <center>
                <a class='rectificarProyecto btn btn-info' data-toggle='modal' data-target='#revisarObservaciones' id="rPTbFPZzFiLwA17kBfsyJF3Fm1kuFsVtSc"><i class="fas fa-eye"></i>&nbsp;REVISAR OBSERVACIONES</a>
              </center>

            </td>

          </tr>

         <tr>

          <td colspan="2">

            <center><div class="mensajeRectificacion" style="font-weight:bold; font-size:14px;"></div></center>

          </td>

         </tr>

          <tr class="rectificacion__filas rectificar__informacion">

            <td colspan="2">

              <center><button id="enviarRectificacion" name="enviarRectificacion" class="btn btn-primary"><i class="fas fa-paper-plane"></i>&nbsp;&nbsp;ENVIAR RECTIFICACIÓN</button><div class="enviarDatosGenerales__reload"></div></center>

            </td>

          </tr>


         <tr>

          <th colspan="2">
            
            <center>INFORMACIÓN DEL PROYECTO</center>

          </th>

         </tr>

          <tr>

            <td style="wdith:60%;">

             DOCUMENTOS ENVIADOS

            </td>

            <td>

              <center>
                <button class='documentosVisualizar btn btn-primary' id="documentosVisualizar" data-toggle='modal' data-target='#visualizarDocumentos' style='border-radius:1%; color:white;'><i class='fas fa-eye'></i>&nbsp;VER</button>
              </center>

            </td>

          </tr>

        </table>

      </div>

    </div>

  </div>

</div>

<!--====  End of Modal Principal  ====-->



<!--=========================================
=            Modal Observaciones            =
==========================================-->

<div class="modal fade" id="revisarObservaciones">

  <div class="modal-dialog modal-dialog-centered" role="document" style="width:80%;">

    <div class="modal-content">

      <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold; position: relative; color:black!important;">Observaciones realizadas</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body observacionesRealizadas row" style="height:200px;">



      </div>

    </div>

  </div>

</div>

<!--====  End of Modal Observaciones  ====-->


<!--=====================================
=            Modal Contactar            =
======================================-->

<div class="modal fade" id="contactarResponsable">

  <div class="modal-dialog modal-dialog-centered" role="document" style="width:80%;">

    <div class="modal-content">

      <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold; position: relative; color:black!important;">Enviar Comentario</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body body__preguntas" style="height:200px;">

        <input type="hidden" id="correoResponsble" name="correoResponsble" />

        <input type="hidden" id="proyectoNombre" name="proyectoNombre">

        <input type="hidden" id="nombreAcomodador" name="nombreAcomodador" value="<?=$nombreAcomodador;?>">
 
        <input type="hidden" id="emailAcomadador" name="emailAcomadador" value="<?=$emailAcomadador;?>">

        <textarea class="validadorResponsbles" id="enviarComentarioResponsable" name="enviarComentarioResponsable" style="width:100%; height:100px" placeholder="Ingresar el comentario que desea enviar al encargado del proyecto">


        </textarea>
        <br>

        <button id="enviarCorreoResponbleEnviador" name="enviarCorreoResponbleEnviador" class="btn btn-primary" style="float:right;">ENVIAR</button>

        <div class="enviarDatosGenerales__reload"></div>

      </div>

    </div>

  </div>

</div>


<!--====  End of Modal Contactar  ====-->


<!--=========================================
=            Modal de documentos            =
==========================================-->

<div class="modal fade" id="visualizarDocumentos">

  <div class="modal-dialog modal-dialog-centered" role="document" style="width:100%;">

    <div class="modal-content">

    <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold; color:black!important;">Documentos</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body body__preguntas">
 
        <div class="row">

          <div class="col-sm-6 col-xs-6">

            <div class="rotulo__referencias">Proyecto</div>
                    
          </div>

          <div class="col-sm-6 col-xs-6">

            <a id="proyectoVista" target="_blank">proyecto.pdf</a>
                    
          </div>

        </div>

        <div class="row oculto__1">

          <div class="col-sm-6 col-xs-6">

            <div class="rotulo__referencias">Proyecto infraestructura</div>
                    
          </div>

          <div class="col-sm-6 col-xs-6">

            <a id="proyectoInfraestructura" target="_blank">proyectoInfraestructura.pdf</a>
                    
          </div>

        </div>

        <div class="row oculto__2">

          <div class="col-sm-6 col-xs-6">

            <div class="rotulo__referencias">Vida jurídica</div>
                    
          </div>

          <div class="col-sm-6 col-xs-6">

            <a id="vidaJuridica" target="_blank">vidaJuridica.pdf</a>
                    
          </div>

        </div>

        <div class="row oculto__3">

          <div class="col-sm-6 col-xs-6">

            <div class="rotulo__referencias">Certificación trayectoria</div>
                    
          </div>

          <div class="col-sm-6 col-xs-6">

            <a id="certificacionTrayectoria" target="_blank">certificacionTrayectoria.pdf</a>
                    
          </div>

        </div>

        <br>

        <div class="row oculto__4">

          <div class="col-sm-6 col-xs-6">

            <div class="rotulo__referencias">Certificado propiedad</div>
                    
          </div>

          <div class="col-sm-6 col-xs-6">

            <a id="certificadoPropiedad" target="_blank">certificadoPropiedad.pdf</a>
                    
          </div>

        </div>


        <div class="row oculto__5">

          <div class="col-sm-6 col-xs-6">

            <div class="rotulo__referencias">Memoria arquitectonica</div>
                    
          </div>

          <div class="col-sm-6 col-xs-6">

            <a id="memoriaArquitectonicas" target="_blank">memoriaArquitectonicas.pdf</a>
                    
          </div>

        </div>


        <div class="row oculto__6">

          <div class="col-sm-6 col-xs-6">

            <div class="rotulo__referencias">Presupuesto rubro</div>
                    
          </div>

          <div class="col-sm-6 col-xs-6">

            <a id="presupuestoRubro" target="_blank">presupuestoRubro.pdf</a>
                    
          </div>

        </div>

        <div class="row oculto__7">

          <div class="col-sm-6 col-xs-6">

            <div class="rotulo__referencias">Cronograma valorado</div>
                    
          </div>

          <div class="col-sm-6 col-xs-6">

            <a id="cronogramasValorados" target="_blank">cronogramaValorados.pdf</a>
                    
          </div>

        </div>

        <div class="row oculto__8">

          <div class="col-sm-6 col-xs-6">

            <div class="rotulo__referencias">Respaldos digitales</div>
                    
          </div>

          <div class="col-sm-6 col-xs-6">

            <a id="respaldosDigitales" target="_blank">respaldosDigitales.pdf</a>
                    
          </div>

        </div>

      </div>

    </div>

  </div>

</div>


<!--====  End of Modal de documentos  ====-->

<!--========================================
=            Modal comprobantes            =
=========================================-->

<div class="modal fade" id="comprobantesRealizados">

  <div class="modal-dialog modal-dialog-centered modal-xl" role="document" style="width:100%;">

    <div class="modal-content">

    <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold; color:black!important;">Documentos</h5>

        <button type="button" class="close close__funcionarios" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body body__comprobantes__conjuntos row">
 

      </div>

    </div>

  </div>

</div>


<!--====  End of Modal comprobantes  ====-->


<!--======================================
=            Modal evidencias            =
=======================================-->

<div class="modal fade" id="comprobantesRealizadosEvidencias">

  <div class="modal-dialog modal-dialog-centered modal-xl" role="document" style="width:100%;">

    <div class="modal-content">

    <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold; color:black!important;">Documentos</h5>

        <button type="button" class="close close__funcionarios" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body body__evidencias__conjuntos row">
 

      </div>

    </div>

  </div>

</div>

<!--====  End of Modal evidencias  ====-->


<!--====  End of Modal  ====-->

