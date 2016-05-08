<div class="container">
	<h1>Date</h1>
	<div id='calendar'></div>
	<div class="modalContainer hidden" id="bookingModal">
		<div class="backdrop"></div>
		<div class="customModal">
			<h2 class="date" id="datePicked"></h2>
			<p>
				<label><input type="checkbox" name="hours[]" id="1" class="hours" value="8:20-9:15"> 8:20-9:15</label>
			</p>
			<p>
				<label><input type="checkbox" name="hours[]" id="1" class="hours" value="9:15-10:10"> 9:15-10:10</label>
			</p>
			<p>
				<label><input type="checkbox" name="hours[]" id="1" class="hours" value="10:10-11:00"> 10:10-11:00</label>
			</p>
			<p>
				<label><input type="checkbox" name="hours[]" id="1" class="hours" value="11:00-11:35"> 11:00-11:35</label>
			</p>
			<p>
				<label><input type="checkbox" name="hours[]" id="1" class="hours" value="11:35-12:30"> 11:35-12:30</label>
			</p>
			<p>
				<label><input type="checkbox" name="hours[]" id="1" class="hours" value="12:30-13:25"> 12:30-13:25</label>
			</p>
			<p>
				<label><input type="checkbox" name="hours[]" id="1" class="hours" value="13:25-14:20"> 13:25-14:20</label>
			</p>
			<p>
				<button class="submit">Confirm booking</button>
			</p>
		</div>
	</div>
</div>
<script type="text/javascript">
/* Javascript */
$(function(){
	var date=new Date();

$(".submit").click(function(){
	//TODO: comprobación de los datos
	var hours=$("#bookingModal .hours:checked");
	var hoursParsed=[];
	for(var i=0; i<hours.length; i++){
		hoursParsed.push($(hours[i]).val());
	}
	console.log(hoursParsed);
	$.ajax("<?= base_url() ?>booking/createPost", {
		type: "POST",
		dataType: "JSON",
		data: {
			date: $("#bookingModal .date").text(),
			hours: hoursParsed
		},
		complete: function(response){
			var result=JSON.parse(response.responseText);
			console.log(result);
			if(result.isValid){
				$("#bookingModal").addClass("hidden");
			}
		}
	});
});

	$('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		firstDay: 1,
		editable: true,
		dayRender: function(date, cell) {
			$(cell).append("<div class='spheres' value='8:20-9:15'></div><div class='spheres' value='9:15-10:10'></div><div class='spheres' value='10:10-11:00'></div><div class='spheres' value='11:00-11:35'></div><div class='spheres' value='11:35-12:30'></div><div class='spheres' value='12:30-13:25'></div><div class='spheres' value='13:25-14:20'></div>");

			//Buscaremos las reservas de ese aula al renderizar los días
			$.ajax("<?= base_url() ?>booking/listarReservaPost", {
				type: "POST",
				dataType: "json",
				contentType: "application/json",
				success: function(data){
					var length=data.length;
					for (i=0;i<length;i++) {
						var post=data[i];
						$("[data-date="+post.fecha+"]").find(".spheres[value='"+post.hora+"']").val("+post.hora+").css("background-color", "red");
						console.log("Reservado el "+ post.fecha +" a las "+post.hora);
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
});
</script>