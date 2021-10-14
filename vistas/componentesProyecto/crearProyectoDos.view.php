<!--=================================================
=            Declaración de la plantilla            =
==================================================-->
<?php $plantilla= new plantilla();?>
<?php $usuariosConsultados= new usuariosConsultados();?>
<?php $objeto= new usuario();?>
<!--====  End of Declaración de la plantilla  ====-->

<!--==========================================
=            Asignación variables            =
===========================================-->

<?php $arrayUsuario=$usuariosConsultados->plantillaUsuariosModelos();?>

<!--====  End of Asignación variables  ====-->


<!--===========================
=            Aside            =
============================-->
<?php $plantilla->componentesDasboard(1);?>
<!--====  End of Aside  ====-->

<!--=======================================
=            Obtener los tipos            =
========================================-->

<?php $usuariosVectores=$objeto->usuarioCtr();?>

<?php $arrayUsuariosVectores = explode("___", $usuariosVectores);?>

<?php if ($arrayUsuariosVectores[0]==2): ?>

   <?php $tipoDos=$arrayUsuariosVectores[14];?>

   <?php $codigo=$arrayUsuariosVectores[11];?>

   <input type="hidden" name="codigoCreacion" id="codigoCreacion" value="<?=$arrayUsuario[11]?>">

<?php else: ?>

  <?php $tipoDos=$arrayUsuariosVectores[14];?>

  <?php $codigo=$arrayUsuariosVectores[13];?>

   <input type="hidden" name="codigoCreacion" id="codigoCreacion" value="<?=$arrayUsuario[13]?>">
  
<?php endif ?>

<!--====  End of Obtener los tipos  ====-->

<?php $instancia=$objeto->ctrInstancia($codigo);?>


<?php 

  $array = explode("____", $instancia);


 for ($i=0; $i < count($array); $i++) { 

    if($array[$i]=="altoRendimiento"){

      $altoRendimiento="si";

      break;

    }else{

      $altoRendimiento="no";

    }

  }


 for ($i=0; $i < count($array); $i++) { 

    if($array[$i]=="altoRendimientoDiscapacidad"){

      $altoRendimientoDiscapacidad="si";

      break;

    }else{

      $altoRendimientoDiscapacidad="no";

    }

  }

 for ($i=0; $i < count($array); $i++) { 

    if($array[$i]=="profesional"){

      $profesional="si";

      break;

    }else{

      $profesional="no";

    }

  }

 for ($i=0; $i < count($array); $i++) { 

    if($array[$i]=="formativo"){

      $formativo="si";

      break;

    }else{

      $formativo="no";

    }

  }

 for ($i=0; $i < count($array); $i++) { 

    if($array[$i]=="estudiantil"){

      $estudiantil="si";

      break;

    }else{

      $estudiantil="no";

    }

  }

 for ($i=0; $i < count($array); $i++) { 

    if($array[$i]=="recreativo"){

      $recreativo="si";

      break;

    }else{

      $recreativo="no";

    }

  }


 for ($i=0; $i < count($array); $i++) { 

    if($array[$i]=="infra"){

      $infra="si";

      break;

    }else{

      $infra="no";

    }

  }


 for ($i=0; $i < count($array); $i++) { 

    if($array[$i]=="infraTeconlogicos"){

      $infraTeconlogicos="si";

      break;

    }else{

      $infraTeconlogicos="no";

    }

  }



?>

<!--=====================================
=            Crear proyectos            =
======================================-->


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


<!--====  End of Crear proyectos  ====-->

<input type="hidden" id="relacionadosText" name="relacionadosText" value="<?=$sumatoresArrays?>">

<?php $plantilla->parciales(4);?>

<!--=======================================
=            Sección Principal           =
========================================-->

<input type="hidden" name="valorTIpoDos" id="valorTIpoDos" value="<?= $tipoDos?>">

