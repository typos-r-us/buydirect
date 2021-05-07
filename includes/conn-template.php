<?php

Class Database{
    // declare the structure and functions of the database class
	private $server = "mysql:host=localhost;dbname=buydirect";
	private $username = ""; # Add database username. Usually 'root'.
	private $password = ""; # Add database password. Usually empty.
	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
	protected $conn;

	public function open(){
 		try{
 			$this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
 			return $this->conn;
 		}
 		catch (PDOException $e){
 			echo "Database Connection Error: " . $e->getMessage();
 		}
 
    }
 
	public function close(){
   		$this->conn = null;
 	}
 
}
// Instantiate the database class
$pdo = new Database();
 
?>