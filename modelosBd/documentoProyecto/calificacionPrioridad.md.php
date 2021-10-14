
<?php

	ob_start(); 


   extract($_POST);

   require_once "../../conexion/conexion.php";

   $conexionRecuperada= new conexion();
   $conexionEstablecida=$conexionRecuperada->cConexion();

  $fecha_actual = date('Y-m-d');
  $hora_actual= date('H:i:s');

  setlocale(LC_TIME, "spanish");

  $anio = date('Y');

  $mes=date('m');

  $dateObj   = DateTime::createFromFormat('!m', $mes);
  $monthName = strftime('%B', $dateObj->getTimestamp());

  $dia=date('d'); 

  $query="SELECT a.id_usuario AS idUsuarioSAlto,CONCAT_WS(' ',a.nombre, a.apellido) AS nombreCompletoSAlto, a.email AS emailSAlto, a.cedula AS cedulaSAlto,CONCAT_WS(' ',(SELECT a1.descripcionFisicamenteEstructura FROM th_fisicamenteestructura AS a1 WHERE a1.id_FisicamenteEstructura=a.fisicamenteEstructura)) AS nombreRolSAlto, c.nombre AS rolAlto FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_roles AS c ON c.id_rol=b.id_rol WHERE b.id_rol=7 AND fisicamenteEstructura='24' AND a.estadoUsuario='A' ORDER BY a.id_usuario ASC LIMIT 1;";
  $resultado = $conexionEstablecida->query($query);


  while($registro = $resultado->fetch()) {

    $idUsuarioSAlto=$registro['idUsuarioSAlto'];
    $nombreCompletoSAlto=$registro['nombreCompletoSAlto'];
    $emailSAlto=$registro['emailSAlto'];
    $cedulaSAlto=$registro['cedulaSAlto'];
    $nombreRolSAlto=$registro['nombreRolSAlto'];
    $rolAlto=$registro['rolAlto'];

  }

  $query2="SELECT a.id_usuario AS idUsuarioActividadFisica,CONCAT_WS(' ',a.nombre, a.apellido) AS nombreCompletoActividadFisica, a.email AS emailActividadFisica, a.cedula AS cedulaActividadFisica,CONCAT_WS(' ',(SELECT a1.descripcionFisicamenteEstructura FROM th_fisicamenteestructura AS a1 WHERE a1.id_FisicamenteEstructura=a.fisicamenteEstructura)) AS nombreRolActividadFisica, c.nombre AS rolFisico FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_roles AS c ON c.id_rol=b.id_rol WHERE b.id_rol=7 AND fisicamenteEstructura='26' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;";
  $resultado2 = $conexionEstablecida->query($query2);


  while($registro2 = $resultado2->fetch()) {

    $idUsuarioActividadFisica=$registro2['idUsuarioActividadFisica'];
    $nombreCompletoActividadFisica=$registro2['nombreCompletoActividadFisica'];
    $emailActividadFisica=$registro2['emailActividadFisica'];
    $cedulaActividadFisica=$registro2['cedulaActividadFisica'];
    $nombreRolActividadFisica=$registro2['nombreRolActividadFisica'];
    $rolFisico=$registro2['rolFisico'];

  }

  $query3="SELECT a.id_usuario AS idUsuarioCoordinador,CONCAT_WS(' ',a.nombre, a.apellido) AS nombreCompletoCoordinador, a.email AS emailCoordinador, a.cedula AS cedulaCoordinador,CONCAT_WS(' ',(SELECT a1.descripcionFisicamenteEstructura FROM th_fisicamenteestructura AS a1 WHERE a1.id_FisicamenteEstructura=a.fisicamenteEstructura)) AS nombreRolCoordinador, c.nombre AS rolCoordinador FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_roles AS c ON c.id_rol=b.id_rol WHERE b.id_rol=4 AND fisicamenteEstructura='1' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;";
  $resultado3 = $conexionEstablecida->query($query3);


  while($registro3 = $resultado3->fetch()) {

    $idUsuarioCoordinador=$registro3['idUsuarioCoordinador'];
    $nombreCompletoCoordinador=$registro3['nombreCompletoCoordinador'];
    $emailCoordinador=$registro3['emailCoordinador'];
    $cedulaCoordinador=$registro3['cedulaCoordinador'];
    $nombreRolCoordinador=$registro3['nombreRolCoordinador'];
    $rolCoordinador=$registro3['rolCoordinador'];

  }

  $query4="SELECT a.id_usuario AS idUsuarioMinistro,CONCAT_WS(' ',a.nombre, a.apellido) AS nombreCompletoMinistro, a.email AS emailMinistro, a.cedula AS cedulaMinistro,CONCAT_WS(' ',(SELECT a1.descripcionFisicamenteEstructura FROM th_fisicamenteestructura AS a1 WHERE a1.id_FisicamenteEstructura=a.fisicamenteEstructura)) AS nombreRolMinistro, c.nombre AS rolMinistro FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_roles AS c ON c.id_rol=b.id_rol WHERE b.id_rol=5 AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;";
  $resultado4 = $conexionEstablecida->query($query4);


  while($registro4 = $resultado4->fetch()) {

    $idUsuarioMinistro=$registro4['idUsuarioMinistro'];
    $nombreCompletoMinistro=$registro4['nombreCompletoMinistro'];
    $emailMinistro=$registro4['emailMinistro'];
    $cedulaMinistro=$registro4['cedulaMinistro'];
    $nombreRolMinistro=$registro4['nombreRolMinistro'];
    $rolMinistro=$registro4['rolMinistro'];

  }

  $query5="SELECT a.id_usuario AS idUsuarioPlanificacion,CONCAT_WS(' ',a.nombre, a.apellido) AS nombreCompletoPlanificacion, a.email AS emailPlanificacion, a.cedula AS cedulaPlanificacion,CONCAT_WS(' ',(SELECT a1.descripcionFisicamenteEstructura FROM th_fisicamenteestructura AS a1 WHERE a1.id_FisicamenteEstructura=a.fisicamenteEstructura)) AS nombreRolPlanificacion, c.nombre AS rolPlanificacion FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_roles AS c ON c.id_rol=b.id_rol WHERE b.id_rol=4 AND fisicamenteEstructura='3' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;";
  $resultado5 = $conexionEstablecida->query($query5);


  while($registro5 = $resultado5->fetch()) {

    $idUsuarioPlanificacion=$registro5['idUsuarioPlanificacion'];
    $nombreCompletoPlanificacion=$registro5['nombreCompletoPlanificacion'];
    $emailPlanificacion=$registro5['emailPlanificacion'];
    $cedulaPlanificacion=$registro5['cedulaPlanificacion'];
    $nombreRolPlanificacion=$registro5['nombreRolPlanificacion'];
    $rolPlanificacion=$registro5['rolPlanificacion'];

  }

  $query5="SELECT a.id_usuario AS idUsuarioJuridico,CONCAT_WS(' ',a.nombre, a.apellido) AS nombreCompletoJuridico, a.email AS emailJuridico, a.cedula AS cedulaJuridico,CONCAT_WS(' ',(SELECT a1.descripcionFisicamenteEstructura FROM th_fisicamenteestructura AS a1 WHERE a1.id_FisicamenteEstructura=a.fisicamenteEstructura)) AS nombreRolJuridico, c.nombre AS rolJuridico FROM th_usuario AS a INNER JOIN th_usuario_roles AS b ON a.id_usuario=b.id_usuario INNER JOIN th_roles AS c ON c.id_rol=b.id_rol WHERE b.id_rol=4 AND fisicamenteEstructura='2' AND a.estadoUsuario='A' ORDER BY a.id_usuario DESC LIMIT 1;";
  $resultado5 = $conexionEstablecida->query($query5);


  while($registro5 = $resultado5->fetch()) {

    $idUsuarioJuridico=$registro5['idUsuarioJuridico'];
    $nombreCompletoJuridico=$registro5['nombreCompletoJuridico'];
    $emailJuridico=$registro5['emailJuridico'];
    $cedulaJuridico=$registro5['cedulaJuridico'];
    $nombreRolJuridico=$registro5['nombreRolJuridico'];
    $rolJuridico=$registro5['rolJuridico'];

  }

  /*=============================
  =            Areas            =
  =============================*/
  
  $queryAreas1="SELECT SUM(monto) AS montoSumadoAltos, COUNT(idTramite) AS cuantosAltos  FROM pro_proyecto WHERE tipoDeportistas='altoRendimiento' AND califica='A';";
  $resultadoAreas1 = $conexionEstablecida->query($queryAreas1);


  while($registroAreas1 = $resultadoAreas1->fetch()) {

    $montoSumadoAltos=$registroAreas1['montoSumadoAltos'];
    $cuantosAltos=$registroAreas1['cuantosAltos'];

  }  
  
  $queryAreas2="SELECT SUM(monto) AS montoSumadoDiscapacidad, COUNT(idTramite) AS cuantosDiscapacidad  FROM pro_proyecto WHERE tipoDeportistas='altoRendimientoDiscapacidad' AND califica='A';";
  $resultadoAreas2 = $conexionEstablecida->query($queryAreas2);


  while($registroAreas2 = $resultadoAreas2->fetch()) {

    $montoSumadoDiscapacidad=$registroAreas2['montoSumadoDiscapacidad'];
    $cuantosDiscapacidad=$registroAreas2['cuantosDiscapacidad'];

  }  

  $queryAreas3="SELECT SUM(monto) AS montoSumadoProfesional, COUNT(idTramite) AS cuantosProfesional  FROM pro_proyecto WHERE tipoDeportistas='profesional' AND califica='A';";
  $resultadoAreas3 = $conexionEstablecida->query($queryAreas3);


  while($registroAreas3 = $resultadoAreas3->fetch()) {

    $montoSumadoProfesional=$registroAreas3['montoSumadoProfesional'];
    $cuantosProfesional=$registroAreas3['cuantosProfesional'];

  }  

  $queryAreas4="SELECT SUM(monto) AS montoSumadoFormativo, COUNT(idTramite) AS cuantosFormativo  FROM pro_proyecto WHERE tipoDeportistas='formativo' AND califica='A';";
  $resultadoAreas4 = $conexionEstablecida->query($queryAreas4);


  while($registroAreas4 = $resultadoAreas4->fetch()) {

    $montoSumadoFormativo=$registroAreas4['montoSumadoFormativo'];
    $cuantosFormativo=$registroAreas4['cuantosFormativo'];

  }  


  $queryAreas5="SELECT SUM(monto) AS montoEstudiantil, COUNT(idTramite) AS cuantosEstudiantil  FROM pro_proyecto WHERE tipoDeportistas='estudiantil' AND califica='A';";
  $resultadoAreas5 = $conexionEstablecida->query($queryAreas5);


  while($registroAreas5 = $resultadoAreas5->fetch()) {

    $montoEstudiantil=$registroAreas5['montoEstudiantil'];
    $cuantosEstudiantil=$registroAreas5['cuantosEstudiantil'];

  }  

  $queryAreas6="SELECT SUM(monto) AS montoRecreativo, COUNT(idTramite) AS cuantosRecreativo  FROM pro_proyecto WHERE tipoDeportistas='recreativo' AND califica='A';";
  $resultadoAreas6 = $conexionEstablecida->query($queryAreas6);


  while($registroAreas6 = $resultadoAreas6->fetch()) {

    $montoRecreativo=$registroAreas6['montoRecreativo'];
    $cuantosRecreativo=$registroAreas6['cuantosRecreativo'];

  }  

  $cuantosCalificados=intval($cuantosAltos) + intval($cuantosDiscapacidad) + intval($cuantosProfesional) + intval($cuantosFormativo) + intval($cuantosEstudiantil) + intval($cuantosRecreativo);

  $sumaCalificados=floatval($montoSumadoAltos) + floatval($montoSumadoDiscapacidad) + floatval($montoSumadoProfesional) + floatval($montoSumadoFormativo) + floatval($montoEstudiantil) + floatval($montoRecreativo);


  /*=====  End of Areas  ======*/
  

  /*========================================
  =            Areas certificas            =
  ========================================*/
  

  $queryCertificasAreas1="SELECT SUM(monto) AS montoCertificasSumadoAltos, COUNT(idTramite) AS cuantosCertificasAltos  FROM pro_proyecto WHERE tipoDeportistas='altoRendimiento' AND califica='A' AND certifica='A';";
  $resultadosCertificasAreas1 = $conexionEstablecida->query($queryCertificasAreas1);


  while($registroCertificasAreas1 = $resultadosCertificasAreas1->fetch()) {

    $montoCertificasSumadoAltos=$registroCertificasAreas1['montoCertificasSumadoAltos'];
    $cuantosCertificasAltos=$registroCertificasAreas1['cuantosCertificasAltos'];

  }  
  
  $queryCertificasAreas2="SELECT SUM(monto) AS montoCertificasSumadoDiscapacidad, COUNT(idTramite) AS cuantosCertificasDiscapacidad  FROM pro_proyecto WHERE tipoDeportistas='altoRendimientoDiscapacidad' AND califica='A' AND certifica='A';";
  $resultadoAreas2 = $conexionEstablecida->query($queryCertificasAreas2);


  while($registroAreas2 = $resultadoAreas2->fetch()) {

    $montoCertificasSumadoDiscapacidad=$registroAreas2['montoCertificasSumadoDiscapacidad'];
    $cuantosCertificasDiscapacidad=$registroAreas2['cuantosCertificasDiscapacidad'];

  }  

  $queryCertificasAreas3="SELECT SUM(monto) AS montoCertificasSumadoProfesional, COUNT(idTramite) AS cuantosCertificasProfesional  FROM pro_proyecto WHERE tipoDeportistas='profesional' AND califica='A' AND certifica='A';";
  $resultadoAreas3 = $conexionEstablecida->query($queryCertificasAreas3);


  while($registroAreas3 = $resultadoAreas3->fetch()) {

    $montoCertificasSumadoProfesional=$registroAreas3['montoCertificasSumadoProfesional'];
    $cuantosCertificasProfesional=$registroAreas3['cuantosCertificasProfesional'];

  }  

  $queryCertificasAreas4="SELECT SUM(monto) AS montoCertificasSumadoFormativo, COUNT(idTramite) AS cuantosCertificasFormativo  FROM pro_proyecto WHERE tipoDeportistas='formativo' AND califica='A' AND certifica='A';";
  $resultadoAreas4 = $conexionEstablecida->query($queryCertificasAreas4);


  while($registroAreas4 = $resultadoAreas4->fetch()) {

    $montoCertificasSumadoFormativo=$registroAreas4['montoCertificasSumadoFormativo'];
    $cuantosCertificasFormativo=$registroAreas4['cuantosCertificasFormativo'];

  }  


  $queryCertificasAreas5="SELECT SUM(monto) AS montoCertificasEstudiantil, COUNT(idTramite) AS cuantosCertificasEstudiantil  FROM pro_proyecto WHERE tipoDeportistas='estudiantil' AND califica='A' AND certifica='A';";
  $resultadoAreas5 = $conexionEstablecida->query($queryCertificasAreas5);


  while($registroAreas5 = $resultadoAreas5->fetch()) {

    $montoCertificasEstudiantil=$registroAreas5['montoCertificasEstudiantil'];
    $cuantosCertificasEstudiantil=$registroAreas5['cuantosCertificasEstudiantil'];

  }  

  $queryCertificasAreas6="SELECT SUM(monto) AS montoCertificasRecreativo, COUNT(idTramite) AS cuantosCertificasRecreativo  FROM pro_proyecto WHERE tipoDeportistas='recreativo' AND califica='A' AND certifica='A';";
  $resultadoAreas6 = $conexionEstablecida->query($queryCertificasAreas6);


  while($registroAreas6 = $resultadoAreas6->fetch()) {

    $montoCertificasRecreativo=$registroAreas6['montoCertificasRecreativo'];
    $cuantosCertificasRecreativo=$registroAreas6['cuantosCertificasRecreativo'];

  }  

  $queryCertificasMefPresupuestos="SELECT presupuestoMefAsignados FROM pro_mefPresupuesto ORDER BY idMef DESC LIMIT 1;";
  $resultadoMefPresupuestos = $conexionEstablecida->query($queryCertificasMefPresupuestos);


  while($registroMefPresupuestos = $resultadoMefPresupuestos->fetch()) {

    $presupuestoMefAsignados=$registroMefPresupuestos['presupuestoMefAsignados'];

  }  


  
  $cuantosCertificasCalificados=intval($cuantosCertificasAltos) + intval($cuantosCertificasDiscapacidad) + intval($cuantosCertificasProfesional) + intval($cuantosCertificasFormativo) + intval($cuantosCertificasEstudiantil) + intval($cuantosCertificasRecreativo);

  $sumaCalificadosCertificas=floatval($montoCertificasSumadoAltos) + floatval($montoCertificasSumadoDiscapacidad) + floatval($montoCertificasSumadoProfesional) + floatval($montoCertificasSumadoFormativo) + floatval($montoCertificasEstudiantil) + floatval($montoCertificasRecreativo);


  $restasTotales=floatval($presupuestoMefAsignados) - floatval($sumaCalificadosCertificas);
  
  /*=====  End of Areas certificas  ======*/
  
  $array = explode(",", $codigosGenerados);


