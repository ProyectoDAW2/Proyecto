
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
<<<<<<< HEAD
                                <label>Contraseï¿½a</label>
=======
                                <label>Contraseña</label>
>>>>>>> 8b60565d2d2ecbdfc7f6f8d9029e39a332260f97
                                <input type="password" class="form-control" name="password" id="password"  placeholder="Contrase&ntilde;a"/>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                         <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
<<<<<<< HEAD
                                <label>Repite Contraseï¿½a</label>
=======
                                <label>Repite Contraseña</label>
>>>>>>> 8b60565d2d2ecbdfc7f6f8d9029e39a332260f97
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
<<<<<<< HEAD
				            <a href="http://reservasfernandovi.esy.es/usuario/login">Login</a>
=======
				            <a href="<?= base_url('usuario/login') ?>">Login</a>
>>>>>>> 8b60565d2d2ecbdfc7f6f8d9029e39a332260f97
				         </div>
					</form>
                </div>
            </div>
        </div>
                        
   </section>                     

		
