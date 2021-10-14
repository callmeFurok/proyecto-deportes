
<?php
   
   extract($_POST);

   require_once "../../conexion/conexion.php";

   $conexionRecuperada= new conexion();
   $conexionEstablecida=$conexionRecuperada->cConexion();

   $variable=$cedulaRuc."-".$codigoProyectoPdf;

   $tipo = $_FILES['documentoProyectos']['type']; 
   $archivotmp = $_FILES['documentoProyectos']['tmp_name'];

   if ($atributos=="tecnicos") {
      $destino="../../documentos/proyectos/";
   }else{
      $destino="../../documentos/proyectosInfraestructura/";
   }


   $query="UPDATE pro_documentos SET proyectoCargadoPdf='$variable' WHERE codigo='$codigoProyectoPdf';";
   $resultado= $conexionEstablecida->exec($query);

   rename($archivotmp,"$destino/$variable.pdf");


   $mensaje=1;
	$jason['mensaje']=$mensaje;
	echo json_encode($jason);