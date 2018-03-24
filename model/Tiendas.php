<?php
  require_once('DB.php');
  class Tiendas{

    public function getTiendas(){
      $tiendas = [];
      $man = new Mantenedor();

      $sql = "SELECT id, name
              FROM tiendas";
      $exe = $man->free_query($sql);

      $i = 0;
      while($row = mysqli_fetch_assoc($exe)){
        $tiendas = ['id' => $row['id'], 'nombre' => $row['name']];
        $i++;
      }

      return $tiendas;
    }
  }