?>

<html>

   <head>

      <link href="../../layout/styles/css/estilosPdf.css" rel="stylesheet" type="text/css" media="all">

   </head>

   <body>

    <style>

      body{
        font-size: 12px!important;
      }

    </style>

     <div id="">

       <img src="../../images/logotipo.png" />

     </div>

     <div id="footer">

       <img src="../../images/footer.png"/>

     </div>

     <div id="content">

      <table class="tabla__bordada">

        <tr>
          <td class="contenedor___nombre__proyecto enfacis__letras" align="center">
            <center>Acta de calificación de prioridad</center>
          </td>
        </tr>

        <tr>
          <td class="contenedor___nombre__proyecto enfacis__letras" align="center">
            <center>CCCIT-<?=$anio?></center>
          </td>
        </tr>

        <br>

        <tr>
          <td class="contenedor___nombre__proyecto enfacis__letras" align="center">
            <center>Comité de Calificación y Certificación para acceder al Incentivo Tributario</center>
          </td>
        </tr>

      </table>         

      <table>

        <tr>

          <td align="justify">
            
            En el Distrito Metropolitano de Quito, a los <?=$dia?> días del mes de <?=$monthName?> de <?=$anio?>, siendo las <?=$hora_actual?>, se reúnen los miembros del Comité de Calificación y Certificación para acceder al Incentivo Tributario, con la finalidad de conocer y aprobar los proyectos presentados para emitir la priorización de la calificación de deportistas, programas y proyectos, por parte del Ministerio del Deporte, parámetro requerido para la aplicación de la deducción del 100% adicional para el cálculo de la base imponible del Impuesto a la Renta, establecido en el tercer inciso del numeral 19 del artículo 10 de la Ley Orgánica de Régimen Tributario Interno y en el literal e) del numeral 11 del artículo 28 del Reglamento para la Aplicación de la Ley de Régimen Tributario Interno.

          </td>

        </tr>

        <tr>

          <td align="justify" style="padding-top:.5em!important;">
          
            La señorita Secretaria del Comité, señala que de conformidad al artículo xx del Acuerdo Nro. xx de xx de xx de 2021, participan con voz y voto los siguientes miembros del Comité:

          </td>

        </tr>

        <tr>

          <td style="padding-top:.5em!important;">

            <li style="margin-left:2em;">Ministro del Deporte o su delegado,</li>

          </td>

        </tr>


        <tr>

          <td>

            <li style="margin-left:2em;">Subsecretario de Deporte del Alto Rendimiento,</li>

          </td>

        </tr>
          

        <tr>

          <td>

            <li style="margin-left:2em;">Subsecretaría de Desarrollo de la Actividad Física</li>

          </td>

        </tr>

        <tr>

          <td>

            <li style="margin-left:2em;">Coordinadora de Administración e Infraestructura Deportiva</li>

          </td>

        </tr>
          

        <tr>

          <td>

            <li style="margin-left:2em;">Coordinador General de Planificación y Gestión Estratégica</li>

          </td>

        </tr>
          
        <tr>

          <td>

            <li style="margin-left:2em;">Coordinador General Administrativo Financiero</li>

          </td>

        </tr>

        <tr>

          <td  align="justify" style="padding-top:.5em!important;">

            Se procede a constatar el quórum reglamentario, verificando la presencia de los siguientes miembros: 

          </td>

        </tr>

        <?php if ($ministroLlega=="si"): ?>

          <tr>

            <td>

              <li style="margin-left:2em!important;"><?=$nombreCompletoMinistro?>, Ministro del Deporte o su delegado</li>

            </td>

          </tr>
          
        <?php endif ?>       

        <?php if ($subsesAltoLlega=="si"): ?>

          <tr>

            <td>

              <li style="margin-left:2em!important;"><?=$nombreCompletoSAlto?>, Subsecretario de Deporte del Alto Rendimiento,</li>

            </td>

          </tr>
          
        <?php endif ?>

        <?php if ($subsesActividadLlega=="si"): ?>

          <tr>

            <td>

              <li style="margin-left:2em!important;"><?=$nombreCompletoActividadFisica?>, Subsecretaría de Desarrollo de la Actividad Física</li>

            </td>

          </tr>
          
        <?php endif ?>

        <?php if ($subsesCoordinadorL=="si"): ?>

          <tr>

            <td>

              <li style="margin-left:2em!important;"><?=$nombreCompletoCoordinador?>, Coordinadora de Administración e Infraestructura Deportiva</li>

            </td>

          </tr>
          
        <?php endif ?>

        <?php if ($planifiacionLle=="si"): ?>

          <tr>

            <td>

              <li style="margin-left:2em!important;"><?=$nombreCompletoPlanificacion?>, Coordinador General de Planificación y Gestión Estratégica</li>

            </td>

          </tr>
          
        <?php endif ?>

        <?php if ($juridicoLlega=="si"): ?>

          <tr>

            <td>

              <li style="margin-left:2em!important;"><?=$nombreCompletoJuridico?>, Coordinador General Administrativo Financiero</li>

            </td>

          </tr>
          
        <?php endif ?>

      </table>


      <table>

        <tr>

          <td  align="justify" style="padding-top:.5em!important;">

            En este orden y de conformidad a la normativa legal vigente, se conforma el quórum reglamentario y se da por iniciada la sesión de calificación de deportistas, programas y proyectos deportivos.

          </td>

        </tr>

        <tr>

          <td  align="justify" style="padding-top:.5em!important;">

            El monto dispuesto por el Ministerio de Economía y Finanzas se ha modificado de acuerdo a las calificaciones y certificaciones emitidas por el Ministerio del Deporte de la siguiente forma:
            
          </td>

        </tr>

      </table>

      <table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias" style="margin-top: 4em; font-size: 12px!important;">

        <thead>

          <tr style="background-color:gray!important;color:white!important;">

            <th colspan="3" align="center">

              PROYECTOS CALIFICADOS <?=$anio?>

            </th>

          </tr>

          <tr style="background-color:gray!important;color:white!important;">

            <th>

              SECTOR

            </th>

            <th>

              NRO. PROYECTOS

            </th>

            <th>

              MONTO

            </th>

          </tr>

        </thead>

        <tbody>

          <tr>

            <td>Deporte convencional de alto rendimiento</td>
            <td><?=$cuantosAltos?></td>
            <td><?=number_format(floatval($montoSumadoAltos),2, '.', '')?></td>

          </tr>

          <tr>

            <td>Deporte de alto rendimiento para personas con discapacidad</td>
            <td><?=$cuantosDiscapacidad?></td>
            <td><?=number_format(floatval($montoSumadoDiscapacidad),2, '.', '')?></td>

          </tr>

          <tr>

            <td>Deporte profesional</td>
            <td><?=$cuantosProfesional?></td>
            <td><?=number_format(floatval($montoSumadoProfesional),2, '.', '')?></td>

          </tr>

          <tr>

            <td>Deporte formativo</td>
            <td><?=$cuantosFormativo?></td>
            <td><?=number_format(floatval($montoSumadoFormativo),2, '.', '')?></td>

          </tr>

          <tr>

            <td>Educación física</td>
            <td><?=$cuantosEstudiantil?></td>
            <td><?=number_format(floatval($montoEstudiantil),2, '.', '')?></td>

          </tr>

          <tr>

            <td>Recreación</td>
            <td><?=$cuantosRecreativo?></td>
            <td><?=number_format(floatval($montoRecreativo),2, '.', '')?></td>

          </tr>

          <tr>

            <td>Total calificados</td>
            <td><?=$cuantosCalificados?></td>
            <td><?=number_format(floatval($sumaCalificados),2, '.', '')?></td>

          </tr>

          <tr>

            <td colspan="2" align="center">TECHO APROBADO POR MEF</td>
            <td><?=number_format(floatval($presupuestoMefAsignados),2, '.', '')?></td>

          </tr>


        </tbody>

      </table>

      <table class="tabla__bordada__2 tabla__top__2 tablas__bordes__necesarias" style="margin-top: 2em; font-size: 12px!important;">

        <thead>

          <tr style="background-color:gray!important;color:white!important;">

            <th colspan="3" align="center">

              PROYECTOS CERTIFICADOS <?=$anio?>

            </th>

          </tr>

          <tr style="background-color:gray!important;color:white!important;">

            <th>

              SECTOR

            </th>

            <th>

              NRO. PROYECTOS

            </th>

            <th>

              MONTO

            </th>

          </tr>

        </thead>

        <tbody>

          <tr>

            <td>Deporte convencional de alto rendimiento</td>
            <td><?=$cuantosCertificasAltos?></td>
            <td><?=number_format(floatval($montoCertificasSumadoAltos),2, '.', '')?></td>

          </tr>

          <tr>

            <td>Deporte de alto rendimiento para personas con discapacidad</td>
            <td><?=$cuantosCertificasDiscapacidad?></td>
            <td><?=number_format(floatval($montoCertificasSumadoDiscapacidad),2, '.', '')?></td>

          </tr>

          <tr>

            <td>Deporte profesional</td>
            <td><?=$cuantosCertificasProfesional?></td>
            <td><?=number_format(floatval($montoCertificasSumadoProfesional),2, '.', '')?></td>

          </tr>

          <tr>

            <td>Deporte formativo</td>
            <td><?=$cuantosCertificasFormativo?></td>
            <td><?=number_format(floatval($montoCertificasSumadoFormativo),2, '.', '')?></td>

          </tr>

          <tr>

            <td>Educación física</td>
            <td><?=$cuantosCertificasEstudiantil?></td>
            <td><?=number_format(floatval($montoCertificasEstudiantil),2, '.', '')?></td>

          </tr>

          <tr>

            <td>Recreación</td>
            <td><?=$cuantosCertificasRecreativo?></td>
            <td><?=number_format(floatval($montoCertificasRecreativo),2, '.', '')?></td>

          </tr>

          <tr>

            <td>Total calificados</td>
            <td><?=$cuantosCertificasCalificados?></td>
            <td><?=number_format(floatval($sumaCalificadosCertificas),2, '.', '')?></td>

          </tr>

          <tr>

            <td colspan="2" align="center">TECHO APROBADO POR MEF</td>
            <td><?=number_format(floatval($presupuestoMefAsignados),2, '.', '')?></td>

          </tr>

          <tr>

            <td colspan="2" align="center">SALDO DISPONIBLE</td>
            <td><?=number_format(floatval($restasTotales),2, '.', '')?></td>

          </tr>


        </tbody>

      </table>

      <div style="margin-bottom: .5em!important;">

        De acuerdo al análisis de las solicitudes presentadas, se ha deliberado con votos a favor de la calificación de prioridad de los siguientes proyectos deportivos y la emisión del certificado de deducción adicional con el siguiente detalle:

      </div>

      <table class="tablas__bordes__necesarias" style="font-size: 12px!important;">

        <?php foreach ($array as $clave => $valor): ?>
          


          <?php $queryTres="SELECT nombre,monto,idUsuarioRelativo FROM pro_proyecto WHERE codigo='$valor' AND califica='O';";?>
          <?php $resultadoTres = $conexionEstablecida->query($queryTres);?>
          <?php 

            while($registroTres = $resultadoTres->fetch()) {

              $nombre=$registroTres['nombre'];
              $monto=$registroTres['monto'];
              $idUsuarioRelativo=$registroTres['idUsuarioRelativo'];

            } 

          ?>


          <?php $queryFun="SELECT b.nombreCompleto FROM pro_proyecto AS a INNER JOIN pro_deportistaorganismo AS b ON a.idUsuario=b.cedulaUsuario WHERE a.codigo='$valor';";?>
          <?php $resultadoFun = $conexionEstablecida->query($queryFun);?>
          <?php 
            while($registroFun = $resultadoFun->fetch()) {

              $nombreCompleto=$registroFun['nombreCompleto'];

            } 
          ?>


          <?php $querOrgan="SELECT b.nombreOrganismo FROM pro_proyecto AS a INNER JOIN pro_federacion AS b ON a.idUsuario=b.rucOrganismo WHERE a.codigo='$valor';";?>
          <?php $resultadoOrga = $conexionEstablecida->query($querOrgan);?>
          <?php 
            while($registroOrga = $resultadoOrga->fetch()) {

              $nombreOrganismo=$registroOrga['nombreOrganismo'];

            } 
          ?>

          <?php

            $querySextosBeneficiarios="SELECT SUM(totalDirectos__conjuntos) AS totalBeneficiarios FROM pro_beneficiarios_directos WHERE codigo='$valor' GROUP BY codigo;";
            $resultadoBeneficiarios = $conexionEstablecida->query($querySextosBeneficiarios);
            
            
            while($registroBeneficiarios= $resultadoBeneficiarios->fetch()) {
              $totalBeneficiarios=$registroBeneficiarios['totalBeneficiarios'];
            } 
                
          ?>

          <?php

            $dataReferentesTres=array();

            $queryMetados="SELECT nombre__conjunto FROM pro_metas WHERE codigo='$valor';";
            $resultadoMetados = $conexionEstablecida->query($queryMetados);


            while($registroMetados = $resultadoMetados->fetch()) {

              $nombre__conjunto=$registroMetados['nombre__conjunto'];
              array_push($dataReferentesTres, $nombre__conjunto);

            }


          ?>

          <?php
             $query="SELECT mensajePlurianual,inicioPeriodos,finPeriodos FROM pro_proyetosreferencias WHERE codigoProyecto='$valor' ORDER BY idProyectoReferencias DESC LIMIT 1;";
             $resultado = $conexionEstablecida->query($query);     

             while($registro2 = $resultado->fetch()) {

                $mensajePlurianual=$registro2['mensajePlurianual'];
                $inicioPeriodos=$registro2['inicioPeriodos'];
                $finPeriodos=$registro2['finPeriodos'];

             }
          
            $parametro1String=$inicioPeriodos;
            $parametro2String=$finPeriodos;

            $arreglo1 = explode("/", $parametro1String);
            $arreglo2 = explode("/", $parametro2String);


            /*==============================
            =            Fechas            =
            ==============================*/
            

            setlocale(LC_TIME, "spanish");

            $anioInicial = date($arreglo1[2]);

            $mesInicial=date($arreglo1[1]);

            $dateObjInicial   = DateTime::createFromFormat('!m', $mesInicial);
            $monthNameInicial = strftime('%B', $dateObjInicial->getTimestamp());

            $diaInicial=date($arreglo1[0]); 
            

            setlocale(LC_TIME, "spanish");

            $anioFinal = date($arreglo2[2]);

            $mesFinal=date($arreglo2[1]);

            $dateObjFinal   = DateTime::createFromFormat('!m', $mesFinal);
            $monthNameFinal = strftime('%B', $dateObjFinal->getTimestamp());

            $diaFinal=date($arreglo2[0]); 


            /*=====  End of Fechas  ======*/

          ?>

          <?php

          /*===========================================================
          =            Selector de selecciones direcciones            =
          ===========================================================*/

            $queryDos="SELECT tipoTramite FROM pro_infraselects WHERE infras='T' AND codigo='$valor';";
            $resultadoDos = $conexionEstablecida->query($queryDos);


            while($registroDos = $resultadoDos->fetch()) {

              $tipoTramite=$registroDos['tipoTramite'];


            }

          /*=====  End of Selector de selecciones direcciones  ======*/

            if ($tipoTramite=="Alto rendimiento" || $tipoTramite=="Alto rendimiento para personas con discapacidad" || $tipoTramite=="Deporte Profesional") {
              $objetivo="Incrementar el rendimiento de los atletas en la consecución de logros deportivos.";
              $llaveSubsecretarias="SUBSECRETARÍA DE DEPORTE DE ALTO RENDIMIENTO";
            }else{
              $objetivo="Incrementar la práctica de la cultura física en la población del Ecuador.";
              $llaveSubsecretarias="SUBSECRETARÍA DE DESARROLLO DE LA ACTIVIDAD FISICA";
            }


          ?>

          <?php

            $dataReferentesTres=array();

            $queryMetados="SELECT nombre__conjunto FROM pro_metas WHERE codigo='$valor';";
            $resultadoMetados = $conexionEstablecida->query($queryMetados);


            while($registroMetados = $resultadoMetados->fetch()) {

              $nombre__conjunto=$registroMetados['nombre__conjunto'];
              array_push($dataReferentesTres, $nombre__conjunto);

            }

          ?>


          <?php

            $queryRelativos="SELECT CONCAT_WS(' ',nombre,apellido) AS nombreCompletos FROM th_usuario WHERE id_usuario='$idUsuarioRelativo';";
            $resultadoRelativos = $conexionEstablecida->query($queryRelativos);


            while($registroRelativos = $resultadoRelativos->fetch()) {

              $nombreCompletos=$registroRelativos['nombreCompletos'];

            }

          ?>

          <?php if (!empty($nombre)): ?>

          <tr style="background-color:gray!important; color:white!important;">
            
            <td align="center" colspan="4">DATOS GENERALES DEL PROYECTO ANALIZADO</td>

          </tr>
            
          <tr>

            <td style="font-weight: bold;">NOMBRE DEL PROYECTO</td>
            <td><?=$nombre?></td>

            <td style="font-weight: bold;">MONTO PROYECTO</td>
            <td><?=$monto?></td>

          </tr>

          <tr>

            <td style="font-weight: bold;">NOMBRE DEL SOLICITANTE</td>

            <?php if (!empty($nombreCompleto)): ?>
              <td><?=$nombreCompleto?></td>
            <?php else: ?>
              <td><?=$nombreOrganismo?></td>
            <?php endif ?>

            <td style="font-weight: bold;">NÚMERO DE BENEFICIARIOS</td>
            <td><?=$totalBeneficiarios?></td>

          </tr>

          <tr>

            <td style="font-weight: bold;">SECTOR AL QUE CONTRIBUYE</td>

      
            <td>
              
            <?php for($i=0;$i<count($dataReferentesTres);$i++): ?>
              
              <?=$dataReferentesTres[$i]?>

              <br>

            <?php endfor ?>

            </td>
 

            <td style="font-weight: bold;">PLURIANUAL</td>

            <?php if ($mensajePlurianual=="normal"): ?>
              
               <td>SI</td>

            <?php else: ?>

                <td>NO</td>
              
            <?php endif ?>

          </tr>

          <tr>

            <td class="enfacis__letras">Fecha de inicio</td>

            <td><?=$diaInicial?> de <?= strtolower($monthNameInicial)?> <?=$anioInicial?></td>

            <td class="enfacis__letras">Fecha de fín</td>

            <td><?=$diaFinal?> de <?= strtolower($monthNameFinal)?> <?=$anioFinal?></td>

          </tr>

          <tr>

            <td class="enfacis__letras" colspan="1">
              ALINEACIÓN AL PLAN ESTRATÉGICO
            </td>

            <td colspan="3">

              <?=$objetivo?>

            </td>

          </tr>


          <tr>

            <td class="enfacis__letras">
              METAS DEL PROYECTO
            </td>

            <td colspan="3">
              
              <?php for($i=0;$i<count($dataReferentesTres);$i++): ?>
                
                <?=$dataReferentesTres[$i]?>

                <br>

              <?php endfor ?>

            </td>

          </tr>

          <tr>

            <td class="enfacis__letras" colspan="1">
              CALIFICADO:
            </td>

            <td colspan="1">

              SI

            </td>

            <td class="enfacis__letras" colspan="1">
              CÓDIGO:
            </td>

            <td colspan="1">

              <?=$valor?>

            </td>

          </tr>

          <tr style="background-color:gray!important; color:white!important;">

            <td align="center" colspan="4">RAZONES DE LA CALIFICACIÓN</td>

          </tr>

          <tr>

            <td colspan="4"  align="justify" style="padding-bottom:.5em!important;">

              Con el análisis técnico de viabilidad aprobado por el  funcionario <?=$nombreCompletos?>, al proyecto “<?=$nombre?>”.

              La recomendación previa de calificación por parte de la <?=$llaveSubsecretarias?> ha ratificado el criterio técnico y ha emitido su pronunciamiento positivo para la calificación del proyecto en mención.

              RESOLUCIÓN 1:

              Por decisión unánime del Comité de Calificación y Certificación para acceder al Incentivo Tributario se RESUELVE: Calificar el proyecto presentado por  <?php if (!empty($nombreCompleto)): ?> <?=$nombreCompleto?><?php else: ?><?=$nombreOrganismo?><?php endif ?>“<?=$nombre?>”


            </td>

          </tr>

          <?php endif ?>

        <?php endforeach ?>

      </table>





      <!--===================================
      =            Certificación            =
      ====================================-->

      <table class="tablas__bordes__necesarias" style="font-size: 12px!important; margin-top: 4em;">

        <?php foreach ($array as $clave => $valor): ?>
          


          <?php $queryTres="SELECT nombre,monto,idUsuarioRelativo FROM pro_proyecto WHERE codigo='$valor' AND califica='A' AND certifica='S';";?>
          <?php $resultadoTres = $conexionEstablecida->query($queryTres);?>
          <?php 

            while($registroTres = $resultadoTres->fetch()) {

              $nombre=$registroTres['nombre'];
              $monto=$registroTres['monto'];
              $idUsuarioRelativo=$registroTres['idUsuarioRelativo'];

            } 

          ?>


          <?php $queryFun="SELECT b.nombreCompleto,b.cedulaUsuario FROM pro_proyecto AS a INNER JOIN pro_deportistaorganismo AS b ON a.idUsuario=b.cedulaUsuario WHERE a.codigo='$valor';";?>
          <?php $resultadoFun = $conexionEstablecida->query($queryFun);?>
          <?php 
            while($registroFun = $resultadoFun->fetch()) {

              $nombreCompleto=$registroFun['nombreCompleto'];
              $cedulaUsuario=$registroFun['cedulaUsuario'];

            } 
          ?>


          <?php $querOrgan="SELECT b.nombreOrganismo,b.rucOrganismo FROM pro_proyecto AS a INNER JOIN pro_federacion AS b ON a.idUsuario=b.rucOrganismo WHERE a.codigo='$valor';";?>
          <?php $resultadoOrga = $conexionEstablecida->query($querOrgan);?>
          <?php 
            while($registroOrga = $resultadoOrga->fetch()) {

              $nombreOrganismo=$registroOrga['nombreOrganismo'];
              $rucOrganismo=$registroOrga['rucOrganismo'];

            } 
          ?>

          <?php

            $querySextosBeneficiarios="SELECT SUM(totalDirectos__conjuntos) AS totalBeneficiarios FROM pro_beneficiarios_directos WHERE codigo='$valor' GROUP BY codigo;";
            $resultadoBeneficiarios = $conexionEstablecida->query($querySextosBeneficiarios);
            
            
            while($registroBeneficiarios= $resultadoBeneficiarios->fetch()) {
              $totalBeneficiarios=$registroBeneficiarios['totalBeneficiarios'];
            } 
                
          ?>

          <?php

            $dataReferentesTres=array();

            $queryMetados="SELECT nombre__conjunto FROM pro_metas WHERE codigo='$valor';";
            $resultadoMetados = $conexionEstablecida->query($queryMetados);


            while($registroMetados = $resultadoMetados->fetch()) {

              $nombre__conjunto=$registroMetados['nombre__conjunto'];
              array_push($dataReferentesTres, $nombre__conjunto);

            }


          ?>

          <?php
             $query="SELECT mensajePlurianual,inicioPeriodos,finPeriodos FROM pro_proyetosreferencias WHERE codigoProyecto='$valor' ORDER BY idProyectoReferencias DESC LIMIT 1;";
             $resultado = $conexionEstablecida->query($query);     

             while($registro2 = $resultado->fetch()) {

                $mensajePlurianual=$registro2['mensajePlurianual'];
                $inicioPeriodos=$registro2['inicioPeriodos'];
                $finPeriodos=$registro2['finPeriodos'];

             }
          
            $parametro1String=$inicioPeriodos;
            $parametro2String=$finPeriodos;

            $arreglo1 = explode("/", $parametro1String);
            $arreglo2 = explode("/", $parametro2String);


            /*==============================
            =            Fechas            =
            ==============================*/
            

            setlocale(LC_TIME, "spanish");

            $anioInicial = date($arreglo1[2]);

            $mesInicial=date($arreglo1[1]);

            $dateObjInicial   = DateTime::createFromFormat('!m', $mesInicial);
            $monthNameInicial = strftime('%B', $dateObjInicial->getTimestamp());

            $diaInicial=date($arreglo1[0]); 
            

            setlocale(LC_TIME, "spanish");

            $anioFinal = date($arreglo2[2]);

            $mesFinal=date($arreglo2[1]);

            $dateObjFinal   = DateTime::createFromFormat('!m', $mesFinal);
            $monthNameFinal = strftime('%B', $dateObjFinal->getTimestamp());

            $diaFinal=date($arreglo2[0]); 


            /*=====  End of Fechas  ======*/

          ?>

          <?php

          /*===========================================================
          =            Selector de selecciones direcciones            =
          ===========================================================*/

            $queryDos="SELECT tipoTramite FROM pro_infraselects WHERE infras='T' AND codigo='$valor';";
            $resultadoDos = $conexionEstablecida->query($queryDos);


            while($registroDos = $resultadoDos->fetch()) {

              $tipoTramite=$registroDos['tipoTramite'];


            }

          /*=====  End of Selector de selecciones direcciones  ======*/

            if ($tipoTramite=="Alto rendimiento" || $tipoTramite=="Alto rendimiento para personas con discapacidad" || $tipoTramite=="Deporte Profesional") {
              $objetivo="Incrementar el rendimiento de los atletas en la consecución de logros deportivos.";
              $llaveSubsecretarias="SUBSECRETARÍA DE DEPORTE DE ALTO RENDIMIENTO";
            }else{
              $objetivo="Incrementar la práctica de la cultura física en la población del Ecuador.";
              $llaveSubsecretarias="SUBSECRETARÍA DE DESARROLLO DE LA ACTIVIDAD FISICA";
            }


          ?>

          <?php

            $dataReferentesTres=array();

            $queryMetados="SELECT nombre__conjunto FROM pro_metas WHERE codigo='$valor';";
            $resultadoMetados = $conexionEstablecida->query($queryMetados);


            while($registroMetados = $resultadoMetados->fetch()) {

              $nombre__conjunto=$registroMetados['nombre__conjunto'];
              array_push($dataReferentesTres, $nombre__conjunto);

            }

          ?>


          <?php

            $queryRelativos="SELECT CONCAT_WS(' ',nombre,apellido) AS nombreCompletos FROM th_usuario WHERE id_usuario='$idUsuarioRelativo';";
            $resultadoRelativos = $conexionEstablecida->query($queryRelativos);


            while($registroRelativos = $resultadoRelativos->fetch()) {

              $nombreCompletos=$registroRelativos['nombreCompletos'];

            }

          ?>

          <?php

            $comprobante1=array();
            $comprobante2=array();
            $comprobante3=array();
            $comprobante4=array();
            $comprobante5=array();
            $comprobante6=array();
            $comprobante7=array();
            $comprobante8=array();

            $queryComprobantesRealizados="SELECT montoContratoRealizados,autorizacionSri__conjuntos,montos__facturas__conjuntos,validez__comprobante__fisico__conjuntos,actividadEconomica__conjuntos,nombrePatrocinador,ruc__patrocinador__conjunto FROM pro_comprobante WHERE codigo='$valor';";
            $resultadoComprobantesRealizados = $conexionEstablecida->query($queryComprobantesRealizados);


            while($registroComprobantes = $resultadoComprobantesRealizados->fetch()) {

              $montoContratoRealizados=$registroComprobantes['montoContratoRealizados'];
              array_push($comprobante1, $montoContratoRealizados);

              $autorizacionSri__conjuntos=$registroComprobantes['autorizacionSri__conjuntos'];
              array_push($comprobante2, $autorizacionSri__conjuntos);

              $montos__facturas__conjuntos=$registroComprobantes['montos__facturas__conjuntos'];
              array_push($comprobante3, $montos__facturas__conjuntos);

              $validez__comprobante__fisico__conjuntos=$registroComprobantes['validez__comprobante__fisico__conjuntos'];
              array_push($comprobante4, $validez__comprobante__fisico__conjuntos);

              $actividadEconomica__conjuntos=$registroComprobantes['actividadEconomica__conjuntos'];
              array_push($comprobante5, $actividadEconomica__conjuntos);

              $nombrePatrocinador=$registroComprobantes['nombrePatrocinador'];
              array_push($comprobante6, $nombrePatrocinador);

              $ruc__patrocinador__conjunto=$registroComprobantes['ruc__patrocinador__conjunto'];
              array_push($comprobante7, $ruc__patrocinador__conjunto);

            }

          ?>

          <?php if (!empty($nombre)): ?>
            
            <?php for($z=0;$z<count($comprobante1);$z++): ?>
              
            <tr style="background-color:gray!important; color:white!important;">

              <td colspan="4" style="padding-top:2em!important;">

                DATOS GENERALES DE LA SOLICITUD DE CERTIFICACIÓN

              </td>

            </tr>

            <tr>

              <td class="enfacis__letras" colspan="1">
                NÚMERO DE FACTURA
              </td>

              <td colspan="1">

                <?=$comprobante1[$z]?>

              </td>

              <td class="enfacis__letras" colspan="1">
                AUTORIZACIÓN SRI:
              </td>

              <td colspan="1">

                <?=$comprobante2[$z]?>

              </td>

            </tr>

            <tr>

              <td class="enfacis__letras" colspan="1">
                NÚMERO DE RUC DEL SOLICITANTE
              </td>

              <td colspan="1">

                <?php if (!empty($cedulaUsuario)): ?>

                  <?=$cedulaUsuario?>
                  
                <?php else: ?>

                  <?=$rucOrganismo?>
                  
                <?php endif ?>

              </td>

              <td class="enfacis__letras" colspan="1">
                NOMBRE O RAZÓN SOCIAL
              </td>

              <td colspan="1">

                <?php if (!empty($cedulaUsuario)): ?>

                  <?=$nombreCompleto?>
                  
                <?php else: ?>

                  <?=$nombreOrganismo?>
                  
                <?php endif ?>

              </td>

            </tr>

            <tr>

              <td class="enfacis__letras" colspan="1">
                MONTO DE FACTURA
              </td>

              <td colspan="1">

                <?=$comprobante3[$z]?>

              </td>

              <td class="enfacis__letras" colspan="1">
                VALIDEZ DEL COMPROBANTE FÍSICO
              </td>

              <td colspan="1">

                <?=$comprobante4[$z]?>

              </td>

            </tr>

            <tr>

              <td class="enfacis__letras" colspan="1">
               ACTIVIDAD ECONÓMICA DEL SOLICITANTE
              </td>

              <td colspan="1">

                <?=$comprobante5[$z]?>

              </td>

              <td class="enfacis__letras" colspan="1">
               EJERCICIO FISCAL
              </td>

              <td colspan="1">
                
                <?=$anio?>

              </td>

            </tr>


            <tr>

              <td class="enfacis__letras" colspan="1">
               NOMBRE DEL PATROCINADOR
              </td>

              <td colspan="1">

                <?=$comprobante6[$z]?>

              </td>

              <td class="enfacis__letras" colspan="1">
               NOMBRE DEL PROYECTO A SER PATROCINADO
              </td>

              <td colspan="1">
                
                <?=$nombre?>

              </td>

            </tr>


            <tr>

              <td class="enfacis__letras" colspan="1">
               RUC DEL PATROCINADOR
              </td>

              <td colspan="1">

                <?=$comprobante7[$z]?>

              </td>

              <td class="enfacis__letras" colspan="1">
                MONTO DEL PROYECTO
              </td>

              <td colspan="1">
                
                <?=$monto?>

              </td>

            </tr>

            <tr style="background-color: gray!important; color:white!important;">

              <td>

                CERTIFICADO:

              </td>

              <td>

                SI

              </td>


              <td>

                Código: 

              </td>


              <td>

                <?=$valor?>

              </td>

            </tr>

            <tr style="background-color:gray!important; color:white!important;">

              <td align="center" colspan="4">RAZONES DE LA CERTIFICACIÓN</td>

            </tr>

            <tr>

              <td colspan="4"  align="justify" style="padding-bottom:.5em!important;">

                Con el Informe previo y de recomendación afirmativa para la certificación de beneficiarios para acceder al incentivo tributario DF-2021-001 “<?=$nombre?>” emitido por la Dirección Financiera 


                RESOLUCIÓN 2:

                PPor decisión unánime del Comité de Calificación y Certificación para acceder al Incentivo Tributario se RESUELVE: Certificar los gastos de patrocinio para  <?php if (!empty($nombreCompleto)): ?> <?=$nombreCompleto?><?php else: ?><?=$nombreOrganismo?> en el proyecto <?php endif ?>“<?=$nombre?>”, por el patrocinador <?=$comprobante6[$z]?>


              </td>

            </tr>

            <?php endfor ?>
   
          <?php endif ?>

        <?php endforeach ?>

      </table>      
      
      
      <!--====  End of Certificación  ====-->
      
      <table class="tablas__bordes__necesarias" style="width:100%!important;">

        <tr>

          <td class="enfacis__letras" style="width: 20%!important;">
            Ministro del Deporte o su delegado
          </td>

          <td>


          </td>

        </tr>

        <tr>

          <td class="enfacis__letras" style="width: 20%!important;">
            Subsecretario de Deporte del Alto Rendimiento
          </td>

          <td>


          </td>

        </tr>

        <tr>

          <td class="enfacis__letras" style="width: 20%!important;">
            Subsecretaría de Desarrollo de la Actividad Física
          </td>

          <td>


          </td>

        </tr>

        <tr>

          <td class="enfacis__letras" style="width: 20%!important;">
            Coordinadora de Administración e Infraestructura Deportiva
          </td>

          <td>


          </td>

        </tr>

        <tr>

          <td class="enfacis__letras" style="width: 20%!important;">
            Coordinador General de Planificación y Gestión Estratégica
          </td>

          <td>


          </td>

        </tr>

        <tr>

          <td class="enfacis__letras" style="width: 20%!important;">        
            Coordinador General Administrativo Financiero
          </td>

          <td>


          </td>

        </tr>


      </table>

     </div>

   </body>

</html>  

<?php

   // Cargamos la librería dompdf que hemos instalado en la carpeta gdompdfd
   require_once '../../dompdf/autoload.inc.php';

   // llamar libreria dompdf
   use Dompdf\Dompdf;


  // Instanciamos un objeto de la clase DOMPDF.
  $pdf = new DOMPDF();
        
  // Definimos el tamaño y orientación del papel que queremos.h
  $pdf->set_paper("letter", "A4");
 //$pdf->set_paper(array(0,0,104,250));
        
  // Cargamos el contenido HTML.
  $pdf->load_html(ob_get_clean());
        
  // Renderizamos el documento PDF.
  $pdf->render();


  $canvas = $pdf->get_canvas(); 
  $canvas->page_text(510, 12, "Página {PAGE_NUM} de {PAGE_COUNT}","helvetica", 8, array(0,0,0)); //header//header
  $canvas->page_text(54, 778, "", "helvetica", 8, array(0,0,0)); //footer
          
  // obtener el valor generado
  $pdfGeneerado= $pdf->output();

  $control = fopen("../../documentos/actaCalificacionPrioridad/".$fecha_actual.".pdf","a");

  fwrite($control,$pdfGeneerado);

  $pdf->stream('actaCalificacionPrioridad.pdf');
