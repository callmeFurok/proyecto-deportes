<?php

	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	extract($_POST);


 	function getObtenerChofer(){

 		extract($_POST);

		$conexionRecuperada= new conexion();
	 	$conexionEstablecida=$conexionRecuperada->cConexion();

	 	$conexionEstablecida->exec("set names utf8");

	 	$query="SELECT a.id_usuario,a.nombre,a.apellido,d.descripcionFisicamenteEstructura AS descripcionFisicamenteEstructura FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_roles AS c ON c.id_rol=b.id_rol INNER JOIN th_fisicamenteestructura AS d ON a.fisicamenteEstructura=d.id_FisicamenteEstructura WHERE  b.id_rol='2' AND (d.id_FisicamenteEstructura='12' OR d.id_FisicamenteEstructura='13' OR d.id_FisicamenteEstructura='14' OR d.id_FisicamenteEstructura='19') AND a.estadoUsuario='A';";
	 	$resultado=$conexionEstablecida->query($query);

	 	$listas="<option value=''>-- Elige un Funcionario --</option>";

	 	while ($resultado2= $resultado->fetch())  {

 			$listas.="<option value='".$resultado2["id_usuario"]."'>".$resultado2["nombre"]." ".$resultado2["apellido"]." (".$resultado2["descripcionFisicamenteEstructura"].")</option>";

	 	}

	 	return $listas;


 	}

 	echo getObtenerChofer();



