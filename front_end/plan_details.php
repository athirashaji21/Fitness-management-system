<?php include 'C:\wamp64\www\fitness_project\config\connect_db.php' ;
include '../src/admin_header.php'; ?>
<?php 
	if (!isset($_SESSION['user_id'])){
			echo '<script>
			alert("PLEASE LOGIN FIRST");
			window.location.href="login_admin.php";
            </script>';			
		}
?>
<!DOCTYPE html>
<html lang="en"> 
   <head>
  <link href="../css/register.css?v=<?=time();?>" rel="stylesheet">
  <title> MEMBERSHIP PLAN</title>
  </head>
  <body> 
  <?php 
		$isValid=true;
		if(isset($_POST['submit1'])){
			$id=1;
			$conn=getconnection();
			$name=trim($_POST['name']);
			if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) 
				{
					echo '<script>alert( "NAME: ONLY LETTERS AND WHITESPACES ALLOWED")</script>';
					$isValid=false;
				}  
			$per=trim($_POST['per']);
			$amt=trim($_POST['amt']);
			if (!preg_match("/^[0-9' ]*$/",$amt)) 
				{
					echo '<script>alert( "AMOUNT INCORRECT ")</script>';
					$isValid=false;
				}
			if($isValid)
			{
				$query="INSERT INTO membership_plan(plan_name,period,amount)VALUES('$name','$per', '$amt')";
				$result=mysqli_query($conn,$query);
				if($result)        
					echo "<script>
					alert('ADDED SUCCESSFULLY');
					window.location.href='admin_home';
					</script>";	
				else
					echo "Error: ". mysqli_error($conn);
			}
			else
				{echo  '<script>alert( "REGISTRATION FAILED")</script>';}
	}
?>
		<div>
		<br>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form" >
				<h1>MEMBERSHIP PLAN</h1>

				<input type="text" placeholder="PLAN NAME" name="name" class='insty' required>
	
				<input type="text" placeholder="PERIOD" name="per" class='insty' required>
		  
				<input type="text" placeholder="AMOUNT" name="amt" class='insty'  class="phonetext" required>
	
				<input type="submit" VALUE="SUBMIT" name="submit1" class='sub'>
 
			</form>  
		</div>
	</body>
</html>