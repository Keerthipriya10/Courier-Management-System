<!DOCTYPE html>
<html lang="en">
<head>
  <title>VIEW EMPLOYEE DETAILS</title>
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
      padding:20px 20px 40px 30px;
      background-color: #ffff00;
      color: #000000;
      font-family: Impact, Charcoal, sans-serif,monospace;
      height: 100%;
      font-weight: italic;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #000000;
      color: white;
      padding: 15px;
      margin-bottom:0px;
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
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" style="color:#00ff00;font-family: Arial, Helvetica, sans-serif; font-weight: 900;">FAST COURIER</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="home.html"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p ><a href="dashboard.php">DASHBOARD</a></p>  
      <p><a href="codet.php">VIEW COURIER DETAILS</a></p>
      <p><a href="staffreg.html">NEW STAFF REGISTRATION</a></p>
      <p  class="active"><a href="viewemp.php">VIEW EMPLOYEE DETAILS</a></p>
      <p><a href="staffdet.php">VIEW STAFF DETAILS</a></p>
      <p><a href="income.php">INCOME</a></p>
      <p><a href="complexq.php">COMPLEX QUERIES</a></p>

    </div>
    <div class="col-sm-8 text-center">
      <h2 style="color:blue;text-decoration: underline;">Branch Manager Details</h2> 
      <table class="table table-bordered">
    <thead style="background-color:#ffffff;color: #000000;">
      <tr>
        <th>EMPLOYEE-ID</th>
        <th>EMPLOYEE-NAME</th>
        <th>E-MAIL</th>
        <th>PHONE NO</th>
        <th><b>SALARY</b></th>
        <th>BRANCH</th>
        <th>DATE OF BIRTH</th>
      </tr>
    </thead>
    <tbody>
      <?php

$db=mysqli_connect("localhost","root","","courier");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$sql="SELECT * FROM branch_mgr";
    $result=mysqli_query($db,$sql) or die("Bad query:");
while($row=mysqli_fetch_assoc($result)){
 echo "<tr><td>{$row['bid']}</td><td>{$row['bmname']}</td><td>{$row['bmmail']}</td><td>{$row['bmphone']}</td><td><b>{$row['bmsalary']}</b></td><td>{$row['bcity']}</td><td>{$row['bmdob']}</td></tr>"; 
}

?>
    </tbody>
  </table>
    </div>
  </div>
</div>

<footer class="container-fluid text-center" style="margin-bottom: 0px;">
  <p>@fast courier</p>
</footer>

</body>
</html>
