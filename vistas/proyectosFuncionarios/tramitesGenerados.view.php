<?php

  $objeto= new usuario();
  $usuario=$objeto->ctrFuncionarios();
  $arrayUsuario = explode("___", $usuario);

  $nombreAcomodador= $arrayUsuario[1]." ".$arrayUsuario[2];
  $emailAcomadador= $arrayUsuario[7];

?>
<!--=======================================
=            Sección Principal            =
========================================-->

<div class="wrapper row3">

  <div class="contenido__general">
    
    <div class="contenedor__tabla">

      <table id="tablaProyectosFuncionarios" name="tablaProyectosFuncionarios" class="cell-border">

          <thead> 

              <tr> 

                  <th class="tamanio__fuente__enfasis__tablas">Código<br>de Proyecto</th>
                  <th class="tamanio__fuente__enfasis__tablas">Nombre de<br>Beneficiario</th>
                  <th class="tamanio__fuente__enfasis__tablas">Número de<br>Identificación</th>
                  <th class="tamanio__fuente__enfasis__tablas">Descripción<br>del proyecto</th>
                  <th class="tamanio__fuente__enfasis__tablas">Categoría</th>
                  <th class="tamanio__fuente__enfasis__tablas">Monto</th>
                  <th class="tamanio__fuente__enfasis__tablas">Fecha de<br>califiación</th>
                  <th class="tamanio__fuente__enfasis__tablas">Fecha de<br>certificación</th>
                  <th class="tamanio__fuente__enfasis__tablas">Estado</th>
                  <th class="tamanio__fuente__enfasis__tablas">Fecha Inicio<br>de ejecución</th>
                  <th class="tamanio__fuente__enfasis__tablas">Observaciones</th>
                  <th class="tamanio__fuente__enfasis__tablas">Devolver</th>

              </tr>

          </thead> 

      </table>

    </div>

  </div>

</div>

<!--====  End of Sección Principal  ====-->


<!--=============================
=            Modales            =
==============================-->


<!--=====================================
=            Modal Principal            =
======================================-->

