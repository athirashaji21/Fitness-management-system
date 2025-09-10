<?php 
include 'trainer_header.php'; 
?>
<!DOCTYPE html>
<html lang="en"> 
   <head>
  <link href="../css/register.css?v=<?=time();?>" rel="stylesheet">
  <title> REGISTER</title>
  </head>
  <body> 
  <?php 
		
		include 'functions.php';
		$data = new Data();
		$isValid=true;
		if(isset($_POST['submit1'])){
			$id=$_SESSION['user_id'];
			$conn=getconnection();
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
				$query="UPDATE trainer_details SET trainer_name='$name',gender='$gender',trainer_add='$add',phone_no='$phone' where trainer_id='$id'";
				$result=mysqli_query($conn,$query);
				if($result)        
					echo "<script>
					alert('UPDATED SUCCESSFULLY');
					window.location.href='../front_end/trainer_home';
					</script>";	
				else
					echo "Error: ". mysqli_error($conn);
			}
			else
				{echo  '<script>alert( "REGISTRATION FAILED")</script>';}
	}
	if(!empty($_GET['id']) ) {
	 $values = $data->getT($_GET['id']); 
}
else
	echo "error";
?>
		<div>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form" >
				<h1>TRAINER REGISTRATION</h1>

				NAME:
				<input type="text" value="<?php echo $values['trainer_name']?>" name="name" class='insty' required>
	
				ADDRESS:
				<input type="text" value="<?php echo $values['trainer_add']?> "name="add" class='insty' required>
	
				GENDER:
				<select name="gender" class="insty" required placeholder="GENDER" required>
				<option value="f">female</option>
				<option value="m">male</option>
				<option value="o">other</option>
		  
				PHONE NUMBER:
				<input type="tel" value="<?php echo $values['phone_no']?> "name="phone" class='insty'  class="phonetext" required>
	
				<input type="submit" VALUE="SUBMIT" name="submit1" class='sub'>
 
			</form>  
		</div>
	</body>
</html>