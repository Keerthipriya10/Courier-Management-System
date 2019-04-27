<?php
$db=mysqli_connect("localhost","root","","courier");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
if(isset($_POST["rid"]))
$cid=$_POST['rid'];
$sql_u="SELECT * FROM customer WHERE cid='$cid'";
$res_u=mysqli_query($db,$sql_u);
	if(mysqli_num_rows($res_u)>0){
		echo '<span class="text-danger"> <b>PLEASE CONTINUE TO REVIEW!!!</b> </div>';
		
	}
	else{
		echo '<span class="text-danger"> <b>PLEASE REGISTER TO REVIEW!!!</b> </div>';
}

?> 