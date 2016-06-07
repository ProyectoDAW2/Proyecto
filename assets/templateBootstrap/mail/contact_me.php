<?php
// Check for empty fields

/*if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }*/
$name= $_REQUEST['name'];
$email= $_REQUEST['email'];
$message= $_REQUEST['message'];
	
header("Location: http://reservasfernandovi.esy.es/usuario/contacto2?name=".$name."&email=".$email."&message=".$message."");
return true;			
?>