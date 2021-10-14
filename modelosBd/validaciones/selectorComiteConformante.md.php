<?php

	extract($_POST);


	define('CONTROLADOR7', '../../conexion/');

	require_once CONTROLADOR7.'conexion.php';


	$conexionRecuperada= new conexion();
 	$conexionEstablecida=$conexionRecuperada->cConexion();

	$query="SELECT a.id_usuario AS idUsuarioSAlto,CONCAT_WS(' ',a.nombre, a.apellido) AS nombreCompletoSAlto, a.email AS emailSAlto, a.cedula AS cedulaSAlto,CONCAT_WS(' ',(SELECT a1.descripcionFisicamenteEstructura FROM th_fisicamenteestructura AS a1 WHERE a1.id_FisicamenteEstructura=a.fisicamenteEstructura)) AS nombreRolSAlto, c.nombre AS rolAlto FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_roles AS c ON c.id_rol=b.id_rol WHERE b.id_rol=7 AND fisicamenteEstructura='24' AND a.estadoUsuario='A' ORDER BY a.id_usuario ASC LIMIT 1;";
	$resultado = $conexionEstablecida->query($query);


	while($registro = $resultado->fetch()) {

		$idUsuarioSAlto=$registro['idUsuarioSAlto'];
		$nombreCompletoSAlto=$registro['nombreCompletoSAlto'];
		$emailSAlto=$registro['emailSAlto'];
		$cedulaSAlto=$registro['cedulaSAlto'];
		$nombreRolSAlto=$registro['nombreRolSAlto'];
		$rolAlto=$registro['rolAlto'];

	}

	$query2="SELECT a.id_usuario AS idUsuarioActividadFisica,CONCAT_WS(' ',a.nombre, a.apellido) AS nombreCompletoActividadFisica, a.email AS emailActividadFisica, a.cedula AS cedulaActividadFisica,CONCAT_WS(' ',(SELECT a1.descripcionFisicamenteEstructura FROM th_fisicamenteestructura AS a1 WHERE a1.id_FisicamenteEstructura=a.fisicamenteEstructura)) AS nombreRolActividadFisica, c.nombre AS rolFisico FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_roles AS c ON c.id_rol=b.id_rol WHERE b.id_rol=7 AND fisicamenteEstructura='26' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;";
	$resultado2 = $conexionEstablecida->query($query2);


	while($registro2 = $resultado2->fetch()) {

		$idUsuarioActividadFisica=$registro2['idUsuarioActividadFisica'];
		$nombreCompletoActividadFisica=$registro2['nombreCompletoActividadFisica'];
		$emailActividadFisica=$registro2['emailActividadFisica'];
		$cedulaActividadFisica=$registro2['cedulaActividadFisica'];
		$nombreRolActividadFisica=$registro2['nombreRolActividadFisica'];
		$rolFisico=$registro2['rolFisico'];

	}

	$query3="SELECT a.id_usuario AS idUsuarioCoordinador,CONCAT_WS(' ',a.nombre, a.apellido) AS nombreCompletoCoordinador, a.email AS emailCoordinador, a.cedula AS cedulaCoordinador,CONCAT_WS(' ',(SELECT a1.descripcionFisicamenteEstructura FROM th_fisicamenteestructura AS a1 WHERE a1.id_FisicamenteEstructura=a.fisicamenteEstructura)) AS nombreRolCoordinador, c.nombre AS rolCoordinador FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_roles AS c ON c.id_rol=b.id_rol WHERE b.id_rol=4 AND fisicamenteEstructura='1' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;";
	$resultado3 = $conexionEstablecida->query($query3);


	while($registro3 = $resultado3->fetch()) {

		$idUsuarioCoordinador=$registro3['idUsuarioCoordinador'];
		$nombreCompletoCoordinador=$registro3['nombreCompletoCoordinador'];
		$emailCoordinador=$registro3['emailCoordinador'];
		$cedulaCoordinador=$registro3['cedulaCoordinador'];
		$nombreRolCoordinador=$registro3['nombreRolCoordinador'];
		$rolCoordinador=$registro3['rolCoordinador'];

	}

	$query4="SELECT a.id_usuario AS idUsuarioMinistro,CONCAT_WS(' ',a.nombre, a.apellido) AS nombreCompletoMinistro, a.email AS emailMinistro, a.cedula AS cedulaMinistro,CONCAT_WS(' ',(SELECT a1.descripcionFisicamenteEstructura FROM th_fisicamenteestructura AS a1 WHERE a1.id_FisicamenteEstructura=a.fisicamenteEstructura)) AS nombreRolMinistro, c.nombre AS rolMinistro FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_roles AS c ON c.id_rol=b.id_rol WHERE b.id_rol=5 AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;";
	$resultado4 = $conexionEstablecida->query($query4);


	while($registro4 = $resultado4->fetch()) {

		$idUsuarioMinistro=$registro4['idUsuarioMinistro'];
		$nombreCompletoMinistro=$registro4['nombreCompletoMinistro'];
		$emailMinistro=$registro4['emailMinistro'];
		$cedulaMinistro=$registro4['cedulaMinistro'];
		$nombreRolMinistro=$registro4['nombreRolMinistro'];
		$rolMinistro=$registro4['rolMinistro'];

	}

	$query5="SELECT a.id_usuario AS idUsuarioPlanificacion,CONCAT_WS(' ',a.nombre, a.apellido) AS nombreCompletoPlanificacion, a.email AS emailPlanificacion, a.cedula AS cedulaPlanificacion,CONCAT_WS(' ',(SELECT a1.descripcionFisicamenteEstructura FROM th_fisicamenteestructura AS a1 WHERE a1.id_FisicamenteEstructura=a.fisicamenteEstructura)) AS nombreRolPlanificacion, c.nombre AS rolPlanificacion FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_roles AS c ON c.id_rol=b.id_rol WHERE b.id_rol=4 AND fisicamenteEstructura='3' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;";
	$resultado5 = $conexionEstablecida->query($query5);


	while($registro5 = $resultado5->fetch()) {

		$idUsuarioPlanificacion=$registro5['idUsuarioPlanificacion'];
		$nombreCompletoPlanificacion=$registro5['nombreCompletoPlanificacion'];
		$emailPlanificacion=$registro5['emailPlanificacion'];
		$cedulaPlanificacion=$registro5['cedulaPlanificacion'];
		$nombreRolPlanificacion=$registro5['nombreRolPlanificacion'];
		$rolPlanificacion=$registro5['rolPlanificacion'];

	}

	$query5="SELECT a.id_usuario AS idUsuarioJuridico,CONCAT_WS(' ',a.nombre, a.apellido) AS nombreCompletoJuridico, a.email AS emailJuridico, a.cedula AS cedulaJuridico,CONCAT_WS(' ',(SELECT a1.descripcionFisicamenteEstructura FROM th_fisicamenteestructura AS a1 WHERE a1.id_FisicamenteEstructura=a.fisicamenteEstructura)) AS nombreRolJuridico, c.nombre AS rolJuridico FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_roles AS c ON c.id_rol=b.id_rol WHERE b.id_rol=4 AND fisicamenteEstructura='2' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;";
	$resultado5 = $conexionEstablecida->query($query5);


	while($registro5 = $resultado5->fetch()) {

		$idUsuarioJuridico=$registro5['idUsuarioJuridico'];
		$nombreCompletoJuridico=$registro5['nombreCompletoJuridico'];
		$emailJuridico=$registro5['emailJuridico'];
		$cedulaJuridico=$registro5['cedulaJuridico'];
		$nombreRolJuridico=$registro5['nombreRolJuridico'];
		$rolJuridico=$registro5['rolJuridico'];

	}

	$asistencia = '../../documentos/asistencia/'.$codigoEnviadoDocumentos.'.pdf';
	$validaAsistencia=false;

	if (file_exists($asistencia)) {
		$validaAsistencia=true;
	}

	$notificacion = '../../documentos/notificacion/'.$codigoEnviadoDocumentos.'.pdf';
	$validaNotificacion=false;
	
	if (file_exists($notificacion)) {
		$validaNotificacion=true;
	}


	$jason['validaAsistencia']=$validaAsistencia;
	$jason['validaNotificacion']=$validaNotificacion;

	$jason['idUsuarioSAlto']=$idUsuarioSAlto;
	$jason['nombreCompletoSAlto']=$nombreCompletoSAlto;
	$jason['emailSAlto']=$emailSAlto;
	$jason['cedulaSAlto']=$cedulaSAlto;
	$jason['nombreRolSAlto']=$nombreRolSAlto;
	$jason['rolAlto']=$rolAlto;


	$jason['idUsuarioActividadFisica']=$idUsuarioActividadFisica;
	$jason['nombreCompletoActividadFisica']=$nombreCompletoActividadFisica;
	$jason['emailActividadFisica']=$emailActividadFisica;
	$jason['cedulaActividadFisica']=$cedulaActividadFisica;
	$jason['nombreRolActividadFisica']=$nombreRolActividadFisica;
	$jason['rolFisico']=$rolFisico;


	$jason['idUsuarioCoordinador']=$idUsuarioCoordinador;
	$jason['nombreCompletoCoordinador']=$nombreCompletoCoordinador;
	$jason['emailCoordinador']=$emailCoordinador;
	$jason['cedulaCoordinador']=$cedulaCoordinador;
	$jason['nombreRolCoordinador']=$nombreRolCoordinador;
	$jason['rolCoordinador']=$rolCoordinador;


	$jason['idUsuarioMinistro']=$idUsuarioMinistro;
	$jason['nombreCompletoMinistro']=$nombreCompletoMinistro;
	$jason['emailMinistro']=$emailMinistro;
	$jason['cedulaMinistro']=$cedulaMinistro;
	$jason['nombreRolMinistro']=$nombreRolMinistro;
	$jason['rolMinistro']=$rolMinistro;

	$jason['idUsuarioPlanificacion']=$idUsuarioPlanificacion;
	$jason['nombreCompletoPlanificacion']=$nombreCompletoPlanificacion;
	$jason['emailPlanificacion']=$emailPlanificacion;
	$jason['cedulaPlanificacion']=$cedulaPlanificacion;
	$jason['nombreRolPlanificacion']=$nombreRolPlanificacion;
	$jason['rolPlanificacion']=$rolPlanificacion;

	$jason['idUsuarioJuridico']=$idUsuarioJuridico;
	$jason['nombreCompletoJuridico']=$nombreCompletoJuridico;
	$jason['emailJuridico']=$emailJuridico;
	$jason['cedulaJuridico']=$cedulaJuridico;
	$jason['nombreRolJuridico']=$nombreRolJuridico;
	$jason['rolJuridico']=$rolJuridico;



	echo json_encode($jason);