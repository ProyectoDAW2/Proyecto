
				
	
<?php if(isset($reservasUsuarios)&&(isset($datosUsuarios))):?>

		<div id="borrarBuscarPorPersona" class="col-md-6 col-md-offset-3">
				<button type="button" id="borrarTodas"   class="botonPerfil btn btn-danger btn-md btn-block login-button">Borrar Todas</button>
				</div>
					<div class="col-md-10 col-md-offset-1 table-responsive">
						<table data-toggle="table" id="listaAulas" name="listaAulas" class="table table-bordered table-striped bs-events-table">
							<thead><tr><th data-field="fruit" data-sortable="true">Usuario</th><th>Correo</th><th>Rol</th><th>Aula</th><th>N&uacute;m. Aula</th><th>Fecha</th><th>Hora</th></tr></thead>
								<tbody>
								<tr>
								<?php foreach ($reservasUsuarios as $reservaUsuario): ?>
								<?php foreach ($reservaUsuario as $rU): ?>
								<?php foreach ($datosUsuarios as $datoUsuario): ?>
								<?php if ($rU["usuario_id"]==$datoUsuario["id"]): ?>
								<td><?= $datoUsuario["nick"]?></td>
								<td><?= $datoUsuario["correo"]?></td>
								<td><?= $datoUsuario["rol"]?></td>
								<td><?= $rU["ornombre"]?></td>
								<td><?= $rU["num_aula"]?></td>
								<td><?= $rU["fecha"]?></td>
								<td><?= $rU["hora"]?></td>
							<!--datoInicial lo utilizo para saber cual fue el dato introducido por el administrador y posteriormente volverlo a pasar cuando borre una reserva-->
								<td><button type="button" class="botonPerfil btn btn-danger btn-sm idParaBorrar" id="<?= $rU["id"] ?>" name=<?= $datoInput?>>Borrar</button></td>
								
								
								</tr>
								
								<?php endif;?>
								<?php endforeach;?>
									<?php endforeach;?>
								<?php endforeach;?>
								
								<tbody>
						</table>
						
				</div>
<?php endif;?>