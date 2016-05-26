<<<<<<< HEAD
<!-- Recorremos las aulas disponibles, devueltas por el modelo, y listamos su nï¿½mero de aula -->
=======
<!-- Recorremos las aulas disponibles, devueltas por el modelo, y listamos su número de aula -->
>>>>>>> 8b60565d2d2ecbdfc7f6f8d9029e39a332260f97
<?php foreach ($aulas as $aula):?>
			<?php foreach($aula as $a=>$num): ?>
					<option class="result" value="<?= $num ?>"><?= $num ?></option>
			<?php endforeach; ?>
<?php endforeach;?>

<<<<<<< HEAD
<a href="http://reservasfernandovi.esy.es/reserva/filtrar">Buscar m&aacute;s aulas</a>
=======
<a href="<?=base_url('reserva/filtrar')?>">Buscar m&aacute;s aulas</a> 
>>>>>>> 8b60565d2d2ecbdfc7f6f8d9029e39a332260f97
