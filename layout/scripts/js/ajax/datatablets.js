/*=================================================
=            Tablas usuarios proyectos            =
=================================================*/


$(document).on("ready",function(){

  listarProyectosUsuarios();

});


var listarProyectosUsuarios=function(){

   var tableProyectosUsuarios =$("#tablaProyectosUsuarios").DataTable({

          "language": 
        {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "No existen datos",
        "oPaginate": 
        {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
          },
          "oAria": 
          {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      },
      "bLengthChange": false,
      "pagingType": "full_numbers",
      "sScrollY": "400px",
      "Paginate": true,
      "scrollX": true,
      "pagingType": "full_numbers",
      "ajax":{
      "method":"POST",
      "url":"modelosBd/datatablets/reporProyectosUsuarios.php", 
      "data": { 
          "idUsuario": $("#idUsuario").val()
       }     
      },
      "order": [[ 0, "desc" ]],
      "columns":[


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['fecha']+"</div>";
          
                }

            },


            {"render":

                function ( data, type, row ) {

               
                  var nombreProyecto="<div class='nombre__proyectos'>"+row['nombre']+"<br>"+row['codigo']+"</div>";

                  var linea="<div class='linea__realizadas'></div>";

                  var circulo1='<div class="flex flexbottom consultarInformacionGeneral" style="cursor:pointer;" data-toggle="modal" data-target="#proyectoPrincipal"><h1 class="stepNumber">01&nbsp;Enviado</h1><div class="imgbox circulo__1__sin"><i class="fas fa-file-import letras__internas"></i></div></div>';

                  var circulo1Sin='<div class="flex flexbottom consultarInformacionGeneral" style="cursor:pointer;" data-toggle="modal" data-target="#proyectoPrincipal"><h1 class="stepNumber">01&nbsp;Enviado</h1><div class="imgbox circulo__1__sin"><i class="fas fa-file-import letras__internas"></i></div></div>';

                  var circuloRevision='<div class="flex flextop consultarInformacionGeneral" style="cursor:pointer;" data-toggle="modal" data-target="#proyectoPrincipal"><div class="imgbox circulo__2__sin"><i class="fas fa-user-edit letras__internas"></i></div> <h1 class="stepNumber" style="top:1em;">02 Revisión</h1></div>';

                  var circuloObservacion='<div class="flex flextop consultarInformacionGeneral" style="cursor:pointer;" data-toggle="modal" data-target="#proyectoPrincipal"><div class="imgbox circulo__2__sin"><i class="fas fa-binoculars letras__internas"></i></div><h1 class="stepNumber" style="top:1em; width:340%;">02 Observado</h1></div>';

                  var circuloRectificacion="<div><button class='consultarInformacionGeneral circulo__2__sin' data-toggle='modal' data-target='#proyectoPrincipal' >EN<br>REVISIÓN</button></div>";

                  var circuloCalificacion='<div class="flex flexbottom consultarInformacionGeneral" style="cursor:pointer;" data-toggle="modal" data-target="#proyectoPrincipal"><h1 class="stepNumber">03&nbsp;Calificado</h1><div class="imgbox circulo__1__sin" ><i class="fas fa-binoculars" style="font-size:20px;"></i></div></div>';

                   var circuloCertificado='<div class="flex flextop consultarInformacionGeneral" style="cursor:pointer;" data-toggle="modal" data-target="#proyectoPrincipal"><div class="imgbox circulo__2__sin"><i class="fas fa-thumbs-up letras__internas"></i></div><h1 class="stepNumber" style="top:1em; width:340%;">04 Certificado</h1></div>';
                      
                  var circulo2="<div style='width:75px;height:75px;padding:.5em;border-radius:50%;background:#eeeeee; font-size:8px; font-weight:bold; color:white; display:flex; align-items:center; justify-content:center; cursor:pointer;'></div>";

                  var circuloRecomendacion="<div><button class='consultarInformacionGeneral' style='width:75px;height:75px;padding:.5em;border-radius:50%;background:#0d47a1; font-size:8px; font-weight:bold; color:white; display:flex; align-items:center; justify-content:center; cursor:pointer; border:2px solid red;' data-toggle='modal' data-target='#proyectoPrincipal' >RECOMENDADO</button></div>";

                   var circuloSegumiento='<div class="flex flexbottom consultarInformacionGeneral" style="cursor:pointer;" data-toggle="modal" data-target="#proyectoPrincipal"><h1 class="stepNumber">01&nbsp;Seguimiento</h1><div class="imgbox circulo__1__sin"><i class="fas fa-file-import letras__internas"></i></div></div>';


                  if(row['certifica']=="A"){

                   return "<center>"+nombreProyecto+"<div style='display:flex;align-items:center;justify-content:center;'>"+circulo1Sin+circuloRevision+circuloCalificacion+circuloCertificado+circuloSegumiento+"</div></center>";

                  
                  }else if(row['certifica']=="C" || row['certifica']=="D"){

                   return "<center>"+nombreProyecto+"<div style='display:flex;align-items:center;justify-content:center;'>"+circulo1Sin+circuloRevision+circuloCalificacion+"</div></center>";

                  
                  }else if(row['certifica']=="si"){

                    return "<center>"+nombreProyecto+"<div style='display:flex;align-items:center;justify-content:center;'>"+circulo1Sin+circuloRevision+circuloCalificacion+"</div></center>";

                  
                  }else if(row['certifica']=="no"){

                    return "<center>"+nombreProyecto+"<div style='display:flex;align-items:center;justify-content:center;'>"+circulo1Sin+circuloRevision+circuloCalificacion+circuloObservacion+"</div></center>";

                  }else if(row['califica']=='N' || row['certifica']=='N'){

                     return "<div style='font-size:8px'>NEGADO";

                  }else if(row['califica']=='A' && row['certifica']=='A'){

                    return "<center><div style='display:flex;align-items:center;justify-content:center;'><div><div class='circulo' style='width:50px;height:50px;border-radius:50%;background:#c62828;'></div><div style='font-weight:bold; color:black;font-size:8px;'>EN REVISIÓN</div></div><div style='width:1em;display: block;height: 1px;background-color:#4b4b4d;margin-left:1%;margin-right:1%;'></div><div><div class='circulo' style='width:50px;height:50px;border-radius:50%;background:#1976d2;'></div><div style='font-weight:bold; color:black;font-size:8px;'>CERTIFICADO</div></div></div></center>";

                  }else if(row['califica']=='C'){

                    return "<center>"+nombreProyecto+"<div style='display:flex;align-items:center;justify-content:center;'>"+circulo1Sin+circuloRevision+circuloCalificacion+"</div></center>";

                  }else if (row['califica']=='A') {

                      return "<center>"+nombreProyecto+"<div style='display:flex;align-items:center;justify-content:center;'>"+circulo1Sin+circuloRevision+circuloCalificacion+"</div></center>";

                  }else if(row['rectificacion']=='SI'){

                    return "<center>"+nombreProyecto+"<div style='display:flex;align-items:center;justify-content:center;'>"+circulo1Sin+circuloRevision+"</div></center>";

                  }else if(row['calificarDevuelto']=="no"){

                     return "<center>"+nombreProyecto+"<div style='display:flex;align-items:center;justify-content:center;'>"+circulo1Sin+circuloObservacion+"</div></center>";

                  }else if(row['nombreFuncionarios']!=null){

                    return "<center>"+nombreProyecto+"<div style='display:flex;align-items:center;justify-content:center;'>"+circulo1Sin+circuloRevision+"</div></center>";

                  }else{


                      return "<center>"+nombreProyecto+"<div style='display:flex;align-items:center;justify-content:center;'>"+circulo1+"</div></center>";

                  }

                    
                }

            }


     ]

 });

tableProyectosUsuarios.columns([0]).visible( false );

obtener_informacion_general("#tablaProyectosUsuarios tbody",tableProyectosUsuarios);

}


var obtener_informacion_general=function(tbody,table){

   $(tbody).on("click","div.consultarInformacionGeneral",function(e){


      var data=table.row($(this).parents("tr")).data();

      /*===============================================
      =            Seccióm de calificación            =
      ===============================================*/

      if (data.califica=="A") {

        $(".fila__contrato__modicaciones").show();

      }

      if(data.modificacion==null && data.califica=="A"){

        $(".fila__contrato__modificaciones__ocultos").show();

      }

      if (data.modificacion=="si") {

        $(".modificacion__enviadas").hide();

        $(".modificacion__dispuestas").show();

        $(".seccion__modificables").append("<div style='font-weight:bold; color:black; font-size:12px;' class='col col-12 align-center'>Modificación realizada</div>");

      }
      
      /*=====  End of Seccióm de calificación  ======*/
      

      /*==========================================
      =            Crear obarvaciones            =
      ==========================================*/
      
       /*===========================================
      =            Crear observaciones            =
      ===========================================*/


        /*============================
        =            Ajax            =
        ============================*/
        var paqueteDeDatos = new FormData();            

        paqueteDeDatos.append('codigo',data.codigo);

        var destino = "modelosBd/selector/selectorObservaciones.md.php"; 

        $.ajax({

          url: destino,
          type: 'POST',
          contentType: false,
          data: paqueteDeDatos, 
          processData: false,
          cache: false, 

          success: function(response){

            var elementos=JSON.parse(response);

            var observacionNegativaProyecto=elementos['observacionNegativaProyecto'];
            var observacionNegativaCurriculum=elementos['observacionNegativaCurriculum'];

            var observacionNegativaProyectoInfras=elementos['observacionNegativaProyectoInfras'];
            var observacionNegativaVidaJuridica=elementos['observacionNegativaVidaJuridica'];
            var observacionCertificadoTrayectoria=elementos['observacionCertificadoTrayectoria'];

            var observacionNegativaCertificadoPropiedad=elementos['observacionNegativaCertificadoPropiedad'];
            var observacionNegativaMemoriaArquitectonica=elementos['observacionNegativaMemoriaArquitectonica'];
            var observacionNegativaPresupuestoRubro=elementos['observacionNegativaPresupuestoRubro'];
            var observacionNegativaCronogramaValorado=elementos['observacionNegativaCronogramaValorado'];
            var observacionNegativaRespaldosDigitales=elementos['observacionNegativaRespaldosDigitales'];

            var observacionComponentes=elementos['observacionComponentes'];

            if (observacionNegativaProyecto!=null && observacionNegativaProyecto!="") {
              $(".observacionesRealizadas").append('<div class="col col-6" style="font-weight:bold;">Observaciones del proyecto</div><div class="col col-6">'+observacionNegativaProyecto+'</div>');
            }


           if (observacionComponentes!=null && observacionComponentes!="") {
              $(".observacionesRealizadas").append('<div class="col col-6" style="font-weight:bold;">Observaciones anexo componentes</div><div class="col col-6">'+observacionComponentes+'</div>');
            }


            if (observacionNegativaCurriculum!=null && observacionNegativaCurriculum!="") {
              $(".observacionesRealizadas").append('<div class="col col-6" style="font-weight:bold;">Observaciones del curriculum deportivo</div><div class="col col-6">'+observacionNegativaCurriculum+'</div>');
            }

            if (observacionNegativaVidaJuridica!=null && observacionNegativaVidaJuridica!="") {
              $(".observacionesRealizadas").append('<div class="col col-6" style="font-weight:bold;">Observaciones de la vida jurídica</div><div class="col col-6">'+observacionNegativaVidaJuridica+'</div>');
            }

            if (observacionCertificadoTrayectoria!=null && observacionCertificadoTrayectoria!="") {
              $(".observacionesRealizadas").append('<div class="col col-6" style="font-weight:bold;">Observaciones documento de trayectoria</div><div class="col col-6">'+observacionCertificadoTrayectoria+'</div>');
            }

            if (observacionNegativaProyectoInfras!=null && observacionNegativaProyectoInfras!="") {
              $(".observacionesRealizadas").append('<div class="col col-6" style="font-weight:bold;">Observaciones proyecto de infraestructura</div><div class="col col-6">'+observacionNegativaProyectoInfras+'</div>');
            }

            if (observacionNegativaCertificadoPropiedad!=null && observacionNegativaCertificadoPropiedad!="") {
              $(".observacionesRealizadas").append('<div class="col col-6" style="font-weight:bold;">Observaciones certificado de propiedad</div><div class="col col-6">'+observacionNegativaCertificadoPropiedad+'</div>');
            }

            if (observacionNegativaMemoriaArquitectonica!=null && observacionNegativaMemoriaArquitectonica!="") {
              $(".observacionesRealizadas").append('<div class="col col-6" style="font-weight:bold;">Observaciones memoria arquitectonica</div><div class="col col-6">'+observacionNegativaMemoriaArquitectonica+'</div>');
            }

            if (observacionNegativaPresupuestoRubro!=null && observacionNegativaPresupuestoRubro!="") {
              $(".observacionesRealizadas").append('<div class="col col-6" style="font-weight:bold;">Observaciones presupuesto rubro</div><div class="col col-6">'+observacionNegativaPresupuestoRubro+'</div>');
            }


            if (observacionNegativaCronogramaValorado!=null && observacionNegativaCronogramaValorado!="") {
              $(".observacionesRealizadas").append('<div class="col col-6" style="font-weight:bold;">Observaciones cronograma valorado</div><div class="col col-6">'+observacionNegativaCronogramaValorado+'</div>');
            }

           if (observacionNegativaRespaldosDigitales!=null && observacionNegativaRespaldosDigitales!="") {
              $(".observacionesRealizadas").append('<div class="col col-6" style="font-weight:bold;">Observaciones respaldos digitales</div><div class="col col-6">'+observacionNegativaRespaldosDigitales+'</div>');
            }



          },

          error: function (){ 
            
          }

        });            
                                
        /*=====  End of Ajax  ======*/


      /*=====  End of Crear observaciones  ======*/
           
      
      /*=====  End of Crear obarvaciones  ======*/
      


      /*==========================================
      =            Actualizar códigos            =
      ==========================================*/
      

      var seleccionaCodigosRequeridos=function(parametro1,parametro2,parametro3){

        $(parametro1).click(function(){

             paqueteDeDatos.append('codigo',parametro2);

             paqueteDeDatos.append('idUsuario',parametro3);

             var destino = "modelosBd/actualiza/actualizaCodigoVerficado.md.php"; 

            $.ajax({

              url: destino,
              type: 'POST',
              contentType: false,
              data: paqueteDeDatos, 
              processData: false,
              cache: false, 

              success: function(response){

              },

              error: function (){ 
                  
              }

            });        

        });

      }
      seleccionaCodigosRequeridos($(".rectificacionProyectosBases"),data.codigo,data.idUsuario);
            
      
      /*=====  End of Actualizar códigos  ======*/
      


      if (data.fechaCertifica!=null && data.fechaCertifica!="") {

        $(".fila__certificados__cargado").show();

        $("#certificadosEnlaces").attr('href','documentos/certificadosResueltos/'+data.codigo+'.pdf');


      }

      $("#codigoEnlace").val(data.codigo);

      $("#modalPrincipalProyectos").text(data.nombre);

      $("#nombreProyectoContratos").val(data.nombre);

      $("#codigoProyectoRealizados").val(data.codigo);

      $("#codigoProyectoPdf").val(data.codigo);

      if(data.cedulaUsuario!="" && data.cedulaUsuario!=""){

        $("#cedulaRucEnviadosDiscriminantes").val(data.cedulaUsuario);

      }else{

        $("#cedulaRucEnviadosDiscriminantes").val(data.rucOrganismo);
        
      }

      $("#cedulaRucEnviados").val(data.codigo);

      $("#siRespuestas").val(data.siRespuestas);

      $("#tipoDeportistas").val(data.tipoDeportistas);

      $("#rectificarProyecto").attr('href','datosGeneralesModificaciones?contenido=2');

      $("#rectificarDocumentosVarios").attr('href','datosGeneralesModificaciones?contenido=11');

      if (data.emailOrganismo!=null) {
        $("#emailContratos").val(data.emailOrganismo);
      }else{
        $("#emailContratos").val(data.emailDeportistas);
      }

      $("#montoOcultos").val(data.monto);

      if (data.califica=='A' && data.contrato=='') {

        $(".fila__contrato").show();

      }

      if (data.contrato!='' && data.contrato!=null) {

        $(".fila__contrato__modificaciones__ocultos").hide();

        $(".fila__contrato__cargado").show();

        $(".fila__comprobantes__veniados").show();

        $("#contratoEnlaces").attr('href','documentos/contratoCargado/'+data.contrato+".pdf");
         $("#validadoresImpresos").val("si");
        $("#contratoEnlaces").text(data.contrato+".pdf");

      }


      /*==================================================
      =            Observaciones Certificados            =
      ==================================================*/
      
      if (data.califica=="A" && data.contrato==null) {
       
        $(".fila__contrato").show();
      }

      
      
      if (data.certifica=="no") {

        $(".fila__contrato").show();

        $("#enviarContrato").hide();

        $("#enviarContratoObservaciones").show();

        $("#montoContratoRealizados").val(data.montoProyecto);

        $("#numeroRucPatrocinador").val(data.numeroRucPatrocinador);

        $("#nombrePatrocinador").val(data.nombrePatrocinador);

        $("#montoDelProyecto").val(data.montoDelProyecto);

        $("#fechaDeEmision").val(data.fechaDeEmision);

        $("#rectificasInformacion").val("si");


      }


      
      /*=====  End of Observaciones Certificados  ======*/
      

      /*========================================
      =            Llamar ubicación            =
      ========================================*/
      
      if(data.tramiteCorresponde1=="subsecretario"){

        var paqueteDeDatos = new FormData();

        paqueteDeDatos.append('codigo', data.codigo);
        paqueteDeDatos.append('tipoDeportistas', data.tipoDeportistas);

        var destino="modelosBd/selector/selectorProyectoModeloSucces.md.php";

        $.ajax({

          type:"POST",
          url: destino,
          type: 'POST',
          contentType: false,
          data: paqueteDeDatos, 
          processData: false,
          cache: false, 

          success:function(response){

            var elementos=JSON.parse(response);
            var email=elementos['email'];
            var descripcionFisicamenteEstructura=elementos['descripcionFisicamenteEstructura'];
            var nombreCompleto=elementos['nombreCompleto'];
            var codigoRecogido=elementos['codigoRecogido'];

            $(".direccionActualProyecto").text(descripcionFisicamenteEstructura);
            $(".responsableProyecto").text("SUBSECRETARIO: "+nombreCompleto);
            $(".contactoResponsableProyecto").text(email);

   
            /*======================================
            =            Asingar correo            =
            ======================================*/
            
            $('#contactarResponsableBoton').click(function (e){

              $("#correoResponsble").val(email);

              $("#proyectoNombre").val(data.nombre);

            });
            
            /*=====  End of Asingar correo  ======*/
            

          }

        });  

      }else if (data.nombreFuncionarios==null) {

        var paqueteDeDatos = new FormData();

        paqueteDeDatos.append('codigo', data.codigo);
        paqueteDeDatos.append('tipoDeportistas', data.tipoDeportistas);

        var destino="modelosBd/selector/selectorProyecto.modelo.php";

        $.ajax({

          type:"POST",
          url: destino,
          type: 'POST',
          contentType: false,
          data: paqueteDeDatos, 
          processData: false,
          cache: false, 

          success:function(response){

            var elementos=JSON.parse(response);
            var email=elementos['email'];
            var descripcionFisicamenteEstructura=elementos['descripcionFisicamenteEstructura'];
            var nombreCompleto=elementos['nombreCompleto'];
            var codigoRecogido=elementos['codigoRecogido'];

            $(".direccionActualProyecto").text(descripcionFisicamenteEstructura);
            $(".responsableProyecto").text("DIRECTOR: "+nombreCompleto);
            $(".contactoResponsableProyecto").text(email);

   
            /*======================================
            =            Asingar correo            =
            ======================================*/
            
            $('#contactarResponsableBoton').click(function (e){

              $("#correoResponsble").val(email);

              $("#proyectoNombre").val(data.nombre);

            });
            
            /*=====  End of Asingar correo  ======*/
            

          }

        });        

      }else{

        $("#idUsuarioRelativo").val(data.idUsuarioRelativo);


        var paqueteDeDatos = new FormData();

        paqueteDeDatos.append('codigo', data.codigo);
        paqueteDeDatos.append('tipoDeportistas', data.tipoDeportistas);

        var destino="modelosBd/selector/selectorProyecto.modelo.php";

        $.ajax({

          type:"POST",
          url: destino,
          type: 'POST',
          contentType: false,
          data: paqueteDeDatos, 
          processData: false,
          cache: false, 

          success:function(response){

            var elementos=JSON.parse(response);
            var email=elementos['email'];
            var descripcionFisicamenteEstructura=elementos['descripcionFisicamenteEstructura'];
            var nombreCompleto=elementos['nombreCompleto'];
            var codigoRecogido=elementos['codigoRecogido'];

            $(".direccionActualProyecto").text(descripcionFisicamenteEstructura);
            $(".responsableProyecto").text("ANALISTA: "+data.nombreFuncionarios+" "+data.apellido);
            $(".contactoResponsableProyecto").text(data.email);

   
            /*======================================
            =            Asingar correo            =
            ======================================*/
            
            $('#contactarResponsableBoton').click(function (e){

              $("#correoResponsble").val(data.email);

              $("#proyectoNombre").val(data.nombre);

            });
            
            /*=====  End of Asingar correo  ======*/
            

          }

        });      

      }
      
      /*=====  End of Llamar ubicación  ======*/

       $("#correoResponsblePrincipal").val(data.email);
       $("#proyectoNombrePrincipal").val(data.nombre);


      /*==============================
      =            Enviar            =
      ==============================*/
      
      $('#enviarRectificacion').click(function (e){

        $(this).hide();
         $('.enviarDatosGenerales__reload').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

        var paqueteDeDatos = new FormData();

         paqueteDeDatos.append('codigoEnviadores', data.codigo);
         paqueteDeDatos.append('correoResponsblePrincipal', $('#correoResponsblePrincipal').prop('value'));
         paqueteDeDatos.append('proyectoNombrePrincipal', $('#proyectoNombrePrincipal').prop('value'));
         paqueteDeDatos.append('nombreAcomodadorPrincipal', $('#nombreAcomodadorPrincipal').prop('value'));
         paqueteDeDatos.append('emailAcomadadorPrincipal', $('#emailAcomadadorPrincipal').prop('value'));

        var destino="modelosBd/actualiza/actualizaObservaciones.md.php";

        $.ajax({

          type:"POST",
          url: destino,
          type: 'POST',
          contentType: false,
          data: paqueteDeDatos, 
          processData: false,
          cache: false, 

          success:function(response){


             var elementos=JSON.parse(response);
             var mensaje=elementos['mensaje'];

             if (mensaje==1) {

                 alertify.set("notifier","position", "top-right");
                alertify.notify("Comentario Enviado", "success", 5, function(){});

                $('.enviarDatosGenerales__reload').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

                  window.setTimeout(function(){ 
                     location.reload();
                  } ,4000); 

             }


          }

        });              

      });
      
      /*=====  End of Enviar  ======*/
      

      /*==============================================
      =            Observaciones Enviadas            =
      ==============================================*/
      
       if (data.rectificacion=="SI" && data.calificarDevuelto!="no"){

         $("#enviarRectificacion").hide();

         $(".mensajeRectificacion").text('LA RECTIFICACIÓN YA FUE ENVIADA');

       }

      
       if (data.calificarDevuelto=="no" && data.rectificacion!="SI") {

         $(".rectificar__informacion").show();

       }
      
      /*=====  End of Observaciones Enviadas  ======*/
      
      /*=======================================
      =            Certificaciones            =
      =======================================*/
      if(data.certifica=="A"){

        $(".fila__contrato").hide();

        $(".fila__contrato__modificaciones__ocultos").hide();      

        $(".fila__informe__cumplimiento").show();  

      }
      /*=====  End of Certificaciones  ======*/

      if(data.codigo=="10-1208012177-ANA-2021"){

        $(".fila__informe__cumplimiento").hide();
        $(".fila__informe__cumplimiento__visual").show();

      }


      /*============================================
      =            Comprobantes subidos            =
      ============================================*/
            
      $('#verComprobantes').click(function (e){   

      $(".body__comprobantes__conjuntos").html(" ");  

        var paqueteDeDatos = new FormData();

         paqueteDeDatos.append('codigoProyectoRealizados', $('#codigoProyectoRealizados').prop('value'));


        var destino="modelosBd/validaciones/comprobantes.modelo.php";

        $.ajax({

          type:"POST",
          url: destino,
          type: 'POST',
          contentType: false,
          data: paqueteDeDatos, 
          processData: false,
          cache: false, 

          success:function(response){

            var elementos=JSON.parse(response);

            var stringidComprobantes=elementos['stringidComprobantes'];
            var stringruc__patrocinador__conjunto=elementos['stringruc__patrocinador__conjunto'];
            var stringnombrePatrocinador=elementos['stringnombrePatrocinador'];
            var stringmontoContratoRealizados=elementos['stringmontoContratoRealizados'];
            var stringfechaDeEmision=elementos['stringfechaDeEmision'];
            var stringcomprobantes__conjuntos__documentos=elementos['stringcomprobantes__conjuntos__documentos'];
            var stringmontos__facturas__conjuntos=elementos['stringmontos__facturas__conjuntos'];

            var stringautorizacionSri__conjuntos=elementos['stringautorizacionSri__conjuntos'];
            var stringactividadEconomica__conjuntos=elementos['stringactividadEconomica__conjuntos'];
            var stringvalidez__comprobante__fisico__conjuntos=elementos['stringvalidez__comprobante__fisico__conjuntos'];


            if(stringmontos__facturas__conjuntos!=""){

              var arraystringidComprobantes = stringidComprobantes.split('------');
              var arraystringruc__patrocinador__conjunto = stringruc__patrocinador__conjunto.split('------');
              var arraystringnombrePatrocinador = stringnombrePatrocinador.split('------');
              var arraystringmontoContratoRealizados = stringmontoContratoRealizados.split('------');
              var arraystringfechaDeEmision = stringfechaDeEmision.split('------');
              var arraystringcomprobantes__conjuntos__documentos = stringcomprobantes__conjuntos__documentos.split('------');
              var arraystringmontos__facturas__conjuntos = stringmontos__facturas__conjuntos.split('------');

              var arraystringautorizacionSri__conjuntos = stringautorizacionSri__conjuntos.split('------');
              var arraystringactividadEconomica__conjuntos = stringactividadEconomica__conjuntos.split('------');
              var arraystringvalidez__comprobante__fisico__conjuntos = stringvalidez__comprobante__fisico__conjuntos.split('------');

              for(var i=0; i<arraystringidComprobantes.length;i++){

                $(".body__comprobantes__conjuntos").append('<div class="rowCargas_'+i+' row"><div class="col col-12 text-center d d-flex align-items-center justify-content-center">Comprobante '+(i+1)+'&nbsp;&nbsp;<span class="contenedor__delte'+i+'"></span></div><br><div class="col col-4">Ruc</div><div class="col col-8">'+arraystringruc__patrocinador__conjunto[i]+'</div><div class="col col-4">Nombre patrocinador</div><div class="col col-8">'+arraystringnombrePatrocinador[i]+'</div><div class="col col-4">Actividad Economica</div><div class="col col-8">'+arraystringactividadEconomica__conjuntos[i]+'</div><div class="col col-4">Nùmero de Ruc</div><div class="col col-8">'+arraystringmontoContratoRealizados[i]+'</div><div class="col col-4">Autorización del SRI</div><div class="col col-8">'+arraystringautorizacionSri__conjuntos[i]+'</div><div class="col col-4">Válidez del comprobante</div><div class="col col-8">'+arraystringvalidez__comprobante__fisico__conjuntos[i]+'</div><div class="col col-4">Fecha de emisión</div><div class="col col-8">'+arraystringfechaDeEmision[i]+'</div><div class="col col-4">Comprobante</div><div class="col col-8"><a href="documentos/contratoCargado/'+arraystringcomprobantes__conjuntos__documentos[i]+'.pdf" target="_blank">Comprobante '+(i+1)+'</a></div><div class="col col-4">Monto</div><div class="col col-8">'+arraystringmontos__facturas__conjuntos[i]+'</div><br><br></div>');

                if($("#rectificasInformacion").val()!="" && $("#rectificasInformacion").val()=="si"){

                   $(".contenedor__delte"+i).append('<button id="eliminar'+i+'" idFila="'+arraystringidComprobantes[i]+'" idContador="'+i+'" class="btn btn-danger"><i class="fas fa-trash"></i></button>');

                }

                $("#eliminar"+i).click(function(e){

                  var idContador=$(this).attr('idContador');
                  var idFila=$(this).attr('idFila');

                  var confirm= alertify.confirm('','¿Está seguro de eliminar el comprobante?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

                  confirm.set({transition:'slide'});    

                  confirm.set('onok', function(){ //callbak al pulsar botón positivo

                    $(".rowCargas_"+idContador).remove();
                        
                    var paqueteDeDatos = new FormData();

                    paqueteDeDatos.append('idFila', idFila);

                    var destino = "modelosBd/elimina/eliminarComprobantesFilas.php"; 

                    $.ajax({

                      url: destino,
                      type: 'POST',
                      contentType: false,
                      data: paqueteDeDatos, 
                      processData: false,
                      cache: false, 

                      success: function(response){

                           var elementos=JSON.parse(response);
                             var mensaje=elementos['mensaje'];

                             if (mensaje==1) {

                                alertify.set("notifier","position", "top-right");
                          alertify.notify("Datos eliminados correctamente", "success", 5, function(){});

                             }


                      },

                      error: function (){ 
                         
                      }

                    });                   

                  });

                  confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
                    alertify.set("notifier","position", "top-right");
                      alertify.notify("Canceló la eliminación", "success", 5, function(){});  
                  }); 

                });
                


              }

            }

          }

        });  

      });
            
      /*=====  End of Comprobantes subidos  ======*/


      /*==================================
      =            Documentos            =
      ==================================*/
      
      $('#documentosVisualizar').click(function (e){

         $(".oculto__1").hide();
         $(".oculto__2").hide();
         $(".oculto__3").hide();
         $(".oculto__4").hide();
         $(".oculto__5").hide();
         $(".oculto__6").hide();
         $(".oculto__7").hide();
         $(".oculto__8").hide(); 


         $("#proyectoVista").attr('href','documentos/proyectos/'+data.proyectoCargadoPdf+'.pdf');

         if (data.proyectoCargadoInfrasPdf!="" && data.proyectoCargadoInfrasPdf!=null) {
           $("#proyectoInfraestructura").attr('href','documentos/proyectosInfraestructura/'+data.proyectoCargadoInfrasPdf+'.pdf');
           $(".oculto__1").show();
         }

         if (data.acreditarVidaJuridica!="" && data.acreditarVidaJuridica!=null) {
           $("#vidaJuridica").attr('href','documentos/vidaJuridica/'+data.acreditarVidaJuridica+'.pdf');
           $(".oculto__2").show();
         }

         if (data.certificacionTrayectoria!="" && data.certificacionTrayectoria!=null) {
           $("#certificacionTrayectoria").attr('href','documentos/certificacionDeTrayectoria/'+data.certificacionTrayectoria+'.pdf');
           $(".oculto__3").show();
         }

         if (data.certificadoPropiedades!="" && data.certificadoPropiedades!=null) {
           $("#certificadoPropiedad").attr('href','documentos/certificadoPropiedad/'+data.certificadoPropiedades+'.pdf');
           $(".oculto__4").show();
         }

         if (data.memoriaTecnicaArquitectonica!="" && data.memoriaTecnicaArquitectonica!=null) {
           $("#memoriaArquitectonicas").attr('href','documentos/memoriaTecnicaArquitectonica/'+data.memoriaTecnicaArquitectonica+'.pdf');
           $(".oculto__5").show();
         }

         if (data.presupuestoRubro!="" && data.presupuestoRubro!=null) {
           $("#presupuestoRubro").attr('href','documentos/presupuestoRubro/'+data.presupuestoRubro+'.pdf');
           $(".oculto__6").show();
         }

         if (data.cronogramaValorado!="" && data.cronogramaValorado!=null) {
           $("#cronogramasValorados").attr('href','documentos/cronogramaValorado/'+data.cronogramaValorado+'.pdf');
           $(".oculto__7").show();
         }

         if (data.respaldosNuevosDigitales!="" && data.respaldosNuevosDigitales!=null) {
           $("#respaldosDigitales").attr('href','documentos/respaldosNuevosDigitales/'+data.respaldosNuevosDigitales+'.pdf');
           $(".oculto__8").show();
         }

       });
      
      /*=====  End of Documentos  ======*/
    
      /*===================================
      =            Seguimiento            =
      ===================================*/

      
      if(data.seguimiento=="A" ||  data.seguimiento=="P"){

        $(".fila__informe__cumplimiento").hide();



        $(".fila__informe__cumplimiento__enviados").show();

        if(data.informesNeg=="no" && data.mensajeSegui==null){

          $(".fila__informe__cumplimiento").show();

          $("#rectificasInformacionEvidencias").val("si");

          $("#observacionesSeguimientos").show();

          $("#observacionesSeguimientos").val(data.observacionInformes);

        }


        /*=====================================================
        =            Realizar observaciones envios            =
        =====================================================*/

         $('#verEvidencias').click(function (e){   

          $(".body__evidencias__conjuntos").html(" ");  

            var paqueteDeDatos = new FormData();

             paqueteDeDatos.append('codigoProyectoRealizados', $('#codigoProyectoRealizados').prop('value'));


            var destino="modelosBd/validaciones/comprobantesEvidencias.modelo.php";

            $.ajax({

              type:"POST",
              url: destino,
              type: 'POST',
              contentType: false,
              data: paqueteDeDatos, 
              processData: false,
              cache: false, 

              success:function(response){

                var elementos=JSON.parse(response);

                var stringevidencia=elementos['stringevidencia'];
                var stringidSeguimiento=elementos['stringidSeguimiento'];

                if(stringevidencia!=""){

                  var arraystringevidencia = stringevidencia.split('------');
                  var arraystringidSeguimiento = stringidSeguimiento.split('------');


                  for(var i=0; i<arraystringidSeguimiento.length;i++){

                    $(".body__evidencias__conjuntos").append('<div class="row__evidencias'+i+'"><div class="col col-4">Evidencia'+(i+1)+'</div><div class="col col-8"><a target="_blank" href="documentos/evidencias/'+arraystringevidencia[i]+'.pdf">'+arraystringevidencia[i]+'</a>&nbsp;&nbsp;<span class="contenedor__delte'+i+'"></span></div><br><br></div>');

                    if($("#rectificasInformacionEvidencias").val()!="" && $("#rectificasInformacionEvidencias").val()=="si"){

                       $(".contenedor__delte"+i).append('<button id="eliminar'+i+'" idFila="'+arraystringidSeguimiento[i]+'" idContador="'+i+'" class="btn btn-danger"><i class="fas fa-trash"></i></button>');

                    }

                    $("#eliminar"+i).click(function(e){

                      var idContador=$(this).attr('idContador');
                      var idFila=$(this).attr('idFila');

                      var confirm= alertify.confirm('','¿Está seguro de eliminar la evidencia?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

                      confirm.set({transition:'slide'});    

                      confirm.set('onok', function(){ //callbak al pulsar botón positivo

                        $(".row__evidencias"+idContador).remove();
                            
                        var paqueteDeDatos = new FormData();

                        paqueteDeDatos.append('idFila', idFila);

                        var destino = "modelosBd/elimina/eliminarEvidencias.php"; 

                        $.ajax({

                          url: destino,
                          type: 'POST',
                          contentType: false,
                          data: paqueteDeDatos, 
                          processData: false,
                          cache: false, 

                          success: function(response){

                               var elementos=JSON.parse(response);
                                 var mensaje=elementos['mensaje'];

                                 if (mensaje==1) {

                                    alertify.set("notifier","position", "top-right");
                                    alertify.notify("Datos eliminados correctamente", "success", 5, function(){});

                                 }


                          },

                          error: function (){ 
                             
                          }

                        });                   

                      });

                      confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
                        alertify.set("notifier","position", "top-right");
                          alertify.notify("Canceló la eliminación", "success", 5, function(){});  
                      }); 

                    });
                    


                  }

                }

              }

            });  

          });
                        
        /*=====  End of Realizar observaciones envios  ======*/
        


      }
      
      /*=====  End of Seguimiento  ======*/
      
      /*==========================================
      =            Filas documentadas            =
      ==========================================*/
      
      if (data.califica=="A") {

        $(".documentos__calificaciones").show();

        $("#calificacionPri").attr('href','documentos/notificacion/'+data.codigo+'.pdf');

      }
      
      /*=====  End of Filas documentadas  ======*/
      


   });
}


