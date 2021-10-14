<?php

  $objeto= new usuario();


  $usuario=$objeto->usuarioCtr();
  $rucReconocidos=$objeto->ctrOrganismoRuc();

  $arrayUsuario = explode("___", $usuario);

  $datosGenerales=$objeto->ctrDatosGenerales();
  $arrayDatosGenerales = explode("___", $datosGenerales);

?>

<!--====================================
=            Calculo edades            =
=====================================-->

<?php $usuarioEdades=$objeto->calculoEdadMenoresDeEdad($arrayUsuario[5]);?>

<!--====  End of Calculo edades  ====-->


<!--==================================================
=            Obtener datos representantes            =
===================================================-->

<?php $usuarioDatosRepresentantes=$objeto->obtenerDatasRepresentantes($arrayUsuario[1]);?>

<?php $arrayUsuariosRepresentantes = explode("___", $usuarioDatosRepresentantes);?>


<!--====  End of Obtener datos representantes  ====-->


<!--======================================
=            Datos Personales            =
=======================================-->

 <form id="datosGeneralesFormularios" class="panel-body">

    <!--=====================================================
    =            Contenido Principal formularios            =
    ======================================================-->

    <div class="row d-flex flex-column align-items-center">

      <div class="col col-12 col-md-6">

                        
      <input type="hidden" id="codigoTipoElegido" name="codigoTipoElegido" value="<?= $arrayUsuario[0];?>" />

      <input type="hidden" id="deportistaSeleccionables" name="deportistaSeleccionables" value="<?=$arrayUsuario[14]?>" />

      <?php if ($arrayUsuario[0]==2): ?>

         <div class="row">

            <div class="col-12 text-center top-margenes">

                <?php if ($arrayUsuario[14]=="Organizaciones Deportivas"): ?>

                   <div class="nombre__rotulo__federacion nombre__rotulos__inicios">Organizaciones Deportivas que pertenecen al Sistema Deportivo Nacional</div>
                  
                <?php endif ?>

                <?php if ($arrayUsuario[14]=="Empresas u Organizaciones No Deportivas"): ?>

                   <div class="nombre__rotulo__federacion nombre__rotulos__inicios">Personas jurídicas no pertenecientes al Sistema Deportivo Nacional</div>
                  
                <?php endif ?>
               
                    
            </div>

            <div class="col-12 text-left">

              <div class="nombre__rotulo__federacion">Información Básica</div>
                    
            </div>

         </div>

          <div class="row">

            <div class="col-3">

              <div class="rotulo__referencias estilos__letras__datos">Tipo federación:</div>

              <input type="hidden" id="validacionFederaciones" name="validacionFederaciones" value="<?=$arrayUsuario[14]?>" />
                    
            </div>

            <div class="col-8">

              <select id="entidadEditablesFederaciones" name="entidadEditablesFederaciones" class="obligatorios__datosGenerales">

                <option value="">-Seleccione el tipo de federación-</option>
                <option value="Organizaciones Deportivas">Organizaciones deportivas que pertenecen al sistema deportivo nacional</option>
                <option value="Empresas u Organizaciones No Deportivas">Personas jurídicas no pertenecientes al sistema deportivo nacional</option>

              </select>

            </div>

          </div>

         <div class="row">

            <div class="col-3">

                <div class="rotulo__referencias estilos__letras__datos">Ruc</div>
                    
            </div>

            <div class="col-8">

                <div><?= $arrayUsuario[3]; ?></div>

                <input type="hidden" name="rucOrganismo" id="rucOrganismo" value="<?= $arrayUsuario[3]?>">
                    
            </div>


            <div class="col-12 text-left">

              <div class="nombre__rotulo__federacion">Información de ubicación</div>
                      
            </div>

         </div>

         <div class="row">

            <div class="col-3">

                <div class="rotulo__referencias estilos__letras__datos">Provincia</div>
                  
            </div>

            <div class="col-8">

                <div><?= $arrayUsuario[5]; ?></div>

                <input type="hidden" name="provinciaOrganismo" id="provinciaOrganismo" value="<?= $arrayUsuario[5]?>">
                  
            </div>

         </div>

        <div class="row">

             <div class="col-3">

                <div class="rotulo__referencias estilos__letras__datos">Cantón</div>
                  
             </div>

             <div class="col-8">

                <div><?= $arrayUsuario[6]; ?></div>

                <input type="hidden" name="cantonOrganismo" id="cantonOrganismo" value="<?= $arrayUsuario[6]?>">
                  
             </div>

        </div>

        <div class="row">

          <div class="col-3">

            <div class="rotulo__referencias estilos__letras__datos">Parroquia</div>
                  
          </div>

          <div class="col-8">

            <div><?= $arrayUsuario[7]; ?></div>

            <input type="hidden" name="parroquiaOrganismo" id="parroquiaOrganismo" value="<?= $arrayUsuario[7]?>">
                  
          </div>

        </div>

         <div class="row">

           	<div class="col-3">

                <div class="rotulo__referencias estilos__letras__datos">Calle Principal</div>
                  
           	</div>

           	<div class="col-8">

                <div>

                    <?php if (empty($arrayDatosGenerales[2])): ?>
                          
                       <textarea id="callePrincipal" name="callePrincipal" class="text__areas obligatorios__datosGenerales"><?= $arrayUsuario[9];?></textarea>

                    <?php else: ?>
                          
                       <textarea id="callePrincipal" name="callePrincipal" class="text__areas obligatorios__datosGenerales"><?= $arrayDatosGenerales[2];?></textarea>

                    <?php endif ?>

                        
                </div>
                  
          	 </div>

         </div>

         <div class="row">

            <div class="col-3">

                <div class="rotulo__referencias estilos__letras__datos">Numeración</div>
                  
            </div>

            <div class="col-8 text-left">

                <div>

                  	<?php if (empty($arrayDatosGenerales[4])): ?>

                        <input id="numeracion" name="numeracion" class="numeracion text__areas solo__numero obligatorios__datosGenerales" />
                          
                  	<?php else: ?>
                          
                        <input id="numeracion" name="numeracion" class="numeracion text__areas solo__numero obligatorios__datosGenerales" value="<?= $arrayDatosGenerales[4];?>" />

                  	<?php endif ?>
                       
                        
                </div>
                  
            </div>

          </div>

          <div class="row">

             <div class="col-3">

                <div class="rotulo__referencias estilos__letras__datos">Calle Secundaria</div>
                  
             </div>

             <div class="col-8">

                <div>

                 	<?php if (empty($arrayDatosGenerales[3])): ?>

                       <input id="calleSecundaria" name="calleSecundaria" class="text__areas obligatorios__datosGenerales" />
                          
                 	<?php else: ?>
                          
                       <input id="calleSecundaria" name="calleSecundaria" class="text__areas obligatorios__datosGenerales" value="<?= $arrayDatosGenerales[3];?>"/>

                 	<?php endif ?>

                        
                </div>
                  
             </div>

          </div>

          <div class="row">

            <div class="col-3">

                <div class="rotulo__referencias estilos__letras__datos">Referencia</div>
                  
            </div>

            <div class="col-8">

               	<div>

                   	<?php if (empty($arrayDatosGenerales[5])): ?>

                        <textarea id="referencia" name="referencia" class="text__areas obligatorios__datosGenerales"></textarea>
                          
                   	<?php else: ?>
                          
                        <textarea id="referencia" name="referencia" class="text__areas obligatorios__datosGenerales"><?= $arrayDatosGenerales[5];?></textarea>

                   	<?php endif ?>

               	</div>
                  
            </div>

        </div>

       <?php endif ?>
        
      <!--====  End of Contenido Principal formularios  ====-->

        <?php if ($arrayUsuario[0]==2): ?>

        <div class="row">

            <div class="col-12 text-center top-margenes">

                <div class="nombre__rotulo__federacion">DATOS REPRESENTANTE</div>
                    
            </div>

            <br>

            <div class="col-12 text-left">

              <div class="nombre__rotulo__federacion">Información Básica</div>
                        
            </div>


            <div class="col-3">

                <div class="rotulo__referencias estilos__letras__datos">Nombres y apellidos:</div>
                    
            </div>

            <div class="col-8">

                <div><?= $arrayUsuario[13]; ?></div>

                <input type="hidden" name="nombreRepresentante" id="nombreRepresentante" value="<?= $arrayUsuario[13]?>">
                    
            </div>

             <div class="col-3">

                 <div class="rotulo__referencias estilos__letras__datos">Cédula:</div>
                    
             </div>

             <div class="col-8">

                 <div><?= $arrayUsuario[12]; ?></div>

                 <input type="hidden" name="cedulaRepresentante" id="cedulaRepresentante" value="<?= $arrayUsuario[12]?>">
                    
             </div>


            <div class="col-12 text-left">

              <div class="nombre__rotulo__federacion">Información de ubicación</div>
                        
            </div>


        </div>

        <div class="row">

             <div class="col-3">

                 <div class="rotulo__referencias estilos__letras__datos">Provincia:</div>
                    
             </div>

             <div class="col-8">

                <?php if (empty($arrayDatosGenerales[6])): ?>

                  <select class="form-styling text__errores obligatorio__organismo provincia obligatorios__datosGenerales" id="provinciaActa" name="provinciaActa"></select>
                          
                <?php else: ?>

                  <div><?= $arrayDatosGenerales[16]; ?></div>
                          
                  <input type="hidden" class="form-styling text__errores obligatorio__organismo provincia obligatorios__datosGenerales" id="provinciaActa" name="provinciaActa" value="<?= $arrayDatosGenerales[6]; ?>" />

                <?php endif ?>
                        
             </div>

        </div>

       	<div class="row">

            <div class="col-3">

               <div class="rotulo__referencias estilos__letras__datos">Cantón</div>
                  
            </div>

            <div class="col-8">

              <?php if (empty($arrayDatosGenerales[7])): ?>

                <select class="form-styling text__errores obligatorio__organismo canton obligatorios__datosGenerales" id="cantonActa" name="cantonActa"></select>
                          
              <?php else: ?>

                <div><?= $arrayDatosGenerales[17]; ?></div>
                          
                <input type="hidden" class="form-styling text__errores obligatorio__organismo canton obligatorios__datosGenerales" id="cantonActa" name="cantonActa" value="<?=  $arrayDatosGenerales[7]; ?>"/>

              <?php endif ?>
                  
             </div>


            <div class="col-3">

                <div class="rotulo__referencias estilos__letras__datos">Parroquia</div>
                  
            </div>

            <div class="col-8">

              <?php if (empty($arrayDatosGenerales[8])): ?>

                <select class="form-styling text__errores obligatorio__organismo parroquia obligatorios__datosGenerales" id="parroquiaActa" name="parroquiaActa"></select>
                          
              <?php else: ?>

                <div><?= $arrayDatosGenerales[18]; ?></div>
                          
                <input type="hidden" class="form-styling text__errores obligatorio__organismo canton obligatorios__datosGenerales" id="parroquiaActa" name="parroquiaActa" value="<?=  $arrayDatosGenerales[8]; ?>"/>

              <?php endif ?>

            </div>

        </div>

         <div class="row">

            <div class="col-3">

                <div class="rotulo__referencias estilos__letras__datos">Calle Principal</div>
                  
            </div>

            <div class="col-8">

                <div>

                    <?php if (empty($arrayDatosGenerales[9])): ?>

                       	<textarea id="callePrincipalReprese" name="callePrincipalReprese" class="text__areas obligatorios__datosGenerales"><?= $arrayUsuario[9];?></textarea>
                          
                    <?php else: ?>

                      	<textarea id="callePrincipalReprese" name="callePrincipalReprese" class="text__areas obligatorios__datosGenerales"><?= $arrayDatosGenerales[9];?></textarea>

                    <?php endif ?>

                </div>
                  
            </div>

         </div>

         <div class="row">

            <div class="col-3">

                <div class="rotulo__referencias estilos__letras__datos">Numeración</div>
                  
            </div>

            <div class="col-8">

                <div>

                    <?php if (empty($arrayDatosGenerales[10])): ?>

                       	<input id="numeracionReprese" name="numeracionReprese" class="numeracion text__areas solo__numero obligatorios__datosGenerales" />

                          
                    <?php else: ?>

                      	<input id="numeracionReprese" name="numeracionReprese" class="numeracion text__areas solo__numero obligatorios__datosGenerales" value="<?= $arrayDatosGenerales[10];?>" />

                    <?php endif ?>

                </div>
                  
            </div>


            <div class="col-3">

                <div class="rotulo__referencias estilos__letras__datos">Calle Secundaria</div>
                  
            </div>

            <div class="col-8">

               <div>


                    <?php if (empty($arrayDatosGenerales[11])): ?>

                        <input id="calleSecundariaRepre" name="calleSecundariaRepre" class="text__areas obligatorios__datosGenerales" />

                          
                    <?php else: ?>

                       <input id="calleSecundariaRepre" name="calleSecundariaRepre" class="text__areas obligatorios__datosGenerales" value="<?= $arrayDatosGenerales[11];?>"/>

                    <?php endif ?>


               </div>
                  
            </div>


            <div class="col-3">

                <div class="rotulo__referencias estilos__letras__datos">Referencia</div>
                  
            </div>

             <div class="col-8">

                <div>


                   	<?php if (empty($arrayDatosGenerales[12])): ?>

                        <textarea id="referenciaRepre" name="referenciaRepre" class="text__areas obligatorios__datosGenerales"></textarea>

                   	<?php else: ?>

                       <textarea id="referenciaRepre" name="referenciaRepre" class="text__areas obligatorios__datosGenerales"><?= $arrayDatosGenerales[12];?></textarea>

                   	<?php endif ?>

                       
                </div>
                  
             </div>

        </div>

         <div class="row">
                    
             <div class="col-3">

                <div class="rotulo__referencias estilos__letras__datos">Correo:</div>
                  
             </div>

             <div class="col-8">

                <?php if (empty($arrayDatosGenerales[13])): ?>

                    <div><input type="text" name="correoRepre" id="correoRepre" class="text__areas correoRepre obligatorios__datosGenerales" value="<?= $arrayUsuario[10];?>" /></div>

                <?php else: ?>

                   	<div><input type="text" name="correoRepre" id="correoRepre" class="text__areas correoRepre obligatorios__datosGenerales" value="<?= $arrayDatosGenerales[13];?>" /></div>

                <?php endif ?>

             </div>

             <div class="correoRepreValida col-12"></div>

         </div>

         <div class="row">
                    
            <div class="col-3">

                <div class="rotulo__referencias estilos__letras__datos">Convencional:</div>
                  
            </div>

            <div class="col-8">

               	<?php if (empty($arrayDatosGenerales[14])): ?>

                     <div><input type="text" name="telConvencionalRepre" id="telConvencionalRepre" class="text__areas solo__numero telefono__convencional telefonos__usados obligatorios__datosGenerales"/></div>

               	<?php else: ?>

                    <div><input type="text" name="telConvencionalRepre" id="telConvencionalRepre" class="text__areas solo__numero telefono__convencional telefonos__usados obligatorios__datosGenerales" value="<?= $arrayDatosGenerales[14];?>"/></div>

               	<?php endif ?>

            </div>

            <div class="col-3">

                <div class="rotulo__referencias estilos__letras__datos">Celular:</div>
                  
            </div>

            <div class="col-8">

               	<?php if (empty($arrayDatosGenerales[15])): ?>

                     <div>

                      <input type="text" name="telCelularRepre" id="telCelularRepre" class="text__areas solo__numero telefono__celular telefonos__usados obligatorios__datosGenerales" value="<?= $arrayUsuario[8];?>"/>

                    </div>

               	<?php else: ?>

                    <div>

                      <input type="text" name="telCelularRepre" id="telCelularRepre" class="text__areas solo__numero telefono__celular telefonos__usados obligatorios__datosGenerales" value="<?= $arrayDatosGenerales[15];?>"/>

                    </div>

               	<?php endif ?>


            </div>
                     
         </div>

       	<?php else: ?>

            <div class="col-12 text-center top-margenes">

              <?php if ($arrayUsuario[14]=="Personas Naturales No Deportistas"): ?>

                <div class="nombre__rotulo__federacion nombre__rotulos__inicios">Personas naturales no pertenecientes al Sistema Deportivo Nacional</div>
                
              <?php else: ?>

                <div class="nombre__rotulo__federacion nombre__rotulos__inicios"><?=$arrayUsuario[14]?></div>
                
              <?php endif ?>
                        
            </div>

            <div class="row">

              <div class="col-12">

                <div class="nombre__rotulo__federacion">Información básica</div>
                          
              </div>

            </div>

            <div class="row">

                <div class="col-3">

                   <div class="rotulo__referencias estilos__letras__datos">Tipo deportista:</div>
                    
                </div>

                <div class="col-8">

                  <select class="bligatorios__datosGenerales" id="entidadEditables" name="entidadEditables">

                    <option value="0" >-Seleccione el tipo de solicitante-</option>
                    <option value="Deportista Federado" tipoDos="Deportista Federado">Deportista federado</option>
                    <option value="Deportista No Federado" tipoDos="Deportista No Federado">Deportista no Federado</option>
                    <option value="Personas Naturales No Deportistas" tipoDos="Personas Naturales No Deportistas">Personas naturales no pertenecientes al sistema deportivo nacional</option>
                    <option value="Organizaciones Deportivas" tipoDos="Organizaciones Deportivas">Organizaciones deportivas que pertenecen al sistema deportivo nacional</option>
                    <option value="Empresas u Organizaciones No Deportivas" tipoDos="Empresas u Organizaciones No Deportivas">Personas jurídicas no pertenecientes al sistema deportivo nacional</option>

                  </select>

                </div>

            </div>


            <div class="row">

                <div class="col-3">

                   <div class="rotulo__referencias estilos__letras__datos">Nombres:</div>
                    
                </div>

                <div class="col-8">

                   <?php  $arrayUsuarios = explode(" ", $arrayUsuario[4]);?>

                   <div><?=$arrayUsuarios[2]." ".$arrayUsuarios[3]." ".$arrayUsuarios[0]." ".$arrayUsuarios[1]?></div>

                   <input type="hidden" name="nombreCiudadano" id="nombreCiudadano" value="<?= $arrayUsuario[4]?>" style="width:100%;">
                    
                </div>

            </div>

            <div class="row">

                <div class="col-3">

                   <div class="rotulo__referencias estilos__letras__datos">Cédula:</div>
                    
                </div>

                <div class="col-8">

                   <div><?= $arrayUsuario[3]; ?></div>

                   <input type="hidden" name="cedulaCiudadano" id="cedulaCiudadano" value="<?= $arrayUsuario[3]?>">
                    
                </div>

            </div>

        <div class="col-xs-12 text-left linea__separacion__datos"></div>

        <br>

          <div class="row">

            <div class="col-12">

              <div class="nombre__rotulo__federacion">Información de ubicación</div>
                        
            </div>

          </div>

           <div class="row">

              <div class="col-3">

                <div class="rotulo__referencias estilos__letras__datos">Provincia:&nbsp;</div>
                  
              </div>

              <div class="col-8">

                <div>

                    <?= $arrayUsuario[7]?>
                    <input type="hidden" name="provinciaCiudadano" id="provinciaCiudadano" value="<?= $arrayUsuario[7]?>">

                </div>
                  
              </div>

           </div>

           <div class="row">

              <div class="col-3">

                <div class="rotulo__referencias estilos__letras__datos">Cantón:&nbsp;</div>
                  
              </div>

              <div class="col-8">

                <div>

                  <?= $arrayUsuario[8]?>
                  <input type="hidden" name="cantonCiudadano" id="cantonCiudadano" value="<?= $arrayUsuario[8]?>">

                </div>
                  
              </div>             

           </div>

            <div class="row">

                <div class="col-3">

                    <div class="rotulo__referencias estilos__letras__datos">Parroquia:&nbsp;</div>
                  
                </div>

                <div class="col-8">

                    <div>
                        <?= $arrayUsuario[9]?>
                       <input type="hidden" name="parroquiaCiudadano" id="parroquiaCiudadano" value="<?= $arrayUsuario[9]?>">
                    </div>
                  
                </div>

            </div>

             <div class="row">

               	<div class="col-3">

                   	<div class="rotulo__referencias estilos__letras__datos">Calle Principal</div>
                  
               	</div>

               	<div class="col-8">

                  <?php if (empty($arrayDatosGenerales[0])): ?>

                    <textarea id="callePrincipalCiudadano" name="callePrincipalCiudadano" class="text__areas obligatorios__datosGenerales"><?= $arrayUsuario[9];?></textarea>

                  <?php else: ?>

                    <textarea id="callePrincipalCiudadano" name="callePrincipalCiudadano" class="text__areas obligatorios__datosGenerales"><?= $arrayDatosGenerales[0];?></textarea>

                  <?php endif ?>
                  
               	</div>

             </div>

             <div class="row">

                <div class="col-3">

                    <div class="rotulo__referencias estilos__letras__datos">Numeración</div>
                  
                </div>

                <div class="col-8">

                    <div>

                       <?php if (empty($arrayDatosGenerales[1])): ?>

                           <input id="numeracionCiudadao" name="numeracionCiudadao" class="numeracion text__areas solo__numero obligatorios__datosGenerales" />

                       <?php else: ?>

                          <input id="numeracionCiudadao" name="numeracionCiudadao" class="numeracion text__areas solo__numero obligatorios__datosGenerales" value="<?= $arrayDatosGenerales[1];?>" />

                       <?php endif ?>

                        
                    </div>
                  
                </div>

              </div>

              <div class="row">

                <div class="col-3">

                    <div class="rotulo__referencias estilos__letras__datos">Calle Secundaria</div>
                  
                </div>

                <div class="col-8">

                    <div>

                       <?php if (empty($arrayDatosGenerales[2])): ?>

                           <input id="calleSecundariaCiudadano" name="calleSecundariaCiudadano" class="text__areas obligatorios__datosGenerales" />

                       <?php else: ?>

                          <input id="calleSecundariaCiudadano" name="calleSecundariaCiudadano" class="text__areas obligatorios__datosGenerales" value="<?= $arrayDatosGenerales[2]?>" />

                       <?php endif ?>
                      
                    </div>
                  
                </div>

              </div>

              <div class="row">

                <div class="col-3">

                    <div class="rotulo__referencias estilos__letras__datos">Referencia</div>
                  
                </div>

                 <div class="col-8">

                    <div>

                       <?php if (empty($arrayDatosGenerales[3])): ?>

                            <textarea id="referenciaCiudadano" name="referenciaCiudadano" class="text__areas obligatorios__datosGenerales"></textarea>

                       <?php else: ?>

                           <textarea id="referenciaCiudadano" name="referenciaCiudadano" class="text__areas obligatorios__datosGenerales"><?= $arrayDatosGenerales[3]?></textarea>

                       <?php endif ?>

                    </div>
                  
                 </div>

            </div>

            <div class="row">
                    
                <div class="col-3">

                  <div class="rotulo__referencias estilos__letras__datos">Correo:</div>
                  
                </div>

                <div class="col-8">
                      
                    <?php if (empty($arrayDatosGenerales[4])): ?>

                        <div><input type="text" name="correoCiudadano" id="correoCiudadano" class="text__areas correo__ciudadano obligatorios__datosGenerales" value="<?= $arrayUsuario[12];?>"/></div>

                    <?php else: ?>

                        <div><input type="text" name="correoCiudadano" id="correoCiudadano" class="text__areas correo__ciudadano obligatorios__datosGenerales" value="<?= $arrayDatosGenerales[4];?>"/></div>

                    <?php endif ?>

                </div>

                <div class="correoCiudadanoValida col-12"></div>

            </div>

            <div class="row">
                    
                <div class="col-3">

                  	<div class="rotulo__referencias estilos__letras__datos">Convencional:</div>
                  
                </div>

                <div class="col-8">

                    <?php if (empty($arrayDatosGenerales[5])): ?>

                        <div><input type="text" name="telCiudadano" id="telCiudadano" class="text__areas solo__numero telefono__convencional telefonos__usados obligatorios__datosGenerales"/></div>

                    <?php else: ?>

                        <div><input type="text" name="telCiudadano" id="telCiudadano" class="text__areas solo__numero telefono__convencional telefonos__usados obligatorios__datosGenerales" value="<?= $arrayDatosGenerales[5];?>"/></div>

                    <?php endif ?>

                 
                </div>

            </div> 

            <div class="row">

                <div class="col-3">

                    <div class="rotulo__referencias estilos__letras__datos">Celular:</div>
                  
                </div>

                <div class="col-8">

                   	<div>

                       <?php if (empty($arrayDatosGenerales[6])): ?>

                           <input type="text" name="telCelularCiudadano" id="telCelularCiudadano" class="text__areas solo__numero telefono__celular telefonos__usados obligatorios__datosGenerales" value="<?= $arrayUsuario[10];?>"/>

                       <?php else: ?>

                           <input type="text" name="telCelularCiudadano" id="telCelularCiudadano" class="text__areas solo__numero telefono__celular telefonos__usados obligatorios__datosGenerales" value="<?= $arrayDatosGenerales[6];?>"/>

                       <?php endif ?>

                   	</div>
                  
                </div>
                     
              </div>

            <?php if ($arrayUsuario[14]=="Deportista Federado"): ?>
              
             <div class="row">

                  <div class="col-3">

                      <div class="rotulo__referencias estilos__letras__datos">Nombre Organismo:</div>
                    
                  </div>

                  <div class="col-8">

                      <div>

                         <?php if (empty($arrayUsuario[16])): ?>

                             <input type="text" name="nombreOrganismoPertenece" id="nombreOrganismoPertenece" class="text__areas obligatorios__datosGenerales"/>

                         <?php else: ?>

                             <input type="text" name="nombreOrganismoPertenece" id="nombreOrganismoPertenece" class="text__areas obligatorios__datosGenerales" value="<?= utf8_encode($arrayUsuario[16])?>"/>

                         <?php endif ?>

                      </div>
                    
                  </div>
                       
                </div>

                <div class="row">

                  <div class="col-3">

                      <div class="rotulo__referencias estilos__letras__datos">Fecha en la que se federó el deportista:</div>
                    
                  </div>

                  <div class="col-8">

                      <div>

                         <?php if (empty($arrayUsuario[15])): ?>

                             <input type="date" name="fechaFederoDeportista" id="fechaFederoDeportista" class="text__areas obligatorios__datosGenerales"/>

                         <?php else: ?>

                             <input type="date" name="fechaFederoDeportista" id="fechaFederoDeportista" class="text__areas obligatorios__datosGenerales" value="<?= $arrayUsuario[15];?>"/>

                         <?php endif ?>

                      </div>
                    
                  </div>
                       
                </div>

            <?php endif ?>

            <!--=====================================
            =            Menores de edad            =
            ======================================-->
            
            <?php if (intval($usuarioEdades)<18 || $arrayUsuario[17]=="si"): ?>

              <input type="hidden" id="menorEdad" name="menorEdad" value="si" />


              <div class="row">

                <div class="col-12">

                  <div class="nombre__rotulo__federacion">Datos representante legal</div>
                            
                </div>

              </div>   


              <div class="row">

                  <div class="col-3">

                     <div class="rotulo__referencias estilos__letras__datos">Cédula:</div>
                      
                  </div>

                  <div class="col-8">

                     <div><?=$arrayUsuariosRepresentantes[1]?></div>

                     <input type="hidden" name="representanteLegalCedulaAtletas" id="representanteLegalCedulaAtletas" value="<?= $arrayUsuariosRepresentantes[1]?>" style="width:100%;">
                      
                  </div>

              </div>
              
              <div class="row">

                  <div class="col-3">

                     <div class="rotulo__referencias estilos__letras__datos">Nombres:</div>
                      
                  </div>

                  <div class="col-8">

                     <div><?=$arrayUsuariosRepresentantes[2]?></div>

                     <input type="hidden" name="representanteLegalAtletas" id="representanteLegalAtletas" value="<?= $arrayUsuariosRepresentantes[2]?>" style="width:100%;">
                      
                  </div>

              </div>

              <div class="col-xs-12 text-left linea__separacion__datos"></div>

              <br>

              <div class="row">

                <div class="col-12">

                  <div class="nombre__rotulo__federacion">Información de ubicación</div>
                            
                </div>

              </div>   

             <div class="row">

                <div class="col-3">

                  <div class="rotulo__referencias estilos__letras__datos">Provincia:&nbsp;</div>
                    
                </div>

                <div class="col-8">

                  <div>

                      <?= $arrayUsuariosRepresentantes[13]?>
                      <input type="hidden" name="provinciaFederacionRepresentanteAtletas" id="provinciaFederacionRepresentanteAtletas" value="<?= $arrayUsuariosRepresentantes[6]?>">

                  </div>
                    
                </div>

             </div>

             <div class="row">

                <div class="col-3">

                  <div class="rotulo__referencias estilos__letras__datos">Cantón:&nbsp;</div>
                    
                </div>

                <div class="col-8">

                  <div>

                    <?= $arrayUsuariosRepresentantes[14]?>
                    <input type="hidden" name="cantonFederacionRepresentanteAtletas" id="cantonFederacionRepresentanteAtletas" value="<?= $arrayUsuariosRepresentantes[7]?>">

                  </div>
                    
                </div>             

             </div>

            <div class="row">

                <div class="col-3">

                    <div class="rotulo__referencias estilos__letras__datos">Parroquia:&nbsp;</div>
                  
                </div>

                <div class="col-8">

                    <div>
                        <?= $arrayUsuariosRepresentantes[15]?>
                       <input type="hidden" name="parroquiaFederacionRepresentanteAtletas" id="parroquiaFederacionRepresentanteAtletas" value="<?= $arrayUsuariosRepresentantes[8]?>">
                    </div>
                  
                </div>

            </div>

             <div class="row">

                <div class="col-3">

                    <div class="rotulo__referencias estilos__letras__datos">Calle Principal:</div>
                  
                </div>

                <div class="col-8">

                    <textarea id="calleprincipalRepresentanteAtletas" name="calleprincipalRepresentanteAtletas" class="text__areas obligatorios__datosGenerales"><?= $arrayUsuariosRepresentantes[9];?></textarea>
                  
                </div>

             </div>

             <div class="row">

                <div class="col-3">

                    <div class="rotulo__referencias estilos__letras__datos">Numeración:</div>
                  
                </div>

                <div class="col-8">

                    <textarea id="numeracionRepresentanteAtletas" name="numeracionRepresentanteAtletas" class="text__areas obligatorios__datosGenerales"><?= $arrayUsuariosRepresentantes[11];?></textarea>
                  
                </div>

             </div>

             <div class="row">

                <div class="col-3">

                    <div class="rotulo__referencias estilos__letras__datos">Calle Secundaria:</div>
                  
                </div>

                <div class="col-8">

                    <textarea id="callesecundariaRepresentanteAtletas" name="callesecundariaRepresentanteAtletas" class="text__areas obligatorios__datosGenerales"><?= $arrayUsuariosRepresentantes[10];?></textarea>
                  
                </div>

             </div>

              <div class="row">

                <div class="col-3">

                    <div class="rotulo__referencias estilos__letras__datos">Referencia:</div>
                  
                </div>

                 <div class="col-8">

                    <textarea id="referenciaRepresentanteAtletas" name="referenciaRepresentanteAtletas" class="text__areas obligatorios__datosGenerales"><?= $arrayUsuariosRepresentantes[12]?></textarea>
                  
                 </div>

              </div>

              <div class="row">

                <div class="col-3">

                    <div class="rotulo__referencias estilos__letras__datos">Correo:</div>
                  
                </div>

                 <div class="col-8">

                    <textarea id="emailRepresentanteAtletas" name="emailRepresentanteAtletas" class="text__areas obligatorios__datosGenerales"><?= $arrayUsuariosRepresentantes[5]?></textarea>
                  
                 </div>

              </div>              

              <div class="row">

                <div class="col-3">

                    <div class="rotulo__referencias estilos__letras__datos">Convencional:</div>
                  
                </div>

                 <div class="col-8">

                    <textarea id="telefonoRepresentanteAtletas" name="telefonoRepresentanteAtletas" class="text__areas obligatorios__datosGenerales"><?= $arrayUsuariosRepresentantes[4]?></textarea>
                  
                 </div>

              </div>       

              <div class="row">

                <div class="col-3">

                    <div class="rotulo__referencias estilos__letras__datos">Celular:</div>
                  
                </div>

                 <div class="col-8">

                    <textarea id="celularAtletasRepresentantes" name="celularAtletasRepresentantes" class="text__areas obligatorios__datosGenerales"><?= $arrayUsuariosRepresentantes[3]?></textarea>
                  
                 </div>

              </div>      

            <?php else: ?>

              <input type="hidden" id="menorEdad" name="menorEdad" value="no" />
              
            <?php endif ?>            
            
            <!--====  End of Menores de edad  ====-->

           <?php endif ?>

           	<br>

            <div class="row">

              <div class="col-12 text-center">

                <button type="button" id="enviarDatosGenerales" name="enviarDatosGenerales" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;GUARDAR</button>

                <div class="enviarDatosGenerales__reload"></div>

              </div>

            </div>

      </div>

    </div>

 </form>

<!--====  End of Datos Personales  ====-->
