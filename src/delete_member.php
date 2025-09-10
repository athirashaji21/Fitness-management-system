<?php 
session_start();
include 'functions.php';
$data = new Data();
if(!empty($_GET['id']) && $_GET['id']) {
$data->deleteMember($_GET['id']);
echo "<script>
	window.location.href='../front_end/list_members.php';
	</script>";	 	
}
else
	echo "<script>
	window.location.href='../front_end/list_items.php';
	</script>";
?>
