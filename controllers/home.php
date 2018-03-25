<?php
  session_start();

  # Validar si la sesión ha sido creada
  if(isset($_SESSION['user']) && isset($_SESSION['id'])){
    # Incluir menú
    require('menu.php');

    # Mostrar vista
    include_once('../views/home.php');
  }else{
    Header('Location: salir.php');
  }
