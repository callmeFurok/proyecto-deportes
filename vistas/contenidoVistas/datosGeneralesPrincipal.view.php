
<!--====================================
=            Variables menú           =
=====================================-->

<?php $proyectos= new usuariosConsultados(); ?>

<?php $codigoRenderizados=$proyectos->selectorDeCodigos();?>

<?php $proyectoPostulado=$proyectos->codigoIngresadosInfras($codigoRenderizados);?>

<!--====  End of Variables menú  ====-->


<?php $plantilla= new plantilla();?>

<!--===========================
=            Aside            =
============================-->
<?php $plantilla->componentesDasboard(1);?>
<!--====  End of Aside  ====-->

<!--=======================================
=            Secciòn Principal            =
========================================-->

<div class="main-header">

  <div class="container-fluid">

    <?php $plantilla->componentesProyecto(1);?>


    <div class="row">

    	<div class="col col-6 text-center"></div>

    	<div class="col col-6 text-center">

			<?php if (empty($proyectoPostulado)): ?>
						
				<a href="proyectoCrear">
					<i class="fas fa-arrow-circle-right flechas__siguientes"></i>
				</a>

			<?php else: ?>
						
				<a href="datosGenerales?contenido=14">
					<i class="fas fa-arrow-circle-right flechas__siguientes"></i>
				</a>

			<?php endif ?>	

    	</div>

    </div>
    
  </div>

</div>

<!--====  End of Secciòn Principal  ====-->


