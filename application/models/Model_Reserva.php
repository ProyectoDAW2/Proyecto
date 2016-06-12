<?php
class Model_Reserva extends RedBean_SimpleModel{

	public function create($idUsuario,$idOR,$fecha,$horaCogida){
		$usuario=r::load('usuario',$idUsuario);
		$oR=r::load('objetoReservable',$idOR);
		$reservaExiste=false;//Controla si reserva existe o no

		$reserva=R::dispense('reserva');
		$reserva->fecha=$fecha;
		$reserva->hora=$horaCogida;
		$reserva->usuario=$usuario;
		$reserva->or=$oR;
		$reserva->usuarionombre=$usuario->nombre;
		//CREO PARA EJEMPLO
		$reserva->numAula=$oR->numAula;
		$reserva->ornombre=$oR->nombre;
		$reservasOR=$this->getCrear($idOR);
		foreach($reservasOR as $reservaOR){
			if($reservaOR->fecha==$fecha&&$reservaOR->hora==$horaCogida){
				$reservaExiste=true;
			}
		}
		if($reservaExiste==false){
			R::store($reserva);
			return true;
		}
		else{
			return false;
		}
	}

	public function borrar($idReservas){
		//Controlo si viene para borrarTodas las reservas o solo una
		if(is_array ($idReservas)){
			foreach ($idReservas as $idReserva){
				$reserva=R::load('reserva',$idReserva);
				R::trash($reserva);
			}
		}
		else{
			$reserva=R::load('reserva',$idReservas);
			R::trash($reserva);
		}

		return true;
	}

	public function getTodos($idUsuario){
		//return R::findAll('reserva');
		$reserva=R::find('reserva','usuario_id LIKE ? ',[$idUsuario]);
		return $reserva;
	}

	public function getDatosReservaUsuario($idUsuario){
		//return R::findAll('reserva');
		$reserva= R::getAll( 'select fecha, hora, ornombre from reserva where usuario_id=:id',
			array(':id' => $idUsuario));;
		return $reserva;
	}

	public function getTodasReservas($numAula){
		$reserva=R::find('reserva', 'num_aula LIKE ? ',[$numAula]);
		return $reserva;
	}

	//Se le llama para saber horas y aulas reservadas
	public function getCrear($oR){
		//return R::findAll('reserva');
		$reservasOR=R::find( 'reserva', ' or_id LIKE ? ',[$oR]);
		return $reservasOR;
	}

	public function getReservasPorPersonas($datoUsuario){

		$datosUsuario=explode(" ",$datoUsuario,2);
		$idUsuarios;
		if (isset ($datosUsuario[1])){
			$idUsuarios= R::getAll( 'select id from usuario where nombre=:nombre and apellidos=:ap',
				array(':nombre' => $datosUsuario[0],':ap' => $datosUsuario[1]));
		}
		else{
			$idUsuarios= R::getAll( 'select id from usuario where nombre=:datos or nick=:datos or correo=:datos',
				array(':datos' => $datosUsuario[0]));
		}

		if($idUsuarios==[]){
			return false;
		}
		else{
			$todasLasReservas;
			$reservas=null;
			$x=0;
			foreach ($idUsuarios as $idUsuario){
				$todasLasReservas[$x]=$this->getTodos($idUsuario["id"]);
				if (!(empty($todasLasReservas[$x]))){
					$reservas[$x]=$todasLasReservas[$x];
				}
				$x++;
			}
			return $reservas;
		}
	}
}
?>