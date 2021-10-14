<?php $plantilla= new plantilla(); ?>

<!--================================================
=            Sección navar del Dasboard            =
=================================================-->

<?php $plantilla->componentesDasboard(4);?>

<!--====  End of Sección navar del Dasboard  ====-->

<!--========================================
=            Dasboard Principal            =
=========================================-->

<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="https://www.deporte.gob.ec/" class="espacios__logo__dasboards" target="_blank">

      <img src="images/dasboardImages.png" class="imagen__admin">

    </a>

    <div class="sidebar">

      <!--=====================================
      =            Título Dasboard            =
      ======================================-->
      
      REPORTERÍA INCENTIVO TRIBUTARIO
      
      <!--====  End of Título Dasboard  ====-->
      

      <!--====================================
      =            Menú Dasboards            =
      =====================================-->
      
      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!--============================================
          =            Sección meús Dasboards            =
          =============================================-->
          
          <?php $plantilla->componentesDasboard(3);?>
          
          <!--====  End of Sección meús Dasboards  ====-->
          

        </ul>

      </nav>   
      
      <!--====  End of Menú Dasboards  ====-->
      

    </div>

</aside>

<!--====  End of Dasboard Principal  ====-->




