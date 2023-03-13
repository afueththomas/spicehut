<?php
include("config.php");
if(isset($_POST["submit"]))
{
$product=$_POST['txt_product'];
$description=$_POST['txt_Description'];
$c_id=$_POST['txt_si_no'];
$type_id=$_POST['txt_type'];
$quantity_id=$_POST['txt_quantity'];
$rate=$_POST['txt_rate'];
$sql=mysqli_query($con,"SELECT * FROM tbl_product WHERE product_name='$product'");
  		$display=mysqli_fetch_array($sql);
  		if($display>0)
		{
		echo "<script>alert('Already exist with same shape name!!');window.location='viewproduct.php'</script>";	
		}
		else
		{
$loc= "../images/";
$s=$_FILES['txt_image'] ['name'];
move_uploaded_file($_FILES['txt_image']['tmp_name'],$loc.$s);
$sql=mysqli_query($con,"INSERT INTO `tbl_product`(`product_name`, `si_no`, `type_id`,`quantity_id`, `product_rate`, `image`, `product_description`) VALUES ('$product','$c_id','$type_id','$quantity_id','$rate','$s','$description')");
echo "INSERT INTO `tbl_product`(`product_name`, `c_id`, `type_id`, `product_rate`, `image`, `product_description`) VALUES ('$product','$c_id','$type_id','$rate','$s','$description')";
echo"<script>alert('product Details Registered Successfully!!');window.location='viewproduct.php'</script>";
		}
}
?>