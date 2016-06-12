<div class="row">
    <div class="image col-sm-3 col-sm-offset-5 col-md-3 col-md-offset-5">
        <img src="http://reservasfernandovi.esy.es//assets/img/logo.png"></div>
</div>

<div class="row">
</div>

<section id="registro">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Login</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
                <form class="form-horizontal" method="post" action="<?= base_url()?>usuario/loginPost">
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Nombre de usuario</label>
                            <input type="text" class="form-control" id="user" name="user"  placeholder="Nombre de usuario" required data-validation-required-message="Escribe tu nick"/>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Contrase&ntilde;a</label>
                            <input type="password" class="form-control" name="password" id="password"  placeholder="Contrase&ntilde;a" required data-validation-required-message="La contrase&ntilde;a debe contener letras y n&uacute;meros"/>
                        </div>
                        <label>
                            <div class="item-cont">
                                <input type="checkbox" name="recordar" id="recordar" value="Recordar contrase&ntilde;a"/ >
                                <span><a>Recordar contrase&ntilde;a</a></span>
                            </div>
                        </label>


                    </div>
                    <input type="text" id="res" name="res" hidden/>
                    <div class="form-group ">
                        <input type="submit" class="btn boton letraBoton btn-lg btn-block login-button" value="Entrar"/>
                        <div class="submit"><a class="enlaceRegistro btn btn-lg btn-block btn-success " href="<?= base_url()?>usuario/registrar">Reg&iacute;strate aqu&iacute;</a></div>
                    </div>
                    <div class="element-input">
                    </div>
                    <div class="item-cont">
                        <span><a href="<?= base_url()?>usuario/recuperar">&iquest;Has olvidado tus datos?</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php if(!isset($_COOKIE['tiendaaviso'])):?>
    <div class="container-cookie" id="containerCookie">
        <h4 class="tituloCookie" id="cookiescript_header">Esta p&aacute;gina usa cookies</h4>Si contin&uacute;a navegando por esta p&aacute;gina, asumimos que acepta la <a class="enlaceCookie" href="http://www.politicadecookies.com">pol&iacute;tica de cookies</a><br>
        <button class="aceptarCookies" id="cookiescript_accept" onclick="PonerCookie()">Cerrar</button>
        <button class="leerMas" id="cookiescript_readmore">Leer m&aacute;s</button>
    </div>
<?php endif;?>
