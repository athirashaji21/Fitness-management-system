<?php
include 'member_header.php';
?>
<?php 
	if (!isset($_SESSION['user_id'])){
			echo '<script>
			alert("PLEASE LOGIN FIRST");
			window.location.href="member/member_login.php";
            </script>';			
		}
?>
<!DOCTYPE html>
<html>
	<head>
			<?php 
				include 'member_functions.php';
				$object = new Member();
			?>
			<title>PAYMENT DETAILS</title>
			<link href="../../css/display_style.css" rel="stylesheet">
	</head>
	<div class="container">		
	  <h1 class="title mt-5"><br>ATTENDENCE DETAILS</h1><br><br>		  
      <table id="data-table" class="table table-condensed table-striped">
        <thead>
          <tr>
			<th>MEMBER ID </th>
			<th>DATE</th>
			<th>TIME</th>
        </thead>
        <?php		
			$id=$_SESSION['user_id'];
	    	$data = $object->getAttendence($id);
			foreach($data as $Details){
            echo '
              <tr>
                <td>'.$Details["member_id"].'</td>
                <td>'.$Details["date"].'</td>
				<td>'.$Details["time"].'</td>
              </tr>
            ';
        }       
        ?>
      </table>	
</div>	
