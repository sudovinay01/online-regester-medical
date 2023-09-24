<?php
	session_start();
	$error='';
	if(isset($_SESSION["name"]))
	{
 	 header('location:admin.php');
	}
	$db=mysqli_connect('localhost','root','','1');
	if (!$db)
		die('could not connect :'.mysqli_error());
	else
	{
		if (isset($_POST['submit']))
		{
			$name=$_POST['name'];
			$password=$_POST['password'];
			$sql="SELECT * FROM `members` where `name`='$name' AND `type`='admin'";
			$result=mysqli_query($db,$sql);
			$row = mysqli_fetch_array($result);
			if ($row>0)
			{
			
			
			if(password_verify($password, $row["password"]))
			{
				$_SESSION["name"]=$row["name"];	
				$_SESSION["uname"]=$row["uname"];
				$_SESSION["id"]=$row["id"];
				header('location:admin.php');
			}
			else
				$error='Invalied combination of username and password !!!';
			}
			else
				$error='Invalied combination of username and password !!!';


		}
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../w3.css">
</head>
<body class=" w3-light-grey">
	<header>
		<h1 class="w3-center">ONLINE REGISTER</h1>
	</header>
	<nav class="w3-container w3-card-4  w3-white  w3-margin-bottom w3-padding">
		<a href="../index.php" class="w3-blue w3-padding w3-btn">Member Login</a>
	</nav>
	<div class="w3-container w3-card-4  w3-white w3-padding">
		<form method="post" action=""> 
			<h2>Admin Login</h2>
			<span class="w3-text-red"><?php 
			if($error!='')
				echo $error;
			?></span><br/>
			<input type="text" name="name" required placeholder="USERNAME" class="w3-input w3-border w3-border-green w3-hover-light-blue w3-round"/><br/>
			<input type="password" name="password" required placeholder="PASSWORD" class="w3-input w3-border w3-border-green w3-hover-light-blue w3-round"/><br/>
			<input type="submit" name="submit" value="Login" class="w3-btn w3-green w3-margin-top">
		</form>
	</div>
</body>
</html>