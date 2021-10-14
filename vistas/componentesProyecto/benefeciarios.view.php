 <?php

  $objeto= new usuario();

  $usuario=$objeto->usuarioCtr();

  $arrayUsuario = explode("___", $usuario);


  if ($arrayUsuario[0]==2){

    $codigo=$arrayUsuario[11];

  }else{

    $codigo=$arrayUsuario[13];

  }
  /*==============================
  =            Codigo            =
  ==============================*/
  
  $variableRequest= $_SERVER['REQUEST_URI'];

  $arrayResquest= explode("?___codigoEditar=", $variableRequest);

  $codigoEditar=$arrayResquest[1];

  if (!empty($codigoEditar)) {
   
    $codigo=$codigoEditar;

  }
  
  /*=====  End of Codigo  ======*/

?>

<?php $instancia=$objeto->ctrInstancia($codigo);?>

<!--================================================
=            Componentes seleccionables            =
=================================================-->
<?php $array = explode("____", $instancia);?>

<?php

  for ($i=0; $i < count($array); $i++) { 

    if($array[$i]=="altoRendimientoDiscapacidad"){

      $consulta="si";

    }

  }

?>


<!--====  End of Componentes seleccionables  ====-->

<!--==================================================
=            Componentes seleccioanbles 2            =
===================================================-->

<?php $instancia2=$objeto->ctrInstanciaTraidasComparadores($codigo);?>

<?php $arrayInstancias = explode("____", $instancia2);?>

<!--====  End of Componentes seleccioanbles 2  ====-->

<?php if (($arrayInstancias[0]!="Técnico" || $arrayInstancias[2]!="Tecnológico") && $arrayInstancias[1]=="Infraestructura"): ?>

  <input type="hidden" name="indicadorTecnico" id="indicadorTecnico" value="si"/>

<?php else: ?>
  
  <input type="hidden" name="indicadorTecnico" id="indicadorTecnico" value="no"/>

<?php endif ?>

<div class="panel-body">

	<input type="hidden" id="codigoBeneficiarios" name="codigoBeneficiarios" value="<?php if ($arrayUsuario[0]==2): ?><?= $arrayUsuario[11]; ?><?php endif ?><?php if ($arrayUsuario[0]==3): ?><?= $arrayUsuario[13]; ?><?php endif ?>" />

  <div class="row">

    <div class="col col-12 text-center font-weight-titulo">

        BENEFICIARIOS

    </div>

  </div>

  <div class="row">   

    <div class="col-sm-8 col-xs-8 col-8">

      <div class="rotulo__referencias">Beneficiarios directos</div>
                    
    </div>

    <div class="col-sm-2 col-xs-2 col-2" data-toggle="tooltip" title="Si desea añadir una ubicación dar clic en el botón de añadir">

      <button id="anadirBeneficiarios" name="anadirBeneficiarios" class="anadir__cosas btn btn-primary"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;AÑADIR&nbsp;&nbsp;</button>

    </div>

    <div class="col-sm-2 col-xs-2 col-2 text-center">

      <span class="cursores__modales" data-toggle="modal" data-target="#modalBeneficiariosDirectos"><i class="fas fa-question-circle"></i><br><div class="letras__precionar">Click para obtener<br>mayor información</div></span>
                    
    </div>

  </div>   


   <div class="row" style="margin-top: 2em;"> 

   		<table id="beneficiariosDirectos" class="table-responsive-sm">

			<thead>

				<tr>
					
					<th class="padding__celdas">Beneficiarios directos</th>
          <th class="padding__celdas">Total</th>
					<th class="padding__celdas">Eliminar</th>

				</tr>

			</thead>

			<tbody>

			</tbody>

			<tbody class="beneficiarios__contenedor__body">

			</tbody>

		</table>

	</div>

  <?php if($consulta=="si"): ?>

  <div class="row">   


    <div class="col-sm-8 col-xs-8 col-8">

      <div class="rotulo__referencias">Para deporte adaptado y/o paraolímpico:</div>
                    
    </div>

    <div class="col-sm-2 col-xs-2 col-2" data-toggle="tooltip" title="Si desea añadir una ubicación dar clic en el botón de añadir">

      <button id="anadirParalimpico" name="anadirParalimpico" class="anadir__cosas btn btn-primary"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Añadir&nbsp;&nbsp;</button>

    </div>

    <div class="col-sm-2 col-xs-2 col-2 text-center">

      <span class="cursores__modales" data-toggle="modal" data-target="#modalBeneficiariosDirectos"><i class="fas fa-question-circle"></i><br><div class="letras__precionar">Click para obtener<br>mayor información</div></span>
                    
    </div>

  </div>   

   <div class="row" style="margin-top: 2em;"> 

   		<table id="discapacidadBeneficiarios" class="table-responsive-sm">

			<thead>

				<tr>
					
					<th rowspan="2" class="padding__celdas">Beneficiarios directos</th>
					<th colspan="6" rowspan="1" class="padding__celdas">Tipo de discapacidad</th>
					<th rowspan="2" class="padding__celdas">Total</th>
					<th rowspan="2" class="padding__celdas">Eliminar</th>

				</tr>

				<tr>

					<td class="enfacis__celdas padding__celdas">Visual</td>
					<td class="enfacis__celdas padding__celdas">Auditiva</td>
					<td class="enfacis__celdas padding__celdas">Multisensorial</td>
					<td class="enfacis__celdas padding__celdas">Intelectual</td>
					<td class="enfacis__celdas padding__celdas">Física</td>
					<td class="enfacis__celdas padding__celdas">Psíquica</td>

				</tr>

			</thead>

			<tbody>

			</tbody>

			<tbody class="discapacidad__contenedor__body">

			</tbody>

		</table>

	</div>

		
	<?php endif ?>


  <?php if ($arrayInstancias[0]=="Técnico"): ?>
    
