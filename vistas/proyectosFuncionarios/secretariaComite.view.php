<!--=======================================
=            Sección Principal            =
========================================-->

<div class="wrapper row3">

  <div class="contenido__general">
    
    <div class="contenedor__tabla">

      <br>

      <br>

      <div class="col col-12 text-center">

        <button class="btn btn-primary" id="calificarProyectos" data-toggle='modal' data-target='#visualizarComiteCalificantes'><i class="fal fa-address-card"></i>&nbsp;&nbsp;Asistencia</button>

      </div>


      <table id="tablaProyectosSecretariaComite" name="tablaProyectosSecretariaComite" class="cell-border" border="2">

          <thead> 

              <tr> 

                  <th class="tamanio__fuente__enfasis__tablas">Código<br>de Proyecto</th>
                  <th class="tamanio__fuente__enfasis__tablas">Nombre de<br>Beneficiario</th>
                  <th class="tamanio__fuente__enfasis__tablas">Número de<br>Identificación</th>
                  <th class="tamanio__fuente__enfasis__tablas">Descripción<br>del proyecto</th>
                  <th class="tamanio__fuente__enfasis__tablas">Categoría</th>
                  <th class="tamanio__fuente__enfasis__tablas">Monto</th>
                  <th class="tamanio__fuente__enfasis__tablas">Fecha Inicio<br>de ejecución</th>
                  <th class="tamanio__fuente__enfasis__tablas">Calificar</th>
                  <th class="tamanio__fuente__enfasis__tablas">Informe Técnico</th>
                  <th class="tamanio__fuente__enfasis__tablas">Trámite</th>
                  <th class="tamanio__fuente__enfasis__tablas">Priorizar</th>

              </tr>

          </thead> 

      </table>


    </div>

  </div>


</div>

<!--====  End of Sección Principal  ====-->
<!--=========================================
=            Modal de Documentos          =
==========================================-->

