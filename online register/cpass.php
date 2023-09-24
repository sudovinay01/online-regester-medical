
<?php
	session_start();
	$id=$_REQUEST['id'];
	if(!isset($_SESSION["name"]) AND !isset($_SESSION["mname"]))
		header('location:index.php');
	$db=mysqli_connect('localhost','root','','1');
	if(isset($_SESSION["name"]))
	$namexx=$_SESSION["uname"];
    else
    $namexx=$_SESSION["muname"];
	$from=$_REQUEST['from'];
	#echo "$from";
	$sql="SELECT `password` FROM `members` WHERE `id`=$id";
	#echo "$sql";
	$result=mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result);

		if (isset($_POST['submit']))
		{
			if ($_POST['password']==$_POST['npassword']) {
				$err="Please choose different password  !!!";	
			}
			else
			{
			$password=$_POST['password'];
			if(!password_verify($password,$row['password']))
			{
				$err="Please re-check entered password didn't match !!!";	
			}
			else
			{ 
				if ($_POST['npassword']!=$_POST['rnpassword'])
				{
					$err="Please re-check entered new passwords didn't match !!!";	
				}
				else
				{
					$password=password_hash($_POST['npassword'], PASSWORD_DEFAULT);
					$sql="UPDATE `members` SET `password`='$password' WHERE `id`=$id";
					if (mysqli_query($db,$sql)) {
						#echo "Passowrd chan=ged";
						$_SESSION["message"]="User's password changed...";
						echo "Inserted $name ".$_POST['password']." ". $_POST['repassword']." ".$_POST['type']	;
						if ($from==2)
						header('location:members/index.php');
						else
						header('location:admin/admin.php');
					}
					else
						echo "$sql not Passowrd chan=ged";
				}
			}
			}
		 }

?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="w3.css">
</head>
<body class=" w3-light-grey">
	<header>
		<h1 class="w3-center">ONLINE REGISTER</h1>
	</header>
	    <nav class="w3-container w3-card-4  w3-white  w3-margin-bottom w3-padding">
				<a href="<?php if($from==1) echo 'admin/logout.php';if($from==2)  echo 'members/logout.php';?>" class="w3-red w3-right w3-padding w3-btn" style="text-decoration: none;">logout</a>
				<span class="w3-border w3-border-green w3-right w3-padding w3-margin-right">User name : <?php echo $namexx; ?></span>
		<a href="<?php if($from==1) echo 'admin/admin.php';if($from==2)  echo 'members/index.php';?>"  class="w3-blue w3-padding w3-btn" >Back</a>
  </nav>
	<div class="w3-container w3-card-4 w3-center w3-white  w3-margin-bottom w3-padding"><h2>Change password process	</h2></div>
		<?php
		 if(isset($err) AND $err!='')
		{
		echo'<div class="w3-container w3-text-red w3-card-4 w3-center w3-white  w3-margin-bottom w3-padding">';
		
		echo $err;
		echo'</div>';
		$err='';
	}
	?>
	<div class="w3-container w3-card-4  w3-white w3-padding">
		<form method="post" action="">
			<input type="password" name="password" required placeholder=" CURRENT PASSWORD" class="w3-input w3-border w3-border-green w3-hover-light-blue w3-round"/><br/>
			<input type="password" name="npassword" required placeholder=" ENTER NEW PASSWORD" class="w3-input w3-border w3-border-green w3-hover-light-blue w3-round"/><br/>
			<input type="password" name="rnpassword" required placeholder=" RE-ENTER NEW PASSWORD" class="w3-input w3-border w3-border-green w3-hover-light-blue w3-round"/><br/> 
			<input type="submit" name="submit" value="Submit" class="w3-btn w3-green"  required/>
		</form>
	</div>
</body>
</html>
