<?php
session_start();
class reservas extends CI_Controller
{
	public function crearReservas(){
		//Esto es la parte del filtrado (recuperar categorias)
		$this->load->model('Model_ObjetoReservable', 'mo');
		$categorias= $this->mo->getCategoria();
		$datos['categorias']= $categorias;

		//Esto es para que me de las reservas hechas por el usuario. Aqu� tiene que ir a sesion
		$idUsuario= isset($_SESSION['num']) ? $_SESSION['num']:null;
		$this->load->model('Model_Reserva', 'mr');
		$reservas= $this->mr->getTodos($idUsuario);
		$datos['reservas']= $reservas;

		//$datos['idUsuario']= isset($_SESSION['idUsuario']) ? $_SESSION['idUsuario']:null;
		$this->load->model('Model_Usuario', 'mu');
		$id=$_SESSION['idUsuario'];
		$rol= $this->mu->buscarPorRol($id);

		if($rol=="admin"){
			$profesores= $this->mu->getProfesor();
			$datos['profesores']= $profesores;

			$this->load->view('templates/headerAdmin');
			$this->load->view ('reservas/crearReservaAdmin', $datos);
			$this->load->view ('templates/footer3');
		}
	}

	public function crear(){
		//Esto es la parte del filtrado (recuperar categorias)
		$this->load->model('Model_ObjetoReservable', 'mo');
		$categorias= $this->mo->getCategoria();
		$datos['categorias']= $categorias;

		//Esto es para que me de las reservas hechas por el usuario. Aqu� tiene que ir a sesion
		$idUsuario= isset($_SESSION['num']) ? $_SESSION['num']:null;
		$this->load->model('Model_Reserva', 'mr');
		$reservas= $this->mr->getTodos($idUsuario);
		$datos['reservas']= $reservas;

		//$datos['idUsuario']= isset($_SESSION['idUsuario']) ? $_SESSION['idUsuario']:null;
		$this->load->model('Model_Usuario', 'mu');
		$id=$_SESSION['idUsuario'];
		$rol= $this->mu->buscarPorRol($id);

		if($rol=="profesor"){
			$this->load->view ('templates/header3');
			$this->load->view ('reservas/indexProfesor', $datos);
			$this->load->view ('templates/footer3');
		}
		if($rol=="alumno"){
			$this->load->view ('templates/header3');
			$this->load->view ('reservas/indexAlumno', $datos);
			$this->load->view ('templates/footer3');
		}
	}

	public function createPost(){
		//TODO: Coger desde la sesion
		$userId=$_SESSION['idUsuario'];
		$date=$_POST['date'];
		$hours=$_POST['hours'];
		$idAula=$_POST['idAula'];
		$this->load->model('Model_Reserva','mr');

		if($userId==1){
			$userIdCedido=$_POST['idCedido'];
			for($i=0; $i<count($hours); $i++){
				$this->mr->create($userIdCedido, $idAula, $date, $hours[$i]);
			}
		}
		else{
			for($i=0; $i<count($hours); $i++){
				$this->mr->create($userId, $idAula, $date, $hours[$i]);
			}
		}
	}

	public function listar(){

		//$idUsuario=isset ($_SESSION ['idUsuario']) ? $_SESSION ['idUsuario'] : null;
		$idUsuario=($_SESSION ['idUsuario']);
		$this->load->model('Model_Reserva', 'mr');
		$reservas= $this->mr->getTodos($idUsuario);
		$datos['reservas']= $reservas;
	}

	public function listarPost(){
		//$idUsuario=isset ($_SESSION['idUsuario']) ? $_SESSION ['idUsuario'] : null;
		$idUsuario=$_SESSION ['idUsuario'];
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
	public function borrarTodas(){
		$idReservas=$_REQUEST["idReservas"];
		$this->load->model('Model_Reserva', 'mr');

		$datos["borrado"]=$this->mr->borrar($idReservas);

		$this->load->view('reservas/borrarPost',$datos);
	}

//Borrado para alumnos, profes y admin
	public function borrarUnaReserva(){
		if (isset ($_REQUEST['idListarPost'])){
			$idReserva=$_REQUEST['idListarPost'];
			$this->load->model('Model_Reserva', 'mr');
			$respuesta=$this->mr->borrar($idReserva);
			$this->listarPost();
			//$this->load->view('templates/header3');
		}

		//PARA el borrar de BUSCARPORPERSONA
		if (isset($_REQUEST["idBuscarAdmin"])){
			$idReserva=$_REQUEST["idBuscarAdmin"];
			$this->load->model('Model_Reserva', 'mr');
			$respuesta=$this->mr->borrar($idReserva);
			$datoUsuario=$_REQUEST['datoInicial'];
			$datosUsuario=explode(" ",$datoUsuario,2);
			$this->load->model('Model_Reserva', 'mr');
			$reservas= $this->mr->getReservasPorPersonas($datoUsuario);
			if ($reservas==false||$reservas==null){
				$datos['borrado']=true;
				$this->load->view('reservas/borrarPost', $datos);
			}
			else{
				$datos['reservasUsuarios']= $reservas;
				$this->load->model('Model_Usuario', 'mu');
				$datosUsuarios= $this->mu-> getDatosUsuario($datosUsuario[0]);
				$datos['datosUsuarios']=$datosUsuarios;
				$datos['datoInput']=$_REQUEST['datoInicial'];
				$this->load->view('reservas/buscarPorPersonaPost', $datos);
			}
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

	//Para que el administrador busque por el nombre de la persona y le devuelva sus reservas
	public function buscarReservasPorPersonas(){

		//Aqu� hay que controlar si eres Admin
		$this->load->view('templates/headerAdmin');
		$this->load->view('reservas/buscarPorPersona');
		$this->load->view('templates/footer2');

	}

	public function buscarReservasPorPersonasPost(){
		$datoUsuario=$_REQUEST['datoUsuario'];
		$datosUsuario=explode(" ",$datoUsuario,2);
		$this->load->model('Model_Reserva', 'mr');
		$reservas= $this->mr->getReservasPorPersonas($datoUsuario);

		//CONTROLAMOS SI NO EXISTE O SI EXISTO Y NO TIENE RESERVAS
		if ($reservas==false||$reservas==null){
			$datos['estadoDeLaConsulta']=$reservas;
			$this->load->view('reservas/buscarPorPersonaError', $datos);
		}
		else{
			$datos['reservasUsuarios']= $reservas;
			$this->load->model('Model_Usuario', 'mu');
			$datosUsuarios= $this->mu-> getDatosUsuario($datosUsuario[0]);
			$datos['datosUsuarios']=$datosUsuarios;
			//DATO QUE DEBEMOS MANTENER PARA SABER CUAL FUE LA B�SQUEDA REALIZADA
			$datos['datoInput']=$_REQUEST['datoUsuario'];
			$this->load->view('reservas/buscarPorPersonaPost', $datos);
		}

	}

}