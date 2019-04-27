<?php
$db=mysqli_connect("localhost","root","","courier");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
if(isset($_POST['staff_btn'])) {
	$staff_id=$_POST['staff_id'];
	$st_name=$_POST['st_name'];
	$stpno=$_POST['stpno'];
	$stadd=$_POST['stadd'];
	$stsalary=$_POST['stsalary'];
	$st_city=$_POST['st_city'];
	
		$sql="INSERT INTO staff(staff_id,st_name,stpno,stadd,stsalary,st_city,avail,no_of_del) values('$staff_id','$st_name','$stpno','$stadd','$stsalary','$st_city','true',0)";
if (mysqli_query($db, $sql)) { 
    echo "Inserted successfully"; 
    header("location:staffreg1.html");
} else { 
      header("location:staffreg.html");
}
} 
?>