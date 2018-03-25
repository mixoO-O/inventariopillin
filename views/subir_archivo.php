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

    <section class="container">
      <form action='../controllers/importe_base.php' method='post' enctype="multipart/form-data">
        <div class="card">
          <div class="card-body">

            <h5 class="card-title text-center">Seleccionar Archivo</h5>

            <div class="row justify-content-md-center">
              <div class="col-md-8 col-sm-12">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Archivo</span>
                  </div>
                  <input type='file' class="file form-control" name='sel_file' size='20' required>
                </div>
              </div>
            </div>

            <div class="row justify-content-md-center">
              <div class="col-md-8 col-sm-12">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">TIENDA</span>
                  </div>
                  <select id="tienda" name="tienda" class="form-control" required>
                    <?php foreach ($tiendas as $key => $value) { ?>
                      <option value="<?=$value['id']?>"><?=$value['nombre']?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="card-footer text-muted text-center">
            <button type="submit" class="btn btn-success">SUBIR ARCHIVO</button>
          </div>
        </div>
      </form>
    </section>

    <script src="../views/public/js/jquery-3.2.1.slim.min.js"></script>
    <script src="../views/public/js/bootstrap.min.js"></script>
  </body>
</html>
