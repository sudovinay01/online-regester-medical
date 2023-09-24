<?php
	session_start();
	if(!isset($_SESSION["mname"]))
		header('location:../index.php');
	$db=mysqli_connect('localhost','root','','1');
	$id = $_REQUEST['id'];
	$sql = "SELECT * FROM `pat` where id='$id'";
	$result1 = mysqli_query($db, $sql);
	$row = mysqli_fetch_array($result1);
	$td=$row["datetime"];
	$pid=$row["id"];
	$dn=$row["dname"];
	$gender=$row["gender"];
	$age=$row["age"];
	$amo=$row["amo"];
	$amop=$row["amop"];
	$tes=$row['tests'];
	$aby=$row['addby'];
	$rby=$_SESSION["muname"];
	$pay=(int)$row["amo"]-(int)$row["amop"];
	if (isset($_POST['confirm']))
	{
			$pn=$row["pname"];
  	$reason=$_POST['reason'];
		$sql="INSERT INTO `cpat`(`id`, `datetime`, `pname`, `age`, `gender`, `dname`, `amo`, `amop`, `tests`, `addby`, `cby`, `reason`) VALUES ($id,'$td','$pn',$age,'$gender','$dn',$amo,'$amop','$tes','$aby','$rby','$reason')";
		if(mysqli_query($db ,$sql))
		{
			$sql="DELETE FROM `pat` WHERE id='$id'";
			if(mysqli_query($db ,$sql)){
				{$_SESSION["message"]="Patient $pn was removed ...";
				echo "sucess";
				}
			
			header('location:index.php');}
			else
				echo "failure";
		}
		else
		 echo "fail $sql"; 
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Records</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../w3.css">
</head>
<body class=" w3-light-grey">
	<header>
		<h1 class="w3-center">ONLINE REGISTER</h1>
	</header>
	<nav class="w3-container w3-card-4  w3-white  w3-margin-bottom w3-padding">
		<a href="index.php" class="w3-green w3-padding w3-btn" style="text-decoration: none;">Back</a>
		<a href="logout.php" class="w3-red w3-right w3-padding w3-btn" style="text-decoration: none;">logout</a>
		<span class="w3-border w3-border-green w3-right w3-padding w3-margin-right">User name : <?php echo $_SESSION["muname"]; ?></span>
	</nav>
	<div class="w3-container w3-card-4  w3-white  w3-margin-bottom w3-padding"><h2 class="w3-center">Test Cancellation Details</h2></div>
	<form id="pans" method="post" action="" class="w3-container w3-card-4  w3-white  w3-margin-bottom w3-padding">
		<?php	
		$sql = "SELECT * FROM `pat` where `id`=$id";
	    $result = mysqli_query($db, $sql);
		echo '<div class="w3-responsive w3-card-4 w3-round-xlarge w3-border">
      		  <table class="w3-table-all w3-border w3-border-green w3-topbar w3-bottombar w3-text-black w3-card-4 w3-hoverable">
      		   <tr class="w3-green">
               <th>Id</th>
               <th>date and time</th>
               <th>Name</th>
               <th>age</th>
               <th>gender</th>
               <th>Dr. Name</th>
               <th>Added By</th>
               <th>Total amount</th>
               <th>Amount paid</th>
               <th>Amount due</th>
               <th>Tests</th>
            </tr>';
            $rowx = mysqli_num_rows($result); 
            if ($rowx<1) {
            	header('location:index.php'); 
            }
        while($row = mysqli_fetch_array($result))
  		{

  			 echo '<tr><td>'.$row["id"].'</td>
  			 	   <td>'.$row["datetime"].'</td>
  			 	   <td>'.$row["pname"].'</td>
  			 	   <td>'.$row["age"].'</td>
  			 	   <td>'.$row["gender"].'</td>
  			 	   <td>'.$row["dname"].'</td>
  			 	   <td>'.$row["addby"].'</td>
  			 	   <td>'.$row["amo"].'</td>
  			 	   <td>'.$row["amop"].'</td>
  			 	   <td>'.$pay.'</td>
  			 	   <td colspan="2">
            			<ol>';
  $ne=unserialize($tes);
              $tno=count($ne);
              echo "<u>Test List : </u><br/>";
              for($i=0;$i<$tno;$i++)
              {
                $sq = "SELECT tnames FROM test where tid='$ne[$i]'";
                $ter = mysqli_query($db, $sq);
                $r = mysqli_fetch_array($ter);
                echo '<li>' .$r["tnames"].'</li>';
              }
              echo '
            </ol>
          </td>';
  			 	  echo'</tr>';

  		}
  		echo '</table></div>';

            ?>
		<div class="w3-container w3-card-4  w3-yellow  w3-margin-bottom w3-padding"><input type="text" name="reason" required placeholder="reason of cancellation.." class="w3-margin-top w3-input w3-border w3-border-green w3-hover-light-blue w3-round"/><br/>
		<input type="submit" name="confirm" value="confirm" class="w3-btn w3-red "/></div>
    	</form>

</body>
</html>