<?php
   

   extract($_POST);

   require_once "../../conexion/conexion.php";

   $conexionRecuperada= new conexion();
   $conexionEstablecida=$conexionRecuperada->cConexion();

   $array=array();

   $data9=array();

   $query="SELECT presupuestoLetras,presupuesto,presupuestoLetras2,presupuesto2,presupuestoLetras3,presupuesto3,mensajePlurianual,presupuestoCuatro,presupuestoLetrasCuatro,inicioPeriodos,finPeriodos FROM pro_proyetosreferencias WHERE codigoProyecto='$codigoProyectoPdf' ORDER BY idProyectoReferencias DESC LIMIT 1;";
   $resultado = $conexionEstablecida->query($query);     

   while($registro2 = $resultado->fetch()) {

      $presupuesto=$registro2['presupuesto'];
      $presupuestoLetras=$registro2['presupuestoLetras'];
      $presupuesto2=$registro2['presupuesto2'];
      $presupuestoLetras2=$registro2['presupuestoLetras2'];
      $presupuesto3=$registro2['presupuesto3'];
      $presupuestoLetras3=$registro2['presupuestoLetras3'];
      $presupuestoCuatro=$registro2['presupuestoCuatro'];
      $presupuestoLetrasCuatro=$registro2['presupuestoLetrasCuatro'];
      $mensajePlurianual=$registro2['mensajePlurianual'];
      $inicioPeriodos=$registro2['inicioPeriodos'];
      $finPeriodos=$registro2['finPeriodos'];

   }

   $inicioPeriodosArray = explode("/", $inicioPeriodos);

   array_push($data9, $presupuesto);
   array_push($data9, $presupuesto2);
   array_push($data9, $presupuesto3);
   array_push($data9, $presupuestoCuatro);

   $data1=array();
   $data2=array();

   $data3=array();
   $data4=array();

   $data5=array();
   $data6=array();
   $data7=array();
   $data8=array();

   $data58=array();

   $query4="SELECT b.idComponentes,b.nombreComponentes,b.tipoComponente FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS c ON c.idItem=a.idItemComponente INNER JOIN pro_componentes AS b ON b.idComponentes=c.componenteSeleccion WHERE a.codigo='$codigoProyectoPdf' GROUP BY b.idComponentes;";
   $resultado4 = $conexionEstablecida->query($query4);      

   while($registro4 = $resultado4->fetch()) {

      $idComponentes=$registro4['idComponentes'];
      array_push($data1, $idComponentes);


      $nombreComponentes=$registro4['nombreComponentes'];
      array_push($data2, $nombreComponentes);

      $tipoComponente=$registro4['tipoComponente'];
      array_push($data58, $tipoComponente);

   }

   $query5="SELECT c.idItem,b.idComponentes FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS c ON c.idItem=a.idItemComponente INNER JOIN pro_componentes AS b ON b.idComponentes=c.componenteSeleccion WHERE a.codigo='$codigoProyectoPdf' GROUP BY c.idItem;";
   $resultado5 = $conexionEstablecida->query($query5);      

   while($registro5 = $resultado5->fetch()) {

      $idItem=$registro5['idItem'];
      array_push($data3, $idItem);


      $idComponentes=$registro5['idComponentes'];
      array_push($data4, $idComponentes);

   }

   $contadorRelativo=0;
   $contadorRelativo2=0;


   ob_start(); 
?>

<?php

  
  $queryRegistradosProyectos="SELECT inicioPeriodos,finPeriodos FROM pro_proyetosreferencias WHERE codigoProyecto='$codigoProyectoPdf' ORDER BY idProyectoReferencias DESC LIMIT 1;";
  $resultadoRegistradosProyectos = $conexionEstablecida->query($queryRegistradosProyectos);   

  while($registro2RegistradosProyectos = $resultadoRegistradosProyectos->fetch()) {

    $inicioPeriodos=$registro2RegistradosProyectos['inicioPeriodos'];
    $finPeriodos=$registro2RegistradosProyectos['finPeriodos'];
      
  }

  $fechaInicialArray=explode("/",$inicioPeriodos);
  $fechaInicialEntero=intval($fechaInicialArray[2]);

  $fechaFinalArray=explode("/",$finPeriodos);
  $fechaFinalEntero=intval($fechaFinalArray[2]);

  $resultadoRestas=0;

  $resultadoRestas=$fechaFinalEntero - $fechaInicialEntero;

  $auxiliar=0;

?>

<!--================================================
=            Creando fechas incongnitas            =
=================================================-->
<?php

  $fechasArray=array();

  $parametro1String=$inicioPeriodos;
  $parametro2String=$finPeriodos;

  $arreglo1 = explode("/", $parametro1String);
  $arreglo2 = explode("/", $parametro2String);

  $diferenciaAnios= intval($arreglo2[2]) - intval($arreglo1[2]);

  $diferenciaAnios++;

  $diferenciaAniosDiferenciador=$diferenciaAnios-1;

  $sumador=0;

  for ($i=0; $i<$diferenciaAnios; $i++) {

    if ($i==0) {

      $fecha=(intval($arreglo1[2])+$sumador)."-".$arreglo1[1]."-".$arreglo1[0];

      array_push($fechasArray, $fecha);

    }else if($i==$diferenciaAniosDiferenciador){

      $fecha=(intval($arreglo1[2])+$sumador)."-".$arreglo2[1]."-".$arreglo2[0];

      array_push($fechasArray, $fecha);

    }else{

      $fecha=(intval($arreglo1[2])+$sumador)."-01-01";

      array_push($fechasArray, $fecha);

    }

    $sumador++;
                          
  }

?>

<?php

   function meses($mes){

    $mesAsignas=intval($mes);

    switch ($mesAsignas) {

        case "1":
          return "Enero";
        break;

        case "2":
          return "Febrero";
        break;

        case "3":
          return "Marzo";
        break;

        case "4":
          return "Abril";
        break;

        case "5":
          return "Mayo";
        break;

        case "6":
          return "Junio";
        break;

        case "7":
          return "Julio";
        break;

        case "8":
          return "Agosto";
        break;

        case "9":
          return "Septiembre";
        break;

        case "10":
          return "Octubre";
        break;

        case "11":
          return "Noviembre";
        break;

        case "12":
          return "Diciembre";
        break;

    }

  }


   function asociados($parametros){

    $parametrosAsignas=intval($parametros);

    switch ($mesAsignas) {

        case "1":
          return "1. ASOCIADOS A DEPORTISTAS";
        break;

        case "2":
          return "2. SERVICIOS DE EDUCACIÓN Y/O CAPACITACIÓN PARA EL SECTOR DEPORTIVO";
        break;

        case "3":
          return "3. ORGANIZACIÓN DE EVENTOS DEPORTIVOS DESARROLLADOS EN EL ECUADOR ";
        break;

        case "4":
          return "4. INFRAESTRUCTURA Y/O HERRAMIENTAS TECNOLÓGICAS PARA EL FOMENTO, REALIZACIÓN O SEGUIMIENTO DEL DEPORTE Y LA ACTIVIDAD FÍSICA";
        break;

        case "5":
          return "5. CONSTRUCCIÓN DE OBRA NUEVA, REHABILITACIÓN, READECUACIÓN Y/O MANTENIMIENTO DE INFRAESTRUCTURA DEPORTIVA";
        break;

        case "6":
          return "6. GASTOS ADMINISTRATIVOS";
        break;

    }

  }

  $axuiliarTipos=0;

  $contadorReferentes=1;

  $banderaGratificantes=0;

?>


<!--====  End of Creando fechas incongnitas  ====-->


<!--=======================================
=            Sumador funciones            =
========================================-->

<?php


   function funcionPostulantes($parametros){

    if ($parametros=="1.1 Preparación y/o participación de deportistas" || $parametros=="1.1 Preparación y/o participación de deportistas" || $parametros=="1.3 IMPLEMENTACIÓN DEPORTIVA ESPECIALIZADA" ||  $parametros=="1.4 INGRESOS A FAVOR DE DEPORTISTAS" || $parametros=="* DIFUSIÓN DEL DEPORTISTA") {
      return 1;
    }

  }

?>

<!--====  End of Sumador funciones  ====-->


<!--========================================
=            Primer componentes            =
=========================================-->

