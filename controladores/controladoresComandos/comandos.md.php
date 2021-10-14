<?php

	class usuariosConsultados{

		/*====================================================================
		=            Comandos de ejecución de proyectos iniciados           =
		====================================================================*/

		public function plantillaProyectosIniciados(){

			$conexionRecuperada= new conexion();
 			$conexionEstablecida=$conexionRecuperada->cConexion();

			$query="SELECT idUsuario FROM pro_iniciarproyecto WHERE idUsuario='".$_SESSION["username"]."' AND estado='A';";
			$resultado = $conexionEstablecida->query($query);

			while($registro = $resultado->fetch()) {

				$idUsuario=$registro['idUsuario'];

			}

			return $idUsuario;

		}			
		
		/*=====  End of Comandos de ejecución de proyectos iniciados  ======*/

		/*========================================
		=            Modelos Usuarios            =
		========================================*/
		
		public function plantillaUsuariosModelos(){

			$conexionRecuperada= new conexion();
 			$conexionEstablecida=$conexionRecuperada->cConexion();


			if ($_SESSION["idRol"]==2) {
 			
				$query2="SELECT a.idFederacion,a.rucOrganismo,a.nombreOrganismo,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.provinciaFederacion) AS provinciaFederacion,(SELECT a1.nombreCanton FROM in_md_canton AS a1 WHERE a1.idCanton=a.cantonFederacion) AS cantonFederacion,(SELECT a1.nombreParroquia FROM in_md_parroquia AS a1 WHERE a1.idParroquia=a.parroquiaFederacion) AS parroquiaFederacion,a.telefono,a.direccion,a.email,b.idTramite,SUBSTRING(nombreOrganismo, 1, 3) AS nombreCompletoSin,YEAR(NOW()) AS anioFechas,a.tipoOrganismo,c.cedulaRepresentante,c.nombreReperesentante FROM pro_federacion AS a INNER JOIN pro_representante AS c ON c.idFederacion=a.idFederacion LEFT JOIN pro_proyecto AS b ON a.usuario=b.idUsuario  WHERE a.usuario='".$_SESSION["username"]."' GROUP BY a.usuario ORDER BY b.idTramite ASC LIMIT 1;";

				$resultado2 = $conexionEstablecida->query($query2);

				while($registro2 = $resultado2->fetch()) {

					$idFederacion=$registro2['idFederacion'];
					$rucOrganismo=$registro2['rucOrganismo'];
					$nombreOrganismo=$registro2['nombreOrganismo'];
					$provinciaFederacion=$registro2['provinciaFederacion'];
					$cantonFederacion=$registro2['cantonFederacion'];
					$parroquiaFederacion=$registro2['parroquiaFederacion'];
					$telefono=$registro2['telefono'];
					$direccion=$registro2['direccion'];
					$email=$registro2['email'];
					$nombreCompletoSin=$registro2['nombreCompletoSin'];
					$anioFechas=$registro2['anioFechas'];
					$tipoOrganismo=$registro2['tipoOrganismo'];
					$cedulaRepresentante=$registro2['cedulaRepresentante'];
					$nombreReperesentante=$registro2['nombreReperesentante'];
			
				}


				$query3="SELECT idTramite FROM pro_proyecto WHERE idUsuario='$rucOrganismo' ORDER BY idTramite DESC LIMIT 1;";

				$resultado3 = $conexionEstablecida->query($query3);

				while($registro3 = $resultado3->fetch()) {

					$idTramite=$registro3['idTramite'];

				}


				$query4="SELECT COUNT(idTramite) AS contador FROM pro_proyecto WHERE idUsuario='$rucOrganismo';";

				$resultado4 = $conexionEstablecida->query($query4);

				while($registro4 = $resultado4->fetch()) {

					$contador=$registro4['contador'];

				}

				if (empty($idTramite)) {
					$idTramite=0;
				}else{
					$idTramite=$idTramite;
				}

				$contador=$contador+1;

				$codigo=$contador."-".$rucOrganismo."-".$nombreCompletoSin."-".$anioFechas;

				$concateneador=$_SESSION["idRol"]."___".$idFederacion."___".$tipoOrganismo."___".$rucOrganismo."___".$nombreOrganismo."___".$provinciaFederacion."___".$cantonFederacion."___".$parroquiaFederacion."___".$telefono."___".$direccion."___".$email."___".$codigo."___".$cedulaRepresentante."___".$nombreReperesentante;


 			}else if($_SESSION["idRol"]==3){

				$query2="SELECT a.idAteleta,a.tipoOrganismo,a.cedulaUsuario,a.nombreCompleto,a.fechaNacimiento,a.sexo,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.provincia) AS provincia, (SELECT a1.nombreCanton FROM in_md_canton AS a1 WHERE a1.idCanton=a.canton) AS canton, (SELECT a1.nombreParroquia FROM in_md_parroquia AS a1 WHERE a1.idParroquia=a.parroquia) AS parroquia,a.telefono,a.direccion,a.email,b.idTramite,SUBSTRING(nombreCompleto, 1, 3) AS nombreCompletoSin,YEAR(NOW()) AS anioFechas FROM pro_deportistaorganismo AS a LEFT JOIN pro_proyecto AS b ON a.usuario=b.idUsuario WHERE a.usuario='".$_SESSION["username"]."' GROUP BY a.usuario ORDER BY b.idTramite ASC LIMIT 1;";

				$resultado2 = $conexionEstablecida->query($query2);


				while($registro2 = $resultado2->fetch()) {

					$idAteleta=$registro2['idAteleta'];
					$tipoOrganismo=$registro2['tipoOrganismo'];
					$cedulaUsuario=$registro2['cedulaUsuario'];
					$nombreCompleto=$registro2['nombreCompleto'];
					$fechaNacimiento=$registro2['fechaNacimiento'];
					$sexo=$registro2['sexo'];
					$provincia=$registro2['provincia'];
					$canton=$registro2['canton'];
					$parroquia=$registro2['parroquia'];
					$telefono=$registro2['telefono'];
					$direccion=$registro2['direccion'];
					$email=$registro2['email'];
					$nombreCompletoSin=$registro2['nombreCompletoSin'];
					$anioFechas=$registro2['anioFechas'];

				}

				$query3="SELECT idTramite FROM pro_proyecto WHERE idUsuario='$cedulaUsuario' ORDER BY idTramite DESC LIMIT 1;";

				$resultado3 = $conexionEstablecida->query($query3);

				while($registro3 = $resultado3->fetch()) {

					$idTramite=$registro3['idTramite'];

				}

				$query4="SELECT COUNT(idTramite) AS contador FROM pro_proyecto WHERE idUsuario='$cedulaUsuario';";

				$resultado4 = $conexionEstablecida->query($query4);

				while($registro4 = $resultado4->fetch()) {

					$contador=$registro4['contador'];

				}

				if (empty($idTramite)) {
					$idTramite=0;
				}else{
					$idTramite=$idTramite;
				}

				$contador=$contador+1;

				$codigo=$contador."-".$cedulaUsuario."-".str_replace('Ã', 'N',$nombreCompletoSin)."-".$anioFechas;


				$concateneador=$_SESSION["idRol"]."___".$idAteleta."___".$tipoOrganismo."___".$cedulaUsuario."___".$nombreCompleto."___".$fechaNacimiento."___".$sexo."___".$provincia."___".$canton."___".$parroquia."___".$telefono."___".$direccion."___".$email."___".$codigo;

 			}

 			$arrayDatosGenerales = explode("___", $concateneador);

			return $arrayDatosGenerales;

		}		
		
		/*=====  End of Modelos Usuarios  ======*/

		/*========================================
		=            Codigos ENviados            =
		========================================*/
		
		public function selectorDeCodigos(){

			$conexionRecuperada= new conexion();
 			$conexionEstablecida=$conexionRecuperada->cConexion();


			if ($_SESSION["idRol"]==2) {
 			
				$query2="SELECT a.idFederacion,a.rucOrganismo,a.nombreOrganismo,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.provinciaFederacion) AS provinciaFederacion,(SELECT a1.nombreCanton FROM in_md_canton AS a1 WHERE a1.idCanton=a.cantonFederacion) AS cantonFederacion,(SELECT a1.nombreParroquia FROM in_md_parroquia AS a1 WHERE a1.idParroquia=a.parroquiaFederacion) AS parroquiaFederacion,a.telefono,a.direccion,a.email,b.idTramite,SUBSTRING(nombreOrganismo, 1, 3) AS nombreCompletoSin,YEAR(NOW()) AS anioFechas,a.tipoOrganismo,c.cedulaRepresentante,c.nombreReperesentante FROM pro_federacion AS a INNER JOIN pro_representante AS c ON c.idFederacion=a.idFederacion LEFT JOIN pro_proyecto AS b ON a.usuario=b.idUsuario  WHERE a.usuario='".$_SESSION["username"]."' GROUP BY a.usuario ORDER BY b.idTramite ASC LIMIT 1;";

				$resultado2 = $conexionEstablecida->query($query2);

				while($registro2 = $resultado2->fetch()) {

					$idFederacion=$registro2['idFederacion'];
					$rucOrganismo=$registro2['rucOrganismo'];
					$nombreOrganismo=$registro2['nombreOrganismo'];
					$provinciaFederacion=$registro2['provinciaFederacion'];
					$cantonFederacion=$registro2['cantonFederacion'];
					$parroquiaFederacion=$registro2['parroquiaFederacion'];
					$telefono=$registro2['telefono'];
					$direccion=$registro2['direccion'];
					$email=$registro2['email'];
					$nombreCompletoSin=$registro2['nombreCompletoSin'];
					$anioFechas=$registro2['anioFechas'];
					$tipoOrganismo=$registro2['tipoOrganismo'];
					$cedulaRepresentante=$registro2['cedulaRepresentante'];
					$nombreReperesentante=$registro2['nombreReperesentante'];
			
				}


				$query3="SELECT idTramite FROM pro_proyecto WHERE idUsuario='$rucOrganismo' ORDER BY idTramite DESC LIMIT 1;";

				$resultado3 = $conexionEstablecida->query($query3);

				while($registro3 = $resultado3->fetch()) {

					$idTramite=$registro3['idTramite'];

				}


				$query4="SELECT COUNT(idTramite) AS contador FROM pro_proyecto WHERE idUsuario='$rucOrganismo';";

				$resultado4 = $conexionEstablecida->query($query4);

				while($registro4 = $resultado4->fetch()) {

					$contador=$registro4['contador'];

				}

				if (empty($idTramite)) {
					$idTramite=0;
				}else{
					$idTramite=$idTramite;
				}

				$contador=$contador+1;

				$codigo=$contador."-".$rucOrganismo."-".$nombreCompletoSin."-".$anioFechas;


 			}else if($_SESSION["idRol"]==3){

				$query2="SELECT a.idAteleta,a.tipoOrganismo,a.cedulaUsuario,a.nombreCompleto,a.fechaNacimiento,a.sexo,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.provincia) AS provincia, (SELECT a1.nombreCanton FROM in_md_canton AS a1 WHERE a1.idCanton=a.canton) AS canton, (SELECT a1.nombreParroquia FROM in_md_parroquia AS a1 WHERE a1.idParroquia=a.parroquia) AS parroquia,a.telefono,a.direccion,a.email,b.idTramite,SUBSTRING(nombreCompleto, 1, 3) AS nombreCompletoSin,YEAR(NOW()) AS anioFechas FROM pro_deportistaorganismo AS a LEFT JOIN pro_proyecto AS b ON a.usuario=b.idUsuario WHERE a.usuario='".$_SESSION["username"]."' GROUP BY a.usuario ORDER BY b.idTramite ASC LIMIT 1;";

				$resultado2 = $conexionEstablecida->query($query2);


				while($registro2 = $resultado2->fetch()) {

					$idAteleta=$registro2['idAteleta'];
					$tipoOrganismo=$registro2['tipoOrganismo'];
					$cedulaUsuario=$registro2['cedulaUsuario'];
					$nombreCompleto=$registro2['nombreCompleto'];
					$fechaNacimiento=$registro2['fechaNacimiento'];
					$sexo=$registro2['sexo'];
					$provincia=$registro2['provincia'];
					$canton=$registro2['canton'];
					$parroquia=$registro2['parroquia'];
					$telefono=$registro2['telefono'];
					$direccion=$registro2['direccion'];
					$email=$registro2['email'];
					$nombreCompletoSin=$registro2['nombreCompletoSin'];
					$anioFechas=$registro2['anioFechas'];

				}

				$query3="SELECT idTramite FROM pro_proyecto WHERE idUsuario='$cedulaUsuario' ORDER BY idTramite DESC LIMIT 1;";

				$resultado3 = $conexionEstablecida->query($query3);

				while($registro3 = $resultado3->fetch()) {

					$idTramite=$registro3['idTramite'];

				}

				$query4="SELECT COUNT(idTramite) AS contador FROM pro_proyecto WHERE idUsuario='$cedulaUsuario';";

				$resultado4 = $conexionEstablecida->query($query4);

				while($registro4 = $resultado4->fetch()) {

					$contador=$registro4['contador'];

				}

				if (empty($idTramite)) {
					$idTramite=0;
				}else{
					$idTramite=$idTramite;
				}

				$contador=$contador+1;

				$codigo=$contador."-".$cedulaUsuario."-".str_replace('Ã', 'N',$nombreCompletoSin)."-".$anioFechas;


 			}

			return $codigo;
			

		}				
				
		/*=====  End of Codigos ENviados  ======*/
		
		
		/*========================================================
		=            Selector de Proyectos ingresados            =
		========================================================*/
		
		public function codigoIngresadosInfras($parametro1){

			$conexionRecuperada= new conexion();
 			$conexionEstablecida=$conexionRecuperada->cConexion();

			$query="SELECT infras FROM pro_infraselects WHERE codigo='$parametro1';";

			$resultado = $conexionEstablecida->query($query);


			while($registro = $resultado->fetch()) {

				$infras=$registro['infras'];

			}

			return $infras;

		}				
		
		/*=====  End of Selector de Proyectos ingresados  ======*/
		
		/*=========================================
		=            Request variables            =
		=========================================*/
		
		
		public function requestFuncion($parametro1,$parametro2){

			$arrayResquest= explode("?___codigoEditar=", $parametro1);

			$codigoEditar=$arrayResquest[1];

			return $codigoEditar;

		}			
		
		/*=====  End of Request variables  ======*/
		


	}