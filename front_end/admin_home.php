<?php 
  session_start();
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
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Admin Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../css/admin.css?v=<?=time();?>">
	<link rel="stylesheet" href="../css/demo.css">
    </head>
    <body>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a href="admin_home.php" class="logo">
					Admin Dashboard
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">
					
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						
						<li class="nav-item dropdown">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="https://st.depositphotos.com/1637056/4332/v/600/depositphotos_43322797-stock-illustration-business-man-icon.jpg" alt="user-img" width="36" class="img-circle"><span ><?php echo $_SESSION['user_id'] ;?></span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-img"><img src="https://st.depositphotos.com/1637056/4332/v/600/depositphotos_43322797-stock-illustration-business-man-icon.jpg" alt="user"></div>
										<div class="u-text">
											<h4><?php echo $_SESSION['user_id'] ;?></h4>
										</div>
									</li>
									<div class="dropdown-divider"></div>
									<div class="dropdown-divider"></div>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="../config/logout.php"><i class="fa fa-power-off"></i> Logout</a>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">
					<div class="user">
						<div class="photo">
							<img src="https://st.depositphotos.com/1637056/4332/v/600/depositphotos_43322797-stock-illustration-business-man-icon.jpg">
						</div>
						<div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo $_SESSION['user_id'] ;?>
									<span class="user-level">Administrator</span>
								</span>
							</a>
							<div class="clearfix"></div>

						</div>
					</div>
					<div class="container-fluid">
                    <ul class="nav flex-column flex-nowrap overflow-hidden">
						<li class="nav-item">
							<a class="nav-link collapsed text-truncate" href="#submenu1" data-toggle="collapse" data-target="#submenu1"><i class="fas fa-running"></i> <span class="d-none d-sm-inline">TRAINER</span></a>
							<div class="collapse" id="submenu1" aria-expanded="false">
											<ul class="flex-column nav pl-4">
												<li class="nav-item">
													<a class="nav-link p-1" href="register_trainer.php">ADD NEW</a>
												</li>
												<li class="nav-item">
													<a class="nav-link p-1" href="list_trainers.php">VIEW DETAILS</a>
												</li>
												<li class="nav-item">
													<a class="nav-link p-1" href="attendence_trainer.php">ADD TRAINER ATTENDANCE</a>
												</li>
											</ul>
									</div>
						</li>
						<li class="nav-item">
							<a class="nav-link collapsed text-truncate" href="#submenu1" data-toggle="collapse" data-target="#submenu2"><i class="fa fa-users"></i> <span class="d-none d-sm-inline">MEMBER</span></a>
							<div class="collapse" id="submenu2" aria-expanded="false">
											<ul class="flex-column nav pl-4">
												
												<li class="nav-item">
													<a class="nav-link p-1" href="register_member.php">ADD NEW</a>
												</li>
												<li class="nav-item">
													<a class="nav-link p-1" href="list_members.php">VIEW ALL</a>
												</li>
											</ul>
									</div>
						</li>
						<li class="nav-item">
							<a class="nav-link collapsed text-truncate" href="#submenu1" data-toggle="collapse" data-target="#submenu7"><i class="fa fa-money"></i> <span class="d-none d-sm-inline">PAYMENT</span></a>
							<div class="collapse" id="submenu7" aria-expanded="false">
											<ul class="flex-column nav pl-4">
												<li class="nav-item">
													<a class="nav-link p-1" href="payment_details.php"> ADD NEW </a>
												</li>											
												<li class="nav-item">
													<a class="nav-link p-1" href="list_payment_details.php">VIEW ALL
													</a>
												</li>
											</ul>
									</div>
						</li>
						
						<li class="nav-item">
							<a class="nav-link collapsed text-truncate" href="#submenu1" data-toggle="collapse" data-target="#submenu3"><i class="fa fa-users"></i> <span class="d-none d-sm-inline">MEMBERSHIP PLANS</span></a>
							<div class="collapse" id="submenu3" aria-expanded="false">
											<ul class="flex-column nav pl-4">
												<li class="nav-item">
													<a class="nav-link p-1" href="plan_details.php"> ADD NEW</a>
												</li>
												<li class="nav-item">
													<a class="nav-link p-1" href="list_membership_plan.php"> VIEW ALL</a>
												</li>
											</ul>
										</div>
								</li>
						</div>
					</div>
			</div>	
			<BR>
			<BR>
			<BR>
			<div class="main-panel">
				<div class="content">
				    <div class="container">
						<div class="row">
							<div class="card" style="width:300px">
								<img class="card-img-top" src="https://clubsolutionsmagazine.com/wp-content/uploads/2019/03/shutterstock_1221827803.jpg" alt="Card image" style="width:100%">
								<div class="card-body">
								<h4 class="card-title">ATTENDANCE</h4>
								<p class="card-text">View member attendance</p>
								<a href="view_mem_attendence.php" class="btn btn-primary">View</a>
								</div>
							</div>
							<div class="card" style="width:300px;margin-left:100px">
								<img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSdLuhjjAWheUTU-twFZqDiV3bZjSKKbmMc2yL6d3ULT_KZWX8cbuk9AIFrTp1RqjYGeW4&usqp=CAU" alt="Card image" style="width:100%;HEIGHT:200PX">
								<div class="card-body">
								<h4 class="card-title">ATTENDANCE</h4>
								<p class="card-text">View Trainer attendence</p>
								<a href="view_t_attendence.php" class="btn btn-primary">View</a>
								</div>
							</div>
							<div class="card" style="width:300px;margin-left:100px">
								<img class="card-img-top" src="https://www.techrepublic.com/a/hub/i/r/2019/02/14/4f571ee4-f9de-4f80-8028-e9981ca7c1b0/resize/1200x/7e814383fc5f43db8033047fc9f57c1e/istock-901609212datasecurity.jpg" alt="Card image" style="width:100%;HEIGHT:200PX">
								<div class="card-body">
								<h4 class="card-title">EDIT PROFILE</h4>
								<p class="card-text">change password</p>
								<a href="../config/edit_admin_profile" class="btn btn-primary">View</a>
								</div>
							</div>
						</div>
					</div>
				<div>
			</div>
		</div>			
	</div>
</body>
<script src="../dashboard/jquery.3.2.1.min.js"></script>
<script src="../dashboard/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="../dashboard/popper.min.js"></script>
<script src="../dashboard/bootstrap.min.js"></script>
<script src="../dashboard/chartist.min.js"></script>
<script src="../dashboard/chartist-plugin-tooltip.min.js"></script>
<script src="../dashboard/bootstrap-notify.min.js"></script>
<script src="../dashboard/bootstrap-toggle.min.js"></script>
<script src="../dashboard/jquery.mapael.min.js"></script>
<script src="../dashboard/world_countries.min.js"></script>
<script src="../dashboard/circles.min.js"></script>
<script src="../dashboard/jquery.scrollbar.min.js"></script>
<script src="../dashboard/ready.min.js"></script>
<script src="../dashboard/demo.js"></script>
</html>