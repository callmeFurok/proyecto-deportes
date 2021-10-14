<?php $objeto= new usuario();?>

<?php $usuarioFuncionario=$objeto->ctrFuncionarios();?>

<?php $arrayUsuarioFuncionario = explode("___", $usuarioFuncionario);?>


<li class="nav-item tamanio__navegacion__dasboards">

     <a href="funcionarios" class="nav-link">

       	<p>Trámites Generados</p>

     </a>

</li>

<?php if (($arrayUsuarioFuncionario[3]=='24' && $arrayUsuarioFuncionario[6]=='7') || ($arrayUsuarioFuncionario[3]=='26' && $arrayUsuarioFuncionario[6]=='7') || ($arrayUsuarioFuncionario[3]=='1' && $arrayUsuarioFuncionario[6]=='4')  || $arrayUsuarioFuncionario[6]=='5' || ($arrayUsuarioFuncionario[8]=='A' && $arrayUsuarioFuncionario[6]=='3') || ($arrayUsuarioFuncionario[3]=='3' && $arrayUsuarioFuncionario[6]=='4') || ($arrayUsuarioFuncionario[3]=='8' && $arrayUsuarioFuncionario[6]=='2')): ?>
						
<li class="nav-item tamanio__navegacion__dasboards">

     <a href="firmasFuncionarios" class="nav-link">

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

