<section id="perfil">
  <div class="container">
  <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>PERFIL</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
  
    <form  action="http://reservasfernandovi.esy.es/usuario/perfilPost" method="post" class="form-horizontal" enctype="multipart/form-data">

		<fieldset>
			<div id="contentImagenPerfil"></div>
		
		<!-- Imagen perfil --> 
		<div class="form-group">
			
		  <label class="col-md-4 control-label" for="fotoPerfil">Foto perfil</label>
		  <div class="tamanio input-group">
                <span class="input-group-btn">
                    <span class="colorFondoBoton btn btn-file">
                        <span class="letraBoton">Examinar&hellip;</span> <input type="file" id="imagenPerfil" name="imagenPerfil" multiple>
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
		    <input type="submit" id="guardar" name="guardar" class="colorFondoBoton letraBoton botonPerfil btn"  value="Guardar cambios" onclick="modify()">
		  </div>
		</div>
		
		</fieldset>
	</form>
</div>
</div>
</section>

