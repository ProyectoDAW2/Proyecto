
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
					</div> <img
<<<<<<< HEAD
					src="http://reservasfernandovi.esy.es/assets/templateBootstrap/img/portfolio/cabin.png"
=======
					src="<?= base_url() ?>assets/templateBootstrap/img/portfolio/cabin.png"
>>>>>>> 8b60565d2d2ecbdfc7f6f8d9029e39a332260f97
					class="img-responsive" alt="">
				</a>
			</div>
			<div class="col-sm-6 portfolio-item">
				<a href="#portfolioModal2" class="portfolio-link"
					data-toggle="modal">
					<div class="caption">
						<div class="caption-content">
							<i class="fa fa-search-plus fa-3x"></i>
						</div>
					</div> <img
<<<<<<< HEAD
					src="http://reservasfernandovi.esy.es/assets/templateBootstrap/img/portfolio/cake.png"
=======
					src="<?= base_url() ?>assets/templateBootstrap/img/portfolio/cake.png"
>>>>>>> 8b60565d2d2ecbdfc7f6f8d9029e39a332260f97
					class="img-responsive" alt="">
				</a>
			</div>

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
					<div class="col-md-4 col-xd-12 col-md-offset-2">
						<div class="modal-body">
							<h4>Filtrado</h4>
							<p>
								Categor&iacute;a 
								<select name="categoria" id="categoria">
									<option value="todas" selected>Todas</option>
                                        <?php foreach ($categorias as $categoria):?>
                                         <?php foreach($categoria as $categ=>$nombre): ?>
                                         <option value="<?= $nombre ?>">
                                         <?= $nombre?>
                                         </option>
                                         <?php endforeach; ?>
                                          <?php endforeach;?>
                                    </select>
							</p>
							<label for="fancy-checkbox-default" class="[ btn btn-default active ]"> Red </label>

							<div class="checkbox">
								<label> <input type="checkbox" name="red" id="red"> Red </label>
							</div>
							<p>Proyector <input type="checkbox" name="proyector" id="proyector"/></p>
							<p><label for="equipos">N&uacute;mero de equipos:</label></p>
							<p><div id="sliderEquipos"></div></p>
							<p><br> <label for="capacidad">Capacidad del aula:</label></p>
							<p><div id="sliderCapacidad"></div></p>
							<br> <br>
							<button type="submit" id="enviarFiltro" class="btn btn-success btn-md">Enviar</button>
						</div>
					</div>
					<div class="col-md-4">
						<div class="modal-body">
							<h4>Aulas Disponibles</h4>
							<div id="aulas" name="aulas"></div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<h4>Calendario</h4>
					<div id='calendar'></div>
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
<<<<<<< HEAD
=======

						<label class="col-sm-12 control-label">Tipo de evento</label>



>>>>>>> 8b60565d2d2ecbdfc7f6f8d9029e39a332260f97
						<p>
							<button class="submit">Confirm booking</button>

						</p>

					</div>
				</div>

			</div>
			<button type="button" class="btn btn-default" data-dismiss="modal">
				<i class="fa fa-times"></i> Close
			</button>

		</div>
	</div>
</div>
</div>
</div>
<script type="text/javascript">
<<<<<<< HEAD
	console.log("el num es");
