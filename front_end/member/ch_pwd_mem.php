<?php include 'C:\wamp64\www\fitness_project\config\connect_db.php' ;
$conn=getconnection();
include 'member_header.php'; ?>
<?php 
	if (!isset($_SESSION['user_id'])){
			echo '<script>
			alert("PLEASE LOGIN FIRST");
			window.location.href="member_login.php";
            </script>';			
		}
?>
<!DOCTYPE html>
<html lang="en"> 
   <head>
  <link href="../../css/register.css?v=<?=time();?>" rel="stylesheet">
  <title> CHANGE PASSWORD</title>
  </head>
  <body> 
  <?php 
		$isValid=true;
		if(isset($_POST['submit1'])){
			$id=$_SESSION['user_id'];
			$pwd1=trim($_POST['pwd1']);
			$pwd2=trim($_POST['pwd2']);
			if ($pwd1!= $pwd2)
			{
				$isValid=false;
				echo '<script>
					alert("PASSWORDS DOESNT MATCH");
					</script>';
			}
			if($isValid)
			{
				$query="UPDATE member_login_details SET member_pwd='$pwd1' where member_id='$id'";
				$result=mysqli_query($conn,$query);
				if($result)        
					echo "<script>
					alert('CHANGED SUCCESSFULLY');
					window.location.href='material-dashboard-master/member_dashboard.php';
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
				<h1>CHANGE PASSWORD</h1>

				<B>ENTER NEW PASSWORD:
				<input type="password"  name="pwd1" class='insty'  class="phonetext" id='pwd' required>
				<input type="checkbox" onclick="togglepwd()">Show Password

				<?php echo '<script>
				function togglepwd() {
					var x = document.getElementById("pwd");
					if (x.type === "password") {
					x.type = "text";
					} else {
					x.type = "password";
					}
				}
				</script>'
	?>
				<br>
				<br>
				<br>
				RE-ENTER PASSWORD:
				<input type="password"  name="pwd2" class='insty'  class="phonetext" required>
				
				<input type="submit" VALUE="SUBMIT" name="submit1" class='sub'>
 
			</form>  
		</div>
	</body>
</html>
