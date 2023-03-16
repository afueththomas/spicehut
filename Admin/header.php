<?php
include("../Guest/auth_admin.php");
include('config.php');
$login_id=$_SESSION['admin_id'];
$details=mysqli_query($con,"SELECT *FROM tbl_admin WHERE id='$login_id'");
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
  <!--booststrap-->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
  <!--//booststrap end-->
  <!-- font-awesome icons -->
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <!-- //font-awesome icons -->
  <!--stylesheets-->
  <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
  <!--//stylesheets-->
  <link href="//fonts.googleapis.com/css?family=Josefin+Sans:400,600,700" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Libre+Franklin:400,500" rel="stylesheet">
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

        <label for="drop" class="toggle">Menu</label>
        <input type="checkbox" id="drop">
        <ul class="menu mt-2">
          <li class="active">
            <a href="index.php">Home</a>
          </li>
         
        
          <li class="dropdown">
            <!-- First Tier Drop Down -->
            <label for="drop-2" class="toggle toogle-2">Tester Management
              <span class="fa fa-angle-down" aria-hidden="true"></span>
            </label>
            <a href="#">Tester Management
              <span class="fa fa-angle-down" aria-hidden="true"></span> 
            </a>
            <input type="checkbox" id="drop-2">
            <ul>
           <li>
                <a href="testerreg.php" class="drop-text">Tester Registration</a>
                <a href="testermanage.php" class="drop-text">Tester Management</a>
</li>
            
            </ul>
            </li>



            <li class="dropdown">
            <!-- First Tier Drop Down -->
            <label for="drop-2" class="toggle toogle-2">Product Management
              <span class="fa fa-angle-down" aria-hidden="true"></span>
            </label>
            <a href="#">Product Management
              <span class="fa fa-angle-down" aria-hidden="true"></span> 
            </a>
            <input type="checkbox" id="drop-2">
            <ul>
           <li>
                <a href="view_category.php" class="drop-text">Category</a>
                <a href="viewproduct.php" class="drop-text">Product</a>
                <a href="view_type.php" class="drop-text"> Type</a>
</li>
            
            </ul>
            </li>


            
             <li class="active">
            <a href="view_booking.php">View Booking</a>
          </li>
          <li class="dropdown">
            <!-- First Tier Drop Down -->
            <label for="drop-2" class="toggle toogle-2">Report
              <span class="fa fa-angle-down" aria-hidden="true"></span>
            </label>
            <a href="#">Report
              <span class="fa fa-angle-down" aria-hidden="true"></span> 
            </a>
            <input type="checkbox" id="drop-2">
            <ul>
               
                 <a href="report_pie.php" class="drop-text"> Product in Each Category</a>
                <a href="most_selled.php" class="drop-text">Top Category of Product Selled</a>
                 <a href="http://127.0.0.1:5002/" class="drop-text">Sentimantal Analysis </a>


              </li>


  </li>  
            </ul>

            </li>
       

            </li>
           <li class="active">
            <a href="../Guest/logout.php">Logout</a>
          </li>

          
          <li class="active">
           <a href="#"><?php 
           echo "Hi..👋";
           echo $profile['username']; ?></a>
          </li>

      </div>
      <!-- //nav -->
    </div>
    <!-- //header -->
</body>
</html>