<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>VIEW EMPLOYEE DETAILS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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
      <p><a href="viewemp.php">VIEW EMPLOYEE DETAILS</a></p>
      <p><a href="staffdet.php">VIEW STAFF DETAILS</a></p>
      <p class="active"><a href="income.php">INCOME</a></p>
      <p><a href="complexq.php">COMPLEX QUERIES</a></p>

    </div>
    <div class="col-sm-8 text-center">
      <h2 style="color:blue;text-decoration: underline;">Income Details</h2>
      <div class="col-sm-6 text-center"> 
      <table class="table table-bordered">
      
    <thead style="background-color:#ffffff;color: #000000;">
      <tr>
        <th><b>TOTAL INCOME</b></th>
        <th><b>BRANCH SALARY</b></th>
        <th><b>STAFF SALARY</b></th>
      </tr>
    </thead>
    <tbody>
<?php
$sql="SELECT sum(camount) as total FROM booking";
    $result=mysqli_query($con,$sql) or die("Bad query:");
    $row=mysqli_fetch_assoc($result);
    $name=$row['total'];
$sqla="SELECT sum(bmsalary) as total1 FROM branch_mgr";
    $result1=mysqli_query($con,$sqla) or die("Bad query:");
    $row=mysqli_fetch_assoc($result1);
    $name1=$row['total1'];
$sqlb="SELECT sum(stsalary) as total2 FROM staff";
    $result2=mysqli_query($con,$sqlb) or die("Bad query:");
    $row=mysqli_fetch_assoc($result2);
    $name2=$row['total2'];
    $dataPoints = array( 
  array("y" => $name, "label" => "TOTAL INCOME" ),
  array("y" => $name1, "label" => "BRANCH MANAGER SALARY" ),
  array("y" => $name2, "label" => "STAFF SALARY" )
);
?>
<td><?php echo $name;?></td>
<td><?php echo $name1;?></td>
<td><?php echo $name2;?></td>

    </tbody>
  </table>
  </div>
  <div class="col-sm-6 text-center"> 
  <div class="row-content" id="chartContainer" style="height: 250px; width: 40%;"></div>
  </div></div>
  </div>
    <br>
    
</div>

<footer class="container-fluid text-center" style="margin-bottom: 0px;">
  <p>@fast courier</p>
</footer>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: "INCOME AND EXPENDITURE"
  },
  axisY: {
    title: "AMOUNT(thousands)"
  },
  data: [{
    type: "column",
    yValueFormatString: "#,##0.## thousands",
    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
}
</script>
</body>
</html>