<?php


   function sumadorCompoonentesHeads($parametros,$parametro2,$parametro3){

    $sumadorConvertidos=0;

    $arraySumador1Inicial=array();
      
    $arrayConvertidosSumador2=array();


    $arrayTotalesComvertidos=array();

    switch ($parametros) {

        case "1":

         $conexionRecuperada= new conexion();
         $conexionEstablecida=$conexionRecuperada->cConexion();        
          

         $querySuma1="SELECT (SELECT a1.montos FROM pro_componentesciudadanosmontos AS a1 WHERE a1.idComponentesCiudadanos=a.idComponentesCiudadanos) AS campos FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS c ON c.idItem=a.idItemComponente INNER JOIN pro_componentes AS b ON b.idComponentes=c.componenteSeleccion WHERE a.codigo='$parametro2' AND (b.idComponentes='29' OR b.idComponentes='30' OR b.idComponentes='31' OR b.idComponentes='32') AND a.identificador='b';";
         $resultadoSuma1 = $conexionEstablecida->query($querySuma1);   

         while($registroSuma1 = $resultadoSuma1->fetch()) {

          $camposSuma1=$registroSuma1['campos'];
          array_push($arraySumador1Inicial, $camposSuma1);
              
         }

          for ($i=0; $i < count($arraySumador1Inicial); $i++) { 

            $arrayConvertidosSumador1=array();

            $arrayConvertidosSumador1 = explode ("/../",$arraySumador1Inicial[$i]);

          for ($l=0; $l < count($arrayConvertidosSumador1); $l++) { 

            $arrayDatosContenidos=array();

            $arrayDatosContenidos = explode ("___",$arrayConvertidosSumador1[$l]);

            $anioSeparados=substr($arrayDatosContenidos[0],-4);

            if ($anioSeparados==$parametro3) {
                array_push($arrayConvertidosSumador2, $arrayDatosContenidos[1]);
            }
                
          }

         }

         $sumadorConvertidos=array_sum($arrayConvertidosSumador2);  


         return $sumadorConvertidos;

        break;

        case "2":

         $conexionRecuperada= new conexion();
         $conexionEstablecida=$conexionRecuperada->cConexion();        
          

         $querySuma1="SELECT (SELECT a1.montos FROM pro_componentesciudadanosmontos AS a1 WHERE a1.idComponentesCiudadanos=a.idComponentesCiudadanos) AS campos FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS c ON c.idItem=a.idItemComponente INNER JOIN pro_componentes AS b ON b.idComponentes=c.componenteSeleccion WHERE a.codigo='$parametro2' AND b.idComponentes='33' AND a.identificador='b';";
         $resultadoSuma1 = $conexionEstablecida->query($querySuma1);   

         while($registroSuma1 = $resultadoSuma1->fetch()) {

          $camposSuma1=$registroSuma1['campos'];
          array_push($arraySumador1Inicial, $camposSuma1);
              
         }

          for ($i=0; $i < count($arraySumador1Inicial); $i++) { 

            $arrayConvertidosSumador1=array();

            $arrayConvertidosSumador1 = explode ("/../",$arraySumador1Inicial[$i]);

          for ($l=0; $l < count($arrayConvertidosSumador1); $l++) { 

            $arrayDatosContenidos=array();

            $arrayDatosContenidos = explode ("___",$arrayConvertidosSumador1[$l]);

            $anioSeparados=substr($arrayDatosContenidos[0],-4);

            if ($anioSeparados==$parametro3) {
                array_push($arrayConvertidosSumador2, $arrayDatosContenidos[1]);
            }
                
          }

         }

         $sumadorConvertidos=array_sum($arrayConvertidosSumador2);  


         return $sumadorConvertidos;

        break;

        case "3":

         $conexionRecuperada= new conexion();
         $conexionEstablecida=$conexionRecuperada->cConexion();        
          

         $querySuma1="SELECT (SELECT a1.montos FROM pro_componentesciudadanosmontos AS a1 WHERE a1.idComponentesCiudadanos=a.idComponentesCiudadanos) AS campos FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS c ON c.idItem=a.idItemComponente INNER JOIN pro_componentes AS b ON b.idComponentes=c.componenteSeleccion WHERE a.codigo='$parametro2' AND b.idComponentes='34' AND a.identificador='b';";
         $resultadoSuma1 = $conexionEstablecida->query($querySuma1);   

         while($registroSuma1 = $resultadoSuma1->fetch()) {

          $camposSuma1=$registroSuma1['campos'];
          array_push($arraySumador1Inicial, $camposSuma1);
              
         }

          for ($i=0; $i < count($arraySumador1Inicial); $i++) { 

            $arrayConvertidosSumador1=array();

            $arrayConvertidosSumador1 = explode ("/../",$arraySumador1Inicial[$i]);

          for ($l=0; $l < count($arrayConvertidosSumador1); $l++) { 

            $arrayDatosContenidos=array();

            $arrayDatosContenidos = explode ("___",$arrayConvertidosSumador1[$l]);

            $anioSeparados=substr($arrayDatosContenidos[0],-4);

            if ($anioSeparados==$parametro3) {
                array_push($arrayConvertidosSumador2, $arrayDatosContenidos[1]);
            }
                
          }

         }

         $sumadorConvertidos=array_sum($arrayConvertidosSumador2);  


         return $sumadorConvertidos;

        break;

        case "4":

         $conexionRecuperada= new conexion();
         $conexionEstablecida=$conexionRecuperada->cConexion();        
          

         $querySuma1="SELECT (SELECT a1.montos FROM pro_componentesciudadanosmontos AS a1 WHERE a1.idComponentesCiudadanos=a.idComponentesCiudadanos) AS campos FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS c ON c.idItem=a.idItemComponente INNER JOIN pro_componentes AS b ON b.idComponentes=c.componenteSeleccion WHERE a.codigo='$parametro2' AND b.idComponentes='35' AND a.identificador='b';";
         $resultadoSuma1 = $conexionEstablecida->query($querySuma1);   

         while($registroSuma1 = $resultadoSuma1->fetch()) {

          $camposSuma1=$registroSuma1['campos'];
          array_push($arraySumador1Inicial, $camposSuma1);
              
         }

          for ($i=0; $i < count($arraySumador1Inicial); $i++) { 

            $arrayConvertidosSumador1=array();

            $arrayConvertidosSumador1 = explode ("/../",$arraySumador1Inicial[$i]);

          for ($l=0; $l < count($arrayConvertidosSumador1); $l++) { 

            $arrayDatosContenidos=array();

            $arrayDatosContenidos = explode ("___",$arrayConvertidosSumador1[$l]);

            $anioSeparados=substr($arrayDatosContenidos[0],-4);

            if ($anioSeparados==$parametro3) {
                array_push($arrayConvertidosSumador2, $arrayDatosContenidos[1]);
            }
                
          }

         }

         $sumadorConvertidos=array_sum($arrayConvertidosSumador2);  


         return $sumadorConvertidos;

        break;

        case "5":

         $conexionRecuperada= new conexion();
         $conexionEstablecida=$conexionRecuperada->cConexion();        
          

         $querySuma1="SELECT (SELECT a1.montos FROM pro_componentesciudadanosmontos AS a1 WHERE a1.idComponentesCiudadanos=a.idComponentesCiudadanos) AS campos FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS c ON c.idItem=a.idItemComponente INNER JOIN pro_componentes AS b ON b.idComponentes=c.componenteSeleccion WHERE a.codigo='$parametro2' AND b.idComponentes='36' AND a.identificador='b';";
         $resultadoSuma1 = $conexionEstablecida->query($querySuma1);   

         while($registroSuma1 = $resultadoSuma1->fetch()) {

          $camposSuma1=$registroSuma1['campos'];
          array_push($arraySumador1Inicial, $camposSuma1);
              
         }

          for ($i=0; $i < count($arraySumador1Inicial); $i++) { 

            $arrayConvertidosSumador1=array();

            $arrayConvertidosSumador1 = explode ("/../",$arraySumador1Inicial[$i]);

          for ($l=0; $l < count($arrayConvertidosSumador1); $l++) { 

            $arrayDatosContenidos=array();

            $arrayDatosContenidos = explode ("___",$arrayConvertidosSumador1[$l]);

            $anioSeparados=substr($arrayDatosContenidos[0],-4);

            if ($anioSeparados==$parametro3) {
                array_push($arrayConvertidosSumador2, $arrayDatosContenidos[1]);
            }
                
          }

         }

         $sumadorConvertidos=array_sum($arrayConvertidosSumador2);  


         return $sumadorConvertidos;

        break;

        case "6":

         $conexionRecuperada= new conexion();
         $conexionEstablecida=$conexionRecuperada->cConexion();        
          

         $querySuma1="SELECT (SELECT a1.montos FROM pro_componentesciudadanosmontos AS a1 WHERE a1.idComponentesCiudadanos=a.idComponentesCiudadanos) AS campos FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS c ON c.idItem=a.idItemComponente INNER JOIN pro_componentes AS b ON b.idComponentes=c.componenteSeleccion WHERE a.codigo='$parametro2' AND b.idComponentes='37' AND a.identificador='b';";
         $resultadoSuma1 = $conexionEstablecida->query($querySuma1);   

         while($registroSuma1 = $resultadoSuma1->fetch()) {

          $camposSuma1=$registroSuma1['campos'];
          array_push($arraySumador1Inicial, $camposSuma1);
              
         }

          for ($i=0; $i < count($arraySumador1Inicial); $i++) { 

            $arrayConvertidosSumador1=array();

            $arrayConvertidosSumador1 = explode ("/../",$arraySumador1Inicial[$i]);

          for ($l=0; $l < count($arrayConvertidosSumador1); $l++) { 

            $arrayDatosContenidos=array();

            $arrayDatosContenidos = explode ("___",$arrayConvertidosSumador1[$l]);

            $anioSeparados=substr($arrayDatosContenidos[0],-4);

            if ($anioSeparados==$parametro3) {
                array_push($arrayConvertidosSumador2, $arrayDatosContenidos[1]);
            }
                
          }

         }

         $sumadorConvertidos=array_sum($arrayConvertidosSumador2);  


         return $sumadorConvertidos;

        break;

    }

  }

  $sumandoComponentes=0;

?>

<?php

  function sumadorCompoonentesFooters($parametros,$parametro2,$parametro3){

    $sumadorConvertidos=0;

    $arraySumador1Inicial=array();
      
    $arrayConvertidosSumador2=array();


    $arrayTotalesComvertidos=array();

    $conexionRecuperada= new conexion();
    $conexionEstablecida=$conexionRecuperada->cConexion();        
          
    $querySuma1="SELECT (SELECT a1.montos FROM pro_componentesciudadanosmontos AS a1 WHERE a1.idComponentesCiudadanos=a.idComponentesCiudadanos) AS campos FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS c ON c.idItem=a.idItemComponente INNER JOIN pro_componentes AS b ON b.idComponentes=c.componenteSeleccion WHERE a.codigo='$parametros' AND a.identificador='b';";
    $resultadoSuma1 = $conexionEstablecida->query($querySuma1);   

    while($registroSuma1 = $resultadoSuma1->fetch()) {

      $camposSuma1=$registroSuma1['campos'];
      array_push($arraySumador1Inicial, $camposSuma1);
              
    }

    for ($i=0; $i < count($arraySumador1Inicial); $i++) { 

      $arrayConvertidosSumador1=array();

      $arrayConvertidosSumador1 = explode ("/../",$arraySumador1Inicial[$i]);

      for ($l=0; $l < count($arrayConvertidosSumador1); $l++) { 

        $arrayDatosContenidos=array();

        $arrayDatosContenidos = explode ("___",$arrayConvertidosSumador1[$l]);

        $anioSeparados=substr($arrayDatosContenidos[0],-4);

        $mesObtenido=substr($arrayDatosContenidos[0], 0, -4);

        if ($anioSeparados==$parametro2 && $mesObtenido==$parametro3) {
          array_push($arrayConvertidosSumador2, $arrayDatosContenidos[1]);
        }
                
      }

    }

    $sumadorConvertidos=array_sum($arrayConvertidosSumador2);  

    return $sumadorConvertidos;

  }

?>

<!--====  End of Primer componentes  ====-->


<!--=======================================
=              Sección Css              =
========================================-->

