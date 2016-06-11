<section id="listarReservas">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Sus Aposentos</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-lg-offset-2">
<div class="col-sm-8 col-sm-offset-2">
<div class="table-responsive">
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
<button type="button" class="botonPerfil btn btn-danger btn-sm" id="borrar" >Borrar</button></th>


</tr>
<?php endforeach;?>
  </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</section> 
	<script type="text/javascript">
		<?php if(isset($borradoIncorrecto)):?>
			swal({
	  	     	title: "",
	  		 	text: "No se ha podido borrar la reserva. Por favor, inténtelo más tarde",
	  		 	type: "error",
	  		 	confirmButtonText: "Aceptar"
	  		});
		<?php endif;?>
		<?php if($borradoCorrecto):?>
			swal({
 	  	     	title: "",
 	  		 	text: "Reserva borrada correctamente",
 	  		 	type: "success",
 	  		 	confirmButtonText: "Continuar"
 	  		});
		<?php endif; ?>
		
		$(document).ready(function(){
			$('#borrar').on('click',function() {
			    $.ajax("http://reservasfernandovi.esy.es/reservas/listarReservaPost", {
			        type: "POST",
			        success: function(data){
			           id:<?= $reserva->id?>,
			                }
			            }
		});
		});
	


