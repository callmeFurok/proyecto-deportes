<?php

  $plantilla= new plantilla();

  $variableRequest= $_SERVER['REQUEST_URI'];

  $arrayResquest= explode("?___codigoEditar=", $variableRequest);

  $codigoEditar=$arrayResquest[1];

  $objeto= new usuario();

  $usuario=$objeto->usuarioCtr();

  $rucReconocidos=$objeto->ctrOrganismoRuc();

  $arrayUsuario = explode("___", $usuario);

  $datosGenerales=$objeto->ctrDatosGenerales();
  $arrayDatosGenerales = explode("___", $datosGenerales);


  if ($arrayUsuario[0]==2){

    $codigo=$arrayUsuario[11];

  }else{

    $codigo=$arrayUsuario[13];

  }

/*=================================
=            Proyectos            =
=================================*/

$proyectosDatosGenerales=$objeto->ctrProyectosFunciones($codigoEditar);
$arrayProyectosDatos = explode("___", $proyectosDatosGenerales);

if (!empty($arrayProyectosDatos[0])) {
  $acumladorProyecto=12.50;
}



/*=====  End of Proyectos  ======*/

$conexionRecuperada= new conexion();
$conexionEstablecida=$conexionRecuperada->cConexion();  


/*==================================
=            Base legal            =
==================================*/

$query="SELECT idBaseLegal FROM pro_baselegal WHERE codigoProyecto='$codigoEditar';";
$resultado = $conexionEstablecida->query($query);

while($registro = $resultado->fetch()) {

    $idBaseLegal=$registro['idBaseLegal'];

}

if (!empty($idBaseLegal)) {
  $acumladorBaselegal=12.50;
}


/*=====  End of Base legal  ======*/

/*=======================================
=            Caracterización            =
=======================================*/

$alineacionEstrategica=$objeto->ctrAlineacionEstrategica($codigoEditar);
$arrayAlineacionEstrategicas = explode("___", $alineacionEstrategica);

if (!empty($arrayAlineacionEstrategicas[0])) {
  $acumladorCaracterizacion=12.50;
}

/*=====  End of Caracterización  ======*/

/*==============================================
=            Alineación estrategica            =
==============================================*/

$alineacion=$objeto->ctrAlineacion($codigoEditar);
$arrayAlineacion = explode("___", $alineacion);

if (!empty($arrayAlineacion[0])) {
  $acumladorAlineacion=12.50;
}

/*=====  End of Alineación estrategica  ======*/

/*=======================================
=            Aporte proyecto            =
=======================================*/

$aporteProyecto=$objeto->ctrAporteProyecto($codigoEditar);
$arrayAporteProyecto = explode("___", $aporteProyecto);


if (!empty($arrayAporteProyecto[63])) {
  $acumladorAporte=12.50;
}


/*=====  End of Aporte proyecto  ======*/

/*=============================
=            Metas          s  =
=============================*/

$query2="SELECT idMetas FROM pro_metas WHERE codigo='$codigoEditar';";
$resultado2 = $conexionEstablecida->query($query2);


while($registro2 = $resultado2->fetch()) {

  $idMetas=$registro2['idMetas'];

}


if (!empty($idMetas)) {
  $acumladorMetas=12.50;
}

/*=====  End of Metas  ======*/

/*=====================================
=            Beneficiarios            =
=====================================*/

$query3="SELECT idBeneficiariosDirectos FROM pro_beneficiarios_directos WHERE codigo='$codigoEditar';";
$resultado3 = $conexionEstablecida->query($query3);


while($registro3 = $resultado3->fetch()) {

  $idBeneficiariosDirectos=$registro3['idBeneficiariosDirectos'];

}

if (!empty($idBeneficiariosDirectos)) {
  $acumladorBeneficiarios=12.50;
}

/*=====  End of Beneficiarios  ======*/

/*===================================
=            Metodología           =
===================================*/

$query4="SELECT idDescripcionActividades FROM pro_descripcionactividades WHERE codigo='$codigoEditar';";
$resultado4 = $conexionEstablecida->query($query4);


while($registro4 = $resultado4->fetch()) {

  $idDescripcionActividades=$registro4['idDescripcionActividades'];

}

if (!empty($idDescripcionActividades)) {
  $acumladorMetodologia=12.50;
}

/*=====  End of Metodología  ======*/

$sumadorAcumulador=0;

