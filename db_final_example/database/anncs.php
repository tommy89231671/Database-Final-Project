<?php
	
	include __DIR__ . '/database.php';
	
	// extending the class database/Database makes sure your connection of DB.
	class anncs extends Database
	{
		public function list_show() {
			$query='SELECT * FROM Annoucement ORDER BY Post_Time desc limit 6;';
			
			$result=$this->db->query($query);
			
			$anncs=array();
			while ($row=$result->fetch_assoc()){
				array_push($anncs,$row);
				
			}
			
			return $anncs;
		}
		public function anncs_add($title,$description) {
			$query='INSERT INTO Annoucement(Title,Description) VALUES('.'"'.$title.'"'.',"'.$description.'");';
			
			$this->db->query($query);
			
			#INSERT INTO db_final(Title,Description) VALUES('Gakki','My wife');
			
		}
		
		public function anncs_delete($post_time) {
			$query='DELETE FROM Annoucement WHERE Post_Time="'.$post_time.'"';
			
			$this->db->query($query);
			
			#INSERT INTO db_final(Title,Description) VALUES('Gakki','My wife');
			
		}
		
	}

?>