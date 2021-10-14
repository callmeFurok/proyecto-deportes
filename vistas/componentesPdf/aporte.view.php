 <?php

  extract($_POST);

  require_once "../../conexion/conexion.php";

  $conexionRecuperada= new conexion();
  $conexionEstablecida=$conexionRecuperada->cConexion();

  /*==================================
  =            Alineación            =
  ==================================*/
  
    $query="SELECT alineacionEstrategica,linea1,linea2,linea3,objetivo1Linea1,objetivo2Linea1,objetivo3Linea1,objetivo4Linea1,objetivo5Linea1,objetivo6Linea1,objetivo7Linea1,objetivo8Linea1,objetivo9Linea1,objetivo10Linea1,objetivo11Linea1,objetivo1Linea2,objetivo2Linea2,objetivo3linea2,objetivo4Linea2,objetivo1Linea3,objetivo2Linea3,objetivo3Linea3,objetivo4Linea3,objetivo5Linea3,objetivo1Institucional,objetivo2Institucional,objetivo1Linea1Item1,objetivo1Linea1Item2,objetivo1Linea1Item3,objetivo2Linea1Item1,objetivo2Linea1Item2,objetivo2Linea1Item3,objetivo2Linea1Item4,objetivo3Linea1Item1,objetivo3Linea1Item2,objetivo3Linea1Item3,objetivo3Linea1Item4,objetivo4Linea1Item1,objetivo5Linea1Item1,objetivo6Linea1Item1,objetivo6Linea1Item2,objetivo7Linea1Item1,objetivo7Linea1Item2,objetivo8Linea1Item1,objetivo8Linea1Item2,objetivo8Linea1Item3,objetivo8Linea1Item4,objetivo8Linea1Item5,objetivo9Linea1Item1,objetivo10Linea1Item1,objetivo10Linea1Item2,objetivo10Linea1Item3,objetivo10Linea1Item4,objetivo10Linea1Item5,objetivo11Linea1Item1,objetivo11Linea1Item2,objetivo1Linea2Item1,objetivo1Linea2Item2,objetivo1Linea2Item3,objetivo1Linea2Item4,objetivo2Linea2Item1,objetivo2Linea2Item2,objetivo2Linea2Item3,objetivo3Linea2Item1,objetivo3Linea2Item2,objetivo3Linea2Item3,objetivo4Linea2Item1,objetivo4Linea2Item2,objetivo1Linea3Item1,objetivo1Linea3Item2,objetivo1Linea3Item3,objetivo1Linea3Item4,objetivo1Linea3Item5,objetivo1Linea3Item6,objetivo2Linea3Item1,objetivo2Linea3Item2,objetivo3Linea3Item1,objetivo3Linea3Item2,objetivo3Linea3Item3,objetivo4Linea3Item1,objetivo4Linea3Item2,objetivo5Linea3Item1,objetivo5Linea3Item2,objetivo1Institucionaltem1,objetivo1Institucionaltem2,objetivo1Institucionaltem3,objetivo2Institucionaltem1,objetivo2Institucionaltem2,objetivo2Institucionaltem3 FROM pro_alineacion WHERE codigo='$codigoProyectoPdf' ORDER BY idLineaPolitica DESC LIMIT 1;";
    $resultado = $conexionEstablecida->query($query); 

    while($registro2 = $resultado->fetch()) {

      $alineacionEstrategica=$registro2['alineacionEstrategica'];
      $linea1=$registro2['linea1'];
      $linea2=$registro2['linea2'];
      $linea3=$registro2['linea3'];
      $objetivo1Linea1=$registro2['objetivo1Linea1'];
      $objetivo2Linea1=$registro2['objetivo2Linea1'];
      $objetivo3Linea1=$registro2['objetivo3Linea1'];
      $objetivo4Linea1=$registro2['objetivo4Linea1'];
      $objetivo5Linea1=$registro2['objetivo5Linea1'];
      $objetivo6Linea1=$registro2['objetivo6Linea1'];
      $objetivo7Linea1=$registro2['objetivo7Linea1'];
      $objetivo8Linea1=$registro2['objetivo8Linea1'];
      $objetivo9Linea1=$registro2['objetivo9Linea1'];
      $objetivo10Linea1=$registro2['objetivo10Linea1'];
      $objetivo11Linea1=$registro2['objetivo11Linea1'];
      $objetivo1Linea2=$registro2['objetivo1Linea2'];
      $objetivo2Linea2=$registro2['objetivo2Linea2'];
      $objetivo3linea2=$registro2['objetivo3linea2'];
      $objetivo4Linea2=$registro2['objetivo4Linea2'];
      $objetivo1Linea3=$registro2['objetivo1Linea3'];
      $objetivo2Linea3=$registro2['objetivo2Linea3'];
      $objetivo3Linea3=$registro2['objetivo3Linea3'];
      $objetivo4Linea3=$registro2['objetivo4Linea3'];
      $objetivo5Linea3=$registro2['objetivo5Linea3'];
      $objetivo1Institucional=$registro2['objetivo1Institucional'];
      $objetivo2Institucional=$registro2['objetivo2Institucional'];
      $objetivo1Linea1Item1=$registro2['objetivo1Linea1Item1'];
      $objetivo1Linea1Item2=$registro2['objetivo1Linea1Item2'];
      $objetivo1Linea1Item3=$registro2['objetivo1Linea1Item3'];
      $objetivo2Linea1Item1=$registro2['objetivo2Linea1Item1'];
      $objetivo2Linea1Item2=$registro2['objetivo2Linea1Item2'];
      $objetivo2Linea1Item3=$registro2['objetivo2Linea1Item3'];
      $objetivo2Linea1Item4=$registro2['objetivo2Linea1Item4'];
      $objetivo3Linea1Item1=$registro2['objetivo3Linea1Item1'];
      $objetivo3Linea1Item2=$registro2['objetivo3Linea1Item2'];
      $objetivo3Linea1Item3=$registro2['objetivo3Linea1Item3'];
      $objetivo3Linea1Item4=$registro2['objetivo3Linea1Item4'];
      $objetivo4Linea1Item1=$registro2['objetivo4Linea1Item1'];
      $objetivo5Linea1Item1=$registro2['objetivo5Linea1Item1'];
      $objetivo6Linea1Item1=$registro2['objetivo6Linea1Item1'];
      $objetivo6Linea1Item2=$registro2['objetivo6Linea1Item2'];
      $objetivo7Linea1Item1=$registro2['objetivo7Linea1Item1'];
      $objetivo7Linea1Item2=$registro2['objetivo7Linea1Item2'];
      $objetivo8Linea1Item1=$registro2['objetivo8Linea1Item1'];
      $objetivo8Linea1Item2=$registro2['objetivo8Linea1Item2'];
      $objetivo8Linea1Item3=$registro2['objetivo8Linea1Item3'];
      $objetivo8Linea1Item4=$registro2['objetivo8Linea1Item4'];
      $objetivo8Linea1Item5=$registro2['objetivo8Linea1Item5'];
      $objetivo9Linea1Item1=$registro2['objetivo9Linea1Item1'];
      $objetivo10Linea1Item1=$registro2['objetivo10Linea1Item1'];
      $objetivo10Linea1Item2=$registro2['objetivo10Linea1Item2'];
      $objetivo10Linea1Item3=$registro2['objetivo10Linea1Item3'];
      $objetivo10Linea1Item4=$registro2['objetivo10Linea1Item4'];
      $objetivo10Linea1Item5=$registro2['objetivo10Linea1Item5'];
      $objetivo11Linea1Item1=$registro2['objetivo11Linea1Item1'];
      $objetivo11Linea1Item2=$registro2['objetivo11Linea1Item2'];
      $objetivo1Linea2Item1=$registro2['objetivo1Linea2Item1'];
      $objetivo1Linea2Item2=$registro2['objetivo1Linea2Item2'];
      $objetivo1Linea2Item3=$registro2['objetivo1Linea2Item3'];
      $objetivo1Linea2Item4=$registro2['objetivo1Linea2Item4'];
      $objetivo2Linea2Item1=$registro2['objetivo2Linea2Item1'];
      $objetivo2Linea2Item2=$registro2['objetivo2Linea2Item2'];
      $objetivo2Linea2Item3=$registro2['objetivo2Linea2Item3'];
      $objetivo3Linea2Item1=$registro2['objetivo3Linea2Item1'];
      $objetivo3Linea2Item2=$registro2['objetivo3Linea2Item2'];
      $objetivo3Linea2Item3=$registro2['objetivo3Linea2Item3'];
      $objetivo4Linea2Item1=$registro2['objetivo4Linea2Item1'];
      $objetivo4Linea2Item2=$registro2['objetivo4Linea2Item2'];
      $objetivo1Linea3Item1=$registro2['objetivo1Linea3Item1'];
      $objetivo1Linea3Item2=$registro2['objetivo1Linea3Item2'];
      $objetivo1Linea3Item3=$registro2['objetivo1Linea3Item3'];
      $objetivo1Linea3Item4=$registro2['objetivo1Linea3Item4'];
      $objetivo1Linea3Item5=$registro2['objetivo1Linea3Item5'];
      $objetivo1Linea3Item6=$registro2['objetivo1Linea3Item6'];
      $objetivo2Linea3Item1=$registro2['objetivo2Linea3Item1'];
      $objetivo2Linea3Item2=$registro2['objetivo2Linea3Item2'];
      $objetivo3Linea3Item1=$registro2['objetivo3Linea3Item1'];
      $objetivo3Linea3Item2=$registro2['objetivo3Linea3Item2'];
      $objetivo3Linea3Item3=$registro2['objetivo3Linea3Item3'];
      $objetivo4Linea3Item1=$registro2['objetivo4Linea3Item1'];
      $objetivo4Linea3Item2=$registro2['objetivo4Linea3Item2'];
      $objetivo5Linea3Item1=$registro2['objetivo5Linea3Item1'];
      $objetivo5Linea3Item2=$registro2['objetivo5Linea3Item2'];
      $objetivo1Institucionaltem1=$registro2['objetivo1Institucionaltem1'];
      $objetivo1Institucionaltem2=$registro2['objetivo1Institucionaltem2'];
      $objetivo1Institucionaltem3=$registro2['objetivo1Institucionaltem3'];
      $objetivo2Institucionaltem1=$registro2['objetivo2Institucionaltem1'];
      $objetivo2Institucionaltem2=$registro2['objetivo2Institucionaltem2'];
      $objetivo2Institucionaltem3=$registro2['objetivo2Institucionaltem3'];


      $concateneador=$alineacionEstrategica."___".$linea1."___".$linea2."___".$linea3."___".$objetivo1Linea1."___".$objetivo2Linea1."___".$objetivo3Linea1."___".$objetivo4Linea1."___".$objetivo5Linea1."___".$objetivo6Linea1."___".$objetivo7Linea1."___".$objetivo8Linea1."___".$objetivo9Linea1."___".$objetivo10Linea1."___".$objetivo11Linea1."___".$objetivo1Linea2."___".$objetivo2Linea2."___".$objetivo3linea2."___".$objetivo4Linea2."___".$objetivo1Linea3."___".$objetivo2Linea3."___".$objetivo3Linea3."___".$objetivo4Linea3."___".$objetivo5Linea3."___".$objetivo1Institucional."___".$objetivo2Institucional."___".$objetivo1Linea1Item1."___".$objetivo1Linea1Item2."___".$objetivo1Linea1Item3."___".$objetivo2Linea1Item1."___".$objetivo2Linea1Item2."___".$objetivo2Linea1Item3."___".$objetivo2Linea1Item4."___".$objetivo3Linea1Item1."___".$objetivo3Linea1Item2."___".$objetivo3Linea1Item3."___".$objetivo3Linea1Item4."___".$objetivo4Linea1Item1."___".$objetivo5Linea1Item1."___".$objetivo6Linea1Item1."___".$objetivo6Linea1Item2."___".$objetivo7Linea1Item1."___".$objetivo7Linea1Item2."___".$objetivo8Linea1Item1."___".$objetivo8Linea1Item2."___".$objetivo8Linea1Item3."___".$objetivo8Linea1Item4."___".$objetivo8Linea1Item5."___".$objetivo9Linea1Item1."___".$objetivo10Linea1Item1."___".$objetivo10Linea1Item2."___".$objetivo10Linea1Item3."___".$objetivo10Linea1Item4."___".$objetivo10Linea1Item5."___".$objetivo11Linea1Item1."___".$objetivo11Linea1Item2."___".$objetivo1Linea2Item1."___".$objetivo1Linea2Item2."___".$objetivo1Linea2Item3."___".$objetivo1Linea2Item4."___".$objetivo2Linea2Item1."___".$objetivo2Linea2Item2."___".$objetivo2Linea2Item3."___".$objetivo3Linea2Item1."___".$objetivo3Linea2Item2."___".$objetivo3Linea2Item3."___".$objetivo4Linea2Item1."___".$objetivo4Linea2Item2."___".$objetivo1Linea3Item1."___".$objetivo1Linea3Item2."___".$objetivo1Linea3Item3."___".$objetivo1Linea3Item4."___".$objetivo1Linea3Item5."___".$objetivo1Linea3Item6."___".$objetivo2Linea3Item1."___".$objetivo2Linea3Item2."___".$objetivo3Linea3Item1."___".$objetivo3Linea3Item2."___".$objetivo3Linea3Item3."___".$objetivo4Linea3Item1."___".$objetivo4Linea3Item2."___".$objetivo5Linea3Item1."___".$objetivo5Linea3Item2."___".$objetivo1Institucionaltem1."___".$objetivo1Institucionaltem2."___".$objetivo1Institucionaltem3."___".$objetivo2Institucionaltem1."___".$objetivo2Institucionaltem2."___".$objetivo2Institucionaltem3;
      
    }
    
    $arrayAlineacion = explode("___", $concateneador);
  
  /*=====  End of Alineación  ======*/
  
  /*============================================
  =            Aportes del proyecto            =
  ============================================*/
  
  $query2="SELECT objetivo1Linea1Item1,objetivo1Linea1Item2,objetivo1Linea1Item3,objetivo2Linea1Item1,objetivo2Linea1Item2,objetivo2Linea1Item3,objetivo2Linea1Item4,objetivo3Linea1Item1,objetivo3Linea1Item2,objetivo3Linea1Item3,objetivo3Linea1Item4,objetivo4Linea1Item1,objetivo5Linea1Item1,objetivo6Linea1Item1,objetivo6Linea1Item2,objetivo7Linea1Item1,objetivo7Linea1Item2,objetivo8Linea1Item1,objetivo8Linea1Item2,objetivo8Linea1Item3,objetivo8Linea1Item4,objetivo8Linea1Item5,objetivo9Linea1Item1,objetivo10Linea1Item1,objetivo10Linea1Item2,objetivo10Linea1Item3,objetivo10Linea1Item4,objetivo10Linea1Item5,objetivo11Linea1Item1,objetivo11Linea1Item2,objetivo1Linea2Item1,objetivo1Linea2Item2,objetivo1Linea2Item3,objetivo1Linea2Item4,objetivo2Linea2Item1,objetivo2Linea2Item2,objetivo2Linea2Item3,objetivo3Linea2Item1,objetivo3Linea2Item2,objetivo3Linea2Item3,objetivo4Linea2Item1,objetivo4Linea2Item2,objetivo1Linea3Item1,objetivo1Linea3Item2,objetivo1Linea3Item3,objetivo1Linea3Item4,objetivo1Linea3Item5,objetivo1Linea3Item6,objetivo2Linea3Item1,objetivo2Linea3Item2,objetivo3Linea3Item1,objetivo3Linea3Item2,objetivo3Linea3Item3,objetivo4Linea3Item1,objetivo4Linea3Item2,objetivo5Linea3Item1,objetivo5Linea3Item2,objetivo1Institucionaltem1,objetivo1Institucionaltem2,objetivo1Institucionaltem3,objetivo2Institucionaltem1,objetivo2Institucionaltem2,objetivo2Institucionaltem3 FROM pro_alineacion_aporte WHERE codigo='$codigoProyectoPdf' ORDER BY idAporteProyecto DESC LIMIT 1;";
    $resultado2 = $conexionEstablecida->query($query2);   

  while($registro = $resultado2->fetch()) {

      $objetivo1Linea1Item1=$registro['objetivo1Linea1Item1'];
      $objetivo1Linea1Item2=$registro['objetivo1Linea1Item2'];
      $objetivo1Linea1Item3=$registro['objetivo1Linea1Item3'];
      $objetivo2Linea1Item1=$registro['objetivo2Linea1Item1'];
      $objetivo2Linea1Item2=$registro['objetivo2Linea1Item2'];
      $objetivo2Linea1Item3=$registro['objetivo2Linea1Item3'];
      $objetivo2Linea1Item4=$registro['objetivo2Linea1Item4'];
      $objetivo3Linea1Item1=$registro['objetivo3Linea1Item1'];
      $objetivo3Linea1Item2=$registro['objetivo3Linea1Item2'];
      $objetivo3Linea1Item3=$registro['objetivo3Linea1Item3'];
      $objetivo3Linea1Item4=$registro['objetivo3Linea1Item4'];
      $objetivo4Linea1Item1=$registro['objetivo4Linea1Item1'];
      $objetivo5Linea1Item1=$registro['objetivo5Linea1Item1'];
      $objetivo6Linea1Item1=$registro['objetivo6Linea1Item1'];
      $objetivo6Linea1Item2=$registro['objetivo6Linea1Item2'];
      $objetivo7Linea1Item1=$registro['objetivo7Linea1Item1'];
      $objetivo7Linea1Item2=$registro['objetivo7Linea1Item2'];
      $objetivo8Linea1Item1=$registro['objetivo8Linea1Item1'];
      $objetivo8Linea1Item2=$registro['objetivo8Linea1Item2'];
      $objetivo8Linea1Item3=$registro['objetivo8Linea1Item3'];
      $objetivo8Linea1Item4=$registro['objetivo8Linea1Item4'];
      $objetivo8Linea1Item5=$registro['objetivo8Linea1Item5'];
      $objetivo9Linea1Item1=$registro['objetivo9Linea1Item1'];
      $objetivo10Linea1Item1=$registro['objetivo10Linea1Item1'];
      $objetivo10Linea1Item2=$registro['objetivo10Linea1Item2'];
      $objetivo10Linea1Item3=$registro['objetivo10Linea1Item3'];
      $objetivo10Linea1Item4=$registro['objetivo10Linea1Item4'];
      $objetivo10Linea1Item5=$registro['objetivo10Linea1Item5'];
      $objetivo11Linea1Item1=$registro['objetivo11Linea1Item1'];
      $objetivo11Linea1Item2=$registro['objetivo11Linea1Item2'];
      $objetivo1Linea2Item1=$registro['objetivo1Linea2Item1'];
      $objetivo1Linea2Item2=$registro['objetivo1Linea2Item2'];
      $objetivo1Linea2Item3=$registro['objetivo1Linea2Item3'];
      $objetivo1Linea2Item4=$registro['objetivo1Linea2Item4'];
      $objetivo2Linea2Item1=$registro['objetivo2Linea2Item1'];
      $objetivo2Linea2Item2=$registro['objetivo2Linea2Item2'];
      $objetivo2Linea2Item3=$registro['objetivo2Linea2Item3'];
      $objetivo3Linea2Item1=$registro['objetivo3Linea2Item1'];
      $objetivo3Linea2Item2=$registro['objetivo3Linea2Item2'];
      $objetivo3Linea2Item3=$registro['objetivo3Linea2Item3'];
      $objetivo4Linea2Item1=$registro['objetivo4Linea2Item1'];
      $objetivo4Linea2Item2=$registro['objetivo4Linea2Item2'];
      $objetivo1Linea3Item1=$registro['objetivo1Linea3Item1'];
      $objetivo1Linea3Item2=$registro['objetivo1Linea3Item2'];
      $objetivo1Linea3Item3=$registro['objetivo1Linea3Item3'];
      $objetivo1Linea3Item4=$registro['objetivo1Linea3Item4'];
      $objetivo1Linea3Item5=$registro['objetivo1Linea3Item5'];
      $objetivo1Linea3Item6=$registro['objetivo1Linea3Item6'];
      $objetivo2Linea3Item1=$registro['objetivo2Linea3Item1'];
      $objetivo2Linea3Item2=$registro['objetivo2Linea3Item2'];
      $objetivo3Linea3Item1=$registro['objetivo3Linea3Item1'];
      $objetivo3Linea3Item2=$registro['objetivo3Linea3Item2'];
      $objetivo3Linea3Item3=$registro['objetivo3Linea3Item3'];
      $objetivo4Linea3Item1=$registro['objetivo4Linea3Item1'];
      $objetivo4Linea3Item2=$registro['objetivo4Linea3Item2'];
      $objetivo5Linea3Item1=$registro['objetivo5Linea3Item1'];
      $objetivo5Linea3Item2=$registro['objetivo5Linea3Item2'];
      $objetivo1Institucionaltem1=$registro['objetivo1Institucionaltem1'];
      $objetivo1Institucionaltem2=$registro['objetivo1Institucionaltem2'];
      $objetivo1Institucionaltem3=$registro['objetivo1Institucionaltem3'];
      $objetivo2Institucionaltem1=$registro['objetivo2Institucionaltem1'];
      $objetivo2Institucionaltem2=$registro['objetivo2Institucionaltem2'];
      $objetivo2Institucionaltem3=$registro['objetivo2Institucionaltem3'];


      $concateneador2= $objetivo1Linea1Item1."___".$objetivo1Linea1Item2."___".$objetivo1Linea1Item3."___".$objetivo2Linea1Item1."___".$objetivo2Linea1Item2."___".$objetivo2Linea1Item3."___".$objetivo2Linea1Item4."___".$objetivo3Linea1Item1."___".$objetivo3Linea1Item2."___".$objetivo3Linea1Item3."___".$objetivo3Linea1Item4."___".$objetivo4Linea1Item1."___".$objetivo5Linea1Item1."___".$objetivo6Linea1Item1."___".$objetivo6Linea1Item2."___".$objetivo7Linea1Item1."___".$objetivo7Linea1Item2."___".$objetivo8Linea1Item1."___".$objetivo8Linea1Item2."___".$objetivo8Linea1Item3."___".$objetivo8Linea1Item4."___".$objetivo8Linea1Item5."___".$objetivo9Linea1Item1."___".$objetivo10Linea1Item1."___".$objetivo10Linea1Item2."___".$objetivo10Linea1Item3."___".$objetivo10Linea1Item4."___".$objetivo10Linea1Item5."___".$objetivo11Linea1Item1."___".$objetivo11Linea1Item2."___".$objetivo1Linea2Item1."___".$objetivo1Linea2Item2."___".$objetivo1Linea2Item3."___".$objetivo1Linea2Item4."___".$objetivo2Linea2Item1."___".$objetivo2Linea2Item2."___".$objetivo2Linea2Item3."___".$objetivo3Linea2Item1."___".$objetivo3Linea2Item2."___".$objetivo3Linea2Item3."___".$objetivo4Linea2Item1."___".$objetivo4Linea2Item2."___".$objetivo1Linea3Item1."___".$objetivo1Linea3Item2."___".$objetivo1Linea3Item3."___".$objetivo1Linea3Item4."___".$objetivo1Linea3Item5."___".$objetivo1Linea3Item6."___".$objetivo2Linea3Item1."___".$objetivo2Linea3Item2."___".$objetivo3Linea3Item1."___".$objetivo3Linea3Item2."___".$objetivo3Linea3Item3."___".$objetivo4Linea3Item1."___".$objetivo4Linea3Item2."___".$objetivo5Linea3Item1."___".$objetivo5Linea3Item2."___".$objetivo1Institucionaltem1."___".$objetivo1Institucionaltem2."___".$objetivo1Institucionaltem3."___".$objetivo2Institucionaltem1."___".$objetivo2Institucionaltem2."___".$objetivo2Institucionaltem3;
      
   }

  $arrayAporteProyecto = explode("___", $concateneador2);
  
  /*=====  End of Aportes del proyecto  ======*/

