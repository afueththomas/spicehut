<?php
session_start();
include("config.php");
$customer_id=$_SESSION["cus_id"]; 
$fname=$_POST["txt_fname"];
$lname=$_POST["txt_lname"];
$address=$_POST["txt_address"];
$contact=$_POST["txt_contact"];

$sql=mysqli_query($con,"select * from tbl_cartmaster where customer_id='$customer_id' and status='pending'");
$row=mysqli_fetch_array($sql);

	$bid=$row["cart_id"];
	$bdate=$row["Booking_date"];
	$amt=$row["totalamt"];
	$status=$row["status"];

$sql2=mysqli_query($con,"INSERT INTO tbl_bookingmaster(booking_date,customer_id,totalamt,status)VALUES('$bdate','$customer_id','$amt','$status')");


$sql1=mysqli_query($con,"select max(booking_id) as maxbid from tbl_bookingmaster");
$row1=mysqli_fetch_array($sql1);

$maxbid=$row1["maxbid"];

$sql3=mysqli_query($con,"select * from tbl_cartdetail where cart_id='$bid'");
while($row3=mysqli_fetch_array($sql3))
{
	$product_id=$row3["product_id"];
	$quantity=$row3["quantity"];
	
	$sql=mysqli_query($con,"INSERT INTO tbl_bookingdetail(booking_id,product_id,quantity)VALUES('$maxbid','$product_id','$quantity')");   

}
$sql=mysqli_query($con,"INSERT INTO tbl_order(customer_id,fname,lname,booking_id,address,contact,pincode) VALUES('$customer_id','$fname','$lname','$maxbid','$address','$contact','686585')");

$sql=mysqli_query($con,"delete from tbl_cartmaster");
$sql=mysqli_query($con,"delete from tbl_cartdetail");

echo "<script>alert('Continue with Payment?');window.location='../razorpay/index.php';</script>";


echo $customer_id;

?>