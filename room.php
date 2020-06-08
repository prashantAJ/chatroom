<?php
	$roomname=$_GET['roomname'];
	$friend=$_GET['friendname'];

	include 'db_connect.php';

	$sql="select * from room where roomname='$roomname'";
	$result=mysqli_query($conn,$sql);
	if($result)
	{
		if(mysqli_num_rows($result)==0)
		{
			$msg="This room doesn't exist. Try creating a new one";
					echo '<script language="javascript">';
					echo 'alert("'.$msg.'");';
					echo 'window.location="http://localhost/chatroom";';
					echo ' </script>';
		}
	}
	else
	{
		echo "Error: ".mysqli_error($conn);
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;

}

.container {
  border: 2px solid #dedede;
  border-radius: 5px;
  padding: 10px;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}


.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
.anyClass
{
	height:350px;
	background-color: #43a2ab;
	overflow-y:scroll;

}
.navbar .dropdown-menu .form-control {
    width: 200px;
}
 button:focus {
    outline: 0;
}
</style>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<link href="css/product.css" rel="stylesheet">
</head>
<body style="background-color:#43a2ab">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" role="navigation" >
    <div class="container">
        <a class="navbar-brand" href="index.php">ChatRoom</a>
        <div>
            <ul class="nav navbar-nav" style="margin-right: -10px">
                <li class="nav-item" style="text-align:right"><a href="index.php" class="nav-link">Home</a></li>
            </ul>

        </div>
    </div>
</nav>

<h2 style="color:white;text-align:center;margin-top: 100px">Chats with <?php echo $friend;?></h2>
	<div class="anyClass">
	</div>


<!--
	<div class="container">
  	<img src="/w3images/bandmember.jpg" alt="Avatar" style="width:100%;">
    <p>Hello. How are you today?</p>
    <span class="time-right">11:00</span>
    </div>
	<div class="container darker">
	  <img src="/w3images/avatar_g2.jpg" alt="Avatar" class="right" style="width:100%;">
	  <p>Hey! I'm fine. Thanks for asking!</p>
	  <span class="time-left">11:01</span>
	</div>
-->
<input type="text" class="form-control" name="usermsg" id="usermsg" placeholder="Add message"><br>
<button class="btn btn-secondary" name="submitmsg" id="submitmsg">Send</button>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script type="text/javascript">
	setInterval(runFunction,1000);
	function runFunction()
	{
		$.post("htcont.php", {room:'<?php echo $roomname ?>', friend:'<?php echo $friend ?>'},
			function(data,status)
			{
				document.getElementsByClassName('anyClass')[0].innerHTML=data;

			})
	}

	var input = document.getElementById("usermsg");

	input.addEventListener("keyup", function(event) {
	  if (event.keyCode === 13) {
    document.getElementById("submitmsg").click();
	  }
	});

	$("#submitmsg").click(function(){
		var clientmsg=$("#usermsg").val();
  		$.post("postmsg.php", {text: clientmsg,room:'<?php echo $roomname ?>',ip:'<?php echo $_SERVER['REMOTE_ADDR'] ?>'},
  function(data,status){
  	document.getElementsByClassName('anyClass')[0].innerHTML=data;});
  		$("#usermsg").val("");
  return false;
});
</script>

</body>
</html>
