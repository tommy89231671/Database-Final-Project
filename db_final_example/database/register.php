<?php session_start(); ?>
<?php
	
	include __DIR__ . '/database.php';

	// extending the class database/Database makes sure your connection of DB.
	class register extends Database
	{
		public function register_add($account, $name, $email, $raw_psd) {
			$sql="INSERT INTO User VALUES(:account, :name, :email, :password, 0)";
			$sth =$this->db1->prepare($sql);

			$hashed_psd = password_hash($raw_psd, PASSWORD_DEFAULT);

			if($sth->execute([':account' => $account, ':name' => $name, ':email' => $email, ':password' => $hashed_psd]) == TRUE)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
		public function check_account_exist($account) {
			$sql="SELECT account FROM User WHERE account EQUALS :account";
			$sth =$this->db1->prepare($sql);
			$sth->execute([':account' => $account]);
			if($sth->rowCount() > 0)
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