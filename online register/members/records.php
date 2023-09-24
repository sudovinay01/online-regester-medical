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
		<a href="index.php" class="fullx w3-green w3-padding w3-btn" style="text-decoration: none;">Back</a>
		<a href="cr.php" class="fullx w3-yellow w3-padding w3-btn" style="text-decoration: none;">Cancelled Records</a>
		<a href="logout.php" class="fullx w3-red w3-right w3-padding w3-btn" style="text-decoration: none;">logout</a>
		<span class="fullx w3-border w3-border-green w3-right w3-padding">User name : <?php echo $_SESSION["muname"]; ?></span>
	</nav>
	<div class="w3-container w3-card-4  w3-white  w3-margin-bottom w3-padding"><h2 class="w3-center">RECORDS</h2></div>
	<form method="post" action="" class="w3-card-4 w3-white  w3-container w3-padding-large w3-margin w3-center">
		<lable class=" w3-left-align">Select a date : </lable>
			<input type="date" name="date"required class="w3-input w3-border w3-border-green w3-hover-light-blue " />
    	<input type="submit" name="submit" value="submit" class="w3-btn w3-blue w3-margin-top">
   	</form>
	<table class="w3-responsive w3-table-all w3-border w3-border-green w3-topbar w3-bottombar w3-text-black w3-card-4 w3-hoverable">
	<?php
		if (isset($_POST['submit']))
    	{	
    		$dates=$_POST['date'];
    		$datesx=strtotime($dates);
    		    		$quee="SELECT schema_name from information_schema.schemata where schema_name=1";
    		$dataa=mysqli_query($db,$quee);
    		$datest=date("d-m-Y",strtotime($dates));
        	echo '<h1 class="w3-card-4 w3-white w3-center w3-wide w3-container w3-padding-large w3-margin">'.$datest.'</h1>';
    		if (mysqli_num_rows($dataa)==0)
      		{
      			#echo "$quee";
      			echo '<h1 class=" w3-wide w3-card-4 w3-margin w3-yellow w3-padding-large">There is no data of patients on this day!!!!!</h1>';
      		}
      		else
      		{	
      			if($dates > date("Y-m-d"))
      			{	
      			        		echo '<h1 class="w3-jumbo w3-wide w3-card-4 w3-margin w3-yellow w3-padding-large">This is not a time machine!!!!!</h1>';
      			}
      			else
      			{
        			#echo "<br/>$dates<br/>$year<br/>";
        			$do=0;
        			if (!$db)
        			{
         				echo " not connected to data base";
        			}
        			else
        			{
         				#   echo " connected to data base";
     		        	$sql = "SELECT * FROM pat where date(datetime)='$dates'";
        				$result1 = mysqli_query($db, $sql);
        				if (!$result1 OR mysqli_num_rows($result1)==0)
       					{
          					 echo '<h1 class=" w3-wide w3-card-4 w3-margin w3-yellow w3-padding-large">There is no data of patients on this day!!!!!</h1>';
       					}
        				else
        				{
     						while($row = mysqli_fetch_array($result1))
     						{
     							if ($row>0&&$do==0)
     							{
      								echo ' <tr class="w3-green">
           					               		<th>S.No.</th>
              							   		<th>Time</th>
               									<th>Patient Name</th>
              									<th>Age</th>
               									<th>Gender</th>
               									<th>Doctor Name</th>
               									<th>Total Amount</th>
               									<th>Amount Paid</th>
               									<th>Amount Due</th>
               									<th>Tests</th>
            							   </tr>';
            						$do=1;
     							}
      							$id=$row["datetime"];
     							$pay=(int)$row["amo"]-(int)$row["amop"];
     							echo ' <td>'.$row["id"].'</td>
        							   <td>'.date("h:i A",strtotime($row["datetime"])).'</td>
        							   <td>'.$row["pname"].'</td>
       								   <td>' .$row["age"].'</td>
        							   <td>' .$row["gender"].'</td>
        							   <td>'.$row["dname"].'</td>
        							   <td>' .$row["amo"].'</td>
        							   <td>' .$row["amop"].'</td>
        							   <td>' .$pay.'</td>
        							   <td><ol>';
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
 								echo '</ol> </td>';
       							echo'</tr>';
							}
							$sum = "SELECT sum(`amo`),sum(`amop`) FROM `pat` where date(datetime)='$dates'";
  							$sumr=mysqli_query($db, $sum);
    						$sumto = mysqli_fetch_array($sumr);
    						$rem=(int)$sumto["sum(`amo`)"]-(int)$sumto["sum(`amop`)"];
    						echo "<tr class='w3-light-green'><td colspan='6'></td><td >Total Amount : ".$sumto["sum(`amo`)"]."</td><td>Amount Paid : ".$sumto["sum(`amop`)"]."</td><td>Amount Due :".$rem."</td><td></td></tr>";
 						}
 					}
  				}  
			}
		}
	?>
        </table>

</body>
</html>