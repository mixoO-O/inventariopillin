<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Descargar Inventario</title>

  <link rel="stylesheet" href="../views/public/css/bootstrap.min.css">
  <link rel="stylesheet" href="../views/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <style>
    .fa-click{
      cursor: pointer;
    }

    .lista_filtros > li{
      display: inline;
    }
  </style>
</head>
<body>
  <header>
    <?php require_once('../views/includes/menu.php'); ?>
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

        <h5 class="card-title">Filtros por Categorías / Tiendas</h5>

        <div class="row">
          <div class="col-md-5 col-sm-11">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">CATEGORÍAS</span>
              </div>
              <select id="categorias" class="form-control">
                <option value="TODAS">TODAS</option>
                <?php foreach ($categorias as $key => $value) { ?>
                  <option value="<?=$value['id']?>"><?=$value['nombre']?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="col-md-1 col-sm-1 mb-3 text-center">
            <i class="fa fa-plus-circle fa-2x fa-click" id="addCategoria" aria-hidden="true"></i>
          </div>

          <div class="col-md-5 col-sm-11">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">TIENDAS</span>
              </div>
              <select id="tiendas" class="form-control">
                <option value="TODAS">TODAS</option>
                <?php foreach ($tiendas as $key => $value) { ?>
                  <option value="<?=$value['id']?>"><?=$value['nombre']?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="col-md-1 col-sm-1 mb-3 text-center">
            <i class="fa fa-plus-circle fa-2x fa-click" id="addTienda" aria-hidden="true"></i>
          </div>
        </div>

        <div class="row text-muted">
          <div class="col-md-6 col-sm-12 mb-3">
            <h5 class="card-title">Categorías seleccionadas</h5>
            <ul class="lista_filtros" id="categorias_seleccionadas"></ul>
          </div>

          <div class="col-md-6 col-sm-12 mb-3">
            <h5 class="card-title">Tiendas seleccionadas</h5>
            <ul class="lista_filtros" id="tiendas_seleccionadas"></ul>
          </div>
        </div>

        <h5 class="card-title">Filtro por Usuarios</h5>
        <div class="row">
          <div class="col-md-5 col-sm-12 mb-3">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">USUARIOS</span>
              </div>
              <select id="usuarios" class="form-control">
                <option value="TODOS">TODOS</option>
                <?php foreach ($usuarios as $key => $value) { ?>
                  <option value="<?=$value['id']?>"><?=$value['nombre']?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="col-md-1 col-sm-1 mb-3 text-center">
            <i class="fa fa-plus-circle fa-2x fa-click" id="addUsuario" aria-hidden="true"></i>
          </div>
        </div>

        <div class="row text-muted">
          <div class="col-md-6 col-sm-12 mb-3">
            <h5 class="card-title">Usuarios seleccionados</h5>
            <ul class="lista_filtros" id="usuarios_seleccionados"></ul>
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
