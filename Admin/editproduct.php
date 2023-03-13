<?php
// include("header.php");
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
	$sql=mysqli_query($con,"SELECT * FROM `tbl_product` p inner join tbl_category c on p.si_no=c.c_id inner join tbl_type t on p.type_id=t.type_id WHERE product_id='$product_id'");
	$display=mysqli_fetch_array($sql);
	$cid=$display["si_no"];
	$typeid=$display["type_id"];
}
?>
<form action="" method="POST">
  <div class="container" style="width:100%;margin-left:18%;margin-bottom: 5%;padding-top:10%" >
    <div class="row">
      <div class="col-md-9" style="box-shadow: 2px 2px 10px #1b93e1; border-radius:0px; top: 14px;">
        <div class="row" style="margin-left: -173%;margin-top: 2%;margin-bottom: -5%;"> </div>
        <h2 style="text-align: center;margin-top: 6%;font-family: fantasy;">PRODUCT EDIT</h2>
        <br>
        <div class="row">
     <div class="col-md-3" style="text-align:right">
        <label>Category</label>
      </div>
      <div class="col-md-3">
       <?php
	   include("config.php");
  $sql=mysqli_query($con,"select * from tbl_category where c_id!=$cid");?>
  <select name="txt_si_no"  class="form-control" style="width:500px;" required>
    <option value="<?php echo $display['c_id'] ?>"> <?php echo $display['category'];?> </option>
    <?php
while($row=mysqli_fetch_array($sql))
{
?>
    <option value="<?php echo $row['c_id'] ?>"> <?php echo $row['category'];?> </option>
    <?php
}
?>
  </select>
     </div>
    </div>
    <br>
     <div class="row">
     <div class="col-md-3" style="text-align:right">
        <label>Product name  </label>
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" name="txt_product" style="width:500px;" value="<?php echo $display['product_name'];?>" required>
      </div>
    </div>
    <br>
     <div class="row">
     <div class="col-md-3" style="text-align:right">
        <label>Type </label>
      </div>
      <div class="col-md-3">
       <?php
	    $sql=mysqli_query($con,"select * from tbl_type where type_id!=$typeid ");?>
  <select name="txt_type"  class="form-control" style="width:500px;" required>
    <option value="<?php echo $display['type_id'] ?>"> <?php echo $display['type'];?> </option>
    <?php
while($row=mysqli_fetch_array($sql))
{
?>
    <option value="<?php echo $row['type_id'] ?>"> <?php echo $row['type'];?> </option>
    <?php
}
?>
     </select>
    </div>
    </div>
    <br>
     <div class="row">
     <div class="col-md-3" style="text-align:right">
        <label>Product rate </label>
      </div>
      <div class="col-md-6">
        <input type="Number"  value="<?php echo $display['product_rate'];?>" class="form-control" name="txt_rate" pattern="^[A-Za_z][A-Za-z -]+$" style="width:500px;" placeholder="Enter product rate" required >
      </div>
    </div>
    <br>
    <div class="row">
     <div class="col-md-3" style="text-align:right">
     
        <label>Product Description</label>
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" value="<?php echo $display['product_description'];?>" name="txt_Description" pattern="^[A-Za_z][A-Za-z -]+$" style="width:500px;" placeholder="Enter product Description" required>
      </div>
    </div>
        <br />
        <div class="row">
          <input type="submit" name="btnsubmit" value="Update" class="btn btn-primary" style="margin-left:63%">
        </div>
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
	$catid=$_POST['txt_si_no'];
	$typeid=$_POST['txt_type'];
	$pname=$_POST['txt_product'];
	$prate=$_POST['txt_rate'];
	$description=$_POST['txt_Description'];
	
	$sql=mysqli_query($con,"UPDATE tbl_product SET 	si_no='$catid',type_id='$typeid',product_name='$pname',product_description='$description',product_rate='$prate' WHERE product_id='$product_id'");
	//echo "UPDATE tbl_product SET 	aqua_categoryid='$catid',type_id='$typeid',shape_id='$shapeid',colour_id='$colorid',aqua_productname='$pname',aqua_productdescription='$description',aqua_productprice='$prate' WHERE aqua_productid='$product_id'";
	if($sql)
	{
		echo "<script>alert('Product Details Updated Succesfully!!');location='viewproduct.php'</script>";
	}
}
?>
