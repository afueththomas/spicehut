<?php
include('../Guest/auth_user.php');
include('config.php');
$login_id=$_SESSION['cus_id'];
$details=mysqli_query($con,"SELECT *FROM tbl_customer WHERE customer_id='$login_id'");
if($details)
{
$profile=mysqli_fetch_array($details);
}
?>
	
<html>
  <head>
<style>
input[type=text] {
  width: 100%;
  padding: 12px 20px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 20%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
h1 {
  text-align: center;
  }
</style>
</head>
<body>
<div>

  <form>

  <div class="container" style="margin-left:250px; margin-right:250px; padding-bottom:150px;padding-top: 7%;">
   	<div class="row">
            <div class="col-md-11" style="box-shadow: 2px 2px 10px #000000; border-radius: 4px; top: 14px;">
                <h2 style="text-align: center">Customer Registration</h2>
               
                	<div class="form-horizontal">


    <label for="fname">First Name</label>
	<input type="text" value="<?php echo $profile['fname']; ?>" name="fname" id="fname" readonly>	

    <label for="lname">Last Name</label>
	<input type="text" value="<?php echo $profile['lname']; ?>" name="lname" id="lname" readonly>

	<label for="lname">E-Mail</label>
	<input type="text" value="<?php echo $profile['email']; ?>" name="email" id="email" readonly>

	<label for="lname">E-Mail</label>
	<input type="text" value="<?php echo $profile['phone']; ?>" name="phone" id="phone" maxlength="10" readonly>


  
    <input type="submit" value="UPDATE">
  </form>
</div>
</div>
</div>
</div>
</div>

</body>
</html>
