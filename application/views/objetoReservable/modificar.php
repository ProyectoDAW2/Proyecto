
<h1>MODIFICAR DATOS</h1>
<<<<<<< HEAD
<form action="http://reservasfernandovi.esy.es/objetoReservable/modificarPost" method="post">
=======
<form action="<?=base_url('objetoReservable/modificarPost')?>" method="post">
>>>>>>> 8b60565d2d2ecbdfc7f6f8d9029e39a332260f97

		


<input type="text" name="id" value="<?= $idUsuario ?>" hidden><br>
<label>Nombre</label> <input type="text" name="nombre"><br>
<label>Tipo</label> <input type="text" name="tipo"><br>
<label>N&uacute;mero de Aula</label> <input type="text" name="num_aula"><br>
<label>Capacidad</label> <input type="text" name="capacidad"><br>
<label>Categor&iacute;a</label> <input type="text" name="categoria"><br>
<label>N&uacute;mero de Equipos</label> <input type="text" name="num_equipos"><br>
<label>Red</label> <input type="text" name="red"><br>
<label>Proyector</label> <input type="text" name="proyector"><br>
<input type="submit" class="button"><br>
</form>