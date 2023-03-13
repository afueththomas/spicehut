<?php
session_start();
include("config.php");
$username=$_POST["txt_name"];
$password=mysqli_real_escape_string($con,md5($_POST["txt_password"]));
$sql=mysqli_query($con,"SELECT * FROM tbl_customer where email='$username' and password='$password'");
$display=mysqli_fetch_array($sql);
if($display>0)
{
	$_SESSION["cus_id"]=$display["customer_id"];
	header("location:../Customer/index.php");

}
else
{
echo "<script>alert('Invalid Username/Password!!');window.location='customerlogin.php'</script>";
}
?>

