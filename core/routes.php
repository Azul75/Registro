<?php
/**
 * Sistema de rutas
 * Docs: https://github.com/mrjgreen/phroute
 */

$router->filter('auth', function(){
	global $auth, $router;

	if(!$auth->check()) {
		header('Location: /Registro/login');
	}
});


$router->get('Registro/404.html', ['Jess\Messenger\HomeController', 'error']);
$router->get(['/Registro/login', 'login'],  ['Jess\Messenger\AuthController', 'index']);
$router->post('/Registro/login',  ['Jess\Messenger\AuthController', 'login']);
$router->get(['/Registro/register', 'register'],  ['Jess\Messenger\AuthController', 'register']);

$router->group(['before' => 'auth'], function($router){
	$router->get(['/Registro', 'home'],  ['Jess\Messenger\HomeController', 'index']);
	$router->get(['/Registro/logout', 'logout'],  ['Jess\Messenger\AuthController', 'logout']);

	$router->get(['/Registro/registro', 'registro'],  ['Jess\Messenger\VisitController', 'visit']);
	$router->post('/Registro/registro',  ['Jess\Messenger\VisitController', 'obtain']);
	$router->get(['/Registro/buscar', 'buscar'],  ['Jess\Messenger\VisitController', 'vistabuscar']);
	$router->post('/Registro/buscar',  ['Jess\Messenger\VisitController', 'searching']);

	$router->get(['/Registro/editar/{id}', 'editar'], ['Jess\Messenger\VisitController', 'vistaeditar']);
	$router->get(['/Registro/editar/{id}/{code}', 'editar'], ['Jess\Messenger\VisitController', 'vistaresultado']);
	$router->post('/Registro/editar', ['Jess\Messenger\VisitController', 'guardardatos']);

	$router->get('/Registro/eliminar/{id}', ['Jess\Messenger\VisitController', 'vistaeliminar']);

	$router->get('/Registro/imprimir', ['Jess\Messenger\VisitController', 'vistaimprimir']);
	$router->post('/Registro/generar-pdf', ['Jess\Messenger\VisitController', 'imprimir']);
});