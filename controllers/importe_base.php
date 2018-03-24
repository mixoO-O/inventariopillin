<?php
 require_once('../model/DB.php');
 $man = new Mantenedor();

    if(isset($_POST['submit']))
    {
        //Aquí es donde seleccionamos nuestro csv
         $fname = $_FILES['sel_file']['name'];
         echo 'Cargando nombre del archivo: '.$fname.' <br>';
         $chk_ext = explode(".",$fname);

         if(strtolower(end($chk_ext)) == "csv")
         {
             //si es correcto, entonces damos permisos de lectura para subir
             $filename = $_FILES['sel_file']['tmp_name'];
             $handle = fopen($filename, "r");

             while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
             {
               //Insertamos los datos con los valores...
                $sql = "INSERT INTO `prueba`(`p_1`, `p_2`, `p_3`, `p_4`, `p_5`, `p_6`) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]')";
                $exe = $man->free_query($sql);
             }
             //cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
             fclose($handle);
             echo "Importación exitosa!";
         }
         else
         {
            //si aparece esto es posible que el archivo no tenga el formato adecuado, inclusive cuando es cvs, revisarlo para
//ver si esta separado por " , "
             echo "Archivo invalido!";
         }
    }

?>
