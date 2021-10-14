
<?php
   
   extract($_POST);

   require_once "../../conexion/conexion.php";

   $conexionRecuperada= new conexion();
   $conexionEstablecida=$conexionRecuperada->cConexion();

	require_once "../../controladores/controladorPlantilla/plantilla.controlador.php";
	$plantilla= new plantilla();
	ob_start(); 

?>

<html>

   <head>

      <link href="../../layout/styles/css/estilosPdf.css" rel="stylesheet" type="text/css" media="all">

   </head>

   <body>

     <div id="header">

       <img src="../../images/logotipo.png" />

     </div>

     <div id="footer">

       <img src="../../images/footer.png"/>

     </div>

     <div id="content">

      <?php $plantilla->componentesPdf(27);?>

     </div>

   </body>

</html>  

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
  $canvas->page_text(510, 12, "Página {PAGE_NUM} de {PAGE_COUNT}","helvetica", 8, array(0,0,0)); //header//header
  $canvas->page_text(54, 778, "", "helvetica", 8, array(0,0,0)); //footer
          
  // obtener el valor generado
  $pdfGeneerado= $pdf->output();

  $control = fopen("../../documentos/certificadosResueltos/".$codgioProyectoDocumentosCertificas.".pdf","a");

  fwrite($control,$pdfGeneerado);

  $pdf->stream('certificacion.pdf');