<div class="modal fade" id="visualizarComiteCalificantes">

  <div class="modal-dialog modal-dialog-centered modal-xl" role="document" style="width:80%;">

    <div class="modal-content">

      <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold; position: relative; left:45%;">REGISTRAR ASISTENCIAS</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="col col-12 text-center oculto__elementos__enviados__comites">

        <form action="modelosBd/documentoProyecto/calificacionPrioridad.md.php" method="post">

          <input type="hidden" id="ministroLlega" name="ministroLlega" />
          <input type="hidden" id="subsesAltoLlega" name="subsesAltoLlega" />
          <input type="hidden" id="subsesActividadLlega" name="subsesActividadLlega" />
          <input type="hidden" id="subsesCoordinadorL" name="subsesCoordinadorL" />
          <input type="hidden" id="planifiacionLle" name="planifiacionLle" />
          <input type="hidden" id="juridicoLlega" name="juridicoLlega" />

          <input type="hidden" name="codigosGenerados" id="codigosGenerados" />

          <button class="btn btn-primary" type="submit">
            <i class="fas fa-download"></i>&nbsp;&nbsp;<br>Generar<br>acta de calificación de prioridad
          </button>

        </form>

      </div>

      <form id="notificacionFormulario">

        <table>

          <thead>

            <tr>

              <th colspan="5">
                <center>CALIFICACIÓN CÓMITE</center>
              </th>

            </tr>

            <tr>

              <th rowspan="2">
                <center>DESCRIPCIÓN ROL</center>
              </th>

              <th rowspan="2">
                <center>FUNCIONARIO</center>
              </th>

              <th>
                <center>ASISTENCIA</center>
              </th>

            </tr>

            <tr>

              <th>
                <center>MARCAR ASISTENCIA</center>
              </th>

            </tr>

          </thead>

          <tbody>

            <tr>

              <td class="nombre__ministro">
                Seleccionar Ministro de deporte o delegado
              </td>

              <td class="secretario__delegado">

                <select id="seleccionSecretarioDelegado" style="height:45px; width: 100%;">
                  
                  <option value="0">--Ministro del deporte o su delegado--</option>
                  <option value="1">Ministro del deporte</option>
                  <option value="2">Delegado</option>

                </select>

                <div class="contenido__nombre"></div>

                <div class="contenedor__usuarios__select"><select id="selectorUsuariosDelegados" name="selectorUsuariosDelegados" style="width:100%; height:45px;"></select></div>

              </td>

              <td>

                <center>
                  <input type="checkbox" name="asistenciaMinistroPrincipal" id="asistenciaMinistroPrincipal"  class="estilos__radios asistencias__globales asistencias__revisadas ministroAsistes desbilitados__pregonados"/>
                </center>

              </td>

            </tr>

            <tr class="regresar__escoger">

              <td colspan="5">
                <center><button id="regresarSeleccion" style="border-radius:50%; background:#00b8d4;color:white; padding:.2em;"><i class="fas fa-sync"></i></button></center>
              </td>

            </tr>

            <tr>

              <td class="rol__alto">
                
              </td>

              <td class="subsecretario__deporte__alto__rendimiento">


              </td>


              <td>

                <center>
                  <input type="checkbox" name="asistenciaSusesAltoPrincipal" id="asistenciaSusesAltoPrincipal" class="estilos__radios asistencias__globales asistencias__revisadas desbilitados__pregonados" />
                </center>

              </td>

            </tr>

            <tr>

              <td class="rol__desarrollo">

              </td>

              <td class="subsecretario__desarrollo__actividad__fisica">


              </td>


              <td>

                <center>
                  <input type="checkbox" name="asistenciaActividadFisicaPrincipal" id="asistenciaActividadFisicaPrincipal" class="estilos__radios asistencias__globales asistencias__revisadas desbilitados__pregonados" />
                </center>

              </td>

            </tr>

            <tr>

              <td class="rol__coordinador">

              </td>

              <td class="coordinador__administracion">


              </td>


              <td>

                <center>
                  <input type="checkbox" name="asistenciaCoordinadorPrincipal" id="asistenciaCoordinadorPrincipal" class="estilos__radios asistencias__globales asistencias__revisadas desbilitados__pregonados" />
                </center>

              </td>

            </tr>


            <tr>

              <td class="rol__planificacion">

              </td>

              <td class="planificacion__nombre">


              </td>


              <td>

                <center>
                  <input type="checkbox" name="asistenciaPlanificacionPrincipal" id="asistenciaPlanificacionPrincipal" class="estilos__radios asistencias__globales asistencias__revisadas desbilitados__pregonados" />
                </center>

              </td>

            </tr>

            <tr>

              <td class="rol__juridico">



              </td>

              <td class="juridico__nombre">


              </td>


              <td>

                <center>
                  <input type="checkbox" name="asistenciaJuridicoPrincipal" id="asistenciaJuridicoPrincipal" class="estilos__radios asistencias__globales asistencias__revisadas desbilitados__pregonados" />
                </center>

              </td>

            </tr>

           <tr class="generar__inputs">

              <td>
                

                <!--===========================================
                =            Información Necesaria            =
                ============================================-->
                
                <input type="text" id="idMinistro" name="idMinistro">
                <input type="text" id="nombreMinistro" name="nombreMinistro">
                <input type="text" id="emailMinistro" name="emailMinistro">
                <input type="text" id="cedulaMinistro" name="cedulaMinistro">
                <input type="text" id="cargoMinistro" name="cargoMinistro">

                <input type="text" id="idSusesAlto" name="idSusesAlto">
                <input type="text" id="nombreSusesAlto" name="nombreSusesAlto">
                <input type="text" id="emailSusesAlto" name="emailSusesAlto">
                <input type="text" id="cedulaSusesAlto" name="cedulaSusesAlto">
                <input type="text" id="cargoSusesAlto" name="cargoSusesAlto">

                <input type="text" id="idSusesActividad" name="idSusesActividad">
                <input type="text" id="nombreSusesActividad" name="nombreSusesActividad">
                <input type="text" id="emailSusesActividad" name="emailSusesActividad">
                <input type="text" id="cedulaSusesActividad" name="cedulaSusesActividad">
                <input type="text" id="cargoSusesActividad" name="cargoSusesActividad">

                <input type="text" id="idSusesCoordinador" name="idSusesCoordinador">
                <input type="text" id="nombreSusesCoordinador" name="nombreSusesCoordinador">
                <input type="text" id="emailSusesCoordinador" name="emailSusesCoordinador">
                <input type="text" id="cedulaSusesCoordinador" name="cedulaSusesCoordinador">
                <input type="text" id="cargoSusesCoordinador" name="cargoSusesCoordinador">

                <input type="text" id="idSusesPlanificacion" name="idSusesPlanificacion">
                <input type="text" id="nombreSusesPlanificacion" name="nombreSusesPlanificacion">
                <input type="text" id="emailSusesPlanificacion" name="emailSusesPlanificacion">
                <input type="text" id="cedulaSusesPlanificacion" name="cedulaSusesPlanificacion">
                <input type="text" id="cargoSusesPlanificacion" name="cargoSusesPlanificacion">

                <input type="text" id="idSusesJuridico" name="idSusesJuridico">
                <input type="text" id="nombreSusesJuridico" name="nombreSusesJuridico">
                <input type="text" id="emailSusesJuridico" name="emailSusesJuridico">
                <input type="text" id="cedulaSusesJuridico" name="cedulaSusesJuridico">
                <input type="text" id="cargoSusesJuridico" name="cargoSusesJuridico">

                
                <!--====  End of Información Necesaria  ====-->
                


              </td>

            </tr>


          </tbody>

          <tfoot>

            <tr>

              <td colspan="3">

                <center>

                  <button class="btn btn-primary" id="generarAsistencia"><i class="fas fa-save"></i>&nbsp;&nbsp;GENERAR<br>ASISTENCIA</button>

                </center>

              </td>

            </tr>


            <tr class="oculto__elementos__enviados__comites" style="color:white!important;">

              <td colspan="3">

                <center>

                <button class="btn btn-primary" type="submit" id="enviarActaCalificacionPrioridad">
                  <i class="fas fa-save"></i>&nbsp;&nbsp;<br>Enviar Acta
                </button>

                </center>

              </td>

            </tr>

          </tfoot>

        </table>
 
      </form>

    </div>

  </div>

