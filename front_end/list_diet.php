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
			<title>	DIET LIST</title>
			<link href="../css/display_style.css" rel="stylesheet">
	</head>
	<div class="container">		
	  <h1 class="title mt-5"><br>DIET LIST</h1><br><br>		  
      <table id="data-table" class="table table-condensed table-striped">
        <thead>
          <tr>
            <th>DIET ID</th>
            <th> DIET NAME</th>
			<th>DESCRIPTION</th>
			
			<th>DELETE</th>
			<th>EDIT</th>
        </thead>
        <?php		
	    	$List = $object->getDietList();
        foreach($List as $Details){
            echo '
              <tr>
                <td>'.$Details["diet_id"].'</td>
                <td>'.$Details["diet_name"].'</td>
                <td>'.$Details["description"].'</td>
				<td><a href="../src/delete_diet.php?id='.$Details["diet_id"].'" title="Delete Record"><i class="fas fa-trash"></i></a></td>
                <td><a href="../src/edit_diet.php?id='.$Details["diet_id"].'" title="edit Record"><i class="fas fa-edit"></i></a></td>
              </tr>
            ';
        }       
        ?>
      </table>	
</div>	
