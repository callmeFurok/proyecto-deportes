<?php

	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	class componentes{

		public static function componenteFuncion(){

		  	$conexionRecuperada= new conexion();
 			$conexionEstablecida=$conexionRecuperada->cConexion();	

 			extract($_POST);

	 		$query="SELECT idItem,itemNombres FROM pro_itemscomponentes WHERE componenteSeleccion='$componente';";
			$resultado = $conexionEstablecida->query($query);

			$listas="<option value=''>--Elige un item--</option>";

			while($registro = $resultado->fetch()) {
			 	
			 	$listas.="<option value='".$registro["idItem"]."'>".utf8_decode(utf8_encode($registro["itemNombres"]))."</option>";

			}

			return $listas;

 			
		}

	}


	echo componentes::componenteFuncion();

