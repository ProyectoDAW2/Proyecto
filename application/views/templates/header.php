<!DOCTYPE html>
<html>
<head>
    <!-- CSS -->
    <link href='<?= base_url() ?>assets/css/main.css' rel='stylesheet' />
    <link href='<?= base_url() ?>assets/css/bootstrap/business-casual.css' rel='stylesheet' />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/sweetalert-master/dist/sweetalert.css">
    <!--
    <link href='<?= base_url() ?>assets/css/fullcalendar/fullcalendar.css' rel='stylesheet'/>
    <link href='<?= base_url() ?>assets/css/fullcalendar/fullcalendar.min.css' rel='stylesheet'/>
    <link href='<?= base_url() ?>assets/css/fullcalendar/fullcalendar.print.css' rel='stylesheet'/>
    -->

        <link href='//arshaw.com/js/fullcalendar-1.5.3/fullcalendar/fullcalendar.css' rel='stylesheet' />
        <link href='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.7.1/fullcalendar.min.css' type='text/css' rel='stylesheet' />
        <link href='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.7.1/fullcalendar.print.css' media='print' type='text/css' rel='stylesheet' />

    <!-- SCRIPTS -->
    <script type='text/javascript' src='<?= base_url() ?>assets/jquery/jquery-1.12.3.min.js'></script>
    <script type='text/javascript' src='<?= base_url() ?>assets/js/main.js'></script>
    <script type='text/javascript' src='<?= base_url() ?>assets/js/bootstrap/bootstrap.min.js'></script>
    <script type='text/javascript' src='<?= base_url() ?>assets/js/bootstrap/bootstrap.js'></script>
    <script type='text/javascript' src='<?= base_url() ?>assets/js/fullcalendar/moment.js'></script>
    <script type='text/javascript' src='<?= base_url() ?>assets/js/fullcalendar/fullcalendar.min.js'></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/sweetalert-master/dist/sweetalert.min.js"></script> 
    
</head>
<body>
<div class="navbar-header">
    <div class="brand">Booking Aulas</div>
    <div class="menu">
        <ul>
            <li><a href="<?=base_url('usuario/perfil')?>">Perfil</a></li>
            <li><a href="<?=base_url('booking/create')?>">Reserva</a></li>
            <li><a href="<?=base_url('objetoreservable/modificar')?>">OR modificar</a></li>
        </ul>
    </div>
</div>