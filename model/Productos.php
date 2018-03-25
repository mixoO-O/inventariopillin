<?php
  requide('DB.php');
  class Productos{
    public getProductos($desde, $hasta, $categorias, $tiendas, $usuarios){
      if($desde == "" || $hasta == "") $filtro_fecha = " AND DATE(fecha) = CURDATE()";
      else $filtro_fecha = " AND DATE(fecha) BETWEEN '$desde' AND '$hasta'";

      // $sql = "SELECT p.cod_producto,
      //                p.name as 'descripcion',
      //                t.name as 'tienda',
      //                p.fecha,
      //                u.nombre_usuario as 'usuario'";
    }
  }
