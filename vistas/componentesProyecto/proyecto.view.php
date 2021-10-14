<!--===========================================
=            Creación de Funciones            =
============================================-->

<?php $consultasRealizadas= new usuariosConsultados();?>

<?php $codigo=$consultasRealizadas->selectorDeCodigos();?>

<?php $variableRequest= $_SERVER['REQUEST_URI'];?>

<?php $codigoEditar=$consultasRealizadas->requestFuncion($variableRequest,$codigo);?>

<?php if (!empty($codigoEditar)) { $codigo=$codigoEditar; }?>

<!--====  End of Creación de Funciones  ====-->

<!--===========================================
=            Asignación de valores            =
============================================-->

<?php if (!empty($codigoEditar)) { $codigo=$codigoEditar; }?>

<!--====  End of Asignación de valores  ====-->

<!--====================================================
=            Asignación de datos ingresados            =
=====================================================-->

<?php $objeto= new usuario();?>

<?php $proyectosDatosGenerales=$objeto->ctrProyectosFunciones($codigo);?>

<?php $arrayProyectosDatos = explode("___", $proyectosDatosGenerales);?>


<!--====  End of Asignación de datos ingresados  ====-->

<!--====================================
=            Usuarios datos            =
=====================================-->

<?php $usuarioDatos=$objeto->usuarioCtr();?>

<?php $arrayUsuarios = explode("___", $usuarioDatos);?>

<!--====  End of Usuarios datos  ====-->

<!--==========================================
=            Fecha de nacimientos            =
===========================================-->

<?php $edad=$objeto->calculoEdad($arrayUsuarios[5]);?>

<!--====  End of Fecha de nacimientos  ====-->


<!--==========================================
=            Instancia Construida            =
===========================================-->

<?php $instancia=$objeto->ctrInstanciaTraidasComparadores($codigo);?>

<?php $arrayInstancias = explode("____", $instancia);?>


<!--====  End of Instancia Construida  ====-->

<!--===============================
=            Plantilla            =
================================-->

<?php  $plantilla= new plantilla(); ?>

<!--====  End of Plantilla  ====-->

<!--=============================
=            Scripts            =
==============================-->

 <?php $plantilla->parciales(2);?>

<!--====  End of Scripts  ====-->

<!--=========================================
=            Seccion componentes            =
==========================================-->

<?php $data1=array();?>

<?php $conexionRecuperada= new conexion();?>

<?php $conexionEstablecida=$conexionRecuperada->cConexion();?>

<?php $query="SELECT a.campos FROM pro_componentesciudadanos AS a WHERE a.identificador='b' AND a.codigo='$codigo';";?>
<?php $resultado = $conexionEstablecida->query($query);?>

<?php

  while($registro = $resultado->fetch()) {

    $campos=$registro['campos'];
    array_push($data1, $campos);


  }

?>

<?php 

  $arrayConvertidos=array();

  $anadidosLasts=array();

  $sumadorGlobal=0;

  $sumadorGlobalDos=0;

  for ($i=0; $i < count($data1); $i++) { 

    $arrayConvertidos = explode ("/../",$data1[$i]);

    $anadidosLastsVariables = end($arrayConvertidos);

    $anadidosLastsVariables=number_format(floatval($anadidosLastsVariables),2);

    array_push($anadidosLasts, $anadidosLastsVariables);

    
  }

  $sumatoresArrays=array_sum($anadidosLasts);

?>


<!--====  End of Seccion componentes  ====-->

<input type="hidden" id="relacionadosText" name="relacionadosText" value="<?=$sumatoresArrays?>">

<!--====================================
=            Campos ocultos            =
=====================================-->

<?php if (($arrayInstancias[0]!="Técnico" || $arrayInstancias[2]!="Tecnológico") && $arrayInstancias[1]=="Infraestructura"): ?>

<input type="hidden" name="indicadorTecnico" id="indicadorTecnico" value="si"/>

<?php else: ?>
  
<input type="hidden" name="indicadorTecnico" id="indicadorTecnico" value="no"/>

<?php endif ?>

<!--====  End of Campos ocultos  ====-->


<!--=======================================
=            Sección principal            =
========================================-->


