<?php
include("config.php");
if(isset($_POST["btnSave"]))
{
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$phone=$_POST["phone"];
	$email=$_POST["email"]; 
	$password=mysqli_real_escape_string($con,md5($_POST["password"]));
	
	
$save=mysqli_query($con,"INSERT INTO `tbl_customer`(`fname`, `lname`, `phone`, `email`, `password`) VALUES ('$fname','$lname','$phone','$email','$password')");

echo "INSERT INTO `tbl_customer`( `fname`, `lname`, `phone`, `email`, `password`) VALUES ($fname,$lname,$phone,$email,$password)";


if($save)
{
echo "<script> alert ('Thank you for registration !!! '); window.location='customerlogin.php'</script>";

}


}


?>
<a href=""

