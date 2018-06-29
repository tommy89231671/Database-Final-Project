<?php
	
	include __DIR__ . '/database.php';
	
	// extending the class database/Database makes sure your connection of DB.
	class team extends Database
	{
		public function list_member($ID) {
			$query="SELECT * FROM team where ID=$ID;";
			$result=$this->db->query($query);
			$events=array();
			while ($row=$result->fetch_assoc()){
				array_push($events,$row);
			}
			return $events;
		}		
	}

?>