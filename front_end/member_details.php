<?php include 'C:\wamp64\www\fitness_project\config\connect_db.php' ;
include 'member/member_header.php'; ?>
<?php 
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
  <title> REGISTER</title>
  </head>
  <body> 
  <?php 
		$conn=getconnection();
		$id=$_SESSION['user_id'];
		$qry="SELECT member_id from member_details where member_id='$id'";
		$result=mysqli_query($conn,$qry);
		if (mysqli_num_rows($result) != 0)
		{
			echo ' <script> alert("REGISTER ONLY ONCE")</script>';
			header('location:member/material-dashboard-master/member_dashboard.php');
			
		}
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
				$query="INSERT INTO member_details(member_id,f_name,l_name,phone_no,gender,age,address,height,weight)VALUES('$id','$fname','$lname','$phone','$gender','$age','$add','$height','$weight')";
				$result=mysqli_query($conn,$query);
				if($result)        
					echo "<script>
					alert('ADDED SUCCESSFULLY');
                    window.location.href='member/material-dashboard-master/member_dashboard.php';
					</script>";	
				else
					echo "Error: ". mysqli_error($conn);
			}
			else
				{echo  '<script>alert( "REGISTRATION FAILED")</script>';}
	}
?>
			<br>
			<br>
		<div>
			
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form" >
				<h1>MEMBER REGISTRATION</h1>

				<input type="text" placeholder="FIRST NAME" name="fname" class='insty' required>
	
				<input type="text" placeholder="LAST NAME" name="lname" class='insty' required>
	
				<input type="text" placeholder="ADDRESS" name="add" class='insty' required>
	
				<select name="gender" class="insty" required placeholder="GENDER" required>
				<option value="f">female</option>
				<option value="m">male</option>
				<option value="o">other</option>
				</select>
	 
				<input type="TEXT"  placeholder="AGE"  name="age" class='insty' required>

				<input type="TEXT" placeholder="HEIGHT"  name="height" class='insty'  required>
				
				<input type="TEXT" placeholder="WEIGHT"  name="weight" class='insty'  required>
		  
				<input type="tel" placeholder="PHONE NUMBER" name="phone" class='insty'  class="phonetext" required>
	
				<input type="submit" VALUE="SUBMIT" name="submit1" class='sub'>
 
			</form>  
		</div>
	</body>
</html>