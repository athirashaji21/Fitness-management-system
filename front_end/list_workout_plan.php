<?php
include '../src/trainer_header.php';
	if (!isset($_SESSION['user_id'])){
			echo '<script>
			alert("PLEASE LOGIN FIRST");
			window.location.href="../config/trainer_login.php";
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
			<title>WORKOUTPLAN LIST</title>
			<link href="../css/display_style.css" rel="stylesheet">
	</head>
	<div class="container">		
	  <h1 class="title mt-5"><br>WORKOUT PLAN LIST</h1><br><br>		  
      <table id="data-table" class="table table-condensed table-striped">
        <thead>
          <tr>
            <th>PLAN ID</th>
            <th>MEMBER ID</th>
			<th>TRAINER ID </th>
			<th>WORKOUT NAME</th>
			<th>WORKOUT DATE</th>
			<th>DELETE</th>
			<th>EDIT</th>
        </thead>
        <?php		
			$id=$_SESSION['user_id'];
	    	$List = $object->getWorkoutPlanList($id);
        foreach($List as $Details){
            echo '
              <tr>
                <td>'.$Details["plan_id"].'</td>
                <td>'.$Details["member_id"].'</td>
                <td>'.$Details["trainer_id"].'</td>
				<td>'.$Details["workout_name"].'</td>
				<td>'.$Details["workout_date"].'</td>
				<td><a href="../src/delete_workoutplan.php?id='.$Details["plan_id"].'" title="Delete Record"><i class="fas fa-trash"></i></a></td>
                <td><a href="../src/edit_workoutplan.php?id='.$Details["plan_id"].'" title="edit Record"><i class="fas fa-edit"></i></a></td>
              </tr>
            ';
        }       
        ?>
      </table>	
</div>	
