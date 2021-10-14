<?php $plantilla= new plantilla();?>


<!--===========================
=            Aside            =
============================-->
<?php $plantilla->componentesDasboard(1);?>
<!--====  End of Aside  ====-->

<!--=======================================
=            Secciòn Principal            =
========================================-->

<div class="main-header" style="border-bottom: 0px solid #212B5C!important;">

  <div class="container-fluid">

  	<div class="row separacion__inicial">

  		<div class="col-2">

  			<div class="label__formularios__2">Componentes</div>

  		</div>

  		<div class="col-5 text-center">

  			<button class="btn btn-primary" data-toggle="modal" data-target="#crearComponentes"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Crear</button>

  		</div>


  		<div class="col-5 text-center">

  			<button class="btn btn-info" data-toggle="modal" data-target="#verComponentes"><i class="fas fa-eye"></i>&nbsp;&nbsp;Ver</button>

  		</div>

  	</div>

  	<br>
  	<br>

  	<div class="row">

  		<div class="col-2">

  			<div class="label__formularios__2">Items</div>

  		</div>

  		<div class="col-5 text-center">

  			<button class="btn btn-primary" data-toggle="modal" data-target="#crearItem"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Crear</button>

  		</div>


  		<div class="col-5 text-center">

  			<button class="btn btn-info" data-toggle="modal" data-target="#verItem"><i class="fas fa-eye"></i>&nbsp;&nbsp;Ver</button>

  		</div>

  	</div>


  	<br>
  	<br>

  	<div class="row">

  		<div class="col-2">

  			<div class="label__formularios__2">Presupuesto MEF</div>

  		</div>

  		<div class="col-5 text-center">

  			<button class="btn btn-primary" data-toggle="modal" data-target="#presupuestoMef"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Crear</button>

  		</div>


  		<div class="col-5 text-center">

  			<button class="btn btn-info" data-toggle="modal" data-target="#verPresupuestoMef"><i class="fas fa-eye"></i>&nbsp;&nbsp;Ver</button>

  		</div>

  	</div>

  </div>

</div>

<!--====  End of Secciòn Principal  ====-->


<!--=============================
=            Modales            =
==============================-->

<!--======================================
=            Presupuestos MEF            =
=======================================-->

<div id="presupuestoMef" class="modal" role="dialog" data-backdrop="static" data-keyboard="false">

	<div class="modal-dialog modal-lg">

		<div class="modal-content">

			<div class="modal-header" style="width:100%;">

				Presupuesto MEF
				
			</div>  

			<button type="button" class="closeButton" data-dismiss="modal">&times;</button>

			<div class="modal-body">

				<div class="box-body row">

					<div class="col col-4 enfacis__proyectos">

						Presupuesto MEF

					</div>

					<div class="col col-8">

						<input type="text" name="presupuestoMefAsignados" id="presupuestoMefAsignados"  class="solo__numero__montos" />

					</div>

					<br>

					<br>

					<div class="col col-12 tex-center d-flex justify-content-center">
							
						<button class="btn btn-primary" id="guardarMefAsignados" name="guardarMefAsignados"><i class="fas fa-save"></i>&nbsp;Guardar</button>
						<div class="reload__componentes"></div>

					</div>
					

				</div>

			</div>

		</div>

	</div>

</div>

<!--====  End of Presupuestos MEF  ====-->

<!--==========================================
=            Ver presupuestos MEF            =
===========================================-->

<div id="verPresupuestoMef" class="modal" role="dialog" data-backdrop="static" data-keyboard="false">

	<div class="modal-dialog modal-lg">

		<div class="modal-content">

			<div class="modal-header" style="width:100%;">

				Ver Presupuestos
				
			</div>  

			<button type="button" class="closeButton" data-dismiss="modal">&times;</button>

			<div class="modal-body">

				<div class="box-body row">

					<table id="verPresupuestosTablas" class="tabla__autoajustables">

						<thead>
							
							<tr>

								<th class="auto__1">Presupuesto</th>

							</tr>

						</thead>

					</table>

				</div>

			</div>

		</div>

	</div>

