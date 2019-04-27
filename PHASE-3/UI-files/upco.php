<?php
session_start();
$session_value=$_SESSION["bcity"];
function load_staff(){
$db=mysqli_connect("localhost","root","","courier");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$sql="SELECT staff_id FROM staff WHERE st_city= '{$_SESSION["bcity"]}' AND avail='true'";
$result=mysqli_query($db,$sql) or die("Bad query:");
  while ($row=mysqli_fetch_array($result)) {
    $output .='<option value="'.$row["staff_id"].'">'.$row["staff_id"].'</option>';
  }
  return $output;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>update courier</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 600px;}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding:20px 20px 30px 30px;
      background-color: #ffff00;
      color: #000000;
      font-family: Impact, Charcoal, sans-serif,monospace;
      height: 100%;
      font-weight: italic;
    }
    
    /* Set black background color, white text and some padding */
    .footer {
      position:fixed;
      left:0;
      bottom: 0;
      width:100%;
      background-color: #000000;
      color: white;
      padding: 15px;
      margin-bottom:0px;
      text-align: center;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
  <script type="text/javascript">
    function yesnoCheck(that) {
    if (that.value == "DELIVERED") {
        document.getElementById("ifYes").style.display = "block";
        //var city='<?php  $session_value;?>';
        //$(document).ready(function(){
            $('#cdel').change(function(){
              var cdel=$(this).val();        
              $.ajax({
                method:"post",
                url:"fetch_staff.php",
                data:{cdel:cdel},
                success:function(data){
                  var result =JSON.parse(data);
                  $("#cdname").val(result[0]);
                  $("#cdpno").val(result[1]);
                }
              }); 
            });
    //});
    } 
    else
     {
        document.getElementById("ifYes").style.display = "none";
      }
}

  </script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" style="color:#00ff00;font-family: Arial, Helvetica, sans-serif; font-weight: 900;">FAST COURIER</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logoute.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="codete.php">VIEW COURIER DETAILS</a></p>
      <p><a href="upco.php">UPDATE COURIER DETAILS</a></p>
      <p><a href="delco.php">DELETE DELIVERED COURIERS</a></p>
    </div>
    <div class="col-sm-8 text-center"> 
        <h2 style="color:blue;text-decoration: underline;">Update Courier Details</h2>
<div class="container well well-lg text-left" style="margin: 50px 400px 150px 100px;width:500px;">
  <form action="update.php" method="post" width="50%">
    <div class="form-group">
      <label for="courid">CUSTOMER-ID:</label>
      <input type="text" class="form-control" id="courid" placeholder="Enter Consignment No" name="courid">
    </div>
    <div class="form-group">
      <label for="consgid">CONSIGNMENT NO:</label>
      <input type="text" class="form-control" id="consgid" placeholder="Enter Consignment No" name="consgid">
    </div>
    <div class="form-group">
      <label for="cosource">SOURCE</label>
      <select class="form-control" id="cosource" name="cosource">
        <option>BANGALORE</option>
        <option>CHENNAI</option>
        <option>BOMBAY</option>
        <option>KOLKATA</option>
        <option>HYDERABAD</option>
        <option>THIRUVANANTHAPURAM</option>
      </select>
    </div>
 <div class="form-group">
      <label for="codest">SOURCE</label>
      <select class="form-control" id="codest" name="codest">
        <option>BANGALORE</option>
        <option>CHENNAI</option>
        <option>BOMBAY</option>
        <option>KOLKATA</option>
        <option>HYDERABAD</option>
        <option>THIRUVANANTHAPURAM</option>
      </select>
    </div>
        <div class="form-group">
      <label for="currloc">CURRENT LOCATION:</label>
      <input type="text" class="form-control" id="currloc" placeholder="Enter Current Location" name="currloc"> 
    </div>
     <div class="form-group">
      <label for="status">STATUS</label>
      <select class="form-control" id="status" name="status" onchange="yesnoCheck(this);" >
        <option>SELECT</option>
        <option>AWAITING PICKUP</option>
        <option>SHIPPED</option>
        <option>REACHED OFFICE</option>
        <option>ON THE WAY</option>
        <option>DELIVERED</option>
      
      </select>
    </div>
    <div>
    <div class="form-group" id="ifYes" style="display:none;">
      <div><label for="cdel">DELIVERED BY:</label><div>
      
          <select class="form-control" name="cdel" id="cdel">
            <option value="">SELECT</option>
            <?php echo load_staff();?>
          </select>
          <div>
         <label for="cdname">DELIVERY BOY NAME:</label>
          <input type="text" class="form-control" id="cdname" placeholder="Enter Delivery Date" name="cdname" readonly></div>
          </div>
          <div>
        <label for="cdpno">DELIVERY BOY NUMBER:</label>
        <input type="text" class="form-control" id="cdpno" placeholder="Enter Delivery Date" name="cdpno" readonly>
        </div>
    </div>
    </div>
    <div class="form-group">
      <label for="deldate">DELIVERY DATE:</label>
      <input type="date" class="form-control" id="deldate" placeholder="Enter Delivery Date" name="deldate">
    </div>
    <button type="submit" class="btn btn-success" name="update_btn">UPDATE</button>
  </form>
</div>
    </div>
  </div>
</div>
<br>
<div class="footer">
  <p>@FAST COURIER 2019(Database Management Project)</p>
</div>

</body>
</html>
