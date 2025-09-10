<?php
include '../src/admin_header.php';
?>
<?php 
		include 'functions.php';
		$data = new Data();
		$isValid=true;
		if(isset($_POST['submit1'])){
			$conn=getconnection();
			$id=trim($_POST['id']);
			$name=trim($_POST['name']);
			$amt=trim($_POST['amount']);
			$per=trim($_POST['per']);
			if (!preg_match("/^[0-9' ]*$/",$amt)) 
				{
					echo '<script>alert( "AMOUNT INCORRECT ")</script>';
					$isValid=false;
				}
			if($isValid)
			{
				$data->updatePlan($_POST);	
				echo "<script>
				window.location.href='../front_end/list_membership_plan.php';
				</script>";
			}	
}
 if(!empty($_GET['id']) ) {
	 $values = $data->getPlan($_GET['id']); 
}
else
	echo "error";
?>
<!DOCTYPE html>
<html lang="en"> 
  <head> 
  <link href="../css/register.css?v=<?=time();?>" rel="stylesheet">
  <title>edit expense</title>
  </head>
  <body> 
  <div><br><br>
    <form action="" method="post" class="form" >
    <h1>EDIT PLAN</h1>
	
	PLAN ID:
	<input type="text" placeholder="PLAN ID" name="id" value="<?php echo $values['plan_id']; ?>" class='insty' readonly>
	
	PLAN NAME: 
    <input type="text" name="name" class="insty" value="<?php echo $values['plan_name']; ?>" required >
	
	
	PLAN PERIOD :
	<input type="text" placeholder="PLAN PERIOD" name="per" class="insty"   value="<?php echo $values['period']; ?>"  required>
	
   
	AMOUNT:
    <input type="text" placeholder="AMOUNT" class="insty" name="amount" value="<?php echo $values['amount']; ?>" required>

    <input type="submit" VALUE="DONE" class="sub" name="submit1">
 
</form>  
</div>
</body>
</html>