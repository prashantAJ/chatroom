<?php
$room=$_POST['room'];
$friend=$_POST['friend'];
include 'db_connect.php';

$sql="select room, msg, time, ip from msgs where room='$room' or room='$friend' order by time asc";
$res="";
$result=mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
	while($row=mysqli_fetch_assoc($result))
	{
		$chat=$row['room'];
		if($chat==$room)
		{
			$res=$res. '<div class="container" style="background-color:#3b403c;color:white">';
			//$res=$res. $chat;
			$res=$res. "You: <p align=right>".$row['msg'];
			$res=$res. '</p> <small><span class="time-right">'.$row["time"]. "</span></small></div>";
		}
		else
		{
			$res=$res. '<div class="container darker" style="background-color:grey;color:white">';
			$res=$res. $chat;
			$res=$res. ": <p>".$row['msg'];
			$res=$res. '</p align=left> <small><span class="time-right">'.$row["time"]. "</span></small></div>";
		}
		
		
	}
	echo $res;
}

?>