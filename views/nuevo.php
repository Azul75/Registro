<?php
/**
 * Registro nuevo
 **/
?>

<!DOCTYPE html>
<html>
<head>
	<title><?= $page_name ?></title>
	<link rel="stylesheet" type="text/css" href="assets/css/nuevo.css">
</head>
<body>
	<div><?php
		if($mensaje){ ?>
			<div class="mensaje">
				<p><?= $mensaje ?></p>
			</div> <?php
		} ?>
		<form action="/Registro/nuevo" method="post">
			<label>Nombres</label>
			<input type="text" name="Nombres" required><br/>
			<label>Apellidos</label>
			<input type="text" name="Apellidos" required><br/>
			<label>Fecha de Nacimiento</label>
			<input type="date" name="FechaNac" required><br/>
			<label>Telefono</label>
			<input type="tel" maxlength="10" pattern="[0-9]+" name="Telefono" required><br/>
			<label>E-mail</label>
			<input type="email" name="CorreoElec" required><br/>
			<label>Direccion</label>
			<input type="text" name="Direccion" required><br/>
			<button type="submit">Enviar</button>
		</form>
	</div>
</body>
</html>