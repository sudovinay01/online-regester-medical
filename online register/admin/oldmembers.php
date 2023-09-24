<?php
	session_start();
	$uerror=$perror='';
	if(!isset($_SESSION["name"]))
	{
 	 header('location:admin_login.php');
	}
	$db=mysqli_connect('localhost','root','','1');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Old Members/Admin</title>
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
    <h2 class="w3-center w3-container w3-card-4  w3-white  w3-margin-bottom w3-padding">LIST OF REMOVED MEMBERS</h2>

<?php
	$sql="SELECT * FROM `oldmembers`";
	$result = mysqli_query($db, $sql);
	echo '<div class="w3-responsive w3-card-4 w3-round-xlarge w3-border">
      		  <table class="w3-table-all w3-border w3-border-green w3-topbar w3-bottombar w3-text-black w3-card-4 w3-hoverable">
      		   <tr class="w3-green">
               <th>Id</th>
               <th>Name</th>
               <th>Type</th>
               <th>Added By</th>
               <th>Added On</th>
               <th>Removed By</th>
               <th>Removed On</th>
               <th>Reason</th>
            </tr>';
    while($row = mysqli_fetch_array($result))
  	{
  	echo '<tr><td>'.$row["id"].'</td>
  			 	   <td>'.$row["uname"].'</td>
  			 	   <td>'.$row["type"].'</td>
  			 	   <td>'.$row["addedby"].'</td>
  			 	   <td>'.$row["addedon"].'</td>
  			 	   <td>'.$row["removedby"].'</td>
  			 	   <td>'.$row["removedon"].'</td>
  			 	   <td>'.$row["reason"].'</td>
  			 	   </tr>';
   	}
   	echo '</table></div>';
?>
</body>
</html>