<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
  
<<<<<<< HEAD
        <link rel="stylesheet" href="http://reservasfernandovi.esy.es/assets/css/usuario/listar.css">
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
        <script src="http://reservasfernandovi.esy.es/assets/jquery/jquery.min.js"></script>
=======
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/usuario/listar.css">
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
        <script src="<?= base_url() ?>assets/jquery/jquery.min.js"></script>
>>>>>>> 8b60565d2d2ecbdfc7f6f8d9029e39a332260f97
 
  </head>

  <body>

<table class="tablaUsu">
  
  <tr class="titulos">
    <td>NOMBRE</td>
    <td>APELLIDOS</td>
    <td>NICK</td>
    <td>EMAIL</td>
  </tr>
  
  <?php foreach($usuarios as $usuario):?>
		<tr>
			<td><?= $usuario->nombre ?></td>
			<td><?= $usuario->apellidos ?></td>
			<td><?= $usuario->nick ?></td>
			<td><?= $usuario->correo ?></td>
		</tr>
	<?php endforeach;?>

</table>

  </body>
</html>
