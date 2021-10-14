<?php $plantilla= new plantilla();?>


<div class="col-12 d-flex flex-column align-items-center padding__responsives">
	
	<div class="row  botoom-margenes top-margenes">

		<?php $plantilla->plantillaHeaderUtilitarios();?>

	</div>

	<!--=======================================================
	=            Selecciona el tipo de solicitante            =
	========================================================-->
	
	<div class="row">

		<div class="col col-12 text-center">

			<label for="fullname" class="label__registro label__registro__responsive" style="width:100%; position:relative; left:-10px;">Patrocinador</label>

			<select class="entidad label__text input form-estilo1 entidadPatrocinador" id="entidadPatrocinador" name="entidadPatrocinador" validador="1" style="padding:.5em; height:45px!important; width:340px;">

				<option value="0" >-Seleccione el tipo de solicitante-</option>
				<option value="organismo">Persona jurídica</option>
				<option value="ciudadano">Persona natural</option>

			</select>

		</div>

	</div>	
	
	<!--====  End of Selecciona el tipo de solicitante  ====-->
	
	<!--=================================
	=            Formularios            =
	==================================-->
	
	<form class="ingreso__organismosDeportivos formulario__patrocinador" id="organismos" name="organismos" method="POST">

		<div class="seccion__1">
								
			<br>
							
			<label for="fullname" class="label__formula">* Ingresar ruc</label>

			<div class="clase__contenedora">
								
				<input type="text" class="form-estilos text__errores obligatorio__organismo__patrocinador ruc__longitud solo__numero" name="rucOrganismoPatrocinador" id="rucOrganismoPatrocinador" placeholder=""/>
									
				<a class="buscador__realizadores" id="buscarRucOrganismoPatrocinador" name="buscarRucOrganismoPatrocinador" style="color:black; font-weight:bold;"><i class="fas fa-search icono__buscadores1"></i></a>
										
				<div class="contenedor__ruc__organismo__patrocinador"></div>
								
			</div>

			<div class="counterRuc"></div>

			<div class="escondido__ruc__patrocinador">

				<label for="fullname" class="label__formula enlazados__organismos__deportivos">* Nombre organismo deportivo</label>
								
				<input type="text" class="form-estilos text__errores obligatorio__organismo__patrocinador enlazados__organismos__deportivos disableds__estilos" name="nombreOrganismoPatrocinador" id="nombreOrganismoPatrocinador"  placeholder="" disabled="" />

				<label for="confirmpassword" class="label__formula">* Celular</label>
				
				<input type="text" class="form-estilos text__errores obligatorio__organismo__patrocinador cedula__longitud solo__numero telefono__celular"  name="telefono2PatrocinadorOrganismo"  id="telefono2PatrocinadorOrganismo" placeholder=""/>
				
				<div class="counterTelfonos"></div>

				<label for="confirmpassword" class="label__formula">Teléfono convencional</label>

				<input type="text" class="form-estilos text__errores cedula__longitud solo__numero telefono__convencional"  name="telefonoRepresentanteUsuarioPatrocinadorOrganismo" id="telefonoRepresentanteUsuarioPatrocinadorOrganismo"  placeholder=""/>

				<div class="counterTelfonos"></div>

				<label for="email" class="label__formula">* Correo electrónico</label>
								
				<input type="text" class="form-estilos text__errores obligatorio__organismo__patrocinador email__validar" name="emailPatrocinador" id="emailPatrocinador" placeholder=""/>

				<div class="counterCorreo"></div>
								
				<label class="label__formula">* Dirección</label>
								
				<input type="text" class="form-estilos text__errores obligatorio__organismo__patrocinador"  name="direccionPatrocinador" id="direccionPatrocinador" placeholder=""/>

			</div>
				
		</div>

		<div class="claseterminos escondido__ruc__patrocinador">
			         		
			<input type="checkbox"  class="terminosCondicionesChecked" />
			         		
			<span class="acuerdo__de__responsabilidad terminosestilo" data-toggle="modal" data-target="#terminosCondiciones">⠀Acepto los términos y condiciones</span>
			         	
		</div>
			         			
		<br>

	</form>
						
	<!--====  End of Formularios  ====-->
	
	<!--=======================================================
	=            Formulario de Ingreso de Usuarios            =
	========================================================-->

	<form class="ingreso__usuarios formulario__patrocinador" id="ciudadanos" name="ciudadanos" method="POST">

		<br>

		<div class="seccion__1">

			<label for="fullname" class="label__formula">* Ingresar cédula</label>

			<div class="clase__contenedora">
				         			
				<input type="text" class="form-estilos text__errores obligatorio__usuario__patrocinador cedula__longitud solo__numero" name="cedulaUsuarioPatrocinador" id="cedulaUsuarioPatrocinador"  placeholder=""/>
				         			
				<a class="buscador__realizadores" id="buscarCedulaPatrocinador" name="buscarCedulaPatrocinador" style="color:black; font-weight:bold;"><i class="fas fa-search icono__buscadores1"></i></a>
				         			
				<div class="contenedor__cedula__registro__patrocinador"></div>
				         		
			</div>

			<div class="counterCedula"></div>

			<div class="escondido__cedula__patrocinador">

				<label for="fullname" class="label__formula enlaces__usuarios">* Nombre completo</label>
					         			
				<input type="text" class="form-estilos text__errores obligatorio__usuario__patrocinador enlaces__usuarios disableds__estilos"  name="nombreCompletoPatrocinador" id="nombreCompletoPatrocinador"  placeholder="" disabled="" />

				<label for="fullname" class="label__formula enlaces__usuarios">* Fecha de nacimiento</label>
					         			
				<input type="text" class="form-estilos text__errores obligatorio__usuario__patrocinador enlaces__usuarios disableds__estilos"  name="fechaNacimientoPatrocinador" id="fechaNacimientoPatrocinador"  placeholder="" disabled="" />

				<label for="fullname" class="label__formula enlaces__usuarios">* Sexo</label>
					         			
				<input type="text" class="form-estilos text__errores obligatorio__usuario__patrocinador enlaces__usuarios disableds__estilos"  name="sexoPatrocinador" id="sexoPatrocinador"  placeholder="" disabled="" />

				<label for="fullname" class="label__formula enlaces__usuarios">* Provincia</label>
					         			
				<select class="input form-estilos text__errores obligatorio__usuario__patrocinador provincia enlaces__usuarios" id="provinciaPatrocinador" name="provinciaPatrocinador"></select>

				<label for="fullname" class="label__formula enlaces__usuarios">* Cantón</label>
					         			
				<select class="input form-estilos text__errores obligatorio__usuario__patrocinador canton enlaces__usuarios" id="cantonPatrocinador" name="cantonPatrocinador"></select>

				<label for="fullname" class="label__formula enlaces__usuarios">* Parroquia</label>
			
				<select class="input form-estilos text__errores obligatorio__usuario__patrocinador parroquia enlaces__usuarios" id="parroquiaPatrocinador" name="parroquiaPatrocinador"></select>

				<label for="confirmpassword" class="label__formula enlaces__usuarios">* Celular</label>
				
				<input type="text" class="form-estilos text__errores obligatorio__usuario__patrocinador cedula__longitud solo__numero telefono__celular enlaces__usuarios"  name="telefono2Patrocinador"  id="telefono2Patrocinador" placeholder=""/>
				
				<div class="counterTelfonos"></div>

				<label for="confirmpassword" class="label__formula">Teléfono convencional</label>

				<input type="text" class="form-estilos text__errores cedula__longitud solo__numero telefono__convencional"  name="telefonoRepresentanteUsuarioPatrocinador" id="telefonoRepresentanteUsuarioPatrocinador"  placeholder=""/>

				<div class="counterTelfonos"></div>

				<label for="email" class="label__formula">* Correo electrónico</label>
					         		
				<input type="text" class="form-estilos text__errores obligatorio__usuario__patrocinador email__validar"name="email2Patrocinador" id="email2Patrocinador" placeholder=""/>

				<div class="counterCorreo"></div>

				<label for="confirmpassword" class="label__formula">* Dirección</label>
					    
				<input type="text" class="form-estilos text__errores obligatorio__usuario__patrocinador"  name="direccion2Patrocinador" id="direccion2Patrocinador" placeholder=""/>

			</div>

		</div>

		<div div class="claseterminos escondido__cedula__patrocinador">
			         		
			<input type="checkbox"  class="terminosCondicionesChecked" />
			         		
			<span class="acuerdo__de__responsabilidad terminosestilo" data-toggle="modal" data-target="#terminosCondiciones">⠀Acepto los términos y condiciones</span>
			         	
		</div>
			         			
		<br>

	</form>			         

	<!--====  End of Formulario de Ingreso de Usuarios  ====-->

	<div class="registros__dinamicos__patrocinadores">

		<center>
				     		
			<button class="btn btn-primary registro__formularios__envios" id="registroPatrocinador" name="registroPatrocinador" style="width:100%!important; position: relative; left:25%;"><i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;&nbsp;Registrarse</button>
				     	
			<div class="git__registro"></div>	
				     	
		</center>
				     
	</div>

	<br>
	<br>

	<div>

		<div style="margin-top:4em;">
					
			<center>

				<div>
							
					<a class="titulos titulo__regreso patrocinador__enlaces reload__location__inicios" data-toggle="modal" data-target="#modalPatrocinador">

						<i class="fas fa-sign-in-alt" style="font-size: 25px;"></i>

						<br>
								
						Iniciar sesión

					</a>
				
				</div>

			</center>
     
		</div>
		
	</div>


</div>