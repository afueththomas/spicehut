<?php
include("header.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form action="booknowaction.php" method="post">
  <div class="container" style="width:100%;margin-left:8%;margin-bottom: 5%;padding-top:10%" >
  
  <div class="row">
  <div class="col-md-12" style="box-shadow: 2px 2px 10px #000000; border-radius:5px; top: 17px;">
  <h2 style="text-align: center;margin-top: 6%;font-family: fantasy;">BOOKING DETAILS</h2>
  <div class="form-horizontal" style="margin-left:0px;">
  <table class="table table-hover" style="border: 2px solid #adaaaa; box-shadow: 3px 3px 11px #777777; margin-bottom:10%">
  
    <th> #</th>
    <th>Booking date</th>
    <th>Customer</th>
     <th>E-Mail</th>
    <th>Totalamt</th>
    <th>ViewMore</th>
    <?php
include("config.php");
$s=1;
$sql=mysqli_query($con,"SELECT * FROM tbl_bookingmaster b inner join tbl_customer c on b.customer_id=c.customer_id where b.status='pending'");
   while($display=mysqli_fetch_array($sql))
   {
	echo "<tr>";
	echo"<td>".$s++."</td>";
	echo "<td>".$display["booking_date"]."</td>";
    echo "<td>".$display["fname"]." ".$display["lname"]."</td>";  
	echo "<td>".$display["email"]."</td>"; 
    echo "<td>".$display["totalamt"]."</td>";
	echo "<td><a style='color:#090' href='viewmorebooking.php?bmid=".$display['booking_id']."'>ViewMore</a> </td>";
	echo "</tr>";

  }
echo "</table>";

?>
  </div>
  </div>
  <div> </div>
  </div>
  </div>
</form>
</body>
</html>
<?php
include("footer.php");
?>