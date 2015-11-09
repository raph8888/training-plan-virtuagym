<?php
require_once('database.php');

class Plan {

	protected static $table_name="plan";
	protected static $db_fields = array('id', 'user_id', 'plan_name', 'plan_description', 'plan_difficulty');
	public $id;
	public $user_id;
	public $plan_name;
	public $plan_description;
	public $plan_difficulty;


	public static function find_all_pagination($page, $per_page, $total_count, $myid) {

		$pagination = new Pagination($page, $per_page, $total_count);

		return self::find_by_sql("SELECT * 
		FROM plan
		HAVING plan_id != $myid
		ORDER BY latitude 
		LIMIT $per_page 
		OFFSET {$pagination->offset()}");

	}

	public static function find_all() {

		return self::find_by_sql("SELECT * FROM ".self::$table_name);

		// global $database;
		// $result_set = $database->query("SELECT * FROM clients");
		// return $result_set;
	}

	public static function find_by_id($id=0) {
		global $database;
		$result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE id={$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	public static function find_by_user_id($id=0) {
		global $database;
		$result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE user_id={$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	public static function find_by_sql($sql="") {

		//Take result_set and process.
		//Go through each one of the rows by doing a fetch array, pull back a row and instantiate it.
		//Assign it to a new array (empty array) then do mysql fetch _array in the result set.
		//Assign it to a row and then instantiate the row.
		//What we return is an array of objects. The rows and raw result set won't get back to the index.

		global $database;
		$result_set = $database->query($sql);
		$object_array = array();
		while ($row = $database->fetch_array($result_set)) {
			$object_array[] = self::instantiate($row);
		}
		return $object_array;
	}

	public static function count_all() {
		global $database;
		$sql = "SELECT COUNT(*) FROM ".self::$table_name;
		$result_set = $database->query($sql);
		$row = $database->fetch_array($result_set);
		return array_shift($row);
	}

	private static function instantiate($record) {

		//Could check the $record ecists and is an array
		$object = new self;

		//Simple, long-for approach:
		//	$object->user_id 	= $record['user_id'];
		//	$object->password 	= $record['password'];
		//	$object->username 	= $record['username'];

		//More dynamic, short-form aapproach:
		foreach($record as $attribute=>$value) {
			if($object->has_attribute($attribute)) {
				$object->$attribute = $value;
			}
		}
		return $object;
	}

	private function has_attribute($attribute) {
		//get_object_vars returns an associative array with all attributes
		//(incl. private ones!) as the keys and their current values as te value
		$object_vars = $this->attributes();

		//We dont care about the value, we just wantt to know if the key exists
		//Will return true or false
		return array_key_exists($attribute, $object_vars);
	}

	protected function attributes() {
		//return an array of attribute names and their values
		$attributes = array();
		foreach(self::$db_fields as $field) {
			if(property_exists($this, $field)) {
				$attributes[$field] = $this->$field;
			}
		}
		return $attributes;
	}

	protected function sanitized_attributes() {
		global $database;
		$clean_attributes = array();
		//sanitize the values before submitting
		//Note: does not alter the actual vallue of each attribute
		foreach($this->attributes() as $key => $value) {
			$clean_attributes[$key] = $database->escape_value($value);
		}
		return $clean_attributes;
	}

	public function save() {
		//A new record won't have an id yet.
		return isset($this->user_id) ? $this->update() : $this->create();
	}

	public function create() {

		global $database;

		//SQL syntax
		//INSERT INTO table (key, key) VALUE ('value', 'value')
		//single-quotes around all values
		//escape all values to prevent SQL injection

		$attributes = $this->sanitized_attributes();

		$sql = "INSERT INTO ".self::$table_name." (";
		$sql .= join(", ", array_keys($attributes));
		$sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";

		if($database->query($sql)) {
			$this->user_id = $database->insert_id();
			return true;
		} else {
			return false;
		}
	}

	public function update() {
		global $database;

		$attributes = $this->sanitized_attributes();

		$attribute_pairs = array();
		foreach ($attributes as $key => $value) {
			$attribute_pairs[] = "{$key}='{$value}'";
		}

		$sql = "UPDATE ".self::$table_name." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE user_id=". $database->escape_value($this->user_id);
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}

	public function delete() {
		global $database;

		$sql = "DELETE FROM ".self::$table_name;
		$sql .= " WHERE user_id=". $database->escape_value($this->user_id);
		$sql .= " LIMIT 1";
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}

}

?>
