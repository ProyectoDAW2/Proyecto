<section id="editarAulas">
  <div class="container">
  <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>AULAS</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
		<form action="http://reservasfernandovi.esy.es/objetoreservable/buscarAula" method="post">
			<input type="text" id="numaula" name="numaula"/>
			<input type="submit" id="buscar" name="buscar" value="Buscar"/>
			<!-- <input type="submit" id="crearAula" name="crearAula" value="Crear un aula nueva"/> -->
			<a href="http://reservasfernandovi.esy.es/objetoreservable/crear">Crear un aula nueva</a>
			
		</form>
				<?php if(isset($datosAula)):?>
				<table id="listaAulas" name="listaAulas">
				<tr><td>N&uacute;m. Aula</td><td>Nombre</td><td>Capacidad</td><td>Categor&iacute;a</td><td>N&uacute;m. Equipos</td><td>Red</td><td>Proyector</td></tr>
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
								<td><a href="#modAula" class="portfolio-link" data-toggle="modal">modificar</a></td>
							</div>
							<td><a href="http://reservasfernandovi.esy.es/objetoreservable/borrar?numeroAula=<?= $numeroAula ?>">borrar</a></td>
						</tr>
					<?php endforeach;?>
					</table>
				<?php endif; ?>
		
	</div>	
	</div>
</section>
	<script type="text/javascript">
		<?php if(isset($borradoIncorrecto)):?>
			swal({
	  	     	title: "",
	  		 	text: "No se ha podido borrar el aula. Por favor, inténtelo más tarde",
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
							<form action="http://reservasfernandovi.esy.es/objetoreservable/modificar" method="post">
							<!--<h4>Datos del aula</h4>-->
								<!-- Es útil por si cambian el numero de aula, porque asi sabes cual era el numero original -->
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
							<input type="submit" id="enviarMods" class="btn btn-success btn-md" value="Enviar">
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
</div>
</div>
</div>