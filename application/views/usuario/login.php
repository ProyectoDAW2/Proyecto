
<div class="container">

	<div class="row">
		<img class="image col-md-1.5 col-xs-1.5" src="<?= base_url()?>/assets/img/logo.png"/>
	</div>
	
	<div class="row">
		<h3 class="titleApp">Reserva de aulas IES REY FERNANDO VI</h3>
	</div>
	
	<div class="row">
	
	</div>
    <form action="<?= base_url()?>usuario/loginPost" method="post" class="form">

        <div class="title"><h2>Login</h2></div>
        <div class="element-input">
            <label class="title"></label>
            <div class="item-cont">
                <input type="text" id="user" name="user" class="large" placeholder="Usuario"/>
            </div>
        </div>

        <div class="element-password" title="Contrase&ntilde;a">

            <label class="title"></label>
            <div class="item-cont">
                <input type="password" name="password" id="password" class="large" placeholder="Contrase&ntilde;a"/>
            <span class=""></span>
            </div>
        </div>
        
        <div class="element-checkbox" title="Recordar contrase&ntilde;a para pr&oacute;ximas entradas">

            <label class="title"></label>
            <div class="column column1">
                <label>
                    <input type="checkbox" name="recordar" id="recordar" value="Recordar contrase&ntilde;a"/ >

                    <span>Recordar contrase&ntilde;a</span>

                </label>
            </div>
            <div class="element-input">
                <label class="title"></label>
                <div class="item-cont">
                    <span><a href="<?= base_url()?>usuario/recuperar">&iquest;Has olvidado tus datos?</a></span>
                    
                </div>
            </div>
            <span class="clearfix"></span>
        </div>

        <div class="submit"><a class="enlaceRegistro" href="<?= base_url()?>usuario/registrar">Reg&iacute;strate aqu&iacute;</a><input type="submit" value="Entrar"/></div>

    </form>
</div> <!--End of container-content-->
<?php if(!isset($_COOKIE['tiendaaviso'])):?>
		<div class="container-cookie" id="containerCookie">
            <h4 class="tituloCookie" id="cookiescript_header">Esta p&aacute;gina usa cookies</h4>Si contin&uacute;a navegando por esta p&aacute;gina, asumimos que acepta la <a class="enlaceCookie" href="http://www.politicadecookies.com">pol&iacute;tica de cookies</a><br>
            
            <button class="aceptarCookies" id="cookiescript_accept" onclick="PonerCookie()">Cerrar</button>
            
            <button class="leerMas" id="cookiescript_readmore">Leer m&aacute;s</button>

        </div>
<?php endif;?>

