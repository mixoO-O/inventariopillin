<?php
  if($_POST){
    session_start();
    require_once('../model/Usuario.php');
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $user = new Usuario();

    $data_user = $user->validarUsuario($username, $password);

    if($data_user){
      $_SESSION['user'] = $data_user['username'];
      $_SESSION['rank'] = $data_user['rank'];
      $_SESSION['id'] = $data_user['id'];

      Header('Location: home.php');
    }else{
      Header('Location: salir.php');
    }
  }else{
    Header('Location: salir.php');
  }
