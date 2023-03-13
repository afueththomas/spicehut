<?php
session_start();
include("config.php");
$username=$_POST["txt_name"];
$password=mysqli_real_escape_string($con,md5($_POST["txt_password"]));
$sql=mysqli_query($con,"SELECT * FROM tbl_tester where email='$username' and password='$password'");
$display=mysqli_fetch_array($sql);
if($display>0)
{
	$_SESSION["tes_id"]=$display["tester_id"];
	header("location:../Tester/index.php");

}
else
{
echo "<script>alert('Invalid Username/Password!!');window.location='testerlogin.php'</script>";
}
?>


