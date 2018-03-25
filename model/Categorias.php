<?php
  require_once('DB.php');
  class Categorias{
    # Obtener categorías desde la BBDD
    public function getCategorias(){
      # Declarar arreglo
      $data = [];
      # Crear mantenedor
      $man = new Mantenedor();

      # Consulta
      $sql = "SELECT id, nombre
              FROM categorias";
      # Traer datos
      $exe = $man->free_query($sql);

      # Crear arreglo con datos de las categorías
      $i = 0;
      while($row = mysqli_fetch_assoc($exe)){
        $data[$i] = ['id' => $row['id'], 'nombre' => $row['nombre']];
        $i++;
      }

      return $data;
    }

    public function getCategoriaName($id){
      $man = new Mantenedor();

      $sql = "SELECT nombre FROM categorias WHERE id = '$id'";
      $exe = $man->free_query($sql);

      $data = mysqli_fetch_assoc($exe);

      return $data['nombre'];
    }
  }