?>

<div class="margen__borde">


  <table class="tabla__bordada__2">

    <tr>
      <td class="nombre__apartados__secundarios" align="left">
        &nbsp;&nbsp;&nbsp;&nbsp;3.4.3&nbsp;&nbsp;&nbsp;&nbsp;Aporte del proyecto
      </td>
    </tr>

  </table>


  <!--======================================
  =            Línea Política 1            =
  =======================================-->
  
  <?php if ($arrayAlineacion[1]=="si"): ?>


  <table class="tabla__bordada__2 tabla__top__2">

    <tr>

      <td><span class="letra__capital__x">Línea de Política 1:</span>&nbsp;Integración de la estructura del sistema nacional del deporte, la educación física y la recreación</td>

    </tr> 

  </table>


  <!--============================================
  =            Objetivo estrategico 1            =
  =============================================-->
  
  <?php if ($arrayAlineacion[4]=="si"): ?>

    <table class="tabla__bordada__2 tabla__top__2">

      <tr>

        <td colspan="2">
          <span class="letra__capital__x">Objetivo Estratégico 1:</span> Contar con un marco jurídico funcional
        </td>

      </tr>

    </table>

      <!--=================================
      =            Estrategias            =
      ==================================-->

     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[26]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">

            Reestructuración de la normativa a partir de la reforma a la ley vigente que rija al sector:

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[0]); ?>
          </td>

        </tr>

       <?php endif ?>
      
       <?php if ($arrayAlineacion[27]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">

            Conformación de comités interinstitucionales y ciudadanos para hacer seguimiento y veeduría a la aplicación de la normativa legal vigente:

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[1]); ?>
          </td>

        </tr>

       <?php endif ?>


       <?php if ($arrayAlineacion[28]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">

           Integración de los actores directos e indirectos del DEFIRE en la propuesta de un marco jurídico que coadyuve a la gobernanza del sistema:

          </td>

          <td>
             &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[2]); ?>
          </td>

        </tr>

       <?php endif ?>

      </table>

      <!--====  End of Estrategias  ====-->
      

  <?php endif ?> 


  <!--====  End of Objetivo estrategico 1  ====-->
  

  <!--============================================
  =            Objetivo Estrategico 2            =
  =============================================-->
  
  <?php if ($arrayAlineacion[5]=="si"): ?>

    <table class="tabla__bordada__2 tabla__top__2">

      <tr>

        <td colspan="2">
          <span class="letra__capital__x">Objetivo Estratégico 2:</span>Desarrollar un sistema de comunicación del DEFIRE
        </td>

      </tr>

    </table>

      <!--=================================
      =            Estrategias            =
      ==================================-->

     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[29]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">

            Reestructuración de la normativa a partir de la reforma a la ley vigente que rija al sector:

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[3]); ?>
          </td>

        </tr>

       <?php endif ?>
      
       <?php if ($arrayAlineacion[30]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">

            Suscripción de convenios con universidades para prácticas pre profesionales de comunicación en las organizaciones del DEFIRE

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[4]); ?>
          </td>

        </tr>

       <?php endif ?>


       <?php if ($arrayAlineacion[31]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">

           Sensibilización de la comunidad para el cambio sobre la importancia de la práctica de la actividad física y el uso del tiempo libre

          </td>

          <td>
             &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[5]); ?>
          </td>

        </tr>

       <?php endif ?>

       <?php if ($arrayAlineacion[32]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">

           Fomento del uso de comunicación y nuevas tecnologías para la promoción del DEFIRE

          </td>

          <td>
             &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[6]); ?>
          </td>

        </tr>

       <?php endif ?>


      </table>

      <!--====  End of Estrategias  ====-->
      

  <?php endif ?> 
 
  
  <!--====  End of Objetivo Estrategico 2  ====-->
  

  <!--============================================
  =            Objetivo Estrategico 3            =
  =============================================-->
  
   <?php if ($arrayAlineacion[6]=="si"): ?>

    <table class="tabla__bordada__2 tabla__top__2">

      <tr>

        <td colspan="2">
          <span class="letra__capital__x">Objetivo Estratégico 3:</span>Instaurar un sistema de formación y actualización continua para los actores del DEFIRE
        </td>

      </tr>

    </table>

      <!--=================================
      =            Estrategias            =
      ==================================-->

     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[33]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
            Desarrollo del plan nacional de capacitación de los actores del DEFIRE:

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[7]); ?>
          </td>

        </tr>

       <?php endif ?>
      
       <?php if ($arrayAlineacion[34]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">

            Desarrollo de herramientas tecnológicas de fácil acceso para agilizar los proceso técnicos y administrativos de las organizaciones del sector DEFIRE:

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[8]); ?>
          </td>

        </tr>

       <?php endif ?>


       <?php if ($arrayAlineacion[35]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">

           Implementación de nuevas tecnologías TICS por medio de plataformas digitales y software:

          </td>

          <td>
             &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[9]); ?>
          </td>

        </tr>

       <?php endif ?>

       <?php if ($arrayAlineacion[36]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">

           Reforma de la normativa legal vigente para la profesionalización, exigiendo niveles educativos para ocupar cargos en el sector y su respectiva actualización:

          </td>

          <td>
             &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[10]); ?>
          </td>

        </tr>

       <?php endif ?>


      </table>

      <!--====  End of Estrategias  ====-->
      

  <?php endif ?> 
  
  
  <!--====  End of Objetivo Estrategico 3  ====-->
  

  <!--============================================
  =            Objetivo Estrategico 4            =
  =============================================-->
  
  <?php if ($arrayAlineacion[7]=="si"): ?>

    <table class="tabla__bordada__2 tabla__top__2">

      <tr>

        <td colspan="2">
          <span class="letra__capital__x">Objetivo Estratégico 4:</span>Implementar un sistema nacional de información del DEFIRE
        </td>

      </tr>

    </table>

      <!--=================================
      =            Estrategias            =
      ==================================-->

     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[37]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
           Fortalecimiento de las organizaciones del DEFIRE en la generación, almacenamiento de información, estadísticas y análisis de datos, así como cogestores del desarrollo del sector

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[11]); ?>
          </td>

        </tr>

       <?php endif ?>
      


      </table>

      <!--====  End of Estrategias  ====-->
      

  <?php endif ?> 
  
  
  <!--====  End of Objetivo Estrategico 4  ====-->
  
  <!--============================================
  =            Objetivo Estrategico 5            =
  =============================================-->
  
   
  <?php if ($arrayAlineacion[8]=="si"): ?>

    <table class="tabla__bordada__2 tabla__top__2">

      <tr>

        <td colspan="2">
          <span class="letra__capital__x">Objetivo Estratégico 5:</span>Lograr un modelo de coordinación y coparticipación interinstitucional del DEFIRE
        </td>

      </tr>

    </table>

      <!--=================================
      =            Estrategias            =
      ==================================-->

     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[38]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
           Fortalecimiento de la corresponsabilidad interinstitucional e intersectorial y nuevos aliados estratégicos nacionales e internacionales

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[12]); ?>
          </td>

        </tr>

       <?php endif ?>
      


      </table>

      <!--====  End of Estrategias  ====-->
      

  <?php endif ?> 
  
   
  
  <!--====  End of Objetivo Estrategico 5  ====-->
  

  <!--============================================
  =            Objetivo Estrategico 6            =
  =============================================-->
  
   <?php if ($arrayAlineacion[9]=="si"): ?>

    <table class="tabla__bordada__2 tabla__top__2">

      <tr>

        <td colspan="2">
          <span class="letra__capital__x">Objetivo Estratégico 6:</span>Garantizar la participación ciudadana en la política pública del DEFIRE
        </td>

      </tr>

    </table>

      <!--=================================
      =            Estrategias            =
      ==================================-->

     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[39]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
           Consolidación de mecanismos de participación ciudadana con filosofía de Gobiernos Abiertos

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[13]); ?>
          </td>

        </tr>

       <?php endif ?>
      


      </table>



     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[40]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
           Generación de instrumentos técnicos y jurídicos que coadyuven eficazmente a la trasparencia y a la rendición de cuentas

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[14]); ?>
          </td>

        </tr>

       <?php endif ?>
      


      </table>

      <!--====  End of Estrategias  ====-->
      

  <?php endif ?> 
  
  <!--====  End of Objetivo Estrategico 6  ====-->
  
  <!--============================================
  =            Objetivo Estrategico 7            =
  =============================================-->
  
   <?php if ($arrayAlineacion[10]=="si"): ?>

    <table class="tabla__bordada__2 tabla__top__2">

      <tr>

        <td colspan="2">
          <span class="letra__capital__x">Objetivo Estratégico 7:</span>Propiciar la investigación aplicada al DEFIRE
        </td>

      </tr>

    </table>

      <!--=================================
      =            Estrategias            =
      ==================================-->

     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[41]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
           Creación del fondo nacional de investigación que dé directrices y cofinancie la investigación de acuerdo con las necesidades del DEFIRE

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[15]); ?>
          </td>

        </tr>

       <?php endif ?>
      


      </table>



     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[42]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
           Implementación de un Centro d Estudios, Investigación y Capacitación de la Cultura Física responsable de llevar las estadísticas del sector a nivel nacional

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[16]); ?>
          </td>

        </tr>

       <?php endif ?>
      


      </table>

      <!--====  End of Estrategias  ====-->
      

  <?php endif ?> 
  
  <!--====  End of Objetivo Estrategico 7  ====-->


  <!--============================================
  =            Objetivo Estrategico 8            =
  =============================================-->
  
  <?php if ($arrayAlineacion[11]=="si"): ?>

    <table class="tabla__bordada__2 tabla__top__2">

      <tr>

        <td colspan="2">
          <span class="letra__capital__x">Objetivo Estratégico 8:</span>Lograr sostenibilidad financiera del sistema nacional del DEFIRE y sus organismos
        </td>

      </tr>

    </table>

      <!--=================================
      =            Estrategias            =
      ==================================-->

     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[43]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
           Desarrollo de modelos de gestión de proyectos público – privado que favorezca la sostenibilidad del sector

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[17]); ?>
          </td>

        </tr>

       <?php endif ?>
      


      </table>



     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[44]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
           Implementación de lineamientos que direccionen la efectividad en la administración y la gestión de los recursos que entrega el Estado a los organismos deportivos

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[18]); ?>
          </td>

        </tr>

       <?php endif ?>
      


      </table>

     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[45]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
           Fortalecimiento del giro del negocio o actividad económica de los organismos del sector en pro de la auto-eficiencia y autogestión

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[19]); ?>
          </td>

        </tr>

       <?php endif ?>
      


      </table>

     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[46]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
           Desarrollo de lineamientos y estímulos a los organismos del DEFIRE para fomentar la sostenibilidad financiera a través de la autogestión

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[20]); ?>
          </td>

        </tr>

       <?php endif ?>
      


      </table>

     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[47]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
           Creación del fondo nacional de fomento al desarrollo del DEFIRE (FONDEFIRE)

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[21]); ?>
          </td>

        </tr>

       <?php endif ?>
      


      </table>

      <!--====  End of Estrategias  ====-->
      

  <?php endif ?> 
  
  <!--====  End of Objetivo Estrategico 8  ====-->
  

  <!--============================================
  =            Objetivo Estrategico 9            =
  =============================================-->
  
  <?php if ($arrayAlineacion[12]=="si"): ?>

    <table class="tabla__bordada__2 tabla__top__2">

      <tr>

        <td colspan="2">
          <span class="letra__capital__x">Objetivo Estratégico 9:</span>Establecer modelos de gestión de calidad en los organismos del DEFIRE
        </td>

      </tr>

    </table>

      <!--=================================
      =            Estrategias            =
      ==================================-->

     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[48]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
           Generación de lineamientos técnicos, administrativos, innovadores y eficientes

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[22]); ?>
          </td>

        </tr>

       <?php endif ?>
      


      </table>


      <!--====  End of Estrategias  ====-->
      

  <?php endif ?>   
  
  <!--====  End of Objetivo Estrategico 9  ====-->
  

  <!--=============================================
  =            Objetivo Estrategico 10            =
  ==============================================-->
  
  <?php if ($arrayAlineacion[13]=="si"): ?>

    <table class="tabla__bordada__2 tabla__top__2">

      <tr>

        <td colspan="2">
          <span class="letra__capital__x">Objetivo Estratégico 10:</span>Optimizar la infraestructura del DEFIRE
        </td>

      </tr>

    </table>

      <!--=================================
      =            Estrategias            =
      ==================================-->

     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[49]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
           Desarrollo de modelos de gestión, protocolos y lineamientos administrativos y técnicos participativos

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[23]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>



     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[50]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
           Fortalecimiento de los procesos de asociación público-privada y entes territoriales para la construcción y gestión de centros deportivos y recreativos, como parques bio saludables

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[24]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>


     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[51]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
           Coparticipación para la adecuación de parques, espacios públicos y lugares abiertos en mal estado, abandonados y deteriorados para la masificación DEFIRE

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[25]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>



     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[52]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
           Aprovechamiento de la infraestructura deportiva de los centros escolares nacionales para uso social comunitario

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[26]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>



     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[53]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
           Implementación de un banco de tierras para la construcción de obras de infraestructura del DEFIRE, en conjunto con los territorios 

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[27]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>


      <!--====  End of Estrategias  ====-->
      

  <?php endif ?>   
  
  <!--====  End of Objetivo Estrategico 10  ====-->
  

  <!--=============================================
  =            Objetivo Estrategico 11            =
  ==============================================-->
  
   <?php if ($arrayAlineacion[14]=="si"): ?>

    <table class="tabla__bordada__2 tabla__top__2">

      <tr>

        <td colspan="2">
          <span class="letra__capital__x">Objetivo Estratégico 11:</span>Lograr un modelo de coordinación y coparticipación interinstitucional del DEFIRE
        </td>

      </tr>

    </table>

      <!--=================================
      =            Estrategias            =
      ==================================-->

     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[54]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
           Implementación de programas de fomento y promoción del voluntariado

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[28]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>



     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[55]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
           Fomento de estructuras organizativas que se encarguen de canalizar acciones en el campo del voluntariado

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[29]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>



      <!--====  End of Estrategias  ====-->
      

  <?php endif ?>    
  
  <!--====  End of Objetivo Estrategico 11  ====-->
  


  <?php endif ?> 
  
  <!--====  End of Línea Política 1  ====-->
  

  <!--======================================
  =            Línea Política 2            =
  =======================================-->
  
  <?php if ($arrayAlineacion[2]=="si"): ?>

  <table class="tabla__bordada__2 tabla__top__2">

    <tr>

      <td><span class="letra__capital__x">Línea de Política 2:</span>&nbsp;Generar e impulsar la cultura física para el bienestar activo de la población con inclusión social e igualdad de género.</td>

    </tr> 

  </table>

  <!--============================================
  =            Objetivo Estrategico 1            =
  =============================================-->


   <?php if ($arrayAlineacion[15]=="si"): ?>

    <table class="tabla__bordada__2 tabla__top__2">

      <tr>

        <td colspan="2">
          <span class="letra__capital__x">Objetivo Estratégico 1:</span>Conseguir que los ciudadanos adopten la cultura física
        </td>

      </tr>

    </table>

      <!--=================================
      =            Estrategias            =
      ==================================-->

     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[56]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
           Implementación de la certificación activa y saludable (Municipios, colegios, instituciones públicas y privadas, entre otros)

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[30]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>



     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[57]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
            Promoción de iniciativas públicas y privadas de prescripción de la actividad física como factor de prevención en salud para un bienestar activo

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[31]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>



     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[58]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
            Fomento de la coparticipación y corre acción de iniciativas locales para el desarrollo del DEFIRE, como programas de desplazamiento activo

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[32]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>



     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[59]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
            Sensibilización a todos los actores del sistema en la búsqueda de modelos de desarrollo sustentable y sostenible en todos los ámbitos

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[33]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>




      <!--====  End of Estrategias  ====-->
      

  <?php endif ?>      


  <!--====  End of Objetivo Estrategico 1  ====-->


