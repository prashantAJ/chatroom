<?php
	$name=$_POST['name'];
	include 'db_connect.php';

	
  if(mysqli_query($conn,"insert into room(roomname) values('".$name."')"))
  {
     echo"<script>
	 alert('Registration Successful!');
     window.location.href='index.php';
	</script>";
  }
  else
  {
  	echo"<script>
	 alert('Registration Failed. Try again!');
     window.location.href='index.php';
	</script>";		
  }

?>