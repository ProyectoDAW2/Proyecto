<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<<<<<<< HEAD
		<!-- Aï¿½adimos los estilos css de registro -->
        <link rel="stylesheet" href="http://reservasfernandovi.esy.es/assets/css/usuario/registro.css">
        
        <!-- Aï¿½adimos fuentes de letra de google, para que quede mï¿½s bonito -->
        <!-- <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'> -->

		<!-- Aï¿½adimos el cï¿½digo javascript de registro -->
 		<script src="http://reservasfernandovi.esy.es/assets/js/usuario/registro.js" type="text/javascript"></script>
=======
		<!-- Añadimos los estilos css de registro -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/usuario/registro.css">
        
        <!-- Añadimos fuentes de letra de google, para que quede más bonito -->
        <!-- <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'> -->

		<!-- Añadimos el código javascript de registro -->
 		<script src="<?= base_url() ?>assets/js/usuario/registro.js" type="text/javascript"></script>
>>>>>>> 8b60565d2d2ecbdfc7f6f8d9029e39a332260f97

    </head>
    <body>
<div class="container-content">
<<<<<<< HEAD
      <form action="http://reservasfernandovi.esy.es/usuario/registrarPost" method="post">
=======
      <form action="<?=base_url('usuario/registrarPost')?>" method="post">
>>>>>>> 8b60565d2d2ecbdfc7f6f8d9029e39a332260f97
      
        <div class="title"><h1>Registro</h1></div>

          <legend><span class="number">1</span>Informaci&oacute;n Usuario</legend>
          <div class="element-input">
          	<label for="name">Nick:</label>
          	<div class="item-cont">
          		<input type="text" id="nick" name="nick">
            </div>
          </div>
          
          <label for="password">Contrase&ntilde;a:</label>
          <input type="password" id="password" name="password">
          
          <label for="password">Repite la contrase&ntilde;a:</label>
          <input type="password" id="password2" name="password2">
          
          <label for="mail">Email:</label>
          <input type="email" id="correo" name="correo">

          <legend><span class="number">2</span>Clave del centro</legend>
          <label for="name">Clave:</label>
          <input type="text" id="clave" name="clave">
			
		  <input type="text" id="res" name="res" hidden/>
			
        <button type="submit" onclick="registrar()">Registrarse</button>
        
        
      </form>
</div> <!-- End of container -->
    </body>
</html>

