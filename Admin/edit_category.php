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
if(isset($_GET["c_id"]))
{
	$c_id=$_GET["c_id"];
	$sql=mysqli_query($con,"SELECT * FROM tbl_category WHERE c_id='$c_id'");
	$display=mysqli_fetch_array($sql);
}
?>
<form action="" method="POST"> 
<div class="container" style="width:100%;margin-left:18%;margin-bottom: 5%;padding-top:10%" >

  <div class="row">
  <div class="col-md-9" style="box-shadow: 2px 2px 10px #1b93e1; border-radius:0px; top: 14px;">
  <div class="row" style="margin-left: -173%;margin-top: 2%;margin-bottom: -5%;">
  </div>
<h2 style="text-align: center;margin-top: 6%;font-family: fantasy;">CATEGORY REGISTRATION</h2>
  <br>
   <div class="row">
     <div class="col-md-3" style="text-align:right">
        <label>category</label>
      </div>
      
      <div class="col-md-6">
        <input type="text" class="form-control" name="txt_category" style="width:500px;" value="<?php echo $display["category"] ?>">
      </div>
    </div>
    
   <br>
     <div class="row">
     <div class="col-md-3" style="text-align:right">
         <label>Description</label>
      </div>
      <div class="col-md-6">
         <input type="text"class="form-control"name="txt_Description"style="width:500px;"value="<?php echo$display['description'];?>"required />
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
	$category=$_POST['txt_category'];
	$categorydescription=$_POST['txt_Description'];
	$sql=mysqli_query($con,"UPDATE tbl_category SET category='$category',Description='$categorydescription'WHERE c_id='$c_id'");
	echo"UPDATE tbl_category SET category='$category',Description='$categorydescription'WHERE c_id='$c_id'";
	if($sql)
	{
		echo "<script>alert('category Details Updated Succesfully!!');location='view_category.php'</script>";
	}
}
?>
