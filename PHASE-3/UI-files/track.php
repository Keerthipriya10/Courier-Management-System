<?php
$db=mysqli_connect("localhost","root","","courier");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>TRACK</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style >
    .navbar {
      margin: 0px;
      border-radius: 0;
      background-color: #4d4d4d
    }
     .jumbotron {
      margin-bottom: 0;
      background-color: black;
      padding: 0;

    }
    footer {
      background-color: black;
      padding: 25px;
      color: white;
    }

#home {
color: white ; 
font-size:36px;
font-family:"Comic Sans MS", cursive, sans-serif;
margin: 5px 5px;
}

  </style>
  <script type="text/javascript">
    $(document).ready(function(){
 $('#cno').keyup(function(){
  var id= $('#cno').val();
  if(id != '')
  {
   $.ajax({
    url:"testdata.php",
    method:"POST",
    data:{cno:id},
    dataType:"JSON",
    success:function(data)
    {
     $('#courierdet').css("display", "block");
     $('#courid').text(data.name);
     $('#consgid').text(data.consgid); 
     $('#cur').text(data.curr);
     $('#sta').text(data.sta);
     $('#del').text(data.del);
     $('#delby').text(data.dname);
     $('#delno').text(data.dpno);

    }
   })
  }
  else
  {
   alert("Please Select Consignment No");
   $('courierdet').css("display", "none");
  }
 });
});
  </script>
</head>
<body>
<div class="jumbotron">
  <div class="container text-center">
    <h1 id="home"><img src="logo.jpg" width="200" height="80">FAST COURIER</h1>      
  </div>
</div>

<br>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="home.html">Home</a></li>
        <li><a href="admin.html">Admin</a></li>
        <li><a href="emp.php">Employee</a></li>
        <li><a href="cust.php">Customer</a></li>
        <li><a href="hub.html">Hubs</a></li>
        <li><a href="cont.html">Contact</a></li>
        <li ><a href="review.html">Reviews</a></li>
        <li class="active"><a href="track.php">Track</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container well well-lg" style="margin: 50px 400px 20px 100px;">
  <form width="50%">
    <div class="form-group">
      <label for="cno">Enter Consignment No:</label>
      <input type="text" class="form-control" id="cno" placeholder="Enter Consignment No" name="cno">
    </div>
      </form>
  </div>
<div id="courierdet" class="container container-fluid" style="display:none">
<div  class="table-responsive" >
  <table class="table table-bordered">
    <tr>
      <td width="10%" align="right"><b>Customer Id</b></td>
      <td width="60%"><span id="courid"></span></td>
    </tr>
    <tr>
      <td width="10%" align="right"><b>Consignment No</b></td>
      <td width="60%"><span id="consgid"></span></td>
    </tr>
        <tr>
      <td width="10%" align="right"><b>Current Location</b></td>
      <td width="60%"><span id="cur"></span></td>
    </tr>
        <tr>
      <td width="10%" align="right"><b>Status</b></td>
      <td width="60%"><span id="sta"></span></td>
    </tr>
        <tr>
      <td width="10%" align="right"><b>Delivery Date</b></td>
      <td width="60%"><span id="del"></span></td>
    </tr>
        <tr>
      <td width="10%" align="right"><b>Delivered By</b></td>
      <td width="60%"><span id="delby"></span></td>
    </tr>
        <tr>
      <td width="10%" align="right"><b>Delivery Boy Phone:</b></td>
      <td width="60%"><span id="delno"></span></td>
    </tr>
  </table>

</div>
</div>
<footer class="container-fluid text-center">
<p>@fast courier services</p>
</footer>
</body>

</html>