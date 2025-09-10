<?php include 'C:\wamp64\www\fitness_project\config\connect_db.php' ;

include '../src/trainer_header.php'; 
	if (!isset($_SESSION['user_id'])){
			echo '<script>
			alert("PLEASE LOGIN FIRST");
			
            </script>';			
		}
?>
<!DOCTYPE html>
<html lang="en"> 
   <head>
  <link href="../css/register.css?v=<?=time();?>" rel="stylesheet">
  <title> WORKOUT PLAN</title>
  </head>
  <body> 
  <?php 
		$isValid=true;
		$conn=getconnection();
		if(isset($_POST['submit1'])){
			$mem_id=trim($_POST['mem_id']);
			$qry="SELECT * FROM member_details where member_id='$mem_id'";
			$result=mysqli_query($conn,$qry);
			if (mysqli_num_rows($result) == 0)
			{
			echo '<script>alert("ERROR:MEMBER ID INVALID")</script>';
			$isValid=false;
			}
			$t_name=trim($_POST['tr_name']);
			$qry="SELECT trainer_id FROM trainer_details where trainer_name='$t_name'";
			$result=mysqli_query($conn,$qry);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$t_id=$row['trainer_id'];
			
			$w_name=trim($_POST['w_name']);
			$date=trim($_POST['date']);
			if($isValid)
			{
				$query="INSERT INTO workoutplan_details(member_id,trainer_id,workout_name,workout_date)VALUES('$mem_id','$t_id', '$w_name',STR_TO_DATE('$date','%Y-%m-%d'))";
				$result=mysqli_query($conn,$query);
				if($result)        
					echo "<script>
					alert('ADDED SUCCESSFULLY');
					window.location.href='trainer_home';
					</script>";	
				else
					echo "Error: ". mysqli_error($conn);
			}
			else
				{echo  '<script>alert( " FAILED")</script>';}
	}
?>
		<div>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form" >
				<h1>WORKOUT PLAN</h1>

				<input type="text" placeholder="MEMBER ID" name="mem_id" class='insty' required>
	
				<select class='insty' name='tr_name'>
					<option disabled selected  class='insty'>-- SELECT TRAINER --</option>
					<?php  
					$records = mysqli_query($conn, "SELECT trainer_name from trainer_details");  
					while($data = mysqli_fetch_array($records))
					{
						echo "<option value='". $data['trainer_name'] ."'  class='insty'>" .$data['trainer_name'] ."</option>"; 
					}	
					?>  
				</select>
		  
				<select class='insty' name="w_name">
					<option disabled selected  class='insty'>-- SELECT WORKOUT --</option>
					<?php  
					$records = mysqli_query($conn, "SELECT name from workout_details");  
					while($data = mysqli_fetch_array($records))
					{
						echo "<option value='". $data['name'] ."'  class='insty'>" .$data['name'] ."</option>"; 
					}	
    ?>  
  </select>
				
				<input type="date" placeholder="WORK OUT DATE" name="date" class='insty'  class="phonetext" required>
	
				<input type="submit" VALUE="SUBMIT" name="submit1" class='sub'>
 
			</form>  
		</div>
	</body>
</html>