<div class="panel-body">

  <!--=====================================================
  =            Contenido Principal formularios            =
  ======================================================-->
                      

  <div class="row">

    <div class="col col-12 text-center font-weight-titulo">

      INFORMACIÓN GENERAL DEL PROYECTO

    </div>

  </div>

  <div class="row">

    <div class="col col-12 text-center d d-flex flex-column align-items-center">

      <button id="eliminarComponentesIngresados" class="btn btn-danger"><i class="fas fa-trash"></i>&nbsp;&nbsp;Eliminar componentes</button>
      <div class="letra__titulo titulo__iniciativas">Si desea editar las fechas y el monto tendrá que eliminar los componentes</div>

    </div>

  </div>

  <div class="row d-flex justify-content-center top-margenes">

    <div class="d-flex flex-column col col-12 col-md-6 d-flex justify-content-center align-items-center">

      <button id="mostrarInfomacionDisenadaUno" class="clases__informacion__diseanadas active__menusInformados">
        
        <i class="fas fa-file"></i>

      </button>

      <div class="letrasIconosMenus">Datos del proyecto</div>

    </div>

  </div>


  <div class="row d-flex flex-column align-items-center">

    <div class="col col-12 col-md-7">

      <div class="row ocultos__proyectos__1 top-margenes">

        <div class="col-sm-2 col-xs-2 col-2" data-toggle="tooltip" title="El nombre del proyecto deberá estar compuesto por dos elementos: la acción a realizarse y sobre que se va actuar, por ejemplo: 'Participación de la Deportista Paola Cueva en el Campeonato Mundial de Atletismo San Diego 2015', 'Dotación de Implementación para las Ligas Deportivas Barriales de la Provincia de Pichincha', 'Organización de los Juegos Intercantonales Azuay 2015', otros.">

          <div class="rotulo__referencias">Nombre del proyecto</div>
                        
        </div>

        <div class="col-sm-8 col-xs-8 col-8">

          <?php if (empty($arrayProyectosDatos[0])): ?>
                              
            <textarea id="nombreProyecto" name="nombreProyecto" class="text__areas obligatorios__proyectosUnitarios"></textarea>

          <?php else: ?>
                              
            <textarea id="nombreProyecto" name="nombreProyecto" class="text__areas obligatorios__proyectosUnitarios"><?= $arrayProyectosDatos[0];?></textarea>

          <?php endif ?>

                            
        </div>

        <div class="col-sm-2 col-xs-2 col-2 text-center">

          <span class="cursores__modales" data-toggle="modal" data-target="#modalEjemploProyecto"><i class="fas fa-question-circle"></i><br><div class="letras__precionar">Click para obtener<br>mayor información</div></span>
                        
        </div>

      </div>


      <div class="row ocultos__proyectos__1">

        <div class="col-sm-12 col-xs-12 col-12">

            <div class="rotulo__referencias">Periodo del proyecto</div>
                        
        </div>

        <div class="col-sm-2 col-xs-2 col-2 col-md-2">

            <div class="rotulo__referencias">Fecha inicio</div>
                        
        </div>

        <div class="col-md-4 col-10">

            <?php if ((empty($arrayProyectosDatos[14]) || $arrayProyectosDatos[14]=="no")): ?>

              <input type="text" id="inicioPeriodos" name="inicioPeriodos" class="text-center obligatorios__proyectosUnitarios selector__inicial"  readonly="" />
              
            <?php else: ?>

              <input type="text" id="inicioPeriodos" name="inicioPeriodos" class="text-center obligatorios__proyectosUnitarios selector__inicial" value="<?=$arrayProyectosDatos[14]?>" readonly="" />
              
            <?php endif ?>


            <input type="hidden" id="mensajePlurianual" name="mensajePlurianual">

            <input type="hidden" id="mensajePlurianualAnios" name="mensajePlurianualAnios">
                        
        </div>

        <div class="col-sm-2 col-xs-2 col-2 col-md-2">

            <div class="rotulo__referencias">Fecha fin</div>
                        
        </div>


        <div class="col-sm-4 col-xs-4 col-10 col-md-4">

          <?php if ((empty($arrayProyectosDatos[15]) || $arrayProyectosDatos[15]=="no")): ?>

            <input type="text" id="finPeriodos" name="finPeriodos" class="text-center obligatorios__proyectosUnitarios selector__inicial"  readonly="" />
              
          <?php else: ?>

            <input type="text" id="finPeriodos" name="finPeriodos" class="text-center obligatorios__proyectosUnitarios selector__inicial" value="<?=$arrayProyectosDatos[15]?>" readonly="" />
              
          <?php endif ?>
                        
        </div>

        <?php $plantilla->parciales(1);?>

      </div>

      <!--================================================
      =            Fechas plurianuales montos            =
      =================================================-->

      <!--===================================
      =            Presupuesto 1            =
      ====================================-->
      
     <?php if ((empty($arrayProyectosDatos[7]) || $arrayProyectosDatos[7]=="no")): ?>

      <div class="row presupuestosUnos presupuesto__letras ocultos__proyectos__1">
        
      <?php else: ?>

      <div class="row presupuestosUnos ocultos__proyectos__1">
        
      <?php endif ?>



        <div class="rotulo__referencias col-12 col-md-2 text-left d-flex presupuestos__disponibles__asignados__1">Presupuesto&nbsp;<span class="anioInforme__1"></span></div>

        <div class="col-12 col-md-10 text-left d-flex">

          <?php if (empty($arrayProyectosDatos[7]) || $arrayProyectosDatos[7]=="no"): ?>
                                  
            <input type="text" name="presupuesto" id="presupuesto" class="solo__numero__montos presupuesto__calculado text__areas obligatorios__proyectosUnitarios sumador__presupuestos" placeholder="$" value="0">

          <?php else: ?>
                                  
            <input type="text" name="presupuesto" id="presupuesto" class="solo__numero__montos presupuesto__calculado text__areas obligatorios__proyectosUnitarios sumador__presupuestos" value="<?= $arrayProyectosDatos[7];?>">

          <?php endif ?>


        </div>

      </div>
      

      <?php if ((empty($arrayProyectosDatos[7]) || $arrayProyectosDatos[7]=="no")): ?>

      <div class="row presupuestosUnos presupuesto__letras ocultos__proyectos__1">
        
      <?php else: ?>

      <div class="row presupuestosUnos ocultos__proyectos__1">
        
      <?php endif ?>

       <div class="rotulo__referencias col-12 col-md-2">En letras</div>

        <div class="col-sm-12 col-xs-10 d-flex col-md-10">


            <?php if (empty($arrayProyectosDatos[1]) || $arrayProyectosDatos[1]=="no"): ?>
                                  
              <input type="text" name="presupuestoLetras" id="presupuestoLetras" class="presupuestoLetras text__areas obligatorios__proyectosUnitarios" disabled="">

            <?php else: ?>
                                  
              <input type="text" name="presupuestoLetras" id="presupuestoLetras" class="presupuestoLetras text__areas obligatorios__proyectosUnitarios" value="<?= $arrayProyectosDatos[1];?>" disabled="">

            <?php endif ?>
                 
        </div>

      </div>  
      
      <!--====  End of Presupuesto 1  ====-->
      
      <!--===================================
      =            Presupuesto 2            =
      ====================================-->
      
      <?php if ((empty($arrayProyectosDatos[9]) || $arrayProyectosDatos[9]=="no")): ?>

      <div class="row presupuestosDos presupuesto__letras__2 ocultos__proyectos__1">
        
      <?php else: ?>

      <div class="row presupuestosDos ocultos__proyectos__1">
        
      <?php endif ?>

        <div class="rotulo__referencias col-12 col-md-2 text-left d-flex">Presupuesto&nbsp;<span class="anioInforme__2"></span></div>

        <div class="col-12 col-sm-10 col-xs-10 col-md-10 d-flex">

          <?php if (empty($arrayProyectosDatos[9]) || $arrayProyectosDatos[9]=="no"): ?>
                                  
            <input type="text" name="presupuestoDos" id="presupuestoDos" class="solo__numero__montos presupuesto__calculado__dos text__areas sumador__presupuestos" placeholder="$" value="0">

          <?php else: ?>
                                  
            <input type="text" name="presupuestoDos" id="presupuestoDos" class="solo__numero__montos presupuesto__calculado__dos text__areas sumador__presupuestos" value="<?= $arrayProyectosDatos[9];?>">

          <?php endif ?>


        </div>

      </div>

      <?php if ((empty($arrayProyectosDatos[9]) || $arrayProyectosDatos[9]=="no")): ?>

      <div class="row presupuestosDos presupuesto__letras__2 ocultos__proyectos__1">
        
      <?php else: ?>

      <div class="row presupuestosDos ocultos__proyectos__1">
        
      <?php endif ?>  

         <div class="rotulo__referencias col-md-2 col-12">En letras</div>

        <div class="col-sm-10 col-xs-10 col-md-10 d-flex col-12">


            <?php if (empty($arrayProyectosDatos[8]) || $arrayProyectosDatos[8]=="no"): ?>
                                  
              <input type="text" name="presupuestoLetrasDos" id="presupuestoLetrasDos" class="presupuestoLetras__dos text__areas" disabled="">

            <?php else: ?>
                                  
              <input type="text" name="presupuestoLetrasDos" id="presupuestoLetrasDos" class="presupuestoLetras__dos text__areas" value="<?= $arrayProyectosDatos[8];?>" disabled="">

            <?php endif ?>
                 
        </div>

      </div>  
      
      <!--====  End of Presupuesto 2  ====-->

      <!--===================================
      =            Presupuesto 3            =
      ====================================-->
      
      <?php if ((empty($arrayProyectosDatos[10]) || $arrayProyectosDatos[10]=="no")): ?>

      <div class="row presupuestosTres presupuesto__letras__3 ocultos__proyectos__1">
        
      <?php else: ?>

      <div class="row presupuestosTres ocultos__proyectos__1">
        
      <?php endif ?>    

       <div class="rotulo__referencias col-md-2 col-12 text-left d-flex">Presupuesto&nbsp;<span class="anioInforme__3"></span></div>

        <div class="col-md-10 col-12 text-left d-flex">

          <?php if (empty($arrayProyectosDatos[11]) || $arrayProyectosDatos[11]=="no"): ?>
                                  
            <input type="text" name="presupuestoTres" id="presupuestoTres" class="solo__numero__montos presupuesto__calculado__tres text__areas sumador__presupuestos" placeholder="$" value="0">

          <?php else: ?>
                                  
            <input type="text" name="presupuestoTres" id="presupuestoTres" class="solo__numero__montos presupuesto__calculado__tres text__areas sumador__presupuestos" value="<?= $arrayProyectosDatos[11];?>">

          <?php endif ?>


        </div>

      </div>


      <?php if ((empty($arrayProyectosDatos[10]) || $arrayProyectosDatos[10]=="no")): ?>

      <div class="row presupuestosTres presupuesto__letras__3 ocultos__proyectos__1">
        
      <?php else: ?>

      <div class="row presupuestosTres ocultos__proyectos__1">
        
      <?php endif ?>    

        <div class="rotulo__referencias col-12 col-md-2">En letras</div>

        <div class="col-sm-10 col-12 col-md-10 col-xs-10 d-flex">

            <?php if (empty($arrayProyectosDatos[10]) || $arrayProyectosDatos[10]=="no"): ?>
                                  
              <input type="text" name="presupuestoLetrasTres" id="presupuestoLetrasTres" class="presupuestoLetras__tres text__areas" disabled="">

            <?php else: ?>
                                  
              <input type="text" name="presupuestoLetrasTres" id="presupuestoLetrasTres" class="presupuestoLetras__tres text__areas" value="<?= $arrayProyectosDatos[10];?>" disabled="">

            <?php endif ?>
                 
        </div>

      </div>    
      
      <!--====  End of Presupuesto 3  ====-->
        

    <!--===================================
    =            Presupuesto 4            =
    ====================================-->

     <?php if ((empty($arrayProyectosDatos[18]) || $arrayProyectosDatos[18]=="no")): ?>

      <div class="row presupuestosCuatro presupuesto__letras__4 ocultos__proyectos__1">
        
      <?php else: ?>

      <div class="row presupuestosCuatro ocultos__proyectos__1">
        
      <?php endif ?>    

        <div class="rotulo__referencias col-md-2 col-12 text-left d-flex">Presupuesto&nbsp;<span class="anioInforme__4"></span></div>

        <div class="col-md-10 col-12 text-left d-flex">

          <?php if (empty($arrayProyectosDatos[18]) || $arrayProyectosDatos[18]=="no"): ?>
                                  
            <input type="text" name="presupuestoCuatro" id="presupuestoCuatro" class="solo__numero__montos presupuesto__calculado__cuatro text__areas sumador__presupuestos" placeholder="$" value="0">

          <?php else: ?>
                                  
            <input type="text" name="presupuestoCuatro" id="presupuestoCuatro" class="solo__numero__montos presupuesto__calculado__cuatro text__areas sumador__presupuestos" value="<?= $arrayProyectosDatos[18];?>">

          <?php endif ?>


        </div>

      </div>


      <?php if ((empty($arrayProyectosDatos[18]) || $arrayProyectosDatos[18]=="no")): ?>

      <div class="row presupuestosCuatro presupuesto__letras__4 ocultos__proyectos__1">
        
      <?php else: ?>

      <div class="row presupuestosCuatro ocultos__proyectos__1">
        
      <?php endif ?>    

        <div class="rotulo__referencias col-12 col-md-2 col-sm-2 col-xs-2 d-flex">En letras</div>

        <div class="col-sm-10 col-xs-10 d-flex col-12 col-md-10">

            <?php if (empty($arrayProyectosDatos[19]) || $arrayProyectosDatos[19]=="no"): ?>
                                  
              <input type="text" name="presupuestoLetrasCuatro" id="presupuestoLetrasCuatro" class="presupuestoLetras__cuatro text__areas" disabled="">

            <?php else: ?>
                                  
              <input type="text" name="presupuestoLetrasCuatro" id="presupuestoLetrasCuatro" class="presupuestoLetras__cuatro text__areas" value="<?= $arrayProyectosDatos[19];?>" disabled="">

            <?php endif ?>
                 
        </div>

      </div>  

    <!--====  End of Presupuesto 4  ====-->


    <!--=======================================
    =            Presupuesto total            =
    ========================================-->

    <div class="row ocultos__proyectos__1">

      <div class="col-md-2 col-12 rotulo__referencias">

        Presupuesto Total

      </div>

      <div class="col-md-4 col-12">

        <input type="text" id="presupuestoTotal" readonly="" class="selector__inicial">

      </div>

    </div>

  </div>

