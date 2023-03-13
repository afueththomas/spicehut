<?php
include("config.php");
if(isset($_GET["booking_id"]))
{
$ordered_id=$_GET["booking_id"];
mysqli_query($con," DELETE FROM `tbl_bookingmaster` WHERE booking_id=$ordered_id");
echo "<script> alert('Order Deleted Successfully,Refund is taken Place in 3 Days!!');window.location='bookinghistory.php'</script>";
}
?>
