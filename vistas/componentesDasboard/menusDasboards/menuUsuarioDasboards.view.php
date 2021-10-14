
<!--====================================
=            Variables menú           =
=====================================-->

<?php $proyectos= new usuariosConsultados(); ?>

<?php $codigoRenderizados=$proyectos->selectorDeCodigos();?>

<?php $proyectoPostulado=$proyectos->codigoIngresadosInfras($codigoRenderizados);?>

<!--====  End of Variables menú  ====-->

<!--==========================================
=            Variables Alineación            =
===========================================-->

<?php $objeto= new usuario();?>

<?php $alineacion=$objeto->ctrAlineacion($codigoRenderizados);?>

<?php $arrayAlineacion = explode("___", $alineacion);?>

<!--====  End of Variables Alineación  ====-->


<?php $proyectosDatosGenerales=$objeto->ctrProyectosFunciones($codigoRenderizados);?>

<?php $arrayProyectosDatos = explode("___", $proyectosDatosGenerales);?>

<!--==========================================
=            Instancia Construida            =
===========================================-->

<?php $instancia=$objeto->ctrInstanciaTraidasComparadores($codigoRenderizados);?>

<?php $arrayInstancias = explode("____", $instancia);?>


<!--====  End of Instancia Construida  ====-->


<!--====================================
=            Menu secciones            =
=====================================-->
<?php $directoryURI = $_SERVER['REQUEST_URI'];?>

<?php $path = parse_url($directoryURI, PHP_URL_PATH);?>

<?php $components = explode('proyectosDeportistas2/', $path);?>

<?php $first_part = $components[1];?>

<!--====  End of Menu secciones  ====-->


<!--=========================================
=            Variables necesrias            =
==========================================-->

<?php $variableRequestMenu= $_SERVER['REQUEST_URI'];?>

<?php $arrayResquest= explode("?contenido=", $variableRequestMenu);?>

<!--====  End of Variables necesrias  ====-->

<li class="nav-item tamanio__navegacion__dasboards">

     <a href="datosGeneralesPrincipal" class="nav-link <?php if($first_part=='datosGeneralesPrincipal'){echo'active__menu';}else{echo'noActive__menu';}?>">
        
        <p>Datos Generales</p>

     </a>

</li>

<?php if (empty($proyectoPostulado)): ?>
  
<li class="nav-item tamanio__navegacion__dasboards">

     <a href="proyectoCrear" class="nav-link <?php if($first_part=='proyectoCrear'){echo'active__menu';}else{echo'noActive__menu';}?>">

        <p>Crear Proyecto</p>

     </a>

</li>  

<?php else: ?>
  
<li class="nav-item">

    <a href="#" class="nav-link menu__principal menu__principal__crear">

        <p>

            Crear Proyecto
            <i class="right fas fa-angle-left"></i>

        </p>

    </a>

    <ul class="nav nav-treeview sub__menus__principales sub__menus__usuarios">

        <li class="nav-item">

            <a id="datosIniciales" href="datosGenerales?contenido=14" class="nav-link" <?php if($arrayResquest[1]=='14'){echo 'style="background:#F6BB1B!important"';}?>>

                <p>Sector al que contribuye el proyecto</p>

            </a>

        </li>


        <li class="nav-item">

            <a id="datosIniciales" href="datosGenerales?contenido=2" class="nav-link" <?php if($arrayResquest[1]=='2'){echo 'style="background:#F6BB1B!important"';}?>>

                <p>Información general del proyecto</p>

            </a>

        </li>

            
        <li class="nav-item">

            <a id="datosIniciales" href="datosGenerales?contenido=4" class="nav-link" <?php if($arrayResquest[1]=='4'){echo 'style="background:#F6BB1B!important"';}?>>

                <p>Caracterización</p>

            </a>

        </li>


        <li class="nav-item">

            <a id="datosIniciales" href="datosGenerales?contenido=7" class="nav-link" <?php if($arrayResquest[1]=='7'){echo 'style="background:#F6BB1B!important"';}?>>

                <p>Metas</p>

            </a>

        </li>

        <?php if (empty($arrayProyectosDatos[0])): ?>
            

        <li class="nav-item">

            <a id="datosIniciales" href="#" class="nav-link" <?php if($arrayResquest[1]=='13'){echo 'style="background:#F6BB1B!important"';}?>>

                <p>Componentes<br>(ingresar sección Información general del proyecto)</p>

            </a>

        </li>

        <?php else: ?>
            
        <li class="nav-item">

            <a id="datosIniciales" href="datosGenerales?contenido=13" class="nav-link" <?php if($arrayResquest[1]=='13'){echo 'style="background:#F6BB1B!important"';}?>>

                <p>Componentes</p>

            </a>

        </li>

        <?php endif ?>


        <li class="nav-item">

            <a id="datosIniciales" href="datosGenerales?contenido=9" class="nav-link" <?php if($arrayResquest[1]=='9'){echo 'style="background:#F6BB1B!important"';}?>>

                <p>Beneficiarios</p>

            </a>

        </li>


        <li class="nav-item">

            <a id="datosIniciales" href="datosGenerales?contenido=10" class="nav-link" <?php if($arrayResquest[1]=='10'){echo 'style="background:#F6BB1B!important"';}?>>

                <p>Metodología</p>

            </a>

        </li>



        <li class="nav-item">

            <a id="datosIniciales" href="datosGenerales?contenido=11" class="nav-link" <?php if($arrayResquest[1]=='11'){echo 'style="background:#F6BB1B!important"';}?>>

                <p>Documentos Anexos</p>

            </a>

        </li>

        <li class="nav-item">

            <a id="datosIniciales" href="datosGenerales?contenido=12" class="nav-link" <?php if($arrayResquest[1]=='12'){echo 'style="background:#F6BB1B!important"';}?>>

                <p>Enviar Proyecto</p>

            </a>

        </li>


    </ul>

</li>

<?php endif ?>

<li class="nav-item tamanio__navegacion__dasboards">

     <a href="proyectosUsuarios" class="nav-link <?php if($first_part=='proyectosUsuarios'){echo'active__menu';}else{echo'noActive__menu';}?>">

       	<p>Estado de Proyectos</p>

     </a>

</li>

<li class="nav-item tamanio__navegacion__dasboards">

     <a href="salir" class="nav-link">

       	<p>Salir</p>

     </a>

</li>

