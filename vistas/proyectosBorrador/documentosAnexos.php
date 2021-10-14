<?php

  $objeto= new usuario();

  $usuario=$objeto->usuarioCtr();
  $rucReconocidos=$objeto->ctrOrganismoRuc();

  $arrayUsuario = explode("___", $usuario);

  $menu= new plantilla();


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

  $documentosAnexos=$objeto->ctrDocumentosAnexos($codigo);
  $documentosAnexosArray = explode("___", $documentosAnexos);


/*============================================
=            Infras Seleccionados            =
============================================*/

$infrasTrusSelects=$objeto->ctrInfrasSeleccionados($codigo);

/*=====  End of Infras Seleccionados  ======*/

?>

<style>

@media (max-width: 750px) {

  .formulario__ingreso{
    width: 100%;
  }

  .btn-signup {
      width: 50%;
  }

  .moviendo__externamente{
    position: relative;
    left: -15%;
  }


}

</style>

<!--=======================================
=            Variables Ocultas            =
========================================-->
<?php if ($arrayUsuario[0]==2): ?>
  <input type="hidden" class="codigo__estilizados" name="codigoUsuarios" id="codigoUsuarios" value="<?= $arrayUsuario[11]; ?>" disabled="">               
<?php endif ?>
<?php if ($arrayUsuario[0]==3): ?>
  <input type="hidden" class="codigo__estilizados" name="codigoUsuarios" id="codigoUsuarios" disabled="" value="<?= $arrayUsuario[13]; ?>">
 <?php endif ?>

 <input type="hidden" id="idUsuario" name="idUsuario"  value="<?=$arrayUsuario[3];?>" />

 <input type="hidden" id="documentosAnexosVariable" name="documentosAnexosVariable" value="<?=$documentosAnexosArray[0];?>">

<!--====  End of Variables Ocultas  ====-->


<input type="hidden" name="tipoDeportistas" id="tipoDeportistas" value="<?= $arrayUsuario[2]; ?>">