<link href="../../layout/styles/css/estilosPdf.css?v=1.0.0" rel="stylesheet" type="text/css" media="all">

<!--====  End of  Sección Css  ====-->

<!--=============================
=            Scripts            =
==============================-->

<script src="../..plugins/jquery/jquery.min.js"></script>

<!--====  End of Scripts  ====-->



 <div class="margen__borde">

  <table class="tabla__bordada__2">

    <tr>
      <td class="nombre__apartados__secundarios" align="left">
        4.2&nbsp;&nbsp;&nbsp;&nbsp;DETALLE (ANEXO)
      </td>
    </tr>

  </table>

  <br>

  <!--=====================================
  =            Primera sección            =
  ======================================-->
  
  <?php if ($resultadoRestas==0 || $resultadoRestas==1 || $resultadoRestas==2 || $resultadoRestas==3): ?>  

   <table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias">

      <thead>
        
        <tr style="background: #263238!important; color:white!important;">

          <th class="enfacis__celdas padding__celdas__dos" style="font-size:16px!important;" rowspan="2" style="vertical-align: middle;">
            <center>
              COMPONENTES
            </center>
          </th>

          <th class="enfacis__celdas padding__celdas__dos" rowspan="2" style="vertical-align: middle;">
            <center>
              DETALLE
            </center>
          </th>

          <th class="enfacis__celdas padding__celdas__dos" rowspan="2" style="vertical-align: middle;">
            <center>
              JUSTIFICACIÓN
            </center>
          </th>

          <?php  $arregloAnios1 = explode("-", $fechasArray[0]);?>

          <?php  $asignador = intval($arregloAnios1[1]);?>


          <?php  $diferencias = 0;?>

          <?php  $diferencias = 12 - $asignador + 2;?>

          <?php if (count($fechasArray) == 1): ?>

          <th class="enfacis__celdas padding__celdas__dos" colspan="<?=$asignador+1?>">

            <center>
              Monto año <?=intval($arregloAnios1[0])?> 
            </center>

          </th>

          <?php else: ?>

          <th class="enfacis__celdas padding__celdas__dos" colspan="<?=$diferencias?>">

            <center>
              Monto año <?=intval($arregloAnios1[0])?> 
            </center>

          </th>

          <?php endif ?>


        </tr>

        <tr style="background: #263238!important; color:white!important;">

          <?php if (count($fechasArray) == 1): ?>

            <?php for($i=1;$i<=$asignador;$i++): ?>  

              <th class="enfacis__celdas padding__celdas__dos">

                <center>

                <?php $mesesA=meses($i);?>

                <?=$mesesA?>

                </center>

              </th>

            <?php endfor?> 

          <?php else: ?>

            <?php for($i=$asignador;$i<=12;$i++): ?>  

              <th class="enfacis__celdas padding__celdas__dos">

                <center>

                <?php $mesesA=meses($i);?>

                <?=$mesesA?>

                </center>

              </th>

            <?php endfor?> 

          <?php endif ?>


          <th class="enfacis__celdas padding__celdas__dos">

            Total&nbsp;<span id="sastre"></span>

          </th>

        </tr>

      </thead>

      <tbody>

        <?php for($i=0;$i<count($data1);$i++): ?>

          <?php if ($axuiliarTipos!=$data58[$i]): ?>

            <tr style="display: none!important">

              <td>

                <center>

                  <?php asociados($contadorReferentes);?>

                  <?=$contadorReferentes?> 

                </center>

              </td>

            </tr>

            <?php $axuiliarTipos=$data58[$i];?>

            <?php $contadorReferentes++;?>
            
          <?php else: ?>

             <?php $axuiliarTipos=$data58[$i];?>
            
          <?php endif ?>


          <?php $arrayConvertidosSumador1 = explode ("-",$fechasArray[0]);?>

          <?php if ($banderaGratificantes==0): ?>

            <?php $sumadoresCualificados=sumadorCompoonentesHeads("1",$codigoProyectoPdf,$arrayConvertidosSumador1[0])?>

            <?php if (floatval($sumadoresCualificados)>0 || 4>3): ?>
              
            <tr style="background-color: gray!important; color:white!important;">

              <?php if (count($fechasArray) == 1): ?>

                <td class="nombre__apartados__secundarios" align="left" colspan="<?=$asignador+3?>">
                  
                   1. ASOCIADOS A DEPORTISTAS

                </td>

                <td class="nombre__apartados__secundarios" align="center" style="font-size: 12px!important;">

                  <?= number_format(floatval($sumadoresCualificados),2, '.', '')?>

                </td>

              <?php else: ?>

                <td class="nombre__apartados__secundarios" align="left" colspan="<?=($diferencias+2)?>">
                  
                  1. ASOCIADOS A DEPORTISTAS

                </td>

                <td class="nombre__apartados__secundarios" align="center" style="font-size: 12px!important;">

                  <?= $sumadoresCualificados?>

                </td>

              <?php endif ?>

            </tr>

            <?php $banderaGratificantes=funcionPostulantes($data2[$i]);?>

            <?php endif ?>

          <?php else: ?>

            <?php if ($data2[$i]!="1.1 Preparación y/o participación de deportistas" && $data2[$i]!="1.2 PREMIACIÓN A DEPORTISTAS POR LOGROS EN EVENTOS DEPORTIVOS U OBTENCIÓN DE METAS" && $data2[$i]!="1.3 IMPLEMENTACIÓN DEPORTIVA ESPECIALIZADA" && $data2[$i]!="1.4 INGRESOS A FAVOR DE DEPORTISTAS" && $data2[$i]!="* DIFUSIÓN DEL DEPORTISTA"): ?>
              
            <?php if ($data2[$i]=="2. SERVICIOS DE EDUCACIÓN Y/O CAPACITACIÓN PARA EL SECTOR DEPORTIVO"): ?>
              
              <?php $sumadoresCualificados=sumadorCompoonentesHeads("2",$codigoProyectoPdf,$arrayConvertidosSumador1[0])?>

            <?php endif ?>
              
            <?php if ($data2[$i]=="3. ORGANIZACIÓN DE EVENTOS DEPORTIVOS DESARROLLADOS EN EL ECUADOR"): ?>
              
              <?php $sumadoresCualificados=sumadorCompoonentesHeads("3",$codigoProyectoPdf,$arrayConvertidosSumador1[0])?>

            <?php endif ?>

            <?php if ($data2[$i]=="4. INFRAESTRUCTURA Y/O HERRAMIENTAS TECNOLÓGICAS PARA EL FOMENTO, REALIZACIÓN O SEGUIMIENTO DEL DEPORTE Y LA ACTIVIDAD FÍSICA"): ?>
              
              <?php $sumadoresCualificados=sumadorCompoonentesHeads("4",$codigoProyectoPdf,$arrayConvertidosSumador1[0])?>

            <?php endif ?>

           <?php if ($data2[$i]=="5. CONSTRUCCIÓN DE OBRA NUEVA, REHABILITACIÓN, READECUACIÓN Y/O MANTENIMIENTO DE INFRAESTRUCTURA DEPORTIVA"): ?>
              
              <?php $sumadoresCualificados=sumadorCompoonentesHeads("5",$codigoProyectoPdf,$arrayConvertidosSumador1[0])?>

            <?php endif ?>

           <?php if ($data2[$i]=="6. GASTOS ADMINISTRATIVOS"): ?>
              
              <?php $sumadoresCualificados=sumadorCompoonentesHeads("4",$codigoProyectoPdf,$arrayConvertidosSumador1[0])?>

            <?php endif ?>

            <tr style="background-color: gray!important; color:white!important;">

              <?php if (count($fechasArray) == 1): ?>

              <td class="nombre__apartados__secundarios" align="left" colspan="<?=$asignador+3?>">
                  
                <?=$data2[$i]?>

              </td>

              <td align="center" style="color:white; font-weight:bold; font-size: 12px!important;">

                <?= number_format(floatval($sumadoresCualificados),2, '.', '')?>

              </td>

              <?php else: ?>

              <td class="nombre__apartados__secundarios" align="left" colspan="<?=($diferencias+2)?>">
                  
                <?=$data2[$i]?>

              </td>

              <td align="center" style="color:white; font-weight:bold; font-size: 12px!important;">

                <?= number_format(floatval($sumadoresCualificados),2, '.', '')?>

              </td>
              <?php endif ?>

            </tr>

            <?php endif ?>

          <?php endif ?>

          <?php $sumadoresItems=0;?>

          <?php for($z=$contadorRelativo;$z<count($data3);$z++): ?>

            <?php if ($data4[$z]==$data1[$i]): ?>

              <?php $data5=array();?>
              <?php $data6=array();?>
              <?php $data7=array();?>
              <?php $data8=array();?>
              <?php $data15=array();?>
              
              <?php $queryVector="SELECT a.campos,a.identificador,c.idItem,c.itemNombres,(SELECT montos FROM pro_componentesciudadanosmontos AS a1 WHERE a1.idComponentesCiudadanos=a.idComponentesCiudadanos) AS montosIniciales FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS c ON c.idItem=a.idItemComponente INNER JOIN pro_componentes AS b ON b.idComponentes=c.componenteSeleccion WHERE a.codigo='$codigoProyectoPdf' AND a.idItemComponente='$data3[$contadorRelativo]';"?>

              <?php $resultadoVector = $conexionEstablecida->query($queryVector);?>

              <?php while($registroVector = $resultadoVector->fetch()){?>

                <?php $campos=$registroVector['campos'];?>
                <?php array_push($data5, $campos);?>

                <?php $identificador=$registroVector['identificador'];?>
                <?php array_push($data6, $identificador);?>

                <?php $idItem=$registroVector['idItem'];?>
                <?php array_push($data7, $idItem);?>

                <?php $itemNombres=$registroVector['itemNombres'];?>
                <?php array_push($data8, $itemNombres);?>

                <?php $montosIniciales=$registroVector['montosIniciales'];?>
                <?php array_push($data15, $montosIniciales);?>

              <?php }?> 

              <?php $sumadoresItems=0;?>

              <?php for ($m=0;$m<count($data5);$m++): ?>

                <?php $arrayCamposEditables = explode("/../", $data5[$m]);?>
                <?php $arrayMontosIniciales= explode("/../", $data15[$m]);?>

                <?php if ($data6[$m]=="h"): ?>

                <thead>

                  <tr>

                  <?php if (count($fechasArray) == 1): ?>

                    <th class="nombre__apartados__secundarios" align="left" colspan="<?=$asignador+4?>">
                      
                      <?= $data8[$m]?>

                    </th>

                  <?php else: ?>

                    <th colspan="<?=($diferencias+3)?>">
                      <?= $data8[$m]?>
                    </th>

                  <?php endif ?>

                  </tr>

                </thead>

                <?php endif ?>

                <?php if ($data6[$m]=="b"): ?>

                <tbody>

                  <tr>

                  <?php foreach ($arrayCamposEditables as $clave3 => $valor3): ?>

                      <?php if ($clave3<=2): ?>

                        <td><?=$valor3?></td>
                        
                      <?php endif ?>

                  <?php endforeach ?>

                  <?php $sumadorCantidades=0;?>

                  <?php foreach ($arrayMontosIniciales as $clave7 => $valor7): ?>

                    <?php $arrayMontosDestinadosAnios= explode("___", $valor7);?>

                    <?php $evaluadorMes=substr($arrayMontosDestinadosAnios[0], 0, -4);?>

                    <?php $anioObtenidos = substr($arrayMontosDestinadosAnios[0], -4);?>

                    <?php if ($arregloAnios1[0]==$anioObtenidos): ?>

                      <td>
                        <center>
                            <?=$arrayMontosDestinadosAnios[1]?>
                        </center>
                      </td>

                      <?php $sumadorCantidades=$sumadorCantidades + floatval($arrayMontosDestinadosAnios[1]);?>
                      
                    <?php endif ?>

                  <?php endforeach ?>

                    <td>
                      <center>
                        <?=number_format(floatval($sumadorCantidades),2, '.', '')?>

                        <?php $sumadoresItems=$sumadorCantidades+$sumadoresItems;?>

                      </center>
                    </td>

                  </tr>

                </tbody>

                <?php endif ?>

                <?php  $bandera=1;?>

              <?php endfor?> 

              <?php $contadorRelativo++;?>

            <?php else: ?>

              <?php $bandera=0;?>

              <?php $data5=array();?>
              <?php $data6=array();?>
              <?php $data7=array();?>
              <?php $data8=array();?>

              <?php break;?>
              
            <?php endif ?>

            <tr>

              <?php if (count($fechasArray) == 1): ?>

                    <td class="nombre__apartados__secundarios" align="left" colspan="<?=$asignador+3?>" style="background-color:black!important; color:white!important;">
                      
                    <center>
                      Total Item
                    </center>


                    </td>

              <?php else: ?>

                    <td class="nombre__apartados__secundarios" align="left" colspan="<?=($diferencias+2)?>" style="background-color:black!important; color:white!important;">
                      
                    <center>
                      Total Item
                    </center>

                    </td>

              <?php endif ?>

              <td style="font-weight: bold; color:white; background-color:gray;">

                <center>

                  <?=number_format(floatval($sumadoresItems),2, '.', '')?>
                  <?php $sumandoComponentes=$sumandoComponentes+$sumadoresItems;?>

                </center>
                    
              </td>

            </tr>

          <?php endfor?> 

        <?php endfor?> 

      </tbody>

      <tfoot>

        <tr  style="background-color: gray!important; color:white!important;">

          <th colspan="3" class="enfacis__celdas padding__celdas__dos" style="font-size: 14px!important; font-weight:bold!important;">

            <center>

              Presupuesto total requerido: 

            </center>

          </th>

          <?php $sumadoresTotalicimos=0;?>

          <?php if (count($fechasArray) == 1): ?>

            <?php for($i=1;$i<=$asignador;$i++): ?>  

              <th class="enfacis__celdas padding__celdas__dos">

                <center>

                <?php $mesesA=meses($i);?>

                <?php $sumasColumnas=sumadorCompoonentesFooters($codigoProyectoPdf,$arrayConvertidosSumador1[0],$mesesA)?>

                <?php $sumadoresTotalicimos=$sumadoresTotalicimos+$sumasColumnas;?>

                <?=number_format(floatval($sumasColumnas),2, '.', '')?>

                </center>

              </th>

            <?php endfor?> 

          <?php else: ?>

            <?php for($i=$asignador;$i<=12;$i++): ?>  

              <th class="enfacis__celdas padding__celdas__dos">

                <center>

                <?php $mesesA=meses($i);?>

                <?php $sumasColumnas=sumadorCompoonentesFooters($codigoProyectoPdf,$arrayConvertidosSumador1[0],$mesesA)?>

                <?php $sumadoresTotalicimos=$sumadoresTotalicimos+$sumasColumnas;?>

                <?=number_format(floatval($sumasColumnas),2, '.', '')?>

                </center>

              </th>

            <?php endfor?> 

          <?php endif ?>

          <td style="font-weight:bold!important; color:white!important; font-size: 14px!important;">

            <center>

            <?=number_format(floatval($sumadoresTotalicimos),2, '.', '')?>

            </center>

          </td>

        </tr>

      </tfoot>

    </table>


  <?php endif ?>  
  
  <!--====  End of Primera sección  ====-->

  <!--=====================================
  =            Segunda Sección            =
  ======================================-->

  <?php

    $contadorRelativo=0;
    $contadorRelativo2=0;
    $banderaGratificantes=0;
    $sumandoComponentes=0;

  ?>

  <?php if ($resultadoRestas==1 || $resultadoRestas==2 || $resultadoRestas==3): ?>  

    <div style="page-break-after:always;"></div>

    <table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias">

      <thead>
        
        <tr style="background: #263238!important; color:white!important;">

          <th class="enfacis__celdas padding__celdas__dos" style="font-size:16px!important;" rowspan="2" style="vertical-align: middle;">
            <center>
              COMPONENTES
            </center>
          </th>

          <th class="enfacis__celdas padding__celdas__dos" rowspan="2" style="vertical-align: middle;">
            <center>
              DETALLE
            </center>
          </th>

          <th class="enfacis__celdas padding__celdas__dos" rowspan="2" style="vertical-align: middle;">
            <center>
              JUSTIFICACIÓN
            </center>
          </th>

          <?php  $arregloAnios1 = explode("-", $fechasArray[1]);?>

          <?php  $asignador = intval($arregloAnios1[1]);?>


          <?php  $diferencias = 0;?>

          <?php  $diferencias = 12 - $asignador + 2;?>

          <?php if (count($fechasArray) == 2): ?>

          <th class="enfacis__celdas padding__celdas__dos" colspan="<?=$asignador+1?>">

            <center>
              Monto año <?=intval($arregloAnios1[0])?> 
            </center>

          </th>

          <?php else: ?>

          <th class="enfacis__celdas padding__celdas__dos" colspan="<?=$diferencias?>">

            <center>
              Monto año <?=intval($arregloAnios1[0])?> 
            </center>

          </th>

          <?php endif ?>


        </tr>

        <tr style="background: #263238!important; color:white!important;">

          <?php if (count($fechasArray) == 2): ?>

            <?php for($i=1;$i<=$asignador;$i++): ?>  

              <th class="enfacis__celdas padding__celdas__dos">

                <center>

                <?php $mesesA=meses($i);?>

                <?=$mesesA?>

                </center>

              </th>

            <?php endfor?> 

          <?php else: ?>

            <?php for($i=$asignador;$i<=12;$i++): ?>  

              <th class="enfacis__celdas padding__celdas__dos">

                <center>

                <?php $mesesA=meses($i);?>

                <?=$mesesA?>

                </center>

              </th>

            <?php endfor?> 

          <?php endif ?>


          <th class="enfacis__celdas padding__celdas__dos">

            Total&nbsp;<span id="sastre"></span>

          </th>

        </tr>

      </thead>

      <tbody>

        <?php for($i=0;$i<count($data1);$i++): ?>

          <?php if ($axuiliarTipos!=$data58[$i]): ?>

            <tr style="display: none!important">

              <td>

                <center>

                  <?php asociados($contadorReferentes);?>

                  <?=$contadorReferentes?> 

                </center>

              </td>

            </tr>

            <?php $axuiliarTipos=$data58[$i];?>

            <?php $contadorReferentes++;?>
            
          <?php else: ?>

             <?php $axuiliarTipos=$data58[$i];?>
            
          <?php endif ?>


          <?php $arrayConvertidosSumador1 = explode ("-",$fechasArray[1]);?>

          <?php if ($banderaGratificantes==0): ?>

            <?php $sumadoresCualificados=sumadorCompoonentesHeads("1",$codigoProyectoPdf,$arrayConvertidosSumador1[0])?>

            <?php if (floatval($sumadoresCualificados)>0 || 4>3): ?>
              
            <tr style="background-color: gray!important; color:white!important;">

              <?php if (count($fechasArray) == 2): ?>

                <td class="nombre__apartados__secundarios" align="left" colspan="<?=$asignador+3?>">
                  
                   1. ASOCIADOS A DEPORTISTAS

                </td>

                <td class="nombre__apartados__secundarios" align="center" style="font-size: 12px!important;">

                  <?= number_format(floatval($sumadoresCualificados),2, '.', '')?>

                </td>

              <?php else: ?>

                <td class="nombre__apartados__secundarios" align="left" colspan="<?=($diferencias+2)?>">
                  
                  1. ASOCIADOS A DEPORTISTAS

                </td>

                <td class="nombre__apartados__secundarios" align="center" style="font-size: 12px!important;">

                  <?= $sumadoresCualificados?>

                </td>

              <?php endif ?>

            </tr>

            <?php $banderaGratificantes=funcionPostulantes($data2[$i]);?>

            <?php endif ?>

          <?php else: ?>

            <?php if ($data2[$i]!="1.1 Preparación y/o participación de deportistas" && $data2[$i]!="1.2 PREMIACIÓN A DEPORTISTAS POR LOGROS EN EVENTOS DEPORTIVOS U OBTENCIÓN DE METAS" && $data2[$i]!="1.3 IMPLEMENTACIÓN DEPORTIVA ESPECIALIZADA" && $data2[$i]!="1.4 INGRESOS A FAVOR DE DEPORTISTAS" && $data2[$i]!="* DIFUSIÓN DEL DEPORTISTA"): ?>
              
            <?php if ($data2[$i]=="2. SERVICIOS DE EDUCACIÓN Y/O CAPACITACIÓN PARA EL SECTOR DEPORTIVO"): ?>
              
              <?php $sumadoresCualificados=sumadorCompoonentesHeads("2",$codigoProyectoPdf,$arrayConvertidosSumador1[0])?>

            <?php endif ?>
              
            <?php if ($data2[$i]=="3. ORGANIZACIÓN DE EVENTOS DEPORTIVOS DESARROLLADOS EN EL ECUADOR"): ?>
              
              <?php $sumadoresCualificados=sumadorCompoonentesHeads("3",$codigoProyectoPdf,$arrayConvertidosSumador1[0])?>

            <?php endif ?>

            <?php if ($data2[$i]=="4. INFRAESTRUCTURA Y/O HERRAMIENTAS TECNOLÓGICAS PARA EL FOMENTO, REALIZACIÓN O SEGUIMIENTO DEL DEPORTE Y LA ACTIVIDAD FÍSICA"): ?>
              
              <?php $sumadoresCualificados=sumadorCompoonentesHeads("4",$codigoProyectoPdf,$arrayConvertidosSumador1[0])?>

            <?php endif ?>

           <?php if ($data2[$i]=="5. CONSTRUCCIÓN DE OBRA NUEVA, REHABILITACIÓN, READECUACIÓN Y/O MANTENIMIENTO DE INFRAESTRUCTURA DEPORTIVA"): ?>
              
              <?php $sumadoresCualificados=sumadorCompoonentesHeads("5",$codigoProyectoPdf,$arrayConvertidosSumador1[0])?>

            <?php endif ?>

           <?php if ($data2[$i]=="6. GASTOS ADMINISTRATIVOS"): ?>
              
              <?php $sumadoresCualificados=sumadorCompoonentesHeads("4",$codigoProyectoPdf,$arrayConvertidosSumador1[0])?>

            <?php endif ?>

            <tr style="background-color: gray!important; color:white!important;">

              <?php if (count($fechasArray) == 2): ?>

              <td class="nombre__apartados__secundarios" align="left" colspan="<?=$asignador+3?>">
                  
                <?=$data2[$i]?>

              </td>

              <td align="center" style="color:white; font-weight:bold; font-size: 12px!important;">

                <?= number_format(floatval($sumadoresCualificados),2, '.', '')?>

              </td>

              <?php else: ?>

              <td class="nombre__apartados__secundarios" align="left" colspan="<?=($diferencias+2)?>">
                  
                <?=$data2[$i]?>

              </td>

              <td align="center" style="color:white; font-weight:bold; font-size: 12px!important;">

                <?= number_format(floatval($sumadoresCualificados),2, '.', '')?>

              </td>
              <?php endif ?>

            </tr>

            <?php endif ?>

          <?php endif ?>

          <?php $sumadoresItems=0;?>

          <?php for($z=$contadorRelativo;$z<count($data3);$z++): ?>

            <?php if ($data4[$z]==$data1[$i]): ?>

              <?php $data5=array();?>
              <?php $data6=array();?>
              <?php $data7=array();?>
              <?php $data8=array();?>
              <?php $data15=array();?>
              
              <?php $queryVector="SELECT a.campos,a.identificador,c.idItem,c.itemNombres,(SELECT montos FROM pro_componentesciudadanosmontos AS a1 WHERE a1.idComponentesCiudadanos=a.idComponentesCiudadanos) AS montosIniciales FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS c ON c.idItem=a.idItemComponente INNER JOIN pro_componentes AS b ON b.idComponentes=c.componenteSeleccion WHERE a.codigo='$codigoProyectoPdf' AND a.idItemComponente='$data3[$contadorRelativo]';"?>

              <?php $resultadoVector = $conexionEstablecida->query($queryVector);?>

              <?php while($registroVector = $resultadoVector->fetch()){?>

                <?php $campos=$registroVector['campos'];?>
                <?php array_push($data5, $campos);?>

                <?php $identificador=$registroVector['identificador'];?>
                <?php array_push($data6, $identificador);?>

                <?php $idItem=$registroVector['idItem'];?>
                <?php array_push($data7, $idItem);?>

                <?php $itemNombres=$registroVector['itemNombres'];?>
                <?php array_push($data8, $itemNombres);?>

                <?php $montosIniciales=$registroVector['montosIniciales'];?>
                <?php array_push($data15, $montosIniciales);?>

              <?php }?> 

              <?php $sumadoresItems=0;?>

              <?php for ($m=0;$m<count($data5);$m++): ?>

                <?php $arrayCamposEditables = explode("/../", $data5[$m]);?>
                <?php $arrayMontosIniciales= explode("/../", $data15[$m]);?>

                <?php if ($data6[$m]=="h"): ?>

                <thead>

                  <tr>

                  <?php if (count($fechasArray) == 2): ?>

                    <th class="nombre__apartados__secundarios" align="left" colspan="<?=$asignador+4?>">
                      
                      <?= $data8[$m]?>

                    </th>

                  <?php else: ?>

                    <th colspan="<?=($diferencias+3)?>">
                      <?= $data8[$m]?>
                    </th>

                  <?php endif ?>

                  </tr>

                </thead>

                <?php endif ?>

                <?php if ($data6[$m]=="b"): ?>

                <tbody>

                  <tr>

                  <?php foreach ($arrayCamposEditables as $clave3 => $valor3): ?>

                      <?php if ($clave3<=2): ?>

                        <td><?=$valor3?></td>
                        
                      <?php endif ?>

                  <?php endforeach ?>

                  <?php $sumadorCantidades=0;?>

                  <?php foreach ($arrayMontosIniciales as $clave7 => $valor7): ?>

                    <?php $arrayMontosDestinadosAnios= explode("___", $valor7);?>

                    <?php $evaluadorMes=substr($arrayMontosDestinadosAnios[0], 0, -4);?>

                    <?php $anioObtenidos = substr($arrayMontosDestinadosAnios[0], -4);?>

                    <?php if ($arregloAnios1[0]==$anioObtenidos): ?>

                      <td>
                        <center>
                            <?=$arrayMontosDestinadosAnios[1]?>
                        </center>
                      </td>

                      <?php $sumadorCantidades=$sumadorCantidades + floatval($arrayMontosDestinadosAnios[1]);?>
                      
                    <?php endif ?>

                  <?php endforeach ?>

                    <td>
                      <center>
                        <?=number_format(floatval($sumadorCantidades),2, '.', '')?>

                        <?php $sumadoresItems=$sumadorCantidades+$sumadoresItems;?>

                      </center>
                    </td>

                  </tr>

                </tbody>

                <?php endif ?>

                <?php  $bandera=1;?>

              <?php endfor?> 

              <?php $contadorRelativo++;?>

            <?php else: ?>

              <?php $bandera=0;?>

              <?php $data5=array();?>
              <?php $data6=array();?>
              <?php $data7=array();?>
              <?php $data8=array();?>

              <?php break;?>
              
            <?php endif ?>

            <tr>

              <?php if (count($fechasArray) == 2): ?>

                    <td class="nombre__apartados__secundarios" align="left" colspan="<?=$asignador+3?>" style="background-color:black!important; color:white!important;">
                      
                    <center>
                      Total Item
                    </center>


                    </td>

              <?php else: ?>

                    <td class="nombre__apartados__secundarios" align="left" colspan="<?=($diferencias+2)?>" style="background-color:black!important; color:white!important;">
                      
                    <center>
                      Total Item
                    </center>

                    </td>

              <?php endif ?>

              <td style="font-weight: bold; color:white; background-color:gray;">

                <center>

                  <?=number_format(floatval($sumadoresItems),2, '.', '')?>
                  <?php $sumandoComponentes=$sumandoComponentes+$sumadoresItems;?>

                </center>
                    
              </td>

            </tr>

          <?php endfor?> 

        <?php endfor?> 

      </tbody>

      <tfoot>

        <tr  style="background-color: gray!important; color:white!important;">

          <th colspan="3" class="enfacis__celdas padding__celdas__dos" style="font-size: 14px!important; font-weight:bold!important;">

            <center>

              Presupuesto total requerido: 

            </center>

          </th>

          <?php $sumadoresTotalicimos=0;?>

          <?php if (count($fechasArray) == 2): ?>

            <?php for($i=1;$i<=$asignador;$i++): ?>  

              <th class="enfacis__celdas padding__celdas__dos">

                <center>

                <?php $mesesA=meses($i);?>

                <?php $sumasColumnas=sumadorCompoonentesFooters($codigoProyectoPdf,$arrayConvertidosSumador1[0],$mesesA)?>

                <?php $sumadoresTotalicimos=$sumadoresTotalicimos+$sumasColumnas;?>

                <?=number_format(floatval($sumasColumnas),2, '.', '')?>

                </center>

              </th>

            <?php endfor?> 

          <?php else: ?>

            <?php for($i=$asignador;$i<=12;$i++): ?>  

              <th class="enfacis__celdas padding__celdas__dos">

                <center>

                <?php $mesesA=meses($i);?>

                <?php $sumasColumnas=sumadorCompoonentesFooters($codigoProyectoPdf,$arrayConvertidosSumador1[0],$mesesA)?>

                <?php $sumadoresTotalicimos=$sumadoresTotalicimos+$sumasColumnas;?>

                <?=number_format(floatval($sumasColumnas),2, '.', '')?>

                </center>

              </th>

            <?php endfor?> 

          <?php endif ?>

          <td style="font-weight:bold!important; color:white!important; font-size: 14px!important;">

            <center>

            <?=number_format(floatval($sumadoresTotalicimos),2, '.', '')?>

            </center>

          </td>

        </tr>

      </tfoot>

    </table>

  <?php endif ?>  
  
  <!--====  End of Segunda Sección  ====-->
  
  <!--=====================================
  =            Tercera Sección            =
  ======================================-->
  
  <?php

    $contadorRelativo=0;
    $contadorRelativo2=0;
    $banderaGratificantes=0;
    $sumandoComponentes=0;

  ?>

  <?php if ($resultadoRestas==2 || $resultadoRestas==3): ?>  

    <div style="page-break-after:always;"></div>

    <table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias">

      <thead>
        
        <tr style="background: #263238!important; color:white!important;">

          <th class="enfacis__celdas padding__celdas__dos" style="font-size:16px!important;" rowspan="2" style="vertical-align: middle;">
            <center>
              COMPONENTES
            </center>
          </th>

          <th class="enfacis__celdas padding__celdas__dos" rowspan="2" style="vertical-align: middle;">
            <center>
              DETALLE
            </center>
          </th>

          <th class="enfacis__celdas padding__celdas__dos" rowspan="2" style="vertical-align: middle;">
            <center>
              JUSTIFICACIÓN
            </center>
          </th>

          <?php  $arregloAnios1 = explode("-", $fechasArray[2]);?>

          <?php  $asignador = intval($arregloAnios1[1]);?>


          <?php  $diferencias = 0;?>

          <?php  $diferencias = 12 - $asignador + 2;?>

          <?php if (count($fechasArray) == 3): ?>

          <th class="enfacis__celdas padding__celdas__dos" colspan="<?=$asignador+1?>">

            <center>
              Monto año <?=intval($arregloAnios1[0])?> 
            </center>

          </th>

          <?php else: ?>

          <th class="enfacis__celdas padding__celdas__dos" colspan="<?=$diferencias?>">

            <center>
              Monto año <?=intval($arregloAnios1[0])?> 
            </center>

          </th>

          <?php endif ?>


        </tr>

        <tr style="background: #263238!important; color:white!important;">

          <?php if (count($fechasArray) == 3): ?>

            <?php for($i=1;$i<=$asignador;$i++): ?>  

              <th class="enfacis__celdas padding__celdas__dos">

                <center>

                <?php $mesesA=meses($i);?>

                <?=$mesesA?>

                </center>

              </th>

            <?php endfor?> 

          <?php else: ?>

            <?php for($i=$asignador;$i<=12;$i++): ?>  

              <th class="enfacis__celdas padding__celdas__dos">

                <center>

                <?php $mesesA=meses($i);?>

                <?=$mesesA?>

                </center>

              </th>

            <?php endfor?> 

          <?php endif ?>


          <th class="enfacis__celdas padding__celdas__dos">

            Total&nbsp;<span id="sastre"></span>

          </th>

        </tr>

      </thead>

      <tbody>

        <?php for($i=0;$i<count($data1);$i++): ?>

          <?php if ($axuiliarTipos!=$data58[$i]): ?>

            <tr style="display: none!important">

              <td>

                <center>

                  <?php asociados($contadorReferentes);?>

                  <?=$contadorReferentes?> 

                </center>

              </td>

            </tr>

            <?php $axuiliarTipos=$data58[$i];?>

            <?php $contadorReferentes++;?>
            
          <?php else: ?>

             <?php $axuiliarTipos=$data58[$i];?>
            
          <?php endif ?>


          <?php $arrayConvertidosSumador1 = explode ("-",$fechasArray[2]);?>

          <?php if ($banderaGratificantes==0): ?>

            <?php $sumadoresCualificados=sumadorCompoonentesHeads("1",$codigoProyectoPdf,$arrayConvertidosSumador1[0])?>

            <?php if (floatval($sumadoresCualificados)>0 || 4>3): ?>
              
            <tr style="background-color: gray!important; color:white!important;">

              <?php if (count($fechasArray) == 3): ?>

                <td class="nombre__apartados__secundarios" align="left" colspan="<?=$asignador+3?>">
                  
                   1. ASOCIADOS A DEPORTISTAS

                </td>

                <td class="nombre__apartados__secundarios" align="center" style="font-size: 12px!important;">

                  <?= number_format(floatval($sumadoresCualificados),2, '.', '')?>

                </td>

              <?php else: ?>

                <td class="nombre__apartados__secundarios" align="left" colspan="<?=($diferencias+2)?>">
                  
                  1. ASOCIADOS A DEPORTISTAS

                </td>

                <td class="nombre__apartados__secundarios" align="center" style="font-size: 12px!important;">

                  <?= $sumadoresCualificados?>

                </td>

              <?php endif ?>

            </tr>

            <?php $banderaGratificantes=funcionPostulantes($data2[$i]);?>

            <?php endif ?>

          <?php else: ?>

            <?php if ($data2[$i]!="1.1 Preparación y/o participación de deportistas" && $data2[$i]!="1.2 PREMIACIÓN A DEPORTISTAS POR LOGROS EN EVENTOS DEPORTIVOS U OBTENCIÓN DE METAS" && $data2[$i]!="1.3 IMPLEMENTACIÓN DEPORTIVA ESPECIALIZADA" && $data2[$i]!="1.4 INGRESOS A FAVOR DE DEPORTISTAS" && $data2[$i]!="* DIFUSIÓN DEL DEPORTISTA"): ?>
              
            <?php if ($data2[$i]=="2. SERVICIOS DE EDUCACIÓN Y/O CAPACITACIÓN PARA EL SECTOR DEPORTIVO"): ?>
              
              <?php $sumadoresCualificados=sumadorCompoonentesHeads("2",$codigoProyectoPdf,$arrayConvertidosSumador1[0])?>

            <?php endif ?>
              
            <?php if ($data2[$i]=="3. ORGANIZACIÓN DE EVENTOS DEPORTIVOS DESARROLLADOS EN EL ECUADOR"): ?>
              
              <?php $sumadoresCualificados=sumadorCompoonentesHeads("3",$codigoProyectoPdf,$arrayConvertidosSumador1[0])?>

            <?php endif ?>

            <?php if ($data2[$i]=="4. INFRAESTRUCTURA Y/O HERRAMIENTAS TECNOLÓGICAS PARA EL FOMENTO, REALIZACIÓN O SEGUIMIENTO DEL DEPORTE Y LA ACTIVIDAD FÍSICA"): ?>
              
              <?php $sumadoresCualificados=sumadorCompoonentesHeads("4",$codigoProyectoPdf,$arrayConvertidosSumador1[0])?>

            <?php endif ?>

           <?php if ($data2[$i]=="5. CONSTRUCCIÓN DE OBRA NUEVA, REHABILITACIÓN, READECUACIÓN Y/O MANTENIMIENTO DE INFRAESTRUCTURA DEPORTIVA"): ?>
              
              <?php $sumadoresCualificados=sumadorCompoonentesHeads("5",$codigoProyectoPdf,$arrayConvertidosSumador1[0])?>

            <?php endif ?>

           <?php if ($data2[$i]=="6. GASTOS ADMINISTRATIVOS"): ?>
              
              <?php $sumadoresCualificados=sumadorCompoonentesHeads("4",$codigoProyectoPdf,$arrayConvertidosSumador1[0])?>

            <?php endif ?>

            <tr style="background-color: gray!important; color:white!important;">

              <?php if (count($fechasArray) == 3): ?>

              <td class="nombre__apartados__secundarios" align="left" colspan="<?=$asignador+3?>">
                  
                <?=$data2[$i]?>

              </td>

              <td align="center" style="color:white; font-weight:bold; font-size: 12px!important;">

                <?= number_format(floatval($sumadoresCualificados),2, '.', '')?>

              </td>

              <?php else: ?>

              <td class="nombre__apartados__secundarios" align="left" colspan="<?=($diferencias+2)?>">
                  
                <?=$data2[$i]?>

              </td>

              <td align="center" style="color:white; font-weight:bold; font-size: 12px!important;">

                <?= number_format(floatval($sumadoresCualificados),2, '.', '')?>

              </td>
              <?php endif ?>

            </tr>

            <?php endif ?>

          <?php endif ?>

          <?php $sumadoresItems=0;?>

          <?php for($z=$contadorRelativo;$z<count($data3);$z++): ?>

            <?php if ($data4[$z]==$data1[$i]): ?>

              <?php $data5=array();?>
              <?php $data6=array();?>
              <?php $data7=array();?>
              <?php $data8=array();?>
              <?php $data15=array();?>
              
              <?php $queryVector="SELECT a.campos,a.identificador,c.idItem,c.itemNombres,(SELECT montos FROM pro_componentesciudadanosmontos AS a1 WHERE a1.idComponentesCiudadanos=a.idComponentesCiudadanos) AS montosIniciales FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS c ON c.idItem=a.idItemComponente INNER JOIN pro_componentes AS b ON b.idComponentes=c.componenteSeleccion WHERE a.codigo='$codigoProyectoPdf' AND a.idItemComponente='$data3[$contadorRelativo]';"?>

              <?php $resultadoVector = $conexionEstablecida->query($queryVector);?>

              <?php while($registroVector = $resultadoVector->fetch()){?>

                <?php $campos=$registroVector['campos'];?>
                <?php array_push($data5, $campos);?>

                <?php $identificador=$registroVector['identificador'];?>
                <?php array_push($data6, $identificador);?>

                <?php $idItem=$registroVector['idItem'];?>
                <?php array_push($data7, $idItem);?>

                <?php $itemNombres=$registroVector['itemNombres'];?>
                <?php array_push($data8, $itemNombres);?>

                <?php $montosIniciales=$registroVector['montosIniciales'];?>
                <?php array_push($data15, $montosIniciales);?>

              <?php }?> 

              <?php $sumadoresItems=0;?>

              <?php for ($m=0;$m<count($data5);$m++): ?>

                <?php $arrayCamposEditables = explode("/../", $data5[$m]);?>
                <?php $arrayMontosIniciales= explode("/../", $data15[$m]);?>

                <?php if ($data6[$m]=="h"): ?>

                <thead>

                  <tr>

                  <?php if (count($fechasArray) == 3): ?>

                    <th class="nombre__apartados__secundarios" align="left" colspan="<?=$asignador+4?>">
                      
                      <?= $data8[$m]?>

                    </th>

                  <?php else: ?>

                    <th colspan="<?=($diferencias+3)?>">
                      <?= $data8[$m]?>
                    </th>

                  <?php endif ?>

                  </tr>

                </thead>

                <?php endif ?>

                <?php if ($data6[$m]=="b"): ?>

                <tbody>

                  <tr>

                  <?php foreach ($arrayCamposEditables as $clave3 => $valor3): ?>

                      <?php if ($clave3<=2): ?>

                        <td><?=$valor3?></td>
                        
                      <?php endif ?>

                  <?php endforeach ?>

                  <?php $sumadorCantidades=0;?>

                  <?php foreach ($arrayMontosIniciales as $clave7 => $valor7): ?>

                    <?php $arrayMontosDestinadosAnios= explode("___", $valor7);?>

                    <?php $evaluadorMes=substr($arrayMontosDestinadosAnios[0], 0, -4);?>

                    <?php $anioObtenidos = substr($arrayMontosDestinadosAnios[0], -4);?>

                    <?php if ($arregloAnios1[0]==$anioObtenidos): ?>

                      <td>
                        <center>
                            <?=$arrayMontosDestinadosAnios[1]?>
                        </center>
                      </td>

                      <?php $sumadorCantidades=$sumadorCantidades + floatval($arrayMontosDestinadosAnios[1]);?>
                      
                    <?php endif ?>

                  <?php endforeach ?>

                    <td>
                      <center>
                        <?=number_format(floatval($sumadorCantidades),2, '.', '')?>

                        <?php $sumadoresItems=$sumadorCantidades+$sumadoresItems;?>

                      </center>
                    </td>

                  </tr>

                </tbody>

                <?php endif ?>

                <?php  $bandera=1;?>

              <?php endfor?> 

              <?php $contadorRelativo++;?>

            <?php else: ?>

              <?php $bandera=0;?>

              <?php $data5=array();?>
              <?php $data6=array();?>
              <?php $data7=array();?>
              <?php $data8=array();?>

              <?php break;?>
              
            <?php endif ?>

            <tr>

              <?php if (count($fechasArray) == 3): ?>

                    <td class="nombre__apartados__secundarios" align="left" colspan="<?=$asignador+3?>" style="background-color:black!important; color:white!important;">
                      
                    <center>
                      Total Item
                    </center>


                    </td>

              <?php else: ?>

                    <td class="nombre__apartados__secundarios" align="left" colspan="<?=($diferencias+2)?>" style="background-color:black!important; color:white!important;">
                      
                    <center>
                      Total Item
                    </center>

                    </td>

              <?php endif ?>

              <td style="font-weight: bold; color:white; background-color:gray;">

                <center>

                  <?=number_format(floatval($sumadoresItems),2, '.', '')?>
                  <?php $sumandoComponentes=$sumandoComponentes+$sumadoresItems;?>

                </center>
                    
              </td>

            </tr>

          <?php endfor?> 

        <?php endfor?> 

      </tbody>

      <tfoot>

        <tr  style="background-color: gray!important; color:white!important;">

          <th colspan="3" class="enfacis__celdas padding__celdas__dos" style="font-size: 14px!important; font-weight:bold!important;">

            <center>

              Presupuesto total requerido: 

            </center>

          </th>

          <?php $sumadoresTotalicimos=0;?>

          <?php if (count($fechasArray) == 3): ?>

            <?php for($i=1;$i<=$asignador;$i++): ?>  

              <th class="enfacis__celdas padding__celdas__dos">

                <center>

                <?php $mesesA=meses($i);?>

                <?php $sumasColumnas=sumadorCompoonentesFooters($codigoProyectoPdf,$arrayConvertidosSumador1[0],$mesesA)?>

                <?php $sumadoresTotalicimos=$sumadoresTotalicimos+$sumasColumnas;?>

                <?=number_format(floatval($sumasColumnas),2, '.', '')?>

                </center>

              </th>

            <?php endfor?> 

          <?php else: ?>

            <?php for($i=$asignador;$i<=12;$i++): ?>  

              <th class="enfacis__celdas padding__celdas__dos">

                <center>

                <?php $mesesA=meses($i);?>

                <?php $sumasColumnas=sumadorCompoonentesFooters($codigoProyectoPdf,$arrayConvertidosSumador1[0],$mesesA)?>

                <?php $sumadoresTotalicimos=$sumadoresTotalicimos+$sumasColumnas;?>

                <?=number_format(floatval($sumasColumnas),2, '.', '')?>

                </center>

              </th>

            <?php endfor?> 

          <?php endif ?>

          <td style="font-weight:bold!important; color:white!important; font-size: 14px!important;">

            <center>

            <?=number_format(floatval($sumadoresTotalicimos),2, '.', '')?>

            </center>

          </td>

        </tr>

      </tfoot>

    </table>


  <?php endif ?>  
    
  
  <!--====  End of Tercera Sección  ====-->
  
  <!--====================================
  =            Cuarta sección            =
  =====================================-->

  <?php

    $contadorRelativo=0;
    $contadorRelativo2=0;
    $banderaGratificantes=0;
    $sumandoComponentes=0;

  ?>

  <?php if ($resultadoRestas==3): ?>  

    <div style="page-break-after:always;"></div>

     <table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias">

      <thead>
        
        <tr style="background: #263238!important; color:white!important;">

          <th class="enfacis__celdas padding__celdas__dos" style="font-size:16px!important;" rowspan="2" style="vertical-align: middle;">
            <center>
              COMPONENTES
            </center>
          </th>

          <th class="enfacis__celdas padding__celdas__dos" rowspan="2" style="vertical-align: middle;">
            <center>
              DETALLE
            </center>
          </th>

          <th class="enfacis__celdas padding__celdas__dos" rowspan="2" style="vertical-align: middle;">
            <center>
              JUSTIFICACIÓN
            </center>
          </th>

          <?php  $arregloAnios1 = explode("-", $fechasArray[3]);?>

          <?php  $asignador = intval($arregloAnios1[1]);?>


          <?php  $diferencias = 0;?>

          <?php  $diferencias = 12 - $asignador + 2;?>

          <?php if (count($fechasArray) == 4): ?>

          <th class="enfacis__celdas padding__celdas__dos" colspan="<?=$asignador+1?>">

            <center>
              Monto año <?=intval($arregloAnios1[0])?> 
            </center>

          </th>

          <?php else: ?>

          <th class="enfacis__celdas padding__celdas__dos" colspan="<?=$diferencias?>">

            <center>
              Monto año <?=intval($arregloAnios1[0])?> 
            </center>

          </th>

          <?php endif ?>


        </tr>

        <tr style="background: #263238!important; color:white!important;">

          <?php if (count($fechasArray) == 4): ?>

            <?php for($i=1;$i<=$asignador;$i++): ?>  

              <th class="enfacis__celdas padding__celdas__dos">

                <center>

                <?php $mesesA=meses($i);?>

                <?=$mesesA?>

                </center>

              </th>

            <?php endfor?> 

          <?php else: ?>

            <?php for($i=$asignador;$i<=12;$i++): ?>  

              <th class="enfacis__celdas padding__celdas__dos">

                <center>

                <?php $mesesA=meses($i);?>

                <?=$mesesA?>

                </center>

              </th>

            <?php endfor?> 

          <?php endif ?>


          <th class="enfacis__celdas padding__celdas__dos">

            Total&nbsp;<span id="sastre"></span>

          </th>

        </tr>

      </thead>

      <tbody>

        <?php for($i=0;$i<count($data1);$i++): ?>

          <?php if ($axuiliarTipos!=$data58[$i]): ?>

            <tr style="display: none!important">

              <td>

                <center>

                  <?php asociados($contadorReferentes);?>

                  <?=$contadorReferentes?> 

                </center>

              </td>

            </tr>

            <?php $axuiliarTipos=$data58[$i];?>

            <?php $contadorReferentes++;?>
            
          <?php else: ?>

             <?php $axuiliarTipos=$data58[$i];?>
            
          <?php endif ?>


          <?php $arrayConvertidosSumador1 = explode ("-",$fechasArray[3]);?>

          <?php if ($banderaGratificantes==0): ?>

            <?php $sumadoresCualificados=sumadorCompoonentesHeads("1",$codigoProyectoPdf,$arrayConvertidosSumador1[0])?>

            <?php if (floatval($sumadoresCualificados)>0 || 4>3): ?>
              
            <tr style="background-color: gray!important; color:white!important;">

              <?php if (count($fechasArray) == 4): ?>

                <td class="nombre__apartados__secundarios" align="left" colspan="<?=$asignador+3?>">
                  
                   1. ASOCIADOS A DEPORTISTAS

                </td>

                <td class="nombre__apartados__secundarios" align="center" style="font-size: 12px!important;">

                  <?= number_format(floatval($sumadoresCualificados),2, '.', '')?>

                </td>

              <?php else: ?>

                <td class="nombre__apartados__secundarios" align="left" colspan="<?=($diferencias+2)?>">
                  
                  1. ASOCIADOS A DEPORTISTAS

                </td>

                <td class="nombre__apartados__secundarios" align="center" style="font-size: 12px!important;">

                  <?= $sumadoresCualificados?>

                </td>

              <?php endif ?>

            </tr>

            <?php $banderaGratificantes=funcionPostulantes($data2[$i]);?>

            <?php endif ?>

          <?php else: ?>

            <?php if ($data2[$i]!="1.1 Preparación y/o participación de deportistas" && $data2[$i]!="1.2 PREMIACIÓN A DEPORTISTAS POR LOGROS EN EVENTOS DEPORTIVOS U OBTENCIÓN DE METAS" && $data2[$i]!="1.3 IMPLEMENTACIÓN DEPORTIVA ESPECIALIZADA" && $data2[$i]!="1.4 INGRESOS A FAVOR DE DEPORTISTAS" && $data2[$i]!="* DIFUSIÓN DEL DEPORTISTA"): ?>
              
            <?php if ($data2[$i]=="2. SERVICIOS DE EDUCACIÓN Y/O CAPACITACIÓN PARA EL SECTOR DEPORTIVO"): ?>
              
              <?php $sumadoresCualificados=sumadorCompoonentesHeads("2",$codigoProyectoPdf,$arrayConvertidosSumador1[0])?>

            <?php endif ?>
              
            <?php if ($data2[$i]=="3. ORGANIZACIÓN DE EVENTOS DEPORTIVOS DESARROLLADOS EN EL ECUADOR"): ?>
              
              <?php $sumadoresCualificados=sumadorCompoonentesHeads("3",$codigoProyectoPdf,$arrayConvertidosSumador1[0])?>

            <?php endif ?>

            <?php if ($data2[$i]=="4. INFRAESTRUCTURA Y/O HERRAMIENTAS TECNOLÓGICAS PARA EL FOMENTO, REALIZACIÓN O SEGUIMIENTO DEL DEPORTE Y LA ACTIVIDAD FÍSICA"): ?>
              
              <?php $sumadoresCualificados=sumadorCompoonentesHeads("4",$codigoProyectoPdf,$arrayConvertidosSumador1[0])?>

            <?php endif ?>

           <?php if ($data2[$i]=="5. CONSTRUCCIÓN DE OBRA NUEVA, REHABILITACIÓN, READECUACIÓN Y/O MANTENIMIENTO DE INFRAESTRUCTURA DEPORTIVA"): ?>
              
              <?php $sumadoresCualificados=sumadorCompoonentesHeads("5",$codigoProyectoPdf,$arrayConvertidosSumador1[0])?>

            <?php endif ?>

           <?php if ($data2[$i]=="6. GASTOS ADMINISTRATIVOS"): ?>
              
              <?php $sumadoresCualificados=sumadorCompoonentesHeads("4",$codigoProyectoPdf,$arrayConvertidosSumador1[0])?>

            <?php endif ?>

            <tr style="background-color: gray!important; color:white!important;">

              <?php if (count($fechasArray) == 4): ?>

              <td class="nombre__apartados__secundarios" align="left" colspan="<?=$asignador+3?>">
                  
                <?=$data2[$i]?>

              </td>

              <td align="center" style="color:white; font-weight:bold; font-size: 12px!important;">

                <?= number_format(floatval($sumadoresCualificados),2, '.', '')?>

              </td>

              <?php else: ?>

              <td class="nombre__apartados__secundarios" align="left" colspan="<?=($diferencias+2)?>">
                  
                <?=$data2[$i]?>

              </td>

              <td align="center" style="color:white; font-weight:bold; font-size: 12px!important;">

                <?= number_format(floatval($sumadoresCualificados),2, '.', '')?>

              </td>
              <?php endif ?>

            </tr>

            <?php endif ?>

          <?php endif ?>

          <?php $sumadoresItems=0;?>

          <?php for($z=$contadorRelativo;$z<count($data3);$z++): ?>

            <?php if ($data4[$z]==$data1[$i]): ?>

              <?php $data5=array();?>
              <?php $data6=array();?>
              <?php $data7=array();?>
              <?php $data8=array();?>
              <?php $data15=array();?>
              
              <?php $queryVector="SELECT a.campos,a.identificador,c.idItem,c.itemNombres,(SELECT montos FROM pro_componentesciudadanosmontos AS a1 WHERE a1.idComponentesCiudadanos=a.idComponentesCiudadanos) AS montosIniciales FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS c ON c.idItem=a.idItemComponente INNER JOIN pro_componentes AS b ON b.idComponentes=c.componenteSeleccion WHERE a.codigo='$codigoProyectoPdf' AND a.idItemComponente='$data3[$contadorRelativo]';"?>

              <?php $resultadoVector = $conexionEstablecida->query($queryVector);?>

              <?php while($registroVector = $resultadoVector->fetch()){?>

                <?php $campos=$registroVector['campos'];?>
                <?php array_push($data5, $campos);?>

                <?php $identificador=$registroVector['identificador'];?>
                <?php array_push($data6, $identificador);?>

                <?php $idItem=$registroVector['idItem'];?>
                <?php array_push($data7, $idItem);?>

                <?php $itemNombres=$registroVector['itemNombres'];?>
                <?php array_push($data8, $itemNombres);?>

                <?php $montosIniciales=$registroVector['montosIniciales'];?>
                <?php array_push($data15, $montosIniciales);?>

              <?php }?> 

              <?php $sumadoresItems=0;?>

              <?php for ($m=0;$m<count($data5);$m++): ?>

                <?php $arrayCamposEditables = explode("/../", $data5[$m]);?>
                <?php $arrayMontosIniciales= explode("/../", $data15[$m]);?>

                <?php if ($data6[$m]=="h"): ?>

                <thead>

                  <tr>

                  <?php if (count($fechasArray) == 4): ?>

                    <th class="nombre__apartados__secundarios" align="left" colspan="<?=$asignador+4?>">
                      
                      <?= $data8[$m]?>

                    </th>

                  <?php else: ?>

                    <th colspan="<?=($diferencias+3)?>">
                      <?= $data8[$m]?>
                    </th>

                  <?php endif ?>

                  </tr>

                </thead>

                <?php endif ?>

                <?php if ($data6[$m]=="b"): ?>

                <tbody>

                  <tr>

                  <?php foreach ($arrayCamposEditables as $clave3 => $valor3): ?>

                      <?php if ($clave3<=2): ?>

                        <td><?=$valor3?></td>
                        
                      <?php endif ?>

                  <?php endforeach ?>

                  <?php $sumadorCantidades=0;?>

                  <?php foreach ($arrayMontosIniciales as $clave7 => $valor7): ?>

                    <?php $arrayMontosDestinadosAnios= explode("___", $valor7);?>

                    <?php $evaluadorMes=substr($arrayMontosDestinadosAnios[0], 0, -4);?>

                    <?php $anioObtenidos = substr($arrayMontosDestinadosAnios[0], -4);?>

                    <?php if ($arregloAnios1[0]==$anioObtenidos): ?>

                      <td>
                        <center>
                            <?=$arrayMontosDestinadosAnios[1]?>
                        </center>
                      </td>

                      <?php $sumadorCantidades=$sumadorCantidades + floatval($arrayMontosDestinadosAnios[1]);?>
                      
                    <?php endif ?>

                  <?php endforeach ?>

                    <td>
                      <center>
                        <?=number_format(floatval($sumadorCantidades),2, '.', '')?>

                        <?php $sumadoresItems=$sumadorCantidades+$sumadoresItems;?>

                      </center>
                    </td>

                  </tr>

                </tbody>

                <?php endif ?>

                <?php  $bandera=1;?>

              <?php endfor?> 

              <?php $contadorRelativo++;?>

            <?php else: ?>

              <?php $bandera=0;?>

              <?php $data5=array();?>
              <?php $data6=array();?>
              <?php $data7=array();?>
              <?php $data8=array();?>

              <?php break;?>
              
            <?php endif ?>

            <tr>

              <?php if (count($fechasArray) == 4): ?>

                    <td class="nombre__apartados__secundarios" align="left" colspan="<?=$asignador+3?>" style="background-color:black!important; color:white!important;">
                      
                    <center>
                      Total Item
                    </center>


                    </td>

              <?php else: ?>

                    <td class="nombre__apartados__secundarios" align="left" colspan="<?=($diferencias+2)?>" style="background-color:black!important; color:white!important;">
                      
                    <center>
                      Total Item
                    </center>

                    </td>

              <?php endif ?>

              <td style="font-weight: bold; color:white; background-color:gray;">

                <center>

                  <?=number_format(floatval($sumadoresItems),2, '.', '')?>
                  <?php $sumandoComponentes=$sumandoComponentes+$sumadoresItems;?>

                </center>
                    
              </td>

            </tr>

          <?php endfor?> 

        <?php endfor?> 

      </tbody>

      <tfoot>

        <tr  style="background-color: gray!important; color:white!important;">

          <th colspan="3" class="enfacis__celdas padding__celdas__dos" style="font-size: 14px!important; font-weight:bold!important;">

            <center>

              Presupuesto total requerido: 

            </center>

          </th>

          <?php $sumadoresTotalicimos=0;?>

          <?php if (count($fechasArray) == 4): ?>

            <?php for($i=1;$i<=$asignador;$i++): ?>  

              <th class="enfacis__celdas padding__celdas__dos">

                <center>

                <?php $mesesA=meses($i);?>

                <?php $sumasColumnas=sumadorCompoonentesFooters($codigoProyectoPdf,$arrayConvertidosSumador1[0],$mesesA)?>

                <?php $sumadoresTotalicimos=$sumadoresTotalicimos+$sumasColumnas;?>

                <?=number_format(floatval($sumasColumnas),2, '.', '')?>

                </center>

              </th>

            <?php endfor?> 

          <?php else: ?>

            <?php for($i=$asignador;$i<=12;$i++): ?>  

              <th class="enfacis__celdas padding__celdas__dos">

                <center>

                <?php $mesesA=meses($i);?>

                <?php $sumasColumnas=sumadorCompoonentesFooters($codigoProyectoPdf,$arrayConvertidosSumador1[0],$mesesA)?>

                <?php $sumadoresTotalicimos=$sumadoresTotalicimos+$sumasColumnas;?>

                <?=number_format(floatval($sumasColumnas),2, '.', '')?>

                </center>

              </th>

            <?php endfor?> 

          <?php endif ?>

          <td style="font-weight:bold!important; color:white!important; font-size: 14px!important;">

            <center>

            <?=number_format(floatval($sumadoresTotalicimos),2, '.', '')?>

            </center>

          </td>

        </tr>

      </tfoot>

    </table>

  <?php endif ?>  
     
  
  <!--====  End of Cuarta sección  ====-->
  

 </div>

