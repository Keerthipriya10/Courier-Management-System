<?php
session_start();
$con=mysqli_connect("localhost","root","","courier");
if (!$con) {
    die("Connection failed");
  }
   function showdata(){
    $con=mysqli_connect("localhost","root","","courier");
        $query=mysqli_query($con,"SELECT * FROM deliver");
        while($data=mysqli_fetch_array($query)){
          $consdel=$data['consdel'];
          $delid=$data['delid'];
          $deldate=$data['deldate'];
          $stdel=$data['stdel'];
          $action=$data['action'];
          ?>
          <tr>
            <td><?php echo $delid;?></td>
            <td><?php echo $consdel;?></td>
            <td><?php echo $deldate;?></td>
            <td><?php echo $stdel;?></td>
            <td><?php echo $action;?></td>
            <td><button id="<?php echo $consdel;?>" class="btn btn-danger bt">DELETE</button>
            </td>
          </tr>
          <?php

        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>delete courier</title>
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
  <script type="text/javascript">
    $(document).ready(function(){
      $('.bt').click(function(){
        var id=$(this).attr("id");
        if(confirm('Are You Sure??')){
        $.ajax({
            url:'delete.php',
            method:"post",
            data:{idd:id},
            success:function(data){

          }

        }); 
            }
        $(this).parents('tr').hide();
              });
    });
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

  <h2 style="color:blue;text-decoration: underline;">Delete Delivered Couriers</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Customer Name</th>
        <th>Consignment id</th>
        <th>Delivery Date</th>
        <th>Delivered By</th>
        <th>Status</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php echo showdata();?>

    </tbody>
  </table>
</div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center" style="margin-bottom: 0px;">
  <p>@fast courier</p>
</footer>

</body>
</html>
