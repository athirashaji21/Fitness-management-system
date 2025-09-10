<?php
include 'trainer_header.php';
?>

<?php 
		include 'functions.php';
		$data = new Data();
		$isValid=true;
		if(isset($_POST['submit1'])){
			$conn=getconnection();
			$id=trim($_POST['id']);
			$m_id=trim($_POST['m_id']);
			$qry="SELECT * FROM member_details where member_id='$m_id'";
			$result=mysqli_query($conn,$qry);
			if (mysqli_num_rows($result) == 0)
			{
			echo '<script>alert("ERROR:MEMBER ID INVALID")</script>';
			$isValid=false;
			}
			$t_id=trim($_POST['t_id']);
			$qry="SELECT * FROM trainer_details where trainer_id='$t_id'";
			$result=mysqli_query($conn,$qry);
			if (mysqli_num_rows($result) == 0)
			{
			echo '<script>alert("ERROR:TRAINER ID INVALID")</script>';
			$isValid=false;
			}
			$name=trim($_POST['name']);
			$qry="SELECT * FROM diet_details where diet_name='$name'";
			$result=mysqli_query($conn,$qry);
			if (mysqli_num_rows($result) == 0)
			{
			echo '<script>alert("ERROR:DIET NAME INVALID")</script>';
			$isValid=false;
			}
			$date=trim($_POST['date']);
			if($isValid)
			{
				$data->updateDietplan($_POST);	
				echo "<script>
				window.location.href='../front_end/list_diet_plan.php';
				</script>";
			}	
}
 if(!empty($_GET['id']) ) {
	 $values = $data->getdietplan($_GET['id']); 
}
else
	echo "error";
?>
<!DOCTYPE html>
<html lang="en"> 
  <head> 
  <link href="../css/register.css?v=<?=time();?>" rel="stylesheet">
  <title>EDIT</title>
  </head>
  <body> 
  <div><br><br>
    <form action="" method="post" class="form" >
    <h1>EDIT PLAN</h1>
	
    ID:
	<input type="text"  name="id" value="<?php echo $values['id']; ?>" class='insty' readonly>
	
	MEMBER ID: 
    <input type="text" name="m_id" class="insty" value="<?php echo $values['member_id']; ?>" required >
	
	TRAINER ID: 
    <input type="text" name="t_id" class="insty" value="<?php echo $values['trainer_id']; ?>" required >
	
	DIET NAME: 
    <input type="text" name="name" class="insty" value="<?php echo $values['diet_name']; ?>" required >
	
	
	DIET DATE:
	<input type="date" value="<?php echo $values['diet_date']; ?>"name="date" class='insty' required>
	

    <input type="submit" VALUE="DONE" class="sub" name="submit1">
 
</form>  
</div>
</body>
</html>