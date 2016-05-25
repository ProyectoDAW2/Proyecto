var conexion;

function accionAJAX() {
	document.getElementById("aulas").innerHTML=conexion;
}

$(function() {
	
	var numEquipos = document.getElementById('sliderEquipos');

	noUiSlider.create(numEquipos, {
		start: 0,
		range: {
			min: 0,
			max: 50
		},
		
		step:5,
		pips: { // Show a scale with the slider
			mode: 'steps',
			density: 2
		}
	});
	
	var capacidad = document.getElementById('sliderCapacidad');

	noUiSlider.create(capacidad, {
		start: 0,
		range: {
			min: 0,
			max: 100
		},
		
		step:10,
		pips: { // Show a scale with the slider
			mode: 'steps',
			density: 2
		}
	});
	

	var red = "NO";
	var proyector = "NO";


	if (document.getElementById('red').checked) {
		red = document.getElementById('red').value;
	}

	if (document.getElementById('proyector').checked) {
		proyector = document.getElementById('proyector').value;
	}
	$("#enviarFiltro").click(function () {
		var categoria = document.getElementById('categoria').value;
		equipos = numEquipos.noUiSlider.get();
		capacidad = capacidad.noUiSlider.get();
		console.log(capacidad);
		$.ajax("reservas/filtrarPost", {
			type: "POST",
			data: {
				"categoria": categoria,
				"red": red,
				"proyector": proyector,
				"equipos": equipos,
				"capacidad": capacidad
			},
			
			success: function (response) {
				conexion=response;
				accionAJAX();
			}
		});

	});


	/*conexion = new XMLHttpRequest();

	 conexion.open('POST', "http://localhost/calendario/booking/filtrarPost", true);
	 conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	 conexion.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	 conexion.send("categoria="+categoria+"&red="+red+"&proyector="+proyector+"&equipos="+equipos+"&capacidad="+capacidad);


	 conexion.onreadystatechange = function() {
	 if (conexion.readyState==4 && conexion.status==200) {
	 accionAJAX();
	 }
	 }*/
/*
	$(function () {
		$("#sliderEquipos").slider({
			value: 0,
			min: 0,
			max: 50,
			step: 5,
			slide: function (event, ui) {
				$("#equipos").val(ui.value);
			}
		});
		$("#equipos").val($("#sliderEquipos").slider("value"));

		$("#sliderCapacidad").slider({
			value: 10,
			min: 10,
			max: 200,
			step: 10,
			slide: function (event, ui) {
				$("#capacidad").val(ui.value);
			}
		});
		$("#capacidad").val($("#sliderCapacidad").slider("value"));
	});*/


});