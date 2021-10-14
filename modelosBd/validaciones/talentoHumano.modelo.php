<?php

	require_once "../../conexion/conexion.php";

 	function getObtenerChofer(){

 		extract($_POST);

		$conexionRecuperada= new conexion();
	 	$conexionEstablecida=$conexionRecuperada->cConexion();

	 	$conexionEstablecida->exec("set names utf8");

	 	$query="SELECT a.id_usuario,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.nombre, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Í'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),'','') AS nombre,REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(a.apellido, 'Ã¡', 'á'),'Ã©','é'),'Ã­','í'),'Ã³','ó'),'Ãº','ú'),'Ã‰','É'),'ÃŒ','Í'),'Ã“','Ó'),'Ãš','Ú'),'Ã±','ñ'),'Ã‘','Ñ'),'&#039;',' ` '),'Ã','Á'),'',' '),'Ã','Í'),'SI','SI'),'â€œ',''),'â€',''),'Á²','ó'),'','') AS apellido,a.cedula FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario WHERE b.id_rol_viatico!=8 AND b.id_rol_viatico!=9;";
	 	$resultado=$conexionEstablecida->query($query);

	 	$listas="<option value='0'>-- Elige un un usuario --</option>";

	 	while ($resultado2= $resultado->fetch())  {

 			$listas.="<option value='".$resultado2["id_usuario"]."'>".$resultado2["nombre"]." ".$resultado2["apellido"]."</option>";

	 	}

	 	return $listas;


 	}

 	echo getObtenerChofer();