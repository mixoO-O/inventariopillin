<?php
  session_start();
  if($_POST){
    require_once('../model/Productos.php');
    # Declaro clase productos
    $p = new Productos();

    # Nombre de la tienda
    $tienda = $_POST['tienda'];

    # Aquí es donde seleccionamos nuestro csv
    $fname = $_FILES['sel_file']['name'];
    $chk_ext = explode(".",$fname);

    if(strtolower(end($chk_ext)) == "csv") {
      # Si es correcto, entonces damos permisos de lectura para subir
      $filename = $_FILES['sel_file']['tmp_name'];
      $handle = fopen($filename, "r");

      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        # Limpiar fecha
        $fecha = explode(' ', $data[4]);

        switch (strtolower($fecha[1])) {
            case 'ene.':
            $mes = 1;
            break;
            case 'feb.':
            $mes = 2;
            break;
            case 'mar.':
            $mes = 3;
            break;
            case 'abr.':
            $mes = 4;
            break;
            case 'may.':
            $mes = 5;
            break;
            case 'jun.':
            $mes = 6;
            break;
            case 'jul.':
            $mes = 7;
            break;
            case 'ago.':
            $mes = 8;
            break;
            case 'sep.':
            $mes = 9;
            break;
            case 'oct.':
            $mes = 10;
            break;
            case 'nov.':
            $mes = 11;
            break;
            case 'dic.':
            $mes = 12;
            break;
            case 'jan.':
            $mes = 1;
            break;
            case 'apr.':
            $mes = 4;
            break;
            case 'aug.':
            $mes = 8;
            break;
            case 'dec.':
            $mes = 12;
            break;

          default:
            $mes = date('m');
            break;
        }

        $fecha = $fecha[2] . "-" . $mes . "-" . $fecha[0] . " " . $fecha[3];

        # Insertamos los datos con los valores...
        $p->insertarProducto($data[0], $tienda, $_SESSION['id'], $fecha);
      }
      # Cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
      fclose($handle);
    } else {
       # Si aparece esto es posible que el archivo no tenga el formato adecuado, inclusive cuando es cvs, revisarlo para
       # ver si esta separado por " , "
        echo "Archivo invalido!";
    }
  }
