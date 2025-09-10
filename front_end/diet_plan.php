<?php include 'C:\wamp64\www\fitness_project\config\connect_db.php' ;
$conn=getconnection();
include '../src/trainer_header.php';
	if (!isset($_SESSION['user_id'])){
			echo '<script>
			alert("PLEASE LOGIN FIRST");
			window.location.href="../config/trainer_login.php";
            </script>';			
		}
?>
<!DOCTYPE html>
<html lang="en"> 
   <head>
  <link href="../css/register.css?v=<?=time();?>" rel="stylesheet">
  <title> DIET PLAN</title>
  </head>
  <body> 
  <?php 
		$isValid=true;
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
			$d_name=trim($_POST['d_name']);
			$qry="SELECT diet_id FROM diet_details where diet_name='$d_name'";
			$result=mysqli_query($conn,$qry);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$d_id=$row['diet_id'];
			$date=trim($_POST['date']);
			if($isValid)
			{
				$query="INSERT INTO dietplan_details(member_id,trainer_id,diet_id,diet_name,diet_date)VALUES('$mem_id','$t_id', '$d_id','$d_name',STR_TO_DATE('$date','%Y-%m-%d'))";
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
				<h1>DIET PLAN</h1>

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
		  
				<select class='insty' name="d_name">
					<option disabled selected  class='insty'>-- SELECT DIET PLAN --</option>
					<?php  
					$records = mysqli_query($conn, "SELECT diet_name from diet_details");  
					while($data = mysqli_fetch_array($records))
					{
						echo "<option value='". $data['diet_name'] ."'  class='insty'>" .$data['diet_name'] ."</option>"; 
					}	
    ?>  
  </select>
				
				<input type="date" placeholder="WORK OUT DATE" name="date" class='insty'  class="phonetext" required>
	
				<input type="submit" VALUE="SUBMIT" name="submit1" class='sub'>
 
			</form>  
		</div>
	</body>
</html>