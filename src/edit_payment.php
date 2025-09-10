<?php
include '../src/admin_header.php';
?>
<?php 
	if (!isset($_SESSION['user_id'])){
			echo '<script>
			alert("PLEASE LOGIN FIRST");
			window.location.href="../front_end/login_admin.php";
            </script>';			
	}
?>
<?php 
		include 'functions.php';
		$data = new Data();
		$isValid=true;
		if(isset($_POST['submit1'])){
			$conn=getconnection();
			$id=trim($_POST['mem_id']); 
			$qry="SELECT * FROM member_details where member_id='$id'";
			$result=mysqli_query($conn,$qry);
			if (mysqli_num_rows($result) == 0)
			{
			echo '<script>alert("ERROR:MEMBER ID INVALID")</script>';
			$isValid=false;
			}
			$amt=trim($_POST['amount']);
			if (!preg_match("/^[0-9' ]*$/",$amt)) 
				{
					echo '<script>alert( "AMOUNT INCORRECT ")</script>';
					$isValid=false;
				}
			if($isValid)
			{
				$data->updatePayment($_POST);	
				echo "<script>
				window.location.href='../front_end/list_payment_details.php';
				</script>";
			}	
}
 if(!empty($_GET['id']) ) {
	 $values = $data->getPayment($_GET['id']); 
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
    <h1>EDIT EXPENSE</h1>
	
	PAYMENT ID:
	<input type="text" placeholder="PAYMENT ID" name="id" value="<?php echo $values['payment_id']; ?>" class='insty' readonly>
	
	 MEMBER ID:
	<input type="text" placeholder="MEMBER ID" name="mem_id" class="insty"   value="<?php echo $values['member_id']; ?>"  required>
	
    DATE: 
    <input type="date" name="date" class="insty" value="<?php echo $values['date']; ?>" required >
	
	AMOUNT:
    <input type="text" placeholder="AMOUNT" class="insty" name="amount" value="<?php echo $values['amount']; ?>" required>

    <input type="submit" VALUE="DONE" class="sub" name="submit1">
 
</form>  
</div>
</body>
</html>