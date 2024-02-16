<?php
	session_start();
    class DB
	{ 
        
		private $dbHost     = "localhost"; 
		private $dbUsername = "root"; 
		private $dbPassword = ""; 
        private $dbName     = "h4h";
		
		/*
		private $dbHost     = "localhost"; 
		private $dbUsername = "dietgein_mentor"; 
		private $dbPassword = "Umbrella@12"; 
        private $dbName     = "dietgein_plan";
		*/
        var $db;
        var $conn; 
		 
		public function __construct()
		{ 
			if(!isset($this->db))
			{ 
				// Connect to the database 
				try
				{
                     
					$this->conn = new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName, $this->dbUsername, $this->dbPassword); 
					$this->conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					//print_r($this->conn);
					//echo "<br>";
					//return $this->conn;
					//$this->db = $conn;
					 
				}
				catch(PDOException $e)
				{ 
					die("Failed to connect with MySQL: " . $e->getMessage()); 
				} 
			} 
		} 
	}
?>