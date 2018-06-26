<?php session_start(); ?>
<?php
	
	include __DIR__ . '/database.php';

	// extending the class database/Database makes sure your connection of DB.
	class Auth extends Database
	{
		public function login($account, $password) {
			/*
			#echo $account;
			#echo $password;
			$query='INSERT INTO User (Account,Password) VALUES('.'"'.$account.'"'.',"'.$password.'");';
			#echo $query;
			$this->db->query($query);
			$query1='SELECT * FROM User;';
			$result=$this->db->query($query1);
			*/
			$sql="SELECT Account, Password FROM User WHERE Account=:account AND Password=:password";
			$sth =$this->db1->prepare($sql);
			$sth->execute([':account' => $account, ':password' => $password]);

			if ($sth->rowCount() > 0) {
				$result=$sth->fetch(PDO::FETCH_OBJ);
				
			}
			if(!empty($result->fetchALL())


			
			
			
		}
	}

?>