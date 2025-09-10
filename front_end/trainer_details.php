<?php include 'C:\wamp64\www\fitness_project\config\connect_db.php' ;
include '../src/trainer_header.php'; ?>
<?php 
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
  <title> REGISTER</title>
  </head>
  <body> 
  <?php 
		$conn=getconnection();
		$id=$_SESSION['user_id'];
		$qry="SELECT trainer_name from trainer_details where trainer_id='$id'";
		$result=mysqli_query($conn,$qry);
		if (mysqli_num_rows($result) != 0)
		{
			echo " <script> alert('REGISTER ONLY ONCE')</script>";
			header('location:trainer_home.php');
			
		}
		$isValid=true;
		if(isset($_POST['submit1'])){
			$id=$_SESSION['user_id'];
			
			$name=trim($_POST['name']);
			if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) 
				{
					echo '<script>alert( "FIRST NAME: ONLY LETTERS AND WHITESPACES ALLOWED")</script>';
					$isValid=false;
				}  
			$add=trim($_POST['add']);
			$gender=trim($_POST['gender']);
			$phone=trim($_POST['phone']);
			if (!preg_match("/^[0-9' ]{10}+$/",$phone)) 
				{
					echo '<script>alert( "INVALID CONTACT NUMBER")</script>';
					$isValid=false;
				}
			if($isValid)
			{
				$query="INSERT INTO trainer_details(trainer_id,trainer_name,gender,trainer_add,availability_status,phone_no)VALUES('$id','$name','$gender', '$add','1','$phone')";
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
				{echo  '<script>alert( "REGISTRATION FAILED")</script>';}
	}
?>
		<div>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form" >
				<h1>TRAINER REGISTRATION</h1>

				<input type="text" placeholder="NAME" name="name" class='insty' required>
	
				<input type="text" placeholder="ADDRESS" name="add" class='insty' required>
	
				<select name="gender" class="insty" required placeholder="GENDER" required>
				<option value="f">female</option>
				<option value="m">male</option>
				<option value="o">other</option>
		  
				<input type="tel" placeholder="PHONE NUMBER" name="phone" class='insty'  class="phonetext" required>
	
				<input type="submit" VALUE="SUBMIT" name="submit1" class='sub'>
 
			</form>  
		</div>
	</body>
</html>