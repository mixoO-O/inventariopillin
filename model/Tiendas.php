<?php
  require_once('DB.php');
  class Tiendas{

    public function getTiendas(){
      $tiendas = [];
      $man = new Mantenedor();

      $sql = "SELECT id, nombre
              FROM tiendas";
      $exe = $man->free_query($sql);

      $i = 0;
      while($row = mysqli_fetch_assoc($exe)){
        $tiendas[$i] = ['id' => $row['id'], 'nombre' => $row['nombre']];
        $i++;
      }

      return $tiendas;
    }

    public function getTiendaName($id){
      $man = new Mantenedor();

      $sql = "SELECT nombre FROM tiendas WHERE id = '$id'";
      $exe = $man->free_query($sql);

      $data = mysqli_fetch_assoc($exe);

      return $data['name'];
    }
  }
