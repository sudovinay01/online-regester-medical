<?php
    session_start();
	if(!isset($_SESSION["name"]))
		header('location:admin_login.php');

	$db=mysqli_connect('localhost','root','','1');
	$id = $_REQUEST['id'];
	$sql = "SELECT * FROM `members` where `id`=$id";
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_array($result);
	//print_r($row);
	$removedby=$_SESSION["uname"];
	$name=$row["name"];
	$uname=$row["uname"];
	$password=$row["password"];
	$type=$row["type"];
	$addedby=$row["addedby"];
	$addedon=$row["addedon"];
	if (isset($_POST['remove']))
	{
		$reason=$_POST['reason'];
		$sql="INSERT INTO `oldmembers`(`name`, `password`, `type`, `uname`, `addedby`, `removedby`, `addedon`, `reason`) VALUES ('$name','$password','$type','$uname','$addedby','$removedby','$addedon','$reason')";
		if (mysqli_query($db, $sql)) 
		{
			echo "sucess";
			$sql="DELETE FROM `members` WHERE `id`=$id"; 
			if (mysqli_query($db, $sql)) 
			{
				echo "delete";
				header('location:admin.php');
				$_SESSION["message"]="$uname was Removed...";
			}
			else
			{
				echo "not deleted";
			}

		}
		else
		{
			echo "npot sucess";
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Remove</title>
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
	<div class="w3-container w3-card-4  w3-white  w3-margin-bottom w3-padding">
		<h2 class="w3-center">REMOVAL PROCESS</h2>
	</div>
	<form method="post" action=""  class="w3-container w3-card-4  w3-white  w3-margin-bottom w3-padding">
		<h3>DETAILS </h3>
	<?php	
		$sql = "SELECT * FROM `members` where `id`=$id";
	$result = mysqli_query($db, $sql);
		echo '<div class="w3-responsive w3-card-4 w3-round-xlarge w3-border">
      		  <table class="w3-table-all w3-border w3-border-green w3-topbar w3-bottombar w3-text-black w3-card-4 w3-hoverable">
      		   <tr class="w3-green">
               <th>Id</th>
               <th>Name</th>
               <th>Type</th>
               <th>Added By</th>
               <th>Added On</th>
            </tr>';
        while($row = mysqli_fetch_array($result))
  		{
  			 echo '<tr><td>'.$row["id"].'</td>
  			 	   <td>'.$row["uname"].'</td>
  			 	   <td>'.$row["type"].'</td>
  			 	   <td>'.$row["addedby"].'</td>
  			 	   <td>'.$row["addedon"].'</td>
  			 	   </tr>';

  		}
  		echo '</table></div>';

            ?>
            <div class="w3-container w3-card-4  w3-red  w3-margin-bottom w3-padding">
		Reason:
		<input type="text" name="reason"required class="w3-input w3-border w3-border-green w3-hover-light-blue w3-round"/>
		<input type="submit" name="remove" class="w3-yellow w3-padding w3-btn w3-margin-top" value="Remove" />
		</div>
	</form>
</body>
</html>
