<?php
  require_once('DB.php');
  class Usuario {
    private $id;
    private $username;
    private $password;
    private $rank;

    public function validarUsuario($username, $password){
      $man = new Mantenedor();

      $this->username = $username;
      $this->password = md5($password);

      $sql = "SELECT id, usuario, pass, rango
              FROM usuarios
              WHERE usuario = '$this->username'
              AND pass = '$this->password'";

      $data = $man->free_query($sql);

      if(mysqli_num_rows($data) > 0){
        $datos = mysqli_fetch_assoc($data);
        $this->id = $datos['id'];
        $this->rank = $datos['rango'];

        return ['username' => $this->username, 'rank' => $this->rank, 'id' => $this->id];
      }else{
        return false;
      }
    }

    public function getUsuarios(){
      $users = [];
      $man = new Mantenedor();

      $sql = "SELECT id, usuario
              FROM usuarios";

      $exe = $man->free_query($sql);

      $i = 0;
      while($row = mysqli_fetch_assoc($exe)){
        $users[$i] = ['id' => $row['id'], 'nombre' => $row['usuario']];
        $i++;
      }

      return $users;
    }

    public function getUserName($id){
      $man = new Mantenedor();

      $sql = "SELECT nombre FROM usuarios WHERE id = '$id'";
      $exe = $man->free_query($sql);

      $data = mysqli_fetch_assoc($exe);

      return $data['nombre'];
    }
  }
