<?php $plantilla= new plantilla();?>

<?php $usuario= new usuario();?>


<!--===========================
=            Aside            =
============================-->
<?php $plantilla->componentesDasboard(1);?>

<?php $funcionarios=$usuario->ctrFuncionarios();?>

<!--====  End of Aside  ====-->


<?php $array = explode("___", $funcionarios);?>
<!--=======================================
=            Secciòn Principal            =
========================================-->

<input type="hidden" id="fisicamenteVariables" name="fisicamenteVariables" value="<?=$array[3]?>">
<input type="hidden" id="idRealizadosVariables" name="idRealizadosVariables" value="<?=$array[0]?>">

<div class="main-header">

  <div class="container-fluid">

      <table id="tablaProyectosDirectoresComponentes" name="tablaProyectosDirectoresComponentes" class="cell-border" border="2">

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

            </tr>

         </thead> 

      </table>

  </div>

</div>

<!--====  End of Secciòn Principal  ====-->


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

        <button type="button" class="close close__funcionarios" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
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

         <tr class="fila__descalificar__proyecto__comentarios">

            <td>

              FACTURA&nbsp;<div class="monto__presupuestado__Dado"></div>

            </td>

            <td>

                <a id="contratoCargado" target="_blank"></a>

            </td>

         </tr>

         <tr class="fila__descalificar__proyecto__comentarios">

            <td>

              CALIFICAR

            </td>

            <td>

              <div style="display:flex;">

                Si&nbsp;<input type="radio" name="calificarContrato" value="si" class="check__estilos__lineas">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                No&nbsp;<input type="radio" name="calificarContrato" value="no" class="check__estilos__lineas">
              </div>
              <textarea id="comentarioNegativo" placeholder="escribir el proque rechaza el contrato" style="width:100%;"></textarea>

            </td>

         </tr>

         <tr class="fila__descalificar__proyecto__comentarios">

          <td colspan="2"><center><button class="btn btn-primary" id="enviarCalificarContrato">ENVIAR</button><div class="reload__observaciones"></div><div class="observaciones__calificas"></div></center></td>

         </tr>

         <tr>

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

        <button type="button" class="close close__funcionarios" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
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

          <?php if ($array[3]=="22"): ?>

          <tr>

            <td>

              Proyecto

            </td>

            <td>

              <center><a id="proyectoVista" target="_blank">proyecto.pdf</a></center>

            </td>

            <td>

              <center><input type="radio"  name="radioProyecto" class="check__estilos__lineas radioProyecto" value="si"></center>

            </td>

            <td>

              <center><input type="radio" name="radioProyecto" class="check__estilos__lineas radioProyecto" value="no"><br><textarea id="observacionNegativaProyecto" style="width:100%;"></textarea></center>

            </td>

          </tr>

          <?php endif ?>


          <?php if ($array[3]=="11"): ?>

          <tr>

            <td>

              Proyecto

            </td>

            <td>

              <center><a id="proyectoVista" target="_blank">proyecto.pdf</a></center>

            </td>

            <td>

              <center><input type="radio"  name="radioProyectoComuni" class="check__estilos__lineas radioProyectoComunicacion" value="si"></center>

            </td>

            <td>

              <center><input type="radio" name="radioProyectoComuni" class="check__estilos__lineas radioProyectoComunicacion" value="no"><br><textarea id="observaNegativaComuni" style="width:100%;"></textarea></center>

            </td>

          </tr>

          <?php endif ?>


          <?php if ($array[3]=="15"): ?>
          	
	          <tr>

	            <td>

	              Proyecto Infraestructura

	            </td>

	            <td>

	              <center><a id="proyectoInfraestructura" target="_blank">proyectoInfraestructura.pdf</a></center>

	            </td>

	            <td>

	              <center><input type="radio"  name="radioInfraestructura" class="check__estilos__lineas radioInfraestructura" value="si"></center>

	            </td>

	            <td>

	              <center><input type="radio" name="radioInfraestructura" class="check__estilos__lineas radioInfraestructura" value="no"><br><textarea id="observacionNegativaProyectoInfras" style="width:100%;"></textarea></center>

	            </td>

	          </tr>


	          <tr>

	            <td>

	              Certificado Propiedad

	            </td>

	            <td>

	              <center><a id="certificadoPropiedad" target="_blank">certificadoPropiedad.pdf</a></center>

	            </td>

	            <td>

	              <center><input type="radio" name="certificadoPropiedadC" class="check__estilos__lineas certificadoPropiedadC" value="si"></center>

	            </td>

	            <td>

	              <center><input type="radio" name="certificadoPropiedadC" class="check__estilos__lineas certificadoPropiedadC" value="no"><br><textarea id="observacionNegativaCertificadoPropiedad" style="width:100%;"></textarea></center>

	            </td>

	          </tr>

	          <tr>

	            <td>

	              Memoria arquitectonica

	            </td>

	            <td>

	              <center><a id="memoriaArquitectonicas" target="_blank">memoriaArquitectonicas.pdf</a></center>

	            </td>

	            <td>

	              <center><input type="radio" name="memoriaArquitectonica" class="check__estilos__lineas memoriaArquitectonica" value="si"></center>

	            </td>

	            <td>

	              <center><input type="radio" name="memoriaArquitectonica" class="check__estilos__lineas memoriaArquitectonica" value="no"><br><textarea id="observacionNegativaMemoriaArquitectonica" style="width:100%;"></textarea></center>

	            </td>

	          </tr>


	          <tr>

	            <td>

	              Presupuesto Rubro

	            </td>

	            <td>

	              <center><a id="presupuestoRubro" target="_blank">presupuestoRubro.pdf</a></center>

	            </td>

	            <td>

	              <center><input type="radio" name="presupuestoRubroChecked" class="check__estilos__lineas presupuestoRubroChecked" value="si"></center>

	            </td>

	            <td>

	              <center><input type="radio" name="presupuestoRubroChecked" class="check__estilos__lineas presupuestoRubroChecked" value="no"><br><textarea id="observacionNegativaPresupuestoRubro" style="width:100%;"></textarea></center>

	            </td>

	          </tr>

	          <tr>

	            <td>

	              Cronograma Valorado

	            </td>

	            <td>

	              <center> <a id="cronogramasValorados" target="_blank">cronogramaValorados.pdf</a></center>

	            </td>

	            <td>

	              <center><input type="radio" name="cronogramasValoradosChecked" class="check__estilos__lineas cronogramasValoradosChecked" value="si"></center>

	            </td>

	            <td>

	              <center><input type="radio" name="cronogramasValoradosChecked" class="check__estilos__lineas cronogramasValoradosChecked" value="no"><br><textarea id="observacionNegativaCronogramaValorado" style="width:100%;"></textarea></center>

	            </td>

	          </tr>

	          <tr>

	            <td>

	              Respaldos Digitales

	            </td>

	            <td>

	              <center><a id="respaldosDigitales" target="_blank">respaldosDigitales.pdf</a></center>

	            </td>

	            <td>

	              <center><input type="radio" name="respaldosDigitaChecked" class="check__estilos__lineas respaldosDigitaChecked" value="si"></center>

	            </td>

	            <td>

	              <center><input type="radio" name="respaldosDigitaChecked" class="check__estilos__lineas respaldosDigitaChecked" value="no"><br><textarea id="observacionNegativaRespaldosDigitales" style="width:100%;"></textarea></center>

	            </td>

	          </tr>


          <?php endif ?>

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



<!--====  End of Modales  ====-->