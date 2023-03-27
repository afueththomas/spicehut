<?php
session_start();
include("config.php");
$booking_date=date("yy/m/d");
$customer_id=$_SESSION["cus_id"]; 
$amount=$_POST["txtprice"];
$pid=$_POST["hiddenpid"];
$qty=1;

$sql=mysqli_query($con,"select * from tbl_cartmaster where customer_id='$customer_id' and status='pending'");
$row=mysqli_fetch_array($sql);
if($row>0)
{
	$bid=$row["cart_id"];
	$currentamt=$row["totalamt"];
	$finalamt=$currentamt+$amount;
	$sql=mysqli_query($con,"UPDATE tbl_cartmaster SET totalamt='$finalamt' WHERE customer_id='$customer_id'");
	$sql=mysqli_query($con,"INSERT INTO tbl_cartdetail(cart_id,product_id,quantity)VALUES('$bid','$pid','$qty')");

}
else
{
$sql=mysqli_query($con,"INSERT INTO tbl_cartmaster(booking_date,customer_id,totalamt,status)VALUES('$booking_date','$customer_id','$amount','pending')");

$sql=mysqli_query($con,"select max(cart_id) as maxbid from tbl_cartmaster");
$row=mysqli_fetch_array($sql);

$maxbid=$row["maxbid"];
$sql=mysqli_query($con,"INSERT INTO tbl_cartdetail(cart_id,product_id,quantity)VALUES('$maxbid','$pid','$qty')");

}
echo "<script>alert('Your Products are Added to Cart!!Please check your Cart!!');window.location='product_booked.php';</script>";

?>

