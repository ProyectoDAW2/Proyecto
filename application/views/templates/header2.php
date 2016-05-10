<!DOCTYPE html>
<html>
<head>
	<?php if($pantalla=="login"){?>
    <!-- CSS -->
    <link href='<?= base_url() ?>assets/css/main.css' rel='stylesheet' />
    <link href='<?= base_url() ?>assets/css/bootstrap/business-casual.css' rel='stylesheet' />
    <?php }else{?>
    <link href='<?= base_url() ?>assets/css/usuario/registro.css' rel='stylesheet' />
    <?php }?>
    
    <!-- SCRIPTS -->
    <script type='text/javascript' src='<?= base_url() ?>assets/jquery/jquery-1.12.3.min.js'></script>
    <script type='text/javascript' src='<?= base_url() ?>assets/js/main.js'></script>
    <script type='text/javascript' src='<?= base_url() ?>assets/js/bootstrap/bootstrap.min.js'></script>
    <script type='text/javascript' src='<?= base_url() ?>assets/js/bootstrap/bootstrap.js'></script>
    <script type='text/javascript' src='<?= base_url() ?>assets/js/fullcalendar/moment.js'></script>
    <script type='text/javascript' src='<?= base_url() ?>assets/js/fullcalendar/fullcalendar.min.js'></script>
</head>
<body>