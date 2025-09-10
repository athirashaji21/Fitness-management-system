<?php
function getconnection()
{
$conn=mysqli_connect("localhost","root","","fitness_db") or
die("connection failed");
return $conn;
}

function conn_close($conn)
{
	$conn->close();
}

?>

