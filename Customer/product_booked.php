<?php
include("header.php");
?>
<!doctype html>
<html>
<head>
<style>
td input[type="number"] {
  width: 50px;
  height: 30px;
  text-align: center;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

td input[type="number"]:read-only {
  background-color: #f2f2f2;
  color: #666;
}

td button {
  display: inline-block;
  width: 30px;
  height: 30px;
  margin-left: 5px;
  font-size: 16px;
  border: none;
  border-radius: 4px;
  background-color: #ccc;
  color: #fff;
  cursor: pointer;
}

td button:hover {
  background-color: #666;
}



</style>
</head>
<form action="orderplace.php" method="post" onload="f1()" style="background-image:url(images/a9.jpg)">
<body>
  <script>
document.getElementById("txttotal").value="0";
</script>
  <div class="container" style="width:100%;margin-left:8%;margin-bottom: 5%;padding-top:7%" >
  <div class="row">
  <div class="col-md-12" style="box-shadow: 2px 2px 10px #000000; border-radius:0px; top: 14px;">
  <h2 style="text-align: center;margin-top: 4%;font-family: fantasy;">YOUR CART</h2>
  <br />
  <div class="form-horizontal" style="margin-left:0px;">

<?php
include("config.php");
$s=1;
$cid=$_SESSION["cus_id"];  
$sql=mysqli_query($con,"SELECT * FROM tbl_cartdetail cd inner join tbl_cartmaster cm on cd.cart_id=cm.cart_id inner join tbl_product p on cd.product_id=p.product_id inner join tbl_category c on p.si_no=c.c_id inner join tbl_type t on p.type_id=t.type_id where cm.customer_id='$cid' and cm.status='pending' group by cd.cartdetail_id");
if(mysqli_num_rows($sql)<1) 
{
  ?>
  <br>  <br>
  <br>

  <div class="container1" >
  <h2 style="text-align: center">...THE CART IS EMPTY...</h2> 
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
<th style="color:#F00">Remove</th>
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
  echo "<td>
  <button style='margin-right: 5px;' class='plus' onclick='this.parentNode.querySelector(\"input[type=number]\").stepDown();'>-</button>
  <input style='margin-right: 5px;' type='number' min='1' id='quantity' name='quantity' value='".$display["quantity"]."' readonly>
  <button style='margin-right: 5px;' class='minus' onclick='this.parentNode.querySelector(\"input[type=number]\").stepUp();'>+</button>
  </td>";
  ?>

<input type='hidden' name='product_rate' id='product_rate' value='<?php echo $display['product_rate']; ?>'>
<?php
	$total=$display["product_rate"]*$display["quantity"];
    echo "<td>".$total."</td>";
echo "<td><a style='color:#090' href='deletebookedproduct.php?cartdetail_id=".$display['cartdetail_id']."'>Remove</a> </td>";
echo "</tr>";
echo "</form>";
  }
echo "</table>";
$sql1=mysqli_query($con,"SELECT * FROM tbl_cartdetail cd inner join tbl_cartmaster cm on cd.cart_id=cm.cart_id inner join tbl_product p on cd.product_id=p.product_id inner join tbl_category c on p.si_no=c.c_id inner join tbl_type t on p.type_id=t.type_id where cm.customer_id='$cid' and cm.status='pending' group by cd.cartdetail_id");
$display1=mysqli_fetch_array($sql1);
$_SESSION["amount"]=$display1["totalamt"];
$_SESSION["cart_id"]=$display1["cart_id"];

?>
    <div class="row">
      <div class="col-md-3" style="text-align:right">
        <label>Total Amount</label>
      </div>
      <div class="col-md-6">
        <input type="text" name="txttotal" id="txttotal" value="<?php echo "₹ ";echo $display1["totalamt"]; ?>"  class="form-control" style="width: 201px;" readonly/>
      </div>
    </div>
    <br />
    <input type="submit" name="booknow" value="CheckOut" class="btn btn-danger" style="margin-left: 34%;margin-bottom: 2%;" />
    <br />
  </div>
  </div>
  <div> </div>
  </div>
  </div>
</body>
</html>
<?php
}
?>
<script>

window.addEventListener("load", function() {
    document.getElementById("quantity").addEventListener("change", function() {

  function updateTotal() {
    var product_rate = document.getElementById('product_rate').value;
    var quantity = document.getElementById('quantity').value;
    var total = product_rate * quantity;
    document.getElementById('txttotal').value = "₹ " + total;
  }

  document.getElementByClassName('plus').addEventListener('click', function() {
    var quantity = document.getElementById('quantity');
    if (quantity.value > 1) {
      quantity.stepDown();
      updateTotal();
    }
  });

  document.getElementByClassName('minus').addEventListener('click', function() {
    var quantity = document.getElementById('quantity');
    quantity.stepUp();
    updateTotal();
  });

  // Update total on page load
  updateTotal();


});
  });
</script>

<?php
// include("footer.php");
?>