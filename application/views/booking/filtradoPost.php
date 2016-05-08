<!-- Recorremos las aulas disponibles, devueltas por el modelo, y listamos su número de aula -->
<?php foreach ($aulas as $aula):?>
			<?php foreach($aula as $a=>$num): ?>
					<option value="<?= $num ?>"><?= $num ?></option>
			<?php endforeach; ?>
<?php endforeach;?>

<a href="<?=base_url('reserva/filtrar')?>">Buscar m&aacute;s aulas</a> 
