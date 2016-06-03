<?php
session_start();
class Usuario extends CI_Controller
{
	public function index(){
		$this->login();
		//$this->load->view('usuario/pruebaEmail');
	}
	
    /*----- Registrar usuarios -----*/
    public function registrar() {
        //$this->load->view ('templates/header');
        $datos['pantalla']= "registro";
        $this->load->view('templates/headerSinCabecera', $datos);
        //$this->load->view ('usuario/formuRegistro');
        $this->load->view('usuario/registro2');
        $this->load->view('templates/footer3');
    }

    public function registrarPost() {
        $nick= $_REQUEST ['nick'];
        $password= $_REQUEST ['password'];
        $password2= $_REQUEST['password2'];
        $correo= $_REQUEST ['correo'];
        $clave= $_REQUEST ['clave'];
        $res= $_REQUEST ['res'];

        $rol= "";
        $longitudCorreo= strlen ($correo);

        $digitoRol= substr ($clave, -1); //cogemos el ultimo caracter de la clave, para saber el rol

        if($digitoRol==1){
            $rol= "profesor";
        }

        else{
            $rol= "alumno";
        }
        
        $this->load->model ('Model_Usuario', 'mu');
        $existeClave= $this->mu->comprobarClave($clave);
		
        if($existeClave!="") {
            $id= $existeClave;
            $_SESSION ['idUsuario']= $id;
            
            if($password == $password2){
            	if($res==true && $longitudCorreo<46) {
                	$this->mu->completarRegistro ($nick, $password, $correo, $rol, $clave, $id);
                	$this->login();
            	}
            }
            else{
            	$this->load->view('usuario/registro2');
            }
        }
        else {
            $this->load->view ('templates/headerSinCabecera');
            $this->load->view ('errors/noClave');
            $this->load->view ('templates/footer3');
        }

    }

    /*----- Login usuarios -----*/

    public function login() {
        $this->load->view ('templates/headerLogin');
        $this->load->view ('usuario/login');
        $this->load->view ('templates/footer2');
    }

    public function loginPost() {
        $nick= $_REQUEST ['user'];
        $password=$_REQUEST ['password'];
        $remember= isset ($_POST['remember']) ? TRUE : FALSE;

        $this->load->model('Model_Usuario', 'mu');
        $existeUsuario= $this->mu->login($nick,$password);

        if($existeUsuario!=""){
            $id=$existeUsuario;
            $_SESSION['idUsuario']= $id;
            if($id==true){
            	if($id == 1){
            		$this->load->view('templates/header3');
            		$this->load->view('objetoreservable/editarAulas');
            		$this->load->view('templates/footer3');
            	}
                else{
                	/*$this->load->view ('templates/headerPerfil');
                	$this->load->view ('usuario/perfil2');
                	$this->load->view ('templates/footerPerfil');*/
                	$rol= $this->mu->buscarPorRol($id);
                	
                	if($rol=="profesor"){
                		$this->load->view ('templates/header3');
                		$this->load->view ('reservas/indexProfesor');
                		$this->load->view ('templates/footer3');
                	}
                	if($rol=="alumno"){
                		$this->load->view ('templates/header3');
                		$this->load->view ('reservas/indexAlumno');
                		$this->load->view ('templates/footer3');
                	}
                }
                $anyo= time()+31536000;
                if($remember==TRUE) {
                    setcookie ('recuerdame', $_POST ['user'], $anyo);
                }
            }
        }
        else{
            $this->load->view ('templates/header3');
            $this->load->view ('errors/noUsuario');
            $this->load->view ('templates/footer3');
        }
    }


    /*----- Listar usuarios -----*/

	public function listar(){
		$this->load->model ('Model_Usuario', 'mu');
		$usuarios= $this->mu->getTodos();
		$datos['usuarios']= $usuarios;

        $this->load->view('templates/header');
		$this->load->view ('usuario/listar', $datos);
		$this->load->view ('templates/footer');
	}

    /*----- Modificar los datos de tu usuario -----*/

	public function modificar(){
		$this->load->view ('templates/header');
		$this->load->view ('usuario/modificar');
		$this->load->view ('templates/footer');
	}
	
	public function modificarPost(){
	//recojo los datos que introducirï¿½ a modificar()
		$correo= $_REQUEST ['correo'];
		$nick= $_REQUEST ['nick'];
		$password= $_REQUEST ['password'];
	
	//De alguna manera debo recoger el usuario que quiere hacer la modificaciï¿½n
	$id= $_REQUEST['id'];
		
		$this->load->model ('Model_Usuario', 'mu');
		$usuario= $this ->mu->modify ($id, $correo,$nick, $password);
        $this->load->view ('templates/header');
        $this->load->view ('usuario/modificarPost');
        $this->load->view ('templates/header');
    }

