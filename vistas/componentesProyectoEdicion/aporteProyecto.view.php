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


  $alineacion=$objeto->ctrAlineacion($codigo);
  $arrayAlineacion = explode("___", $alineacion);

  $aporteProyecto=$objeto->ctrAporteProyecto($codigo);
  $arrayAporteProyecto = explode("___", $aporteProyecto);



?>

<form class="panel-body" id="aporteProyectoFormulario">

  <input type="hidden" id="codigoProyectoSecundario" name="codigoProyectoSecundario" value="<?php if ($arrayUsuario[0]==2): ?><?= $arrayUsuario[11]; ?><?php endif ?><?php if ($arrayUsuario[0]==3): ?><?= $arrayUsuario[13]; ?><?php endif ?>" />

  <!--=====================================================
  =            Contenido Principal formularios            =
  ======================================================-->
                      
  <div class="row">   


    <div class="col-sm-10 col-xs-10">

      <div class="rotulo__referencias">APORTE DEL PROYECTO</div>
                    
    </div>

    <div class="col-sm-2 col-xs-2 text-center">

      <span class="cursores__modales" data-toggle="modal" data-target="#modalEstrategiasRelacionadas"><i class="fas fa-question-circle"></i><br><div class="letras__precionar">Presionar para obtener un ejemplo sobre como llenar está sección</div></span>
                    
    </div>

  </div>   


  <br>

  <div class="row"> 

    <div class="col-sm-12 col-xs-12">

      <div class="rotulo__referencias" style="text-transform: uppercase;">ALINEACIÓN ESTRATÉGICA</div>

    </div>

  </div>

  <br>

  <!--======================================
  =            Línea Política 1            =
  =======================================-->
  
  <?php if ($arrayAlineacion[1]=="si"): ?>

  <div class="row"> 
      
    <div class="col-sm-12 col-xs-12">

      <div class="rotulo__referencias__color">Línea de Política 1: Integración de la estructura del sistema nacional del deporte, la educación física y la recreación</div>
                    
    </div>

    <?php if ($arrayAlineacion[4]=="si"): ?>

      <div class="col-sm-12 col-xs-12">

        <div class="rotulo__referencias__color__cursivas">Objetivo Estratégico 1: Contar con un marco jurídico funcional</div>

      </div>

      <!--=================================
      =            Estrategias           =
      ==================================-->

      <?php if ($arrayAlineacion[26]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Reestructuración de la normativa a partir de la reforma a la ley vigente que rija al sector</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[0])): ?>

              <textarea  id="objetivo1Linea1Item1" name="objetivo1Linea1Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

              <textarea  id="objetivo1Linea1Item1" name="objetivo1Linea1Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[0]; ?></textarea>
              
            <?php endif ?>

          </div>

        </div>

       <?php endif ?>
      
      
       <?php if ($arrayAlineacion[27]=="si"): ?>

          <div class="row">

            <div class="col-sm-4 col-xs-4">

              <div class="rotulo__centrado">Conformación de comités interinstitucionales y ciudadanos para hacer seguimiento y veeduría a la aplicación de la normativa legal vigente</div>

            </div>

            <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[1])): ?>

              <textarea  id="objetivo1Linea1Item2" name="objetivo1Linea1Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

              <textarea  id="objetivo1Linea1Item2" name="objetivo1Linea1Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[1];?></textarea>
              
            <?php endif ?>

            </div>

          </div>

       <?php endif ?>
      
       <?php if ($arrayAlineacion[28]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Integración de los actores directos e indirectos del DEFIRE en la propuesta de un marco jurídico que coadyuve a la gobernanza del sistema</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[2])): ?>

              <textarea  id="objetivo1Linea1Item3" name="objetivo1Linea1Item3" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

              <textarea  id="objetivo1Linea1Item3" name="objetivo1Linea1Item3" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[2];?></textarea>
              
            <?php endif ?>

          </div>

        </div>

       <?php endif ?>


      <!--====  End of Estrategias  ====-->
      
    <?php endif ?>


    <?php if ($arrayAlineacion[5]=="si"): ?>

      <div class="col-sm-12 col-xs-12">

        <div class="rotulo__referencias__color__cursivas">Objetivo Estratégico 2: Desarrollar un sistema de comunicación del DEFIRE</div>

      </div>

      <!--=================================
      =            Estrategias            =
      ==================================-->
      
       <?php if ($arrayAlineacion[29]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Implementación de planes de comunicación que fortalezcan la acciones del DEFIRE en todo el sector</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[3])): ?>

              <textarea  id="objetivo2Linea1Item1" name="objetivo2Linea1Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

              <textarea  id="objetivo2Linea1Item1" name="objetivo2Linea1Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[3];?></textarea>
              
            <?php endif ?>
            
          </div>

        </div>

       <?php endif ?>      
      
       <?php if ($arrayAlineacion[30]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Suscripción de convenios con universidades para prácticas pre profesionales de comunicación en las organizaciones del DEFIRE</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[4])): ?>

              <textarea  id="objetivo2Linea1Item2" name="objetivo2Linea1Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

              <textarea  id="objetivo2Linea1Item2" name="objetivo2Linea1Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[4];?></textarea>
              
            <?php endif ?>


          </div>

        </div>

       <?php endif ?>      


       <?php if ($arrayAlineacion[31]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Sensibilización de la comunidad para el cambio sobre la importancia de la práctica de la actividad física y el uso del tiempo libre</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[5])): ?>

               <textarea  id="objetivo2Linea1Item3" name="objetivo2Linea1Item3" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

               <textarea  id="objetivo2Linea1Item3" name="objetivo2Linea1Item3" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[5];?></textarea>
              
            <?php endif ?>

          </div>

        </div>

       <?php endif ?>      


       <?php if ($arrayAlineacion[32]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Fomento del uso de comunicación y nuevas tecnologías para la promoción del DEFIRE</div>

          </div>

          <div class="col-sm-8 col-xs-8">


            <?php if (empty($arrayAporteProyecto[6])): ?>

               <textarea  id="objetivo2Linea1Item4" name="objetivo2Linea1Item4" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

               <textarea  id="objetivo2Linea1Item4" name="objetivo2Linea1Item4" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[6];?></textarea>
              
            <?php endif ?>


          </div>

        </div>

       <?php endif ?>      

      <!--====  End of Estrategias  ====-->
    
    <?php endif ?>


    <?php if ($arrayAlineacion[6]=="si"): ?>

      <div class="col-sm-12 col-xs-12">

        <div class="rotulo__referencias__color__cursivas">Objetivo Estratégico 3: Instaurar un sistema de formación y actualización continua para los actores del DEFIRE</div>

      </div>

      <!--=================================
      =            Estrategias            =
      ==================================-->
      
       <?php if ($arrayAlineacion[33]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Desarrollo del plan nacional de capacitación de los actores del DEFIRE</div>

          </div>

          <div class="col-sm-8 col-xs-8">


            <?php if (empty($arrayAporteProyecto[7])): ?>

               <textarea  id="objetivo3Linea1Item1" name="objetivo3Linea1Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

               <textarea  id="objetivo3Linea1Item1" name="objetivo3Linea1Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[7];?></textarea>
              
            <?php endif ?>

          </div>

        </div>

       <?php endif ?>         
      

       <?php if ($arrayAlineacion[34]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Desarrollo de herramientas tecnológicas de fácil acceso para agilizar los proceso técnicos y administrativos de las organizaciones del sector DEFIRE</div>

          </div>

          <div class="col-sm-8 col-xs-8">


            <?php if (empty($arrayAporteProyecto[8])): ?>

               <textarea  id="objetivo3Linea1Item2" name="objetivo3Linea1Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

               <textarea  id="objetivo3Linea1Item2" name="objetivo3Linea1Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[8];?></textarea>
              
            <?php endif ?>           

          </div>

        </div>

       <?php endif ?>         

       <?php if ($arrayAlineacion[35]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Implementación de nuevas tecnologías TICS por medio de plataformas digitales y software</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[9])): ?>

              <textarea  id="objetivo3Linea1Item3" name="objetivo3Linea1Item3" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

               <textarea  id="objetivo3Linea1Item3" name="objetivo3Linea1Item3" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[9];?></textarea>
              
            <?php endif ?>       

          </div>

        </div>

       <?php endif ?>         


       <?php if ($arrayAlineacion[36]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Reforma de la normativa legal vigente para la profesionalización, exigiendo niveles educativos para ocupar cargos en el sector y su respectiva actualización</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[10])): ?>

              <textarea  id="objetivo3Linea1Item4" name="objetivo3Linea1Item4" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

               <textarea  id="objetivo3Linea1Item4" name="objetivo3Linea1Item4" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[10];?></textarea>
              
            <?php endif ?>      

          </div>

        </div>

       <?php endif ?>         


      <!--====  End of Estrategias  ====-->
  
      
    <?php endif ?>


    <?php if ($arrayAlineacion[7]=="si"): ?>

      <div class="col-sm-12 col-xs-12">

        <div class="rotulo__referencias__color__cursivas">Objetivo Estratégico 4: Implementar un sistema nacional de información del DEFIRE</div>

      </div>

      <!--=================================
      =            Estrategias            =
      ==================================-->
      
       <?php if ($arrayAlineacion[37]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Fortalecimiento de las organizaciones del DEFIRE en la generación, almacenamiento de información, estadísticas y análisis de datos, así como cogestores del desarrollo del sector</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[11])): ?>

               <textarea  id="objetivo4Linea1Item1" name="objetivo4Linea1Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

               <textarea  id="objetivo4Linea1Item1" name="objetivo4Linea1Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[11];?></textarea>
              
            <?php endif ?>      


          </div>

        </div>

       <?php endif ?>           
      
      <!--====  End of Estrategias  ====-->

    <?php endif ?>

    <?php if ($arrayAlineacion[8]=="si"): ?>

      <div class="col-sm-12 col-xs-12">

        <div class="rotulo__referencias__color__cursivas">Objetivo Estratégico 5: Lograr un modelo de coordinación y coparticipación interinstitucional del DEFIRE</div>

      </div>
      
      <!--=================================
      =            Estrategias            =
      ==================================-->
      
       <?php if ($arrayAlineacion[38]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Fortalecimiento de la corresponsabilidad interinstitucional e intersectorial y nuevos aliados estratégicos nacionales e internacionales</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[12])): ?>

               <textarea  id="objetivo5Linea1Item1" name="objetivo5Linea1Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>

              
            <?php else: ?>

               <textarea  id="objetivo5Linea1Item1" name="objetivo5Linea1Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[12];?></textarea>

              
            <?php endif ?>      


          </div>

        </div>

       <?php endif ?>      
     
      
      <!--====  End of Estrategias  ====-->
      

    <?php endif ?>

    <?php if ($arrayAlineacion[9]=="si"): ?>

      <div class="col-sm-12 col-xs-12">

        <div class="rotulo__referencias__color__cursivas">Objetivo Estratégico 6: Garantizar la participación ciudadana en la política pública del DEFIRE</div>

      </div>

      <!--=====================================
      =            Section comment            =
      ======================================-->
      
       <?php if ($arrayAlineacion[39]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Consolidación de mecanismos de participación ciudadana con filosofía de Gobiernos Abiertos</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[13])): ?>

                <textarea  id="objetivo6Linea1Item1" name="objetivo6Linea1Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>

              
            <?php else: ?>

                <textarea  id="objetivo6Linea1Item1" name="objetivo6Linea1Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[13];?></textarea>

              
            <?php endif ?>      

          </div>

        </div>

       <?php endif ?>     

       <?php if ($arrayAlineacion[40]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Generación de instrumentos técnicos y jurídicos que coadyuven eficazmente a la trasparencia y a la rendición de cuentas</div>

          </div>

          <div class="col-sm-8 col-xs-8">


            <?php if (empty($arrayAporteProyecto[14])): ?>

                <textarea  id="objetivo6Linea1Item2" name="objetivo6Linea1Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>

              
            <?php else: ?>

                <textarea  id="objetivo6Linea1Item2" name="objetivo6Linea1Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[14];?></textarea>
              
            <?php endif ?>      


          </div>

        </div>

       <?php endif ?>        
      
      <!--====  End of Section comment  ====-->
            
      
    <?php endif ?>

    <?php if ($arrayAlineacion[10]=="si"): ?>

      <div class="col-sm-12 col-xs-12">

        <div class="rotulo__referencias__color__cursivas">Objetivo Estratégico 7: Propiciar la investigación aplicada al DEFIRE</div>

      </div>

      <!--=================================
      =            Estrategias            =
      ==================================-->

       <?php if ($arrayAlineacion[41]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Creación del fondo nacional de investigación que dé directrices y cofinancie la investigación de acuerdo con las necesidades del DEFIRE</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[15])): ?>

                <textarea  id="objetivo7Linea1Item1" name="objetivo7Linea1Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>

              
            <?php else: ?>

                <textarea  id="objetivo7Linea1Item1" name="objetivo7Linea1Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[15];?></textarea>
              
            <?php endif ?>      

          </div>

        </div>

       <?php endif ?>        
      
       <?php if ($arrayAlineacion[42]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Implementación de un Centro d Estudios, Investigación y Capacitación de la Cultura Física responsable de llevar las estadísticas del sector a nivel nacional</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[16])): ?>

                <textarea  id="objetivo7Linea1Item2" name="objetivo7Linea1Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>

              
            <?php else: ?>

                <textarea  id="objetivo7Linea1Item2" name="objetivo7Linea1Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[16];?></textarea>
              
            <?php endif ?>     


          </div>

        </div>

       <?php endif ?>  


      <!--====  End of Estrategias  ====-->
      
      
    <?php endif ?>


    <?php if ($arrayAlineacion[11]=="si"): ?>

      <div class="col-sm-12 col-xs-12">

        <div class="rotulo__referencias__color__cursivas">Objetivo Estratégico 8: Lograr sostenibilidad financiera del sistema nacional del DEFIRE y sus organismos</div>

      </div>

      <!--=================================
      =            Estrategias            =
      ==================================-->
      
       <?php if ($arrayAlineacion[43]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Desarrollo de modelos de gestión de proyectos público – privado que favorezca la sostenibilidad del sector</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[17])): ?>

                 <textarea  id="objetivo8Linea1Item1" name="objetivo8Linea1Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>

              
            <?php else: ?>

                 <textarea  id="objetivo8Linea1Item1" name="objetivo8Linea1Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[17];?></textarea>
              
            <?php endif ?>    


          </div>

        </div>

       <?php endif ?>        
      
       <?php if ($arrayAlineacion[44]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Implementación de lineamientos que direccionen la efectividad en la administración y la gestión de los recursos que entrega el Estado a los organismos deportivos</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[18])): ?>

                  <textarea  id="objetivo8Linea1Item2" name="objetivo8Linea1Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>

              
            <?php else: ?>

                 <textarea  id="objetivo8Linea1Item2" name="objetivo8Linea1Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[18];?></textarea>
              
            <?php endif ?>    


          </div>

        </div>

       <?php endif ?>        


       <?php if ($arrayAlineacion[45]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Fortalecimiento del giro del negocio o actividad económica de los organismos del sector en pro de la auto-eficiencia y autogestión</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[19])): ?>

                  <textarea  id="objetivo8Linea1Item3" name="objetivo8Linea1Item3" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>

              
            <?php else: ?>

                 <textarea  id="objetivo8Linea1Item3" name="objetivo8Linea1Item3" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[19];?></textarea>
              
            <?php endif ?>    


          </div>

        </div>

       <?php endif ?>        


       <?php if ($arrayAlineacion[46]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Desarrollo de lineamientos y estímulos a los organismos del DEFIRE para fomentar la sostenibilidad financiera a través de la autogestión</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[20])): ?>

                  <textarea  id="objetivo8Linea1Item4" name="objetivo8Linea1Item4" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>

              
            <?php else: ?>

                 <textarea  id="objetivo8Linea1Item4" name="objetivo8Linea1Item4" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[20];?></textarea>
              
            <?php endif ?>    


          </div>

        </div>

       <?php endif ?>       


       <?php if ($arrayAlineacion[47]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Creación del fondo nacional de fomento al desarrollo del DEFIRE (FONDEFIRE)</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[21])): ?>

                 <textarea  id="objetivo8Linea1Item5" name="objetivo8Linea1Item5" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>

              
            <?php else: ?>

                <textarea  id="objetivo8Linea1Item5" name="objetivo8Linea1Item5" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[21];?></textarea>
              
            <?php endif ?>    

          </div>

        </div>

       <?php endif ?>   


      <!--====  End of Estrategias  ====-->
      
    <?php endif ?>

    <?php if ($arrayAlineacion[12]=="si"): ?>

      <div class="col-sm-12 col-xs-12">

        <div class="rotulo__referencias__color__cursivas">Objetivo Estratégico 9: Establecer modelos de gestión de calidad en los organismos del DEFIRE</div>

      </div>

      <!--=================================
      =            Estrategias            =
      ==================================-->
      
      
       <?php if ($arrayAlineacion[48]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Generación de lineamientos técnicos, administrativos, innovadores y eficientes</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[22])): ?>

                 <textarea  id="objetivo9Linea1Item1" name="objetivo9Linea1Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

                <textarea  id="objetivo9Linea1Item1" name="objetivo9Linea1Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[22];?></textarea>
              
            <?php endif ?>    


          </div>

        </div>

       <?php endif ?>   
      
      <!--====  End of Estrategias  ====-->
      

    <?php endif ?>

    <?php if ($arrayAlineacion[13]=="si"): ?>

      <div class="col-sm-12 col-xs-12">

        <div class="rotulo__referencias__color__cursivas">Objetivo Estratégico 10: Optimizar la infraestructura del DEFIRE</div>

      </div>

      <!--=================================
      =            Estrategias            =
      ==================================-->
      
       <?php if ($arrayAlineacion[49]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Desarrollo de modelos de gestión, protocolos y lineamientos administrativos y técnicos participativos</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[23])): ?>

                 <textarea  id="objetivo10Linea1Item1" name="objetivo10Linea1Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

                <textarea  id="objetivo10Linea1Item1" name="objetivo10Linea1Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[23];?></textarea>
              
            <?php endif ?>    


          </div>

        </div>

       <?php endif ?>         
      

       <?php if ($arrayAlineacion[50]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Fortalecimiento de los procesos de asociación público-privada y entes territoriales para la construcción y gestión de centros deportivos y recreativos, como parques bio saludables</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[24])): ?>

                <textarea  id="objetivo10Linea1Item2" name="objetivo10Linea1Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

                <textarea  id="objetivo10Linea1Item2" name="objetivo10Linea1Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[24];?></textarea>
              
            <?php endif ?>    

          </div>

        </div>

       <?php endif ?>         
      

       <?php if ($arrayAlineacion[51]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Coparticipación para la adecuación de parques, espacios públicos y lugares abiertos en mal estado, abandonados y deteriorados para la masificación DEFIRE</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[25])): ?>

                 <textarea  id="objetivo10Linea1Item3" name="objetivo10Linea1Item3" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

                 <textarea  id="objetivo10Linea1Item3" name="objetivo10Linea1Item3" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[25];?></textarea>
              
            <?php endif ?>    

          </div>

        </div>

       <?php endif ?>     


       <?php if ($arrayAlineacion[52]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Aprovechamiento de la infraestructura deportiva de los centros escolares nacionales para uso social comunitario</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[26])): ?>

                  <textarea  id="objetivo10Linea1Item4" name="objetivo10Linea1Item4" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

                  <textarea  id="objetivo10Linea1Item4" name="objetivo10Linea1Item4" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[26];?></textarea>
              
            <?php endif ?>    

          </div>

        </div>

       <?php endif ?>    

       <?php if ($arrayAlineacion[53]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Implementación de un banco de tierras para la construcción de obras de infraestructura del DEFIRE, en conjunto con los territorios </div>

          </div>

          <div class="col-sm-8 col-xs-8">


            <?php if (empty($arrayAporteProyecto[27])): ?>

                   <textarea  id="objetivo10Linea1Item5" name="objetivo10Linea1Item5" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

                   <textarea  id="objetivo10Linea1Item5" name="objetivo10Linea1Item5" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[27];?></textarea>
              
            <?php endif ?>    

          </div>

        </div>

       <?php endif ?>    



      <!--====  End of Estrategias  ====-->
    
    <?php endif ?>

    <?php if ($arrayAlineacion[14]=="si"): ?>

      <div class="col-sm-12 col-xs-12">

        <div class="rotulo__referencias__color__cursivas">Objetivo Estratégico 11: Lograr un modelo de coordinación y coparticipación interinstitucional del DEFIRE</div>

      </div>
      
      <!--=================================
      =            Estrategias            =
      ==================================-->
      
      <?php if ($arrayAlineacion[54]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Implementación de programas de fomento y promoción del voluntariado</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[28])): ?>

                   <textarea  id="objetivo11Linea1Item1" name="objetivo11Linea1Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

                   <textarea  id="objetivo11Linea1Item1" name="objetivo11Linea1Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[28];?></textarea>
              
            <?php endif ?>    

          </div>

        </div>

       <?php endif ?>    

       <?php if ($arrayAlineacion[55]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Fomento de estructuras organizativas que se encarguen de canalizar acciones en el campo del voluntariado</div>

          </div>

          <div class="col-sm-8 col-xs-8">


            <?php if (empty($arrayAporteProyecto[29])): ?>

                    <textarea  id="objetivo11Linea1Item2" name="objetivo11Linea1Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

                    <textarea  id="objetivo11Linea1Item2" name="objetivo11Linea1Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[29];?></textarea>
              
            <?php endif ?>    


          </div>

        </div>

       <?php endif ?>       
      
      <!--====  End of Estrategias  ====-->
      

    <?php endif ?>

  </div>  
        
  <?php endif ?> 
  
  <!--====  End of Línea Política 1  ====-->
  
  <!--======================================
  =            Línea Política 2            =
  =======================================-->
  
  <?php if ($arrayAlineacion[2]=="si"): ?>

  <div class="row"> 
      
    <div class="col-sm-12 col-xs-12">

      <div class="rotulo__referencias__color">Línea de Política 2: Generar e impulsar la cultura física para el bienestar activo de la población con inclusión social e igualdad de género.</div>
                    
    </div>

    <?php if ($arrayAlineacion[15]=="si"): ?>

      <div class="col-sm-12 col-xs-12">

        <div class="rotulo__referencias__color__cursivas">Objetivo Estratégico 1: Conseguir que los ciudadanos adopten la cultura física</div>

      </div>

      <!--=================================
      =            Estrategias            =
      ==================================-->

       <?php if ($arrayAlineacion[56]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Implementación de la certificación activa y saludable (Municipios, colegios, instituciones públicas y privadas, entre otros)</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[30])): ?>

                    <textarea  id="objetivo1Linea2Item1" name="objetivo1Linea2Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

                    <textarea  id="objetivo1Linea2Item1" name="objetivo1Linea2Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[30];?></textarea>
              
            <?php endif ?>    


          </div>

        </div>

       <?php endif ?>           
      
        <?php if ($arrayAlineacion[57]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Promoción de iniciativas públicas y privadas de prescripción de la actividad física como factor de prevención en salud para un bienestar activo</div>

          </div>

          <div class="col-sm-8 col-xs-8">


            <?php if (empty($arrayAporteProyecto[31])): ?>

                   <textarea  id="objetivo1Linea2Item2" name="objetivo1Linea2Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

                  <textarea  id="objetivo1Linea2Item2" name="objetivo1Linea2Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[31];?></textarea>
              
            <?php endif ?>    


          </div>

        </div>

       <?php endif ?>           
      
        <?php if ($arrayAlineacion[58]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Fomento de la coparticipación y corre acción de iniciativas locales para el desarrollo del DEFIRE, como programas de desplazamiento activo</div>

          </div>

          <div class="col-sm-8 col-xs-8">


            <?php if (empty($arrayAporteProyecto[32])): ?>

                   <textarea  id="objetivo1Linea2Item3" name="objetivo1Linea2Item3" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

                  <textarea  id="objetivo1Linea2Item3" name="objetivo1Linea2Item3" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[32];?></textarea>
              
            <?php endif ?>    


          </div>

        </div>

       <?php endif ?>           
      
        <?php if ($arrayAlineacion[59]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Sensibilización a todos los actores del sistema en la búsqueda de modelos de desarrollo sustentable y sostenible en todos los ámbitos</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[33])): ?>

                 <textarea  id="objetivo1Linea2Item4" name="objetivo1Linea2Item4" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

                <textarea  id="objetivo1Linea2Item4" name="objetivo1Linea2Item4" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[33];?></textarea>
              
            <?php endif ?>    


          </div>

        </div>

       <?php endif ?>      

      <!--====  End of Estrategias  ====-->
      

    <?php endif ?>

    <?php if ($arrayAlineacion[16]=="si"): ?>

      <div class="col-sm-12 col-xs-12">

        <div class="rotulo__referencias__color__cursivas">Objetivo Estratégico 2: Posicionar al país como sede de eventos internacionales del DEFIRE</div>

      </div>

      <!--=================================
      =            Estrategias            =
      ==================================-->
      
      <?php if ($arrayAlineacion[60]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Estímulo para el desarrollo de eventos internacionales del DEFIRE en conjunto con los entes territoriales, organismos deportivos, e instituciones públicas y privadas</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[34])): ?>

                  <textarea  id="objetivo2Linea2Item1" name="objetivo2Linea2Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

                 <textarea  id="objetivo2Linea2Item1" name="objetivo2Linea2Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[34];?></textarea>
              
            <?php endif ?>    

          </div>

        </div>

       <?php endif ?>    
      
      <?php if ($arrayAlineacion[61]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Preparación de la dirigencia ecuatoriana en liderazgo para el posicionamiento a nivel internacional</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[35])): ?>

                  <textarea  id="objetivo2Linea2Item2" name="objetivo2Linea2Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

                <textarea  id="objetivo2Linea2Item2" name="objetivo2Linea2Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[35];?></textarea>
              
            <?php endif ?>    

          </div>

        </div>

       <?php endif ?>    

      <?php if ($arrayAlineacion[62]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Desarrollo de programas que resalte la labor de los atletas, entrenadores, dirigentes y voluntariado, a través del reconocimiento local, zonal, nacional e internacional</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[36])): ?>

                  <textarea  id="objetivo2Linea2Item3" name="objetivo2Linea2Item3" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

                <textarea  id="objetivo2Linea2Item3" name="objetivo2Linea2Item3" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[36];?></textarea>
              
            <?php endif ?>    


          </div>

        </div>

       <?php endif ?>    


      <!--====  End of Estrategias  ====-->
      
      
    <?php endif ?>

    <?php if ($arrayAlineacion[17]=="si"): ?>

      <div class="col-sm-12 col-xs-12">

        <div class="rotulo__referencias__color__cursivas">Objetivo Estratégico 3: Promover la práctica de la educación física en el sistema educativo</div>

      </div>
      
      <!--=================================
      =            Estrategias            =
      ==================================-->

       <?php if ($arrayAlineacion[63]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Implementación de la oferta de programas incluyentes para la oferta de programas incluyentes para la población estudiantil</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[37])): ?>

                 <textarea  id="objetivo3Linea2Item1" name="objetivo3Linea2Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

                <textarea  id="objetivo3Linea2Item1" name="objetivo3Linea2Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[37];?></textarea>
              
            <?php endif ?>    


          </div>

        </div>

       <?php endif ?>         
      
       <?php if ($arrayAlineacion[64]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Implementación de centros especializados de educación física incluyente en alianza con los gobiernos locales y empresa privada</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[38])): ?>

                  <textarea  id="objetivo3Linea2Item2" name="objetivo3Linea2Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

                 <textarea  id="objetivo3Linea2Item2" name="objetivo3Linea2Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[38];?></textarea>

            <?php endif ?>    


          </div>

        </div>

       <?php endif ?>         

      <?php if ($arrayAlineacion[65]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Implementación de eventos deportivos incluyentes que permitan la integración del sistema</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[39])): ?>

                 <textarea  id="objetivo3Linea2Item3" name="objetivo3Linea2Item3" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

                <textarea  id="objetivo3Linea2Item3" name="objetivo3Linea2Item3" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[39];?></textarea>

            <?php endif ?>    

          </div>

        </div>

       <?php endif ?>         


      <!--====  End of Estrategias  ====-->
      


    <?php endif ?>

    <?php if ($arrayAlineacion[18]=="si"): ?>

      <div class="col-sm-12 col-xs-12">

        <div class="rotulo__referencias__color__cursivas">Objetivo Estratégico 4: Incrementar la oferta de programas para cada grupo etario</div>

      </div>
      
        <!--=================================
        =            Estrategias            =
        ==================================-->

        <?php if ($arrayAlineacion[66]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Masificación del DEFIRE con una amplia gama de oferta de programas por grupo etario</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[40])): ?>

                <textarea  id="objetivo4Linea2Item1" name="objetivo4Linea2Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

              <textarea  id="objetivo4Linea2Item1" name="objetivo4Linea2Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[40];?></textarea>

            <?php endif ?>    


          </div>

        </div>

        <?php endif ?>    

        <?php if ($arrayAlineacion[67]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Gama de oferta de programas para personas con discapacidad</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[41])): ?>

               <textarea  id="objetivo4Linea2Item2" name="objetivo4Linea2Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

              <textarea  id="objetivo4Linea2Item1" name="objetivo4Linea2Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" <textarea  id="objetivo4Linea2Item2" name="objetivo4Linea2Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[41];?></textarea>

            <?php endif ?>    

          </div>

        </div>

        <?php endif ?>    


        <!--====  End of Estrategias  ====-->


    <?php endif ?>


  </div>  
        
  <?php endif ?> 
  
  <!--====  End of Línea Política 2  ====-->
  
  <!--======================================
  =            Línea Política 3            =
  =======================================-->

  <?php if ($arrayAlineacion[3]=="si"): ?>

  <div class="row"> 
      
    <div class="col-sm-12 col-xs-12">

      <div class="rotulo__referencias__color">Línea de Política 3: Liderazgo y posicionamiento internacional del país a través de la consecución de logros deportivos</div>
                    
    </div>


    <?php if ($arrayAlineacion[19]=="si"): ?>

      <div class="col-sm-12 col-xs-12">

        <div class="rotulo__referencias__color__cursivas">Objetivo Estratégico 1: Mejorar significativamente las posiciones</div>

      </div>

      <!--=================================
      =            Estrategias            =
      ==================================-->

      <?php if ($arrayAlineacion[68]=="si"): ?>

        <div class="row">

          <div class="col-sm-4 col-xs-4">

            <div class="rotulo__centrado">Desarrollo de lineamientos y criterios técnicos que permitan la priorización de deportes, atletas y eventos</div>

          </div>

          <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[42])): ?>

               <textarea  id="objetivo1Linea3Item1" name="objetivo1Linea3Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

              <textarea  id="objetivo1Linea3Item1" name="objetivo1Linea3Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[42];?></textarea>

            <?php endif ?>    


          </div>

        </div>

        <?php endif ?>        

        <?php if ($arrayAlineacion[69]=="si"): ?>

          <div class="row">

            <div class="col-sm-4 col-xs-4">

              <div class="rotulo__centrado">Establecimiento de lineamientos para la creación de un sistema de ciencias aplicadas al deporte convencional y adaptado</div>

            </div>

            <div class="col-sm-8 col-xs-8">

            <?php if (empty($arrayAporteProyecto[43])): ?>

               <textarea  id="objetivo1Linea3Item2" name="objetivo1Linea3Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
              
            <?php else: ?>

              <textarea  id="objetivo1Linea3Item2" name="objetivo1Linea3Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[43];?></textarea>

            <?php endif ?>    

              
            </div>

          </div>

          <?php endif ?>         
      

          <?php if ($arrayAlineacion[70]=="si"): ?>

            <div class="row">

              <div class="col-sm-4 col-xs-4">

                <div class="rotulo__centrado">Establecimiento de lineamientos para la creación de un sistema de seguimiento técnico y metodológico desde la base, desarrollo y alto nivel competitivo</div>

              </div>

              <div class="col-sm-8 col-xs-8">

              <?php if (empty($arrayAporteProyecto[44])): ?>

                 <textarea  id="objetivo1Linea3Item3" name="objetivo1Linea3Item3" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
                
              <?php else: ?>

                <textarea  id="objetivo1Linea3Item3" name="objetivo1Linea3Item3" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[44];?></textarea>

              <?php endif ?>    
                
              </div>

            </div>

            <?php endif ?>   


          <?php if ($arrayAlineacion[71]=="si"): ?>

            <div class="row">

              <div class="col-sm-4 col-xs-4">

                <div class="rotulo__centrado">Implementación de programas de apoyo al alto rendimiento en todo el país</div>

              </div>

              <div class="col-sm-8 col-xs-8">

              <?php if (empty($arrayAporteProyecto[45])): ?>

                 <textarea  id="objetivo1Linea3Item4" name="objetivo1Linea3Item4" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
                
              <?php else: ?>

                <textarea  id="objetivo1Linea3Item4" name="objetivo1Linea3Item4" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[45];?></textarea>

              <?php endif ?>    


              </div>

            </div>

            <?php endif ?>   

            <?php if ($arrayAlineacion[72]=="si"): ?>

              <div class="row">

                <div class="col-sm-4 col-xs-4">

                  <div class="rotulo__centrado">Implementación de un programa nacional de estímulos económicos por resultados deportivos</div>

                </div>

                <div class="col-sm-8 col-xs-8">

                  <?php if (empty($arrayAporteProyecto[46])): ?>

                     <textarea  id="objetivo1Linea3Item5" name="objetivo1Linea3Item5" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
                    
                  <?php else: ?>

                    <textarea  id="objetivo1Linea3Item5" name="objetivo1Linea3Item5" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[46];?></textarea>

                  <?php endif ?>    

                </div>

              </div>

              <?php endif ?>   

              <?php if ($arrayAlineacion[73]=="si"): ?>

              <div class="row">

                <div class="col-sm-4 col-xs-4">

                  <div class="rotulo__centrado">Implementación de un programa nacional de pensión vitalicia para atletas convencionales y con discapacidad en retiro deportivo</div>

                </div>

                <div class="col-sm-8 col-xs-8">

                  <?php if (empty($arrayAporteProyecto[47])): ?>

                      <textarea  id="objetivo1Linea3Item6" name="objetivo1Linea3Item6" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
                    
                  <?php else: ?>

                     <textarea  id="objetivo1Linea3Item6" name="objetivo1Linea3Item6" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[47];?></textarea>

                  <?php endif ?>    

                </div>

              </div>

              <?php endif ?>   


      <!--====  End of Estrategias  ====-->
      
    <?php endif ?>


    <?php if ($arrayAlineacion[20]=="si"): ?>

      <div class="col-sm-12 col-xs-12">

        <div class="rotulo__referencias__color__cursivas">Objetivo Estratégico 2: Implementar un sistema nacional de preparación y competición</div>

      </div>
      
      <!--=================================
      =            Estrategias            =
      ==================================-->

      <?php if ($arrayAlineacion[74]=="si"): ?>

      <div class="row">

        <div class="col-sm-4 col-xs-4">

          <div class="rotulo__centrado">Implementación de un modelo nacional de competiciones</div>

        </div>

        <div class="col-sm-8 col-xs-8">

          <?php if (empty($arrayAporteProyecto[48])): ?>

            <textarea  id="objetivo2Linea3Item1" name="objetivo2Linea3Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
                    
          <?php else: ?>

            <textarea  id="objetivo2Linea3Item1" name="objetivo2Linea3Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[48];?></textarea>

          <?php endif ?>    

        </div>

      </div>

      <?php endif ?>   

      <?php if ($arrayAlineacion[75]=="si"): ?>

      <div class="row">

        <div class="col-sm-4 col-xs-4">

          <div class="rotulo__centrado">Diseño de lineamientos nacionales de uso de los CEAR para el desarrollo, tecnificación y maestría deportiva</div>

        </div>

        <div class="col-sm-8 col-xs-8">

          <?php if (empty($arrayAporteProyecto[49])): ?>

            <textarea  id="objetivo2Linea3Item2" name="objetivo2Linea3Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
                    
          <?php else: ?>

            <textarea  id="objetivo2Linea3Item2" name="objetivo2Linea3Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[49];?></textarea>

          <?php endif ?>    

        </div>

      </div>

      <?php endif ?>   


      <!--====  End of Estrategias  ====-->


    <?php endif ?>

    <?php if ($arrayAlineacion[21]=="si"): ?>

      <div class="col-sm-12 col-xs-12">

        <div class="rotulo__referencias__color__cursivas">Objetivo Estratégico 3: Incrementar la población de atletas convencionales y con discapacidad con resultados deportivos a nivel regional, continental y mundial</div>

      </div>
      
      <!--=================================
      =            Estrategias            =
      ==================================-->
      
      <?php if ($arrayAlineacion[76]=="si"): ?>

      <div class="row">

        <div class="col-sm-4 col-xs-4">

          <div class="rotulo__centrado">Estructuración de un modelo nacional de detección selección, capacitación y desarrollo de atletas convencionales y con discapacidad</div>

        </div>

        <div class="col-sm-8 col-xs-8">

          <?php if (empty($arrayAporteProyecto[50])): ?>

            <textarea  id="objetivo3Linea3Item1" name="objetivo3Linea3Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
                    
          <?php else: ?>

            <textarea  id="objetivo3Linea3Item1" name="objetivo3Linea3Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[50];?></textarea>

          <?php endif ?>    

        </div>

      </div>

      <?php endif ?>         
      
      <?php if ($arrayAlineacion[77]=="si"): ?>

      <div class="row">

        <div class="col-sm-4 col-xs-4">

          <div class="rotulo__centrado">Fomento y promoción de clubes deportivos convencional y adaptado como cédula del desarrollo deportivo </div>

        </div>

        <div class="col-sm-8 col-xs-8">

          <?php if (empty($arrayAporteProyecto[51])): ?>

            <textarea  id="objetivo3Linea3Item2" name="objetivo3Linea3Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
                    
          <?php else: ?>

            <textarea  id="objetivo3Linea3Item2" name="objetivo3Linea3Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[51];?></textarea>

          <?php endif ?>    

        </div>

      </div>

      <?php endif ?>     

      <?php if ($arrayAlineacion[78]=="si"): ?>

      <div class="row">

        <div class="col-sm-4 col-xs-4">

          <div class="rotulo__centrado">Estructuración de planes, programas o proyectos para profesionalizar la labor del entrenador, dirigentes y grupo multidisciplinario</div>

        </div>

        <div class="col-sm-8 col-xs-8">

          <?php if (empty($arrayAporteProyecto[52])): ?>

            <textarea  id="objetivo3Linea3Item3" name="objetivo3Linea3Item3" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
                    
          <?php else: ?>

            <textarea  id="objetivo3Linea3Item3" name="objetivo3Linea3Item3" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[52];?></textarea>

          <?php endif ?>  


        </div>

      </div>

      <?php endif ?>    


      <!--====  End of Estrategias  ====-->
      

    <?php endif ?>

    <?php if ($arrayAlineacion[22]=="si"): ?>

      <div class="col-sm-12 col-xs-12">

        <div class="rotulo__referencias__color__cursivas">Objetivo Estratégico 4: Implementar las acciones del control dopaje en las delegaciones nacionales que representen al país</div>

      </div>
      
      <!--=================================
      =            Estrategias            =
      ==================================-->

      <?php if ($arrayAlineacion[79]=="si"): ?>

      <div class="row">

        <div class="col-sm-4 col-xs-4">

          <div class="rotulo__centrado">Implementación de un modelo de gestión de toma de muestras en competición y fuera de competición</div>

        </div>

        <div class="col-sm-8 col-xs-8">

          <?php if (empty($arrayAporteProyecto[53])): ?>

            <textarea  id="objetivo4Linea3Item1" name="objetivo4Linea3Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
                    
          <?php else: ?>

            <textarea  id="objetivo4Linea3Item1" name="objetivo4Linea3Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[53];?></textarea>

          <?php endif ?>  

        </div>

      </div>

      <?php endif ?>    
     
      <?php if ($arrayAlineacion[80]=="si"): ?>

      <div class="row">

        <div class="col-sm-4 col-xs-4">

          <div class="rotulo__centrado">Incremento de Oficiales de Control Dopaje en todo el país</div>

        </div>

        <div class="col-sm-8 col-xs-8">

          <?php if (empty($arrayAporteProyecto[54])): ?>

             <textarea  id="objetivo4Linea3Item2" name="objetivo4Linea3Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
                    
          <?php else: ?>

             <textarea  id="objetivo4Linea3Item2" name="objetivo4Linea3Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[54];?></textarea>

          <?php endif ?>  

        </div>

      </div>

      <?php endif ?>    
     

      <!--====  End of Estrategias  ====-->
      

    <?php endif ?>

    <?php if ($arrayAlineacion[23]=="si"): ?>

      <div class="col-sm-12 col-xs-12">

        <div class="rotulo__referencias__color__cursivas">Objetivo Estratégico 5: Potenciar un sistema nacional de educación y prevención temprana del dopaje</div>

      </div>

      <!--=================================
      =            Estrategias            =
      ==================================-->
     
      <?php if ($arrayAlineacion[81]=="si"): ?>

      <div class="row">

        <div class="col-sm-4 col-xs-4">

          <div class="rotulo__centrado">Planificación e implementación de un modelo de capacitación nacional que involucre los diferentes medios tecnológicos disponibles</div>

        </div>

        <div class="col-sm-8 col-xs-8">

          <?php if (empty($arrayAporteProyecto[55])): ?>

             <textarea  id="objetivo5Linea3Item1" name="objetivo5Linea3Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
                    
          <?php else: ?>

             <textarea  id="objetivo5Linea3Item1" name="objetivo5Linea3Item1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[55];?></textarea>

          <?php endif ?>  

        </div>

      </div>

      <?php endif ?>    
           
      <?php if ($arrayAlineacion[82]=="si"): ?>

      <div class="row">

        <div class="col-sm-4 col-xs-4">

          <div class="rotulo__centrado">Implementación de charlas de control dopaje en las instituciones educativas</div>

        </div>

        <div class="col-sm-8 col-xs-8">


          <?php if (empty($arrayAporteProyecto[56])): ?>

              <textarea  id="objetivo5Linea3Item2" name="objetivo5Linea3Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
                    
          <?php else: ?>

             <textarea  id="objetivo5Linea3Item2" name="objetivo5Linea3Item2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[56];?></textarea>

          <?php endif ?>  


        </div>

      </div>

      <?php endif ?>    


      <!--====  End of Estrategias  ====-->
      
      
    <?php endif ?>



  </div>  
        
  <?php endif ?>
                      

  <!--====  End of Línea Política 3  ====-->

  <br>

  <div class="row"> 

    <div class="col-sm-12 col-xs-12">

      <div class="rotulo__referencias" style="text-transform: uppercase;">Plan Estratégico del Ministerio del Deporte</div>

    </div>

  </div>

  <br>

  <!--=======================================================
  =            Objetivo secretaría del deporte 1            =
  ========================================================-->
  
  <?php if ($arrayAlineacion[24]=="si"): ?>

    <div class="row"> 

      <div class="col-sm-12 col-xs-12">

        <div class="rotulo__referencias__color">Objetivo Estratégico Institucional 1: Incrementar la práctica de la cultura física en la población del Ecuador</div>

      </div>

    </div>

    <!--=================================
    =            Estrategias            =
    ==================================-->

    <?php if ($arrayAlineacion[83]=="si"): ?>

      <div class="row">

        <div class="col-sm-4 col-xs-4">

          <div class="rotulo__centrado">Crear e implementar la Política Pública de la Cultura Física</div>

        </div>

        <div class="col-sm-8 col-xs-8">

          <?php if (empty($arrayAporteProyecto[57])): ?>

              <textarea  id="objetivo1Institucionaltem1" name="objetivo1Institucionaltem1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
                    
          <?php else: ?>

             <textarea  id="objetivo1Institucionaltem1" name="objetivo1Institucionaltem1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[57];?></textarea>

          <?php endif ?>  


        </div>

      </div>

      <?php endif ?>

     <?php if ($arrayAlineacion[84]=="si"): ?>

      <div class="row">

        <div class="col-sm-4 col-xs-4">

          <div class="rotulo__centrado">Generar mecanismos de accesibilidad a la práctica de actividad física en igualdad de condiciones y oportunidades</div>

        </div>

        <div class="col-sm-8 col-xs-8">

          <?php if (empty($arrayAporteProyecto[58])): ?>

              <textarea  id="objetivo1Institucionaltem2" name="objetivo1Institucionaltem2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
                    
          <?php else: ?>

             <textarea  id="objetivo1Institucionaltem2" name="objetivo1Institucionaltem2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[58];?></textarea>

          <?php endif ?>  


        </div>

      </div>

      <?php endif ?>     

     <?php if ($arrayAlineacion[85]=="si"): ?>

      <div class="row">

        <div class="col-sm-4 col-xs-4">

          <div class="rotulo__centrado">Fortalecer el desarrollo formativo de la práctica deportiva en la población</div>

        </div>

        <div class="col-sm-8 col-xs-8">

          <?php if (empty($arrayAporteProyecto[59])): ?>

              <textarea  id="objetivo1Institucionaltem3" name="objetivo1Institucionaltem3" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
                    
          <?php else: ?>

             <textarea  id="objetivo1Institucionaltem3" name="objetivo1Institucionaltem3" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[59];?></textarea>

          <?php endif ?>  

        </div>

      </div>

      <?php endif ?>     

    
    <!--====  End of Estrategias  ====-->
    

  <?php endif ?>
  
  <!--====  End of Objetivo secretaría del deporte 1  ====-->
  

  <!--=======================================================
  =            Objetivo secretaría del deporte 2            =
  ========================================================-->
  
  <?php if ($arrayAlineacion[25]=="si"): ?>

    <div class="row"> 

      <div class="col-sm-12 col-xs-12">

        <div class="rotulo__referencias__color">Objetivo Estratégico Institucional 2: Incrementar el rendimiento de los atletas en la consecución de logros deportivos</div>

      </div>

    </div>

    <!--=================================
    =            Estrategias            =
    ==================================-->

     <?php if ($arrayAlineacion[86]=="si"): ?>

      <div class="row">

        <div class="col-sm-4 col-xs-4">

          <div class="rotulo__centrado">Implementar un sistema nacional de priorización de deportes en coordinación con el Sistema Nacional de Cultura Física</div>

        </div>

        <div class="col-sm-8 col-xs-8">

          <?php if (empty($arrayAporteProyecto[60])): ?>

               <textarea  id="objetivo2Institucionaltem1" name="objetivo2Institucionaltem1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
                    
          <?php else: ?>

              <textarea  id="objetivo2Institucionaltem1" name="objetivo2Institucionaltem1" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[60];?></textarea>

          <?php endif ?>  


        </div>

      </div>

      <?php endif ?>        
    
      <?php if ($arrayAlineacion[87]=="si"): ?>

      <div class="row">

        <div class="col-sm-4 col-xs-4">

          <div class="rotulo__centrado">Renovar el Plan de Alto Rendimiento con proyección a incrementar logros deportivos</div>

        </div>

        <div class="col-sm-8 col-xs-8">


          <?php if (empty($arrayAporteProyecto[61])): ?>

                <textarea  id="objetivo2Institucionaltem2" name="objetivo2Institucionaltem2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
                    
          <?php else: ?>

                <textarea  id="objetivo2Institucionaltem2" name="objetivo2Institucionaltem2" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[61];?></textarea>

          <?php endif ?>  

        </div>

      </div>

      <?php endif ?>   

      <?php if ($arrayAlineacion[88]=="si"): ?>

      <div class="row">

        <div class="col-sm-4 col-xs-4">

          <div class="rotulo__centrado">Organizar eventos del ciclo olímpico y paralímpico</div>

        </div>

        <div class="col-sm-8 col-xs-8">


          <?php if (empty($arrayAporteProyecto[62])): ?>

                <textarea  id="objetivo2Institucionaltem3" name="objetivo2Institucionaltem3" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"></textarea>
                    
          <?php else: ?>

                <textarea  id="objetivo2Institucionaltem3" name="objetivo2Institucionaltem3" class="obligatorios__elementos__relacion cantidad__minima text__areas" placeholder="Describir como el proyecto contribuye a la sociedad y a las estrategia seleccionada"><?= $arrayAporteProyecto[62];?></textarea>

          <?php endif ?>  


        </div>

      </div>

      <?php endif ?>   



    <!--====  End of Estrategias  ====-->
    

  <?php endif ?>
  
  <!--====  End of Objetivo secretaría del deporte 2  ====-->

  <!--====  End of Contenido Principal formularios  ====-->
          
  <div class="row">

    <div class="col-xs-12 col-sm-12 text-center">

      <button type="button" id="enviarAporte" name="enviarAporte" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;GUARDAR</button>

      <div class="enviarDatosGenerales__reload"></div>

    </div>

  </div>

</form>

<!--=============================
=            Modales            =
==============================-->
<div class="modal fade" id="modalEstrategiasRelacionadas">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header" style="background:white!important; color:black!important;">

        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bold;">Recomendación</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative; top:-18px;">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body body__preguntas">

         <div>
           Describir como el proyecto contribuye a la sociedad y a las estrategias seleccionadas en la Alineación estratégica
         </div>

      </div>


    </div>

  </div>

</div>


<!--====  End of Modales  ====-->
