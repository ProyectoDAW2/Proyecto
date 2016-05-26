
<div class="container-content">
<<<<<<< HEAD
	<img class="image" src="http://reservasfernandovi.esy.es/assets/img/logo.png"/>
	<h3 class="titleApp">Reserva de aulas IES REY FERNANDO VI</h3>
    <form action="http://reservasfernandovi.esy.es/usuario/loginPost" method="post" class="form">
=======
	<img class="image" src="<?= base_url() ?>assets/img/logo.png"/>
	<h3 class="titleApp">Reserva de aulas IES REY FERNANDO VI</h3>
    <form action="<?=base_url('usuario/loginPost')?>" method="post" class="form">
>>>>>>> 8b60565d2d2ecbdfc7f6f8d9029e39a332260f97
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
                    <span><a href="recuperar">&iquest;Has olvidado tus datos?</a></span>
                </div>
            </div>
            <span class="clearfix"></span>
        </div>
<<<<<<< HEAD
        <div class="submit"><a class="enlaceRegistro" href="http://reservasfernandovi.esy.es/usuario/registrar">Reg&iacute;strate aqu&iacute;</a><input type="submit" value="Entrar"/></div>
=======
        <div class="submit"><a class="enlaceRegistro" href="<?= base_url('usuario/registrar') ?>">Reg&iacute;strate aqu&iacute;</a><input type="submit" value="Entrar"/></div>
>>>>>>> 8b60565d2d2ecbdfc7f6f8d9029e39a332260f97
    </form>
</div> <!--End of container-content-->
