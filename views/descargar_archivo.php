<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Descargar Inventario</title>

  <link rel="stylesheet" href="../views/public/css/bootstrap.min.css">
  <link rel="stylesheet" href="../views/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
  <header>
    <?php require_once('../views/includes/menu.php');
    ?>
    <h1 class="text-center">Descargar Inventario</h1>
  </header>

  <section class="container">

    <div class="card">
      <div class="card-body">

        <h5 class="card-title">Periodo</h5>

        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">DESDE</span>
              </div>
              <input type="text" class="form-control calendar" id="desde">
            </div>
          </div>

          <div class="col-md-6 col-sm-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">HASTA</span>
              </div>
              <input type="text" class="form-control calendar" id="hasta">
            </div>
          </div>
        </div>

        <h5 class="card-title">Filtro por Categoría</h5>

        <div class="row">
          <div class="col-md-6 col-sm-11">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">CATEGORÍAS</span>
              </div>
              <select id="categorias" class="form-control">
                <option value="TODAS">TODAS</option>
              </select>
            </div>
          </div>

          <div class="col-md-1 col-sm-1">
            <i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i>
          </div>
        </div>

      </div>

      <div class="card-footer text-muted text-center">
        <button type="button" class="btn btn-success" id="btnDescargar">DESCARGAR</button>
      </div>
    </div>

  </section>

  <footer>

  </footer>

  <script src="../views/public/js/jquery-3.2.1.slim.min.js"></script>
  <script src="../views/public/js/bootstrap.min.js"></script>
</body>
</html>
