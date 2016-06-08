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
  	  	$("#contentImagenPerfil").css("background-image", "url(/assets/imagenes/perfil/<?= $_SESSION['idUsuario'] ?>.jpg)");
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


  	<?php if(isset($passIncorrecta)):?>
		swal({
  	     title: "Revisa los datos",
  		 text: "Recuerda que la contrase\u00f1a actual es obligatoria",
  		 type: "error",
  		 confirmButtonText: "Aceptar"
  		});
	<?php endif; ?>
    </script>
</body>
</html>