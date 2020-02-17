<?php
require_once dirname(__FILE__, 2) . '/Common/database.php';

class Table
{
    private $conn;

    public function __construct($connection)
    {
        $this->conn = $connection;
    }

    public function getAll($table, $fields = array(), $conditions = array())
    {
        if ($table == '') {
            return null;
        }

        $column = '*';
        if (!empty($fields)) {
            $column = implode(',', $fields);
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
            if (!is_null($stmt->execute())) {
                return $stmt;
            }
        }
        return false;
    }

    public function updateTable($table, $fields = array(), $conditions = array())
    {
        if ($table == '') {
            return null;
        }

        if (!empty($fields)) {
            foreach ($fields as $key => $f_value) {
                $set[] = $key . ' = ' . "'" . $f_value . "'";
            }
            $clause = implode(',', $set);
        }

        if (!empty($conditions)) {
            //with where $condition = $value;
            foreach ($conditions as $key => $c_value) {
                $result[] = $key . ' = ' . "'" . $c_value . "'";
            }
            $where = implode('', $result);
        }

        if (isset($where)) {
            $query = 'UPDATE ' . $table . ' SET ' . $clause . ' WHERE ' . $where;

            $stmt = $this->conn->prepare($query);

            if ($stmt->execute()) {
                return true;
            }
            return false;
        }
    }

    public function createTable($table, $fields = array())
    {
        if ($table == '') {
            return null;
        }

        if (!empty($fields)) {
            foreach ($fields as $key => $value) {
                $clause_key[] = $key;
                $clause_value[] = $value;
            }
        }

        $fields = implode(',', $clause_key);
        $value = '(\'' . implode('\',\'', $clause_value) . '\')';
        $query = 'INSERT INTO ' . $table . ' (' . $fields . ') VALUES ' . $value;
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
