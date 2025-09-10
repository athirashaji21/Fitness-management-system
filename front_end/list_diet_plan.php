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
			<title>DIET PLAN LIST</title>
			<link href="../css/display_style.css" rel="stylesheet">
	</head>
	<div class="container">		
	  <h1 class="title mt-5"><br>LIST DIET PLAN</h1><br><br>		  
      <table id="data-table" class="table table-condensed table-striped">
        <thead>
          <tr>
            <th> ID</th>
            <th> MEMBER ID</th>
			<th>TRAINER ID </th>
			<th>DIET ID</th>
			<th>DIET NAME</th>
			<th>DIET DATE</th>
			<th>DELETE</th>
			<th>EDIT</th>
        </thead>
        <?php		
			$id=$_SESSION['user_id'];
	    	$List = $object->getdietPlanList($id);
        foreach($List as $Details){
            echo '
              <tr>
                <td>'.$Details["id"].'</td>
                <td>'.$Details["member_id"].'</td>
                <td>'.$Details["trainer_id"].'</td>
				<td>'.$Details["diet_id"].'</td>
				<td>'.$Details["diet_name"].'</td>
				<td>'.$Details["diet_date"].'</td>
				<td><a href="../src/delete_dietplan.php?id='.$Details["id"].'" title="Delete Record"><i class="fas fa-trash"></i></a></td>
                <td><a href="../src/edit_dietplan.php?id='.$Details["id"].'" title="edit Record"><i class="fas fa-edit"></i></a></td>
              </tr>
            ';
        }       
        ?>
      </table>	
</div>	
