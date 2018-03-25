<?php
  require('DB.php');
  class Productos{
    public function getProductos($desde, $hasta, $categorias, $tiendas, $usuarios){
      $productos = [];
      $categorias_in = "";
      $tiendas_in = "";
      $usuarios_in = "";
      $man = new Mantenedor();


      if($desde == "" || $hasta == "") $filtro_fecha = " AND DATE(fecha) = CURDATE()";
      else $filtro_fecha = " AND DATE(fecha) BETWEEN '$desde' AND '$hasta'";

      # Categorías
      for ($i=0; $i < count($categorias); $i++) {
        if($categorias[$i] != ""){
          if($categorias[$i] != "TODAS"){
            if($i == 0) $categorias_in = "'" . $categorias[$i] . "'";
            else $categorias_in .= ", '" . $categorias[$i] . "'";
          }else{
            $categorias_in = "";
            break;
          }
        }
      }

      # Filtro Categorías
      if($categorias_in != "") $filtro_categorias = " AND m.prod_categoria IN ($categorias_in)";
      else $filtro_categorias = "";

      # Tiendas
      for ($i=0; $i < count($tiendas); $i++) {
        if($tiendas[$i] != ""){
          if($tiendas[$i] != "TODAS"){
            if($i == 0) $tiendas_in = "'" . $tiendas[$i] . "'";
            else $tiendas_in .= ", '" . $tiendas[$i] . "'";
          }else{
            $tiendas_in = "";
            break;
          }
        }
      }

      # Filtro Tiendas
      if($tiendas_in != "") $filtro_tiendas = " AND p.prod_tienda IN ($tiendas_in)";
      else $filtro_tiendas = "";

      # Usuario
      for ($i=0; $i < count($usuarios); $i++) {
        if($usuarios[$i] != ""){
          if($usuarios[$i] != "TODOS"){
            if($i == 0) $usuarios_in = "'" . $usuarios[$i] . "'";
            else $usuarios_in .= ", '" . $usuarios[$i] . "'";
          }else{
            $usuarios_in = "";
            break;
          }
        }
      }

      # Filtro usuarios
      if($usuarios_in != "") $filtro_usuarios = " AND p.prod_usuario IN ($usuarios_in)";
      else $filtro_usuarios = "";

      $sql = "SELECT p.cod_producto,
                     m.nombre_producto as 'descripcion',
                     t.nombre as 'tienda',
                     p.fecha,
                     u.nombre as 'usuario',
                     COUNT(p.cod_producto) as 'unidades'
               FROM productos as p
               LEFT JOIN tiendas as t
               ON p.prod_tienda = t.id
               LEFT JOIN usuarios as u
               ON u.id = p.prod_usuario
               LEFT JOIN maestra as m
               ON m.cod_producto = p.cod_producto
               WHERE 1
               $filtro_categorias
               $filtro_tiendas
               $filtro_usuarios
               $filtro_fecha
               GROUP BY p.cod_producto, u.nombre";

       $exe = $man->free_query($sql);

       $i = 0;
       while($row = mysqli_fetch_assoc($exe)){
         $productos[$i] = $row;
         $i++;
       }

       return $productos;
    }

    public function insertarProducto($cod1, $tienda, $usuario, $fecha){
      $man = new Mantenedor();
      $sql = "INSERT INTO `productos` (`cod_producto`, `prod_tienda`, `prod_usuario`, `fecha`)
                               VALUES ('$cod1', '$tienda', '$usuario', '$fecha')";
      $exe = $man->free_query($sql);

      if($exe) echo true;
      else echo false;
    }
  }
