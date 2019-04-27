<?php
$db=mysqli_connect("localhost","root","","courier");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
if(isset($_POST['register_btn'])) {
	$cid=$_POST['cid'];
	$cname=$_POST['cname'];
	$cpno=$_POST['cpno'];
	$email=$_POST['cmail'];
	$password=$_POST['cpwd'];
	$password2=$_POST['password2'];

		if($password==$password2){
			$sql="INSERT INTO customer(cid,cname,cpno,cmail,cpwd) values('$cid','$cname','$cpno','$email','$password')";
			mysqli_query($db,$sql);
			
			header("location:cust.php");


		}
		else {
			# code...
			$pwd_error="Sorry.... Passwords did not match";
			header('location:register.html');
		}
} 
?>