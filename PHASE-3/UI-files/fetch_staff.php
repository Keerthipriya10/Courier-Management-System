<?php
$db=mysqli_connect("localhost","root","","courier");
if(!empty($_POST['cdel'])){
$cdel=$_POST['cdel'];
$sql="SELECT st_name,stpno FROM staff WHERE staff_id='$cdel'";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['st_name'];
$pno=$row['stpno'];
echo json_encode(array($name,$pno), JSON_FORCE_OBJECT);
}
?>