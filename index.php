<!DOCTYPE html>
<html lang="en">
<head>
	<title>LOGIN PILLIN</title>
	<meta charset="UTF-8">
	<meta name="viewsport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="views/public/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="views/public/css/main.css">
	<link rel="stylesheet" href="views/public/css/bootstrap.min.css">
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="views/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="controllers/validarUsuario.php" method="POST">
					<span class="login100-form-title">
						INVENTARIO PILLIN
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="user" placeholder="Usuario" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Debe indicar la contraseña">
						<input class="input100" type="password" name="pass" placeholder="Contraseña" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							INGRESAR
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
