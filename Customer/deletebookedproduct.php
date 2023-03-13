<?php
include("config.php");
if(isset($_GET["cartdetail_id"]))
{
$cart_id=$_GET["cartdetail_id"];
mysqli_query($con," DELETE FROM `tbl_cartdetail` WHERE cartdetail_id=$cart_id");
echo $cart_id;
echo "<script> alert('Product Deleted Successfully!!');window.location='product_booked.php'</script>";
}
?>
