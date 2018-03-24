<?php
  # Guardar número de tipo de usuario
  $permisos = $_SESSION['rank'];

  # Subir Archivos
  $menu[0] = ["nombre" => "Subir Archivos", "link" => "mixoweko.php"];

  # Si es jefe, puede acceder a este sitio
  if($permisos > 1){
    $menu[1] = ["nombre" => "Exportar Archivos", "link" => "mixoweko2.php"];
  }