<?php

// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once '../../dompdf/autoload.inc.php';

// llamar libreria dompdf
use Dompdf\Dompdf;

// Instanciamos un objeto de la clase DOMPDF.
$pdfSegunderos = new DOMPDF();
 
// Definimos el tamaño y orientación del papel que queremos.h
$pdfSegunderos->setPaper('A3', 'landscape');
//$pdf->set_paper(array(0,0,104,250));
 
// Cargamos el contenido HTML.
$pdfSegunderos->load_html(ob_get_clean());
 
// Renderizamos el documento PDF.
$pdfSegunderos->render();


$canvasSegunderos = $pdfSegunderos->get_canvas(); 
$canvasSegunderos->page_text(52, 32, "Página {PAGE_NUM} de {PAGE_COUNT}","helvetica", 8, array(0,0,0)); //header//header
$canvasSegunderos->page_text(52, 778, "Código de Programa/Proyecto: ".$codigoProyectoPdf, "helvetica", 8, array(0,0,0)); //footer

   
// obtener el valor generado
$pdfGeneeradoSegunderosPdf= $pdfSegunderos->output();


$variable=$cedulaRuc."-".$codigoProyectoPdf;

$documentoProyectoSegunderosPdf = fopen("../../documentos/anexosComponentes/".$variable.".pdf","a");

fwrite($documentoProyectoSegunderosPdf,$pdfGeneeradoSegunderosPdf);


?>