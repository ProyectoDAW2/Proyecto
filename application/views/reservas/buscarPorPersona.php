<section id="buscadorDeReservas">
  <div class="container">
  <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>BUSCADOR DE RESERVAS</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
		<form action="<?= base_url()?>reservas/buscarReservasPorPersonasPost" method="post">
			<div class="col-sm-12 col-md-12 text-center portfolio-item">
			<div class="row control-group">
                            <div class="form-group col-xs-8 col-xs-offset-2 floating-label-form-group controls">
                                <label>Introduce el nombre de Usuario</label>
                                <input type="text" id="nombre" name="nombre" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>    
				 
				 <div class="form-group col-md-6 col-md-offset-3">
				<input type="submit" id="buscar" name="buscar" value="Buscar" class="botonPerfil btn btn-warning btn-md btn-block login-button"/>
				</div>
				<?php if((isset($reservasUsuarios))&&($reservasUsuarios!=null)):?>
				<div class="form-group col-md-6 col-md-offset-3">
				
				<button type="button" id="borrarTodas"   class="botonPerfil btn btn-danger btn-md btn-block login-button">Borrar Todas</button>
				</div>
				<?php endif;?>
			
			<!-- <input type="submit" id="crearAula" name="crearAula" value="Crear un aula nueva"/> -->
			<!-- <div class="col-sm-6 portfolio-item"> -->
		
			</div>
			</form>
			</div>
			
		
			<?php if(isset($reservasUsuarios)&&($datosUsuarios)):?>
			<?= var_dump($reservasUsuarios)?>
					<div class="col-sm-12 col-md-12">
					<div class="table-responsive">
						<table id="listaAulas" name="listaAulas" class="table table-bordered table-striped bs-events-table">
							<thead><tr><th>Usuario</th><th>Correo</th><th>Rol</th><th>Aula</th><th>N&uacute;m. Aula</th><th>Fecha</th><th>Hora</th></tr></thead>
								<tbody>
								<tr>
								<?php foreach ($reservasUsuarios as $reservaUsuario): ?>
								<?php foreach ($reservaUsuario as $rU): ?>
								<?php foreach ($datosUsuarios as $datoUsuario): ?>
								<?php if ($rU["usuario_id"]==$datoUsuario["id"]): ?>
								<td><?= $datoUsuario["nick"]?></td>
								<td><?= $datoUsuario["correo"]?></td>
								<td><?= $datoUsuario["rol"]?></td>
								<td><?= $rU["ornombre"]?></td>
								<td><?= $rU["num_aula"]?></td>
								<td><?= $rU["fecha"]?></td>
								<td><?= $rU["hora"]?></td>
							
								<td><a href="<?= base_url()?>reservas/borrarUnaReserva?id=<?= $rU["id"] ?>&informacionDeLaBusqueda=<?= $informacionDeLaBusqueda ?>" class="botonPerfil btn btn-danger btn-md botonBorrar" id="<?= $rU["id"] ?>">Borrar</a></td>
								
								<!--  <td><button type="button" id="borrar" name="<?= $rU["id"] ?>" data=<?= $informacionDeLaBusqueda ?> class="botonPerfil btn btn-danger btn-md">Borrar</button></td>-->
								</tr>
								
								<?php endif;?>
								<?php endforeach;?>
									<?php endforeach;?>
								<?php endforeach;?>
								
								<tbody>
						</table>
				</div>
				<?php endif;?>
					
		
	</div>	
	</div>
</section>

<script type="text/javascript">
	
		<?php if(isset($borrado)):?>
		
			<?php if($borrado==""):?>
			swal({
	  	     	title: "",
	  		 	text: "No se ha podido borrar la reserva. Por favor, inténtelo más tarde",
	  		 	type: "error",
	  		 	confirmButtonText: "Aceptar"
	  		});
			<?php endif; ?>
			<?php if($borrado==true):?>
			swal({
 	  	     	title: "",
 	  		 	text: "Reserva borrada correctamente",
 	  		 	type: "success",
 	  		 	confirmButtonText: "Continuar"
 	  		});
			<?php endif; ?>
		<?php endif;?>
		
		
		$(document).ready(function(){
			$("#borrarTodas").on('click',  function() {
				var x=0;
				var reservas=[];
				$(".botonBorrar").each(function(){
					reservas[x]=$(this).attr("id");
					x++;
					});
				
				
				console.log(reservas);
				
			    $.ajax( {
			        type: "POST",
			        url:"<?php base_url()?>reservas/borrarTodas",
			        dataType:"json",
			        data: {
			        "idReservas":reservas,
		  			
		            },
		            success:function(response){
		            	window.location="<?= base_url()?>reservas/buscarPorPersonaPost";
		            }

		            });
		});
				});


		</script>
		
		
		
		
<!--
<script type="text/javascript">	
		$(document).ready(function(){
			$('#borrar').on('click',function() {
				console.log("hola");
			    $.ajax( {
			        type: "POST",
			        url:"http://reservasfernandovi.esy.es/reservas/borrarUnaReserva",
			        dataType:"json",
			        data: {
			        	 "id":$(this).attr("name"),
			        	 "informacionDeLaBusqueda":$(this).attr("data"),
				          
		            },
		            success:function(response){
			            var data=(response);
			            console.log(data[0]);
		            	$.ajax( {
					        type: "POST",
					        url:"http://reservasfernandovi.esy.es/reservas/buscarReservasPorPersonasPost",
					        data: {
					        	 "nombre":data[0],     
				            }, 
		            	success:function(response){
		            	}});

		            }});
		});
				});
			
		
	
		</script>-->