=======
$(function(){
	var date=new Date();
	var num="";
	var id="";
	
	$("#aulas").on("click",".result", function(e){
		var num=$(this).text();
		var id=$(this).val();
		alert("refrescando el calendario"+num);
		console.log("el num es"+id);
	
		$.ajax("<?= base_url() ?>reservas/listarReserva", {
			type: "POST",
			contentType: "application/x-www-form-urlencoded",
			dataType: 'text',
			data: {'num': num},
			complete: function(response){
				console.log("de nuevo "+num);
				//$('#calendar').html('');
				//$('#calendar').removeAttr('class');
				$('#calendar').fullCalendar('destroy');
				//SE DIBUJA EL CALENDARIO
				setTimeout(function() {
					console.log("Dibujando calendario... "+num);
					$('#calendar').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,agendaWeek'
					},
					aspectRatio: 1,
					
					firstDay: 1,
					editable: true,
					dayRender: function(date, cell) {
						$(cell).append("<div class='spheres' value='8:20-9:15'></div><div class='spheres' value='9:15-10:10'></div><div class='spheres' value='10:10-11:00'></div><div class='spheres' value='11:00-11:35'></div><div class='spheres' value='11:35-12:30'></div><div class='spheres' value='12:30-13:25'></div><div class='spheres' value='13:25-14:20'></div>");
						$(".fc-sun").addClass("disabled").children('.spheres').remove();
						$(".fc-sat").addClass("disabled").children('.spheres').remove();
						$(".fc-past").addClass("disabled").children('.spheres').css('background-color', 'blue');
						$(".fc-other-month").addClass("disabled");
						$(".spheres").addClass("disabled");
	
						//Buscaremos las reservas de ese aula al renderizar los días
						$.ajax("<?= base_url() ?>reservas/listarReservaPost", {
							type: "POST",
							success: function(data){
								var length=data.length;
								for (i=0;i<length;i++) {
									var post=data[i];
									$("[data-date="+post.fecha+"]").find(".spheres[value='"+post.hora+"']").val("+post.hora+").css("background-color", "red");
								}
							}
						});
					},
					dayClick: function(date, jsEvent, view)
					{
						var modal=$("#bookingModal");
						modal.find(".date").text(date.format('YYYY-MM-DD'));
						modal.removeClass("hidden");
						console.log(date.format('YYYY-MM-DD'));
					}
				});
				}, 500);}
		});
 //<------$(this).click(function(){

	$(".submit").click(function(){
		//TODO: comprobación de los datos
		var hours=$("#bookingModal .hours:checked");
		var hoursParsed=[];
		var idAula=id;
		var numAula=num;
		var dates=$("#bookingModal .date").text();
		var dateArray=dates.split(',');
	
		
		console.log(idAula);
	
		for(var i=0; i<hours.length; i++){
			hoursParsed.push($(hours[i]).val());
		}
		console.log("las hours son"+dates);
		for(var i=0; i<dateArray.length; i++) {
			$.ajax("<?= base_url() ?>reservas/createPost", {
				type: "POST",
				data: {
					"date": dateArray[i],
					"hours": hoursParsed,
					"idAula": idAula
				},
				complete: function (response) {
					var result = (response.responseText);
					console.log(result);
					if (result.isValid) {
						$("#bookingModal").addClass("hidden");
						//Con vistas a probar si se referesca
						$('#calendar').fullCalendar( 'render' );
					}
				}
			});
		}
	});

	$(document).on('click', '.fc-day-header', function(){
		var day=$(this).text();
		day=day.toLowerCase();
		var fc="fc-"+day;
		var arrayDayWeek=[];
	
		$('td.'+fc+':not(.fc-past, fc-other-month)').each(function() {
				arrayDayWeek.push($(this).attr("data-date"));
				$(this).css("background-color","grey");
		});
		console.log(arrayDayWeek);
		var modal=$("#bookingModal");
		modal.find(".date").text(arrayDayWeek);
		modal.removeClass("hidden");
	});
});
});
/*
var modal=$("#bookingModal");
modal.find(".date").text(date.format('YYYY-MM-DD'));
modal.removeClass("hidden");
console.log(date.format('YYYY-MM-DD'));

for(var i=0; i<hours.length; i++){
	hoursParsed.push($(hours[i]).val());
}
console.log(hoursParsed);
$.ajax("<?= base_url() ?>reservas/createPost", {
	type: "POST",
	data: {
		"date": $("#bookingModal .date").text(),
		"hours": hoursParsed,
		"idAula": idAula
	},
	complete: function(response){
		var result=(response.responseText);
		console.log(result);
		if(result.isValid){
			$("#bookingModal").addClass("hidden");
		}
	}
});
*/
>>>>>>> 8b60565d2d2ecbdfc7f6f8d9029e39a332260f97
</script>

