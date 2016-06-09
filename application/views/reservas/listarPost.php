
 <?php if(isset ($reservas)):?>
 <?php if($reservas!=null):?>
 <div  class="col-md-6 col-md-offset-3">
				<button type="button" id="borraTodas"   class="botonPerfil btn btn-danger btn-md btn-block login-button">Borrar Todas</button>
				</div>
<table class="table table-bordered table-striped bs-events-table">
  <thead>
  <tr>
   
   
    <th>Fecha</th>
    <th>Hora</th>
    <th>Objeto Reservado</th>
    <th>Eliminar</th>
  </tr>
  </thead>
  <tbody>
  
  <?php foreach($reservas as $reserva):?>
<tr>
<!--Campo oculto para despues borrar a través del id-->

<td><?= $reserva->fecha?></td>
<td><?= $reserva->hora?></td>
<td><?= $reserva->ornombre?></td>
<th>
<button type="button"  name="<?= $reserva->id?>" class="botonPerfil btn btn-danger btn-sm borrar">Borrar</button></th>


</tr>
<?php endforeach;?>
  </tbody>
</table>
<?php else:?>
<p>De momento no tiene ning&uacute;n aposento reservado</p>

<?php endif; ?>

<?php else:?>
<p>De momento no tiene ning&uacute;n aposento reservado</p>

<?php endif; ?>

</div>

<script type="text/javascript">	
		$(document).ready(function(){
			$('.borrar').on('click',function() {

			    $.ajax( {
			        type: "POST",
			        url:"http://reservasfernandovi.esy.es/reservas/borrarUnaReserva",
			        data: {
			        	 "idListarPost":$(this).attr("name"),
			        	 
				          
		            },
		            success:function(data){
		            	$(".listarReservas").html(data); 

		            }});
		});
			$("#borraTodas").on('click', function() {
				var x=0;
				var reservas=[];
				$(".borrar").each(function(){
					reservas[x]=$(this).attr("name");
					x++;
					});
				console.log(reservas);
				$.ajax( {
			        type: "POST",
			        url:"http://reservasfernandovi.esy.es/reservas/borrarTodas",
			        data: {
			        "idReservas":reservas,
		  			
		            },
		            
		            success:function(response){
		            
		            	$(".listarReservas").html(response);
			            }

		            });
		});
		});
		
			
		
	
		</script>
