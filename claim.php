<?php 
	
	$room=$_POST['room'];
	$friend=$_POST['friend'];

		//Connect to DB
		include 'db_connect.php';
		
		//Query 
		$sql="select * from room where roomname='$room'";
		
		//Access results 
		$result=mysqli_query($conn, $sql);
		if($result)
		{
			if(mysqli_num_rows($result)==0)
			{
				$msg="Please register your name to chat with your friends";
				echo '<script language="javascript">';
				echo 'alert("'.$msg.'");';
				echo 'window.location="http://localhost/chatroom";';
				echo '</script>';
			}
			else
			{
				$sql="select * from room where roomname='$friend'";
		
				//Access results 
				$result=mysqli_query($conn, $sql);
				if($result)
				{
					if(mysqli_num_rows($result)>0)
					{

						$msg="Your room is ready and you can chat now!";
							echo '<script language="javascript">';
							echo 'alert("'.$msg.'");';
							echo 'window.location="http://localhost/chatroom/room.php?roomname=' .$room.'&friendname='.$friend.'"';
							echo '</script>';
					}
				}
				else
				{
					echo "Error: ".mysqli_error($conn);
				}
			}
		}
		else
		{
			echo "Error: ".mysqli_error($conn);
		}
	
?>