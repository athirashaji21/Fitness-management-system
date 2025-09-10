<?php include 'C:\wamp64\www\fitness_project\config\connect_db.php';;
?>
<html>
 <head>
 <title>MEMBER LOGIN</title>
 <meta charset="UTF-8">
 <link href="../../css/admin_login.css?v=<?=time();?>" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>
<body>
<?php
if(isset($_POST['login1'])){
	$conn=getconnection();
	$id=trim($_POST['id']);
	$pass=trim($_POST['pswrd']);
	$query="SELECT member_pwd from member_login_details WHERE member_id='$id' ";
	$result=mysqli_query($conn,$query);
	$row=mysqli_fetch_array($result);
	if($row['member_pwd']==$pass)
	{
		session_start();
		$_SESSION['user_id']=$id;
		header("location:material-dashboard-master/member_dashboard.php");
	}
	else
	 echo '<script>alert( "INVALID USERNAME / PASSWORD")</script>';
}
?>
<div class="w3-top w3-bar w3-xlarge w3-black w3-opacity-min">
	
</div>
<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
  <div class="w3-display-topleft w3-padding-large w3-xlarge">
  </div>
	<div class="con">
	            <div class="form">
				    <h2><center><b>MEMBER LOGIN</h2>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
						<div>
							<div>
								<div class="imgcontainer">
									<img src="https://cdn0.iconfinder.com/data/icons/web-design-22/50/29-512.png" alt="Avatar" class="avatar">
								</div>
							</div>
							<div>
								<input type="text" placeholder="USER NAME" name="id"  class='insty' required<br>
							</div>
						</div>
						<div>
							<input type="password" placeholder="PASSWORD" name="pswrd" class='insty' required><br>
						</div>
						<br>
						<input TYPE="submit" VALUE="LOGIN" name="login1" class='sub'>
					
					</form>
				</div>
			</div>
		</div>
	</body>
</html>