<!-- Recorremos las aulas disponibles, devueltas por el modelo, y listamos su n�mero de aula -->
<?php foreach ($aulas as $aula):?>
			<?php foreach($aula as $a=>$num): ?>
					<option class="result" value="<?= $num ?>"><?= $num ?></option>
			<?php endforeach; ?>
<?php endforeach;?>

<a href="http://reservasfernandovi.esy.es/reserva/filtrar">Buscar m&aacute;s aulas</a>
