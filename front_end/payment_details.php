<?php include 'C:\wamp64\www\fitness_project\config\connect_db.php' ;
include '../src/admin_header.php';?>
<?php 
	if (!isset($_SESSION['user_id'])){
			echo '<script>
			alert("PLEASE LOGIN FIRST");
			window.location.href="../config/login_adminphp";
            </script>';			
		}
?>
<!DOCTYPE html>
<html lang="en"> 
   <head>
  <link href="../css/register.css?v=<?=time();?>" rel="stylesheet">
  <title> DETAILS</title>
  </head>
  <body> 
  <?php 
		$isValid=true;
		if(isset($_POST['submit1'])){
			$conn=getconnection();
			$id=trim($_POST['id']); 
			$date=trim($_POST['date']); 
			$qry="SELECT * FROM member_details where member_id='$id'";
			$result=mysqli_query($conn,$qry);
			if (mysqli_num_rows($result) == 0)
			{
			echo '<script>alert("ERROR:MEMBER ID INVALID")</script>';
			$isValid=false;
			}
			$amt=trim($_POST['amt']);
			if (!preg_match("/^[0-9' ]*$/",$amt)) 
				{
					echo '<script>alert( "AMOUNT INCORRECT ")</script>';
					$isValid=false;
				}
			if($isValid)
			{
				$query="INSERT INTO payment_details(member_id,amount,date)VALUES('$id', '$amt','$date')";
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
				{echo  '<script>alert( "UPDATION FAILED")</script>';}
	}
?>
		<div>
		<br>
		<br>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form" >
				<h1>PAYMENT DETAILS</h1>

				<input type="text" placeholder="MEMBER ID" name="id" class='insty' required>
	
				<input type="date" placeholder="date" name="date" class='insty' required>
		  
				<input type="text" placeholder="AMOUNT" name="amt" class='insty'  class="phonetext" required>
	
				<input type="submit" VALUE="SUBMIT" name="submit1" class='sub'>
 
			</form>  
		</div>
	</body>
</html>