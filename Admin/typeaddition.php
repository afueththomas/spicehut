
<?php
include("config.php");
if(isset($_POST["submit"]))
{
$typename=$_POST['txt_Type'];
$typedescription=$_POST['txt_Description'];
$sql=mysqli_query($con,"SELECT * FROM tbl_type WHERE type='$typename'");
  		$display=mysqli_fetch_array($sql);
  		if($display>0)
		{
		echo "<script>alert('Already exist with same type name!!');window.location='view_type.php'</script>";	
		}
		else
		{
$sql=mysqli_query($con,"INSERT INTO tbl_type(type,Description)VALUES('$typename','$typedescription')");
echo"<script>alert('type Details Registered Successfully!!');window.location='view_type.php'</script>";
		}
}
?>