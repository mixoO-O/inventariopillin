<nav class="navbar header-navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="../controllers/home.php">Pillin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php foreach ($menu as $key => $value) { ?>
        <li class="nav-item">
          <a class="nav-link" href="<?=$value['link']?>"><?=$value['nombre']?></a>
        </li>
      <?php } ?>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown ml-auto">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?=$_SESSION['user']?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../controllers/salir.php">Cerrar Sesión</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
