<?php
class Model_ObjetoReservable extends RedBean_SimpleModel{

	public function modify ($numAulaOriginal, $nombre, $tipo, $numAula, $capacidad, $categoria, $numEquipos, $red, $proyector)	{
		//Buscamos al aula por si numero original de aula (en el caso de que hubiese sido cambiado por el admin)
		$oR= R::findOne( 'objetoreservable', ' num_aula = ? ', [ $numAulaOriginal ] );
		
		$oR->nombre=$nombre;
		$oR->tipo=$tipo;
		$oR->num_aula=$numAula;
		$oR->categoria=$categoria;
		$oR->capacidad=$capacidad;
		$oR->num_equipos=$numEquipos;
		$oR->red=$red;
		$oR->proyector=$proyector;
		R::store($oR);
		
		return true;
	}

	public function getTodos(){
		return R::findAll('objetoreservable');
	}
	
	public function crear ($nombre, $tipo, $num_aula, $capacidad, $categoria, $num_equipos, $red, $proyector){
		$oR=R::dispense('objetoreservable');
		$oR->nombre=$nombre;
		$oR->tipo=$tipo;
		$oR->num_aula=$num_aula;
		$oR->categoria=$categoria;
		$oR->capacidad=$capacidad;
		$oR->num_equipos=$num_equipos;
		$oR->red=$red;
		$oR->proyector=$proyector;
		R::store($oR);
		return true;
	}
	
	public function borrar($numeroAula){
		//Borramos por numero de aula (porque es unico)
		$oR= R::findOne( 'objetoreservable', ' num_aula = ? ', [ $numeroAula ] );
		//$oR=R::load('objetoreservable',$id);
		$reserva=R::load('reserva',$oR->id);
		R::trash($oR);
		R::trash($reserva);
		return true;
	}
	
	public function getCategoria(){
		return R::getAll("SELECT DISTINCT categoria FROM objetoreservable");
	}
	
	public function getAulasDisponibles($categoria, $red, $proyector, $numEquipos, $capacidad){	
		/*Con getAll, aunque devuelve un array multidimensional, nos permite seleccionar
		 * un campo concreto en la select. Asi, evitamos que devuelve el objeto entero y es mas
		 * sencillo a la hora de visualizarlo*/
		
		/*Comprobamos que, si red o proyector estan a no (es decir, no los han checkeado)
		 * no hace falta buscar por ellos, dado que al usuario no le importa que haya o no, puesto
		 * que solo le interesa que tenga lo que ha marcado*/
		
		/*Estamos comprobando tambien si la categoria a filtrar es todas, ya que la consulta tiene que ser
		 * algo "especialita", por ahora la dejaremos con esta cantidad de if, porque no puedo
		 * reutilizar la misma estructura, asi que he tenido que añadir 4 if mas. En el futuro, si 
		 * descubro una manera de unificarlo, mejor.*/
		
		if($categoria=="IS NOT NULL" && $red!='SI' && $proyector!='SI'){
			return R::getAll('select num_aula from objetoreservable where categoria is not null
				AND num_equipos >= :equipos AND capacidad >= :capacidad',
					array(':equipos' => $numEquipos, ':capacidad' => $capacidad));
		}
		else if($categoria=="IS NOT NULL" && $red!='SI' && $proyector=='SI'){
			return R::getAll('select num_aula from objetoreservable where categoria is not null
				AND proyector = :proyector
				AND num_equipos >= :equipos AND capacidad >= :capacidad',
					array(':proyector' => $proyector, ':equipos' => $numEquipos, ':capacidad' => $capacidad));
		}
		else if($categoria=="IS NOT NULL" && $red=='SI' && $proyector!='SI'){
			return R::getAll('select num_aula from objetoreservable where categoria is not null
				AND red = :red
				AND num_equipos >= :equipos AND capacidad >= :capacidad',
					array(':red' => $red, ':equipos' => $numEquipos, ':capacidad' => $capacidad));
		}
		else if($categoria=="IS NOT NULL" && $red=='SI' && $proyector=='SI'){
			return R::getAll('select num_aula from objetoreservable where categoria is not null
				AND red = :red AND proyector = :proyector
				AND num_equipos >= :equipos AND capacidad >= :capacidad',
					array(':red' => $red, ':proyector' => $proyector, ':equipos' => $numEquipos, ':capacidad' => $capacidad));
		}
	    else if($red!='SI' && $proyector!='SI'){
			return R::getAll('select num_aula from objetoreservable where categoria= :cat 
				AND num_equipos >= :equipos AND capacidad >= :capacidad', 
				array(':cat' => $categoria, ':equipos' => $numEquipos, ':capacidad' => $capacidad));
		}
		else if($red!='SI' && $proyector == 'SI'){
			return R::getAll('select num_aula from objetoreservable where categoria= :cat 
				AND proyector = :proyector
				AND num_equipos >= :equipos AND capacidad >= :capacidad', 
				array(':cat' => $categoria, ':proyector' => $proyector, ':equipos' => $numEquipos, ':capacidad' => $capacidad));
		}
		else if($red=='SI' && $proyector!='SI'){
			return R::getAll('select num_aula from objetoreservable where categoria= :cat 
				AND red = :red
				AND num_equipos >= :equipos AND capacidad >= :capacidad', 
				array(':cat' => $categoria, ':red' => $red, ':equipos' => $numEquipos, ':capacidad' => $capacidad));
		}
		else {
			return R::getAll('select num_aula from objetoreservable where categoria= :cat 
				AND red = :red AND proyector = :proyector
				AND num_equipos >= :equipos AND capacidad >= :capacidad', 
				array(':cat' => $categoria, ':red' => $red, ':proyector' => $proyector, ':equipos' => $numEquipos, ':capacidad' => $capacidad));
		}
	}
	
	public function getDatosAula($num){
		return R::getAll('select num_aula, nombre, capacidad, categoria, num_equipos, red, proyector from objetoreservable where num_aula= :num',
		array(':num' => $num));
	}
}
?>