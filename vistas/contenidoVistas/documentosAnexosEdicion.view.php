<?php

  $plantilla= new plantilla();

  $variableRequest= $_SERVER['REQUEST_URI'];

  $arrayResquest= explode("?___codigoEditar=", $variableRequest);

  $codigoEditar=$arrayResquest[1];

  $objeto= new usuario();

  $usuario=$objeto->usuarioCtr();

  $rucReconocidos=$objeto->ctrOrganismoRuc();

  $arrayUsuario = explode("___", $usuario);

  $datosGenerales=$objeto->ctrDatosGenerales();
  $arrayDatosGenerales = explode("___", $datosGenerales);


  if ($arrayUsuario[0]==2){

    $codigo=$arrayUsuario[11];

  }else{

    $codigo=$arrayUsuario[13];

  }

/*=================================
=            Proyectos            =
=================================*/

$proyectosDatosGenerales=$objeto->ctrProyectosFunciones($codigoEditar);
$arrayProyectosDatos = explode("___", $proyectosDatosGenerales);

if (!empty($arrayProyectosDatos[0])) {
  $acumladorProyecto=12.50;
}



/*=====  End of Proyectos  ======*/

$conexionRecuperada= new conexion();
$conexionEstablecida=$conexionRecuperada->cConexion();  


/*==================================
=            Base legal            =
==================================*/

$query="SELECT idBaseLegal FROM pro_baselegal WHERE codigoProyecto='$codigoEditar';";
$resultado = $conexionEstablecida->query($query);

while($registro = $resultado->fetch()) {

    $idBaseLegal=$registro['idBaseLegal'];

}

if (!empty($idBaseLegal)) {
  $acumladorBaselegal=12.50;
}


/*=====  End of Base legal  ======*/

/*=======================================
=            Caracterización            =
=======================================*/

$alineacionEstrategica=$objeto->ctrAlineacionEstrategica($codigoEditar);
$arrayAlineacionEstrategicas = explode("___", $alineacionEstrategica);

if (!empty($arrayAlineacionEstrategicas[0])) {
  $acumladorCaracterizacion=12.50;
}

/*=====  End of Caracterización  ======*/

/*==============================================
=            Alineación estrategica            =
==============================================*/

$alineacion=$objeto->ctrAlineacion($codigoEditar);
$arrayAlineacion = explode("___", $alineacion);

if (!empty($arrayAlineacion[0])) {
  $acumladorAlineacion=12.50;
}

/*=====  End of Alineación estrategica  ======*/

/*=======================================
=            Aporte proyecto            =
=======================================*/

$aporteProyecto=$objeto->ctrAporteProyecto($codigoEditar);
$arrayAporteProyecto = explode("___", $aporteProyecto);


if (!empty($arrayAporteProyecto[0])) {
  $acumladorAporte=12.50;
}


/*=====  End of Aporte proyecto  ======*/

/*=============================
=            Metas          s  =
=============================*/

$query2="SELECT idMetas FROM pro_metas WHERE codigo='$codigoEditar';";
$resultado2 = $conexionEstablecida->query($query2);


while($registro2 = $resultado2->fetch()) {

  $idMetas=$registro2['idMetas'];

}


if (!empty($idMetas)) {
  $acumladorMetas=12.50;
}

/*=====  End of Metas  ======*/

/*=====================================
=            Beneficiarios            =
=====================================*/

$query3="SELECT idBeneficiariosDirectos FROM pro_beneficiarios_directos WHERE codigo='$codigoEditar';";
$resultado3 = $conexionEstablecida->query($query3);


while($registro3 = $resultado3->fetch()) {

  $idBeneficiariosDirectos=$registro3['idBeneficiariosDirectos'];

}

if (!empty($idBeneficiariosDirectos)) {
  $acumladorBeneficiarios=12.50;
}

/*=====  End of Beneficiarios  ======*/

/*===================================
=            Metodología           =
===================================*/

$query4="SELECT idDescripcionActividades FROM pro_descripcionactividades WHERE codigo='$codigoEditar';";
$resultado4 = $conexionEstablecida->query($query4);


while($registro4 = $resultado4->fetch()) {

  $idDescripcionActividades=$registro4['idDescripcionActividades'];

}

if (!empty($idDescripcionActividades)) {
  $acumladorMetodologia=12.50;
}

/*=====  End of Metodología  ======*/

$sumadorAcumulador=0;

$sumadorAcumulador=floatval($acumladorProyecto)+floatval($acumladorBaselegal)+floatval($acumladorCaracterizacion)+floatval($acumladorAlineacion)+floatval($acumladorAporte)+floatval($acumladorMetas)+floatval($acumladorBeneficiarios)+floatval($acumladorMetodologia);

$sumadorAcumulador=number_format($sumadorAcumulador, 2);

?>


<!--=======================================
=            Secciòn Principal            =
========================================-->

<div class="wrapper row3 clase__tabs">

  <div class="container">

  <div class="row">

    <div class="col-sm-12 col-xs-12 text-center">

      <!--=======================================
      =            Barra de progreso            =
      ========================================-->

      <span class="letra__avance">AVANCE</span>&nbsp;&nbsp;&nbsp;<progress id="progresoProyecto" max="100" style="height:30px;" value="<?=$sumadorAcumulador?>"></progress><span class="avance__proyecto">&nbsp;&nbsp;<?=$sumadorAcumulador?>&nbsp;%</span>
      
      <!--====  End of Barra de progreso  ====-->

    </div>

  </div>

  <br>

  <div class="codigo__principal">


    CÓDIGO DE PROYECTO <?=$codigoEditar?>

    <input type="hidden" id="codigoProyecto" name="codigoProyecto" value="<?=$codigoEditar?>" />

  </div>

  <br>

  <div class="tab-group rates-page-tabs">

      <ul class="nav nav-tabs responsive tabs" role="tablist" style="background:#e1f5fe;">

          <li role="presentation">
            <a href="#documentosAdicionales" aria-controls="documentosAdicionales" role="tab" data-toggle="tab" class="centrar__informacion__menus">PROYECTO<br><span class="letras__precionar">DOCUMENTOS<br><span class="letras__precionar">Ingresar documentos adicionales del proyecto</span></a>
          </li>

      </ul>

      <div class="tab-content responsive">

        <!--===============================
        =            Sección 2            =
        ================================-->
        
        <div role="tabpanel" class="tab-pane" id="documentosAdicionales">
          

          <!--===================================================
          =            Sección principal formularios            =
          ====================================================-->

          <?php 

            $plantilla->componentesProyecto(11);

          ?>                   
          
          <!--====  End of Sección principal formularios  ====-->
          

        </div>       
        
        <!--====  End of Sección 2  ====-->
        

      </div>

  </div>

  </div>

</div>


<!--====  End of Secciòn Principal  ====-->
