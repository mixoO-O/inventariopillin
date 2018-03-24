<?php
	class Mantenedor{
		private $host;
		private $user;
		private $password;
		private $db;
		private $link;
		private $getSql;

		public function __construct($host, $user, $password, $db){
			$this->host = $host;
			$this->user = $user;
			$this->password = $password;
			$this->db = $db;
		}

		# Para PHP version < 5.0

		public function conexion(){
			$this->link = mysql_connect($this->host, $this->user, $this->password);

			if(!$this->link) echo "Error";

			$db = mysql_select_db($this->db, $this->link);

			if(!$db) echo "No existe BD";
		}

		public function cerrar(){
			mysql_close($this->link);
			mysql_free_result();
		}

		public function free_select($query){
			conexion();
			$exe = mysql_query($query);
			$this->getSql = $query;
			cerrar();
			return $exe;
		}

		# Para PHP version >= 5.0
		public function connection(){
			$this->link = mysqli_connect($this->host, $this->user, $this->password, $this->db);
			if(!$this->link) echo "Error en conexión";
		}

		public function close_connection(){
			mysqli_close($this->link);
		}

		public function free_query($query){
			$this->connection();
			$exe = $this->link->query($query);
			$this->getSql = $query;
			$this->close_connection();
			return $exe;
		}

		#######################################
		# FUNCIONES VARIAS

		function obtenerIPCliente(){
		  if( $_SERVER['HTTP_X_FORWARDED_FOR'] != ''){
		    $ip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : "Desconocido");
			$entradasL = split('[, ]', $_SERVER['HTTP_X_FORWARDED_FOR']);
			reset($entradasL);

			while (list(, $entradaActual) = each($entradasL)){
				$entradaActual = trim($entradaActual);
				if(preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entradaActual, $listaIPs)){
					$ipPrivada = array('/^0\./', '/^127\.0\.0\.1/', '/^192\.168\..*/', '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/', '/^10\..*/');
					$ipEncontrada = preg_replace($ipPrivada, $ip, $listaIPs[1]);

					if ($ip != $ipEncontrada) {
						$ip = $ipEncontrada;
						break;
					}
				}
			}

		  } else {
			$ip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : (( !empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : "Desconocido");
		  }
		  return $ip;
		}



	}
