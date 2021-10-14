 <?php

  $objeto= new usuario();

  $usuario=$objeto->usuarioCtr();

  $arrayUsuario = explode("___", $usuario);


  if ($arrayUsuario[0]==2){

    $codigo=$arrayUsuario[11];

  }else{

    $codigo=$arrayUsuario[13];

  }

  /*==============================
  =            Codigo            =
  ==============================*/
  
  $variableRequest= $_SERVER['REQUEST_URI'];

  $arrayResquest= explode("?___codigoEditar=", $variableRequest);

  $codigoEditar=$arrayResquest[1];

  if (!empty($codigoEditar)) {
   
    $codigo=$codigoEditar;

  }
  
  /*=====  End of Codigo  ======*/

?>

<div class="panel-body">

  <input type="hidden" id="codigoProyectoMetasPronosticos" name="codigoProyectoMetasPronosticos" value="<?php if ($arrayUsuario[0]==2): ?><?= $arrayUsuario[11]; ?><?php endif ?><?php if ($arrayUsuario[0]==3): ?><?= $arrayUsuario[13]; ?><?php endif ?>" />

  <div class="row">

    <div class="col col-12 text-center font-weight-titulo">

      METAS

    </div>

  </div>

  <div class="row"> 

     <div class="col-sm-10 col-xs-10 col-10">

      <div class="rotulo__referencias">Meta</div>
                    
    </div>

    <div class="col-sm-2 col-xs-2 col-2 text-center">

      <span class="cursores__modales" data-toggle="modal" data-target="#modalMetas"><i class="fas fa-question-circle"></i><br><div class="letras__precionar">Click para obtener<br>mayor información</div></span>
                    
    </div>

  </div>

  <br>
  <br>

  <div class="row"> 

    <div class="col-sm-10 col-xs-10 col-10">

      <div class="rotulo__referencias">Generar metas (mínimo 1 meta)</div>
                    
    </div>

    <div class="col-sm-2 col-xs-2 col-2" data-toggle="tooltip" title="Si desea añadir una meta dar clic aquí">

      <button id="anadirMetas" name="anadirMetas" class="anadir__cosas btn btn-primary"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;AÑADIR&nbsp;&nbsp;</button>

    </div>

    <br>
    <br>

    <div class="row ancho__total">

      <div class="col col-12">

        <table id="tablaMetas">

          <thead>
            <th>Nombre del indicador</th>
            <th>Descripción</th>
            <th>Método de cálculo</th>
            <th>Meta</th>
            <th>Periodo</th>
            <th>Eliminar</th>
          </thead>

          <tbody class="contenido__tabla__metas">


          </tbody>

        </table>

      </div>

    </div>

  </div> 

  <br>
  <br>

  <div class="row"> 

    <div class="col-sm-10 col-xs-10 col-10">

      <div class="rotulo__referencias">Generar pronóstico (opcional)</div>
                    
    </div>

    <div class="col-sm-2 col-xs-2 col-2" data-toggle="tooltip" title="Si desea añadir un  pronóstico dar clic aquí">

      <button id="anadirPronosticos" name="anadirPronosticos" class="anadir__cosas btn btn-primary"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Añadir&nbsp;&nbsp;</button>

    </div>

    <br>

  </div>

  <br>
  <br>

  <div class="row">

    <div class="col col-12">

      <table id="tablaPronosticos" class="table-responsive-sm">

        <thead>

          <th>Deportista</th>
          <th>Disciplina</th>
          <th>Categoría de edad</th>
          <th>División</th>
          <th>Modalidad prueba</th>
          <th>Resultado (marca / tiempo) esperado</th>
          <th>Evento de participación</th>
          <th>Pronóstico de ubicación</th>
          <th>Eliminar</th>

        </thead>

        <tbody class="contenido__pronosticos">


        </tbody>

      </table>

    </div>

  </div>


  <br>

  <div class="row">

    <div class="col-xs-12 col-sm-12 col-12 text-center">

      <button id="enviarMetasPronosticos" name="enviarMetasPronosticos" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;GUARDAR</button>

      <div class="enviarDatosGenerales__reload"></div>

    </div>

  </div>


</div>


<!--=============================
=            Modales            =
==============================-->


<div class="modal fade" id="modalMetas">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold;">METAS</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body body__preguntas">

         <div>
           Define el resultado final o cambio esperado al cumplir las expectativas de la implementación del proyecto frente lo determinado en el diagnóstico. La meta debe ser alcanzable, cuantificable, realista, cronológicamente limitada y reflejar los compromisos adquiridos. 
         </div>

         <br>

         <div class="enfacis__proyectos">Ejemplo:</div>

         &nbsp;&nbsp;&nbsp;<ul>

           <li><span class="enfacis__proyectos">Nombre del indicador:</span> Número de medallas obtenidas</li>
           <li><span class="enfacis__proyectos">Descripción:</span> Mide únicamente las medallas de oro, plata o bronce obtenidas por el deportista en los Juegos olímpicos Tokio 2020, no se incluye diplomas ni las medallas obtenidas en los eventos clasificatorios.</li>
           <li><span class="enfacis__proyectos">Método de cálculo:</span> Sumatoria de medallas obtenidas</li>
           <li><span class="enfacis__proyectos">Meta:</span> Al menos una medalla</li>
           <li><span class="enfacis__proyectos">Periodo:</span> agosto 2020</li>

         </ul>


      </div>


    </div>

  </div>

</div>

<!--====  End of Modales  ====-->
