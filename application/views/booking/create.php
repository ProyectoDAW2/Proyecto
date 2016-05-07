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
//BUSCAMOS RESERVAS
	$.ajax("<?= base_url() ?>booking/listarReservaPost", {
		type: "POST",
		dataType: "text",
		data: {
			date: date,
			hours: hours
		},
		complete: function(data){
			var dateC=data[0];
			console.log(dateC);
			var hourC=data[1];0
			var dateCalendar=document.getElementById("datePicked");
			if(dateC.value=dateCalendar.value){
				$(".hours").attr("disabled", true);
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
			$(cell).append("<div class='spheres'></div><div class='spheres'></div><div class='spheres'></div><div class='spheres'></div><div class='spheres'></div><div class='spheres'></div><div class='spheres'></div>");
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