<?php

	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';


	extract($_POST);


	date_default_timezone_set("America/Guayaquil");

	$fecha_actual = date('Y-m-d');
	$hora_actual= date('H:i:s');
			
	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

 	/*========================================
 	=            Eliminar previos            =
 	========================================*/
 	
 	$query2="DELETE FROM pro_infraselects WHERE codigo='$codigoCreacion';";
	$resultado2= $conexionEstablecida->exec($query2);	
 	
 	/*=====  End of Eliminar previos  ======*/
 	

 	$obtencionSectores = json_decode($obtencionSectores);

 	$contador=count($obtencionSectores);

 	for($i=0;$i<$contador;$i++){

	 	if ($obtencionSectores[$i]=="Componentes de Infraestructura" || $obtencionSectores[$i]=="Componentes Tecnologicos") {
	 		$infraValor="A";
	 	}else{
	 		$infraValor="T";
	 	}

	 	if($obtencionSectores[$i]=="Alto rendimiento"){

	 		$tramiteObtenidos="altoRendimiento";

	 	}else if($obtencionSectores[$i]=="Alto rendimiento para personas con discapacidad"){

	 		$tramiteObtenidos="altoRendimientoDiscapacidad";

	 	}else if($obtencionSectores[$i]=="Deporte Profesional"){

	 		$tramiteObtenidos="profesional";

	 	}else if($obtencionSectores[$i]=="Deporte Formativo"){

	 		$tramiteObtenidos="formativo";

	 	}else if($obtencionSectores[$i]=="Educación Física"){

	 		$tramiteObtenidos="estudiantil";

	 	}else if($obtencionSectores[$i]=="Recreación"){

	 		$tramiteObtenidos="recreativo";

	 	}else if($obtencionSectores[$i]=="Componentes de Infraestructura"){

	 		$tramiteObtenidos="infra";

	 	}else if($obtencionSectores[$i]=="Componentes Tecnologicos"){

	 		$tramiteObtenidos="infraTeconlogicos";

	 	}


		$query="INSERT INTO `ezonshar2`.`pro_infraselects` (`idProyectoSeleccionas`, `infras`, `codigo`, `tipoTramite`, `fecha`, `hora`) VALUES (NULL, '$infraValor', '$codigoCreacion', '$tramiteObtenidos','$fecha_actual','$hora_actual');";
		$resultado= $conexionEstablecida->exec($query);	

 	}


	$mensaje=1;
	$jason['mensaje']=$mensaje;
	echo json_encode($jason);