<div class="modal fade" id="proyectoPrincipalFuncionario">

  <div class="modal-dialog modal-dialog-centered modal-xl" role="document" style="width:80%;">

    <div class="modal-content">

      <input type="hidden" id="codigoEnlace" name="codigoEnlace">

      <div class="modal-header" style="color:black!important; display:flex; align-items: center; justify-content: center;">

        <h5 class="modal-title" id="modalPrincipalProyectos" style="font-weight:bold; color:white; width:35%; text-align:center;"></h5>

        <button type="button" class="close reload__location__inicios" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body body__preguntas">
 
        <table>

          <tr>

            <th style="wdith:60%;" colspan="2">

              <center>

              DATOS DEL BENEFICIARIO

              </center>

            </th>

          </tr>

          <tr>

            <td>

              BENEFICIARIO

            </td>

            <td>

                <div class="beneficiarioProyecto"></div>

            </td>

         </tr>

         <tr>

            <td>

              CORREO DE CONTACTO

            </td>

            <td>

                <div class="contactoBeneficiarioProyecto"></div>

                <button style="float:right;" class="btn btn-primary" data-toggle='modal' data-target='#contactarResponsable' id="contactarResponsableBoton"><i class="fas fa-phone-volume"></i>&nbsp;&nbsp;&nbsp;CONTACTAR</button>

            </td>


         </tr>

         <tr class="descalificacion__director">

            <th>

             <center>QUIEN DESCALIFICA</center>

            </th>

            <th>

             <center>RAZÓN DE DESCALIFICACIÓN</center>

            </th>

         </tr>


         <tr class="descalificacion__director">

            <td>

              DESCALIFICADO POR EL DIRECTOR

            </td>

            <td class="comentario__descalificacion__dir">

                

            </td>


         </tr>


         <!--=======================================
         =            Informes enviados            =
         ========================================-->
         
          <tr class="fila__envio__informes">
           
            <td colspan="1"><center>Informe final</center></td>
            <td colspan="1">
              <center>
                <a id="informeFinales" target="_blank">Informe final.pdf</a>
              </center>
            </td>

         </tr>

         <tr class="fila__envio__informes">

            <td colspan="1"><center>Evidencias enviadas</center></td>
            <td colspan="1">
              <center>
                <button id="verEvidencias" class="btn btn-primary" data-toggle='modal' data-target='#comprobantesRealizadosEvidencias'><i class="fas fa-eye"></i>&nbsp;&nbsp;VER</button>
              </center>
            </td>

         </tr>


         <tr class="fila__envio__informes informes__realizados__enviados">

            <td>

              Informar

            </td>

            <td>

              <div style="display:flex;">

                Si&nbsp;<input type="radio" name="informarProyectos" value="si" class="check__estilos__lineas">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                No&nbsp;<input type="radio" name="informarProyectos" value="no" class="check__estilos__lineas">
              </div>
              <textarea id="comentarioNegativosInformes" placeholder="escribir el proque rechaza el informe" style="width:100%;"></textarea>

            </td>

         </tr>


         <tr class="fila__envio__informes informes__realizados__enviados">

          <td colspan="2"><center><button class="btn btn-primary" id="entiarInformesDdosRecomendados">ENVIAR</button><div class="reload__observaciones"></div><div class="observaciones__calificas"></div></center></td>

         </tr>
        
         
         <!--====  End of Informes enviados  ====-->
         
         <tr class="fila__descalificar__proyecto__comentarios">

            <td colspan="1"><center>Comprobantes enviados</center></td>
            <td colspan="1"><center><input type="hidden" id="rectificasInformacion" name="rectificasInformacion"><button id="verComprobantes" class="btn btn-primary" data-toggle='modal' data-target='#comprobantesRealizados'><i class="fas fa-eye"></i>&nbsp;&nbsp;VER</button></center></td>

         </tr>

         <tr class="fila__descalificar__proyecto__comentarios certificar__enviados__dados">

            <td>

              CERTIFICAR

            </td>

            <td>

              <div style="display:flex;">

                Si&nbsp;<input type="radio" name="calificarContrato" value="si" class="check__estilos__lineas">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                No&nbsp;<input type="radio" name="calificarContrato" value="no" class="check__estilos__lineas">
              </div>
              <textarea id="comentarioNegativo" placeholder="escribir el proque rechaza el contrato" style="width:100%;"></textarea>

            </td>

         </tr>

         <tr class="fila__descalificar__proyecto__comentarios certificar__enviados__dados">

          <td colspan="2"><center><button class="btn btn-primary" id="enviarCalificarContrato">ENVIAR</button><div class="reload__observaciones"></div><div class="observaciones__calificas"></div></center></td>

         </tr>

         <tr class="fila__agregada__Certificas">

            <td>

              CALIFICAR

            </td>

            <td>

                <button style="float:right;" class="btn btn-primary" data-toggle='modal' data-target='#calificarProyecto' id="calificarProyectoBoton"><i class="fas fa-thumbs-up"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CALIFICAR</button>

            </td>


         </tr>

        </table>


      </div>

    </div>

  </div>

</div>

<!--====  End of Modal Principal  ====-->

<!--=====================================
=            Modal Calificar            =
======================================-->

