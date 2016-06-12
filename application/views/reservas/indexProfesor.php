<!-- Zona Reservas -->
<section id="portfolio">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2>INICIO</h2>
				<hr class="star-primary">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 portfolio-item">
				<a href="#reservasAulas" class="portfolio-link" data-toggle="modal">
					<div class="caption">
						<div class="caption-content">
							<i class="fa fa-search-plus fa-3x"></i>
						</div>
					</div> <img src="<?= base_url()?>assets/templateBootstrap/img/portfolio/crearreserva.png" class="img-responsive" alt="">
				</a>
			</div>
			<div class="col-sm-6 portfolio-item">
				<a href="#listarReservas" class="portfolio-link"
				   data-toggle="modal">
					<div class="caption">
						<div class="caption-content">
							<i class="fa fa-search-plus fa-3x"></i>
						</div>
					</div> <img src="<?= base_url()?>assets/templateBootstrap/img/portfolio/listarreserva.png" class="img-responsive" alt="">
				</a>
			</div>
			<?php if(isset($cookies)):?>
				<div class="container-cookie" id="containerCookie">
					<h4 class="tituloCookie" id="cookiescript_header">Esta p&aacute;gina usa cookies</h4>Si contin&uacute;a navegando por esta p&aacute;gina, asumimos que acepta la <a class="enlaceCookie" href="http://www.politicadecookies.com">pol&iacute;tica de cookies</a><br>

					<button class="aceptarCookies" id="cookiescript_accept" onclick="controlcookies()">Cerrar</button>

					<button class="leerMas" id="cookiescript_readmore">Leer m&aacute;s</button>

				</div>
			<?php endif; ?>
		</div>
	</div>

</section>


<!-- Footer -->
<footer class="text-center">
	<div class="footer-above">
		<div class="container">
			<div class="row">
				<div class="footer-col col-md-4">
					<h3>Rey Fernando VI</h3>
					<p>
						Av. de Ir&uacute;n, s/n, 28830 <br>San Fernando de Henares, Madrid
					</p>
				</div>
				<div class="footer-col col-md-4">
					<h3>Acerca de Nosotros</h3>
					<ul class="list-inline">
						<li><a href="https://www.facebook.com/reyfernandovi.ies?ref=br_rs"
							   class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
						</li>
						<li><a href="#" class="btn-social btn-outline"><i
									class="fa fa-fw fa-google-plus"></i></a></li>
						<li><a href="#" class="btn-social btn-outline"><i
									class="fa fa-fw fa-twitter"></i></a></li>
						<li><a href="#" class="btn-social btn-outline"><i
									class="fa fa-fw fa-linkedin"></i></a></li>
						<li><a href="#" class="btn-social btn-outline"><i
									class="fa fa-fw fa-dribbble"></i></a></li>
					</ul>
				</div>

				<div class="footer-col col-md-4">
					<h3>Acerca de los Centros de la comunidad de Madrid</h3>
					<p>
						M&aacute;s informaci&oacute;n en <a
							href="http://www.madrid.org/cs/Satellite?pagename=ComunidadMadrid/Home">Madrid.org</a>.
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-below">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">Copyright &copy; Your Website 2014</div>
			</div>
		</div>
	</div>
</footer>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll visible-xs visible-sm">
	<a class="btn btn-primary" href="#page-top"> <i
			class="fa fa-chevron-up"></i>
	</a>
</div>

<!-- Portfolio Modals -->
<div class="portfolio-modal modal fade" id="reservasAulas" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-content">
		<div class="close-modal" data-dismiss="modal">
			<div class="lr">
				<div class="rl"></div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2>Calendario</h2>
					<hr class="star-primary">
					<div class="col-md-6 col-xd-12 col-md-offset-1">
						<div class="modal-body">
							<h4>Filtrado</h4>
							<hr class="star-primary">
							<p>

								<label>Categor&iacute;a</label>
								<select class="selectpicker" name="categoria" id="categoria" data-style="btn btn-primary active" >
									<option value="todas" selected>Todas</option>
									<?php foreach ($categorias as $categoria):?>
										<?php foreach($categoria as $categ=>$nombre): ?>
											<option value="<?= $nombre ?>"><?= $nombre?>
											</option>
										<?php endforeach; ?>
									<?php endforeach;?>
								</select>
							</p>
							<label class="btn btn-primary active">
								<input type="checkbox" name="red" id="red"/> Red
							</label>
							<label class="btn btn-primary active">
								<input type="checkbox" name="proyector" id="proyector"/> Proyector
							</label>
							<p><label for="equipos">N&uacute;mero de equipos:</label></p>
							<p><div id="sliderEquipos"></div></p>
							<p><br> <label for="capacidad">Capacidad del aula:</label></p>
							<p><div id="sliderCapacidad"></div></p>
							<br> <br>
							<button type="submit" id="enviarFiltro" class="btn btn-success btn-md">Enviar</button>
						</div>
					</div>
					<div class="col-md-3">
						<div class="modal-body">
							<h4>Aulas Disponibles</h4>
							<hr class="star-primary">
							<div id="aulas" name="aulas"></div>
						</div>
					</div>
				</div>
				<div class="col-md-2">
				</div>
				<div class="col-md-8">
					<h4>Calendario</h4>
					<div id='calendar'></div>
				</div>
				<div class="col-md-2">
				</div>
				<div class="modalContainer hidden" id="bookingModal">
					<div class="backdrop"></div>
					<div class="customModal">
						<h2 class="date" id="datePicked"></h2>

						<p>
							<label> <input type="checkbox" name="hours[]" id="1"
										   class="hours" value="8:20-9:15"> 8:20-9:15
							</label>
						</p>
						<p>
							<label> <input type="checkbox" name="hours[]" id="1"
										   class="hours" value="9:15-10:10"> 9:15-10:10
							</label>
						</p>
						<p>
							<label> <input type="checkbox" name="hours[]" id="1"
										   class="hours" value="10:10-11:00"> 10:10-11:00
							</label>
						</p>
						<p>
							<label> <input type="checkbox" name="hours[]" id="1"
										   class="hours" value="11:00-11:35"> 11:00-11:35
							</label>
						</p>
						<p>
							<label> <input type="checkbox" name="hours[]" id="1"
										   class="hours" value="11:35-12:30"> 11:35-12:30
							</label>
						</p>
						<p>
							<label> <input type="checkbox" name="hours[]" id="1"
										   class="hours" value="12:30-13:25"> 12:30-13:25
							</label>
						</p>
						<p>
							<label> <input type="checkbox" name="hours[]" id="1"
										   class="hours" value="13:25-14:20"> 13:25-14:20
							</label>
						</p>

						<p>
							<button class="submitReserva">Confirmar reserva</button>

						</p>

					</div>
				</div>

			</div>
			<button type="button" class="btn btn-default" data-dismiss="modal">
				<i class="fa fa-times"></i> Cerrar
			</button>

		</div>
	</div>
</div>


<div class="portfolio-modal modal fade" id="listarReservas" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-content">
		<div class="close-modal" data-dismiss="modal">
			<div class="lr">
				<div class="rl">
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>Sus Aposentos</h2>
					<hr class="star-primary">
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 col-lg-offset-2 listarReservas">


				</div>

			</div>
		</div>
		<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>

	</div>
</div>
</div>