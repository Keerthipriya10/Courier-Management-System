<?php
$db=mysqli_connect("localhost","root","","courier");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
if(isset($_POST['login_btn'])){
	if(!empty($_POST["admin_id"] && $_POST["apwd"])){
	$username=$_POST['admin_id'];
	$password=$_POST['apwd'];
		$sql="SELECT * FROM admin WHERE admin_id='$username' AND apwd='$password'";
		$result=mysqli_query($db,$sql);
		if(mysqli_num_rows($result)==1){
			header('location:adm2.html');
		}
		else{
		
		header('location:admin.html');
		echo "<script type='text/javascript'>alert('PLEASE ENTER CORRECT LOGIN CREDENTIALS');</script>";
		}
	}
	else{
		
		header('location:admin.html');
		echo "<script type='text/javascript'>alert('PLEASE ENTER CORRECT LOGIN CREDENTIALS');</script>";
	}

} 
?>