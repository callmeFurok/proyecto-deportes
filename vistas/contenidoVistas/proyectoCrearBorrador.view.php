<!--=================================================
=            Declaración de la plantilla            =
==================================================-->
<?php $plantilla= new plantilla();?>
<?php $usuariosConsultados= new usuariosConsultados();?>
<!--====  End of Declaración de la plantilla  ====-->

<!--==========================================
=            Asignación variables            =
===========================================-->

<?php $arrayUsuario=$usuariosConsultados->plantillaUsuariosModelos();?>

<!--====  End of Asignación variables  ====-->


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

        <div class="row">

          <div class="col-12 letras__selecciones text-center">

            Seleccione el tipo de proyecto que desea crear

          </div>

          <br>
          <br>

          <div class="col-12 letras__selecciones text-center">

            <?php if ($arrayUsuario[0]==2): ?>
                
              <select id="tipoTramiteEscogidoModal" name="tipoTramiteEscogidoModal" class="validadores__campos__completos seleccionadorDeDocumentos" validador="3">

                <option value="">--Seleccione el tipo de trámite--</option>
                <option value="alto">Deporte de Alto Rendimiento</option>
                <option value="alto2"> Deporte de Alto Rendimiento para personas con discapacidad</option>
                <option value="profesional">Deporte Profesional</option>
                <option value="formativo">Deporte Formativo</option>
                <option value="estudiantil">Educación Física</option> 
                <option value="recreativo">Recreación</option>
                                    
              </select>

            <?php endif ?>

            <?php if ($arrayUsuario[0]==3): ?>
                
              <select id="tipoTramiteEscogidoModal" name="tipoTramiteEscogidoModal" class="validadores__campos__completos seleccionadorDeDocumentos" validador="3">

                <option value="">--Seleccione el tipo de trámite--</option>
                <option value="altoRendimiento">Deporte de Alto Rendimiento</option>
                <option value="altoRendimientoDiscapacidad">Deporte de Alto Rendimiento para personas con discapacidad</option>
                <option value="profesional">Deporte Profesional</option>
                <option value="formativo">Deporte Formativo</option>
                <option value="estudiantil">Educación Física</option>
                <option value="recreativo">Recreación</option>
                
              </select>

            <?php endif ?>
              
          </div>

          <br>
          <br>

          <div>


          </div>

          <br>
          <br>

          <div class="row">
            
            <div class="col-12 text-justify explicacion__componentes"></div>

          </div>

          <div class="col-12 letras__selecciones text-center documentos__necesarios">

            DOCUMENTOS NECESARIOS PARA PRESENTAR EL PROYECTO

          </div>

          <br>
          <br>

          <?php if ($arrayUsuario[0]==3): ?>

            <!--====================================
            =            Campos Ocultos            =
            =====================================-->
            
            <input type="hidden" name="codigoCreacion" id="codigoCreacion" value="<?=$arrayUsuario[13]?>">
            
            <!--====  End of Campos Ocultos  ====-->
            
            
            <!--=========================================
            =            Usuarios Necesarios            =
            ==========================================-->
            
            <div class="documentos__anexos__presentar">

              <div class="col-12 documentos__necesarios">

               <span class="enfacis__celdas">1.-</span> Proyecto

              </div>

              <br>

              <div class="col-12 documentos__necesarios letras__infras">

                <span class="enfacis__celdas">2.-</span><span class="letra__infra__compuestas"></span>

              </div>

              <br>

              <div class="col-12 documentos__necesarios alto__rendimiento__necesarios">

               <span class="enfacis__celdas">3.-</span> Certificado de la federación o liga profesional

              </div>

              <br>

              <div class="col-12 documentos__necesarios alto__rendimiento__necesarios">

                En caso de no poseer certificado puede presentar:

              </div>

              <br>

              <div class="col-12 documentos__necesarios alto__rendimiento__necesarios">

                <ul class="alto__rendimiento__necesarios ul__documentos">

                  <li style="position:relative; top:-1em;">Respuesta del organismo superior (Comité Olímpico Ecuatoriano, o Comité Paralímpico Ecuatoriano, o Federación Deportiva Nacional del Ecuador), de ser el caso <span class="enfacis__celdas">o</span>;</li>
                  <li style="position:relative; top:-1em;">La solicitud de certificación realizada a la federación</li>

                </ul>

              </div>

              <br>

              <div class="col-12 documentos__necesarios alto__rendimiento__necesarios">

                <span class="enfacis__celdas">4.-</span> AVAL

              </div>

              <br>

              <div class="col-12 documentos__necesarios alto__rendimiento__necesarios">

                En caso de no poseer AVAL puede presentar:

              </div>

              <br>

              <div class="col-12 documentos__necesarios alto__rendimiento__necesarios">

                <ul class="alto__rendimiento__necesarios ul__documentos">

                  <li style="position:relative; top:-1em;">La respuesta del organismo superior (Comité Olímpico Ecuatoriano, o Comité Paralímpico Ecuatoriano, o Federación Deportiva Nacional del Ecuador), de ser el caso <span class="enfacis__celdas">o</span>;</li>
                  <li style="position:relative; top:-1em;">La solicitud de aval realizada a la federación</li>

                </ul>

              </div>

            </div>            
            
            <!--====  End of Usuarios Necesarios  ====-->

          <?php else: ?>
            
            <!--====================================
            =            Campos Ocultos            =
            =====================================-->
            
            <input type="hidden" name="codigoCreacion" id="codigoCreacion" value="<?=$arrayUsuario[11]?>">
            
            <!--====  End of Campos Ocultos  ====-->

            <!--================================
            =            Organismos            =
            =================================-->
            <div class="documentos__anexos__presentar">

              <div class="col-12 documentos__necesarios">

                <span class="enfacis__celdas">1.-</span> Proyecto

              </div>

              <br>

              <div class="col-12 documentos__necesarios letras__infras">

                <span class="enfacis__celdas">2.-</span><span class="letra__infra__compuestas"></span>

              </div>

              <br>

              <div class="col-12 documentos__necesarios alto__rendimiento__necesarios">

                <span class="enfacis__celdas">3.-</span> AVAL

              </div>

              <br>

              <div class="col-12 documentos__necesarios alto__rendimiento__necesarios">

                En caso de no poseer AVAL puede presentar:

              </div>

              <br>

              <div class="col-12 documentos__necesarios alto__rendimiento__necesarios">

                <ul class="alto__rendimiento__necesarios ul__documentos" style="position:relative; top:-1em;">

                  <li style="position:relative; top:-1em;">La respuesta del organismo superior (Comité Olímpico Ecuatoriano, o Comité Paralímpico Ecuatoriano, o Federación Deportiva Nacional del Ecuador), de ser el caso <span class="enfacis__celdas">o</span>;</li>
                  <li style="position:relative; top:-1em;">La solicitud de aval realizada a la federación</li>

                </ul>

              </div>

            </div>         
              
            <!--====  End of Organismos  ====-->
            

          <?php endif ?>

          <div class="col-12 text-center">

            <button class="btn btn-primary documentos__necesarios" id="crearProyecto" name="crearProyecto"><i class="far fa-share-square"></i>&nbsp;CREAR PROYECTO</button>

            <div class="reload__creacion__proyecto"></div>

          </div>

        </div>

  </div>

</div>

<!--====  End of Sección Principal  ====-->

