
<?php
   
   extract($_POST);


   require_once "../../conexion/conexion.php";

   $conexionRecuperada= new conexion();
   $conexionEstablecida=$conexionRecuperada->cConexion();

   $array=array();

	$query="SELECT tipoTramite FROM pro_infraselects WHERE codigo='$codigoProyectoPdf';";
	$resultado = $conexionEstablecida->query($query);		

	while($registro2 = $resultado->fetch()) {

		$tipoTramite=$registro2['tipoTramite'];
		array_push($array, $tipoTramite);
			
	}



	/*==========================================
	=            Llamar estructuras            =
	==========================================*/
		
	for ($i=0; $i < count($array); $i++) { 

		if ($array[$i]=="altoRendimiento" || $array[$i]=="altoRendimientoDiscapacidad"  || $array[$i]=="profesional"  || $array[$i]=="formativo" || $array[$i]=="estudiantil" || $array[$i]=="recreativo") {

	    	$consulta="Técnico";

	    	break;

		}else{

	    	$consulta="no";

		}

	}


	for ($i=0; $i < count($array); $i++) { 

		if ($array[$i]=="infra") {

	     	$consulta1="Infraestructura";

	     	break;

		}else{

	     	$consulta1="no";

		}
	}


	for ($i=0; $i < count($array); $i++) { 

		if ($array[$i]=="infraTeconlogicos") {

	     	$consulta2="Tecnológico";
	     	break;

		}else{

	     	$consulta2="no";

		}

	 }
		
	/*=====  End of Llamar estructuras  ======*/
		

	require_once "../../controladores/controladorPlantilla/plantilla.controlador.php";
	$plantilla= new plantilla();

?>


<?php  $plantilla->componentesPdf(13);?>

<?php  $plantilla->componentesPdf(20);?>

<?php if ($consulta1=="Infraestructura"): ?>
	
	<?php  $plantilla->componentesPdf(14);?>

	<?php  $plantilla->componentesPdf(21);?>

<?php endif ?>


      




