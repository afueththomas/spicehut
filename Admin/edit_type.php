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
if(isset($_GET["type_id"]))
{
	$type_id=$_GET["type_id"];
	$sql=mysqli_query($con,"SELECT * FROM tbl_type WHERE type_id='$type_id'");
	$display=mysqli_fetch_array($sql);
}
?>
<form action="" method="POST"> 
<div class="container" style="width:100%;margin-left:18%;margin-bottom: 5%;padding-top:10%" >

  <div class="row">
  <div class="col-md-9" style="box-shadow: 2px 2px 10px #1b93e1; border-radius:0px; top: 14px;">
  <div class="row" style="margin-left: -173%;margin-top: 2%;margin-bottom: -5%;">
  </div>
<h2 style="text-align: center;margin-top: 6%;font-family: fantasy;">TYPE EDIT</h2>
  <br>
   <div class="row">
     <div class="col-md-3" style="text-align:right">
        <label>type</label>
      </div>
      
      <div class="col-md-6">
        <input type="text" class="form-control" name="txt_type" style="width:500px;" value="<?php echo $display["type"] ?>">
      </div>
    </div>
    
   <br>
     <div class="row">
     <div class="col-md-3" style="text-align:right">
         <label>Description</label>
      </div>
      <div class="col-md-6">
         <input type="text" class="form-control"name="txt_Description"style="width:500px;"value="<?php echo$display['Description'];?>"required />
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
	$typename=$_POST['txt_type'];
	$type=$_POST['txt_type'];
	$typedescription=$_POST['txt_Description'];
	$sql=mysqli_query($con,"UPDATE tbl_type SET type='$typename',Description='$typedescription'WHERE type_id='$type_id'");
	if($sql)
	{
		echo "<script>alert('type Details Updated Succesfully!!');location='view_type.php'</script>";
	}
}
?>
