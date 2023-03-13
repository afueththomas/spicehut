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
<form action="productreg_action.php" method="post" enctype="multipart/form-data" style=" padding-top: 8%;"div class="container" style="margin-left:93px; margin-bottom:10%;padding-left:130px; box-shadow: 2px 2px 10px #1b93e1; border-radius: 4px; top: 14px; padding-top: 3%;">
        <h2 style="text-align: center;margin-top: 6%;font-family: fantasy;">PRODUCT REGISTRATION</h2>

    <br>
    <div class="row">
     <div class="col-md-3" style="text-align:right">
        <label>Category</label>
      </div>
      <div class="col-md-3">
       <?php
	   include("config.php");
  $sql=mysqli_query($con,"select * from tbl_category");?>
  <select name="txt_si_no"  class="form-control" style="width:500px;" required>
    <option value="">---Select---</option>
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
        <input type="text" class="form-control" name="txt_product" style="width:500px;" placeholder="Enter product name " autocomplete="off">
      </div>
    </div>
    <br>


     <div class="row">
     <div class="col-md-3" style="text-align:right">
        <label>Type </label>
      </div>
      <div class="col-md-3">
       <?php
	    $sql=mysqli_query($con,"select * from tbl_type");?>
  <select name="txt_type"  class="form-control" style="width:500px;" required>
    <option value="">---Select---</option>
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
        <label>Quantity </label>
      </div>
      <div class="col-md-3">
       <?php
	    $sql=mysqli_query($con,"select * from tbl_quantity");?>
  <select name="txt_quantity"  class="form-control" style="width:500px;" required>
    <option value="">---Select---</option>
    <?php
while($row=mysqli_fetch_array($sql))
{
?>
    <option value="<?php echo $row['quantity_id'] ?>"> <?php echo $row['quantity'];?> </option>
    <?php
}
?>
     </select>
    </div>
    </div>


    <br>
    <div class="row">
     <div class="col-md-3" style="text-align:right">
        <label>Image </label>
      </div>
      <div class="col-md-6">
        <input type="file" class="form-control" name="txt_image" accept=".jpg, .jpeg, .png" style="width:500px;" placeholder="Enter type " autocomplete="off">
      </div>
    </div>
    <br>
     <div class="row">
     <div class="col-md-3" style="text-align:right">
        <label>Product rate </label>
      </div>
      <div class="col-md-6">
        <input type="Number" class="form-control" name="txt_rate" pattern="^[A-Za_z][A-Za-z -]+$" style="width:500px;" placeholder="Enter product rate" autocomplete="off">
      </div>
    </div>
    <br>
    <div class="row">
     <div class="col-md-3" style="text-align:right">
     
        <label>Product Description</label>
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" name="txt_Description" pattern="^[A-Za_z][A-Za-z -]+$" style="width:500px;" placeholder="Enter product Description" autocomplete="off">
      </div>
    </div>
    <br>
     <div class="row">
      <input type="submit" name="submit" value="Save" class="btn btn-primary" style="margin-left:63%">
    </div>
    <br>
     </div>
</form>
</body>
</html>
<?php
include("footer.php");
?>