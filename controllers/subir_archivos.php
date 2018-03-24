<?php
  session_start();

  # Validar si la sesión ha sido creada
  if(isset($_SESSION['user']) && isset($_SESSION['id'])){
    # Incluir menú
    require_once('menu.php');

    # Mostrar vista
    include_once('../views/subir_archivo.php');
  }else{
    Header('Location: salir.php');
  }
