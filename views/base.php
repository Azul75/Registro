<?php
/**
 * Archivo base del proyecto
 **/
?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
	<meta charset="utf-08">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/Registro/assets/css/base.css">
	<link rel="stylesheet" type="text/css" href="/Registro/assets/css/registro.css">
	<link rel="stylesheet" type="text/css" href="/Registro/assets/css/buscar.css">
	<title><?= $config->get('site.name') ?> | <?= $page_name ?></title>
</head>
<body>
	<div id="container">
		<h1>Organizador de Registros para Eventos</h1>
	</div>
	<div class="form">
		<ul class="menu">
			<li>
				<a href="/Registro">Principal</a>
			</li><br>
			<li>
				<a href="/Registro/registro">Nuevo Participante</a>
			</li><br>
			<li>
				<a href="/Registro/buscar">Busqueda</a>
			</li><br>
			<li>
				<a href="/Registro/imprimir">Imprimir</a>
			</li><br>
			<li>
				<a href="/Registro/logout">Salir del sistema</a>
			</li><br>
		</ul>
	</div><?php
	if( file_exists(__DIR__."/".$file_name.".php") ) {
		include_once(__DIR__."/".$file_name.".php");
	} else {
		echo "$file_name no existe.";
	}

	?>
</body>
</html>