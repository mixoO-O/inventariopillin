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
      $sql = "SELECT id, name
              FROM categorias";
      # Traer datos
      $exe = $man->free_query($sql);

      # Crear arreglo con datos de las categorías
      $i = 0;
      while($row = mysqli_fetch_assoc($exe)){
        $data[$i] = ['id' => $row['id'], 'nombre' => $row['name']];
        $i++;
      }

      return $data;
    }
  }
