<?php
session_start();
include("config.php");
$username=$_POST["txt_name"];
$password=$_POST["txt_password"];
$sql=mysqli_query($con,"SELECT * FROM tbl_admin where username='$username' and password='$password'");
echo "SELECT * FROM tbl_admin where username='$username' and password='$password'";
$display=mysqli_fetch_array($sql);

$_SESSION["admin_id"]=$display["id"];
if($display>0)
{
	
	header("location:../admin/index.php");

}
else
{
echo "<script>alert('Invalid Username/Password!!');window.location='index.php'</script>";
}
?>