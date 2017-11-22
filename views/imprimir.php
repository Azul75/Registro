<div class="center">	
	<h2>Seleccione los campos a imprimir:</h2>
	<div class="exportar">
		<form id="exportar-por" action="/Registro/generar-pdf" method="post">
			<input id="buscar1" type="checkbox" name="datos[]" value="Nombres" required checked> <label for="buscar1">Nombre</label>
			<input id="buscar2" type="checkbox" name="datos[]" value="Apellidos"> <label for="buscar2">Apellido</label>
			<input id="buscar3" type="checkbox" name="datos[]" value="FechaNac"> <label for="buscar3">Fecha Nac</label>
			<input id="buscar4" type="checkbox" name="datos[]" value="CorreoElec"> <label for="buscar4">Email</label>
			<input id="buscar5" type="checkbox" name="datos[]" value="Telefono"> <label for="buscar5">Telefono</label>
			<input id="buscar6" type="checkbox" name="datos[]" value="Direccion"> <label for="buscar6">Direccion</label>
			<input class="btn__submit" type="submit" value="Imprimir">
		</form>
	</div>
</div>