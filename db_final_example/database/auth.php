<?php
	
	include __DIR__ . '/database.php';

	// extending the class database/Database makes sure your connection of DB.
	class Auth extends Database
	{
		public function login($account, $password) {
			echo $account;
			echo $password;
			$query='select * from User';
			$result=$mysqli->query($query);
			echo $result;
		}
	}

?>