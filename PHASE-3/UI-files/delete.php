<?php
$con=mysqli_connect("localhost","root","","courier");
if (!$con) {
    die("Connection failed");
}
  $id = $_POST['idd'];
  $query = mysqli_query($con,"DELETE FROM deliver WHERE consdel='$id'");
  
 ?> 