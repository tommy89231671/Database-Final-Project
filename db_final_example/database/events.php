<?php
	
	include __DIR__ . '/database.php';
	
	// extending the class database/Database makes sure your connection of DB.
	class events extends Database
	{
		public function list_show() {
			$query='SELECT * FROM events;';
			
			$result=$this->db->query($query);
			
			$events=array();
			while ($row=$result->fetch_assoc()){
				array_push($events,$row);
				
			}
			
			return $events;
		}
		public function events_add($name, $date,$team_limit,$max_team_number,$min_team_number,$description) {
			#$query='INSERT INTO Annoucement(ID,name,date,team_limit,max_team_number,min_team_number) VALUES('."NULL".',"'.$name.'"'.',"'.$date.'",'.$team_limit.',"'.$max_team_number.'"'.'");';
			$query="INSERT INTO events(ID,name,date,team_limit,max_team_number,min_team_number,description) VALUES(NULL,'$name','$date','$team_limit','$max_team_number','$min_team_number','$description');";
			#echo $query;
			$this->db->query($query);
			
			#INSERT INTO db_final(Title,Description) VALUES('Gakki','My wife');
			
		}
		
		public function events_delete($id) {
			$query='DELETE FROM events WHERE ID="'.$id.'"';
			
			$this->db->query($query);
			
			#INSERT INTO db_final(Title,Description) VALUES('Gakki','My wife');
			
		}
		
	}

?>