$sumadorAcumulador=floatval($acumladorProyecto)+floatval($acumladorBaselegal)+floatval($acumladorCaracterizacion)+floatval($acumladorAlineacion)+floatval($acumladorAporte)+floatval($acumladorMetas)+floatval($acumladorBeneficiarios)+floatval($acumladorMetodologia);

$sumadorAcumulador=number_format($sumadorAcumulador, 2);

?>


<!--=======================================
=            Secciòn Principal            =
========================================-->

<div class="wrapper row3 clase__tabs">

  <div class="container">

  <div class="row">

    <div class="col-sm-12 col-xs-12 text-center">

      <!--=======================================
      =            Barra de progreso            =
      ========================================-->

      <span class="letra__avance">AVANCE</span>&nbsp;&nbsp;&nbsp;<progress id="progresoProyecto" max="100" style="height:30px;" value="<?=$sumadorAcumulador?>"></progress><span class="avance__proyecto">&nbsp;&nbsp;<?=$sumadorAcumulador?>&nbsp;%</span>
      
      <!--====  End of Barra de progreso  ====-->

    </div>


    <form class="col-sm-12 col-xs-12 text-center" action="modelosBd/documentoProyecto/proyecto.md.php" method="post"  style="position:relative; left:34%; margin-top:2em;">

      <input type="hidden" id="codigoProyectoPdf" name="codigoProyectoPdf" value="<?=$codigoEditar?>" />

      <input type="hidden" name="cedulaRuc" id="cedulaRuc" value="<?= $arrayUsuario[3];?>">

      <button id="generarVisualizarPdfUnicos" name="generarVisualizarPdfUnicos" class="anadir__cosas"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;<br><span class="letras__precionar">GENERAR PDF <br>Y GUARDAR CAMBIOS</span></button>
      <span class="enviarDatosGenerales__reload"></span>

    </form>

  </div>

  <br>

  <div class="codigo__principal">


    CÓDIGO DE PROYECTO <?=$codigoEditar?>

    <input type="hidden" id="codigoProyecto" name="codigoProyecto" value="<?=$codigoEditar?>" />

  </div>

  <br>

  <div class="tab-group rates-page-tabs">

      <ul class="nav nav-tabs responsive tabs" role="tablist" style="background:#e1f5fe;">


          <li role="presentation" class="active">
            <a href="#proyecto" aria-controls="proyecto" role="tab" data-toggle="tab" class="centrar__informacion__menus">PROYECTO<br><span class="letras__precionar">Ingresar datos referentes al proyecto</span></a>
          </li>

      </ul>

      <div class="tab-content responsive">

        <div role="tabpanel" class="tab-pane active" id="proyecto">

          <div class="panel-group" id="accordion">

            <!--=====================================
            =            Datos Generales            =
            ======================================-->
          
            <div class="panel panel-default">

              <div class="panel-heading hover__senalizacion">

                <h4 class="panel-title">

                  <a data-toggle="collapse" data-parent="#accordion" href="#datosGenerales">
                    1 DATOS GENERALES 
                  </a>

                </h4>

              </div>

              <div id="datosGenerales" class="panel-collapse collapse">

                <?php 

                  $plantilla->componentesProyecto(1);

                ?>

              </div>

            </div>
           
            <!--====  End of Datos Generales  ====-->
            
            <!--==============================
            =            Proyecto            =
            ===============================-->

            <div class="panel panel-default">

              <div class="panel-heading hover__senalizacion">

                <h4 class="panel-title">

                  <a data-toggle="collapse" data-parent="#accordion" href="#proyectoPanel">
                    2 PROYECTO 
                  </a>

                  <?php if (empty($arrayProyectosDatos[0])): ?>

                    <span class="letras__formatos__span" id="datoGneralesRotulos">(Información no ingresada)</span>
                    
                  <?php else: ?>

                    <span class="letras__formatos__span__validos" id="datoGneralesRotulos">(Información Ingresada)</span>
                    
                  <?php endif ?>

                </h4>

              </div>

              <div id="proyectoPanel" class="panel-collapse collapse">

                <?php 

                  $plantilla->componentesProyecto(2);

                ?>

              </div>

            </div>
                     
            
            <!--====  End of Proyecto  ====-->
            

            <!--================================
            =            Base Legal            =
            =================================-->
            
            <div class="panel panel-default">

              <div class="panel-heading hover__senalizacion">

                <h4 class="panel-title">

                  <a data-toggle="collapse" data-parent="#accordion" href="#baseLegal">
                    3 BASE LEGAL 
                  </a>

                  <?php if (empty($idBaseLegal)): ?>

                    <span class="letras__formatos__span" id="datoGneralesRotulos">(Información no ingresada)</span>
                    
                  <?php else: ?>

                    <span class="letras__formatos__span__validos" id="datoGneralesRotulos">(Información Ingresada)</span>
                    
                  <?php endif ?>

                </h4>

              </div>

              <div id="baseLegal" class="panel-collapse collapse">

                <?php 

                  $plantilla->componentesProyecto(3);

                ?>

              </div>

            </div>
          
            
            <!--====  End of Base Legal  ====-->
            

            <!--=========================================================================
            =            Caracterización, objetivos y alineación estratégica            =
            ==========================================================================-->
            
            <div class="panel panel-default">

              <div class="panel-heading hover__senalizacion">

                <h4 class="panel-title">

                  <a data-toggle="collapse" data-parent="#accordion" href="#caracterizacion">
                    4  CARACTERIZACIÓN Y OBJETIVOS  
                  </a>

                  <?php if (empty($arrayAlineacionEstrategicas[0])): ?>

                    <span class="letras__formatos__span" id="datoGneralesRotulos">(Información no ingresada)</span>
                    
                  <?php else: ?>

                    <span class="letras__formatos__span__validos" id="datoGneralesRotulos">(Información Ingresada)</span>
                    
                  <?php endif ?>
                  

                </h4>

              </div>

              <div id="caracterizacion" class="panel-collapse collapse">

                <?php 

                  $plantilla->componentesProyecto(4);

                ?>

              </div>

            </div>
           
            
            <!--====  End of Caracterización, objetivos y alineación estratégica  ====-->
            

            <!--============================================
            =            Alineación estratégica            =
            =============================================-->
            <div class="panel panel-default">

              <div class="panel-heading hover__senalizacion">

                <h4 class="panel-title">

                  <a data-toggle="collapse" data-parent="#accordion" href="#alineacionEstrategica">
                    5  ALINEACIÓN ESTRATÉGICA
                  </a>

                  <?php if (empty($arrayAlineacion[0])): ?>

                    <span class="letras__formatos__span" id="datoGneralesRotulos">(Información no ingresada)</span>
                    
                  <?php else: ?>

                    <span class="letras__formatos__span__validos" id="datoGneralesRotulos">(Información Ingresada)</span>
                    
                  <?php endif ?>
                  

                </h4>

              </div>

              <div id="alineacionEstrategica" class="panel-collapse collapse">

                <?php 

                  $plantilla->componentesProyecto(5);

                ?>

              </div>

            </div>
                       
            
            
            <!--====  End of Alineación estratégica  ====-->
            

            <!--=========================================
            =            Aporte del proyecto            =
            ==========================================-->
            
            <div class="panel panel-default">

              <div class="panel-heading hover__senalizacion">

                <h4 class="panel-title">

                  <?php if (empty($arrayAlineacion[0])): ?>

                    <a data-toggle="collapse" data-parent="#accordion">
                      6  APORTE DEL PROYECTO
                    </a>

                    <span class="letras__formatos__span" id="datoGneralesRotulos">(Ingresar sección 5)</span>
              
                  <?php else: ?>

                    <a data-toggle="collapse" data-parent="#accordion" href="#aporteProyecto">
                      6  APORTE DEL PROYECTO
                    </a>

                    <?php if (empty($arrayAporteProyecto[63])): ?>

                      <span class="letras__formatos__span" id="datoGneralesRotulos">(Información no ingresada)</span>
                      
                    <?php else: ?>

                      <span class="letras__formatos__span__validos" id="datoGneralesRotulos">(Información Ingresada)</span>
                      
                    <?php endif ?>
                    
                    
                  <?php endif ?>


                </h4>

              </div>

              <div id="aporteProyecto" class="panel-collapse collapse">

                    <!--=====================================================
                    =            Contenido Principal formularios            =
                    ======================================================-->
                      
                    <?php 

                      $plantilla->componentesProyecto(6);

                    ?>  
                      
                    <!--====  End of Contenido Principal formularios  ====-->

              </div>

            </div>
            
            
            <!--====  End of Aporte del proyecto  ====-->
            

            <!--===========================
            =            Metas            =
            ============================-->
            
            <div class="panel panel-default">

              <div class="panel-heading hover__senalizacion">

                <h4 class="panel-title">

                  <a data-toggle="collapse" data-parent="#accordion" href="#metas">
                    7  METAS
                  </a>

                  <?php if (empty($idMetas)): ?>

                    <span class="letras__formatos__span" id="datoGneralesRotulos">(Información no ingresada)</span>
                    
                  <?php else: ?>

                    <span class="letras__formatos__span__validos" id="datoGneralesRotulos">(Información Ingresada)</span>
                    
                  <?php endif ?>
                  

                </h4>

              </div>

              <div id="metas" class="panel-collapse collapse">


                <!--=====================================================
                =            Contenido Principal formularios            =
                    ======================================================-->
                      
                <?php 

                      $plantilla->componentesProyecto(7);

                ?>     
                      
                <!--====  End of Contenido Principal formularios  ====-->

              </div>

            </div>
                        
            
            <!--====  End of Metas  ====-->
            

            <!--=================================
            =            Componentes            =
            ==================================-->
            
            <!-- <div class="panel panel-default"> -->

              <!-- <div class="panel-heading"> -->

                <!-- <h4 class="panel-title"> -->

                  <!-- <a data-toggle="collapse" data-parent="#accordion" href="#componentes"> -->
                    <!-- 8  COMPONENTES -->
                  <!-- </a> -->

                  <!-- <span class="letras__formatos__span" id="datoGneralesRotulos">(Información no ingresada)</span> -->

                <!-- </h4> -->

              <!-- </div> -->

              <!-- <div id="componentes" class="panel-collapse collapse"> -->

                <!--=====================================================
                =            Contenido Principal formularios            =
                ======================================================-->
 
                      
                <!--====  End of Contenido Principal formularios  ====-->

              <!-- </div> -->

            <!-- </div> -->
            
            <!--====  End of Componentes  ====-->
            
            <!--===================================
            =            Beneficiarios            =
            ====================================-->
            
            <div class="panel panel-default">

              <div class="panel-heading hover__senalizacion">

                <h4 class="panel-title">

                  <a data-toggle="collapse" data-parent="#accordion" href="#beneficiarios">
                    8  BENEFICIARIOS
                  </a>

                  <?php if (empty($idBeneficiariosDirectos)): ?>

                    <span class="letras__formatos__span" id="datoGneralesRotulos">(Información no ingresada)</span>
                    
                  <?php else: ?>

                    <span class="letras__formatos__span__validos" id="datoGneralesRotulos">(Información Ingresada)</span>
                    
                  <?php endif ?>
                  

                </h4>

              </div>

              <div id="beneficiarios" class="panel-collapse collapse">

                

                    <!--=====================================================
                    =            Contenido Principal formularios            =
                    ======================================================-->
                      
                    <?php 

                      $plantilla->componentesProyecto(9);

                    ?>                           
                      
                    <!--====  End of Contenido Principal formularios  ====-->
                      
              </div>

            </div>

          
            
            <!--====  End of Beneficiarios  ====-->
            
            <!--==============================================
            =            Metodologìa de Ejecución            =
            ===============================================-->

            <div class="panel panel-default">

              <div class="panel-heading hover__senalizacion">

                <h4 class="panel-title">

                  <a data-toggle="collapse" data-parent="#accordion" href="#metodologia">
                    9  METODOLOGÍA DE EJECUCIÓN, SEGUIMIENTO Y EVALUACIÓN
                  </a>

                  <?php if (empty($idDescripcionActividades)): ?>

                    <span class="letras__formatos__span" id="datoGneralesRotulos">(Información no ingresada)</span>
                    
                  <?php else: ?>

                    <span class="letras__formatos__span__validos" id="datoGneralesRotulos">(Información Ingresada)</span>
                    
                  <?php endif ?>


                </h4>

              </div>

              <div id="metodologia" class="panel-collapse collapse">

                <div class="panel-body">

                    <!--=====================================================
                    =            Contenido Principal formularios            =
                    ======================================================-->
                      
                    <?php 

                      $plantilla->componentesProyecto(10);

                    ?>          
                      
                    <!--====  End of Contenido Principal formularios  ====-->
                      
                </div>

              </div>

            </div>                
          
            <!--====  End of Metodologìa de Ejecución  ====-->
            
            

          </div>

        </div>


      </div>

  </div>

  </div>