</div>

<!--====  End of Ver presupuestos MEF  ====-->



<!--=================================
=      Crear Componentes            =
==================================-->

<div id="crearComponentes" class="modal" role="dialog" data-backdrop="static" data-keyboard="false">

	<div class="modal-dialog modal-lg">

		<div class="modal-content">

			<div class="modal-header" style="width:100%;">

				Crear Componente
				
			</div>  

			<button type="button" class="closeButton" data-dismiss="modal">&times;</button>

			<div class="modal-body">

				<div class="box-body row">

					<div class="col col-2 enfacis__proyectos">

						Nombre componente

					</div>

					<div class="col col-4 enfacis__proyectos">

						<select id="tipoComponente" class="selector__inicial obligatorios__componentes">
							
							<option value="">--Seleccionar eltipo de componente</option>
							<option value="tecnico">Técnico</option>
							<option value="infraestructura">Infraestructura</option>
							<option value="tecnologico">Tecnologico</option>

						</select>

					</div>

					<div class="col col-6">

						<input type="text" name="componentesNombres" id="componentesNombres"  class="selector__inicial obligatorios__componentes" />

					</div>

					<div class="col col-12 tex-center d-flex justify-content-center">
							
						<button class="btn btn-primary" id="guardarComponente" name="guardarComponente"><i class="fas fa-save"></i>&nbsp;Guardar</button>
						<div class="reload__componentes"></div>

					</div>
					

				</div>

			</div>

		</div>

	</div>

</div>

<!--====  End of Crear Componentes  ====-->

<!--=====================================
=            Ver componentes            =
======================================-->

<div id="verComponentes" class="modal" role="dialog" data-backdrop="static" data-keyboard="false">

	<div class="modal-dialog modal-lg">

		<div class="modal-content">

			<div class="modal-header" style="width:100%;">

				Ver Componenes
				
			</div>  

			<button type="button" class="closeButton" data-dismiss="modal">&times;</button>

			<div class="modal-body">

				<div class="box-body row">

					<table id="verComponentesTablas" class="tabla__autoajustables">

						<thead>
							
							<tr>

								<th class="auto__1">Componente</th>
								<th class="auto__2">Tipo COmponente</th>
								<th class="auto__3">Eliminar</th>

							</tr>

						</thead>

					</table>

				</div>

			</div>

		</div>

	</div>

</div>

<!--====  End of Ver componentes  ====-->


<!--===============================
=            Ver items            =
================================-->

<div id="verItem" class="modal" role="dialog" data-backdrop="static" data-keyboard="false">

	<div class="modal-dialog modal-lg">

		<div class="modal-content">

			<div class="modal-header" style="width:100%;">

				Ver Items
				
			</div>  

			<button type="button" class="closeButton" data-dismiss="modal">&times;</button>

			<div class="modal-body">

				<div class="box-body row">

					<table id="verItems" class="tabla__autoajustables">

						<thead>
							
							<tr>

								<th class="auto__1">Item</th>
								<th class="auto__2">Componente</th>
								<th class="auto__3">Argumentos</th>
								<th class="auto__3">Eliminar</th>

							</tr>

						</thead>

					</table>

				</div>

			</div>

		</div>

	</div>

</div>

<!--====  End of Ver items  ====-->


<!--=======================================
=            Crear Items                 =
========================================-->

