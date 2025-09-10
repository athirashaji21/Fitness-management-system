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
			<title>PAYMENT LIST</title>
			<link href="../css/display_style.css" rel="stylesheet">
	</head>
	<div class="container">		-
	  <h1 class="title mt-5"><br> PAYMENT LIST</h1><br><br>		  
      <table id="data-table" class="table table-condensed table-striped">
        <thead>
          <tr>
            <th>PAYMENT ID</th>
            <th> MEMBER ID</th>
			<th>PAYMENT AMOUNT</th>
			<th>DATE</th>
			<th>EDIT</th>
			<th>DELETE</th>
        </thead>
        <?php		
	    	$List = $object->getPaymentList();
        foreach($List as $Details){
            echo '
              <tr>
                <td>'.$Details["payment_id"].'</td>
                <td>'.$Details["member_id"].'</td>
                <td>'.$Details["amount"].'</td>
				<td>'.$Details["date"].'</td>
                <td><a href="../src/edit_payment.php?id='.$Details["payment_id"].'" title="EDIT Record"><i class="fas fa-edit"></i></a></td>
				<td><a href="../src/delete_payment.php?id='.$Details["payment_id"].'" title="DELETE Record"><i class="fas fa-trash"></i></a></td>	
              </tr>
            ';
        }       
        ?>
      </table>	
</div>	
