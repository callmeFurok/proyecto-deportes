<?php
   
  extract($_POST);

  require_once "../../conexion/conexion.php";

  $conexionRecuperada= new conexion();
  $conexionEstablecida=$conexionRecuperada->cConexion();


 /*===================================
 =            Cronogramas            =
 ===================================*/
 
  /*==========================================
  =            Declaración arrays            =
  ==========================================*/
  
  $data1=array();
  $data2=array();
  $data3=array();
  $data4=array();
  $data5=array();
  $data6=array();
  $data7=array();
  $data8=array();
  $data9=array();
  $data10=array();
  $data11=array();
  $data12=array();
  $data13=array();

  /*=====  End of Declaración arrays  ======*/
  
  $conexionRecuperada= new conexion();
  $conexionEstablecida=$conexionRecuperada->cConexion();  

  $query="SELECT numero__conjunto,descripcion__conjunto,unidad__conjunto,cantidad__conjunto,precioUnitario__conjunto,subtotal__conjunto,codigo,elementosResultantes,medicion__conjunto,formasDePago__conjunto,valorPreferencialConjunto,idInfrasCronograma FROM pro_cronograma WHERE codigo='$codigoProyectoPdf';";
  $resultado = $conexionEstablecida->query($query);


  while($registro = $resultado->fetch()) {

    $numero__conjunto=$registro['numero__conjunto'];
    array_push($data1, $numero__conjunto);

    $descripcion__conjunto=$registro['descripcion__conjunto'];
    array_push($data2, $descripcion__conjunto);

    $unidad__conjunto=$registro['unidad__conjunto'];
    array_push($data3, $unidad__conjunto);

    $cantidad__conjunto=$registro['cantidad__conjunto'];
    array_push($data4, $cantidad__conjunto);

    $precioUnitario__conjunto=$registro['precioUnitario__conjunto'];
    array_push($data5, $precioUnitario__conjunto);

    $subtotal__conjunto=$registro['subtotal__conjunto'];
    array_push($data6, $subtotal__conjunto);

    $elementosResultantes=$registro['elementosResultantes'];
    array_push($data7, $elementosResultantes);

    $medicion__conjunto=$registro['medicion__conjunto'];
    array_push($data8, $medicion__conjunto);

    $formasDePago__conjunto=$registro['formasDePago__conjunto'];
    array_push($data9, $formasDePago__conjunto);

    $valorPreferencialConjunto=$registro['valorPreferencialConjunto'];
    array_push($data10, $valorPreferencialConjunto);

    $idInfrasCronograma=$registro['idInfrasCronograma'];
    array_push($data11, $idInfrasCronograma);

  }
 
 /*=====  End of Cronogramas  ======*/

  $arrayContadores = explode(",", $data7[0]);

  $aux=0;

  $arrayComprometidosDos=array();

  for ($i=0; $i < count($data7); $i++) { 

    $arrayComprometidos=explode(",", $data7[$i]);

    array_push($arrayComprometidosDos, implode(",", $arrayComprometidos));

    if ($aux<count($arrayComprometidos)) {
    
      $aux=count($arrayComprometidos);

    }

  }

  ob_start(); 

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
        3.1.7&nbsp;&nbsp;&nbsp;&nbsp;CRONOGRAMA VALORADO DE EJECUCIÓN (Requisito Indispensable)
      </td>
    </tr>

  </table>

  <br>

  <table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias">

    <thead>

      <tr>
          
        <th><center>NÚMERO</center></th>
        <th><center>DESCRIPCIÓN DEL RUBRO</center></th>
        <th><center>UNIDAD</center></th>
        <th><center>CANTIDAD</center></th>
        <th><center>PRECIO UNITARIO</center></th>
        <th><center>SUBTOTAL</center></th>

        <?php for ($i=0;$i<count($aux);$i++): ?>
          
          <th><center>Mes <?=($i+1)?></center></th>

        <?php endfor ?>

      </tr>

    </thead>

    <tbody>

      <?php for ($i=0;$i<count($aux);$i++): ?>

      <tr>

        <?php if ($data2[$i]=="N/A"): ?>
          
          <th colspan="<?php echo (count($aux)+7);?>"><center><?=$data1[$i]?></center></th>

        <?php else: ?>
          
          <td><center><?=$data1[$i]?></center></td>
          <td><center><?=$data2[$i]?></center></td>
          <td><center><?=$data3[$i]?></center></td>
          <td><center><?=$data4[$i]?></center></td>
          <td><center><?=$data5[$i]?></center></td>
          <td><center><?=$data6[$i]?></center></td>
    
          <?php $dataAsignados = explode(",", $data7[$i]);?>

          <?php for ($z=0;$z<count($aux);$z++): ?>

            <td><center><?= $dataAsignados[$z]?></center></td>

          <?php endfor ?>

        <?php endif ?>
          

       </tr>

      <?php endfor ?>

    </tbody>

  </table>  

</div>

<?php

// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once '../../dompdf/autoload.inc.php';

// llamar libreria dompdf
use Dompdf\Dompdf;

// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();
 
// Definimos el tamaño y orientación del papel que queremos.h
$pdf->setPaper('A3', 'landscape');
//$pdf->set_paper(array(0,0,104,250));
 
// Cargamos el contenido HTML.
$pdf->load_html(ob_get_clean());
 
// Renderizamos el documento PDF.
$pdf->render();


$canvas = $pdf->get_canvas(); 
$canvas->page_text(52, 32, "Página {PAGE_NUM} de {PAGE_COUNT}","helvetica", 8, array(0,0,0)); //header//header
$canvas->page_text(52, 778, "Código de Programa/Proyecto: ".$codigoProyectoPdf, "helvetica", 8, array(0,0,0)); //footer

   
// obtener el valor generado
$pdfGeneerado= $pdf->output();


$variable=$cedulaRuc."-".$codigoProyectoPdf;

$documentoProyecto = fopen("../../documentos/cronograma/".$variable.".pdf","a");

fwrite($documentoProyecto,$pdfGeneerado);


?>