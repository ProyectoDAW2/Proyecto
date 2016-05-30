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
		
		
		//$datos['idUsuario']= isset($_SESSION['idUsuario']) ? $_SESSION['idUsuario']:null;
		$this->load->view('templates/header3');
		$this->load->view('reservas/indexProfesor',$datos);
		$this->load->view('templates/footer3');
	}

	public function createPost(){

		//TODO: Comprobar parametros
		//TODO: Coger desde la sesion
		$userId=1;
		//TODO: Coger desde url o javascript
		//$classroom=2;
		$date=$_POST['date'];
		$hours=$_POST['hours'];
		//$numAula=$_POST['numAula'];
		$idAula=$_POST['idAula'];


		$this->load->model('Model_Reserva','mr');

		$isValid=true;
		for($i=0; $i<count($hours); $i++){
			$result=$this->mr->create($userId, $idAula, $date, $hours[$i]);
			if(!$result) $isValid=false;

		}
	}

	/**
	 * 
	 */
	public function listar(){
		$this->load->view('templates/header3');
		$idUsuario=1;
		$this->load->model('Model_Reserva', 'mr');
		$reservas= $this->mr->getTodos($idUsuario);
		$datos['reservas']= $reservas;
		$this->load->view('reservas/listar', $datos);
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
		$this->mr->borrar($id);
		
		
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
	