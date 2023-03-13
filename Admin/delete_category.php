<?php
include("config.php");
if(isset($_GET["c_id"]))
{
$c_id=$_GET["c_id"];
mysqli_query($con,"delete from tbl_category where c_id=$c_id");
echo "<script> alert('shape Deleted Successfully!!');window.location='view_category.php'</script>";
}
?>