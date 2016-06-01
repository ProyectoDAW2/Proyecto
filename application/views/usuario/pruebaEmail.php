<?php

$name = "Susana"; 
$email = "susanarebollo96@gmail.com"; 
$asunto = "Probando"; 
$mensaje = "No va a llegar nunca esto machio, ojala"; 

$envio ="Name: ". $name ."\n"; 
$envio .="E-Mail: ".$email. "\n"; 
 

$receptor = "proyectodaw02@gmail.com"; 
$emisor = $email;
$subject = $asunto; 

$mailheaders = $receptor;

mail($receptor, $asunto, $mensaje);

?>