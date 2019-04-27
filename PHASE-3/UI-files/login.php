<?php
session_start();
$db=mysqli_connect("localhost","root","","courier");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
if(isset($_POST['login_btn'])){
	if(!empty($_POST["cid"] && $_POST["cpwd"])){
	$username=$_POST['cid'];
	$password=$_POST['cpwd'];
		$sql="SELECT * FROM customer WHERE cid='$username' AND cpwd='$password'";
		$result=mysqli_query($db,$sql);
			if(mysqli_num_rows($result)==1){
				$_SESSION["cid"]=$username;
				header('location:cust2.php');
				
			}

			else{
			echo "<script type='text/javascript'>alert('you are not logged in');</script>";
			header('location:register.html');
			}
	}
	else{
		echo "<script type='text/javascript'>alert('please fill in the credential or register');</script>";
		header('location:register.html');
	}

} 
?>