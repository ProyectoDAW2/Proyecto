<?php
session_start();
class reservas extends CI_Controller
{
	public function index(){
		$this->create();
	}

	public function create(){
		//Esto es la parte del filtrado (recuperar categorias)
		$this->load->model('Model_ObjetoReservable', 'mo');
		$categorias= $this->mo->getCategoria();
		$datos['categorias']= $categorias;
		
		//Esto es para que me de las reservas hechas por el usuario. Aquí tiene que ir a sesion
		$idUsuario= isset($_SESSION['num']) ? $_SESSION['num']:null;
		$this->load->model('Model_Reserva', 'mr');
		$reservas= $this->mr->getTodos($idUsuario);
		$datos['reservas']= $reservas;

		//$datos['idUsuario']= isset($_SESSION['idUsuario']) ? $_SESSION['idUsuario']:null;
		$this->load->view('templates/header3');
		$this->load->view('reservas/indexProfesor',$datos);
		$this->load->view('templates/footer3');
	}

	public function createPost(){
		//TODO: Coger desde la sesion
		$userId=1;
		$date=$_POST['date'];
		$hours=$_POST['hours'];
		$idAula=$_POST['idAula'];
		$this->load->model('Model_Reserva','mr');

		for($i=0; $i<count($hours); $i++){
			$this->mr->create($userId, $idAula, $date, $hours[$i]);
		}
	}
/*
	public function crearFestivo(){
		$this->load->view('templates/headerfooter');
		$this->load->view('reservas/crearFestivo');
	}

	public function crearFestivoPost(){
		$nombre=$_POST['nombre'];
		$inicio=$_POST['inicio'];
		$fin=$_POST['fin'];
		$tipo=$_POST['tipo'];
		$archivo = fopen('../../assets/js/reserva/vacaciones.json','w+');
		//$json = json_decode(file_get_contents($archivo), true);
		$json[] = array('nombre'=> $nombre, 'inicio'=> $inicio, 'fin'=> $fin, 'tipo'=> $tipo);
		fwrite($archivo, $json);
		fclose($archivo);
		//file_put_contents($archivo, json_encode($json), true);
		var_dump($json);
	}
*/
	public function listar(){
		$this->load->view('templates/header3');
		//$idUsuario=isset ($_SESSION ['idUsuario']) ? $_SESSION ['idUsuario'] : null;
		$idUsuario=1;
		$this->load->model('Model_Reserva', 'mr');
		$reservas= $this->mr->getTodos($idUsuario);
		$datos['reservas']= $reservas;
		$this->load->view('reservas/indexProfesor', $datos);
		$this->load->view('templates/footer3');
		
	}

	public function listarPost(){
		//$idUsuario=isset ($_SESSION['idUsuario']) ? $_SESSION ['idUsuario'] : null;
		$idUsuario=$_REQUEST ['idUsuario'];
		$this->load->model('Model_Reserva', 'mr');
		$reservas= $this->mr->getTodos($idUsuario);
		$datos['reservas']= $reservas;
		$this->load->view('reservas/listarPost', $datos);
	}
	
	
	
	//Vamos a hacer una lista de reserva por aula para luego recogerlo en el horario.
	public function listarReserva(){
		$numAula=$_POST['num'];
		$_SESSION['num']=$numAula;
		echo $numAula;
	}

	/**
	 * Para listar las reservas en el calendario
	 */
	public function listarReservaPost(){

		$aulaElegida=isset($_SESSION['num']) ? $_SESSION['num']:null;

		$this->load->model('Model_Reserva', 'mr');
		$reservas= $this->mr->getTodasReservas($aulaElegida);
		$datos['reservas']= $reservas;
		$this->load->view('reservas/listarReservaPost', $datos);
	}

/*
 * Si nadie utiliza estos borrados se pueden eliminar
 */
	public function borrar(){
		$this->load->view('reservas/borrar');
	}

	public function borrarPost(){
		$id=$_REQUEST['id'];
		$this->load->model('Model_Reserva', 'mr');
		$this->mr->borrar($id);
		$this->load->view('reservas/borrarPost');
	}
	

/**
 * Los alumnos y profesores borran una reserva
 * @author
 * @return
 */
	public function borrarUnaReserva(){
	$id=$_REQUEST['id'];
		$this->load->model('Model_Reserva', 'mr');
	$respuesta=$this->mr->borrar($id);
		$this->load->view('reservas/borrarPost');
		
		if($respuesta){
			$this->load->view('templates/header3');
			$idUsuario=1;
			$this->load->model('Model_Reserva', 'mr');
			$reservas= $this->mr->getTodos($idUsuario);
			$datos['reservas']= $reservas;
			$datos['borradoCorrecto']= $respuesta;
			
			$this->load->view('reservas/listar', $datos);
			$this->load->view('templates/footer3');
		}
		else{
			$idUsuario=1;
			$this->load->model('Model_Reserva', 'mr');
			$reservas= $this->mr->getTodos($idUsuario);
			$datos['reservas']= $reservas;
			$datos['borradoIncorrecto']= $respuesta;
			$this->load->view('reservas/listar', $datos);
		}
		
	}
	public function filtrarPost(){
		$categoria= "";
		$red= $_REQUEST['red'];
		$proyector= $_REQUEST['proyector'];
		$numEquipos= $_REQUEST['equipos'];
		$capacidad= $_REQUEST['capacidad'];
		
		if($_REQUEST['categoria']!='todas'){
			$categoria= $_REQUEST['categoria'];
		}
		else{
			$categoria= 'IS NOT NULL';
		}
		if($red!='NO'){
			$red='SI';
		}
		if($proyector!='NO'){
			$proyector= 'SI';
		}
		$this->load->model('Model_ObjetoReservable', 'mo');
		$resultado= $this->mo->getAulasDisponibles($categoria, $red, $proyector, $numEquipos, $capacidad);
		
		$datos['aulas']= $resultado;
		$this->load->view('reservas/filtradoPost', $datos);
	}
	
}
	