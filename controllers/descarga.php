<?php
  session_start();
  if($_SESSION['rank'] == 2){
    if($_GET){
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

      # Variables GET
      $desde = $_GET['desde'];
      $hasta = $_GET['hasta'];

      if($desde == "" || $hasta == "") $fecha = " HOY";
      else $fecha = " $desde al $hasta";

      if($_GET['categorias_id'] == "") $categorias_id[0] = "TODAS";
      else $categorias_id = explode(',', $_GET['categorias_id']);

      if($_GET['tiendas_id'] == "") $tiendas_id[0] = "TODAS";
      else $tiendas_id = explode(',', $_GET['tiendas_id']);

      if($_GET['usuarios_id'] == "") $usuarios_id[0] = "TODOS";
      else $usuarios_id = explode(',', $_GET['usuarios_id']);

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

      $tbHtml = "
      <table align='center' style='border: solid 2px #A5D7F9;' id='grid'  border='0' cellpadding='5' cellspacing='2' >
        <header>
          <tr>
            <th style='background-color:#0F6CAE; color:#FFFFFF;'>Periodo:</th>
            <th style='background-color:#0F6CAE; color:#FFFFFF;'>$fecha</th>
            <th style='background-color:#0F6CAE; color:#FFFFFF;'></th>
            <th style='background-color:#0F6CAE; color:#FFFFFF;'></th>
            <th style='background-color:#0F6CAE; color:#FFFFFF;'></th>
            <th style='background-color:#0F6CAE; color:#FFFFFF;'></th>
          </tr>
          <tr>
            <td style='background-color:#E6F2FB; color:#000;'>Categoría:</td>
            <td style='background-color:#E6F2FB; color:#000;'>$categorias</td>
            <td style='background-color:#E6F2FB; color:#000;'></td>
            <td style='background-color:#E6F2FB; color:#000;'></td>
            <td style='background-color:#E6F2FB; color:#000;'></td>
            <td style='background-color:#E6F2FB; color:#000;'></td>
          </tr>
          <tr>
            <td style='background-color:#FFFFFF; color:#000;'>Tiendas:</td>
            <td style='background-color:#FFFFFF; color:#000;'>$tiendas</td>
            <td style='background-color:#FFFFFF; color:#000;'></td>
            <td style='background-color:#FFFFFF; color:#000;'></td>
            <td style='background-color:#FFFFFF; color:#000;'></td>
            <td style='background-color:#FFFFFF; color:#000;'></td>
          </tr>
          <tr>
            <td style='background-color:#E6F2FB; color:#000;'>Usuarios:</td>
            <td style='background-color:#E6F2FB; color:#000;'>$usuarios</td>
            <td style='background-color:#E6F2FB; color:#000;'></td>
            <td style='background-color:#E6F2FB; color:#000;'></td>
            <td style='background-color:#E6F2FB; color:#000;'></td>
            <td style='background-color:#E6F2FB; color:#000;'></td>
          </tr>
          <tr></tr>
        </header>";

        $tbHtml .= "<tr>
                      <th style='background-color:#0F6CAE; color:#FFFFFF;'>Codigo Producto</th>
                      <th style='background-color:#0F6CAE; color:#FFFFFF;'>Descripción</th>
                      <th style='background-color:#0F6CAE; color:#FFFFFF;'>Tienda</th>
                      <th style='background-color:#0F6CAE; color:#FFFFFF;'>Fecha</th>
                      <th style='background-color:#0F6CAE; color:#FFFFFF;'>Usuario</th>
                      <th style='background-color:#0F6CAE; color:#FFFFFF;'>Total Uds</th>
                    </tr>";

      $c=0;
      for ($i=0; $i < count($datos); $i++) {
        # Color de fondo
        $bgcolor=($c++ % 2==0)?"bgcolor='#EFF8FB'":"bgcolor='#F2F2F2'";

        # Variables temporales
        if($i == 0){
          $codigo_tmp = $datos[$i]['cod_producto'];
          $total_uds_tmp = 0;
        }

        if($datos[$i]['cod_producto'] != $codigo_tmp){
          $tbHtml .= "<tr>
                        <td $bgcolor style='mso-number-format:\"\@\";'>" . $codigo_tmp . "</td>
                        <td $bgcolor style='font-weight: bold;'>Subtotal</td>
                        <td $bgcolor></td>
                        <td $bgcolor></td>
                        <td $bgcolor></td>
                        <td $bgcolor style='font-weight: bold;'>$total_uds_tmp</td>
                      </tr>
                      <tr>
                        <td colspan='6'></td>
                      </tr>";
          $c++;

          $codigo_tmp = $datos[$i]['cod_producto'];
          $total_uds_tmp = $datos[$i]['unidades'];
        }else{
          $total_uds_tmp += $datos[$i]['unidades'];
        }

        $tbHtml .= "<tr>
                      <td $bgcolor style='mso-number-format:\"\@\";'>" . $datos[$i]['cod_producto'] ."</td>
                      <td $bgcolor>" . $datos[$i]['descripcion'] ."</td>
                      <td $bgcolor>" . $datos[$i]['tienda'] ."</td>
                      <td $bgcolor>" . $datos[$i]['fecha'] ."</td>
                      <td $bgcolor>" . $datos[$i]['usuario'] ."</td>
                      <td $bgcolor>" . $datos[$i]['unidades'] ."</td>
                  </tr>";


        if($i == (count($datos)-1)){
          $tbHtml .= "<tr>
                        <td $bgcolor style='mso-number-format:\"\@\";'>" . $codigo_tmp . "</td>
                        <td $bgcolor style='font-weight: bold;'>Subtotal</td>
                        <td $bgcolor></td>
                        <td $bgcolor></td>
                        <td $bgcolor></td>
                        <td $bgcolor style='font-weight: bold;'>$total_uds_tmp</td>
                      </tr>";
        }
      }

      $tbHtml .= "</html>";

      $tbHtml .= 'utf-string ...';

      if (mb_detect_encoding($tbHtml ) == 'UTF-8') {
         $tbHtml = mb_convert_encoding($tbHtml , "HTML-ENTITIES", "UTF-8");
      }

      header("Content-type: application/vnd.ms-excel");
      header("Content-Disposition: attachment; filename=Inventario_".date("Y-m-d").".xls");
      header("Pragma: no-cache");
      header("Expires: 0");
      echo $tbHtml;
    }else{
      Header('Location: salir.php');
    }
  }else{
    Header('Location: salir.php');
  }
