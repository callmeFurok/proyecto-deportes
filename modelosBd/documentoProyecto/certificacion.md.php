
<?php
   
   extract($_POST);

   require_once "../../conexion/conexion.php";

   $conexionRecuperada= new conexion();
   $conexionEstablecida=$conexionRecuperada->cConexion();

	require_once "../../controladores/controladorPlantilla/plantilla.controlador.php";
	$plantilla= new plantilla();
	ob_start(); 

	require_once "../../Swift/lib/swift_required.php";


	date_default_timezone_set("America/Guayaquil");

	$fecha_actual = date('Y-m-d');
	$hora_actual= date('H:i:s');

	$query="UPDATE pro_proyecto SET certifica='A',fechaCertifica='$fecha_actual',horaCertifica='$hora_actual' WHERE codigo='$codigoProyecto';";
	$resultado= $conexionEstablecida->exec($query);		


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

      <h1><?= $nombreProyecto;?></h1></div>

     </div>

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

  $control = fopen("../../documentos/certificacion/".$codigoProyecto.".pdf","a");

  fwrite($control,$pdfGeneerado);

  $pdf->stream('certificacion.pdf');


	/*======================================================
	=            Enviar correo desde php mailer            =
	======================================================*/

	$from=$emailFuncionarios;

	$transport = Swift_SmtpTransport::newInstance('mail.deporte.gob.ec',465,'ssl');

	$transport->setUsername('soporte@deporte.gob.ec');

	$transport->setPassword('Deporte/1122');	
																	
	$message = Swift_Message::newInstance();
																
	$message->setTo($emavilEnviados);


	$body="<head><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><title>SECRETARÍA DEL DEPORTE</title><style type='text/css'>body {background:#EEE; padding:30px; font-size:12px;}</style></head><body><span style='font-weight:bold; font-style: oblique;'>Estimado/a,</span><br><br><span style='font-weight:bold;'>El certificado para el <span style='font-weight:bold;'>$nombreProyecto fue emitido</span><br><br><br><br><span style='font-weight:bold;'>Saludos cordiales.</span></body></html></head>";

	$message->setSubject('ACERPRO NOTIFICACIÓN DE CERTIFICACIÓN');

	$message->setBody($body);

	$message->setContentType('text/html');

	$message->setFrom(array($from => 'ACERPRO NOTIFICACIÓN DE CERTIFICACIÓN'));

	$mailer = Swift_Mailer::newInstance($transport);

	$mailer->send($message);


	/*======  End of Enviar correo desde php mailer  ======*/