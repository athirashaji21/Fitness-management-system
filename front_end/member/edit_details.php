<?php
//include '../src/admin_header.php';
?>
<?php 
	/*if (!isset($_SESSION['user_id'])){
			echo '<script>
			alert("PLEASE LOGIN FIRST");
			window.location.href="login_saradhy.php";
            </script>';			
		}*/
?>
<?php 
		session_start();
		include 'member_functions.php';
		$data = new Member();
		$conn=getconnection();
		$isValid=true;
		if(isset($_POST['submit1'])){
			$id=$_SESSION['user_id'];
			$fname=trim($_POST['fname']);
			if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) 
				{
					echo '<script>alert( "FIRST NAME: ONLY LETTERS AND WHITESPACES ALLOWED")</script>';
					$isValid=false;
				} 
			$lname=trim($_POST['lname']);
			if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) 
				{
					echo '<script>alert( "LAST NAME: ONLY LETTERS AND WHITESPACES ALLOWED")</script>';
					$isValid=false;
				} 
			$add=trim($_POST['add']);
			$gender=trim($_POST['gender']);
			$age=trim($_POST['age']);
			if (!preg_match("/^[0-9']{2}+$/",$age)) 
				{
					echo '<script>alert( "INVALID AGE")</script>';
					$isValid=false;
				} 
			$height=trim($_POST['height']);
			$weight=trim($_POST['weight']);
			$phone=trim($_POST['phone']);
			if (!preg_match("/^[0-9' ]{10}+$/",$phone)) 
				{
					echo '<script>alert( "INVALID CONTACT NUMBER")</script>';
					$isValid=false;
				}
			if($isValid)
			{
				$query="UPDATE member_details SET f_name='$fname',l_name='$lname',address='$add',gender='$gender',age='$age',height='$height',weight='$weight',phone_no='$phone' WHERE member_id='$id'";
				$result=mysqli_query($conn,$query);
				if($result)        
					echo "<script>
					alert('UPDATED SUCCESSFULLY');
					window.location.href='material-dashboard-master/member_dashboard.php';
					</script>";	
				else
					echo "Error: ". mysqli_error($conn);
			}
			else
				{echo  '<script>alert( "REGISTRATION FAILED")</script>';}
	}	

 if(!empty($_GET['id']) ) {
	 $values = $data->geteditdetails($_GET['id']); 
}
else
	echo "error";
?>
<!DOCTYPE html>
<html lang="en"> 
  <head> 
  <link href="../../css/register.css?v=<?=time();?>" rel="stylesheet">
  <title>EDIT</title>
  </head>
  <body> 
  <div><br><br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form" >
				<h1>MEMBER REGISTRATION</h1>

				FIRST NAME:
				<input type="text" name="fname" class='insty' value="<?php echo $values['f_name'];  ?>"required>
	
				LAST NAME:
				<input type="text" value="<?php echo $values['l_name'];  ?>" name="lname" class='insty' requiRed>
	
				ADDRESS:
				<input type="text" value="<?php echo $values['address'];  ?>" name="add" class='insty' required>
	
				GENDER:
				<select name="gender" class="insty" required   ?>" required>
				<option value="f">female</option>
				<option value="m">male</option>
				<option value="o">other</option>
				</select>
	 
				AGE:
				<input type="TEXT"  value="<?php echo $values['age'];  ?>"  name="age" class='insty' required>

				HEIGHT:
				<input type="TEXT" value="<?php echo $values['height'];  ?>"  name="height" class='insty'  required>
				
				WEIGHT:
				<input type="TEXT" value="<?php echo $values['weight'];  ?>" name="weight" class='insty'  required>
		  
				CONTACT NUMBER:
				<input type="tel" value="<?php echo $values['phone_no']; ?>" name="phone" class='insty'  class="phonetext" required>
	
				<input type="submit" VALUE="SUBMIT" name="submit1" class='sub'>
 
			</form>
</div>
</body>
</html>