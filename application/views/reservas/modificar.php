<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<body>
<h1>Modificar Reserva</h1>
<<<<<<< HEAD
<form action="http://reservasfernandovi.esy.es/reserva/crearPost" method="post">
=======
<form action="<?=base_url('reserva/crearPost')?>" method="post">
>>>>>>> 8b60565d2d2ecbdfc7f6f8d9029e39a332260f97
	<label>idUsario</label> <input type="text" name="idUsuario"><br>
	<label>idObjeto Reservable</label> <input type="text" name="idOR"><br>
	<label>Fecha</label> <input type="date" name="fecha"><br>
	<label>Hora</label> <input type="text" name="hora"><br>
	<input type="submit">
</form>
</body>
</head>
</html>