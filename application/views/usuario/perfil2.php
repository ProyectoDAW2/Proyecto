
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
    	    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
    	    	$("#contentImagenPerfil").css("background-image", "url(http://localhost/ProyectoCalendario/assets/imagenes/perfil/<?= $_SESSION['idUsuario'] ?>.jpg)");
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




<section id="perfil">
  <div class="container">
  <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>PERFIL</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
  
    <form  action="<?= base_url('usuario/perfilPost') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
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
</div>
</div>
</section>

