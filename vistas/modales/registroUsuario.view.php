<?php $plantilla= new plantilla();?>


<div class="col-12 d-flex flex-column align-items-center padding__responsives__dos">
	
	<div class="row  botoom-margenes top-margenes" style="margin-top: 4em;">

		<?php $plantilla->plantillaHeaderUtilitarios();?>

	</div>

	<div class="">

		<div>
				
				<div class="row">


					<div class="col col-12 text-center llevando__responsives" style="margin-top: 1em;">

						<select class="entidad label__text input form-estilo1" id="entidad" name="entidad" validador="1">

							<option value="0" >-Seleccione el tipo de solicitante-</option>
							<option value="ciudadano" tipoDos="Deportista Federado">Deportista federado</option>
							<option value="ciudadano" tipoDos="Deportista No Federado">Deportista no Federado</option>
							<option value="ciudadano" tipoDos="Personas Naturales No Deportistas">Personas naturales no pertenecientes al sistema deportivo nacional</option>
							<option value="organismo" tipoDos="Organizaciones Deportivas">Organizaciones deportivas que pertenecen al sistema deportivo nacional</option>
							<option value="organismo" tipoDos="Empresas u Organizaciones No Deportivas">Personas jurídicas no pertenecientes al sistema deportivo nacional</option>

						</select>

					</div>
					
					<div  class="col col-10 col-md-12 text-justify dando__letras__selectores selectores__estilistass"></div>

					<br>
					<br>

					<label for="confirmpassword" class="titulos__respuestas__segundo datos__atletas__seguidos__organizacion col-12 dando__nuevos__resxponsives text-center" style="margin-top:1em;"></label>

				</div>

				<br>

				<!--=========================================================
				=            Formulario de Organismos Deportivos            =
				==========================================================-->
					
				<form class="ingreso__organismosDeportivos formulario__patrocinador__dos" id="organismos" name="organismos" method="POST" style="display: block;">

						<div class="seccion__1">
	
								<label for="fullname" class="label__formula">* Ingresar RUC</label>

								<div class="clase__contenedora">
								
									<input type="text" class="form-estilos text__errores obligatorio__organismo ruc__longitud solo__numero" name="rucOrganismo" id="rucOrganismo" placeholder=""/>
									
									<a class="buscador__realizadores" id="buscarRucOrganismo" name="buscarRucOrganismo" style="color:black; font-weight:bold;"><i class="fas fa-search icono__buscadores1"></i></a>
										
									<div class="contenedor__ruc__organismo"></div>
								
								</div>

								<div class="counterRuc"></div>

								<div class="escondido__ruc__organismos">

									<label for="fullname" class="label__formula enlazados__organismos__deportivos">* Nombre organismo deportivo</label>
							
									<input type="text" class="form-estilos text__errores obligatorio__organismo enlazados__organismos__deportivos disableds__estilos" name="nombreOrganismo" id="nombreOrganismo"  placeholder="" disabled="" />

									<label for="email" class="label__formula">* Correo electrónico</label>

									<input type="text" class="form-estilos text__errores obligatorio__organismo email__validar" name="email" id="email" placeholder=""/>

									<label for="confirmpassword" class="titulos__respuestas__segundo">Dirección</label>

									<label for="fullname" class="label__formula">* Provincia</label>
							
									<select class="input form-estilos text__errores obligatorio__organismo provincia" id="provinciaFederacion" name="provinciaFederacion"></select>

									<label for="fullname" class="label__formula">* Cantón</label>
							
									<select class="input form-estilos text__errores obligatorio__organismo canton" id="cantonFederacion" name="cantonFederacion"></select>

									<label for="fullname" class="label__formula">* Parroquia</label>

									<select class="input form-estilos text__errores obligatorio__organismo parroquia" id="parroquiaFederacion" name="parroquiaFederacion"></select>
							
									<div class="counterTelfonos"></div>
							
									<label class="label__formula">* Dirección</label>
							
									<input type="text" class="form-estilos text__errores obligatorio__organismo"  name="direccion" id="direccion" placeholder=""/>

									<div class="counterCorreo"></div>

									<label for="confirmpassword" class="label__formula">* Calle Principal</label>
							
									<input type="text" class="form-estilos text__errores obligatorio__organismo"  name="callePrincipal" id="callePrincipal"  placeholder=""/>

									<label for="confirmpassword" class="label__formula">* Calle Secundaria</label>
							
									<input type="text" class="form-estilos text__errores obligatorio__organismo"  name="calleSecundaria" id="calleSecundaria"  placeholder=""/>

									<label for="confirmpassword" class="label__formula">* Numeracion</label>
							
									<input type="text" class="form-estilos text__errores obligatorio__organismo"  name="numeracion" id="numeracion"  placeholder=""/>
							

									<label for="confirmpassword" class="label__formula">Referencia</label>
							
									<input type="text" class="form-estilos text__errores"  name="referencia" id="referencia"  placeholder=""/>

									<br>

									<label for="confirmpassword" class="titulos__respuestas__segundo">Datos representante legal</label>

									<br>

									<label for="confirmpassword" class="label__formula">* Cédula representante Legal</label>

							        <div class="clase__contenedora">
							         			
							         	<input type="text" class="form-estilos text__errores obligatorio__organismo cedula__longitud solo__numero" name="representanteLegalCedula" id="representanteLegalCedula"  placeholder=""/>
							         			
							         	<a class="buscador__realizadores" id="buscarCedulaRepresentanteLegal" name="buscarCedulaRepresentanteLegal" style="color:black; font-weight:bold;"><i class="fas fa-search icono__buscadores1"></i></a>
							         			
										<div class="contenedor__cedula__representante__legal"></div>

										<div class="counterCedulaRepresentanteLegal"></div>
							         		
							        </div>

									<label for="confirmpassword" class="label__formula enlaces__representantes__legales">* Representante Legal</label>
								
									<input type="text" class="form-estilos text__errores obligatorio__organismo enlaces__representantes__legales disableds__estilos" name="representanteLegal" id="representanteLegal" placeholder="" disabled=""/>

									<label for="confirmpassword" class="label__formula">* Celular</label>
							
									<input type="text" class="form-estilos text__errores obligatorio__organismo cedula__longitud solo__numero telefono__celular"  name="telefono" id="telefono"  placeholder=""/>


									<label for="confirmpassword" class="label__formula">Teléfono convencional</label>
											
									<input type="text" class="form-estilos text__errores cedula__longitud solo__numero telefono__convencional"  name="telefonoRepresentante" id="telefonoRepresentante"  placeholder=""/>
											
									<div class="counterTelfonos"></div>


									<label for="email" class="label__formula">* Correo electrónico</label>
											
									<input type="text" class="form-estilos text__errores obligatorio__organismo email__validar" name="emailRepresentante" id="emailRepresentante" placeholder=""/>
									
									<div class="counterCorreo"></div>
									
									<label for="confirmpassword" class="titulos__respuestas__segundo">Dirección</label>							

									<label for="fullname" class="label__formula">* Provincia</label>
							
									<select class="input form-estilos text__errores obligatorio__organismo provincia" id="provinciaFederacionRepresentante" name="provinciaFederacionRepresentante"></select>

									<label for="fullname" class="label__formula">* Cantón</label>
							
									<select class="input form-estilos text__errores obligatorio__organismo canton" id="cantonFederacionRepresentante" name="cantonFederacionRepresentante"></select>

									<label for="fullname" class="label__formula">* Parroquia</label>

									<select class="input form-estilos text__errores obligatorio__organismo parroquia" id="parroquiaFederacionRepresentante" name="parroquiaFederacionRepresentante"></select>

			
									<label class="label__formula">* Calle principal</label>
								
									<input type="text" class="form-estilos text__errores obligatorio__organismo"  name="calleprincipalRepresentante" id="calleprincipalRepresentante" placeholder=""/>

									<label class="label__formula">* Calle secundaria</label>
								
									<input type="text" class="form-estilos text__errores obligatorio__organismo"  name="callesecundariaRepresentante" id="callesecundariaRepresentante" placeholder=""/>


									<label class="label__formula">* Numeración</label>
								
									<input type="text" class="form-estilos text__errores obligatorio__organismo"  name="numeracionRepresentante" id="numeracionRepresentante" placeholder=""/>


									<label class="label__formula">Referencia</label>
											
									<input type="text" class="form-estilos text__errores"  name="referenciaRepresentante" id="referenciaRepresentante" placeholder=""/>

								</div>
											
						</div>

						<div div class="claseterminos escondido__ruc__organismos">
			         		
			         		<input type="checkbox"  class="terminosCondicionesChecked check__estilos__lineas" />

			         		&nbsp;&nbsp;
			         		
			         		<span class="acuerdo__de__responsabilidad terminosestilo" data-toggle="modal" data-target="#terminosCondiciones">&nbsp;&nbsp;Acepto los términos y condiciones</span>
			         	
			         	</div>
			         			
			         	<br>

				</form>
					
					<!--====  End of Formulario de Organismos Deportivos  ====-->
					

			    <!--=======================================================
			    =            Formulario de Ingreso de Usuarios            =
			    ========================================================-->

			   <form class="ingreso__usuarios formulario__patrocinador__dos" id="ciudadanos" name="ciudadanos" method="POST" style="display: block;">

					<br>

					<label for="confirmpassword" class="titulos__respuestas__segundo datos__atletas__seguidos"></label>

					<br>

				   	<div class="seccion__1">

				        <label for="fullname" class="label__formula">* Ingresar Cédula</label>

				        <div class="clase__contenedora">
				         			
				         	<input type="text" class="form-estilos text__errores obligatorio__usuario cedula__longitud solo__numero" name="cedulaUsuario" id="cedulaUsuario"  placeholder=""/>
				         			
				         	<a class="buscador__realizadores" id="buscarCedula" name="buscarCedula" style="color:black; font-weight:bold;"><i class="fas fa-search icono__buscadores1"></i></a>
				         			
				         	<div class="contenedor__cedula__registro"></div>
				         		
				        </div>

				    	<div class="counterCedula"></div>

				    	<div class="escondido__cedula__deportistas">

					    	<label for="fullname" class="label__formula enlaces__usuarios">* Nombre Completo</label>
					         			
					    	<input type="text" class="form-estilos text__errores obligatorio__usuario enlaces__usuarios disableds__estilos"  name="nombreCompleto" id="nombreCompleto"  placeholder="" disabled="" />

					    	<label for="fullname" class="label__formula enlaces__usuarios">* Fecha de nacimiento</label>
					         			
					    	<input type="text" class="form-estilos text__errores obligatorio__usuario enlaces__usuarios disableds__estilos"  name="fechaNacimiento" id="fechaNacimiento"  placeholder="" disabled="" />

					    	<label for="fullname" class="label__formula enlaces__usuarios">* Sexo</label>
					         			
					    	<input type="text" class="form-estilos text__errores obligatorio__usuario enlaces__usuarios disableds__estilos"  name="sexo" id="sexo"  placeholder="" disabled="" />


						   	<label for="confirmpassword" class="label__formula enlaces__usuarios">* Celular</label>
				
						   	<input type="text" class="form-estilos text__errores obligatorio__usuario cedula__longitud solo__numero telefono__celular enlaces__usuarios"  name="telefono"  id="telefono2" placeholder=""/>
				
						   	<div class="counterTelfonos"></div>

							<label for="confirmpassword" class="label__formula">Teléfono convencional</label>
												
							<input type="text" class="form-estilos text__errores cedula__longitud solo__numero telefono__convencional"  name="telefonoRepresentanteUsuario" id="telefonoRepresentanteUsuario"  placeholder=""/>
												
							<div class="counterTelfonos"></div>


					        <label for="email" class="label__formula">* Correo electrónico</label>
					         		
					        <input type="text" class="form-estilos text__errores obligatorio__usuario email__validar"name="email" id="email2" placeholder=""/>

					        <div class="counterCorreo"></div>


					    	<label for="confirmpassword" class="titulos__respuestas__segundo">Dirección</label>	


					    	<label for="fullname" class="label__formula enlaces__usuarios">* Provincia</label>
					         			
					    	<select class="input form-estilos text__errores obligatorio__usuario provincia enlaces__usuarios" id="provincia" name="provincia"></select>

					    	<label for="fullname" class="label__formula enlaces__usuarios">* Cantón</label>
					         			
					    	<select class="input form-estilos text__errores obligatorio__usuario canton enlaces__usuarios" id="canton" name="canton"></select>

					    	<label for="fullname" class="label__formula enlaces__usuarios">* Parroquia</label>
			
						   	<select class="input form-estilos text__errores obligatorio__usuario parroquia enlaces__usuarios" id="parroquia" name="parroquia"></select>


						   	<label for="confirmpassword" class="label__formula">* Calle principal</label>
					    
					    	<input type="text" class="form-estilos text__errores obligatorio__usuario"  name="direccion2" id="direccion2" placeholder=""/>

							<label class="label__formula">* Calle secundaria</label>
									
							<input type="text" class="form-estilos text__errores obligatorio__usuario"  name="callesecundariaRepresentanteUsuario" id="callesecundariaRepresentanteUsuario" placeholder=""/>


							<label class="label__formula">* Numeración</label>
									
							<input type="text" class="form-estilos text__errores obligatorio__usuario"  name="numeracionRepresentanteUsuario" id="numeracionRepresentanteUsuario" placeholder=""/>


							<label class="label__formula">Referencia</label>
									
							<input type="text" class="form-estilos text__errores"  name="referenciaRepresentanteUsuario" id="referenciaRepresentanteUsuario" placeholder=""/>

							<div class="atributos__agregados"></div>

							<label for="fullname" class="label__formula enlaces__usuarios">Seleccionar si posee alguna discapacidad</label>
					         			
					    	<input type="checkbox" class="form-estilos text__errores obligatorio__usuario enlaces__usuarios disableds__estilos"  name="seleccionDiscapacidad" id="seleccionDiscapacidad"  placeholder="" style="display: block;position:relative; top:-4em;"/>

						</div>

					<div class="representantes__legales__menores">
 
						<input type="hidden" name="representanteSenal" id="representanteSenal" value="si" />

						<br>

							<label for="confirmpassword" class="titulos__respuestas__segundo">Datos representante legal</label>

						<br>

						<label for="confirmpassword" class="label__formula">* Cédula representante Legal</label>

						<div class="clase__contenedora">
								         			
							<input type="text" class="form-estilos text__errores obligatorio__atletas__representantes cedula__longitud solo__numero" name="representanteLegalCedulaAtletas" id="representanteLegalCedulaAtletas"  placeholder=""/>
								         			
							<a class="buscador__realizadores" id="buscarCedulaRepresentanteLegalAtletas" name="buscarCedulaRepresentanteLegalAtletas" style="color:black; font-weight:bold;"><i class="fas fa-search icono__buscadores1"></i></a>
								         			
							<div class="contenedor__cedula__registro__representantes__atletas"></div>

							<div class="counterCedulaRepresentanteLegal"></div>
								         		
						</div>

						<label for="confirmpassword" class="label__formula enlaces__representantes__legales">* Representante Legal</label>
									
						<input type="text" class="form-estilos text__errores obligatorio__atletas__representantes enlaces__representantes__legales disableds__estilos" name="representanteLegalAtletas" id="representanteLegalAtletas" placeholder="" disabled=""/>

						<label for="confirmpassword" class="label__formula">* Celular</label>
								
						<input type="text" class="form-estilos text__errores obligatorio__atletas__representantes cedula__longitud solo__numero telefono__celular"  name="telefonoAtletaRepresentantess" id="telefonoAtletaRepresentantess"  placeholder=""/>


						<label for="confirmpassword" class="label__formula">Teléfono convencional</label>
												
						<input type="text" class="form-estilos text__errores cedula__longitud solo__numero telefono__convencional"  name="telefonoRepresentanteAtletas" id="telefonoRepresentanteAtletas"  placeholder=""/>
												
						<div class="counterTelfonos"></div>


						<label for="email" class="label__formula">* Correo electrónico</label>
												
						<input type="text" class="form-estilos text__errores obligatorio__atletas__representantes email__validar" name="emailRepresentanteAtletas" id="emailRepresentanteAtletas" placeholder=""/>
										
						<div class="counterCorreo"></div>
										
						<label for="confirmpassword" class="titulos__respuestas__segundo">Dirección</label>							

						<label for="fullname" class="label__formula">* Provincia</label>
								
						<select class="input form-estilos text__errores obligatorio__atletas__representantes provincia" id="provinciaFederacionRepresentanteAtletas" name="provinciaFederacionRepresentanteAtletas"></select>

						<label for="fullname" class="label__formula">* Cantón</label>
								
						<select class="input form-estilos text__errores obligatorio__atletas__representantes canton" id="cantonFederacionRepresentanteAtletas" name="cantonFederacionRepresentanteAtletas"></select>

						<label for="fullname" class="label__formula">* Parroquia</label>

						<select class="input form-estilos text__errores obligatorio__atletas__representantes parroquia" id="parroquiaFederacionRepresentanteAtletas" name="parroquiaFederacionRepresentanteAtletas"></select>

				
						<label class="label__formula">* Calle principal</label>
									
						<input type="text" class="form-estilos text__errores obligatorio__atletas__representantes"  name="calleprincipalRepresentanteAtletas" id="calleprincipalRepresentanteAtletas" placeholder=""/>

						<label class="label__formula">* Calle secundaria</label>
									
						<input type="text" class="form-estilos text__errores obligatorio__atletas__representantes"  name="callesecundariaRepresentanteAtletas" id="callesecundariaRepresentanteAtletas" placeholder=""/>


						<label class="label__formula">* Numeración</label>
									
						<input type="text" class="form-estilos text__errores obligatorio__atletas__representantes"  name="numeracionRepresentanteAtletas" id="numeracionRepresentanteAtletas" placeholder=""/>


						<label class="label__formula">Referencia</label>
												
						<input type="text" class="form-estilos text__errores obligatorio__atletas__representantes"  name="referenciaRepresentanteAtletas" id="referenciaRepresentanteAtletas" placeholder=""/>

					</div>

			    </div>

				<div div class="claseterminos escondido__cedula__deportistas">
			         		
			     	<input type="checkbox"  class="terminosCondicionesChecked check__estilos__lineas" />

			     	&nbsp;&nbsp;
			         		
			     	<span class="acuerdo__de__responsabilidad terminosestilo" data-toggle="modal" data-target="#terminosCondiciones">&nbsp;&nbsp;Acepto los términos y condiciones</span>
			         	
			    </div>
			         			
			    <br>

				<br>

				<br>
				     
			</form>			         


			<div class="escondidos__ruc__cedulas__deportistas">

				<center>
					     		
					<a class="btn btn-primary text-center" id="registro" name="registro"><i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;&nbsp;Registrarse</a>
					     	
					<div class="git__registro"></div>	
					     	
				</center>
					     
			</div>

			<center>

				<div style="margin-top:1em; position:relative; left:-.5em;">
							
					<a class="titulos titulo__regreso reload__location__inicios" data-toggle="modal" data-target="#modalregistrosesion" style="position:relative; left:10px!important;">

						<i class="fas fa-sign-in-alt" style="font-size: 25px;"></i>

						<br>
								
						Iniciar sesión

					</a>
				
				</div>

			</center>



			<!--====  End of Formulario de Ingreso de Usuarios  ====-->

		</div>
		
	</div>

</div>