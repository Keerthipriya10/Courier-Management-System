<?php
$db=mysqli_connect("localhost","root","","courier");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
if(isset($_POST['cno'])){
  $cno=$_POST['cno'];
    $sql="SELECT * FROM updatecourier WHERE consgid='$cno'";
    $result=mysqli_query($db,$sql);
   while($row=mysqli_fetch_array($result)){
      $data["name"]=$row['courid'];
      $data["consgid"]=$row['consgid'];
      $data["curr"]=$row['currloc'];
      $data["sta"]=$row['status'];
      $data["del"]=$row['deldate'];
      $data["dname"]=$row['cdname'];
      $data["dpno"]=$row['cdpno'];

    }
echo json_encode($data);

}
?>