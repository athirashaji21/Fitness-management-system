<?php include 'C:\wamp64\www\fitness_project\config\connect_db.php' ;
include 'member/member_header.php'; ?>
<?php 
   session_start();
	if (!isset($_SESSION['user_id'])){
			echo '<script>
			alert("PLEASE LOGIN FIRST");
			window.location.href="member/member_login.php";
            </script>';			
		}
?>
<!DOCTYPE html>
<html lang="en"> 
   <head>
  <link href="../css/register.css?v=<?=time();?>" rel="stylesheet">
  <title>PLAN ENTRY</title>
  </head>
  <body> 
  <?php 
		$conn=getconnection();
		$isValid=true;
		if(isset($_POST['submit1'])){
			$m_id=$_POST['id'];
			$name=$_POST['plan_name'];
		    $qry="SELECT plan_id from membership_plan where plan_name='$name'";
			$result=mysqli_query($conn,$qry);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$id=$row['plan_id'];
			if($isValid)
			{
				$query="UPDATE member_details SET plan_id ='$id' WHERE member_id='$m_id'";
				$result=mysqli_query($conn,$query);
				if($result)        
					echo "<script>
					alert('ADDED SUCCESSFULLY');
					window.location.href='customer_home';
					</script>";	
				else
					echo "Error: ". mysqli_error($conn);
			}
			else
				{echo  '<script>alert( "REGISTRATION FAILED")</script>';}
	}
?>
		<div>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form" >
				<h1>MEMBER PLAN</h1>

				<select class='insty' name="id">
					<option disabled selected  class='insty'>-- SELECT MEMBER ID --</option>
					<?php  
					$records = mysqli_query($conn, "SELECT member_id from member_details");  
					while($data = mysqli_fetch_array($records))
					{
						echo "<option value='". $data['member_id'] ."'  class='insty'>" .$data['member_id'] ."</option>"; 
					}	
    ?>  
  </select>
	 
				<select class='insty' name="plan_name">
					<option disabled selected  class='insty'>-- SELECT PLAN --</option>
					<?php  
					$records = mysqli_query($conn, "SELECT plan_name from membership_plan");  
					while($data = mysqli_fetch_array($records))
					{
						echo "<option value='". $data['plan_name'] ."'  class='insty'>" .$data['plan_name'] ."</option>"; 
					}	
    ?>  
  </select>

				
	
				<input type="submit" VALUE="SUBMIT" name="submit1" class='sub'>
 
			</form>  
		</div>
	</body>
</html>