</div>
<!--====  End of Presupuesto total  ====-->

<!--====  End of Fechas plurianuales montos  ====-->
  
<?php if ($arrayInstancias[0]=="Técnico" || $arrayInstancias[2]=="Tecnológico"): ?>
  
<div class="row d-flex flex-column align-items-center">

  <div class="col col-12 col-md-7">

    <div class="row d-flex justify-content-center top-margenes">

      <div class="d-flex flex-column col col-12 col-md-6 d-flex justify-content-center align-items-center">

        <button id="mostrarInfomacionDisenadaDos" class="clases__informacion__diseanadas active__menusInformados">
          
          <i class="fas fa-globe-americas"></i>

        </button>

        <div class="letrasIconosMenus text-center">Ubicación de eventos<br>deportivos</div>

      </div>

    </div>


    <div class="row ocultos__proyectos__2">

      <div class="col-sm-12 col-xs-12 col-12">

        <div class="rotulo__referencias">Ubicación</div>
                      
      </div>

    </div>

    <div class="row ocultos__proyectos__2">

      <div class="col-sm-10 col-xs-10 col-10">

        <div class="rotulo__referencias" data-toggle="tooltip" title="Si desea añadir una ubicación dar clic en el botón de añadir">Descripción de la ubicación geográfica del lugar o lugares donde se ejecutará:</div>
                      
      </div>

      <div class="col-sm-2 col-xs-2 col-2" data-toggle="tooltip" title="Si desea añadir una ubicación dar clic en el botón de añadir">

        <button id="anadirUbicacion" name="anadirUbicacion" class="anadir__cosas btn btn-primary"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Añadir&nbsp;&nbsp;</button>

      </div>


    </div>

     <div class="row ocultos__proyectos__2">

        <div class="col-sm-12 col-xs-12 ubicaciones__geograficas__editar"></div>

    </div>

    <div class="row ocultos__proyectos__2">

      <div class="col-sm-12 col-xs-12 ubicaciones__geograficas"></div>

    </div>

  </div>

