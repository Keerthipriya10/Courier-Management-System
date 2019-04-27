<?php
function assign_rand_value($num)
{
// accepts 1 - 36
  switch($num)
  {
    case "1":
     $rand_value = "a";
    break;
    case "2":
     $rand_value = "b";
    break;
    case "3":
     $rand_value = "c";
    break;
    case "4":
     $rand_value = "d";
    break;
    case "5":
     $rand_value = "e";
    break;
    case "6":
     $rand_value = "f";
    break;
    case "7":
     $rand_value = "g";
    break;
    case "8":
     $rand_value = "h";
    break;
    case "9":
     $rand_value = "i";
    break;
    case "10":
     $rand_value = "j";
    break;
    case "11":
     $rand_value = "k";
    break;
    case "12":
     $rand_value = "l";
    break;
    case "13":
     $rand_value = "m";
    break;
    case "14":
     $rand_value = "n";
    break;
    case "15":
     $rand_value = "o";
    break;
    case "16":
     $rand_value = "p";
    break;
    case "17":
     $rand_value = "q";
    break;
    case "18":
     $rand_value = "r";
    break;
    case "19":
     $rand_value = "s";
    break;
    case "20":
     $rand_value = "t";
    break;
    case "21":
     $rand_value = "u";
    break;
    case "22":
     $rand_value = "v";
    break;
    case "23":
     $rand_value = "w";
    break;
    case "24":
     $rand_value = "x";
    break;
    case "25":
     $rand_value = "y";
    break;
    case "26":
     $rand_value = "z";
    break;
    case "27":
     $rand_value = "0";
    break;
    case "28":
     $rand_value = "1";
    break;
    case "29":
     $rand_value = "2";
    break;
    case "30":
     $rand_value = "3";
    break;
    case "31":
     $rand_value = "4";
    break;
    case "32":
     $rand_value = "5";
    break;
    case "33":
     $rand_value = "6";
    break;
    case "34":
     $rand_value = "7";
    break;
    case "35":
     $rand_value = "8";
    break;
    case "36":
     $rand_value = "9";
    break;
  }
return $rand_value;
}

function get_rand_id($length)
{
  if($length>0) 
  { 
  $rand_id="";
   for($i=1; $i<=$length; $i++)
   {
   mt_srand((double)microtime() * 1000000);
   $num = mt_rand(1,36);
   $rand_id .= assign_rand_value($num);
   }
  }
return $rand_id;
}
$rand = get_rand_id(10);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>BOOKING</title>
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
    input{
        width:0px;
    }
  </style>
<script type="text/javascript">
$(document).ready(function(){
  $('#weight').blur(function(){
        var source=$('#src').val();        
        var destination=$('#dst').val(); 
        var weight=$('#weight').val();
        $.ajax({
          method:"post",
          url:"amount.php",
          data:{source:source,dest:destination,weight:weight},
          success:function(data){
            alert("Amount to be paid:" + data);
            $("#amt").val(data);
                                }
              }); 
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
        <li><a href="logoutc.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="codetc.php">VIEW COURIER DETAILS</a></p>
      <p><a href="booking.php">NEW BOOKING</a></p>

    </div>
    <div class="col-sm-8 text-center"> 
      <h1 style="font-size: 50px;"><b>Welcome to Fast Courier</b></h1>
      <h2 style="font-size: 40px; text-decoration: underline;color: blue"><b>NEW BOOKING</b></h1>
<div class="container well well-lg text-left" style="margin: 50px 400px 150px 100px;width:500px;">
  <form method="post" action="book.php" width="50%">
    <div class="form-group">
      <label for="custid">CUSTOMER-ID:</label>
      <input type="text" class="form-control" id="custid" placeholder="Enter Customer Id" name="custid" required>
    </div>
        <div class="form-group">
      <label for="consid">CONSIGNMENT ID:</label>
      <input type="text" class="form-control" id="consid" placeholder="Enter Consignment Id" name="consid" value="<?php echo strtoupper($rand);?>">
    </div>
        <div class="form-group">
      <label for="csender">SENDER:</label>
      <input type="text" class="form-control" id="csender" placeholder="Enter Sender Name" name="csender" required>
    </div>
      <div class="form-group">
      <label for="cspno">SENDER-PHONE:</label>
      <input type="text" class="form-control" id="cspno" placeholder="Enter Sender Phone number" name="cspno" required>
    </div>
        <div class="form-group">
      <label for="csaddress">SENDER-ADDRESS:</label>
      <textarea class="form-control" id="csaddress" placeholder="Enter Sender address" name="csaddress" rows="5" required>
        </textarea>
    </div>
 <div class="form-group">
      <label for="source">SOURCE</label>
      <select class="form-control" name="src" id="src">
        <option>SELECT</option>
        <option>BANGALORE</option>
        <option>CHENNAI</option>
        <option>BOMBAY</option>
        <option>KOLKATA</option>
        <option>HYDERABAD</option>
        <option>THIRUVANANTHAPURAM</option>
      </select>
    </div>
  <div class="form-group">
      <label for="creceiver">RECEIVER NAME:</label>
      <input type="text" class="form-control" id="creceiver" placeholder="Enter Receiver Name" name="creceiver" required>
    </div>
      <div class="form-group">
      <label for="crpno">RECEIVER-PHONE:</label>
      <input type="text" class="form-control" id="crpno" placeholder="Enter Receiver Phone number" name="crpno" required>
    </div>
        <div class="form-group">
      <label for="craddress">RECEIVER-ADDRESS:</label>
      <textarea class="form-control" id="craddress" placeholder="Enter Receiver address" name="craddress" rows="5" required></textarea>
    </div>
 <div class="form-group">
      <label for="dst">DESTINATION</label>
      <select class="form-control" name="dst" id="dst">
        <option>SELECT</option>
        <option>BANGALORE</option>
        <option>CHENNAI</option>
        <option>BOMBAY</option>
        <option>KOLKATA</option>
        <option>HYDERABAD</option>
        <option>THIRUVANANTHAPURAM</option>
      </select>
    </div>
      <div class="form-group">
      <label for="weight">WEIGHT(in kgs):</label>
      <input type="textarea" class="form-control" id="weight" placeholder="Enter Weight" name="weight" required>
    </div>
      <div class="form-group">
      <label for="amt">AMOUNT :</label>
      <input type="text" class="form-control" name="amt" id="amt" readonly>
    </div>
    <div class="form-group">
      <label for="bdate">DATE OF BOOKING:</label>
      <input type="date" class="form-control" id="bdate" placeholder="Enter Date of booking" name="bdate"required>
    </div>
    <button type="submit" class="btn btn-success" name="booking_btn">Submit</button>
  </form>
</div>
      </p>
    </div>
</div>



</body>
</html>