<div class="wrapper row3">

  <?php if (empty($codigoEditar)): ?>

  <div class="contenido__general ocultando__ingresados__documentos__anexos">
    
  <?php else: ?>

  <div class="contenido__general">
    
  <?php endif ?>

  <br>

  <table>

    <thead>

      <tr>

        <td style="font-weight:bold;font-size:14px; vertical-align:middle; color:black;">
          En caso de querer cambiar los documentos seleccionar en la opción
        </td>

        <td>

          <center>

            <input type="checkbox" id="mostrarNuevas" name="mostrarNuevas" class="check__estilos__lineas"/>

          </center>

        </td>

      </tr>

      <tr>
        <th colspan="2" class="padding__envios">DOCUMENTOS ANEXOS INGRESADOS</th>
      </tr>

      <tr>

        <th>

          DETALLE

        </th>


        <th>

          DOCUMENTO

        </th>

      </tr>

    </thead>

    <tbody>


      <?php if (!empty($documentosAnexosArray[8])): ?>
        
        <tr>

          <td style="width:70%;">
              
            PROYECTO

          </td>

          <td>

            <a href="documentos/proyectos/<?=$documentosAnexosArray[8];?>.pdf" target="_blank" style="color:black;"><?=$documentosAnexosArray[8];?></a>

          </td>

        </tr>

      <?php endif ?>

      <?php if (!empty($documentosAnexosArray[1])): ?>
        
        <tr>

          <td style="width:70%;">
              
            CURRICULUM DEPORTIVO

          </td>

          <td>

            <a href="documentos/curriculum/<?=$documentosAnexosArray[1];?>.pdf" target="_blank" style="color:black;"><?=$documentosAnexosArray[1];?></a>

          </td>

        </tr>

      <?php endif ?>


      <?php if (!empty($documentosAnexosArray[2])): ?>
        
        <tr>

          <td style="width:70%;">
              
            CERTIFICADO DE LA FEDERACIÓN

          </td>

          <td>

            <a href="documentos/certificadoDeportista/<?=$documentosAnexosArray[2];?>.pdf" target="_blank" style="color:black;"><?=$documentosAnexosArray[2];?></a>

          </td>

        </tr>

      <?php endif ?>

      <?php if (!empty($documentosAnexosArray[3])): ?>
        
        <tr>

          <td style="width:70%;">
              
            CERTIFICADO ORGANISMO SUPERIOR

          </td>

          <td>

            <a href="documentos/certificadoSuperior/<?=$documentosAnexosArray[3];?>.pdf" target="_blank" style="color:black;"><?=$documentosAnexosArray[3];?></a>

          </td>

        </tr>

      <?php endif ?>



      <?php if (!empty($documentosAnexosArray[4])): ?>
        
        <tr>

          <td style="width:70%;">
              
            SOLICITUD FEDERACIÓN

          </td>

          <td>

            <a href="documentos/solicitudCertificado/<?=$documentosAnexosArray[4];?>.pdf" target="_blank" style="color:black;"><?=$documentosAnexosArray[4];?></a>

          </td>

        </tr>

      <?php endif ?>

      <?php if (!empty($documentosAnexosArray[5])): ?>
        
        <tr>

          <td style="width:70%;">
              
            AVAL FEDERACIÓN

          </td>

          <td>

            <a href="documentos/avalFederacion/<?=$documentosAnexosArray[5];?>.pdf" target="_blank" style="color:black;"><?=$documentosAnexosArray[5];?></a>

          </td>

        </tr>

      <?php endif ?>

      <?php if (!empty($documentosAnexosArray[6])): ?>
        
        <tr>

          <td style="width:70%;">
              
            SOLICITUD AVAL

          </td>

          <td>

            <a href="documentos/solicitudAval/<?=$documentosAnexosArray[6];?>.pdf" target="_blank" style="color:black;"><?=$documentosAnexosArray[6];?></a>

          </td>

        </tr>

      <?php endif ?>


      <?php if (!empty($documentosAnexosArray[7])): ?>
        
        <tr>

          <td style="width:70%;">
              
            AVAL ORGANISMO SUPERIOR

          </td>

          <td>

            <a href="documentos/avalOrganismoSuperior/<?=$documentosAnexosArray[7];?>.pdf" target="_blank" style="color:black;"><?=$documentosAnexosArray[7];?></a>

          </td>

        </tr>

      <?php endif ?>

    </tbody>

  </table>


  </div>

  <div class="contenido__general ocultando__documentos__anexos">

      <br>

      <label class="documentos__anexos">
        CARGAR DOCUMENTOS ANEXOS
      </label>

    
      <?php if ($arrayUsuario[0]==3): ?>

        <!--==================================
        =            Certificados            =
        ===================================-->


        <?php if (!empty($infrasTrusSelects) && $infrasTrusSelects!=null): ?>

           <label class="label__formularios__2 contenedor__radios__labels__2" style="position:relative; left:5%;"><a href="documentosAnexos/componentesInfra.xlsx">Descargar formato</a></label>
          
           <label class="label__formularios__2 contenedor__radios__labels__2" style="position:relative; left:5%;">Cargar componentes Infraestructura</label>

           <input type="file" class="obligatorios__proyecto campos__proyectos" style="position:relative; left:5%;" name="anexosInfraestructuras" id="anexosInfraestructuras" />

        <?php else: ?>
          
           <a href="documentosAnexos/componentes.xlsx" style="position:relative; left:5%;">Descargar formato</a>

           <label class="label__formularios__2 contenedor__radios__labels__2" style="position:relative; left:5%;">Cargar componentes</label>

           <input type="file" class="obligatorios__proyecto campos__proyectos" style="position:relative; left:5%;" name="anexosComponentesTecnicos" id="anexosComponentesTecnicos" />


        <?php endif ?>

        
         <?php if ($arrayUsuario[2]=="noFederado"): ?>

           <label class="label__formularios__2 contenedor__radios__labels__2">* Cargar curriculum deportivo con los datos sustentados documentalmente y certificaciones que acrediten su trayectoria deportiva</label>

           <input type="file" class="obligatorios__proyecto campos__proyectos" name="curriculumDeportivoSegundo" id="curriculumDeportivoSegundo">
          
        <?php else: ?>

          <?php if ($arrayUsuario[2]!="profesional"): ?>

             <label class="label__formularios__2">* ¿Posee certificado de Federación?</label>
            
          <?php else: ?>

             <label class="label__formularios__2">* ¿Posee certificado de Federación o liga Profesional?</label>
            
          <?php endif ?>

         
          <div class="clase__contenedora" >

            <label class="label__formularios__2">Si</label>&nbsp;&nbsp;&nbsp;

            <input type="radio" name="certificadoFederaciones" class="estilos__radios carga__certificadoFederacion" value="si">

              
            <label class="label__formularios__2 separador__de__radios">No</label>&nbsp;&nbsp;&nbsp;

            <input type="radio" name="certificadoFederaciones" value="no" class="estilos__radios carga__certificadoFederacion">

          </div>
          
        <?php endif ?>       
        
        <!--====  End of Certificados  ====-->
        

      <?php endif ?>



      <!--============================
      =            Avales            =
      =============================-->
      
       <?php if ($arrayUsuario[0]==2 && $arrayUsuario[2]!="recreativo" && empty($rucReconocidos)): ?>

        <!--==================================
        =            Certificados            =
        ===================================-->
        
          <label class="label__formularios__2">* ¿Posee aval?</label>

          <div class="clase__contenedora" >

            <label class="label__formularios__2">Si</label>&nbsp;&nbsp;&nbsp;

            <input type="radio" name="avales" class="estilos__radios carga__avales" value="si">
              
            <label class="label__formularios__2 separador__de__radios">No</label>&nbsp;&nbsp;&nbsp;

            <input type="radio" name="avales" value="no" class="estilos__radios carga__avales">

          </div>
              
        <!--====  End of Certificados  ====-->
        
      <?php endif ?>
     
     <?php if ($arrayUsuario[0]==2 && $arrayUsuario[2]=="recreativo"): ?>
       
           <label class="label__formularios__2 contenedor__radios__labels__2 moviendo__externamente">* Cargar curriculum deportivo con los datos sustentados documentalmente y certificaciones que acrediten su trayectoria deportiva</label>

           <input type="file" class="obligatorios__proyecto campos__proyectos" name="curriculumDeportivoSegundo" id="curriculumDeportivoSegundo">

     <?php endif ?>
      
      <!--====  End of Avales  ====-->



      <!--==================================
      =            Certificados            =
      ===================================-->

      <?php if ($arrayUsuario[2]!="profesional"): ?>
        
        <label class="label__formularios__2 certificado__federativos ">* Cargar certificado de la federación</label>

        <input type="file" class="obligatorios__proyecto campos__proyectos certificado__federativos" name="certificadoFederacion" id="certificadoFederacion">

      <?php else: ?>
        
        <label class="label__formularios__2 certificado__federativos moviendo__externamente">* Cargar certificado de la federación o liga profesional</label>

        <input type="file" class="obligatorios__proyecto campos__proyectos certificado__federativos" name="certificadoFederacion" id="certificadoFederacion">

      <?php endif ?>
      

      <label class="label__formularios__2 oculto__razon">* ¿Por qué no tiene certificado?</label>

      <div class="clase__contenedora oculto__razon" >

          <?php if ($arrayUsuario[2]!="profesional"): ?>
            
            <label class="label__formularios__2 contenedor__radios__labels">Porque la federación nego la solicitud</label>&nbsp;&nbsp;&nbsp;

            <input type="radio" name="rechazoPorque" class="estilos__radios porque__no__tiene" value="si">

                
            <label class="label__formularios__2 separador__de__radios contenedor__radios__labels">Porque no tengo respuesta de la federación</label>&nbsp;&nbsp;&nbsp;

            <input type="radio" name="rechazoPorque" value="no" class="estilos__radios porque__no__tiene">

          <?php else: ?>
            
            <label class="label__formularios__2 contenedor__radios__labels">Porque federación o liga profesional nego la solicitud</label>&nbsp;&nbsp;&nbsp;

            <input type="radio" name="rechazoPorque" class="estilos__radios porque__no__tiene" value="si">

                
            <label class="label__formularios__2 separador__de__radios contenedor__radios__labels">Porque federación o liga profesional no responde aún</label>&nbsp;&nbsp;&nbsp;

            <input type="radio" name="rechazoPorque" value="no" class="estilos__radios porque__no__tiene">

          <?php endif ?>



      </div>


      <?php if ($arrayUsuario[2]!="profesional"): ?>
        
        <label class="label__formularios__2 certificado__organismo__superior contenedor__radios__labels__2 moviendo__externamente">Cargar la respuesta del organismo superior (Comité Olímpico Ecuatoriano, o Comité Paralímpico Ecuatoriano, o Federación Deportiva Nacional del Ecuador), de ser el caso</label>

        <input type="file" class="obligatorios__proyecto campos__proyectos certificado__organismo__superior" name="certificadoOrganismoSuperior" id="certificadoOrganismoSuperior">

        <label class="label__formularios__2 solicitud__federaciones contenedor__radios__labels__2 moviendo__externamente">* Cargar la solicitud de certificación realizada a la federación</label>

        <input type="file" class="obligatorios__proyecto campos__proyectos solicitud__federaciones" name="solicitudFederacion" id="solicitudFederacion">

      <?php else: ?>
        
        <label class="label__formularios__2 certificado__organismo__superior contenedor__radios__labels__2 moviendo__externamente">* Cargar respuesta de liga profesional o federacion</label>

        <input type="file" class="obligatorios__proyecto campos__proyectos certificado__organismo__superior" name="certificadoOrganismoSuperior" id="certificadoOrganismoSuperior">

        <label class="label__formularios__2 solicitud__federaciones contenedor__radios__labels__2 moviendo__externamente">* Cargar la solicitud de certificación realizada a la federación o liga profesional</label>

        <input type="file" class="obligatorios__proyecto campos__proyectos solicitud__federaciones" name="solicitudFederacion" id="solicitudFederacion">

      <?php endif ?>


     
      
      <!--====  End of Certificados  ====-->
      

      <!--============================
      =            Avales            =
      =============================-->
      
       <?php if ($arrayUsuario[0]==3 && $arrayUsuario[2]!="noFederado"): ?>

        <!--==================================
        =            Certificados            =
        ===================================-->

        <?php if ($arrayUsuario[2]!="profesional"): ?>
          
          <label class="label__formularios__2">* ¿Posee aval de la Federación?</label>

        <?php else: ?>

          <label class="label__formularios__2">* ¿Posee aval de la Federación o liga Profesional?</label>
          
        <?php endif ?>
        
          

          <div class="clase__contenedora" >

            <label class="label__formularios__2">Si</label>&nbsp;&nbsp;&nbsp;

            <input type="radio" name="avales" class="estilos__radios carga__avales" value="si">
              
            <label class="label__formularios__2 separador__de__radios">No</label>&nbsp;&nbsp;&nbsp;

            <input type="radio" name="avales" value="no" class="estilos__radios carga__avales">


          </div>
              
        <!--====  End of Certificados  ====-->
        
      <?php endif ?>
     
      
      <!--====  End of Avales  ====-->

      <?php if ($arrayUsuario[2]!="profesional"): ?>
          
        <label class="label__formularios__2 aval__documento contenedor__radios__labels__2 moviendo__externamente">* Cargar el aval del organismo superior (Comité Olímpico Ecuatoriano, o Comité Paralímpico Ecuatoriano, o Federación Deportiva Nacional del Ecuador), (de ser el caso)</label>

        <input type="file" class="obligatorios__proyecto campos__proyectos aval__documento" name="avalFederacion" id="avalFederacion">

      <?php else: ?>
        
        <label class="label__formularios__2 aval__documento contenedor__radios__labels__2">* Cargar el aval de la federación o liga Profesional</label>

        <input type="file" class="obligatorios__proyecto campos__proyectos aval__documento" name="avalFederacion" id="avalFederacion">

      <?php endif ?>
      

      <label class="label__formularios__2 oculto__razon__aval">* ¿Por qué no tiene aval?</label>

      <div class="clase__contenedora oculto__razon__aval" >

          <?php if ($arrayUsuario[2]!="profesional"): ?>
            
              <label class="label__formularios__2 contenedor__radios__labels">La federación nego el aval</label>&nbsp;&nbsp;&nbsp;

              <input type="radio" name="rechazoPorqueAval" class="estilos__radios porque__no__tiene__aval" value="si">

          <?php else: ?>
            
              <label class="label__formularios__2 contenedor__radios__labels">Porque la federación o liga profesional nego el aval</label>&nbsp;&nbsp;&nbsp;

              <input type="radio" name="rechazoPorqueAval" class="estilos__radios porque__no__tiene__aval" value="si">

          <?php endif ?>



          <?php if ($arrayUsuario[2]!="profesional"): ?>
            
              <label class="label__formularios__2 separador__de__radios contenedor__radios__labels">La federación no responde aún</label>&nbsp;&nbsp;&nbsp;

              <input type="radio" name="rechazoPorqueAval" value="no" class="estilos__radios porque__no__tiene__aval">

          <?php else: ?>
            
            <label class="label__formularios__2 separador__de__radios contenedor__radios__labels">Porque la federación o liga profesional no responde aún</label>&nbsp;&nbsp;&nbsp;

            <input type="radio" name="rechazoPorqueAval" value="no" class="estilos__radios porque__no__tiene__aval">

          <?php endif ?>

              
      </div>


      <?php if ($arrayUsuario[2]!="profesional"): ?>
        
          <label class="label__formularios__2 aval__organismo__superior contenedor__radios__labels__2 moviendo__externamente">Cargar la respuesta del organismo superior (Comité Olímpico Ecuatoriano, o Comité Paralímpico Ecuatoriano, o Federación Deportiva Nacional del Ecuador), de ser el caso</label>

          <input type="file" class="obligatorios__proyecto campos__proyectos aval__organismo__superior" name="solciitudAval" id="solciitudAval">

          <label class="label__formularios__2 aval__solciitudes__federaciones contenedor__radios__labels__2 moviendo__externamente">* Cargar la solicitud de aval realizada a la federación</label>

          <input type="file" class="obligatorios__proyecto campos__proyectos aval__solciitudes__federaciones" name="avalOrganismoSuperior" id="avalOrganismoSuperior">

      <?php else: ?>
        
          <label class="label__formularios__2 aval__organismo__superior contenedor__radios__labels__2 moviendo__externamente">Cargar respuesta de liga profesional o federacion</label>

          <input type="file" class="obligatorios__proyecto campos__proyectos aval__organismo__superior" name="solciitudAval" id="solciitudAval">

          <label class="label__formularios__2 aval__solciitudes__federaciones contenedor__radios__labels__2 moviendo__externamente">* Cargar la solicitud de aval realizada a la federación o liga profesional</label>

          <input type="file" class="obligatorios__proyecto campos__proyectos aval__solciitudes__federaciones" name="avalOrganismoSuperior" id="avalOrganismoSuperior">

      <?php endif ?>

      <br>

      <button id="enviarDocumentosAnexos" name="enviarDocumentosAnexos" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;ENVIAR</button>

      <div class="enviarDatosGenerales__reload"></div>

  </div>

</div>