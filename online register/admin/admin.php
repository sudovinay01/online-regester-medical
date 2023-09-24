
<?php
	session_start();
	if(!isset($_SESSION["name"]))
		header('location:admin_login.php');

?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../w3.css">
<style type="text/css">
	@media (max-width: 754px) {
.fullx{
	width: 100%;
	 border: 1px solid green;
}
</style>
</head>
<body class=" w3-light-grey">
	<header>
		<h1 class="w3-center">ONLINE REGISTER</h1>
	</header>
	<nav class="w3-container w3-card-4  w3-white  w3-margin-bottom w3-padding">

		<a href="addadmin.php" class="fullx w3-blue w3-padding w3-btn" style="text-decoration: none;">add admin/member</a>
		<a href="oldmembers.php" class="fullx w3-blue w3-padding w3-btn" style="text-decoration: none;">List removed members/admin</a>

		<a href="logout.php" class="fullx w3-red w3-right w3-padding w3-btn" style="text-decoration: none;">logout</a>
				<span class="fullx w3-border w3-border-red w3-right w3-padding">User name : <?php echo $_SESSION["uname"]; ?></span>
			<?php	 echo'<a href="../cpass.php?id='.$_SESSION["id"].'&from=1" class="fullx w3-yellow w3-padding w3-btn" style="text-decoration: none;">Change password</a>';?>
	</nav>
	<div class="w3-container w3-card-4 w3-center w3-white  w3-margin-bottom w3-padding"><h2>LIST OF MEMBERS AND ADMINS</h2></div>
	<?php
		if (isset($_SESSION["message"]) AND $_SESSION["message"]!='')
		{
	    echo '<div class="w3-container w3-card-4 w3-center w3-white  w3-margin-bottom w3-padding">'.$_SESSION["message"].'</div>';
	    
	    }
	    $_SESSION["message"]='';
		$db=mysqli_connect('localhost','root','','1');
		$sql="SELECT * FROM `members`";
		$name=$_SESSION["name"];
		$uname=$_SESSION["uname"];
		$result = mysqli_query($db, $sql);
		echo '<div class="w3-responsive w3-card-4 w3-round-xlarge w3-border">
      		  <table class="w3-table-all w3-border w3-border-green w3-topbar w3-bottombar w3-text-black w3-card-4 w3-hoverable">
      		   <tr class="w3-green">
               <th>Id</th>
               <th>Name</th>
               <th>Type</th>
               <th>Added By</th>
               <th>Added On</th>
               <th>Remove</th>
            </tr>';
        while($row = mysqli_fetch_array($result))
  		{
  			 echo '<tr><td>'.$row["id"].'</td>
  			 	   <td>'.$row["uname"].'</td>
  			 	   <td>'.$row["type"].'</td>
  			 	   <td>'.$row["addedby"].'</td>
  			 	   <td>'.$row["addedon"].'</td>
  			 	   <td><a href="remove.php?id='.$row["id"].'" class="w3-tooltip"style="color:red;">Remove<span class="w3-text w3-tag" style="position:absolute;left:0;bottom:18px;">Remove member/admin</span></a></td>
  			 	   </tr>';

  		}
  		echo '</table></div>';
	?>

</body>
</html>