<html>
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="http://reservasfernandovi.esy.es/assets/css/bootstrap/bootstrap-330.css">

		<!-- Website CSS style -->
		<link rel="stylesheet" type="text/css" href="http://reservasfernandovi.esy.es/assets/css/usuario/registro2.css">

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

	</head>
	<body>
		<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Booking Aulas</h1>
	               		<hr />
	               	</div>
	            </div> 
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="<?=base_url('usuario/registrarPost')?>">
                        
                        <div class="form-group">
    						<label for="nick" class="cols-sm-2 control-label">Nick</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="nick" id="nick"  placeholder="Nombre de usuario"/>
								</div>
							</div>
						</div>
                        
                        <div class="form-group">
    						<label for="password" class="cols-sm-2 control-label">Contrase&ntilde;a</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Contrase&ntilde;a"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password2" class="cols-sm-2 control-label">Repite la contrase&ntilde;a</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password2" id="password2"  placeholder="Repite contrase&ntilde;a"/>
								</div>
							</div>
						</div>
                        
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="correo" id="correo"  placeholder="Correo electr&oacute;enico"/>
								</div>
							</div>
						</div>
                        
                        <div class="form-group">
    						<label for="clave" class="cols-sm-2 control-label">Clave del centro</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="clave" id="clave" placeholder="Clave del centro"/>
								</div>
							</div>
						</div>
						<input type="text" id="res" name="res" hidden/>
						<div class="form-group ">
							<button type="submit" onclick="registrar()" class="btn btn-danger btn-lg btn-block login-button">Registrarme</button>
						</div>
						<div class="login-register">
				            <a href="<?= base_url('usuario/login') ?>">Login</a>
				         </div>
					</form>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="assets/js/bootstrap/bootstrap.js"></script>
		<script type="text/javascript" src="http://reservasfernandovi.esy.es/assets/js/usuario/registro.js"></script>
	</body>
</html>