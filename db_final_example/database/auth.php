<?php
	
	include __DIR__ . '/database.php';

	// extending the class database/Database makes sure your connection of DB.
	class Auth extends Database
	{
		public function login($account, $password) {
			#echo $account;
			#echo $password;
			$query='INSERT INTO User (Account,Password) VALUES('.'"'.$account.'"'.',"'.$password.'");';
			#echo $query;
			$this->db->query($query);
			$query1='SELECT * FROM User;';
			$result=$this->db->query($query1);
			
			
			
		}
	}

?>