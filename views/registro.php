
<?php
/**
 * Registro nuevo
 **/
?>

<div class="container">
	<div class="form__top">
		<h2>Formulario<span> Registro</span></h2><hr><h3>Participantes del evento</h3>
	</div>
	<div><?php
		if($mensaje){ ?>
		<div class="mensaje">
			<p><?= $mensaje ?></p>
		</div> <?php
		} ?>
		<form class="form__reg" action="/Registro/registro" method="post">
			<input class="input" type="text" name="Nombres" placeholder="&#128101; Nombres" required autofocus>
			<input class="input" type="text" name="Apellidos" placeholder="&#128101; Apellidos" required>
			<input class="input" type="date" name="FechaNac" placeholder="&#128231; Fecha de Nacimiento" required>
			<input class="input" type="email" name="CorreoElec" placeholder="&#128231; Correo Electronico" required>
			<input class="input" type="tel" name="Telefono" maxlength="10" pattern="[0-9]+" placeholder="&#9742; Telefono" required>
			<input class="input" type="text" name="Direccion" placeholder="&#127968; Direccion" required>
			<div class="btn__form">
				<input class="btn__submit" type="submit" value="Registrar">
				<input class="btn__reset" type="reset" value="Limpiar">
			</div>
		</form>
	</div>
</div>