<?php include 'C:\wamp64\www\fitness_project\config\connect_db.php' ;
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
  <title> DIET DETAILS</title>
  </head>
  <body> 
  <?php 
		$isValid=true;
		if(isset($_POST['submit1'])){
			$conn=getconnection();
			$name=trim($_POST['name']);
			if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) 
				{
					echo '<script>alert( "NAME: ONLY LETTERS AND WHITESPACES ALLOWED")</script>';
					$isValid=false;
				}  
			$des=trim($_POST['des']);
			if($isValid)
			{
				$query="INSERT INTO diet_details(diet_name,description)VALUES('$name','$des')";
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
				{echo  '<script>alert( "FAILED")</script>';}
	}
?>
		<div>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form" >
				<h1>NEW DIET </h1>

				<input type="text" placeholder="DIET TITLE" name="name" class='insty' required>
	
				<input type="textarea" placeholder="DESCRIPTION" name="des" class='textarea' required>
	
				<br><br><input type="submit" VALUE="SUBMIT" name="submit1" class='sub'>
 
			</form>  
		</div>
	</body>
</html>