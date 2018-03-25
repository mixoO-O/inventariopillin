<?php
  session_start();

  if($_SESSION['rank'] == 2){
    if($_GET){
      $desde = $_GET['desde'];
      $hasta = $_GET['hasta'];
      $categorias_id = $_GET['categorias_id'];
      $tiendas_id = $_GET['tiendas_id'];
      $usuarios_id = $_GET['usuarios_id'];


      // Aqui va la wea



      // Aquí termina la wea



      // Aquí empieza el excel
      $tbHtml = "
      <table align='center' style='border: solid 2px #D5D5D5;' id='grid'  border='0' cellpadding='5' cellspacing='2' >
        <header>
          <tr style='background-color:#0F6CAE; color:#FFFFFF;' >
            <th>Periodo:</th>
            <th>$desde al $hasta</th>
          </tr>
        </header>";

      $c=0;

      while ($row = mysql_fetch_assoc($exe)){
        $bgcolor=($c++ % 2==0)?"bgcolor='#EFF8FB'":"bgcolor='#F2F2F2'";

        $tbHtml .= "
          <tr $bgcolor>
            <td align='center'>Categoría:</td>
            <td align='center'>$row[rut]</td>
            <td align='center'>$row[nombre]</td>
            <td>$row[direccion]</td>
            <td align='center'>$row[comuna]</td>
            <td align='center'>$row[region]</td>
            <td align='center'>$row[caso_motivo]</td>
            <td align='center'>$row[estado]</td>
            <td align='center'>$row[ticket]</td>
            <td align='center'>$row[rut_gestion]</td>
            <td align='center'>$row[fecha_gestion]</td>
          </tr>";
      }

      $man->cerrar();

      $tbHtml .= "</html>";

      $tbHtml .= 'utf-string ...';

      if (mb_detect_encoding($tbHtml ) == 'UTF-8') {
         $tbHtml = mb_convert_encoding($tbHtml , "HTML-ENTITIES", "UTF-8");
      }

      header("Content-type: application/vnd.ms-excel");
      header("Content-Disposition: attachment; filename=Escalamientos_SDESK_".date("Y-m-d").".xls");
      header("Pragma: no-cache");
      header("Expires: 0");
      echo $tbHtml;







    }else{
      Header('Location: salir.php');
    }
  }else{
    Header('Location: salir.php');
  }