</div>



<div class="modal fade" id="visualizarComite">

  <div class="modal-dialog modal-dialog-centered modal-xl" role="document" style="width:80%;">

    <div class="modal-content">

      <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold; position: relative; left:45%;">DOCUMENTOS Y RECOMENDACIONES</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div id="notificacionFormulario">

        <table>

          <thead>

            <tr>

              <th colspan="5">
                <center>CALIFICACIÓN CÓMITE</center>
              </th>

            </tr>

            <tr>

              <th rowspan="2">
                <center>DESCRIPCIÓN ROL</center>
              </th>

              <th rowspan="2">
                <center>FUNCIONARIO</center>
              </th>

              <th>
                <center>ASISTENCIA</center>
              </th>

              <th colspan="2" rowspan="1">CALIFICACIÓN</th>

            </tr>

            <tr>

              <th>
                <center>MARCAR ASISTENCIA</center>
              </th>

              <th>
                <center>SI</center>
              </th>

              <th>
                <center>NO</center>
              </th>

            </tr>

          </thead>

          <tbody>

            <tr>

              <td class="nombre__ministro">
                Ministro/delegado
              </td>

              <td class="secretario__delegado">

                <div class="contenido__nombre__principales"></div>

              </td>

              <td>

                <center>
                  <input type="checkbox" name="asistenciaMinistro" id="asistenciaMinistro"  class="estilos__radios asistencias__globales asistencias__revisadas" disabled="" />
                </center>

              </td>

              <td>

                <center>
                  <input type="radio" name="ministroOpcion" value="si" class="estilos__radios" />
                </center>

              </td>

              <td>

                <center>
                  <input type="radio" name="ministroOpcion" value="no" class="estilos__radios" />
                </center>

              </td>

            </tr>

            <tr class="regresar__escoger">

              <td colspan="5">
                <center><button id="regresarSeleccion" style="border-radius:50%; background:#00b8d4;color:white; padding:.2em;"><i class="fas fa-sync"></i></button></center>
              </td>

            </tr>

            <tr>

              <td class="rol__alto">
                
              </td>

              <td class="subsecretario__deporte__alto__rendimiento">


              </td>


              <td>

                <center>
                  <input type="checkbox" name="asistenciaSusesAlto" id="asistenciaSusesAlto" class="estilos__radios asistencias__globales asistencias__revisadas" disabled=""/>
                </center>

              </td>

              <td>

                <center>
                  <input type="radio" name="altoRendimientoOpcion" value="si" class="estilos__radios" />
                </center>

              </td>

              <td>

                <center>
                  <input type="radio" name="altoRendimientoOpcion" value="no" class="estilos__radios" />
                </center>

              </td>

            </tr>

            <tr>

              <td class="rol__desarrollo">

              </td>

              <td class="subsecretario__desarrollo__actividad__fisica">


              </td>


              <td>

                <center>
                  <input type="checkbox" name="asistenciaActividadFisica" id="asistenciaActividadFisica" class="estilos__radios asistencias__globales asistencias__revisadas" disabled="" />
                </center>

              </td>

              <td>

                <center>
                  <input type="radio" name="actividadFisicaOpcion" value="si" class="estilos__radios" />
                </center>

              </td>

              <td>

                <center>
                  <input type="radio" name="actividadFisicaOpcion" value="no" class="estilos__radios" />
                </center>

              </td>

            </tr>

            <tr>

              <td class="rol__coordinador">

              </td>

              <td class="coordinador__administracion">


              </td>


              <td>

                <center>
                  <input type="checkbox" name="asistenciaCoordinador" id="asistenciaCoordinador" class="estilos__radios asistencias__globales asistencias__revisadas" disabled=""/>
                </center>

              </td>

              <td>

                <center>
                  <input type="radio" name="coordinadorAdministracionOpcion" value="si" class="estilos__radios" />
                </center>

              </td>

              <td>

                <center>
                  <input type="radio" name="coordinadorAdministracionOpcion" value="no" class="estilos__radios" />
                </center>

              </td>

            </tr>


            <tr>

              <td class="rol__planificacion">

              </td>

              <td class="planificacion__nombre">



              </td>


              <td>

                <center>
                  <input type="checkbox" name="asistenciaPlanificacion" id="asistenciaPlanificacion" class="estilos__radios asistencias__globales asistencias__revisadas" disabled=""/>
                </center>

              </td>


              <td>

                <center>
                  <input type="radio" name="coordinadorPlanificacionOpcion" value="si" class="estilos__radios" />
                </center>

              </td>

              <td>

                <center>
                  <input type="radio" name="coordinadorPlanificacionOpcion" value="no" class="estilos__radios" />
                </center>

              </td>


            </tr>

            <tr>

              <td class="rol__juridico">



              </td>

              <td class="juridico__nombre">


              </td>


              <td>

                <center>
                  <input type="checkbox" name="asistenciaJuridico" id="asistenciaJuridico" class="estilos__radios asistencias__globales asistencias__revisadas" disabled=""/>
                </center>

              </td>



              <td>

                <center>
                  <input type="radio" name="coordinadorAdministracionFinanciera" value="si" class="estilos__radios" />
                </center>

              </td>

              <td>

                <center>
                  <input type="radio" name="coordinadorAdministracionFinanciera" value="no" class="estilos__radios" />
                </center>

              </td>

            </tr>

            <tr class="generar__inputs">

              <td>

                <!--===========================================
                =            Información Necesaria            =
                ============================================-->
                
                <input type="text" id="idMinistro" name="idMinistro">
                <input type="text" id="nombreMinistro" name="nombreMinistro">
                <input type="text" id="emailMinistro" name="emailMinistro">
                <input type="text" id="cedulaMinistro" name="cedulaMinistro">
                <input type="text" id="cargoMinistro" name="cargoMinistro">

                <input type="text" id="idSusesAlto" name="idSusesAlto">
                <input type="text" id="nombreSusesAlto" name="nombreSusesAlto">
                <input type="text" id="emailSusesAlto" name="emailSusesAlto">
                <input type="text" id="cedulaSusesAlto" name="cedulaSusesAlto">
                <input type="text" id="cargoSusesAlto" name="cargoSusesAlto">

                <input type="text" id="idSusesActividad" name="idSusesActividad">
                <input type="text" id="nombreSusesActividad" name="nombreSusesActividad">
                <input type="text" id="emailSusesActividad" name="emailSusesActividad">
                <input type="text" id="cedulaSusesActividad" name="cedulaSusesActividad">
                <input type="text" id="cargoSusesActividad" name="cargoSusesActividad">

                <input type="text" id="idSusesCoordinador" name="idSusesCoordinador">
                <input type="text" id="nombreSusesCoordinador" name="nombreSusesCoordinador">
                <input type="text" id="emailSusesCoordinador" name="emailSusesCoordinador">
                <input type="text" id="cedulaSusesCoordinador" name="cedulaSusesCoordinador">
                <input type="text" id="cargoSusesCoordinador" name="cargoSusesCoordinador">

                <input type="text" id="idSusesPlanificacion" name="idSusesPlanificacion">
                <input type="text" id="nombreSusesPlanificacion" name="nombreSusesPlanificacion">
                <input type="text" id="emailSusesPlanificacion" name="emailSusesPlanificacion">
                <input type="text" id="cedulaSusesPlanificacion" name="cedulaSusesPlanificacion">
                <input type="text" id="cargoSusesPlanificacion" name="cargoSusesPlanificacion">

                <input type="text" id="idSusesJuridico" name="idSusesJuridico">
                <input type="text" id="nombreSusesJuridico" name="nombreSusesJuridico">
                <input type="text" id="emailSusesJuridico" name="emailSusesJuridico">
                <input type="text" id="cedulaSusesJuridico" name="cedulaSusesJuridico">
                <input type="text" id="cargoSusesJuridico" name="cargoSusesJuridico">

                
                <!--====  End of Información Necesaria  ====-->
                


              </td>

            </tr>

            <tr>

              <th colspan="5" align="center">
                
               CALIFICACIÓN DE PRIORIDAD DE PROYECTO DEPORTIVO

              </th>

            </tr>

            <tr>

              <td>

                DESCRIPCIÓN

              </td>

              <td colspan="2">

                DOCUMENTO

              </td>

              <td colspan="2">

                ACCIÓN

              </td>

            </tr>

            <tr class="calificacion__generadas">

              <td>

                Generar calificación de prioridad de proyecto deportivo

              </td>

              <td class="acta__notificacion__realizadas" colspan="2">

                <a id="documentoNotificacion" target="_blank"/>

              </td>

              <td colspan="2">

                <form id="notificacionFormularioUnitarios">

                  <!--==================================================
                  =            Información de los productos            =
                  ===================================================-->
                  <input type="hidden" id="firmaRedundanteProyectos" name="firmaRedundanteProyectos">
                  <input type="hidden" id="cargoRedundanteProyectos" name="cargoRedundanteProyectos">
                  <input type="hidden" id="nombreProyecto" name="nombreProyecto">
                  <input type="hidden" name="notificacionDirecta" id="notificacionDirecta">
                  <input type="hidden" name="codgioProyectoDocumentos" id="codgioProyectoDocumentos">

                  <!--====  End of Información de los productos  ====-->

                  <center>
                    <button id="generarNotificacion" name="generarNotificacion" class="anadir__cosas btn btn-primary" style="width:100%; border-radius:1em; padding:.5em;"><i class="far fa-share-square"></i>Generar</button>
                  </center>

                  <div class="reload__documento__notificacion"></div>

                </form>

              </td>  

            </tr>

            <tr class="certificacion__generadas">

              <td>

                Generar certificado

              </td>

              <td class="acta__notificacion__realizadas" colspan="2">

                <a id="documentoNotificacionCertificacion" target="_blank">N/A</a>

              </td>

              <td colspan="2">

                <form id="notificacionFormularioUnitariosCertificas">

                  <!--==================================================
                  =            Información de los productos            =
                  ===================================================-->
                  <input type="hidden" id="firmaRedundanteProyectosCertificas" name="firmaRedundanteProyectosCertificas">
                  <input type="hidden" id="cargoRedundanteProyectosCertificas" name="cargoRedundanteProyectosCertificas">
                  <input type="hidden" id="nombreProyectoCertificas" name="nombreProyectCertificaso">
                  <input type="hidden" name="notificacionDirectaCertificas" id="notificacionDirectaCertificas">
                  <input type="hidden" name="codgioProyectoDocumentosCertificas" id="codgioProyectoDocumentosCertificas">

                  <!--====  End of Información de los productos  ====-->

                  <center>
                    <button id="generarNotificacionCertificacion" name="generarNotificacionCertificacion" class="anadir__cosas btn btn-primary" style="width:100%; border-radius:1em; padding:.5em;"><i class="far fa-share-square"></i>Generar</button>
                  </center>

                  <div class="reload__documento__notificacion"></div>

                </form>

              </td>  

            </tr>

            <tr class="informes__generados">


            </tr>



          </tbody>

        </table>
 
      </div>

    </div>

  </div>

