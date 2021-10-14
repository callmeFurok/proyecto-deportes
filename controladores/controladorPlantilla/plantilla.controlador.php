<?php

	class plantilla{

			private static $nomenclatura='.view.php';

			private static $vista = 'vistas/'; 

			private static $vistaGeneral = 'vistasGenerales/'; 

			private static $contenidoVistas = 'contenidoVistas/'; 

			private static $componentesProyecto = 'componentesProyecto/'; 

			private static $videosModal = 'videosModal/';

			private static $componentesPdf = 'componentesPdf/'; 

			private static $componentesDasboard = 'componentesDasboard/'; 

			private static $elementosDasboard = 'elementosDasboard/'; 

			private static $seccionesDasboard = 'seccionesDasboard/'; 

			private static $menusDasboards = 'menusDasboards/'; 

			private static $modales = 'modales/'; 
			
			private static $header = 'header'; 

			private static $menu = 'menu'; 

			private static $footer = 'footer'; 

			private $rutaInicial='ingreso';

			private static $menusSeccionales = 'menusSeccionales/'; 

			private static $menuInicial = 'menuInicial'; 

			private static $menuOrganismoUsuario = 'menuOrganismoUsuario';

			private static $proyectosDirectores = 'proyectosDirectores/';

			private static $proyectosFuncionarios = 'proyectosFuncionarios/';

			private static $componentesProyectoEdicion = 'componentesProyectoEdicion/';

			private static $componentesEdicionModificacion = 'componentesEdicionModificacion/';

			private static $parciales = 'parciales/';

			/*===============================================
			=            Componenentes Plantilla           =
			===============================================*/
			
			public static function ctrPlantilla(){

				include "controladores/controladorPlantilla/plantilla.general.controlador.php";

			}			
			
			/*=====  End of Componenentes Plantilla  ======*/
			
			/*=================================
			=            Parciales            =
			=================================*/
			
			public function parciales($parametro1){

				switch ($parametro1) {

					case 1:
					     require_once self::$vista.self::$parciales."mensajeUsoPunto".self::$nomenclatura;
					break;

					case 2:
					     require_once self::$vista.self::$parciales."scriptProyecto".self::$nomenclatura;
					break;

					case 3:
					     require_once self::$vista.self::$parciales."sumadorComponentes".self::$nomenclatura;
					break;

					case 4:
					     require_once self::$vista.self::$parciales."scriptCrearProyecto".self::$nomenclatura;
					break;					

				}

			}			
						
			
			/*=====  End of Parciales  ======*/
			

			/*========================================
			=            Componentes Head            =
			========================================*/

			public function plantillaHead(){


				require_once self::$vista.self::$vistaGeneral.self::$header.self::$nomenclatura;


			}				
			
			/*=====  End of Componentes Head  ======*/
			

			/*==========================================
			=            Header utilitarios            =
			==========================================*/
			
			public function plantillaHeaderUtilitarios(){

				require self::$vista.self::$vistaGeneral.self::$menusSeccionales.'menuHeader'.self::$nomenclatura;

			}				
			
			/*=====  End of Header utilitarios  ======*/
			

			/*=========================================
			=            Componentes Menus            =
			=========================================*/
			
			public function plantillaMenu(){

				// if (!isset($_GET["ruta"]) && $_GET["ruta"]!="ingreso") {

					require_once self::$vista.self::$vistaGeneral.self::$menu.self::$nomenclatura;

				// }

			}	
			
			
			/*=====  End of Componentes Menus  ======*/
			
			/*==========================================
			=            Componentes Videos            =
			==========================================*/
			
			public function componentesVideos($parametro1){

				require_once self::$vista.self::$videosModal."videoModal".self::$nomenclatura;


			}			
			
			/*=====  End of Componentes Videos  ======*/
		
			/*===============================
			=            Modales            =
			===============================*/
			
			public function modalesInicios($parametro1){

				switch ($parametro1) {

					case 1:
					     require_once self::$vista.self::$modales."registroUsuario".self::$nomenclatura;
					break;

					case 2:
					     require_once self::$vista.self::$modales."inicioregistro".self::$nomenclatura;
					break;

					case 3:
					     require_once self::$vista.self::$modales."modalIncentivo".self::$nomenclatura;
					break;

					case 4:
					     require_once self::$vista.self::$modales."modalPregunta".self::$nomenclatura;
					break;

					case 5:
					     require_once self::$vista.self::$modales."modalPatrocinador".self::$nomenclatura;
					break;

				}

			}			
			
			
			/*=====  End of Modales  ======*/
			

			/*==========================================
			=            Sección Dashboards            =
			==========================================*/
			
			public function componentesDasboard($parametro1){

				switch ($parametro1) {

					case 1:
					     require_once self::$vista.self::$componentesDasboard.self::$elementosDasboard."aside".self::$nomenclatura;
					break;

					case 2:
					     require_once self::$vista.self::$componentesDasboard.self::$seccionesDasboard."datosUsuario".self::$nomenclatura;
					break;

					case 3:

						if ($_GET["ruta"]=="datosGenerales" || $_GET["ruta"]=="proyectosUsuarios" || $_GET["ruta"]=="datosGeneralesPrincipal" || $_GET["ruta"]=="proyectoCrear") {

							require_once self::$vista.self::$componentesDasboard.self::$menusDasboards."menuUsuarioDasboards".self::$nomenclatura;

						}else if($_GET["ruta"]=="directores" || $_GET["ruta"]=="directorRecomendado" || $_GET["ruta"]=="firmasDirectores" || $_GET["ruta"]=="directoresComponentes"){

							require_once self::$vista.self::$componentesDasboard.self::$menusDasboards."menuDirectoresDasboards".self::$nomenclatura;

						}else if($_GET["ruta"]=="funcionarios" || $_GET["ruta"]=="firmasFuncionarios"){

							require_once self::$vista.self::$componentesDasboard.self::$menusDasboards."menuAnalistaDasboards".self::$nomenclatura;

						}else if($_GET["ruta"]=="datosGeneralesModificaciones"){

							require_once self::$vista.self::$componentesDasboard.self::$menusDasboards."menuEdicionDasboard".self::$nomenclatura;

						}else if($_GET["ruta"]=="datosGeneralesModificacionesRectificaciones"){

							require_once self::$vista.self::$componentesDasboard.self::$menusDasboards."menuEdicionDasboardRectificas".self::$nomenclatura;
							
						}else if($_GET["ruta"]=="subseRecomendado" || $_GET["ruta"]=="tramitesFirmarSubsess" || $_GET["ruta"]=="subsesRegistros" || $_GET["ruta"]=="modificaciones"){

							require_once self::$vista.self::$componentesDasboard.self::$menusDasboards."menuSubses".self::$nomenclatura;

						}else if($_GET["ruta"]=="secretariaComite" || $_GET["ruta"]=="secretariaComiteCertifica"){

							require_once self::$vista.self::$componentesDasboard.self::$menusDasboards."menuSecretaria".self::$nomenclatura;

						}else if($_GET["ruta"]=="deportistas" || $_GET["ruta"]=="organismos" || $_GET["ruta"]=="proyectosAdmin" || $_GET["ruta"]=="creacionComponentes"){

							require_once self::$vista.self::$componentesDasboard.self::$menusDasboards."menuAdministrador".self::$nomenclatura;

						}else if($_GET["ruta"]=="firmasMinistros"){

							require_once self::$vista.self::$componentesDasboard.self::$menusDasboards."menuMinistro".self::$nomenclatura;

						}else if($_GET["ruta"]=="firmasCoordinadores" || $_GET["ruta"]=="proyectosCertificarCoordinador" || $_GET["ruta"]=="tramitesCoordinador"){

							require_once self::$vista.self::$componentesDasboard.self::$menusDasboards."menuCoordinador".self::$nomenclatura;

						}else if($_GET["ruta"]=="patrocinador"){

							require_once self::$vista.self::$componentesDasboard.self::$menusDasboards."menuPatrocinador".self::$nomenclatura;

						}else if($_GET["ruta"]=="reporteriaGeneral"){

							require_once self::$vista.self::$componentesDasboard.self::$menusDasboards."menuReporteriasConjuntas".self::$nomenclatura;

						}


					break;

					case 4:
					     require_once self::$vista.self::$componentesDasboard.self::$elementosDasboard."nav".self::$nomenclatura;
					break;

					case 5:
					     require_once self::$vista.self::$componentesDasboard.self::$elementosDasboard."asideRepor".self::$nomenclatura;
					break;


				}

			}

			/*=====  End of Sección Dashboards  ======*/
			


			/*=======================================
			=            Componentes PDF            =
			=======================================*/
			

			public function componentesPdf($parametro1){

				switch ($parametro1) {

					case 1:
					     require_once "../../".self::$vista.self::$componentesPdf."portada".self::$nomenclatura;
					break;

					case 2:
					     require_once "../../".self::$vista.self::$componentesPdf."proyecto".self::$nomenclatura;
					break;

					case 3:
					     require_once "../../".self::$vista.self::$componentesPdf."basesLegales".self::$nomenclatura;
					break;

					case 4:
					     require_once "../../".self::$vista.self::$componentesPdf."caracterizacion".self::$nomenclatura;
					break;

					case 5:
					     require_once "../../".self::$vista.self::$componentesPdf."alineacionEstrategica".self::$nomenclatura;
					break;

					case 6:
					     require_once "../../".self::$vista.self::$componentesPdf."aporte".self::$nomenclatura;
					break;

					case 7:
					     require_once "../../".self::$vista.self::$componentesPdf."metas".self::$nomenclatura;
					break;

					case 8:
					     require_once "../../".self::$vista.self::$componentesPdf."beneficiarios".self::$nomenclatura;
					break;

					case 9:
					     require_once "../../".self::$vista.self::$componentesPdf."metodologia".self::$nomenclatura;
					break;

					case 10:
					     require_once "../../".self::$vista.self::$componentesPdf."asistencia".self::$nomenclatura;
					break;

					case 11:
					     require_once "../../".self::$vista.self::$componentesPdf."notificacion".self::$nomenclatura;
					break;

					case 12:
					     require_once "../../".self::$vista.self::$componentesPdf."componentes".self::$nomenclatura;
					break;

					case 13:
					     require_once "../../".self::$vista.self::$componentesPdf."principalTecnico".self::$nomenclatura;
					break;

					case 14:
					     require_once "../../".self::$vista.self::$componentesPdf."principalInfraestructura".self::$nomenclatura;
					break;

					case 15:
					     require_once "../../".self::$vista.self::$componentesPdf."portada2Infra".self::$nomenclatura;
					break;

					case 16:
					     require_once "../../".self::$vista.self::$componentesPdf."basesLegales2".self::$nomenclatura;
					break;

					case 17:
					     require_once "../../".self::$vista.self::$componentesPdf."especificacionesTecnicas".self::$nomenclatura;
					break;

					case 18:
					     require_once "../../".self::$vista.self::$componentesPdf."beneficiariosInfra".self::$nomenclatura;
					break;

					case 19:
					     require_once "../../".self::$vista.self::$componentesPdf."cronogramas".self::$nomenclatura;
					break;

					case 20:
					     require_once "../../".self::$vista.self::$componentesPdf."componentesHorizontal".self::$nomenclatura;
					break;

					case 21:
					     require_once "../../".self::$vista.self::$componentesPdf."cronogramaVisualiza".self::$nomenclatura;
					break;

					case 22:
					     require_once "../../".self::$vista.self::$componentesPdf."informeFinal".self::$nomenclatura;
					break;

					case 23:
					     require_once "../../".self::$vista.self::$componentesPdf."portadaInformes".self::$nomenclatura;
					break;

					case 24:
					     require_once "../../".self::$vista.self::$componentesPdf."metodologiaInformes".self::$nomenclatura;
					break;

					case 25:
					     require_once "../../".self::$vista.self::$componentesPdf."informeTecnicos".self::$nomenclatura;
					break;

					case 26:
					     require_once "../../".self::$vista.self::$componentesPdf."contenidoInformesTecnicos".self::$nomenclatura;
					break;

					case 27:
					     require_once "../../".self::$vista.self::$componentesPdf."notificasCertificas".self::$nomenclatura;
					break;



				}

			}			
			
			/*=====  End of Componentes PDF  ======*/
			
			/*==========================================================
			=            Componentes proyectos funcionarios 	       =
			==========================================================*/

			public function componentesProyectoFuncionarios($parametro1){

				switch ($parametro1) {

					case 1:
					     require_once self::$vista.self::$proyectosDirectores."tramitesGenerados".self::$nomenclatura;
					break;

					case 2:
					     require_once self::$vista.self::$proyectosDirectores."tramitesRecomendados".self::$nomenclatura;
					break;

					case 3:
					     require_once self::$vista.self::$proyectosFuncionarios."tramitesGenerados".self::$nomenclatura;
					break;

					case 4:
					     require_once self::$vista.self::$proyectosFuncionarios."subseRecomendado".self::$nomenclatura;
					break;

					case 5:
					     require_once self::$vista.self::$proyectosFuncionarios."tramitesFirmarSubsess".self::$nomenclatura;
					break;

					case 6:
					     require_once self::$vista.self::$proyectosFuncionarios."secretariaComite".self::$nomenclatura;
					break;

					case 7:
					     require_once self::$vista.self::$proyectosFuncionarios."deportistas".self::$nomenclatura;
					break;

					case 8:
					     require_once self::$vista.self::$proyectosFuncionarios."organismos".self::$nomenclatura;
					break;				

					case 9:
					     require_once self::$vista.self::$proyectosFuncionarios."proyectosAdmin".self::$nomenclatura;
					break;

					case 10:
					     require_once self::$vista.self::$proyectosFuncionarios."firmasMinistros".self::$nomenclatura;
					break;

					case 11:
					     require_once self::$vista.self::$proyectosFuncionarios."firmasCoordinadores".self::$nomenclatura;
					break;

					case 12:
					     require_once self::$vista.self::$proyectosFuncionarios."firmasFuncionarios".self::$nomenclatura;
					break;

					case 13:
					     require_once self::$vista.self::$proyectosFuncionarios."firmasDirectores".self::$nomenclatura;
					break;

				}

			}			
						
			
			
			/*=====  End of Componentes proyectos funcionarios  ======*/
			

			/*==========================================================
			=            Componentes del proyecto ediciones            =
			==========================================================*/
			
			public function componentesProyectoEdicion($parametro1){

				switch ($parametro1) {

					case 2:
					     require_once self::$vista.self::$componentesProyectoEdicion."proyecto".self::$nomenclatura;
					break;

					case 3:
					     require_once self::$vista.self::$componentesProyectoEdicion."baseLegal".self::$nomenclatura;
					break;

					case 4:
					     require_once self::$vista.self::$componentesProyectoEdicion."caracterizacion".self::$nomenclatura;
					break;

					case 5:
					     require_once self::$vista.self::$componentesProyectoEdicion."alineacionEstrategica".self::$nomenclatura;
					break;

					case 6:
					     require_once self::$vista.self::$componentesProyectoEdicion."aporteProyecto".self::$nomenclatura;
					break;

					case 7:
					     require_once self::$vista.self::$componentesProyectoEdicion."metas".self::$nomenclatura;
					break;

					case 8:
					     require_once self::$vista.self::$componentesProyectoEdicion."componentes".self::$nomenclatura;
					break;

					case 9:
					     require_once self::$vista.self::$componentesProyectoEdicion."benefeciarios".self::$nomenclatura;
					break;

					case 10:
					     require_once self::$vista.self::$componentesProyectoEdicion."metodologia".self::$nomenclatura;
					break;

					case 11:
					     require_once self::$vista.self::$componentesProyectoEdicion."documentosAnexos".self::$nomenclatura;
					break;

					case 12:
					     require_once self::$vista.self::$componentesProyectoEdicion."cronogramaValorado".self::$nomenclatura;
					break;

					case 13:
					     require_once self::$vista.self::$componentesProyectoEdicion."componentesRelativos".self::$nomenclatura;
					break;


					case 14:
					     require_once self::$vista.self::$componentesProyectoEdicion."componentesModificacion".self::$nomenclatura;
					break;


				}

			}						
			
			/*=====  End of Componentes del proyecto ediciones  ======*/
			

			/*================================================
			=            Componentes del Proyecto            =
			================================================*/
			
			public function componentesProyecto($parametro1){

				switch ($parametro1) {

					case 1:
					     require_once self::$vista.self::$componentesProyecto."datosPersonales".self::$nomenclatura;
					break;

					case 2:
					     require_once self::$vista.self::$componentesProyecto."proyecto".self::$nomenclatura;
					break;

					case 3:
					     require_once self::$vista.self::$componentesProyecto."baseLegal".self::$nomenclatura;
					break;

					case 4:
					     require_once self::$vista.self::$componentesProyecto."caracterizacion".self::$nomenclatura;
					break;

					case 5:
					     require_once self::$vista.self::$componentesProyecto."alineacionEstrategica".self::$nomenclatura;
					break;

					case 6:
					     require_once self::$vista.self::$componentesProyecto."aporteProyecto".self::$nomenclatura;
					break;

					case 7:
					     require_once self::$vista.self::$componentesProyecto."metas".self::$nomenclatura;
					break;

					case 8:
					     require_once self::$vista.self::$componentesProyecto."componentes".self::$nomenclatura;
					break;

					case 9:
					     require_once self::$vista.self::$componentesProyecto."benefeciarios".self::$nomenclatura;
					break;

					case 10:
					     require_once self::$vista.self::$componentesProyecto."metodologia".self::$nomenclatura;
					break;

					case 11:
					     require_once self::$vista.self::$componentesProyecto."documentosAnexos".self::$nomenclatura;
					break;

					case 12:
					     require_once self::$vista.self::$componentesProyecto."enviarPdf".self::$nomenclatura;
					break;

					case 13:
					     require_once self::$vista.self::$componentesProyecto."componentesRelativos".self::$nomenclatura;
					break;

					case 14:
					     require_once self::$vista.self::$componentesProyecto."crearProyectoDos".self::$nomenclatura;
					break;

					case 15:
					     require_once self::$vista.self::$componentesProyecto."cronogramaValorado".self::$nomenclatura;
					break;

				}

			}			
			
			/*=====  End of Componentes del Proyecto  ======*/
			

			/*========================================
			=            Disparador Menus            =
			========================================*/

			public function disparadorMenu(){

				if (isset($_GET["ruta"])) {

					if ($_GET["ruta"]=="ingreso") {

						require_once self::$vista.self::$vistaGeneral.self::$menusSeccionales."menuInicial".self::$nomenclatura;

					}else if($_GET["ruta"]=="subsecretario" || $_GET["ruta"]=="tramitesRealizados3" || $_GET["ruta"]=="tramitesNegados3" || $_GET["ruta"]=="subseRecomendado" || $_GET["ruta"]=="tramitesFirmar" && ($_SESSION["idRol"]=="7" || $_SESSION["idRol"]=="4" || $_SESSION["idRol"]=="5")){

						// require_once self::$vista.self::$vistaGeneral.self::$menusSeccionales."menuSubsecretario".self::$nomenclatura;

					}else if($_GET["ruta"]=="directores" || $_GET["ruta"]=="tramitesRealizados2" || $_GET["ruta"]=="tramitesNegados2" || $_GET["ruta"]=="directorRecomendado" || $_GET["ruta"]=="tramitesFirmar" && $_SESSION["idRol"]=="2"){

						// require_once self::$vista.self::$vistaGeneral.self::$menusSeccionales."menuDirector".self::$nomenclatura;

					}else if($_GET["ruta"]=="funcionarios" || $_GET["ruta"]=="tramitesRealizados" || $_GET["ruta"]=="tramitesNegados" || $_GET["ruta"]=="tramitesFirmar" && $_SESSION["idRol"]=="3"){

						// require_once self::$vista.self::$vistaGeneral.self::$menusSeccionales."menuFuncionario".self::$nomenclatura;

					}else if($_GET["ruta"]=="deportistas" || $_GET["ruta"]=="organismos" || $_GET["ruta"]=="proyectosAdmin"){

						// require_once self::$vista.self::$vistaGeneral.self::$menusSeccionales."menuAdmin".self::$nomenclatura;

					}else if($_GET["ruta"]=="secretariaComite"){

						// require_once self::$vista.self::$vistaGeneral.self::$menusSeccionales."menuSecretariaComite".self::$nomenclatura;

					}

				}else{

					require_once self::$vista.self::$vistaGeneral.self::$menusSeccionales."menuInicial".self::$nomenclatura;

				}

			}			
			
			/*=====  End of Disparador Menus  ======*/
			/*==================================
			=            Contenidos            =
			==================================*/
		
			public function plantillaContenido(){

				if (isset($_GET["ruta"])) {
					
					switch ($_GET["ruta"]) {

					    case "ingreso":
					        require_once self::$vista.self::$contenidoVistas."ingreso".self::$nomenclatura;
					    break;

			    		case "datosGenerales":
					        require_once self::$vista.self::$contenidoVistas."datosGenerales".self::$nomenclatura;
					    break;

			    		case "proyectosUsuarios":
					        require_once self::$vista.self::$contenidoVistas."proyectosUsuarios".self::$nomenclatura;
					    break;

			    		case "subsecretario":
					        require_once self::$vista.self::$contenidoVistas."subsecretario".self::$nomenclatura;
					    break;

			    		case "directores":
					        require_once self::$vista.self::$contenidoVistas."directores".self::$nomenclatura;
					    break;

			    		case "funcionarios":
					        require_once self::$vista.self::$contenidoVistas."funcionarios".self::$nomenclatura;
					    break;

			    		case "tramitesRealizados":
					        require_once self::$vista.self::$contenidoVistas."tramitesRealizados".self::$nomenclatura;
					    break;

			    		case "tramitesRealizados2":
					        require_once self::$vista.self::$contenidoVistas."tramitesRealizados2".self::$nomenclatura;
					    break;

			    		case "tramitesRealizados3":
					        require_once self::$vista.self::$contenidoVistas."tramitesRealizados3".self::$nomenclatura;
					    break;

			    		case "tramitesNegados":
					        require_once self::$vista.self::$contenidoVistas."tramitesNegados".self::$nomenclatura;
					    break;

		    			case "tramitesNegados2":
					        require_once self::$vista.self::$contenidoVistas."tramitesNegados2".self::$nomenclatura;
					    break;

		    			case "tramitesNegados3":
					        require_once self::$vista.self::$contenidoVistas."tramitesNegados3".self::$nomenclatura;
					    break;

	    				case "deportistas":
					        require_once self::$vista.self::$contenidoVistas."deportistas".self::$nomenclatura;
					    break;

	    				case "organismos":
					        require_once self::$vista.self::$contenidoVistas."organismos".self::$nomenclatura;
					    break;

	    				case "proyectosAdmin":
					        require_once self::$vista.self::$contenidoVistas."proyectosAdmin".self::$nomenclatura;
					    break;
					    
	    				case "datosGeneralesModificaciones":
					        require_once self::$vista.self::$contenidoVistas."datosGeneralesModificaciones".self::$nomenclatura;
					    break;

	    				case "documentosAnexosEdicion":
					        require_once self::$vista.self::$contenidoVistas."documentosAnexosEdicion".self::$nomenclatura;
					    break;					    

	    				case "directorRecomendado":
					        require_once self::$vista.self::$contenidoVistas."directorRecomendado".self::$nomenclatura;
					    break;		

	    				case "subseRecomendado":
					        require_once self::$vista.self::$contenidoVistas."subseRecomendado".self::$nomenclatura;
					    break;		

	    				case "secretariaComite":
					        require_once self::$vista.self::$contenidoVistas."secretariaComite".self::$nomenclatura;
					    break;	

					    case "tramitesFirmar":
					        require_once self::$vista.self::$contenidoVistas."tramitesFirmar".self::$nomenclatura;
					    break;

					    case "datosGeneralesPrincipal":
					        require_once self::$vista.self::$contenidoVistas."datosGeneralesPrincipal".self::$nomenclatura;
					    break;
					    
					    case "proyectoCrear":
					        require_once self::$vista.self::$contenidoVistas."proyectoCrear".self::$nomenclatura;
					    break;

					    case "tramitesFirmarSubsess":
					        require_once self::$vista.self::$contenidoVistas."tramitesFirmarSubsess".self::$nomenclatura;
					    break;

					    case "firmasMinistros":
					        require_once self::$vista.self::$contenidoVistas."firmasMinistros".self::$nomenclatura;
					    break;

					    case "firmasCoordinadores":
					        require_once self::$vista.self::$contenidoVistas."firmasCoordinadores".self::$nomenclatura;
					    break;

					    case "firmasFuncionarios":
					        require_once self::$vista.self::$contenidoVistas."firmasFuncionarios".self::$nomenclatura;
					    break;

					    case "firmasDirectores":
					        require_once self::$vista.self::$contenidoVistas."firmasDirectores".self::$nomenclatura;
					    break;

					    case "creacionComponentes":
					        require_once self::$vista.self::$contenidoVistas."creacionComponentes".self::$nomenclatura;
					    break;

					    
					    case "patrocinador":
					        require_once self::$vista.self::$contenidoVistas."patrocinador".self::$nomenclatura;
					    break;
					    
					   case "subsesRegistros":
					        require_once self::$vista.self::$contenidoVistas."subsesRegistros".self::$nomenclatura;
					    break;

					   case "proyectosCertificarCoordinador":
					        require_once self::$vista.self::$contenidoVistas."proyectosCertificarCoordinador".self::$nomenclatura;
					    break;

					   case "secretariaComiteCertifica":
					        require_once self::$vista.self::$contenidoVistas."secretariaComiteCertifica".self::$nomenclatura;
					    break;

					   case "reporteriaGeneral":
					        require_once self::$vista.self::$contenidoVistas."reporteriaGeneral".self::$nomenclatura;
					    break;

					   case "datosGeneralesModificacionesRectificaciones":
					        require_once self::$vista.self::$contenidoVistas."datosGeneralesModificacionesRectificaciones".self::$nomenclatura;
					    break;

					   case "modificaciones":
					        require_once self::$vista.self::$contenidoVistas."modificaciones".self::$nomenclatura;
					    break;

					   case "tramitesCoordinador":
					        require_once self::$vista.self::$contenidoVistas."tramitesCoordinador".self::$nomenclatura;
					    break;

					   case "directoresComponentes":
					        require_once self::$vista.self::$contenidoVistas."directoresComponentes".self::$nomenclatura;
					    break;

					    case "salir":
					        require_once self::$vista.self::$contenidoVistas."salir".self::$nomenclatura;
					    break;
					    
					}

				}else{

					require_once self::$vista.self::$contenidoVistas.$this->rutaInicial.self::$nomenclatura;

				}


			}			
			
			/*=====  End of Contenidos  ======*/
			/*======================================
			=            Footer seccion            =
			======================================*/
			
			public function plantillaFooter(){

				if($_GET["ruta"]!="datosGenerales" && $_GET["ruta"]!="proyectosUsuarios" && $_GET["ruta"]!="datosGeneralesPrincipal" && $_GET["ruta"]!="proyectoCrear" && !isset($_GET["ruta"]) && $_GET["ruta"]!="ingreso"){

					// require_once self::$vista.self::$vistaGeneral.self::$footer.self::$nomenclatura;
					
				}

			}	
			
			/*=====  End of Footer seccion  ======*/

	}