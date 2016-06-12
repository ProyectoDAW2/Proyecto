var conexion;

function accionAJAX() {
	document.getElementById("aulas").innerHTML=conexion;
}

$(function() {
	noUiSlider.create(document.getElementById('sliderEquipos'), {
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
	noUiSlider.create(document.getElementById('sliderCapacidad'), {
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
		console.log("Enviando aulas...");
		var categoria = document.getElementById('categoria').value;
		equipos = document.getElementById('sliderEquipos').noUiSlider.get();
		capacidad = document.getElementById('sliderCapacidad').noUiSlider.get();
		console.log("Capacidad del slider "+capacidad);
		$.ajax("http://reservasfernandovi.esy.es/reservas/filtrarPost", {
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
});