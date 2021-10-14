
<?php extract($_POST);?>
<?php require_once "../../conexion/conexion.php";?>
<?php $conexionRecuperada= new conexion();?>
<?php $conexionEstablecida=$conexionRecuperada->cConexion();?>
<?php ob_start();?>
<?php require_once "../../controladores/controladorPlantilla/plantilla.controlador.php";?>
<?php $plantilla= new plantilla();?>


<html>

   <head>

      <link href="../../layout/styles/css/estilosPdf.css" rel="stylesheet" type="text/css" media="all">

   </head>

   <body>

    <!--============================
    =            Header            =
    =============================-->
<!--     
    <div id="header">

       <img src="../../images/logotipo.png" />

     </div> -->
    
    <!--====  End of Header  ====-->
    
     <div id="content">

      <?php $plantilla->componentesPdf(26);?>

     </div>

     <!--============================
     =            Footer            =
     =============================-->
<!--      
      <div id="footer">

       <img src="../../images/footer.png"/>

     </div>     -->
     
     <!--====  End of Footer  ====-->
     


   </body>

</html>  

<?php

   // Cargamos la librería dompdf que hemos instalado en la carpeta gdompdfd
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

    if($identificadorImpactos=="id"){

       $control = fopen("../../documentos/informesCalificacion/".$codigoProyectoPdfInformeViavilidad."ID".".pdf","a");

    }else if($identificadorImpactos=="i"){

       $control = fopen("../../documentos/informesCalificacion/".$codigoProyectoPdfInformeViavilidad."I".".pdf","a");

    }else if($identificadorImpactos=="d"){

       $control = fopen("../../documentos/informesCalificacion/".$codigoProyectoPdfInformeViavilidad."__D".".pdf","a");

    }else if($identificadorImpactos=="cd"){

      $control = fopen("../../documentos/informesCalificacion/".$codigoProyectoPdfInformeViavilidad."__CD".".pdf","a");

    }else if ($identificadorImpactos=="c") {
      $control = fopen("../../documentos/informesCalificacion/".$codigoProyectoPdfInformeViavilidad."__C".".pdf","a");
    }else{
      $control = fopen("../../documentos/informesCalificacion/".$codigoProyectoPdfInformeViavilidad.".pdf","a");
    }
        

    fwrite($control,$pdfGeneerado);

    $pdf->stream('informeTecnicoViabilidad.pdf');

?>