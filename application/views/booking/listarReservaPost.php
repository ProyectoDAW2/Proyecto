<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
</head>

<body>
<?php echo(json_encode($reservas));?>
<table border="1">
<tr>
</tr>
<?php foreach($reservas as $reserva):?>
<tr>
    <td id="date" name="date"><?= $reserva->fecha?></td>
    <td id="hour" name="hour"><?= $reserva->hora?></td>
</tr>
<?php endforeach;?>
</table>
</body>
</html>