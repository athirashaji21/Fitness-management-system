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
			<title>MEMBER LIST</title>
			<link href="../css/display_style.css" rel="stylesheet">
	</head>
	<div class="container">		
	  <h1 class="title mt-5"><br> MEMBERS LIST</h1><br><br>		  
      <table id="data-table" class="table table-condensed table-striped">
        <thead>
          <tr>
            <th>MEMBER ID</th>
            <th>FIRST NAME</th>
            <th>LAST NAME</th>
			<th>PHONE NO</th>
			<th>GENDER</th>
			<th>AGE</th>
			<th>ADDRESS</th>
			<th>HEIGHT</th>
			<th>WEIGHT</th>
			<th>DELETE</th>
        </thead>
        <?php		
	    	$List = $object->getCustomerList();
        foreach($List as $Details){
            echo '
              <tr>
                <td>'.$Details["member_id"].'</td>
                <td>'.$Details["f_name"].'</td>
                <td>'.$Details["l_name"].'</td>
				<td>'.$Details["phone_no"].'</td>
				<td>'.$Details["gender"].'</td>
				<td>'.$Details["age"].'</td>
				<td>'.$Details["address"].'</td>
				<td>'.$Details["height"].'</td>
				<td>'.$Details["weight"].'</td>
                <td><a href="../src/delete_member.php?id='.$Details["member_id"].'" title="Delete Customer Record"><i class="fas fa-trash"></i></a></td>
              </tr>
            ';
        }       
        ?>
      </table>	
</div>	