<!--============================================
=            Objetivo Estrategico 2            =
=============================================-->

 <?php if ($arrayAlineacion[16]=="si"): ?>

    <table class="tabla__bordada__2 tabla__top__2">

      <tr>

        <td colspan="2">
          <span class="letra__capital__x">Objetivo Estratégico 2:</span>Posicionar al país como sede de eventos internacionales del DEFIRE
        </td>

      </tr>

    </table>

      <!--=================================
      =            Estrategias            =
      ==================================-->

     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[60]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
           Estímulo para el desarrollo de eventos internacionales del DEFIRE en conjunto con los entes territoriales, organismos deportivos, e instituciones públicas y privadas

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[34]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>



     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[61]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
            Preparación de la dirigencia ecuatoriana en liderazgo para el posicionamiento a nivel internacional

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[35]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>



     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[62]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
            Desarrollo de programas que resalte la labor de los atletas, entrenadores, dirigentes y voluntariado, a través del reconocimiento local, zonal, nacional e internacional

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[36]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>


      <!--====  End of Estrategias  ====-->
      

  <?php endif ?>      


<!--====  End of Objetivo Estrategico 2  ====-->


<!--============================================
=            Objetivo Estrategico 3            =
=============================================-->


 <?php if ($arrayAlineacion[17]=="si"): ?>

    <table class="tabla__bordada__2 tabla__top__2">

      <tr>

        <td colspan="2">
          <span class="letra__capital__x">Objetivo Estratégico 3:</span>Promover la práctica de la educación física en el sistema educativo
        </td>

      </tr>

    </table>

      <!--=================================
      =            Estrategias            =
      ==================================-->

     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[63]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
           Implementación de la oferta de programas incluyentes para la oferta de programas incluyentes para la población estudiantil

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[37]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>



     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[64]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
            Implementación de centros especializados de educación física incluyente en alianza con los gobiernos locales y empresa privada

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[38]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>



     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[65]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
            Implementación de eventos deportivos incluyentes que permitan la integración del sistema

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[39]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>


      <!--====  End of Estrategias  ====-->
      

  <?php endif ?>      


