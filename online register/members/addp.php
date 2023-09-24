<?php
	session_start();
	if(!isset($_SESSION["mname"]))
		header('location:../index.php');
	$db=mysqli_connect('localhost','root','','1');
	if (isset($_POST['psubmit']))
  {
  	$tes='';
  	$pname=$_POST['pname'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $dname=$_POST['dname']; 
    $amo=$_POST['amo'];
    $amop=$_POST['amop'];
    $addby=$_SESSION["muname"];
    $tes=serialize($_POST['tarr']);
      $sql="INSERT INTO `pat`(`pname`, `age`, `gender`, `dname`, `amo`, `amop`, `tests`,`addby`)VALUES ('$pname',$age,'$gender','$dname',$amo,$amop,'$tes','$addby')";
    if(mysqli_query($db,$sql))
    {
     $_SESSION["message"]="Patient $pname was added...";
      header('location: index.php');
    } 
  }

?>
<!DOCTYPE html>
<html>
<head>
	<title>New Patient</title>

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
	<div class="w3-container w3-card-4  w3-white  w3-margin-bottom w3-padding"><h2 class="w3-center">New Patient</h2></div>
	<form id="newpatient" method="POST" action="" class="w3-card-4 w3-light-grey w3-animate-top w3-padding-large w3-margin-bottom" >
        <table class="w3-table-all w3-text-black w3-hoverable">
        	<tr>
        		<td width="25%"><label class="w3-left-align ">Patient Name</label></td>
                <td colspan="3"><input type="text" name="pname" class="w3-input w3-border w3-border-green w3-hover-light-blue w3-round" required="required" width="75%" autocomplete="off"/></td>
            </tr>
            <tr>
            	<td><label class="w3-left-align">Age</label></td>
                <td colspan="3"><input type="number" name="age" class="w3-input w3-border w3-border-green w3-hover-light-blue w3-round" required="required" autocomplete="off"/></td>
            </tr>
            <tr>
            	<td><label class="w3-left-align">Gender</label></td>
                  <td colspan="3">
                  	<span class="w3-hover-light-blue w3-padding"><input type="radio" name="gender" class="w3-radio " value="male" required="required"/>
                  		<label class="w3-text-blue w3-left-align">Male</label>
                  	</span>
                    <span class="w3-hover-light-blue w3-padding"><input type="radio" name="gender" class="w3-radio " value="female" required="required"/>
                       <label class="w3-text-blue w3-left-align">Female</label>
                    </span>
                </td>
            </tr>
            <tr>
            	<td><label class="w3-left-align">Doctor Name </label></td>
                <td colspan="3"><input type="text" name="dname" class="w3-input w3-border w3-border-green w3-hover-light-blue w3-round" required="required" autocomplete="off"/></td>
            </tr>
            <tr class="w3-blue">
            	<td colspan="4"><h5>Available test:</h5></td>
            </tr>  
            <?php
            $count=0;
            	$sql="SELECT * FROM `test`";
            	$result=mysqli_query($db,$sql);
            	while($trow = mysqli_fetch_array($result))
  { 
    if ($count==4)
    {
      echo "<tr>";
    }
    switch ($trow['tid']) {
    	case 1:
    			echo "<td colspan='4' class='w3-green'><u>HEMATOLOGY</u></td></tr><tr>";	
    			$count=0;
    		break;
    	case 10:
    			echo "<tr><td colspan='4' class='w3-green'><u>CLINICAL PATHOLOGY</u></td></tr><tr>";	
    			$count=0;
    			break;
    	
        case 16:
        		echo "<tr><td colspan='4'class='w3-green'><u>CULTURE/SENETIVITY</u></td></tr><tr>
        			  <td colspan='4'class='w3-green'><u>HISTOPATHOLOGY & CYTOLOGY</u></td></tr><tr>
        			  <td colspan='4'class='w3-green'><u>HORMONES</u></td></tr><tr>
        			  <td colspan='4'class='w3-green'><u>BIO CHEMISTRY</u></td></tr><tr>
        			  ";
    	        $count=0;
    	        break;
    	case 29:
    			 echo "<tr><td colspan='4'class='w3-green'><u>MICRO BIOLOGY & SEROLOGY</u></td></tr><tr>";
    	        $count=0;
    		    break;

    }
    echo "<td width='25%'> <input type='checkbox' name='tarr[]' class='w3-check' value='".$trow['tid']."'/> ".$trow['tid'].")".$trow['tnames']."</td>";
    $count++;
    if ($trow['tid']==9  OR $trow['tid']==28) {
    	echo "<td colspan='3'></td>";
    }
    if ($trow['tid']==15) {
    	echo "<td colspan='2'></td>";
    }
   	
    if($count==4)
    {
      echo "</tr>";
      $count=0;
    }

  }      
            ?>
            <tr>
             	<td><label class="w3-left-align">Total  Amount</label></td>
                <td colspan="3"><input type="number" name="amo" class="w3-input w3-border w3-border-green w3-hover-light-blue w3-round" required="required" autocomplete="off"/></td>
            </tr>
            <tr>
            	<td><label class="w3-left-align">Amount Paid</label></td>
                <td colspan="3"> <input type="number" name="amop"class="w3-input w3-border w3-border-green w3-hover-light-blue w3-round" required="required" autocomplete="off"/></td>
            </tr>
            <tr>
            	<td colspan="4" class="w3-center"><input type="submit" value="submit" class="w3-btn w3-blue w3-margin-top" name="psubmit" /></td>
            </tr>
 		</table>
        </form>
</body>
</html>