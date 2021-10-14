<script>

$(document).ready(function () {
/*=========================================
=            Fechas designadas            =
=========================================*/
var fechasEditadasDesignadas=function(parametro1){

	if ($(parametro1).val()!="") {

    	var dateToday = $(parametro1).val().split('/');

		today = new Date(dateToday[2],dateToday[1],dateToday[0])

		var anio1=today.getFullYear();

		$(".anioInforme__1").text(anio1);
		$(".anioInforme__2").text(anio1+1);
		$(".anioInforme__3").text(anio1+2);
		$(".anioInforme__4").text(anio1+3);				

	}

}
	
fechasEditadasDesignadas($("#inicioPeriodos"));	

/*=====  End of Fechas designadas  ======*/

/*================================================
=            Sumatores discriminantes            =
================================================*/

var sumatoresDiscriminantes=function(parametro1){

	var comparador=parseFloat($(parametro1).val()).toFixed(2);

	if (comparador>0) {
		
		$("input").attr('readonly',' ');	

		$("#nombreProyecto").attr('readonly',' ');

		$("input").attr('style','border:none!important;');

		$("#nombreProyecto").attr('style','border:none!important;');

		$("#numeroCertificadoPropiedad").removeAttr('readonly');

		$("#numeroCertificadoPropiedad").removeAttr('style');

		$("#eliminarComponentesIngresados").show();

		$(".titulo__iniciativas").show();

	}else{

		$("#eliminarComponentesIngresados").hide();

		$(".titulo__iniciativas").hide();

	}

}
	
sumatoresDiscriminantes($("#relacionadosText"));	

/*=====  End of Sumatores discriminantes  ======*/

/*==========================================================
=            Eliminar componentes desagregables            =
==========================================================*/

$('#eliminarComponentesIngresados').click(function (e){

	var confirm= alertify.confirm('','¿Está seguro de eliminar los componentes relacionados a su proyecto para poder editar el monto y las fechas?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'}); 	

	confirm.set({transition:'slide'});   	

		confirm.set('onok', function(){ //callbak al pulsar botón positivo
					    	
			var paqueteDeDatos = new FormData();

			var destino = "modelosBd/elimina/eliminarComponentes.md.php"; 

			var codigoCreacion=$('#codigoProyecto').val();

			paqueteDeDatos.append('codigoCreacion', codigoCreacion);

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
						alertify.notify("Se eliminaron correctamente los componentes relacionados a su proyecto", "success", 4, function(){});

						window.setTimeout(function(){ 

							location.reload();

						} ,4000);   	
					}		  
				  
				},
				error: function (){ 
					lert("Algo ha fallado.");
				}

			});		
											

		});

		confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
			alertify.set("notifier","position", "top-center");
			alertify.notify("Canceló la creación del proyecto", "success", 5, function(){});	
			$('#crearProyecto').show();
			$(".reload__creacion__proyecto").html('');	
		});		

});

/*=====  End of Eliminar componentes desagregables  ======*/


});
</script>