<!--====  End of Objetivo Estrategico 3  ====-->


<!--============================================
=            Objetivo Estrategico 4            =
=============================================-->

 <?php if ($arrayAlineacion[18]=="si"): ?>

    <table class="tabla__bordada__2 tabla__top__2">

      <tr>

        <td colspan="2">
          <span class="letra__capital__x">Objetivo Estratégico 4:</span>Incrementar la oferta de programas para cada grupo etario
        </td>

      </tr>

    </table>

      <!--=================================
      =            Estrategias            =
      ==================================-->

     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[66]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
            Masificación del DEFIRE con una amplia gama de oferta de programas por grupo etario

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[40]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>



     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[67]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
            Gama de oferta de programas para personas con discapacidad

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[41]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>


      <!--====  End of Estrategias  ====-->
      

  <?php endif ?>      


<!--====  End of Objetivo Estrategico 4  ====-->



  <?php endif ?> 
  
  <!--====  End of Línea Política 2  ====-->
  

<!--======================================
=            Línea Política 3            =
=======================================-->

<?php if ($arrayAlineacion[3]=="si"): ?>

  <table class="tabla__bordada__2 tabla__top__2">

    <tr>

      <td><span class="letra__capital__x">Línea de Política 3:</span>&nbsp;Liderazgo y posicionamiento internacional del país a través de la consecución de logros deportivos</td>

    </tr> 

  </table>


  <!--============================================
  =            Objetivo Estrategico 1            =
  =============================================-->
  
   <?php if ($arrayAlineacion[19]=="si"): ?>

    <table class="tabla__bordada__2 tabla__top__2">

      <tr>

        <td colspan="2">
          <span class="letra__capital__x">Objetivo Estratégico 1:</span>Mejorar significativamente las posiciones
        </td>

      </tr>

    </table>

      <!--=================================
      =            Estrategias            =
      ==================================-->

     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[68]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
            Desarrollo de lineamientos y criterios técnicos que permitan la priorización de deportes, atletas y eventos

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[42]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>



     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[69]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
            Establecimiento de lineamientos para la creación de un sistema de ciencias aplicadas al deporte convencional y adaptado

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[43]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>


     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[70]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
            Establecimiento de lineamientos para la creación de un sistema de seguimiento técnico y metodológico desde la base, desarrollo y alto nivel competitivo

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[44]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>



     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[71]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
            Implementación de programas de apoyo al alto rendimiento en todo el país

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[45]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>



     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[72]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
            Implementación de un programa nacional de estímulos económicos por resultados deportivos

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[46]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>



     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[73]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
            Implementación de un programa nacional de pensión vitalicia para atletas convencionales y con discapacidad en retiro deportivo

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[47]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>




      <!--====  End of Estrategias  ====-->
      

  <?php endif ?>      

  
  <!--====  End of Objetivo Estrategico 1  ====-->
  

  <!--============================================
  =            Objetivo Estrategico 2            =
  =============================================-->
  
  <?php if ($arrayAlineacion[20]=="si"): ?>

    <table class="tabla__bordada__2 tabla__top__2">

      <tr>

        <td colspan="2">
          <span class="letra__capital__x">Objetivo Estratégico 2:</span>Implementar un sistema nacional de preparación y competición
        </td>

      </tr>

    </table>

      <!--=================================
      =            Estrategias            =
      ==================================-->

     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[74]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
            Implementación de un modelo nacional de competiciones

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[48]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>



     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[75]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
           Diseño de lineamientos nacionales de uso de los CEAR para el desarrollo, tecnificación y maestría deportiva

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[49]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>


      <!--====  End of Estrategias  ====-->
      

  <?php endif ?>      
 
  
  <!--====  End of Objetivo Estrategico 2  ====-->
  

  <!--============================================
  =            Objetivo Estrategico 3            =
  =============================================-->
  
  <?php if ($arrayAlineacion[21]=="si"): ?>

    <table class="tabla__bordada__2 tabla__top__2">

      <tr>

        <td colspan="2">
          <span class="letra__capital__x">Objetivo Estratégico 3:</span>Incrementar la población de atletas convencionales y con discapacidad con resultados deportivos a nivel regional, continental y mundial
        </td>

      </tr>

    </table>

      <!--=================================
      =            Estrategias            =
      ==================================-->

     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[76]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
            Estructuración de un modelo nacional de detección selección, capacitación y desarrollo de atletas convencionales y con discapacidad

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[50]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>


     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[77]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
           Fomento y promoción de clubes deportivos convencional y adaptado como cédula del desarrollo deportivo 

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[51]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>


     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[78]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
           Estructuración de planes, programas o proyectos para profesionalizar la labor del entrenador, dirigentes y grupo multidisciplinario

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[52]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>



      <!--====  End of Estrategias  ====-->
      

  <?php endif ?>      
  
  <!--====  End of Objetivo Estrategico 3  ====-->
  

  <!--============================================
  =            Objetivo Estrategico 4            =
  =============================================-->
  
  <?php if ($arrayAlineacion[22]=="si"): ?>

    <table class="tabla__bordada__2 tabla__top__2">

      <tr>

        <td colspan="2">
          <span class="letra__capital__x">Objetivo Estratégico 4:</span>Implementar las acciones del control dopaje en las delegaciones nacionales que representen al país
        </td>

      </tr>

    </table>

      <!--=================================
      =            Estrategias            =
      ==================================-->

     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[79]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
            Implementación de un modelo de gestión de toma de muestras en competición y fuera de competición

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[53]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>


     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[80]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
           Incremento de Oficiales de Control Dopaje en todo el país

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[54]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>



      <!--====  End of Estrategias  ====-->
      

  <?php endif ?>      
  
  
  <!--====  End of Objetivo Estrategico 4  ====-->
  

  <!--============================================
  =            Objetivo Estrategico 5            =
  =============================================-->
  
  <?php if ($arrayAlineacion[23]=="si"): ?>

    <table class="tabla__bordada__2 tabla__top__2">

      <tr>

        <td colspan="2">
          <span class="letra__capital__x">Objetivo Estratégico 5:</span>Potenciar un sistema nacional de educación y prevención temprana del dopaje
        </td>

      </tr>

    </table>

      <!--=================================
      =            Estrategias            =
      ==================================-->

     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[81]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
            Planificación e implementación de un modelo de capacitación nacional que involucre los diferentes medios tecnológicos disponibles

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[55]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>


     <table class="tabla__bordada__2 tabla__top__2">

      <?php if ($arrayAlineacion[82]=="si"): ?>

        <tr>

          <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
           Implementación de charlas de control dopaje en las instituciones educativas

          </td>

          <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[56]); ?>
          </td>

        </tr>

       <?php endif ?>
      

      </table>



      <!--====  End of Estrategias  ====-->
      

  <?php endif ?>      
  
  <!--====  End of Objetivo Estrategico 5  ====-->
  