/*=====  End of Tablas usuarios proyectos  ======*/

/*============================================
=            Tabla Subsecretarios            =
============================================*/

$(document).on("ready",function(){

  listarProyectosSubsecertarios();

});


var listarProyectosSubsecertarios=function(){

   var tableProyectosSubsecretarios =$("#tablaProyectosSubsecretarios").DataTable({

          "language": 
        {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "No existen datos",
        "oPaginate": 
        {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
          },
          "oAria": 
          {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      },
 
      "pagingType": "full_numbers",
      "sScrollY": "400px",
      "Paginate": true,
      "scrollX": true,
      "pagingType": "full_numbers",
      "ajax":{
      "method":"POST",
      "url":"modelosBd/datatablets/reporProyectosSubsecretarios.php", 
      "data": { 
          "fisicamenteEstructura": $("#fisicamenteEstructura").val()
       }     
      },
      "columns":[

      
            {"render":

                function ( data, type, row ) {

                    if (row['idRol']==2) {

                      return "<div style='font-size:10px'>Organismo Deportivo</div>";

                    }else{

                      return "<div style='font-size:10px'>Deportista</div>";

                    }

                    

                }

            },

 
            {"render":

                function ( data, type, row ) {

                   
                    if (row['tipoDeportistas']=="alto") {

                      var tipoDeportistas="Alto Rendimiento";

                    }else if(row['tipoDeportistas']=="alto2"){

                      var tipoDeportistas="Alto Rendimiento para personas con discpacidad";

                    }else{

                      var tipoDeportistas=row['tipoDeportistas'];

                    }

                    return "<div style='font-size:10px'>"+tipoDeportistas+"</div>";

                }

            },

            {"render":

                function ( data, type, row ) {


                  if (row['nombreOrganismo']!=null) {

                     return "<div style='font-size:10px'>"+row['nombreOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['nombreDeportistas']+"</div>";

                  }
                   
                }

            },

            {"render":

                function ( data, type, row ) {

                    return "<div style='font-size:10px'>"+row['nombre']+"</div>";

                }

            },

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['monto']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['alcanse']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['codigo']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {

                   if(row['proyectoCargadoPdf']==""){

                     var variableConcatenadoras="<div style='font-size:10px'>Documento no requerido</div>";

                   }else{

                     var variableConcatenadoras="<a style='font-size:10px' href='documentos/proyectos/"+row['proyectoCargadoPdf']+".pdf' target='_blank'>"+row['proyectoCargadoPdf']+".pdf</a>";

                   }

                  if (row['estadoProyectoCarcado']==null) {

                    return variableConcatenadoras+"<br><div style='font-size:10px; color:red; font-weight:bold;'></div>";

                  }
          
                }

            },

            {"render":

                function ( data, type, row ) {

                  if (row['tipoDeportistas']=="noFederado") {

                     if(row['curriculumDeportivoSegundo']==""){

                       var variableConcatenadoras="<div style='font-size:10px'>Documento no requerido</div>";

                     }else{

                       var variableConcatenadoras="<a style='font-size:10px' href='documentos/curriculum/"+row['curriculumDeportivoSegundo']+".pdf' target='_blank'>"+row['curriculumDeportivoSegundo']+".pdf</a>";

                     }


                    if (row['estadoCurriculumDeportivoSegundo']==null) {

                      return variableConcatenadoras+"<br><div style='font-size:10px; color:red; font-weight:bold;'></div>";

                    }


                  }else{

                    return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                  }

          
                }

            },


            {"render":

                function ( data, type, row ) {

                  if (row['idRol']==3) {

                    if (row['tipoDeportistas']!="noFederado") {

                 
                       if(row['certificadoFederacionPdf']==""){

                         var variableConcatenadoras="<div style='font-size:10px'>Documento no requerido</div>";

                       }else{

                         var variableConcatenadoras="<a style='font-size:10px' href='documentos/certificadoDeportista/"+row['certificadoFederacionPdf']+".pdf' target='_blank'>"+row['certificadoFederacionPdf']+".pdf</a>";

                       }


                      if (row['estadoCertificadoFederacion']==null) {

                        return variableConcatenadoras+"<br><div style='font-size:10px; color:red; font-weight:bold;'></div>";

                      }


                    }else{

                      return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                    }


                  }else{

                    return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                  }

          
                }

            },

            {"render":

                function ( data, type, row ) {

                  if (row['idRol']==3) {

                    if (row['tipoDeportistas']!="noFederado") {

                       if(row['certificadoOrganismoSuperiorPdf']==""){

                         var variableConcatenadoras="<div style='font-size:10px'>Documento no requerido</div>";

                       }else{

                         var variableConcatenadoras="<a style='font-size:10px' href='documentos/certificadoSuperior/"+row['certificadoOrganismoSuperiorPdf']+".pdf' target='_blank'>"+row['certificadoOrganismoSuperiorPdf']+".pdf</a>";

                       }


                      if (row['estadoCertificadoOrganismoSuperior']==null) {

                        return variableConcatenadoras+"<br><div style='font-size:10px; color:red; font-weight:bold;'></div>";

                      }


                    }else{

                      return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                    }


                  }else{

                    return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                  }

          
                }

            },

            {"render":

                function ( data, type, row ) {

                  if (row['idRol']==3) {

                    if (row['tipoDeportistas']!="noFederado") {
               
                       if(row['solicitudFederacionPdf']==""){

                         var variableConcatenadoras="<div style='font-size:10px'>Documento no requerido</div>";

                       }else{

                         var variableConcatenadoras="<a style='font-size:10px' href='documentos/solicitudCertificado/"+row['solicitudFederacionPdf']+".pdf' target='_blank'>"+row['solicitudFederacionPdf']+".pdf</a>";

                       }

                      if (row['estadoSolicitudFederacion']==null) {

                        return variableConcatenadoras+"<br><div style='font-size:10px; color:red; font-weight:bold;'></div>";

                      }


                    }else{

                      return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                    }


                  }else{

                    return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                  }

          
                }

            },



            {"render":

                function ( data, type, row ) {


                 if (row['tipoDeportistas']!="noFederado") {

                    if(row['avalFederacionPdf']==""){

                       var variableConcatenadoras="<div style='font-size:10px'>Documento no requerido</div>";

                     }else{

                       var variableConcatenadoras="<a style='font-size:10px' href='documentos/avalFederacion/"+row['avalFederacionPdf']+".pdf' target='_blank'>"+row['avalFederacionPdf']+".pdf</a>";

                     }

                    if (row['estadoAvalFederacion']==null) {

                        return variableConcatenadoras+"<br><div style='font-size:10px; color:red; font-weight:bold;'></div>";

                    }


                 }else{

                    return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                 }


                }

            },


            {"render":

                function ( data, type, row ) {


                 if (row['tipoDeportistas']!="noFederado") {

            
                     if(row['solciitudAvalPdf']==""){

                       var variableConcatenadoras="<div style='font-size:10px'>Documento no requerido</div>";

                     }else{

                       var variableConcatenadoras="<a style='font-size:10px' href='documentos/solicitudAval/"+row['solciitudAvalPdf']+".pdf' target='_blank'>"+row['solciitudAvalPdf']+".pdf</a>";

                     }


                    if (row['estadoSolicitudAval']==null) {

                        return variableConcatenadoras+"<br><div style='font-size:10px; color:red; font-weight:bold;'></div>";

                    }


                 }else{

                    return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                 }


                }

            },



            {"render":

                function ( data, type, row ) {


                 if (row['tipoDeportistas']!="noFederado") {

                     if(row['avalOrganismoSuperiorPdf']==""){

                       var variableConcatenadoras="<div style='font-size:10px'>Documento no requerido</div>";

                     }else{

                       var variableConcatenadoras="<a style='font-size:10px' href='documentos/avalOrganismoSuperior/"+row['avalOrganismoSuperiorPdf']+".pdf' target='_blank'>"+row['avalOrganismoSuperiorPdf']+".pdf</a>";

                     }

                    if (row['estadoAvalOrganismoSuperior']==null) {

                        return variableConcatenadoras+"<br><div style='font-size:10px; color:red; font-weight:bold;'></div>";

                    }


                 }else{

                    return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                 }


                }

            },

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px; font-weight:bold;'>"+row['fecha']+"</div>";


                }

            },


            {"render":

                function ( data, type, row ) {

                  if (row["nombreFuncionarios"]==null) {

                    var concatenados="<br><span style='color:blue;font-weight:bold;'>Con el director</span>";

                  }else{

                    var concatenados="<br><span style='color:blue;font-weight:bold;'>"+row["nombreFuncionarios"]+" "+row["apellido"]+"</span>";

                  }

                  
                  if(row['califica']=='A' && row['certifica']=='A'){

                    return "<div style='font-size:8px'>CERTIFICADO"+concatenados+"</div>";

                  }else if (row['califica']=='A') {

                      return "<div style='font-size:8px'>CALIFICADO"+concatenados+"</div>";

                  }else{

                      return "<div style='font-size:8px'>En revisión"+concatenados+"</div>";

                  }

                    
                }

            }


     ]

 });

}

/*=====  End of Tabla Subsecretarios  ======*/


/*========================================
=            Firmantes Comite            =
========================================*/


$(document).on("ready",function(){

  listarFirmasComite();

});


