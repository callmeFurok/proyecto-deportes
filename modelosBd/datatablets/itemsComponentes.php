<?php
	require_once "../../conexion/conexion.php";

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();


 	extract($_POST);


	$query="SELECT a.idItem,a.itemNombres,b.nombreComponentes, GROUP_CONCAT(' ',c.argumentosNombres) AS numero, c.tipoArgumento FROM pro_itemscomponentes AS a INNER JOIN pro_componentes AS b ON a.componenteSeleccion=b.idComponentes INNER JOIN pro_itemsargumentos AS c ON c.idItem=a.idItem GROUP BY a.idItem;";

	$resultado = $conexionEstablecida->query($query);

	if (!$resultado) {
		echo "error";
	}else{ 
		$arreglo=array();
		while($data=$resultado->fetch()){
			$arreglo["data"][]=$data;
		}
		echo json_encode($arreglo);
	}

 