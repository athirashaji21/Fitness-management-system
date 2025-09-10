<?php
include 'C:\wamp64\www\fitness_project\config\connect_db.php';
class Member{
    public function getPayment($id){
		$conn=getconnection();	
		$sqlQuery = "SELECT * FROM payment_details where member_id='$id'" ;
		$result = mysqli_query($conn, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}

}