
		 <section id="registro">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Registrar</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
					<form class="form-horizontal" method="post" action="<?= base_url()?>usuario/registrarPost">
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Nick</label>
                                <input type="text" class="form-control" name="nick" id="nick"  placeholder="Nombre de usuario" required data-validation-required-message="Escribe tu nick"/>
                                
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">

                                <label>Contrase&ntilde;a</label>

                                <input type="password" class="form-control" name="password" id="password"  placeholder="Contrase&ntilde;a" required data-validation-required-message="La contrase&ntilde;a debe contener letras y n&uacute;meros"/>
                                
                            </div>
                        </div>
                         <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">

                                <label>Repite Contrase&ntilde;a</label>

                      			<input type="password" class="form-control" name="password2" id="password2"  placeholder="Repite contrase&ntilde;a"/>
                                
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email </label>
                                <input type="email" class="form-control" placeholder="Email" name="correo" id="correo" required data-validation-required-message="Escribe tu email">
                                
                            </div>
                        </div>
                        
                          <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Clave del Centro</label>
                      			<input type="password" class="form-control" name="clave" id="clave" placeholder="Clave del centro" required data-validation-required-message="Escribe la clave del centro"/>
                                
                            </div>
                        </div>
                        <input type="text" id="res" name="res" hidden/>
						<div class="form-group ">
							<button type="submit" onclick="registrar()" class="btn boton letraBoton btn-lg btn-block login-button">Registrarme</button>
						<a href="<?= base_url()?>usuario/login" class="btn  btn-lg btn-block btn-success ">Login</a>
						
						</div>
					        
					
					</form>
				

				            

                </div>
            </div>
        </div>
                        
   </section>                     

		
