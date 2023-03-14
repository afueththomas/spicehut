<?php
include("../Guest/auth_user.php");

include('config.php');
$login_id=$_SESSION['cus_id'];
$details=mysqli_query($con,"SELECT *FROM tbl_customer WHERE customer_id='$login_id'");
if($details)
{
$profile=mysqli_fetch_array($details);
}
?>
<html>
<html lang="zxx">
<head>
<link rel="icon" href="../favicon/logo.ico" type="image/x-icon">
  <title>SpiceHut | Admin</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="Yield Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
         Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
  />
  <script>
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>


  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">

  <link href="css/font-awesome.min.css" rel="stylesheet">


  <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
 
  <link href="//fonts.googleapis.com/css?family=Josefin+Sans:400,600,700" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Libre+Franklin:400,500" rel="stylesheet">


  <style>
    .avatar {
  vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
}
    </style>
</head>

<body>
  
    <!-- header -->
    <div class="headder-top d-md-flex" style="margin-top:-15px;background-color:#000000;">
      <div id="logo">
        <h1>
          <a href="index.php">SpiceHut</a>
        </h1>
      </div>
      <!-- nav -->
      <nav class="mx-md-auto">

        <ul class="menu mt-2">
          <li class="active">
            <a href="index.php">Home</a>
            </li>

            <li class="active">
            <a href="categoryview.php">Category?</a>
            </li>
            <li class="active">
            <a href="product_booked.php">Cart</a>
            </li>

            <li class="active">
            <a href="bookinghistory.php">My Orders</a>
            </li>
          
          <li class="active">
            <a href="../Guest/logout.php">Logout</a>
          </li>
          <li class="active">
          <a href="viewprofile.php"><img src="img/avathar.png" alt="Avatar" class="avatar"></a>
          <a href="viewprofile.php"><?php
          echo "Hi..👋 " ;
          echo $profile['fname']; ?></a>
      </li>
      </ul>
      </div>
      <!-- //nav -->
    </div>
    <!-- //header -->
</body>
</html>