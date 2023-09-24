<?php
    session_start();
	if(!isset($_SESSION["name"]))
		header('location:admin_login.php');
	$name=$type=$uname=$uerror=$perror='';
	$db=mysqli_connect('localhost','root','','1');
	if (!$db)
		die('could not connect :'.mysqli_error());
	else
	{
		if (isset($_POST['submit']))
		{
			if ($_POST['password']!=$_POST['repassword'])
			{
				$perror ="Please re-check entered passwords didn't match !!!";	
			}
			else
			{
				$name=$_POST['uname'];
				$type=$_POST['type'];
				$uname=$_POST['name'];
				$aname=$_SESSION["name"];
				$sql="SELECT `name` FROM `members` where `name`='$name' AND `type`='$type'";
				$result=mysqli_query($db,$sql);
				$row = mysqli_fetch_array($result);
				if ($row!=0)
					$uerror="Username has been taken !!!";
				else
		    	{
					$password=password_hash($_POST['password'], PASSWORD_DEFAULT);
					$sql="INSERT INTO `members`(`name`, `password`,`type`,`uname`,`addedby`) VALUES ('$name','$password','$type','$uname','$aname')";
					if (mysqli_query($db,$sql))
					{	
						$_SESSION["message"]="$uname was added...";
						echo "Inserted $name ".$_POST['password']." ". $_POST['repassword']." ".$_POST['type']	;
						header('location:admin.php');
					}
					else
						echo "NOt Inserted";
		    	}
		    }
		}
		else
		{
			
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../w3.css">
</head>
<body class=" w3-light-grey">
	<header>
		<h1 class="w3-center">ONLINE REGISTER</h1>
	</header>
	<nav class="w3-container w3-card-4  w3-white  w3-margin-bottom w3-padding">
				<a href="logout.php" class="w3-red w3-right w3-padding w3-btn" style="text-decoration: none;">logout</a>
				<span class="w3-border w3-border-green w3-right w3-padding w3-margin-right">User name : <?php echo $_SESSION["uname"]; ?></span>
		<a href="admin.php"  class="w3-blue w3-padding w3-btn" >Back</a>

	</nav>
	<h2 class="w3-container w3-card-4 w3-center  w3-white  w3-margin-bottom w3-padding">Add Admin/Member</h2>
	<div class="w3-container w3-card-4  w3-white w3-padding">
		<form method="post" action="addadmin.php"> 
			<input type="text" name="uname"  placeholder="USERNAME" class="w3-input w3-border w3-border-green w3-hover-light-blue w3-round" <?php if($uname!='')echo"value='$uname'"?> required/><br/>
			<?php 
			if($uerror!='')
				echo '<p class="w3-text-red">$uerror</p><br/>';
			?>
			<input type="text" name="name"  placeholder="NAME" class="w3-input w3-border w3-border-green w3-hover-light-blue w3-round" <?php if($name!='')echo"value='$name'"?> required/><br/>
			<?php 
			if($perror!='')
				echo '<p class="w3-text-red">$perror</p><br/>';
			?>
			<input type="password" name="password" required placeholder=" ENTER PASSWORD" class="w3-input w3-border w3-border-green w3-hover-light-blue w3-round"/><br/>
			<input type="password" name="repassword" required placeholder="RE-ENTER PASSWORD" class="w3-input w3-border w3-border-green w3-hover-light-blue w3-round"/><br/>
			TYPE:
			<input type="radio" name="type" value="member" required class="w3-radio">Member
			<input type="radio" name="type" value="admin" class="w3-radio">Admin			<br/>
			<input type="submit" name="submit" value="Submit" class="w3-btn w3-green w3-margin-top"  required/>
		</form>
	</div>
</body>
</html>
