<?php session_start(); ?>
<?php
	
	include __DIR__ . '/database.php';
	// extending the class database/Database makes sure your connection of DB.
	class Auth extends Database
	{
		public function login($account, $raw_password) {
			/*
			#echo $account;
			#echo $password;
			$query='INSERT INTO User (Account,Password) VALUES('.'"'.$account.'"'.',"'.$password.'");';
			#echo $query;
			$this->db->query($query);
			$query1='SELECT * FROM User;';
			$result=$this->db->query($query1);
			*/
			//$sql="SELECT Account, Password FROM User WHERE Account=:account AND Password=:password";
			$sql="SELECT Account, user_pass, authority FROM User WHERE Account=:account";
			$sth =$this->db1->prepare($sql);
			//$sth->execute([':account' => $account, ':password' => $password]);
			$sth->execute([':account' => $account]);
			if ($sth->rowCount() > 0) {
				//$result=$sth->fetch(PDO::FETCH_OBJ);
				$result=$sth->fetch();
				if(!empty($result)){
					$hashed_password_from_db = $result['user_pass'];
					$_SESSION['username'] = $account;
					$_SESSION['Admin'] = $result['authority'];
					/*$is_correct_password = password_verify($raw_password, $hashed_password_from_db);
					return $is_correct_password;*/
					if($raw_password==$result['user_pass'])
						return 1;
				}
			}
			
			return 0;
		}

	}
?>
