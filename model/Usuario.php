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

      $sql = "SELECT id, user, pass, rank
              FROM users
              WHERE user = '$this->username'
              AND pass = '$this->password'";

      $data = $man->free_query($sql);

      if(mysqli_num_rows($data) > 0){
        $datos = mysqli_fetch_assoc($data);

        $this->id = $datos['id'];
        $this->rank = $datos['rank'];

        return ['username' => $this->username, 'rank' => $this->rank, 'id' => $this->id];
      }else{
        return false;
      }
    }
  }
