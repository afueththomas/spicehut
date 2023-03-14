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
<form action="orderplace.php" method="post" onload="f1()" style="background-image:url(images/a9.jpg)">
  <script>
document.getElementById("txttotal").value="0";
</script>
  <div class="container" style="width:100%;margin-left:8%;;padding-top:7%" >
  <div class="row">
  <div class="col-md-12" style="box-shadow: 2px 2px 10px #000000; border-radius:0px; top: 14px;">
  <h2 style="text-align: center;margin-top: 3%;font-family: fantasy;">YOUR ORDERS</h2>
  <br />
  <div class="form-horizontal" style="margin-left:0px;">
  
<?php
include("config.php");
$s=1;
$cid=$_SESSION["cus_id"];  
$sql=mysqli_query($con,"select * from tbl_bookingmaster bm inner join tbl_bookingdetail bd on bm.booking_id = bd.booking_id inner join tbl_product p on p.product_id = bd.product_id inner join tbl_category ca on ca.c_id = p.si_no inner join tbl_type t on t.type_id=p.type_id where customer_id = '$cid' and status!='Accepted' ");
if(mysqli_num_rows($sql)<1) 
{
  ?>
  <br>  <br>
  <br>

  <div class="container1" >
  <h2 style="text-align: center">...NOT YET ORDERD A PRODUCT...</h2> 
</div>
<?php
}
else
{


  ?>
<table class="table table-hover" style="border: 2px solid #adaaaa; box-shadow: 3px 3px 11px #777777; margin-bottom:7%;background-color:white">
  
  <th> #</th>
  <th>Category</th>
  <th>Image</th>
  <th>Product Name</th>
  <th>Type</th>
  <th> Rate</th>    
  <th>Quantity</th>
  <th>Total</th>
   <th>Status</th>
<th style="color:#F00">Delete</th>
<th style="color:#090">Review</th>


<?php

   while($display=mysqli_fetch_array($sql))
   {
	echo "<tr>";
	echo"<td>".$s++."</td>";
	echo "<td>".$display["category"]."</td>";
	echo "<td><img src='../images/".$display["image"]."'height='150'width='200'/ style='box-shadow: 2px 2px 10px #000000; border-radius:  44%;'/></td>";
	echo "<td>".$display["product_name"]."</td>";
	echo "<td>".$display["type"]."</td>";
	
	echo "<td>".$display["product_rate"]."</td>";

	$total=$display["product_rate"]*$display["quantity"];
	    echo "<td>".$display["quantity"]."</td>";
    echo "<td>".$total."</td>"; ?>
	
	 <td style="color:green;"> Ordered</td> <?php
	
echo "<td><a style='color:#090' href='deleteordered.php?booking_id=".$display['booking_id']."'>Delete</a> </td>";
echo "<td><a style='color:#090' href='review/index.php?booking_id=".$display['booking_id']."'>Add Review</a> </td>";
echo "</tr>";
	
  }
echo "</table>";


?>
   
    <br />
  </div>
  </div>
  <div> </div>
  </div>
   </div>
    </div>
</form>
</body>
</html>
<?php
}
?>