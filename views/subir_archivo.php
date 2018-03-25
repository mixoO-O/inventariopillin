<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Subir Base</title>
    <link rel="stylesheet" href="../views/public/css/bootstrap.min.css">
    </head>
  <body>
    <header>
      <?php require_once('../views/includes/menu.php'); ?>
      <h1 class="text-center">Subir Inventario</h1>
    </header>
    <hr>
    <section class="container text-center">
      <form action='../controllers/importe_base.php' method='post' enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-3">
            <h2>Subir:</h2>
          </div>
          <div class="col-md-9">
            <input type='file' class="file form-control" name='sel_file' size='20' required>
          </div>
        </div>
        <br>
        <div class="row justify-content-center">
          <div class="col-md-4">
           <button name="submit" class="btn btn-success form-control">Subir</button>
          </div>
        </div>
      </form>
    </section>
    <script src="../views/public/js/jquery-3.2.1.slim.min.js"></script>
    <script src="../views/public/js/bootstrap.min.js"></script>
  </body>
</html>
