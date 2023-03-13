<?php
include("config.php");
if(isset($_GET["type_id"]))
{
$type_id=$_GET["type_id"];
mysqli_query($con,"delete from tbl_type where type_id=$type_id");
echo "<script> alert('type Deleted Successfully!!');window.location='view_type.php'</script>";
}
?>