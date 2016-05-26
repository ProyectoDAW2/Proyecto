<style type="text/css">
	#imagenUsuario {
		width: 50px;
		height: 50px;
		border-radius: 50%;
		background-image: url("http://localhost/ProyectoCalendario/assets/imagenes/perfil/ydyujcgh.jpg");
		background-repeat: no-repeat;
		background-position: center;
		background-size: contain;
		box-shadow: 8px 5px 8px 3px #888888;
		margin-left: 120px;	
		margin-top: -35px;
	}
	
</style>

<script>
	$(document).ready(function(){
		$("#imagenUsuario").css("background-image", "url(http://localhost/ProyectoCalendario/assets/imagenes/perfil/<?= $imagen ?>)");
	});
	
</script>
<h1>Datos cambiados</h1>
<!-- <div style="width: 100px; height: 100px;"><?php echo $imagen ?></div> -->

<div id="imagenUsuario"><!-- <img id="imagen" src="http://reservasfernandovi.esy.es/assets/imagenes/perfil/<?= $imagen ?>"> --></div>