    /*----- Acceder al perfil de tu usuario -----*/

    public function perfil() {
        $id= isset ($_SESSION['idUsuario']) ? $_SESSION ['idUsuario'] : null;

        if($id!=null){
        	$pantalla= "perfil";
	        $this->load->model('Model_Usuario', 'mu');
	        $resultado= $this->mu->obtenerNombreYCorreo($id, $pantalla);
	        
	        $separacion= explode(" ", $resultado);
	       	$nick= $separacion[0];
			$correo= $separacion[1];
			
			$datos['nickUsuario']= $nick;
			$datos['correoUsuario']= $correo;
	        
	        $this->load->view ('templates/headerPerfil');
	        $this->load->view ('usuario/perfil2', $datos);
	        $this->load->view ('templates/footerPerfil');
        }

    }

	public function perfilPost() {
		$nick= $_REQUEST ['nick'];
		$passActual= $_REQUEST ['passwordActual'];
		$password= $_REQUEST ['passwordNueva'];
		$password2= $_REQUEST['passwordNueva2'];
		$correo= $_REQUEST ['correo'];
		$res= $_REQUEST ['res'];
		
		if($res!=false) {
			$idUsuario= $_SESSION['idUsuario'];
			$this->load->model ('Model_Usuario','mu');
			
			$passwordCorrecta= $this->mu->encontrarUsuarioPorPassword($passActual);
			
			$datos['passIncorrecta']= "password";
			
			if($passwordCorrecta){
				$nombre = $_SESSION['idUsuario'].".jpg";
				//echo $nombre;
				$carpeta = "C://xampp/htdocs/ProyectoCalendario/assets/imagenes/perfil/";
				//copy ( $_FILES['imagenUsuario']['tmp_name'], $carpeta . $nombre );
				
				//echo "El fichero $nombre se almacen&oacute; en $carpeta";
				//return "<img src=".base_url()."assets/imagenes/perfil/".$nombre.">";
				mkdir(base_url()."assets/imagenes/perfil", 0777, true);
				move_uploaded_file($_FILES['imagenPerfil']['tmp_name'], $carpeta.$nombre);
				//$datos['imagen']= "<img style='width: 60px;height: 60px;border-radius:50%;' src=".base_url().'assets/imagenes/perfil/'.$nombre.">";
				$datos['imagen']= $nombre;
				
				if($idUsuario!=0 || $idUsuario!=null) {
					$this->mu->cambiarPerfil($idUsuario, $nick, $password, $correo);
					$resultado= $this->mu->obtenerNombreYCorreo($_SESSION['idUsuario'], "perfil");
	        
			        $separacion= explode(" ", $resultado);
			       	$nick= $separacion[0];
					$correo= $separacion[1];
					
					$datos['nickUsuario']= $nick;
					$datos['correoUsuario']= $correo;
					
	                $this->load->view ('templates/headerPerfil');
					$this->load->view('usuario/perfil2', $datos);
	                $this->load->view('templates/footerPerfil');
	            }
				else{
	                $resultado= $this->mu->obtenerNombreYCorreo($_SESSION['idUsuario'], "perfil");
	        
			        $separacion= explode(" ", $resultado);
			       	$nick= $separacion[0];
					$correo= $separacion[1];
					
					$datos['nickUsuario']= $nick;
					$datos['correoUsuario']= $correo;
					
					$this->load->view('templates/headerPerfil');
	                $this->load->view('usuario/perfil2', $datos);
	                $this->load->view('templates/footerPerfil');
	            }
			}
			else{
	            $resultado= $this->mu->obtenerNombreYCorreo($_SESSION['idUsuario'], "perfil");
	        
			    $separacion= explode(" ", $resultado);
			    $nick= $separacion[0];
				$correo= $separacion[1];
					
				$datos['nickUsuario']= $nick;
				$datos['correoUsuario']= $correo;  
					
	            $this->load->view('templates/headerPerfil');
	            $this->load->view('usuario/perfil2', $datos);
	            $this->load->view('templates/footerPerfil');
	        }
			
			
		}
		else {
            $this->load->view ('templates/header3');
            $this->load->view ('errors/noModificarPerfil');
            $this->load->view ('templates/footer3');
        }
		
	}

    /*----- Recuperar contraseÃ±a de la cuenta -----*/

