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
  


  $alineacionEstrategica=$objeto->ctrAlineacionEstrategica($codigo);
  $arrayAlineacionEstrategicas = explode("___", $alineacionEstrategica);




?>


<div class="panel-body">

  <!--=====================================================
  =            Contenido Principal formularios            =
  ======================================================-->

  <div class="row">

    <div class="col col-12 text-center font-weight-titulo">

      CARACTERIZACIÓN

    </div>

  </div>


<div class="row d-flex flex-column align-items-center">

  <div class="col col-12 col-md-7">

    <div class="row"> 

      <div class="col-sm-10 col-xs-10 col-10">

        <div class="rotulo__referencias">Beneficios del proyecto</div>
                      
      </div>

      <div class="col-sm-2 col-xs-2 col-2 text-center">

        <span class="cursores__modales" data-toggle="modal" data-target="#modalJustificacion"><i class="fas fa-question-circle"></i><br><div class="letras__precionar">Click para obtener<br>mayor información</div></span>
                      
      </div>

      <div class="col-sm-12 col-xs-12 col-12">

        <div>

          <?php if (empty($arrayAlineacionEstrategicas[1])): ?>
                              
            <textarea id="justificacionCaracterizacion" name="justificacionCaracterizacion" class="text__tareas2 obligatorio__elementos"></textarea>

          <?php else: ?>

            <textarea id="justificacionCaracterizacion" name="justificacionCaracterizacion" class="text__tareas2 obligatorio__elementos"><?= $arrayAlineacionEstrategicas[1];?></textarea>
                              
          <?php endif ?>
                            
                            
        </div>
                      
      </div>

      <div class="col-sm-12 col-xs-12 col-12 longitud__minima__grupal counter__justificacion"></div>

    </div> 


    <div class="row"> 

      <div class="col-sm-10 col-xs-10 col-10">

        <div class="rotulo__referencias">Objetivo general</div>
                      
      </div>

      <div class="col-sm-2 col-xs-2 col-2 text-center">

        <span class="cursores__modales" data-toggle="modal" data-target="#modalObjetivoGeneral"><i class="fas fa-question-circle"></i><br><div class="letras__precionar">Click para obtener<br>mayor información</div></span>
                      
      </div>

      <div class="col-sm-12 col-xs-12 col-12">

        <div>
                            
          <?php if (empty($arrayAlineacionEstrategicas[2])): ?>
                              
            <textarea id="objetivoGeneralCaracterizacion" name="objetivoGeneralCaracterizacion" class="text__tareas2 obligatorio__elementos"></textarea>

          <?php else: ?>

            <textarea id="objetivoGeneralCaracterizacion" name="objetivoGeneralCaracterizacion" class="text__tareas2 obligatorio__elementos"><?= $arrayAlineacionEstrategicas[2];?></textarea>
                              
          <?php endif ?>
                            

        </div>
                      
      </div>

      <div class="col-sm-12 col-xs-12 col-12 longitud__minima__grupal counter__objetivoGeneral"></div>

    </div> 

    <div class="row"> 

      <div class="col-sm-8 col-xs-8 col-8">

        <div class="rotulo__referencias">Objetivos específicos (mínimo 2 objetivos)</div>
                      
      </div>

      <div class="col-sm-2 col-xs-2 col-2" data-toggle="tooltip" title="Si desea añadir un objetivo específico dar clic aquí">

        <button id="anadirObjetivosEspecificos" name="anadirObjetivosEspecificos" class="anadir__cosas btn btn-primary"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Añadir&nbsp;&nbsp;</button>

      </div>


      <div class="col-sm-2 col-xs-2 col-2 text-center">

        <span class="cursores__modales" data-toggle="modal" data-target="#modalObjetivosEspecificos"><i class="fas fa-question-circle"></i><br><div class="letras__precionar">Click para obtener<br>mayor información</div></span>
                      
      </div>

      <div class="row" style="width:100%;">

        <div class="col-sm-12 col-xs-12 col-12 objetivos__especificos__editar"></div>

      </div>

      <div class="row" style="width:100%;">

        <div class="col-sm-12 col-xs-12 col-12 objetivos__especificos"></div>

      </div>

    </div> 
                        
    <br>

    <div class="row">

      <div class="col-xs-12 col-sm-12 col-12 text-center">

        <button id="enviarDatosSituacionActual" name="enviarDatosSituacionActual" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;GUARDAR</button>

        <div class="enviarDatosGenerales__reload"></div>

      </div>

    </div>

   <!--====  End of Contenido Principal formularios  ====-->

    </div>
                        
  </div>