<div class="modal fade" id="calificarProyecto">

  <div class="modal-dialog modal-dialog-centered" role="document" style="width:80%;">

    <div class="modal-content">

      <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold; position: relative; color:black!important;">Calificar Proyecto</h5>

        <button type="button" class="close reload__location__inicios" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body body__preguntas">

        <table>

          <tr>

            <th colspan="4">CALIFICAR DOCUMENTACIÓN</th>

          </tr>

          <tr>

            <th colspan="2"><center>DOCUMENTACIÓN</center></th>
            <th colspan="2"><center>CALIFICAR</center></th>

          </tr>

          <tr>

            <th>

              DOCUMENTO

            </th>

            <th>

              ARCHIVO

            </th>

            <th>

              SI

            </th>

            <th>

              NO

            </th>


          </tr>

          <tr>

            <td>

              Proyecto

            </td>

            <td>

              <center><a id="proyectoVista" target="_blank">proyecto.pdf</a></center>

            </td>

            <td>

              <center><input type="radio"  name="radioProyecto" class="check__estilos__lineas radioProyecto radios__desabilitas" value="si"></center>

            </td>

            <td>

              <center><input type="radio" name="radioProyecto" class="check__estilos__lineas radioProyecto radios__desabilitas" value="no"><br><textarea id="observacionNegativaProyecto" style="width:100%;"></textarea></center>

            </td>

          </tr>

          <tr>

            <td>

              Anexo componentes

            </td>

            <td>

              <center><a id="anexoComponentesVistas" target="_blank">anexoComponentes.pdf</a></center>

            </td>

            <td>

              <center><input type="radio"  name="radioComponentes" class="check__estilos__lineas radioComponentes radios__desabilitas" value="si"></center>

            </td>

            <td>

              <center><input type="radio" name="radioComponentes" class="check__estilos__lineas radioComponentes radios__desabilitas" value="no"><br><textarea id="observacionComponentes" style="width:100%;"></textarea></center>

            </td>

          </tr>


          <tr class="calificarCurricumFila">

            <td>

              Curriculum

            </td>

            <td>

              <center><a id="curriculumDocumento" target="_blank">curriculum.pdf</a></center>

            </td>

            <td>

              <center><input type="radio" name="radioCurriculum" class="check__estilos__lineas radioCurriculum radios__desabilitas" value="si"></center>

            </td>

            <td>

              <center><input type="radio" name="radioCurriculum" class="check__estilos__lineas radioCurriculum radios__desabilitas" value="no"><br><textarea id="observacionNegativaCurriculum" style="width:100%;"></textarea></center>

            </td>

          </tr>

          <tr class="fila__vidaJuridica">

            <td>

              Vida Jurídica

            </td>

            <td>

              <center><a id="vidaJuridica" target="_blank">vidaJuridica.pdf</a></center>

            </td>

            <td>

              <center><input type="radio" name="radioVidaJuridica" class="check__estilos__lineas radioVidaJuridica radios__desabilitas" value="si"></center>

            </td>

            <td>

              <center><input type="radio" name="radioVidaJuridica" class="check__estilos__lineas radioVidaJuridica radios__desabilitas" value="no"><br><textarea id="observacionNegativaVidaJuridica" style="width:100%;"></textarea></center>

            </td>

          </tr>

          <tr class="fila__certificadoTrayectoria">

            <td>

              Certificación Trayectoria

            </td>

            <td>

              <center><a id="certificacionTrayectoria" target="_blank">certificacionTrayectoria.pdf</a></center>

            </td>

            <td>

              <center><input type="radio" name="certificadoTrayectoria" class="check__estilos__lineas certificadoTrayectoria radios__desabilitas" value="si"></center>

            </td>

            <td>

              <center><input type="radio" name="certificadoTrayectoria" class="check__estilos__lineas certificadoTrayectoria radios__desabilitas" value="no"><br><textarea id="observacionCertificadoTrayectoria" style="width:100%;"></textarea></center>

            </td>

          </tr>


          <tr>

            <td colspan="4">

              <center>

                <button class="btn btn-primary" id="enviarCalificacion" name="enviarCalificacion"><i class="fas fa-paper-plane"></i>&nbsp;&nbsp;ENVIAR</button>

                <div class="enviarDatosGenerales__reload"></div>

              </center>

            </td>

          </tr>

        </table>

      </div>

    </div>

  </div>

</div>

<!--====  End of Modal Calificar  ====-->



<!--========================================
=            Contacto Ciudadano            =
=========================================-->

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


<!--====  End of Contacto Ciudadano  ====-->

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

<!--==========================================================
=            Modal enviar documento de viabilidad            =
===========================================================-->

<div class="modal fade" id="informeTecnicoViablidad">

  <div class="modal-dialog modal-dialog-centered" role="document" style="width:100%;">

    <div class="modal-content">

    <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold; color:black!important;">Informe de viabilidad</h5>

        <button type="button" class="close close__funcionarios" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body row">


        <div class="col col-4">

          Generar informe de viabilidad

        </div>

        <div class="col col-8 text-center">

          <form action="modelosBd/documentoProyecto/informeViavilidad.md.php" method="post">

              <input type="hidden" id="codigoProyectoPdfInformeViavilidad" name="codigoProyectoPdfInformeViavilidad"/>

              <input type="hidden" id="cedulaRucInformeViabilidad" name="cedulaRucInformeViabilidad">

              <input type="hidden" id="nombreSolicitantes" name="nombreSolicitantes">

              <input type="hidden" id="identificadorImpactos" name="identificadorImpactos">

              <button id="generarVisualizarInformeViabilidad" name="generarVisualizarInformeViabilidad" class="btn btn-primary"><i class="fab fa-creative-commons-share"></i></i>&nbsp;&nbsp;&nbsp;GENERAR INFORME</button>
              <span class="enviarDatosGenerales__reload"></span>

          </form>

        </div>

        <div class="col col-4">

          Subir informe

        </div>

        <div class="col col-8 text-center">

          <input type="file" id="informeViavilidad" name="informeViavilidad" />

        </div>

        <br>

        <br>

        <div class="col col-12 text-center">

          <button class="btn btn-primary" id="subirArchivos" name="subirArchivos"><i class="fas fa-save"></i>&nbsp;&nbsp;Guardar</button>

        </div>

      </div>

    </div>

  </div>

</div>

<!--====  End of Modal enviar documento de viabilidad  ====-->


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


<!--====  End of Modales  ====-->