</div>

<?php endif ?>


<!--==================================================
=            Componentes Infraestructuras            =
===================================================-->

<?php if ($arrayInstancias[1]=="Infraestructura"): ?>

<div class="row d-flex justify-content-center top-margenes">

  <div class="d-flex flex-column col col-12 col-md-6 d-flex justify-content-center align-items-center">

    <button id="mostrarInfomacionDisenadaTres" class="clases__informacion__diseanadas active__menusInformados">
        
      <i class="fas fa-building"></i>

    </button>

    <div class="letrasIconosMenus text-center">Información relacionada<br> a infraestructura</div>

  </div>

</div>

<div class="row d-flex flex-column align-items-center">

  <div class="col col-12 col-md-7">

    <div class="row ocultos__proyectos__3">

      <div class="col-sm-10 col-xs-10 col-10">

        <div class="rotulo__referencias">Situación Legal del Predio</div>
                        
      </div>

      <div class="col-sm-2 col-xs-2 text-center col-2">

          <span class="cursores__modales" data-toggle="modal" data-target="#modalInfomacionPredios"><i class="fas fa-question-circle"></i><br><div class="letras__precionar">Click para obtener<br>mayor información</div></span>
                        
      </div>

      <br>
      <br>

      <div class="col-sm-12 col-xs-12 col-12">

        <?php if (empty($arrayProyectosDatos[20])): ?>

          <textarea id="situacionLegalPredio" name="situacionLegalPredio" class="text__tareas2 obligatorios__proyectosUnitarios"></textarea>
          
        <?php else: ?>

          <textarea id="situacionLegalPredio" name="situacionLegalPredio" class="text__tareas2 obligatorios__proyectosUnitarios"><?=$arrayProyectosDatos[20]?></textarea>
          
        <?php endif ?>

                        
      </div>

    </div>

    <br>

    <div class="row ocultos__proyectos__3">

      <div class="col-sm-2 col-xs-2 col-12 col-md-2">

        <div class="rotulo__referencias">Número de certificado de propiedad</div>
                        
      </div>

      <div class="col-sm-4 col-xs-4 col-12 col-md-4">

        <?php if (empty($arrayProyectosDatos[21])): ?>

          <input type="text" id="numeroCertificadoPropiedad" name="numeroCertificadoPropiedad" class="selector__inicial obligatorios__proyectosUnitarios"/>
          
        <?php else: ?>

          <input type="text" id="numeroCertificadoPropiedad" name="numeroCertificadoPropiedad" class="selector__inicial obligatorios__proyectosUnitarios" value="<?=$arrayProyectosDatos[21]?>" />
          
        <?php endif ?>

                        
      </div>

    </div>

    <div class="row ocultos__proyectos__3">


      <div class="col-sm-12 col-xs-12 col-12 botoom-margenes">

        <div class="rotulo__referencias">Plazo de ejecución</div>
                        
      </div>


      <div class="col-sm-2 col-xs-2 col-2 col-md-2">

        Fecha inicial
                        
      </div>

      <div class="col col-4 col-10 col-md-4">

        <?php if (empty($arrayProyectosDatos[22])): ?>
          <input type="text" id="fechaInicialPlazo" name="fechaInicialPlazo" class="selector__inicial picker__seleccionables obligatorios__proyectosUnitarios" readonly="">
        <?php else: ?>
          <input type="text" id="fechaInicialPlazo" name="fechaInicialPlazo" class="selector__inicial picker__seleccionables obligatorios__proyectosUnitarios" value="<?=$arrayProyectosDatos[22]?>" readonly="">
        <?php endif ?>

      </div>

      <div class="col-sm-2 col-xs-2 col-2 col-md-2">

        Fecha final
                        
      </div>

      <div class="col col-4 col-10 col-md-4">

        <?php if (empty($arrayProyectosDatos[23])): ?>
          <input type="text" id="fechaFinalPlazo" name="fechaFinalPlazo" class="selector__inicial picker__seleccionables obligatorios__proyectosUnitarios" readonly="">
        <?php else: ?>
          <input type="text" id="fechaFinalPlazo" name="fechaFinalPlazo" class="selector__inicial picker__seleccionables obligatorios__proyectosUnitarios" value="<?=$arrayProyectosDatos[23]?>" readonly="">
        <?php endif ?>

      </div>

    </div>

  </div>

