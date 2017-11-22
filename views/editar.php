
<?php
/**
 * Editar registro
 **/
?>

<!DOCTYPE html>
<html lang="es-MX">
<head>
	<meta charset="utf-08">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/Registro/assets/css/registro.css">
	<title><?= $config->get('site.name') ?> | <?= $page_name ?></title>
</head>
<body>
	<div>
	<div class="container">
		<div class="form__top">
			<h2>Editar<span> Registro</span></h2><hr><h3>Participantes del evento</h3>
		</div> <?php
			if(isset($message)) { ?>
				<div class="mensaje">
					<?= $message ?>
				</div><?php
			}
		?>
		<form class="form__reg" action="/Registro/editar" method="post">
			<input type="hidden" name="idParticipantes" value="<?= $datos['idParticipantes'] ?>">
			<input class="input" type="text" name="Nombres" placeholder="&#128101; Nombres" value="<?= $datos['Nombres'] ?>" required autofocus>
			<input class="input" type="text" name="Apellidos" placeholder="&#128101; Apellidos" value="<?= $datos['Apellidos'] ?>" required>
			<input class="input" type="date" name="FechaNac" placeholder="&#128231; Fecha de Nacimiento" value="<?= $datos['FechaNac'] ?>" required>
			<input class="input" type="email" name="CorreoElec" placeholder="&#128231; Correo Electronico" value="<?= $datos['CorreoElec'] ?>" required>
			<input class="input" type="tel" name="Telefono" maxlength="10" pattern="[0-9]+" placeholder="&#9742; Telefono" value="<?= $datos['Telefono'] ?>" required>
			<input class="input" type="text" name="Direccion" placeholder="&#127968; Direccion" value="<?= $datos['Direccion'] ?>" required>
			<div class="btn__form">
				<input class="btn__submit" type="submit" value="Guardar">
				<a class="btn__reset" type="button" href="/Registro/buscar">Regresar</a>
			</div>
		</form>
	</div>
</body>
</html>