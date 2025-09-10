<?php 
include '../src/admin_header.php';
if (!isset($_SESSION['user_id'])){
			echo '<script>
			alert("PLEASE LOGIN FIRST");
			window.location.href="../config/trainer_login.php";
            </script>';			
		}*/
include 'functions.php';
$data = new Data();
if(!empty($_GET['id']) && $_GET['id']) {
$data->deleteWorkoutplan($_GET['id']);
echo "<script>
	window.location.href='../front_end/list_workoutplan.php';
	</script>";	
}
else
	echo "<script>
	window.location.href='list_workoutplan.php';
	</script>";
?>
