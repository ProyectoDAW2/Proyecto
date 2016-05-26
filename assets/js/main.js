<<<<<<< HEAD
$(document).ready(function () {
    //Si se clicka un día se abre una ventana con las horas.
    $(".modalContainer .backdrop").click(function () {
        console.log($(this));
        $(this).parent().addClass("hidden");
    });

    var date = new Date();
    $("#aulas").on("click",".result", function(){
        num=$(this).text();
        id=$(this).val();
        alert("refrescando el calendario"+num);
        console.log("el num es"+id);
        $.ajax("http://reservasfernandovi.esy.es//reservas/listarReserva", {
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
                            $(".fc-other-month").addClass("disabled");
                            $(".spheres").addClass("disabled");
                            //Buscaremos las reservas de ese aula al renderizar los d�as
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
                        },
                        dayClick: function(date, jsEvent, view){
                            var modal=$("#bookingModal");
                            modal.find(".date").text(date.format('YYYY-MM-DD'));
                            modal.removeClass("hidden");
                            var date=date.format('YYYY-MM-DD');
                            $('input:checkbox').removeAttr('checked');
                            //$(".hours").removeAttr('disabled');
                        }
                    });
                }, 500);}
        });
    });
    //<------$(this).click(function(){

    $('#calendar').on('click','.fc-day',function() {
        var date=$('.date').text();
        var horasArray=[];
        $(".hours").each(function(){
            ($(".hours").removeAttr('disabled'));
        });
        console.log("La fecha clickada es  "+date);
        $('.spheres').filter(function() {
            return $(this).css('background-color') == 'red';
        });

        $.ajax("http://reservasfernandovi.esy.es/reservas/listarReservaPost", {
            type: "POST",
            cache: false,
            success: function(data){
                var length=data.length;
                for (i=0;i<length;i++) {
                    var post=data[i];
                    if(post.fecha==date) {
                        horasArray.push(post.hora);
                    }
                }
                console.log("Fechas "+date+" es igual a "+post.fecha+" ?");
                console.log(horasArray);
                console.log(horasArray.length);

                for (var i=0;i<horasArray.length;i++) {
                    $(".customModal").find(".hours[value='" + horasArray[i] + "']").val("+horasArray[i]+").prop("disabled", true);
                }
            }
        });
    });

    $(".submit").click(function(){
        var hours=$("#bookingModal .hours:checked");
        var hoursParsed=[];
        var idAula=id;
        var numAula=num;
        var dates=$("#bookingModal .date").text();
        var dateArray=dates.split(',');
        for(var i=0; i<hours.length; i++){
            hoursParsed.push($(hours[i]).val());
        }
        for(var i=0; i<dateArray.length; i++) {
            $.ajax("http://reservasfernandovi.esy.es/reservas/createPost", {
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
=======
$(document).ready(
    function () {
        $(".modalContainer .backdrop").click(function () {
            console.log($(this));
            $(this).parent().addClass("hidden");
        });
    }
);
>>>>>>> 8b60565d2d2ecbdfc7f6f8d9029e39a332260f97
