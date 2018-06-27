<?php session_start(); ?>
<?php
	
	include __DIR__ . '/database.php';

	// extending the class database/Database makes sure your connection of DB.
	class register extends Database
	{
		public function register_add($account, $email, $raw_password) {
			
			
			
			$sql="INSERT INTO User VALUES(:account, :email, :password)";
			$sth =$this->db1->prepare($sql);
			
			if($sth->execute([':account' => $account, ':email' => $email, ':password' => $hashed_password]) == TRUE)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
	}

?>