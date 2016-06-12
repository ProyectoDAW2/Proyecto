<!-- Zona contacto -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contacto</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form action="<?= base_url()?>usuario/contacto2" method="post">
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Nombre</label>
                                <input type="text" class="form-control" placeholder="Nombre" id="name" name="name" required value="<?= $nombreUsuario?>" data-validation-required-message="Escribe tu nombre">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email" name="email" required value="<?= $correoUsuario?>" data-validation-required-message="Escribe tu email">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                      
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Mensaje</label>
                                <textarea rows="5" class="form-control" placeholder="Mensaje" id="message" name="message" required data-validation-required-message="Escribe un mensaje"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div> 
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="botonPerfil btn btn-success">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

