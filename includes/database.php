<?php

class MySQLDatabase {
	
	private $conn;
	
	function __construct() {
		$this->open_connection();
	}
	
	public function open_connection() {

		$servername = "localhost";
		$username = "dbuser";
		$password = "dbpassword";
		$dbname = "virtuagym";
		
		$this->conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
		} 
		
	}
	
	public function close_connection() {
		if(isset($this->conn)) {
			mysqli_close($this->conn);
			unset($this->conn);
		}
	}
	
	public function query($sql) {
		$result = mysqli_query($this->conn, $sql);
		$this->confirm_query($result);
		return $result;
	}
	
	private function confirm_query($result) {
		if (!$result) {
			die("Database query failed.");
		}
	}
	
	public function escape_value($string) {
		
		$escaped_string = mysqli_real_escape_string($this->conn, $string);
		return $escaped_string;
	}

//"database neutral" functions

	public function fetch_array($result_set) {
		return mysqli_fetch_array($result_set);
	}
	
	public function num_rows($result_set) {
		return mysqli_num_rows($result_set);
	}
	
	public function insert_id() {
		//get the last id inserted over the current db connection
		return mysqli_insert_id($this->conn);
	}
	
	public function affected_rows() {
		return mysqli_affected_rows($this->conn);
	}
}

$database = new MySQLDatabase();
$db =& $database;

?>