</div>

<!--====  End of Secciòn Principal  ====-->



<!--=============================
=            Modales            =
==============================-->

<div class="modal fade" id="modalEjemploProyecto">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold;">Ejemplo de como elaborar un proyecto</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body body__preguntas">

        El nombre del proyecto deberá estar compuesto por dos elementos: la acción a realizarse y sobre que se va actuar, por ejemplo: <span class="enfacis__proyectos">“Participación de la Deportista Paola Cueva en el Campeonato Mundial de Atletismo San Diego 2015”, “Dotación de Implementación para las Ligas Deportivas Barriales de la Provincia de Pichincha”, “Organización de los Juegos Intercantonales Azuay 2015”, otros</span>.

      </div>


    </div>

  </div>

</div>


<div class="modal fade" id="modalBaseLegales">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold;">Bases Legales Dispuestas por el Ministerio del Deporte</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body body__preguntas">

        <div class="enfacis__proyectos">2.1 LA LEY DEL DEPORTE, EDUCACIÓN FÍSICA Y RECREACIÓN</div> 
    
        <div>El artículo 13 establece: “El Ministerio Sectorial es el órgano rector y planificador del deporte, educación física y recreación; le corresponde establecer, ejercer, garantizar y aplicar las políticas, directrices y planes aplicables en las áreas correspondientes para el desarrollo del sector de conformidad con lo dispuesto en la Constitución, las leyes, instrumentos internacionales y reglamentos aplicables. Tendrá dos objetivos principales, la activación de la población para asegurar la salud de las y los ciudadanos y facilitar la consecución de logros deportivos a nivel nacional e internacional de las y los deportistas incluyendo, aquellos que tengan algún tipo de discapacidad.</div>

        <br>

        <div class="enfacis__proyectos">2.2 LEY DE RÉGIMEN TRIBUTARIO INTERNO</div> 
    
        <div>El artículo 10 dispone: “En general, con el propósito de determinar la base imponible sujeta a este impuesto se deducirán los gastos e inversiones que se efectúen con el propósito de obtener, mantener y mejorar los ingresos de fuente ecuatoriana que no estén exentos. En particular se aplicarán las siguientes deducciones: … 19. Los costos y gastos por promoción y publicidad de conformidad con las excepciones, límites, segmentación y condiciones establecidas en el Reglamento... Se podrá deducir el 100% adicional para el cálculo de la base imponible del impuesto a la renta, los gastos de publicidad y patrocinio realizados a favor de deportistas, programas y proyectos deportivos previamente calificados por la entidad rectora competente en la materia. El reglamento establecerá los parámetros técnicos y formales que deberán cumplirse para acceder a esta deducción adicional...”</div>

        <br>

        <div class="enfacis__proyectos">2.3 REGLAMENTO PARA LA APLICACIÓN DE LA LEY DE RÉGIMEN TRIBUTARIO INTERNO</div> 
    
        <div>El artículo 28 dispone: “Bajo las condiciones descritas en el artículo precedente y siempre que no hubieren sido aplicados al costo de producción, son deducibles los gastos previstos por la Ley de Régimen Tributario Interno, en los términos señalados en ella y en este reglamento, tales como: ... 11. Promoción, publicidad y patrocinio... e. Se podrá deducir el 100% adicional para el cálculo de la base imponible del impuesto a la renta, los gastos de publicidad y patrocinio realizados a favor de deportistas, programas y proyectos deportivos previamente calificados por la entidad rectora competente en la materia, según lo previsto en el respectivo documento de planificación estratégica, así como con los límites y condiciones que esta emita para el efecto.”</div>


      </div>


    </div>

  </div>

