<section id="buscadorDeReservas">
  <div class="container">
  <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>BUSCADOR DE RESERVAS</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">

			<div class="col-sm-12 col-md-12 text-center portfolio-item">
			<div class="row control-group">
                            <div class="form-group col-xs-8 col-xs-offset-2 floating-label-form-group controls">
                                <label>Introduce nombre y apellidos, nick o correo del Usuario</label>
                                <input type="text" id="nombre" class="form-control" name="nombre" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>    
				 
				 <div class="form-group col-md-6 col-md-offset-3">
				<button type="button" id="buscar" name="buscar" value="Buscar" class="botonPerfil btn btn-warning btn-md btn-block login-button">Buscar</button> 
				</div>
			</div>
			</div>
			
		

		
					<div class="col-sm-12 col-md-12 resultado">
	</div>	
	</div>
</section>


<script type="text/javascript">			
		$(document).ready(function(){
			$(".resultado").on('click', "#borrarTodas",  function() {
				var x=0;
				var reservas=[];
				$(".idParaBorrar").each(function(){
					reservas[x]=$(this).attr("id");
					x++;
					});
				
			    $.ajax( {
			        type: "POST",

			        url:"http://reservasfernandovi.esy.es/reservas/borrarTodas",

			        data: {
			        "idReservas":reservas,
		  			
		            },
		            
		            success:function(response){

		            	console.log(response);
		            	$(".resultado").html(response);
			            }


		            });
		});
				});


	
		$(document).ready(function(){
			$('#buscar').on('click',function() {
				console.log($("#nombre").val());
			    $.ajax( {
			        type: "POST",
			        url:"http://reservasfernandovi.esy.es/reservas/buscarReservasPorPersonasPost",
			       
			        data: {
			        	 "datoUsuario":$("#nombre").val().trim(),
			        	
				          
		            },
		            success:function(response){
			            $(".resultado").html(response);
			        
		            	}

		            });});

		
			$(".resultado").on('click', ".idParaBorrar",  function() {
				console.log("dentro de BorrarUna");
			    $.ajax( {
			        type: "POST",
			        url:"http://reservasfernandovi.esy.es/reservas/borrarUnaReserva",
			        data: {
			        	 "idBuscarAdmin":$(this).attr("id"),
			        	 "datoInicial":$(this).attr("name")
				          
		            },
		            success:function(data){
		            	$(".resultado").html(data); 

		            }});
		});
			$("#nombre").on('click', function() {
			$(this).val("");

		            });


			
		});
			
</script>
