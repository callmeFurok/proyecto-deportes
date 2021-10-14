<!--==========================================
=            Variables Alineación            =
===========================================-->

<?php $objeto= new usuario();?>

<?php $alineacion=$objeto->ctrAlineacion($codigoRenderizados);?>

<?php $arrayAlineacion = explode("___", $alineacion);?>

<!--====  End of Variables Alineación  ====-->

<li class="nav-item">

    <a id="datosIniciales" href="#" class="nav-link active__menu">

        <p>Modificar</p>

    </a>

</li>

