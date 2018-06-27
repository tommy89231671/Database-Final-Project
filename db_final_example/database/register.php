<?php session_start(); ?>
<?php
	
	include __DIR__ . '/database.php';

	// extending the class database/Database makes sure your connection of DB.
	class register extends Database
	{
		public function register_add($account, $name, $email, $raw_password) {
			
			
			
			$sql="INSERT INTO User VALUES(:account, :name, :email, :password, 0)";
			$sth =$this->db1->prepare($sql);
			
			if($sth->execute([':account' => $account, ':name' => $name, ':email' => $email, ':password' => $hashed_password]) == TRUE)
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