<!--   <div class="row">   

    <div class="col-sm-8 col-xs-8 col-8">

      <div class="rotulo__referencias">Beneficiarios indirectos</div>
                    
    </div>

    <div class="col-sm-2 col-xs-2 col-2" data-toggle="tooltip" title="Si desea añadir una ubicación dar clic en el botón de añadir">

      <button id="anadirBeneficiariosIndirectos" name="anadirBeneficiariosIndirectos" class="anadir__cosas btn btn-primary"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Añadir&nbsp;&nbsp;</button>

    </div>

    <div class="col-sm-2 col-xs-2 col-2 text-center">

      <span class="cursores__modales" data-toggle="modal" data-target="#modalBeneficiariosIndirectos"><i class="fas fa-question-circle"></i><br><div class="letras__precionar">Click para obtener<br>mayor información</div></span>
                    
    </div>

  </div>   

   <div class="row" style="margin-top: 2em;"> 

      <table id="beneficiariosIndirectos" class="table-responsive-sm">

      <thead>

        <tr>
          
          <th class="padding__celdas">Beneficiarios indirectos</th>
          <th class="padding__celdas">Total</th>
          <th class="padding__celdas">Justificación cuantitativa</th>
          <th class="padding__celdas">Eliminar</th>

        </tr>

      </thead>

      <tbody>

      </tbody>

      <tbody class="beneficiariosIndirectos__contenedor__body">

      </tbody>

    </table>

  </div> -->

  <?php endif ?>

  <br>

  <div class="row">

    <div class="col-xs-12 col-sm-12 text-center">

      <button id="enviarBeneficiarios" name="enviarBeneficiarios" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;GUARDAR</button>

      <div class="enviarDatosGenerales__reload"></div>

    </div>

  </div>


</div>


<!--=============================
=            Modales            =
==============================-->

<div class="modal fade" id="modalBeneficiariosDirectos">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold;">BENEFICIARIOS DIRECTOS</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body body__preguntas">

         <div>
          Son las personas que se benefician directamente de la ejecución del proyecto. Ejemplo: deportistas, estudiantes.
         </div>

      </div>


    </div>

  </div>

</div>


<div class="modal fade" id="modalBeneficiariosIndirectos">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold;">BENEFICIARIOS INDIRECTOS</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body body__preguntas">

         <div>
          Son aquellas personas que se benefician de forma indirecta con el desarrollo del proyecto. Ejemplo: cuerpo técnico, médicos, delegados y/o pobladores que se ubican en zonas de influencia del objeto de financiamiento.
         </div>

      </div>


    </div>

  </div>

</div>



<!--====  End of Modales  ====-->
