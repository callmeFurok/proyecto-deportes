<!--====================================================
=            Asignación de datos ingresados            =
=====================================================-->

<?php $objeto= new usuario();?>

<?php $codigo=$objeto->ctrCodigosEdiciones();?>

<?php $fechasString=$objeto->ctrInstanciaProyectosVisibles($codigo);?>

<!--====  End of Asignación de datos ingresados d ====-->

<?php $arrayConvertidos = explode("____", $fechasString);?>


<?php $fechaInicialArray=explode("/",$arrayConvertidos[0]);?>

<?php $fechaInicialEntero=intval($fechaInicialArray[2]);?>


<?php $fechaFinalArray=explode("/",$arrayConvertidos[1]);?>

<?php $fechaFinalEntero=intval($fechaFinalArray[2]);?>

<?php $resultadoRestas=0;?>

<?php $resultadoRestas=$fechaFinalEntero - $fechaInicialEntero;?>


<div class="panel-body">

<input type="hidden" id="codigoBeneficiarios" name="codigoBeneficiarios" value="<?php if ($arrayUsuario[0]==2): ?><?= $arrayUsuario[11]; ?><?php endif ?><?php if ($arrayUsuario[0]==3): ?><?= $arrayUsuario[13]; ?><?php endif ?>" />

  <div class="row">

    <div class="col col-12 text-center font-weight-titulo">

        METODOLOGÍA

    </div>

  </div>

  <!--======================================================
  =            Descripción de actividades año 1            =
  =======================================================-->

  <?php if ($resultadoRestas==0 || $resultadoRestas==1 || $resultadoRestas==2 || $resultadoRestas==3): ?>
    
   <div class="row">   

    <div class="col-sm-8 col-xs-8 col-8">

      <div class="rotulo__referencias">Descripción de actividades año <?=$fechaInicialEntero?></div>
                    
    </div>

    <div class="col-sm-2 col-xs-2 col-2" data-toggle="tooltip" title="Si desea añadir una ubicación dar clic en el botón de añadir">

      <button id="anadirDescripcionActividades" name="anadirDescripcionActividades" class="anadir__cosas btn btn-primary"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;AÑADIR&nbsp;&nbsp;</button>

    </div>

    <div class="col-sm-2 col-xs-2 col-2 text-center">

      <span class="cursores__modales" data-toggle="modal" data-target="#modalActividadesDescripcion"><i class="fas fa-question-circle"></i><br><div class="letras__precionar">Click para obtener<br>mayor información</div></span>
                    
    </div>

  </div> 

   <div class="row" style="margin-top: 2em;"> 

      <table id="descripcionActividades" class="table-responsive-sm">

      <thead>

        <tr>
          
          <th class="padding__celdas" colspan="14">Cronograma de ejecución del objeto de financiamiento</th>

        </tr>

        <tr>
          
          <th class="padding__celdas">Actividades</th>
          <th class="padding__celdas">Ene</th>
          <th class="padding__celdas">Feb</th>
          <th class="padding__celdas">Mar</th>
          <th class="padding__celdas">Abr</th>
          <th class="padding__celdas">May</th>
          <th class="padding__celdas">Jun</th>
          <th class="padding__celdas">Jul</th>
          <th class="padding__celdas">Ago</th>
          <th class="padding__celdas">Sep</th>
          <th class="padding__celdas">Oct</th>
          <th class="padding__celdas">NOV</th>
          <th class="padding__celdas">Dic</th>
          <th class="padding__celdas">Eliminar</th>

        </tr>

      </thead>

      <tbody>

      </tbody>

      <tbody class="descripcionActividades__contenedor__body">

      </tbody>

    </table>

  </div>     

  <?php endif ?>
  
  <!--====  End of Descripción de actividades año 1  ====-->
  
  <!--===================================================
  =            Descripción actividades año 2            =
  ====================================================-->
  
  <?php if ($resultadoRestas==1 || $resultadoRestas==2 || $resultadoRestas==3): ?>  

    <div class="row">   

    <div class="col-sm-8 col-xs-8 col-8">

      <div class="rotulo__referencias">Descripción de actividades año <?=($fechaInicialEntero+1)?></div>
                    
    </div>

    <div class="col-sm-2 col-xs-2 col-2" data-toggle="tooltip" title="Si desea añadir una ubicación dar clic en el botón de añadir">

      <button id="anadirDescripcionActividadesDos" name="anadirDescripcionActividadesDos" class="anadir__cosas btn btn-primary"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;AÑADIR&nbsp;&nbsp;</button>

    </div>

    <div class="col-sm-2 col-xs-2 col-2 text-center">

      <span class="cursores__modales" data-toggle="modal" data-target="#modalActividadesDescripcion"><i class="fas fa-question-circle"></i><br><div class="letras__precionar">Click para obtener<br>mayor información</div></span>
                    
    </div>

  </div> 

   <div class="row" style="margin-top: 2em;"> 

      <table id="descripcionActividades1" class="table-responsive-sm">

      <thead>

        <tr>
          
          <th class="padding__celdas" colspan="14">Cronograma de ejecución del objeto de financiamiento</th>

        </tr>

        <tr>
          
          <th class="padding__celdas">Actividades</th>
          <th class="padding__celdas">Ene</th>
          <th class="padding__celdas">Feb</th>
          <th class="padding__celdas">Mar</th>
          <th class="padding__celdas">Abr</th>
          <th class="padding__celdas">May</th>
          <th class="padding__celdas">Jun</th>
          <th class="padding__celdas">Jul</th>
          <th class="padding__celdas">Ago</th>
          <th class="padding__celdas">Sep</th>
          <th class="padding__celdas">Oct</th>
          <th class="padding__celdas">NOV</th>
          <th class="padding__celdas">Dic</th>
          <th class="padding__celdas">Eliminar</th>

        </tr>

      </thead>

      <tbody>

      </tbody>

      <tbody class="descripcionActividades__contenedor__body__dos">

      </tbody>

    </table>

  </div>       

  <?php endif ?>
  
  <!--====  End of Descripción actividades año 2  ====-->
  
  <!--===================================================
  =            Descripción actividades año 3            =
  ====================================================-->
  
  <?php if ($resultadoRestas==2 || $resultadoRestas==3): ?>  

    <div class="row">   

    <div class="col-sm-8 col-xs-8 col-8">

      <div class="rotulo__referencias">Descripción de actividades año <?=($fechaInicialEntero+2)?></div>
                    
    </div>

    <div class="col-sm-2 col-xs-2 col-2" data-toggle="tooltip" title="Si desea añadir una ubicación dar clic en el botón de añadir">

      <button id="anadirDescripcionActividadesTres" name="anadirDescripcionActividadesTres" class="anadir__cosas btn btn-primary"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;AÑADIR&nbsp;&nbsp;</button>

    </div>

    <div class="col-sm-2 col-xs-2 col-2 text-center">

      <span class="cursores__modales" data-toggle="modal" data-target="#modalActividadesDescripcion"><i class="fas fa-question-circle"></i><br><div class="letras__precionar">Click para obtener<br>mayor información</div></span>
                    
    </div>

  </div> 

   <div class="row" style="margin-top: 2em;"> 

      <table id="descripcionActividades2" class="table-responsive-sm">

      <thead>

        <tr>
          
          <th class="padding__celdas" colspan="14">Cronograma de ejecución del objeto de financiamiento</th>

        </tr>

        <tr>
          
          <th class="padding__celdas">Actividades</th>
          <th class="padding__celdas">Ene</th>
          <th class="padding__celdas">Feb</th>
          <th class="padding__celdas">Mar</th>
          <th class="padding__celdas">Abr</th>
          <th class="padding__celdas">May</th>
          <th class="padding__celdas">Jun</th>
          <th class="padding__celdas">Jul</th>
          <th class="padding__celdas">Ago</th>
          <th class="padding__celdas">Sep</th>
          <th class="padding__celdas">Oct</th>
          <th class="padding__celdas">NOV</th>
          <th class="padding__celdas">Dic</th>
          <th class="padding__celdas">Eliminar</th>

        </tr>

      </thead>

      <tbody>

      </tbody>

      <tbody class="descripcionActividades__contenedor__body__tres">

      </tbody>

    </table>

  </div>       

  <?php endif ?>     
  
  <!--====  End of Descripción actividades año 3  ====-->
  
  <!--===================================================
  =            Descripción actividades año 4            =
  ====================================================-->

  <?php if ($resultadoRestas==3): ?>  

    <div class="row">   

    <div class="col-sm-8 col-xs-8 col-8">

      <div class="rotulo__referencias">Descripción de actividades año <?=($fechaInicialEntero+3)?></div>
                    
    </div>

    <div class="col-sm-2 col-xs-2 col-2" data-toggle="tooltip" title="Si desea añadir una ubicación dar clic en el botón de añadir">

      <button id="anadirDescripcionActividadesCuatro" name="anadirDescripcionActividadesCuatro" class="anadir__cosas btn btn-primary"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;AÑADIR&nbsp;&nbsp;</button>

    </div>

    <div class="col-sm-2 col-xs-2 col-2 text-center">

      <span class="cursores__modales" data-toggle="modal" data-target="#modalActividadesDescripcion"><i class="fas fa-question-circle"></i><br><div class="letras__precionar">Click para obtener<br>mayor información</div></span>
                    
    </div>

  </div> 

   <div class="row" style="margin-top: 2em;"> 

      <table id="descripcionActividades3" class="table-responsive-sm">

      <thead>

        <tr>
          
          <th class="padding__celdas" colspan="14">Cronograma de ejecución del objeto de financiamiento</th>

        </tr>

        <tr>
          
          <th class="padding__celdas">Actividades</th>
          <th class="padding__celdas">Ene</th>
          <th class="padding__celdas">Feb</th>
          <th class="padding__celdas">Mar</th>
          <th class="padding__celdas">Abr</th>
          <th class="padding__celdas">May</th>
          <th class="padding__celdas">Jun</th>
          <th class="padding__celdas">Jul</th>
          <th class="padding__celdas">Ago</th>
          <th class="padding__celdas">Sep</th>
          <th class="padding__celdas">Oct</th>
          <th class="padding__celdas">NOV</th>
          <th class="padding__celdas">Dic</th>
          <th class="padding__celdas">Eliminar</th>

        </tr>

      </thead>

      <tbody>

      </tbody>

      <tbody class="descripcionActividades__contenedor__body__cuatro">

      </tbody>

    </table>

  </div>       

  <?php endif ?>     

  <!--====  End of Descripción actividades año 4  ====-->


  <div class="row">   


    <div class="col-sm-8 col-xs-8 col-8">

      <div class="rotulo__referencias">Seguimiento y evaluación</div>
                    
    </div>

    <div class="col-sm-2 col-xs-2 col-2" data-toggle="tooltip" title="Si desea añadir una ubicación dar clic en el botón de añadir">

      <button id="anadiSeguimientoEvaluacion" name="anadiSeguimientoEvaluacion" class="anadir__cosas btn btn-primary"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;AÑADIR&nbsp;&nbsp;</button>
      
    </div>

    <div class="col-sm-2 col-xs-2 col-2 text-center">

      <span class="cursores__modales" data-toggle="modal" data-target="#modalActividadesDescripcion"><i class="fas fa-question-circle"></i><br><div class="letras__precionar">Click para obtener<br>mayor información</div></span>
                    
    </div>

  </div> 

   <div class="row" style="margin-top: 2em;"> 

      <table id="seguimientoEvaluacion" class="table-responsive-sm">

      <thead>

        <tr>
          
          <th class="padding__celdas">Meta</th>
          <th class="padding__celdas">Indicador</th>
          <th class="padding__celdas">Periodicidad</th>
          <th class="padding__celdas">Actividad de seguimiento / evaluación</th>
          <th class="padding__celdas">Medio de verificación</th>
          <th class="padding__celdas">Observación</th>
          <th class="padding__celdas">Eliminar</th>

        </tr>

      </thead>

      <tbody>

      </tbody>

      <tbody class="seguimientoEvaluacion__contenedor__body">

      </tbody>

    </table>

  </div>    

  

  <div class="row">

    <div class="col-xs-12 col-sm-12 col-12 text-center">

      <button id="enviarEstructuraOrganicaDeportiva" name="enviarEstructuraOrganicaDeportiva" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;GUARDAR</button>

      <div class="enviarDatosGenerales__reload"></div>

    </div>

  </div>

</div>

<!--=============================
=            Modales            =
==============================-->


<div class="modal fade" id="modalActividadesDescripcion">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold;">DESCRIPCIÓN DE ACTIVIDADES</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body body__preguntas">

         <div>
          Describir de forma detallada las actividades para llevar a cabo el proyecto
         </div>

      </div>


    </div>

  </div>

</div>

<!--====  End of Modales  ====-->
