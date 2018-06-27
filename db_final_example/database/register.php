<?php session_start(); ?>
<?php
	
	include __DIR__ . '/database.php';

	// extending the class database/Database makes sure your connection of DB.
	class register extends Database
	{
		public function register_add($account, $email, $password) {
			/*
			#echo $account;
			#echo $password;
			$query='INSERT INTO User (Account,Password) VALUES('.'"'.$account.'"'.',"'.$password.'");';
			#echo $query;
			$this->db->query($query);
			$query1='SELECT * FROM User;';
			$result=$this->db->query($query1);
			*/
			$sql="INSERT INTO User(:account, :email, :password)";
			$sth =$this->db1->prepare($sql);
			
			$sth->execute([':account' => $account, ':email' => $email, ':password' => $password]);
		}
	}

?>