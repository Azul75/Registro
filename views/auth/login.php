<?php
/**
 * Login
 **/
?>

<div id="error"><?php
if( isset($error) && !empty($error) ) { ?>
<div class="error-module">
	<p>Error: <?= $error ?></p>
	</div> <?php
} ?>
</div>
<div class="login">
	<h1>Login</h1>
	<form method="post">
		<input type="email" name="email" placeholder="&#128231; Correo Electronico" required />
		<input type="password" name="password" placeholder="&#x1f511; Contraseña" required />
		<button type="submit" class="btn btn-primary btn-block btn-large">Entrar</button>
	</form>
</div>