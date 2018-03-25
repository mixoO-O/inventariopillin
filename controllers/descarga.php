<?php
  session_start();

  if($_SESSION['rank'] == 1){
    if($_GET){
      $desde = $_GET['desde'];
      $hasta = $_GET['hasta'];
      $categorias_id = explode(',', $_GET['categorias_id']);
      $tiendas_id = explode(',', $_GET['tiendas_id']);
      $usuarios_id = explode(',', $_GET['usuarios_id']);



    }else{
      Header('Location: salir.php');
    }
  }else{
    Header('Location: salir.php');
  }
