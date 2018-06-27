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
			$query="INSERT Account, Email, Password FROM User WHERE Account=:account AND Email=:email AND Password=:password";
			$sth =$this->db1->prepare($sql);
			$sth->execute([':account' => $account, ':email' => $email, ':password' => $password]);

			if ($sth->rowCount() > 0) {
				$result=$sth->fetch(PDO::FETCH_OBJ);
				
			}
			if(!empty($result->fetchALL())
			
			$this->db1->query($query);			
		}
	}

?>