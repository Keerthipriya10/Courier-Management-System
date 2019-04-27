<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>EMPLOYEE</title>
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
        <li class="active"><a href="emp.php">Employee</a></li>
        <li><a href="cust.php">Customer</a></li>
        <li><a href="hub.html">Hubs</a></li>
        <li><a href="cont.html">Contact</a></li>
        <li><a href="review.html">Review</a></li>
                <li><a href="track.php">Track</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container well well-lg" style="margin: 50px 400px 150px 100px">
  <form action="logine.php" method="post" width="50%">
    <div class="form-group">
      <label for="bid">EMPLOYEE-ID:</label>
      <input type="text" class="form-control" id="bid" placeholder="Enter Employee Id" name="bid">
    </div>
    <div class="form-group">
      <label for="bmpwd">PASSWORD:</label>
      <input type="password" class="form-control" id="bmpwd" placeholder="Enter password" name="bmpwd">
    </div>
 <div class="form-group">
      <label for="bcity">BRANCH:</label>
      <select class="form-control" id="bcity" name="bcity">
        <option>BANGALORE</option>
        <option>CHENNAI</option>
        <option>BOMBAY</option>
        <option>KOLKATA</option>
        <option>HYDERABAD</option>
        <option>THIRUVANANTHAPURAM</option>
      </select>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-success" name="empsubmit">Submit</button>
  </form>
</div>


<footer class="container-fluid text-center">
<p>@fast courier services</p>
</footer>
</body>

</html>