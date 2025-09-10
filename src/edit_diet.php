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
			$name=trim($_POST['name']);
			$des=trim($_POST['des']);
			
			if($isValid)
			{
				$data->updateDiet($_POST);	
				echo "<script>
				window.location.href='../front_end/list_diet.php';
				</script>";
			}	
}
 if(!empty($_GET['id']) ) {
	 $values = $data->getDietEdit($_GET['id']); 
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
    <h1>EDIT DIET</h1>
	
	DIET ID:
	<input type="text"  name="id" value="<?php echo $values['diet_id']; ?>" class='insty' readonly>
	
	DIET NAME: 
    <input type="text" name="name" class="insty" value="<?php echo $values['diet_name']; ?>" required >
	
	DESCRIPTION:
	<input type="textarea" value="<?php echo $values['description']; ?>"name="des" class='textarea' required>
	

    <input type="submit" VALUE="DONE" class="sub" name="submit1">
 
</form>  
</div>
</body>
</html>