<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Subir Base</title>
    <link rel="stylesheet" href="../views/public/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
  <body>
    <header>
      <?php require_once('../views/includes/menu.php'); ?>

    </header>

    <section class="container">
      <?php
        if(isset($_GET['id'])){
        if($_GET['id'] == 1){ ?>
        <br>
        <div class="alert alert-success text-center" role="alert">
          ¡BASE SUBIDA CON ÉXITO!
        </div>
      <?php }else if($_GET['id'] == 2){ ?>
        <br>
        <div class="alert alert-danger text-center" role="alert">
          ¡ERROR EN SUBIDA, FAVOR VERIFIQUE EL ARCHIVO!
        </div>
      <?php } } ?>

      <h1 class="text-center">Subir Inventario</h1>

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
                      <option value="" disabled selected>SELECCIONE</option>
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
