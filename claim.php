<?php 
	//Get value of room
	$room=$_POST['room'];
	//Checking for alphanumeric room name
	if(!ctype_alnum($room))
	{
		$msg="Please choose an alphanumeric room name";
		echo '<script language="javascript">';
		echo 'alert("'.$msg.'");';
		echo 'window.location="http://localhost/chatroom";';
		echo '</script>';
	}
	else
	{
		//Connect to DB
		include 'db_connect.php';
		$sql="select * from room where roomname='$room'";
		$result=mysqli_query($conn, $sql);
		if($result)
		{
			if(mysqli_num_rows($result)>0)
			{
				$msg="Please choose different room. This room is already claimed.";
				echo '<script language="javascript">';
				echo 'alert("'.$msg.'");';
				echo 'window.location="http://localhost/chatroom";';
				echo '</script>';
			}
			else
			{
				$sql="insert into room (roomname) values ('$room') ";
				$msg="Your room is ready and you can chat now!";
				echo '<script language="javascript">';
				echo 'alert("'.$msg.'");';
				echo 'window.location="http://localhost/chatroom/room.php?roomname=' .$room. '";';
				echo '</script>';
			}
		}
		else
		{
			echo "Error: ".mysqli_error($conn);
		}
	}
	
?>