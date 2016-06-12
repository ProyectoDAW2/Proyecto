<?php
session_start();
class Usuario extends CI_Controller
{
	public function index(){
		$this->login();
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
                	redirect ( base_url (), 'refresh' );
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
		$this->load->view('templates/headerSinCabecera');
        $this->load->view ('usuario/login');
        $this->load->view ('templates/footer2');
    }

    public function loginPost() {
        $nick= $_REQUEST ['user'];
        $password=$_REQUEST ['password'];
        $remember= isset ($_POST['remember']) ? TRUE : FALSE;

        $this->load->model('Model_Usuario', 'mu');
        $existeUsuario= $this->mu->login($nick,$password);

        if($existeUsuario!="" || $existeUsuario!=null){
            $id=$existeUsuario;
            $_SESSION['idUsuario']= $id;
            $this->load->model('Model_Reserva', 'mr');
            //En la vista index se comprueba son !null
            $reservas= $this->mr->getTodos($id);
            $datos['reservas']= $reservas;
            if($id==true){
            	if($id == 1){
					$this->load->view('templates/headerAdmin');
            		$this->load->view('reservas/indexAdmin');
            		$this->load->view('templates/footer3');
            	}
                else{
                	$rol= $this->mu->buscarPorRol($id);
                	
                	if($rol=="profesor"){
                		$this->load->model('Model_ObjetoReservable', 'mo');
                		$categorias= $this->mo->getCategoria();
                		$datos['categorias']= $categorias;
                		$this->load->view ('templates/header3');
                		$this->load->view ('reservas/indexProfesor');
                		$this->load->view ('templates/footer3');
                	}
                	if($rol=="alumno"){
                		$this->load->view ('templates/header3');
						$this->load->view('reservas/indexAlumno');
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
        	$datos['loginIncorrecto']= "si";
			$this->load->view('templates/headerSinCabecera');
			$this->load->view ('usuario/login');
			$this->load->view ('templates/footer2');
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
	//recojo los datos que introducir� a modificar()
		$correo= $_REQUEST ['correo'];
		$nick= $_REQUEST ['nick'];
		$password= $_REQUEST ['password'];
	
	//De alguna manera debo recoger el usuario que quiere hacer la modificaci�n
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
	        $resultado= $this->mu->obtenerDatosPerfil($id);
	        $avatar= $this->mu->obtenerAvatar($id);
	        
	        $separacion= explode(" ", $resultado);
	       	$nick= $separacion[0];
			$correo= $separacion[1];
			
			$datos['nickUsuario']= $nick;
	       	$password= $separacion[1];
			$correo= $separacion[2];
			
			$datos['nickUsuario']= $nick;
			$datos['passwordUsuario']= $password;
			$datos['correoUsuario']= $correo;
			$datos['imagenUsuario']= $avatar;
			/*if($avatar!=null){
				$datos['imagen']= "si";
			}*/
	        
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
			
			if($passwordCorrecta){
				if($idUsuario!=0 || $idUsuario!=null) {
					if (isset ( $_FILES ['imagenPerfil'] ) && $_FILES ['imagenPerfil'] ['error'] == 0) {
						
		                $foto = $_FILES ['imagenPerfil'];
		                $nombreFoto = $_REQUEST['nombreImagen'];
		                $nombreFoto = strtolower($nombreFoto);
		                /*$nombreArray = explode ( '.', $nombreFoto );
		                $extension = end ( $nombreArray );
		                $nuevoNombre = $nombreArray[0];
		                $nuevoNombre .= '.' . $extension;*/
		                
		                $borrarAvatar = $this->mu->borrarAvatar($idUsuario);
		                move_uploaded_file ( $_FILES ['imagenPerfil'] ['tmp_name'], 'assets/imagenes/perfil/' . $nombreFoto );
		                $this->mu->actualizarNombreAvatar($idUsuario, $nombreFoto );
		                
					}
					
						$this->mu->cambiarPerfil($idUsuario, $nick, $password, $correo);
						$resultado= $this->mu->obtenerNombreYCorreo($_SESSION['idUsuario'], "perfil");
	        
			        	$separacion= explode(" ", $resultado);
			       		$nick= $separacion[0];
						$correo= $separacion[1];
						$resultado= $this->mu->obtenerDatosPerfil($_SESSION['idUsuario']);
	        
			        	$separacion= explode(" ", $resultado);
			       		$nick= $separacion[0];
			       		$password= $separacion[1];
						$correo= $separacion[2];

						$id= $idUsuario;
						
						$nombreAvatar= $this->mu->obtenerAvatar($id);
						$datos['imagenUsuario']= $nombreAvatar;
						$datos['imagen']= "si";
						$datos['nickUsuario']= $nick;
						$datos['passwordUsuario']= $password;
						$datos['correoUsuario']= $correo;
						
		                $this->load->view ('templates/headerPerfil');
						$this->load->view('usuario/perfil2', $datos);
		                $this->load->view('templates/footerPerfil');
	            }
				else{
					$datos['passIncorrecta']= "password";
	                $resultado= $this->mu->obtenerNombreYCorreo($_SESSION['idUsuario'], "perfil");
	        
			        $separacion= explode(" ", $resultado);
			       	$nick= $separacion[0];
					$correo= $separacion[1];
					
					$datos['nickUsuario']= $nick;
	                $resultado= $this->mu->obtenerDatosPerfil($_SESSION['idUsuario']);
	        
			        $separacion= explode(" ", $resultado);
			       	$nick= $separacion[0];
			       	$password= $separacion[1];
					$correo= $separacion[2];
					
					$datos['nickUsuario']= $nick;
					$datos['passwordUsuario']= $password;
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
	            $resultado= $this->mu->obtenerDatosPerfil($_SESSION['idUsuario']);
	        
			    $separacion= explode(" ", $resultado);
			    $nick= $separacion[0];
			    $password= $separacion[1];
				$correo= $separacion[2];

				$datos['nickUsuario']= $nick;
				$datos['passwordUsuario']= $password;
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
    /*----- Recuperar contraseña de la cuenta -----*/
	public function recuperar() {
		$this->load->view('templates/headerSinCabecera');
		$this->load->view('usuario/recuperar');
		$this->load->view('templates/footer3');
	}
	
	public function recuperarPost() {
		$correo= $_REQUEST['correo'];
		
		$this->load->model ('Model_Usuario','mu');
		$existeCorreo= $this->mu->comprobarCorreo ($correo);
		
		if($existeCorreo!= "") {
			$id= $existeCorreo;
			$_SESSION ['idUsuario']=$id;
			
			//Vamos a crear la cadena aleatoria que ser� la nueva contrase�a					
			$length= 5;
			//$cadena= (str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", 0, $length));
			$cadena= (str_shuffle("egsgf15735"));
			
			$this->mu->cambiarPass($correo,$cadena);
			
			$message="Hemos recibido una petici&oacute;n para restablecer los datos de tu cuenta.<br><br>
			Tu nueva contrase&ntilde;a es: ".$cadena."<br><br>
			Te recomendamos entrar en <a href=\"http://reservasfernandovi.esy.es/usuario/login\"> reservasfernandovi</a>
			y cambiar tu contrase&ntilde;a lo antes posible.";
			
			$emailRes= $this->sendNewPass($correo, $message, "Recuperar Contrase�a");
			if($emailRes){
				//$datos['contactoAdministrador']= "si";
				$this->load->view('templates/headerLogin');
				$this->load->view('usuario/login');
				$this->load->view('templates/footer');
			}

		}
		else {
			$this->load->view('templates/headerSinCabecera');
			$this->load->view('errors/noCorreo');
			$this->load->view('templates/footer3');
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
		$emailReceiver = $_REQUEST['email'];
		$messageInicial = $_REQUEST['message'];
		$messageInicialRetocado = "Mensaje: ".$messageInicial;
		//$messageInicial = nl2br($_REQUEST['mensaje']);
		$subject= $name." tiene una consulta";
		$message= $messageInicialRetocado."<br><br>Para poder contactar con este usuario y solucionar su consulta, le facilitamos su correo electr�nico: ".$emailReceiver;
		$message= $messageInicialRetocado."<br><br>Para poder contactar con este usuario y solucionar su consulta, le facilitamos su correo electr�nico: ".$emailReceiver;
		$email= $this->sendMail($emailReceiver, $message, $subject);

		if($email){
			//$datos['contactoAdministrador']= "si";
			/*$this->load->view('templates/header3');
			$this->load->view('usuario/contacto');
			$this->load->view('templates/footer3');*/
			redirect ( base_url ( 'usuario/contacto' ), 'refresh' );
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
                    'smtp_pass' => $adminPass, // contrase�a del correo
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
    
	public function sendNewPass($correo, $message, $subject) {
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

                    'smtp_pass' => $adminPass, // contrase�a del correo
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
        
        $this->email->from('administrator@reservasfernandovi.esy.es', 'Administrador');

        $this->email->to($correo);
        
        $this->email->subject($subject);
        
        $this->email->message($message);
        
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }
	
	 public function cerrarSesion(){
		session_destroy();
		redirect ( base_url ( ), 'refresh' );
	}

	public function getProfesor(){
		return R::getAll("SELECT * FROM usuario WHERE rol='profesor'");
	}
}
?>