
<?php
   
   extract($_POST);

   require_once "../../conexion/conexion.php";

   $conexionRecuperada= new conexion();
   $conexionEstablecida=$conexionRecuperada->cConexion();

   $variable=$codigoProyecto;

   $tipo = $_FILES['informeViavilidad']['type']; 
   $archivotmp = $_FILES['informeViavilidad']['tmp_name'];

   $destino="../../documentos/informesCalificacion/";

   rename($archivotmp,"$destino/$codigoProyecto.pdf");


   if($identificadorImpactos=="i"){

      $query="UPDATE pro_proyecto SET seguimientosTecnicos='A' WHERE codigo='$codigoProyecto';";
      $resultado= $conexionEstablecida->exec($query);


   }else if($identificadorImpactos=="c"){

      $query="UPDATE pro_proyecto SET recomiendaCertificacion='A' WHERE codigo='$codigoProyecto';";
      $resultado= $conexionEstablecida->exec($query);


   }else{

      $query="UPDATE pro_documentos SET recomiendaCalificacion='A' WHERE codigo='$codigoProyecto';";
      $resultado= $conexionEstablecida->exec($query);


   }

   $mensaje=1;
	$jason['mensaje']=$mensaje;
	echo json_encode($jason);