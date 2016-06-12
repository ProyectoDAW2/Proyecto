<section id="editarAulas">
  <div class="container">
  <div class="row">
                <div class="titulo col-lg-12 text-center">
                    <h2>AULAS</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
		<form action="<?= base_url()?>objetoreservable/buscarAula" method="post">
			<div class="col-sm-12 col-md-12 text-center portfolio-item">
			<div class="row control-group">
                            <div class="form-group col-xs-8 col-xs-offset-2 floating-label-form-group controls">
                                <label>Introduce el nombre o n&uacute;mero de Aula</label>
                                <input type="text" id="numaula" class="form-control" name="numaula" onchange="numAulaNumerico(this.value)" placeholder="Introduce el n&uacute;mero de Aula"/>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        
				 <div class="form-group col-md-12">
				 <div class="form-group col-md-4 col-md-offset-2">
				<input type="submit" id="buscar" name="buscar" value="Buscar" class="botonPerfil btn btn-warning btn-md btn-block login-button"/>
				</div>
			
			<!-- <input type="submit" id="crearAula" name="crearAula" value="Crear un aula nueva"/> -->
			<!-- <div class="col-sm-6 portfolio-item"> -->
			<div class="form-group col-md-4 ">
				<td><a href="#crearAula" class="botonPerfil btn btn-primary btn-md btn-block login-button" data-toggle="modal" >Crear un aula nueva</a></td>
			</div>
			</div>
			
			</div>
			<!-- <a href="http://reservasfernandovi.esy.es/objetoreservable/crear">Crear un aula nueva</a> -->
			
		</form>
				<?php if(isset($datosAula)):?>
					<?php if($datosAula!=false):?>
					<div class="col-sm-10 col-md-10 col-md-offset-1">
					<div class="table-responsive">
						<table id="listaAulas" name="listaAulas" class="table table-bordered table-striped bs-events-table">
							<thead><tr><th>N&uacute;m. Aula</th><th>Nombre</th><th>Capacidad</th><th>Categor&iacute;a</th><th>N&uacute;m. Equipos</th><th>Red</th><th>Proyector</th></tr></thead>
								<tbody>
								<?php foreach($datosAula as $aula):?>
									<tr>
									<?php foreach($aula as $clave=>$valor):?>
										<?php if($clave=="num_aula"):?>
											<?php $numeroAula= $valor?>
										<?php endif;?>
										<?php if($clave=="nombre"):?>
											<?php $nombreAula= $valor?>
										<?php endif;?>
										<?php if($clave=="categoria"):?>
											<?php $categoriaAula= $valor?>
										<?php endif;?>
										<?php if($clave=="red"):?>
											<?php $redAula= $valor?>
										<?php endif;?>
										<?php if($clave=="proyector"):?>
											<?php $proyectorAula= $valor?>
										<?php endif;?>
										<?php if($clave=="num_equipos"):?>
											<?php $numeroEquipos= $valor?>
										<?php endif;?>
										<?php if($clave=="capacidad"):?>
											<?php $capacidadAula= $valor?>
										<?php endif;?>
											<td><?= $valor ?></td>
										
									<?php endforeach;?>
										<!-- <td><a href="http://reservasfernandovi.esy.es/objetoreservable/modificar?numeroAula=<?= $numeroAula ?>">modificar</a></td> -->
										<div class="col-sm-6 portfolio-item">
											<td><a href="#modAula" class="botonPerfil btn btn-success btn-md" data-toggle="modal" >Modificar</a></td>
										</div>
										<td><a href="<?= base_url()?>objetoreservable/borrar?numeroAula=<?= $numeroAula ?>" class="botonPerfil btn btn-danger btn-md">Borrar</a></td>
									</tr>
								<?php endforeach;?>
								<tbody>
						</table>
					</div>
					<?php endif; ?>
					<?php if($datosAula==false):?>
						<script type="text/javascript">
							swal({
					  	     	title: "",
					  		 	text: "No existe un aula con ese n\u00FAmero",
					  		 	type: "error",
					  		 	confirmButtonText: "Aceptar"
					  		});
						</script>
					<?php endif; ?>
				<?php endif; ?>
		
	</div>	
	</div>
</section>
	<script type="text/javascript">
		<?php if(isset($borradoIncorrecto)):?>
			swal({
	  	     	title: "",
	  		 	text: "No se ha podido borrar el aula. Por favor, int�ntelo m�s tarde",
	  		 	type: "error",
	  		 	confirmButtonText: "Aceptar"
	  		});
		<?php endif;?>
		<?php if($borradoCorrecto):?>
			swal({
 	  	     	title: "",
 	  		 	text: "Aula borrada correctamente",
 	  		 	type: "success",
 	  		 	confirmButtonText: "Continuar"
 	  		});
		<?php endif; ?>

		</script>

		<!-- Portfolio Modals -->
