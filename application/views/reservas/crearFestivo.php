
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

            <a class="navbar-brand" href="<?= base_url()?>reservas">Gestor Espacios</a>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li class="page-scroll">

                    <a href="<?= base_url()?>reservas">Reservas</a>
                </li>
                <li class="page-scroll">
                    <a href="<?= base_url()?>usuario/perfil">Perfil</a>
                </li>
                <li class="page-scroll">
                    <a href="<?= base_url()?>usuario/contacto">Contacto</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<section id="perfil">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Festivos</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <form  action="<?= base_url()?>usuario/perfilPost" method="post" class="form-horizontal" enctype="multipart/form-data">
                <fieldset>
                    <!-- Nombre -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="nombreDay">Nombre del día </label>
                        <div class="col-md-4">
                            <input id="nombreDay" name="nombreDay" type="text" placeholder="" class="form-control input-md" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="fechaInicio">Fechas de inicio y fin </label>
                        <div class="col-md-2">
                            <input id="datepickerInicio" name="fechaInicio" type="text" placeholder="AAAA-MM-DD" class="form-control input-md" value="">
                        </div>
                        <div class="col-md-2">
                            <input id="datepickerFin" name="fechaFin" type="text" placeholder="AAAA-MM-DD" class="form-control input-md" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="nombreDay">Tipo de festivo </label>
                        <div class="col-md-4">
                            <select class="form-control input-md tipoFestivos">
                                <option value="" selected="selected">Elige un tipo</option>
                                <option value="festivoNacional">Festivo nacional</option>
                                <option value="festivoAutonomico">Festivo autonómico</option>
                                <option value="festivoLocal">Festivo local</option>
                                <option value="inifinlectivo">Inicio/Final lectivo</option>
                            </select>
                        </div>
                    </div>
                    <!-- Boton -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="guardar"></label>
                        <div class="col-md-4">
                            <!-- <button id="guardar" name="guardar" class="botonPerfil btn btn-danger" onclick="modify()">Guardar cambios</button> -->
                            <input type="button" id="guardar" name="guardar" class="colorFondoBoton letraBoton botonPerfil btn"  value="Guardar cambios">
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(function() {
        $( "#datepickerInicio" ).datepicker({ dateFormat: 'yy-mm-dd' });
    });
    $(function() {
        $( "#datepickerFin" ).datepicker({ dateFormat: 'yy-mm-dd' });
    });

$(document).on("click","#guardar", function(){
    var nombre=$("#nombreDay").val();
    var inicio=$("#datepickerInicio").val();
    var fin=$("#datepickerFin").val();
    var tipo=$( ".tipoFestivos option:selected" ).val();

    console.log("NOMBRE :"+nombre+" INICIO DEL PERIODO "+inicio+" Y FIN "+fin+"  TIPO  "+tipo);
    $.ajax("http://reservasfernandovi.esy.es/reservas/crearFestivoPost", {
        type: "POST",
        dataType: 'text',
        data: {
            'nombre': nombre,
            'inicio':inicio,
            'fin':fin,
            'tipo':tipo
        },
        complete: function(response){
            console.log(response);
        }
    });
});

</script>
</body>
</html>