<?php
	error_reporting(0);
	
	class Database
	{
		protected $db; // db variable
		protected $db1;

		public function __construct() {

			/*
			 * Host information
			 */

			// define(host, 'Your-Host');
			// define(user, 'Your-Username');
			// define(password, 'Your-Password');
			// define(database, 'Your-Database');
			// define(port, 'Your-Port');
			
			define(database, 'db_final');
			define(host,'localhost');
			define(user, 'root');
			define(password, '123');
			define(port, 3306);
			$mysqli = new mysqli(host, user, password, database, port);
			mysqli_query($mysqli, 'SET NAMES utf8');
			$this->db = $mysqli;

			$hostdb='localhost';
			$namedb='db_final';
			$userdb='root';
			$passdb='123';
			$conn= new PDO("mysql:host=$hostdb;dbname=$namedb",$userdb,$passdb);
			$conn->exec("SET NAMES 'UTF8'");
			$this->db1=$conn;
				
					
					/*if ($mysqli->connect_errno){
				echo "Failed to connect to MYSQL";
				
				}
				else{
					echo"connect successfully";
			}*/
		}
	}
?>