</div>



<div class="modal fade" id="modalAnalisisSituacional">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold;">ANÁLISIS DE LA SITUACIÓN ACTUAL (DIAGNÓSTICO)</h5>

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

<div class="modal fade" id="modalJustificacion">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold;">JUSTIFICACIÓN</h5>

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

<div class="modal fade" id="modalObjetivoGeneral">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold;">OBJETIVO GENERAL</h5>

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


<div class="modal fade" id="modalObjetivosEspecificos">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold;">OBJETIVOS ESPECÍFICOS</h5>

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


<div class="modal fade" id="modalAlineacionEstrategica">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold;">ALINEACIÓN ESTRATÉGICA</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body body__preguntas">

         <div>Describe como los objetivos general y específicos contribuyen al cometimiento de los objetivos del Plan Estratégico de la Secretaría del Deporte y/o al Plan Decenal del Deporte, la Educación Física y la Recreación DEFIRE.</div>

      </div>


    </div>

  </div>

</div>


<div class="modal fade" id="modalPlanDecenal">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold;">PLAN DECENAL DEL DEPORTE, LA EDUCACIÓN FÍSICA Y LA FEDERACIÓN - DEFIRE</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body body__preguntas">

         <div>
           Seleccione una línea política según lo requerido.
         </div>

      </div>


    </div>

  </div>

</div>

<!--====  End of Modales  ====-->

