<?php

	$objeto= new usuario();

	/*================================
	=            Usuarios            =
	================================*/
	
	$usuario=$objeto->usuarioCtr();
	$arrayUsuario = explode("___", $usuario);
	
	$usuarioFuncionarios=$objeto->ctrFuncionarios();
	$arrayUsuarioFuncionarios = explode("___", $usuarioFuncionarios);

	/*=====  End of Usuarios  ======*/
	
?>


<!--=====================================
=            Datos Generales            =
======================================-->

<div class="user-panel mt-3 pb-3 mb-3 d-flex flex-column align-items-center justify-content-center">

	<div class="row row__informacion__personal">

	    <div class="info col-xs-12 col-sm-12 estilo__separacion">

	        <a href="#" class="d-block tamanio__navegacion__dasboards">BIENVENIDO</a>

	        <br>
	        <br>

	    </div>

	    <?php if ($arrayUsuario[0]==3 && !empty($arrayUsuario[0])): ?>

	    <div class="info col-xs-12 col-sm-12 estilo__separacion d-flex align-content-stretch flex-wrap">

	    	<?php  $arrayUsuarios = explode(" ", $arrayUsuario[4]);?>

	       <a href="#" class="d-block tamanio__navegacion__dasboards"><?=$arrayUsuarios[2]." ".$arrayUsuarios[3]?></a>

	    </div>

	    <div class="info col-xs-12 col-sm-12 estilo__separacion d-flex align-content-stretch flex-wrap">

	    	<a href="#" class="d-block tamanio__navegacion__dasboards"><?=$arrayUsuarios[0]." ".$arrayUsuarios[1]?></a>

	    </div>

	    <?php endif ?>


	    <?php if ($arrayUsuario[0]==2 && !empty($arrayUsuario[0])): ?>

	    <div class="info col-xs-12 col-sm-12 estilo__separacion d-flex align-content-stretch flex-wrap">

	       <a href="#" class="d-block tamanio__navegacion__dasboards"><?=$arrayUsuarios[4]?></a>

	    </div>

	    <?php endif ?>

	    <?php if (!empty($arrayUsuarioFuncionarios[0])): ?>


	    <div class="info col-xs-12 col-sm-12 estilo__separacion d-flex align-content-stretch flex-wrap">

	       <a href="#" class="d-block tamanio__navegacion__dasboards"><?=$arrayUsuarioFuncionarios[1]."<br><br><br>".$arrayUsuarioFuncionarios[2]?></a>

	    </div> 

	    <br>
	    	
	    <div class="info col-xs-12 col-sm-12 estilo__separacion d-flex align-content-stretch flex-wrap">

	      PEFIL FUNCIONARIO

	    </div> 

		<!--===============================
		=            Elementos            =
		================================-->
		<input type="hidden" name="idUsuario" id="idUsuario" value="<?= $arrayUsuarioFuncionarios[0]; ?>">
		<!--====  End of Elementos  ====-->


	    <?php endif ?>

	</div>

</div>


<!--====  End of Datos Generales  ====-->

