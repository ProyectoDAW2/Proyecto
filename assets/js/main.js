/*
$(document).ready(function(){
    $(".modalContainer .backdrop").click(function () {
        $(this).parent().addClass("hidden");
    });
});
//Si se clicka un día se abre una ventana con las horas.
$(document).ready(function(){
    var date = new Date();
    $("#aulas").on("click",".result", function(){
        num=$(this).text();
        id=$(this).val();
        alert("refrescando el calendario "+num);
        $.ajax("http://reservasfernandovi.esy.es/reservas/listarReserva", {
            type: "POST",
            contentType: "application/x-www-form-urlencoded",
            dataType: 'text',
            data: {'num': num},
            complete: function(response){
                console.log("de nuevo "+num);
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
                        fixedWeekCount: false,
                        firstDay: 1,
                        editable: true,
                        weekends: false,
                        aspectRatio: 1,
                        dayRender: function(date, cell) {
                            $(cell).append("<div class='spheres' value='8:20-9:15'></div><div class='spheres' value='9:15-10:10'></div><div class='spheres' value='10:10-11:00'></div><div class='spheres' value='11:00-11:35'></div><div class='spheres' value='11:35-12:30'></div><div class='spheres' value='12:30-13:25'></div><div class='spheres' value='13:25-14:20'></div>");
                            $(".fc-past").addClass("disabled").children('.spheres').css('background-color', 'blue');
                            $(".spheres").addClass("disabled");

                            //Buscaremos las reservas de ese aula para que las esferas cambíen su color
                            $.ajax("http://reservasfernandovi.esy.es/reservas/listarReservaPost", {
                                type: "POST",
                                success: function(data){
                                    var length=data.length;
                                    for (i=0;i<length;i++) {
                                        var post=data[i];
                                        $("[data-date="+post.fecha+"]").find(".spheres[value='"+post.hora+"']").val("+post.hora+").css("background-color", "red");
                                    }
                                }
                            });
                            //Días de vacaciones
                            $(".fc-past").addClass("disabled").children('.spheres').css('background-color', 'blue');
                            $( ".fc-past").css('background-color','#E6E6E6');
                        },
                        dayClick: function(date, jsEvent, view){
                            var modal=$("#bookingModal");
                            modal.find(".date").text(date.format('YYYY-MM-DD'));
                            modal.removeClass("hidden");
                            var date=date.format('YYYY-MM-DD');
                            $('input:checkbox').removeAttr('checked');
                        }
                    });
                }, 500);}
        });
    });
});

//<------$(this).click(function(){
$('#calendar').off('click','.fc-past',function() {
});

//Función para dibujar en el calendario las reservas hechas
$('#calendar').on('click','.fc-day',function() {
    var date=$('.date').text();
    var horasArray=[];
    $(".hours").each(function(){
        ($(".hours").removeAttr('disabled'));
    });
    $('.spheres').filter(function() {
        return $(this).css('background-color') == 'red';
    });
    $.ajax("http://reservasfernandovi.esy.es/reservas/listarReservaPost", {
        type: "POST",
        success: function(data){
            console.log(data);
            var length=data.length;
            for (i=0;i<length;i++) {
                var post=data[i];
                if(post.fecha==date) {
                    horasArray.push(post.hora);
                }
            }
            for (var i=0;i<horasArray.length;i++) {
                $(".customModal").find(".hours[value='" + horasArray[i] + "']").val("+horasArray[i]+").prop("disabled", true);
            }
        }
    });
});
//Función para crear reservas.
$(document).on('click', '.submitReserva', function(){
    var hours=$("#bookingModal .hours:checked");
    var hoursParsed=[];
    var idAula=id;
    var dates=$("#bookingModal .date").text();
    var dateArray=dates.split(',');
    for(var i=0; i<hours.length; i++){
        hoursParsed.push($(hours[i]).val());
    }
    console.log("== Vamos a comprobar los datos ==");
    console.log("Fecha : "+dateArray);
    console.log("Horas : "+hoursParsed);
    for(var i=0; i<dateArray.length; i++) {
        $.ajax("http://reservasfernandovi.esy.es/reservas/createPost", {
            type: "POST",
            data: {
                "date": dateArray[i],
                "hours": hoursParsed,
                "idAula": idAula
            },
            success: function (response) {
                var result = (response.responseText);
                console.log("Reserva creada");
            }
        });
    }
});

//Deshabilitar las horas que ya están reservadas ese día.
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
*/
