<?php
$db=mysqli_connect("localhost","root","","courier");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
if(isset($_POST['search'])){
  $db=mysqli_connect("localhost","root","","courier");
  $cno=$_POST['cno'];
    $sql="SELECT * FROM updatecourier WHERE consgid='$cno'";
    $result=mysqli_query($db,$sql) or die("Bad query:");
    $row=mysqli_fetch_assoc($result);
    $custid=$row['courid'];
    $consid=$row['consgid'];
    $cur=$row['currloc'];
    $status=$row['status'];
    $deldate=$row['deldate'];
    $cdel=$row['cdel'];
    $cdname=$row['cdname'];
    $cdpno=$row['cdpno'];
    if(empty($cdel) && empty($cdname) && empty($cdpno)){ 
      
      echo "<tr><td><b>CUSTOMER ID:</b> ".$custid."</td><br><hr><td><b>CONSIGNMENT NO:</b>  ".$consid."</td><br><hr><td><b>CURRENT LOCATION:</b>  ".$cur."</td><br><hr><td><b>STATUS: </b> ".$status."</td><br><hr><td><b>DELIVERY DATE:</b> ".$deldate."</td><br></tr>";

  }
  else{ 
    echo "<tr><td><b>CUSTOMER ID:</b>  ".$custid."</td><br><hr><td><b>CONSIGNMENT NO:</b>  ".$consid."</td><br><hr><td><b>CURRENT LOCATION:</b>  ".$cur."</td><br><hr><td><b>STATUS:</b>  ".$status."</td><br><hr><td><b>DELIVERY DATE:</b>".$deldate."</td><br><hr><td><b>DELIVERED BY:</b>  ".$cdname."</td><br><hr><td><b>DELIVERED BOY PHONE:</b>   ".$cdpno."</td></tr>";

  }

}
?>