</div>

<?php endif ?>


<!--====  End of Componentes Infraestructuras  ====-->


<br>

<div class="row">

  <div class="col-xs-12 col-sm-12 text-center">

    <button id="enviarProyectosUnitarios" name="enviarProyectosUnitarios" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;GUARDAR</button>

  </div>

  <div class="enviarDatosGenerales__reload"></div>

</div>

  <!--====  End of Contenido Principal formularios  ====-->
                      
</div>
<!--====  End of Sección principal  ====-->

<!--=======================================
=            Modal informativo            =
========================================-->

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


<div class="modal fade" id="modalInfomacionPredios">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold;">Situación Legal del Predio</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body body__preguntas">

        Aquí detallará la situación legal vigente del predio, por ejemplo: El presente objeto proyecto se ejecutará en el gimnasio del Coliseo Santa Catalina de Guambo, cuyo predio se encuentra en propiedad de la Federación Deportiva de Guambo sobre la cual no pesa gravamen alguno.
        <br>
        Como respaldo de esta información la entidad beneficiaría adjuntará una copia certificada de las escrituras del predio legalmente inscritas en el registro de la propiedad así como un certificado de gravamen actualizado otorgado por el Registrador de la Propiedad del Cantón.

      </div>


    </div>

  </div>

</div>


<!--====  End of Modal informativo  ====-->
