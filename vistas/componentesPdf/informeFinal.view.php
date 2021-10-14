
<?php
   
   extract($_POST);

   require_once "../../conexion/conexion.php";

   $conexionRecuperada= new conexion();
   $conexionEstablecida=$conexionRecuperada->cConexion();

   require_once "../../controladores/controladorPlantilla/plantilla.controlador.php";
   $plantilla= new plantilla();

   ob_start(); 
?>

<?php $plantilla->componentesPdf(23);?>
<?php $plantilla->componentesPdf(2);?>
<?php $plantilla->componentesPdf(3);?>
<?php $plantilla->componentesPdf(4);?>
<?php $plantilla->componentesPdf(5);?>
<?php $plantilla->componentesPdf(7);?>
<?php $plantilla->componentesPdf(12);?>
<?php $plantilla->componentesPdf(8);?>
<?php $plantilla->componentesPdf(24);?>

<?php

// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once '../../dompdf/autoload.inc.php';

// llamar libreria dompdf
use Dompdf\Dompdf;

// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();
 
// Definimos el tamaño y orientación del papel que queremos.h
$pdf->set_paper("letter", "A4");
//$pdf->set_paper(array(0,0,104,250));
 
// Cargamos el contenido HTML.
$pdf->load_html(ob_get_clean());
 
// Renderizamos el documento PDF.
$pdf->render();


$canvas = $pdf->get_canvas(); 
$canvas->page_text(510, 32, "Página {PAGE_NUM} de {PAGE_COUNT}","helvetica", 8, array(0,0,0)); //header//header
$canvas->page_text(54, 778, "SU-RE-FO-02 - Ministerio del Deporte", "helvetica", 8, array(0,0,0)); //footer
   
// obtener el valor generado
$pdfGeneerado= $pdf->output();

$pdf->stream('informeFinal.pdf');


$variable=$cedulaRuc."-".$codigoProyectoPdf;

$query="UPDATE pro_documentos SET informeFinal='$variable' WHERE codigo='$codigoProyectoPdf';";

$resultado= $conexionEstablecida->exec($query);


$documentoProyecto = fopen("../../documentos/informeFinal/".$variable.".pdf","a");

fwrite($documentoProyecto,$pdfGeneerado);

?>