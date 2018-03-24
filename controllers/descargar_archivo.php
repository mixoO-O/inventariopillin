<?php
  session_start();

  # Validar si la sesión ha sido creada
  if(isset($_SESSION['user']) && isset($_SESSION['id']) && $_SESSION['rank'] == 1){
    # Incluir menú
    require_once('menu.php');

    # Incluir clases
    require_once('../model/Categorias.php');
    require_once('../model/Tiendas.php');
    require_once('../model/Usuario.php');

    # Categorias
    $c = new Categorias();
    $categorias = $c->getCategorias();

    # Tiendas
    $t = new Tiendas();
    $tiendas = $t->getTiendas();

    # Usuarios
    $u = new Usuario();
    $usuarios = $u->getUsuarios();

    # Mostrar vista
    include_once('../views/descargar_archivo.php');
  }else{
    Header('Location: salir.php');
  }
