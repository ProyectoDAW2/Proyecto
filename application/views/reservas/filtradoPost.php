<!-- Recorremos las aulas disponibles, devueltas por el modelo, y listamos su n�mero de aula -->
<?php foreach ($aulas as $aula):?>
	<?php $num= $aula['num_aula']?>
	<?php $id= $aula['id']?>
	<option class="result" value="<?= $id ?>"><?= $num ?></option>
<?php endforeach;?>
<br>
<a href="http://reservasfernandovi.esy.es/reserva/filtrar">Buscar m&aacute;s aulas</a>
