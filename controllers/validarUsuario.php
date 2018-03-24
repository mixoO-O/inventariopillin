<?php
  if($_POST){
    require_once('../model/Usuario.php');
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $user = new Usuario();

    $data_user = $user->validarUsuario($username, $password);

    session_start();

    if($data_user){

      $_SESSION['user'] = $data_user['username'];
      $_SESSION['rank'] = $data_user['rank'];
      $_SESSION['id'] = $data_user['id'];

      Header('Location: home.php');
    }else{
      Header('Location: ../index.php');
    }
  }else{
    Header('Location: ../index.php');
  }
