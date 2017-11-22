<?php
namespace Jess\Messenger;
use Jess\Messenger\ControllerManager;
use Dompdf\Dompdf;

/**
* Controlador de la pagina formulario de registro
*/
class VisitController extends ControllerManager {

	function __construct() {
		parent::__construct();
	}
	
	public function visit($msj=false){
		$data['page_name'] = "Formulario de Registro";
		$data['mensaje'] = $msj;
		$data['file_name'] = "registro";
		$this->view("base", $data);
	}

	public function obtain(){
		global $db;
		$datos= $this->post_params();
		$insercion=$db->create("participantes",$datos);

		if($insercion){
			$this->visit("Se guardó con exito");
			return;
		}
		$this->visit("ocurrio un error, no se relizó el registro");
	}
	public function vistabuscar($visitantes=false){
		$data['page_name'] = "Formulario de Busqueda";
		$data['file_name'] = "buscar";
		if($visitantes){
			$data['visitantes'] = $visitantes;
		}
		$this->view("base", $data);
	}
	public function searching() {
		global $db;
		$buscar = $this->post_params('buscar', false); // Nombre columna a buscar
		$search = $this->post_params('Search', false); // Valor a buscar

		if($buscar&&$search) {
			$respuesta = $db->query("SELECT * from participantes where $buscar like '%".$search."%'");
			$this->vistabuscar($respuesta);
		}
	}

	public function vistaeditar($id=false) {
		global $db;
		$data['page_name'] = "Formulario de Edicion";
		$data['file_name'] = "editar";
		if($id) {
			$visitante = $db->query("SELECT * from participantes where idParticipantes='".$id."'");
			if($visitante['code'] === 'ok') {
				$data['datos'] = empty($visitante['response']) ? array() : $visitante['response'][0];
			} else {
				$data['datos'] = array();
				$data['error'] = "Ha ocurrido un error: ".$visitante['response'];
			}
		}

		$this->view("base", $data);
	}
	public function vistaresultado($id=false, $code = false) {
		global $db;
		$data['page_name'] = "Formulario de Edicion";
		$data['file_name'] = "editar";
		if($id && $code) {
			$visitante = $db->query("SELECT * from participantes where idParticipantes='".$id."'");
			if($visitante['code'] === 'ok') {
				$data['datos'] = empty($visitante['response']) ? array() : $visitante['response'][0];

				if($code == 1) {
					$data['message'] = "Se ha actualizado con exito!";
				} else {
					$data['message'] = "Ha ocurrido un error al guardar";
				}
			} else {
				$data['datos'] = array();
				$data['error'] = "Ha ocurrido un error: ".$visitante['response'];
			}
		}
		$this->view("base", $data);
	}
	public function guardardatos() {
		global $db;
		$datos = $this->post_params();
		$id = $datos['idParticipantes'];
		unset($datos['idParticipantes']);

		$actualizacion=$db->update("participantes", $id, $datos);

		if($actualizacion){
			header("Location: /Registro/editar/".$id."/1");
			return;
		} else {
			header("Location: /Registro/editar/".$id."/0");
		}
	}

	public function vistaeliminar($id=false) {
		global $db;

		if($id) {
			$visitante = $db->query("DELETE from participantes where idParticipantes='".$id."'");
			if($visitante['code'] === 'ok') {
				header("Location: /Registro/buscar");
			} 
		}

		header("Location: /Registro/buscar");
	}

	public function vistaimprimir() {
		$data['page_name'] = "Formulario de impresion";
		$data['file_name'] = "imprimir";
		$this->view("base", $data);
	}

	private function generarTablaUsuarios($usuarios) {
		$tabla = '<table border="1">
					<tr>
						<th>Num</th>
						<th>Nombres</th>
						<th>Apellidos</th>
						<th>Fecha Nacimiento</th>
						<th>Email</th>
						<th>Telefono</th>
						<th>Direccion</th>
					</tr>';
		foreach ($usuarios as $key => $usuario) {
			$tabla .= '<tr>
							<td>'.($key+1) .'</td>
							<td>'.$usuario['Nombres'] .'</td>
							<td>'.$usuario['Apellidos'] .'</td>
							<td>'.$usuario['FechaNac'] .'</td>
							<td>'.$usuario['CorreoElec'] .'</td>
							<td>'.$usuario['Telefono'] .'</td>
							<td>'.$usuario['Direccion'] .'</td>
						</tr>';
		}
		$tabla .= "</table>";
		return $tabla;
	}

	private function obtenerColumnas($columnas) {
		$resultado = "";
		if(is_array($columnas) && count($columnas) > 0) {
			foreach ($columnas as $key => $col) {
				$resultado .= "{$col}, ";
			}
			$resultado = rtrim($resultado,", ");
		} else {
			$resultado = "*";
		}
		return $resultado;
	}

	public function imprimir() {
		global $db;
		$campos = $this->post_params("datos", false);
		if($campos) {
			$usuarios = $db->query("SELECT ".$this->obtenerColumnas($campos)." from participantes");

			echo $this->generarTablaUsuarios($usuarios['response']);

			$dompdf = new Dompdf();
			$dompdf->loadHtml($this->generarTablaUsuarios($usuarios['response']));
			$dompdf->render();
			//$dompdf->stream();
		} else {
			// Error
		}
	}
}