	public function recuperar() {
		$this->load->view('templates/headerSinCabecera');
		$this->load->view('usuario/recuperar');
		$this->load->view('templates/footer3');
	}
	
	public function recuperarPost() {
		$correo= $_REQUEST ['correo'];
		
		$this->load->model ('Model_Usuario','mu');
		$existeCorreo= $this->mu->comprobarCorreo ($correo);
		
		if($existeCorreo!= "") {
			$id= $existeCorreo;
			$_SESSION ['idUsuario']=$id;
			
			//Vamos a crear la cadena aleatoria que serï¿½ la nueva contraseï¿½a					
			$length= 5;
			//$cadena= (str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", 0, $length));
			$cadena= (str_shuffle("estoesunacadenadesordenada"));
			
			$this->mu->cambiarPass($correo,$cadena);
			
			//El mensaje va junto. En el se adjuntarï¿½n la cadena aleatoria y el nick.
			$mensaje="Restablece tus datos.
			Hemos recibido una petici&oacute;n para restablecer los datos de tu cuenta.
			Nueva contrase&ntilde;a ".$cadena."
			Nombre de usuario";
			$cabeceras='MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$cabeceras .= 'From: Servidor <recuperacion.reyfernando@gmail.com>' . "\r\n";
			// Se envia el correo al usuario
			mail($correo, "Recuperar contrase&ntilde;a", $mensaje, $cabeceras);
		}
		else {
			$this->load->view('errors/noCorreo');
		}
	}
	public function contacto()
	{
		$id= isset ($_SESSION['idUsuario']) ? $_SESSION ['idUsuario'] : null;
		
		if($id!=null){
			$this->load->model('Model_Usuario', 'mu');
			$pantalla= "contacto";
			$resultado= $this->mu->obtenerNombreYCorreo($id, $pantalla);
			$separacion= explode("/", $resultado);
			$nombreCompleto= $separacion[0];
			$correo= $separacion[1];
			
			$datos['nombreUsuario']= $nombreCompleto;
			$datos['correoUsuario']= $correo;
			
			$this->load->view ('templates/header3');
			$this->load->view ('usuario/contacto', $datos);
			$this->load->view ('templates/footer3');
		}
		
		
	}
	
	public function contacto2(){
			
		$name = $_REQUEST['name'];
		$email_receiver = $_REQUEST['email'];
		$messageInicial = $_REQUEST['message'];
		$messageInicialRetocado = "Mensaje: ".$messageInicial;
		//$messageInicial = nl2br($_REQUEST['mensaje']);
		$subject= $name." tiene una consulta";
		$message= $messageInicialRetocado."<br><br>Para poder contactar con este usuario y solucionar su consulta, le facilitamos su correo electrónico: ".$email_receiver;
		$email= $this->sendMail($email_receiver, $message, $subject);

		if($email){
			//$datos['contactoAdministrador']= "si";
			$this->load->view('templates/header3');
			$this->load->view('usuario/contacto');
			$this->load->view('templates/footer3');
		}
		
	}
	
	public function sendMail($emailReceiver, $message, $subject) {
        $adminEmail = 'proyectodaw02@gmail.com';
        $adminPass = 'proyecto2016';
        
        $this->load->library('email');
        
        $configGmail = null;
        
        if ($_SERVER ['SERVER_NAME'] == 'reservasfernandovi.esy.es') {
            $configGmail = array (
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.gmail.com',
                    'smtp_port' => 465,
                    'smtp_user' => $adminEmail, // correo desde el cual se envia
                    'smtp_pass' => $adminPass, // contraseña del correo
                    'mailtype' => 'html',
                    'charset' => 'utf-8',
                    'newline' => "\r\n" 
            );
        } else {
            
            $configGmail = array (
                    // 'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.gmail.com', // 'ssl://smtp.googlemail.com'//ssl://smtp.gmail.com
                    'smtp_port' => 587, // 465//25
                    'smtp_user' => $adminEmail, // change it to yours
                    'smtp_pass' => $adminPass, // change it to yours
                    'mailtype' => 'html',
                    'charset' => 'utf-8',
                    'newline' => "\r\n",
                    'validation' => TRUE,
                    'smtp_crypto' => 'tls', // tls or ssl
                    'wordwrap' => TRUE 
            );
        }
        
        $this->email->initialize ( $configGmail );
        
        $this->email->from('contacto@reservasfernandovi.esy.es', 'Contacto Administrador');

        $this->email->to($adminEmail);
        
        $this->email->subject ($subject);
        
        $this->email->message ($message);
        
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }
	
	 public function cerrarSesion(){
		session_destroy();
		$this->login();
	}
}
?>