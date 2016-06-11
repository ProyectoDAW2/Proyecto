<?php
session_start();
class ObjetoReservable extends CI_Controller{

	public function modificar(){
		$id=isset ($_SESSION ['idUsuario']) ? $_SESSION ['idUsuario'] : null;
		$datos ['idUsuario']=$id;
		
		if ($id!=null){
			if ($id == 1){
				
				$numAulaOriginal= $_REQUEST['numAulaOriginal'];
				
				$numAula= $_REQUEST['numAula'];
				$nombre= $_REQUEST['nombre'];
				$tipo= "aula";
				$categoria= $_REQUEST['categoria'];
				
				$red= "";
				$proyector= "";
				
				if(isset($_REQUEST['red'])){
					$red= "SI";
				}
				else{
					$red="NO";
				}
				
				if(isset($_REQUEST['proyector'])){
					$proyector= "SI";
				}
				else{
					$proyector="NO";
				}

				$numEquipos= $_REQUEST['equipos'];
				$capacidad = $_REQUEST['capacidad'];
				
				$this -> load -> model ('Model_ObjetoReservable', 'mo');
				$objetoReservable= $this->mo->modify($numAulaOriginal, $nombre, $tipo, $numAula, $capacidad, $categoria, $numEquipos, $red, $proyector);

				$datos['modificarCorrecto']= $objetoReservable;
				
				$this -> load -> view ('templates/header3');
				$this -> load -> view ('objetoReservable/editarAulas', $datos);
				$this -> load -> view ('templates/footer3');
				
			}
			else{
				
				$this->load->view('errors/accesoProhibido', $datos);
				
			}
		}
		else{
			
			$this->load->view('errors/accesoProhibido', $datos);
			
		}
	}
	public function crear(){
		
		$nombre=$_REQUEST ['nombreAulaNueva'];
		$tipo="aula";
		$categoria=$_REQUEST ['categoriaAulaNueva'];
		$capacidad=$_REQUEST ['capacidadAulaNueva'];
		$num_equipos=$_REQUEST ['equiposAulaNueva'];
		$red= "";
		$proyector= "";
				
		if(isset($_REQUEST['redAulaNueva'])){
			$red= "SI";
		}
		else{
			$red="NO";
		}
				
		if(isset($_REQUEST['proyectorAulaNueva'])){
			$proyector= "SI";
		}
		else{
			$proyector="NO";
		}
		
		$num_aula="";
		
		$this->load->model('Model_ObjetoReservable','mo');
		$datosAula= $this->mo->getDatosAula($_REQUEST['numeroAulaNueva']);
		$existeAula= false;
		
		foreach($datosAula as $aula){
			foreach($aula as $clave=>$valor){
				if($clave!="" || $clave!=null){
					$existeAula= true;
				}
			}
		}
		
		if($existeAula==false){
			$num_aula= $_REQUEST ['numeroAulaNueva'];
			$objetoReservable= $this->mo->crear($nombre, $tipo, $num_aula, $capacidad, $categoria, $num_equipos, $red, $proyector);
	
			$datos['crearCorrecto']= $objetoReservable;
			
			$this->load->view('templates/header3');
			//$this -> load -> view ('objetoReservable/crearPost');
			$this->load->view('objetoReservable/editarAulas', $datos);
			$this->load->view('templates/footer3');
		}
		else{
			$datos['numeroExistente']= true;
			$this->load->view('templates/header3');
			$this->load->view('objetoReservable/editarAulas', $datos);
			$this->load->view('templates/footer3');
		}
	
	}
	public function borrar(){
	
		$numAula= $_REQUEST['numeroAula'];
		
		$this->load->model('Model_ObjetoReservable', 'mo');
		$respuesta= $this->mo->borrar($numAula);
		
		if($respuesta){
			$datos['borradoCorrecto']= $respuesta;
			$this->load->view('templates/header3');
			$this->load->view('objetoreservable/editarAulas', $datos);
			$this->load->view('templates/footer3');
		}
		else{
			$datos['borradoIncorrecto']= $respuesta;
			$this->load->view('objetoreservable/editarAulas', $datos);
		}
		
	}
	
	public function borrarPost(){
		$id=$_REQUEST['id'];
		$this -> load -> model ('Model_ObjetoReservable', 'mo');
		$objetoReservable=$this -> mo -> borrar ($id);

		$this -> load -> view ('templates / header');
		$this -> load -> view ('objetoReservable / borrarPost');
		$this -> load -> view ('templates / footer');
	}
	
	public function listar(){
		$this -> load -> model ('Model_ObjetoReservable', 'mo');
		$objetos=$this -> mo -> getTodos();
		$datos['objetos']=$objetos;

		$this -> load -> view ('templates/header');
		$this -> load -> view ('objetoReservable/listar', $datos);
		$this -> load -> view ('templates/footer');
	}
	
	public function editarAulas(){
		$this->load->view('templates/headerAdmin');
		$this->load->view('objetoReservable/editarAulas');
		$this->load->view('templates/footerAdmin');
	}
	
	public function buscarAula(){
		$num= $_REQUEST['numaula'];
		
		$this->load->model('Model_ObjetoReservable', 'mo');
		$datosAula= $this->mo->getDatosAula($num);
		$existeAula= true;
		foreach($datosAula as $aula){
			foreach($aula as $clave=>$valor){
				if($clave=="" || $clave==null){
					$existeAula= false;
				}
			}
		}
		$datos['datosAula']= "";
		if($existeAula==false){
			$datos['datosAula']= $existeAula;
		}
		else{
			$datos['datosAula']= $datosAula;
		}
		
		$this->load->view('templates/headerAdmin');
		$this->load->view('objetoReservable/editarAulas', $datos);
		$this->load->view('templates/footerAdmin');
	}
	
}