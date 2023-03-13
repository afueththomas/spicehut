<?php
include("config.php");
if(isset($_GET["product_id"]))
{
$type_id=$_GET["product_id"];
mysqli_query($conn,"delete from tbl_type where type_id=$product_id");
echo "<script>alert('Product Deleted Successfully!!');window.location='view_type.php'</script>";
}
?>