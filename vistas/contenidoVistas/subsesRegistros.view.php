<?php $plantilla= new plantilla();?>


<!--===========================
=            Aside            =
============================-->
<?php $plantilla->componentesDasboard(1);?>
<!--====  End of Aside  ====-->

<!--=======================================
=            Sección Principal            =
========================================-->

<div class="main-header">

  <div class="container-fluid">
    
    <div class="contenedor__tabla">

      <table id="tablaProyectosSubsecretrarios" name="tablaProyectosSubsecretrarios" class="cell-border" border="2">

          <thead> 

              <tr> 

                  <th class="tamanio__fuente__enfasis__tablas">Código<br>de Proyecto</th>
                  <th class="tamanio__fuente__enfasis__tablas">Nombre de<br>Beneficiario</th>
                  <th class="tamanio__fuente__enfasis__tablas">Número de<br>Identificación</th>
                  <th class="tamanio__fuente__enfasis__tablas">Descripción<br>del proyecto</th>
                  <th class="tamanio__fuente__enfasis__tablas">Categoría</th>
                  <th class="tamanio__fuente__enfasis__tablas">Monto</th>
                  <th class="tamanio__fuente__enfasis__tablas">Fecha de<br>Calificación</th>
                  <th class="tamanio__fuente__enfasis__tablas">Fecha Inicio<br>de ejecución</th>
                  <th class="tamanio__fuente__enfasis__tablas">Reasignar</th>
                  <th class="tamanio__fuente__enfasis__tablas">Documentación</th>

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

