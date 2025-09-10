<?php 
session_start();
include 'functions.php';
$data = new Data();
if(!empty($_GET['id']) && $_GET['id']) {
$data->deletePlan($_GET['id']);
echo "<script>
	window.location.href='../front_end/list_membership_plan.php';
	</script>";	
}
else
	echo "<script>
	window.location.href='list_membership_plan.php';
	</script>";
?>
