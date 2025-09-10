<?php
include 'C:\wamp64\www\fitness_project\config\connect_db.php';
class Member{
	public function getData($sqlQuery) {
		$conn=getconnection();
		$result = mysqli_query($conn, $sqlQuery);
		IF(!$result)
			echo "Error: ". mysqli_error($conn);
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
    public function getPayment($id){
		
		$sqlQuery = "SELECT * FROM payment_details where member_id='$id'" ;
		return  $this->getData($sqlQuery);
	}
	public function getAttendence($id){
		
		$sqlQuery = "SELECT * FROM member_attendence where member_id='$id'" ;
		return  $this->getData($sqlQuery);
	}
	public function getDietplan($id){	
		$sqlQuery = "SELECT * FROM dietplan_details where member_id='$id'" ;
		return  $this->getData($sqlQuery);
	}
	public function getworkoutplan($id){	
		$sqlQuery = "SELECT * FROM workoutplan_details where member_id='$id'" ;
		return  $this->getData($sqlQuery);
	}
	public function getmemplan($id){
		$conn=getconnection();
		$qry = "SELECT plan_id FROM member_details where member_id='$id'" ;
		$result=mysqli_query($conn,$qry);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$p_id=$row['plan_id'];
		$sqlQuery = "SELECT * FROM membership_plan where plan_id='$p_id'" ;
		return  $this->getData($sqlQuery);
	}
	public function getDetails($id){	
		$sqlQuery = "SELECT * FROM member_details where member_id='$id'" ;
		return  $this->getData($sqlQuery);
	}
	public function geteditdetails($id){
		$sqlQuery = "SELECT * FROM member_details where member_id='$id'" ;
		$conn=getconnection();
		$result = mysqli_query($conn, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}
}
?>