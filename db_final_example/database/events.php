<?php
	
	include __DIR__ . '/database.php';
	
	// extending the class database/Database makes sure your connection of DB.
	class events extends Database
	{
		public function list_show() {
			$query='SELECT * FROM events ORDER BY date asc;';
			$result=$this->db->query($query);
			$events=array();
			while ($row=$result->fetch_assoc()){
				array_push($events,$row);
			}

			return $events;
		}
		public function events_add($name, $date,$team_limit,$max_team_number,$min_team_number,$signup_num,$description) {
			$query="INSERT INTO events(ID,name,date,team_limit,max_team_number,min_team_number,signup_num,description) VALUES(NULL,'$name','$date','$team_limit','$max_team_number','$min_team_number','$signup_num','$description');";
			#echo $query;
			$this->db->query($query);
		}
		public function show($id) {
			$query='SELECT * FROM events where ID="'.$id.'"';
			#echo $query;
			$result=$this->db->query($query);
			$events=array();
			while ($row=$result->fetch_assoc()){
				array_push($events,$row);
			}
			
			return $events;
		}
		public function events_delete($id) {
			$query='DELETE FROM events WHERE ID="'.$id.'"';
			$this->db->query($query);
		}
		public function events_edit($id,$name,$date,$team_limit,$max_team_number,$min_team_number,$description) {
			$query="UPDATE events set name='$name',date='$date',team_limit='$team_limit',max_team_number='$max_team_number',min_team_number='$min_team_number',description=$description WHERE ID=$id;";			
			$this->db->query($query);	
		}
		public function events_add_team($id) {
			$query="UPDATE events set signup_num=signup_num+1 WHERE ID=$id;";
			$this->db->query($query);	
		}
		public function events_minus_team($id) {
			$query="UPDATE events set signup_num=signup_num-1 WHERE ID=$id;";
			$this->db->query($query);	
		}
		public function signup_add($event_id,$team_name, $student_id) {
			$query="INSERT INTO signup(Team_ID,event_ID,Team_name) VALUES(NULL,'$event_id','$team_name');";
			#echo $query;
			$this->db->query($query);
			$query="SELECT Team_ID FROM signup WHERE event_ID=$event_id AND Team_name='$team_name';";
			$result = $this->db->query($query);
			$team_id=mysqli_fetch_assoc($result)['Team_ID'];
			$query="UPDATE events set signup_num=signup_num+1 WHERE ID=$event_id;";
			$this->db->query($query);
			$query="SELECT name FROM user where Account='$student_id';";
			$result = $this->db->query($query);
			$student_name=mysqli_fetch_assoc($result)['name'];
			$query="INSERT INTO team(ID,student_id,student_name) VALUES($team_id,'$student_id','$student_name');";
			$this->db->query($query);
			return $team_id;
		}
		public function signup_delete($team_id,$event_id) {
			$query="DELETE FROM signup WHERE Team_ID=$team_id AND event_ID=$event_id";
			$this->db->query($query);
			$query="UPDATE events set signup_num=signup_num-1 WHERE ID=$event_id;";
			$this->db->query($query);	
			$query="DELETE FROM team WHERE ID=$team_id;";
			$this->db->query($query);
		}
		public function team_delete($team_id, $student_id) {
			$query="DELETE FROM team WHERE ID=$team_id AND student_ID='$student_id';";
			$this->db->query($query);	
		}
		public function team_add($team_id, $student_id,$team_name,$event_id) {
			$query="UPDATE signup set Team_name='$team_name' WHERE Team_ID=$team_id AND event_ID=$event_id;";
			$this->db->query($query);
			$query="SELECT name FROM user where Account='$student_id';";
			$result = $this->db->query($query);
			$student_name=mysqli_fetch_assoc($result)['name'];
			if(is_null($student_name)){
				return;
			}
			$query="INSERT INTO team(ID,student_id,student_name) VALUES($team_id,'$student_id','$student_name');";
			$this->db->query($query);
		}
		public function team_list($event_id) {
			$query="SELECT * FROM signup WHERE event_ID=$event_id;";
			$result=$this->db->query($query);
			$teams=array();
			while ($row=$result->fetch_assoc()){
				array_push($teams,$row);
			}
			return $teams;
		}
		public function member_list($team_id) {
			$query="SELECT * FROM team where ID=$team_id;";
			$result=$this->db->query($query);
			$members=array();
			while ($row=$result->fetch_assoc()){
				array_push($members,$row);
			}
			return $members;
		}
		
	}

?>