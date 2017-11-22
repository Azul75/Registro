<?php
namespace Jess\Messenger;
use Jess\Messenger\ControllerManager;

/**
* Controlador de la pagina principal
*/
class HomeController extends ControllerManager {

	function __construct() {
		parent::__construct();
	}
	
	public function index(){
		$data['page_name'] = "Home";
		$data['file_name'] = "principal";
		$this->view("base", $data);
	}

	public function error() {
		return "Error 404";
	}
}