<?php endif ?> 
<!--====  End of Línea Política 3  ====-->


<!--========================================================
=            Objetivos Secretaría del deporte 1            =
=========================================================-->

<?php if ($arrayAlineacion[24]=="si"): ?>

  <table class="tabla__bordada__2 tabla__top__2">

    <tr>

      <td><span class="letra__capital__x">Objetivo Estratégico Institucional 1:</span>&nbsp;Incrementar la práctica de la cultura física en la población del Ecuador</td>

    </tr> 

  </table>


  <!--=================================
  =            Estrategias            =
  ==================================-->
  
  
  <table class="tabla__bordada__2 tabla__top__2">

    <?php if ($arrayAlineacion[83]=="si"): ?>

      <tr>

        <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
            Crear e implementar la Política Pública de la Cultura Física

        </td>

        <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[57]); ?>
        </td>

      </tr>

      <?php endif ?>
      

  </table>

  
  <table class="tabla__bordada__2 tabla__top__2">

    <?php if ($arrayAlineacion[84]=="si"): ?>

      <tr>

        <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
            Generar mecanismos de accesibilidad a la práctica de actividad física en igualdad de condiciones y oportunidades

        </td>

        <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[58]); ?>
        </td>

      </tr>

      <?php endif ?>
      

  </table>



    <table class="tabla__bordada__2 tabla__top__2">

    <?php if ($arrayAlineacion[85]=="si"): ?>

      <tr>

        <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
            Fortalecer el desarrollo formativo de la práctica deportiva en la población

        </td>

        <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[59]); ?>
        </td>

      </tr>

      <?php endif ?>
      

  </table>


  <!--====  End of Estrategias  ====-->
  

