
<h1>MODIFICAR DATOS</h1>
<<<<<<< HEAD
<form action="http://reservasfernandovi.esy.es/usuario/modificarPost" method="post">
=======
<form action="<?=base_url('usuario/modificarPost')?>" method="post">
>>>>>>> 8b60565d2d2ecbdfc7f6f8d9029e39a332260f97

<label>Id</label> <input type="text" name="id">
<label>Correo</label> <input type="text" name="correo">
<label>Nick</label> <input type="text" name="nick">
<label>Password</label> <input type="text" name="password">

<input type="submit" class="button">
</form>