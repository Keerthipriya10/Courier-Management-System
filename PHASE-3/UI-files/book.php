<?php
$db=mysqli_connect("localhost","root","","courier");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
if(isset($_POST['booking_btn'])) {
	$cid=$_POST['custid'];
	$consid=$_POST['consid'];
	$sender=$_POST['csender'];
	$spno=$_POST['cspno'];
	$saddress=mysqli_real_escape_string($db,$_POST['csaddress']);
	$source=$_POST['src'];
	$receiver=$_POST['creceiver'];
	$rpno=$_POST['crpno'];
	$raddress=mysqli_real_escape_string($db,$_POST['craddress']);
	$dest=$_POST['dst'];
	$weight=$_POST['weight'];
	$amount=$_POST['amt'];
	$rawdate = htmlentities($_POST['bdate']);
	$date = date('Y-m-d', strtotime($rawdate));
		$sql="INSERT INTO booking(custid,consid,csender,cspno,csaddress,csource,creceiver,crpno,craddress,cdest,cweight,camount,
cdob) values('$cid','$consid','$sender',$spno,'$saddress','$source','$receiver',$rpno,'$raddress','$dest',$weight,$amount,'$date')";
		if (mysqli_query($db, $sql)) { 
    echo "Inserted successfully"; 
    header("location:booking1.html");
} else { 
    echo "Error creating table: " . mysqli_error($db); 
}		
} 
?>