<div id="crearItem" class="modal" role="dialog" data-backdrop="static" data-keyboard="false">

	<div class="modal-dialog modal-lg">

		<div class="modal-content">

			<div class="modal-header" style="width:100%;">

				Crear Item
				
			</div>  

			<button type="button" class="closeButton" data-dismiss="modal">&times;</button>

			<div class="modal-body">

				<div class="box-body">

					<div class="row">

						<div class="col col-4 enfacis__proyectos">

							Nombre Item

						</div>

						<div class="col col-8">

							<input type="text" name="itemNombres" id="itemNombres"  class="selector__inicial obligatorios__items__argumentos" />

						</div>

					</div>


					<div class="row">

						<div class="col col-4 enfacis__proyectos">

							Componente

						</div>

						<div class="col col-8">

							<select id="componenteSeleccion" name="componenteSeleccion" class="selector__inicial obligatorios__items__argumentos"></select>

						</div>

					</div>

					<br>

					<div class="row">

						<div class="col col-10 letra__titulo">

							¿Desea agregar los items definidos de cantidad, valor unitario y valor total?

						</div>


						<div class="col col-2 letra__titulo">

							<input type="checkbox" id="agregarItemsDefinidos" name="agregarItemsDefinidos" class="check__estilos__lineas"/>

						</div>

					</div>

					<br>

					<!--===============================================
					=            Desplegar filas definidas            =
					================================================-->
					
					<div class="row fila__desplegable">
						
						<div class="col col-3 enfacis__proyectos">

							Argumentos del Item definidos

						</div>

						<div class="col col-3 enfacis__proyectos">

							<input type="text" value="Cantidad" disabled="" />


						</div>

						<div class="col col-3 enfacis__proyectos">

							<input type="text" value="Valor Unitario" disabled="" />


						</div>

						<div class="col col-3 enfacis__proyectos">

							<input type="text" value="Valor Total" disabled="" />


						</div>

					</div>

					<!--====  End of Desplegar filas definidas  ====-->
					
					<br>

					<div class="row argumentos__items__anadidos">

						<div class="col col-4 enfacis__proyectos">

							Argumentos del Item

						</div>

						<div class="col col-8">

							<button class="btn btn-primary" id="anadirArgumentos" name="anadirArgumentos">&nbsp;Añadir</button>

						</div>

					</div>

					<br>

					<div class="row">

						<table class="tabla__argumentos col col-12">

							<thead>

								<tr>
									
									<th>
										<center>Argumento<br>(Columna de la tabla)</center>
									</th>

									<th>
										<center>Tipo Argumento</center>
									</th>

									<th>
										<center>Eliminar</center>
									</th>

								</tr>

							</thead>

							<tbody class="contenedor__argumentos"></tbody>


						</table>

					</div>


					<div class="row fila__desplegable">

						<div class="col col-3 enfacis__proyectos">

							<input type="hidden" name="cantidad" id="cantidad"  class="disableds__estilos selector__inicial obligatorios__items checkeds__items__argumentos obligatorios__items__argumentos" value="Cantidad" disabled="" />

							<input type="hidden" class="disableds__estilos selector__inicial obligatorios__items obligatorios__items__argumentos checkeds__tipo__argumentos" value="numerico" disabled="" />

						</div>

						<div class="col col-3 enfacis__proyectos">

							<input type="hidden" name="valorUnitario" id="valorUnitario"  class="disableds__estilos selector__inicial obligatorios__items obligatorios__items__argumentos checkeds__items__argumentos" value="Valor Unitario" disabled="" />

							<input type="hidden" class="disableds__estilos selector__inicial obligatorios__items obligatorios__items__argumentos checkeds__tipo__argumentos" value="moneda" disabled="" />

						</div>

						<div class="col col-3 enfacis__proyectos">

							<input type="hidden" name="valorTotal" id="valorTotal"  class="disableds__estilos selector__inicial obligatorios__items obligatorios__items__argumentos checkeds__items__argumentos" value="Valor Total" disabled="" />

							<input type="hidden" class="disableds__estilos selector__inicial obligatorios__items obligatorios__items__argumentos checkeds__tipo__argumentos" value="moneda" disabled="" />

						</div>

					</div>					
					

					<div class="row">

						<div class="col col-12 tex-center d-flex justify-content-center">
							
							<button type="button" id="agregarItemAdministrativos" name="agregarItemAdministrativos" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Guardar</button>

							<div class="reload__items__componentes"></div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>

<!--====  End of Crear Items  ====-->


<!--====  End of Modales  ====-->
