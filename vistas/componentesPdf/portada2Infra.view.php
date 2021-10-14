<?php

     extract($_POST);

   require_once "../../conexion/conexion.php";

   $conexionRecuperada= new conexion();
   $conexionEstablecida=$conexionRecuperada->cConexion();

   $query="SELECT nombreCompleto FROM pro_deportistaorganismo WHERE cedulaUsuario='$cedulaRuc';";
   $resultado = $conexionEstablecida->query($query);

   while($registro = $resultado->fetch()) {

      $nombreCompleto=$registro['nombreCompleto'];
         
   }


   $query2="SELECT nombreOrganismo FROM pro_federacion WHERE rucOrganismo='$cedulaRuc';";
   $resultado2 = $conexionEstablecida->query($query2);

   while($registro2 = $resultado2->fetch()) {

      $nombreOrganismo=$registro2['nombreOrganismo'];
         
   }


   if (!empty($nombreCompleto)) {
      
      $nombrePortada=$nombreCompleto;

   }else{

      $nombrePortada=$nombreOrganismo;

   }


   
   /*==============================
   =            Fechas            =
   ==============================*/
   

   setlocale(LC_TIME, "spanish");

   $anio = date('Y');

   $mes=date('m');

   $dateObj   = DateTime::createFromFormat('!m', $mes);
   $monthName = strftime('%B', $dateObj->getTimestamp());

   $dia=date('d');   
   
   /*=====  End of Fechas  ======*/
   
   /*===================================================
   =            Recuperando datos generales            =
   ===================================================*/
   
   if (!empty($nombreOrganismo)) {
         
      $query2="SELECT a.idFederacion,a.rucOrganismo,a.nombreOrganismo,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.provinciaFederacion) AS provinciaFederacion,(SELECT a1.nombreCanton FROM in_md_canton AS a1 WHERE a1.idCanton=a.cantonFederacion) AS cantonFederacion,(SELECT a1.nombreParroquia FROM in_md_parroquia AS a1 WHERE a1.idParroquia=a.parroquiaFederacion) AS parroquiaFederacion,a.telefono,a.direccion,a.email,b.idTramite,SUBSTRING(nombreOrganismo, 1, 3) AS nombreCompletoSin,YEAR(NOW()) AS anioFechas,a.tipoOrganismo,c.cedulaRepresentante,c.nombreReperesentante FROM pro_federacion AS a INNER JOIN pro_representante AS c ON c.idFederacion=a.idFederacion LEFT JOIN pro_proyecto AS b ON a.usuario=b.idUsuario  WHERE a.usuario='$cedulaRuc' GROUP BY a.usuario ORDER BY b.idTramite ASC LIMIT 1;";

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

      /*=========================================
      =            Datos direcciones            =
      =========================================*/
      $query20="SELECT a.idFederacion,a.direccion,b.callePrincipal,b.calleSecundaria,b.numeracion,b.referencia,c.provincia AS provinciaRe, c.canton AS cantonRe, c.parroquia AS parroquiaRe, c.callePrincipal AS callePrincipalRe, c.numeracion AS numeracionReSegundo, c.calleSecundaria AS calleSecundariaRe, c.referencia AS referenciaRe, c.email AS emailRe, c.convencional AS convencionalRe, c.celular AS celularRe,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=c.provincia) AS provinciaNombreDoce,(SELECT a1.nombreCanton FROM in_md_canton AS a1 WHERE a1.idCanton=c.canton) AS cantonNombre, (SELECT a1.nombreParroquia FROM in_md_parroquia AS a1 WHERE a1.idParroquia=c.parroquia) AS parroquiaNombre  FROM pro_federacion AS a INNER JOIN pro_direccionesfederacion AS b ON b.idFederacion=a.idFederacion INNER JOIN pro_representante AS c ON c.idFederacion=a.idFederacion WHERE a.rucOrganismo='$cedulaRuc' ORDER BY b.idDireccionOrganismo DESC LIMIT 1;";
      $resultado20 = $conexionEstablecida->query($query20);

      while($registro20 = $resultado20->fetch()) {

         $idFederacion=$registro20['idFederacion'];
         $direccion=$registro02['direccion'];
         $callePrincipal=$registro20['callePrincipal'];
         $calleSecundaria=$registro20['calleSecundaria'];
         $numeracion=$registro20['numeracion'];
         $referencia=$registro20['referencia'];
         $provinciaRe=$registro20['provinciaRe'];
         $cantonRe=$registro20['cantonRe'];
         $parroquiaRe=$registro20['parroquiaRe'];
         $callePrincipalRe=$registro20['callePrincipalRe'];
         $numeracionReSegundo=$registro20['numeracionReSegundo'];
         $calleSecundariaRe=$registro20['calleSecundariaRe'];
         $referenciaRe=$registro20['referenciaRe'];
         $emailRe=$registro20['emailRe'];
         $convencionalRe=$registro20['convencionalRe'];
         $celularRe=$registro20['celularRe'];
         $provinciaNombreDoce=$registro20['provinciaNombreDoce'];
         $cantonNombre=$registro20['cantonNombre'];
         $parroquiaNombre=$registro20['parroquiaNombre'];      

      }
      
      /*=====  End of Datos direcciones  ======*/
      


   }else{

      $query2="SELECT a.idAteleta,a.tipoOrganismo,a.cedulaUsuario,a.nombreCompleto,a.fechaNacimiento,a.sexo,(SELECT a1.nombreProvincia FROM in_md_provincias AS a1 WHERE a1.idProvincia=a.provincia) AS provincia, (SELECT a1.nombreCanton FROM in_md_canton AS a1 WHERE a1.idCanton=a.canton) AS canton, (SELECT a1.nombreParroquia FROM in_md_parroquia AS a1 WHERE a1.idParroquia=a.parroquia) AS parroquia,a.telefono,a.direccion,a.email,b.idTramite,SUBSTRING(nombreCompleto, 1, 3) AS nombreCompletoSin,YEAR(NOW()) AS anioFechas FROM pro_deportistaorganismo AS a LEFT JOIN pro_proyecto AS b ON a.usuario=b.idUsuario WHERE a.usuario='$cedulaRuc' GROUP BY a.usuario ORDER BY b.idTramite ASC LIMIT 1;";

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


      $query2002="SELECT callePrincipalCiudadano,numeracionCiudadao,calleSecundariaCiudadano,referenciaCiudadano,email,telCiudadano,telefono FROM pro_deportistaorganismo WHERE cedulaUsuario='$cedulaRuc';";
      $resultado2002 = $conexionEstablecida->query($query2002);

      while($registro2002 = $resultado2002->fetch()) {

         $callePrincipalCiudadano=$registro2002['callePrincipalCiudadano'];
         $numeracionCiudadao=$registro2002['numeracionCiudadao'];
         $calleSecundariaCiudadano=$registro2002['calleSecundariaCiudadano'];
         $referenciaCiudadano=$registro2002['referenciaCiudadano'];
         $email=$registro2002['email'];
         $telCiudadano=$registro2002['telCiudadano'];
         $telefono=$registro2002['telefono'];

      }

   }  
   
   /*=====  End of Recuperando datos generales  ======*/
   
      
   /*==========================================
   =            Consulta proyectos            =
   ==========================================*/
   
   $query3="SELECT nombreProyecto,presupuestoLetras,sectorRecreacion,sectorDeporteFormativo,sectorDeporteConvencional,sectorDeporteAltoRendimiento,sectorDeporteProfesional,presupuesto FROM pro_proyetosreferencias WHERE codigoProyecto='$codigoProyectoPdf';";
   $resultado3 = $conexionEstablecida->query($query3);

   while($registro3 = $resultado3->fetch()) {

      $nombreProyecto=$registro3['nombreProyecto'];
      $presupuestoLetras=$registro3['presupuestoLetras'];
      $sectorRecreacion=$registro3['sectorRecreacion'];
      $sectorDeporteFormativo=$registro3['sectorDeporteFormativo'];
      $sectorDeporteConvencional=$registro3['sectorDeporteConvencional'];
      $sectorDeporteAltoRendimiento=$registro3['sectorDeporteAltoRendimiento'];
      $sectorDeporteProfesional=$registro3['sectorDeporteProfesional'];
      $presupuesto=$registro3['presupuesto'];
         
   }

   
   /*=====  End of Consulta proyectos  ======*/