</div>


<!--=============================
=            Modales            =
==============================-->

<div class="modal fade" id="modalAnalisisSituacional">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold; color:black;">ANÁLISIS DE LA SITUACIÓN ACTUAL (DIAGNÓSTICO)</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body body__preguntas">

        Descripción del problema, la realidad del lugar o de la situación existente previo a la intervención del proyecto, es decir, de aquello que se pretende mejorar o solucionar a través de este.


      </div>


    </div>

  </div>

</div>

<div class="modal fade" id="modalObjetivoGeneral">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold; color:black;">OBJETIVO GENERAL</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body body__preguntas">

         <div>Es el enunciado de lo que se considera posible alcanzar, respecto al problema o situación negativa identificada en el diagnóstico. Es importante plantear un solo objetivo general para evitar desviaciones o mal entendidos en el desarrollo del proyecto. Para enunciar el objetivo general se debe iniciar con un verbo que denote acción y terminado en infinitico (ar, er, ir). Se puede utilizar verbos como mejorar, fortalecer, incentivar, promover, desarrollar, optimizar, perfeccionar, otros similares. </div>

         <br>

        <div>El objetivo general debe responder a algunas preguntas fundamentales: ¿Qué se va a hacer?, ¿Cómo se va hacer?, ¿Para qué se va hacer?, ¿Dónde se va hacer? y ¿Cuándo se va hacer? Ejemplo:</div>

        <br>

        <div><span class="enfacis__proyectos">¿Qué?</span> Lograr la participación en el Campeonato Mundial de Atletismo San Diego 2015 de la deportista Paola Cueva, <span class="enfacis__proyectos">¿Cómo?</span> Mediante el apoyo técnico y económico necesario, <span class="enfacis__proyectos">¿Para qué?</span> a fin de que pueda competir en igualdad de condiciones que sus adversarias y consiga demostrar su calidad deportiva ubicándose en los primeros lugares del evento.</div>

      </div>


    </div>

  </div>

</div>

<div class="modal fade" id="modalJustificacion">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold; color:black;">JUSTIFICACIÓN</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body body__preguntas">

        Señalar aspectos y circunstancias que motivan la postulación del proyecto y argumentar en qué medida su implementación solucionará las problemáticas identificadas en el punto anterior. Se deberá incluir información referente a indicadores cualitativos y cuantitativos que apoyen su comprensión. 

      </div>


    </div>

  </div>

</div>


<div class="modal fade" id="modalObjetivosEspecificos">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold; color:black;">OBJETIVOS ESPECÍFICOS</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body body__preguntas">

         <div>Es la desagregación del objetivo general. Corresponde a objetivos más puntuales que contribuyen a lograr el objetivo general del objeto de financiamiento. Estos objetivos deben ser medibles, apropiados, temporales y realistas. Ejemplo:</div>

        <br>

        &nbsp;&nbsp;<div><span class="enfacis__proyectos">a.1</span>  Mejorar el rendimiento del deportista durante la etapa previa a la participación en el Campeonato Mundial de Atletismo San Diego 2015.</div>

        <br>

        &nbsp;&nbsp;<div><span class="enfacis__proyectos">a.2</span> Fortalecer la calidad del entrenamiento del deportista al dotarlo con la implementación e indumentaria adecuada para el nivel técnico de la competencia.</div>

      </div>


    </div>

  </div>

</div>

<!--====  End of Modales  ====-->
