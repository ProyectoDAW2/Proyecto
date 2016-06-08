<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gestor de Espacios</title>

     <!-- A�adimos archivos de jquery -->
    <script type='text/javascript' src='http://reservasfernandovi.esy.es/assets/jquery/jquery-1.12.3.min.js'></script>
    <script type='text/javascript' src='http://reservasfernandovi.esy.es/assets/jquery/jquery-ui.min.js'></script>
    <script type='text/javascript' src='http://reservasfernandovi.esy.es/assets/jquery/jquery.min.js'></script>
    <script type='text/javascript' src='http://reservasfernandovi.esy.es/assets/jquery/jquery.js'></script>


    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="http://reservasfernandovi.esy.es/assets/templateBootstrap/css/bootstrap2.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://reservasfernandovi.esy.es/assets/templateBootstrap/css/freelancer.css" rel="stylesheet">
    
    <!-- Filtrado y Calendario -->
	<link href='http://reservasfernandovi.esy.es/assets/css/main.css' rel='stylesheet' />
    <link href='http://reservasfernandovi.esy.es/assets/css/fullcalendar/fullcalendar.css' rel='stylesheet'/>

    <link href='http://reservasfernandovi.esy.es/assets/css/fullcalendar/fullcalendar.min.css' rel='stylesheet'/>

    <!-- Slider -->

    <link href="http://reservasfernandovi.esy.es/assets/sliderNoUi/nouislider.min.css" rel="stylesheet">
    
    <!-- Custom Fonts -->
    <link href="http://reservasfernandovi.esy.es/assets/templateBootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
	
	<!-- Perfil -->
    <link rel="stylesheet" href="http://reservasfernandovi.esy.es/assets/css/usuario/perfil.css">

	<!-- SweetAlert --> 
    <link rel="stylesheet" type="text/css" href="http://reservasfernandovi.esy.es/assets/sweetalert-master/dist/sweetalert.css">
    
    <!-- Select Buttons -->
    <link rel="stylesheet" href="http://reservasfernandovi.esy.es/assets/Select-Bootstrap/dist/css/bootstrap-select.css">

	<!-- Estilos a�adidos a elementos de esta cabecera -->
	<link rel="stylesheet" href="http://reservasfernandovi.esy.es/assets/templateBootstrap/css/cabecera.css">
	
<title>404 Page Not Found</title>

<style type="text/css">
	#error404 img{
		width: 80%;
		margin-left: 150px;
		margin-top: 150px;
	}
</style>

</head>
<body id="page-top" class="index" >

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="http://reservasfernandovi.esy.es/reservas"><div class="containerLogo"><img id="logoApp" src="http://reservasfernandovi.esy.es/assets/img/logo.png"></div></a>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
						<?php if(isset($_SESSION['idUsuario'])):?>
                        	<a href="http://reservasfernandovi.esy.es/reservas">Reservas</a>
                        <?php endif; ?>
                        <?php if(!isset($_SESSION['idUsuario'])):?>
                        	<a href="http://reservasfernandovi.esy.es/reservas">Reservas</a>
                        <?php endif;?>
                    </li>
                    <li class="page-scroll">
                        <a href="http://reservasfernandovi.esy.es/usuario/perfil">Perfil</a>
                    </li>
                    <li class="page-scroll">
                        <a href="http://reservasfernandovi.esy.es/usuario/contacto">Contacto</a>
                    </li>
                    <li class="page-scroll">
                        <a href="http://reservasfernandovi.esy.es/usuario/cerrarSesion">Cerrar Sesi&oacute;n</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
	<div id="error404">
		<img src="http://reservasfernandovi.esy.es/assets/img/error404.png">
	</div>
</body>
</html>