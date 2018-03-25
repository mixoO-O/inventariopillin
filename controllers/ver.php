<?php
  if($_POST){
    $desde = $_POST['desde'];
    $hasta = $_POST['hasta'];
    $categorias_id = explode(',', $_POST['categorias_id']);
    $tiendas_id = explode(',', $_POST['tiendas_id']);
    $usuarios_id = explode(',', $_POST['usuarios_id']);

    # Archivos requeridos
    require_once('../model/Productos.php');
    require_once('../model/Categorias.php');
    require_once('../model/Tiendas.php');
    require_once('../model/Usuario.php');

    # Declaración de variables
    $p = new Productos();
    $c = new Categorias();
    $t = new Tiendas();
    $u = new Usuario();

    # Filtros
    $categorias = "";
    $tiendas = "";
    $usuarios = "";

    # Filtro Categorias
    if($categorias_id[0] != "TODAS"){
      for ($i=0; $i < count($categorias_id); $i++) {
        if($categorias_id[$i] != ""){
          if($i == 0) $categorias = $c->getCategoriaName($categorias_id[$i]);
          else $categorias .= ", " . $c->getCategoriaName($categorias_id[$i]);
        }
      }
    }else{
      $categorias = "TODAS";
    }

    # Filtro Tiendas
    if($tiendas_id[0] != "TODAS"){
      for ($i=0; $i < count($tiendas_id); $i++) {
        if($tiendas_id[$i] != ""){
          if($i == 0) $tiendas = $t->getTiendaName($tiendas_id[$i]);
          else $tiendas .= ", " . $t->getTiendaName($tiendas_id[$i]);
        }
      }
    }else{
      $tiendas = "TODAS";
    }

    # Filtro Usuarios
    if($usuarios_id[0] != "TODOS"){
      for ($i=0; $i < count($usuarios_id); $i++) {
        if($usuarios_id[$i] != ""){
          if($i == 0) $usuarios = $u->getUserName($usuarios_id[$i]);
          else $usuarios .= ", " . $u->getUserName($usuarios_id[$i]);
        }
      }
    }else{
      $usuarios = "TODOS";
    }

    # Obtener productos
    $datos = $p->getProductos($desde, $hasta, $categorias_id, $tiendas_id, $usuarios_id);
    echo json_encode($datos);
  }else{
    Header('Location: salir.php');
  }
