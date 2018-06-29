<?php session_start(); ?>
<?php
	
	include __DIR__ . '/database.php';
	// extending the class database/Database makes sure your connection of DB.
	class Auth extends Database
	{
		public function login($account, $raw_password) {
			
			$sql="SELECT Account, user_pass, authority FROM User WHERE Account=:account";
			$sth =$this->db1->prepare($sql);
			$sth->execute([':account' => $account]);
			if ($sth->rowCount() > 0) {
				$result=$sth->fetch();
				if(!empty($result)){
					$hashed_password_from_db = $result['user_pass'];
					$is_correct_password = password_verify($raw_password, $hashed_password_from_db);
					if($is_correct_password)
					{
						$_SESSION['username'] = $account;
						$_SESSION['Admin'] = $result['authority'];
						return 1;
					}
				}
			}
			
			return 0;
		}

	}
?>
