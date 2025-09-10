<?php 
    include '../src/trainer_header.php';
	if (!isset($_SESSION['user_id'])){
			echo '<script>
			alert("PLEASE LOGIN FIRST");
			window.location.href="trainer_login.php";
            </script>';			
		}
	include '../src/functions.php' ?>
<!DOCTYPE html>
<html>
			<link rel="stylesheet" href="bootstrap.min.css">
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
			<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
<head>
<?php 
 if(isset($_POST['submit'])){
	$isValid=true;
	$conn=getconnection(); 
	for ($i = 0; $i < count($_POST['mem_name']); $i++) {
			$id=$_POST['mem_name'][$i];
			$qry="select member_id from member_details where member_id='$id'";	
			$result=mysqli_query($conn,$qry);
			if (mysqli_num_rows($result) == 0)
			{
				echo '<script>alert("ERROR:MEMBER ID INVALID")</script>';
				$isValid=false;
			}
		}
    $data= new Data();
	if($isValid) {	
		$data->save_data($_POST);
		echo "<script>window.location.href='trainer_home'</script>";
   }
  }
   ?>
   
   
<title>
ATTENDANCE</title>
<script src="../javascript/attendence.js" type="text/javascript"></script>
<link href="../css/attendence_style.css?v=<?=time();?>" rel="stylesheet">
</head>
<body >
<div class="container content-invoice">
   <div class="cards">
     <div class="card-bodys" >
		<form action="" id="invoice-form" method="post" class="invoice-form"  role="form" >
			<div class="load-animate animated fadeInUp">
				<div class="row">
					<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><BR><br><br>
						<h1 class="title"><center>MEMBER  ATTENDANCE </center></h1>
						<HR>
					</div> 
				</div>
				<div class="" >
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<table class="table table-condensed table-striped" id="invoiceItem">
								<tr >
									<th width="2%">
										<div class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" id="checkAll" name="checkAll">
											<label class="custom-control-label" for="checkAll"></label>
										</div>
									</th>
									<th width="30%"><h3>MEMBER ID</h3></th>
									<th width="30%"><h3>DATE</h3></th>
									<th width="30%"><h3>TIME</h3></th>
								</tr>
								<tr>
									<td>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="itemRow custom-control-input" id="itemRow_1">
										<label class="custom-control-label" for="itemRow_1"></label>
									</div>
									</td>
									<td><input type="text" placeholder="ID"name="mem_name[]" id="mem_name_1" class="form-control" autocomplete="off"   required ></td>
									<td><input type="date" name="date[]" id="date_1'" class="form-control" autocomplete="off" required></td>
									<td><input type="time" name="time[]" id="time_1'" class="form-control" autocomplete="off" required></td>
								</tr>
							</table>
			   
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<button class="btn btn-dark" id="removeRows" type="button">- DELETE</button>
							<button class="btn btn-success" id="addRows" type="button">+ ADD MORE</button>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
							<br>
								<div class="form-group">
									<input data-loading-text="Saving " type="submit" name="submit" value="SAVE " class="btn btn-success submit_btn invoice-save-btm">        
								</div>
						</div>
					</div>
				</div>
			 </div>
		</form>
      </div>
   </div>
</div>	
</body>
</html>
