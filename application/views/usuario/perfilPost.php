<?php 
$nick= $_REQUEST['nick'];
$passwordActual= $_REQUEST['passwordActual'];
$passwordNueva= $_REQUEST['passwordNueva'];
$passwordNueva2= $_REQUEST['passwordNueva2'];
$correo= $_REQUEST['correo'];
$res= $_REQUEST['res'];
	
header("Location: http://reservasfernandovi.esy.es/usuario/perfilPost?nick=".$nick."&passwordActual=".$passwordActual."&passwordNueva=".$passwordNueva."&passwordNueva2=".$passwordNueva2."&correo=".$correo."&res=".$res."");

?>