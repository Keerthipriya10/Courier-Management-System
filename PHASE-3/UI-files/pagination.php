<!DOCTYPE html>
<html lang="en">
<head>
  <title>VIEW COURIER DETAILS</title>
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
     #id1 a {
   padding:8px 16px;
   border:1px solid #ccc;
   color:#333;
   font-weight:bold;
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
          <p><a href="dashboard.php">DASHBOARD</a></p>  
          <p  class="active"><a href="codet.php">VIEW COURIER DETAILS</a></p>
          <p><a href="staffreg.html">NEW STAFF REGISTRATION</a></p>
          <p><a href="viewemp.php">VIEW EMPLOYEE DETAILS</a></p>
          <p><a href="staffdet.php">VIEW STAFF DETAILS</a></p>
          <p><a href="income.php">INCOME</a></p>
          <p><a href="complexq.php">COMPLEX QUERIES</a></p>

      </div>
      <div class="col-sm-8 text-center"> 
        <div class="container" id="id1">
          <h2 style="color:blue;text-decoration: underline;">Courier Details</h2>
          <div class="container" style="padding-top:20px;">
<table class="table table-bordered table-striped">  
<thead>  
<tr>  
<th>Customer-Id</th>  
<th>Consignment No</th>
<th>Source</th>
<th>Destination</th>   
<th>Amount</th> 
<th>Date-Of-Booking</th> 
</tr>  
</thead>  
<nav><ul class="pagination">
</ul></nav>
</div>
</body>
<?php
include('db.php');

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql = "SELECT * FROM booking ORDER BY custid ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($conn, $sql); 
?>

<?php  
while ($row = mysqli_fetch_assoc($rs_result)) {
?>  
            <tr>  
            <td><?php echo $row["custid"]; ?></td>  
            <td><?php echo $row["consid"]; ?></td>  
            <td><?php echo $row["csource"]; ?></td>
            <td><?php echo $row["cdest"]; ?></td>
			<td><?php echo $row["camount"]; ?></td> 
			<td><?php echo $row["cdob"]; ?></td> 
            </tr>  
<?php  
};  
?>
</table>
<nav><ul class="pagination">
<?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
            if($i == 1):?>
            <li class='active'  id="<?php echo $i;?>"><a href='pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li> 
            <?php else:?>
            <li id="<?php echo $i;?>"><a href='pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>
        <?php endif;?>          
<?php endfor;endif;?>
</ul></nav>
        </div>
      </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
$('.pagination').pagination({
        items: <?php echo $total_records;?>,
        itemsOnPage: <?php echo $limit;?>,
        cssStyle: 'light-theme',
    currentPage : 1,
    onPageClick : function(pageNumber) {
      jQuery("#target-content").html('loading...');
      jQuery("#target-content").load("pagination.php?page=" + pageNumber);
    }
    });
});
</script>

<footer class="container-fluid text-center" style="margin-bottom: 0px;">
  <p>@fast courier</p>
</footer>

</body>
</html>