<div class="panel-body">

  <div class="row">

    <div class="col col-12 text-center font-weight-titulo">

      SECTOR AL QUE CONTRIBUYE EL PROYECTO

    </div>

  </div>

  <br>
  <br>

  <div class="row">

    <div class="col col-12 text-center d d-flex flex-column align-items-center">

      <button id="eliminarComponentesIngresados" class="btn btn-danger"><i class="fas fa-trash"></i>&nbsp;&nbsp;Eliminar componentes</button>
      <div class="letra__titulo titulo__iniciativas">Si desea editar el sector al que contribuye debe eliminar los componentes previamente ingresados</div>

    </div>

  </div>
 

  <div class="row" style="margin-top: 1em;">

    <table class="table tabla__creacion__proyectos col-sm-12 col-xs-12 tabla__creaciones">

      <thead>

        <tr>

          <th colspan="3" class="tamanio__head">¿A qué sector deportivo beneficia mi proyecto?<i class="far fa-question-circle letras__especificas" data-toggle="modal" data-target="#modalSectorIndicados"></i></th>

        </tr>

      </thead>

      <tbody>

        <tr class="fila__alto__rendimiento">

          <td scope="col">Deporte convencional de alto rendimiento</td>

          <td>
                  
            Es aquel que implica una práctica sistemática y de alta exigencia en la respectiva especialidad deportiva, comprendida desde la especialización deportiva hasta alcanzar el alto rendimiento, mediante procesos y programas sistematizados de entrenamiento.                  

          </td>

          <?php if ($altoRendimiento=="si"): ?>
                  
            <td scope="col"><input type="radio" name="radiosSecciones" id="sectorDeporteConvencional" class="checks__grupales__validas checkeds__conjuntos__proyectosCrear checkeds__tecnicos" nombreAtributos="Alto rendimiento" nombreAtributosDos="Alto rendimiento"list="" checked="checked"></td>

          <?php else: ?>

            <td scope="col"><input type="radio" name="radiosSecciones" id="sectorDeporteConvencional" class="checks__grupales__validas checkeds__conjuntos__proyectosCrear checkeds__tecnicos" nombreAtributos="Alto rendimiento" nombreAtributosDos="Alto rendimiento"></td>
                  
          <?php endif ?>

        </tr>

        <tr class="fila__altoDiscapacidad">

          <td scope="col">Deporte de alto rendimiento para personas con discapacidad</td>
                                 
          <td>
                  
            Es aquel que implica una práctica sistemática y de alta exigencia en la respectiva especialidad deportiva, comprendida desde la especialización deportiva hasta alcanzar el alto rendimiento, mediante procesos y programas sistematizados de entrenamiento.                  

          </td>

          <?php if ($altoRendimientoDiscapacidad=="si"): ?>
                  
            <td scope="col">
              <input type="radio" name="radiosSecciones" id="sectorDeporteAltoRendimiento" class="checks__grupales__validas checkeds__conjuntos__proyectosCrear checkeds__tecnicos" nombreAtributos="Alto rendimiento para personas con discapacidad" nombreAtributosDos="Alto rendimiento para personas con discapacidad" checked="checked">
            </td>

          <?php else: ?>
                  
            <td scope="col">
              <input type="radio" name="radiosSecciones" id="sectorDeporteAltoRendimiento" class="checks__grupales__validas checkeds__conjuntos__proyectosCrear checkeds__tecnicos" nombreAtributos="Alto rendimiento para personas con discapacidad" nombreAtributosDos="Alto rendimiento para personas con discapacidad">
            </td>

          <?php endif ?>
                                  
        </tr>

        <tr class="fila__deporteprofesional">

          <td scope="col">Deporte profesional</td>

          <td>
                  
          El deporte profesional comprenderá las actividades que son remuneradas y lo desarrollarán las organizaciones deportivas legalmente constituidas y reconocidas desde la búsqueda y selección de talentos hasta el alto rendimiento.            

          </td>

          <?php if ($profesional=="si"): ?>
                  
            <td scope="col">
              <input type="radio" name="radiosSecciones" id="sectorDeporteProfesional" class="checks__grupales__validas checkeds__conjuntos__proyectosCrear checkeds__tecnicos" nombreAtributos="Deporte Profesional" nombreAtributosDos="Deporte profesional" checked="checked">
            </td>

          <?php else: ?>
                  
            <td scope="col">
              <input type="radio" name="radiosSecciones" id="sectorDeporteProfesional" class="checks__grupales__validas checkeds__conjuntos__proyectosCrear checkeds__tecnicos" nombreAtributos="Deporte Profesional" nombreAtributosDos="Deporte profesional">
            </td>

           <?php endif ?>
                  
        </tr>

        <tr class="fila__deporte__formativo">

          <td scope="col">Deporte formativo</td>

          <td scope="col">

            Es aquel cuya finalidad es adquirir una formación motriz que capacite al individuo para responder mejor a los estímulos físicos que impone la vida diaria y actúa también como la educación física de la persona. Está ligado a las edades tempranas donde los niños y las niñas aprenden gestos, habilidades, destrezas comunes, que le permitirán ir descubriendo sus capacidades funcionales. Comprenderá la búsqueda y selección de talentos, iniciación deportiva, enseñanza y desarrollo
                  
          </td>

          <?php if ($formativo=="si"): ?>
                  
            <td scope="col">
              <input type="radio" name="radiosSecciones" id="sectorDeporteFormativo" class="checks__grupales__validas checkeds__conjuntos__proyectosCrear checkeds__tecnicos" nombreAtributos="Deporte Formativo" nombreAtributosDos="Deporte formativo" checked="checked">
            </td>

          <?php else: ?>
                  
            <td scope="col">
              <input type="radio" name="radiosSecciones" id="sectorDeporteFormativo" class="checks__grupales__validas checkeds__conjuntos__proyectosCrear checkeds__tecnicos" nombreAtributos="Deporte Formativo" nombreAtributosDos="Deporte formativo">
            </td>

          <?php endif ?>

        </tr>

        <tr class="fila__educacion__fisica">

          <td scope="col">Educación física</td>


          <td scope="col">

            Es una disciplina que basa su accionar en la enseñanza y perfeccionamiento de movimientos corporales. Busca formar de una manera integral y armónica al ser humano, estimulando positivamente sus capacidades físicas.
                  
          </td>

          <?php if ($estudiantil=="si"): ?>
                  
            <td scope="col"><input type="radio" name="radiosSecciones" id="sectorEducacionFisica" class="checks__grupales__validas checkeds__conjuntos__proyectosCrear checkeds__tecnicos" nombreAtributos="Educación Física" nombreAtributosDos="Educación física" checked="checked"></td>

          <?php else: ?>
                  
            <td scope="col"><input type="radio" name="radiosSecciones" id="sectorEducacionFisica" class="checks__grupales__validas checkeds__conjuntos__proyectosCrear checkeds__tecnicos" nombreAtributos="Educación Física" nombreAtributosDos="Educación física"></td>

          <?php endif ?>

              
        </tr>

        <tr class="fila__recreacion">

          <td scope="col">Recreación</td>
                                  

          <td scope="col">

            La recreación comprenderá todas las actividades físicas lúdicas que empleen al tiempo libre de una manera planificada, buscando un equilibrio biológico y social en la consecución de una mejor salud y calidad de vida. Estas actividades incluyen las organizadas y ejecutadas por el deporte barrial y parroquial, urbano y rural.
                  
          </td>


          <?php if ($recreativo=="si"): ?>
                  
            <td scope="col"><input type="radio" name="radiosSecciones" id="sectorRecreacion" class="checks__grupales__validas checkeds__conjuntos__proyectosCrear checkeds__tecnicos" nombreAtributos="Recreación" nombreAtributosDos="Recreación" checked="checked"></td>

          <?php else: ?>
                  
            <td scope="col"><input type="radio" name="radiosSecciones" id="sectorRecreacion" class="checks__grupales__validas checkeds__conjuntos__proyectosCrear checkeds__tecnicos" nombreAtributos="Recreación" nombreAtributosDos="Recreación"></td>

          <?php endif ?>

        </tr>

      </tbody>

    </table>

  </div>

  <div class="row">

    <br>

    <div class="col col-12">

      Si el proyecto contiene los siguientes componentes elegir a continuación:

    </div>

    <br>

    <br>

    <table class="table tabla__creacion__proyectos col col-12 tabla__creacion__proyectos__creadas">

      <tbody>

        <tr class="fila__infraestrucutra__deportiva">

          <td class="letra__titulo">

            <center>
              Componentes de infraestructura y/o herramientas tecnológicas para el fomento, realización o seguimiento del deporte y la actividad física
            </center>

          </td>

          <td scope="col">

            <center>

              <?php if ($infraTeconlogicos=="si"): ?>
                      
                <input type="checkbox" name="selectorCasillasTecnologicos" id="selectorCasillasTecnologicos" class="checks__grupales__validas checkeds__conjuntos__proyectosCrear" nombreAtributos="Componentes Tecnologicos" nombreAtributosDos="Componentes tecnologicos" checked="checked">

              <?php else: ?>
                      
                <input type="checkbox" name="selectorCasillasTecnologicos" id="selectorCasillasTecnologicos" class="checks__grupales__validas checkeds__conjuntos__proyectosCrear" nombreAtributos="Componentes Tecnologicos" nombreAtributosDos="Componentes tecnologicos">

              <?php endif ?>

            </center>

          </td>

        </tr>

        <tr class="fila__infraestrucutra__deportiva">

          <td class="letra__titulo">

            <center>
              Componentes de construcción de obra nueva, rehabilitación, readecuación y/o mantenimiento de infraestructura deportivaa
            </center>

          </td>

          <td scope="col">

            <center>

              <?php if ($infra=="si"): ?>
                      
                <input type="checkbox" name="selectorCasillasInfra" id="selectorCasillasInfra" class="checks__grupales__validas checkeds__conjuntos__proyectosCrear" nombreAtributos="Componentes de Infraestructura" nombreAtributosDos="Componentes de infraestructura" checked="checked">

              <?php else: ?>
                      
                <input type="checkbox" name="selectorCasillasInfra" id="selectorCasillasInfra" class="checks__grupales__validas checkeds__conjuntos__proyectosCrear" nombreAtributos="Componentes de Infraestructura" nombreAtributosDos="Componentes de infraestructura">

              <?php endif ?>

            </center>

          </td>

        </tr>

        <tr>
                
          <td colspan="2">

            <div class="tex-justify col col-12 bodys__infras"></div>

            <div class="tex-justify col col-12 bodys__infras__tecnicos"></div>

          </td>

        </tr>

      </tbody>

    </table>

   <div class="col col-12 text-center">

    <button class="btn btn-primary" id="crearProyecto" name="crearProyecto"><i class="far fa-share-square"></i>&nbsp;CREAR PROYECTO</button>

    <div class="reload__creacion__proyecto"></div>

   </div>

  </div>

</div>


<!--====  End of Sección Principal  ====-->

<!--=============================
=            Modales            =
==============================-->

<div class="modal fade" id="modalSectorIndicados">

  <div class="modal-dialog modal-dialog-centered ancho__dialogo__informativo" role="document">

    <div class="modal-content row modal__content__dialogos">

      <div class="col col-12 alineamiento__informativos" style="margin-top: 1em; display: flex; align-items: center;">

        <div class="flexcard flexcardBlue">

          <div class="flexcardNumber flexcardNumberBlue">
            <div class="letra__titulo letra__titulo__card" style="position:relative; left:-36%;">Requisitos:</div>
          </div>

          <div class="tex-justify requisitos__usuarios col col-12 letras__titulos__representativos"></div>
        
        </div>

      </div>

    </div>

  </div>

</div>

<!--====  End of Modales  ====-->
