     <section class="success" id="recuperar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>RECUPERAR DATOS</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">

            <form id="restablecerDatos" action="http://reservasfernandovi.esy.es/usuario/recuperarPost" method="post">

                <div class="col-lg- col-lg-offset-3">
                    <p>Escribe el email asociado a tu cuenta para recuperar tus datos necesarios</p>
                </div>
                   <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email </label>
                                <input type="email" class="form-control" placeholder="Email" id="correo" name="correo" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="form-group col-xs-12  col-md-4 col-lg-offset-4">
							<button type="submit"  class="btn btn-danger btn-lg btn-block login-button">Recuperar Datos</button>
						</div>
               </form> 
            </div>
        </div>
    </section>
   




<<<<<<< HEAD
<!--  ASï¿½ ES COMO ESTABA ANTES DE PASARLO CON BOOTSTRAP
=======
<!--  ASÍ ES COMO ESTABA ANTES DE PASARLO CON BOOTSTRAP
>>>>>>> 8b60565d2d2ecbdfc7f6f8d9029e39a332260f97

<form id="restablecerDatos" action="<?=base_url('usuario/recuperarPost')?>" method="post">
Escribe el email asociado a tu cuenta para recuperar tus datos<br>
<input type="email" id="correo" name="correo" required><br>
<input type="submit" class="enviar" value="Recuperar datos" >
</form>
-->