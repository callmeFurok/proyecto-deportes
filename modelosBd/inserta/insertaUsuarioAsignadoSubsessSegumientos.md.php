<?php

	extract($_POST);


	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';

	require_once "../../Swift/lib/swift_required.php";

	/*===================================================
	=            Llamando Funciòn php mailer            =
	===================================================*/
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require '../../PHPMailer/src/Exception.php';
	require '../../PHPMailer/src/PHPMailer.php';
	require '../../PHPMailer/src/SMTP.php';
		
	/*=====  End of Llamando Funciòn php mailer  ======*/

	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

 	extract($_POST);

	$query="UPDATE pro_proyecto SET seguimiento='P',idUsuarioRelativo='$idUsuario' WHERE idTramite='$idTramite';";
	$resultado= $conexionEstablecida->exec($query);



 	$query10="SELECT c.idTramite,CONCAT(a.nombre,a.apellido,' ')  AS nombreFuncionario,b.descripcionFisicamenteEstructura,c.nombre,a.email FROM th_usuario AS a INNER JOIN th_fisicamenteestructura AS b ON a.fisicamenteEstructura=b.id_FisicamenteEstructura INNER JOIN pro_proyecto AS c ON a.id_usuario=c.idUsuarioRelativo WHERE id_usuario='$idUsuario' ORDER BY c.idTramite DESC LIMIT 1";
	$resultado10 = $conexionEstablecida->query($query10);

	while($registro10 = $resultado10->fetch()) {

		$nombreFuncionario=$registro10['nombreFuncionario'];
		$nombre=$registro10['nombre'];
		$email=$registro10['email'];


	}		



	$mensaje=1;
	$jason['mensaje']=$mensaje;
	echo json_encode($jason);	