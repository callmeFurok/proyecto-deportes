<?php

	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	class componentes{

		public static function componenteFuncion(){
			
		  	$conexionRecuperada= new conexion();
 			$conexionEstablecida=$conexionRecuperada->cConexion();	


 			extract($_POST);

 			$array = explode("____", $instancias);

			for ($i=0; $i < count($array); $i++) { 

				if ($array[$i]=="altoRendimiento" || $array[$i]=="altoRendimientoDiscapacidad"  || $array[$i]=="profesional"  || $array[$i]=="formativo" || $array[$i]=="estudiantil" || $array[$i]=="recreativo") {

					$consulta="tipoComponente='tecnico'";

					break;

				}else{

					$consulta=false;

				}
			}

			for ($i=0; $i < count($array); $i++) { 

				if ($array[$i]=="infra") {

					$consulta1="tipoComponente='infraestructura'";

					break;

				}else{

					$consulta1=false;

				}
			}

			for ($i=0; $i < count($array); $i++) { 

				if ($array[$i]=="infraTeconlogicos") {

					$consulta2="tipoComponente='tecnologico'";

					break;

				}else{

					$consulta2=false;

				}
			}


 			if ($consulta!=false && $consulta1==false && $consulta2==false) {
 				
 				$queryRealizables=" AND ".$consulta;

 			}else if($consulta==false && $consulta1!=false && $consulta2==false){

 				$queryRealizables=" AND ".$consulta1;

 			}else if($consulta==false && $consulta1==false && $consulta2!=false){

 				$queryRealizables=" AND ".$consulta2;

 			}else if($consulta!=false && $consulta1!=false && $consulta2==false){

 				$queryRealizables=" AND (".$consulta." OR ".$consulta1.")";


 			}else if($consulta!=false && $consulta1==false && $consulta2!=false){

 				$queryRealizables=" AND (".$consulta." OR ".$consulta2.")";

 			}else if($consulta==false && $consulta1!=false && $consulta2!=false){

 				$queryRealizables=" AND (".$consulta1." OR ".$consulta2.")";

 			}else if($consulta!=false && $consulta1!=false && $consulta2!=false){

 				$queryRealizables=" AND (".$consulta." OR ".$consulta1." OR ".$consulta2.")";

 			}

		 	$query2="SELECT a.idComponentesCiudadanos FROM pro_componentesciudadanos AS a INNER JOIN pro_itemscomponentes AS b ON a.idItemComponente=b.idItem INNER JOIN pro_componentes AS c ON c.idComponentes=b.componenteSeleccion WHERE (c.tipoComponente='tecnico' OR c.tipoComponente='tecnologico' OR a.idComponentesCiudadanos='28')  AND a.codigo='$codigoProyecto' LIMIT 1;";
			$resultado2 = $conexionEstablecida->query($query2);


			while($registro2 = $resultado2->fetch()) {

				$idComponentesCiudadanos=$registro2['idComponentesCiudadanos'];

			}

		 	$query25="SELECT idInfrasCronograma FROM pro_cronograma WHERE codigo='$codigoProyecto';";
			$resultado25 = $conexionEstablecida->query($query25);


			while($registro25 = $resultado25->fetch()) {

				$idInfrasCronograma=$registro25['idInfrasCronograma'];

			}


 			$tecnicos=0;
 			$infras=0;
 			$tecnologicos=0;

	 		$query="SELECT idComponentes,nombreComponentes,tipoComponente FROM pro_componentes WHERE estado='A' $queryRealizables ORDER BY orden ASC;";
			$resultado = $conexionEstablecida->query($query);

			$listas="<option value=''>--Elige un componente--</option>";

			while($registro = $resultado->fetch()) {

				if ($tecnicos==0 && $registro["tipoComponente"]=="tecnico") {

					$listas.="<optgroup label='Componentes técnicos' style='font-weight:bold; text-align:center;'>";

					$tecnicos=1;

				}
			 	
				if ($infras==0 && $registro["tipoComponente"]=="infraestructura") {

					$listas.="<optgroup label='Componentes infraestructura' style='font-weight:bold; text-align:center;'>";

					$infras=1;

				}

				if ($tecnologicos==0 && $registro["tipoComponente"]=="tecnologico") {

					$listas.="<optgroup label='Componentes tecnológicos' style='font-weight:bold; text-align:center;'>";

					$tecnologicos=1;

				}

				// if(!empty($idInfrasCronograma) &&  $registro["idComponentes"]==28){



				// }else 

				if (empty($idComponentesCiudadanos) && $registro["idComponentes"]==30) {
	

				}else if(empty($idComponentesCiudadanos) && $registro["idComponentes"]==37){



				}else{

					$listas.="<option value='".$registro["idComponentes"]."'>".utf8_decode(utf8_encode($registro["nombreComponentes"]))."</option>";

				}


			}

			return $listas;

 			
		}

	}


	echo componentes::componenteFuncion();

