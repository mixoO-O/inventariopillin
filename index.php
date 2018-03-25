<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<meta http-equiv="X-UA-Compatible" content="ie=edge">
 	<title>Inicio de Sesión</title>
	<link rel="stylesheet" href="views/public/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>
 <body>
	<div class="page-header">
		<h1 class="text-center">Inicio de Sesión</h1>
	</div>
<div class="container">
	<hr>
	<form action="controllers/validarUsuario.php" method="POST">
		<br>
		<br>

		<!-- <div class="col-md-6 col-sm-12">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">DESDE</span>
				</div>
				<input type="text" class="form-control calendar" id="desde">
			</div>
		</div> -->


		<div class="row justify-content-md-center justify-content-sm-center">
			<div class="col-md-4 col-sm-11">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Usuario</span>
					</div>
					<input class="form-control" type="text" id="user" name="user" placeholder="Usuario" required>
				</div>
			</div>
		</div>

		<div class="row justify-content-md-center justify-content-sm-center">
			<div class="col-md-4 col-sm-11">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Contraseña</span>
					</div>
					<input class="form-control" type="password" name="pass" id="pass" placeholder="Contraseña" required>
				</div>
			</div>
		</div>

		<div class="row justify-content-md-center justify-content-sm-center">
			<div class="col-md-4 col-sm-11 mb-3">
					<button type="submit" class="btn btn-primary form-control">Ingresar</button>
			</div>
		</div>
	</form>

<?php
	if(isset($_GET['id'])){
	if($_GET['id'] == 1){ ?>
	<div class="row justify-content-md-center justify-content-sm-center">
		<div class="col-md-6 col-sm-11 text-center">
			<div class="alert alert-danger" role="alert">
				¡USUARIO Y/O CONTRASEÑA INCORRECTO!
			</div>
		</div>
	</div>
	<?php } } ?>
</div>
	<script src="views/public/js/jquery-3.2.1.slim.min.js"></script>
	<script src="views/public/js/bootstrap.min.js"></script>
 </body>
 </html>
