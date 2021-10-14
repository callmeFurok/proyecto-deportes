<!--====================================
=            Menu secciones            =
=====================================-->
<?php $directoryURI = $_SERVER['REQUEST_URI'];?>

<?php $path = parse_url($directoryURI, PHP_URL_PATH);?>

<?php $components = explode('proyectosDeportistas2/', $path);?>

<?php $first_part = $components[1];?>

<!--====  End of Menu secciones  ====-->

<li class="nav-item tamanio__navegacion__dasboards">

     <a href="patrocinador" class="nav-link <?php if($first_part=='patrocinador'){echo'active__menu';}else{echo'noActive__menu';}?>">

        <p>PROYECTOS CALIFICADOS</p>

     </a>

</li>

<li class="nav-item tamanio__navegacion__dasboards">

     <a href="salir" class="nav-link">

       	<p>Salir</p>

     </a>

</li>

