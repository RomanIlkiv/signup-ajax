<?php
	
	require_once "config.php";
	require_once "checkvalid_class.php";
	
	class DataBase {
		protected $config;
		protected $mysqli;
		protected $valid;
		
		public function __construct() {
			$this->config = new Config();
			$this->valid = new CheckValid();
			$this->mysqli = new mysqli($this->config->host, $this->config->user, $this->config->password, $this->config->db);
			$this->mysqli->query("SET NAMES 'utf-8'");
		}
		
		public function query($query) {
			return $this->mysqli->query($query);
		}
		
		public function select($table_name, $fields, $where = "") {
			for ($i = 0; $i < count($fields); $i++) {
				if ((strpos($fields[$i], "(") === false) && ($fields[$i] != "*")) {
					$fields[$i] = "`".$fields[$i]."`";
				}
			}
			$fields = implode(",", $fields);
			$table_name = $this->config->db_prefix.$table_name;
			
			if ($where) $query = "SELECT $fields FROM $table_name WHERE $where";
			else $query = "SELECT $fields FROM $table_name";
			
			$result_set = $this->query($query);
			if (!$result_set) return false;
			$i = 0;
			while ($row = $result_set->fetch_assoc()) {
				$data[$i] = $row;
				$i++;
			}	
			$result_set->close();
			return $data;
		}
		
		public function update($table_name, $field, $value, $where) {
			$table_name = $this->config->db_prefix.$table_name;
			$query = "UPDATE $table_name SET `$field` = '$value'";
			if ($where) {
				$query .= " WHERE $where";
				return $this->query($query);
			}
			else return false;
		}

		public function isExists($table_name, $field, $value) {
			$data= $this->select($table_name, array("id"), "`$field` = '".addslashes($value)."'");
			if (count($date) === 0) {
				return false;
			}
			return true;
		}

		public function __destruct() {
			if($this->mysqli) $this->mysqli->close();
		}
		
	}

	$db = new DataBase();	
	
?>