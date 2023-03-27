<?php
include("config.php");
if(isset($_GET["cartdetail_id"]))
{
$cart_detail_id=$_GET["cartdetail_id"];
$r="SELECT *FROM tbl_cartdetail WHERE cartdetail_id='$cart_detail_id'";
$res=mysqli_query($con,$r);
if($res)
{
    if(mysqli_num_rows($res)>0)
    {
        $row=mysqli_fetch_array($res);
        $cart_id=$row['cart_id'];
        $query_details=mysqli_query($con,"SELECT product_id FROM tbl_cartdetail WHERE cart_id='$cart_id'");
$product_res=mysqli_fetch_array($query_details);
$product_id=$product_res['product_id'];
$price_query=mysqli_query($con,"SELECT product_rate FROM tbl_product  WHERE product_id='$product_id'");
$product_rate_res=mysqli_fetch_array($price_query);
$product_rate=$product_rate_res['product_rate'];
$query=mysqli_query($con,"SELECT totalamt FROM tbl_cartmaster WHERE cart_id='$cart_id'");
$current_price_res=mysqli_fetch_array($query);
$current_price=$current_price_res['totalamt'];
$total=$current_price-$product_rate;
$p=mysqli_query($con," DELETE FROM `tbl_cartdetail` WHERE cartdetail_id=$cart_detail_id");
$q=mysqli_query($con," UPDATE `tbl_cartmaster` SET totalamt='$total' WHERE cart_id=$cart_id");
if($p and $q)
echo "<script> alert('Product Deleted Successfully!!');window.location='product_booked.php'</script>";
else
echo "<script> alert('Query error'); </script>";
    }
}
else
echo "Query error";

}
?>


