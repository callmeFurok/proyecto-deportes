<?php

	$objeto= new usuario();
	$usuario=$objeto->usuarioCtr();
	$usuarioFuncionario=$objeto->ctrFuncionarios();

	$arrayUsuario = explode("___", $usuario);
	$arrayUsuarioFuncionario = explode("___", $usuarioFuncionario);


	$menu= new plantilla();

	$variableRequestMenu= $_SERVER['REQUEST_URI'];


?>

<!--=======================================
=            Sección principal            =
========================================-->

<body id="top" style="border:none;">

	<!--====================================
	=            Redes sociales            =
	=====================================-->
<!-- 	<div class="wrapper row0 navar__realizados">

	  <div id="topbar" class="clear">  -->

	  	<!--====================================
	  	=            Línea del Head            =
	  	=====================================-->
	  	
<!-- 	  	<div class="fl_left imagen__movibles">

	      <ul class="nospace inline">
	        	<img class="img-fluid" src="images/imagen1.1.png">
	      	</ul>

	    </div>
	  	 -->
	  	<!--====  End of Línea del Head  ====-->
<!-- 	  	

	  </div>

	</div> -->
	
	
	<!--====  End of Redes sociales  ====-->
	
	<!--=======================================
	=            Menús Utilitarios            =
	========================================-->
	<div>

		<nav id="mainav" class="clear"> 

			<ul class="clear" style="display: block!important;">


				
				<li>

					<!--==================================
					=            Menú Usuario            =
					===================================-->

					<?php if ($arrayUsuario[0]==2): ?>

						 <!-- <a class="nombre__usuario" disabled="">Usuario:&nbsp;<?= $arrayUsuario[3]; ?></a> -->

						 <!--=====================================
						 =            Valores ocultos            =
						 ======================================-->
						 
						 <input type="hidden" name="idRoles" id="idRoles" value="<?= $arrayUsuario[0]; ?>">

						 <input type="hidden" name="idUsuario" id="idUsuario" value="<?= $arrayUsuario[3]; ?>">

						 <input type="hidden" name="emailSolicitante" id="emailSolicitante" value="<?= $arrayUsuario[10]; ?>">
						 
						 <!--====  End of Valores ocultos  ====-->
						 
						
					<?php endif ?>

					<?php if ($arrayUsuario[0]==3): ?>

						 <!-- <a class="nombre__usuario" disabled="">Usuario:&nbsp;<?= $arrayUsuario[4] ?></a> -->

						 <!--=====================================
						 =            Valores ocultos            =
						 ======================================-->

						 <input type="hidden" name="idRoles" id="idRoles" value="<?= $arrayUsuario[0]; ?>">
						 
						 <input type="hidden" name="idUsuario" id="idUsuario" value="<?= $arrayUsuario[3]; ?>">

						 <input type="hidden" name="emailSolicitante"id="emailSolicitante" value="<?= $arrayUsuario[12]; ?>">
						 
						 <!--====  End of Valores ocultos  ====-->
						 
						
					<?php endif ?>

					<!--====  End of Menú Usuario  ====-->

					<!--===========================================
					=            Opciones Funcionarios            =
					============================================-->
					
					<?php if (!empty($usuarioFuncionario)): ?>

						<!-- <a class="nombre__usuario" disabled="">Usuario:&nbsp;<?= $arrayUsuarioFuncionario[1]." ". $arrayUsuarioFuncionario[2]; ?></a> -->


						 <!--=====================================
						 =            Valores ocultos            =
						 ======================================-->

						 <input type="hidden" name="idUsuario" id="idUsuario" value="<?= $arrayUsuarioFuncionario[0]; ?>">

						  <input type="hidden" name="nombresApellidosFuncionarios" id="nombresApellidosFuncionarios" value="<?= $arrayUsuarioFuncionario[1]." ". $arrayUsuarioFuncionario[2]; ?>">

						 <input type="hidden" name="fisicamenteEstructura" id="fisicamenteEstructura" value="<?= $arrayUsuarioFuncionario[3]; ?>">

						 <input type="hidden" name="personaCargo" id="personaCargo" value="<?= $arrayUsuarioFuncionario[4]; ?>">

						 <input type="hidden" name="zonal" id="zonal" value="<?= $arrayUsuarioFuncionario[5]; ?>">

						 <input type="hidden" name="idRol" id="idRol" value="<?= $arrayUsuarioFuncionario[6]; ?>">

						 <input type="hidden" name="email" id="email" value="<?= $arrayUsuarioFuncionario[7]; ?>">

						 <input type="hidden" name="emailFuncionarios" id="emailFuncionarios" value="<?= $arrayUsuarioFuncionario[7]; ?>">

						 <input type="hidden" name="rolFuncionarios" id="rolFuncionarios" value="<?= $arrayUsuarioFuncionario[6]; ?>">
						 
						 <!--====  End of Valores ocultos  ====-->

						
					<?php endif ?>
					
					<!--====  End of Opciones Funcionarios  ====-->
					



				</li>				
				
						

				<!--========================================
				=            Maquetando el menú            =
				=========================================-->
				
				 <li class="elementos__li__flex">

					<?php

						$menu->disparadorMenu();

					?>

					<?php if (($arrayUsuarioFuncionario[3]=='24' && $arrayUsuarioFuncionario[6]=='7') || ($arrayUsuarioFuncionario[3]=='26' && $arrayUsuarioFuncionario[6]=='7') || ($arrayUsuarioFuncionario[3]=='1' && $arrayUsuarioFuncionario[6]=='4')  || $arrayUsuarioFuncionario[6]=='5' || ($arrayUsuarioFuncionario[8]=='A' && $arrayUsuarioFuncionario[6]=='3') || ($arrayUsuarioFuncionario[3]=='3' && $arrayUsuarioFuncionario[6]=='4') || ($arrayUsuarioFuncionario[3]=='8' && $arrayUsuarioFuncionario[6]=='2')): ?>
						
						<!-- <a href="tramitesFirmar">Trámites para firmar</a> -->

					<?php endif ?>


				</li>
				
				<!--====  End of Maquetando el menú  ====-->
			

			</ul>

	    </nav>

    </div>
 
    <!--====  End of Menús Utilitarios  ====-->
	