<?php endif ?> 

<!--====  End of Objetivos Secretaría del deporte 1  ====-->


<!--========================================================
=            Objetivos Secretaría del deporte 2            =
=========================================================-->

<?php if ($arrayAlineacion[25]=="si"): ?>

  <table class="tabla__bordada__2 tabla__top__2">

    <tr>

      <td><span class="letra__capital__x">Objetivo Estratégico Institucional 2:</span>&nbsp;Incrementar el rendimiento de los atletas en la consecución de logros deportivos</td>

    </tr> 

  </table>


  <!--=================================
  =            Estrategias            =
  ==================================-->
  
  
  <table class="tabla__bordada__2 tabla__top__2">

    <?php if ($arrayAlineacion[86]=="si"): ?>

      <tr>

        <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
            Implementar un sistema nacional de priorización de deportes en coordinación con el Sistema Nacional de Cultura Física

        </td>

        <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[60]); ?>
        </td>

      </tr>

      <?php endif ?>
      

  </table>

  
  <table class="tabla__bordada__2 tabla__top__2">

    <?php if ($arrayAlineacion[87]=="si"): ?>

      <tr>

        <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
            Renovar el Plan de Alto Rendimiento con proyección a incrementar logros deportivos

        </td>

        <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[61]); ?>
        </td>

      </tr>

      <?php endif ?>
      

  </table>



    <table class="tabla__bordada__2 tabla__top__2">

    <?php if ($arrayAlineacion[88]=="si"): ?>

      <tr>

        <td class="columna__enfatizada__aportes" style="text-align: justify;">
 
            Organizar eventos del ciclo olímpico y paralímpico
            
        </td>

        <td>
            &nbsp;&nbsp;<?= nl2br($arrayAporteProyecto[62]); ?>
        </td>

      </tr>

      <?php endif ?>
      

  </table>


  <!--====  End of Estrategias  ====-->
  

<?php endif ?> 


<!--====  End of Objetivos Secretaría del deporte 2  ====-->



</div>