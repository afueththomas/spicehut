<?php
include("../Guest/auth_tester.php");
include('config.php');
$login_id=$_SESSION['tes_id'];
$details=mysqli_query($con,"SELECT *FROM tbl_tester WHERE tester_id='$login_id'");
if($details)
{
$profile=mysqli_fetch_array($details);
}
?>
<html>
<html lang="zxx">

<head>
<link rel="icon" href="../favicon/logo.ico" type="image/x-icon">
  <title>SpiceHut | Tester</title>
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
</head>

<body>
  

    <div class="headder-top d-md-flex" style="margin-top:-15px;background-color:#000000;">
      <div id="logo">
        <h1>
          <a href="index.php">SpiceHut</a>
        </h1>
      </div>
  
      <nav class="mx-md-auto">

        <label for="drop" class="toggle">Menu</label>
        <input type="checkbox" id="drop">
        <ul class="menu mt-2">
          <li class="active">
            <a href="index.php">Home</a>
          </li>
         
        
          <li class="dropdown">
      
            <label for="drop-2" class="toggle toogle-2">Manage
              <span class="fa fa-angle-down" aria-hidden="true"></span>
            </label>
            <a href="#">Test Product
              <span class="fa fa-angle-down" aria-hidden="true"></span> 
            </a>
            <input type="checkbox" id="drop-2">
            <ul>
           <li>
                <a href="getimage.php" class="drop-text">Test Spices</a>
          
</li>
            
            </ul>
            </li>
            
          
            <li class="dropdown">
      
      <label for="drop-2" class="toggle toogle-2">Manage
        <span class="fa fa-angle-down" aria-hidden="true"></span>
      </label>
      <a href="viewproduct.php">Manage Stock
        <span class="fa fa-angle-down" aria-hidden="true"></span> 
      </a>
      <input type="checkbox" id="drop-2">
      <ul>
     <li>
          <a href="#" class="drop-text">#</a>
    
</li>
      
      </ul>
      </li>

        
           <li class="active">
            <a href="../Guest/logout.php">Logout</a>
          </li>

          
          <li class="active">
           <a href="viewprofile.php"><?php 
           echo "Hi..👋";
           echo $profile['fname']; ?></a>
          </li>

      </div>
      <!-- //nav -->
    </div>
    <!-- //header -->
</body>
</html>