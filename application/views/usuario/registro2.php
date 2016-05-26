
		 <section id="registro">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Registrar</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
					<form class="form-horizontal" method="post" action="<?=base_url('usuario/registrarPost')?>">
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Nick</label>
                                <input type="text" class="form-control" name="nick" id="nick"  placeholder="Nombre de usuario"/>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">

                                <label>Contraseña</label>

                                <input type="password" class="form-control" name="password" id="password"  placeholder="Contrase&ntilde;a"/>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                         <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">

                                <label>Repite Contraseña</label>

                      			<input type="password" class="form-control" name="password2" id="password2"  placeholder="Repite contrase&ntilde;a"/>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email </label>
                                <input type="email" class="form-control" placeholder="Email" name="correo" id="correo" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        
                          <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Clave del Centro</label>
                      			<input type="password" class="form-control" name="clave" id="clave" placeholder="Clave del centro"/>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <input type="text" id="res" name="res" hidden/>
						<div class="form-group ">
							<button type="submit" onclick="registrar()" class="btn boton letraBoton btn-lg btn-block login-button">Registrarme</button>
						</div>
						<div class="login-register">

				            <a href="http://reservasfernandovi.esy.es/usuario/login">Login</a>

				         </div>
					</form>
                </div>
            </div>
        </div>
                        
   </section>                     

		
