<?php
include '../src/admin_header.php';
?>
<?php 
	if (!isset($_SESSION['user_id'])){
			echo '<script>
			alert("PLEASE LOGIN FIRST");
			window.location.href="../config/login_admin.php";
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
			<title>MEMBERSHIP PLAN LIST</title>
			<link href="../css/display_style.css" rel="stylesheet">
	</head>
	<div class="container">		-
	  <h1 class="title mt-5"><br> MEMBERSHIP PLAN LIST</h1><br><br>		  
      <table id="data-table" class="table table-condensed table-striped">
        <thead>
          <tr>
            <th>PLAN ID</th>
            <th>PLAN NAME</th>
			<th>PERIOD</th>
			<th>AMOUNT</th>
			<th>EDIT</th>
			<th>DELETE</th>
        </thead>
        <?php		
	    	$List = $object->getPlanList();
        foreach($List as $Details){
            echo '
              <tr>
                <td>'.$Details["plan_id"].'</td>
                <td>'.$Details["plan_name"].'</td>
                <td>'.$Details["period"].'</td>
				<td>'.$Details["amount"].'</td>
                <td><a href="../src/edit_plan.php?id='.$Details["plan_id"].'" title="EDIT Record"><i class="fas fa-edit"></i></a></td>
				<td><a href="../src/delete_plan.php?id='.$Details["plan_id"].'" title="DELETE Record"><i class="fas fa-trash"></i></a></td>	
              </tr>
            ';
        }       
        ?>
      </table>	
</div>	
