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
		// LISTAR
		$idUsuario= isset($_SESSION['num']) ? $_SESSION['num']:null;
		$this->load->model('Model_Reserva', 'mr');
		//En la vista index se comprueba son !null
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
	//NO ES NECESARIO LLAMAR A LISTAR, SE LE LLAMA DESDE EL CREATE PARA QUE SE CARGUEN LOS DATOS AL CREAR LA PÁGINA
	public function listar(){
		
		//$idUsuario=isset ($_SESSION ['idUsuario']) ? $_SESSION ['idUsuario'] : null;
		$idUsuario=1;
		$this->load->model('Model_Reserva', 'mr');
		$reservas= $this->mr->getTodos($idUsuario);
		$datos['reservas']= $reservas;
		
		
		
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
	public function borrarTodas(){
		$idReservas=$_REQUEST["idReservas"];
		
		$this->load->model('Model_Reserva', 'mr');
			foreach ($idReservas as $idReserva){
				
			$respuesta=$this->mr->borrar($idReserva);
			}
			
									
	}

	
	

/**
 * Los alumnos y profesores borran una reserva
 * @author
 * @return
 */
	public function borrarUnaReserva(){
		$idReserva=$_REQUEST['id'];
		$this->load->model('Model_Reserva', 'mr');
		$respuesta=$this->mr->borrar($idReserva);
		$this->load->view('templates/header3');
	
		
			
			//PARA BUSCARPORPERSONA
			if (isset($_REQUEST['informacionDeLaBusqueda'])){
				$this->load->model('Model_Reserva', 'mr');
				$datoUsuario=$_REQUEST['informacionDeLaBusqueda'];
				$this->load->model('Model_Reserva', 'mr');
				$reservas= $this->mr->getReservasPorPersonas($datoUsuario);
				$datos['reservasUsuarios']= $reservas;
				$this->load->model('Model_Usuario', 'mu');
				$datosUsuarios= $this->mu-> getDatosUsuario($datoUsuario);
				$datos['datosUsuarios']=$datosUsuarios;
				$datos['informacionDeLaBusqueda']=$datoUsuario;
				$datos['borrado']= $respuesta;
				$this->load->view('reservas/buscarPorPersona', $datos);
			}
			
			else{
				$idUsuario=1;
				$reservas= $this->mr->getTodos($idUsuario);
				$datos['reservas']= $reservas;
				$datos['borrado']= $respuesta;
				$this->load->view('reservas/indexProfesor', $datos);
			}
		
		
		$this->load->view('templates/footer3');
		
		
		
		
		
		
		
		/*VERSION CON JSON VIA POST
		$this->mr->borrar($id);
		$json=array($_REQUEST['informacionDeLaBusqueda']);
	echo json_encode($json);
		*/
		
		
/*
		
		*/
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
	
		//Aquí hay que controlar si eres Admin
		$this->load->view('templates/header3');
	
		$this->load->view('reservas/buscarPorPersona');
		$this->load->view('templates/footer3');
	
	}
	/**
	 * 
	 * @param unknown $infoUsuario información acerca del usuario desde BorrarUnaReserva
	 * @param unknown $respuesta informacion desde Borrar una reserva necesario para mostrar el sweetalert
	 */
	public function buscarReservasPorPersonasPost(){
	
		//Aqui hay que controlar si eres Admin
		$this->load->view('templates/header3');
		
		//Controlo si me llega desde la página o desde borrar una reserva
		if($_REQUEST['nombre']!=null){
		$datoUsuario=$_REQUEST['nombre'];
		$this->load->model('Model_Reserva', 'mr');
		
		$this->load->model('Model_Reserva', 'mr');
		$reservas= $this->mr->getReservasPorPersonas($datoUsuario);
		$datos['reservasUsuarios']= $reservas;
		$this->load->model('Model_Usuario', 'mu');
		$datosUsuarios= $this->mu-> getDatosUsuario($datoUsuario);
		$datos['datosUsuarios']=$datosUsuarios;
		//Cuando se borra necesita este dato para volver a llamar a la información en BorrarUnaReserva
		$datos['informacionDeLaBusqueda']=$_REQUEST['nombre'];
		$this->load->view('reservas/buscarPorPersona', $datos);
		$this->load->view('templates/footer3');
		}
		else{
			$this->buscarReservasPorPersonas();
		}

		
	
	}
}
	