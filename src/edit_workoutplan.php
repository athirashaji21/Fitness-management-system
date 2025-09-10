<?php
include '../src/trainer_header.php';
?>
<?php 
		include 'functions.php';
		$data = new Data();
		$isValid=true;
		if(isset($_POST['submit1'])){
			$conn=getconnection();
			$id=trim($_POST['id']);
			$m_id=trim($_POST['m_id']);
			$t_id=trim($_POST['t_id']);
			$name=trim($_POST['name']);
			$date=trim($_POST['date']);
			if($isValid)
			{
				$data->updateWorkoutplan($_POST);	
				echo "<script>
				window.location.href='../front_end/list_workout_plan.php';
				</script>";
			}	
}
 if(!empty($_GET['id']) ) {
	 $values = $data->getWorkoutplanedit($_GET['id']); 
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
	
	PLAN ID:
	<input type="text"  name="id" value="<?php echo $values['plan_id']; ?>" class='insty' readonly>
	
	MEMBER ID: 
    <input type="text" name="m_id" class="insty" value="<?php echo $values['member_id']; ?>" required >
	
	TRAINER ID: 
    <input type="text" name="t_id" class="insty" value="<?php echo $values['trainer_id']; ?>" required >
	
	WORKOUT NAME: 
    <input type="text" name="name" class="insty" value="<?php echo $values['workout_name']; ?>" required >
	
	WORKOUT DATE:
	<input type="date" value="<?php echo $values['workout_date']; ?>"name="date" class='insty' required>
	

    <input type="submit" VALUE="DONE" class="sub" name="submit1">
 
</form>  
</div>
</body>
</html>