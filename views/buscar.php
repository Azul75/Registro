<div class="center">
	<h2>Seleccione el criterio de su busqueda:</h2>
		<div class="buscar">
			<form id="buscar-por" action="/Registro/buscar" method="post">
		  		<input id="buscar1" type="radio" name="buscar" value="Nombres" required checked> <label for="buscar1">Nombre</label>
		  		<input id="buscar2" type="radio" name="buscar" value="Apellidos" required> <label for="buscar2">Apellido</label>
		  		<input id="buscar3" type="radio" name="buscar" value="CorreoElec" required> <label for="buscar3">Email</label>
		  		<input id="buscar4" type="radio" name="buscar" value="Telefono" required> <label for="buscar4">Telefono</label><br>
				<input class="input" type="text" name="Search" placeholder="Ingrese su busqueda" autofocus required>
				<input class="btn__submit" type="submit" value="Buscar">
			</form>
		</div>
		<div class="table"> <?php
			if( isset($visitantes) ) {
				if($visitantes['code'] === 'ok') {
					if(!empty($visitantes['response'])) { ?>
						<table border="1" >
							<tr>
								<th>Num</th>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Fecha Nacimiento</th>
								<th>Email</th>
								<th>Telefono</th>
								<th>Direccion</th>
								<th>Acciones</th>
							</tr>

							<?php

							foreach($visitantes['response'] as $id => $mostrar){
							 ?>

							<tr>
								<td><?= ($id+1) ?></td>
								<td><?= $mostrar['Nombres'] ?></td>
								<td><?= $mostrar['Apellidos'] ?></td>
								<td><?= $mostrar['FechaNac'] ?></td>
								<td><?= $mostrar['CorreoElec'] ?></td>
								<td><?= $mostrar['Telefono'] ?></td>
								<td><?= $mostrar['Direccion'] ?></td>
								<td>
								<a class="boton-editar" href="/Registro/editar/<?= $mostrar['idParticipantes'] ?>">Editar</a>
									-
								<a class="boton-eliminar" href="/Registro/eliminar/<?= $mostrar['idParticipantes'] ?>">Eliminar</a>
							</td>
						</tr> <?php 
					} ?>
					</table> <?php
				} else { ?>
					<h3 class="tabla-vacia">No hay resultados.</h3> <?php
				}
				} else { 
					print_r($visitantes['response']);
					if(is_array($visitantes['response'])) { ?>
						<ul class="lista-error"> <?php
		 					foreach ($visitantes['response'] as $key => $error) { ?>
							<li><?= $visitantes['response'] ?><li> <?php
						} ?>
					</ul> <?php
				} else { ?>
						<h3 class="tabla-error"><?= $visitantes['response'] ?></h3> <?php
				}
			}
		} ?>
	</div>
</div>	