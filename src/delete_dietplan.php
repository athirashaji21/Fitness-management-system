<?php 
session_start();
include 'functions.php';
$data = new Data();
if(!empty($_GET['id']) && $_GET['id']) {
$data->deleteDietplan($_GET['id']);
echo "<script>
	window.location.href='../front_end/list_diet_plan.php';
	</script>";	
}
else
	echo "<script>
	window.location.href='list_diet_plan.php';
	</script>";
?>
