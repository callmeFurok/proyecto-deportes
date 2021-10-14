<?php
   

   extract($_POST);

   require_once "../../conexion/conexion.php";

   $conexionRecuperada= new conexion();
   $conexionEstablecida=$conexionRecuperada->cConexion();

   $array=array();

   $data9=array();

   $query="SELECT presupuestoLetras,presupuesto,presupuestoLetras2,presupuesto2,presupuestoLetras3,presupuesto3,mensajePlurianual,presupuestoCuatro,presupuestoLetrasCuatro,inicioPeriodos FROM pro_proyetosreferencias WHERE codigoProyecto='$codigoProyectoPdf' ORDER BY idProyectoReferencias DESC LIMIT 1;";
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

   $query4="SELECT b.idComponentes,b.nombreComponentes FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS c ON c.idItem=a.idItemComponente INNER JOIN pro_componentes AS b ON b.idComponentes=c.componenteSeleccion WHERE a.codigo='$codigoProyectoPdf' GROUP BY b.idComponentes;";
   $resultado4 = $conexionEstablecida->query($query4);      

   while($registro4 = $resultado4->fetch()) {

      $idComponentes=$registro4['idComponentes'];
      array_push($data1, $idComponentes);


      $nombreComponentes=$registro4['nombreComponentes'];
      array_push($data2, $nombreComponentes);

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

<!--=======================================
=              Sección Css              =
========================================-->

<link href="../../layout/styles/css/estilosPdf.css?v=1.0.0" rel="stylesheet" type="text/css" media="all">

<!--====  End of  Sección Css  ====-->


 <div class="margen__borde">

  <table class="tabla__bordada__2">

    <tr>
      <td class="nombre__apartados__secundarios" align="left">
        4.2&nbsp;&nbsp;&nbsp;&nbsp;DETALLE (ANEXO)
      </td>
    </tr>

  </table>

  <?php if ($resultadoRestas==0 || $resultadoRestas==1 || $resultadoRestas==2 || $resultadoRestas==3): ?>  

  <?php for($i=0;$i<count($data1);$i++): ?>

    <table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias">

      <tr>
        <td class="nombre__apartados__secundarios" align="left">
          4.2.<?=($i+1)?>&nbsp;&nbsp;&nbsp;&nbsp;<?=$data2[$i]?>
        </td>
      </tr>

    </table>

    <br>

    <!--============================================
    =            Cuerpo del componentes            =
    =============================================-->
    
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


        <table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias">

        <?php for ($m=0;$m<count($data5);$m++): ?>

          <?php $arrayCamposEditables = explode("/../", $data5[$m]);?>
          <?php $arrayMontosIniciales= explode("/../", $data15[$m]);?>

          <?php if ($data6[$m]=="h"): ?>

          <thead>

            <tr>

              <th colspan="<?= (count($arrayCamposEditables)-2)?>"><center><?= $data8[$m]?></center></th>

            </tr>

            <tr>
              
            <?php foreach ($arrayCamposEditables as $clave2 => $valor2): ?>

              <?php if ($valor2!="Acciones" && $valor2!="N."): ?>
                  
                <th class="enfacis__celdas padding__celdas__dos"><center><?=$valor2?></center></th>

              <?php endif ?>

            <?php endforeach ?>


            <?php foreach ($arrayMontosIniciales as $clave7 => $valor7): ?>

              <?php $arrayMontosDestinadosAnios= explode("___", $valor7);?>

              <?php $evaluadorMes=substr($arrayMontosDestinadosAnios[0], 0, -4);?>

              <?php $anioObtenidos = substr($arrayMontosDestinadosAnios[0], -4);?>

              <td><center><?=$evaluadorMes."___".$anioObtenidos?></center></td>

            <?php endforeach ?>


            </tr>

          </thead>

          <?php endif ?>


          <?php if ($data6[$m]=="b"): ?>

          <tbody>

            <tr>

            <?php foreach ($arrayCamposEditables as $clave3 => $valor3): ?>

                <td><center><?=$valor3?></center></td>

            <?php endforeach ?>


            <?php foreach ($arrayMontosIniciales as $clave7 => $valor7): ?>

              <?php $arrayMontosDestinados= explode("___", $valor7);?>

              <td><center><?=$arrayMontosDestinados[1]?></center></td>

            <?php endforeach ?>

            </tr>

          </tbody>

          <?php endif ?>

          <?php  $bandera=1;?>

        <?php endfor ?>

        </table>

        <?php $contadorRelativo++;?>

      <?php else: ?>

        <?php $bandera=0;?>

        <?php $data5=array();?>
        <?php $data6=array();?>
        <?php $data7=array();?>
        <?php $data8=array();?>

        <?php break;?>
        
      <?php endif ?>

    <?php endfor?>    
    
    <!--====  End of Cuerpo del componentes  ====-->
    
  <?php endfor?>

  <?php endif ?>  

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