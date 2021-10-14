
<?php
   
   extract($_POST);

   require_once "../../conexion/conexion.php";

   $conexionRecuperada= new conexion();
   $conexionEstablecida=$conexionRecuperada->cConexion();

   require_once "../../controladores/controladorPlantilla/plantilla.controlador.php";
   $plantilla= new plantilla();
   ob_start(); 
?>

<?php $plantilla->componentesPdf(15);?>

<?php $plantilla->componentesPdf(16);?>

<?php $plantilla->componentesPdf(17);?>

<?php $plantilla->componentesPdf(18);?>


<?php

// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once '../../dompdf/autoload.inc.php';

// llamar libreria dompdf
use Dompdf\Dompdf;

// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();
 
// Definimos el tamaño y orientación del papel que queremos.h
// $pdf->setPaper('A3', 'landscape');

$pdf->set_paper("letter", "A4");
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

$documentoProyecto = fopen("../../documentos/proyectosInfraestructura/".$variable.".pdf","a");

fwrite($documentoProyecto,$pdfGeneerado);


?>