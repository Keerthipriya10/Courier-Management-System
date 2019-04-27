<?php
$db=mysqli_connect("localhost","root","","courier");
if (isset($_POST['weight'])) {
$sour=$_POST['source'];
$dest=$_POST['dest'];
$weight=$_POST['weight'];
$sql="SELECT distance FROM branch WHERE source='$sour' AND destination='$dest'";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result);
$amt=$row['distance']*$weight;
echo $amt;
}
?>