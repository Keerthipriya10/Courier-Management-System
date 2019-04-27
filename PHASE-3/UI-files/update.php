<?php
session_start();
$db=mysqli_connect("localhost","root","","courier");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
if(isset($_POST['update_btn'])){
		$courid=$_POST['courid'];
		$consgid=$_POST['consgid'];
		$cosource=$_POST['cosource'];
		$codest=$_POST['codest'];
		$currloc=$_POST['currloc'];
		$status=$_POST['status'];
		$rawdate = htmlentities($_POST['deldate']);
		$deldate = date('Y-m-d', strtotime($rawdate));
		$cdel=$_POST['cdel'];
		$cdname=$_POST['cdname'];
		$cdpno=$_POST['cdpno'];
		
		$sqldel="SELECT * FROM deliver WHERE delid='$courid' AND consdel='$consgid'";
		$resulta=mysqli_query($db,$sqldel);
		$rowa=mysqli_num_rows($resulta);
		
		if($rowa==0){
			$sql="SELECT * FROM updatecourier WHERE courid='$courid' AND consgid='$consgid'";
			$result=mysqli_query($db,$sql);
			$row = mysqli_num_rows($result);
			if($row==1){
				if(empty($_POST['cdel'] && $_POST['cdname'] && $_POST['cdpno'])){
						$sqla="UPDATE updatecourier SET status='$status',currloc='$currloc',deldate='$deldate' WHERE courid='$courid' AND consgid='$consgid' ";
						mysqli_query($db,$sqla);
						header("location:updates.html");
				}
				else{
					$sqlb="UPDATE updatecourier SET status='$status',currloc='$currloc',deldate='$deldate',cdel='$cdel',cdname='$cdname',cdpno='$cdpno'
					 WHERE courid='$courid' AND consgid='$consgid';UPDATE staff SET avail='false', no_of_del= no_of_del+1 WHERE staff_id='$cdel';
					INSERT INTO deliver(delid,consdel,deldate,stdel,action) VALUES('$courid','$consgid','$deldate','$cdel','$status')";
					mysqli_multi_query($db,$sqlb);
					header("location:updates.html");

				}

			}
			else{
				if(empty($_POST['cdel'] && $_POST['cdname'] && $_POST['cdpno'])){
					$sqlc="INSERT INTO updatecourier(courid,consgid,cosource,codest,currloc,status,deldate) VALUES('$courid','$consgid','$cosource','$codest','$currloc','$status','$deldate')";
					mysqli_query($db,$sqlc);
					header("location:updates.html");
				


				}
				else{
					$sqld="INSERT INTO updatecourier(courid,consgid,cosource,codest,currloc,status,deldate,cdel,cdname,cdpno) 
					VALUES('$courid','$consgid','$cosource','$codest','$currloc','$status','$deldate','$cdel','$cdname','$cdpno');
					UPDATE staff SET avail='false', no_of_del= no_of_del+1 WHERE staff_id='$cdel';INSERT INTO deliver(delid,consdel,deldate,stdel,action) VALUES('$courid','$consgid','$deldate','$cdel','$status')";
					mysqli_multi_query($db,$sqld);
					header("location:updates.html");

				}
				

			}
		}
		else{
			header("location:updateun.html");
		}


}
else{
	echo 'unsucessfull';
}
?>

