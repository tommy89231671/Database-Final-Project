<?php
	//error_reporting(0);
	
	class Database
	{
		protected $db; // db variable

		public function __construct() {

			/*
			 * Host information
			 */

			// define(host, 'Your-Host');
			// define(user, 'Your-Username');
			// define(password, 'Your-Password');
			// define(database, 'Your-Database');
			// define(port, 'Your-Port');
			
			//define(host, 'mysql');
	/*define(host,'localhost');
	define(user, 'root');
	define(password, '123');
	define(database, 'DB_Final');
	define(port, 3306);
	$mysqli = new mysqli(host, user, password, database, port);
	if ($mysqli->connect_errno){
		echo "Failed to connect to MYSQL";
		
	}
	else{
			echo"connect successfully";
	}*/
	// echo '123';
	// connect to the database
	define(host,'localhost');
	define(user, 'root');
	define(password, '123');
	define(database, 'DB_Final');
	define(port, 3306);
	$mysqli = new mysqli(host, user, password, database, port);
		
			$this->db = $mysqli;
			if ($mysqli->connect_errno){
		echo "Failed to connect to MYSQL";
		
		}
		else{
			echo"connect successfully";
	}
		}
	}
?>