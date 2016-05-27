<section id="editarAulas">
  <div class="container">
  <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>PERFIL</h2>
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
								<td><?= $valor ?></td>
							
						<?php endforeach;?>
							<td><a href="http://reservasfernandovi.esy.es/objetoreservable/modificar?numeroAula=<?= $numeroAula ?>">modificar</a></td>
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