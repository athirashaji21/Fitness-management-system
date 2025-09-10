<?php
include 'C:\wamp64\www\fitness_project\config\connect_db.php';
class Data{  	
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
	public function getCustomerList(){
		$sqlQuery = "SELECT * FROM member_details" ;
		return  $this->getData($sqlQuery);
	}
	public function getTrainerList(){
		$sqlQuery = "SELECT * FROM trainer_details" ;
		return  $this->getData($sqlQuery);
	}
	public function getPaymentList(){
		$sqlQuery = "SELECT * FROM payment_details" ;
		return  $this->getData($sqlQuery);
	}
	public function gettrList($id){
			
		$sqlQuery = "SELECT * FROM trainer_attendence where trainer_id='$id'" ;
		return  $this->getData($sqlQuery);
	}
	public function getWorkoutList(){
		$sqlQuery = "SELECT * FROM workout_details" ;
		return  $this->getData($sqlQuery);
	}
	public function getmemList($id){
			
		$sqlQuery = "SELECT * FROM member_attendence where member_id='$id'" ;
		return  $this->getData($sqlQuery);
	}
	public function getWorkoutedit($id){
		$conn=getconnection();	
		$sqlQuery = "SELECT * FROM workout_details where workout_id='$id'" ;
		$result = mysqli_query($conn, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}
	
	public function getPayment($id){
		$conn=getconnection();	
		$sqlQuery = "SELECT * FROM payment_details where payment_id='$id'" ;
		$result = mysqli_query($conn, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}
	public function getTrainer($id){
		$conn=getconnection();	
		$sqlQuery = "SELECT * FROM trainer_details where trainer_id='$id'" ;
		$result = mysqli_query($conn, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}
	
	public function updateWorkout($POST){
		$conn=getconnection();
		if($POST['id']) {	
			$sqlupdate = "UPDATE workout_details
				SET name = '".$POST['name']."',description = '".$POST['des']."' WHERE workout_id = '".$POST['id']."' " ;
			$result=mysqli_query($conn, $sqlupdate);
			if(!$result)
			  echo '<script>
						alert("something went wrong");
					</script>';
			else 
				echo '<script>
						alert("SUCCESSFULLY UPDATED");
					</script>';
	      }
    }
	public function deleteWorkout($id){
		$conn=getconnection();
		$sqlQuery = "DELETE FROM workout_details
			WHERE workout_id= '".$id."'";
		$result=mysqli_query($conn, $sqlQuery);	
		if(!$result)
			   echo '<script>
						alert("something went wrong");
					</script>';
		else 
				echo '<script>
						alert("SUCCESSFULLY DELETED");
					</script>';

	}
	public function getWorkoutPlanList($id){
		$conn=getconnection();	
		$sqlQuery = "SELECT * FROM workoutplan_details where trainer_id='$id'";
		$result = mysqli_query($conn, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	public function getWorkoutplanedit($id){
		$conn=getconnection();	
		$sqlQuery = "SELECT * FROM workoutplan_details where plan_id='$id'" ;
		$result = mysqli_query($conn, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}
	public function updateWorkoutplan($POST){
		$conn=getconnection();
		if($POST['id']) {	
			$sqlupdate = "UPDATE workoutplan_details
				SET workout_name = '".$POST['name']."',workout_date= '".$POST['date']."',member_id= '".$POST['m_id']."',trainer_id= '".$POST['t_id']."' WHERE plan_id = '".$POST['id']."' " ;
			$result=mysqli_query($conn, $sqlupdate);
			if(!$result)
			  echo '<script>
						alert("something went wrong");
					</script>';
			else 
				echo '<script>
						alert("SUCCESSFULLY UPDATED");
					</script>';
	      }
    }
	public function deleteWorkoutplan($id){
		$conn=getconnection();
		$sqlQuery = "DELETE FROM workoutplan_details
			WHERE plan_id= '".$id."'";
		$result=mysqli_query($conn, $sqlQuery);	
		if(!$result)
			   echo '<script>
						alert("something went wrong");
					</script>';
		else 
				echo '<script>
						alert("SUCCESSFULLY DELETED");
					</script>';

	}
	public function getDietList(){
		$sqlQuery = "SELECT * FROM diet_details" ;
		return  $this->getData($sqlQuery);
	}
	
	public function getDietEdit($id){
		$conn=getconnection();	
		$sqlQuery = "SELECT * FROM diet_details where diet_id='$id'" ;
		$result = mysqli_query($conn, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}
	
	public function updateDiet($POST){
		$conn=getconnection();
		if($POST['id']) {	
			$sqlupdate = "UPDATE diet_details
				SET diet_name = '".$POST['name']."',description = '".$POST['des']."' WHERE diet_id = '".$POST['id']."' " ;
			$result=mysqli_query($conn, $sqlupdate);
			if(!$result)
			   echo '<script>
						alert("something went wrong");
					</script>';
			else 
				echo '<script>
						alert("SUCCESSFULLY UPDATED");
					</script>';
	      }
    }
	
	public function deleteDiet($id){
		$conn=getconnection();
		$sqlQuery = "DELETE FROM diet_details
			WHERE diet_id= '".$id."'";
		$result=mysqli_query($conn, $sqlQuery);	
		if(!$result)
			   echo '<script>
						alert("something went wrong");
					</script>';
		else 
				echo '<script>
						alert("SUCCESSFULLY DELETED");
					</script>';

	}
	
	public function updatePayment($POST){
		$conn=getconnection();
		if($POST['id']) {	
			$sqlupdate = "UPDATE payment_details
				SET date = '".$POST['date']."',amount = '".$POST['amount']."', member_id = '".$POST['mem_id']."' WHERE payment_id = '".$POST['id']."' " ;
			$result=mysqli_query($conn, $sqlupdate);
			if(!$result)
			   echo '<script>
						alert("something went wrong");
					</script>';
			else 
				echo '<script>
						alert("SUCCESSFULLY UPDATED");
					</script>';
	      }
    }
	public function deletePayment($id){
		$conn=getconnection();
		$sqlQuery = "DELETE FROM payment_details
			WHERE payment_id= '".$id."'";
		$result=mysqli_query($conn, $sqlQuery);	
		if(!$result)
			   echo '<script>
						alert("something went wrong");
					</script>';
		else 
				echo '<script>
						alert("SUCCESSFULLY DELETED");
					</script>';

	}
	
	public function getDietPlanList($id){
		$conn=getconnection();	
		$sqlQuery = "SELECT * FROM dietplan_details where trainer_id='$id'";
		$result = mysqli_query($conn, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	
	public function getdietplan($id){
		$conn=getconnection();	
		$sqlQuery = "SELECT * FROM dietplan_details where id='$id'" ;
		$result = mysqli_query($conn, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}
	
	public function updateDietPlan($POST){
			$conn=getconnection();
			$d_name=$_POST['name'];
			$qry="SELECT diet_id FROM diet_details where diet_name='$d_name'";
			$result=mysqli_query($conn,$qry);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$d_id=$row['diet_id'];
			$date=trim($POST['date']);
			if($POST['id']) {	
			$sqlupdate = "UPDATE dietplan_details
				SET member_id = '".$POST['m_id']."',trainer_id = '".$POST['t_id']."', diet_id = '$d_id',diet_name = '$d_name' ,diet_date = '".$POST['date']."'WHERE id = '".$POST['id']."' " ;
			$result=mysqli_query($conn, $sqlupdate);
			if(!$result)
			   echo 'ERROR:'.mysqli_error($conn);
			else 
				echo '<script>
						alert("SUCCESSFULLY UPDATED");
					</script>';
	      }
    }
	
	public function deleteDietPlan($id){
		$conn=getconnection();
		$sqlQuery = "DELETE FROM dietplan_details
			WHERE id= '".$id."'";
		$result=mysqli_query($conn, $sqlQuery);	
		if(!$result)
			   echo '<script>
						alert("something went wrong");
					</script>';
		else 
				echo '<script>
						alert("SUCCESSFULLY DELETED");
					</script>';

	}
	public function getedTrainer($id){
		$conn=getconnection();	
		$sqlQuery = "SELECT * FROM trainer_details where trainer_id='$id'" ;
		$result = mysqli_query($conn, $sqlQuery);
		$data=array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	public function getT($id){
		$conn=getconnection();	
		$sqlQuery = "SELECT * FROM trainer_details where trainer_id='$id'" ;
		$result = mysqli_query($conn, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}
	public function getPlanlist(){
		$sqlQuery = "SELECT * FROM membership_plan" ;
		return  $this->getData($sqlQuery);
	}
	public function getPlan($id){
		$conn=getconnection();	
		$sqlQuery = "SELECT * FROM membership_plan where plan_id='$id'" ;
		$result = mysqli_query($conn, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}
	public function updatePlan($POST){
		$conn=getconnection();
		if($POST['id']) {	
			$sqlupdate = "UPDATE membership_plan
				SET plan_name = '".$POST['name']."',amount = '".$POST['amount']."', period = '".$POST['per']."' WHERE plan_id = '".$POST['id']."' " ;
			$result=mysqli_query($conn, $sqlupdate);
			if(!$result)
			   echo '<script>
						alert("something went wrong");
					</script>';
			else 
				echo '<script>
						alert("SUCCESSFULLY UPDATED");
					</script>';
	      }
    }
	public function deletePlan($id){
		$conn=getconnection();
		$sqlQuery = "DELETE FROM membership_plan
			WHERE plan_id= '".$id."'";
		$result=mysqli_query($conn, $sqlQuery);	
		if(!$result)
			   echo '<script>
						alert("something went wrong");
					</script>';
		else 
				echo '<script>
						alert("SUCCESSFULLY DELETED");
					</script>';

	}
	public function save_data($POST){
		 $conn=getconnection();
		 for ($i = 0; $i < count($_POST['mem_name']); $i++) 
			{
				$timestamp = strtotime($_POST['date'][$i]);
				$date=date("Y-m-d", $timestamp);
				$insert_qry="INSERT INTO member_attendence(date,time,member_id)VALUES('".$date."', '".$POST['time'][$i]."', '".$POST['mem_name'][$i]."')";
				$result=mysqli_query($conn, $insert_qry);
			if(!$result)
			{
				echo "Error: ". mysqli_error($conn);
			}
			echo '<script>
						alert("ADDED SUCCESSFULLY");
					</script>';
			}
	}
	public function save_data_trainer($POST){
		 $conn=getconnection();
		 for ($i = 0; $i < count($_POST['mem_name']); $i++) 
			{
				$timestamp = strtotime($_POST['date'][$i]);
				$date=date("Y-m-d", $timestamp);
				$insert_qry="INSERT INTO trainer_attendence(date,time,trainer_id)VALUES('".$date."', '".$POST['time'][$i]."', '".$POST['mem_name'][$i]."')";
				$result=mysqli_query($conn, $insert_qry);
			if(!$result)
			{
				echo "Error: ". mysqli_error($conn);
			}
			echo '<script>
						alert("ADDED SUCCESSFULLY ");
					</script>';
			}
	}
	public function deleteMember($id){
		$conn=getconnection();
		$sqlQuery1 = "DELETE FROM member_attendence
			WHERE member_id = '".$id."'";
		$result1=mysqli_query($conn, $sqlQuery1);
		$sqlQuery1 = "DELETE FROM dietplan_details
			WHERE member_id = '".$id."'";
		$result1=mysqli_query($conn, $sqlQuery1);
		$sqlQuery1 = "DELETE FROM payment_details
			WHERE member_id = '".$id."'";
		$result1=mysqli_query($conn, $sqlQuery1);
		$sqlQuery1 = "DELETE FROM workoutplan_details
			WHERE member_id = '".$id."'";
		$result1=mysqli_query($conn, $sqlQuery1);
		$sqlQuery2 = "DELETE FROM member_details
			WHERE member_id = '".$id."'";
		$result2=mysqli_query($conn, $sqlQuery2);
		$sqlQuery1 = "DELETE FROM member_login_details
			WHERE member_id = '".$id."'";
		$result1=mysqli_query($conn, $sqlQuery1);
		
		if($result1)
			   echo '<script>
						alert("SUCCESSFULLY DELETED");
					</script>';
		else 
				
				echo '<script>
				   alert("something went wrong");
					</script>';
					 
	}
	public function deleteTrainer($id){
		$conn=getconnection();
		$sqlQuery1 = "DELETE FROM trainer_attendence
			WHERE trainer_id = '".$id."'";
		$result1=mysqli_query($conn, $sqlQuery1);
		$sqlQuery1 = "DELETE FROM dietplan_details
			WHERE trainer_id = '".$id."'";
		$result1=mysqli_query($conn, $sqlQuery1);
		$sqlQuery1 = "DELETE FROM workoutplan_details
			WHERE trainer_id = '".$id."'";
		$result1=mysqli_query($conn, $sqlQuery1);
		$sqlQuery2 = "DELETE FROM trainer_details
			WHERE trainer_id = '".$id."'";
		$result2=mysqli_query($conn, $sqlQuery2);
		$sqlQuery1 = "DELETE FROM trainer_login_details
			WHERE trainer_id = '".$id."'";
		$result1=mysqli_query($conn, $sqlQuery1);
		
		if($result1)
			   echo '<script>
						alert("SUCCESSFULLY DELETED");
					</script>';
		else 
				
				echo '<script>
				   alert("something went wrong");
					</script>';
					 
	}
}