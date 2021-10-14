<?php $objeto= new usuario();?>

<?php $usuarioFuncionario=$objeto->ctrFuncionarios();?>

<?php $arrayUsuarioFuncionario = explode("___", $usuarioFuncionario);?>


<?php if ($arrayUsuarioFuncionario[3]=='22' || $arrayUsuarioFuncionario[3]=='15'): ?>
    
<li class="nav-item tamanio__navegacion__dasboards">

     <a href="directoresComponentes" class="nav-link">

        <p>Trámites Generados</p>

     </a>

</li>

<?php else: ?>
    
<li class="nav-item tamanio__navegacion__dasboards">

     <a href="directores" class="nav-link">

        <p>Trámites Generados</p>

     </a>

</li>

<?php endif ?>

<?php if ($arrayUsuarioFuncionario[3]!='22' && $arrayUsuarioFuncionario[3]!='15'): ?>
    
<li class="nav-item tamanio__navegacion__dasboards">

     <a href="directorRecomendado" class="nav-link">

        <p>Trámites Recomendados</p>

     </a>

</li>

<?php endif ?>


<?php if (($arrayUsuarioFuncionario[3]=='24' && $arrayUsuarioFuncionario[6]=='7') || ($arrayUsuarioFuncionario[3]=='26' && $arrayUsuarioFuncionario[6]=='7') || ($arrayUsuarioFuncionario[3]=='1' && $arrayUsuarioFuncionario[6]=='4')  || $arrayUsuarioFuncionario[6]=='5' || ($arrayUsuarioFuncionario[8]=='A' && $arrayUsuarioFuncionario[6]=='3') || ($arrayUsuarioFuncionario[3]=='3' && $arrayUsuarioFuncionario[6]=='4') || ($arrayUsuarioFuncionario[3]=='8' && $arrayUsuarioFuncionario[6]=='2')): ?>
						
<li class="nav-item tamanio__navegacion__dasboards">

     <a href="firmasDirectores" class="nav-link">

       	<p>Trámites Firmar</p>

     </a>

</li>

<?php endif ?>

<li class="nav-item tamanio__navegacion__dasboards">

     <a href="reporteriaGeneral" class="nav-link" target="_blank">

        <p>Reportería</p>

     </a>

</li>


<li class="nav-item tamanio__navegacion__dasboards">

     <a href="salir" class="nav-link">

       	<p>Salir</p>

     </a>

</li>