?>

<!--=======================================
=              Sección Css              =
========================================-->

<link href="../../layout/styles/css/estilosPdf.css?v=1.0.0" rel="stylesheet" type="text/css" media="all">

<!--====  End of  Sección Css  ====-->

<!--=====================================================
=            Contenido Principal formularios            =
======================================================-->

<!--=============================
=            Portada            =
==============================-->

<div class="margen__borde">
      
   <table class="tabla__bordada">

      <tr>
         <td class="contenedor___nombre__proyecto" align="right">
            ANEXO DEL COMPONENTE: CONSTRUCCIÓN, REMODELACIÓN Y MANTENIMIENTO DE 
         </td>
      </tr>

      <tr>
         <td class="contenedor___nombre__proyecto" align="right">
            ESCENARIOS E INFRAESTRUCTURA DEPORTIVA
         </td>
      </tr>

   </table> 

   <table class="tabla__bordada tabla__nombre__portada">

      <tr>
         <td class="contenedor___nombre__proyecto__portada" align="center">
            <?= $nombreProyecto?>
         </td>
      </tr>

   </table> 

   <table class="tabla__bordada tabla__nombre__portada">

      <tr>

         <td style="width:65%;"></td>

         <td class="contenedor___nombre__proyecto" align="right">
            <?= strtoupper($nombrePortada)?>
         </td>

      </tr>

      <tr style="padding-top: 1em;">

         <td style="width:65%;"></td>

         <td class="contenedor___nombre__proyecto" align="right">
            <?= strtoupper($monthName)." del ".$anio?>
         </td>
         
      </tr>


   </table> 

