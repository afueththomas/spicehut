<?php
include("header.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Untitled Document</title>
</head>
<body>
<?php
include("config.php");
if(isset($_GET["product_id"]))
{
	$product_id=$_GET["product_id"];
	$sql=mysqli_query($con,"SELECT * FROM `tbl_product` WHERE product_id='$product_id'");
	$display=mysqli_fetch_array($sql);
}
?>
<form action="" method="POST">
  <div class="container" style="width:100%;margin-left:18%;margin-bottom: 5%;padding-top:10%" >
    <div class="row">
      <div class="col-md-9" style="box-shadow: 2px 2px 10px #000000; border-radius:0px; top: 14px;">
        <div class="row" style="margin-left: -173%;margin-top: 2%;margin-bottom: -5%;"> </div>
        <h2 style="text-align: center;margin-top: 6%;font-family: fantasy;">UPDATE STOCK</h2>
        <br>
        <div class="row">
     <div class="col-md-3" style="text-align:right">
        <label>Product name  </label>
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" name="txt_product" style="width:500px;" value="<?php echo $display['product_name'];?>" readonly>
      </div>
    </div>
    <br>

    <div class="row">
     <div class="col-md-3" style="text-align:right">
        <label>Stock(Amount)</label>
      </div>
      <div class="col-md-6">
        <input type="text"  class="form-control" name="txt_stock" style="width:500px;" placeholder="Enter Stock Amount" autocomplete="off">
      </div>
    </div>
<br>
        <div class="row">
          <input type="submit" name="btnsubmit" value="Update" class="btn btn-primary" style="margin-left:63%">
          
        </div>
        <br>
         
      </div>
    </div>
  </div>
  </div>
</form>
</body>
</html>
<?php
if(isset($_POST["btnsubmit"]))
{
	$stock=$_POST['txt_stock'];	
	$sql=mysqli_query($con,"UPDATE tbl_product SET 	stock='$stock' WHERE product_id='$product_id'");
	{
		echo "<script>alert('Stock Details Updated Succesfully!!');location='index.php'</script>";
	}
}
?>
