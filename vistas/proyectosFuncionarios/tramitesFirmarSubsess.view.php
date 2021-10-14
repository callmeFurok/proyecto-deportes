<!--=======================================
=            Sección Principal            =
========================================-->

<div class="wrapper row3">

  <div class="contenido__general">
    
    <div class="contenedor__tabla">

      <table id="tablaFirmasComite" name="tablaFirmasComite" class="cell-border" border="2">

          <thead> 

              <tr> 

                  <th class="tamanio__fuente__enfasis__tablas">Código<br>de Proyecto</th>
                  <th class="tamanio__fuente__enfasis__tablas">Nombre de<br>Beneficiario</th>
                  <th class="tamanio__fuente__enfasis__tablas">Número de<br>Identificación</th>
                  <th class="tamanio__fuente__enfasis__tablas">Descripción<br>del proyecto</th>
                  <th class="tamanio__fuente__enfasis__tablas">Categoría</th>
                  <th class="tamanio__fuente__enfasis__tablas">Monto</th>
                  <th class="tamanio__fuente__enfasis__tablas">Fecha Inicio<br>de ejecución</th>
                  <th class="tamanio__fuente__enfasis__tablas">Firmar</th>

              </tr>

          </thead> 

      </table>

    </div>

  </div>

</div>

<!--====  End of Sección Principal  ====-->
<!--=========================================
=            Modal de Documentos            =
==========================================-->

<!--=========================================
=            Modal de documentos            =
==========================================-->

<div class="modal fade" id="firmarDocumentos">

  <div class="modal-dialog modal-dialog-centered" role="document" style="width:80%;">

    <div class="modal-content">

      <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold; position: relative; left:45%;">DOCUMENTOS Y RECOMENDACIONES</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body body__preguntas">

        <table>

          <thead>

            <tr>

              <th colspan="3" align="center">DOCUMENTOS A FIRMAR</th>

            </tr>

            <tr>

              <th align="center">

                Descprición

              </th>

              <th align="center">

                Documento

              </th>


              <th align="center">

                Subir Documento

              </th>

            </tr>

          </thead>



          <tbody>

            <tr>

              <td>Asistencia</td>

              <td><a id="documentoAsitencia" target="_blank"></a></td>

              <td>

                <input type="hidden" id="codigoProyectos" name="codigoProyectos">
                <input type="hidden" id="tipoTramites" name="tipoTramites" />
                <input type="hidden" id="siRespuestas" name="siRespuestas" />
                <input type="hidden" id="idUsuarioRelativo" name="idUsuarioRelativo" />
                <input type="hidden" id="nombrePostulante" name="nombrePostulante" />
                <input type="hidden" id="emailPostulante" name="emailPostulante" />
                <input type="hidden" id="nombreProyecto" name="nombreProyecto" />
                <input type="hidden" id="emailAnalista" name="emailAnalista" />

                <input type="file" id="firmarAsistencia" name="firmarAsistencia">


                <div class="reload__asistencias"></div>
              </td>

            </tr>

            <tr class="notificacion__filas">


            </tr>

            <tr>

              <td colspan="3">
                <center><button class="btn btn-primary" id="firmarEnviarTramites">ENVIAR</button><div class="reload__enmvio__firmantes"></div></center>
              </td>

            </tr>

          </tbody>

        </table>

      </div>

    </div>

  </div>

</div>


<!--====  End of Modal de documentos  ====-->


<!--====  End of Modal de Documentos  ====-->