</div>

<!--====  End of Portada  ====-->

<hr class="salto__de__pagina">


<!--======================================
=            Datos personales            =
=======================================-->

<div class="margen__borde">

   <table class="tabla__bordada">

      <tr>
         <td class="nombre__apartados__principales" align="left">
            1&nbsp;&nbsp;&nbsp;&nbsp;DATOS GENERALES
         </td>
      </tr>

      <tr>
         <td class="nombre__apartados__secundarios" align="left">
            1.1&nbsp;&nbsp;&nbsp;&nbsp;INFORMACIÓN GENERAL 
         </td>
      </tr>


   </table> 

   
   <?php if (!empty($nombreOrganismo)): ?>

   <table class="tabla__bordada__2">

      <tr>
         <td class="nombre__apartados__secundarios" align="left" colspan="2">
            1.1.1&nbsp;&nbsp;&nbsp;&nbsp;Datos de la entidad solicitante: organismo deportivo o entidad solicitante (Opcional, solo aplica de ser el caso)
         </td>
      </tr>

      <tr>

         <td class="ancho__referencias fila__uno" align="left">
            Nombre:
         </td>

         <td class="fila__uno">
            <?=$nombreOrganismo?>
         </td>

      </tr>

      <tr>

         <td class="ancho__referencias fila__uno" align="left">
            RUC:
         </td>

         <td class="fila__uno">
            <?=$rucOrganismo?>
         </td>

      </tr>

   </table>


   <table class="tabla__bordada__2 tabla__top">
      
      <tr>

         <td class="ancho__referencias fila__uno" align="left" align="left" colspan="6">
            Dirección: (Provincia, Cantón, calle principal, numeración, calle secundaria, referencia)
         </td>

      </tr>

      <tr>

         <td class="ancho__referencias__2 fila__uno">

            Provincia:

         </td>

         <td class="fila__uno" align="left">

            <?= strtoupper($provinciaFederacion) ?>

         </td>

         <td class="ancho__referencias__2 fila__uno">

            Cantón:

         </td>

         <td class="fila__uno" align="left">

            <?= strtoupper($cantonFederacion) ?>

         </td>


         <td class="ancho__referencias__3 fila__uno">

            Calle Principal:

         </td>

         <td class="fila__uno" align="left">

            <?= strtoupper($callePrincipalRe) ?>

         </td>


      </tr>

      <tr>

         <td class="ancho__referencias__2 fila__uno">

            Numeración:

         </td>

         <td class="fila__uno" align="left">

            <?= strtoupper($numeracion) ?>

         </td>

         <td class="ancho__referencias__2 fila__uno">

            Calle secundaria:

         </td>

         <td class="fila__uno" align="left">

            <?= strtoupper($calleSecundaria) ?>

         </td>


         <td class="ancho__referencias__3 fila__uno">

            Referencia:

         </td>

         <td class="fila__uno" align="left">

            <?= strtoupper($referencia) ?>

         </td>


      </tr>


   </table>


   <table class="tabla__bordada__2">

      <tr>
         <td class="nombre__apartados__secundarios" align="left" colspan="2">
            1.1.2&nbsp;&nbsp;&nbsp;&nbsp;Datos de la persona natural: representante legal del organismo deportivo, representante legal de la entidad solicitante, deportista, o persona natural solicitante (Obligatorio):
         </td>
      </tr>

      <tr>

         <td class="fila__uno" style="width:20%; font-weight:bold;" align="left">
            Nombres y apellidos:
         </td>

         <td class="fila__uno">
            <?=strtoupper($nombreReperesentante)?>
         </td>

      </tr>

      <tr>

         <td class="ancho__referencias fila__uno" align="left">
            CI:
         </td>

         <td class="fila__uno">
            <?=$cedulaRepresentante?>
         </td>

      </tr>

   </table>

   <table class="tabla__bordada__2 tabla__top">
      
      <tr>

         <td class="ancho__referencias fila__uno" align="left" align="left" colspan="6">
            Dirección: (Provincia, Cantón, calle principal, numeración, calle secundaria, referencia)
         </td>

      </tr>

      <tr>

         <td class="ancho__referencias__2 fila__uno">

            Provincia:

         </td>

         <td class="fila__uno" align="left">

            <?= strtoupper($provinciaNombreDoce) ?>

         </td>

         <td class="ancho__referencias__2 fila__uno">

            Cantón:

         </td>

         <td class="fila__uno" align="left">

            <?= strtoupper($cantonNombre) ?>

         </td>


         <td class="ancho__referencias__3 fila__uno">

            Calle Principal:

         </td>

         <td class="fila__uno" align="left">

            <?= strtoupper($callePrincipalRe) ?>

         </td>


      </tr>

      <tr>

         <td class="ancho__referencias__2 fila__uno">

            Numeración:

         </td>

         <td class="fila__uno" align="left">

            <?= strtoupper($numeracionReSegundo) ?>

         </td>

         <td class="ancho__referencias__2 fila__uno">

            Calle secundaria:

         </td>

         <td class="fila__uno" align="left">

            <?= strtoupper($calleSecundariaRe) ?>

         </td>


         <td class="ancho__referencias__3 fila__uno">

            Referencia:

         </td>

         <td class="fila__uno" align="left">

            <?= strtoupper($referenciaRe) ?>

         </td>

      </tr>


   </table>

   <table class="tabla__bordada__2 tabla__top__2">

      <tr>


         <td class="ancho__referencias__5 fila__uno" colspan="1">

            Correo electrónico: 

         </td>

         <td class="fila__uno" align="left" colspan="2">

            <?=strtoupper($emailRe)?>

         </td>

      </tr>

      <tr>

         <td class="ancho__referencias__5 fila__uno">

            Teléfono convencional:

         </td>

         <td class="fila__uno" align="left">

            <?=$convencionalRe?>

         </td>


         <td class="ancho__referencias__4 fila__uno">

            Teléfono celular:

         </td>

         <td class="fila__uno" align="left">

            <?=$celularRe?>

         </td>


      </tr>

   </table>


   <?php endif ?>

   <?php if (empty($nombreOrganismo)): ?>

   <table class="tabla__bordada__2">

      <tr>
         <td class="nombre__apartados__secundarios" align="left" colspan="2" style="text-align: justify;">
            1.1.1&nbsp;&nbsp;&nbsp;&nbsp;Datos de la persona natural: representante legal del organismo deportivo, representante legal de la entidad solicitante, deportista, o persona natural solicitante (Obligatorio):
         </td>
      </tr>

      <tr>

         <td class="fila__uno" style="width:20%; font-weight:bold;" align="left">
            Nombres y apellidos:
         </td>

         <td class="fila__uno">
            <?=strtoupper($nombreCompleto)?>
         </td>

      </tr>

      <tr>

         <td class="ancho__referencias fila__uno" align="left">
            CI:
         </td>

         <td class="fila__uno">
            <?=$cedulaUsuario?>
         </td>

      </tr>

   </table>    


   <table class="tabla__bordada__2 tabla__top">
      
      <tr>

         <td class="ancho__referencias fila__uno" align="left" align="left" colspan="6">
            Dirección: (Provincia, Cantón, calle principal, numeración, calle secundaria, referencia)
         </td>

      </tr>

      <tr>

         <td class="ancho__referencias__2 fila__uno">

            Provincia:

         </td>

         <td class="fila__uno" align="left">

            <?= strtoupper($provincia) ?>

         </td>

         <td class="ancho__referencias__2 fila__uno">

            Cantón:

         </td>

         <td class="fila__uno" align="left">

            <?= strtoupper($canton) ?>

         </td>


         <td class="ancho__referencias__3 fila__uno">

            Calle Principal:

         </td>

         <td class="fila__uno" align="left">

            <?= strtoupper($callePrincipalCiudadano) ?>

         </td>


      </tr>

      <tr>

         <td class="ancho__referencias__2 fila__uno">

            Numeración:

         </td>

         <td class="fila__uno" align="left">

            <?= strtoupper($numeracionCiudadao) ?>

         </td>

         <td class="ancho__referencias__2 fila__uno">

            Calle secundaria:

         </td>

         <td class="fila__uno" align="left">

            <?= strtoupper($calleSecundariaCiudadano) ?>

         </td>


         <td class="ancho__referencias__3 fila__uno">

            Referencia:

         </td>

         <td class="fila__uno" align="left">

            <?= strtoupper($referenciaCiudadano) ?>

         </td>

      </tr>


   </table>


   <table class="tabla__bordada__2 tabla__top__2">

      <tr>


         <td class="ancho__referencias__5 fila__uno" colspan="1">

            Correo electrónico: 

         </td>

         <td class="fila__uno" align="left" colspan="2">

            <?=strtoupper($email)?>

         </td>

      </tr>

      <tr>

         <td class="ancho__referencias__5 fila__uno">

            Teléfono convencional:

         </td>

         <td class="fila__uno" align="left">

            <?=$telCiudadano?>

         </td>


         <td class="ancho__referencias__4 fila__uno">

            Teléfono celular:

         </td>

         <td class="fila__uno" align="left">

            <?=$telefono?>

         </td>


      </tr>

   </table>


   <?php endif ?>

   

</div>

<!--====  End of Datos personales  ====-->



<!--====  End of Contenido Principal formularios  ====-->
