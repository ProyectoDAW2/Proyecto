<html>
<head>
    <meta charset="utf-8">
    <!-- Añadimos el código javascript de perfil -->
 	<script src="<?= base_url() ?>assets/js/usuario/perfil.js" type="text/javascript"></script>
    
	<!-- Añadimos los estilos css de registro -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/usuario/perfil.css">

</head>
<body>
    <form action="<?=base_url('usuario/perfilPost')?>" method="post">
        <fieldset>
            <!-- Nombre <input type="text" name="nombre" readonly/><br><br> -->
            <!-- Apellidos <input type="text" name="apellidos" readonly/><br><br> -->
            Nick <input type="text" id="nick" name="nick"/><br><br>
            Contrase&ntilde;a actual <input type="password" id="passwordActual" name="passwordActual"/><br><br>
            Contrase&ntilde;a nueva <input type="password" id="passwordNueva" name="passwordNueva"/><br><br>
            Repite la nueva contrase&ntilde;a <input type="password" id="password2" name="password2"/><br><br>
            Correo <input type="text" id="correo" name="correo"/><br><br>
            <input type="text" id="res" name="res" hidden/>
            
            <input type="submit" value="Modificar" onclick="modify()"/><br><br>
        </fieldset>
    </form>
    </br>
	
	Hola <?php echo $idUsuario?>

</body>
</html>