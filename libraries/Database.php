<?php
	class Database{
		public $host = DB_HOST;
		public $username = DB_USER;
		public $password = DB_PASS;
		public $db_name = DB_NAME;

		public $link;
		public $error;

		public function __construct(){
			// $this->host = $host;
			// $this->username = $username;
			// $this->password = $password;
			// $this->db_name = $db_name;
			// connect function
			$this->connect();
			
			}
		private function connect(){
			$this->link = new mysqli($this->host,$this->username,$this->password,$this->db_name);
			if (!$this->link) {
				$this->error ="Connection Failed: ".$this->link->connect_error();
				return false;
			}
	
		}
	public function select($query){
		$result = $this->link->query($query) or die($this->error.__LINE__);
		if($result->num_rows > 0) {
			return $result;
		}else {
			return false;
		}
	}


	public function insert($query){
		$insert_row = $this->link->query($query) or die($this->error.__LINE__);
		if($insert_row) {
			header("Location: index.php?msg=".urlencode('record added'));
			exit();
		}else {
			die('Error: ('. $this->link->errno .') '. $this->link->error);
		}
	}


	public function update($query){
		$update_row = $this->link->query($query) or die($this->error.__LINE__);
		if($update_row) {
			header("Location: index.php?msg=".urlencode('record updated'));
			exit();
		}else {
			die('Error: ('. $this->link->errno .') '. $this->link->error);
		}
	}

	public function delete($query){
		$delete_row = $this->link->query($query) or die($this->error.__LINE__);
		if($delete_row) {
			header("Location: index.php?msg=".urlencode('record deleted'));
			exit();
		}else {
			die('Error: ('. $this->link->errno .') '. $this->link->error);
		}
	}
	
}

	
?>