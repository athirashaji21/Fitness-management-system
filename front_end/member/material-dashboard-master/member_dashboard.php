<?php 
	session_start();
	if (!isset($_SESSION['user_id'])){
			echo '<script>
			alert("PLEASE LOGIN FIRST");
			window.location.href="../member_login.php";
            </script>';			
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>
    MEMBER DASHBOARD
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/material-dashboard.css?v=<?=time();?>" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="./assets/images/user.jpg" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white"><?php echo $_SESSION['user_id']?></span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="../../member_details.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-registered"></i>
            </div>
            <span class="nav-link-text ms-1">REGISTER</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../view_payment.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-money" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">PAYMENT DETAILS</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../view_attendence.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
			<i class="fa fa-clock-o" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">VIEW ATTENDANCE</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;"></a></li>
          </ol>
          <h6 class="font-weight-bolder mb-0"></h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
		   <li class="nav-item d-flex align-items-center">
              <a href="../ch_pwd_mem.php" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">CHANGE PASSWORD&emsp; &emsp; </span>
              </a>
            </li>
            <li class="nav-item d-flex align-items-center">
              <a href="../../../config/logout.php" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">LOGOUT</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid ">
	<div class="row mb-4">
        <div class="col-lg-12 col-md-6 mt-4 mb-4">
           <div class="card-header p-3 pt-2">
			<?php 
			    
				include '../member_functions.php';
				$object=new Member();
			?>
			<link href="../../css/display_style.css" rel="stylesheet">
			<h1 >PERSONAL DETAILS </h1>		  
			<table id="data-table" class="table table-condensed table-striped">
			<thead>
			<tr>
				<th>FIRST NAME</th>
				<th>LAST NAME</th>
				<th>GENDER</th>
				<th>AGE</th>
				<th width="10%">ADDRESS</th>
				<th>CONTACT NUMBER</th>
				<th>HEIGHT</th>
				<th>WEIGHT </th>
				<th>EDIT </th>
			</thead>
			<?php		
				$id=$_SESSION['user_id'];
				$data = $object->getDetails($id);
				foreach($data as $Details){
				echo '
				<tr>
					<td>'.$Details["f_name"].'</td>
					<td>'.$Details["l_name"].'</td>
					<td>'.$Details["gender"].'</td>
					<td>'.$Details["age"].'</td>
					<td>'.$Details["address"].'</td>
					<td>'.$Details["phone_no"].'</td>
					<td>'.$Details["height"].'</td>
					<td>'.$Details["weight"].'</td>
					<td><a href="../edit_details.php?id='.$Details["member_id"].'" title="edit Record"><i class="fas fa-edit"></i></a></td>
				</tr>
				';
				}       
			?>
			</table>	
			</div>	
			</div>
      <div class="row mb-4">
        <div class="col-lg-12 col-md-6 mt-4 mb-4">
           <div class="card-header p-3 pt-2">
			<link href="../../css/display_style.css" rel="stylesheet">
			<h1 >DIET PLAN DETAILS </h1>		  
			<table id="data-table" class="table table-condensed table-striped">
			<thead>
			<tr>
				<th>MEMBER ID </th>
				<th>TRAINER ID</th>
				<th>DIET NAME</th>
				<th>DIET DATE</th>
			</thead>
			<?php		
				$id=$_SESSION['user_id'];
				$data = $object->getDietplan($id);
				foreach($data as $Details){
				echo '
				<tr>
					<td>'.$Details["member_id"].'</td>
					<td>'.$Details["trainer_id"].'</td>
					<td>'.$Details["diet_name"].'</td>
					<td>'.$Details["diet_date"].'</td>
				</tr>
				';
				}       
			?>
			</table>	
			</div>	
			</div>
			<div class="row mb-4">
				<div class="col-lg-12 col-md-6 mt-4 mb-4">
           <div class="card-header p-3 pt-2">
			<link href="../../css/display_style.css" rel="stylesheet">
			<h1 >WORKOUT PLAN DETAILS </h1>		  
			<table id="data-table" class="table table-condensed table-striped">
			<thead>
			<tr>
				<th>MEMBER ID </th>
				<th>TRAINER ID</th>
				<th>WORKOUT NAME</th>
				<th>WORKOUT DATE</th>
			</thead>
			<?php		
				$id=$_SESSION['user_id'];
				$data = $object->getworkoutplan($id);
				foreach($data as $Details){
				echo '
				<tr>
					<td>'.$Details["member_id"].'</td>
					<td>'.$Details["trainer_id"].'</td>
					<td>'.$Details["workout_name"].'</td>
					<td>'.$Details["workout_date"].'</td>
				</tr>
				';
				}       
			?>
			</table>	
			</div>	
			</div>
			</div>
			
			<div class="row mb-4">
				<div class="col-lg-12 col-md-6 mt-4 mb-4">
           <div class="card-header p-3 pt-2">
			<link href="../../css/display_style.css" rel="stylesheet">
			<h1 >MEMBERSHIP PLAN DETAILS </h1>		  
			<table id="data-table" class="table table-condensed table-striped">
			<thead>
			<tr>
				<th>PLAN NAME </th>
				<th>PERIOD</th>
				<th>AMOUNT</th>
			</thead>
			<?php		
				$id=$_SESSION['user_id'];
				$data = $object->getmemplan($id);
				foreach($data as $Details){
				echo '
				<tr>
					<td>'.$Details["plan_name"].'</td>
					<td>'.$Details["period"].'</td>
					<td>'.$Details["amount"].'</td>
				</tr>
				';
				}       
			?>
			</table>	
			</div>	
			</div>
			</div>
       </div>
      </div>
      
    </div>
  </main>
  
  <!--   Core JS Files   -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>