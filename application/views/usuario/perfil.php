<html>
<head>
    <meta charset="utf-8">
    <!-- A�adimos el c�digo javascript de perfil -->
 	<script src="http://reservasfernandovi.esy.es/assets/js/usuario/perfil.js" type="text/javascript"></script>
 	<script src="http://reservasfernandovi.esy.es/assets/js/usuario/imagenPerfil.js" type="text/javascript"></script>
    
	<!-- A�adimos los estilos css de perfil -->
    <link rel="stylesheet" href="http://reservasfernandovi.esy.es/assets/css/usuario/perfil.css">
    
    <!-- A�adimos archivos de bootstrap -->
    <script type='text/javascript' src='http://reservasfernandovi.esy.es/assets/js/bootstrap/bootstrap.min.js'></script>
    <script type='text/javascript' src='http://reservasfernandovi.esy.es/assets/js/bootstrap/bootstrap.js'></script>
    <link rel="stylesheet" href="http://reservasfernandovi.esy.es/assets/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="http://reservasfernandovi.esy.es/assets/css/bootstrap/bootstrap.min.css">
    
    <!-- A�adimos archivos de jquery -->
    <script type='text/javascript' src='http://reservasfernandovi.esy.es/assets/jquery/jquery-1.12.3.min.js'></script>
    <script type='text/javascript' src='http://reservasfernandovi.esy.es/assets/jquery/jquery-ui.min.js'></script>
    <script type='text/javascript' src='http://reservasfernandovi.esy.es/assets/jquery/jquery.min.js'></script>
    <script type='text/javascript' src='http://reservasfernandovi.esy.es/assets/jquery/jquery.js'></script>
    
    <script type="text/javascript">
    $(document).on('change', '.btn-file :file', function() {
  	  var input = $(this),
  	      numFiles = input.get(0).files ? input.get(0).files.length : 1,
  	      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  	      console.log(label);
  	      console.log(numFiles);
  	  input.trigger('fileselect', [numFiles, label]);
  	  
   	});

  	$(document).ready( function() {
  	  	$("#contentImagenPerfil").css("background-image", "url(http://localhost/ProyectoCalendario/assets/imagenes/perfil/<?= $_SESSION['idUsuario'] ?>.jpg)");
  	    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
  	        
  	        var input = $(this).parents('.input-group').find(':text'),
  	            log = numFiles > 1 ? numFiles + ' files selected' : label;
  	        
  	        if( input.length ) {
  	            input.val(log);
  	        } else {
  	            if( log ) alert(log);
  	        }
  	        
  	    });
  	});

  	<?php if(isset($imagen)): ?>
  		swal({
  	  	     title: "",
  	  		 text: "Datos cambiados correctamente",
  	  		 type: "success",
  	  		 confirmButtonText: "Continuar"
  	  	});
  	<?php endif; ?>
  	
    </script>

</head>
<body>
    <form  action="http://reservasfernandovi.esy.es/usuario/perfilPost" method="post" class="form-horizontal" enctype="multipart/form-data">
		<fieldset>
		
		<div id="contentImagenPerfil"></div>
		
		<!-- Imagen perfil --> 
		<div class="form-group">
		  <label class="col-md-4 control-label" for="fotoPerfil">Foto perfil</label>
		  <div class="tamanio input-group">
                <span class="input-group-btn">
                    <span class="btn btn-danger btn-file">
                        Examinar&hellip; <input type="file" id="imagenPerfil" name="imagenPerfil" multiple>
                    </span>
                </span>
                <input type="text" id="nombreImagen" name="nombreImagen" class="form-control" readonly>
            </div>
		</div>
		
		<!-- Nick -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="nickCambio">Nick</label>  
		  <div class="col-md-4">
		  <input id="nick" name="nick" type="text" placeholder="" class="form-control input-md" value="">
		    
		  </div>
		</div>
		
		<!-- Password actual -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="passwordActual">Contrase&ntilde;a actual</label>
		  <div class="col-md-4">
		    <input id="passwordActual" name="passwordActual" type="password" class="form-control input-md">
		    
		  </div>
		</div>
		
		<!-- Nueva password-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="passwordCambio">Nueva contrase&ntilde;a</label>
		  <div class="col-md-4">
		    <input id="passwordNueva" name="passwordNueva" type="password" class="form-control input-md">
		    
		  </div>
		</div>
		
		<!-- Repetir password-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="passwordCambio2">Repite nueva contrase&ntilde;a</label>
		  <div class="col-md-4">
		    <input id="passwordNueva2" name="passwordNueva2" type="password" class="form-control input-md">
		    
		  </div>
		</div>
		
		<!-- Correo -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="correoCambio">Email</label>  
		  <div class="col-md-4">
		  <input id="correo" name="correo" type="text" class="form-control input-md">
		    
		  </div>
		</div>
		
		<!-- Resultado Input -->
		<input type="text" hidden id="res" name="res" value="">
		
		<!-- Boton -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="guardar"></label>
		  <div class="col-md-4">
		    <!-- <button id="guardar" name="guardar" class="botonPerfil btn btn-danger" onclick="modify()">Guardar cambios</button> -->
		    <input type="submit" id="guardar" name="guardar" class="botonPerfil btn btn-danger"  value="Guardar cambios" onclick="modify()">
		  </div>
		</div>
		
		</fieldset>
</form>

</body>
</html>