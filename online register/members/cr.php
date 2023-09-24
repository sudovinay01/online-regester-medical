<?php
	session_start();
	if(!isset($_SESSION["mname"]))
		header('location:../index.php');
	  date_default_timezone_set('Asia/kolkata');
	$db=mysqli_connect('localhost','root','','1');
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
		<a href="records.php" class="w3-green w3-padding w3-btn" style="text-decoration: none;">Back</a>
		<a href="logout.php" class="w3-red w3-right w3-padding w3-btn" style="text-decoration: none;">logout</a>
		<span class="w3-border w3-border-green w3-right w3-padding w3-margin-right">User name : <?php echo $_SESSION["muname"]; ?></span>	</nav>
	<div class="w3-container w3-card-4  w3-white  w3-margin-bottom w3-padding"><h2 class="w3-center">CANCELLED RECORDS</h2></div>

<?php
	     $do=0;
	
		 $sql = "SELECT * FROM `cpat`";
		   $result = mysqli_query($db, $sql);
echo '<div class="w3-responsive w3-card-4 w3-round-xlarge w3-border">
      <table class="w3-table-all w3-border w3-border-green w3-topbar w3-bottombar w3-text-black w3-card-4 w3-hoverable">';
  while($row = mysqli_fetch_array($result))
  {
    if ($do==0)
    {
       echo'
       <tr class="w3-green">
               <th></th>
               <th>Id</th>
               <th>Date&Time</th>
               <th>Patient Name</th>
               <th>Age</th>
               <th>Gender</th>
               <th>Doctor Name</th>
               <th>Total Amount</th>
               <th>Amount Paid</th>
               <th>Amount Due</th>
               <th>Test cancel on</th>
               <th>Test cancel by</th>
               <th>reason</th>
               <th>Tests</th>
            </tr>';
            $do=1;
    }
    $id=$row["id"];
    $pay=(int)$row["amo"]-(int)$row["amop"];
    echo '
        <tr>
          <td><a href="cancel.php?id='.$id.'" class="w3-tooltip">&times;<span class="w3-text w3-tag" style="position:absolute;left:0;bottom:18px;">Cancel testing</span></a></td>
          <td>'.$row["id"].'</td>
          <td>'.$row["datetime"].'</td>
          <td>'.$row["pname"].'</td>
          <td>' .$row["age"].'</td>
          <td>' .$row["gender"].'</td>
          <td>'.$row["dname"].'</td>
          <td>' .$row["amo"].'</td>
          <td>' .$row["amop"].'</td>
          <td style="padding:;">' .$pay.'</td>
          <td>' .$row["cdatetime"].'</td>
          <td>' .$row["cby"].'</td>
          <td>' .$row["reason"].'</td>
          <td>
            <ol>';
              $tes=$row['tests'];
              $ne=unserialize($tes);
              $tno=count($ne);
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
  echo "
      </table>
    </div>";


?>

</body>
</html>