<?php
	require_once dirname(__FILE__,2) . '/Common/database.php';

	class Table {
		private $conn;

		public function __construct($connection) {
			$this->conn = $connection;
		}

		public function getAll($table, $fields = array(), $conditions = array()) {
			if ($table == '') {
				return null;
			}

			$column = '*';
			if (!empty($fields)) {
				$column = implode(',',$fields);
			}

			$clause = '';
			if (!empty($conditions)) {
				$clause .= ' WHERE ';
				// only with array has one element;
				foreach ($conditions as $key => $value) {
					$clause .= $key . ' = ' . '\'' . $value . '\'';
				}
			}

			$query = 'SELECT ' . $column . ' FROM ' . $table . $clause;

			$stmt = $this->conn->prepare($query);

			if ($stmt->execute()) {
				if(!is_null($stmt->execute())){
					return $stmt;
				}
			}
			return false;
		}

		public function test() {
			return "12345";
		}
	}

?>
