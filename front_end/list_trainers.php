<?php
include '../src/admin_header.php';
?>
<?php 
	if (!isset($_SESSION['user_id'])){
			echo '<script>
			alert("PLEASE LOGIN FIRST");
			window.location.href="../config/login_saradhy.php";
            </script>';			
	}
?>
<!DOCTYPE html>
<html>
	<head>
			<?php 
				include '../src/functions.php';
				$object = new Data();
			?>
			<title>TRAINER LIST</title>
			<link href="../css/display_style.css" rel="stylesheet">
	</head>
	<div class="container">		
	  <h1 class="title mt-5"><br> TRAINER LIST</h1><br><br>		  
      <table id="data-table" class="table table-condensed table-striped">
        <thead>
          <tr>
            <th>TRAINER ID</th>
            <th> NAME</th>
			<th>GENDER</th>
			<th>ADDRESS</th>
			<th>STATUS</th>
			<th>PHONE NO</th>
			<th>DELETE</th>
        </thead>
        <?php		
	    	$List = $object->getTrainerList();
        foreach($List as $Details){
            echo '
              <tr>
                <td>'.$Details["trainer_id"].'</td>
                <td>'.$Details["trainer_name"].'</td>
                <td>'.$Details["gender"].'</td>
				<td>'.$Details["trainer_add"].'</td>
				<td>'.$Details["availability_status"].'</td>
				<td>'.$Details["phone_no"].'</td>
                <td><a href="../src/delete_trainer.php?id='.$Details["trainer_id"].'" title="Delete Record"><i class="fas fa-trash"></i></a></td>
              </tr>
            ';
        }       
        ?>
      </table>	
</div>	
