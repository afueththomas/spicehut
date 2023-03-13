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
<?php
include("config.php");
?>
<form action="#" method="post" >
  <div class="container" style="width:100%;margin-left:20%;margin-bottom: 5%;padding-top:8%" >
  <div class="row">
  <div class="col-md-9" style="box-shadow: 2px 2px 10px #000000; border-radius:0px; top: 14px;">
  <h2 style="text-align: center;margin-top: 6%;font-family: fantasy;"><u>BOOKING DETAILS</u></h2>
  <br />
  <table class="table table-hover" style="border: 2px solid #adaaaa; box-shadow: 3px 3px 11px #777777; margin-bottom:10%">
  <th>#</th>
    <th>Product Name</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Total</th>
    <?php
$s=1;
$bmid=$_GET["bmid"];
$_SESSION["bmid"]=$bmid;
$sql=mysqli_query($con,"SELECT * FROM tbl_bookingmaster bm inner join tbl_bookingdetail bd on bm.booking_id=bd.booking_id inner join tbl_product p on bd.product_id=p.product_id where bd.booking_id=$bmid");

   while($display=mysqli_fetch_array($sql))
   {
	echo "<tr>";
	echo"<td>".$s++."</td>";
	echo "<td>".$display["product_name"]."</td>";
    echo "<td>".$display["product_rate"]."</td>";  
	echo "<td>".$display["quantity"]."</td>"; 
	$total=$display["product_rate"]*$display["quantity"];
    echo "<td>".$total."</td>";
	echo "</tr>";
	$cid=$display["customer_id"];
  }
echo "</table>";
$sql=mysqli_query($con,"SELECT * FROM tbl_customer where customer_id='$cid'");
$sql2=mysqli_query($con,"SELECT * FROM tbl_order  where customer_id='$cid'");
$display2=mysqli_fetch_array($sql2);
$display=mysqli_fetch_array($sql);
$_SESSION["email"]=$display["email"];
?>
    <div class="row">
      <div class="col-md-3" style="text-align:right">
        <label>Customer Name</label>
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" name="txt_cusname" style="width:500px;" value="<?php echo $display["fname"] ?> <?php echo $display["lname"] ?>" readonly>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-3" style="text-align:right">
        <label>Contact</label>
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" name="txt_phone" style="width:500px;" value="<?php echo $display2["contact"] ?>" readonly>
      </div>
    </div>
    <br>
 
    <div class="row">
      <div class="col-md-3" style="text-align:right">
        <label>Address</label>
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" name="txt_address" style="width:500px;" value="<?php echo $display2["address"] ?>" readonly>
      </div>
    </div>
    <br>


    <div class="row">
      <div class="col-md-3" style="text-align:right">
        <label>Pincode</label>
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" name="txt_address" style="width:500px;" value="<?php echo $display2["pincode"] ?>" readonly>
      </div>
    </div>
   
    <br>
    <br>
  </div>
  </div>
  </div>
  </div>
  </div>
</form>
</body>
</html>
<?php
include("footer.php");
?>
