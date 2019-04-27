<?php
session_start();
$db=mysqli_connect("localhost","root","","courier");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
if(isset($_POST['empsubmit'])){
	if(!empty($_POST["bid"] && $_POST["bmpwd"] && $_POST["bcity"])){
	$username=$_POST['bid'];
	$password=$_POST['bmpwd'];
	$bcity=$_POST["bcity"];
		$sql="SELECT * FROM branch_mgr WHERE bid='$username' AND bmpwd='$password' AND bcity='$bcity' ";
		$result=mysqli_query($db,$sql);
			if(mysqli_num_rows($result)==1){
				$_SESSION["bid"]=$username;
				$_SESSION["bcity"]=$bcity;
				header('location:emp2.php');
				
			}

			else{
			echo "<script type='text/javascript'>alert('please check it again');</script>";
			header('location:emp.php');
			}
	}
	else{
		echo "<script type='text/javascript'>alert('please fill in the credential or register');</script>";
		header('location:emp.php');
	}

} 
?>