<?php
  # Guardar número de tipo de usuario
  $permisos = $_SESSION['rank'];

  # Subir Archivos
  $menu[0] = ["nombre" => "Subir Archivos", "link" => "../controllers/subir_archivos.php"];

  # Si es jefe, puede acceder a este sitio
  if($permisos >= 1){
    $menu[1] = ["nombre" => "Exportar Archivos", "link" => "../controllers/descargar_archivo.php"];
  }