</div>


<!--=========================================
=            Modal de documentos            =
==========================================-->


<div class="modal fade" id="visualizarDocumentos" data-backdrop="static" data-keyboard="false">

  <div class="modal-dialog modal-dialog-centered" role="document" style="width:80%;">

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

            <div class="rotulo__referencias">Proyecto Infraestructura</div>
                    
          </div>

          <div class="col-sm-6 col-xs-6">

            <a id="proyectoInfraestructura" target="_blank">proyectoInfraestructura.pdf</a>
                    
          </div>

        </div>

        <div class="row oculto__2">

          <div class="col-sm-6 col-xs-6">

            <div class="rotulo__referencias">Vida Jurídica</div>
                    
          </div>

          <div class="col-sm-6 col-xs-6">

            <a id="vidaJuridica" target="_blank">vidaJuridica.pdf</a>
                    
          </div>

        </div>

        <div class="row oculto__3">

          <div class="col-sm-6 col-xs-6">

            <div class="rotulo__referencias">Certificación Trayectoria</div>
                    
          </div>

          <div class="col-sm-6 col-xs-6">

            <a id="certificacionTrayectoria" target="_blank">certificacionTrayectoria.pdf</a>
                    
          </div>

        </div>


        <div class="row oculto__4">

          <div class="col-sm-6 col-xs-6">

            <div class="rotulo__referencias">Certificado Propiedad</div>
                    
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

            <div class="rotulo__referencias">Presupuesto Rubro</div>
                    
          </div>

          <div class="col-sm-6 col-xs-6">

            <a id="presupuestoRubro" target="_blank">presupuestoRubro.pdf</a>
                    
          </div>

        </div>

        <div class="row oculto__7">

          <div class="col-sm-6 col-xs-6">

            <div class="rotulo__referencias">Cronograma Valorado</div>
                    
          </div>

          <div class="col-sm-6 col-xs-6">

            <a id="cronogramasValorados" target="_blank">cronogramaValorados.pdf</a>
                    
          </div>

        </div>

        <div class="row oculto__8">

          <div class="col-sm-6 col-xs-6">

            <div class="rotulo__referencias">Respaldos Digitales</div>
                    
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


<!--====  End of Modal de Documentos  ====-->