<div class="portfolio-modal modal fade" id="modAula" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-content">
		<div class="close-modal" data-dismiss="modal">
			<div class="lr">
				<div class="rl"></div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2>Modificar</h2>
					<hr class="star-primary">
					<div class="col-md-8 col-xd-12 col-md-offset-2">
						<div class="modal-body">
							<form action="<?= base_url()?>objetoreservable/modificar" method="post">
							<!--<h4>Datos del aula</h4>-->
								<!-- Es �til por si cambian el numero de aula, porque asi sabes cual era el numero original -->
								<input type="text" id="numAulaOriginal" name="numAulaOriginal" value="<?= $numeroAula ?>" hidden>
								<p><label for="numAula">N&uacute;mero de aula</label></p>
								<p><input type="text" id="numAula" name="numAula" value="<?= $numeroAula ?>"></p>
							
								<p><label for="nombre">Nombre</label></p>
								<p><input type="text" id="nombre" name="nombre" value="<?= $nombreAula ?>"></p>
							
								<p><label for="categoria">Categor&iacute;a</label></p>
								<p><input type="text" id="categoria" name="categoria" value="<?= $categoriaAula ?>"></p>
								
							<!--<label for="fancy-checkbox-default" class="[ btn btn-default active ]"> Red </label>-->
							<?php if($redAula=="SI"): ?>
								<p>Red <input type="checkbox" name="red" id="red" checked="checked"/></p>
							<?php endif; ?>
							<?php if($redAula!="SI"): ?>
								<p>Red <input type="checkbox" name="red" id="red"/></p>
							<?php endif; ?>
							
							<?php if($proyectorAula=="SI"): ?>
								<p>Proyector <input type="checkbox" name="proyector" id="proyector" checked="checked"/></p>
							<?php endif; ?>
							<?php if($proyectorAula!="SI"): ?>
								<p>Proyector <input type="checkbox" name="proyector" id="proyector"/></p>
							<?php endif; ?>

							<p><label for="equipos">N&uacute;mero de equipos:</label></p>
							<p><input type="text" id="equipos" name="equipos" value="<?= $numeroEquipos ?>"></p>
							<p><br> <label for="capacidad">Capacidad del aula:</label></p>
							<p><input type="text" id="capacidad" name="capacidad" value="<?= $capacidadAula ?>"></p>
							<br> <br>
							<input type="text" id="resModificar" name="resModificar" hidden>
							<input type="submit" id="enviarMods" class="btn btn-success btn-md" value="Enviar" onclick="validarDatosModificar()">
						</form>
						</div>
					</div>
					
					<script type="text/javascript">
					<?php if($modificarCorrecto):?>
						swal({
				  	     	title: "",
				  		 	text: "Aula modificada correctamente",
				  		 	type: "success",
				  		 	confirmButtonText: "Continuar"
				  		});
					<?php endif; ?>
					</script>

		</div>
	</div>
	
<div class="portfolio-modal modal fade" id="crearAula" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-content">
		<div class="close-modal" data-dismiss="modal">
			<div class="lr">
				<div class="rl"></div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2>Crear aula</h2>
					<hr class="star-primary">
					<div class="col-md-8 col-xd-12 col-md-offset-2">
						<div class="modal-body">
							<form action="<?= base_url()?>objetoreservable/crear" method="post">
		
								<p><label for="numeroAulaNueva">N&uacute;mero de aula</label></p>
								<p><input type="text" id="numeroAulaNueva" name="numeroAulaNueva"></p>
							
								<p><label for="nombreAulaNueva">Nombre</label></p>
								<p><input type="text" id="nombreAulaNueva" name="nombreAulaNueva"></p>
							
								<p><label for="categoriaAulaNueva">Categor&iacute;a</label></p>
								<p><input type="text" id="categoriaAulaNueva" name="categoriaAulaNueva"></p>
								
								<p>Red <input type="checkbox" name="redAulaNueva" id="redAulaNueva"/></p>
								<p>Proyector <input type="checkbox" name="proyectorAulaNueva" id="proyectorAulaNueva"/></p>

								<p><label for="equiposAulaNueva">N&uacute;mero de equipos:</label></p>
								<p><input type="text" id="equiposAulaNueva" name="equiposAulaNueva"></p>
								<p><br> <label for="capacidadAulaNueva">Capacidad del aula:</label></p>
								<p><input type="text" id="capacidadAulaNueva" name="capacidadAulaNueva"></p>
								<br> <br>
								<input type="text" id="resValidarCrear" name="resValidarCrear" hidden>
								
								<input type="submit" id="enviarAulaNueva" class="btn btn-success btn-md" value="Enviar" onclick="validarDatosCrear()">
								
							</form>
						</div>
					</div>
					
					<script type="text/javascript">
					<?php if(isset($crearCorrecto)):?>
						<?php if($crearCorrecto):?>
							swal({
					  	     	title: "",
					  		 	text: "Aula creada correctamente",
					  		 	type: "success",
					  		 	confirmButtonText: "Continuar"
					  		});
						<?php endif; ?>
						<?php if($crearCorrecto==false):?>
							swal({
					  	     	title: "",
					  		 	text: "El aula no ha podido crearse. Por favor, revise los datos.",
					  		 	type: "error",
					  		 	confirmButtonText: "Aceptar"
					  		});
						<?php endif; ?>
					<?php endif; ?>
					
					<?php if(isset($numeroExistente)):?>
						swal({
				  	     	title: "",
				  		 	text: "El n\u00FAmero de aula ya existe",
				  		 	type: "error",
				  		 	confirmButtonText: "Aceptar"
				  		});
					<?php endif; ?>
					</script>

		</div>
	</div>
</div>
</div>
</div>