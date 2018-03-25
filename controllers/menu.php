<?php
  # Guardar número de tipo de usuario
  $permisos = $_SESSION['rank'];

  # Subir Archivos
  $menu[0] = ["nombre" => "Subir Archivos", "link" => "../controllers/subir_archivos.php"];

  # Si es jefe, puede acceder a este sitio
<<<<<<< HEAD
  if($permisos > 1){
=======
  if($permisos >= 1){
>>>>>>> 754b04769b6c6f698c041c02da3d020dcce325f0
    $menu[1] = ["nombre" => "Exportar Archivos", "link" => "../controllers/descargar_archivo.php"];
  }
