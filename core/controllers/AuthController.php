<?php
namespace Jess\Messenger;
use Jess\Messenger\ControllerManager;

/**
* Controlador de inicio se sesion
*/
class AuthController extends ControllerManager{
	
	function __construct() {
		parent::__construct();
	}

	public function index() {
		global $auth;
		if($auth->check()) {
			$this->redirect('/Registro');
		}
		$data['page_name'] = 'Login';
		$data['file_name'] = 'login';
		$this->view('auth/base', $data);
	}

	public function login() {
		global $db, $auth;

		if($auth->check()) {
			$this->redirect('/Registro');
		}

		$email = $this->post_params("email", false);
		$password = $this->post_params("password", false);

		if($email && $password) {
			$saved_password = $db->query("SELECT Contrasena FROM Usuarios WHERE Email='".$email."'");
			if( (is_array($saved_password['response']) && count($saved_password['response']) > 0) ) { 
				if(is_array($saved_password['response'][0]) && array_key_exists('Contrasena', $saved_password['response'][0])) {
					if( password_verify($password, $saved_password['response'][0]['Contrasena']) ) {
						$user = $db->query("SELECT * FROM Usuarios WHERE Email='".$email."'");
						$auth->login($user['response']);

						$this->redirect('/Registro');
					} else {
						$data['error'] = "Contraseña incorrecta.";
					}
				} else {
						$data['error'] = "Contraseña incorrecta.";
					}
			} else {
				$data['error'] = "El usuario no existe";
			}
		} else {
			$data['error'] = "Todos los campos son requeridos.";
		}

		$data['page_name'] = 'Login error';
		$data['file_name'] = 'login';

		$this->view('auth/base', $data);
	}

	public function register() {
		return "Pagina de registro";
	}

	public function logout() {
		global $auth;
		$auth->logout();
		$this->redirect('/Registro');
	}
}