<?php
	class Mantenedor{
		private $host = "localhost";
		private $user = "root";
		private $password = "";
		private $db = "inventariopillin";
		private $link;
		private $getSql;

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
	}
