<body id="page-top" class="index">

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
                <a class="navbar-brand" href="#page-top">ADMINISTRADOR</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="<?= base_url()?>reservas/crearReservas">Crear reservas</a>
                    </li>
                    <li class="page-scroll">
                        <a href="<?= base_url()?>objetoreservable/editarAulas">Editar Aulas</a>
                    </li>
                    <li class="page-scroll">
                        <a href="<?= base_url()?>reservas/buscarReservasPorPersonas">Buscar Reservas</a>
                    </li>
                    <li class="page-scroll">
                        <a href="<?= base_url() ?>usuario/cerrarSesion">Cerrar Sesi&oacute;n</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="<?= base_url()?>assets/templateBootstrap/img/profile.png" alt="">
                    <div class="intro-text">
                        <span class="name">RESERVAS REY FERNANDO VI</span>
                        <hr class="star-light">
                        <span class="skills">ADMINISTRADOR</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Rey Fernando VI</h3>
                        <p>Av. de Ir&uacute;n, s/n, 28830 <br>San Fernando de Henares, Madrid</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Acerca de nosotros</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Acerca de los centros de la comunidad de Madrid</h3>
                        <p>M&aacute;s informaci&oacute;n en <a href="http://madrid.org">Madrid.org</a>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Your Website 2014
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>
</body>
</html>
