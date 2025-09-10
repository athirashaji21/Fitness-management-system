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
		<link href="../css/register.css?v=<?=time();?>" rel="stylesheet">
			<?php 
			    
				include '../src/functions.php';
				$conn=getconnection();
				$object = new Data();
			?>
			<title>TRAINERS ATTENDANCE</title>
			<link href="../css/display_style.css" rel="stylesheet">
	</head>
	<div class="container">	<br>	
	<br>	
	<br>	
	<br>	
	<form action="" method="post"  >
				<select class='insty1' name='t_name'>
					<option disabled selected  class='insty'>-- SELECT MEMBER--</option>
					<?php 
					$records = mysqli_query($conn, "SELECT f_name from member_details"); 
					while($data = mysqli_fetch_array($records))
					{
						echo "<option value='". $data['f_name'] ."'  class='insty'>" .$data['f_name'] ."</option>"; 
					}	
				?>  
					</select>
	
				<br><br><br><br><center><input type="submit" VALUE="SUBMIT" name="submit1" class='sub'></center>
 
			</form> 
	  <h2 class="title mt-5"><br> <center>ATTENDANCE</center></h2><br><br>		  
      <table id="data-table" class="table table-condensed table-striped">
        <thead>
          <tr>
            <th>MEMBER ID</th>
			<th>DATE</th>
            <th>TIME</th>
			
        </thead>
        <?php	
		if(isset($_POST['submit1'])){		
			$conn=getconnection();
		    $qry="SELECT member_id FROM member_details where f_name='".$_POST['t_name']."' ";
			$result=mysqli_query($conn,$qry);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$id=$row['member_id'];
	    	$List = $object->getmemList($id);
            foreach($List as $Details){
            echo '
              <tr>
			    <td>'.$Details["member_id"].'</td>
                <td>'.$Details["date"].'</td>
                <td>'.$Details["time"].'</td>
			  </tr>
            ';
        }
		}		
        ?>
      </table>	
</div>	
