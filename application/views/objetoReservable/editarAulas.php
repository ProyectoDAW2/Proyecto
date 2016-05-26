<html>
	<head>

	</head>
	<body>
<<<<<<< HEAD
		<form action="http://reservasfernandovi.esy.es/objetoreservable/buscarAula" method="post">
			<input type="text" id="numaula" name="numaula"/>
			<input type="submit" id="buscar" name="buscar" value="Buscar"/>
			<!-- <input type="submit" id="crearAula" name="crearAula" value="Crear un aula nueva"/> -->
			<a href="http://reservasfernandovi.esy.es/objetoreservable/crear">Crear un aula nueva</a>
=======
		<form action="<?= base_url('objetoreservable/buscarAula') ?>" method="post">
			<input type="text" id="numaula" name="numaula"/>
			<input type="submit" id="buscar" name="buscar" value="Buscar"/>
			<!-- <input type="submit" id="crearAula" name="crearAula" value="Crear un aula nueva"/> -->
			<a href="<?= base_url('objetoreservable/crear') ?>">Crear un aula nueva</a>
>>>>>>> 8b60565d2d2ecbdfc7f6f8d9029e39a332260f97
			
		</form>
		<table id="listaAulas" name="listaAulas">
				<tr><td>N&uacute;m. Aula</td><td>Nombre</td><td>Capacidad</td><td>Categor&iacute;a</td><td>N&uacute;m. Equipos</td><td>Red</td><td>Proyector</td></tr>
				<?php if(isset($datosAula)):?>
					<?php foreach($datosAula as $aula):?>
						<tr>
						<?php foreach($aula as $clave=>$valor):?>
							
								<td><?= $valor ?></td>
							
						<?php endforeach;?>
<<<<<<< HEAD
							<td><a href="http://reservasfernandovi.esy.es/objetoreservable/modificar">modificar</a></td>
							<td><a href="http://reservasfernandovi.esy.es/objetoreservable/borrar">borrar</a></td>
=======
							<td><a href="<?= base_url('objetoreservable/modificar') ?>">modificar</a></td>
							<td><a href="<?= base_url('objetoreservable/borrar') ?>">borrar</a></td>
>>>>>>> 8b60565d2d2ecbdfc7f6f8d9029e39a332260f97
						</tr>
					<?php endforeach;?>
				<?php endif; ?>
		</table>
	</body>
</html>