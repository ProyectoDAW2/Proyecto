<style type="text/css">
	#imagenUsuario {
		width: 50px;
	}
	#imagen{
		width: 70%;
		height: 30px;
		padding: 0; 
		margin: 0; 
		border: none;
		border-radius: 50%;
		box-shadow: 0px 2px 5px;
	}
</style>
<h1>Datos cambiados</h1>
<!-- <div style="width: 100px; height: 100px;"><?php echo $imagen ?></div> -->
<div id="imagenUsuario"><img id="imagen" src="<?= base_url() ?>assets/imagenes/perfil/<?= $imagen ?>"></div>