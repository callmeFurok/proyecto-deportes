<?php

	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	class componentes{

		public static function componenteFuncion(){
			
		  	$conexionRecuperada= new conexion();
 			$conexionEstablecida=$conexionRecuperada->cConexion();	


	 		$query="SELECT idComponentes,nombreComponentes FROM pro_componentes WHERE estado='A';";
			$resultado = $conexionEstablecida->query($query);

			$listas="<option value=''>--Elige un componente--</option>";

			while($registro = $resultado->fetch()) {
			 	
			 	$listas.="<option value='".$registro["idComponentes"]."'>".utf8_decode(utf8_encode($registro["nombreComponentes"]))."</option>";

			}

			return $listas;

 			
		}

	}


	echo componentes::componenteFuncion();

