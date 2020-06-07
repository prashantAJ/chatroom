<?php 

	include 'db_connect.php';
	$msg=$_POST['text'];
	$room=$_POST['room'];
	$ip=$_POST['ip'];

	$sql="insert into msgs (msg,room,ip) values('$msg','$room','$ip');";
	mysqli_query($conn,$sql);
	mysqli_close($conn);
?>