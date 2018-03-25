<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Inventario Pillin</title>

  <link rel="stylesheet" href="../views/public/css/bootstrap.min.css">
</head>
<body>
    <header>
      <?php require_once('../views/includes/menu.php'); ?>
    </header>
    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column text-center">
      <main role="main" class="inner cover">
        <h1 class="cover-heading">¡Bienvenido!</h1>
        <p class="lead">Para subir tus archivos, guíate con la barra de navegación que se encuentra arriba del todo o en el siguiente botón.</p>
        <p class="lead">
          <a href="../controllers/subir_archivos.php" class="btn btn-lg btn-outline-secondary">Llévame</a>
        </p>
      </main>
    </div>

  <script src="../views/public/js/jquery-3.2.1.slim.min.js"></script>
  <script src="../views/public/js/bootstrap.min.js"></script>
</body>
</html>
