<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Reporte Inventario</title>

  <link rel="stylesheet" href="../views/public/css/bootstrap.min.css">
  <link rel="stylesheet" href="../views/public/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../views/public/css/bootstrap-datepicker.css">
  <style>
    .fa-click{
      cursor: pointer;
    }

    .lista_filtros > li{
      display: inline;
    }

    .thead{
      background-color:#0F6CAE;
      color:#FFFFFF;
    }

    @media (min-width: 992px){
      .modal-lg {
        max-width: 980px !important;
      }
    }

  </style>
</head>
<body>
  <header>
    <?php require_once('../views/includes/menu.php'); ?>
    <h1 class="text-center">Reporte Inventario</h1>
  </header>

  <section class="container">

    <div class="card">
      <div class="card-body">

        <h5 class="card-title">Periodo</h5>

        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">DESDE</span>
              </div>
              <input type="text" class="form-control calendar" id="desde">
            </div>
          </div>

          <div class="col-md-6 col-sm-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">HASTA</span>
              </div>
              <input type="text" class="form-control calendar" id="hasta">
            </div>
          </div>
        </div>

        <h5 class="card-title">Filtros por Categorías / Tiendas</h5>

        <div class="row">
          <div class="col-md-5 col-sm-11">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">CATEGORÍAS</span>
              </div>
              <select id="categorias" class="form-control">
                <option value="TODAS">TODAS</option>
                <?php foreach ($categorias as $key => $value) { ?>
                  <option value="<?=$value['id']?>"><?=$value['nombre']?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="col-md-1 col-sm-1 mb-3 text-center">
            <i class="fa fa-plus-circle fa-2x fa-click" id="addCategoria" aria-hidden="true"></i>
          </div>

          <div class="col-md-5 col-sm-11">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">TIENDAS</span>
              </div>
              <select id="tiendas" class="form-control">
                <option value="TODAS">TODAS</option>
                <?php foreach ($tiendas as $key => $value) { ?>
                  <option value="<?=$value['id']?>"><?=$value['nombre']?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="col-md-1 col-sm-1 mb-3 text-center">
            <i class="fa fa-plus-circle fa-2x fa-click" id="addTienda" aria-hidden="true"></i>
          </div>
        </div>

        <div class="row text-muted">
          <div class="col-md-6 col-sm-12 mb-3">
            <h5 class="card-title">Categorías seleccionadas</h5>
            <ul class="lista_filtros" id="categorias_seleccionadas"></ul>
          </div>

          <div class="col-md-6 col-sm-12 mb-3">
            <h5 class="card-title">Tiendas seleccionadas</h5>
            <ul class="lista_filtros" id="tiendas_seleccionadas"></ul>
          </div>
        </div>

        <h5 class="card-title">Filtro por Usuarios</h5>
        <div class="row">
          <div class="col-md-5 col-sm-12 mb-3">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">USUARIOS</span>
              </div>
              <select id="usuarios" class="form-control">
                <option value="TODOS">TODOS</option>
                <?php foreach ($usuarios as $key => $value) { ?>
                  <option value="<?=$value['id']?>"><?=$value['nombre']?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="col-md-1 col-sm-1 mb-3 text-center">
            <i class="fa fa-plus-circle fa-2x fa-click" id="addUsuario" aria-hidden="true"></i>
          </div>
        </div>

        <div class="row text-muted">
          <div class="col-md-6 col-sm-12 mb-3">
            <h5 class="card-title">Usuarios seleccionados</h5>
            <ul class="lista_filtros" id="usuarios_seleccionados"></ul>
          </div>
        </div>

      </div>

      <div class="card-footer text-muted text-center">
        <button type="button" class="btn btn-primary" id="btnVer">VER</button>
        <button type="button" class="btn btn-success" id="btnDescargar">DESCARGAR</button>
      </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="ver" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" >
          <div class="modal-header">
            <h5 class="modal-title" id="ver_modal">Datos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered table-condensed table-striped table-hover">
              <thead class="thead-dark">
                <th>Codigo Producto</th>
                <th>Descripción</th>
                <th>Tienda</th>
                <th>Fecha</th>
                <th>Usuario</th>
                <th>Total Uds</th>
              </thead>
              <tbody id="cuerpo_tabla"></tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

  <hr>
  </section>

  <script src="../views/public/js/jquery-3.3.1.min.js"></script>
  <script src="../views/public/js/bootstrap.min.js"></script>
  <script src="../views/public/js/bootstrap-datepicker.js"></script>
  <script src="../views/public/js/bootstrap-datepicker.es.js"></script>
  <script>
    // Add calendar
    $(".calendar").datepicker({format: 'yyyy-mm-dd', language: 'es', autoclose: true});

    // Events
    // Visualizar Datos
    $("#btnVer").click(function(){
      var desde = $("#desde").val(),
          hasta = $("#hasta").val(),
          categorias_id = "",
          tiendas_id = "",
          usuarios_id = "";

      $('#categorias_seleccionadas li').each(function(){
        let id = $(this).attr('id').split("_");
        categorias_id += id[2] + ",";
      });

      $('#tiendas_seleccionadas li').each(function(){
        let id = $(this).attr('id').split("_");
        tiendas_id += id[2] + ",";
      });

      $('#usuarios_seleccionados li').each(function(){
        let id = $(this).attr('id').split("_");
        usuarios_id += id[2] + ",";
      });

      $.post("ver.php",{
        desde,
        hasta,
        categorias_id,
        tiendas_id,
        usuarios_id},
        function(data){
          $("#cuerpo_tabla").html('');

          var q = data.length,
              codigo_tmp = "";
              total_uds_tmp = "",
              view = "";

          for (var i = 0; i < q; i++) {
            if(i == 0){
              codigo_tmp = data[i].cod_producto;
              total_uds_tmp = "";
            }

            if(data[i].cod_producto != codigo_tmp){
              view = '<tr>'
                        +'<td>'+codigo_tmp+'</td>'
                        +'<th>Subtotal</th>'
                        +'<td colspan="3"></td>'
                        +'<td>'+total_uds_tmp+'</td>'
                      +'</tr>';

              $("#cuerpo_tabla").append(view);
              codigo_tmp = data[i].cod_producto;
              total_uds_tmp = data[i].unidades;
            }else{
              total_uds_tmp += data[i].unidades;
            }
            data[i].descripcion = (data[i].descripcion == null) ? "" : data[i].descripcion;

            view = '<tr>'
                      +'<td>'+data[i].cod_producto+'</td>'
                      +'<td>'+data[i].descripcion+'</td>'
                      +'<td>'+data[i].tienda+'</td>'
                      +'<td>'+data[i].fecha+'</td>'
                      +'<td>'+data[i].usuario+'</td>'
                      +'<td>'+data[i].unidades+'</td>'
                    +'</tr>';
            $("#cuerpo_tabla").append(view);

            if(i == (q-1)){
              view = '<tr>'
                        +'<td>'+codigo_tmp+'</td>'
                        +'<th>Subtotal</th>'
                        +'<td colspan="3"></td>'
                        +'<td>'+total_uds_tmp+'</td>'
                      +'</tr>';
              $("#cuerpo_tabla").append(view);
            }
          }
        }, 'json');

      $("#ver").modal('show');
    });

    // Agregar Categoria
    $("#addCategoria").click(function(){
      var id_select = $("#categorias option:selected").val(),
          name_select = $("#categorias option:selected").text(),
          object = '<li id="li_categorias_'+id_select+'" onclick="deleteLi(\''+id_select+'\', \'categorias_seleccionadas\')">'
                  +'<a href="#">'+name_select+'</a>'
                  +' | </li>',
          validator = true;

      $("#categorias_seleccionadas li").each(function(){
        if( $(this).text() == "TODAS" || name_select == "TODAS" && $(this).text() != "TODAS" || $(this).text() == (name_select + " | ")){
          validator = false;
          return false;
        }
      });

      if(validator) $("#categorias_seleccionadas").append(object);
    });

    // Agregar Tienda
    $("#addTienda").click(function(){
      var id_select = $("#tiendas option:selected").val(),
          name_select = $("#tiendas option:selected").text(),
          object = '<li id="li_tiendas_'+id_select+'" onclick="deleteLi(\''+id_select+'\', \'tiendas_seleccionadas\')">'
                  +'<a href="#">'+name_select+'</a>'
                  +' | </li>',
          validator = true;

      $("#tiendas_seleccionadas li").each(function(){
        if( $(this).text() == "TODAS" || name_select == "TODAS" && $(this).text() != "TODAS" || $(this).text() == (name_select + " | ")){
          validator = false;
          return false;
        }
      });

      if(validator) $("#tiendas_seleccionadas").append(object);
    });

    // Agregar Usuarios
    $("#addUsuario").click(function(){
      var id_select = $("#usuarios option:selected").val(),
          name_select = $("#usuarios option:selected").text(),
          object = '<li id="li_usuarios_'+id_select+'" onclick="deleteLi(\''+id_select+'\', \'usuarios_seleccionados\')">'
                  +'<a href="#">'+name_select+'</a>'
                  +' | </li>',
          validator = true;

      $("#usuarios_seleccionados li").each(function(){
        if( $(this).text() == "TODOS" || name_select == "TODOS" && $(this).text() != "TODOS" || $(this).text() == (name_select + " | ")){
          validator = false;
          return false;
        }
      });

      if(validator) $("#usuarios_seleccionados").append(object);
    });

    $("#btnDescargar").click(function(){
      var desde = $("#desde").val(),
          hasta = $("#hasta").val(),
          categorias_id = "",
          tiendas_id = "",
          usuarios_id = "";

      $('#categorias_seleccionadas li').each(function(){
        let id = $(this).attr('id').split("_");
        categorias_id += id[2] + ",";
      });

      $('#tiendas_seleccionadas li').each(function(){
        let id = $(this).attr('id').split("_");
        tiendas_id += id[2] + ",";
      });

      $('#usuarios_seleccionados li').each(function(){
        let id = $(this).attr('id').split("_");
        usuarios_id += id[2] + ",";
      });

      location.href = "descarga.php?desde="+desde+"&hasta="+hasta+"&categorias_id="+categorias_id+"&tiendas_id="+tiendas_id+"&usuarios_id="+usuarios_id;
    });

    // Functions
    var deleteLi = function(id, where){
      var _where = where.split('_');
      $("#li_"+_where[0]+"_"+id).remove();
    }
  </script>
</body>
</html>
