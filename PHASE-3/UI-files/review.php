<?php 
$con=mysqli_connect("localhost","root","","courier");
if (!$con) {
    die("Connection failed");
}
if(isset($_POST['review_btn'])){
$rid=$_POST['rid'];
$rname=$_POST['rname'];
$rpno=$_POST['rpno'];
$comments=$_POST['comments'];

$sql="INSERT INTO review(rid,rname,rpno,comments) VALUES('$rid','$rname','$rpno','$comments')";
mysqli_query($con,$sql);
echo "<script>
alert('review submitted successfully');
window.location.href='review.html';
</script>";
}
?>