var listarFirmasComite=function(){

   var tableFirmasComite =$("#tablaFirmasComite").DataTable({

          "language": 
        {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "No existen datos",
        "oPaginate": 
        {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
          },
          "oAria": 
          {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      },
      "pageLength": 50,
      "pagingType": "full_numbers",
      "sScrollY": "400px",
      "Paginate": true,
      "scrollX": true,
      "pagingType": "full_numbers",
      "ajax":{
      "method":"POST",
      "url":"modelosBd/datatablets/reporFirmasComite.php", 
      "data": { 
          "fisicamenteEstructura": $("#fisicamenteEstructura").val(),
          "rolFuncionarios": $("#rolFuncionarios").val(),
          "idUsuario": $("#idUsuario").val()
       }     
      },
      "order": [[6, "desc" ]],
      "columns":[

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['codigo']+"</div>";
          
                }

            },


            {"render":

                function ( data, type, row ) {


                  if (row['nombreOrganismo']!=null) {

                     return "<div style='font-size:10px'>"+row['nombreOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['nombreDeportistas']+"</div>";

                  }
                   
                }

            },

            {"render":

                function ( data, type, row ) {

                  if (row['rucOrganismo']!=null) {

                     return "<div style='font-size:10px'>"+row['rucOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['cedulaUsuario']+"</div>";

                  }

                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['nombre']+"</div>";

                }

            },
 
            {"render":

                function ( data, type, row ) {

                   
                    if (row['tipoDeportistas']=="alto") {

                      var tipoDeportistas="Alto Rendimiento";

                    }else if(row['tipoDeportistas']=="alto2"){

                      var tipoDeportistas="Alto Rendimiento para personas con discpacidad";

                    }else if(row["siRespuestas"]=="si"){

                       var tipoDeportistas="Infraestructura";

                    }else{

                      var tipoDeportistas=row['tipoDeportistas'];

                    }

                    return "<div style='font-size:10px'>"+tipoDeportistas+"</div>";

                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['monto']+"</div>";
          
                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['fecha']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {

                    return "<center><button class='firmarDocumentosComite btn btn-info' data-toggle='modal' data-target='#firmarDocumentos'><i class='fas fa-eye'>&nbsp;</i><br>FIRMAR</button><center>";

                }

            }

       ]

 });

obtener_data_acciones_firmantes("#tablaFirmasComite tbody",tableFirmasComite);

}


/*================================
=            Acciones            =
================================*/

var obtener_data_acciones_firmantes=function(tbody,table){

  $(tbody).on("click","button.firmarDocumentosComite",function(e)
  {

      var data=table.row($(this).parents("tr")).data();

      $("#codigoProyectos").val(data.codigo);

      $("#documentoAsitencia").attr('href','documentos/asistencia/'+data.codigo+".pdf");
      $("#documentoAsitencia").text(data.codigo+".pdf");
      

      $("#tipoTramites").val(data.tipoDeportistas);

      $("#siRespuestas").val(data.siRespuestas);

      $("#idUsuarioRelativo").val(data.idUsuarioRelativo);

      $("#nombreProyecto").val(data.nombre);

      $("#emailAnalista").val(data.emailAnalista);

      

      if (data.nombreDeportistas!="null") {

        $("#nombrePostulante").val(data.nombreDeportistas);

      }else{

        $("#nombrePostulante").val(data.nombreOrganismo);

      }

      if (data.emailDeportistas!="null") {

        $("#emailPostulante").val(data.emailDeportistas);

      }else{

        $("#emailPostulante").val(data.emailOrganismo);

      }

    
      if ( $(".fila__notificaciones").length > 0 ) {

      }else{


          if(data.siRespuestas=='si'){

            fisicamenteEstructuraCompardoras=1;


          }else if(data.tipoDeportistas=='altoRendimiento' || data.tipoDeportistas=='altoRendimientoDiscapacidad' || data.tipoDeportistas=='militarDeportiva' || data.tipoDeportistas=='profesional' || data.tipoDeportistas=='alto' || data.tipoDeportistas=='alto2') {


            fisicamenteEstructuraCompardoras=24;

          }else if(data.tipoDeportistas=='formativo' || data.tipoDeportistas=='estudiantil' || data.tipoDeportistas=='noFederado'){

             fisicamenteEstructuraCompardoras=26;

          }

          if ($("#fisicamenteEstructura").val()==fisicamenteEstructuraCompardoras) {

            $(".notificacion__filas").append('<td class="fila__notificaciones">Notificación</td><td class="fila__notificaciones"><a id="documentoAsitencia" target="_blank" href="documentos/notificacion/'+data.codigo+'.pdf">'+data.codigo+'.pdf</a></td><td class="fila__notificaciones"><input type="file" id="firmarNotificacion" name="firmarNotificacion"><div class="reload__notificacion"></div></td>');

              /*======================================
              =            Files archivos            =
              ======================================*/

              var documentosArchivosSubirNotificaciones=function(parametro1,parametro2,parametro3){

                $(parametro1).change(function(e){

                $(this).hide();

                $('.reload__notificacion').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

                var paqueteDeDatos = new FormData();

                paqueteDeDatos.append('fisicamenteEstructura', $('#fisicamenteEstructura').prop('value'));
                paqueteDeDatos.append('rolFuncionarios', $('#rolFuncionarios').prop('value'));

                paqueteDeDatos.append('documento', $('#firmarNotificacion')[0].files[0]);

                paqueteDeDatos.append('idUsuario', parametro2);

                paqueteDeDatos.append('codigo', $(parametro3).prop('value'));

                var destino = "modelosBd/actualiza/actualizaFirmasNotificacion.md.php"; 

                $.ajax({

                  url: destino,
                  type: 'POST',
                  contentType: false,
                  data: paqueteDeDatos, 
                  processData: false,
                  cache: false, 

                  success: function(response){

                    window.setTimeout(function(){ 

                        alertify.set("notifier","position", "top-right");
                        alertify.notify("Documento cargado satisfactoriamente", "success", 4, function(){});  

                        $('.reload__notificacion').html('');

                        $(parametro1).show();

                        $(parametro1).val('');

                      } ,4000);   

                  },

                  error: function (){ 
                      
                  }

                });        

                });

              }

              documentosArchivosSubirNotificaciones($("#firmarNotificacion"),$("#idUsuario").val(),$("#codigoProyectos"));

              /*=====  End of Files archivos  ======*/


          }


      }

  });

 }


/*=====  End of Acciones  ======*/


/*=====  End of Firmantes Comite  ======*/


/*===================================================
=            Secretaria comite certifica            =
===================================================*/

$(document).on("ready",function(){

  listarProyectoSecretariaComiteCertifica();

});


var listarProyectoSecretariaComiteCertifica=function(){

   var tableProyectoSecretariaComiteCertifica =$("#tablaProyectosSecretariaComiteCertifica").DataTable({

          "language": 
        {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "No existen datos",
        "oPaginate": 
        {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
          },
          "oAria": 
          {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      },
      "pageLength": 50,
      "pagingType": "full_numbers",
      "sScrollY": "400px",
      "Paginate": true,
      "scrollX": true,
      "pagingType": "full_numbers",
      "ajax":{
      "method":"POST",
      "url":"modelosBd/datatablets/reporProyectosDirectoresRecomendadosComiteCertifica.php", 
      "data": { 
          "fisicamenteEstructura": $("#fisicamenteEstructura").val()
       }     
      },
      "order": [[6, "desc" ]],
      "columns":[

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['codigo']+"</div>";
          
                }

            },


            {"render":

                function ( data, type, row ) {


                  if (row['nombreOrganismo']!=null) {

                     return "<div style='font-size:10px'>"+row['nombreOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['nombreDeportistas']+"</div>";

                  }
                   
                }

            },

            {"render":

                function ( data, type, row ) {

                  if (row['rucOrganismo']!=null) {

                     return "<div style='font-size:10px'>"+row['rucOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['cedulaUsuario']+"</div>";

                  }

                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['nombre']+"</div>";

                }

            },
 
            {"render":

                function ( data, type, row ) {

                   
                    if (row['tipoDeportistas']=="alto") {

                      var tipoDeportistas="Alto Rendimiento";

                    }else if(row['tipoDeportistas']=="alto2"){

                      var tipoDeportistas="Alto Rendimiento para personas con discpacidad";

                    }else if(row["siRespuestas"]=="si"){

                       var tipoDeportistas="Infraestructura";

                    }else{

                      var tipoDeportistas=row['tipoDeportistas'];

                    }

                    return "<div style='font-size:10px'>"+tipoDeportistas+"</div>";

                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['monto']+"</div>";
          
                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['fecha']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {

                    return "<center><button class='consultarComiteConformante btn' data-toggle='modal' data-target='#visualizarComite'><i class='fas fa-file-pdf' style='font-size:40px;'></i></button><center>";

                }

            },

            // {"render":

            //     function ( data, type, row ) {

            //       return "<center><button class='consultarInformacionGeneralSecretariaComite btn' data-toggle='modal' data-target='#visualizarDocumentos'><i class='fas fa-file-pdf' style='font-size:40px;'></i></button><center>";
          
            //     }

            // },

           {"render":

                function ( data, type, row ) {

                  return "<center><a stytle='cursor:pointer;'class='consultarInformacionGeneralSecretariaComite btn' target='_blank' href='documentos/informesTecnicos/"+row['codigo']+".pdf'><i class='fas fa-file-pdf' style='font-size:40px;'></i></a><center>";
          
                }

            }

       ]

 });

 obtener_data_tablaDirectores_recomendacionesSecretariaComiteCertifica("#tablaProyectosSecretariaComiteCertifica tbody",tableProyectoSecretariaComiteCertifica);
 obtener__constultaComiteConformateCertifica("#tablaProyectosSecretariaComiteCertifica tbody",tableProyectoSecretariaComiteCertifica);

}



var obtener__constultaComiteConformateCertifica=function(tbody,table){

  $(tbody).on("click","button.consultarComiteConformante",function(e)
  {

      var data=table.row($(this).parents("tr")).data();

      var paqueteDeDatos = new FormData();

      $("#codgioProyectoDocumentos").val(data.codigo);

      paqueteDeDatos.append('codigoEnviadoDocumentos', data.codigo);

      var destino="modelosBd/validaciones/selectorComiteConformante.md.php";

      $.ajax({

        type:"POST",
            url: destino,
            type: 'POST',
            data: paqueteDeDatos,
            contentType: false,
            processData: false,
            cache: false, 

            success:function(response){

              var elementos=JSON.parse(response);

              var idUsuarioSAlto=elementos['idUsuarioSAlto'];
              var nombreCompletoSAlto=elementos['nombreCompletoSAlto'];
              var emailSAlto=elementos['emailSAlto'];
              var cedulaSAlto=elementos['cedulaSAlto'];
              var nombreRolSAlto=elementos['nombreRolSAlto'];
              var rolAlto=elementos['rolAlto'];

              var idUsuarioActividadFisica=elementos['idUsuarioActividadFisica'];
              var nombreCompletoActividadFisica=elementos['nombreCompletoActividadFisica'];
              var emailActividadFisica=elementos['emailActividadFisica'];
              var cedulaActividadFisica=elementos['cedulaActividadFisica'];
              var nombreRolActividadFisica=elementos['nombreRolActividadFisica'];    
              var rolFisico=elementos['rolFisico'];            

              var idUsuarioCoordinador=elementos['idUsuarioCoordinador'];
              var nombreCompletoCoordinador=elementos['nombreCompletoCoordinador'];
              var emailCoordinador=elementos['emailCoordinador'];
              var cedulaCoordinador=elementos['cedulaCoordinador'];
              var nombreRolCoordinador=elementos['nombreRolCoordinador'];
              var rolCoordinador=elementos['rolCoordinador'];

              var idUsuarioMinistro=elementos['idUsuarioMinistro'];
              var nombreCompletoMinistro=elementos['nombreCompletoMinistro'];
              var emailMinistro=elementos['emailMinistro'];
              var cedulaMinistro=elementos['cedulaMinistro'];
              var nombreRolMinistro=elementos['nombreRolMinistro'];
              var rolMinistro=elementos['rolMinistro'];

              var idUsuarioPlanificacion=elementos['idUsuarioPlanificacion'];
              var nombreCompletoPlanificacion=elementos['nombreCompletoPlanificacion'];
              var emailPlanificacion=elementos['emailPlanificacion'];
              var cedulaPlanificacion=elementos['cedulaPlanificacion'];
              var nombreRolPlanificacion=elementos['nombreRolPlanificacion'];
              var rolPlanificacion=elementos['rolPlanificacion'];

              var idUsuarioJuridico=elementos['idUsuarioJuridico'];
              var nombreCompletoJuridico=elementos['nombreCompletoJuridico'];
              var emailJuridico=elementos['emailJuridico'];
              var cedulaJuridico=elementos['cedulaJuridico'];
              var nombreRolJuridico=elementos['nombreRolJuridico'];
              var rolJuridico=elementos['rolJuridico'];


              var validaAsistencia=elementos['validaAsistencia'];

              var validaNotificacion=elementos['validaNotificacion'];

              if (validaAsistencia==false) {

                $("#documentoReunion").text('N/A');

              }else{

                $("#documentoReunion").attr('href','documentos/asistencia/'+data.codigo+".pdf");
                $("#documentoReunion").text(data.codigo+".pdf");

              }

              
              if (validaNotificacion==false) {

                $("#documentoNotificacion").text('N/A');

              }else{

                $("#documentoNotificacion").attr('href','documentos/notificacion/'+data.codigo+".pdf");
                $("#documentoNotificacion").text(data.codigo+".pdf");

              }

              
              

              $("#codgioProyectoDocumentos").val(data.codigo);

              /*=================================================
              =            Asignando datos Generales            =
              =================================================*/

              if(data.siRespuestas=='si'){

                var nombreDepurado = nombreRolCoordinador.substr(nombreRolCoordinador.indexOf(" ") + 1);
                var nombreCargoTotal=rolCoordinador+" "+nombreDepurado;

                $("#firmaRedundanteProyectos").val(nombreCompletoCoordinador);
                $("#cargoRedundanteProyectos").val(nombreCargoTotal);

              }else if(data.tipoDeportistas=='altoRendimiento' || data.tipoDeportistas=='altoRendimientoDiscapacidad' || data.tipoDeportistas=='militarDeportiva' || data.tipoDeportistas=='profesional' || data.tipoDeportistas=='alto' || data.tipoDeportistas=='alto2') {


                var nombreDepurado = nombreRolSAlto.substr(nombreRolSAlto.indexOf(" ") + 1);
                var nombreCargoTotal=rolAlto+" "+nombreDepurado;

                $("#firmaRedundanteProyectos").val(nombreCompletoSAlto);
                $("#cargoRedundanteProyectos").val(nombreCargoTotal);

              }else if(data.tipoDeportistas=='formativo' || data.tipoDeportistas=='estudiantil' || data.tipoDeportistas=='noFederado'){

                var nombreDepurado = nombreRolActividadFisica.substr(nombreRolActividadFisica.indexOf(" ") + 1);
                var nombreCargoTotal=rolFisico+" "+nombreDepurado;

                $("#firmaRedundanteProyectos").val(nombreCompletoActividadFisica);
                $("#cargoRedundanteProyectos").val(nombreCargoTotal);

              }
              
              $("#nombreProyecto").val(data.nombre);
              
              /*=====  End of Asignando datos Generales  ======*/
              

              $("#idMinistro").val(idUsuarioMinistro);
              $("#nombreMinistro").val(nombreCompletoMinistro);
              $("#emailMinistro").val(emailMinistro);
              $("#cedulaMinistro").val(cedulaMinistro);
              $("#cargoMinistro").val(nombreRolMinistro);

              $("#idSusesAlto").val(idUsuarioSAlto);
              $("#nombreSusesAlto").val(nombreCompletoSAlto);
              $("#emailSusesAlto").val(emailSAlto);
              $("#cedulaSusesAlto").val(cedulaSAlto);
              $("#cargoSusesAlto").val(nombreRolSAlto);

              $("#idSusesActividad").val(idUsuarioActividadFisica);
              $("#nombreSusesActividad").val(nombreCompletoActividadFisica);
              $("#emailSusesActividad").val(emailActividadFisica);
              $("#cedulaSusesActividad").val(cedulaActividadFisica);
              $("#cargoSusesActividad").val(nombreRolActividadFisica);

              $("#idSusesCoordinador").val(idUsuarioCoordinador);
              $("#nombreSusesCoordinador").val(nombreCompletoCoordinador);
              $("#emailSusesCoordinador").val(emailCoordinador);
              $("#cedulaSusesCoordinador").val(cedulaCoordinador);
              $("#cargoSusesCoordinador").val(nombreRolCoordinador);

              $("#idSusesPlanificacion").val(idUsuarioPlanificacion);
              $("#nombreSusesPlanificacion").val(nombreCompletoPlanificacion);
              $("#emailSusesPlanificacion").val(emailPlanificacion);
              $("#cedulaSusesPlanificacion").val(cedulaPlanificacion);
              $("#cargoSusesPlanificacion").val(nombreRolPlanificacion);

              $("#idSusesJuridico").val(idUsuarioJuridico);
              $("#nombreSusesJuridico").val(nombreCompletoJuridico);
              $("#emailSusesJuridico").val(emailJuridico);
              $("#cedulaSusesJuridico").val(cedulaJuridico);
              $("#cargoSusesJuridico").val(nombreRolJuridico);



              $(".rol__alto").text(nombreRolSAlto);
              $(".subsecretario__deporte__alto__rendimiento").text(nombreCompletoSAlto);

              $(".rol__desarrollo").text(nombreRolActividadFisica);
              $(".subsecretario__desarrollo__actividad__fisica").text(nombreCompletoActividadFisica);

              $(".rol__coordinador").text(nombreRolCoordinador);
              $(".coordinador__administracion").text(nombreCompletoCoordinador);

              $(".rol__planificacion").text(nombreRolPlanificacion);
              $(".planificacion__nombre").text(nombreCompletoPlanificacion);

              $(".rol__juridico").text(nombreRolJuridico);
              $(".juridico__nombre").text(nombreCompletoJuridico);


              $('#seleccionSecretarioDelegado').change(function (e){

                $(this).hide();

                if ($(this).val()=="0") {

                  alertify.set("notifier","position", "top-right");
                  alertify.notify("Comentario Enviado", "error", 5, function(){});

                }else if($(this).val()=="1"){

                  $(".contenido__nombre").text(nombreCompletoMinistro);
                  $(".nombre__ministro").text(nombreRolMinistro);

                  $(".regresar__escoger").show();

                }else if($(this).val()=="2"){

                  $(".contenedor__usuarios__select").show();

                  $(".regresar__escoger").show();

                  $(".nombre__ministro").text("DELEGADO");

                }

              });


              $('#regresarSeleccion').click(function (e){

                e.preventDefault();

                $(".contenido__nombre").text(" ");
                $(".nombre__ministro").text("Seleccionar Ministro de deporte o delegado");

                $("#seleccionSecretarioDelegado").show();

                $("#seleccionSecretarioDelegado").val("0");

                $("#selectorUsuariosDelegados").val("0");

                $(".contenedor__usuarios__select").hide();

                $(".regresar__escoger").hide();

              });


            }

      });      
    
  });

 }


/*==================================
=            Documentos            =
==================================*/

var obtener_data_tablaDirectores_recomendacionesSecretariaComiteCertifica=function(tbody,table){

  $(tbody).on("click","button.consultarInformacionGeneralSecretariaComite",function(e)
  {

      var data=table.row($(this).parents("tr")).data();

      if (data.observacionRecomendacion!="" && data.observacionRecomendacion!=null) {

        $(".recomendacion__satisfactoria__dir__fila").show();

        $(".recomendacion__satisfactoria__dir").text(data.observacionRecomendacion);

      }else{

        $(".recomendacion__satisfactoria__dir__fila").show();

         $(".recomendacion__satisfactoria__dir").text("N/A");

      }

      /*==================================
      =            Documentos            =
      ==================================*/

     $(".oculto__1").hide();
     $(".oculto__2").hide();
     $(".oculto__3").hide();
     $(".oculto__4").hide();
     $(".oculto__5").hide();
     $(".oculto__6").hide();
     $(".oculto__7").hide();
     $(".oculto__8").hide();



     $("#proyectoVista").attr('href','documentos/proyectos/'+data.proyectoCargadoPdf+'.pdf');

     if (data.proyectoCargadoInfrasPdf!="" && data.proyectoCargadoInfrasPdf!=null) {
       $("#proyectoInfraestructura").attr('href','documentos/proyectosInfraestructura/'+data.proyectoCargadoInfrasPdf+'.pdf');
       $(".oculto__1").show();
     }

     if (data.acreditarVidaJuridica!="" && data.acreditarVidaJuridica!=null) {
       $("#vidaJuridica").attr('href','documentos/vidaJuridica/'+data.acreditarVidaJuridica+'.pdf');
       $(".oculto__2").show();
     }

     if (data.certificacionTrayectoria!="" && data.certificacionTrayectoria!=null) {
       $("#certificacionTrayectoria").attr('href','documentos/certificacionDeTrayectoria/'+data.certificacionTrayectoria+'.pdf');
       $(".oculto__3").show();
     }

     if (data.certificadoPropiedades!="" && data.certificadoPropiedades!=null) {
       $("#certificadoPropiedad").attr('href','documentos/certificadoPropiedad/'+data.certificadoPropiedades+'.pdf');
       $(".oculto__4").show();
     }

     if (data.memoriaTecnicaArquitectonica!="" && data.memoriaTecnicaArquitectonica!=null) {
       $("#memoriaArquitectonicas").attr('href','documentos/memoriaTecnicaArquitectonica/'+data.memoriaTecnicaArquitectonica+'.pdf');
       $(".oculto__5").show();
     }

     if (data.presupuestoRubro!="" && data.presupuestoRubro!=null) {
       $("#presupuestoRubro").attr('href','documentos/presupuestoRubro/'+data.presupuestoRubro+'.pdf');
       $(".oculto__6").show();
     }

     if (data.cronogramaValorado!="" && data.cronogramaValorado!=null) {
       $("#cronogramasValorados").attr('href','documentos/cronogramaValorado/'+data.cronogramaValorado+'.pdf');
       $(".oculto__7").show();
     }

     if (data.respaldosNuevosDigitales!="" && data.respaldosNuevosDigitales!=null) {
       $("#respaldosDigitales").attr('href','documentos/respaldosNuevosDigitales/'+data.respaldosNuevosDigitales+'.pdf');
       $(".oculto__8").show();
     }

      /*=====  End of Documentos  ======*/
    
  });

 }


/*=====  End of Documentos  ======*/


/*=====  End of Secretaria comite certifica  ======*/



/*=========================================
=            Secretaria Comité            =
=========================================*/

$(document).on("ready",function(){

  listarProyectoSecretariaComite();

});


var listarProyectoSecretariaComite=function(){

   var tableProyectoSecretariaComite =$("#tablaProyectosSecretariaComite").DataTable({

          "language": 
        {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "No existen datos",
        "oPaginate": 
        {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
          },
          "oAria": 
          {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      },
      "pageLength": 50,
      "pagingType": "full_numbers",
      "sScrollY": "400px",
      "Paginate": true,
      "scrollX": true,
      "pagingType": "full_numbers",
      "ajax":{
      "method":"POST",
      "url":"modelosBd/datatablets/reporProyectosDirectoresRecomendadosComite.php", 
      "data": { 
          "fisicamenteEstructura": $("#fisicamenteEstructura").val()
       }     
      },
      "order": [[6, "desc" ]],
      "columns":[

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['codigo']+"</div>";
          
                }

            },


            {"render":

                function ( data, type, row ) {


                  if (row['nombreOrganismo']!=null) {

                     return "<div style='font-size:10px'>"+row['nombreOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['nombreDeportistas']+"</div>";

                  }
                   
                }

            },

            {"render":

                function ( data, type, row ) {

                  if (row['rucOrganismo']!=null) {

                     return "<div style='font-size:10px'>"+row['rucOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['cedulaUsuario']+"</div>";

                  }

                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['nombre']+"</div>";

                }

            },
 
            {"render":

                function ( data, type, row ) {

                   
                    if (row['tipoDeportistas']=="alto") {

                      var tipoDeportistas="Alto Rendimiento";

                    }else if(row['tipoDeportistas']=="alto2"){

                      var tipoDeportistas="Alto Rendimiento para personas con discpacidad";

                    }else if(row["siRespuestas"]=="si"){

                       var tipoDeportistas="Infraestructura";

                    }else{

                      var tipoDeportistas=row['tipoDeportistas'];

                    }

                    return "<div style='font-size:10px'>"+tipoDeportistas+"</div>";

                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['monto']+"</div>";
          
                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['fecha']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {

                    return "<center><button class='consultarComiteConformante btn' data-toggle='modal' data-target='#visualizarComite'><i class='fas fa-file-pdf' style='font-size:40px;'></i></button><center>";

                }

            },

            // {"render":

            //     function ( data, type, row ) {

            //       return "<center><button class='consultarInformacionGeneralSecretariaComite btn' data-toggle='modal' data-target='#visualizarDocumentos'><i class='fas fa-file-pdf' style='font-size:40px;'></i></button><center>";
          
            //     }

            // },

           {"render":

                function ( data, type, row ) {


                  if (row['califica']=='A' && row['certifica']=='A') {

                    return "<center><a stytle='cursor:pointer;'class='consultarInformacionGeneralSecretariaComite btn' target='_blank' href='documentos/informesCalificacion/"+row['codigo']+"ID.pdf'><i class='fas fa-file-pdf' style='font-size:40px;'></i></a><center>";

                  }else if(row['califica']=='A' && row['certifica']!='A'){

                    return "<center><a stytle='cursor:pointer;'class='consultarInformacionGeneralSecretariaComite btn' target='_blank' href='documentos/informesCalificacion/"+row['codigo']+"__CD.pdf'><i class='fas fa-file-pdf' style='font-size:40px;'></i></a><center>";

                  }else if(row['califica']!='A' && row['certifica']!='A'){

                    return "<center><a stytle='cursor:pointer;'class='consultarInformacionGeneralSecretariaComite btn' target='_blank' href='documentos/informesCalificacion/"+row['codigo']+"__D.pdf'><i class='fas fa-file-pdf' style='font-size:40px;'></i></a><center>";

                  }                
          
                }

            },

           {"render":

                function ( data, type, row ) {

                  if (row['califica']=='A' && row['certifica']=='A') {

                    return "INFORME";

                  }else if(row['califica']=='A' && row['certifica']!='A'){

                    return "CERTIFICACIÓN";

                  }else if(row['califica']!='A' && row['certifica']!='A'){

                    return "CALIFICACIÓN";

                  }
          
                }
           },

           {"render":

                function ( data, type, row ) {

                  return "<center><input type='checkbox' class='checkedsSenaliados' attr='"+row["codigo"]+"'/><center>";
          
                }
           }

       ]

 });

 obtener_data_tablaDirectores_recomendacionesSecretariaComite("#tablaProyectosSecretariaComite tbody",tableProyectoSecretariaComite);
 obtener__constultaComiteConformate("#tablaProyectosSecretariaComite tbody",tableProyectoSecretariaComite);
 obtenerCheckedsDe("#tablaProyectosSecretariaComite tbody",tableProyectoSecretariaComite);

}


var obtenerCheckedsDe=function(tbody,table){

  var array = new Array(); 

  $(tbody).on("click","input.checkedsSenaliados",function(e){

      var data=table.row($(this).parents("tr")).data();

      var condicion = $(this).is(":checked");

      if(condicion){

        array.push($(this).attr('attr'));

      }else{

        var eliminas=array.indexOf($(this).attr('attr')); 

        array.splice(eliminas, 1);

      }

      $("#codigosGenerados").val(array);

  });

}


var obtener__constultaComiteConformate=function(tbody,table){

  $(tbody).on("click","button.consultarComiteConformante",function(e)
  {

      var data=table.row($(this).parents("tr")).data();

      var paqueteDeDatos = new FormData();

      $("#codgioProyectoDocumentos").val(data.codigo);
      $("#codgioProyectoDocumentosCertificas").val(data.codigo);


      paqueteDeDatos.append('codigoEnviadoDocumentos', data.codigo);

      var destino="modelosBd/validaciones/selectorComiteConformante.md.php";

      $.ajax({

        type:"POST",
            url: destino,
            type: 'POST',
            data: paqueteDeDatos,
            contentType: false,
            processData: false,
            cache: false, 

            success:function(response){

              var elementos=JSON.parse(response);

              var idUsuarioSAlto=elementos['idUsuarioSAlto'];
              var nombreCompletoSAlto=elementos['nombreCompletoSAlto'];
              var emailSAlto=elementos['emailSAlto'];
              var cedulaSAlto=elementos['cedulaSAlto'];
              var nombreRolSAlto=elementos['nombreRolSAlto'];
              var rolAlto=elementos['rolAlto'];

              var idUsuarioActividadFisica=elementos['idUsuarioActividadFisica'];
              var nombreCompletoActividadFisica=elementos['nombreCompletoActividadFisica'];
              var emailActividadFisica=elementos['emailActividadFisica'];
              var cedulaActividadFisica=elementos['cedulaActividadFisica'];
              var nombreRolActividadFisica=elementos['nombreRolActividadFisica'];    
              var rolFisico=elementos['rolFisico'];            

              var idUsuarioCoordinador=elementos['idUsuarioCoordinador'];
              var nombreCompletoCoordinador=elementos['nombreCompletoCoordinador'];
              var emailCoordinador=elementos['emailCoordinador'];
              var cedulaCoordinador=elementos['cedulaCoordinador'];
              var nombreRolCoordinador=elementos['nombreRolCoordinador'];
              var rolCoordinador=elementos['rolCoordinador'];

              var idUsuarioMinistro=elementos['idUsuarioMinistro'];
              var nombreCompletoMinistro=elementos['nombreCompletoMinistro'];
              var emailMinistro=elementos['emailMinistro'];
              var cedulaMinistro=elementos['cedulaMinistro'];
              var nombreRolMinistro=elementos['nombreRolMinistro'];
              var rolMinistro=elementos['rolMinistro'];

              var idUsuarioPlanificacion=elementos['idUsuarioPlanificacion'];
              var nombreCompletoPlanificacion=elementos['nombreCompletoPlanificacion'];
              var emailPlanificacion=elementos['emailPlanificacion'];
              var cedulaPlanificacion=elementos['cedulaPlanificacion'];
              var nombreRolPlanificacion=elementos['nombreRolPlanificacion'];
              var rolPlanificacion=elementos['rolPlanificacion'];

              var idUsuarioJuridico=elementos['idUsuarioJuridico'];
              var nombreCompletoJuridico=elementos['nombreCompletoJuridico'];
              var emailJuridico=elementos['emailJuridico'];
              var cedulaJuridico=elementos['cedulaJuridico'];
              var nombreRolJuridico=elementos['nombreRolJuridico'];
              var rolJuridico=elementos['rolJuridico'];


              var validaAsistencia=elementos['validaAsistencia'];

              var validaNotificacion=elementos['validaNotificacion'];

              if (validaAsistencia==false) {

                $("#documentoReunion").text('N/A');

              }else{

                $("#documentoReunion").attr('href','documentos/asistencia/'+data.codigo+".pdf");
                $("#documentoReunion").text(data.codigo+".pdf");

              }

              
              if (validaNotificacion==false) {

                $("#documentoNotificacion").text('N/A');

              }else{

                $("#documentoNotificacion").attr('href','documentos/notificacion/'+data.codigo+".pdf");
                $("#documentoNotificacion").text(data.codigo+".pdf");

              }

              
              

              $("#codgioProyectoDocumentos").val(data.codigo)

              /*=================================================
              =            Asignando datos Generales            =
              =================================================*/

              if(data.siRespuestas=='si'){

                var nombreDepurado = nombreRolCoordinador.substr(nombreRolCoordinador.indexOf(" ") + 1);
                var nombreCargoTotal=rolCoordinador+" "+nombreDepurado;

                $("#firmaRedundanteProyectos").val(nombreCompletoCoordinador);
                $("#cargoRedundanteProyectos").val(nombreCargoTotal);

              }else if(data.tipoDeportistas=='altoRendimiento' || data.tipoDeportistas=='altoRendimientoDiscapacidad' || data.tipoDeportistas=='militarDeportiva' || data.tipoDeportistas=='profesional' || data.tipoDeportistas=='alto' || data.tipoDeportistas=='alto2') {


                var nombreDepurado = nombreRolSAlto.substr(nombreRolSAlto.indexOf(" ") + 1);
                var nombreCargoTotal=rolAlto+" "+nombreDepurado;

                $("#firmaRedundanteProyectos").val(nombreCompletoSAlto);
                $("#cargoRedundanteProyectos").val(nombreCargoTotal);

              }else if(data.tipoDeportistas=='formativo' || data.tipoDeportistas=='estudiantil' || data.tipoDeportistas=='noFederado'){

                var nombreDepurado = nombreRolActividadFisica.substr(nombreRolActividadFisica.indexOf(" ") + 1);
                var nombreCargoTotal=rolFisico+" "+nombreDepurado;

                $("#firmaRedundanteProyectos").val(nombreCompletoActividadFisica);
                $("#cargoRedundanteProyectos").val(nombreCargoTotal);

              }
              
              $("#nombreProyecto").val(data.nombre);
              
              /*=====  End of Asignando datos Generales  ======*/

              var checkboxFuncionesComites=function(parametro1,parametro2,parametro3){

                switch (parametro3) {

                  case 1:
     
                     var condicion = $(parametro1).is(":checked");

                     if (condicion) {

                       $(parametro2).attr('checked','checked');

                     }else{

                       $(parametro2).removeAttr('checked');

                    }

                  break;

                  case 2:

                     var condicion = $(parametro1).is(":checked");

                     if (condicion) {

                       $(parametro2).attr('checked','checked');

                     }else{

                       $(parametro2).removeAttr('checked');

                    }

                  break;

                  case 3:

                     var condicion = $(parametro1).is(":checked");

                     if (condicion) {

                       $(parametro2).attr('checked','checked');

                     }else{

                       $(parametro2).removeAttr('checked');

                    }

                  break;

                  case 4:

                     var condicion = $(parametro1).is(":checked");

                     if (condicion) {

                       $(parametro2).attr('checked','checked');

                     }else{

                       $(parametro2).removeAttr('checked');

                    }

                  break;

                  case 5:

                     var condicion = $(parametro1).is(":checked");

                     if (condicion) {

                       $(parametro2).attr('checked','checked');

                     }else{

                       $(parametro2).removeAttr('checked');

                    }

                  break;

                  case 6:

                     var condicion = $(parametro1).is(":checked");

                     if (condicion) {

                       $(parametro2).attr('checked','checked');

                     }else{

                       $(parametro2).removeAttr('checked');

                    }

                  break;


                }

              }

              checkboxFuncionesComites($("#asistenciaMinistroPrincipal"),$("#asistenciaMinistro"),1);
              checkboxFuncionesComites($("#asistenciaSusesAltoPrincipal"),$("#asistenciaSusesAlto"),2);
              checkboxFuncionesComites($("#asistenciaActividadFisicaPrincipal"),$("#asistenciaActividadFisica"),3);
              checkboxFuncionesComites($("#asistenciaCoordinadorPrincipal"),$("#asistenciaCoordinador"),4);
              checkboxFuncionesComites($("#asistenciaPlanificacionPrincipal"),$("#asistenciaPlanificacion"),5);
              checkboxFuncionesComites($("#asistenciaJuridicoPrincipal"),$("#asistenciaJuridico"),6);



              $("#idMinistro").val(idUsuarioMinistro);
              $("#nombreMinistro").val(nombreCompletoMinistro);
              $("#emailMinistro").val(emailMinistro);
              $("#cedulaMinistro").val(cedulaMinistro);
              $("#cargoMinistro").val(nombreRolMinistro);

              $("#idSusesAlto").val(idUsuarioSAlto);
              $("#nombreSusesAlto").val(nombreCompletoSAlto);
              $("#emailSusesAlto").val(emailSAlto);
              $("#cedulaSusesAlto").val(cedulaSAlto);
              $("#cargoSusesAlto").val(nombreRolSAlto);

              $("#idSusesActividad").val(idUsuarioActividadFisica);
              $("#nombreSusesActividad").val(nombreCompletoActividadFisica);
              $("#emailSusesActividad").val(emailActividadFisica);
              $("#cedulaSusesActividad").val(cedulaActividadFisica);
              $("#cargoSusesActividad").val(nombreRolActividadFisica);

              $("#idSusesCoordinador").val(idUsuarioCoordinador);
              $("#nombreSusesCoordinador").val(nombreCompletoCoordinador);
              $("#emailSusesCoordinador").val(emailCoordinador);
              $("#cedulaSusesCoordinador").val(cedulaCoordinador);
              $("#cargoSusesCoordinador").val(nombreRolCoordinador);

              $("#idSusesPlanificacion").val(idUsuarioPlanificacion);
              $("#nombreSusesPlanificacion").val(nombreCompletoPlanificacion);
              $("#emailSusesPlanificacion").val(emailPlanificacion);
              $("#cedulaSusesPlanificacion").val(cedulaPlanificacion);
              $("#cargoSusesPlanificacion").val(nombreRolPlanificacion);

              $("#idSusesJuridico").val(idUsuarioJuridico);
              $("#nombreSusesJuridico").val(nombreCompletoJuridico);
              $("#emailSusesJuridico").val(emailJuridico);
              $("#cedulaSusesJuridico").val(cedulaJuridico);
              $("#cargoSusesJuridico").val(nombreRolJuridico);

              if($(".contenido__nombre").text()!=""){

                $(".contenido__nombre__principales").text($(".contenido__nombre").text());

              }else{

                $(".contenido__nombre__principales").text($('#selectorUsuariosDelegados option:selected').html());

              }

  
              $("#regresarSeleccion").hide();              

              $(".rol__alto").text(nombreRolSAlto);
              $(".subsecretario__deporte__alto__rendimiento").text(nombreCompletoSAlto);

              $(".rol__desarrollo").text(nombreRolActividadFisica);
              $(".subsecretario__desarrollo__actividad__fisica").text(nombreCompletoActividadFisica);

              $(".rol__coordinador").text(nombreRolCoordinador);
              $(".coordinador__administracion").text(nombreCompletoCoordinador);

              $(".rol__planificacion").text(nombreRolPlanificacion);
              $(".planificacion__nombre").text(nombreCompletoPlanificacion);

              $(".rol__juridico").text(nombreRolJuridico);
              $(".juridico__nombre").text(nombreCompletoJuridico);


              $('#seleccionSecretarioDelegado').change(function (e){

                $(this).hide();

                if ($(this).val()=="0") {

                  alertify.set("notifier","position", "top-right");
                  alertify.notify("Comentario Enviado", "error", 5, function(){});

                }else if($(this).val()=="1"){

                  $(".contenido__nombre").text(nombreCompletoMinistro);
                  $(".nombre__ministro").text(nombreRolMinistro);

                  $(".regresar__escoger").show();

                }else if($(this).val()=="2"){

                  $(".contenedor__usuarios__select").show();

                  $(".regresar__escoger").show();

                  $(".nombre__ministro").text("DELEGADO");

                }

              });


              $('#regresarSeleccion').click(function (e){

                e.preventDefault();

                $(".contenido__nombre").text(" ");
                $(".nombre__ministro").text("Seleccionar Ministro de deporte o delegado");

                $("#seleccionSecretarioDelegado").show();

                $("#seleccionSecretarioDelegado").val("0");

                $("#selectorUsuariosDelegados").val("0");

                $(".contenedor__usuarios__select").hide();

                $(".regresar__escoger").hide();

              });


            }

      });      


    if (data.califica=="A" && data.certifica=="A") {

      $(".calificacion__generadas").hide();
      $(".certificacion__generadas").hide();
      $(".informes__generados").show();

    }else if(data.califica=="A" && data.certifica!="A"){

      $(".calificacion__generadas").hide();
      $(".certificacion__generadas").show();
      $(".informes__generados").hide();

    }else if(data.califica!="A" && data.certifica!="A"){

      $(".calificacion__generadas").show();
      $(".certificacion__generadas").hide();
      $(".informes__generados").hide();

    }
    
  });

 }


/*==================================
=            Documentos            =
==================================*/

var obtener_data_tablaDirectores_recomendacionesSecretariaComite=function(tbody,table){

  $(tbody).on("click","button.consultarInformacionGeneralSecretariaComite",function(e)
  {

      var data=table.row($(this).parents("tr")).data();

      if (data.observacionRecomendacion!="" && data.observacionRecomendacion!=null) {

        $(".recomendacion__satisfactoria__dir__fila").show();

        $(".recomendacion__satisfactoria__dir").text(data.observacionRecomendacion);

      }else{

        $(".recomendacion__satisfactoria__dir__fila").show();

         $(".recomendacion__satisfactoria__dir").text("N/A");

      }

      /*==================================
      =            Documentos            =
      ==================================*/

     $(".oculto__1").hide();
     $(".oculto__2").hide();
     $(".oculto__3").hide();
     $(".oculto__4").hide();
     $(".oculto__5").hide();
     $(".oculto__6").hide();
     $(".oculto__7").hide();
     $(".oculto__8").hide();



     $("#proyectoVista").attr('href','documentos/proyectos/'+data.proyectoCargadoPdf+'.pdf');

     if (data.proyectoCargadoInfrasPdf!="" && data.proyectoCargadoInfrasPdf!=null) {
       $("#proyectoInfraestructura").attr('href','documentos/proyectosInfraestructura/'+data.proyectoCargadoInfrasPdf+'.pdf');
       $(".oculto__1").show();
     }

     if (data.acreditarVidaJuridica!="" && data.acreditarVidaJuridica!=null) {
       $("#vidaJuridica").attr('href','documentos/vidaJuridica/'+data.acreditarVidaJuridica+'.pdf');
       $(".oculto__2").show();
     }

     if (data.certificacionTrayectoria!="" && data.certificacionTrayectoria!=null) {
       $("#certificacionTrayectoria").attr('href','documentos/certificacionDeTrayectoria/'+data.certificacionTrayectoria+'.pdf');
       $(".oculto__3").show();
     }

     if (data.certificadoPropiedades!="" && data.certificadoPropiedades!=null) {
       $("#certificadoPropiedad").attr('href','documentos/certificadoPropiedad/'+data.certificadoPropiedades+'.pdf');
       $(".oculto__4").show();
     }

     if (data.memoriaTecnicaArquitectonica!="" && data.memoriaTecnicaArquitectonica!=null) {
       $("#memoriaArquitectonicas").attr('href','documentos/memoriaTecnicaArquitectonica/'+data.memoriaTecnicaArquitectonica+'.pdf');
       $(".oculto__5").show();
     }

     if (data.presupuestoRubro!="" && data.presupuestoRubro!=null) {
       $("#presupuestoRubro").attr('href','documentos/presupuestoRubro/'+data.presupuestoRubro+'.pdf');
       $(".oculto__6").show();
     }

     if (data.cronogramaValorado!="" && data.cronogramaValorado!=null) {
       $("#cronogramasValorados").attr('href','documentos/cronogramaValorado/'+data.cronogramaValorado+'.pdf');
       $(".oculto__7").show();
     }

     if (data.respaldosNuevosDigitales!="" && data.respaldosNuevosDigitales!=null) {
       $("#respaldosDigitales").attr('href','documentos/respaldosNuevosDigitales/'+data.respaldosNuevosDigitales+'.pdf');
       $(".oculto__8").show();
     }

      /*=====  End of Documentos  ======*/
    
  });

 }


/*=====  End of Documentos  ======*/




/*=====  End of Secretaria Comité  ======*/


/*==================================================
=            Subsecretario Recomendados            =
==================================================*/

$(document).on("ready",function(){

  listarProyectosDirectoresRecomendacionesSubses();

});


var listarProyectosDirectoresRecomendacionesSubses=function(){

   var tableProyectosDirectoresRecomendacionesSubses =$("#tablaProyectosDirectoresRecomendacionesSubsecreario").DataTable({

          "language": 
        {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "No existen datos",
        "oPaginate": 
        {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
          },
          "oAria": 
          {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      },
      "pageLength": 50,
      "pagingType": "full_numbers",
      "sScrollY": "400px",
      "Paginate": true,
      "scrollX": true,
      "pagingType": "full_numbers",
      "ajax":{
      "method":"POST",
      "url":"modelosBd/datatablets/reporProyectosDirectoresRecomendadosSubses.php", 
      "data": { 
          "fisicamenteEstructura": $("#fisicamenteEstructura").val()
       }     
      },
      "order": [[6, "desc" ]],
      "columns":[

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['codigo']+"</div>";
          
                }

            },


            {"render":

                function ( data, type, row ) {


                  if (row['nombreOrganismo']!=null) {

                     return "<div style='font-size:10px'>"+row['nombreOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['nombreDeportistas']+"</div>";

                  }
                   
                }

            },

            {"render":

                function ( data, type, row ) {

                  if (row['rucOrganismo']!=null) {

                     return "<div style='font-size:10px'>"+row['rucOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['cedulaUsuario']+"</div>";

                  }

                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['nombre']+"</div>";

                }

            },
 
            {"render":

                function ( data, type, row ) {

                   
                    if (row['tipoDeportistas']=="alto") {

                      var tipoDeportistas="Alto Rendimiento";

                    }else if(row['tipoDeportistas']=="alto2"){

                      var tipoDeportistas="Alto Rendimiento para personas con discpacidad";

                    }else if(row["siRespuestas"]=="si"){

                       var tipoDeportistas="Infraestructura";

                    }else{

                      var tipoDeportistas=row['tipoDeportistas'];

                    }

                    return "<div style='font-size:10px'>"+tipoDeportistas+"</div>";

                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['monto']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {

                  if(row['fechaCalifica']!=null && row['fechaCalifica']!=""){

                     return "<div style='font-size:10px'>"+row['fechaCalifica']+"</div>";

                  }else{

                     return "<div style='font-size:10px'>N/A</div>";

                  }

                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['fecha']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {

                  if (row["emailOrganismo"]!=null && row["emailOrganismo"]!="") {

                    var emailEnviados=row["emailOrganismo"];

                  }else{

                    var emailEnviados=row["emailDeportistas"];

                  }

                  if(row['fechaCalifica']!=null && row['fechaCalifica']!=""){

                    return '<form action="modelosBd/documentoProyecto/certificacion.md.php" method="post"><input type="hidden" name="codigoProyecto" value="'+row["codigo"]+'" /><input type="hidden" name="nombreProyecto" value="'+row["nombre"]+'" /><input type="hidden" name="emavilEnviados" value="'+emailEnviados+'"><button type="submit" class="generar__certificaciones btn btn-primary">GENERAR<br> CERTIFICACIÓN</button><div class="reload__certificaciones__enviadas"></div></</form>';


                  }else{

                    var radios1="SI&nbsp;<input type='radio' name='recomendacion"+row['codigo']+"' value='si' class='estilos__radios'>";
                    var radios2="NO&nbsp;<input type='radio' name='recomendacion"+row['codigo']+"' value='no' class='estilos__radios'>";
                    var boton="<button class='enviarRecomendacionNoSucces btn btn-primary' codigoSolicita='"+row['codigo']+"'><i class='fas fa-paper-plane'></i>&nbsp;&nbsp;ENVIAR</button>";

                    return "<center><div style='display:flex; align-items:center;'>"+radios1+"&nbsp;&nbsp;"+radios2+"</div><br>"+boton+"<div class='enviarDatosGenerales__reload__datablets'></div></center>";

                  }

                }

            },

            {"render":

                function ( data, type, row ) {

                  return "<center><button class='consultarInformacionGeneralDirectoresRecomendacionesSucces btn' data-toggle='modal' data-target='#visualizarDocumentos'><i class='fas fa-file-pdf' style='font-size:40px;''></i></button><center>";
          
                }

            }

       ]

 });

 obtener_data_tablaDirectores_recomendacionesSubses("#tablaProyectosDirectoresRecomendacionesSubsecreario tbody",tableProyectosDirectoresRecomendacionesSubses);

 obtener_data_recomendaciones_directoresSubses("#tablaProyectosDirectoresRecomendacionesSubsecreario tbody",tableProyectosDirectoresRecomendacionesSubses);

 obtener_data_enviasCertificacion("#tablaProyectosDirectoresRecomendacionesSubsecreario tbody",tableProyectosDirectoresRecomendacionesSubses);

}


/*==============================================
=            Enviar certificaciones            =
==============================================*/

var obtener_data_enviasCertificacion=function(tbody,table){

  $(tbody).on("click","button.generar__certificaciones",function(e)
  {

    $(this).hide();

    $(".reload__certificaciones__enviadas").html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

    window.setTimeout(function(){ 

      alertify.set("notifier","position", "top-right");
      alertify.notify("Certificado generado satisfactoriamente", "success", 5, function(){});


      location.reload();

    } ,4000);     

  });

 }


/*=====  End of Enviar certificaciones  ======*/


/*=========================================================
=            Enviar recomendaciones directores           =
=========================================================*/

var obtener_data_recomendaciones_directoresSubses=function(tbody,table){

  $(tbody).on("click","button.enviarRecomendacionNoSucces",function(e)
  {

    $(this).hide();

    $('.enviarDatosGenerales__reload__datablets').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

    var data=table.row($(this).parents("tr")).data();

    var radioRecomendaciones=$('input:radio[name=recomendacion'+data.codigo+']:checked').val();

    var idUsuarioFuncionario=$("#idUsuario").val();

    var nombresApellidosFuncionarios=$("#nombresApellidosFuncionarios").val();

    var emailFuncionariosRelativos=$("#email").val();

    var personaCargo=$("#personaCargo").val();

    /*=========================================
    =            Valores del email            =
    =========================================*/
    var paqueteDeDatos = new FormData();
    
    paqueteDeDatos.append('radioRecomendaciones', radioRecomendaciones);

    paqueteDeDatos.append('proyecto', data.nombre);

    paqueteDeDatos.append('codigoRecomendacion', data.codigo);

    paqueteDeDatos.append('referenciaGeneradas', 'S');

    paqueteDeDatos.append('personaCargo', personaCargo);

    /*======================================
    =            Datos Director            =
    ======================================*/
   
    paqueteDeDatos.append('idUsuarioFuncionario', idUsuarioFuncionario);
    paqueteDeDatos.append('nombresApellidosFuncionarios', nombresApellidosFuncionarios);
    paqueteDeDatos.append('emailFuncionariosRelativos', emailFuncionariosRelativos);
    
    /*=====  End of Datos Director  ======*/
    
    /*======================================
    =            Datos Analista            =
    ======================================*/

    
    paqueteDeDatos.append('emailAnalista', data.emailAnalista);
    paqueteDeDatos.append('nombreCompletoAnalista', data.nombreCompletoAnalista);
    
    /*=====  End of Datos Analista  ======*/
    
    
    /*=====  End of Valores del email  ======*/
    

    if (radioRecomendaciones==undefined) {

      alertify.set("notifier","position", "top-right");
      alertify.notify("Es necesario escoger una opción", "error", 1, function(){});


      $('.enviarDatosGenerales__reload__datablets').html('');

      $(this).show();

    }else if(radioRecomendaciones=="no"){

      alertify.prompt( 'Recomendar', 'Ingrese observación del porque se regresa el trámite',''
           , function(evt, value) { 

        if(value==""){

          alertify.set("notifier","position", "top-right");
          alertify.notify("Observación de regreso obligatoria", "error", 5, function(){});

          $('.enviarDatosGenerales__reload__datablets').html('');

          $(".enviarRecomendacionNoSucces").show();


        }else{

          paqueteDeDatos.append('observacionRecomendacion', value);


          /*====================================
          =            Enviar datos            =
          ====================================*/
            
          var destino = "modelosBd/actualiza/actualizaRegresoRecomendacion.md.php"; 

          $.ajax({

            url: destino,
            type: 'POST',
            contentType: false,
            data: paqueteDeDatos, 
            processData: false,
            cache: false, 

            success: function(response){

              var elementos=JSON.parse(response);
              var mensaje=elementos['mensaje'];

              if (mensaje==1) {

                alertify.set("notifier","position", "top-right");
                alertify.notify("Proyecto devuelto al analista", "success", 5, function(){});

                contadorTeletrabajo=parseInt(table.rows().count(), 10) - 1;

                if(contadorTeletrabajo==0 || contadorTeletrabajo==1){

                  window.setTimeout(function(){ 
                    location.reload();
                  } ,5000); 

                }else{

                    table.ajax.reload();

                }


              }


             },

             error: function (){ 
               
             }

          });        
            
          /*=====  End of Enviar datos  ======*/  


        }


     }, function() { alertify.error('Recomendación Cancelada');  $('.enviarRecomendacionNoSucces').show(); $('.enviarDatosGenerales__reload__datablets').html('');});


    }else if(radioRecomendaciones=="si"){

     alertify.prompt( 'Recomendar', 'Ingrese observación (Opcional)',''
           , function(evt, value) { 



          paqueteDeDatos.append('observacionRecomendacion', value);


          /*====================================
          =            Enviar datos            =
          ====================================*/
            
          var destino = "modelosBd/actualiza/actualizaEnviaComiteCalificaciones.md.php"; 

          $.ajax({

            url: destino,
            type: 'POST',
            contentType: false,
            data: paqueteDeDatos, 
            processData: false,
            cache: false, 

            success: function(response){

              var elementos=JSON.parse(response);
              var mensaje=elementos['mensaje'];

              if (mensaje==1) {

                alertify.set("notifier","position", "top-right");
                alertify.notify("Proyecto recomendado al Subsecretario", "success", 5, function(){});

                contadorTeletrabajo=parseInt(table.rows().count(), 10) - 1;

                if(contadorTeletrabajo==0 || contadorTeletrabajo==1){

                  window.setTimeout(function(){ 
                    location.reload();
                  } ,5000); 

                }else{

                    table.ajax.reload();

                }


              }


             },

             error: function (){ 
               
             }

          });        
            
          /*=====  End of Enviar datos  ======*/  


     }, function() { alertify.error('Recomendación Cancelada');  $('.enviarRecomendacionNoSucces').show(); $('.enviarDatosGenerales__reload__datablets').html('');});
      

    }

    

  });

 }


/*=====  End of Enviar recomendaciones directores  ======*/



/*==================================
=            Documentos            =
==================================*/


var obtener_data_tablaDirectores_recomendacionesSubses=function(tbody,table){

  $(tbody).on("click","button.consultarInformacionGeneralDirectoresRecomendacionesSucces",function(e)
  {

      var data=table.row($(this).parents("tr")).data();

      if (data.observacionRecomendacion!="" && data.observacionRecomendacion!=null) {

        $(".recomendacion__satisfactoria__dir__fila").show();

        $(".recomendacion__satisfactoria__dir").text(data.observacionRecomendacion);

      }else{

        $(".recomendacion__satisfactoria__dir__fila").show();

         $(".recomendacion__satisfactoria__dir").text("N/A");

      }

      /*==================================
      =            Documentos            =
      ==================================*/
        $("#proyectoVista").attr('href','documentos/proyectos/'+data.proyectoCargadoPdf+'.pdf');

        if (data.curriculumDeportivoSegundo!="") {
          $(".oculto__1").show();
           $("#curriculumDocumento").attr('href','documentos/curriculum/'+data.curriculumDeportivoSegundo+'.pdf');
        }

        if (data.certificadoFederacionPdf!="") {
          $(".oculto__2").show();
           $("#certificadoDocumento").attr('href','documentos/certificadoDeportista/'+data.certificadoFederacionPdf+'.pdf');
        }

        if (data.certificadoOrganismoSuperiorPdf!="") {
          $(".oculto__3").show();
          $("#certificadoSuperior").attr('href','documentos/certificadoSuperior/'+data.certificadoOrganismoSuperiorPdf+'.pdf');
        }

        if (data.solicitudFederacionPdf!="") {
          $(".oculto__4").show();
          $("#solicitudAvalFederacion").attr('href','documentos/solicitudCertificado/'+data.solicitudFederacionPdf+'.pdf');
        }


        if (data.avalFederacionPdf!="") {
          $(".oculto__5").show();
          $("#avalFederacion").attr('href','documentos/avalFederacion/'+data.avalFederacionPdf+'.pdf');
        }

        if (data.solciitudAvalPdf!="") {
          $(".oculto__6").show();
          $("#solciitudAval").attr('href','documentos/solicitudAval/'+data.solciitudAvalPdf+'.pdf');
        }

        if (data.avalOrganismoSuperiorPdf!="") {
          $(".oculto__7").show();
          $("#avalOrganismoSuperior").attr('href','documentos/avalOrganismoSuperior/'+data.avalOrganismoSuperiorPdf+'.pdf');
        }
      
      /*=====  End of Documentos  ======*/
    
  });

 }


/*=====  End of Documentos  ======*/



/*=====  End of Subsecretario Recomendados  ======*/


/*=====================================================
=            Tabla Directores Recomendados            =
=====================================================*/

$(document).on("ready",function(){

  listarProyectosDirectoresRecomendaciones();

});


var listarProyectosDirectoresRecomendaciones=function(){

   var tableProyectosDirectoresRecomendaciones =$("#tablaProyectosDirectoresRecomendaciones").DataTable({

          "language": 
        {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "No existen datos",
        "oPaginate": 
        {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
          },
          "oAria": 
          {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      },
      "pageLength": 50,
      "pagingType": "full_numbers",
      "sScrollY": "400px",
      "Paginate": true,
      "scrollX": true,
      "pagingType": "full_numbers",
      "ajax":{
      "method":"POST",
      "url":"modelosBd/datatablets/reporProyectosDirectoresRecomendados.php", 
      "data": { 
          "fisicamenteEstructura": $("#fisicamenteEstructura").val()
       }     
      },
      "order": [[6, "desc" ]],
      "columns":[

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['codigo']+"</div>";
          
                }

            },


            {"render":

                function ( data, type, row ) {


                  if (row['nombreOrganismo']!=null) {

                     return "<div style='font-size:10px'>"+row['nombreOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['nombreDeportistas']+"</div>";

                  }
                   
                }

            },

            {"render":

                function ( data, type, row ) {

                  if (row['rucOrganismo']!=null) {

                     return "<div style='font-size:10px'>"+row['rucOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['cedulaUsuario']+"</div>";

                  }

                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['nombre']+"</div>";

                }

            },
 
            {"render":

                function ( data, type, row ) {

                   
                    if (row['tipoDeportistas']=="alto") {

                      var tipoDeportistas="Alto Rendimiento";

                    }else if(row['tipoDeportistas']=="alto2"){

                      var tipoDeportistas="Alto Rendimiento para personas con discpacidad";

                    }else if(row["siRespuestas"]=="si"){

                       var tipoDeportistas="Infraestructura";

                    }else{

                      var tipoDeportistas=row['tipoDeportistas'];

                    }

                    return "<div style='font-size:10px'>"+tipoDeportistas+"</div>";

                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['monto']+"</div>";
          
                }

            },


            {"render":

                function ( data, type, row ) {

                  if(row['fechaCalifica']!=null && row['fechaCalifica']!=""){


                    return "<div style='font-size:10px'>"+row['fechaCalifica']+"</div>";

                  }else{

                    return "<div style='font-size:10px'>N/A</div>";

                  }

                  
          
                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['fecha']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {

                  var comprovante1=false;
                  var comprovante2=false;

                  if (row['componentesInfra']!=null && row['componentesInfra']!="") {

                    if (row['componentesInfra']=="T") {

                      comprovante1=true;

                    }else{

                      comprovante1=false;

                    }

                  }

                  if (row['componentesTecnolo']!=null && row['componentesTecnolo']!="") {

                    if (row['componentesTecnolo']=="T") {

                      comprovante2=true;

                    }else{

                      comprovante2=false;

                    }

                  }

                  
                  if(row["recomiendaCertificacion"]==null && row['califica']=="A"){

                    return "<center><div style='display:flex; align-items:center; font-size:10px!important;'>El analista todavía no realiza el informe técnico de viavilidad</div></center>";

                  }else if(row["recomiendaCalificacion"]==null && row['califica']!="A"){

                    return "<center><div style='display:flex; align-items:center; font-size:10px!important;'>El analista todavía no realiza el informe técnico de viavilidad</div></center>";

                  }else if(row["difusion"]=="A" && row["difusionCalificacion"]==null && row['califica']!="A"){

                    return "<center><div style='display:flex; align-items:center; font-size:10px!important;'>Se debe esperar que se gestione la parte de Comunicación</div></center>";

                  }else if (comprovante1==false && row['califica']!="A") {

                    return "<center><div style='display:flex; align-items:center; font-size:10px!important;'>Se debe esperar que se gestione la parte de infraestructura</div></center>";


                  }else if(comprovante2==false && row['califica']!="A"){

                     return "<center><div style='display:flex; align-items:center; font-size:10px!important;'>Se debe esperar que se gestione la parte de tecnologías de la información y comunicación</div></center>";

                  }else{


                  if (row['nombreOrganismo']!=null) {

                     var nombreSolicitantes=row['nombreOrganismo'];

                  }else{

                    var nombreSolicitantes=row['nombreDeportistas'];

                  }

                  if (row['rucOrganismo']!=null) {

                     var documentacion=row['rucOrganismo'];

                  }else{

                     var documentacion=row['cedulaUsuario'];

                  }

                    if(row["califica"]=="A" && row["certifica"]=="A"){

                       var inputsRas="<input type='hidden' id='identificadorImpactos' name='identificadorImpactos' value='id'>";

                    }else if (row["califica"]=="A") {

                      var inputsRas="<input type='hidden' id='identificadorImpactos' name='identificadorImpactos' value='cd'>";

                    }else{

                      var inputsRas="<input type='hidden' id='identificadorImpactos' name='identificadorImpactos' value='d'>";

                    }


                    var radios1="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SI&nbsp;<input type='radio' name='recomendacion"+row['codigo']+"' value='si' class='estilos__radios' codigoAttr='si'>";
                    var radios2="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO&nbsp;<input type='radio' name='recomendacion"+row['codigo']+"' value='no' class='estilos__radios' codigoAttr='no'>";
                    var boton="<button class='enviarRecomendacionNo btn btn-primary' codigoSolicita='"+row['codigo']+"'><i class='fas fa-paper-plane'></i>&nbsp;&nbsp;ENVIAR</button>";

                    var enlaces="<a href='documentos/informesCalificacion/"+row['codigo']+".pdf' target='_blank'>Informe técnico</a>";

                    var documentoGenerados='<form action="modelosBd/documentoProyecto/informeViavilidad.md.php" method="post"><input type="hidden" id="codigoProyectoPdfInformeViavilidad" name="codigoProyectoPdfInformeViavilidad" value="'+row['codigo']+'"/><input type="hidden" id="cedulaRucInformeViabilidad" name="cedulaRucInformeViabilidad" value="'+nombreSolicitantes+'"><input type="hidden" id="nombreSolicitantes" name="nombreSolicitantes" value="'+documentacion+'"><input type="hidden" id="usuariosRelativosVincula" name="usuariosRelativosVincula" value="'+$("#idUsuario").val()+'">'+inputsRas+'<button id="generarVisualizarInformeViabilidad" name="generarVisualizarInformeViabilidad" class="btn btn-primary"><i class="fab fa-creative-commons-share"></i></i>&nbsp;&nbsp;&nbsp;GENERAR INFORME</button></form>';


                    return "<center><div style='display:flex; align-items:center; font-size:13px!important;'>"+radios1+"&nbsp;&nbsp;"+radios2+"</div><br>"+enlaces+"<br>"+documentoGenerados+"Subir informe <input type='file' id='fileInformesTecnicos"+row['codigo']+"'/><br>"+boton+"<div class='enviarDatosGenerales__reload__datablets'></div></center>";

                  }

                }

            },

            {"render":

                function ( data, type, row ) {

                  return "<center><button class='consultarInformacionGeneralDirectoresRecomendaciones btn' data-toggle='modal' data-target='#visualizarDocumentos'><i class='fas fa-file-pdf' style='font-size:40px;''></i></button><center>";
          
                }

            }

       ]

 });

 obtener_data_tablaDirectores_recomendaciones("#tablaProyectosDirectoresRecomendaciones tbody",tableProyectosDirectoresRecomendaciones);

 obtener_data_recomendaciones_directores("#tablaProyectosDirectoresRecomendaciones tbody",tableProyectosDirectoresRecomendaciones);

}

/*=====  End of Tabla Directores Recomendados  ======*/

/*=========================================================
=            Enviar recomendaciones directores           =
=========================================================*/

var obtener_data_recomendaciones_directores=function(tbody,table){

  $(tbody).on("click","button.enviarRecomendacionNo",function(e)
  {

    $(this).hide();

    $('.enviarDatosGenerales__reload__datablets').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

    var data=table.row($(this).parents("tr")).data();

    var radioRecomendaciones=$('input:radio[name=recomendacion'+data.codigo+']:checked').attr('codigoAttr');

    var idUsuarioFuncionario=$("#idUsuario").val();

    var nombresApellidosFuncionarios=$("#nombresApellidosFuncionarios").val();

    var emailFuncionariosRelativos=$("#email").val();

    var personaCargo=$("#personaCargo").val();

    /*=========================================
    =            Valores del email            =
    =========================================*/
    var paqueteDeDatos = new FormData();
    
    paqueteDeDatos.append('radioRecomendaciones', radioRecomendaciones);

    paqueteDeDatos.append('proyecto', data.nombre);

    paqueteDeDatos.append('codigoRecomendacion', data.codigo);

    paqueteDeDatos.append('referenciaGeneradas', 'D');

    paqueteDeDatos.append('personaCargo', personaCargo);

    /*======================================
    =            Datos Director            =
    ======================================*/
   
    paqueteDeDatos.append('idUsuarioFuncionario', idUsuarioFuncionario);
    paqueteDeDatos.append('nombresApellidosFuncionarios', nombresApellidosFuncionarios);
    paqueteDeDatos.append('emailFuncionariosRelativos', emailFuncionariosRelativos);
    
    /*=====  End of Datos Director  ======*/
    
    /*======================================
    =            Datos Analista            =
    ======================================*/

    
    paqueteDeDatos.append('emailAnalista', data.emailAnalista);
    paqueteDeDatos.append('nombreCompletoAnalista', data.nombreCompletoAnalista);
    paqueteDeDatos.append('fechaCalifica', data.fechaCalifica);
    
    /*=====  End of Datos Analista  ======*/
    
    
    /*=====  End of Valores del email  ======*/

    if (radioRecomendaciones==undefined) {

      alertify.set("notifier","position", "top-right");
      alertify.notify("Es necesario escoger una opción", "error", 1, function(){});


      $('.enviarDatosGenerales__reload__datablets').html('');

      $(this).show();

    }else if(radioRecomendaciones=="no"){

      alertify.prompt( 'Recomendar', 'Ingrese observación del porque se regresa el trámite',''
           , function(evt, value) { 

        if(value==""){

          alertify.set("notifier","position", "top-right");
          alertify.notify("Observación de regreso obligatoria", "error", 5, function(){});

          $('.enviarDatosGenerales__reload__datablets').html('');

          $(".enviarRecomendacionNo").show();


        }else{

          paqueteDeDatos.append('observacionRecomendacion', value);

          /*====================================
          =            Enviar datos            =
          ====================================*/
            
          var destino = "modelosBd/actualiza/actualizaRegresoRecomendacion.md.php"; 

          $.ajax({

            url: destino,
            type: 'POST',
            contentType: false,
            data: paqueteDeDatos, 
            processData: false,
            cache: false, 

            success: function(response){

              var elementos=JSON.parse(response);
              var mensaje=elementos['mensaje'];

              if (mensaje==1) {

                alertify.set("notifier","position", "top-right");
                alertify.notify("Proyecto devuelto al analista", "success", 5, function(){});

                contadorTeletrabajo=parseInt(table.rows().count(), 10) - 1;

                if(contadorTeletrabajo==0 || contadorTeletrabajo==1){

                  window.setTimeout(function(){ 
                    location.reload();
                  } ,5000); 

                }else{

                    table.ajax.reload();

                }


              }


             },

             error: function (){ 
               
             }

          });        
            
          /*=====  End of Enviar datos  ======*/  


        }


     }, function() { alertify.error('Recomendación Cancelada');  $('.enviarRecomendacionNo').show(); $('.enviarDatosGenerales__reload__datablets').html('');});


    }else if(radioRecomendaciones=="si"){

     alertify.prompt( 'Recomendar', 'Ingrese observación',''
           , function(evt, value) { 


          if (data.nombreOrganismo!=null) {

            paqueteDeDatos.append('nombreSolicitantes', data.nombreOrganismo);

          }else{

            paqueteDeDatos.append('nombreSolicitantes', data.nombreDeportistas);
            
          }

          paqueteDeDatos.append('seguimientosTecnicos', data.seguimientosTecnicos);
          paqueteDeDatos.append('observacionRecomendacion', value);
          paqueteDeDatos.append('codigo', data.codigo);
          paqueteDeDatos.append('fileInformesTecnicos', $('#fileInformesTecnicos'+data.codigo)[0].files[0]);

          /*====================================
          =            Enviar datos            =
          ====================================*/
            
          var destino = "modelosBd/actualiza/actualizaEnviaRecomendacionSubses.md.php"; 

          $.ajax({

            url: destino,
            type: 'POST',
            contentType: false,
            data: paqueteDeDatos, 
            processData: false,
            cache: false, 

            success: function(response){

              var elementos=JSON.parse(response);
              var mensaje=elementos['mensaje'];

              if (mensaje==1) {

                alertify.set("notifier","position", "top-right");
                alertify.notify("Proyecto recomendado al Cómite de calificación", "success", 5, function(){});

                window.setTimeout(function(){ 
                    location.reload();
                } ,2000); 

              }


             },

             error: function (){ 
               
             }

          });        
            
          /*=====  End of Enviar datos  ======*/  


     }, function() { alertify.error('Recomendación Cancelada');  $('.enviarRecomendacionNo').show(); $('.enviarDatosGenerales__reload__datablets').html('');});
      

    }

  });

 }


/*=====  End of Enviar recomendaciones directores  ======*/



/*==================================
=            Documentos            =
==================================*/


var obtener_data_tablaDirectores_recomendaciones=function(tbody,table){

  $(tbody).on("click","button.consultarInformacionGeneralDirectoresRecomendaciones",function(e)
  {

      var data=table.row($(this).parents("tr")).data();

      if (data.observacionRecomendacion!="" && data.observacionRecomendacion!=null) {

        $(".recomendacion__satisfactoria__dir__fila").show();

        $(".recomendacion__satisfactoria__dir").text(data.observacionRecomendacion);

      }else{

        $(".recomendacion__satisfactoria__dir__fila").show();

         $(".recomendacion__satisfactoria__dir").text("N/A");

      }

      /*==================================
      =            Documentos            =
      ==================================*/
       $(".oculto__1").hide();
       $(".oculto__2").hide();
       $(".oculto__3").hide();
       $(".oculto__4").hide();
       $(".oculto__5").hide();
       $(".oculto__6").hide();
       $(".oculto__7").hide();
       $(".oculto__8").hide();



       $("#proyectoVista").attr('href','documentos/proyectos/'+data.proyectoCargadoPdf+'.pdf');

       if (data.proyectoCargadoInfrasPdf!="" && data.proyectoCargadoInfrasPdf!=null) {
         $("#proyectoInfraestructura").attr('href','documentos/proyectosInfraestructura/'+data.proyectoCargadoInfrasPdf+'.pdf');
         $(".oculto__1").show();
       }

       if (data.acreditarVidaJuridica!="" && data.acreditarVidaJuridica!=null) {
         $("#vidaJuridica").attr('href','documentos/vidaJuridica/'+data.acreditarVidaJuridica+'.pdf');
         $(".oculto__2").show();
       }

       if (data.certificacionTrayectoria!="" && data.certificacionTrayectoria!=null) {
         $("#certificacionTrayectoria").attr('href','documentos/certificacionDeTrayectoria/'+data.certificacionTrayectoria+'.pdf');
         $(".oculto__3").show();
       }

       if (data.certificadoPropiedades!="" && data.certificadoPropiedades!=null) {
         $("#certificadoPropiedad").attr('href','documentos/certificadoPropiedad/'+data.certificadoPropiedades+'.pdf');
         $(".oculto__4").show();
       }

       if (data.memoriaTecnicaArquitectonica!="" && data.memoriaTecnicaArquitectonica!=null) {
         $("#memoriaArquitectonicas").attr('href','documentos/memoriaTecnicaArquitectonica/'+data.memoriaTecnicaArquitectonica+'.pdf');
         $(".oculto__5").show();
       }

       if (data.presupuestoRubro!="" && data.presupuestoRubro!=null) {
         $("#presupuestoRubro").attr('href','documentos/presupuestoRubro/'+data.presupuestoRubro+'.pdf');
         $(".oculto__6").show();
       }

       if (data.cronogramaValorado!="" && data.cronogramaValorado!=null) {
         $("#cronogramasValorados").attr('href','documentos/cronogramaValorado/'+data.cronogramaValorado+'.pdf');
         $(".oculto__7").show();
       }

       if (data.respaldosNuevosDigitales!="" && data.respaldosNuevosDigitales!=null) {
         $("#respaldosDigitales").attr('href','documentos/respaldosNuevosDigitales/'+data.respaldosNuevosDigitales+'.pdf');
         $(".oculto__8").show();
       }


          
      /*=====  End of Documentos  ======*/
    
  });

 }


/*=====  End of Documentos  ======*/

/*==================================================================
=            Tabla proyectos coordinadores certificados            =
==================================================================*/


$(document).on("ready",function(){

  listarProyectosCertificacion();

});


var listarProyectosCertificacion=function(){

   var tableProyectosCertificacion =$("#tablaProyectosCertificados").DataTable({

          "language": 
        {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "No existen datos",
        "oPaginate": 
        {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
          },
          "oAria": 
          {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      },
      "pageLength": 50,
      "pagingType": "full_numbers",
      "sScrollY": "400px",
      "Paginate": true,
      "scrollX": true,
      "pagingType": "full_numbers",
      "ajax":{
      "method":"POST",
      "url":"modelosBd/datatablets/reporCertificadoCor.php", 
      "data": { 
          "fisicamenteEstructura": $("#fisicamenteEstructura").val(),
          "idUsuario": $("#idUsuario").val()
       }     
      },
      "order": [[6, "desc" ]],
      "columns":[

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['codigo']+"</div>";
          
                }

            },


            {"render":

                function ( data, type, row ) {


                  if (row['nombreOrganismo']!=null) {

                     return "<div style='font-size:10px'>"+row['nombreOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['nombreDeportistas']+"</div>";

                  }
                   
                }

            },

            {"render":

                function ( data, type, row ) {

                  if (row['rucOrganismo']!=null) {

                     return "<div style='font-size:10px'>"+row['rucOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['cedulaUsuario']+"</div>";

                  }

                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['nombre']+"</div>";

                }

            },
 
            {"render":

                function ( data, type, row ) {

                   
                    if (row['tipoDeportistas']=="alto") {

                      var tipoDeportistas="Alto Rendimiento";

                    }else if(row['tipoDeportistas']=="alto2"){

                      var tipoDeportistas="Alto Rendimiento para personas con discpacidad";

                    }else if(row["siRespuestas"]=="si"){

                       var tipoDeportistas="Infraestructura";

                    }else{

                      var tipoDeportistas=row['tipoDeportistas'];

                    }

                    return "<div style='font-size:10px'>"+tipoDeportistas+"</div>";

                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['monto']+"</div>";
          
                }

            },

          {"render":

                function ( data, type, row ) {

                  if (row['fechaCalifica']==null) {

                    return "<div style='font-size:10px'>N/A</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['fechaCalifica']+"</div>";

                  }

                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['fecha']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {

                  var idUsuario=$("#idUsuario").val();
                  var fisicamenteEstructura=$("#fisicamenteEstructura").val();

                  $.ajax({

                     data: {idUsuario:idUsuario,fisicamenteEstructura:fisicamenteEstructura},
                     dataType: 'html',
                     type:'POST',
                     url:'modelosBd/validaciones/selectorFuncionarios.modelo.php'

                  }).done(function(listar__lugar){

                     $(".selectores__asincronos").html(listar__lugar);

                  }).fail(function(){

                     alert("hubo un error");

                  });



                  return "<select style='width:100%; height:30px; font-size:10px;' class='selectores__asincronos' idTramite='"+row['idTramite']+"'></select><br><button style='background:#01579b; color:white; font-size:10px; width:100%; height:20px; padding:.3em; border-radius:.4em;' class='boton__reasignar__c__certificados' idUsuario='"+row['idTramite']+"'><i class='fas fa-user-tie'></i>&nbsp;&nbsp;&nbsp;REASIGNAR</button>";                    

                }

            },

            {"render":

                function ( data, type, row ) {

                  return "<center><button class='consultarDocumentosSubbses btn' data-toggle='modal' data-target='#visualizarDocumentos'><i class='fas fa-file-pdf' style='font-size:40px;''></i></button><center>";
          
                }

            }

       ]

 });

 obtener__envio__certificaciones("#tablaProyectosCertificados tbody",tableProyectosCertificacion);
 obtener__documentos__certificaciones("#tablaProyectosCertificados tbody",tableProyectosCertificacion);
}

/*=====  End of Tabla proyectos subsesecetarios  ======*/

/*========================================
=            Envío directores            =
========================================*/

var obtener__envio__certificaciones=function(tbody,table){

 $(tbody).on("click","button.boton__reasignar__c__certificados",function(e){

   var data=table.row($(this).parents("tr")).data();

         $(this).hide();

        var data=table.row($(this).parents("tr")).data();

        var paqueteDeDatos = new FormData();

        if($('select[idTramite='+data.idTramite+']').val()!=""){

          var idUsuario=$('select[idTramite='+data.idTramite+']').val();

          if (data.emailOrganismo!=null) {

            emailEnviado=data.emailOrganismo;

          }else{

            emailEnviado=data.emailDeportistas;

          }


          paqueteDeDatos.append('idUsuario', idUsuario);
          paqueteDeDatos.append('idTramite', data.idTramite);
          paqueteDeDatos.append('emailEnviado', emailEnviado);

          var destino = "modelosBd/inserta/insertaUsuarioAsignadoCertificas.md.php"; 

        $.ajax({

          url: destino,
          type: 'POST',
          contentType: false,
          data: paqueteDeDatos, 
          processData: false,
          cache: false, 

          success: function(response){

             var elementos=JSON.parse(response);
             var mensaje=elementos['mensaje'];

             alertify.set("notifier","position", "top-center");
             alertify.notify("Se asignó correctamente el trámite", "success", 4, function(){});

             window.setTimeout(function(){ 
                location.reload();
             } ,4000);  

          },

          error: function (){ 
            
          }

        });

     }else{

      alertify.set("notifier","position", "top-center");
      alertify.notify("Es obligatorio seleccionar a quien se reasigna el trámite del trámite "+data.nombre, "error", 5, function(){});  

    }

 });

}

/*=====  End of Envío directores  ======*/


/*==================================
=            Documentos            =
==================================*/
var obtener__documentos__certificaciones=function(tbody,table){

 $(tbody).on("click","button.consultarDocumentosSubbses",function(e){



 });

}
/*=====  End of Documentos  ======*/


/*=====  End of Tabla proyectos coordinadores certificados  ======*/


/*====================================================
=            Tabla subses recomendaciones            =
====================================================*/


$(document).on("ready",function(){

  listarProyectosSubsecetariosModificaciones();

});


var listarProyectosSubsecetariosModificaciones=function(){

   var tableProyectosSubsecertariosDirectoresModificaciones =$("#tablaProyectosSubsecretrariosModificaciones").DataTable({

          "language": 
        {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "No existen datos",
        "oPaginate": 
        {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
          },
          "oAria": 
          {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      },
      "pageLength": 50,
      "pagingType": "full_numbers",
      "sScrollY": "400px",
      "Paginate": true,
      "scrollX": true,
      "pagingType": "full_numbers",
      "ajax":{
      "method":"POST",
      "url":"modelosBd/datatablets/reporProyectosSubcesesModificaciones.php", 
      "data": { 
          "fisicamenteEstructura": $("#fisicamenteEstructura").val(),
          "idUsuario": $("#idUsuario").val()
       }     
      },
      "order": [[6, "desc" ]],
      "columns":[

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['codigo']+"</div>";
          
                }

            },


            {"render":

                function ( data, type, row ) {


                  if (row['nombreOrganismo']!=null) {

                     return "<div style='font-size:10px'>"+row['nombreOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['nombreDeportistas']+"</div>";

                  }
                   
                }

            },

            {"render":

                function ( data, type, row ) {

                  if (row['rucOrganismo']!=null) {

                     return "<div style='font-size:10px'>"+row['rucOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['cedulaUsuario']+"</div>";

                  }

                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['nombre']+"</div>";

                }

            },
 
            {"render":

                function ( data, type, row ) {

                   
                    if (row['tipoDeportistas']=="alto") {

                      var tipoDeportistas="Alto Rendimiento";

                    }else if(row['tipoDeportistas']=="alto2"){

                      var tipoDeportistas="Alto Rendimiento para personas con discpacidad";

                    }else if(row["siRespuestas"]=="si"){

                       var tipoDeportistas="Infraestructura";

                    }else{

                      var tipoDeportistas=row['tipoDeportistas'];

                    }

                    return "<div style='font-size:10px'>"+tipoDeportistas+"</div>";

                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['monto']+"</div>";
          
                }

            },

          {"render":

                function ( data, type, row ) {

                  if (row['fechaCalifica']==null) {

                    return "<div style='font-size:10px'>N/A</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['fechaCalifica']+"</div>";

                  }

                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['fecha']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {

                  var idUsuario=$("#idUsuario").val();
                  var fisicamenteEstructura=$("#fisicamenteEstructura").val();

                  $.ajax({

                     data: {idUsuario:idUsuario,fisicamenteEstructura:fisicamenteEstructura},
                     dataType: 'html',
                     type:'POST',
                     url:'modelosBd/validaciones/selectorFuncionarios.modelo.php'

                  }).done(function(listar__lugar){

                     $(".selectores__asincronos").html(listar__lugar);

                  }).fail(function(){

                     alert("hubo un error");

                  });



                  return "<select style='width:100%; height:30px; font-size:10px;' class='selectores__asincronos' idTramite='"+row['idTramite']+"'></select><br><button style='background:#01579b; color:white; font-size:10px; width:100%; height:20px; padding:.3em; border-radius:.4em;' class='boton__reasignar__subses' idUsuario='"+row['idTramite']+"'><i class='fas fa-user-tie'></i>&nbsp;&nbsp;&nbsp;REASIGNAR</button>";                    

                }

            },

            {"render":

                function ( data, type, row ) {

                  return "<center><button class='consultarDocumentosSubbses btn' data-toggle='modal' data-target='#visualizarDocumentos'><i class='fas fa-file-pdf' style='font-size:40px;''></i></button><center>";
          
                }

            }

       ]

 });

}


/*=====  End of Tabla subses recomendaciones  ======*/


/*=======================================================
=            Tabla proyectos subsesecetarios            =
=======================================================*/

$(document).on("ready",function(){

  listarProyectosSubsecetarios();

});


var listarProyectosSubsecetarios=function(){

   var tableProyectosSubsecertariosDirectores =$("#tablaProyectosSubsecretrarios").DataTable({

          "language": 
        {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "No existen datos",
        "oPaginate": 
        {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
          },
          "oAria": 
          {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      },
      "pageLength": 50,
      "pagingType": "full_numbers",
      "sScrollY": "400px",
      "Paginate": true,
      "scrollX": true,
      "pagingType": "full_numbers",
      "ajax":{
      "method":"POST",
      "url":"modelosBd/datatablets/reporProyectosSubceses.php", 
      "data": { 
          "fisicamenteEstructura": $("#fisicamenteEstructura").val(),
          "idUsuario": $("#idUsuario").val()
       }     
      },
      "order": [[6, "desc" ]],
      "columns":[

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['codigo']+"</div>";
          
                }

            },


            {"render":

                function ( data, type, row ) {


                  if (row['nombreOrganismo']!=null) {

                     return "<div style='font-size:10px'>"+row['nombreOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['nombreDeportistas']+"</div>";

                  }
                   
                }

            },

            {"render":

                function ( data, type, row ) {

                  if (row['rucOrganismo']!=null) {

                     return "<div style='font-size:10px'>"+row['rucOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['cedulaUsuario']+"</div>";

                  }

                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['nombre']+"</div>";

                }

            },
 
            {"render":

                function ( data, type, row ) {

                   
                    if (row['tipoDeportistas']=="alto") {

                      var tipoDeportistas="Alto Rendimiento";

                    }else if(row['tipoDeportistas']=="alto2"){

                      var tipoDeportistas="Alto Rendimiento para personas con discpacidad";

                    }else if(row["siRespuestas"]=="si"){

                       var tipoDeportistas="Infraestructura";

                    }else{

                      var tipoDeportistas=row['tipoDeportistas'];

                    }

                    return "<div style='font-size:10px'>"+tipoDeportistas+"</div>";

                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['monto']+"</div>";
          
                }

            },

          {"render":

                function ( data, type, row ) {

                  if (row['fechaCalifica']==null) {

                    return "<div style='font-size:10px'>N/A</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['fechaCalifica']+"</div>";

                  }

                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['fecha']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {

                  var idUsuario=$("#idUsuario").val();
                  var fisicamenteEstructura=$("#fisicamenteEstructura").val();

                  $.ajax({

                     data: {idUsuario:idUsuario,fisicamenteEstructura:fisicamenteEstructura},
                     dataType: 'html',
                     type:'POST',
                     url:'modelosBd/validaciones/selectorFuncionarios.modelo.php'

                  }).done(function(listar__lugar){

                     $(".selectores__asincronos").html(listar__lugar);

                  }).fail(function(){

                     alert("hubo un error");

                  });



                  return "<select style='width:100%; height:30px; font-size:10px;' class='selectores__asincronos' idTramite='"+row['idTramite']+"'></select><br><button style='background:#01579b; color:white; font-size:10px; width:100%; height:20px; padding:.3em; border-radius:.4em;' class='boton__reasignar__subses' idUsuario='"+row['idTramite']+"'><i class='fas fa-user-tie'></i>&nbsp;&nbsp;&nbsp;REASIGNAR</button>";                    

                }

            },

            {"render":

                function ( data, type, row ) {

                  return "<center><button class='consultarDocumentosSubbses btn' data-toggle='modal' data-target='#visualizarDocumentos'><i class='fas fa-file-pdf' style='font-size:40px;''></i></button><center>";
          
                }

            }

       ]

 });

 obtener_data_documentosSubsecertarios("#tablaProyectosSubsecretrarios tbody",tableProyectosSubsecertariosDirectores);
 obtener__envio__directores("#tablaProyectosSubsecretrarios tbody",tableProyectosSubsecertariosDirectores);
}

/*=====  End of Tabla proyectos subsesecetarios  ======*/

/*========================================
=            Envío directores            =
========================================*/

var obtener__envio__directores=function(tbody,table){

 $(tbody).on("click","button.boton__reasignar__subses",function(e){

   var data=table.row($(this).parents("tr")).data();

         $(this).hide();

        var data=table.row($(this).parents("tr")).data();

        var paqueteDeDatos = new FormData();

        if($('select[idTramite='+data.idTramite+']').val()!=""){

          var idUsuario=$('select[idTramite='+data.idTramite+']').val();

          if (data.emailOrganismo!=null) {

            emailEnviado=data.emailOrganismo;

          }else{

            emailEnviado=data.emailDeportistas;

          }


          paqueteDeDatos.append('idUsuario', idUsuario);
          paqueteDeDatos.append('idTramite', data.idTramite);
          paqueteDeDatos.append('emailEnviado', emailEnviado);

          if(data.seguimiento=="A"){

             var destino = "modelosBd/inserta/insertaUsuarioAsignadoSubsessSegumientos.md.php"; 

          }else{

             var destino = "modelosBd/inserta/insertaUsuarioAsignadoSubsess.md.php"; 

          }

          $.ajax({

            url: destino,
            type: 'POST',
            contentType: false,
            data: paqueteDeDatos, 
            processData: false,
            cache: false, 

            success: function(response){

               var elementos=JSON.parse(response);
               var mensaje=elementos['mensaje'];

               alertify.set("notifier","position", "top-center");
               alertify.notify("Se asignó correctamente el trámite", "success", 4, function(){});

               window.setTimeout(function(){ 
                  location.reload();
               } ,4000);  

            },

            error: function (){ 
              
            }

          });

     }else{

      alertify.set("notifier","position", "top-center");
      alertify.notify("Es obligatorio seleccionar a quien se reasigna el trámite del trámite "+data.nombre, "error", 5, function(){});  

    }

 });

}

/*=====  End of Envío directores  ======*/


/*==================================
=            Documentos            =
==================================*/
var obtener_data_documentosSubsecertarios=function(tbody,table){

 $(tbody).on("click","button.consultarDocumentosSubbses",function(e){

   var data=table.row($(this).parents("tr")).data();


   $(".oculto__1").hide();
   $(".oculto__2").hide();
   $(".oculto__3").hide();
   $(".oculto__4").hide();
   $(".oculto__5").hide();
   $(".oculto__6").hide();
   $(".oculto__7").hide();
   $(".oculto__8").hide();



   $("#proyectoVista").attr('href','documentos/proyectos/'+data.proyectoCargadoPdf+'.pdf');

   if (data.proyectoCargadoInfrasPdf!="" && data.proyectoCargadoInfrasPdf!=null) {
     $("#proyectoInfraestructura").attr('href','documentos/proyectosInfraestructura/'+data.proyectoCargadoInfrasPdf+'.pdf');
     $(".oculto__1").show();
   }

   if (data.acreditarVidaJuridica!="" && data.acreditarVidaJuridica!=null) {
     $("#vidaJuridica").attr('href','documentos/vidaJuridica/'+data.acreditarVidaJuridica+'.pdf');
     $(".oculto__2").show();
   }

   if (data.certificacionTrayectoria!="" && data.certificacionTrayectoria!=null) {
     $("#certificacionTrayectoria").attr('href','documentos/certificacionDeTrayectoria/'+data.certificacionTrayectoria+'.pdf');
     $(".oculto__3").show();
   }

   if (data.certificadoPropiedades!="" && data.certificadoPropiedades!=null) {
     $("#certificadoPropiedad").attr('href','documentos/certificadoPropiedad/'+data.certificadoPropiedades+'.pdf');
     $(".oculto__4").show();
   }

   if (data.memoriaTecnicaArquitectonica!="" && data.memoriaTecnicaArquitectonica!=null) {
     $("#memoriaArquitectonicas").attr('href','documentos/memoriaTecnicaArquitectonica/'+data.memoriaTecnicaArquitectonica+'.pdf');
     $(".oculto__5").show();
   }

   if (data.presupuestoRubro!="" && data.presupuestoRubro!=null) {
     $("#presupuestoRubro").attr('href','documentos/presupuestoRubro/'+data.presupuestoRubro+'.pdf');
     $(".oculto__6").show();
   }

   if (data.cronogramaValorado!="" && data.cronogramaValorado!=null) {
     $("#cronogramasValorados").attr('href','documentos/cronogramaValorado/'+data.cronogramaValorado+'.pdf');
     $(".oculto__7").show();
   }

   if (data.respaldosNuevosDigitales!="" && data.respaldosNuevosDigitales!=null) {
     $("#respaldosDigitales").attr('href','documentos/respaldosNuevosDigitales/'+data.respaldosNuevosDigitales+'.pdf');
     $(".oculto__8").show();
   }


 });

}
/*=====  End of Documentos  ======*/


/*==================================================
=            Tabla coordinadores extras            =
==================================================*/

$(document).on("ready",function(){

  listarCoordinadoresProyectos();

});


var listarCoordinadoresProyectos=function(){

   var tableProyectosCoordinadores=$("#tablaProyectosCoordinadores").DataTable({

          "language": 
        {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "No existen datos",
        "oPaginate": 
        {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
          },
          "oAria": 
          {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      },
      "pageLength": 50,
      "pagingType": "full_numbers",
      "sScrollY": "400px",
      "Paginate": true,
      "scrollX": true,
      "pagingType": "full_numbers",
      "ajax":{
      "method":"POST",
      "url":"modelosBd/datatablets/reporProyectosCoordinadores.php", 
      "data": { 
          "fisicamenteEstructura": $("#fisicamenteEstructura").val(),
          "idUsuario": $("#idUsuario").val()
       }     
      },
      "order": [[6, "desc" ]],
      "columns":[

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['codigo']+"</div>";
          
                }

            },


            {"render":

                function ( data, type, row ) {


                  if (row['nombreOrganismo']!=null) {

                     return "<div style='font-size:10px'>"+row['nombreOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['nombreDeportistas']+"</div>";

                  }
                   
                }

            },

            {"render":

                function ( data, type, row ) {

                  if (row['rucOrganismo']!=null) {

                     return "<div style='font-size:10px'>"+row['rucOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['cedulaUsuario']+"</div>";

                  }

                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['nombre']+"</div>";

                }

            },
 
            {"render":

                function ( data, type, row ) {

                   
                    if (row['tipoDeportistas']=="alto") {

                      var tipoDeportistas="Alto Rendimiento";

                    }else if(row['tipoDeportistas']=="alto2"){

                      var tipoDeportistas="Alto Rendimiento para personas con discpacidad";

                    }else if(row["siRespuestas"]=="si"){

                       var tipoDeportistas="Infraestructura";

                    }else{

                      var tipoDeportistas=row['tipoDeportistas'];

                    }

                    return "<div style='font-size:10px'>"+tipoDeportistas+"</div>";

                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['monto']+"</div>";
          
                }

            },

          {"render":

                function ( data, type, row ) {

                  if (row['fechaCalifica']==null) {

                    return "<div style='font-size:10px'>N/A</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['fechaCalifica']+"</div>";

                  }

                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['fecha']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {

                  var idUsuario=$("#idUsuario").val();
                  var fisicamenteEstructura=$("#fisicamenteEstructura").val();

                    $.ajax({

                      data: {idUsuario:idUsuario,fisicamenteEstructura:fisicamenteEstructura},
                      dataType: 'html',
                      type:'POST',
                      url:'modelosBd/validaciones/selectorFuncionarios.modelo.php'

                    }).done(function(listar__lugar){

                      $(".selectores__asincronos").html(listar__lugar);

                    }).fail(function(){

                      alert("hubo un error");

                    });



                    return "<select style='width:100%; height:30px; font-size:10px;' class='selectores__asincronos' idTramite='"+row['idTramite']+"'></select><br><button style='background:#01579b; color:white; font-size:10px; width:100%; height:20px; padding:.3em; border-radius:.4em;' class='boton__reasignar' idUsuario='"+row['idTramite']+"'><i class='fas fa-user-tie'></i>&nbsp;&nbsp;&nbsp;REASIGNAR</button>";                    


               }

            },

            // {"render":

            //     function ( data, type, row ) {

            //          $.ajax({

            //           dataType: 'html',
            //           type:'POST',
            //           url:'modelosBd/validaciones/selectorFuncionariosCoordinadores.modelo.php'

            //         }).done(function(listar__lugar){

            //           $(".selectores__asincronos__directores").html(listar__lugar);

            //         }).fail(function(){

            //           alert("hubo un error");

            //         });



            //         return "<select style='width:100%; height:30px; font-size:10px;' class='selectores__asincronos__directores' idTramitedirectores='"+row['idTramite']+"'></select><br><button style='background:#01579b; color:white; font-size:10px; width:100%; height:20px; padding:.3em; border-radius:.4em;' class='boton__reasignar__a__directores' idUsuario='"+row['idTramite']+"'><i class='fas fa-user-tie'></i>&nbsp;&nbsp;&nbsp;REASIGNAR</button>";                    


            //     }

            // },


            {"render":

                function ( data, type, row ) {

                  return "<center><button class='consultarInformacionGeneralDirectores btn' data-toggle='modal' data-target='#visualizarDocumentos'><i class='fas fa-file-pdf' style='font-size:40px;''></i></button><center>";
          
                }

            }

       ]

 });

 obtener_data_tablaDirectoresCoordinadores("#tablaProyectosCoordinadores tbody",tableProyectosCoordinadores);

 obtener_data_tablaDirectores__enviadosCoordinadores("#tablaProyectosCoordinadores tbody",tableProyectosCoordinadores);

 obtener__data__documentosDirectoresCoordinadores("#tablaProyectosCoordinadores tbody",tableProyectosCoordinadores);

}

/*===============================================================
=            Acciones Datables enviados a directores            =
===============================================================*/


var obtener_data_tablaDirectores__enviadosCoordinadores=function(tbody,table){

  $(tbody).on("click","button.boton__reasignar__a__directores",function(e)
  {

        $(this).hide();

        var data=table.row($(this).parents("tr")).data();

        var paqueteDeDatos = new FormData();

        if($('select[idTramitedirectores='+data.idTramite+']').val()!=""){

          var idUsuario=$('select[idTramitedirectores='+data.idTramite+']').val();

          if (data.emailOrganismo!=null) {

            emailEnviado=data.emailOrganismo;

          }else{

            emailEnviado=data.emailDeportistas;

          }


          paqueteDeDatos.append('idUsuario', idUsuario);
          paqueteDeDatos.append('idTramite', data.idTramite);
          paqueteDeDatos.append('emailEnviado', emailEnviado);

          var destino = "modelosBd/inserta/insertaUsuarioAsignado.md.php"; 


          $.ajax({

             url: destino,
             type: 'POST',
             contentType: false,
             data: paqueteDeDatos, 
             processData: false,
             cache: false, 

             success: function(response){

                var elementos=JSON.parse(response);
                var mensaje=elementos['mensaje'];

                if(mensaje==1){

                   alertify.set("notifier","position", "top-center");
                   alertify.notify("Se asignó correctamente el trámite", "success", 4, function(){});

                   window.setTimeout(function(){ 
                      location.reload();
                   } ,4000);  

                }


              },

             error: function (){ 
                
             }

          });


        }else{

          alertify.set("notifier","position", "top-right");
          alertify.notify("Es obligatorio seleccionar a quien se reasigna el trámite del trámite "+data.nombre, "error", 5, function(){}); 

          $(this).show(); 

        }

  });

 }


/*=====  End of Acciones Datables enviados a directores  ======*/


/*================================================
=            Acciones del Datatablets            =
================================================*/

var obtener_data_tablaDirectoresCoordinadores=function(tbody,table){

  $(tbody).on("click","button.boton__reasignar",function(e)
  {

        $(this).hide();

        var data=table.row($(this).parents("tr")).data();

        var paqueteDeDatos = new FormData();

        if($('select[idTramite='+data.idTramite+']').val()!=""){

          var idUsuario=$('select[idTramite='+data.idTramite+']').val();

          if (data.emailOrganismo!=null) {

            emailEnviado=data.emailOrganismo;

          }else{

            emailEnviado=data.emailDeportistas;

          }


          paqueteDeDatos.append('idUsuario', idUsuario);
          paqueteDeDatos.append('idTramite', data.idTramite);
          paqueteDeDatos.append('emailEnviado', emailEnviado);

          if($("#fisicamenteEstructura").val()=="2" || $("#fisicamenteEstructura").val()==2){

            var destino = "modelosBd/inserta/insertaUsuarioAsignadoCertificas.md.php"; 

          }else{

            var destino = "modelosBd/inserta/insertaUsuarioAsignado.md.php"; 

          }

          $.ajax({

             url: destino,
             type: 'POST',
             contentType: false,
             data: paqueteDeDatos, 
             processData: false,
             cache: false, 

             success: function(response){

                var elementos=JSON.parse(response);
                var mensaje=elementos['mensaje'];

                if(mensaje==1){

                   alertify.set("notifier","position", "top-center");
                   alertify.notify("Se asignó correctamente el trámite", "success", 4, function(){});

                   window.setTimeout(function(){ 
                      location.reload();
                   } ,4000);  

                }


              },

             error: function (){ 
                
             }

          });


        }else{

          alertify.set("notifier","position", "top-right");
          alertify.notify("Es obligatorio seleccionar a quien se reasigna el trámite del trámite "+data.nombre, "error", 5, function(){});  

          $(this).show(); 

        }

  });

 }


/*=====  End of Acciones del Datatablets  ======*/

/*=============================================
=            Documentos Directores            =
=============================================*/

var obtener__data__documentosDirectoresCoordinadores=function(tbody,table){

 $(tbody).on("click","button.consultarInformacionGeneralDirectores",function(e){

   var data=table.row($(this).parents("tr")).data();

   $(".oculto__1").hide();
   $(".oculto__2").hide();
   $(".oculto__3").hide();
   $(".oculto__4").hide();
   $(".oculto__5").hide();
   $(".oculto__6").hide();
   $(".oculto__7").hide();
   $(".oculto__8").hide();


   $("#proyectoVista").attr('href','documentos/proyectos/'+data.proyectoCargadoPdf+'.pdf');

   if (data.proyectoCargadoInfrasPdf!="" && data.proyectoCargadoInfrasPdf!=null) {
     $("#proyectoInfraestructura").attr('href','documentos/proyectosInfraestructura/'+data.proyectoCargadoInfrasPdf+'.pdf');
     $(".oculto__1").show();
   }

   if (data.acreditarVidaJuridica!="" && data.acreditarVidaJuridica!=null) {
     $("#vidaJuridica").attr('href','documentos/vidaJuridica/'+data.acreditarVidaJuridica+'.pdf');
     $(".oculto__2").show();
   }

   if (data.certificacionTrayectoria!="" && data.certificacionTrayectoria!=null) {
     $("#certificacionTrayectoria").attr('href','documentos/certificacionDeTrayectoria/'+data.certificacionTrayectoria+'.pdf');
     $(".oculto__3").show();
   }

   if (data.certificadoPropiedades!="" && data.certificadoPropiedades!=null) {
     $("#certificadoPropiedad").attr('href','documentos/certificadoPropiedad/'+data.certificadoPropiedades+'.pdf');
     $(".oculto__4").show();
   }

   if (data.memoriaTecnicaArquitectonica!="" && data.memoriaTecnicaArquitectonica!=null) {
     $("#memoriaArquitectonicas").attr('href','documentos/memoriaTecnicaArquitectonica/'+data.memoriaTecnicaArquitectonica+'.pdf');
     $(".oculto__5").show();
   }

   if (data.presupuestoRubro!="" && data.presupuestoRubro!=null) {
     $("#presupuestoRubro").attr('href','documentos/presupuestoRubro/'+data.presupuestoRubro+'.pdf');
     $(".oculto__6").show();
   }

   if (data.cronogramaValorado!="" && data.cronogramaValorado!=null) {
     $("#cronogramasValorados").attr('href','documentos/cronogramaValorado/'+data.cronogramaValorado+'.pdf');
     $(".oculto__7").show();
   }

   if (data.respaldosNuevosDigitales!="" && data.respaldosNuevosDigitales!=null) {
     $("#respaldosDigitales").attr('href','documentos/respaldosNuevosDigitales/'+data.respaldosNuevosDigitales+'.pdf');
     $(".oculto__8").show();
   }


 });

}

/*=====  End of Documentos Directores  ======*/



/*=====  End of Tabla coordinadores extras  ======*/

/*===================================================
=            Tabla directores componente            =
===================================================*/


$(document).on("ready",function(){

  listarProyectosDirectoresComponentes();

});


var listarProyectosDirectoresComponentes=function(){

   var tableProyectosDirectoresComponentes =$("#tablaProyectosDirectoresComponentes").DataTable({

          "language": 
        {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "No existen datos",
        "oPaginate": 
        {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
          },
          "oAria": 
          {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      },
 
      "pagingType": "full_numbers",
      "sScrollY": "400px",
      "Paginate": true,
      "scrollX": true,
      "pagingType": "full_numbers",
      "ajax":{
      "method":"POST",
      "url":"modelosBd/datatablets/reporProyectosDirectoresComponentes.php", 
      "data": { 
          "fisicamenteEstructura": $("#fisicamenteEstructura").val(),
          "idUsuario": $("#idUsuario").val()
       }     
      },
      "order": [[8, "desc" ]],
      "columns":[

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:8px'>"+row['codigo']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {


                  if (row['nombreOrganismo']!=null) {

                     return "<div style='font-size:8px'>"+row['nombreOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:8px'>"+row['nombreDeportistas']+"</div>";

                  }
                   
                }

            },

            {"render":

                function ( data, type, row ) {

                  if (row['rucOrganismo']!=null) {

                     return "<div style='font-size:10px'>"+row['rucOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['cedulaUsuario']+"</div>";

                  }

                }

            },

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:8px'>"+row['nombre']+"</div>";

                }

            },
 
            {"render":

                function ( data, type, row ) {

                   
                    if (row['tipoDeportistas']=="alto") {

                      var tipoDeportistas="Alto Rendimiento";

                    }else if(row['tipoDeportistas']=="alto2"){

                      var tipoDeportistas="Alto Rendimiento para personas con discpacidad";

                    }else if(row["siRespuestas"]=="si"){

                       var tipoDeportistas="Infraestructura";

                    }else{

                      var tipoDeportistas=row['tipoDeportistas'];

                    }

                    return "<div style='font-size:10px'>"+tipoDeportistas+"</div>";

                }

            },

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:8px'>"+row['monto']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {

                  if (row['fechaCalifica']==null) {
                    return "<div style='font-size:8px'>N/A</div>";
                  }else{
                    return "<div style='font-size:8px'>"+row['fechaCalifica']+"</div>";
                  }

                  
          
                }

            },


            {"render":

                function ( data, type, row ) {

                  if (row['fechaCertifica']==null) {
                    return "<div style='font-size:8px'>N/A</div>";
                  }else{
                    return "<div style='font-size:8px'>"+row['fechaCertifica']+"</div>";
                  }

                  
          
                }

            },

            {"render":

                function ( data, type, row ) {


                  if(row['certifica']=='A'  && row['idUsuarioRelativo']==$("#idUsuario").val()){

                      return "<div style='font-size:8px'>CERTIFICADO</div>";

                   }else if(row['certifica']=='S' && row['idUsuarioRelativo']==$("#idUsuario").val()){

                      return "<div style='font-size:8px'>RECOMENDADO</div>";

                   }else if(row['certificaEnvio']=='no' && row['idUsuarioRelativo']==$("#idUsuario").val() && row['certifica']!='no'){

                      return "<div style='font-size:8px'>DESCALIFICADO</div>";

                   }else if(row['certifica']=='C' && row['idUsuarioRelativo']==$("#idUsuario").val()){

                      return "<div style='font-size:8px'>RECOMENDADO</div>";

                    }else if(row['certifica']=='si' && row['idUsuarioRelativo']==$("#idUsuario").val()){

                      return "<div style='font-size:8px'>RECTIFICADO</div>";

                    }else if(row['certifica']=='no' && row['idUsuarioRelativo']==$("#idUsuario").val()){

                      return "<div style='font-size:8px'>EN OBSERVACIÓN</div>";

                    }else if (row['califica']=='A') {

                      return "<div style='font-size:8px'>CALIFICADO</div>";

                    }else if(row['califica']=='A' && row['certifica']=='A'){

                      return "<div style='font-size:8px'>CERTIFICADO</div>";

                    }else if(row['califica']=='R' && row["calificarDevuelto"]!="no" && row["rectificacion"]!="SI"){

                      return "<div style='font-size:8px'>DESCALIFICADO</div>";

                    }else if(row['califica']=='C' || row['califica']=='S' || row['califica']=='O'){

                      return "<div style='font-size:8px'>RECOMENDADO</div>";

                    }else if(row["rectificacion"]=="SI"){

                      return "<div style='font-size:8px'>RECTIFICADO</div>";

                    }else if(row["calificarDevuelto"]=="no"){

                      return "<div style='font-size:8px'>EN OBSERVACIÓN</div>";

                    }else{

                      return "<div style='font-size:8px'>EJECUCIÓN</div>";

                    }

                }

            },

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:8px'>"+row['fecha']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {

                  return "<center><button class='consultarInformacionGeneralDirectores btn' data-toggle='modal' data-target='#proyectoPrincipalFuncionario'><i class='fas fa-file-pdf' style='font-size:40px;''></i></button><center>";
          
                }

            }


     ]

 });

 obtener__observaciones__director__componentes("#tablaProyectosDirectoresComponentes tbody",tableProyectosDirectoresComponentes);

}

/*==============================================
=            Observaciones Director            =
==============================================*/

var obtener__observaciones__director__componentes=function(tbody,table){

 $(tbody).on("click","button.consultarInformacionGeneralDirectores",function(e){


      var data=table.row($(this).parents("tr")).data();


      $("#modalPrincipalProyectos").text(data.nombre);

      if (data.nombreOrganismo!=null) {

         $(".beneficiarioProyecto").text(data.nombreOrganismo);

      }else{

        $(".beneficiarioProyecto").text(data.nombreDeportistas);

      }

      if (data.contrato!=null && data.contrato!="" && data.califica=="A" && data.idUsuarioRelativo==$("#idUsuario").val() || data.certificaEnvio=='no' && data.idUsuarioRelativo==$("#idUsuario").val()) {

        $(".fila__descalificar__proyecto__comentarios").show();

        $("#contratoCargado").attr('href','documentos/contratoCargado/'+data.contrato+".pdf");
        $("#contratoCargado").text(data.contrato+".pdf");

      }


      if (data.emailOrganismo!=null) {

         $(".contactoBeneficiarioProyecto").text(data.emailOrganismo);

      }else{

        $(".contactoBeneficiarioProyecto").text(data.emailDeportistas);

      }

      /*======================================
      =            Asingar correo            =
      ======================================*/
            
      $('#contactarResponsableBoton').click(function (e){

        if (data.emailOrganismo!=null) {

           $("#correoResponsble").val(data.emailOrganismo);

        }else{

          $("#correoResponsble").val(data.emailDeportistas);

        }

        $("#proyectoNombre").val(data.nombre);

      });
            
      /*=====  End of Asingar correo  ======*/

      /*==================================
      =            Documentos            =
      ==================================*/
      
      $('#calificarProyectoBoton').click(function (e){
        
        $("#proyectoVista").attr('href','documentos/proyectos/'+data.proyectoCargadoPdf+'.pdf');

        $("#proyectoInfraestructura").attr('href','documentos/proyectosInfraestructura/'+data.proyectoCargadoPdf+'.pdf');
 
        $("#certificadoPropiedad").attr('href','documentos/certificadoPropiedad/'+data.certificadoPropiedades+'.pdf');

        $("#memoriaArquitectonicas").attr('href','documentos/memoriaTecnicaArquitectonica/'+data.memoriaTecnicaArquitectonica+'.pdf');

        $("#presupuestoRubro").attr('href','documentos/presupuestoRubro/'+data.presupuestoRubro+'.pdf');

        $("#cronogramasValorados").attr('href','documentos/cronograma/'+data.proyectoCargadoPdf+'.pdf');

        $("#respaldosDigitales").attr('href','documentos/respaldosNuevosDigitales/'+data.respaldosNuevosDigitales+'.pdf');

       });
      
      /*=====  End of Documentos  ======*/
    
      /*==============================================
      =            Observaciones editadas            =
      ==============================================*/

       if (data.radioTecs=="si"){

            $("input[type='radio'][name='radioProyecto'][value='si']").prop('checked',true);

        }else if(data.radioTecs=="no"){

            $("input[type='radio'][name='radioProyecto'][value='no']").prop('checked',true);

            $("#observacionNegativaProyecto").show();

            $("#observacionNegativaProyecto").val(data.observaTecs);
        }


        if (data.validaCurriculum=="si"){

            $("input[type='radio'][name='radioCurriculum'][value='si']").prop('checked',true);

        }else if(data.validaCurriculum=="no"){

            $("input[type='radio'][name='radioCurriculum'][value='no']").prop('checked',true);

            $("#observacionNegativaCurriculum").show();

            $("#observacionNegativaCurriculum").val(data.estadoCurriculumDeportivoSegundo);
        }


        if (data.radioInfraestructura=="si"){

            $("input[type='radio'][name='radioInfraestructura'][value='si']").prop('checked',true);

        }else if(data.radioInfraestructura=="no"){

            $("input[type='radio'][name='radioInfraestructura'][value='no']").prop('checked',true);

            $("#observacionNegativaProyectoInfras").show();

            $("#observacionNegativaProyectoInfras").val(data.observacionNegativaProyectoInfras);
        }

        
        if (data.certificadoTrayectoria=="si"){

            $("input[type='radio'][name='certificadoTrayectoria'][value='si']").prop('checked',true);

        }else if(data.certificadoTrayectoria=="no"){

            $("input[type='radio'][name='certificadoTrayectoria'][value='no']").prop('checked',true);

            $("#observacionCertificadoTrayectoria").show();

            $("#observacionCertificadoTrayectoria").val(data.observacionCertificadoTrayectoria);
        }


        
        if (data.certificadoPropiedadC=="si"){

            $("input[type='radio'][name='certificadoPropiedadC'][value='si']").prop('checked',true);

        }else if(data.certificadoPropiedadC=="no"){

            $("input[type='radio'][name='certificadoPropiedadC'][value='no']").prop('checked',true);

            $("#observacionNegativaCertificadoPropiedad").show();

            $("#observacionNegativaCertificadoPropiedad").val(data.observacionNegativaCertificadoPropiedad);
        }


        
        if (data.memoriaArquitectonica=="si"){

            $("input[type='radio'][name='memoriaArquitectonica'][value='si']").prop('checked',true);

        }else if(data.memoriaArquitectonica=="no"){

            $("input[type='radio'][name='memoriaArquitectonica'][value='no']").prop('checked',true);

            $("#observacionNegativaMemoriaArquitectonica").show();

            $("#observacionNegativaMemoriaArquitectonica").val(data.observacionNegativaMemoriaArquitectonica);
        }

        if (data.presupuestoRubroChecked=="si"){

            $("input[type='radio'][name='presupuestoRubroChecked'][value='si']").prop('checked',true);

        }else if(data.presupuestoRubroChecked=="no"){

            $("input[type='radio'][name='presupuestoRubroChecked'][value='no']").prop('checked',true);

            $("#observacionNegativaPresupuestoRubro").show();

            $("#observacionNegativaPresupuestoRubro").val(data.observacionNegativaPresupuestoRubro);
        }


        if (data.cronogramasValoradosChecked=="si"){

            $("input[type='radio'][name='cronogramasValoradosChecked'][value='si']").prop('checked',true);

        }else if(data.cronogramasValoradosChecked=="no"){

            $("input[type='radio'][name='cronogramasValoradosChecked'][value='no']").prop('checked',true);

            $("#observacionNegativaCronogramaValorado").show();

            $("#observacionNegativaCronogramaValorado").val(data.observacionNegativaCronogramaValorado);
        }


        if (data.respaldosDigitaChecked=="si"){

            $("input[type='radio'][name='respaldosDigitaChecked'][value='si']").prop('checked',true);

        }else if(data.respaldosDigitaChecked=="no"){

            $("input[type='radio'][name='respaldosDigitaChecked'][value='no']").prop('checked',true);

            $("#observacionNegativaRespaldosDigitales").show();

            $("#observacionNegativaRespaldosDigitales").val(data.observacionNegativaRespaldosDigitales);
        }

      

        if (data.radioProyectoComuni=="si"){

            $("input[type='radio'][name='radioProyectoComuni'][value='si']").prop('checked',true);

        }else if(data.radioProyectoComuni=="no"){

            $("input[type='radio'][name='radioProyectoComuni'][value='no']").prop('checked',true);

            $("#observaNegativaComuni").show();

            $("#observaNegativaComuni").val(data.observaNegativaComuni);
        }

      /*=====  End of Observaciones editadas  ======*/
      

      /*==============================
      =            Enviar            =
      ==============================*/

      var validarMostrarModalesUnicos=function(parametro1,parametro2,parametro3){

        $(parametro1).change(function(e){


          switch (parametro3) {

            case 0:
              var variableSelectora=$('input:radio[name=radioProyecto]:checked').val();
            break;

            case 1:
              var variableSelectora=$('input:radio[name=radioCurriculum]:checked').val();
            break;

            case 2:
              var variableSelectora=$('input:radio[name=radioInfraestructura]:checked').val();
            break;

            case 3:
              var variableSelectora=$('input:radio[name=radioVidaJuridica]:checked').val();
            break;

            case 4:
              var variableSelectora=$('input:radio[name=certificadoTrayectoria]:checked').val();
            break;

            case 5:
              var variableSelectora=$('input:radio[name=certificadoPropiedadC]:checked').val();
            break;

            case 6:
              var variableSelectora=$('input:radio[name=memoriaArquitectonica]:checked').val();
            break;

            case 7:
              var variableSelectora=$('input:radio[name=presupuestoRubroChecked]:checked').val();
            break;

            case 8:
              var variableSelectora=$('input:radio[name=cronogramasValoradosChecked]:checked').val();
            break;

            case 9:
              var variableSelectora=$('input:radio[name=respaldosDigitaChecked]:checked').val();
            break;

          }


          if (variableSelectora=="no") {

             $(parametro2).show();

          }else{

             $(parametro2).hide();

          }

         

        });

      }

      validarMostrarModalesUnicos($('.radioProyecto'),$("#observacionNegativaProyecto"),0);

      validarMostrarModalesUnicos($('.radioCurriculum'),$("#observacionNegativaCurriculum"),1);

      validarMostrarModalesUnicos($('.radioInfraestructura'),$("#observacionNegativaProyectoInfras"),2);

      validarMostrarModalesUnicos($('.radioVidaJuridica'),$("#observacionNegativaVidaJuridica"),3);

      validarMostrarModalesUnicos($('.certificadoTrayectoria'),$("#observacionCertificadoTrayectoria"),4);

      validarMostrarModalesUnicos($('.certificadoPropiedadC'),$("#observacionNegativaCertificadoPropiedad"),5);

      validarMostrarModalesUnicos($('.memoriaArquitectonica'),$("#observacionNegativaMemoriaArquitectonica"),6);

      validarMostrarModalesUnicos($('.presupuestoRubroChecked'),$("#observacionNegativaPresupuestoRubro"),7);

      validarMostrarModalesUnicos($('.cronogramasValoradosChecked'),$("#observacionNegativaCronogramaValorado"),8);

      validarMostrarModalesUnicos($('.respaldosDigitaChecked'),$("#observacionNegativaRespaldosDigitales"),9);

      validarMostrarModalesUnicos($('.radioProyectoComuni'),$("#observaNegativaComuni"),9);


      $("#enviarCalificacion").show();

      $('#enviarCalificacion').click(function (e){

        $('.enviarDatosGenerales__reload').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');


        var paqueteDeDatos = new FormData();

        $(this).hide();
      
        var radioProyecto=$('input:radio[name=radioProyecto]:checked').val();
        var radioCurriculum=$('input:radio[name=radioCurriculum]:checked').val();

        var radioInfraestructura=$('input:radio[name=radioInfraestructura]:checked').val();
        var radioVidaJuridica=$('input:radio[name=radioVidaJuridica]:checked').val();
        var certificadoTrayectoria=$('input:radio[name=certificadoTrayectoria]:checked').val();
        var certificadoPropiedadC=$('input:radio[name=certificadoPropiedadC]:checked').val();
        var memoriaArquitectonica=$('input:radio[name=memoriaArquitectonica]:checked').val();
        var presupuestoRubroChecked=$('input:radio[name=presupuestoRubroChecked]:checked').val();
        var cronogramasValoradosChecked=$('input:radio[name=cronogramasValoradosChecked]:checked').val();
        var respaldosDigitaChecked=$('input:radio[name=respaldosDigitaChecked]:checked').val();

        var radioProyectoComuni=$('input:radio[name=radioProyectoComuni]:checked').val();


        var contadorRadios=0;

        $("input:radio").each(function(index) {
          if($(this).is(':checked') && $(this).val()=="no") {
            contadorRadios++;
          } 
        });

        if (data.emailOrganismo!=null) {

           paqueteDeDatos.append('emailEnviado', data.emailOrganismo);
        }else{
          paqueteDeDatos.append('emailEnviado', data.emailDeportistas);
        }

        paqueteDeDatos.append('nombreProyecto', data.nombre);

        if (contadorRadios>0) {
          paqueteDeDatos.append('calificador', 'no');

        }else{
          paqueteDeDatos.append('calificador','si');
        }

        paqueteDeDatos.append('codigoReferenciado', data.codigo);
        paqueteDeDatos.append('modificacion', data.modificacion);

        paqueteDeDatos.append('radioProyecto', radioProyecto);
        paqueteDeDatos.append('radioCurriculum', radioCurriculum);

        paqueteDeDatos.append('radioInfraestructura', radioInfraestructura);
        paqueteDeDatos.append('radioVidaJuridica', radioVidaJuridica);
        paqueteDeDatos.append('certificadoTrayectoria', certificadoTrayectoria);
        paqueteDeDatos.append('certificadoPropiedadC', certificadoPropiedadC);
        paqueteDeDatos.append('memoriaArquitectonica', memoriaArquitectonica);
        paqueteDeDatos.append('presupuestoRubroChecked', presupuestoRubroChecked);
        paqueteDeDatos.append('cronogramasValoradosChecked', cronogramasValoradosChecked);
        paqueteDeDatos.append('respaldosDigitaChecked', respaldosDigitaChecked);


        paqueteDeDatos.append('radioProyectoComuni', radioProyectoComuni);

        paqueteDeDatos.append('observacionNegativaProyecto', $('#observacionNegativaProyecto').prop('value'));
        paqueteDeDatos.append('observacionNegativaCurriculum', $('#observacionNegativaCurriculum').prop('value'));

        paqueteDeDatos.append('observacionNegativaProyectoInfras', $('#observacionNegativaProyectoInfras').prop('value'));
        paqueteDeDatos.append('observacionNegativaVidaJuridica', $('#observacionNegativaVidaJuridica').prop('value'));
        paqueteDeDatos.append('observacionCertificadoTrayectoria', $('#observacionCertificadoTrayectoria').prop('value'));
        paqueteDeDatos.append('observacionNegativaCertificadoPropiedad', $('#observacionNegativaCertificadoPropiedad').prop('value'));
        paqueteDeDatos.append('observacionNegativaMemoriaArquitectonica', $('#observacionNegativaMemoriaArquitectonica').prop('value'));
        paqueteDeDatos.append('observacionNegativaPresupuestoRubro', $('#observacionNegativaPresupuestoRubro').prop('value'));
        paqueteDeDatos.append('observacionNegativaCronogramaValorado', $('#observacionNegativaCronogramaValorado').prop('value'));
        paqueteDeDatos.append('observacionNegativaRespaldosDigitales', $('#observacionNegativaRespaldosDigitales').prop('value'));

        paqueteDeDatos.append('fisicamenteVariables', $('#fisicamenteVariables').prop('value'));
        paqueteDeDatos.append('idRealizadosVariables', $('#idRealizadosVariables').prop('value'));

       if (contadorRadios==0) {


          alertify.prompt( 'Recomendar', 'Ingrese observación de la recomendación en caso de ser necesario',''
           , function(evt, value) { 

            paqueteDeDatos.append('observacionRecomendacion', value);

            paqueteDeDatos.append('idUsuarioRelativo', data.idUsuarioRelativo);

            /*====================================
            =            Enviar datos            =
            ====================================*/
            
            var destino = "modelosBd/inserta/insertaItemsComponentes.md.php"; 

              $.ajax({

                 url: destino,
                 type: 'POST',
                 contentType: false,
                 data: paqueteDeDatos, 
                 processData: false,
                 cache: false, 

                 success: function(response){

                     var elementos=JSON.parse(response);
                     var mensaje=elementos['mensaje'];

                     if (mensaje==1) {

                         alertify.set("notifier","position", "top-right");
                        alertify.notify("Proceso realizado", "success", 5, function(){});

                        $('.enviarDatosGenerales__reload').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

                          window.setTimeout(function(){ 
                             location.reload();
                          } ,5000); 

                     }


                  },

                 error: function (){ 
                    
                 }

              });        
            
            /*=====  End of Enviar datos  ======*/  


           }, function() { alertify.error('Recomendación Cancelada');  $('#enviarCalificacion').show(); $('.enviarDatosGenerales__reload').html('');});

       }else{

          /*====================================
          =            Enviar datos            =
          ====================================*/
          
          var destino = "modelosBd/inserta/insertaItemsComponentes.md.php"; 

            $.ajax({

               url: destino,
               type: 'POST',
               contentType: false,
               data: paqueteDeDatos, 
               processData: false,
               cache: false, 

               success: function(response){

                 var elementos=JSON.parse(response);
                   var mensaje=elementos['mensaje'];

                   if (mensaje==1) {

                       alertify.set("notifier","position", "top-right");
                      alertify.notify("Proceso realizado", "success", 5, function(){});

                      $('.enviarDatosGenerales__reload').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

                        window.setTimeout(function(){ 
                           location.reload();
                        } ,5000); 

                   }


                },

               error: function (){ 
                  
               }

            });        
          
          /*=====  End of Enviar datos  ======*/  

         }


      });

      /*=====  End of Enviar  ======*/
      

   });

}

/*=====  End of Observaciones Director  ======*/

/*=====  End of Tabla directores componente  ======*/



/*========================================
=            Tabla Directores            =
========================================*/

$(document).on("ready",function(){

  listarProyectosDirectores();

});


var listarProyectosDirectores=function(){

   var tableProyectosDirectores =$("#tablaProyectosDirectores").DataTable({

          "language": 
        {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "No existen datos",
        "oPaginate": 
        {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
          },
          "oAria": 
          {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      },
      "pageLength": 50,
      "pagingType": "full_numbers",
      "sScrollY": "400px",
      "Paginate": true,
      "scrollX": true,
      "pagingType": "full_numbers",
      "ajax":{
      "method":"POST",
      "url":"modelosBd/datatablets/reporProyectosDirectores.php", 
      "data": { 
          "fisicamenteEstructura": $("#fisicamenteEstructura").val(),
          "idUsuario": $("#idUsuario").val()
       }     
      },
      "order": [[6, "desc" ]],
      "columns":[

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['codigo']+"</div>";
          
                }

            },


            {"render":

                function ( data, type, row ) {


                  if (row['nombreOrganismo']!=null) {

                     return "<div style='font-size:10px'>"+row['nombreOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['nombreDeportistas']+"</div>";

                  }
                   
                }

            },

            {"render":

                function ( data, type, row ) {

                  if (row['rucOrganismo']!=null) {

                     return "<div style='font-size:10px'>"+row['rucOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['cedulaUsuario']+"</div>";

                  }

                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['nombre']+"</div>";

                }

            },
 
            {"render":

                function ( data, type, row ) {

                   
                    if (row['tipoDeportistas']=="alto") {

                      var tipoDeportistas="Alto Rendimiento";

                    }else if(row['tipoDeportistas']=="alto2"){

                      var tipoDeportistas="Alto Rendimiento para personas con discpacidad";

                    }else if(row["siRespuestas"]=="si"){

                       var tipoDeportistas="Infraestructura";

                    }else{

                      var tipoDeportistas=row['tipoDeportistas'];

                    }

                    return "<div style='font-size:10px'>"+tipoDeportistas+"</div>";

                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['monto']+"</div>";
          
                }

            },

          {"render":

                function ( data, type, row ) {

                  if (row['fechaCalifica']==null) {

                    return "<div style='font-size:10px'>N/A</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['fechaCalifica']+"</div>";

                  }

                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['fecha']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {

                  var idUsuario=$("#idUsuario").val();
                  var fisicamenteEstructura=$("#fisicamenteEstructura").val();

                    $.ajax({

                      data: {idUsuario:idUsuario,fisicamenteEstructura:fisicamenteEstructura},
                      dataType: 'html',
                      type:'POST',
                      url:'modelosBd/validaciones/selectorFuncionarios.modelo.php'

                    }).done(function(listar__lugar){

                      $(".selectores__asincronos").html(listar__lugar);

                    }).fail(function(){

                      alert("hubo un error");

                    });



                    return "<select style='width:100%; height:30px; font-size:10px;' class='selectores__asincronos' idTramite='"+row['idTramite']+"'></select><br><button style='background:#01579b; color:white; font-size:10px; width:100%; height:20px; padding:.3em; border-radius:.4em;' class='boton__reasignar' idUsuario='"+row['idTramite']+"'><i class='fas fa-user-tie'></i>&nbsp;&nbsp;&nbsp;REASIGNAR</button>";                    


               }

            },

            {"render":

                function ( data, type, row ) {

                     $.ajax({

                      dataType: 'html',
                      type:'POST',
                      url:'modelosBd/validaciones/selectorFuncionariosDirector.modelo.php'

                    }).done(function(listar__lugar){

                      $(".selectores__asincronos__directores").html(listar__lugar);

                    }).fail(function(){

                      alert("hubo un error");

                    });



                    return "<select style='width:100%; height:30px; font-size:10px;' class='selectores__asincronos__directores' idTramitedirectores='"+row['idTramite']+"'></select><br><button style='background:#01579b; color:white; font-size:10px; width:100%; height:20px; padding:.3em; border-radius:.4em;' class='boton__reasignar__a__directores' idUsuario='"+row['idTramite']+"'><i class='fas fa-user-tie'></i>&nbsp;&nbsp;&nbsp;REASIGNAR</button>";                    


                },

                "visible": false

            },


            {"render":

                function ( data, type, row ) {

                  return "<center><button class='consultarInformacionGeneralDirectores btn' data-toggle='modal' data-target='#visualizarDocumentos'><i class='fas fa-file-pdf' style='font-size:40px;''></i></button><center>";
          
                }

            }

       ]

 });

 obtener_data_tablaDirectores("#tablaProyectosDirectores tbody",tableProyectosDirectores);

 obtener_data_tablaDirectores__enviados("#tablaProyectosDirectores tbody",tableProyectosDirectores);

 obtener__data__documentosDirectores("#tablaProyectosDirectores tbody",tableProyectosDirectores);

}

/*===============================================================
=            Acciones Datables enviados a directores            =
===============================================================*/


var obtener_data_tablaDirectores__enviados=function(tbody,table){

  $(tbody).on("click","button.boton__reasignar__a__directores",function(e)
  {

        $(this).hide();

        var data=table.row($(this).parents("tr")).data();

        var paqueteDeDatos = new FormData();

        if($('select[idTramitedirectores='+data.idTramite+']').val()!=""){

          var idUsuario=$('select[idTramitedirectores='+data.idTramite+']').val();

          if (data.emailOrganismo!=null) {

            emailEnviado=data.emailOrganismo;

          }else{

            emailEnviado=data.emailDeportistas;

          }


          paqueteDeDatos.append('idUsuario', idUsuario);
          paqueteDeDatos.append('idTramite', data.idTramite);
          paqueteDeDatos.append('emailEnviado', emailEnviado);

          var destino = "modelosBd/inserta/insertaUsuarioAsignado.md.php"; 


          $.ajax({

             url: destino,
             type: 'POST',
             contentType: false,
             data: paqueteDeDatos, 
             processData: false,
             cache: false, 

             success: function(response){

                var elementos=JSON.parse(response);
                var mensaje=elementos['mensaje'];

                if(mensaje==1){

                   alertify.set("notifier","position", "top-center");
                   alertify.notify("Se asignó correctamente el trámite", "success", 4, function(){});

                   window.setTimeout(function(){ 
                      location.reload();
                   } ,4000);  

                }


              },

             error: function (){ 
                
             }

          });


        }else{

          alertify.set("notifier","position", "top-right");
          alertify.notify("Es obligatorio seleccionar a quien se reasigna el trámite del trámite "+data.nombre, "error", 5, function(){}); 

          $(this).show(); 

        }

  });

 }


/*=====  End of Acciones Datables enviados a directores  ======*/


/*================================================
=            Acciones del Datatablets            =
================================================*/

var obtener_data_tablaDirectores=function(tbody,table){

  $(tbody).on("click","button.boton__reasignar",function(e)
  {

        $(this).hide();

        var data=table.row($(this).parents("tr")).data();

        var paqueteDeDatos = new FormData();

        if($('select[idTramite='+data.idTramite+']').val()!=""){

          var idUsuario=$('select[idTramite='+data.idTramite+']').val();

          if (data.emailOrganismo!=null) {

            emailEnviado=data.emailOrganismo;

          }else{

            emailEnviado=data.emailDeportistas;

          }


          paqueteDeDatos.append('idUsuario', idUsuario);
          paqueteDeDatos.append('idTramite', data.idTramite);
          paqueteDeDatos.append('emailEnviado', emailEnviado);
          paqueteDeDatos.append('codigo', data.codigo);

          var destino = "modelosBd/inserta/insertaUsuarioAsignado.md.php"; 


          $.ajax({

             url: destino,
             type: 'POST',
             contentType: false,
             data: paqueteDeDatos, 
             processData: false,
             cache: false, 

             success: function(response){

                var elementos=JSON.parse(response);
                var mensaje=elementos['mensaje'];

                if(mensaje==1){

                   alertify.set("notifier","position", "top-center");
                   alertify.notify("Se asignó correctamente el trámite", "success", 4, function(){});

                   window.setTimeout(function(){ 
                      location.reload();
                   } ,4000);  

                }


              },

             error: function (){ 
                
             }

          });


        }else{

          alertify.set("notifier","position", "top-right");
          alertify.notify("Es obligatorio seleccionar a quien se reasigna el trámite del trámite "+data.nombre, "error", 5, function(){});  

          $(this).show(); 

        }

  });

 }


/*=====  End of Acciones del Datatablets  ======*/

/*=============================================
=            Documentos Directores            =
=============================================*/

var obtener__data__documentosDirectores=function(tbody,table){

 $(tbody).on("click","button.consultarInformacionGeneralDirectores",function(e){

   var data=table.row($(this).parents("tr")).data();

   $(".oculto__1").hide();
   $(".oculto__2").hide();
   $(".oculto__3").hide();
   $(".oculto__4").hide();
   $(".oculto__5").hide();
   $(".oculto__6").hide();
   $(".oculto__7").hide();
   $(".oculto__8").hide();


   $("#proyectoVista").attr('href','documentos/proyectos/'+data.proyectoCargadoPdf+'.pdf');

   if (data.proyectoCargadoInfrasPdf!="" && data.proyectoCargadoInfrasPdf!=null) {
     $("#proyectoInfraestructura").attr('href','documentos/proyectosInfraestructura/'+data.proyectoCargadoInfrasPdf+'.pdf');
     $(".oculto__1").show();
   }

   if (data.acreditarVidaJuridica!="" && data.acreditarVidaJuridica!=null) {
     $("#vidaJuridica").attr('href','documentos/vidaJuridica/'+data.acreditarVidaJuridica+'.pdf');
     $(".oculto__2").show();
   }

   if (data.certificacionTrayectoria!="" && data.certificacionTrayectoria!=null) {
     $("#certificacionTrayectoria").attr('href','documentos/certificacionDeTrayectoria/'+data.certificacionTrayectoria+'.pdf');
     $(".oculto__3").show();
   }

   if (data.certificadoPropiedades!="" && data.certificadoPropiedades!=null) {
     $("#certificadoPropiedad").attr('href','documentos/certificadoPropiedad/'+data.certificadoPropiedades+'.pdf');
     $(".oculto__4").show();
   }

   if (data.memoriaTecnicaArquitectonica!="" && data.memoriaTecnicaArquitectonica!=null) {
     $("#memoriaArquitectonicas").attr('href','documentos/memoriaTecnicaArquitectonica/'+data.memoriaTecnicaArquitectonica+'.pdf');
     $(".oculto__5").show();
   }

   if (data.presupuestoRubro!="" && data.presupuestoRubro!=null) {
     $("#presupuestoRubro").attr('href','documentos/presupuestoRubro/'+data.presupuestoRubro+'.pdf');
     $(".oculto__6").show();
   }

   if (data.cronogramaValorado!="" && data.cronogramaValorado!=null) {
     $("#cronogramasValorados").attr('href','documentos/cronogramaValorado/'+data.cronogramaValorado+'.pdf');
     $(".oculto__7").show();
   }

   if (data.respaldosNuevosDigitales!="" && data.respaldosNuevosDigitales!=null) {
     $("#respaldosDigitales").attr('href','documentos/respaldosNuevosDigitales/'+data.respaldosNuevosDigitales+'.pdf');
     $(".oculto__8").show();
   }


 });

}

/*=====  End of Documentos Directores  ======*/



/*=====  End of Tabla Directores  ======*/

/*==========================================
=            Tabla Funcionarios            =
==========================================*/

$(document).on("ready",function(){

  listarProyectosFuncionarios();

});


var listarProyectosFuncionarios=function(){

   var tableFuncionarios =$("#tablaProyectosFuncionarios").DataTable({

          "language": 
        {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "No existen datos",
        "oPaginate": 
        {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
          },
          "oAria": 
          {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      },
 
      "pagingType": "full_numbers",
      "sScrollY": "400px",
      "Paginate": true,
      "scrollX": true,
      "pagingType": "full_numbers",
      "ajax":{
      "method":"POST",
      "url":"modelosBd/datatablets/reporProyectosFuncionarios.php", 
      "data": { 
          "idUsuario": $("#idUsuario").val()
       }     
      },
      "order": [[8, "desc" ]],
      "columns":[

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:8px'>"+row['codigo']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {


                  if (row['nombreOrganismo']!=null) {

                     return "<div style='font-size:8px'>"+row['nombreOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:8px'>"+row['nombreDeportistas']+"</div>";

                  }
                   
                }

            },

            {"render":

                function ( data, type, row ) {

                  if (row['rucOrganismo']!=null) {

                     return "<div style='font-size:10px'>"+row['rucOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['cedulaUsuario']+"</div>";

                  }

                }

            },

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:8px'>"+row['nombre']+"</div>";

                }

            },
 
            {"render":

                function ( data, type, row ) {

                   
                    if (row['tipoDeportistas']=="alto") {

                      var tipoDeportistas="Alto Rendimiento";

                    }else if(row['tipoDeportistas']=="alto2"){

                      var tipoDeportistas="Alto Rendimiento para personas con discpacidad";

                    }else if(row["siRespuestas"]=="si"){

                       var tipoDeportistas="Infraestructura";

                    }else{

                      var tipoDeportistas=row['tipoDeportistas'];

                    }

                    return "<div style='font-size:10px'>"+tipoDeportistas+"</div>";

                }

            },

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:8px'>"+row['monto']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {

                  if (row['fechaCalifica']==null) {
                    return "<div style='font-size:8px'>N/A</div>";
                  }else{
                    return "<div style='font-size:8px'>"+row['fechaCalifica']+"</div>";
                  }

                  
          
                }

            },


            {"render":

                function ( data, type, row ) {

                  if (row['fechaCertifica']==null) {
                    return "<div style='font-size:8px'>N/A</div>";
                  }else{
                    return "<div style='font-size:8px'>"+row['fechaCertifica']+"</div>";
                  }

                  
          
                }

            },

            {"render":

                function ( data, type, row ) {


                   
                   if(row['certifica']=='A' && row['seguimientoEnviados']=="D"){

                      return "<div style='font-size:8px'>RECOMENDADO</div>";

                   }else if(row['certifica']=='A'  && row['idUsuarioRelativo']==$("#idUsuario").val() && row['observacionInformes']=="no"){

                      return "<div style='font-size:8px'>EN OBSERVACIÓN</div>";

                   }else if(row['certifica']=='A'  && row['idUsuarioRelativo']==$("#idUsuario").val()){

                      return "<div style='font-size:8px'>CERTIFICADO</div>";

                   }else if(row['certifica']=='S' && row['idUsuarioRelativo']==$("#idUsuario").val()){

                      return "<div style='font-size:8px'>RECOMENDADO</div>";

                   }else if(row['certificaEnvio']=='no' && row['idUsuarioRelativo']==$("#idUsuario").val() && row['certifica']!='no'){

                      return "<div style='font-size:8px'>DESCALIFICADO</div>";

                   }else if(row['certifica']=='C' && row['idUsuarioRelativo']==$("#idUsuario").val()){

                      return "<div style='font-size:8px'>RECOMENDADO</div>";

                    }else if(row['certifica']=='si' && row['idUsuarioRelativo']==$("#idUsuario").val()){

                      return "<div style='font-size:8px'>RECTIFICADO</div>";

                    }else if(row['certifica']=='no' && row['idUsuarioRelativo']==$("#idUsuario").val()){

                      return "<div style='font-size:8px'>EN OBSERVACIÓN</div>";

                    }else if (row['califica']=='A') {

                      return "<div style='font-size:8px'>CALIFICADO</div>";

                    }else if(row['califica']=='A' && row['certifica']=='A'){

                      return "<div style='font-size:8px'>CERTIFICADO</div>";

                    }else if(row['califica']=='R' && row["calificarDevuelto"]!="no" && row["rectificacion"]!="SI"){

                      return "<div style='font-size:8px'>DESCALIFICADO</div>";

                    }else if(row['califica']=='C' || row['califica']=='S' || row['califica']=='O'){

                      return "<div style='font-size:8px'>RECOMENDADO</div>";

                    }else if(row["rectificacion"]=="SI"){

                      return "<div style='font-size:8px'>RECTIFICADO</div>";

                    }else if(row["calificarDevuelto"]=="no"){

                      return "<div style='font-size:8px'>EN OBSERVACIÓN</div>";

                    }else{

                      return "<div style='font-size:8px'>EJECUCIÓN</div>";

                    }

                }

            },

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:8px'>"+row['fecha']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {

                  
                  if(row['seguimientoEnviados']=="D" && row['seguimientosTecnicos']==null){

                     return "<center><button data-toggle='modal' data-target='#informeTecnicoViablidad' class='btn btn-primary informeViabilidades' style='color:white!important; fon-size:10px!important;'><i class='fab fa-creative-commons-share'></i><br>Informe técnico</button><center>";

                  }else if(row['certifica']=="C" && row['recomiendaCertificacion']==null){

                     return "<center><button data-toggle='modal' data-target='#informeTecnicoViablidad' class='btn btn-primary informeViabilidades' style='color:white!important; fon-size:10px!important;'><i class='fab fa-creative-commons-share'></i><br>Informe técnico</button><center>";

                  }else if (row['califica']=="C" && row['recomiendaCalificacion']==null) {

                    return "<center><button data-toggle='modal' data-target='#informeTecnicoViablidad' class='btn btn-primary informeViabilidades' style='color:white!important; fon-size:10px!important;'><i class='fab fa-creative-commons-share'></i><br>Informe técnico</button><center>";

                  }else{

                    return "<center><button class='consultarInformacionGeneralDirectores btn' data-toggle='modal' data-target='#proyectoPrincipalFuncionario'><i class='fas fa-file-pdf' style='font-size:40px;''></i></button><center>";

                  }

                }

            },

            {"render":

                function ( data, type, row ) {


                    return "<button style='background:#01579b; color:white; font-size:10px; width:100%; height:20px; padding:.3em; border-radius:.1em;' class='regresar__tramites' idUsuario='"+row['idTramite']+"' idUsuarioRelativo='"+row["idUsuarioRelativo"]+"'>REGRESAR TRÁMITE</button>";

                }

            }


     ]

 });


 obtener_data_regresar("#tablaProyectosFuncionarios tbody",tableFuncionarios);

 obtener__observaciones__director("#tablaProyectosFuncionarios tbody",tableFuncionarios);

 obtener__informe__viabilidad("#tablaProyectosFuncionarios tbody",tableFuncionarios);

}

/*===============================================
=            Informe de viabilidades            =
===============================================*/

var obtener__informe__viabilidad=function(tbody,table){

  $(tbody).on("click","button.informeViabilidades",function(e){

    var data=table.row($(this).parents("tr")).data();

    var codigoProyectoPdfInformeViavilidad=$("#codigoProyectoPdfInformeViavilidad").val(data.codigo);

    if (data.emailOrganismo!=null) {
      
      var cedulaRucInformeViabilidad=$("#cedulaRucInformeViabilidad").val(data.rucOrganismo);

      var nombreSolicitantes=$("#nombreSolicitantes").val(data.nombreOrganismo);

    }else{

      var cedulaRucInformeViabilidad=$("#cedulaRucInformeViabilidad").val(data.cedulaUsuario);

      var nombreSolicitantes=$("#nombreSolicitantes").val(data.nombreDeportistas);

    }

    if (data.califica=="A" && data.seguimientoEnviados!="D") {

      var identificadorImpactos=$("#identificadorImpactos").val('c');

    }else if(data.seguimientoEnviados=="D"){

      var identificadorImpactos=$("#identificadorImpactos").val('i');

    }

    

  });

 }

/*=====  End of Informe de viabilidades  ======*/


/*=============================================
=            Reenviar los trámites            =
=============================================*/

var obtener_data_regresar=function(tbody,table){

   $(tbody).on("click","button.regresar__tramites",function(e)
  {

    var data=table.row($(this).parents("tr")).data();


    alertify.prompt('¿Está seguro en regresar el trámite '+data.nombre+" a su Director?<br>Ingrese el porque y la dirección a la que se debería asignar", '', function(evt, value){ 


       if (value=="") {

          evt.cancel = true;

          alertify.set('notifier','position', 'top-right');
          alertify.notify('Es necesario ingresar la observación', 'error', 5, function(){});

       }else{

          var paqueteDeDatos = new FormData();

          var idUsuarioDefinidos= $("#idUsuario").val();

          paqueteDeDatos.append('idTramite', data.idTramite);
          paqueteDeDatos.append('idUsuarioDefinidos', idUsuarioDefinidos);
          paqueteDeDatos.append('obseracionDefinida',value);  

          var destino = "modelosBd/actualiza/regresaTramite.md.php"; 

          $.ajax({

              url: destino,
              type: 'POST',
              contentType: false,
              data: paqueteDeDatos, 
              processData: false,
              cache: false, 

              success: function(response){

                var elementos=JSON.parse(response);
                var mensaje=elementos['mensaje'];

                 if (mensaje==1) {

                     alertify.set("notifier","position", "top-center");
                     alertify.notify("Proceso realizado", "success", 5, function(){});

                     $('.enviarDatosGenerales__reload').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

                     window.setTimeout(function(){ 
                             location.reload();
                     } ,5000); 

                 }


              },

              error: function (){ 
                
              }

           });     

        }

    }, function(){ 

         alertify.set("notifier","position", "top-right");
         alertify.notify("Se canceló la acción sobre el trámite "+data.nombre, "error", 5, function(){});

    });


  });

 }


/*=====  End of Reenviar los trámites  ======*/


/*==============================================
=            Observaciones Director            =
==============================================*/

var obtener__observaciones__director=function(tbody,table){

 $(tbody).on("click","button.consultarInformacionGeneralDirectores",function(e){


      var data=table.row($(this).parents("tr")).data();

      if(data.califica=="A"){

          $(".fila__agregada__Certificas").hide();


        /*============================================
        =            Comprobantes subidos            =
        ============================================*/
              
        $('#verComprobantes').click(function (e){   

        $(".body__comprobantes__conjuntos").html(" ");  

          var paqueteDeDatos = new FormData();

           paqueteDeDatos.append('codigoProyectoRealizados',data.codigo);


          var destino="modelosBd/validaciones/comprobantes.modelo.php";

          $.ajax({

            type:"POST",
            url: destino,
            type: 'POST',
            contentType: false,
            data: paqueteDeDatos, 
            processData: false,
            cache: false, 

            success:function(response){

              var elementos=JSON.parse(response);

              var stringidComprobantes=elementos['stringidComprobantes'];
              var stringruc__patrocinador__conjunto=elementos['stringruc__patrocinador__conjunto'];
              var stringnombrePatrocinador=elementos['stringnombrePatrocinador'];
              var stringmontoContratoRealizados=elementos['stringmontoContratoRealizados'];
              var stringfechaDeEmision=elementos['stringfechaDeEmision'];
              var stringcomprobantes__conjuntos__documentos=elementos['stringcomprobantes__conjuntos__documentos'];
              var stringmontos__facturas__conjuntos=elementos['stringmontos__facturas__conjuntos'];

              if(stringmontos__facturas__conjuntos!=""){

                var arraystringidComprobantes = stringidComprobantes.split('------');
                var arraystringruc__patrocinador__conjunto = stringruc__patrocinador__conjunto.split('------');
                var arraystringnombrePatrocinador = stringnombrePatrocinador.split('------');
                var arraystringmontoContratoRealizados = stringmontoContratoRealizados.split('------');
                var arraystringfechaDeEmision = stringfechaDeEmision.split('------');
                var arraystringcomprobantes__conjuntos__documentos = stringcomprobantes__conjuntos__documentos.split('------');
                var arraystringmontos__facturas__conjuntos = stringmontos__facturas__conjuntos.split('------');

                for(var i=0; i<arraystringidComprobantes.length;i++){

                  $(".body__comprobantes__conjuntos").append('<div class="rowCargas_'+i+' row"><div class="col col-12 text-center d d-flex align-items-center justify-content-center">Comprobante '+(i+1)+'&nbsp;&nbsp;<span class="contenedor__delte'+i+'"></span></div><br><div class="col col-4">Ruc</div><div class="col col-8">'+arraystringruc__patrocinador__conjunto[i]+'</div><div class="col col-4">Nombre patrocinador</div><div class="col col-8">'+arraystringnombrePatrocinador[i]+'</div><div class="col col-4">Nùmero de Ruc</div><div class="col col-8">'+arraystringmontoContratoRealizados[i]+'</div><div class="col col-4">Fecha de emisión</div><div class="col col-8">'+arraystringfechaDeEmision[i]+'</div><div class="col col-4">Comprobante</div><div class="col col-8"><a href="documentos/contratoCargado/'+arraystringcomprobantes__conjuntos__documentos[i]+'.pdf" target="_blank">Comprobante '+(i+1)+'</a></div><div class="col col-4">Monto</div><div class="col col-8">'+arraystringmontos__facturas__conjuntos[i]+'</div><br><br></div>');

                }

              }

            }

          });  

        });
              
        /*=====  End of Comprobantes subidos  ======*/


      }


      if ((data.certifica=='no' || data.certifica=='si' || data.certifica=='C'  || data.certifica=='A' || data.certificaEnvio=='no' || data.certifica=='S') && data.idUsuarioRelativo==$("#idUsuario").val()) {

        if (data.calificaCertificado=="no") {

          $("input[type='radio'][name='calificarContrato'][value='no']").prop('checked',true);

          $("#comentarioNegativo").show();

          $("#comentarioNegativo").val(data.observacionCertificado);

        }else{

          $("input[type='radio'][name='calificarContrato'][value='si']").prop('checked',true);

        }

      }



      if (data.certifica=='no' && data.idUsuarioRelativo==$("#idUsuario").val() && data.certifica!='C') {

        $(".observaciones__calificas").text('Observación enviada');

        $("#enviarCalificarContrato").hide();

      }

      if (data.certifica=='C' && data.certificado!='no' && data.certifica=='S' && data.idUsuarioRelativo==$("#idUsuario").val()) {

        $("#enviarCalificarContrato").hide();

      }

      /*==========================================================
      =            Insertar Información Observaciones            =
      ==========================================================*/

      $('#enviarCalificarContrato').click(function (e){

        e.preventDefault();    

        var paqueteDeDatos = new FormData();


        $('#enviarCalificarContrato').hide();

        $(".reload__observaciones").html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

        var radioCalificasContrato=$('input:radio[name=calificarContrato]:checked').val();


        if (radioCalificasContrato==undefined) {

          alertify.set("notifier","position", "top-right");
          alertify.notify("Es obligatorio ingresar una opción de calificación", "error", 5, function(){});

          $('#enviarCalificarContrato').show();

          $(".reload__observaciones").html('');

        }else if(radioCalificasContrato=="no" && $('#comentarioNegativo').val()==""){

          alertify.set("notifier","position", "top-right");
          alertify.notify("Es obligatorio ingresar la observación", "error", 5, function(){});

          $('#enviarCalificarContrato').show();

          $(".reload__observaciones").html('');

        }else{

          paqueteDeDatos.append('radioCalificasContrato', radioCalificasContrato);
          paqueteDeDatos.append('comentarioNegativo', $('#comentarioNegativo').prop('value'));
          paqueteDeDatos.append('codigoCertificados',data.codigo);
          paqueteDeDatos.append('nombreProyectos',data.nombre);
          paqueteDeDatos.append('idUsuarioRelativo',data.idUsuarioRelativo);

          if (data.emailOrganismo!=null) {

             paqueteDeDatos.append('emailEnviado', data.emailOrganismo);

          }else{

            paqueteDeDatos.append('emailEnviado', data.emailDeportistas);

          }

          /*====================================
          =            Enviar Datos            =
          ====================================*/
          
          var destino = "modelosBd/actualiza/actualizaObservaCertificacion.md.php"; 

          $.ajax({

            url: destino,
            type: 'POST',
            contentType: false,
            data: paqueteDeDatos, 
            processData: false,
            cache: false, 

            success: function(response){

              var elementos=JSON.parse(response);
              var mensaje=elementos['mensaje'];


              if (mensaje==1) {

                alertify.set("notifier","position", "top-right");
                alertify.notify("Se realizó correctamente el registro", "success", 5, function(){});

                window.setTimeout(function(){ 

                  location.reload();

                } ,4000);     

              }      

            },

            error: function (){ 
                
            }

          });        
                
          
          /*=====  End of Enviar Datos  ======*/    

        }

        

      });

      /*=====  End of Insertar Información Observaciones  ======*/




      $("#modalPrincipalProyectos").text(data.nombre);

      if (data.nombreOrganismo!=null) {

         $(".beneficiarioProyecto").text(data.nombreOrganismo);

      }else{

        $(".beneficiarioProyecto").text(data.nombreDeportistas);

      }

      if (data.contrato!=null && data.contrato!="" && data.califica=="A" && data.idUsuarioRelativo==$("#idUsuario").val() || data.certificaEnvio=='no' && data.idUsuarioRelativo==$("#idUsuario").val()) {

        $(".fila__descalificar__proyecto__comentarios").show();

        $("#contratoCargado").attr('href','documentos/contratoCargado/'+data.contrato+".pdf");
        $("#contratoCargado").text(data.contrato+".pdf");

      }


      if (data.emailOrganismo!=null) {

         $(".contactoBeneficiarioProyecto").text(data.emailOrganismo);

      }else{

        $(".contactoBeneficiarioProyecto").text(data.emailDeportistas);

      }

      /*======================================
      =            Asingar correo            =
      ======================================*/
            
      $('#contactarResponsableBoton').click(function (e){

        if (data.emailOrganismo!=null) {

           $("#correoResponsble").val(data.emailOrganismo);

        }else{

          $("#correoResponsble").val(data.emailDeportistas);

        }

        $("#proyectoNombre").val(data.nombre);

      });
            
      /*=====  End of Asingar correo  ======*/

      /*==================================
      =            Documentos            =
      ==================================*/
      
      $('#calificarProyectoBoton').click(function (e){
      
        $("#proyectoVista").attr('href','documentos/proyectos/'+data.proyectoCargadoPdf+'.pdf');

        $("#anexoComponentesVistas").attr('href','documentos/anexosComponentes/'+data.proyectoCargadoPdf+'.pdf');


        if (data.curriculumDeportivoSegundo!="" && data.curriculumDeportivoSegundo!=null) {
          $(".calificarCurricumFila").show();
           $("#curriculumDocumento").attr('href','documentos/curriculum/'+data.curriculumDeportivoSegundo+'.pdf');
        }

       if (data.acreditarVidaJuridica!="" && data.acreditarVidaJuridica!=null) {
         $("#vidaJuridica").attr('href','documentos/vidaJuridica/'+data.acreditarVidaJuridica+'.pdf');
         $(".fila__vidaJuridica").show();
       }

       if (data.certificacionTrayectoria!="" && data.certificacionTrayectoria!=null) {
         $("#certificacionTrayectoria").attr('href','documentos/certificacionDeTrayectoria/'+data.certificacionTrayectoria+'.pdf');
         $(".fila__certificadoTrayectoria").show();
       }

       });
      
      /*=====  End of Documentos  ======*/
    
      /*==============================================
      =            Observaciones editadas            =
      ==============================================*/


      if (data.califica=="R" && data.recomendacion=="D") {

        $(".descalificacion__director").show();

        $(".comentario__descalificacion__dir").text(data.obserbaRecomiendaDir);

      }

      
      if (data.modificacion=="si" && data.modificacion!=null && data.modificacion!="") {

           $("#enviarCalificacion").show();

      }

      if (data.calificarDevuelto=="no" || data.califica=="A" || data.califica=="C" || data.califica=="R") {

       if (data.validaProyecto=="si"){

            $("input[type='radio'][name='radioProyecto'][value='si']").prop('checked',true);

        }else if(data.validaProyecto=="no"){

            $("input[type='radio'][name='radioProyecto'][value='no']").prop('checked',true);

            $("#observacionNegativaProyecto").show();

            $("#observacionNegativaProyecto").val(data.estadoProyectoCarcado);
        }


        if (data.validaCurriculum=="si"){

            $("input[type='radio'][name='radioCurriculum'][value='si']").prop('checked',true);

        }else if(data.validaCurriculum=="no"){

            $("input[type='radio'][name='radioCurriculum'][value='no']").prop('checked',true);

            $("#observacionNegativaCurriculum").show();

            $("#observacionNegativaCurriculum").val(data.estadoCurriculumDeportivoSegundo);
        }


        if (data.radioInfraestructura=="si"){

            $("input[type='radio'][name='radioInfraestructura'][value='si']").prop('checked',true);

        }else if(data.radioInfraestructura=="no"){

            $("input[type='radio'][name='radioInfraestructura'][value='no']").prop('checked',true);

            $("#observacionNegativaProyectoInfras").show();

            $("#observacionNegativaProyectoInfras").val(data.observacionNegativaProyectoInfras);
        }

        
        if (data.certificadoTrayectoria=="si"){

            $("input[type='radio'][name='certificadoTrayectoria'][value='si']").prop('checked',true);

        }else if(data.certificadoTrayectoria=="no"){

            $("input[type='radio'][name='certificadoTrayectoria'][value='no']").prop('checked',true);

            $("#observacionCertificadoTrayectoria").show();

            $("#observacionCertificadoTrayectoria").val(data.observacionCertificadoTrayectoria);
        }


        
        if (data.certificadoPropiedadC=="si"){

            $("input[type='radio'][name='certificadoPropiedadC'][value='si']").prop('checked',true);

        }else if(data.certificadoPropiedadC=="no"){

            $("input[type='radio'][name='certificadoPropiedadC'][value='no']").prop('checked',true);

            $("#observacionNegativaCertificadoPropiedad").show();

            $("#observacionNegativaCertificadoPropiedad").val(data.observacionNegativaCertificadoPropiedad);
        }


        
        if (data.memoriaArquitectonica=="si"){

            $("input[type='radio'][name='memoriaArquitectonica'][value='si']").prop('checked',true);

        }else if(data.memoriaArquitectonica=="no"){

            $("input[type='radio'][name='memoriaArquitectonica'][value='no']").prop('checked',true);

            $("#observacionNegativaMemoriaArquitectonica").show();

            $("#observacionNegativaMemoriaArquitectonica").val(data.observacionNegativaMemoriaArquitectonica);
        }

        if (data.presupuestoRubroChecked=="si"){

            $("input[type='radio'][name='presupuestoRubroChecked'][value='si']").prop('checked',true);

        }else if(data.presupuestoRubroChecked=="no"){

            $("input[type='radio'][name='presupuestoRubroChecked'][value='no']").prop('checked',true);

            $("#observacionNegativaPresupuestoRubro").show();

            $("#observacionNegativaPresupuestoRubro").val(data.observacionNegativaPresupuestoRubro);
        }


        if (data.cronogramasValoradosChecked=="si"){

            $("input[type='radio'][name='cronogramasValoradosChecked'][value='si']").prop('checked',true);

        }else if(data.cronogramasValoradosChecked=="no"){

            $("input[type='radio'][name='cronogramasValoradosChecked'][value='no']").prop('checked',true);

            $("#observacionNegativaCronogramaValorado").show();

            $("#observacionNegativaCronogramaValorado").val(data.observacionNegativaCronogramaValorado);
        }

        if (data.respaldosDigitaChecked=="si"){

            $("input[type='radio'][name='respaldosDigitaChecked'][value='si']").prop('checked',true);

        }else if(data.respaldosDigitaChecked=="no"){

            $("input[type='radio'][name='respaldosDigitaChecked'][value='no']").prop('checked',true);

            $("#observacionNegativaRespaldosDigitales").show();

            $("#observacionNegativaRespaldosDigitales").val(data.observacionNegativaRespaldosDigitales);
        }


        if (data.radioComponentes=="si"){

            $("input[type='radio'][name='radioComponentes'][value='si']").prop('checked',true);

        }else if(data.radioComponentes=="no"){

            $("input[type='radio'][name='radioComponentes'][value='no']").prop('checked',true);

            $("#observacionComponentes").show();

            $("#observacionComponentes").val(data.observacionComponentes);
        }


      }
      
      /*=====  End of Observaciones editadas  ======*/
      
      if (data.califica=="A" || data.califica=="C") {

        $("#enviarCalificacion").hide();

        /*===========================================
        =            Marcando los radios            =
        ===========================================*/

        $("input[type='radio'][name='radioProyecto'][value='si']").prop('checked',true);
        $("#observacionNegativaProyecto").hide();

        $("input[type='radio'][name='radioComponentes'][value='si']").prop('checked',true);
        $("#observacionComponentes").hide();

        $("input[type='radio'][name='radioCurriculum'][value='si']").prop('checked',true);
        $("#observacionNegativaCurriculum").hide();

        $("input[type='radio'][name='radioVidaJuridica'][value='si']").prop('checked',true);
        $("#observacionNegativaVidaJuridica").hide();

        $("input[type='radio'][name='certificadoTrayectoria'][value='si']").prop('checked',true);
        $("#observacionCertificadoTrayectoria").hide();

        $(".radios__desabilitas").attr('disabled','disabled');


        /*=====  End of Marcando los radios  ======*/

        $("#calificarProyectoBoton").text("REVISAR DOCUMENTACIÓN");

      }


      /*==============================
      =            Enviar            =
      ==============================*/

      var validarMostrarModalesUnicos=function(parametro1,parametro2,parametro3){

        $(parametro1).change(function(e){


          switch (parametro3) {

            case 0:
              var variableSelectora=$('input:radio[name=radioProyecto]:checked').val();
            break;

            case 1:
              var variableSelectora=$('input:radio[name=radioCurriculum]:checked').val();
            break;

            case 2:
              var variableSelectora=$('input:radio[name=radioInfraestructura]:checked').val();
            break;

            case 3:
              var variableSelectora=$('input:radio[name=radioVidaJuridica]:checked').val();
            break;

            case 4:
              var variableSelectora=$('input:radio[name=certificadoTrayectoria]:checked').val();
            break;

            case 5:
              var variableSelectora=$('input:radio[name=certificadoPropiedadC]:checked').val();
            break;

            case 6:
              var variableSelectora=$('input:radio[name=memoriaArquitectonica]:checked').val();
            break;

            case 7:
              var variableSelectora=$('input:radio[name=presupuestoRubroChecked]:checked').val();
            break;

            case 8:
              var variableSelectora=$('input:radio[name=cronogramasValoradosChecked]:checked').val();
            break;

            case 9:
              var variableSelectora=$('input:radio[name=respaldosDigitaChecked]:checked').val();
            break;

            case 10:
              var variableSelectora=$('input:radio[name=radioComponentes]:checked').val();
            break;

          }


          if (variableSelectora=="no") {

             $(parametro2).show();

          }else{

             $(parametro2).hide();

          }

         

        });

      }

      validarMostrarModalesUnicos($('.radioProyecto'),$("#observacionNegativaProyecto"),0);

      validarMostrarModalesUnicos($('.radioCurriculum'),$("#observacionNegativaCurriculum"),1);

      validarMostrarModalesUnicos($('.radioInfraestructura'),$("#observacionNegativaProyectoInfras"),2);

      validarMostrarModalesUnicos($('.radioVidaJuridica'),$("#observacionNegativaVidaJuridica"),3);

      validarMostrarModalesUnicos($('.certificadoTrayectoria'),$("#observacionCertificadoTrayectoria"),4);

      validarMostrarModalesUnicos($('.certificadoPropiedadC'),$("#observacionNegativaCertificadoPropiedad"),5);

      validarMostrarModalesUnicos($('.memoriaArquitectonica'),$("#observacionNegativaMemoriaArquitectonica"),6);

      validarMostrarModalesUnicos($('.presupuestoRubroChecked'),$("#observacionNegativaPresupuestoRubro"),7);

      validarMostrarModalesUnicos($('.cronogramasValoradosChecked'),$("#observacionNegativaCronogramaValorado"),8);

      validarMostrarModalesUnicos($('.respaldosDigitaChecked'),$("#observacionNegativaRespaldosDigitales"),9);

       validarMostrarModalesUnicos($('.radioComponentes'),$("#observacionComponentes"),10);


      $('#enviarCalificacion').click(function (e){

        $('.enviarDatosGenerales__reload').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');


        var paqueteDeDatos = new FormData();

        $(this).hide();
      
        var radioProyecto=$('input:radio[name=radioProyecto]:checked').val();
        var radioCurriculum=$('input:radio[name=radioCurriculum]:checked').val();

        var radioInfraestructura=$('input:radio[name=radioInfraestructura]:checked').val();
        var radioVidaJuridica=$('input:radio[name=radioVidaJuridica]:checked').val();
        var certificadoTrayectoria=$('input:radio[name=certificadoTrayectoria]:checked').val();
        var certificadoPropiedadC=$('input:radio[name=certificadoPropiedadC]:checked').val();
        var memoriaArquitectonica=$('input:radio[name=memoriaArquitectonica]:checked').val();
        var presupuestoRubroChecked=$('input:radio[name=presupuestoRubroChecked]:checked').val();
        var cronogramasValoradosChecked=$('input:radio[name=cronogramasValoradosChecked]:checked').val();
        var respaldosDigitaChecked=$('input:radio[name=respaldosDigitaChecked]:checked').val();
        var radioComponentes=$('input:radio[name=radioComponentes]:checked').val();


        var contadorRadios=0;

        $("input:radio").each(function(index) {
          if($(this).is(':checked') && $(this).val()=="no") {
            contadorRadios++;
          } 
        });

        if (data.emailOrganismo!=null) {

           paqueteDeDatos.append('emailEnviado', data.emailOrganismo);
        }else{
          paqueteDeDatos.append('emailEnviado', data.emailDeportistas);
        }

        paqueteDeDatos.append('nombreProyecto', data.nombre);

        if (contadorRadios>0) {
          paqueteDeDatos.append('calificador', 'no');

        }else{
          paqueteDeDatos.append('calificador','si');
        }

        paqueteDeDatos.append('codigoReferenciado', data.codigo);
        paqueteDeDatos.append('modificacion', data.modificacion);

        paqueteDeDatos.append('radioProyecto', radioProyecto);
        paqueteDeDatos.append('radioCurriculum', radioCurriculum);

        paqueteDeDatos.append('radioInfraestructura', radioInfraestructura);
        paqueteDeDatos.append('radioVidaJuridica', radioVidaJuridica);
        paqueteDeDatos.append('certificadoTrayectoria', certificadoTrayectoria);
        paqueteDeDatos.append('certificadoPropiedadC', certificadoPropiedadC);
        paqueteDeDatos.append('memoriaArquitectonica', memoriaArquitectonica);
        paqueteDeDatos.append('presupuestoRubroChecked', presupuestoRubroChecked);
        paqueteDeDatos.append('cronogramasValoradosChecked', cronogramasValoradosChecked);
        paqueteDeDatos.append('respaldosDigitaChecked', respaldosDigitaChecked);

        paqueteDeDatos.append('radioComponentes', radioComponentes);
        paqueteDeDatos.append('observacionComponentes', $('#observacionComponentes').prop('value'));

        paqueteDeDatos.append('observacionNegativaProyecto', $('#observacionNegativaProyecto').prop('value'));
        paqueteDeDatos.append('observacionNegativaCurriculum', $('#observacionNegativaCurriculum').prop('value'));

        paqueteDeDatos.append('observacionNegativaProyectoInfras', $('#observacionNegativaProyectoInfras').prop('value'));
        paqueteDeDatos.append('observacionNegativaVidaJuridica', $('#observacionNegativaVidaJuridica').prop('value'));
        paqueteDeDatos.append('observacionCertificadoTrayectoria', $('#observacionCertificadoTrayectoria').prop('value'));
        paqueteDeDatos.append('observacionNegativaCertificadoPropiedad', $('#observacionNegativaCertificadoPropiedad').prop('value'));
        paqueteDeDatos.append('observacionNegativaMemoriaArquitectonica', $('#observacionNegativaMemoriaArquitectonica').prop('value'));
        paqueteDeDatos.append('observacionNegativaPresupuestoRubro', $('#observacionNegativaPresupuestoRubro').prop('value'));
        paqueteDeDatos.append('observacionNegativaCronogramaValorado', $('#observacionNegativaCronogramaValorado').prop('value'));
        paqueteDeDatos.append('observacionNegativaRespaldosDigitales', $('#observacionNegativaRespaldosDigitales').prop('value'));

       if (contadorRadios==0) {


          alertify.prompt( 'Recomendar', 'Ingrese observación de la recomendación en caso de ser necesario',''
           , function(evt, value) { 

            paqueteDeDatos.append('observacionRecomendacion', value);

            paqueteDeDatos.append('idUsuarioRelativo', data.idUsuarioRelativo);

            /*====================================
            =            Enviar datos            =
            ====================================*/
            
            var destino = "modelosBd/inserta/enviarCalificacion.md.php"; 

              $.ajax({

                 url: destino,
                 type: 'POST',
                 contentType: false,
                 data: paqueteDeDatos, 
                 processData: false,
                 cache: false, 

                 success: function(response){

                     var elementos=JSON.parse(response);
                     var mensaje=elementos['mensaje'];

                     if (mensaje==1) {

                         alertify.set("notifier","position", "top-right");
                        alertify.notify("Proceso realizado", "success", 5, function(){});

                        $('.enviarDatosGenerales__reload').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

                          window.setTimeout(function(){ 
                             location.reload();
                          } ,5000); 

                     }


                  },

                 error: function (){ 
                    
                 }

              });        
            
            /*=====  End of Enviar datos  ======*/  


           }, function() { alertify.error('Recomendación Cancelada');  $('#enviarCalificacion').show(); $('.enviarDatosGenerales__reload').html('');});

       }else{

          /*====================================
          =            Enviar datos            =
          ====================================*/
          
          var destino = "modelosBd/inserta/enviarCalificacion.md.php"; 

            $.ajax({

               url: destino,
               type: 'POST',
               contentType: false,
               data: paqueteDeDatos, 
               processData: false,
               cache: false, 

               success: function(response){

                 var elementos=JSON.parse(response);
                   var mensaje=elementos['mensaje'];

                   if (mensaje==1) {

                       alertify.set("notifier","position", "top-right");
                      alertify.notify("Proceso realizado", "success", 5, function(){});

                      $('.enviarDatosGenerales__reload').html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

                        window.setTimeout(function(){ 
                           location.reload();
                        } ,5000); 

                   }


                },

               error: function (){ 
                  
               }

            });        
          
          /*=====  End of Enviar datos  ======*/  

         }


      });

      /*=====  End of Enviar  ======*/
      
      /*===================================
      =            Seguimiento            =
      ===================================*/

      if(data.seguimiento=="P"){

        $(".fila__envio__informes").show();

        $(".fila__descalificar__proyecto__comentarios").hide();

        $("#informeFinales").attr('href','documentos/informeFinal/'+data.codigo+".pdf");

        /*=====================================================
        =            Realizar observaciones envios            =
        =====================================================*/

         $('#verEvidencias').click(function (e){   

          $(".body__evidencias__conjuntos").html(" ");  

            var paqueteDeDatos = new FormData();

             paqueteDeDatos.append('codigoProyectoRealizados', data.codigo);


            var destino="modelosBd/validaciones/comprobantesEvidencias.modelo.php";

            $.ajax({

              type:"POST",
              url: destino,
              type: 'POST',
              contentType: false,
              data: paqueteDeDatos, 
              processData: false,
              cache: false, 

              success:function(response){

                var elementos=JSON.parse(response);

                var stringevidencia=elementos['stringevidencia'];
                var stringidSeguimiento=elementos['stringidSeguimiento'];

                if(stringevidencia!=""){

                  var arraystringevidencia = stringevidencia.split('------');
                  var arraystringidSeguimiento = stringidSeguimiento.split('------');


                  for(var i=0; i<arraystringidSeguimiento.length;i++){

                    $(".body__evidencias__conjuntos").append('<div class="row__evidencias'+i+'"><div class="col col-4">Evidencia'+(i+1)+'</div><div class="col col-8"><a href="documentos/evidencias/'+arraystringevidencia[i]+'.pdf" target="_blank">'+arraystringevidencia[i]+'.pdf</a></div><br><br></div>');

                  }

                }

              }

            });  

          });
                        
        /*=====  End of Realizar observaciones envios  ======*/      

        /*=====================================
        =            Nuevos radios            =
        =====================================*/
        
        if (data.informesNeg=="si" || data.informesNeg=="no") {

          if (data.informesNeg=="si"){

              $("input[type='radio'][name='informarProyectos'][value='si']").prop('checked',true);

          }else if(data.informesNeg=="no"){

              $("input[type='radio'][name='informarProyectos'][value='no']").prop('checked',true);

              $("#comentarioNegativosInformes").show();

              $("#comentarioNegativosInformes").val(data.observacionInformes);
          }

        }


      $('#entiarInformesDdosRecomendados').click(function (e){

        e.preventDefault();    

        var paqueteDeDatos = new FormData();


        $('#entiarInformesDdosRecomendados').hide();

        $(".reload__observaciones").html('<img src="images/reloadGit.webp" style="width:50px; height:50px; border-radius:1em;">');

        var radioCalificasContrato=$('input:radio[name=informarProyectos]:checked').val();


        if (radioCalificasContrato==undefined) {

          alertify.set("notifier","position", "top-right");
          alertify.notify("Es obligatorio ingresar una opción de calificación", "error", 5, function(){});

          $('#entiarInformesDdosRecomendados').show();

          $(".reload__observaciones").html('');

        }else if(radioCalificasContrato=="no" && $('#comentarioNegativosInformes').val()==""){

          alertify.set("notifier","position", "top-right");
          alertify.notify("Es obligatorio ingresar la observación", "error", 5, function(){});

          $('#enviarCalificarContrato').show();

          $(".reload__observaciones").html('');

        }else{

          paqueteDeDatos.append('radioCalificasContrato', radioCalificasContrato);
          paqueteDeDatos.append('comentarioNegativo', $('#comentarioNegativosInformes').prop('value'));
          paqueteDeDatos.append('codigoCertificados',data.codigo);
          paqueteDeDatos.append('nombreProyectos',data.nombre);
          paqueteDeDatos.append('idUsuarioRelativo',data.idUsuarioRelativo);

          if (data.emailOrganismo!=null) {

             paqueteDeDatos.append('emailEnviado', data.emailOrganismo);

          }else{

            paqueteDeDatos.append('emailEnviado', data.emailDeportistas);

          }

          /*====================================
          =            Enviar Datos            =
          ====================================*/
          
          var destino = "modelosBd/actualiza/actualizaObservacionInforme.md.php"; 

          $.ajax({

            url: destino,
            type: 'POST',
            contentType: false,
            data: paqueteDeDatos, 
            processData: false,
            cache: false, 

            success: function(response){

              var elementos=JSON.parse(response);
              var mensaje=elementos['mensaje'];


              if (mensaje==1) {

                alertify.set("notifier","position", "top-right");
                alertify.notify("Se realizó correctamente el registro", "success", 5, function(){});

                window.setTimeout(function(){ 

                  location.reload();

                } ,4000);     

              }      

            },

            error: function (){ 
                
            }

          });        
                
          
          /*=====  End of Enviar Datos  ======*/    

        }

        

      });        
        
        /*=====  End of Nuevos radios  ======*/
        



      }
      
      /*=====  End of Seguimiento  ======*/
      
      /*==============================================
      =            certificas recomiendas            =
      ==============================================*/
      
      if (data.certifica=='C' && data.calificaCertificado=='si') {

        $(".certificar__enviados__dados").hide();

      }
      
      /*=====  End of certificas recomiendas  ======*/
      

      if (data.seguimientoEnviados=="D") {

        $(".informes__realizados__enviados").hide();

      }

   });

}

/*=====  End of Observaciones Director  ======*/






/*=====  End of Tabla Funcionarios  ======*/

/*==============================================
=            Tabla reportería final            =
==============================================*/

$(document).on("ready",function(){

  listarProyectosDefinitivos();

});


var listarProyectosDefinitivos=function(){

   var tableProyectosDefinitivos =$(".tabla__definitivos").DataTable({

          "language": 
        {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "No existen datos",
        "oPaginate": 
        {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
          },
          "oAria": 
          {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      },


     /*==================================
    =            Exportador            =
    ==================================*/
    
     dom: 'Bfrtip',

     buttons: {

        dom:{
            container:{
              tag:'div',
              className:'flexcontent__administrador'
            },
            buttonLiner: {
              tag: null
            }
        },

        buttons: [

              {
                        extend:    'print',
                        text:      '<i class="fa fa-print"></i>Imprimir',
                        title:'Listado',
                        titleAttr: 'Imprimir',
                        className: 'export imprimir',
              },


              {
                        extend:    'excelHtml5',
                        text:      '<i class="fa fa-file-excel-o"></i>Excel',
                        title:'Listado',
                        titleAttr: 'Excel',
                        className: 'export excel',
              },

              {
                        extend:    'pdfHtml5',
                        text:      '<i class="fa fa-file-pdf-o"></i>PDF',
                        title:'Listado',
                        titleAttr: 'PDF',
                        className: 'export pdf',


                }

        ]



      },
  
  /*=====  End of Exportador  ======*/
     
 
      "pagingType": "full_numbers",
      "sScrollY": "400px",
      "Paginate": true,
      "scrollX": true,
      "pagingType": "full_numbers",
      "ajax":{
      "method":"POST",
      "url":"modelosBd/datatablets/reporDefinitivos.php", 
      "data": { 
          "fisicamenteEstructura": $("#fisicamenteEstructura").val()
       }     
      },
      "columns":[

      
            {"render":

                function ( data, type, row ) {

                    if (row['idRol']==2) {

                      return "<div style='font-size:10px'>Organismo Deportivo</div>";

                    }else{

                      return "<div style='font-size:10px'>Deportista</div>";

                    }

                    

                }

            },

 
            {"render":

                function ( data, type, row ) {

                    if (row['tipoDeportistas']=="alto") {

                      var tipoDeportistas="Alto Rendimiento";

                    }else if(row['tipoDeportistas']=="alto2"){

                      var tipoDeportistas="Alto Rendimiento para personas con discpacidad";

                    }else{

                      var tipoDeportistas=row['tipoDeportistas'];

                    }

                    return "<div style='font-size:10px'>"+tipoDeportistas+"</div>";

                }

            },

            {"render":

                function ( data, type, row ) {


                  if (row['nombreOrganismo']!=null) {

                     return "<div style='font-size:10px'>"+row['nombreOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['nombreDeportistas']+"</div>";

                  }
                   
                }

            },

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['nombre']+"</div>";

                }

            },

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['monto']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['alcanse']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {

                    return "<div style='font-size:10px'>"+row['codigo']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {

                   if(row['proyectoCargadoPdf']==""){

                     var variableConcatenadoras="<div style='font-size:10px'>Documento no requerido</div>";

                   }else{

                     var variableConcatenadoras="<a style='font-size:10px' href='documentos/proyectos/"+row['proyectoCargadoPdf']+".pdf' target='_blank'>"+row['proyectoCargadoPdf']+".pdf</a>";

                   }

                  if (row['estadoProyectoCarcado']==null) {

                    return variableConcatenadoras+"<br><div style='font-size:10px; color:red; font-weight:bold;'></div>";

                  }
          
                }

            },

            {"render":

                function ( data, type, row ) {

                  if (row['tipoDeportistas']=="noFederado") {

                     if(row['curriculumDeportivoSegundo']==""){

                       var variableConcatenadoras="<div style='font-size:10px'>Documento no requerido</div>";

                     }else{

                       var variableConcatenadoras="<a style='font-size:10px' href='documentos/curriculum/"+row['curriculumDeportivoSegundo']+".pdf' target='_blank'>"+row['curriculumDeportivoSegundo']+".pdf</a>";

                     }


                    if (row['estadoCurriculumDeportivoSegundo']==null) {

                      return variableConcatenadoras+"<br><div style='font-size:10px; color:red; font-weight:bold;'></div>";

                    }


                  }else{

                    return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                  }

          
                }

            },


            {"render":

                function ( data, type, row ) {

                  if (row['idRol']==3) {

                    if (row['tipoDeportistas']!="noFederado") {

                 
                       if(row['certificadoFederacionPdf']==""){

                         var variableConcatenadoras="<div style='font-size:10px'>Documento no requerido</div>";

                       }else{

                         var variableConcatenadoras="<a style='font-size:10px' href='documentos/certificadoDeportista/"+row['certificadoFederacionPdf']+".pdf' target='_blank'>"+row['certificadoFederacionPdf']+".pdf</a>";

                       }


                      if (row['estadoCertificadoFederacion']==null) {

                        return variableConcatenadoras+"<br><div style='font-size:10px; color:red; font-weight:bold;'></div>";

                      }


                    }else{

                      return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                    }


                  }else{

                    return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                  }

          
                }

            },

            {"render":

                function ( data, type, row ) {

                  if (row['idRol']==3) {

                    if (row['tipoDeportistas']!="noFederado") {

                       if(row['certificadoOrganismoSuperiorPdf']==""){

                         var variableConcatenadoras="<div style='font-size:10px'>Documento no requerido</div>";

                       }else{

                         var variableConcatenadoras="<a style='font-size:10px' href='documentos/certificadoSuperior/"+row['certificadoOrganismoSuperiorPdf']+".pdf' target='_blank'>"+row['certificadoOrganismoSuperiorPdf']+".pdf</a>";

                       }


                      if (row['estadoCertificadoOrganismoSuperior']==null) {

                        return variableConcatenadoras+"<br><div style='font-size:10px; color:red; font-weight:bold;'></div>";

                      }


                    }else{

                      return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                    }


                  }else{

                    return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                  }

          
                }

            },

            {"render":

                function ( data, type, row ) {

                  if (row['idRol']==3) {

                    if (row['tipoDeportistas']!="noFederado") {
               
                       if(row['solicitudFederacionPdf']==""){

                         var variableConcatenadoras="<div style='font-size:10px'>Documento no requerido</div>";

                       }else{

                         var variableConcatenadoras="<a style='font-size:10px' href='documentos/solicitudCertificado/"+row['solicitudFederacionPdf']+".pdf' target='_blank'>"+row['solicitudFederacionPdf']+".pdf</a>";

                       }

                      if (row['estadoSolicitudFederacion']==null) {

                        return variableConcatenadoras+"<br><div style='font-size:10px; color:red; font-weight:bold;'></div>";

                      }


                    }else{

                      return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                    }


                  }else{

                    return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                  }

          
                }

            },



            {"render":

                function ( data, type, row ) {


                 if (row['tipoDeportistas']!="noFederado") {

                     if(row['avalFederacionPdf']==""){

                       var variableConcatenadoras="<div style='font-size:10px'>Documento no requerido</div>";

                     }else{

                       var variableConcatenadoras="<a style='font-size:10px' href='documentos/avalFederacion/"+row['avalFederacionPdf']+".pdf' target='_blank'>"+row['avalFederacionPdf']+".pdf</a>";

                     }

                    if (row['estadoAvalFederacion']==null) {

                        return variableConcatenadoras+"<br><div style='font-size:10px; color:red; font-weight:bold;'></div>";

                    }


                 }else{

                    return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                 }


                }

            },


            {"render":

                function ( data, type, row ) {


                 if (row['tipoDeportistas']!="noFederado") {

            
                     if(row['solciitudAvalPdf']==""){

                       var variableConcatenadoras="<div style='font-size:10px'>Documento no requerido</div>";

                     }else{

                       var variableConcatenadoras="<a style='font-size:10px' href='documentos/solicitudAval/"+row['solciitudAvalPdf']+".pdf' target='_blank'>"+row['solciitudAvalPdf']+".pdf</a>";

                     }


                     if (row['estadoSolicitudAval']==null) {

                        return variableConcatenadoras+"<br><div style='font-size:10px; color:red; font-weight:bold;'></div>";

                      }


                 }else{

                    return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                 }


                }

            },



            {"render":

                function ( data, type, row ) {


                 if (row['tipoDeportistas']!="noFederado") {

                     if(row['avalOrganismoSuperiorPdf']==""){

                       var variableConcatenadoras="<div style='font-size:10px'>Documento no requerido</div>";

                     }else{

                       var variableConcatenadoras="<a style='font-size:10px' href='documentos/avalOrganismoSuperior/"+row['avalOrganismoSuperiorPdf']+".pdf' target='_blank'>"+row['avalOrganismoSuperiorPdf']+".pdf</a>";

                     }

                      if (row['estadoAvalOrganismoSuperior']==null) {

                        return variableConcatenadoras+"<br><div style='font-size:10px; color:red; font-weight:bold;'></div>";

                      }


                 }else{

                    return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                 }


                }

            },

            {"render":

                function ( data, type, row ) {

                  if(row['califica']=='N' || row['certifica']=='N'){

                    return "<div style='font-size:10px'>NEGADO<br><span style='color:blue;font-weight:bold;'>"+row["nombreFuncionarios"]+" "+row["apellido"]+"</span></div>";

                  }else{

                   return "<div style='font-size:10px'>TRAMITADO<br><span style='color:blue;font-weight:bold;'>"+row["nombreFuncionarios"]+" "+row["apellido"]+"</span></div>";

                  }            
                    
                }

            }


     ]

 });

}


/*=====  End of Tabla reportería final  ======*/

/*==========================================
=            Reportería negados            =
==========================================*/

$(document).on("ready",function(){

  listarProyectosDefinitivosNegados();

});


var listarProyectosDefinitivosNegados=function(){

   var tableProyectosDefinitivosNegados =$(".tabla__definitivos__negados").DataTable({

          "language": 
        {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "No existen datos",
        "oPaginate": 
        {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
          },
          "oAria": 
          {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      },
 
    /*==================================
    =            Exportador            =
    ==================================*/
    
     dom: 'Bfrtip',

     buttons: {

        dom:{
            container:{
              tag:'div',
              className:'flexcontent__administrador'
            },
            buttonLiner: {
              tag: null
            }
        },

        buttons: [

              {
                        extend:    'print',
                        text:      '<i class="fa fa-print"></i>Imprimir',
                        title:'Listado',
                        titleAttr: 'Imprimir',
                        className: 'export imprimir',
              },


              {
                        extend:    'excelHtml5',
                        text:      '<i class="fa fa-file-excel-o"></i>Excel',
                        title:'Listado',
                        titleAttr: 'Excel',
                        className: 'export excel',
              },

              {
                        extend:    'pdfHtml5',
                        text:      '<i class="fa fa-file-pdf-o"></i>PDF',
                        title:'Listado',
                        titleAttr: 'PDF',
                        className: 'export pdf',


                }

        ]



      },
  
  /*=====  End of Exportador  ======*/


 
      "pagingType": "full_numbers",
      "sScrollY": "400px",
      "Paginate": true,
      "scrollX": true,
      "pagingType": "full_numbers",
      "ajax":{
      "method":"POST",
      "url":"modelosBd/datatablets/reporDefinitivosNegados.php", 
      "data": { 
          "fisicamenteEstructura": $("#fisicamenteEstructura").val()
       }     
      },
      "columns":[

      
            {"render":

                function ( data, type, row ) {

                    if (row['idRol']==2) {

                      return "<div style='font-size:10px'>Organismo Deportivo</div>";

                    }else{

                      return "<div style='font-size:10px'>Deportista</div>";

                    }

                    

                }

            },

 
            {"render":

                function ( data, type, row ) {

                    if (row['tipoDeportistas']=="alto") {

                      var tipoDeportistas="Alto Rendimiento";

                    }else if(row['tipoDeportistas']=="alto2"){

                      var tipoDeportistas="Alto Rendimiento para personas con discpacidad";

                    }else{

                      var tipoDeportistas=row['tipoDeportistas'];

                    }

                    return "<div style='font-size:10px'>"+tipoDeportistas+"</div>";

                }

            },

            {"render":

                function ( data, type, row ) {


                  if (row['nombreOrganismo']!=null) {

                     return "<div style='font-size:10px'>"+row['nombreOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['nombreDeportistas']+"</div>";

                  }
                   
                }

            },

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['nombre']+"</div>";

                }

            },

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['monto']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:10px'>"+row['alcanse']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {

                    return "<div style='font-size:10px'>"+row['codigo']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {

                   if(row['proyectoCargadoPdf']==""){

                     var variableConcatenadoras="<div style='font-size:10px'>Documento no requerido</div>";

                   }else{

                     var variableConcatenadoras="<a style='font-size:10px' href='documentos/proyectos/"+row['proyectoCargadoPdf']+".pdf' target='_blank'>"+row['proyectoCargadoPdf']+".pdf</a>";

                   }

                  if (row['estadoProyectoCarcado']==null) {

                    return variableConcatenadoras+"<br><div style='font-size:10px; color:red; font-weight:bold;'></div>";

                  }
          
                }

            },

            {"render":

                function ( data, type, row ) {

                  if (row['tipoDeportistas']=="noFederado") {

                     if(row['curriculumDeportivoSegundo']==""){

                       var variableConcatenadoras="<div style='font-size:10px'>Documento no requerido</div>";

                     }else{

                       var variableConcatenadoras="<a style='font-size:10px' href='documentos/curriculum/"+row['curriculumDeportivoSegundo']+".pdf' target='_blank'>"+row['curriculumDeportivoSegundo']+".pdf</a>";

                     }


                    if (row['estadoCurriculumDeportivoSegundo']==null) {

                      return variableConcatenadoras+"<br><div style='font-size:10px; color:red; font-weight:bold;'></div>";

                    }


                  }else{

                    return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                  }

          
                }

            },


            {"render":

                function ( data, type, row ) {

                  if (row['idRol']==3) {

                    if (row['tipoDeportistas']!="noFederado") {

                 
                       if(row['certificadoFederacionPdf']==""){

                         var variableConcatenadoras="<div style='font-size:10px'>Documento no requerido</div>";

                       }else{

                         var variableConcatenadoras="<a style='font-size:10px' href='documentos/certificadoDeportista/"+row['certificadoFederacionPdf']+".pdf' target='_blank'>"+row['certificadoFederacionPdf']+".pdf</a>";

                       }


                      if (row['estadoCertificadoFederacion']==null) {

                        return variableConcatenadoras+"<br><div style='font-size:10px; color:red; font-weight:bold;'></div>";

                      }


                    }else{

                      return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                    }


                  }else{

                    return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                  }

          
                }

            },

            {"render":

                function ( data, type, row ) {

                  if (row['idRol']==3) {

                    if (row['tipoDeportistas']!="noFederado") {

                       if(row['certificadoOrganismoSuperiorPdf']==""){

                         var variableConcatenadoras="<div style='font-size:10px'>Documento no requerido</div>";

                       }else{

                         var variableConcatenadoras="<a style='font-size:10px' href='documentos/certificadoSuperior/"+row['certificadoOrganismoSuperiorPdf']+".pdf' target='_blank'>"+row['certificadoOrganismoSuperiorPdf']+".pdf</a>";

                       }


                      if (row['estadoCertificadoOrganismoSuperior']==null) {

                        return variableConcatenadoras+"<br><div style='font-size:10px; color:red; font-weight:bold;'></div>";

                      }


                    }else{

                      return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                    }


                  }else{

                    return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                  }

          
                }

            },

            {"render":

                function ( data, type, row ) {

                  if (row['idRol']==3) {

                    if (row['tipoDeportistas']!="noFederado") {
               
                       if(row['solicitudFederacionPdf']==""){

                         var variableConcatenadoras="<div style='font-size:10px'>Documento no requerido</div>";

                       }else{

                         var variableConcatenadoras="<a style='font-size:10px' href='documentos/solicitudCertificado/"+row['solicitudFederacionPdf']+".pdf' target='_blank'>"+row['solicitudFederacionPdf']+".pdf</a>";

                       }

                      if (row['estadoSolicitudFederacion']==null) {

                        return variableConcatenadoras+"<br><div style='font-size:10px; color:red; font-weight:bold;'></div>";

                      }


                    }else{

                      return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                    }


                  }else{

                    return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                  }

          
                }

            },



            {"render":

                function ( data, type, row ) {


                 if (row['tipoDeportistas']!="noFederado") {

                     if(row['avalFederacionPdf']==""){

                       var variableConcatenadoras="<div style='font-size:10px'>Documento no requerido</div>";

                     }else{

                       var variableConcatenadoras="<a style='font-size:10px' href='documentos/avalFederacion/"+row['avalFederacionPdf']+".pdf' target='_blank'>"+row['avalFederacionPdf']+".pdf</a>";

                     }

                    if (row['estadoAvalFederacion']==null) {

                        return variableConcatenadoras+"<br><div style='font-size:10px; color:red; font-weight:bold;'></div>";

                    }


                 }else{

                    return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                 }


                }

            },


            {"render":

                function ( data, type, row ) {


                 if (row['tipoDeportistas']!="noFederado") {

            
                     if(row['solciitudAvalPdf']==""){

                       var variableConcatenadoras="<div style='font-size:10px'>Documento no requerido</div>";

                     }else{

                       var variableConcatenadoras="<a style='font-size:10px' href='documentos/solicitudAval/"+row['solciitudAvalPdf']+".pdf' target='_blank'>"+row['solciitudAvalPdf']+".pdf</a>";

                     }


                     if (row['estadoSolicitudAval']==null) {

                        return variableConcatenadoras+"<br><div style='font-size:10px; color:red; font-weight:bold;'></div>";

                      }


                 }else{

                    return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                 }


                }

            },



            {"render":

                function ( data, type, row ) {


                 if (row['tipoDeportistas']!="noFederado") {

                     if(row['avalOrganismoSuperiorPdf']==""){

                       var variableConcatenadoras="<div style='font-size:10px'>Documento no requerido</div>";

                     }else{

                       var variableConcatenadoras="<a style='font-size:10px' href='documentos/avalOrganismoSuperior/"+row['avalOrganismoSuperiorPdf']+".pdf' target='_blank'>"+row['avalOrganismoSuperiorPdf']+".pdf</a>";

                     }

                      if (row['estadoAvalOrganismoSuperior']==null) {

                        return variableConcatenadoras+"<br><div style='font-size:10px; color:red; font-weight:bold;'></div>";

                      }


                 }else{

                    return "<br><div style='font-size:10px; color:red; font-weight:bold;'>Documento no requerido</div>";

                 }


                }

            },

            {"render":

                function ( data, type, row ) {

                  if(row['califica']=='N' || row['certifica']=='N'){

                    return "<div style='font-size:10px'>NEGADO<br><span style='color:blue;font-weight:bold;'>"+row["nombreFuncionarios"]+" "+row["apellido"]+"</span><br>se nego por:"+row["observacionNiega"]+"</div>";

                  }else{

                   return "<div style='font-size:10px'>TRAMITADO<br><span style='color:blue;font-weight:bold;'>"+row["nombreFuncionarios"]+" "+row["apellido"]+"</span></div>";

                  }            
                    
                }

            }


     ]

 });

}


/*=====  End of Reportería negados  ======*/

/*===================================
=            Deportistas            =
===================================*/


$(document).on("ready",function(){

        $('#tablaDeportistas tfoot th').each( function () {

          var title = $("#tablaDeportistas tfoot th").eq($(this).index()).text();

            
            if (title=="Editar") {

              $(this).html('');

            }else{ 

              $(this).html('<input class="columna__tabla" type="text" placeholder="Buscar por '+title+'"/>');

            }
 
        });  

  listarAdminDeportistas();

});


var listarAdminDeportistas=function(){

   var tableDeportistas =$("#tablaDeportistas").DataTable({

          "language": 
        {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "No existen datos",
        "oPaginate": 
        {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
          },
          "oAria": 
          {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      },
    /*==================================
    =            Exportador            =
    ==================================*/
    
     dom: 'Bfrtip',

     buttons: {

        dom:{
            container:{
              tag:'div',
              className:'flexcontent__administrador'
            },
            buttonLiner: {
              tag: null
            }
        },

        buttons: [

              {
                        extend:    'print',
                        text:      '<i class="fa fa-print"></i>Imprimir',
                        title:'Listado',
                        titleAttr: 'Imprimir',
                        className: 'export imprimir',
              },


              {
                        extend:    'excelHtml5',
                        text:      '<i class="fa fa-file-excel-o"></i>Excel',
                        title:'Listado',
                        titleAttr: 'Excel',
                        className: 'export excel',
              },

              {
                        extend:    'pdfHtml5',
                        text:      '<i class="fa fa-file-pdf-o"></i>PDF',
                        title:'Listado',
                        titleAttr: 'PDF',
                        className: 'export pdf',


                }

        ]



      },
  
  /*=====  End of Exportador  ======*/

      "pagingType": "full_numbers",
      "sScrollY": "400px",
      "Paginate": true,
      "scrollX": true,
      "pagingType": "full_numbers",
      "ajax":{
        "method":"POST",
        "url":"modelosBd/datatablets/reporDeportistas.php"  
      },
      "columns":[

            {"render":

                function ( data, type, row ) {

                    return "<div style='font-size:10px'>"+row['tipoOrganismo']+"</div>";
                    
                }

            },

           {"render":

                function ( data, type, row ) {

                    return "<div style='font-size:10px'>"+row['cedulaUsuario']+"</div>";
                    
                }

            },

           {"render":

                function ( data, type, row ) {

                    return "<div style='font-size:10px'>"+row['nombreCompleto']+"</div>";
                    
                }

            },

           {"render":

                function ( data, type, row ) {

                    return "<div style='font-size:10px'>"+row['sexo']+"</div>";
                    
                }

            },

           {"render":

                function ( data, type, row ) {

                    return "<div style='font-size:10px'>"+row['nombreProvincia']+"</div>";
                    
                }

            },

           {"render":

                function ( data, type, row ) {

                    return "<div style='font-size:10px'>"+row['nombreCanton']+"</div>";
                    
                }

            },


           {"render":

                function ( data, type, row ) {

                    return "<div style='font-size:10px'>"+row['nombreParroquia']+"</div>";
                    
                }

            },

           {"render":

                function ( data, type, row ) {

                    return "<div style='font-size:10px'>"+row['telefono']+"</div>";
                    
                }

            },

           {"render":

                function ( data, type, row ) {

                    return "<div style='font-size:10px'>"+row['direccion']+"</div>";
                    
                }

           },


           {"render":

                function ( data, type, row ) {

                    return "<div style='font-size:10px'>"+row['email']+"</div>";
                    
                }

           }                     


     ]

 });

            /*===============================================================
            =            Realizar las busquedas por cada columna            =
            ===============================================================*/
              tableDeportistas.columns().every(function(){
                    
                    var datatableColumn = this;

                    var serachTetBoxes=$(this.footer()).find('input');
                  
                    serachTetBoxes.on('keyup change',function(){

                      datatableColumn.search(this.value).draw();

                    });

                    serachTetBoxes.on('click', function (e){

                      e.stopPropagation();

                    });
              });

            /*=====  End of Realizar las busquedas por cada columna  ======*/



}


/*=====  End of Deportistas  ======*/

/*=============================================
=            Organismos deportivos            =
=============================================*/


$(document).on("ready",function(){

  listarOrganismosDeportivos();

});


var listarOrganismosDeportivos=function(){

   var tableOrganismos =$("#tablaOrganismos").DataTable({

          "language": 
        {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "No existen datos",
        "oPaginate": 
        {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
          },
          "oAria": 
          {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      },
 
    /*==================================
    =            Exportador            =
    ==================================*/
    
     dom: 'Bfrtip',

     buttons: {

        dom:{
            container:{
              tag:'div',
              className:'flexcontent__administrador'
            },
            buttonLiner: {
              tag: null
            }
        },

        buttons: [

              {
                        extend:    'print',
                        text:      '<i class="fa fa-print"></i>Imprimir',
                        title:'Listado',
                        titleAttr: 'Imprimir',
                        className: 'export imprimir',
              },


              {
                        extend:    'excelHtml5',
                        text:      '<i class="fa fa-file-excel-o"></i>Excel',
                        title:'Listado',
                        titleAttr: 'Excel',
                        className: 'export excel',
              },

              {
                        extend:    'pdfHtml5',
                        text:      '<i class="fa fa-file-pdf-o"></i>PDF',
                        title:'Listado',
                        titleAttr: 'PDF',
                        className: 'export pdf',


                }

        ]



      },
  
  /*=====  End of Exportador  ======*/

      "pagingType": "full_numbers",
      "sScrollY": "400px",
      "Paginate": true,
      "scrollX": true,
      "pagingType": "full_numbers",
      "ajax":{
        "method":"POST",
        "url":"modelosBd/datatablets/reporOrganismos.php"  
      },
      "columns":[

            {"render":

                function ( data, type, row ) {

                    return "<div style='font-size:10px'>"+row['tipoOrganismo']+"</div>";
                    
                }

            },

           {"render":

                function ( data, type, row ) {

                    return "<div style='font-size:10px'>"+row['rucOrganismo']+"</div>";
                    
                }

            },

           {"render":

                function ( data, type, row ) {

                    return "<div style='font-size:10px'>"+row['nombreOrganismo']+"</div>";
                    
                }

            },


           {"render":

                function ( data, type, row ) {

                    return "<div style='font-size:10px'>"+row['provincias']+"</div>";
                    
                }

            },

           {"render":

                function ( data, type, row ) {

                    return "<div style='font-size:10px'>"+row['canton']+"</div>";
                    
                }

            },


           {"render":

                function ( data, type, row ) {

                    return "<div style='font-size:10px'>"+row['parroquia']+"</div>";
                    
                }

            },

           {"render":

                function ( data, type, row ) {

                    return "<div style='font-size:10px'>"+row['telefono']+"</div>";
                    
                }

            },

           {"render":

                function ( data, type, row ) {

                    return "<div style='font-size:10px'>"+row['direccion']+"</div>";
                    
                }

           },

  
           {"render":

                function ( data, type, row ) {

                    return "<div style='font-size:10px'>"+row['email']+"</div>";
                    
                }

           }                     


     ]

 });

}

/*=====  End of Organismos deportivos  ======*/

/*========================================
=            Proyectos tablas            =
========================================*/

$(document).on("ready",function(){

  listarProyectosTablas();

});


var listarProyectosTablas=function(){

  var tableProyectos =$("#tablaProyectos").DataTable({

          "language": 
        {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "No existen datos",
        "oPaginate": 
        {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
          },
          "oAria": 
          {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      },
 
      "pagingType": "full_numbers",
      "sScrollY": "400px",
      "Paginate": true,
      "scrollX": true,
      "pagingType": "full_numbers",
      "ajax":{
      "method":"POST",
      "url":"modelosBd/datatablets/reporProyectosTotalesReporterias.php", 
      "data": { 
          "idUsuario": $("#idUsuario").val()
       }     
      },
      "order": [[7, "desc" ]],
      "columns":[

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:8px'>"+row['codigo']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {


                  if (row['nombreOrganismo']!=null) {

                     return "<div style='font-size:8px'>"+row['nombreOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:8px'>"+row['nombreDeportistas']+"</div>";

                  }
                   
                }

            },

            {"render":

                function ( data, type, row ) {

                  if (row['rucOrganismo']!=null) {

                     return "<div style='font-size:10px'>"+row['rucOrganismo']+"</div>";

                  }else{

                    return "<div style='font-size:10px'>"+row['cedulaUsuario']+"</div>";

                  }

                }

            },

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:8px'>"+row['nombre']+"</div>";

                }

            },
 
            {"render":

                function ( data, type, row ) {

                   
                    if (row['tipoDeportistas']=="alto") {

                      var tipoDeportistas="Alto Rendimiento";

                    }else if(row['tipoDeportistas']=="alto2"){

                      var tipoDeportistas="Alto Rendimiento para personas con discpacidad";

                    }else if(row["siRespuestas"]=="si"){

                       var tipoDeportistas="Infraestructura";

                    }else{

                      var tipoDeportistas=row['tipoDeportistas'];

                    }

                    return "<div style='font-size:10px'>"+tipoDeportistas+"</div>";

                }

            },

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:8px'>"+row['monto']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {

                  if (row['fechaCalifica']==null) {
                    return "<div style='font-size:8px'>N/A</div>";
                  }else{
                    return "<div style='font-size:8px'>"+row['fechaCalifica']+"</div>";
                  }

                  
          
                }

            },


            {"render":

                function ( data, type, row ) {

                  if (row['fechaCertifica']==null) {
                    return "<div style='font-size:8px'>N/A</div>";
                  }else{
                    return "<div style='font-size:8px'>"+row['fechaCertifica']+"</div>";
                  }

                  
          
                }

            },

            {"render":

                function ( data, type, row ) {


                  if(row['certifica']=='A'  && row['idUsuarioRelativo']==$("#idUsuario").val()){

                      return "<div style='font-size:8px'>CERTIFICADO</div>";

                   }else if(row['certifica']=='S' && row['idUsuarioRelativo']==$("#idUsuario").val()){

                      return "<div style='font-size:8px'>RECOMENDADO</div>";

                   }else if(row['certificaEnvio']=='no' && row['idUsuarioRelativo']==$("#idUsuario").val() && row['certifica']!='no'){

                      return "<div style='font-size:8px'>DESCALIFICADO</div>";

                   }else if(row['certifica']=='C' && row['idUsuarioRelativo']==$("#idUsuario").val()){

                      return "<div style='font-size:8px'>RECOMENDADO</div>";

                    }else if(row['certifica']=='si' && row['idUsuarioRelativo']==$("#idUsuario").val()){

                      return "<div style='font-size:8px'>RECTIFICADO</div>";

                    }else if(row['certifica']=='no' && row['idUsuarioRelativo']==$("#idUsuario").val()){

                      return "<div style='font-size:8px'>EN OBSERVACIÓN</div>";

                    }else if (row['califica']=='A') {

                      return "<div style='font-size:8px'>CALIFICADO</div>";

                    }else if(row['califica']=='A' && row['certifica']=='A'){

                      return "<div style='font-size:8px'>CERTIFICADO</div>";

                    }else if(row['califica']=='R' && row["calificarDevuelto"]!="no" && row["rectificacion"]!="SI"){

                      return "<div style='font-size:8px'>DESCALIFICADO</div>";

                    }else if(row['califica']=='C' || row['califica']=='S' || row['califica']=='O'){

                      return "<div style='font-size:8px'>RECOMENDADO</div>";

                    }else if(row["rectificacion"]=="SI"){

                      return "<div style='font-size:8px'>RECTIFICADO</div>";

                    }else if(row["calificarDevuelto"]=="no"){

                      return "<div style='font-size:8px'>EN OBSERVACIÓN</div>";

                    }else{

                      return "<div style='font-size:8px'>EJECUCIÓN</div>";

                    }

                }

            },

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:8px'>"+row['fecha']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {

                  return "<center><button class='consultar__documentos__admins btn' data-toggle='modal' data-target='#visualizarDocumentosPrincipalAdmin'><i class='fas fa-file-pdf' style='font-size:40px;''></i></button><center>";
                }

            }

     ]    

  });

  obtener__documentos__admin("#tablaProyectos tbody",tableProyectos);

}

var obtener__documentos__admin=function(tbody,table){

   $(tbody).on("click","button.consultar__documentos__admins",function(e){

     var data=table.row($(this).parents("tr")).data();

     $(".oculto__1").hide();
     $(".oculto__2").hide();
     $(".oculto__3").hide();
     $(".oculto__4").hide();
     $(".oculto__5").hide();
     $(".oculto__6").hide();
     $(".oculto__7").hide();
     $(".oculto__8").hide();

     $("#proyectoVista").attr('href','documentos/proyectos/'+data.proyectoCargadoPdf+'.pdf');

     if (data.proyectoCargadoInfrasPdf!="" && data.proyectoCargadoInfrasPdf!=null) {
       $("#proyectoInfraestructura").attr('href','documentos/proyectosInfraestructura/'+data.proyectoCargadoInfrasPdf+'.pdf');
       $(".oculto__1").show();
     }

     if (data.acreditarVidaJuridica!="" && data.acreditarVidaJuridica!=null) {
       $("#vidaJuridica").attr('href','documentos/vidaJuridica/'+data.acreditarVidaJuridica+'.pdf');
       $(".oculto__2").show();
     }

     if (data.certificacionTrayectoria!="" && data.certificacionTrayectoria!=null) {
       $("#certificacionTrayectoria").attr('href','documentos/certificacionDeTrayectoria/'+data.certificacionTrayectoria+'.pdf');
       $(".oculto__3").show();
     }

     if (data.certificadoPropiedades!="" && data.certificadoPropiedades!=null) {
       $("#certificadoPropiedad").attr('href','documentos/certificadoPropiedad/'+data.certificadoPropiedades+'.pdf');
       $(".oculto__4").show();
     }

     if (data.memoriaTecnicaArquitectonica!="" && data.memoriaTecnicaArquitectonica!=null) {
       $("#memoriaArquitectonicas").attr('href','documentos/memoriaTecnicaArquitectonica/'+data.memoriaTecnicaArquitectonica+'.pdf');
       $(".oculto__5").show();
     }

     if (data.presupuestoRubro!="" && data.presupuestoRubro!=null) {
       $("#presupuestoRubro").attr('href','documentos/presupuestoRubro/'+data.presupuestoRubro+'.pdf');
       $(".oculto__6").show();
     }

     if (data.cronogramaValorado!="" && data.cronogramaValorado!=null) {
       $("#cronogramasValorados").attr('href','documentos/cronogramaValorado/'+data.cronogramaValorado+'.pdf');
       $(".oculto__7").show();
     }

     if (data.respaldosNuevosDigitales!="" && data.respaldosNuevosDigitales!=null) {
       $("#respaldosDigitales").attr('href','documentos/respaldosNuevosDigitales/'+data.respaldosNuevosDigitales+'.pdf');
       $(".oculto__8").show();
     }
      
   });
}


/*=====  End of Proyectos tablas  ======*/

/*======================================
=            Patrocinadores            =
======================================*/


$(document).on("ready",function(){

  listarPatrocinadores();

});


var listarPatrocinadores=function(){

  var tablePatrocinar =$("#proyectosPatrocinar").DataTable({

          "language": 
        {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "No existen datos",
        "oPaginate": 
        {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
          },
          "oAria": 
          {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      },
 
      "pagingType": "full_numbers",
      "sScrollY": "400px",
      "Paginate": true,
      "scrollX": true,
      "pagingType": "full_numbers",
      "ajax":{
      "method":"POST",
        "url":"modelosBd/datatablets/patrocinarDatas.php"   
      },
      "columns":[

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:8px'>"+row['nombreRealizado']+"</div>";
          
                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:8px'>"+row['telefonoRealizado']+"</div>";
          
                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:8px'>"+row['emailRealizado']+"</div>";
          
                }

            },

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:8px'>"+row['nombre']+"</div>";
          
                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:8px'>"+row['monto']+"</div>";
          
                }

            }

     ]    

  });


}

/*=====  End of Patrocinadores  ======*/

/*=============================
=            Items            =
=============================*/

$(document).on("ready",function(){

  listarItems();

});


var listarItems=function(){

  var tableItems =$("#verItems").DataTable({

          "language": 
        {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "No existen datos",
        "oPaginate": 
        {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
          },
          "oAria": 
          {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      },
 
      "pagingType": "full_numbers",
      "sScrollY": "400px",
      "Paginate": true,
      "scrollX": true,
      "pagingType": "full_numbers",
      "ajax":{
      "method":"POST",
        "url":"modelosBd/datatablets/itemsComponentes.php"   
      },
      "columns":[

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:8px'>"+row['itemNombres']+"</div>";
          
                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:8px'>"+row['nombreComponentes']+"</div>";
          
                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:8px'>"+row['numero']+"</div>";
          
                }

            },


            {"render":

                function ( data, type, row ) {

                    return "<center><button class='eliminarItems btn btn-danger' data-toggle='modal'><i class='fas fa-trash'></i></button><center>";

                }

            }

     ]    

  });

obtener__items("#verItems tbody",tableItems);

}


var obtener__items=function(tbody,table){

   $(tbody).on("click","button.eliminarItems",function(e){

      var data=table.row($(this).parents("tr")).data();


      /*============================================
      =            Envìo de información            =
      ============================================*/
      
      var confirm= alertify.confirm('','¿Está seguro de eliminar el Ítem <span style="font-weight:bold;">'+data.itemNombres+'</span>?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

      confirm.set({transition:'slide'});     

      confirm.set('onok', function(){      
      
        var paqueteDeDatos = new FormData();

        var idItem=data.idItem;

        paqueteDeDatos.append('idItem', idItem);

        /*============================
        =            Ajax            =
        ============================*/
        
        var destino = "modelosBd/elimina/eliminaItem.php"; 

        $.ajax({

          url: destino,
          type: 'POST',
          contentType: false,
          data: paqueteDeDatos, 
          processData: false,
          cache: false, 

          success: function(response){

              var elementos=JSON.parse(response);
              var mensaje=elementos['mensaje'];


              if (mensaje==1) {

                alertify.set("notifier","position", "top-right");
              alertify.notify("Se eliminó correctamente", "success", 2, function(){});

              window.setTimeout(function(){ 

                location.reload();

                } ,2000);     


              }      

          },

          error: function (){ 
              
          }

        });            
        
        /*=====  End of Ajax  ======*/           


      });

     confirm.set('oncancel', function(){ //callbak al pulsar botón negativo

       alertify.set("notifier","position", "top-center");
       alertify.notify("Canceló la creación del Ítem", "success", 5, function(){});  
       $('#crearProyecto').show();
       $(".reload__creacion__proyecto").html('');  

     });  


      /*=====  End of Envìo de información  ======*/
      

      /*=====  End of Documentods  ======*/
    
   });
}



/*=====  End of Items  ======*/


/*============================================
=            Ver presupuestos mef            =
============================================*/

$(document).on("ready",function(){

  listarPresupuestosMefVer();

});


var listarPresupuestosMefVer=function(){

  var tablePresupuestosVer =$("#verPresupuestosTablas").DataTable({

          "language": 
        {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "No existen datos",
        "oPaginate": 
        {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
          },
          "oAria": 
          {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      },
 
      "pagingType": "full_numbers",
      "sScrollY": "400px",
      "Paginate": true,
      "scrollX": true,
      "pagingType": "full_numbers",
      "ajax":{
      "method":"POST",
        "url":"modelosBd/datatablets/componentesVerPresupuestos.php"   
      },
      "columns":[

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:8px'>"+row['presupuestoMefAsignados']+"</div>";
          
                }

            }

     ]    

  });


}

/*=====  End of Ver presupuestos mef  ======*/


/*==========================================
=            Componentes tablas            =
==========================================*/

$(document).on("ready",function(){

  listarComponentes();

});


var listarComponentes=function(){

  var tableComponentes =$("#verComponentesTablas").DataTable({

          "language": 
        {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "No existen datos",
        "oPaginate": 
        {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
          },
          "oAria": 
          {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      },
 
      "pagingType": "full_numbers",
      "sScrollY": "400px",
      "Paginate": true,
      "scrollX": true,
      "pagingType": "full_numbers",
      "ajax":{
      "method":"POST",
        "url":"modelosBd/datatablets/componentesListas.php"   
      },
      "columns":[

            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:8px'>"+row['nombreComponentes']+"</div>";
          
                }

            },


            {"render":

                function ( data, type, row ) {

                  return "<div style='font-size:8px'>"+row['tipoComponente']+"</div>";
          
                }

            },


            {"render":

                function ( data, type, row ) {

                    return "<center><button class='eliminarComponentes btn btn-danger' data-toggle='modal'><i class='fas fa-trash'></i></button><center>";

                }

            }

     ]    

  });

  obtener__componentes("#verComponentesTablas tbody",tableComponentes);

}

var obtener__componentes=function(tbody,table){

   $(tbody).on("click","button.eliminarComponentes",function(e){

      var data=table.row($(this).parents("tr")).data();


      /*============================================
      =            Envìo de información            =
      ============================================*/
      
      var confirm= alertify.confirm('','¿Está seguro de eliminar el componente <span style="font-weight:bold;">'+data.nombreComponentes+'</span>?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});   

      confirm.set({transition:'slide'});     

      confirm.set('onok', function(){      
      
        var paqueteDeDatos = new FormData();

        var idComponentes=data.idComponentes;

        paqueteDeDatos.append('idComponentes', idComponentes);

        /*============================
        =            Ajax            =
        ============================*/
        
        var destino = "modelosBd/elimina/eliminaComponente.php"; 

        $.ajax({

          url: destino,
          type: 'POST',
          contentType: false,
          data: paqueteDeDatos, 
          processData: false,
          cache: false, 

          success: function(response){

              var elementos=JSON.parse(response);
              var mensaje=elementos['mensaje'];


              if (mensaje==1) {

                alertify.set("notifier","position", "top-right");
              alertify.notify("Se eliminó correctamente", "success", 2, function(){});

              window.setTimeout(function(){ 

                location.reload();

                } ,2000);     


              }      

          },

          error: function (){ 
              
          }

        });            
        
        /*=====  End of Ajax  ======*/           


      });

     confirm.set('oncancel', function(){ //callbak al pulsar botón negativo

       alertify.set("notifier","position", "top-center");
       alertify.notify("Canceló la creación del proyecto", "success", 5, function(){});  
       $('#crearProyecto').show();
       $(".reload__creacion__proyecto").html('');  

     });  


      /*=====  End of Envìo de información  ======*/
      

      /*=====  End of Documentods  ======*/
    
   });
}



/*=====  End of Componentes tablas  ======*/
