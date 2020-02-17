<?php
	require_once 'config.php';
	class DB {
		private $servername = SERVERNAME;
		private $username = USERNAME;
		private $password = PASSWORD;
		private $dbname = DBNAME;
		public $conn;

		public function connection() {
			// $this->conn = null;
			try {
				$this->conn = new PDO('mysql:host=' . $this->servername . ';dbname=' . $this->dbname, $this->username, $this->password);
				// set the PDO error mode to exception
				// $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->conn->exec("set names utf8");
				// echo "Connected successfully";
			}
			catch(PDOException $e) {
				echo "Connection failed: " . $e->getMessage(); die();
			}
			return $this->conn;
		}
	}
	$db = new DB();
	$connection = $db->connection();
?>
