<?php include 'C:\wamp64\www\fitness_project\config\connect_db.php' ; 
include '../src/admin_header.php';?>

<?php 
	if (!isset($_SESSION['user_id'])){
			echo '<script>
			alert("PLEASE LOGIN FIRST");
			window.location.href="../config/login_amin.php";
            </script>';			
		}
?>
<!DOCTYPE html>
<html lang="en"> 
  <head> 
  <style>
<?php include 'css\register.css'; ?>
</style>
  <link href="../css/register.css?v=<?=time();?>" rel="stylesheet">
  <title> NEW REGISTER</title>
  </head>
  <body> 
  <?php 
	$Err_pswrd = " ";
	$isValid=true;
	if(isset($_POST['submit1'])){
	$conn=getconnection();
	$pwd=trim($_POST['pwd']);
	if($isValid)
	{
		$query="INSERT INTO member_login_details(member_pwd)VALUES('$pwd')";
		$result=mysqli_query($conn,$query);
		$last_id=mysqli_insert_id($conn);

        if($result)        
			echo "<script>
				alert('GENERETAED ID : ".$last_id."');
				window.location.href='admin_home.php';
				</script>";	
        else
			echo '<script>alert("SOMETHING WENT WRONG")</script>';
	}
	else
		{echo  '<script>alert( "SOMETHING WENT WRONG")</script>';}
 }
?>
	<div><BR><BR>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form">
				<h1>MEMBER REGISTER</h1>
				<input type="password" placeholder="password" name="pwd" class='insty' id="pwd" required>
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
				<input type="submit" VALUE="SUBMIT" name="submit1" class='sub'>
 
			</form>  
		</div>
	</body>
</html>